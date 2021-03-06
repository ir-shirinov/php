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
  <?
  	$formClass = count($data['errors']) ? 'form--invalid': '';
	$emailClass = isset($data['errors']['email']) ? 'form__item--invalid': '';
	$nameClass = isset($data['errors']['name']) ? 'form__item--invalid': '';
	$messageClass = isset($data['errors']['message']) ? 'form__item--invalid': '';
	$passwordClass = isset($data['errors']['password']) ? 'form__item--invalid': '';

	$emailText = isset($data['errors']['email']) ? $data['errors']['email'] : 'Введите e-mail';
	$nameText = isset($data['errors']['name']) ? $data['errors']['name'] : 'Введите имя';
	$messageText = isset($data['errors']['message']) ? $data['errors']['message'] : 'Напишите как с вами связаться';
	$passwordText = isset($data['errors']['password']) ? $data['errors']['password'] : 'Введите пароль';



	$nameValue = isset($data['form']['name']) ? $data['form']['name'] : '';
	$messageValue = isset($data['form']['message']) ? $data['form']['message'] : '';
	$emailValue = isset($data['form']['email']) ? $data['form']['email'] : '';
	$passwordValue = isset($data['form']['password']) ? $data['form']['password'] : '';
  ?>
  <form class="form container <?=$formClass?>" action="/sign-up.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
    <h2>Регистрация нового аккаунта</h2>
    <div class="form__item <?=$emailClass?>"> <!-- form__item--invalid -->
      <label for="email">E-mail*</label>
      <input id="email" type="text" name="email" placeholder="Введите e-mail" required value="<?=$emailValue?>">
      <span class="form__error"><?=$emailText?></span>
    </div>
    <div class="form__item <?=$passwordClass?>">
      <label for="password">Пароль*</label>
      <input id="password" type="text" name="password" placeholder="Введите пароль" required value="<?=$passwordValue?>">
      <span class="form__error"><?=$passwordText?></span>
    </div>
    <div class="form__item <?=$nameClass?>">
      <label for="name">Имя*</label>
      <input id="name" type="text" name="name" placeholder="Введите имя" required value="<?=$nameValue?>">
      <span class="form__error"><?=$nameText?></span>
    </div>
    <div class="form__item <?=$messageClass?>">
      <label for="message">Контактные данные*</label>
      <textarea id="message" name="message" placeholder="Напишите как с вами связаться" required value="<?=$messageValue?>"></textarea>
      <span class="form__error"><?=$messageText?></span>
    </div>
    <div class="form__item form__item--file form__item--last">
      <label>Аватар</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="img/avatar.jpg" width="113" height="113" alt="Ваш аватар">
        </div>
      </div>
      <div class="form__input-file">
        <input class="visually-hidden" type="file" id="photo2" name="ava-user" value="">
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
      </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Зарегистрироваться</button>
    <a class="text-link" href="#">Уже есть аккаунт</a>
  </form>
</main>
