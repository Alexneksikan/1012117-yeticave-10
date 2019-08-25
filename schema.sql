CREATE DATABASE yeticave
 DEFAULT CHARACTER SET utf8
 DEFAULT COLLATE utf8_general_ci;

 USE yeticave;

CREATE TABLE users (
 id			INT AUTO_INCREMENT PRIMARY KEY,
 email 		CHAR(128) NOT NULL UNIQUE,
 password	CHAR(64) NOT NULL,
 name 		CHAR(50) NOT NULL,
 contact 	TEXT NOT NULL
);

CREATE TABLE categories (
  id			INT(2) AUTO_INCREMENT PRIMARY KEY,
  name			CHAR(20),
  cymbol_code	CHAR(10)
);

CREATE TABLE lots (
  id 			INT AUTO_INCREMENT PRIMARY KEY,
  name 			CHAR(50) NOT NULL,
  description 	VARCHAR(300) NOT NULL,
  image 		CHAR(25) NOT NULL,
  category 		INT(1) NOT NULL,
  start_date 	TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  start_price 	DECIMAL(10,2) NOT NULL,
  finish_price 	DECIMAL(10,2),
  step 			INT NOT NULL,
  author 		INT,
  winner 		INT
);

CREATE TABLE bets (
  date_bet	TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  bet 		DECIMAL(10,2),
  user 		INT,
  id_lot 	INT
);

CREATE INDEX name ON lots(name);
CREATE INDEX description ON lots(description);
CREATE INDEX date ON lots(start_date);
CREATE INDEX date_bet ON bets(date_bet);
CREATE INDEX user ON bets(user);
CREATE INDEX id_lot ON bets(id_lot);
