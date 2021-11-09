<?php
/** @var array $movie */

/** @var array $movies */
?>
<div class="movie-list--item">
	<div class="movie-list--item-overlay">
		<a href="movie-info.php?id=<?= $movie['id'] ?>" class="movie-list--item-more">Подробнее</a>
	</div>
	<div class="movie-list--item-image" style="background-image: url(<?= "img/" . $movie['id'] . ".jpg" ?>)"></div>
	<div class="movie-list--item-head">
		<div class="movie-list--item-title"><?= cutTitle($movie['title']) ?></div>
		<div class="movie-list--item-subtitle"><?= cutTitle($movie['original-title']) ?></div>
		<div class="movie-list--item-wrapper"></div>
		<div class="movie-list--item-description"><?= cutDescription($movie['description']) ?></div>
		<div class="movie-list--item-bottom">
			<div class="movie-list--item-time">
				<div class="movie-list--item-time-icon"></div>
				<div class="movie-list--item-genres"><?= formatDuration($movie['duration']) ?></div>

			</div>
			<div class="movie-list--item-info">    <?= cutGenres($movie['genres']) ?></div>
		</div>
	</div>
</div>