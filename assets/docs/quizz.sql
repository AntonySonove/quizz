CREATE DATABASE quizz;
USE quizz;

CREATE TABLE users(
   id_users INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   firstname VARCHAR(50),
   lastname VARCHAR(50),
   email VARCHAR(50),
   `password` VARCHAR(255),
   roles VARCHAR(50),
   avatar VARCHAR(255)
);

CREATE TABLE question(
   id_question INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   title VARCHAR(100),
   `description` VARCHAR(255),
   img VARCHAR(255),
   multiple INT
);

CREATE TABLE category(
   id_category INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   title VARCHAR(50)
);

CREATE TABLE answer(
   id_answer INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   `text` VARCHAR(100),
   valid BOOLEAN,
   answer_point INT,
   id_question INT NOT NULL
);

CREATE TABLE quizz(
   id_quizz INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   title VARCHAR(255),
   `description` TEXT,
   img VARCHAR(255)
);

CREATE TABLE played(
   id_played INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   sucessfull BOOLEAN,
   create_at DATE,
   id_users INT NOT NULL,
   id_quizz INT NOT NULL,
   id_question INT NOT NULL
);

CREATE TABLE to_qualify(
   id_category INT,
   id_quizz INT,
   PRIMARY KEY(id_category, id_quizz)
);

CREATE TABLE to_contain(
   id_question INT,
   id_quizz INT,
   PRIMARY KEY(id_question, id_quizz)
);

CREATE TABLE to_answer(
   id_answer INT,
   id_played INT,
   PRIMARY KEY(id_answer, id_played)
);

ALTER TABLE answer
	ADD CONSTRAINT fk_question_answer
    FOREIGN KEY (id_question) REFERENCES question (id_question);

ALTER TABLE to_qualify
	ADD CONSTRAINT fk_category_to_qualify
    FOREIGN KEY (id_category) REFERENCES category (id_category);
    
ALTER TABLE to_qualify
	ADD CONSTRAINT fk_quizz_to_qualify
    FOREIGN KEY (id_quizz) REFERENCES quizz (id_quizz);

ALTER TABLE to_contain
	ADD CONSTRAINT fk_quizz_to_contain
	FOREIGN KEY (id_quizz) REFERENCES quizz (id_quizz);

ALTER TABLE to_contain
	ADD CONSTRAINT fk_question_to_contain
	FOREIGN KEY (id_question) REFERENCES question (id_question);
   
ALTER TABLE to_answer
	ADD CONSTRAINT fk_answer_to_answer
    FOREIGN KEY (id_answer) REFERENCES answer (id_answer);
    
ALTER TABLE to_answer
	ADD CONSTRAINT fk_played_to_answer
    FOREIGN KEY (id_played) REFERENCES played (id_played);

ALTER TABLE played
	ADD CONSTRAINT fk_users_played
    FOREIGN KEY (id_users) REFERENCES users (id_users);
    
ALTER TABLE played
	ADD CONSTRAINT fk_quizz_played
    FOREIGN KEY (id_quizz) REFERENCES quizz (id_quizz);
    
ALTER TABLE played
	ADD CONSTRAINT fk_question_played
    FOREIGN KEY (id_question) REFERENCES question (id_question);