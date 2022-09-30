<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220930084244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE heros ADD fonds INT NOT NULL, ADD att_avec_equipement INT NOT NULL, ADD def_avec_equipement INT NOT NULL, ADD pv_avec_equipement INT NOT NULL, ADD vit_avec_equipement INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE heros DROP fonds, DROP att_avec_equipement, DROP def_avec_equipement, DROP pv_avec_equipement, DROP vit_avec_equipement');
    }
}
