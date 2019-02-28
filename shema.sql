CREATE TABLE users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	email CHAR(128),
	password CHAR(64),
	data_register date,
	name CHAR(10),
	ava CHAR(20),
	contact CHAR(30),
	lots_id INT,
	rats_id INT
);

CREATE TABLE categories (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name CHAR(64)
);

CREATE TABLE lots (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name CHAR(64),
	cat_id INT,
	description TEXT,
	img_path CHAR(64),
	start_price INT,
	step INT,
	date_init date,
	date_end date,
	autor_id INT,
	winner_id INT,
	count_favor INT
);

CREATE TABLE rats (
	id INT AUTO_INCREMENT PRIMARY KEY,
	date_rat date,
	price INT,
	autor_id INT,
	lots_id INT
);


CREATE INDEX c_lots ON lots(name);
CREATE INDEX c_users ON users(email);
CREATE UNIQUE INDEX u_email ON users(email);
CREATE UNIQUE INDEX u_categories ON categories(name);