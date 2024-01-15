<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240115195318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE brands (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cars (id INT AUTO_INCREMENT NOT NULL, brand_id INT DEFAULT NULL, fuels_id INT DEFAULT NULL, price INT NOT NULL, image_name VARCHAR(255) NOT NULL, years INT NOT NULL, kilometers INT NOT NULL, car_presentation_text VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_95C71D1444F5D008 (brand_id), INDEX IDX_95C71D1429879E2C (fuels_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cars_options (cars_id INT NOT NULL, options_id INT NOT NULL, INDEX IDX_4F8E5F498702F506 (cars_id), INDEX IDX_4F8E5F493ADB05F1 (options_id), PRIMARY KEY(cars_id, options_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cars_page (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, car_presentation_text LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_page (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, text_presentation LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE form_contact (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, first_name VARCHAR(50) NOT NULL, email VARCHAR(180) NOT NULL, phone_number INT NOT NULL, subject VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fuels (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE garage (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(25) NOT NULL, email VARCHAR(180) NOT NULL, phonenumber INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE home_page (id INT AUTO_INCREMENT NOT NULL, page_title VARCHAR(255) NOT NULL, welcome_text LONGTEXT NOT NULL, repair_section_title VARCHAR(255) NOT NULL, repair_section_text LONGTEXT NOT NULL, used_cars_section_title VARCHAR(255) NOT NULL, used_cars_section_text LONGTEXT NOT NULL, opinions_section_title VARCHAR(255) NOT NULL, opinions_section_text LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE models (id INT AUTO_INCREMENT NOT NULL, brands_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, INDEX IDX_E4D63009E9EEC0C7 (brands_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE openninggarage (id INT AUTO_INCREMENT NOT NULL, garage_id INT NOT NULL, openingday VARCHAR(10) NOT NULL, openinghourmorning INT NOT NULL, closinghourmorning INT NOT NULL, openinghourafternoon INT NOT NULL, closinghourafternoon INT NOT NULL, INDEX IDX_992F9BCCC4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opinion_page (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, presentation_text LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opinions (id INT AUTO_INCREMENT NOT NULL, garage_id INT NOT NULL, name VARCHAR(50) NOT NULL, comment LONGTEXT NOT NULL, score INT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_BEAF78D0C4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE options (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE types (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, name VARCHAR(50) NOT NULL, firstname VARCHAR(50) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D1444F5D008 FOREIGN KEY (brand_id) REFERENCES brands (id)');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D1429879E2C FOREIGN KEY (fuels_id) REFERENCES options (id)');
        $this->addSql('ALTER TABLE cars_options ADD CONSTRAINT FK_4F8E5F498702F506 FOREIGN KEY (cars_id) REFERENCES cars (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cars_options ADD CONSTRAINT FK_4F8E5F493ADB05F1 FOREIGN KEY (options_id) REFERENCES options (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE models ADD CONSTRAINT FK_E4D63009E9EEC0C7 FOREIGN KEY (brands_id) REFERENCES brands (id)');
        $this->addSql('ALTER TABLE openninggarage ADD CONSTRAINT FK_992F9BCCC4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('ALTER TABLE opinions ADD CONSTRAINT FK_BEAF78D0C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D1444F5D008');
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D1429879E2C');
        $this->addSql('ALTER TABLE cars_options DROP FOREIGN KEY FK_4F8E5F498702F506');
        $this->addSql('ALTER TABLE cars_options DROP FOREIGN KEY FK_4F8E5F493ADB05F1');
        $this->addSql('ALTER TABLE models DROP FOREIGN KEY FK_E4D63009E9EEC0C7');
        $this->addSql('ALTER TABLE openninggarage DROP FOREIGN KEY FK_992F9BCCC4FFF555');
        $this->addSql('ALTER TABLE opinions DROP FOREIGN KEY FK_BEAF78D0C4FFF555');
        $this->addSql('DROP TABLE brands');
        $this->addSql('DROP TABLE cars');
        $this->addSql('DROP TABLE cars_options');
        $this->addSql('DROP TABLE cars_page');
        $this->addSql('DROP TABLE contact_page');
        $this->addSql('DROP TABLE form_contact');
        $this->addSql('DROP TABLE fuels');
        $this->addSql('DROP TABLE garage');
        $this->addSql('DROP TABLE home_page');
        $this->addSql('DROP TABLE models');
        $this->addSql('DROP TABLE openninggarage');
        $this->addSql('DROP TABLE opinion_page');
        $this->addSql('DROP TABLE opinions');
        $this->addSql('DROP TABLE options');
        $this->addSql('DROP TABLE types');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
