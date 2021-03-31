<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210329130120 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact ADD emetteur VARCHAR(255) NOT NULL, ADD recepteur VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE cv ADD profil LONGTEXT DEFAULT NULL, ADD interets VARCHAR(255) DEFAULT NULL, ADD competences VARCHAR(255) DEFAULT NULL, ADD experience VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact DROP emetteur, DROP recepteur');
        $this->addSql('ALTER TABLE cv DROP profil, DROP interets, DROP competences, DROP experience');
    }
}
