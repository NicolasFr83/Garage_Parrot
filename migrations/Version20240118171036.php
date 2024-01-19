<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240118171036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE form_contact CHANGE phone_number phone_number VARCHAR(12) NOT NULL');
        $this->addSql('ALTER TABLE garage CHANGE phonenumber phonenumber VARCHAR(15) NOT NULL');
        $this->addSql('ALTER TABLE openning_garage CHANGE openinghourmorning openinghourmorning VARCHAR(2) NOT NULL, CHANGE closinghourmorning closinghourmorning VARCHAR(2) NOT NULL, CHANGE openinghourafternoon openinghourafternoon VARCHAR(2) NOT NULL, CHANGE closinghourafternoon closinghourafternoon VARCHAR(2) NOT NULL');
        $this->addSql('ALTER TABLE opinions CHANGE score score VARCHAR(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE form_contact CHANGE phone_number phone_number INT NOT NULL');
        $this->addSql('ALTER TABLE garage CHANGE phonenumber phonenumber INT NOT NULL');
        $this->addSql('ALTER TABLE openning_garage CHANGE openinghourmorning openinghourmorning INT NOT NULL, CHANGE closinghourmorning closinghourmorning INT NOT NULL, CHANGE openinghourafternoon openinghourafternoon INT NOT NULL, CHANGE closinghourafternoon closinghourafternoon INT NOT NULL');
        $this->addSql('ALTER TABLE opinions CHANGE score score INT NOT NULL');
    }
}
