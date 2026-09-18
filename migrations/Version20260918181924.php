<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260918181924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE transporter_company_link (id UUID NOT NULL, transporter_company_id UUID NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, transporter_id UUID DEFAULT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_8BEA8FBF4F335C8B ON transporter_company_link (transporter_id)');
        $this->addSql('ALTER TABLE transporter_company_link ADD CONSTRAINT FK_8BEA8FBF4F335C8B FOREIGN KEY (transporter_id) REFERENCES transporter (id)');
        $this->addSql('ALTER TABLE transporter DROP company_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE transporter_company_link DROP CONSTRAINT FK_8BEA8FBF4F335C8B');
        $this->addSql('DROP TABLE transporter_company_link');
        $this->addSql('ALTER TABLE transporter ADD company_id UUID DEFAULT NULL');
    }
}
