<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header row">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><img src=<?php echo get_stylesheet_directory_uri().'/assets/img/btq-logo.png'; ?>></a>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'walker' => new Roots_Nav_Walker(), 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
    </nav>
  </div>
</header>

<?php
  load_template(STYLESHEETPATH.'/templates/components/masthead.php');
?>

<div class="container">
  <div class="sheader">
    <?php
      if (has_nav_menu('secondary_navigation')) :
        wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'snav'));
      endif;
    ?>
  </div>
</div>
