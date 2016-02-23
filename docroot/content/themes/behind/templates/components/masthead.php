<?php

global $post;

if( $banner_arr = display_masthead() ) { ?>

  <section id="page-slider" class="masthead<?php if( count($banner_arr) > 1 ) echo ' carousel slide carousel-fade'; ?>" <?php if( count($banner_arr) > 1 ) echo 'data-ride="carousel"'; ?>>

    <?php

      if( count($banner_arr) > 1 )
        echo '<div class="carousel-inner" role="listbox">';

      #echo '<pre>';print_r($banner_arr);echo '</pre>';

      $i = 0;
      foreach( $banner_arr as $banner ) { $i++;

        #echo '<pre>';print_r( $banner );echo '</pre>';

        $picture_html = '';

        // background type
        switch( $banner['background'][0]['acf_fc_layout'] ) {

          // iamge
          case 'image' :

            if (is_front_page()) {

              $bk_img_arr = isset($banner['background'][0]['image']['sizes']) ? $banner['background'][0]['image']['sizes'] : null ;

              // var_dump($bk_img_arr); die;
              // Image sizes
              //  array(18) {
              //   ["thumbnail"]=>
              //   string(73) "http://localhost:1025/content/uploads/2015/10/Data-cloud-full-150x150.jpg"
              //   ["thumbnail-width"]=>
              //   int(150)
              //   ["thumbnail-height"]=>
              //   int(150)
              //   ["medium"]=>
              //   string(73) "http://localhost:1025/content/uploads/2015/10/Data-cloud-full-300x143.jpg"
              //   ["medium-width"]=>
              //   int(300)
              //   ["medium-height"]=>
              //   int(143)
              //   ["large"]=>
              //   string(74) "http://localhost:1025/content/uploads/2015/10/Data-cloud-full-1024x487.jpg"
              //   ["large-width"]=>
              //   int(1024)
              //   ["large-height"]=>
              //   int(487)
              //   ["header-image"]=>
              //   string(74) "http://localhost:1025/content/uploads/2015/10/Data-cloud-full-2000x400.jpg"
              //   ["header-image-width"]=>
              //   int(2000)
              //   ["header-image-height"]=>
              //   int(400)
              //   ["homeslider-image"]=>
              //   string(74) "http://localhost:1025/content/uploads/2015/10/Data-cloud-full-2000x600.jpg"
              //   ["homeslider-image-width"]=>
              //   int(2000)
              //   ["homeslider-image-height"]=>
              //   int(600)
              //   ["homeslider-mobile"]=>
              //   string(73) "http://localhost:1025/content/uploads/2015/10/Data-cloud-full-600x600.jpg"
              //   ["homeslider-mobile-width"]=>
              //   int(600)
              //   ["homeslider-mobile-height"]=>
              //   int(600)
              // }

              if( isset($bk_img_arr) && ! empty($bk_img_arr) ) {
                $picture_html = render_picture_element( array(
                  'base_img' => $bk_img_arr['medium'],
                  'images'   => array(
                    array( 'size' => '320px', 'srcset' => array( $bk_img_arr['homeslider-mobile'] ) ),
                    array( 'size' => '768px', 'srcset' => array( $bk_img_arr['homeslider-image'] ) )
                  )
                ) );
              }

            } else {

              $bk_img_arr = isset($banner['background'][0]['image']['sizes']) ? $banner['background'][0]['image']['sizes'] : null ;
              if( isset($bk_img_arr) && ! empty($bk_img_arr) ) {
                $picture_html = render_picture_element( array(
                  'base_img' => $bk_img_arr['medium'],
                  'images'   => array(
                    array( 'size' => '320px', 'srcset' => array( $bk_img_arr['header-image-mobile'] ) ),
                    array( 'size' => '768px', 'srcset' => array( $bk_img_arr['header-image'] ) )
                  )
                ) );
              }

            }


            break;

          // video
          case 'video' :
            $picture_html = '<picture></picture>';
            break;

        }


        // caption
        $caption_html = '';
        $caption_class = array('caption');


        if( isset($banner['header']) && ! empty($banner['header']))
          $caption_html .= html('h1', array('class'=>'title'), $banner['header']);
        if( isset($banner['caption']) && ! empty($banner['caption']))
          $caption_html .= wpautop($banner['caption']);



        // link(s)
        if( isset($banner['link']) && !empty($banner['link']) && count($banner['link']) >= 1) {
          foreach( $banner['link'] as $link ) {

            switch($link['acf_fc_layout']) {

              case 'buttons':

                foreach( $link['buttons'] as $button ) {
                  $caption_html .= html( 'a', array('class'=>'btn btn-default','href'=>$button['link_url']), __($button['text'],'riot-2015') );
                }

                break;

              case 'full-slide':

                // foreach( $link['full-slide'] as $button ) {
                  $full_slide_link_html = html( 'a', array('class'=>'full-slide-link','href'=>$link['link_url']) );
                // }

                break;

              default :
                break;

            }

          }
        }




        if( !empty($caption_html) )
          $caption_html = html( 'div', array('class' => arr_to_classnames($caption_class)), $caption_html );


        // build item/slide classes
        $item_classes = array('item');

        if($i == 1 && count($banner_arr) > 1)
          $item_classes[] = 'active';

        if( isset($banner['texture_overlay']) && !empty($banner['texture_overlay'])  )
          $item_classes[] = 'texture';


        $item_args = array(
          'class' => arr_to_classnames( $item_classes )
        );

        if ($full_slide_link_html) {
          echo html( 'div', $item_args, $picture_html, $caption_html, $full_slide_link_html );
        } else {
          echo html( 'div', $item_args, $picture_html, $caption_html );
        }



      }

      if( count($banner_arr) > 1 )
        echo '</div">';

    ?>

    <?php if (count($banner_arr) > 1): ?>
      <!-- Controls -->
       <a class="left carousel-control" href="#page-slider" role="button" data-slide="prev">
         <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
       </a>
       <a class="right carousel-control" href="#page-slider" role="button" data-slide="next">
         <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
       </a>
    <?php endif; ?>

  </section>

  <?php

}
