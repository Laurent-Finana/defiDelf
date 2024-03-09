<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240309103030 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Relation ManyToMany entre Category et Course';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_course (category_id INT NOT NULL, course_id INT NOT NULL, INDEX IDX_1976A5C212469DE2 (category_id), INDEX IDX_1976A5C2591CC992 (course_id), PRIMARY KEY(category_id, course_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_course ADD CONSTRAINT FK_1976A5C212469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_course ADD CONSTRAINT FK_1976A5C2591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_course DROP FOREIGN KEY FK_1976A5C212469DE2');
        $this->addSql('ALTER TABLE category_course DROP FOREIGN KEY FK_1976A5C2591CC992');
        $this->addSql('DROP TABLE category_course');
    }
}
