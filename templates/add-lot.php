    <nav class="nav">
      <ul class="nav__list container">
        <?php
            $cat_count = count($categories);
            $index = 0;
        ?>
        <?php while ($index < $cat_count): ?>
            <li class="nav__item">
                <a href="all-lots.html"><?=$categories[$index]['category'];?></a>
            </li>
        <?php $index++; ?>
        <?php endwhile; ?>
      </ul>
    </nav>
<!--  https://echo.htmlacademy.ru  -->
<!--
в тег формы добавить класс form--invalid
для всех полей формы, где найдены ошибки:
добавить контейнеру с этим полем класс form__item--invalid;
в тег span.form__error этого контейнера записать текст ошибки. Например: «Заполните это поле».
-->
    <?php 
      $classname = count($errors) ? "form--invalid" : "";
      print_r($errors);
    ?>
    <form class="form form--add-lot container <?= $classname; ?>" name="add-lot" action="/add.php" method="post" enctype="multipart/form-data">
      <h2>Добавление лота</h2>
      <div class="form__container-two">
        <?php 
          $classname = isset($errors['lot-name']) ? "form__item--invalid" : "";
          $value = isset($advert['lot-name']) ? $advert['lot-name'] : ""; 
        ?>
        <div class="form__item <?= $classname; ?>">
          <label for="lot-name">Наименование</label>
          <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?= $value; ?>" required>
          <span class="form__error"><?= $dict['lot-name']; ?> Введите наименование лота</span>
        </div>
        <?php 
          $classname = isset($errors['category']) ? "form__item--invalid" : "";
          $value = isset($advert['category']) ? $advert['category'] : ""; 
        ?>
        <div class="form__item <?= $classname; ?>">
          <label for="category">Категория</label>
          <select id="category" name="category" required>
            <option>Выберите категорию</option>
            <?php foreach($categories as $cat): ?>
              <option><?= $cat['category']; ?></option>
            <?php endforeach; ?>
          </select>
          <span class="form__error"><?= $dict['category']; ?> Выберите категорию</span>
        </div>
      </div>
      <?php 
          $classname = isset($errors['message']) ? "form__item--invalid" : "";
          $value = isset($advert['message']) ? $advert['message'] : ""; 
      ?>
      <div class="form__item form__item--wide <?= $classname; ?>">
        <label for="message">Описание</label>
        <textarea id="message" name="message" placeholder="Напишите описание лота" value="<?= $value; ?>" required></textarea>
        <span class="form__error"><?= $dict['message']; ?> Напишите описание лота</span>
      </div>
      <?php 
          $classname = isset($errors['file']) ? "form__item--invalid" : "";
          $value = ""; // не очень понятно пока
      ?>
      <div class="form__item form__item--file <?= $classname; ?>"> <!-- form__item--uploaded -->
        <label>Изображение</label>
        <div class="preview">
          <button class="preview__remove" type="button">x</button>
          <div class="preview__img">
            <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
          </div>
        </div>
        <div class="form__input-file">
          <input class="visually-hidden" name="file" type="file" id="photo2" value="" accept="image/jpeg,image/jpg,image/png">
          <label for="photo2">
            <span>+ Добавить</span>
          </label>
        </div>
      </div>
      
      <div class="form__container-three">
        <?php 
          $classname = isset($errors['lot-rate']) ? "form__item--invalid" : "";
          $value = isset($advert['lot-rate']) ? $advert['lot-rate'] : ""; 
        ?>
        <div class="form__item form__item--small <?= $classname; ?>">
          <label for="lot-rate">Начальная цена</label>
          <input id="lot-rate" type="number" name="lot-rate" placeholder="0" value="<?= $value; ?>" required>
          <span class="form__error"><?= $dict['lot-rate']; ?> Введите начальную цену</span>
        </div>
        <?php 
          $classname = isset($errors['lot-step']) ? "form__item--invalid" : "";
          $value = isset($advert['lot-step']) ? $advert['lot-step'] : ""; 
        ?>
        <div class="form__item form__item--small <?= $classname; ?>">
          <label for="lot-step">Шаг ставки</label>
          <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?= $value; ?>" required>
          <span class="form__error"><?= $dict['lot-step']; ?> Введите шаг ставки</span>
        </div>
        <?php 
          $classname = isset($errors['lot-date']) ? "form__item--invalid" : "";
          $value = isset($advert['lot-date']) ? $advert['lot-date'] : ""; 
        ?>
        <div class="form__item <?= $classname; ?>">
          <label for="lot-date">Дата окончания торгов</label>
          <input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<?= $value; ?>" required>
          <span class="form__error"><?= $dict['lot-date']; ?> Введите дату завершения торгов</span>
        </div>
        
      </div>
      <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
      <button type="submit" name="lot-submit" class="button" value="add-lot">Добавить лот</button>
    </form>