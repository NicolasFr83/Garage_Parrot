<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240118181250 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE openning_garage CHANGE openinghourmorning openinghourmorning VARCHAR(5) NOT NULL, CHANGE closinghourmorning closinghourmorning VARCHAR(5) NOT NULL, CHANGE openinghourafternoon openinghourafternoon VARCHAR(5) NOT NULL, CHANGE closinghourafternoon closinghourafternoon VARCHAR(5) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE openning_garage CHANGE openinghourmorning openinghourmorning VARCHAR(2) NOT NULL, CHANGE closinghourmorning closinghourmorning VARCHAR(2) NOT NULL, CHANGE openinghourafternoon openinghourafternoon VARCHAR(2) NOT NULL, CHANGE closinghourafternoon closinghourafternoon VARCHAR(2) NOT NULL');
    }
}
