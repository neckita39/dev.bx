<?php
function getFilmsByGenre(array $movies, string $genres)
{
	return array_filter($movies, function($movie) use ($genres){
		if (in_array($genres, $movie['genres']))
			return $movie['id'];
	});
}
