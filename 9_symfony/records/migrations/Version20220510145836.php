<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220510145836 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE song MODIFY song_id INT NOT NULL');
        $this->addSql('ALTER TABLE song DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE song ADD PRIMARY KEY (song_id)');
        $this->addSql('DROP INDEX record_id ON song');
        $this->addSql('CREATE INDEX IDX_33EDEEA14DFD750C ON song (record_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE song MODIFY song_id INT NOT NULL');
        $this->addSql('ALTER TABLE song DROP FOREIGN KEY FK_33EDEEA14DFD750C');
        $this->addSql('ALTER TABLE song DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE song DROP FOREIGN KEY FK_33EDEEA14DFD750C');
        $this->addSql('ALTER TABLE song ADD PRIMARY KEY (record_id, song_id)');
        $this->addSql('DROP INDEX idx_33edeea14dfd750c ON song');
        $this->addSql('CREATE INDEX record_id ON song (record_id)');
        $this->addSql('ALTER TABLE song ADD CONSTRAINT FK_33EDEEA14DFD750C FOREIGN KEY (record_id) REFERENCES record (record_id)');
    }
}
