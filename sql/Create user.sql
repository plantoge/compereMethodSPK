CREATE TABLE user (
	id int AUTO_INCREMENT PRIMARY KEY,
	username varchar(30),
	password varchar(500),
	level enum('guru','admin')
);
