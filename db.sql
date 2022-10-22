CREATE DATABASE address_book_db;

USE address_book_db;

CREATE TABLE address_table (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    address varchar(255),
    phone VARCHAR(50),
    email VARCHAR(50)
);

INSERT INTO address_table (name, address, phone, email) 
    VALUES ("Jack Smith", "123 ABC ST. New York", "123-456-789", "jack123@gmail.com");
    