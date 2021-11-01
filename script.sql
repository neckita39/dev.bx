CREATE TABLE IF NOT EXISTS movie_title
(
	MOVIE_ID int not null,
	LANGUAGE_ID varchar(2) not null,
	TITLE varchar(500) not null,

	FOREIGN KEY FK_MOVIE_ID (MOVIE_ID)
	REFERENCES movie(ID)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT,
	FOREIGN KEY FK_LANGUAGE_ID(LANGUAGE_ID)
	REFERENCES language(ID)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
	);

CREATE TABLE IF NOT EXISTS language
(
	ID varchar(2) not null ,
	NAME varchar(500) not null,
	PRIMARY KEY (ID)
	);
INSERT INTO language(ID, NAME)
VALUES ('ru', 'русский'),
       ('en', 'english');
START TRANSACTION;
INSERT INTO movie_title(movie_title.MOVIE_ID, movie_title.LANGUAGE_ID, movie_title.TITLE)
SELECT movie.ID, language.ID ,movie.TITLE FROM  movie, language WHERE language.NAME='русский';
ALTER TABLE movie DROP COLUMN TITLE;
SELECT * FROM movie_title;