<?php
/** @var array $movies */
/** @var array $genres */
/** @var string $title */
/** @var string $content */
/** @var array $config */
require_once "./data/db_init.php";
require_once "./lib/help-functions/help-func.php";
require_once "./lib/filter-functions/filter-functions.php";
require_once "./lib/template-functions/template-functions.php";
require_once "./config/app.php";
$moviesListPage=renderTemplate("./resources/pages/add-movie-button.php", [
]);
$currentPage=basename(__FILE__, ".php");
renderLayout($moviesListPage, [
	'config' => $config,
	'genres' => $genres,
	'currentPage' => $currentPage
]);