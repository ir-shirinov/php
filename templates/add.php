<? session_start();?>
<? if (isset($_SESSION['user'])):?>
   <main>
	<nav class="nav">
		<ul class="nav__list container">
			<li class="nav__item">
				<a href="all-lots.html">Доски и лыжи</a>
			</li>
			<li class="nav__item">
				<a href="all-lots.html">Крепления</a>
			</li>
			<li class="nav__item">
				<a href="all-lots.html">Ботинки</a>
			</li>
			<li class="nav__item">
				<a href="all-lots.html">Одежда</a>
			</li>
			<li class="nav__item">
				<a href="all-lots.html">Инструменты</a>
			</li>
			<li class="nav__item">
				<a href="all-lots.html">Разное</a>
			</li>
		</ul>
	</nav>
	<form class="form form--add-lot container <?=$data['error_form']?>" action="/add.php" method="post" enctype="multipart/form-data">
		<h2>Добавление лота</h2>
		<div class="form__container-two">
			<div class="form__item <?=$data['error_name']?>">
				<label for="lot-name">Наименование</label>
				<input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?=$data['name_val']?>">
				<span class="form__error"><?=$data['error_name_text']?></span>
			</div>
			<div class="form__item <?=$data['error_category']?>">
				<label for="category">Категория</label>
				<select id="category" name="category" >
					<option>Выберите категорию</option>
					<option>Доски и лыжи</option>
					<option>Крепления</option>
					<option>Ботинки</option>
					<option>Одежда</option>
					<option>Инструменты</option>
					<option>Разное</option>
				</select>
				<span class="form__error"><?=$data['error_category_text']?></span>
			</div>
		</div>
		<div class="form__item form__item--wide <?=$data['error_message']?>">
			<label for="message">Описание</label>
			<textarea id="message" name="message" placeholder="Напишите описание лота" value="<?=$data['message_val']?>"></textarea>
			<span class="form__error"><?=$data['error_message_text']?></span>
		</div>
		<div class="form__item form__item--file"> <!-- form__item--uploaded -->
			<label>Изображение</label>
			<div class="preview">
				<button class="preview__remove" type="button">x</button>
				<div class="preview__img">
					<img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
				</div>
			</div>
			<div class="form__input-file">
				<input class="visually-hidden" type="file" id="photo2" value="" name="photo">
				<label for="photo2">
					<span>+ Добавить</span>
				</label>
			</div>
		</div>
		<div class="form__container-three">
			<div class="form__item form__item--small <?=$data['error_rate']?>">
				<label for="lot-rate">Начальная цена</label>
				<input id="lot-rate" type="number" name="lot-rate" placeholder="0" value="<?=$data['rate_val']?>" >
				<span class="form__error"><?=$data['error_rate_text']?></span>
			</div>
			<div class="form__item form__item--small <?=$data['error_step']?>">
				<label for="lot-step">Шаг ставки</label>
				<input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?=$data['step_val']?>" >
				<span class="form__error"><?=$data['error_step_text']?></span>
			</div>
			<div class="form__item <?=$data['error_date']?>">
				<label for="lot-date">Дата окончания торгов</label>
				<input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<?=$data['date_val']?>">
				<span class="form__error"><?=$data['error_date_text']?></span>
			</div>
		</div>
		<span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
		<button type="submit" class="button">Добавить лот</button>
	</form>
</main>
  
<?endif;?>

