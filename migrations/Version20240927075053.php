<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240927075053 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contacts (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, phone_number VARCHAR(20) DEFAULT NULL, email VARCHAR(100) DEFAULT NULL, tax_number VARCHAR(20) DEFAULT NULL, company_name VARCHAR(100) DEFAULT NULL, postal_code VARCHAR(10) DEFAULT NULL, city VARCHAR(100) DEFAULT NULL, street VARCHAR(100) DEFAULT NULL, house_number VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicles (id INT AUTO_INCREMENT NOT NULL, contact_id INT DEFAULT NULL, license_plate VARCHAR(10) NOT NULL, brand_model VARCHAR(100) NOT NULL, chassis_number VARCHAR(50) NOT NULL, engine_code VARCHAR(50) NOT NULL, manufacture_year INT NOT NULL, engine_capacity INT DEFAULT NULL, fuel_type VARCHAR(20) DEFAULT NULL, technical_validity DATE DEFAULT NULL, notes LONGTEXT DEFAULT NULL, INDEX IDX_1FCE69FAE7A1254A (contact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vehicles ADD CONSTRAINT FK_1FCE69FAE7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicles DROP FOREIGN KEY FK_1FCE69FAE7A1254A');
        $this->addSql('DROP TABLE contacts');
        $this->addSql('DROP TABLE vehicles');
    }
}
