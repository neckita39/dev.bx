<?php
/** @var array $movies */


?>

<?php
foreach ($movies as $movie): ?>
	<?= renderTemplate("./resources/pages/blocks/_movie-info.php", [
		'movies' => $movies,
		'movie' => $movie
	])?>
<?php
endforeach; ?>