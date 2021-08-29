<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210829145347 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__propriete AS SELECT id, image, titre, description, surface, piece, etage, prix, chauffage, ville, adresse, code_postal, vendu, created_at, updated_at FROM propriete');
        $this->addSql('DROP TABLE propriete');
        $this->addSql('CREATE TABLE propriete (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, image VARCHAR(255) DEFAULT NULL COLLATE BINARY, titre VARCHAR(255) NOT NULL COLLATE BINARY, description CLOB NOT NULL COLLATE BINARY, surface INTEGER NOT NULL, piece INTEGER NOT NULL, etage INTEGER NOT NULL, prix INTEGER NOT NULL, chauffage VARCHAR(255) NOT NULL COLLATE BINARY, ville VARCHAR(255) NOT NULL COLLATE BINARY, adresse VARCHAR(255) NOT NULL COLLATE BINARY, code_postal VARCHAR(255) NOT NULL COLLATE BINARY, vendu BOOLEAN NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO propriete (id, image, titre, description, surface, piece, etage, prix, chauffage, ville, adresse, code_postal, vendu, created_at, updated_at) SELECT id, image, titre, description, surface, piece, etage, prix, chauffage, ville, adresse, code_postal, vendu, created_at, updated_at FROM __temp__propriete');
        $this->addSql('DROP TABLE __temp__propriete');
        $this->addSql('DROP INDEX IDX_6F9D1C393ADB05F1');
        $this->addSql('DROP INDEX IDX_6F9D1C3918566CAF');
        $this->addSql('CREATE TEMPORARY TABLE __temp__propriete_options AS SELECT propriete_id, options_id FROM propriete_options');
        $this->addSql('DROP TABLE propriete_options');
        $this->addSql('CREATE TABLE propriete_options (propriete_id INTEGER NOT NULL, options_id INTEGER NOT NULL, PRIMARY KEY(propriete_id, options_id), CONSTRAINT FK_6F9D1C3918566CAF FOREIGN KEY (propriete_id) REFERENCES propriete (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_6F9D1C393ADB05F1 FOREIGN KEY (options_id) REFERENCES options (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO propriete_options (propriete_id, options_id) SELECT propriete_id, options_id FROM __temp__propriete_options');
        $this->addSql('DROP TABLE __temp__propriete_options');
        $this->addSql('CREATE INDEX IDX_6F9D1C393ADB05F1 ON propriete_options (options_id)');
        $this->addSql('CREATE INDEX IDX_6F9D1C3918566CAF ON propriete_options (propriete_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__propriete AS SELECT id, image, titre, description, surface, piece, etage, prix, chauffage, ville, adresse, code_postal, vendu, created_at, updated_at FROM propriete');
        $this->addSql('DROP TABLE propriete');
        $this->addSql('CREATE TABLE propriete (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, image VARCHAR(255) DEFAULT NULL, titre VARCHAR(255) NOT NULL, description CLOB NOT NULL, surface INTEGER NOT NULL, piece INTEGER NOT NULL, etage INTEGER NOT NULL, prix INTEGER NOT NULL, chauffage VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, vendu BOOLEAN NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL)');
        $this->addSql('INSERT INTO propriete (id, image, titre, description, surface, piece, etage, prix, chauffage, ville, adresse, code_postal, vendu, created_at, updated_at) SELECT id, image, titre, description, surface, piece, etage, prix, chauffage, ville, adresse, code_postal, vendu, created_at, updated_at FROM __temp__propriete');
        $this->addSql('DROP TABLE __temp__propriete');
        $this->addSql('DROP INDEX IDX_6F9D1C3918566CAF');
        $this->addSql('DROP INDEX IDX_6F9D1C393ADB05F1');
        $this->addSql('CREATE TEMPORARY TABLE __temp__propriete_options AS SELECT propriete_id, options_id FROM propriete_options');
        $this->addSql('DROP TABLE propriete_options');
        $this->addSql('CREATE TABLE propriete_options (propriete_id INTEGER NOT NULL, options_id INTEGER NOT NULL, PRIMARY KEY(propriete_id, options_id))');
        $this->addSql('INSERT INTO propriete_options (propriete_id, options_id) SELECT propriete_id, options_id FROM __temp__propriete_options');
        $this->addSql('DROP TABLE __temp__propriete_options');
        $this->addSql('CREATE INDEX IDX_6F9D1C3918566CAF ON propriete_options (propriete_id)');
        $this->addSql('CREATE INDEX IDX_6F9D1C393ADB05F1 ON propriete_options (options_id)');
    }
}
