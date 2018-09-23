<?php 

// Форматирование вывода цены
function format_price ($price) {
    $symbol = '&#8381;'; // символ рубля
    
    $end_price = null;
    $price = ceil($price);
    
    if ($price > 1000) {
        $price = number_format($price, 0, '', ' ');
    }
    
    $end_price = $price . ' ' . $symbol;
    
    return $end_price;
};

?> 

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
            <?= include_template('_ad.php', ['ad' => $ad]); ?>
        <?php endforeach; ?>
    </ul>
</section>
    