<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301221815 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classroom (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(80) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club (ref VARCHAR(80) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(ref)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (nsc VARCHAR(150) NOT NULL, email VARCHAR(150) NOT NULL, PRIMARY KEY(nsc)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_club (student_nsc VARCHAR(150) NOT NULL, club_ref VARCHAR(80) NOT NULL, INDEX IDX_87CD43AAFBDC2049 (student_nsc), INDEX IDX_87CD43AAB70D1EBA (club_ref), PRIMARY KEY(student_nsc, club_ref)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE student_club ADD CONSTRAINT FK_87CD43AAFBDC2049 FOREIGN KEY (student_nsc) REFERENCES student (NSC)');
        $this->addSql('ALTER TABLE student_club ADD CONSTRAINT FK_87CD43AAB70D1EBA FOREIGN KEY (club_ref) REFERENCES club (REF)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student_club DROP FOREIGN KEY FK_87CD43AAFBDC2049');
        $this->addSql('ALTER TABLE student_club DROP FOREIGN KEY FK_87CD43AAB70D1EBA');
        $this->addSql('DROP TABLE classroom');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE student_club');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
