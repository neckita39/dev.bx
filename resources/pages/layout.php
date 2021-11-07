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
			<div class="movie-info">
				<div class="movie-info-title">Головоломка (2015)</div>
				<div class="movie-info-original-title">Inside Out</div>
				<div class="movie-title-wrapper"></div>
				<div class="movie-image-wrapper">
				<div class="movie-image">

				</div>
			</div>
				<div class="movie-rating">RATING</div>
				<div class="movie-about-movie">
					О Фильме
					<div class="movie-year-released">Год производства:2012

					</div>
					<div class="movie-director">Режиссер:</div>
					<div class="movie-actors">В главных ролях: </div>
				</div>
				<div class="movie-description">Описание:</div>
				<div class="movie-description-data">Райли — обычная 11-летняя школьница, и, как у каждого из нас, ее поведение определяют пять базовых эмоций: Радость, Печаль, Страх, Гнев и Брезгливость. Эмоции живут в сознании девочки и каждый день помогают ей справляться с проблемами, руководя всеми ее поступками. До поры до времени эмоции живут дружно, но вдруг оказывается, что Райли и ее родителям предстоит переезд из небольшого уютного городка в шумный и людный мегаполис. Каждая из эмоций считает, что именно она лучше прочих знает, что нужно делать в этой непростой ситуации, и в голове у девочки наступает полная неразбериха. Чтобы наладить жизнь в большом городе, освоиться в новой школе и подружиться с одноклассниками, эмоциям Райли предстоит снова научиться работать сообща.</div>

		</div>


	</div>
</div>
</div>
</div>
</body>
</html>