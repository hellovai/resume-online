users -> (id, name, email, password)

address -> (id, user_id, address, type)
website -> (id, user_id, type, url)
phone -> (id, user_id, number, type)

-2. coverletter -> (id, user_id, text)

-1. reference -> (id, user_id, name, phone, email, address_id, company, account_id)

1. uni -> (id, user_id, name, gpa, degree, info, start, end)
	course -> (id, edu_id, course)

2. exp -> (id, user_id, positon, company, location, start, end) 
	descript -> (id, exp_id, phrase)

CREATE TABLE users (INT id AUTO_INCREMENT PRIMARY KEY, VARCHAR(128) name, VARCHAR(256) email, VARCHAR(512) password, VARCHAR(40) salt);

CREATE TABLE address (INT id AUTO_INCREMENT PRIMARY KEY, INT user_id, VARCHAR(512) address, VARCHAR(64) type);

CREATE TABLE website (INT id AUTO_INCREMENT PRIMARY KEY, INT user_id,  VARCHAR(256) url, VARCHAR(64) type);

CREATE TABLE phone (INT id AUTO_INCREMENT PRIMARY KEY, INT user_id,  VARCHAR(10) number, VARCHAR(64) type);

CREATE TABLE cover_letter (INT id AUTO_INCREMENT PRIMARY KEY, INT user_id, TEXT info);

CREATE TABLE reference (INT id AUTO_INCREMENT PRIMARY KEY, INT user_id, VARCHAR(128) name, VARCHAR(10) phone, VARCHAR(256) email, INT address_id, VARCHAR(512) company, INT account_id);

CREATE TABLE university (INT id AUTO_INCREMENT PRIMARY KEY, INT user_id, VARCHAR(128) name, VARCHAR(10) gpa, VARCHAR(256) degree, VARCHAR(512) desc, INT(8) start, INT(8) finish);

CREATE TABLE courses (INT id AUTO_INCREMENT PRIMARY KEY, INT uni_id, VARCHAR(128) course);


