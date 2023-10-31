hay te dejo el query

CREATE TABLE task(
	ID int PRIMARY KEY AUTO_INCREMENT NOT NULL,
	Titulo VARCHAR(255) NOT NULL,
    Descripcion Text,
    Estado VARCHAR(50),
    Fecha DATE DEFAULT CURRENT_DATE()
)