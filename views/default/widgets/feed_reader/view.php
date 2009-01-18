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
     
    echo $feed_url;
    $feed = new SimplePie();
    $feed->set_feed_url($feed_url);
    //$feed->set_autodiscovery_level(SIMPLEPIE_LOCATOR_ALL);
    $feed->init();
    $feed->handle_content_type();
echo $post_date;
  echo $feed->get_item_quantity();
?>
<h1><a href="<?php echo $feed->get_permalink(); ?>"><?php echo $feed->get_title(); ?></a></h1><br />
<?php
  if ($num_items > $feed->get_item_quantity())
    $num_items = $feed->get_item_quantity();
    
  foreach ($feed->get_items(0,$num_items) as $item):
?>
 
		<div class="item">
			<p><h3><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a></h3></p>
			<?php if ($excerpt) echo '<p>' . $item->get_description(true) . '</p>'; ?>
      <?php if ($post_date) 
            {
      ?>
              <p><small>Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></small></p>
      <?php } ?>
		</div>
 
	<?php endforeach; ?>

<?php 
  } else {
        
    echo '<p>' . elgg_echo('simplepie:notset') . '</p>';      
  }
?>

<!--			<p><?php //echo $item->get_description(); ?></p> -->
