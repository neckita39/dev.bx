<?php
function cutDescription(string $desc): string
{
	return mb_strimwidth($desc, 0, 160, "...");
}

function cutTitle(string $title): string
{
	return mb_strimwidth($title, 0, 25, "...");
}

function cutGenres(array $moviesGenre)
{
	$genre="";
	if (isset($moviesGenre))
	{
		foreach ($moviesGenre as $item)
		{
			$genre .=$item['NAME'].", ";
		}
	}
	return mb_strimwidth(substr($genre, 0, -2), 0, 30, "...");
}

function formatDuration(string $duration): string
{
	$hours_dur=(string)date('G:i',mktime(0,$duration));
	$minuts_dur=(string)$duration;
	return (string)$minuts_dur ." мин. / ". (string)$hours_dur;

}





