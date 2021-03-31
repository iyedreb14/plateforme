<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210329130402 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, objet LONGTEXT DEFAULT NULL, date DATETIME NOT NULL, emetteur VARCHAR(255) NOT NULL, recepteur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cv (id INT AUTO_INCREMENT NOT NULL, idcandidat_id INT NOT NULL, formations VARCHAR(255) DEFAULT NULL, langues VARCHAR(254) DEFAULT NULL, diplome VARCHAR(254) DEFAULT NULL, profil LONGTEXT DEFAULT NULL, interets VARCHAR(255) DEFAULT NULL, competences VARCHAR(255) DEFAULT NULL, experience VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B66FFE92CE119B2D (idcandidat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE questions (id INT AUTO_INCREMENT NOT NULL, quizz_id INT NOT NULL, titre VARCHAR(255) DEFAULT NULL, choix LONGTEXT DEFAULT NULL, reponse LONGTEXT NOT NULL, INDEX IDX_8ADC54D5BA934BCD (quizz_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quizz (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, objet LONGTEXT DEFAULT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, date_debute DATETIME DEFAULT NULL, duree DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_utilisateurs (session_id INT NOT NULL, utilisateurs_id INT NOT NULL, INDEX IDX_87E68CDF613FECDF (session_id), INDEX IDX_87E68CDF1E969C5 (utilisateurs_id), PRIMARY KEY(session_id, utilisateurs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(100) DEFAULT NULL, password VARCHAR(100) DEFAULT NULL, nom VARCHAR(100) DEFAULT NULL, prenom VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cv ADD CONSTRAINT FK_B66FFE92CE119B2D FOREIGN KEY (idcandidat_id) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE questions ADD CONSTRAINT FK_8ADC54D5BA934BCD FOREIGN KEY (quizz_id) REFERENCES quizz (id)');
        $this->addSql('ALTER TABLE session_utilisateurs ADD CONSTRAINT FK_87E68CDF613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_utilisateurs ADD CONSTRAINT FK_87E68CDF1E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE questions DROP FOREIGN KEY FK_8ADC54D5BA934BCD');
        $this->addSql('ALTER TABLE session_utilisateurs DROP FOREIGN KEY FK_87E68CDF613FECDF');
        $this->addSql('ALTER TABLE cv DROP FOREIGN KEY FK_B66FFE92CE119B2D');
        $this->addSql('ALTER TABLE session_utilisateurs DROP FOREIGN KEY FK_87E68CDF1E969C5');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE cv');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE questions');
        $this->addSql('DROP TABLE quizz');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE session_utilisateurs');
        $this->addSql('DROP TABLE utilisateurs');
    }
}
