<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240305134358 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Modification table planning en type string au lieu de datetime';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planning CHANGE delf_a1 delf_a1 VARCHAR(255) DEFAULT NULL, CHANGE delf_a2 delf_a2 VARCHAR(255) DEFAULT NULL, CHANGE delf_b1 delf_b1 VARCHAR(255) DEFAULT NULL, CHANGE delf_b2 delf_b2 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planning CHANGE delf_a1 delf_a1 DATE DEFAULT NULL, CHANGE delf_a2 delf_a2 DATE DEFAULT NULL, CHANGE delf_b1 delf_b1 DATE DEFAULT NULL, CHANGE delf_b2 delf_b2 DATE DEFAULT NULL');
    }
}
