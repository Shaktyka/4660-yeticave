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

            </div>
        </div>
    </div>
</li>
