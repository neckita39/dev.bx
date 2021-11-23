<?php
/** @var array $movies */
/** @var array $genres */
/** @var array $config */
declare(strict_types=1);
require_once "./data/db_init.php";
require_once "./lib/help-functions/help-func.php";
require_once "./lib/db-functions/db-functions.php";
require_once "./lib/template-functions/template-functions.php";
require_once "./config/app.php";
$database=connectToDatabase($config);
$actors=getActors($database);
$genres=getGenres($database);
if (isset($_GET['id']))
{
	$movies=getMovieFromDBByID($database, (int)$_GET['id'], $actors);
}
$moviesListPage=renderTemplate("./resources/pages/fullinfo.php", [
	'movies' => $movies
]);
$currentPage=basename(__FILE__, ".php");

renderLayout($moviesListPage, [
	'config' => $config,
	'genres' => $genres,
	'actors'=>  $actors
]);
