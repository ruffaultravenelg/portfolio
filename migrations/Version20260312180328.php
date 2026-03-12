<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260312180328 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE timeline_item ADD COLUMN position INTEGER DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__timeline_item AS SELECT id, title, date, description, timeline_id FROM timeline_item');
        $this->addSql('DROP TABLE timeline_item');
        $this->addSql('CREATE TABLE timeline_item (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, date VARCHAR(255) NOT NULL, description VARCHAR(1020) NOT NULL, timeline_id INTEGER NOT NULL, CONSTRAINT FK_1E13D06BEDBEDD37 FOREIGN KEY (timeline_id) REFERENCES timeline (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO timeline_item (id, title, date, description, timeline_id) SELECT id, title, date, description, timeline_id FROM __temp__timeline_item');
        $this->addSql('DROP TABLE __temp__timeline_item');
        $this->addSql('CREATE INDEX IDX_1E13D06BEDBEDD37 ON timeline_item (timeline_id)');
    }
}
