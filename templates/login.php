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
    if (isset($data['errors'])) {
      $error_class_form = 'form--invalid';
    } else {
      $error_class_form = '';
    };

    if (isset($data['errors']['email'])) {
      $error_email = $data['errors']['email'];
      $error_class_email = 'form__item--invalid';
    } else {
      $error_email = 'Введите e-mail';
      $error_class_email = '';
    }

    if (isset($data['errors']['password'])) {
      $error_password = $data['errors']['password'];
      $error_class_password = 'form__item--invalid';
    } else {
      $error_password = 'Введите пароль';
      $error_class_password = '';
    }
  ?>
  <form class="form container <?=$error_class_form?>" action="login.php" method="post"> 
    <h2>Вход</h2>
    <div class="form__item <?=$error_class_email?>"> 
      <label for="email">E-mail*</label>
      <input id="email" type="text" name="email" placeholder="Введите e-mail" required>
      <span class="form__error"><?=$error_email?></span>
    </div>
    <div class="form__item form__item--last <?=$error_class_password?>">
      <label for="password">Пароль*</label>
      <input id="password" type="text" name="password" placeholder="Введите пароль" required>
      <span class="form__error"><?=$error_password?></span>
    </div>
    <button type="submit" class="button">Войти</button>
  </form>
</main>
