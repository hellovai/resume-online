CREATE TABLE IF NOT EXISTS `ci_sessions` (
session_id varchar(40) DEFAULT '0' NOT NULL,
ip_address varchar(45) DEFAULT '0' NOT NULL,
user_agent varchar(120) NOT NULL,
last_activity int(10) unsigned DEFAULT 0 NOT NULL,
user_data text NOT NULL,
PRIMARY KEY (session_id),
KEY `last_activity_idx` (`last_activity`)
);

/*User information*/

CREATE TABLE users (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(128), email VARCHAR(256), password VARCHAR(512));
CREATE TABLE address (id INT AUTO_INCREMENT PRIMARY KEY, user_id INT, address VARCHAR(512) , def VARCHAR(64) );
CREATE TABLE website (id INT  AUTO_INCREMENT PRIMARY KEY,user_id INT , url  VARCHAR(256) , def VARCHAR(64) );
CREATE TABLE phone (id INT  AUTO_INCREMENT PRIMARY KEY,user_id INT , numbers VARCHAR(10) , def VARCHAR(64) );

/*Resume Stuff*/
CREATE TABLE cat (id INT AUTO_INCREMENT PRIMARY KEY, user_id INT, type_id INT, title VARCHAR(64), order_id INT);
/*1 - Education*/
CREATE TABLE uni (id INT  AUTO_INCREMENT PRIMARY KEY,  cat_id INT,  name VARCHAR(128), gpa VARCHAR(10) , degree VARCHAR(256) , description VARCHAR(512) , start INT(8) , finish INT(8), order_id INT);
CREATE TABLE courses (id INT AUTO_INCREMENT PRIMARY KEY, uni_id INT , course VARCHAR(128), order_id INT);
/*2 - Experience*/
CREATE TABLE experience (id INT AUTO_INCREMENT PRIMARY KEY, cat_id INT , position VARCHAR(128) , company VARCHAR(128) , location VARCHAR(128) , start INT(8) , finish INT(8), order_id INT);
CREATE TABLE descript (id INT AUTO_INCREMENT PRIMARY KEY, exp_id INT , phrase VARCHAR(512), order_id INT);
/*3 - Skills*/
CREATE TABLE skill_header (id INT AUTO_INCREMENT PRIMARY KEY, cat_id INT, name VARCHAR(128), order_id INT);
CREATE TABLE skills (id INT AUTO_INCREMENT PRIMARY KEY, header_id INT, skill_id INT, order_id INT);
CREATE TABLE skill_list (id INT AUTO_INCREMENT PRIMARY KEY,  name VARCHAR(128));
CREATE TABLE skill_queue (id INT AUTO_INCREMENT PRIMARY KEY,  name VARCHAR(128));
/*4 - Honors*/
CREATE TABLE honors (id INT AUTO_INCREMENT PRIMARY KEY, cat_id INT, name VARCHAR(128), description VARCHAR(256), location VARCHAR(128), acquired INT(8), order_id INT);
/*5 - Additional Information*/
CREATE TABLE additional (id INT AUTO_INCREMENT PRIMARY KEY, cat_id INT, field VARCHAR(1024), order_id INT);

/*Supplementary Stuff*/
CREATE TABLE document (id INT AUTO_INCREMENT PRIMARY KEY, user_id INT , filename VARCHAR(128), created DATETIME, ispublic INT, ext VARCHAR(4));
CREATE TABLE docname (id INT AUTO_INCREMENT PRIMARY KEY, doc_id INT, name VARCHAR(256));

CREATE TABLE cover_letter (id INT AUTO_INCREMENT PRIMARY KEY, user_id INT , info TEXT, title VARCHAR(128), created DATETIME, updated DATETIME);

CREATE TABLE reference (id INT AUTO_INCREMENT PRIMARY KEY, user_id INT , name VARCHAR(128) , phone VARCHAR(10) , email VARCHAR(256) , address VARCHAR(512) , company VARCHAR(512) , account_id INT, order_id INT);
