<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240116194701 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE openning_garage (id INT AUTO_INCREMENT NOT NULL, garage_id INT NOT NULL, openingday VARCHAR(10) NOT NULL, openinghourmorning INT NOT NULL, closinghourmorning INT NOT NULL, openinghourafternoon INT NOT NULL, closinghourafternoon INT NOT NULL, INDEX IDX_6313D861C4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE openning_garage ADD CONSTRAINT FK_6313D861C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('ALTER TABLE openninggarage DROP FOREIGN KEY FK_992F9BCCC4FFF555');
        $this->addSql('DROP TABLE openninggarage');
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D1429879E2C');
        $this->addSql('DROP INDEX IDX_95C71D1429879E2C ON cars');
        $this->addSql('ALTER TABLE cars CHANGE fuels_id fuel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D1497C79677 FOREIGN KEY (fuel_id) REFERENCES fuels (id)');
        $this->addSql('CREATE INDEX IDX_95C71D1497C79677 ON cars (fuel_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE openninggarage (id INT AUTO_INCREMENT NOT NULL, garage_id INT NOT NULL, openingday VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, openinghourmorning INT NOT NULL, closinghourmorning INT NOT NULL, openinghourafternoon INT NOT NULL, closinghourafternoon INT NOT NULL, INDEX IDX_992F9BCCC4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE openninggarage ADD CONSTRAINT FK_992F9BCCC4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('ALTER TABLE openning_garage DROP FOREIGN KEY FK_6313D861C4FFF555');
        $this->addSql('DROP TABLE openning_garage');
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D1497C79677');
        $this->addSql('DROP INDEX IDX_95C71D1497C79677 ON cars');
        $this->addSql('ALTER TABLE cars CHANGE fuel_id fuels_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D1429879E2C FOREIGN KEY (fuels_id) REFERENCES options (id)');
        $this->addSql('CREATE INDEX IDX_95C71D1429879E2C ON cars (fuels_id)');
    }
}
