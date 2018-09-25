CREATE DATABASE yeticave
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE ut8_unicode_ci;
  
USE yeticave;

CREATE TABLE users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email CHAR(128) NOT NULL,
    user_pass CHAR(64) NOT NULL,
    user_name CHAR(128) NOT NULL,
    contacts CHAR(255) NOT NULL,
    avatar CHAR(255),
    reg_date DATETIME(0) NOT NULL
);

CREATE UNIQUE INDEX user_email ON users(email);
CREATE INDEX user_id ON users(id);
CREATE INDEX user_name ON users(user_name);

CREATE TABLE categories (
    cat_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    category CHAR(255)
);

CREATE INDEX category_id ON categories(cat_id);

CREATE TABLE lots (
    lot_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    title CHAR(255) NOT NULL,
    category_id INT UNSIGNED NOT NULL,
    description TEXT(1000) NOT NULL,
    img_path CHAR(255) NOT NULL,
    start_date DATETIME(0) NOT NULL,
    start_price INT UNSIGNED NOT NULL,
    end_date DATETIME(0) NOT NULL,
    bet_step INT UNSIGNED NOT NULL
);

CREATE INDEX lot_id ON lots(lot_id);
CREATE INDEX lot_title ON lots(title);
CREATE INDEX lot_user_id ON lots(user_id);
CREATE INDEX lot_cat ON lots(category_id);

ALTER TABLE lots
ADD FOREIGN KEY (user_id)
REFERENCES users(id);

ALTER TABLE lots
ADD FOREIGN KEY (category_id)
REFERENCES categories(cat_id);

CREATE TABLE bets (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    lot_id INT UNSIGNED NOT NULL,
    bet_date DATETIME(0) NOT NULL,
    amount INT UNSIGNED NOT NULL
);

CREATE INDEX bet_id ON bets(id);
CREATE INDEX bet_user ON bets(user_id);
CREATE INDEX bet_lot ON bets(lot_id);

ALTER TABLE bets
ADD FOREIGN KEY (user_id)
REFERENCES users(id);

ALTER TABLE bets
ADD FOREIGN KEY (lot_id)
REFERENCES lots(lot_id);
