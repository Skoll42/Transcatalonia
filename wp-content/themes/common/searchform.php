<form method="get" class="main-search" action="<?php echo esc_url( home_url( '/' ) ) ?>">
    <a href="javascript:void(0);" class="search-button"></a>
    <input type="search" name="s" value="<?php echo get_search_query() ?>" placeholder="Искать...">
    <a href="javascript:void(0);" class="cancel-button"></a>
</form>