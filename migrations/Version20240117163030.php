<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240117163030 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cat (id INT AUTO_INCREMENT NOT NULL, cat_id INT DEFAULT NULL, num_icad VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, sex VARCHAR(255) NOT NULL, has_date_birth TINYINT(1) NOT NULL, date_birth DATE NOT NULL, desc_short VARCHAR(255) NOT NULL, desc_long LONGTEXT NOT NULL, race VARCHAR(80) DEFAULT NULL, UNIQUE INDEX UNIQ_9E5E43A8E6ADA943 (cat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cat ADD CONSTRAINT FK_9E5E43A8E6ADA943 FOREIGN KEY (cat_id) REFERENCES cat (id)');
        $this->addSql('DROP TABLE animal');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal (id INT AUTO_INCREMENT NOT NULL, num_icad VARCHAR(15) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, name VARCHAR(80) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, sex VARCHAR(7) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_birth DATE DEFAULT NULL, desc_long LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, has_date_birth TINYINT(1) NOT NULL, desc_short VARCHAR(200) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE cat DROP FOREIGN KEY FK_9E5E43A8E6ADA943');
        $this->addSql('DROP TABLE cat');
    }
}
