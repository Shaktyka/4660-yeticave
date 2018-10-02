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
    <section class="lot-item container">
      <h2><?= $ad['title']; ?></h2>
      <div class="lot-item__content">
        <div class="lot-item__left">
          <div class="lot-item__image">
            <img src="<?= $ad['img_path']; ?>" width="730" height="548" alt="<?= $ad['title']; ?>">
          </div>
          <p class="lot-item__category">Категория: <span><?= $ad['category']; ?></span></p>
          <p class="lot-item__description"><?= $ad['description']; ?></p>
        </div>
        <div class="lot-item__right">
          <div class="lot-item__state">
            <div class="lot-item__timer timer">
              <?= get_time(); ?>
            </div>
            <div class="lot-item__cost-state">
              <div class="lot-item__rate">
                <span class="lot-item__amount">Текущая цена</span>
                <span class="lot-item__cost"><?= $ad['cur_price']; ?></span>
              </div>
              <div class="lot-item__min-cost">
                <?php
                  $min_bet = $ad['cur_price'] + $ad['bet_step'];
                ?> 
                Мин. ставка <span><?= $min_bet; ?> р</span>
              </div>
            </div>
<!-- Форма -->
          </div>
<!-- История ставок -->
        </div>
      </div>
    </section>