<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200115121738 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE service_area');
        $this->addSql('ALTER TABLE area ADD highway_id INT NOT NULL');
        $this->addSql('ALTER TABLE area ADD CONSTRAINT FK_D7943D688E4F209D FOREIGN KEY (highway_id) REFERENCES highway (id)');
        $this->addSql('CREATE INDEX IDX_D7943D688E4F209D ON area (highway_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE service_area (service_id INT NOT NULL, area_id INT NOT NULL, INDEX IDX_19D78984BD0F409C (area_id), INDEX IDX_19D78984ED5CA9E6 (service_id), PRIMARY KEY(service_id, area_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE service_area ADD CONSTRAINT FK_19D78984BD0F409C FOREIGN KEY (area_id) REFERENCES area (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE service_area ADD CONSTRAINT FK_19D78984ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE area DROP FOREIGN KEY FK_D7943D688E4F209D');
        $this->addSql('DROP INDEX IDX_D7943D688E4F209D ON area');
        $this->addSql('ALTER TABLE area DROP highway_id');
    }
}
