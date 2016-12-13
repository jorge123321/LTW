.mode columns

.headers on

PRAGMA foreign_keys = on;

CREATE TABLE User(
	idUser TEXT PRIMARY KEY, 
	name TEXT  NOT NULL,
	pass TEXT NOT NULL,
	age INTEGER NOT NULL CHECK (age >= 18), 
	gender BOOLEAN NOT NULL, 
	photo TEXT NOT NULL,
	type TEXT NOT NULL);

INSERT INTO User(idUser, name, pass, age, gender, photo, type) VALUES ('paulosilva', 'Paulo Silva','testpass', 30, 'Male', 'photo1', 'owner');
INSERT INTO User(idUser, name, pass, age, gender, photo, type) VALUES ('tomastav', 'Tomas Taveira', '12345', 56, 'Male', 'photo2', 'reviewer');
INSERT INTO User(idUser, name, pass, age, gender, photo, type) VALUES ('fateix', 'Fatima Teixeira', '54321', 32, 'Female', 'photo3', 'reviewer');

CREATE TABLE Restaurant(
	idRestaurant INTEGER PRIMARY KEY AUTOINCREMENT, 
	name TEXT UNIQUE NOT NULL, 
	location TEXT NOT NULL, 
	price INTEGER, 
	category TEXT,
	open INTEGER NOT NULL,
	end INTEGER NOT NULL,
	description TEXT,
	idOwner TEXT NOT NULL REFERENCES User(idUser));

INSERT INTO Restaurant(idRestaurant, name, location, price, category, open, end, description, idOwner) VALUES (0, 'Brasão Cervejaria', 'Baixa', 15, 'Portuguesa', '12:00', '24:00','', 'paulosilva');
INSERT INTO Restaurant(idRestaurant, name, location, price, category, open, end, description,idOwner) VALUES (1, 'Flow Restaurant & Bar', 'Cedofeita', 35, 'Mediterranica', '20:00', '24:00','', 'paulosilva');
INSERT INTO Restaurant(idRestaurant, name, location, price, category, open, end, description,idOwner) VALUES (2, 'DeGema', 'Baixa', 10, 'Hamburgueria', '12:00' ,'24:00','', 'paulosilva');
INSERT INTO Restaurant(idRestaurant, name, location, price, category, open, end,description, idOwner) VALUES (3, 'Costa Coffee', 'Baixa', 4, 'Pastelaria', '09:00' ,'24:00', '','paulosilva');
INSERT INTO Restaurant(idRestaurant, name, location, price, category, open, end,description, idOwner) VALUES (4, 'teste', 'Baixa', 4, 'Pastelaria', '09:00' ,'24:00', '','paulosilva');
INSERT INTO Restaurant(idRestaurant, name, location, price, category, open, end,description, idOwner) VALUES (5, 'teste1', 'Baixa', 4, 'kek', '09:00' ,'24:00', '','paulosilva');


CREATE TABLE RestaurantReview(
	idReview INTEGER PRIMARY KEY AUTOINCREMENT,
	idReviewer INTEGER REFERENCES User(idUser),
	idRestaurant INTEGER REFERENCES Restaurant(idRestaurant), 
	score NUMBER CHECK (score >= 0 AND score<=5), 
	text STRING);
INSERT INTO RestaurantReview(idReview, idReviewer, idRestaurant, score, text) VALUES (0,'tomastav', 1, 5, 'Muito bom');