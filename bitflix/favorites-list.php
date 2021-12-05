<?php
/** @var array $movies */
/** @var array $genres */
/** @var array $config */
/** @var array $genres */
declare(strict_types=1);
require_once "./data/db_init.php";
require_once "./lib/help-functions/help-func.php";
require_once "./lib/db-functions/db-functions.php";
require_once "./lib/template-functions/template-functions.php";
require_once "./config/app.php";
$database=connectToDatabase($config);
$genres=getGenres($database);
$moviesListPage=renderTemplate("./resources/pages/favorite-movies-list.php", [
]);
$currentPage=basename(__FILE__, ".php");
renderLayout($moviesListPage, [
	'config' => $config,
	'genres' => $genres,
	'currentPage' => $currentPage
]);