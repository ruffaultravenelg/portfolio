<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260218215929 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE production ADD COLUMN text CLOB NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__production AS SELECT id, title, short_description, url, tags, image FROM production');
        $this->addSql('DROP TABLE production');
        $this->addSql('CREATE TABLE production (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, short_description VARCHAR(1020) NOT NULL, url VARCHAR(255) DEFAULT NULL, tags VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO production (id, title, short_description, url, tags, image) SELECT id, title, short_description, url, tags, image FROM __temp__production');
        $this->addSql('DROP TABLE __temp__production');
    }
}
