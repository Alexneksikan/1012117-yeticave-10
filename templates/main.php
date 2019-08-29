 <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <!--заполните этот список из массива категорий-->
                <?php foreach ($categories as $item): ?> 
                    <li class="promo__item promo__item--<?=$item['symbol_code']; ?>">
                        <a class="promo__link" href="pages/all-lots.html"><?php echo $item['name']; ?></a>
                    </li>
                <?php endforeach; ?>

        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
            <!--заполните этот список из массива с товарами-->
            <?php foreach ($lots_info as $lot): ?>
                <li class="lots__item lot">
                <div class="lot__image">
                    <img src="../img/<?=$lot['image']; ?>" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?=$lot['category']; ?></span>
                    <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?=$lot['name']; ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?=formatPrice($lot['start_price']); ?></span>
                        </div>
                    </div>
                    <?php
                        $timer = get_dt_range($lot['finish_date']);
                        $hours = $timer['hours'];
                        $minutes = $timer['minutes'];
                    ?>
                    <div class="lot__timer timer <?php if ($hours == '00') {print('timer--finishing');} ?>">
                            <?php print($hours . ' : ' . $minutes); ?>
                    </div>
                </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>