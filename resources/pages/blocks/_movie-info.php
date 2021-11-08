<?php
/** @var array $movie */

/** @var array $movies */
?>
<div class="movie-info">
	<div class="movie-info-title"><?= $movie['title'] ?>
		<input type="checkbox" id="activate-div">
		<div class="favorite-bottom">
		</div>
		<label for="activate-div">
			<div class="favorite-bottom">
			</div>
		</label>
		</label>
	</div>
	<div class="movie-info-original-title">
		<?= $movie['original-title'] ?>

		<div class="movie-age-restriction">
			<div class="movie-age-restriction-data"><?= $movie['age-restriction'] ?>+</div>
		</div>

	</div>


	<div class="movie-title-wrapper"></div>
	<div class="movie-image-wrapper">
		<div class="movie-image" style="background-image: url(<?= "img/" . $movie['id'] . ".jpg" ?>)"></div>
	</div>
	<div class="movie-rating">
		<?php
		for ($inc = 1; $inc <= round($movie['rating'], PHP_ROUND_HALF_DOWN); $inc++): ?>
			<div class="movie-rating-visual" style="background:#E78818 "></div>
		<?php
		endfor; ?>
		<?php
		for ($inc = round($movie['rating'], PHP_ROUND_HALF_DOWN); $inc < 10; $inc++): ?>
			<div class="movie-rating-visual" style="background:#F2F2fF "></div>
		<?php
		endfor; ?>
		<div class="movie-rating-circle">
			<div class="movie-rating-data">
				<?= $movie['rating'] ?>
			</div>
		</div>
	</div>
	<div class="movie-about-movie">
		О Фильме
		<div class="movie-year-released">Год производства:

		</div>
		<div class="movie-director">Режиссер:</div>
		<div class="movie-actors">В главных ролях:</div>
	</div>

	<div class="movie-year-released-data"><?= $movie['release-date'] ?>

	</div>
	<div class="movie-director-data"><?= $movie['director'] ?></div>
	<div class="movie-actors-data"><?= implode(", ", $movie['cast']) ?></div>
	<div class="movie-description">Описание:</div>
	<div class="movie-description-data"><?= $movie['description'] ?></div>

</div>