<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211104214558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredient CHANGE type type enum(\'liquide\', \'solide\', \'piece\')');
        $this->addSql('ALTER TABLE recette CHANGE preparation_time preparation_time enum(\'5-10min\', \'10-20min\', \'20-30min\', \'30min-1h\', \'1-2h\', \'2-3h\', \'plus\'), CHANGE cuisson_time cuisson_time enum(\'5-10min\', \'10-20min\', \'20-30min\', \'30min-1h\', \'1-2h\', \'2-3h\', \'plus\')');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredient CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE recette CHANGE preparation_time preparation_time TIME NOT NULL, CHANGE cuisson_time cuisson_time TIME NOT NULL');
    }
}
