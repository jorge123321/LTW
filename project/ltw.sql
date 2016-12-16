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
INSERT INTO User(idUser, name, pass, age, gender, photo, type) VALUES ('joaoramos', 'João Silva','testpass', 20, 'Male', 'photo1', 'owner');
INSERT INTO User(idUser, name, pass, age, gender, photo, type) VALUES ('luissousa', 'Luís Sousa','testpass', 25, 'Male', 'photo1', 'owner');
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
	description VARCHAR,
	idOwner TEXT NOT NULL REFERENCES User(idUser));

INSERT INTO Restaurant(idRestaurant, name, location, price, category, open, end, description, idOwner) VALUES (0, 'Brasao Cervejaria', 'Baixa', 15, 'Portuguesa', '12:00', '4:00','Partilhe bons momentos à mesa com os seus amigos!', 'paulosilva');
INSERT INTO Restaurant(idRestaurant, name, location, price, category, open, end, description,idOwner) VALUES (1, 'Flow Restaurant & Bar', 'Cedofeita', 35, 'Mediterranica', '20:00', '24:00','Simplesmente..deixe-se encantar!', 'paulosilva');
INSERT INTO Restaurant(idRestaurant, name, location, price, category, open, end, description,idOwner) VALUES (2, 'DeGema', 'Baixa', 10, 'Hamburgueria', '12:00' ,'24:00','Sala reservada para jantares de grupo animados. ', 'paulosilva');
INSERT INTO Restaurant(idRestaurant, name, location, price, category, open, end,description, idOwner) VALUES (3, 'Costa Coffee', 'Baixa', 4, 'Pastelaria', '13:00' ,'18:00', 'A elegância em plena baixa do Porto é servida aqui.','joaoramos');
INSERT INTO Restaurant(idRestaurant, name, location, price, category, open, end,description, idOwner) VALUES (4, 'Leitaria da Baixa', 'Baixa', 7, 'Pastelaria', '09:00' ,'24:00', 'Conheça a nova carta de cocktails!','joaoramos');
INSERT INTO Restaurant(idRestaurant, name, location, price, category, open, end,description, idOwner) VALUES (5, 'Cantina 32', 'Baixa', 35, 'Vegetariana', '09:00' ,'24:00', 'A excelência da cozinha Nortenha.','joaoramos');
INSERT INTO Restaurant(idRestaurant, name, location, price, category, open, end,description, idOwner) VALUES (6, 'O Diplomata', 'Baixa', 39, 'Sobremesas', '10:00' ,'20:00', 'Refeições rápidas.','luissousa');
INSERT INTO Restaurant(idRestaurant, name, location, price, category, open, end,description, idOwner) VALUES (7, 'Terminal 4450', 'Leça da Palmeira', 40, 'Bifes', '12:00' ,'15:00', 'Melhores Carnes.','luissousa');

CREATE TABLE RestaurantReview(
	idReview INTEGER PRIMARY KEY AUTOINCREMENT,
	idReviewer TEXT NOT NULL REFERENCES User(idUser),
	idRestaurant INTEGER REFERENCES Restaurant(idRestaurant), 
	score NUMBER CHECK (score >= 0 AND score<=5), 
	text VARCHAR);
INSERT INTO RestaurantReview(idReview, idReviewer, idRestaurant, score, text) VALUES (0,'tomastav', 1, 5, 'Muito bom');

CREATE TABLE Reply(
	idReply INTEGER PRIMARY KEY AUTOINCREMENT,
	idReview INTEGER REFERENCES RestaurantReview(idReview),
	idReplyer TEXT NOT NULL REFERENCES User(idUser),
	text VARCHAR
);
CREATE TABLE Photo(
	idPhoto INTEGER PRIMARY KEY AUTOINCREMENT,
	idRestaurant INTEGER REFERENCES Restaurant(idRestaurant),
	idOwner TEXT NOT NULL REFERENCES User(idUser),
	text VARCHAR
);

INSERT INTO PHOTO(idPhoto,idRestaurant,idOwner,text) VALUES (0,0,'paulosilva','images/Brasao Cervejaria_0.jpg');
INSERT INTO PHOTO(idPhoto,idRestaurant,idOwner,text) VALUES (1,1,'paulosilva','images/Flow Restaurant & Bar_0.jpg');
INSERT INTO PHOTO(idPhoto,idRestaurant,idOwner,text) VALUES (2,2,'paulosilva','images/DeGema_0.jpg');
INSERT INTO PHOTO(idPhoto,idRestaurant,idOwner,text) VALUES (3,3,'joaoramos','images/Costa Coffee_0.jpg');
INSERT INTO PHOTO(idPhoto,idRestaurant,idOwner,text) VALUES (4,4,'joaoramos','images/Leitaria da Baixa_0.jpg');
INSERT INTO PHOTO(idPhoto,idRestaurant,idOwner,text) VALUES (5,5,'joaoramos','images/Cantina 32_0.jpg');
INSERT INTO PHOTO(idPhoto,idRestaurant,idOwner,text) VALUES (6,6,'luissousa','images/O Diplomata_0.jpg');
INSERT INTO PHOTO(idPhoto,idRestaurant,idOwner,text) VALUES (7,7,'luissousa','images/Terminal 4450_0.jpg');