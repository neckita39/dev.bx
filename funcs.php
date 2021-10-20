<?php
require "movies (1).php";
function printWarning(): void
{
	echo "Invalid type of age";
}
function isCorrect($input_age) : bool
{
	if (is_numeric($input_age))
	{
		return true;
	}
	else
	{
		printWarning();

		return false;
	}
}

function getMoviesList(array $movies, int $input_age): void
{
	$count=0;
	foreach ($movies as $movie)
	{
		if ($movie["age_restriction"]<=$input_age)
		{
			$count++;
			echo "$count.  ${movie['title']} (${movie['release_year']}), ${movie['age_restriction']}+, Rating - ${movie['rating']} \n";
		}
	}
}