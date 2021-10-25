CREATE TABLE IF NOT EXISTS director
(
	ID int not null auto_increment,
	NAME varchar(500) not null,
	PRIMARY KEY (ID)
	);

CREATE TABLE IF NOT EXISTS movie
(
	ID int not null auto_increment,
	TITLE varchar(500) not null,
	RELEASE_YEAR YEAR,
	LENGTH int,
	MIN_AGE int,
	RATING int,

	DIRECTOR_ID int,

	PRIMARY KEY (ID),
	FOREIGN KEY FK_MOVIE_DIRECTOR (DIRECTOR_ID)
	REFERENCES director(ID)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
	);

CREATE TABLE IF NOT EXISTS actor
(
	ID int not null auto_increment,
	NAME varchar(500) not null,
	PRIMARY KEY (ID)
	);

CREATE TABLE IF NOT EXISTS movie_actor
(
	MOVIE_ID int not null,
	ACTOR_ID int not null,
	PRIMARY KEY (MOVIE_ID, ACTOR_ID),
	FOREIGN KEY FK_MA_MOVIE (MOVIE_ID)
	REFERENCES movie(ID)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT,
	FOREIGN KEY FK_MA_ACTOR (ACTOR_ID)
	REFERENCES actor(ID)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
	);

INSERT INTO director (ID, NAME)
VALUES (1, 'Джеймс Кэмерон'),
       (2, 'Ридли Скотт'),
       (3, 'Джон Карпентер'),
       (4, 'Стэнли Кубрик');

INSERT INTO actor (ID, NAME)
VALUES (1, 'Арнольд Шварценеггер'),
       (2, 'Майкл Бин'),
       (3, 'Линда Хэмилтон'),
       (4, 'Сигурни Уивер'),
       (5, 'Том Скеррит'),
       (6, 'Иэн Холм'),
       (7, 'Курт Рассел'),
       (8, 'Кит Дэвид'),
       (9, 'Уилфорд Бримли'),
       (10, 'Джек Николсон'),
       (11, 'Сэм Уортингтон'),
       (12, 'Зои Салдана');


INSERT INTO movie (ID, TITLE, RELEASE_YEAR, LENGTH, MIN_AGE, RATING, DIRECTOR_ID)
VALUES (1, 'Терминатор', 1984, 108, 16, 8.0, 1),
       (2, 'Чужой', 1979, 116, 16, 8.1, 2),
       (3, 'Нечто', 1982, 109, 16, 7.9, 3),
       (4, 'Сияние', 1982, 144, 18, 7.8, 4),
       (5, 'Аватар', 2009, 162, 12, 7.9, 1);



INSERT INTO movie_actor (MOVIE_ID, ACTOR_ID)
VALUES (1, 1),
       (1, 2),
       (1, 3),
       (2, 4),
       (2, 5),
       (2, 6),
       (3, 7),
       (3, 8),
       (3, 9),
       (4, 10),
       (5, 11),
       (5, 12),
       (5, 4);

CREATE TABLE IF NOT EXISTS movie_title
(
	MOVIE_ID int not null,
	LANGUAGE_ID int not null,
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
	ID int not null ,
	NAME varchar(500) not null,
	PRIMARY KEY (ID)
	);
INSERT INTO language(ID, NAME)
VALUES (1, 'русский'),
       (2, 'english');
START TRANSACTION;
INSERT INTO movie_title(movie_title.MOVIE_ID, movie_title.LANGUAGE_ID, movie_title.TITLE)
SELECT movie.ID, language.ID ,movie.TITLE FROM  movie, language WHERE language.NAME='русский';
ALTER TABLE movie DROP COLUMN TITLE;
SELECT * FROM movie_title;