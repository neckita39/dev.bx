<?php
/** @var array $movies */
/** @var array $genres */
/** @var string $title */
/** @var string $content */
require_once "./data/movies.php";
require_once "./lib/help-functions/help-func.php";
require_once "./lib/filter-functions/filter-functions.php";
require_once "./lib/template-functions/template-functions.php";

$moviesListPage=renderTemplate("./resources/pages/movies-list.php", [
	'movies' => $movies
]);


renderLayout($moviesListPage, [
	'genres' => $genres
]);
