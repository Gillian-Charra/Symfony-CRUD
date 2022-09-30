<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220930114145 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classe_competences (classe_id INT NOT NULL, competences_id INT NOT NULL, INDEX IDX_7739B56F8F5EA509 (classe_id), INDEX IDX_7739B56FA660B158 (competences_id), PRIMARY KEY(classe_id, competences_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classe_competences ADD CONSTRAINT FK_7739B56F8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe_competences ADD CONSTRAINT FK_7739B56FA660B158 FOREIGN KEY (competences_id) REFERENCES competences (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe ADD description LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe_competences DROP FOREIGN KEY FK_7739B56F8F5EA509');
        $this->addSql('ALTER TABLE classe_competences DROP FOREIGN KEY FK_7739B56FA660B158');
        $this->addSql('DROP TABLE classe_competences');
        $this->addSql('ALTER TABLE classe DROP description');
    }
}
