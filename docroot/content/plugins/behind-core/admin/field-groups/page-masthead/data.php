<?php
$group = array (
  'key' => 'group_54efc66d54864',
  'title' => 'Page Masthead',
  'fields' =>
  array (
    0 =>
    array (
      'key' => 'field_54efc66d5a0db',
      'label' => 'Banners',
      'name' => 'banner',
      'prefix' => '',
      'type' => 'repeater',
      'instructions' => 'Add Banner Image / Carousel to the Page',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' =>
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'min' => '',
      'max' => 6,
      'layout' => 'block',
      'button_label' => 'Add Banner',
      'sub_fields' =>
      array (
        0 =>
        array (
          'key' => 'field_54eff16112cba',
          'label' => 'General',
          'name' => '',
          'prefix' => '',
          'type' => 'tab',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' =>
          array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'placement' => 'top',
        ),
        1 =>
        array (
          'key' => 'field_54efe4212899b',
          'label' => 'Background',
          'name' => 'background',
          'prefix' => '',
          'type' => 'flexible_content',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' =>
          array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'button_label' => 'Add Background Image / Video',
          'min' => '',
          'max' => 1,
          'layouts' =>
          array (
            0 =>
            array (
              'key' => '54efe43362187',
              'name' => 'image',
              'label' => 'Image',
              'display' => 'block',
              'sub_fields' =>
              array (
                0 =>
                array (
                  'key' => 'field_54efe43c2899c',
                  'label' => 'Image',
                  'name' => 'image',
                  'prefix' => '',
                  'type' => 'image',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' =>
                  array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'return_format' => 'array',
                  'preview_size' => 'thumbnail',
                  'library' => 'all',
                  'min_width' => '',
                  'min_height' => '',
                  'min_size' => '',
                  'max_width' => '',
                  'max_height' => '',
                  'max_size' => '',
                  'mime_types' => '',
                ),
              ),
              'min' => '',
              'max' => '',
            ),
            1 =>
            array (
              'key' => '54efe4762899d',
              'name' => 'video',
              'label' => 'Video',
              'display' => 'row',
              'sub_fields' =>
              array (
                0 =>
                array (
                  'key' => 'field_54efe47b2899e',
                  'label' => 'Background Type',
                  'name' => 'background_type',
                  'prefix' => '',
                  'type' => 'select',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' =>
                  array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'choices' =>
                  array (
                    'oembed' => 'Oembed',
                    'hosted' => 'Hosted',
                  ),
                  'default_value' =>
                  array (
                    '' => '',
                  ),
                  'allow_null' => 0,
                  'multiple' => 0,
                  'ui' => 0,
                  'ajax' => 0,
                  'placeholder' => '',
                  'disabled' => 0,
                  'readonly' => 0,
                ),
                1 =>
                array (
                  'key' => 'field_54efe4e52899f',
                  'label' => 'oEmbed',
                  'name' => 'oembed',
                  'prefix' => '',
                  'type' => 'oembed',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' =>
                  array (
                    0 =>
                    array (
                      0 =>
                      array (
                        'field' => 'field_54efe47b2899e',
                        'operator' => '==',
                        'value' => 'oembed',
                      ),
                    ),
                  ),
                  'wrapper' =>
                  array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'width' => '',
                  'height' => '',
                ),
                2 =>
                array (
                  'key' => 'field_54efe578289a1',
                  'label' => 'Video WebM',
                  'name' => 'video_webm',
                  'prefix' => '',
                  'type' => 'file',
                  'instructions' => 'Browse for your WebM video file here.
This will be automatically played on load so make sure to use this responsibly for enhancing your design, rather than annoy your user. e.g. A video loop with no sound.
You must include this format & the mp4 format to render your video with cross browser compatibility. OGV is optional.
Video must be in a 16:9 aspect ratio.',
                  'required' => 0,
                  'conditional_logic' =>
                  array (
                    0 =>
                    array (
                      0 =>
                      array (
                        'field' => 'field_54efe47b2899e',
                        'operator' => '==',
                        'value' => 'hosted',
                      ),
                    ),
                  ),
                  'wrapper' =>
                  array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'return_format' => 'array',
                  'library' => 'all',
                  'min_size' => '',
                  'max_size' => '',
                  'mime_types' => '',
                ),
                3 =>
                array (
                  'key' => 'field_54efe687289a2',
                  'label' => 'Video MP4',
                  'name' => 'video_mp4',
                  'prefix' => '',
                  'type' => 'file',
                  'instructions' => 'Browse for your mp4 video file here.
See the note above for recommendations on how to properly use your video background.',
                  'required' => 0,
                  'conditional_logic' =>
                  array (
                    0 =>
                    array (
                      0 =>
                      array (
                        'field' => 'field_54efe47b2899e',
                        'operator' => '==',
                        'value' => 'hosted',
                      ),
                    ),
                  ),
                  'wrapper' =>
                  array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'return_format' => 'array',
                  'library' => 'all',
                  'min_size' => '',
                  'max_size' => '',
                  'mime_types' => '',
                ),
                4 =>
                array (
                  'key' => 'field_54efe6c1289a3',
                  'label' => 'Video OGV',
                  'name' => 'video_ogv',
                  'prefix' => '',
                  'type' => 'file',
                  'instructions' => 'Browse for your OGV video file here.
See the note above for recommendations on how to properly use your video background.',
                  'required' => 0,
                  'conditional_logic' =>
                  array (
                    0 =>
                    array (
                      0 =>
                      array (
                        'field' => 'field_54efe47b2899e',
                        'operator' => '==',
                        'value' => 'hosted',
                      ),
                    ),
                  ),
                  'wrapper' =>
                  array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'return_format' => 'array',
                  'library' => 'all',
                  'min_size' => '',
                  'max_size' => '',
                  'mime_types' => '',
                ),
                5 =>
                array (
                  'key' => 'field_54efe6fc289a4',
                  'label' => 'Preview Image',
                  'name' => 'preview_image',
                  'prefix' => '',
                  'type' => 'image',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' =>
                  array (
                    0 =>
                    array (
                      0 =>
                      array (
                        'field' => 'field_54efe47b2899e',
                        'operator' => '==',
                        'value' => 'hosted',
                      ),
                    ),
                  ),
                  'wrapper' =>
                  array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'return_format' => 'array',
                  'preview_size' => 'thumbnail',
                  'library' => 'all',
                  'min_width' => '',
                  'min_height' => '',
                  'min_size' => '',
                  'max_width' => '',
                  'max_height' => '',
                  'max_size' => '',
                  'mime_types' => '',
                ),
              ),
              'min' => '',
              'max' => '',
            ),
          ),
        ),
        2 =>
        array (
          'key' => 'field_54efc66d5c678',
          'label' => 'Header',
          'name' => 'header',
          'prefix' => '',
          'type' => 'text',
          'instructions' => 'Title of the Banner',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' =>
          array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
          'readonly' => 0,
          'disabled' => 0,
        ),
        3 =>
        array (
          'key' => 'field_54efc66d5c6a6',
          'label' => 'Caption',
          'name' => 'caption',
          'prefix' => '',
          'type' => 'wysiwyg',
          'instructions' => 'Header Sub Text',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' =>
          array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'tabs' => 'all',
          'toolbar' => 'full',
          'media_upload' => 0,
        ),
        4 =>
        array (
          'key' => 'field_54efebcccd2f1',
          'label' => 'Link',
          'name' => 'link',
          'prefix' => '',
          'type' => 'flexible_content',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' =>
          array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'button_label' => 'Add Link',
          'min' => '',
          'max' => 1,
          'layouts' =>
          array (
            0 =>
            array (
              'key' => '54efebd63991f',
              'name' => 'buttons',
              'label' => 'Buttons',
              'display' => 'block',
              'sub_fields' =>
              array (
                0 =>
                array (
                  'key' => 'field_54efed0dcd2f8',
                  'label' => 'Buttons',
                  'name' => 'buttons',
                  'prefix' => '',
                  'type' => 'repeater',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' =>
                  array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'min' => '',
                  'max' => 3,
                  'layout' => 'block',
                  'button_label' => 'Add Button',
                  'sub_fields' =>
                  array (
                    0 =>
                    array (
                      'key' => 'field_54efec54cd2f4',
                      'label' => 'Text',
                      'name' => 'text',
                      'prefix' => '',
                      'type' => 'text',
                      'instructions' => '',
                      'required' => 0,
                      'conditional_logic' => 0,
                      'wrapper' =>
                      array (
                        'width' => '',
                        'class' => '',
                        'id' => '',
                      ),
                      'default_value' => '',
                      'placeholder' => '',
                      'prepend' => '',
                      'append' => '',
                      'maxlength' => '',
                      'readonly' => 0,
                      'disabled' => 0,
                    ),
                    1 =>
                    array (
                      'key' => 'field_54efec6dcd2f5',
                      'label' => 'Link Type',
                      'name' => 'link_type',
                      'prefix' => '',
                      'type' => 'radio',
                      'instructions' => '',
                      'required' => 0,
                      'conditional_logic' => 0,
                      'wrapper' =>
                      array (
                        'width' => '',
                        'class' => '',
                        'id' => '',
                      ),
                      'choices' =>
                      array (
                        'Internal' => 'Internal',
                        'External' => 'External',
                      ),
                      'other_choice' => 0,
                      'save_other_choice' => 0,
                      'default_value' => 'internal',
                      'layout' => 'vertical',
                    ),
                    2 =>
                    array (
                      'key' => 'field_54efeca4cd2f6',
                      'label' => 'Link URL',
                      'name' => 'link_url',
                      'prefix' => '',
                      'type' => 'url',
                      'instructions' => '',
                      'required' => 0,
                      'conditional_logic' =>
                      array (
                        0 =>
                        array (
                          0 =>
                          array (
                            'field' => 'field_54efec6dcd2f5',
                            'operator' => '==',
                            'value' => 'External',
                          ),
                        ),
                      ),
                      'wrapper' =>
                      array (
                        'width' => '',
                        'class' => '',
                        'id' => '',
                      ),
                      'default_value' => '',
                      'placeholder' => '',
                    ),
                    3 =>
                    array (
                      'key' => 'field_54efeca9cd2f7',
                      'label' => 'Link URL',
                      'name' => 'link_url',
                      'prefix' => '',
                      'type' => 'page_link',
                      'instructions' => '',
                      'required' => 0,
                      'conditional_logic' =>
                      array (
                        0 =>
                        array (
                          0 =>
                          array (
                            'field' => 'field_54efec6dcd2f5',
                            'operator' => '==',
                            'value' => 'Internal',
                          ),
                        ),
                      ),
                      'wrapper' =>
                      array (
                        'width' => '',
                        'class' => '',
                        'id' => '',
                      ),
                      'post_type' => '',
                      'taxonomy' => '',
                      'allow_null' => 0,
                      'multiple' => 0,
                    ),
                  ),
                ),
              ),
              'min' => '',
              'max' => '',
            ),
            1 =>
            array (
              'key' => '54efec06cd2f2',
              'name' => 'full-slide',
              'label' => 'Full-Slide',
              'display' => 'row',
              'sub_fields' =>
              array (
                0 =>
                array (
                  'key' => 'field_54efed6ccd2fc',
                  'label' => 'Link Type',
                  'name' => 'link_type',
                  'prefix' => '',
                  'type' => 'radio',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' =>
                  array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'choices' =>
                  array (
                    'Internal' => 'Internal',
                    'External' => 'External',
                  ),
                  'other_choice' => 0,
                  'save_other_choice' => 0,
                  'default_value' => 'internal',
                  'layout' => 'vertical',
                ),
                1 =>
                array (
                  'key' => 'field_54efed6ccd2fd',
                  'label' => 'Link URL',
                  'name' => 'link_url',
                  'prefix' => '',
                  'type' => 'url',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' =>
                  array (
                    0 =>
                    array (
                      0 =>
                      array (
                        'field' => 'field_54efed6ccd2fc',
                        'operator' => '==',
                        'value' => 'External',
                      ),
                    ),
                  ),
                  'wrapper' =>
                  array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'default_value' => '',
                  'placeholder' => '',
                ),
                2 =>
                array (
                  'key' => 'field_54efed6ccd2fe',
                  'label' => 'Link URL',
                  'name' => 'link_url',
                  'prefix' => '',
                  'type' => 'page_link',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' =>
                  array (
                    0 =>
                    array (
                      0 =>
                      array (
                        'field' => 'field_54efed6ccd2fc',
                        'operator' => '==',
                        'value' => 'Internal',
                      ),
                    ),
                  ),
                  'wrapper' =>
                  array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'post_type' => '',
                  'taxonomy' => '',
                  'allow_null' => 0,
                  'multiple' => 0,
                ),
              ),
              'min' => '',
              'max' => '',
            ),
          ),
        ),
        5 =>
        array (
          'key' => 'field_54eff18012cbb',
          'label' => 'Settings',
          'name' => '',
          'prefix' => '',
          'type' => 'tab',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' =>
          array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'placement' => 'top',
        ),
        6 =>
        array (
          'key' => 'field_54eff19412cbc',
          'label' => 'Add texture overlay to background',
          'name' => 'texture_overlay',
          'prefix' => '',
          'type' => 'true_false',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' =>
          array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'message' => '',
          'default_value' => 0,
        ),
        7 =>
        array (
          'key' => 'field_54eff1b412cbd',
          'label' => 'Background Alignment',
          'name' => 'background_alignment',
          'prefix' => '',
          'type' => 'select',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' =>
          array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'choices' =>
          array (
            'top' => 'Top',
            'center' => 'Center',
            'bottom' => 'Bottom',
          ),
          'default_value' =>
          array (
            '' => '',
          ),
          'allow_null' => 0,
          'multiple' => 0,
          'ui' => 0,
          'ajax' => 0,
          'placeholder' => '',
          'disabled' => 0,
          'readonly' => 0,
        ),
        8 =>
        array (
          'key' => 'field_54eff8f0af747',
          'label' => 'Parallax',
          'name' => 'parallax',
          'prefix' => '',
          'type' => 'true_false',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' =>
          array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'message' => '',
          'default_value' => 0,
        ),
        9 =>
        array (
          'key' => 'field_54eff1de12cbe',
          'label' => 'Slide Font Color',
          'name' => 'font_color',
          'prefix' => '',
          'type' => 'color_picker',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' =>
          array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
        ),
        10 =>
        array (
          'key' => 'field_54effad941626',
          'label' => 'Horizontal Alignment',
          'name' => 'horizontal_alignment',
          'prefix' => '',
          'type' => 'select',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' =>
          array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'choices' =>
          array (
            'left' => 'Left',
            'centered' => 'Centered',
            'right' => 'Right',
          ),
          'default_value' =>
          array (
            '' => '',
          ),
          'allow_null' => 0,
          'multiple' => 0,
          'ui' => 0,
          'ajax' => 0,
          'placeholder' => '',
          'disabled' => 0,
          'readonly' => 0,
        ),
        11 =>
        array (
          'key' => 'field_54effb2741627',
          'label' => 'Vertical Alignment',
          'name' => 'vertical_alignment',
          'prefix' => '',
          'type' => 'select',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' =>
          array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'choices' =>
          array (
            'top' => 'Top',
            'middle' => 'Middle',
            'bottom' => 'Bottom',
          ),
          'default_value' =>
          array (
            '' => '',
          ),
          'allow_null' => 0,
          'multiple' => 0,
          'ui' => 0,
          'ajax' => 0,
          'placeholder' => '',
          'disabled' => 0,
          'readonly' => 0,
        ),
        12 =>
        array (
          'key' => 'field_54effc5929667',
          'label' => 'Extra Class Name',
          'name' => 'extra_class_name',
          'prefix' => '',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' =>
          array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
          'readonly' => 0,
          'disabled' => 0,
        ),
      ),
    ),
    1 =>
    array (
      'key' => 'field_54effe5202197',
      'label' => 'Height',
      'name' => 'height',
      'prefix' => '',
      'type' => 'number',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' =>
      array (
        'width' => 40,
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'min' => 100,
      'max' => 1200,
      'step' => 10,
      'readonly' => 0,
      'disabled' => 0,
    ),
    2 =>
    array (
      'key' => 'field_556a26069400c',
      'label' => 'Class',
      'name' => 'class',
      'prefix' => '',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' =>
      array (
        'width' => 60,
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    3 =>
    array (
      'key' => 'field_556a2b4513bd1',
      'label' => 'Page Content',
      'name' => '',
      'prefix' => '',
      'type' => 'message',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' =>
      array (
        'width' => 30,
        'class' => '',
        'id' => '',
      ),
      'message' => 'Content Settings',
      'esc_html' => 0,
    ),
    4 =>
    array (
      'key' => 'field_556a28fa0a15e',
      'label' => 'Overlay',
      'name' => 'overlay',
      'prefix' => '',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' =>
      array (
        'width' => 25,
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 0,
    ),
    5 =>
    array (
      'key' => 'field_556a2a3d88038',
      'label' => 'Overlay Margin',
      'name' => 'overlay_margin',
      'prefix' => '',
      'type' => 'number',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' =>
      array (
        'width' => 45,
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => 'vh',
      'min' => 1,
      'max' => 45,
      'step' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
  ),
  'location' =>
  array (
    0 =>
    array (
      0 =>
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'post',
      ),
    ),
    1 =>
    array (
      0 =>
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'page',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'param' => 'taxonomy',
        'operator' => '==',
        'value' => 'product_industry',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'acf_after_title',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
);
