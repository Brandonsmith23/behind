<?php
function baldwin_func( $atts ){
  return '<script type="text/javascript" src="//webhealthyrecipes.com/baldwin_suite/ajax/ajax.js.php"></script>';
  }
add_shortcode( 'baldwin', 'baldwin_func' );
