<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200115105546 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE gas_price ADD gas_type_id INT NOT NULL');
        $this->addSql('ALTER TABLE gas_price ADD CONSTRAINT FK_EEF8FDB63145108E FOREIGN KEY (gas_type_id) REFERENCES gas_type (id)');
        $this->addSql('CREATE INDEX IDX_EEF8FDB63145108E ON gas_price (gas_type_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE gas_price DROP FOREIGN KEY FK_EEF8FDB63145108E');
        $this->addSql('DROP INDEX IDX_EEF8FDB63145108E ON gas_price');
        $this->addSql('ALTER TABLE gas_price DROP gas_type_id');
    }
}
