.mode columns

.headers on

PRAGMA foreign_keys = on;

CREATE TABLE User(
	idUser INTEGER PRIMARY KEY AUTOINCREMENT, 
	name TEXT UNIQUE NOT NULL,
	pass TEXT UNIQUE NOT NULL, 
	age INTEGER NOT NULL CHECK (age > 18), 
	gender BOOLEAN NOT NULL, 
	photo STRING NOT NULL,
	type TEXT NOT NULL);

INSERT INTO User(idUser, name, pass, age, gender, photo, type) VALUES (0, 'Paulo Silva','testpass', 30, 'Male', 'photo1', 'owner');
INSERT INTO User(idUser, name, pass, age, gender, photo, type) VALUES (1, 'Tomas Taveira', '12345', 56, 'Male', 'photo2', 'reviewer');
INSERT INTO User(idUser, name, pass, age, gender, photo, type) VALUES (2, 'Fatima Teixeira', '54321', 32, 'Female', 'photo3', 'reviewer');

CREATE TABLE Restaurant(
	idRestaurant INTEGER PRIMARY KEY AUTOINCREMENT, 
	name TEXT UNIQUE NOT NULL, 
	location TEXT NOT NULL, 
	price INTEGER, 
	category TEXT, 
	open TEXT NOT NULL,
	end TEXT NOT NULL, 
	idOwner INTEGER REFERENCES User(idUser));

INSERT INTO Restaurant(idRestaurant, name, location, price, category, open, end, idOwner) VALUES (0, 'Brasão Cervejaria', 'Baixa', 15, 'Portuguesa', '12:00', '24:00', 0);
INSERT INTO Restaurant(idRestaurant, name, location, price, category, open, end, idOwner) VALUES (1, 'Flow Restaurant & Bar', 'Cedofeita', 35, 'Mediterrânica', '20:00', '24:00', 0);
INSERT INTO Restaurant(idRestaurant, name, location, price, category, open, end, idOwner) VALUES (2, 'DeGema', 'Baixa', 10, 'Hamburgueria', '12:00' ,'24:00', 0);
INSERT INTO Restaurant(idRestaurant, name, location, price, category, open, end, idOwner) VALUES (3, 'Costa Coffee', 'Baixa', 4, 'Pastelaria', '09:00' ,'24:00', 0);

CREATE TABLE RestaurantReview(
	idUser INTEGER REFERENCES User(idUser), 
	idRestaurant INTEGER REFERENCES Restaurant(idRestaurant), 
	score NUMBER CHECK (score >= 0 AND score<=5), 
	text STRING, 
	PRIMARY KEY(idUser, idRestaurant));
INSERT INTO RestaurantReview(idUser, idRestaurant, score, text) VALUES (0, 1, 5, 'Muito bom');
