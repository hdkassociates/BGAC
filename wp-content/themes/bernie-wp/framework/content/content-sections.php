<?php
if( have_rows('row') ):
    while ( have_rows('row') ) : the_row();
    
    // defaults
    $classes = array();
    $background_image = get_sub_field('background_image');
    $background_color = get_sub_field('background_color');
    $min_height = (get_sub_field('height') > 0 ? get_sub_field('height') : 100); 
    
    // inline styles    
    $backgroundStyle = 'background-color:'.$background_color.';';
    $heightStyle = 'min-height:'.$min_height.'vh;';

    if($background_image > 0) {
        $classes = addCSSClass('_bg-cover', $classes);
        $backgroundStyle = 'background-image: url('.hd_get_image_url_from_id($background_image, "slide").');';
    }

    $styles = $backgroundStyle.' '.$heightStyle;

    // classes
    $classes = addCSSClass('section', $classes);

    // text color
    $classes = addCSSClass(get_sub_field('text_color'), $classes);

    // text align
    $classes = addCSSClass(get_sub_field('text_align'), $classes);
    
    // blue overlay    
    if (get_sub_field('transparent_overlay'))
        $classes = addCSSClass('_overlay-blue', $classes);

    ?>
    <section class="<?=printCSSClasses($classes);?>" style="<?=$styles;?>">
        <?php get_template_part( 'framework/content/content', 'modules' ); ?>
    </section>
<?php
    endwhile;

else :

    // no layouts found

endif;
?>