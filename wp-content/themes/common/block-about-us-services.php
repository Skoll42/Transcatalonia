<ul class="list-services">
    <?php if (!empty($services = get_field('services'))) : ?>
        <?php foreach ($services as $service) : ?>
            <li>
                <span class="icon" style="background: url(<?php echo '\'' . $service['icon'] . '\') no-repeat'?>;background-position: 50%;"></span>
                <span><?php echo $service['description']; ?></span>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>