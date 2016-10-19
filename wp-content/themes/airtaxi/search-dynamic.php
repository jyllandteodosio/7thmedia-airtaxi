<?php get_header('qt'); ?>

<?php

    
// Filter a query by first letter of a custom field
 
$post_type = 'people';  // Post type to query
$meta_key = 'last_name';  // The key of the custom field
 
// Filter functions
function mam_posts_fields ($fields) {
   global $mam_global_fields;
   // Make sure there is a leading comma
   if ($mam_global_fields) $fields .= (preg_match('/^(\s+)?,/',$mam_global_fields)) ? $mam_global_fields : ", $mam_global_fields";
      return $fields;
}
function mam_posts_where ($where) {
   global $mam_global_where;
   if ($mam_global_where) $where .= " $mam_global_where";
      return $where;
}
add_filter('posts_fields','mam_posts_fields');
add_filter('posts_where','mam_posts_where');
    
// Get the permalink of this page to use in the letter links
if (have_posts()) {
   while (have_posts()) {
      the_post();
      $this_page = get_permalink();
   }
    
   // Make the menu
   for ($i=0;$i<26 ;++$i ) {
      $this_letter = chr(ord('A') + $i);
      $letter_link = add_query_arg('first-letter',$this_letter,$this_page);
      ?>
      <a href="<?php echo $letter_link; ?>" title="<?php echo "letter-$this_letter"; ?>"> [<?php echo $this_letter; ?> ]</a>
   <?php }
 
   $query_letter = ($_GET['first-letter']) ? $_GET['first-letter'] : 'A';
   $mam_global_fields = " $wpdb->postmeta.meta_value AS meta_value, UPPER(SUBSTR($wpdb->postmeta.meta_value,1,1)) AS first_letter";
   $mam_global_where = " AND UPPER(SUBSTR($wpdb->postmeta.meta_value,1,1)) = '$query_letter'";
                         
   $args = array(
      'post_type' => $post_type,
      'meta_key' => $meta_key,
      'ignore_sticky_posts' => 1,
      'orderby' => 'meta_value'
   );
   query_posts($args);
   if (have_posts()) {
      while (have_posts()) {
         the_post();
         // Put your code here to display the posts
         echo "<p>TITLE:";the_title();echo " LETTER:$post->first_letter VALUE:$post->meta_value</p>";
      }
   } else {
      echo "<h2>No entries found for $query_letter</h2>";
   }
}
                                        
?>


<?php get_footer('qt'); ?>