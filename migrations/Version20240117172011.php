<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240117172011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cat DROP FOREIGN KEY FK_9E5E43A8E6ADA943');
        $this->addSql('DROP INDEX UNIQ_9E5E43A8E6ADA943 ON cat');
        $this->addSql('ALTER TABLE cat DROP cat_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cat ADD cat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cat ADD CONSTRAINT FK_9E5E43A8E6ADA943 FOREIGN KEY (cat_id) REFERENCES cat (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9E5E43A8E6ADA943 ON cat (cat_id)');
    }
}
