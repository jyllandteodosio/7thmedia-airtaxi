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

    <main class="content">
        <?php
            //* Get all membership page posts 
            $args = array(
                'posts_per_page'   => 2,
                'category_name'    => 'membership',
                'orderby'          => 'date',
                'order'            => 'ASC',
                'post_type'        => 'post',
                'post_status'      => 'publish',
                'suppress_filters' => true 
            );
            $posts_array = get_posts( $args ); 

            foreach ( $posts_array as $post ) :
        ?>
        
        <div class="m-panel-content">
            <div class="m-panel-header">
                <?php the_title(); ?>
            </div>

            <div class="m-panel-table">
                <?php
                    //do_shortcode(the_content());
                    $content = $post->post_content;
                    echo apply_filters('the_content',$content);
                ?>
            </div>
        </div>
        
        <?php endforeach; ?>
    </main>
</div>

<?php get_footer(); ?>
