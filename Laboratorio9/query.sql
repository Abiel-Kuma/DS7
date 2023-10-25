CREATE TABLE noticias (
    id SMALLINT(5) unsigned NOT NULL AUTO_INCREMENT,
    titulo varchar(100) NOT NULL DEFAULT '',
    texto text NOT NULL,
    categoria ENUM('promociones', 'ofertas', 'costas') NOT NULL DEFAULT 'promociones',
    fecha DATE NOT NULL,
    imagen varchar(100) DEFAULT NULL,
    PRIMARY KEY (id)
);
