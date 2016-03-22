<?php
/**
 * Utility functions
 */
function is_element_empty($element) {
  $element = trim($element);
  return !empty($element);
}

// Tell WordPress to use searchform.php from the templates/ directory
function roots_get_search_form() {
  $form = '';
  locate_template('/templates/searchform.php', true, false);
  return $form;
}
add_filter('get_search_form', 'roots_get_search_form');

/**
 * Add page slug to body_class() classes if it doesn't exist
 */
function roots_body_class($classes) {
  // Add post/page slug
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }
  return $classes;
}
add_filter('body_class', 'roots_body_class');


// take an array and add it as inline styles
if( ! function_exists( 'arr_to_inline_css' ) ) :
	function arr_to_inline_css( $arr ) {
		if( ! is_array($arr) ) return;
		array_walk( $arr, create_function('&$i,$k','$i=" $k:$i;";'));
		$p_string = implode($arr,"");
		return $p_string;
	}
endif;


// take an array and create classnames
if( ! function_exists( 'arr_to_classnames' ) ) :
	function arr_to_classnames( $arr ) {
		if( ! is_array($arr) ) return;
		$p_string = implode($arr," ");
		return $p_string;
	}
endif;


if ( ! function_exists( 'flatten_array' ) ) {
  function flatten_array(array $array) {
    $flattened_array = array();
    array_walk_recursive($array, function($a) use (&$flattened_array) { $flattened_array[] = $a; });
    return $flattened_array;
  }
}


if ( ! function_exists( 'simplify_array' ) ) {
  function simplify_array(array $array) {
    return call_user_func_array('array_merge', $array);
  }
}



//_____Minimalist HTML framework_____

/**
 * Generate an HTML tag. Atributes are escaped. Content is NOT escaped.
 */
if ( ! function_exists( 'html' ) ):
function html( $tag ) {
	$args = func_get_args();

	$tag = array_shift( $args );

	if ( is_array( $args[0] ) ) {
		$closing = $tag;
		$attributes = array_shift( $args );
		foreach ( $attributes as $key => $value ) {
			if ( false === $value )
				continue;

			if ( true === $value )
				$value = $key;

			$tag .= ' ' . $key . '="' . esc_attr( $value ) . '"';
		}
	} else {
		list( $closing ) = explode( ' ', $tag, 2 );
	}

	if ( in_array( $closing, array( 'area', 'base', 'basefont', 'br', 'hr', 'input', 'img', 'link', 'meta' ) ) ) {
		return "<{$tag} />";
	}

	$content = implode( '', $args );

	return "<{$tag}>{$content}</{$closing}>";
}
endif;

// Generate an <a> tag
if ( ! function_exists( 'html_link' ) ):
function html_link( $url, $title = '' ) {
	if ( empty( $title ) )
		$title = $url;

	return html( 'a', array( 'href' => $url ), $title );
}
endif;



/**
 * Get other templates (e.g. product attributes) passing attributes and including the file.
 *
 * @access public
 * @param string $template_name
 * @param array $args (default: array())
 * @param string $template_path (default: '')
 * @param string $default_path (default: '')
 * @return void
 */
function riot_get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
	if ( $args && is_array( $args ) ) {
		extract( $args );
	}

	$located = riot_locate_template( $template_name, $template_path, $default_path );

	if ( ! file_exists( $located ) ) {
		_doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $located ), '2.1' );
		return;
	}

	// Allow 3rd party plugin filter template file from their plugin
	$located = apply_filters( 'riot_get_template', $located, $template_name, $args, $template_path, $default_path );

	do_action( 'riot_before_template_part', $template_name, $template_path, $located, $args );

	include( $located );

	do_action( 'riot_after_template_part', $template_name, $template_path, $located, $args );
}



/**
 * Locate a template and return the path for inclusion.
 *
 * This is the load order:
 *
 *		yourtheme		/	$template_path	/	$template_name
 *		yourtheme		/	$template_name
 *		$default_path	/	$template_name
 *
 * @access public
 * @param string $template_name
 * @param string $template_path (default: '')
 * @param string $default_path (default: '')
 * @return string
 */
