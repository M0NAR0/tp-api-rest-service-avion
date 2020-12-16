<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201216095213 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE flight (id INT AUTO_INCREMENT NOT NULL, plane_id INT NOT NULL, departure_point_id INT NOT NULL, arrival_point_id INT NOT NULL, departure_date DATETIME NOT NULL, price NUMERIC(5, 2) NOT NULL, INDEX IDX_C257E60EF53666A8 (plane_id), INDEX IDX_C257E60E7C546AFF (departure_point_id), INDEX IDX_C257E60ECE388D5E (arrival_point_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, flight_id INT NOT NULL, payment_date DATETIME NOT NULL, amount NUMERIC(6, 2) NOT NULL, seats INT NOT NULL, INDEX IDX_42C8495591F478C5 (flight_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60EF53666A8 FOREIGN KEY (plane_id) REFERENCES plane (id)');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60E7C546AFF FOREIGN KEY (departure_point_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60ECE388D5E FOREIGN KEY (arrival_point_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495591F478C5 FOREIGN KEY (flight_id) REFERENCES flight (id)');
        $this->addSql('DROP TABLE company');
        $this->addSql('ALTER TABLE plane ADD label VARCHAR(255) NOT NULL, DROP starting_point, DROP arrival_point, DROP departure_date, DROP price, DROP name');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495591F478C5');
        $this->addSql('ALTER TABLE flight DROP FOREIGN KEY FK_C257E60E7C546AFF');
        $this->addSql('ALTER TABLE flight DROP FOREIGN KEY FK_C257E60ECE388D5E');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, capital NUMERIC(10, 2) NOT NULL, transaction_date DATETIME NOT NULL, transaction_amount NUMERIC(7, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE flight');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('ALTER TABLE plane ADD arrival_point VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD departure_date DATE NOT NULL, ADD price NUMERIC(5, 2) NOT NULL, ADD name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE label starting_point VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
