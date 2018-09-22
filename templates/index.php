<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <?php
        $cat_count = count($categories);
        $index = 0;
        ?>
        <?php while ($index < $cat_count): ?>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="pages/all-lots.html"><?=$categories[$index];?></a>
            </li>
        <?php $index++; ?>
        <?php endwhile; ?>
    </ul>
</section>

<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <?php foreach($adds as $ad): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?= $ad['url']; ?>" width="350" height="260" alt="<?= htmlspecialchars($ad['title']); ?>">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?=$ad['category']; ?></span>
                    <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?= htmlspecialchars($ad['title']); ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount"><?= htmlspecialchars($ad['price']); ?></span>
                            <span class="lot__cost"><?= format_price(htmlspecialchars($ad['price'])); ?></span>
                        </div>
                        <div class="lot__timer timer">
                            <?= get_time(); ?>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
