<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210820203251 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE propriete_options (propriete_id INTEGER NOT NULL, options_id INTEGER NOT NULL, PRIMARY KEY(propriete_id, options_id))');
        $this->addSql('CREATE INDEX IDX_6F9D1C3918566CAF ON propriete_options (propriete_id)');
        $this->addSql('CREATE INDEX IDX_6F9D1C393ADB05F1 ON propriete_options (options_id)');
        $this->addSql('DROP TABLE options_propriete');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE options_propriete (options_id INTEGER NOT NULL, propriete_id INTEGER NOT NULL, PRIMARY KEY(options_id, propriete_id))');
        $this->addSql('CREATE INDEX IDX_5FDBFFAE18566CAF ON options_propriete (propriete_id)');
        $this->addSql('CREATE INDEX IDX_5FDBFFAE3ADB05F1 ON options_propriete (options_id)');
        $this->addSql('DROP TABLE propriete_options');
    }
}
