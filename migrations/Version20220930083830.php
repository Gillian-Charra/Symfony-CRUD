<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220930083830 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE armes (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, flat_att INT NOT NULL, flat_def INT NOT NULL, flat_pv INT NOT NULL, flat_vit INT NOT NULL, mult_att INT NOT NULL, mult_def INT NOT NULL, mult_pv INT NOT NULL, mult_vit INT NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bras (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, flat_att INT NOT NULL, flat_def INT NOT NULL, flat_pv INT NOT NULL, flat_vit INT NOT NULL, mult_att INT NOT NULL, mult_def INT NOT NULL, mult_pv INT NOT NULL, mult_vit INT NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE couvre_chef (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, flat_att INT NOT NULL, flat_def INT NOT NULL, flat_pv INT NOT NULL, flat_vit INT NOT NULL, mult_att INT NOT NULL, mult_def INT NOT NULL, mult_vit INT NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jambes (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, flat_att INT NOT NULL, flat_def INT NOT NULL, flat_pv INT NOT NULL, flat_vit INT NOT NULL, mult_att INT NOT NULL, mult_def INT NOT NULL, mult_pv INT NOT NULL, mult_vit INT NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monture (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, flat_att INT NOT NULL, flat_def INT NOT NULL, flat_pv INT NOT NULL, flat_vit INT NOT NULL, mult_att INT NOT NULL, mult_def INT NOT NULL, mult_pv INT NOT NULL, mult_vit INT NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pieds (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, flat_att INT NOT NULL, flat_def INT NOT NULL, flat_pv INT NOT NULL, flat_vit INT NOT NULL, mult_att INT NOT NULL, mult_def INT NOT NULL, mult_pv INT NOT NULL, mult_vit INT NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE torse (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, flat_att INT NOT NULL, flat_def INT NOT NULL, flat_pv INT NOT NULL, flat_vit INT NOT NULL, mult_att INT NOT NULL, mult_def INT NOT NULL, mult_pv INT NOT NULL, mult_vit INT NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE objets DROP FOREIGN KEY FK_334ABAD9C4598A51');
        $this->addSql('ALTER TABLE objets DROP FOREIGN KEY FK_334ABAD9C54C8C93');
        $this->addSql('DROP TABLE emplacements_objets');
        $this->addSql('DROP TABLE objets');
        $this->addSql('ALTER TABLE heros ADD couvre_chef_id INT DEFAULT NULL, ADD bras_id INT DEFAULT NULL, ADD torse_id INT DEFAULT NULL, ADD jambes_id INT DEFAULT NULL, ADD pieds_id INT DEFAULT NULL, ADD armes_id INT DEFAULT NULL, ADD monture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE heros ADD CONSTRAINT FK_1F84277042D255A1 FOREIGN KEY (couvre_chef_id) REFERENCES couvre_chef (id)');
        $this->addSql('ALTER TABLE heros ADD CONSTRAINT FK_1F842770837763D5 FOREIGN KEY (bras_id) REFERENCES bras (id)');
        $this->addSql('ALTER TABLE heros ADD CONSTRAINT FK_1F8427705DA651C9 FOREIGN KEY (torse_id) REFERENCES torse (id)');
        $this->addSql('ALTER TABLE heros ADD CONSTRAINT FK_1F8427702D00D7A8 FOREIGN KEY (jambes_id) REFERENCES jambes (id)');
        $this->addSql('ALTER TABLE heros ADD CONSTRAINT FK_1F84277035D1BFB FOREIGN KEY (pieds_id) REFERENCES pieds (id)');
        $this->addSql('ALTER TABLE heros ADD CONSTRAINT FK_1F8427707A649A7 FOREIGN KEY (armes_id) REFERENCES armes (id)');
        $this->addSql('ALTER TABLE heros ADD CONSTRAINT FK_1F842770D40ADBBC FOREIGN KEY (monture_id) REFERENCES monture (id)');
        $this->addSql('CREATE INDEX IDX_1F84277042D255A1 ON heros (couvre_chef_id)');
        $this->addSql('CREATE INDEX IDX_1F842770837763D5 ON heros (bras_id)');
        $this->addSql('CREATE INDEX IDX_1F8427705DA651C9 ON heros (torse_id)');
        $this->addSql('CREATE INDEX IDX_1F8427702D00D7A8 ON heros (jambes_id)');
        $this->addSql('CREATE INDEX IDX_1F84277035D1BFB ON heros (pieds_id)');
        $this->addSql('CREATE INDEX IDX_1F8427707A649A7 ON heros (armes_id)');
        $this->addSql('CREATE INDEX IDX_1F842770D40ADBBC ON heros (monture_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE heros DROP FOREIGN KEY FK_1F8427707A649A7');
        $this->addSql('ALTER TABLE heros DROP FOREIGN KEY FK_1F842770837763D5');
        $this->addSql('ALTER TABLE heros DROP FOREIGN KEY FK_1F84277042D255A1');
        $this->addSql('ALTER TABLE heros DROP FOREIGN KEY FK_1F8427702D00D7A8');
        $this->addSql('ALTER TABLE heros DROP FOREIGN KEY FK_1F842770D40ADBBC');
        $this->addSql('ALTER TABLE heros DROP FOREIGN KEY FK_1F84277035D1BFB');
        $this->addSql('ALTER TABLE heros DROP FOREIGN KEY FK_1F8427705DA651C9');
        $this->addSql('CREATE TABLE emplacements_objets (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE objets (id INT AUTO_INCREMENT NOT NULL, emplacement_id INT NOT NULL, type_id INT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_334ABAD9C4598A51 (emplacement_id), INDEX IDX_334ABAD9C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE objets ADD CONSTRAINT FK_334ABAD9C4598A51 FOREIGN KEY (emplacement_id) REFERENCES emplacements_objets (id)');
        $this->addSql('ALTER TABLE objets ADD CONSTRAINT FK_334ABAD9C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('DROP TABLE armes');
        $this->addSql('DROP TABLE bras');
        $this->addSql('DROP TABLE couvre_chef');
        $this->addSql('DROP TABLE jambes');
        $this->addSql('DROP TABLE monture');
        $this->addSql('DROP TABLE pieds');
        $this->addSql('DROP TABLE torse');
        $this->addSql('DROP INDEX IDX_1F84277042D255A1 ON heros');
        $this->addSql('DROP INDEX IDX_1F842770837763D5 ON heros');
        $this->addSql('DROP INDEX IDX_1F8427705DA651C9 ON heros');
        $this->addSql('DROP INDEX IDX_1F8427702D00D7A8 ON heros');
        $this->addSql('DROP INDEX IDX_1F84277035D1BFB ON heros');
        $this->addSql('DROP INDEX IDX_1F8427707A649A7 ON heros');
        $this->addSql('DROP INDEX IDX_1F842770D40ADBBC ON heros');
        $this->addSql('ALTER TABLE heros DROP couvre_chef_id, DROP bras_id, DROP torse_id, DROP jambes_id, DROP pieds_id, DROP armes_id, DROP monture_id');
    }
}
