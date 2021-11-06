<?php
require_once "./data/movies.php";
require_once "./lib/help-functions/help-func.php";
/** @var array $movies */
/** @var array $genres */
/** @var string $title */
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="resources/css/reset.css">
	<link rel="stylesheet" href="resources/css/style.css">
</head>
<body>
<div class="wrapper">
	<div class="sidebar">
		<div class="logo">
			<a href="resources/pages/layout.php">bitflix</a>
		</div>
		<ul class="menu">
			<li class="menu-item">
				<a href="resources/pages/layout.php">Главная</a>
			</li>
			<?php foreach ($genres as $genre):?>
				<li class="menu-item">
					<a href="resources/pages/layout.php"><?= $genre?></a>
				</li><!--menu-item--active-->
			<?php endforeach;?>
			<li class="menu-item">
				<a href="resources/pages/workinginprocess.html">Избранное</a>
			</li>
		</ul>
	</div>
	<div class="container">
		<div class="header">
			<div class="add-movie-button">
				<a href="resources/pages/workinginprocess.html">Добавить фильм</a>
			</div>
			<div class="header-wrapper"></div>
		</div>
		<div class="content">
			<div class="movie-list">
				<?php foreach ($movies as $movie): ?>
					<div class="movie-list--item">
						<div class="movie-list--item-overlay">
							<a href="#chtoto-tam" class="movie-list--item-more">Подробнее</a>
						</div>
						<div class="movie-list--item-image" style="background-image: url(img/<?= $movie['id']?>.jpg)"></div>
						<div class="movie-list--item-head">
							<div class="movie-list--item-title"><?= cutTitle("./data/movies.php",$movie['id'])?></div>
							<div class="movie-list--item-subtitle"><?= $movie['original-title']?></div>
							<div class="movie-list--item-wrapper"></div>
							<div class="movie-list--item-description"><?=cutDescription("./data/movies.php", $movies,$movie['id'])?></div>
							<div class="movie-list--item-bottom">
								<div class="movie-list--item-time">
									<div class="movie-list--item-time-icon"></div>
									<?= formatDuration("./data/movies.php", $movies, $movie['id'])?></div>
								<div class="movie-list--item-info"><?= cutGenres("./data/movies.php", $movies, $movie['id'])?></div>
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