<?php

namespace App\DataFixtures;

use App\Entity\Candidat;
use App\Entity\Entreprise;
use App\Entity\Message;
use App\Entity\Annonce;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class AppFixtures extends Fixture
{   
    /**
     * @var Generator
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        for($i=1;$i<11;$i++){
            $candidat = new Candidat();
            $candidat->setNom($this->faker->lastName())
                ->setPrenom($this->faker->firstName())
                ->setGenre($this->faker->numberBetween(0,2))
                ->setDatenaissance($this->faker->datetime('Y-m-d'))
                ->setAdresse($this->faker->address())
                ->setMail($this->faker->safeEmail())
                ->setMotdepasse($this->faker->password())
                ->setTel($this->faker->phoneNumber())
                ->setCv($this->faker->word());

            $manager->persist($candidat);

        /*

            $annonce = new Annonce();
            $annonce->setDomaine($this->faker->domainWord())
                ->setDate($this->faker->date())
                ->setSalaire($this->faker->randomFloat())
                ->setDuree($this->faker->text())
                ->setDescriptif($this->faker->text())
                ->setTitre($this->faker->text())
                ->settype($this->faker->word());

            $manager->persist($annonce);


            $entreprise = new Entreprise();
            $entreprise->setSiret($this->faker->siret())
                ->setMail($this->faker->safeEmail())
                ->setMotdepasse($this->faker->password())
                ->setDomaine($this->faker->domainWord());

            $manager->persist($entreprise);


            $message = new Message();
            $message->setDate($this->faker->date())
                ->setContenu($this->faker->text())
                ->setTitre($this->faker->text());

            $manager->persist($message);
            */
        }

        $manager->flush();
    }
}
