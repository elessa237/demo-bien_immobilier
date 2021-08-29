<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210829130834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE options (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE propriete (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, image VARCHAR(255) DEFAULT NULL, titre VARCHAR(255) NOT NULL, description CLOB NOT NULL, surface INTEGER NOT NULL, piece INTEGER NOT NULL, etage INTEGER NOT NULL, prix INTEGER NOT NULL, chauffage VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, vendu BOOLEAN NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL)');
        $this->addSql('CREATE TABLE propriete_options (propriete_id INTEGER NOT NULL, options_id INTEGER NOT NULL, PRIMARY KEY(propriete_id, options_id))');
        $this->addSql('CREATE INDEX IDX_6F9D1C3918566CAF ON propriete_options (propriete_id)');
        $this->addSql('CREATE INDEX IDX_6F9D1C393ADB05F1 ON propriete_options (options_id)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE options');
        $this->addSql('DROP TABLE propriete');
        $this->addSql('DROP TABLE propriete_options');
        $this->addSql('DROP TABLE user');
    }
}
