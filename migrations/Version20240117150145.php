<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240117150145 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal ADD has_date_birth TINYINT(1) NOT NULL, ADD desc_short VARCHAR(200) DEFAULT NULL, CHANGE name name VARCHAR(80) NOT NULL, CHANGE date_naissance date_birth DATE DEFAULT NULL, CHANGE description desc_long LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal DROP has_date_birth, DROP desc_short, CHANGE name name VARCHAR(80) DEFAULT NULL, CHANGE date_birth date_naissance DATE DEFAULT NULL, CHANGE desc_long description LONGTEXT DEFAULT NULL');
    }
}
