<?php
/** @var array $movie */
/** @var array $movies */
?>
<div class="movie-list--item">
	<div class="movie-list--item-overlay">
		<a href="movie-info.php" class="movie-list--item-more">Подробнее</a>
	</div>
	<div class="movie-list--item-image" style="background-image: url(img/<?= $movie['id'] ?>.jpg)"></div>
	<div class="movie-list--item-head">
		<div class="movie-list--item-title">Тут инфа о фильме</div>
		<div class="movie-list--item-subtitle"><?= findById($movies, $movie['id'])?></div>
		<div class="movie-list--item-wrapper"></div>
		<div class="movie-list--item-description"><?= findById($movies, $movie['id']) ?></div>
		<div class="movie-list--item-bottom">
			<div class="movie-list--item-time">
				<div class="movie-list--item-time-icon"></div>
				<div class="movie-list--item-genres"><?= findById($movies, $movie['id']) ?></div>

			</div>
			<div class="movie-list--item-info">    <?= findById($movies, $movie['id']) ?></div>
		</div>
	</div>
</div>