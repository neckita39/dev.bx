<?php
/** @var array $movies */


?>

<?php
foreach ($movies as $movie): ?>
	<?= renderTemplate("./resources/pages/blocks/_movie.php", [
		'movie' => $movie
		])?>
<?php
endforeach; ?>
