<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210203163444 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE loan_book');
        $this->addSql('ALTER TABLE book ADD loans_id INT NOT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A3319AB85012 FOREIGN KEY (loans_id) REFERENCES loan (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A3319AB85012 ON book (loans_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE loan_book (loan_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_1A48D94516A2B381 (book_id), INDEX IDX_1A48D945CE73868F (loan_id), PRIMARY KEY(loan_id, book_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE loan_book ADD CONSTRAINT FK_1A48D94516A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loan_book ADD CONSTRAINT FK_1A48D945CE73868F FOREIGN KEY (loan_id) REFERENCES loan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A3319AB85012');
        $this->addSql('DROP INDEX IDX_CBE5A3319AB85012 ON book');
        $this->addSql('ALTER TABLE book DROP loans_id');
    }
}
