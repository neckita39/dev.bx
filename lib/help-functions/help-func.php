<?php
function cutDescription(string $desc): string
{
	$desc = mb_strimwidth($desc, 0, 160, "...");
	return $desc;
}

function cutTitle(string $title): string
{
	$title = mb_strimwidth($title, 0, 25, "...");
	return $title;
}

function cutGenres(array $moviesGenre): string
{
	if (isset($moviesGenre))
	{
		$str = implode(",", $moviesGenre);
		$str = mb_strimwidth($str, 0, 30, "...");
		return $str;
	}
	return "movies array is not found";
}

function formatDuration(string $duration): string
{
	$hours_dur=(string)date('G:i',mktime(0,$duration));
	$minuts_dur=(string)$duration;
	return "$minuts_dur"." мин. / "."$hours_dur";

}



