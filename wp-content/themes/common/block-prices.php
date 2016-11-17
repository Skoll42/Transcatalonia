<?php
$prices = get_field('prices');
if (!empty($prices)) : ?>
    <div class="price-table">
        <div class="header">Стоимость экскурсии</div>
        <ul class="price-list">
            <?php foreach($prices as $price) : ?>
                <li>
                    <span class="amount"><?php echo $price['number_of_tourists'] . ' человек'?></span>
                    <span><?php echo $price['price'] . ' € с человека' ?></span>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
<?php endif; ?>
