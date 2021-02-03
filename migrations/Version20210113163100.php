<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210113163100 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, book_title VARCHAR(190) NOT NULL, book_category VARCHAR(190) NOT NULL, author VARCHAR(190) NOT NULL, edition_year DATE NOT NULL, pages INT NOT NULL, editor VARCHAR(190) NOT NULL, book_isbn INT NOT NULL, book_condition VARCHAR(190) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE borrower (id INT AUTO_INCREMENT NOT NULL, borrowers_id INT DEFAULT NULL, borrower_name VARCHAR(190) NOT NULL, borrower_contact VARCHAR(190) NOT NULL, borrower_login VARCHAR(100) NOT NULL, borrower_status VARCHAR(100) NOT NULL, borrower_card VARCHAR(100) NOT NULL, INDEX IDX_DB904DB44BDC8A54 (borrowers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loan (id INT AUTO_INCREMENT NOT NULL, loan_date DATE NOT NULL, loan_back_date DATE NOT NULL, number_of_books_allowed DATE NOT NULL, late_fees INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loan_book (loan_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_1A48D945CE73868F (loan_id), INDEX IDX_1A48D94516A2B381 (book_id), PRIMARY KEY(loan_id, book_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE borrower ADD CONSTRAINT FK_DB904DB44BDC8A54 FOREIGN KEY (borrowers_id) REFERENCES loan (id)');
        $this->addSql('ALTER TABLE loan_book ADD CONSTRAINT FK_1A48D945CE73868F FOREIGN KEY (loan_id) REFERENCES loan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loan_book ADD CONSTRAINT FK_1A48D94516A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE loan_book DROP FOREIGN KEY FK_1A48D94516A2B381');
        $this->addSql('ALTER TABLE borrower DROP FOREIGN KEY FK_DB904DB44BDC8A54');
        $this->addSql('ALTER TABLE loan_book DROP FOREIGN KEY FK_1A48D945CE73868F');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE borrower');
        $this->addSql('DROP TABLE loan');
        $this->addSql('DROP TABLE loan_book');
    }
}
