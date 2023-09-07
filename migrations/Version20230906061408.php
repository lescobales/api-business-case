<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230906061408 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, line1 VARCHAR(255) NOT NULL, line2 VARCHAR(255) DEFAULT NULL, line3 VARCHAR(255) DEFAULT NULL, post_code VARCHAR(10) NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, representation VARCHAR(255) DEFAULT NULL, INDEX IDX_64C19C112469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, eur_course DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE get_action (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nft (id INT AUTO_INCREMENT NOT NULL, nft_type_id INT NOT NULL, category_id INT NOT NULL, owner_id INT NOT NULL, nft_collection_id INT DEFAULT NULL, token VARCHAR(1000) NOT NULL, title VARCHAR(255) NOT NULL, initial_price DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, representation VARCHAR(255) DEFAULT NULL, INDEX IDX_D9C7463CCCB558BB (nft_type_id), INDEX IDX_D9C7463C12469DE2 (category_id), INDEX IDX_D9C7463C7E3C61F9 (owner_id), INDEX IDX_D9C7463C327C6A9D (nft_collection_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nft_collection (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nft_type (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nft_value (id INT AUTO_INCREMENT NOT NULL, nft_id INT NOT NULL, weight DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_5A860697E813668D (nft_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pre_order (id INT AUTO_INCREMENT NOT NULL, asker_id INT NOT NULL, amount INT NOT NULL, is_purchase TINYINT(1) NOT NULL, purchase_at DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, INDEX IDX_EF82FC73CF34C66B (asker_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pre_order_nft (pre_order_id INT NOT NULL, nft_id INT NOT NULL, INDEX IDX_68F8DF208B495F6B (pre_order_id), INDEX IDX_68F8DF20E813668D (nft_id), PRIMARY KEY(pre_order_id, nft_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, address_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, last_name VARCHAR(255) DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, birth_date DATETIME DEFAULT NULL, avatar VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, is_male TINYINT(1) NOT NULL, pseudo VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649F5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visit (id INT AUTO_INCREMENT NOT NULL, nft_id INT DEFAULT NULL, visit_date DATETIME NOT NULL, INDEX IDX_437EE939E813668D (nft_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C112469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463CCCB558BB FOREIGN KEY (nft_type_id) REFERENCES nft_type (id)');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463C12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463C7E3C61F9 FOREIGN KEY (owner_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463C327C6A9D FOREIGN KEY (nft_collection_id) REFERENCES nft_collection (id)');
        $this->addSql('ALTER TABLE nft_value ADD CONSTRAINT FK_5A860697E813668D FOREIGN KEY (nft_id) REFERENCES nft (id)');
        $this->addSql('ALTER TABLE pre_order ADD CONSTRAINT FK_EF82FC73CF34C66B FOREIGN KEY (asker_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE pre_order_nft ADD CONSTRAINT FK_68F8DF208B495F6B FOREIGN KEY (pre_order_id) REFERENCES pre_order (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pre_order_nft ADD CONSTRAINT FK_68F8DF20E813668D FOREIGN KEY (nft_id) REFERENCES nft (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE visit ADD CONSTRAINT FK_437EE939E813668D FOREIGN KEY (nft_id) REFERENCES nft (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C112469DE2');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463CCCB558BB');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463C12469DE2');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463C7E3C61F9');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463C327C6A9D');
        $this->addSql('ALTER TABLE nft_value DROP FOREIGN KEY FK_5A860697E813668D');
        $this->addSql('ALTER TABLE pre_order DROP FOREIGN KEY FK_EF82FC73CF34C66B');
        $this->addSql('ALTER TABLE pre_order_nft DROP FOREIGN KEY FK_68F8DF208B495F6B');
        $this->addSql('ALTER TABLE pre_order_nft DROP FOREIGN KEY FK_68F8DF20E813668D');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649F5B7AF75');
        $this->addSql('ALTER TABLE visit DROP FOREIGN KEY FK_437EE939E813668D');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE get_action');
        $this->addSql('DROP TABLE nft');
        $this->addSql('DROP TABLE nft_collection');
        $this->addSql('DROP TABLE nft_type');
        $this->addSql('DROP TABLE nft_value');
        $this->addSql('DROP TABLE pre_order');
        $this->addSql('DROP TABLE pre_order_nft');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE visit');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
