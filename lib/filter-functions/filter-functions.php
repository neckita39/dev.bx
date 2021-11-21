<?php
function getFilmsByGenre(array $movies, array $genres, string $currentGenre): array
{
	foreach ($genres as $genre=>$code)
	{
		if ($currentGenre===$genre)
			$translateGenre=$code;

	}
	return array_filter($movies, static function($movie) use ($translateGenre){
		if (in_array($translateGenre, $movie['genres'], true))
		{
			return $movie['id'];
		}
	});
}
function findById(array $movies, string $id): array
{
	return array_filter($movies, static function($movie) use ($id){
		return $movie['id']===(int)$id;
	});
}