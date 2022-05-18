/**
 * 	Accedemos a la base de datos
 * **/
CREATE DATABASE caribbean_warfare;
use caribbean_warfare;


/**
 * Creamos las tablas necesarias para el proyecto con sus tipos de campos y claves primarias y foráneas
 *
 *
 * Tabla de ranks
 * **/

CREATE TABLE IF NOT EXISTS caribbean_warfare.ranks (
	id INT auto_increment NOT NULL,
	name varchar(100) NOT NULL,
	points INT NOT NULL,
	PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;


/**
 * Tabla de roles (roles)
 */
CREATE TABLE IF NOT EXISTS caribbean_warfare.roles (
	id INT NOT NULL AUTO_INCREMENT,
	role varchar(15) NOT NULL UNIQUE,
	PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;


/**
 * Tabla de regiones (region)
 */
CREATE TABLE IF NOT EXISTS caribbean_warfare.regions (
	id INT NOT NULL AUTO_INCREMENT,
	region varchar(30) NOT NULL UNIQUE,
	PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;


/**
 * Tabla de usuarios (users)
 */
CREATE TABLE IF NOT EXISTS caribbean_warfare.users (
	id INT NOT NULL UNIQUE AUTO_INCREMENT,
	username varchar(20) NOT NULL,
	email varchar(50) NOT NULL UNIQUE,
	password char(60) NOT NULL,
	role_id INT NOT NULL,
	region_id INT NOT NULL,
	`rank_id` INT NOT NULL,
	avatar_id INT,
	register_date datetime,
	PRIMARY KEY (id),
	CONSTRAINT FK_UserRole FOREIGN KEY (role_id) REFERENCES caribbean_warfare.roles(id),
	CONSTRAINT FK_UserRegion FOREIGN KEY (region_id) REFERENCES caribbean_warfare.regions(id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;


/**
 * Tabla de productos (products)
 */
CREATE TABLE IF NOT EXISTS caribbean_warfare.products (
	id INT NOT NULL AUTO_INCREMENT,
	name varchar(50) NOT NULL,
	description varchar(200) NOT NULL,
	price decimal(10,2) NOT NULL,
    discount decimal(10,2),
	`category` varchar(25) NOT NULL,
	stock INT NOT NULL,
	available BOOLEAN NOT NULL,
	image BLOB NOT NULL,
	PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;



/**
 * Tabla de inventario (inventory)
 */
CREATE TABLE IF NOT EXISTS caribbean_warfare.inventory (
	id INT NOT NULL AUTO_INCREMENT,
	user_id INT NOT NULL,
	product_id INT NOT NULL,
	amount INT NOT NULL,
	buy_date datetime,
	PRIMARY KEY (id),
	FOREIGN KEY (product_id) REFERENCES caribbean_warfare.products(id) ON DELETE CASCADE
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;


/*
 * Hacemos una modificación de las tablas Inventario y usuarios, para poder agregar una foreign key que si no no sería posible (para poder agregarla deben de existir las 2 tablas
 * */
ALTER TABLE users ADD CONSTRAINT FK_UserAvatarInventory FOREIGN KEY (avatar_id) REFERENCES caribbean_warfare.inventory(id) ON DELETE CASCADE;
ALTER TABLE inventory ADD CONSTRAINT FK_InventoryUsers FOREIGN KEY (user_id) REFERENCES caribbean_warfare.users(id) ON DELETE CASCADE;


/**
 * Tabla de puntuaciones (scores)
 */
CREATE TABLE IF NOT EXISTS caribbean_warfare.scores (
	id_user INT NOT NULL,
	score INT NOT NULL,
	date datetime,
	PRIMARY KEY (id_user),
	FOREIGN KEY (id_user) REFERENCES caribbean_warfare.users(id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;

/**
 * Tabla de menu de espera para otros jugadores (lobby)
 */
CREATE TABLE IF NOT EXISTS caribbean_warfare.lobby (
	id INT NOT NULL UNIQUE AUTO_INCREMENT,
	`created_at` datetime NOT NULL,
    connections INT NOT NULL,
    user_id1 INT UNIQUE,
    user_id2 INT UNIQUE,
    `status` varchar(20),
	PRIMARY KEY (id),
	FOREIGN KEY (user_id1) REFERENCES caribbean_warfare.users(id),
    FOREIGN KEY (user_id2) REFERENCES caribbean_warfare.users(id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;



/**
 * Tabla de partidas iniciadas (current_games)
 */
CREATE TABLE IF NOT EXISTS caribbean_warfare.current_games (
	id INT NOT NULL UNIQUE AUTO_INCREMENT,
	user_id1 INT NOT NULL UNIQUE,
    user_id2 INT NOT NULL UNIQUE,
    user1_boats varchar(250),
    user2_boats varchar(250),
    user1_slots varchar(250),
    user2_slots varchar(250),
	PRIMARY KEY (id),
	FOREIGN KEY (user_id1) REFERENCES caribbean_warfare.users(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id2) REFERENCES caribbean_warfare.users(id) ON DELETE CASCADE
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;


/**
 * Tabla de todas las partidas iniciadas (acabadas o no), (matches)
 */
CREATE TABLE IF NOT EXISTS caribbean_warfare.matches (
	id INT NOT NULL UNIQUE AUTO_INCREMENT,
	user_id1 INT,
    user_id2 INT,
    winner INT NOT NULL,
    points INT NOT NULL,
    `date` DATETIME NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (user_id1) REFERENCES caribbean_warfare.users(id),
    FOREIGN KEY (user_id2) REFERENCES caribbean_warfare.users(id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;

CREATE VIEW history AS SELECT * FROM matches WHERE user_id1 = "aqui va mi id" OR user_id2 = "aquí va la otra id xd";

