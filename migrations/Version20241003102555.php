<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241003102555 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_media (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_media_media (categorie_media_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_AACB43B4D2189C1F (categorie_media_id), INDEX IDX_AACB43B4EA9FDD75 (media_id), PRIMARY KEY(categorie_media_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_media_categorie (categorie_media_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_B1861314D2189C1F (categorie_media_id), INDEX IDX_B1861314BCF5E72D (categorie_id), PRIMARY KEY(categorie_media_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment_comment (comment_source INT NOT NULL, comment_target INT NOT NULL, INDEX IDX_6707307C95992761 (comment_source), INDEX IDX_6707307C8C7C77EE (comment_target), PRIMARY KEY(comment_source, comment_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_language (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_language_media (media_language_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_B441511D7599C867 (media_language_id), INDEX IDX_B441511DEA9FDD75 (media_id), PRIMARY KEY(media_language_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_language_language (media_language_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_EE8044747599C867 (media_language_id), INDEX IDX_EE80447482F1BAF4 (language_id), PRIMARY KEY(media_language_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist_media_playlist (playlist_media_id INT NOT NULL, playlist_id INT NOT NULL, INDEX IDX_63FEBFA717421B18 (playlist_media_id), INDEX IDX_63FEBFA76BBD148 (playlist_id), PRIMARY KEY(playlist_media_id, playlist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist_media_media (playlist_media_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_50F8E39217421B18 (playlist_media_id), INDEX IDX_50F8E392EA9FDD75 (media_id), PRIMARY KEY(playlist_media_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist_subscription_user (playlist_subscription_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_C8528656B2A122C2 (playlist_subscription_id), INDEX IDX_C8528656A76ED395 (user_id), PRIMARY KEY(playlist_subscription_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist_subscription_playlist (playlist_subscription_id INT NOT NULL, playlist_id INT NOT NULL, INDEX IDX_67132B44B2A122C2 (playlist_subscription_id), INDEX IDX_67132B446BBD148 (playlist_id), PRIMARY KEY(playlist_subscription_id, playlist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscription_history_subscription (subscription_history_id INT NOT NULL, subscription_id INT NOT NULL, INDEX IDX_EED8FEBCDCE0C437 (subscription_history_id), INDEX IDX_EED8FEBC9A1887DC (subscription_id), PRIMARY KEY(subscription_history_id, subscription_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE watched_history (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, last_watched DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', number_of_view INT NOT NULL, INDEX IDX_945B365A9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie_media_media ADD CONSTRAINT FK_AACB43B4D2189C1F FOREIGN KEY (categorie_media_id) REFERENCES categorie_media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_media_media ADD CONSTRAINT FK_AACB43B4EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_media_categorie ADD CONSTRAINT FK_B1861314D2189C1F FOREIGN KEY (categorie_media_id) REFERENCES categorie_media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_media_categorie ADD CONSTRAINT FK_B1861314BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment_comment ADD CONSTRAINT FK_6707307C95992761 FOREIGN KEY (comment_source) REFERENCES comment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment_comment ADD CONSTRAINT FK_6707307C8C7C77EE FOREIGN KEY (comment_target) REFERENCES comment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language_media ADD CONSTRAINT FK_B441511D7599C867 FOREIGN KEY (media_language_id) REFERENCES media_language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language_media ADD CONSTRAINT FK_B441511DEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language_language ADD CONSTRAINT FK_EE8044747599C867 FOREIGN KEY (media_language_id) REFERENCES media_language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language_language ADD CONSTRAINT FK_EE80447482F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_media_playlist ADD CONSTRAINT FK_63FEBFA717421B18 FOREIGN KEY (playlist_media_id) REFERENCES playlist_media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_media_playlist ADD CONSTRAINT FK_63FEBFA76BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_media_media ADD CONSTRAINT FK_50F8E39217421B18 FOREIGN KEY (playlist_media_id) REFERENCES playlist_media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_media_media ADD CONSTRAINT FK_50F8E392EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_subscription_user ADD CONSTRAINT FK_C8528656B2A122C2 FOREIGN KEY (playlist_subscription_id) REFERENCES playlist_subscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_subscription_user ADD CONSTRAINT FK_C8528656A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_subscription_playlist ADD CONSTRAINT FK_67132B44B2A122C2 FOREIGN KEY (playlist_subscription_id) REFERENCES playlist_subscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_subscription_playlist ADD CONSTRAINT FK_67132B446BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subscription_history_subscription ADD CONSTRAINT FK_EED8FEBCDCE0C437 FOREIGN KEY (subscription_history_id) REFERENCES subscription_history (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subscription_history_subscription ADD CONSTRAINT FK_EED8FEBC9A1887DC FOREIGN KEY (subscription_id) REFERENCES subscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE watched_history ADD CONSTRAINT FK_945B365A9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE watch_history');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CF675F31B');
        $this->addSql('DROP INDEX IDX_9474526CF675F31B ON comment');
        $this->addSql('ALTER TABLE comment ADD user_id_id INT DEFAULT NULL, ADD media_id_id INT DEFAULT NULL, DROP author_id');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C605D5AE6 FOREIGN KEY (media_id_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_9474526C9D86650F ON comment (user_id_id)');
        $this->addSql('CREATE INDEX IDX_9474526C605D5AE6 ON comment (media_id_id)');
        $this->addSql('ALTER TABLE episode ADD season_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA68756988 FOREIGN KEY (season_id_id) REFERENCES season (id)');
        $this->addSql('CREATE INDEX IDX_DDAA1CDA68756988 ON episode (season_id_id)');
        $this->addSql('ALTER TABLE language CHANGE name name VARCHAR(100) DEFAULT NULL, CHANGE code code VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE media ADD watched_history_id INT DEFAULT NULL, CHANGE short_description short_description LONGTEXT DEFAULT NULL, CHANGE release_date release_date DATE DEFAULT NULL, CHANGE cover_image cover_image VARCHAR(255) DEFAULT NULL, CHANGE staff staff JSON DEFAULT NULL, CHANGE cast cast JSON DEFAULT NULL');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C72CF77CB FOREIGN KEY (watched_history_id) REFERENCES watched_history (id)');
        $this->addSql('CREATE INDEX IDX_6A2CA10C72CF77CB ON media (watched_history_id)');
        $this->addSql('ALTER TABLE playlist DROP FOREIGN KEY FK_D782112D61220EA6');
        $this->addSql('DROP INDEX IDX_D782112D61220EA6 ON playlist');
        $this->addSql('ALTER TABLE playlist ADD user_id_id INT DEFAULT NULL, ADD name VARCHAR(255) NOT NULL, DROP creator_id');
        $this->addSql('ALTER TABLE playlist ADD CONSTRAINT FK_D782112D9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D782112D9D86650F ON playlist (user_id_id)');
        $this->addSql('ALTER TABLE playlist_subscription DROP FOREIGN KEY FK_832940CA76ED395');
        $this->addSql('DROP INDEX IDX_832940CA76ED395 ON playlist_subscription');
        $this->addSql('ALTER TABLE playlist_subscription DROP user_id');
        $this->addSql('ALTER TABLE season ADD serie_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT FK_F0E45BA9B748AAC3 FOREIGN KEY (serie_id_id) REFERENCES serie (id)');
        $this->addSql('CREATE INDEX IDX_F0E45BA9B748AAC3 ON season (serie_id_id)');
        $this->addSql('ALTER TABLE subscription ADD duration_in_month INT DEFAULT NULL, DROP duration, DROP created_at, CHANGE name name VARCHAR(100) NOT NULL, CHANGE price price NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE subscription_history CHANGE start_date start_date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', CHANGE end_date end_date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE user ADD current_subscription_id_id INT DEFAULT NULL, DROP phone_number, CHANGE username username VARCHAR(100) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL, CHANGE status account_status VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494924D8AF FOREIGN KEY (current_subscription_id_id) REFERENCES subscription (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6494924D8AF ON user (current_subscription_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE season DROP FOREIGN KEY FK_F0E45BA9B748AAC3');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C72CF77CB');
        $this->addSql('CREATE TABLE watch_history (id INT AUTO_INCREMENT NOT NULL, last_watched DATETIME NOT NULL, number_of_views INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE categorie_media_media DROP FOREIGN KEY FK_AACB43B4D2189C1F');
        $this->addSql('ALTER TABLE categorie_media_media DROP FOREIGN KEY FK_AACB43B4EA9FDD75');
        $this->addSql('ALTER TABLE categorie_media_categorie DROP FOREIGN KEY FK_B1861314D2189C1F');
        $this->addSql('ALTER TABLE categorie_media_categorie DROP FOREIGN KEY FK_B1861314BCF5E72D');
        $this->addSql('ALTER TABLE comment_comment DROP FOREIGN KEY FK_6707307C95992761');
        $this->addSql('ALTER TABLE comment_comment DROP FOREIGN KEY FK_6707307C8C7C77EE');
        $this->addSql('ALTER TABLE media_language_media DROP FOREIGN KEY FK_B441511D7599C867');
        $this->addSql('ALTER TABLE media_language_media DROP FOREIGN KEY FK_B441511DEA9FDD75');
        $this->addSql('ALTER TABLE media_language_language DROP FOREIGN KEY FK_EE8044747599C867');
        $this->addSql('ALTER TABLE media_language_language DROP FOREIGN KEY FK_EE80447482F1BAF4');
        $this->addSql('ALTER TABLE playlist_media_playlist DROP FOREIGN KEY FK_63FEBFA717421B18');
        $this->addSql('ALTER TABLE playlist_media_playlist DROP FOREIGN KEY FK_63FEBFA76BBD148');
        $this->addSql('ALTER TABLE playlist_media_media DROP FOREIGN KEY FK_50F8E39217421B18');
        $this->addSql('ALTER TABLE playlist_media_media DROP FOREIGN KEY FK_50F8E392EA9FDD75');
        $this->addSql('ALTER TABLE playlist_subscription_user DROP FOREIGN KEY FK_C8528656B2A122C2');
        $this->addSql('ALTER TABLE playlist_subscription_user DROP FOREIGN KEY FK_C8528656A76ED395');
        $this->addSql('ALTER TABLE playlist_subscription_playlist DROP FOREIGN KEY FK_67132B44B2A122C2');
        $this->addSql('ALTER TABLE playlist_subscription_playlist DROP FOREIGN KEY FK_67132B446BBD148');
        $this->addSql('ALTER TABLE subscription_history_subscription DROP FOREIGN KEY FK_EED8FEBCDCE0C437');
        $this->addSql('ALTER TABLE subscription_history_subscription DROP FOREIGN KEY FK_EED8FEBC9A1887DC');
        $this->addSql('ALTER TABLE watched_history DROP FOREIGN KEY FK_945B365A9D86650F');
        $this->addSql('DROP TABLE categorie_media');
        $this->addSql('DROP TABLE categorie_media_media');
        $this->addSql('DROP TABLE categorie_media_categorie');
        $this->addSql('DROP TABLE comment_comment');
        $this->addSql('DROP TABLE media_language');
        $this->addSql('DROP TABLE media_language_media');
        $this->addSql('DROP TABLE media_language_language');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE playlist_media_playlist');
        $this->addSql('DROP TABLE playlist_media_media');
        $this->addSql('DROP TABLE playlist_subscription_user');
        $this->addSql('DROP TABLE playlist_subscription_playlist');
        $this->addSql('DROP TABLE serie');
        $this->addSql('DROP TABLE subscription_history_subscription');
        $this->addSql('DROP TABLE watched_history');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C9D86650F');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C605D5AE6');
        $this->addSql('DROP INDEX IDX_9474526C9D86650F ON comment');
        $this->addSql('DROP INDEX IDX_9474526C605D5AE6 ON comment');
        $this->addSql('ALTER TABLE comment ADD author_id INT NOT NULL, DROP user_id_id, DROP media_id_id');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9474526CF675F31B ON comment (author_id)');
        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDA68756988');
        $this->addSql('DROP INDEX IDX_DDAA1CDA68756988 ON episode');
        $this->addSql('ALTER TABLE episode DROP season_id_id');
        $this->addSql('ALTER TABLE language CHANGE name name VARCHAR(100) NOT NULL, CHANGE code code VARCHAR(100) NOT NULL');
        $this->addSql('DROP INDEX IDX_6A2CA10C72CF77CB ON media');
        $this->addSql('ALTER TABLE media DROP watched_history_id, CHANGE short_description short_description LONGTEXT NOT NULL, CHANGE release_date release_date DATE NOT NULL, CHANGE cover_image cover_image VARCHAR(255) NOT NULL, CHANGE staff staff JSON NOT NULL, CHANGE cast cast JSON NOT NULL');
        $this->addSql('ALTER TABLE playlist DROP FOREIGN KEY FK_D782112D9D86650F');
        $this->addSql('DROP INDEX IDX_D782112D9D86650F ON playlist');
        $this->addSql('ALTER TABLE playlist ADD creator_id INT NOT NULL, DROP user_id_id, DROP name');
        $this->addSql('ALTER TABLE playlist ADD CONSTRAINT FK_D782112D61220EA6 FOREIGN KEY (creator_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D782112D61220EA6 ON playlist (creator_id)');
        $this->addSql('ALTER TABLE playlist_subscription ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_832940CA76ED395 ON playlist_subscription (user_id)');
        $this->addSql('DROP INDEX IDX_F0E45BA9B748AAC3 ON season');
        $this->addSql('ALTER TABLE season DROP serie_id_id');
        $this->addSql('ALTER TABLE subscription ADD duration INT NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP duration_in_month, CHANGE name name VARCHAR(255) NOT NULL, CHANGE price price INT NOT NULL');
        $this->addSql('ALTER TABLE subscription_history CHANGE start_date start_date DATE NOT NULL, CHANGE end_date end_date DATE NOT NULL');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494924D8AF');
        $this->addSql('DROP INDEX IDX_8D93D6494924D8AF ON user');
        $this->addSql('ALTER TABLE user ADD phone_number VARCHAR(15) DEFAULT NULL, DROP current_subscription_id_id, CHANGE username username VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE account_status status VARCHAR(255) NOT NULL');
    }
}
