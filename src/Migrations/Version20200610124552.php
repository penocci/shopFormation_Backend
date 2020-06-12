<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200610124552 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, rue VARCHAR(255) NOT NULL, cde_postal VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, vendeur_id INT DEFAULT NULL, commande_id INT DEFAULT NULL, panier_id INT DEFAULT NULL, designation VARCHAR(255) NOT NULL, description VARCHAR(1000) DEFAULT NULL, prix_unitaire INT NOT NULL, image_article VARCHAR(255) NOT NULL, qte_en_stock INT NOT NULL, INDEX IDX_23A0E66858C065E (vendeur_id), INDEX IDX_23A0E6682EA2E54 (commande_id), INDEX IDX_23A0E66F77D927C (panier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_categorie (article_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_934886107294869C (article_id), INDEX IDX_93488610BCF5E72D (categorie_id), PRIMARY KEY(article_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, tel VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, nick_name VARCHAR(255) DEFAULT NULL, date_creation_compte DATETIME DEFAULT NULL, nom_magasin VARCHAR(255) DEFAULT NULL, date_creation_magasin DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_FCEC9EFE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne_adresse (personne_id INT NOT NULL, adresse_id INT NOT NULL, INDEX IDX_1DD0ECEBA21BD112 (personne_id), INDEX IDX_1DD0ECEB4DE7DC5C (adresse_id), PRIMARY KEY(personne_id, adresse_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66858C065E FOREIGN KEY (vendeur_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6682EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66F77D927C FOREIGN KEY (panier_id) REFERENCES panier (id)');
        $this->addSql('ALTER TABLE article_categorie ADD CONSTRAINT FK_934886107294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_categorie ADD CONSTRAINT FK_93488610BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personne_adresse ADD CONSTRAINT FK_1DD0ECEBA21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personne_adresse ADD CONSTRAINT FK_1DD0ECEB4DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE personne_adresse DROP FOREIGN KEY FK_1DD0ECEB4DE7DC5C');
        $this->addSql('ALTER TABLE article_categorie DROP FOREIGN KEY FK_934886107294869C');
        $this->addSql('ALTER TABLE article_categorie DROP FOREIGN KEY FK_93488610BCF5E72D');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66858C065E');
        $this->addSql('ALTER TABLE personne_adresse DROP FOREIGN KEY FK_1DD0ECEBA21BD112');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6682EA2E54');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66F77D927C');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_categorie');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE personne_adresse');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE panier');
    }
}
