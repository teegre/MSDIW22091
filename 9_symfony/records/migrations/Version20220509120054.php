<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220509120054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE song');
        $this->addSql('ALTER TABLE artist MODIFY artist_id INT NOT NULL');
        $this->addSql('ALTER TABLE artist DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE artist CHANGE artist_name artist_name VARCHAR(255) NOT NULL, CHANGE artist_id artist_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE artist ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE record MODIFY record_id INT NOT NULL');
        $this->addSql('ALTER TABLE record DROP FOREIGN KEY record_idfk_1');
        $this->addSql('DROP INDEX artist_id ON record');
        $this->addSql('ALTER TABLE record DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE record ADD artist_id INT NOT NULL, DROP artist_id, CHANGE record_title record_title VARCHAR(255) NOT NULL, CHANGE record_year record_year INT NOT NULL, CHANGE record_picture record_picture VARCHAR(255) NOT NULL, CHANGE record_label record_label VARCHAR(255) NOT NULL, CHANGE record_genre record_genre VARCHAR(255) NOT NULL, CHANGE record_price record_price DOUBLE PRECISION NOT NULL, CHANGE record_id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE record ADD CONSTRAINT FK_9B349F911F48AE04 FOREIGN KEY (artist_id) REFERENCES artist (id)');
        $this->addSql('CREATE INDEX IDX_9B349F911F48AE04 ON record (artist_id)');
        $this->addSql('ALTER TABLE record ADD PRIMARY KEY (artist_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE song (record_id INT NOT NULL, song_id INT AUTO_INCREMENT NOT NULL, song_title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX record_id (record_id), PRIMARY KEY(record_id, song_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('ALTER TABLE artist MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE artist DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE artist CHANGE artist_name artist_name VARCHAR(255) DEFAULT NULL, CHANGE id artist_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE artist ADD PRIMARY KEY (artist_id)');
        $this->addSql('ALTER TABLE record MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE record DROP FOREIGN KEY FK_9B349F911F48AE04');
        $this->addSql('DROP INDEX IDX_9B349F911F48AE04 ON record');
        $this->addSql('ALTER TABLE record DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE record ADD artist_id INT DEFAULT NULL, DROP artist_id, CHANGE record_title record_title VARCHAR(255) DEFAULT NULL, CHANGE record_year record_year INT DEFAULT NULL, CHANGE record_picture record_picture VARCHAR(255) DEFAULT NULL, CHANGE record_label record_label VARCHAR(255) DEFAULT NULL, CHANGE record_genre record_genre VARCHAR(255) DEFAULT NULL, CHANGE record_price record_price NUMERIC(6, 2) DEFAULT NULL, CHANGE id record_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE record ADD CONSTRAINT record_idfk_1 FOREIGN KEY (artist_id) REFERENCES artist (artist_id)');
        $this->addSql('CREATE INDEX artist_id ON record (artist_id)');
        $this->addSql('ALTER TABLE record ADD PRIMARY KEY (record_id)');
    }
}
