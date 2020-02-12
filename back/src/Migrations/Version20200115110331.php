<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200115110331 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE gas_price ADD area_id INT NOT NULL');
        $this->addSql('ALTER TABLE gas_price ADD CONSTRAINT FK_EEF8FDB6BD0F409C FOREIGN KEY (area_id) REFERENCES area (id)');
        $this->addSql('CREATE INDEX IDX_EEF8FDB6BD0F409C ON gas_price (area_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE gas_price DROP FOREIGN KEY FK_EEF8FDB6BD0F409C');
        $this->addSql('DROP INDEX IDX_EEF8FDB6BD0F409C ON gas_price');
        $this->addSql('ALTER TABLE gas_price DROP area_id');
    }
}
