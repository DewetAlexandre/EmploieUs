<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220630101425 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, domaine VARCHAR(70) NOT NULL, date VARCHAR(30) NOT NULL, salaire DOUBLE PRECISION NOT NULL, duree VARCHAR(30) NOT NULL, descriptif VARCHAR(800) NOT NULL, titre VARCHAR(50) NOT NULL, type VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidat (id INT AUTO_INCREMENT NOT NULL, annonce_id INT DEFAULT NULL, nom VARCHAR(25) NOT NULL, prenom VARCHAR(25) NOT NULL, genre VARCHAR(15) NOT NULL, datenaissance VARCHAR(30) NOT NULL, adresse VARCHAR(50) NOT NULL, mail VARCHAR(30) NOT NULL, motdepasse VARCHAR(20) NOT NULL, tel VARCHAR(20) NOT NULL, cv VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_6AB5B4718805AB2F (annonce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, siret VARCHAR(50) NOT NULL, mail VARCHAR(50) NOT NULL, motdepasse VARCHAR(30) NOT NULL, domaine VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, candidat_id INT NOT NULL, entreprise_id INT NOT NULL, date VARCHAR(30) NOT NULL, contenu VARCHAR(800) NOT NULL, titre VARCHAR(50) NOT NULL, INDEX IDX_B6BD307F8D0EB82 (candidat_id), INDEX IDX_B6BD307FA4AEAFEA (entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B4718805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F8D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B4718805AB2F');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F8D0EB82');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FA4AEAFEA');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE candidat');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
