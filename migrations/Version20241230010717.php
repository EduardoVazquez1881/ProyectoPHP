<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241230010717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, categoria_name VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE creador (id INT AUTO_INCREMENT NOT NULL, creador_name VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE juego (id INT AUTO_INCREMENT NOT NULL, nombre_juego VARCHAR(50) NOT NULL, descripcion LONGTEXT NOT NULL, precio NUMERIC(6, 2) NOT NULL, fecha_creacion DATE NOT NULL, imagen VARCHAR(100) DEFAULT NULL, visitas INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE juego_datos_creador (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE juego_datos_creador_juego (juego_datos_creador_id INT NOT NULL, juego_id INT NOT NULL, INDEX IDX_BCE9D4D49501F206 (juego_datos_creador_id), INDEX IDX_BCE9D4D413375255 (juego_id), PRIMARY KEY(juego_datos_creador_id, juego_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE juego_datos_creador_creador (juego_datos_creador_id INT NOT NULL, creador_id INT NOT NULL, INDEX IDX_D8FE1AEE9501F206 (juego_datos_creador_id), INDEX IDX_D8FE1AEE62F40C3D (creador_id), PRIMARY KEY(juego_datos_creador_id, creador_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE juegos_datos_categorias (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE juegos_datos_categorias_juego_datos_creador (juegos_datos_categorias_id INT NOT NULL, juego_datos_creador_id INT NOT NULL, INDEX IDX_70099CBC9816AE29 (juegos_datos_categorias_id), INDEX IDX_70099CBC9501F206 (juego_datos_creador_id), PRIMARY KEY(juegos_datos_categorias_id, juego_datos_creador_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE juegos_datos_categorias_categoria (juegos_datos_categorias_id INT NOT NULL, categoria_id INT NOT NULL, INDEX IDX_7F73E7FB9816AE29 (juegos_datos_categorias_id), INDEX IDX_7F73E7FB3397707A (categoria_id), PRIMARY KEY(juegos_datos_categorias_id, categoria_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE juegos_datos_plataformas (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE juegos_datos_plataformas_juego_datos_creador (juegos_datos_plataformas_id INT NOT NULL, juego_datos_creador_id INT NOT NULL, INDEX IDX_B95B8AF34D5FE582 (juegos_datos_plataformas_id), INDEX IDX_B95B8AF39501F206 (juego_datos_creador_id), PRIMARY KEY(juegos_datos_plataformas_id, juego_datos_creador_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE juegos_datos_plataformas_plataforma (juegos_datos_plataformas_id INT NOT NULL, plataforma_id INT NOT NULL, INDEX IDX_1716EFDE4D5FE582 (juegos_datos_plataformas_id), INDEX IDX_1716EFDEEB90E430 (plataforma_id), PRIMARY KEY(juegos_datos_plataformas_id, plataforma_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plataforma (id INT AUTO_INCREMENT NOT NULL, plataforma_name VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, usuario_id_id INT DEFAULT NULL, juego_id_id INT DEFAULT NULL, descripcion LONGTEXT DEFAULT NULL, calificacion INT DEFAULT NULL, dificultad INT DEFAULT NULL, fecha DATETIME NOT NULL, INDEX IDX_794381C6629AF449 (usuario_id_id), INDEX IDX_794381C63C06B3A1 (juego_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE juego_datos_creador_juego ADD CONSTRAINT FK_BCE9D4D49501F206 FOREIGN KEY (juego_datos_creador_id) REFERENCES juego_datos_creador (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE juego_datos_creador_juego ADD CONSTRAINT FK_BCE9D4D413375255 FOREIGN KEY (juego_id) REFERENCES juego (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE juego_datos_creador_creador ADD CONSTRAINT FK_D8FE1AEE9501F206 FOREIGN KEY (juego_datos_creador_id) REFERENCES juego_datos_creador (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE juego_datos_creador_creador ADD CONSTRAINT FK_D8FE1AEE62F40C3D FOREIGN KEY (creador_id) REFERENCES creador (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE juegos_datos_categorias_juego_datos_creador ADD CONSTRAINT FK_70099CBC9816AE29 FOREIGN KEY (juegos_datos_categorias_id) REFERENCES juegos_datos_categorias (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE juegos_datos_categorias_juego_datos_creador ADD CONSTRAINT FK_70099CBC9501F206 FOREIGN KEY (juego_datos_creador_id) REFERENCES juego_datos_creador (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE juegos_datos_categorias_categoria ADD CONSTRAINT FK_7F73E7FB9816AE29 FOREIGN KEY (juegos_datos_categorias_id) REFERENCES juegos_datos_categorias (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE juegos_datos_categorias_categoria ADD CONSTRAINT FK_7F73E7FB3397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE juegos_datos_plataformas_juego_datos_creador ADD CONSTRAINT FK_B95B8AF34D5FE582 FOREIGN KEY (juegos_datos_plataformas_id) REFERENCES juegos_datos_plataformas (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE juegos_datos_plataformas_juego_datos_creador ADD CONSTRAINT FK_B95B8AF39501F206 FOREIGN KEY (juego_datos_creador_id) REFERENCES juego_datos_creador (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE juegos_datos_plataformas_plataforma ADD CONSTRAINT FK_1716EFDE4D5FE582 FOREIGN KEY (juegos_datos_plataformas_id) REFERENCES juegos_datos_plataformas (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE juegos_datos_plataformas_plataforma ADD CONSTRAINT FK_1716EFDEEB90E430 FOREIGN KEY (plataforma_id) REFERENCES plataforma (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6629AF449 FOREIGN KEY (usuario_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C63C06B3A1 FOREIGN KEY (juego_id_id) REFERENCES juego (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE juego_datos_creador_juego DROP FOREIGN KEY FK_BCE9D4D49501F206');
        $this->addSql('ALTER TABLE juego_datos_creador_juego DROP FOREIGN KEY FK_BCE9D4D413375255');
        $this->addSql('ALTER TABLE juego_datos_creador_creador DROP FOREIGN KEY FK_D8FE1AEE9501F206');
        $this->addSql('ALTER TABLE juego_datos_creador_creador DROP FOREIGN KEY FK_D8FE1AEE62F40C3D');
        $this->addSql('ALTER TABLE juegos_datos_categorias_juego_datos_creador DROP FOREIGN KEY FK_70099CBC9816AE29');
        $this->addSql('ALTER TABLE juegos_datos_categorias_juego_datos_creador DROP FOREIGN KEY FK_70099CBC9501F206');
        $this->addSql('ALTER TABLE juegos_datos_categorias_categoria DROP FOREIGN KEY FK_7F73E7FB9816AE29');
        $this->addSql('ALTER TABLE juegos_datos_categorias_categoria DROP FOREIGN KEY FK_7F73E7FB3397707A');
        $this->addSql('ALTER TABLE juegos_datos_plataformas_juego_datos_creador DROP FOREIGN KEY FK_B95B8AF34D5FE582');
        $this->addSql('ALTER TABLE juegos_datos_plataformas_juego_datos_creador DROP FOREIGN KEY FK_B95B8AF39501F206');
        $this->addSql('ALTER TABLE juegos_datos_plataformas_plataforma DROP FOREIGN KEY FK_1716EFDE4D5FE582');
        $this->addSql('ALTER TABLE juegos_datos_plataformas_plataforma DROP FOREIGN KEY FK_1716EFDEEB90E430');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6629AF449');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C63C06B3A1');
        $this->addSql('DROP TABLE categoria');
        $this->addSql('DROP TABLE creador');
        $this->addSql('DROP TABLE juego');
        $this->addSql('DROP TABLE juego_datos_creador');
        $this->addSql('DROP TABLE juego_datos_creador_juego');
        $this->addSql('DROP TABLE juego_datos_creador_creador');
        $this->addSql('DROP TABLE juegos_datos_categorias');
        $this->addSql('DROP TABLE juegos_datos_categorias_juego_datos_creador');
        $this->addSql('DROP TABLE juegos_datos_categorias_categoria');
        $this->addSql('DROP TABLE juegos_datos_plataformas');
        $this->addSql('DROP TABLE juegos_datos_plataformas_juego_datos_creador');
        $this->addSql('DROP TABLE juegos_datos_plataformas_plataforma');
        $this->addSql('DROP TABLE plataforma');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
