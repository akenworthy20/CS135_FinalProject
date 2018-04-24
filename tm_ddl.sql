CREATE DATABASE TM; 

USE TM; 

CREATE TABLE Student {
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  first_name VARCHAR (256) NOT NULL,  
  last_name VARCHAR (256) NOT NULL, 
  cell VARCHAR (256) NOT NULL,  
  classes_seeking VARCHAR (256) NOT NULL,
  available_day INT UNSIGNED NOT NULL, 
  available_time TIME NOT NULL,
  grad_year INT UNSIGNED NOT NULL, 
  cc_number INT UNSIGNED NOT NULL, 
  exp_date DATE NOT NULL, 
  sec_code INT UNSIGNED NOT NULL
}

/*Add deposit info to tutor table*/
CREATE TABLE Tutor {
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  first_name VARCHAR (256) NOT NULL,  
  last_name VARCHAR (256) NOT NULL, 
  cell VARCHAR (256) NOT NULL, 
  available_day INT UNSIGNED NOT NULL. 
  available_time TIME NOT NULL,
  grad_year INT UNSIGNED NOT NULL, 
  major VARCHAR (256) NOT NULL 
}

/*Note - removed textbook data element from classes*/
CREATE TABLE Classes {
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  tutor_id INT UNSIGNED NOT NULL FOREIGN KEY REFERENCES TUTOR(id),
  professor VARCHAR (256) NOT NULL,
  subject VARCHAR (256) NOT NULL
  grade_received VARCHAR (256) NOT NULL,  
  school_taken VARCHAR (256) NOT NULL
}

CREATE TABLE Appointments {
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  class_id INT UNSIGNED NOT NULL FOREIGN KEY REFERENCES Classes(id), 
  tutor_id INT UNSIGNED NOT NULL FOREIGN KEY REFERENCES Tutor(id), 
  student_id INT UNSIGNED NOT NULL FOREIGN KEY REFERENCES Student(id), 
  appt_date DATE NOT NULL, 
  appt_time TIME NOT NULL
}
