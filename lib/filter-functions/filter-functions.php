<?php
function getFilmsByGenre(array $movies, string $genres): array
{
	return array_filter($movies, function($movie) use ($genres){
		if (in_array($genres, $movie['genres']))
			return $movie['id'];
	});
}
function findById(array $movies, int $id): array
{
	return array_filter($movies, function($movie) use ($id){
		return $movie['id']===$id;
	});
}