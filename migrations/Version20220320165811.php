<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220320165811 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE type_sanction (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('DROP TABLE type_reason');
        $this->addSql('DROP INDEX IDX_A30D05D448D3C5F3');
        $this->addSql('DROP INDEX IDX_A30D05D4ED7D5482');
        $this->addSql('DROP INDEX IDX_A30D05D4A76ED395');
        $this->addSql('DROP INDEX IDX_A30D05D431307F7D');
        $this->addSql('CREATE TEMPORARY TABLE __temp__sanction_player AS SELECT id, user_id, reason_sanction_id, type_reason_id, time_sanction_id, pseudo_player_sanction, date_sanction, screen_sanction, ip_player_sanction FROM sanction_player');
        $this->addSql('DROP TABLE sanction_player');
        $this->addSql('CREATE TABLE sanction_player (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, reason_sanction_id INTEGER DEFAULT NULL, type_sanction_id INTEGER DEFAULT NULL, time_sanction_id INTEGER DEFAULT NULL, pseudo_player_sanction VARCHAR(255) NOT NULL, date_sanction DATETIME NOT NULL, screen_sanction VARCHAR(255) NOT NULL, ip_player_sanction VARCHAR(255) DEFAULT NULL, CONSTRAINT FK_A30D05D4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_A30D05D431307F7D FOREIGN KEY (reason_sanction_id) REFERENCES reason_sanction (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_A30D05D448D3C5F3 FOREIGN KEY (time_sanction_id) REFERENCES time_sanction (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_A30D05D4DDF9168B FOREIGN KEY (type_sanction_id) REFERENCES type_sanction (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO sanction_player (id, user_id, reason_sanction_id, type_sanction_id, time_sanction_id, pseudo_player_sanction, date_sanction, screen_sanction, ip_player_sanction) SELECT id, user_id, reason_sanction_id, type_reason_id, time_sanction_id, pseudo_player_sanction, date_sanction, screen_sanction, ip_player_sanction FROM __temp__sanction_player');
        $this->addSql('DROP TABLE __temp__sanction_player');
        $this->addSql('CREATE INDEX IDX_A30D05D448D3C5F3 ON sanction_player (time_sanction_id)');
        $this->addSql('CREATE INDEX IDX_A30D05D4A76ED395 ON sanction_player (user_id)');
        $this->addSql('CREATE INDEX IDX_A30D05D431307F7D ON sanction_player (reason_sanction_id)');
        $this->addSql('CREATE INDEX IDX_A30D05D4DDF9168B ON sanction_player (type_sanction_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE type_reason (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('DROP TABLE type_sanction');
        $this->addSql('DROP INDEX IDX_A30D05D4A76ED395');
        $this->addSql('DROP INDEX IDX_A30D05D431307F7D');
        $this->addSql('DROP INDEX IDX_A30D05D448D3C5F3');
        $this->addSql('DROP INDEX IDX_A30D05D4DDF9168B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__sanction_player AS SELECT id, user_id, reason_sanction_id, time_sanction_id, type_sanction_id, pseudo_player_sanction, date_sanction, screen_sanction, ip_player_sanction FROM sanction_player');
        $this->addSql('DROP TABLE sanction_player');
        $this->addSql('CREATE TABLE sanction_player (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, type_reason_id INTEGER DEFAULT NULL, user_id INTEGER DEFAULT NULL, reason_sanction_id INTEGER DEFAULT NULL, time_sanction_id INTEGER DEFAULT NULL, pseudo_player_sanction VARCHAR(255) NOT NULL, date_sanction DATETIME NOT NULL, screen_sanction VARCHAR(255) NOT NULL, ip_player_sanction VARCHAR(255) DEFAULT NULL, CONSTRAINT FK_A30D05D4DDF9168B FOREIGN KEY (type_reason_id) REFERENCES type_sanction (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO sanction_player (id, user_id, reason_sanction_id, time_sanction_id, type_reason_id, pseudo_player_sanction, date_sanction, screen_sanction, ip_player_sanction) SELECT id, user_id, reason_sanction_id, time_sanction_id, type_sanction_id, pseudo_player_sanction, date_sanction, screen_sanction, ip_player_sanction FROM __temp__sanction_player');
        $this->addSql('DROP TABLE __temp__sanction_player');
        $this->addSql('CREATE INDEX IDX_A30D05D4A76ED395 ON sanction_player (user_id)');
        $this->addSql('CREATE INDEX IDX_A30D05D431307F7D ON sanction_player (reason_sanction_id)');
        $this->addSql('CREATE INDEX IDX_A30D05D448D3C5F3 ON sanction_player (time_sanction_id)');
        $this->addSql('CREATE INDEX IDX_A30D05D4ED7D5482 ON sanction_player (type_reason_id)');
    }
}
