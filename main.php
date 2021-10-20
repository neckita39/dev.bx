<?php
require "funcs.php";
echo "Enter your age: ";
$input_age=readline();
if (isCorrect($input_age))
{
	getMoviesList($movies, (int)$input_age);
}