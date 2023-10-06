<?php
/**
* Sidebar Metabox.
*
* @package Blogboost
*/
if( !function_exists( 'blogboost_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function blogboost_sanitize_sidebar_option_meta( $input ){

        $metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists('blogboost_sanitize_meta_pagination') ):

    /** Sanitize Enable Disable Checkbox **/
    function blogboost_sanitize_meta_pagination( $input ) {

        $valid_keys = array('global-layout','no-navigation','norma-navigation','ajax-next-post-load');
        if ( in_array( $input , $valid_keys ) ) {
            return $input;
        }
        return '';

    }

endif;

if( !function_exists( 'blogboost_sanitize_post_layout_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function blogboost_sanitize_post_layout_option_meta( $input ){

        $metabox_options = array( 'global-layout','layout-1','layout-2' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;


if( !function_exists( 'blogboost_sanitize_header_overlay_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function blogboost_sanitize_header_overlay_option_meta( $input ){

        $metabox_options = array( 'global-layout','enable-overlay' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;

add_action( 'add_meta_boxes', 'blogboost_metabox' );

if( ! function_exists( 'blogboost_metabox' ) ):


    function  blogboost_metabox() {
        
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'blogboost' ),
            'blogboost_post_metafield_callback',
            'post', 
            'normal', 
            'high'
        );
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'blogboost' ),
            'blogboost_post_metafield_callback',
            'page',
            'normal', 
            'high'
        ); 
    }

endif;

$blogboost_page_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'blogboost' ),
    'layout-2' => esc_html__( 'Banner Layout', 'blogboost' ),
);

$blogboost_post_sidebar_fields = array(
    'global-sidebar' => array(
                    'id'        => 'post-global-sidebar',
                    'value' => 'global-sidebar',
                    'label' => esc_html__( 'Global sidebar', 'blogboost' ),
                ),
    'right-sidebar' => array(
                    'id'        => 'post-left-sidebar',
                    'value' => 'right-sidebar',
                    'label' => esc_html__( 'Right sidebar', 'blogboost' ),
                ),
    'left-sidebar' => array(
                    'id'        => 'post-right-sidebar',
                    'value'     => 'left-sidebar',
                    'label'     => esc_html__( 'Left sidebar', 'blogboost' ),
                ),
    'no-sidebar' => array(
                    'id'        => 'post-no-sidebar',
                    'value'     => 'no-sidebar',
                    'label'     => esc_html__( 'No sidebar', 'blogboost' ),
                ),
);

$blogboost_post_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'blogboost' ),
    'layout-2' => esc_html__( 'Banner Layout', 'blogboost' ),
);

$blogboost_header_overlay_options = array(
    'global-layout' => esc_html__( 'Global Layout', 'blogboost' ),
    'enable-overlay' => esc_html__( 'Enable Header Overlay', 'blogboost' ),
);


