<?php
/** @var array $movies */
/** @var array $genres */
/** @var array $config */
/** @var string $title */
/** @var string $content */
/** @var array $genres */
/** @var mysqli $database */
/** @var array $connectionData */

require_once "./data/db_init.php";
require_once "./lib/help-functions/help-func.php";
require_once "./lib/db-functions/db-functions.php";
require_once "./lib/filter-functions/filter-functions.php";
require_once "./lib/template-functions/template-functions.php";
require_once "./config/app.php";
$database=connectToDatabase($connectionData);
$genres=getGenres($database);
$movies=getMovies($database, $genres);

if (isset($_GET['genre']))
{
	$movies=getMovies($database, $genres, $_GET['genre']);
	$currentPage=$_GET['genre'];
}
else
{
	$currentPage=basename(__FILE__, ".php");
}
$moviesListPage=renderTemplate("./resources/pages/movies-list.php", [
	'movies' => $movies
]);
renderLayout($moviesListPage, [
	'config' => $config,
	'genres' => $genres,
	'currentPage' => $currentPage
]);
