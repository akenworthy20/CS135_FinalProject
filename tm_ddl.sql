CREATE DATABASE TM;

USE TM;

CREATE TABLE Student (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(256) NOT NULL,
  email VARCHAR(256) NOT NULL,
  phone_number VARCHAR (256) NOT NULL,
  major VARCHAR (256) NOT NULL,
  monday TINYINT(1),
  tuesday TINYINT(1),
  wednesday TINYINT(1),
  thursday TINYINT(1),
  friday TINYINT(1),
  saturday TINYINT(1),
  sunday TINYINT(1),
  grad_year INT UNSIGNED NOT NULL
);

/*Add deposit info to tutor table*/
CREATE TABLE Tutor (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(256) NOT NULL,
  email VARCHAR (256) NOT NULL,
  phone_number VARCHAR (256) NOT NULL,
  year VARCHAR (256) NOT NULL,
  major VARCHAR (256) NOT NULL,
  gpa VARCHAR (256),
  bio VARCHAR (256),
  monday TINYINT(1),
  tuesday TINYINT(1),
  wednesday TINYINT(1),
  thursday TINYINT(1),
  friday TINYINT(1),
  saturday TINYINT(1),
  sunday TINYINT(1)
);

/*Note - removed textbook data element from classes
CREATE TABLE Classes {
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  tutor_id INT UNSIGNED NOT NULL FOREIGN KEY REFERENCES TUTOR(id),
  professor VARCHAR (256) NOT NULL,
  subject VARCHAR (256) NOT NULL
  grade_received VARCHAR (256) NOT NULL,
  school_taken VARCHAR (256) NOT NULL
}
*/
