<?php
function cutDescription( array $movies, int $id): string
{

	if (isset($movies))
	{
		foreach ($movies as $movie)
		{
			if ($movie["id"] == $id)
			{
				$movie["description"] = mb_strimwidth($movie['description'], 0, 160, "...");

				return "${movie['description']}";
			}
		}
	}
	return "movies array is not found";
}

function cutTitle(array $movies, int $id): string
{
	if (isset($movies))
	{
		foreach ($movies as $movie)
		{
			if ($movie["id"] == $id)
			{
				$movie["title"] = mb_strimwidth($movie['title'], 0, 25, "...");

				return "${movie['title']}";
			}
		}
	}
	return "movies array is not found";
}

function cutGenres(array $movies, int $id): string
{
	if (isset($movies))
	{
		foreach ($movies as $movie)
		{
			if ($movie["id"] == $id)
			{
				$str = implode(",", $movie['genres']);
				$str = mb_strimwidth($str, 0, 30, "...");

				return $str;
			}
		}
	}
	return "movies array is not found";
}

function formatDuration(array $movies, int $id): string
{
	if (isset($movies))
	{
		foreach ($movies as $movie)
		{
			if ($movie["id"] == $id)
			{
				$hours_dur=(string)date('G:i',mktime(0,$movie['duration']));
				$minuts_dur=(string)$movie['duration'];
				return "$minuts_dur"." мин. / "."$hours_dur";
			}
		}
	}
	return "movies array is not found";
}

function findById(array $movies, int $id)
{
	return array_filter($movies, function($movie) use ($id){
		return $movie['id']===$id;
	});
}

