<?php
   
  $feed_url = $vars['entity']->feed_url;
  if($feed_url){

    $feed = new SimplePie($feed_url);
    $feed->handle_content_type();


?>
<h1><a href="<?php echo $feed->get_permalink(); ?>"><?php echo $feed->get_title(); ?></a></h1>
	<?php
	/*
	Here, we'll loop through all of the items in the feed, and $item represents the current item in the loop.
	*/
	foreach ($feed->get_items() as $item):
	?>
 
		<div class="item">
			<h2><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a></h2>
			<p><?php echo $item->get_description(); ?></p>
			<p><small>Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></small></p>
		</div>
 
	<?php endforeach; ?>
<?php 
  } else {
        
    echo '<p>' . elgg_echo('simplepie:notset') . '</p>';      
  }
?>
