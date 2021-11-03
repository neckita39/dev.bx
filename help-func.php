<?php
include "movies.php";
//'description' => mb_strimwidth($movie['description'], 0, 180, "..."),
function cutDescription(array $movies, int $id): string
{
	foreach ($movies as $movie)
	{
		if ($movie["id"]==$id)
		{
			$movie["description"]=mb_strimwidth($movie['description'], 0, 150, "...");
			return "${movie['description']}";
		}
	}
	return "f";
}

function cutTitle(array $movies, int $id): string
{
	foreach ($movies as $movie)
	{
		if ($movie["id"]==$id)
		{
			$movie["title"]=mb_strimwidth($movie['title'], 0, 25, "...");
			return "${movie['title']}";
		}
	}
	return "f";
}

