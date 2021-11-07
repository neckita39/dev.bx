<?php
/** @var array $genres */
/** @var string $content */
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
			<a href="index.php">bitflix</a>
		</div>
		<ul class="menu">
			<li class="menu-item">
				<a href="index.php">Главная</a>
			</li>
			<?php
			foreach ($genres as $genre): ?>
				<li class="menu-item">
					<a href="genre-list.php?genre=<?= $genre?>"><?= $genre ?></a>
				</li>
			<?php
			endforeach; ?>
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
			<?= $content ?>


	</div>
</div>
</div>
</div>
</body>
</html>