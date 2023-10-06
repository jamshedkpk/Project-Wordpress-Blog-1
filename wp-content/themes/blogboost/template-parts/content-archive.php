<?php
/**
 * Template part for displaying post archives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogboost
 */
$archive_style = blogboost_get_option('archive_style');

$class = '';
if('archive_style_4' == $archive_style){
    $class = 'data-bg blogboost-bg-image';
}

$post_format = get_post_format();

$enabled_post_meta = array();
switch ($archive_style) {
    case 'archive_style_1':
        $enabled_post_meta = blogboost_get_option('archive_post_meta_1');
    break;
    case 'archive_style_2':
        $enabled_post_meta = blogboost_get_option('archive_post_meta_2');
    break;
    case 'archive_style_3':
        $enabled_post_meta = blogboost_get_option('archive_post_meta_3');
    break;
    case 'archive_style_4':
        $enabled_post_meta = blogboost_get_option('archive_post_meta_4');
    break;
    
    default:
        // code...
        break;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class("theme-article-post theme-default-post article-has-effect $class"); ?>>

    <div class="article-block-wrapper">
        
        <?php get_template_part('template-parts/archive/entry-header-archive');?>

        <div class="entry-summary">
            <?php get_template_part( 'template-parts/archive/archive', $post_format ); ?>
        </div><!-- .entry-content -->

        <?php 
        if ( 'aside' != $post_format && 'status' != $post_format ) { ?>
        <footer class="entry-meta entry-meta-footer">
            <?php blogboost_entry_footer($enabled_post_meta); ?>
        </footer>
        <?php } ?>
        
    </div><!-- .article-block-wrapper -->

</article><!-- #post-<?php the_ID(); ?> -->