/**
 * Callback function for post option.
*/
if( ! function_exists( 'blogboost_post_metafield_callback' ) ):
    
    function blogboost_post_metafield_callback() {
        global $post, $blogboost_post_sidebar_fields, $blogboost_post_layout_options,  $blogboost_page_layout_options, $blogboost_header_overlay_options;
        $post_type = get_post_type($post->ID);
        wp_nonce_field( basename( __FILE__ ), 'blogboost_post_meta_nonce' ); ?>
        
        <div class="metabox-main-block">

            <div class="metabox-navbar">
                <ul>

                    <li>
                        <a id="metabox-navbar-appearance"  class="metabox-navbar-active" href="javascript:void(0)">

                            <?php esc_html_e('Appearance Settings', 'blogboost'); ?>

                        </a>
                    </li>

                    <?php if ($post_type != 'page') { ?>
                        <li>
                            <a id="metabox-navbar-general" href="javascript:void(0)">

                                <?php esc_html_e('General Settings', 'blogboost'); ?>

                            </a>
                        </li>
                    <?php } ?>


                    <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ): ?>
                        <li>
                            <a id="twp-tab-booster" href="javascript:void(0)">

                                <?php esc_html_e('Booster Extension Settings', 'blogboost'); ?>

                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

            <div class="twp-tab-content">

                <div id="metabox-navbar-general-content" class="metabox-content-wrap">

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Sidebar Layout','blogboost'); ?></h3>

                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <?php
                            $blogboost_post_sidebar = esc_html( get_post_meta( $post->ID, 'blogboost_post_sidebar_option', true ) ); 
                            if( $blogboost_post_sidebar == '' ){ $blogboost_post_sidebar = 'global-sidebar'; }

                            foreach ( $blogboost_post_sidebar_fields as $blogboost_post_sidebar_field) { ?>

                                <label class="description">

                                    <input type="radio" name="blogboost_post_sidebar_option" value="<?php echo esc_attr( $blogboost_post_sidebar_field['value'] ); ?>" <?php if( $blogboost_post_sidebar_field['value'] == $blogboost_post_sidebar ){ echo "checked='checked'";} if( empty( $blogboost_post_sidebar ) && $blogboost_post_sidebar_field['value']=='right-sidebar' ){ echo "checked='checked'"; } ?>/>&nbsp;<?php echo esc_html( $blogboost_post_sidebar_field['label'] ); ?>

                                </label>

                            <?php } ?>

                        </div>

                    </div>

                </div>


                <div id="metabox-navbar-appearance-content" class="metabox-content-wrap metabox-content-wrap-active">

                    <?php if( $post_type == 'page' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Banner Layout','blogboost'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $blogboost_page_layout = esc_html( get_post_meta( $post->ID, 'blogboost_page_layout', true ) ); 
                                if( $blogboost_page_layout == '' ){ $blogboost_page_layout = 'layout-1'; }

                                foreach ( $blogboost_page_layout_options as $key => $blogboost_page_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="blogboost_page_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $blogboost_page_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $blogboost_page_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','blogboost'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                <?php
                                $blogboost_ed_header_overlay = esc_attr( get_post_meta( $post->ID, 'blogboost_ed_header_overlay', true ) ); ?>

                                <input type="checkbox" id="blogboost-header-overlay" name="blogboost_ed_header_overlay" value="1" <?php if( $blogboost_ed_header_overlay ){ echo "checked='checked'";} ?>/>

                                <label for="blogboost-header-overlay"><?php esc_html_e( 'Enable Header Overlay','blogboost' ); ?></label>

                            </div>

                        </div>

                    <?php endif; ?>

                    <?php if( $post_type == 'post' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Title Layout','blogboost'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $blogboost_post_layout = esc_html( get_post_meta( $post->ID, 'blogboost_post_layout', true ) ); 

                                foreach ( $blogboost_post_layout_options as $key => $blogboost_post_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="blogboost_post_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $blogboost_post_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $blogboost_post_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','blogboost'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $blogboost_header_overlay = esc_html( get_post_meta( $post->ID, 'blogboost_header_overlay', true ) ); 
                                if( $blogboost_header_overlay == '' ){ $blogboost_header_overlay = 'global-layout'; }

                                foreach ( $blogboost_header_overlay_options as $key => $blogboost_header_overlay_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="blogboost_header_overlay" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $blogboost_header_overlay ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $blogboost_header_overlay_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                    <?php endif; ?>


                </div>

                <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ):

                    
                    $blogboost_ed_post_views = esc_html( get_post_meta( $post->ID, 'blogboost_ed_post_views', true ) );
                    $blogboost_ed_post_read_time = esc_html( get_post_meta( $post->ID, 'blogboost_ed_post_read_time', true ) );
                    $blogboost_ed_post_like_dislike = esc_html( get_post_meta( $post->ID, 'blogboost_ed_post_like_dislike', true ) );
                    $blogboost_ed_post_author_box = esc_html( get_post_meta( $post->ID, 'blogboost_ed_post_author_box', true ) );
                    $blogboost_ed_post_social_share = esc_html( get_post_meta( $post->ID, 'blogboost_ed_post_social_share', true ) );
                    $blogboost_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'blogboost_ed_post_reaction', true ) );
                    $blogboost_ed_post_rating = esc_html( get_post_meta( $post->ID, 'blogboost_ed_post_rating', true ) );
                    ?>

                    <div id="twp-tab-booster-content" class="metabox-content-wrap">

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Booster Extension Plugin Content','blogboost'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogboost-ed-post-views" name="blogboost_ed_post_views" value="1" <?php if( $blogboost_ed_post_views ){ echo "checked='checked'";} ?>/>
                                    <label for="blogboost-ed-post-views"><?php esc_html_e( 'Disable Post Views','blogboost' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogboost-ed-post-read-time" name="blogboost_ed_post_read_time" value="1" <?php if( $blogboost_ed_post_read_time ){ echo "checked='checked'";} ?>/>
                                    <label for="blogboost-ed-post-read-time"><?php esc_html_e( 'Disable Post Read Time','blogboost' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogboost-ed-post-like-dislike" name="blogboost_ed_post_like_dislike" value="1" <?php if( $blogboost_ed_post_like_dislike ){ echo "checked='checked'";} ?>/>
                                    <label for="blogboost-ed-post-like-dislike"><?php esc_html_e( 'Disable Post Like Dislike','blogboost' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogboost-ed-post-author-box" name="blogboost_ed_post_author_box" value="1" <?php if( $blogboost_ed_post_author_box ){ echo "checked='checked'";} ?>/>
                                    <label for="blogboost-ed-post-author-box"><?php esc_html_e( 'Disable Post Author Box','blogboost' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogboost-ed-post-social-share" name="blogboost_ed_post_social_share" value="1" <?php if( $blogboost_ed_post_social_share ){ echo "checked='checked'";} ?>/>
                                    <label for="blogboost-ed-post-social-share"><?php esc_html_e( 'Disable Post Social Share','blogboost' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogboost-ed-post-reaction" name="blogboost_ed_post_reaction" value="1" <?php if( $blogboost_ed_post_reaction ){ echo "checked='checked'";} ?>/>
                                    <label for="blogboost-ed-post-reaction"><?php esc_html_e( 'Disable Post Reaction','blogboost' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogboost-ed-post-rating" name="blogboost_ed_post_rating" value="1" <?php if( $blogboost_ed_post_rating ){ echo "checked='checked'";} ?>/>
                                    <label for="blogboost-ed-post-rating"><?php esc_html_e( 'Disable Post Rating','blogboost' ); ?></label>

                            </div>

                        </div>

                    </div>

                <?php endif; ?>
                
            </div>

        </div>  
            
    <?php }
endif;

// Save metabox value.
add_action( 'save_post', 'blogboost_save_post_meta' );

if( ! function_exists( 'blogboost_save_post_meta' ) ):

    function blogboost_save_post_meta( $post_id ) {

        global $post, $blogboost_post_sidebar_fields, $blogboost_post_layout_options, $blogboost_header_overlay_options,  $blogboost_page_layout_options;

        if ( !isset( $_POST[ 'blogboost_post_meta_nonce' ] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['blogboost_post_meta_nonce'] ) ), basename( __FILE__ ) ) ){

            return;

        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){

            return;

        }
            
        if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {  

            if ( !current_user_can( 'edit_page', $post_id ) ){  

                return $post_id;

            }

        }elseif( !current_user_can( 'edit_post', $post_id ) ) {

            return $post_id;

        }


        foreach ( $blogboost_post_sidebar_fields as $blogboost_post_sidebar_field ) {  
            

                $old = esc_html( get_post_meta( $post_id, 'blogboost_post_sidebar_option', true ) ); 
                $new = isset( $_POST['blogboost_post_sidebar_option'] ) ? blogboost_sanitize_sidebar_option_meta( wp_unslash( $_POST['blogboost_post_sidebar_option'] ) ) : '';

                if ( $new && $new != $old ){

                    update_post_meta ( $post_id, 'blogboost_post_sidebar_option', $new );

                }elseif( '' == $new && $old ) {

                    delete_post_meta( $post_id,'blogboost_post_sidebar_option', $old );

                }

            
        }

        $twp_disable_ajax_load_next_post_old = esc_html( get_post_meta( $post_id, 'twp_disable_ajax_load_next_post', true ) ); 
        $twp_disable_ajax_load_next_post_new = isset( $_POST['twp_disable_ajax_load_next_post'] ) ? blogboost_sanitize_meta_pagination( wp_unslash( $_POST['twp_disable_ajax_load_next_post'] ) ) : '';

        if( $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_new != $twp_disable_ajax_load_next_post_old ){

            update_post_meta ( $post_id, 'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_new );

        }elseif( '' == $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_old ) {

            delete_post_meta( $post_id,'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_old );

        }


        foreach ( $blogboost_post_layout_options as $blogboost_post_layout_option ) {  
            
            $blogboost_post_layout_old = esc_html( get_post_meta( $post_id, 'blogboost_post_layout', true ) ); 
            $blogboost_post_layout_new = isset( $_POST['blogboost_post_layout'] ) ? blogboost_sanitize_post_layout_option_meta( wp_unslash( $_POST['blogboost_post_layout'] ) ) : '';

            if ( $blogboost_post_layout_new && $blogboost_post_layout_new != $blogboost_post_layout_old ){

                update_post_meta ( $post_id, 'blogboost_post_layout', $blogboost_post_layout_new );

            }elseif( '' == $blogboost_post_layout_new && $blogboost_post_layout_old ) {

                delete_post_meta( $post_id,'blogboost_post_layout', $blogboost_post_layout_old );

            }
            
        }



        foreach ( $blogboost_header_overlay_options as $blogboost_header_overlay_option ) {  
            
            $blogboost_header_overlay_old = esc_html( get_post_meta( $post_id, 'blogboost_header_overlay', true ) ); 
            $blogboost_header_overlay_new = isset( $_POST['blogboost_header_overlay'] ) ? blogboost_sanitize_header_overlay_option_meta( wp_unslash( $_POST['blogboost_header_overlay'] ) ) : '';

            if ( $blogboost_header_overlay_new && $blogboost_header_overlay_new != $blogboost_header_overlay_old ){

                update_post_meta ( $post_id, 'blogboost_header_overlay', $blogboost_header_overlay_new );

            }elseif( '' == $blogboost_header_overlay_new && $blogboost_header_overlay_old ) {

                delete_post_meta( $post_id,'blogboost_header_overlay', $blogboost_header_overlay_old );

            }
            
        }


        $blogboost_ed_post_views_old = esc_html( get_post_meta( $post_id, 'blogboost_ed_post_views', true ) ); 
        $blogboost_ed_post_views_new = isset( $_POST['blogboost_ed_post_views'] ) ? absint( wp_unslash( $_POST['blogboost_ed_post_views'] ) ) : '';

        if ( $blogboost_ed_post_views_new && $blogboost_ed_post_views_new != $blogboost_ed_post_views_old ){

            update_post_meta ( $post_id, 'blogboost_ed_post_views', $blogboost_ed_post_views_new );

        }elseif( '' == $blogboost_ed_post_views_new && $blogboost_ed_post_views_old ) {

            delete_post_meta( $post_id,'blogboost_ed_post_views', $blogboost_ed_post_views_old );

        }



        $blogboost_ed_post_read_time_old = esc_html( get_post_meta( $post_id, 'blogboost_ed_post_read_time', true ) ); 
        $blogboost_ed_post_read_time_new = isset( $_POST['blogboost_ed_post_read_time'] ) ? absint( wp_unslash( $_POST['blogboost_ed_post_read_time'] ) ) : '';

        if ( $blogboost_ed_post_read_time_new && $blogboost_ed_post_read_time_new != $blogboost_ed_post_read_time_old ){

            update_post_meta ( $post_id, 'blogboost_ed_post_read_time', $blogboost_ed_post_read_time_new );

        }elseif( '' == $blogboost_ed_post_read_time_new && $blogboost_ed_post_read_time_old ) {

            delete_post_meta( $post_id,'blogboost_ed_post_read_time', $blogboost_ed_post_read_time_old );

        }



        $blogboost_ed_post_like_dislike_old = esc_html( get_post_meta( $post_id, 'blogboost_ed_post_like_dislike', true ) ); 
        $blogboost_ed_post_like_dislike_new = isset( $_POST['blogboost_ed_post_like_dislike'] ) ? absint( wp_unslash( $_POST['blogboost_ed_post_like_dislike'] ) ) : '';

        if ( $blogboost_ed_post_like_dislike_new && $blogboost_ed_post_like_dislike_new != $blogboost_ed_post_like_dislike_old ){

            update_post_meta ( $post_id, 'blogboost_ed_post_like_dislike', $blogboost_ed_post_like_dislike_new );

        }elseif( '' == $blogboost_ed_post_like_dislike_new && $blogboost_ed_post_like_dislike_old ) {

            delete_post_meta( $post_id,'blogboost_ed_post_like_dislike', $blogboost_ed_post_like_dislike_old );

        }



        $blogboost_ed_post_author_box_old = esc_html( get_post_meta( $post_id, 'blogboost_ed_post_author_box', true ) ); 
        $blogboost_ed_post_author_box_new = isset( $_POST['blogboost_ed_post_author_box'] ) ? absint( wp_unslash( $_POST['blogboost_ed_post_author_box'] ) ) : '';

        if ( $blogboost_ed_post_author_box_new && $blogboost_ed_post_author_box_new != $blogboost_ed_post_author_box_old ){

            update_post_meta ( $post_id, 'blogboost_ed_post_author_box', $blogboost_ed_post_author_box_new );

        }elseif( '' == $blogboost_ed_post_author_box_new && $blogboost_ed_post_author_box_old ) {

            delete_post_meta( $post_id,'blogboost_ed_post_author_box', $blogboost_ed_post_author_box_old );

        }



        $blogboost_ed_post_social_share_old = esc_html( get_post_meta( $post_id, 'blogboost_ed_post_social_share', true ) ); 
        $blogboost_ed_post_social_share_new = isset( $_POST['blogboost_ed_post_social_share'] ) ? absint( wp_unslash( $_POST['blogboost_ed_post_social_share'] ) ) : '';

        if ( $blogboost_ed_post_social_share_new && $blogboost_ed_post_social_share_new != $blogboost_ed_post_social_share_old ){

            update_post_meta ( $post_id, 'blogboost_ed_post_social_share', $blogboost_ed_post_social_share_new );

        }elseif( '' == $blogboost_ed_post_social_share_new && $blogboost_ed_post_social_share_old ) {

            delete_post_meta( $post_id,'blogboost_ed_post_social_share', $blogboost_ed_post_social_share_old );

        }



        $blogboost_ed_post_reaction_old = esc_html( get_post_meta( $post_id, 'blogboost_ed_post_reaction', true ) ); 
        $blogboost_ed_post_reaction_new = isset( $_POST['blogboost_ed_post_reaction'] ) ? absint( wp_unslash( $_POST['blogboost_ed_post_reaction'] ) ) : '';

        if ( $blogboost_ed_post_reaction_new && $blogboost_ed_post_reaction_new != $blogboost_ed_post_reaction_old ){

            update_post_meta ( $post_id, 'blogboost_ed_post_reaction', $blogboost_ed_post_reaction_new );

        }elseif( '' == $blogboost_ed_post_reaction_new && $blogboost_ed_post_reaction_old ) {

            delete_post_meta( $post_id,'blogboost_ed_post_reaction', $blogboost_ed_post_reaction_old );

        }



        $blogboost_ed_post_rating_old = esc_html( get_post_meta( $post_id, 'blogboost_ed_post_rating', true ) ); 
        $blogboost_ed_post_rating_new = isset( $_POST['blogboost_ed_post_rating'] ) ? absint( wp_unslash( $_POST['blogboost_ed_post_rating'] ) ) : '';

        if ( $blogboost_ed_post_rating_new && $blogboost_ed_post_rating_new != $blogboost_ed_post_rating_old ){

            update_post_meta ( $post_id, 'blogboost_ed_post_rating', $blogboost_ed_post_rating_new );

        }elseif( '' == $blogboost_ed_post_rating_new && $blogboost_ed_post_rating_old ) {

            delete_post_meta( $post_id,'blogboost_ed_post_rating', $blogboost_ed_post_rating_old );

        }

        foreach ( $blogboost_page_layout_options as $blogboost_post_layout_option ) {  
        
            $blogboost_page_layout_old = sanitize_text_field( get_post_meta( $post_id, 'blogboost_page_layout', true ) ); 
            $blogboost_page_layout_new = isset( $_POST['blogboost_page_layout'] ) ? blogboost_sanitize_post_layout_option_meta( wp_unslash( $_POST['blogboost_page_layout'] ) ) : '';

            if ( $blogboost_page_layout_new && $blogboost_page_layout_new != $blogboost_page_layout_old ){

                update_post_meta ( $post_id, 'blogboost_page_layout', $blogboost_page_layout_new );

            }elseif( '' == $blogboost_page_layout_new && $blogboost_page_layout_old ) {

                delete_post_meta( $post_id,'blogboost_page_layout', $blogboost_page_layout_old );

            }
            
        }

        $blogboost_ed_header_overlay_old = absint( get_post_meta( $post_id, 'blogboost_ed_header_overlay', true ) ); 
        $blogboost_ed_header_overlay_new = isset( $_POST['blogboost_ed_header_overlay'] ) ? absint( wp_unslash( $_POST['blogboost_ed_header_overlay'] ) ) : '';

        if ( $blogboost_ed_header_overlay_new && $blogboost_ed_header_overlay_new != $blogboost_ed_header_overlay_old ){

            update_post_meta ( $post_id, 'blogboost_ed_header_overlay', $blogboost_ed_header_overlay_new );

        }elseif( '' == $blogboost_ed_header_overlay_new && $blogboost_ed_header_overlay_old ) {

            delete_post_meta( $post_id,'blogboost_ed_header_overlay', $blogboost_ed_header_overlay_old );

        }

    }

endif;   