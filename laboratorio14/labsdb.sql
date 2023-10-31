
CREATE TABLE usuarios(
    id smallint(5) unsigned NOT NULL auto_increment,
    usuario varchar(20) NOT NULL default '',
    clave varchar(20) NOT NULL default '',
    PRIMARY KEY (id)
);

INSERT INTO usuarios VALUES(1,'testuser','teXB5LK3JWG6g');

DELIMITER $$
CREATE PROCEDURE sp_validar_usuario(
    IN param_user VARCHAR(255),
    IN param_pass VARCHAR(255)
)
BEGIN
    SET @s = CONCAT("SELECT COUNT(*) FROM usuarios WHERE usuario='", param_user, "' AND clave='", param_pass, "'");
    
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END;
$$
DELIMITER ;
