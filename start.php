<?php

  /**
   * Simplepie Plugin
   * 
   * Loads the simplepie feed parser library 
   **/
  
  function simplepie_init() 
  {
    global $CONFIG;
    
    if (!class_exists('SimplePie'))
    {
      require_once $CONFIG->pluginspath . '/simplepie/simplepie.inc';
    }
    
    add_widget_type('feed_reader', 'Feed Reader Widget', 'single feed');
  }
  
  register_elgg_event_handler('plugins_boot', 'system', 'simplepie_init');
?>
