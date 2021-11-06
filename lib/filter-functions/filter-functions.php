<?php
function getFilmsByGenre(array $movies, string $genre): string
{
	foreach ($movies as $movie)
	{
		if (in_array($genre, $movie['genres']))
		{
			return "${movie['title']} \n";
		}
	}
}
