<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210607065139 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE autorzy (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(32) NOT NULL, last_name VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE czytelnik (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(32) NOT NULL, last_name VARCHAR(64) NOT NULL, address VARCHAR(255) NOT NULL, phone_number VARCHAR(9) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE egzemplarze (id INT AUTO_INCREMENT NOT NULL, ksiazka_id INT NOT NULL, wypozyczenia_id INT NOT NULL, INDEX IDX_5DFE150BF07709F (ksiazka_id), INDEX IDX_5DFE150C5E215A5 (wypozyczenia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kategorie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ksiazki (id INT AUTO_INCREMENT NOT NULL, iban VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, cover TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ksiazki_autorzy (ksiazki_id INT NOT NULL, autorzy_id INT NOT NULL, INDEX IDX_1C8F3B737AB35870 (ksiazki_id), INDEX IDX_1C8F3B7348C08554 (autorzy_id), PRIMARY KEY(ksiazki_id, autorzy_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ksiazki_kategorie (ksiazki_id INT NOT NULL, kategorie_id INT NOT NULL, INDEX IDX_72F14ECF7AB35870 (ksiazki_id), INDEX IDX_72F14ECFBAF991D3 (kategorie_id), PRIMARY KEY(ksiazki_id, kategorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wypozyczenia (id INT AUTO_INCREMENT NOT NULL, czytelnik_id INT NOT NULL, created_at DATE NOT NULL, INDEX IDX_62A2F48E9861D113 (czytelnik_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE egzemplarze ADD CONSTRAINT FK_5DFE150BF07709F FOREIGN KEY (ksiazka_id) REFERENCES ksiazki (id)');
        $this->addSql('ALTER TABLE egzemplarze ADD CONSTRAINT FK_5DFE150C5E215A5 FOREIGN KEY (wypozyczenia_id) REFERENCES wypozyczenia (id)');
        $this->addSql('ALTER TABLE ksiazki_autorzy ADD CONSTRAINT FK_1C8F3B737AB35870 FOREIGN KEY (ksiazki_id) REFERENCES ksiazki (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ksiazki_autorzy ADD CONSTRAINT FK_1C8F3B7348C08554 FOREIGN KEY (autorzy_id) REFERENCES autorzy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ksiazki_kategorie ADD CONSTRAINT FK_72F14ECF7AB35870 FOREIGN KEY (ksiazki_id) REFERENCES ksiazki (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ksiazki_kategorie ADD CONSTRAINT FK_72F14ECFBAF991D3 FOREIGN KEY (kategorie_id) REFERENCES kategorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wypozyczenia ADD CONSTRAINT FK_62A2F48E9861D113 FOREIGN KEY (czytelnik_id) REFERENCES czytelnik (id)');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(32) NOT NULL, last_name VARCHAR(64) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ksiazki_autorzy DROP FOREIGN KEY FK_1C8F3B7348C08554');
        $this->addSql('ALTER TABLE wypozyczenia DROP FOREIGN KEY FK_62A2F48E9861D113');
        $this->addSql('ALTER TABLE ksiazki_kategorie DROP FOREIGN KEY FK_72F14ECFBAF991D3');
        $this->addSql('ALTER TABLE egzemplarze DROP FOREIGN KEY FK_5DFE150BF07709F');
        $this->addSql('ALTER TABLE ksiazki_autorzy DROP FOREIGN KEY FK_1C8F3B737AB35870');
        $this->addSql('ALTER TABLE ksiazki_kategorie DROP FOREIGN KEY FK_72F14ECF7AB35870');
        $this->addSql('ALTER TABLE egzemplarze DROP FOREIGN KEY FK_5DFE150C5E215A5');
        $this->addSql('DROP TABLE autorzy');
        $this->addSql('DROP TABLE czytelnik');
        $this->addSql('DROP TABLE egzemplarze');
        $this->addSql('DROP TABLE kategorie');
        $this->addSql('DROP TABLE ksiazki');
        $this->addSql('DROP TABLE ksiazki_autorzy');
        $this->addSql('DROP TABLE ksiazki_kategorie');
        $this->addSql('DROP TABLE wypozyczenia');
        $this->addSql('DROP TABLE user');
    }
}
