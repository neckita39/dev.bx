<?php

function getGenres(mysqli $database): array
{
	$queryGenre = "SELECT * FROM genre";
	$result = mysqli_query($database, $queryGenre);
	if (!$result)
	{
		$error = mysqli_errno($database) . " : " . mysqli_error($database);
		trigger_error($error, E_USER_ERROR);
	}
	$genres = [];
	while ($row = mysqli_fetch_assoc($result))
	{
		$genres[$row['ID']] = [
			'CODE' => $row['CODE'],
			'NAME' => $row['NAME'],
		];
	}
	return $genres;
}

function getActors(mysqli $database): array
{
	$queryActor = "SELECT * FROM actor";
	$result = mysqli_query($database, $queryActor);
	if (!$result)
	{
		$error = mysqli_errno($database) . " : " . mysqli_error($database);
		trigger_error($error, E_USER_ERROR);
	}
	$actors = [];
	while ($row = mysqli_fetch_assoc($result))
	{
		$actors[$row['ID']] = [
			'name' => $row['NAME'],
		];
	}
	return $actors;
}

function getQuery(): string
{
	return "SELECT m.ID as ID, TITLE, ORIGINAL_TITLE, DESCRIPTION, DURATION, AGE_RESTRICTION, RELEASE_DATE, RATING, d.NAME as DIRECTOR,
       (SELECT GROUP_CONCAT(mg.GENRE_ID) FROM movie_genre mg WHERE mg.MOVIE_ID = m.ID) as GENRES,
       (SELECT GROUP_CONCAT(ma.ACTOR_ID) FROM movie_actor ma WHERE m.ID = ma.MOVIE_ID) as ACTORS
		FROM movie m
	     INNER JOIN director d on m.DIRECTOR_ID = d.ID";
}

function getMovies(mysqli $database, array $genres, string $code = null): array
{
	$query = getQuery();
	if ($code)
	{
		$code=mysqli_real_escape_string($database, $code);
		$query .= "	INNER JOIN movie_genre g on m.ID = g.MOVIE_ID INNER JOIN genre g2 on g.GENRE_ID = g2.ID AND g2.CODE='$code'";
	}

	$result = mysqli_query($database, $query);
	if (!$result)
	{
		$error = mysqli_errno($database) . " : " . mysqli_error($database);
		trigger_error($error, E_USER_ERROR);
	}
	$moviesList=[];
	while ($row = mysqli_fetch_assoc($result))
	{
		$moviesList[] = [
			'id' => $row['ID'],
			'title' => $row['TITLE'],
			'original-title' => $row['ORIGINAL_TITLE'],
			'description' => $row['DESCRIPTION'],
			'duration' => $row['DURATION'],
			'age_restriction' => $row['AGE_RESTRICTION'],
			'rating' => $row['RATING'],
			'director' => $row['DIRECTOR'],
			'genres' => $row['GENRES'],
		];
	}
	foreach ($moviesList as $item => $gen)
	{
		$moviesList[$item]['genres'] = parseGenre($gen['genres'], $genres);
	}
	return $moviesList;
}

function parseGenre(string $moviesGenres, array $genres): array
{
	$moviesGenresArray = explode(",", $moviesGenres);
	return array_map(static function($id) use ($genres) {
		return $genres[$id];
	}, $moviesGenresArray);
}

function parseActors(string $movieActors, array $actors): array
{
	$movieActorsArray = explode(",", $movieActors);
	return array_map(static function($id) use ($actors) {
		return $actors[$id];
	}, $movieActorsArray);
}

function getMovieFromDBByID(mysqli $database, int $id, array $actors): array
{
	$query = getQuery()."	WHERE m.ID='$id'";
	$result = mysqli_query($database, $query);
	if (!$result)
	{
		$error = mysqli_errno($database) . " : " . mysqli_error($database);
		trigger_error($error, E_USER_ERROR);
	}

	if (!$result)
	{
		$error = mysqli_errno($database) . " : " . mysqli_error($database);
		trigger_error($error, E_USER_ERROR);
	}
	$moviesList=[];
	while ($row = mysqli_fetch_assoc($result))
	{
		$moviesList[] = [
			'id' => $row['ID'],
			'title' => $row['TITLE'],
			'original-title' => $row['ORIGINAL_TITLE'],
			'description' => $row['DESCRIPTION'],
			'duration' => $row['DURATION'],
			'age_restriction' => $row['AGE_RESTRICTION'],
			'release_date'=>$row['RELEASE_DATE'],
			'rating' => $row['RATING'],
			'director' => $row['DIRECTOR'],
			'actors' => $row['ACTORS'],
		];
	}
	foreach ($moviesList as $item => $act)
	{
		$moviesList[$item]['actors'] = parseActors($act['actors'], $actors);
	}
	return $moviesList;
}
