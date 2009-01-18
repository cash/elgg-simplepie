<?php
  global $CONFIG;
    
  if (!class_exists('SimplePie'))
  {
    require_once $CONFIG->pluginspath . '/simplepie/simplepie.inc';
  }
   
  $feed_url = $vars['entity']->feed_url;
  if($feed_url){

    $excerpt   = $vars['entity']->excerpt;
    $num_items = $vars['entity']->num_items;
    $post_date = $vars['entity']->post_date;
     
    $feed = new SimplePie($feed_url);

?>
  <div class="simplepie_blog_title">
    <h2><a href="<?php echo $feed->get_permalink(); ?>"><?php echo $feed->get_title(); ?></a></h2>
  </div>
<?php
  if ($num_items > $feed->get_item_quantity())
    $num_items = $feed->get_item_quantity();
    
  foreach ($feed->get_items(0,$num_items) as $item):
?>
 
		<div class="simplepie_item">
		  <div class="simplepie_title">
			  <h4><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a></h4>
      </div>
			<?php if ($excerpt) echo '<div class="simplepie_excerpt">' . $item->get_description(true) . '</div>'; ?>
      <?php if ($post_date) 
            {
      ?>
        <div class="simplepie_date">Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></div>
      <?php } ?>
		</div>
 
	<?php endforeach; ?>

<?php 
  } else {
        
    echo '<p>' . elgg_echo('simplepie:notset') . '</p>';      
  }
?>
