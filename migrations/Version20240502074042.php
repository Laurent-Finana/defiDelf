<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240502074042 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add address and paid_employment on User table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD address VARCHAR(255) NOT NULL, ADD add_on_address VARCHAR(255) DEFAULT NULL, ADD postal_code VARCHAR(50) NOT NULL, ADD city VARCHAR(255) NOT NULL, ADD paid_employment TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP address, DROP add_on_address, DROP postal_code, DROP city, DROP paid_employment');
    }
}
