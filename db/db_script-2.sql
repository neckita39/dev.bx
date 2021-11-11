#1. Вывести список фильмов, в которых снимались одновременно Арнольд Шварценеггер* и Линда Хэмилтон*.
#   Формат: ID фильма, Название на русском языке, Имя режиссёра.

SELECT  mt.MOVIE_ID, mt.TITLE, d.NAME
FROM  movie_title mt
	INNER JOIN movie_actor ma_1 on mt.MOVIE_ID = ma_1.MOVIE_ID AND ma_1.ACTOR_ID=1
	INNER JOIN movie_actor ma_3 on mt.MOVIE_ID = ma_3.MOVIE_ID AND ma_3.ACTOR_ID=3
	INNER JOIN movie m on m.ID = mt.MOVIE_ID
	INNER JOIN director d on m.DIRECTOR_ID = d.ID
WHERE mt.LANGUAGE_ID='ru';

#2. Вывести список названий фильмов на англйском языке с "откатом" на русский, в случае если название на английском не задано.
#   Формат: ID фильма, Название.

SELECT m.ID, IF(mt.TITLE IS NULL, (SELECT TITLE FROM movie_title WHERE movie_title.MOVIE_ID=m.ID), mt.TITLE)
FROM movie m
	LEFT JOIN movie_title mt on m.ID = mt.MOVIE_ID AND mt.LANGUAGE_ID = 'en';

#3. Вывести самый длительный фильм Джеймса Кэмерона*.
#   Формат: ID фильма, Название на русском языке, Длительность.
#(Бонус – без использования подзапросов)

SELECT m.ID, mt.TITLE, MAX(m.LENGTH)
FROM movie m
	     INNER JOIN director d on m.DIRECTOR_ID = d.ID and d.ID=1
	     INNER JOIN movie_title mt on m.ID = mt.MOVIE_ID AND mt.LANGUAGE_ID='ru';

#4. ** Вывести список фильмов с названием, сокращённым до 10 символов. Если название короче 10 символов – оставляем как есть. Если длиннее – сокращаем до 10 символов и добавляем многоточие.
#   Формат: ID фильма, сокращённое название

SELECT mt.MOVIE_ID, IF(CHAR_LENGTH(mt.TITLE)>10, CONCAT(SUBSTRING(mt.TITLE, 1, 10), '...'), mt.TITLE)
FROM movie_title mt;

#5. Вывести количество фильмов, в которых снимался каждый актёр.
#   Формат: Имя актёра, Количество фильмов актёра.

SELECT  a.NAME, COUNT(ma.MOVIE_ID)
FROM  actor a
	INNER JOIN movie_actor ma on a.ID = ma.ACTOR_ID
GROUP BY a.NAME;

#6. Вывести жанры, в которых никогда не снимался Арнольд Шварценеггер*.
#   Формат: ID жанра, название

SELECT DISTINCT g.ID, g.NAME
FROM  movie_actor ma
	      INNER JOIN movie_genre mg on ma.MOVIE_ID = mg.MOVIE_ID and ma.ACTOR_ID=1
	      RIGHT JOIN genre g on mg.GENRE_ID = g.ID
WHERE mg.GENRE_ID IS NULL;

#7. Вывести список фильмов, у которых больше 3-х жанров.
#   Формат: ID фильма, название на русском языке
SELECT m.ID, mt.TITLE, mg.GENRE_ID
FROM movie m
	     INNER JOIN movie_title mt on m.ID = mt.MOVIE_ID
	     INNER JOIN movie_genre mg on m.ID = mg.MOVIE_ID
WHERE mt.LANGUAGE_ID='ru'
GROUP BY mt.TITLE HAVING COUNT(*)>3;

	#8. Вывести самый популярный жанр для каждого актёра.
#   Формат вывода: Имя актёра, Жанр, в котором у актёра больше всего фильмов.

SELECT actor.NAME,
       (SELECT g.NAME
	    FROM genre g
		        INNER JOIN movie_genre mg on g.ID = mg.GENRE_ID
		        INNER JOIN movie_actor ma on mg.MOVIE_ID = ma.MOVIE_ID
		        INNER JOIN actor a on ma.ACTOR_ID = a.ID WHERE a.ID = actor.ID
	       GROUP BY g.NAME
	       ORDER BY COUNT(*) DESC
	       LIMIT 1)
FROM actor;

























