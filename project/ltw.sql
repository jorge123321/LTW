.mode columns

.headers on

PRAGMA foreign_keys = on;

CREATE TABLE User(
	idUser INTEGER PRIMARY KEY AUTOINCREMENT, 
	name TEXT UNIQUE NOT NULL, 
	age INTEGER NOT NULL CHECK (age > 18), 
	gender BOOLEAN NOT NULL, 
	photo STRING NOT NULL);
INSERT INTO User(idUser, name, age, gender, photo) VALUES (0, 'Paulo Silva', 30, 'Male', 'photo1');
INSERT INTO User(idUser, name, age, gender, photo) VALUES (1, 'Tomas Taveira', 56, 'Male', 'photo2');
INSERT INTO User(idUser, name, age, gender, photo) VALUES (2, 'Fatima Teixeira', 32, 'Female', 'photo3');

CREATE TABLE Owners(
	idUser INTEGER PRIMARY KEY AUTOINCREMENT REFERENCES User(idUser));
INSERT INTO Owners(idUser) VALUES (1);

CREATE TABLE Restaurant(
	idRestaurant INTEGER PRIMARY KEY AUTOINCREMENT, 
	name TEXT UNIQUE NOT NULL, 
	location TEXT NOT NULL, 
	price INTEGER, 
	category TEXT, 
	open TEXT, 
	idOwner INTEGER REFERENCES Owners(idUser));
INSERT INTO Restaurant(idRestaurant, name, location, price, category, Open, idOwner) VALUES (0, 'Brasão Cervejaria', 'Baixa', 15, 'Portuguesa', '12:00-24:00', 1);
INSERT INTO Restaurant(idRestaurant, name, location, price, category, Open, idOwner) VALUES (1, 'Flow Restaurant & Bar', 'Cedofeita', 35, 'Mediterrânica', '20:00-24:00', 1);
INSERT INTO Restaurant(idRestaurant, name, location, price, category, Open, idOwner) VALUES (2, 'DeGema', 'Baixa', 10, 'Hamburgueria', '12:00-24:00', 1);
INSERT INTO Restaurant(idRestaurant, name, location, price, category, Open, idOwner) VALUES (3, 'Costa Coffee', 'Baixa', 4, 'Pastelaria', '09:00-24:00', 1);
INSERT INTO Restaurant(idRestaurant, name, location, price, category, Open, idOwner) VALUES (4, 'Reitoria', 'Baixa', 40, 'Bifes', '12:30-23:00', 1);
INSERT INTO Restaurant(idRestaurant, name, location, price, category, Open, idOwner) VALUES (5, 'Cafe Santiago', 'Baixa', 13, 'Portuguesa', '11:00-23:00', 1);
INSERT INTO Restaurant(idRestaurant, name, location, price, category, Open, idOwner) VALUES (6, 'Terminal 4450', 'Leça da Palmeira', 20, 'Bifes', '12:30-23:00', 1);
INSERT INTO Restaurant(idRestaurant, name, location, price, category, Open, idOwner) VALUES (7, 'Cantina 32', 'Baixa', 25, 'Portuguesa', '12:30-22:30', 1);
INSERT INTO Restaurant(idRestaurant, name, location, price, category, Open, idOwner) VALUES (8, 'Cozinha na Baixa', 'Baixa', 15, 'Portuguesa', '12:00-15:00', 1);
INSERT INTO Restaurant(idRestaurant, name, location, price, category, Open, idOwner) VALUES (9, 'BaixóPito', 'Baixa', 15, 'Autor', '12:00-24:00', 1);
INSERT INTO Restaurant(idRestaurant, name, location, price, category, Open, idOwner) VALUES (10, 'Nacox', 'Baixa', 30, 'Bifes', '19:30-23:00', 1);

CREATE TABLE RestaurantReview(
	idUser INTEGER REFERENCES User(idUser), 
	idRestaurant INTEGER REFERENCES Restaurant(idRestaurant), 
	score NUMBER CHECK (score >= 0 AND score<=5), 
	text STRING, 
	PRIMARY KEY(idUser, idRestaurant));
INSERT INTO RestaurantReview(idUser, idRestaurant, score, text) VALUES (0, 1, 5, 'Muito bom');
