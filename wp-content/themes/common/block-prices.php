<?php
$prices = get_field('prices');
if (!empty($prices)) : ?>
    <div class="price-table">
        <div class="header">Стоимость экскурсии</div>
        <ul class="price-list">
            <?php $curr = 0; foreach($prices as $price) : $curr++; ?>
                <li>
                    <span class="amount"><?php echo $price['number_of_tourists'] . ' человек'?></span>
                    <span><?php echo $price['price'] . ' € с человека' ?></span>
                </li>
                <?php if($curr % 2 == 0): ?>
                    <div class="clearfix"></div>
                <?php endif; ?>
            <?php endforeach;?>
        </ul>
    </div>
    <div class="clearfix"></div>
<?php endif; ?>
