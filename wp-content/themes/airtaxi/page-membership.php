<?php
/**
 * Template Name: Membership Page
 *
 * @author 
 * @package 
 * @subpackage 
 */

add_action( 'wp_enqueue_scripts', 'membership_enqueue_scripts_styles' );
function membership_enqueue_scripts_styles() {
    
    wp_enqueue_script( 'membership', get_bloginfo( 'stylesheet_directory' ) . '/js/membership.min.js', array( 'jquery' ), '1.0.0' );
}

get_header('custom');
$title = get_the_title();
$page_title = strtolower($title);
?>
<div id="perks" class="m-panel">
    <div class="m-panel-title">
        <h1>Membership</h1>
    </div>
    <?php
        //* Get all membership page posts 
        $args = array(
            'posts_per_page'   => 1,
            'category_name'    => 'membership+perks',
            'orderby'          => 'date',
            'order'            => 'ASC',
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'suppress_filters' => true 
        );
        $posts_array = get_posts( $args ); 

        foreach ( $posts_array as $post ) :
    ?>

    <div class="m-panel-content mperks">
        <h2 class="m-panel-header">
            <?php the_title(); ?>
        </h2>

        <div class="m-panel-table">
            <?php
                $content = $post->post_content;
                echo apply_filters( 'the_content',$content );
            ?>
        </div>
    </div>

    <?php
    
        endforeach; 
    
        //* Get all membership page posts 
        $args = array(
            'posts_per_page'   => 1,
            'category_name'    => 'membership+rates',
            'orderby'          => 'date',
            'order'            => 'ASC',
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'suppress_filters' => true 
        );
        $posts_array = get_posts( $args ); 

        foreach ( $posts_array as $post ) :
    ?>

    <div id="rates" class="m-panel-content mrates" style="background-image: url('<?php echo get_bloginfo( 'stylesheet_directory' ).'/images/bg-5.jpg'; ?>')">
        <h2 class="m-panel-header">
            <?php the_title(); ?>
        </h2>

        <div class="m-panel-table">
            <?php
                $content = $post->post_content;
                echo apply_filters( 'the_content',$content );
            ?>
        </div>
    </div>

    <?php endforeach; ?>
</div>

<?php get_footer('custom'); ?>
