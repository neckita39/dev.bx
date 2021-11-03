<?php
require_once "help-func.php";

/** @var array $movies */
/** @var string $title */
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="reset.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrapper">
	<div class="sidebar">
		<div class="logo">
			<a href="layout.php">bitflix</a>
		</div>
		<ul class="menu">
			<li class="menu-item">
				<a href="layout.php">Главная</a>
			</li><!--menu-item--active-->
			<li class="menu-item">
				<a href="#chtoto-tam.html">Триллер</a>
			</li>
			<li class="menu-item">
				<a href="#chtoto-tam.html">Комедия</a>
			</li>
			<li class="menu-item">
				<a href="workinginprocess.html">...</a>
			</li>
			<li class="menu-item">
				<a href="#chtoto-tam.html">Фантастика</a>
			</li>
			<li class="menu-item">
				<a href="workinginprocess.html">Избранное</a>
			</li>
		</ul>
	</div>
	<div class="container">
		<div class="header">
			<div class="add-movie-button">
				<a href="workinginprocess.html">Добавить фильм</a>
			</div>
			<div class="header-wrapper"></div>
		</div>
		<div class="content">
			<div class="movie-list">
			<?php foreach ($movies as $movie): ?>
				<div class="movie-list--item">

					<div class="movie-list--item-image" style="background-image: url(img/<?= $movie['id']?>.jpg)"></div>
					<div class="movie-list--item-head">
						<div class="movie-list--item-title"><?= cutTitle($movies,$movie['id'])?></div>
						<div class="movie-list--item-subtitle"><?= $movie['original-title']?></div>
						<div class="movie-list--item-wrapper"></div>
						<div class="movie-list--item-description"><?=cutDescription($movies,$movie['id'])?></div>
						<div class="movie-list--item-bottom">
							<div class="movie-list--item-time">
								<div class="movie-list--item-time-icon"></div>
								<?= formatDuration($movies, $movie['id'])?></div>
							<div class="movie-list--item-info"><?= cutGenres($movies, $movie['id'])?></div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

		</div>
	</div>
</div>
</div>
</body>
</html>