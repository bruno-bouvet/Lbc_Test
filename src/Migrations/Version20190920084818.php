<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190920084818 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contacts DROP FOREIGN KEY contacts_ibfk_1');
        $this->addSql('ALTER TABLE contacts CHANGE userId userId INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contacts ADD CONSTRAINT FK_3340157364B64DCC FOREIGN KEY (userId) REFERENCES users (id)');
        $this->addSql('ALTER TABLE addresses DROP FOREIGN KEY addresses_ibfk_1');
        $this->addSql('ALTER TABLE addresses CHANGE idContact idContact INT DEFAULT NULL');
        $this->addSql('ALTER TABLE addresses ADD CONSTRAINT FK_6FCA75165CDB8DCA FOREIGN KEY (idContact) REFERENCES contacts (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE addresses DROP FOREIGN KEY FK_6FCA75165CDB8DCA');
        $this->addSql('ALTER TABLE addresses CHANGE idContact idContact INT NOT NULL');
        $this->addSql('ALTER TABLE addresses ADD CONSTRAINT addresses_ibfk_1 FOREIGN KEY (idContact) REFERENCES contacts (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contacts DROP FOREIGN KEY FK_3340157364B64DCC');
        $this->addSql('ALTER TABLE contacts CHANGE userId userId INT NOT NULL');
        $this->addSql('ALTER TABLE contacts ADD CONSTRAINT contacts_ibfk_1 FOREIGN KEY (userId) REFERENCES users (id) ON DELETE CASCADE');
    }
}
