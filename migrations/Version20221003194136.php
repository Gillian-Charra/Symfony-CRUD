<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221003194136 extends AbstractMigration
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
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, base_att INT NOT NULL, base_def INT NOT NULL, base_pv INT NOT NULL, base_vit INT NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe_competences (classe_id INT NOT NULL, competences_id INT NOT NULL, INDEX IDX_7739B56F8F5EA509 (classe_id), INDEX IDX_7739B56FA660B158 (competences_id), PRIMARY KEY(classe_id, competences_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competences (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_DB2077CEC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE couvre_chef (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, flat_att INT NOT NULL, flat_def INT NOT NULL, flat_pv INT NOT NULL, flat_vit INT NOT NULL, mult_att INT NOT NULL, mult_def INT NOT NULL, mult_vit INT NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE heros (id INT AUTO_INCREMENT NOT NULL, classe_id INT NOT NULL, couvre_chef_id INT DEFAULT NULL, bras_id INT DEFAULT NULL, torse_id INT DEFAULT NULL, jambes_id INT DEFAULT NULL, pieds_id INT DEFAULT NULL, armes_id INT DEFAULT NULL, monture_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, avatar VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, date_de_naissance DATE NOT NULL, att INT NOT NULL, def INT NOT NULL, pv INT NOT NULL, vit INT NOT NULL, niveau INT NOT NULL, experience INT NOT NULL, fonds INT NOT NULL, att_avec_equipement INT NOT NULL, def_avec_equipement INT NOT NULL, pv_avec_equipement INT NOT NULL, vit_avec_equipement INT NOT NULL, INDEX IDX_1F8427708F5EA509 (classe_id), INDEX IDX_1F84277042D255A1 (couvre_chef_id), INDEX IDX_1F842770837763D5 (bras_id), INDEX IDX_1F8427705DA651C9 (torse_id), INDEX IDX_1F8427702D00D7A8 (jambes_id), INDEX IDX_1F84277035D1BFB (pieds_id), INDEX IDX_1F8427707A649A7 (armes_id), INDEX IDX_1F842770D40ADBBC (monture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jambes (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, flat_att INT NOT NULL, flat_def INT NOT NULL, flat_pv INT NOT NULL, flat_vit INT NOT NULL, mult_att INT NOT NULL, mult_def INT NOT NULL, mult_pv INT NOT NULL, mult_vit INT NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monture (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, flat_att INT NOT NULL, flat_def INT NOT NULL, flat_pv INT NOT NULL, flat_vit INT NOT NULL, mult_att INT NOT NULL, mult_def INT NOT NULL, mult_pv INT NOT NULL, mult_vit INT NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pieds (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, flat_att INT NOT NULL, flat_def INT NOT NULL, flat_pv INT NOT NULL, flat_vit INT NOT NULL, mult_att INT NOT NULL, mult_def INT NOT NULL, mult_pv INT NOT NULL, mult_vit INT NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE torse (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, flat_att INT NOT NULL, flat_def INT NOT NULL, flat_pv INT NOT NULL, flat_vit INT NOT NULL, mult_att INT NOT NULL, mult_def INT NOT NULL, mult_pv INT NOT NULL, mult_vit INT NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classe_competences ADD CONSTRAINT FK_7739B56F8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe_competences ADD CONSTRAINT FK_7739B56FA660B158 FOREIGN KEY (competences_id) REFERENCES competences (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competences ADD CONSTRAINT FK_DB2077CEC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE heros ADD CONSTRAINT FK_1F8427708F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE heros ADD CONSTRAINT FK_1F84277042D255A1 FOREIGN KEY (couvre_chef_id) REFERENCES couvre_chef (id)');
        $this->addSql('ALTER TABLE heros ADD CONSTRAINT FK_1F842770837763D5 FOREIGN KEY (bras_id) REFERENCES bras (id)');
        $this->addSql('ALTER TABLE heros ADD CONSTRAINT FK_1F8427705DA651C9 FOREIGN KEY (torse_id) REFERENCES torse (id)');
        $this->addSql('ALTER TABLE heros ADD CONSTRAINT FK_1F8427702D00D7A8 FOREIGN KEY (jambes_id) REFERENCES jambes (id)');
        $this->addSql('ALTER TABLE heros ADD CONSTRAINT FK_1F84277035D1BFB FOREIGN KEY (pieds_id) REFERENCES pieds (id)');
        $this->addSql('ALTER TABLE heros ADD CONSTRAINT FK_1F8427707A649A7 FOREIGN KEY (armes_id) REFERENCES armes (id)');
        $this->addSql('ALTER TABLE heros ADD CONSTRAINT FK_1F842770D40ADBBC FOREIGN KEY (monture_id) REFERENCES monture (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe_competences DROP FOREIGN KEY FK_7739B56F8F5EA509');
        $this->addSql('ALTER TABLE classe_competences DROP FOREIGN KEY FK_7739B56FA660B158');
        $this->addSql('ALTER TABLE competences DROP FOREIGN KEY FK_DB2077CEC54C8C93');
        $this->addSql('ALTER TABLE heros DROP FOREIGN KEY FK_1F8427708F5EA509');
        $this->addSql('ALTER TABLE heros DROP FOREIGN KEY FK_1F84277042D255A1');
        $this->addSql('ALTER TABLE heros DROP FOREIGN KEY FK_1F842770837763D5');
        $this->addSql('ALTER TABLE heros DROP FOREIGN KEY FK_1F8427705DA651C9');
        $this->addSql('ALTER TABLE heros DROP FOREIGN KEY FK_1F8427702D00D7A8');
        $this->addSql('ALTER TABLE heros DROP FOREIGN KEY FK_1F84277035D1BFB');
        $this->addSql('ALTER TABLE heros DROP FOREIGN KEY FK_1F8427707A649A7');
        $this->addSql('ALTER TABLE heros DROP FOREIGN KEY FK_1F842770D40ADBBC');
        $this->addSql('DROP TABLE armes');
        $this->addSql('DROP TABLE bras');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE classe_competences');
        $this->addSql('DROP TABLE competences');
        $this->addSql('DROP TABLE couvre_chef');
        $this->addSql('DROP TABLE heros');
        $this->addSql('DROP TABLE jambes');
        $this->addSql('DROP TABLE monture');
        $this->addSql('DROP TABLE pieds');
        $this->addSql('DROP TABLE torse');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
