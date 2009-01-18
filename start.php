<?php

  /**
   * Simplepie Plugin
   * 
   * Loads the simplepie feed parser library 
   **/
  
  function simplepie_init() 
  {    
    add_widget_type('feed_reader', 'Feed Reader Widget', 'single feed');
  }
  
  register_elgg_event_handler('plugins_boot', 'system', 'simplepie_init');
?>
