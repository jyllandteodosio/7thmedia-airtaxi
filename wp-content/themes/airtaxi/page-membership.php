<?php
/**
 * Template Name: Membership Page
 *
 * @author 
 * @package 
 * @subpackage 
 */

get_header('custom');
$page_title = strtolower(get_the_title());
?>
<div class="m-panel">
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

    <div id="perks" class="m-panel-content mperks">
        <div class="m-panel-header">
            <?php the_title(); ?>
        </div>

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
        <div class="m-panel-header">
            <?php the_title(); ?>
        </div>

        <div class="m-panel-table">
            <?php
                $content = $post->post_content;
                echo apply_filters( 'the_content',$content );
            ?>
        </div>
    </div>

    <?php endforeach; ?>
</div>

<?php get_footer(); ?>
