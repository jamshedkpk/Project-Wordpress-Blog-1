<?php
/**
 * Search Template for search form
 *
 * @package Blogboost
 * @since 1.0.0
 */
?>
<form role="search" method="get" class="search-form-default" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <input type="search" class="search-field-default" placeholder="<?php esc_attr_e('Search','blogboost'); ?>" value="<?php echo esc_attr( get_search_query() ) ?>" name="s">
        <?php blogboost_theme_svg('search' ); ?>
    </label>
</form>