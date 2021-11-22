<?php
/** @var array $movies */
/** @var array $genres */
?>

<?php
foreach ($movies as $movie): ?>
	<?= renderTemplate("./resources/pages/blocks/_movie.php", [
		'movie' => $movie
		])?>
<?php
endforeach; ?>
