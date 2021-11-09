<?php
/** @var array $movies */
/** @var array $genres */
/** @var array $config */
/** @var string $title */
/** @var string $content */
require_once "./data/movies.php";
require_once "./lib/help-functions/help-func.php";
require_once "./lib/filter-functions/filter-functions.php";
require_once "./lib/template-functions/template-functions.php";
require_once "./config/app.php";
if (isset($_GET['genre']))
{
	$movies=getFilmsByGenre($movies, $genres, $_GET['genre']);
}
$moviesListPage=renderTemplate("./resources/pages/movies-list.php", [
	'movies' => $movies
]);
$currentPage=basename(__FILE__, ".php");

renderLayout($moviesListPage, [
	'config' => $config,
	'genres' => $genres,
	'currentPage' => $currentPage
]);
