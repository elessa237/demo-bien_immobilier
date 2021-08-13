<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210813120619 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__propriete AS SELECT id, titre, description, surface, chambre, etage, prix, chauffage, ville, adresse, code_postal, vendu, created_at FROM propriete');
        $this->addSql('DROP TABLE propriete');
        $this->addSql('CREATE TABLE propriete (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL COLLATE BINARY, description CLOB NOT NULL COLLATE BINARY, surface INTEGER NOT NULL, chambre INTEGER NOT NULL, etage INTEGER NOT NULL, prix INTEGER NOT NULL, ville VARCHAR(255) NOT NULL COLLATE BINARY, adresse VARCHAR(255) NOT NULL COLLATE BINARY, code_postal VARCHAR(255) NOT NULL COLLATE BINARY, vendu BOOLEAN NOT NULL, created_at DATETIME NOT NULL, chauffage VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO propriete (id, titre, description, surface, chambre, etage, prix, chauffage, ville, adresse, code_postal, vendu, created_at) SELECT id, titre, description, surface, chambre, etage, prix, chauffage, ville, adresse, code_postal, vendu, created_at FROM __temp__propriete');
        $this->addSql('DROP TABLE __temp__propriete');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__propriete AS SELECT id, titre, description, surface, chambre, etage, prix, chauffage, ville, adresse, code_postal, vendu, created_at FROM propriete');
        $this->addSql('DROP TABLE propriete');
        $this->addSql('CREATE TABLE propriete (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description CLOB NOT NULL, surface INTEGER NOT NULL, chambre INTEGER NOT NULL, etage INTEGER NOT NULL, prix INTEGER NOT NULL, ville VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, vendu BOOLEAN NOT NULL, created_at DATETIME NOT NULL, chauffage INTEGER NOT NULL)');
        $this->addSql('INSERT INTO propriete (id, titre, description, surface, chambre, etage, prix, chauffage, ville, adresse, code_postal, vendu, created_at) SELECT id, titre, description, surface, chambre, etage, prix, chauffage, ville, adresse, code_postal, vendu, created_at FROM __temp__propriete');
        $this->addSql('DROP TABLE __temp__propriete');
    }
}
