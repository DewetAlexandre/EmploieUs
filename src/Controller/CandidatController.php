<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CandidatType;
use App\Entity\Candidat;
use App\Repository\CandidatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CandidatController extends AbstractController
{
    #[Route('/candidat', name: 'candidat')]
    public function index(CandidatRepository $repository): Response
    {
        $candidats = $repository->findAll();
        

        return $this->render('pages/candidat/index.html.twig', [
            'candidats' => $candidats
        ]);
    }

    #[Route('/candidat/nouveau','candidat.new',methods:['GET','POST'])]
    public function new(Request $request): Response
    {
        $candidat = new Candidat();
        $form = $this->createForm(CandidatType::class, $candidat);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            dd($form);
        }else{

        }

        return $this->render('pages/candidat/new.html.twig',[
        'form' => $form->createView()]);
    }
}
