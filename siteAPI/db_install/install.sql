CREATE TABLE users ( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(256), 
	email VARCHAR(256), 
	password VARCHAR(256), 
	last_active DATETIME ON UPDATE NOW(), 
	phone VARCHAR(20), 
	address VARCHAR(256),
	change_count INT DEFAULT 0,
);

CREATE TABLE categories ( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
	user_id INT, 
	name VARCHAR(256), 
	table_link VARCHAR(20), 
	order_id INT,
);

--Each is a table_link--
CREATE TABLE education ( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
	cat_id INT, 
	name VARCHAR(256), 
	city VARCHAR(256), 
	state VARCHAR(256), 
	gpa VARCHAR(11), 
	ranking VARCHAR(11), 
	major VARCHAR(256), 
	degree_pursuing VARCHAR(256), 
	time_start INT, 
	time_end INT, 
	order_id INT
);

CREATE TABLE experience ( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
	cat_id INT, 
	organization VARCHAR(256), 
	position VARCHAR(256), 
	info1 VARCHAR(256), 
	location VARCHAR(256), 
	description VARCHAR(512), 
	time_start INT, 
	time_end INT, 
	order_id INT
);

CREATE TABLE award (
	id INT AUTO_INCREMENT PRIMARY KEY, 
	cat_id INT, 
	location VARCHAR(256), 
	position VARCHAR(256), 
	competition VARCHAR(256), 
	time_month VARCHAR(8), 
	year INT(4), 
	order_id INT
);

CREATE TABLE nobullet (
	id INT AUTO_INCREMENT PRIMARY KEY, 
	cat_id INT, 
	description VARCHAR(512), 
	time_month VARCHAR(8), 
	year INT(4), 
	order_id INT
);

CREATE TABLE skill (
	id INT AUTO_INCREMENT PRIMARY KEY, 
	cat_id INT, 
	title VARCHAR(256), 
	description VARCHAR(512), 
	order_id INT
);