function riot_locate_template( $template_name, $template_path = '', $default_path = '' ) {

  if( function_exists('ctu')) {
    if ( ! $template_path ) {
  		$template_path = ctu()->template_path();
  	}

  	if ( ! $default_path ) {
  		$default_path = ctu()->plugin_path() . '/templates/';
  	}
  } else {
    $default_path = '/';
  }


	// Look within passed path within the theme - this is priority
	$template = locate_template(
		array(
			trailingslashit( $template_path ) . $template_name,
			$template_name
		)
	);

	// Get default template
	if ( ! $template ) {
		$template = $default_path . $template_name;
	}

	// Return what we found
	return apply_filters( 'riot_locate_template', $template, $template_name, $template_path );
}





function render_picture_element( $args = array() ) {

  extract( wp_parse_args( $args, array(

    'base_img' => 'http://placehold.it/160x160',
    'images'   => array(
      array( 'size' => '320px', 'srcset' => 'http://placehold.it/320x320 1x, http://placehold.it/640x640 2x' ),
      array( 'size' => '600px', 'srcset' => array( 'http://placehold.it/480x600', 'http://placehold.it/960x1200' ) ),
      array( 'size' => '1800px', 'srcset' => array( 'http://placehold.it/960x1200' ) )
    )

  )) );

  $parts = '';

  foreach ( array_reverse ($images) as $image ) {

    #echo '<pre>';print_r($image);echo '</pre>';

    if( isset($image['srcset'])  && is_array($image['srcset'])) {
      if( count($image['srcset']) > 1 ) {
        $parts .= html( 'source', array( 'media' => '(min-width: '. $image['size'] .')',  'srcset' => $image['srcset'][0] . ' 1x, '. $image['srcset'][1] .' 2x' ) );
      } else {
        $parts .= html( 'source', array( 'media' => '(min-width: '. $image['size'] .')',  'srcset' => $image['srcset'][0] ) );
      }
    } else {
        $parts .= html( 'source', array( 'media' => '(min-width: '. $image['size'] .')',  'srcset' => $image['srcset'] ) );
    }

  }

	// picture html
	$picture_html = html( 'picture',
	 '<!--[if IE 9]><video style="display: none;"><![endif]-->',
    $parts,
		'<!--[if IE 9]></video><![endif]-->',
		html( 'img', array( 'src' => $base_img ) ) // 160x160
		//html( 'img', array( 'src' => get_template_directory_uri() . '/assets/img/community.jpg' ) ) // 160x160 - 320x320
	);

  return $picture_html;

}

function if_display_page_title() {
  if( is_front_page() )
    return false;
  else
    return true;
}

function display_masthead() {

  if (is_tax()) {
    // load all 'category' terms for the post
    // $terms = get_the_terms( get_the_ID(), 'category');

    $queried_object = get_queried_object();
    $banner_arr = get_field('banner', $queried_object );

  } else {
    $banner_arr = get_field('banner');
  }

  return $banner_arr;
}

/** get the current post type */
if( ! function_exists( 'get_current_post_type' ) ) :
	function get_current_post_type() {
		global $post;
		return get_post_type($post);
	}
endif;


/** determine if the post is part of a page tree */
if( ! function_exists( 'is_post_ancestor' ) ) :
	function is_post_ancestor( $pid ) {
		global $post;

		if( ! isset($post) ) return false;
		if ( is_page($pid) ) return true;
		$anc = get_post_ancestors( $post->ID );
		foreach ( $anc as $ancestor ) {
			if( is_page() && $ancestor == $pid ) {
				return true;
			}
		}
		return false;  // we arn't at the page, and the page is not an ancestor
	}
endif;


/** is blog */
if( ! function_exists( 'is_blog' ) ) :
	function is_blog() {
		return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag()))
			&& ( get_current_post_type() == 'post') ) ? true : false;
	}
endif;

function new_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');
