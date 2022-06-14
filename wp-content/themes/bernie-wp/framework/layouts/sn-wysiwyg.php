<?php 
    $classes = array();

    // defaults
    $classes = addCSSClass('_text-size-medium', $classes);

    // width
    $classes = addCSSClass(get_sub_field('width'), $classes);

    // text color
    $classes = addCSSClass(get_sub_field('text_color'), $classes);

    // text align
    $classes = addCSSClass(get_sub_field('text_align'), $classes);

    // styles
    $columnsStyle = 'column-count:'.get_sub_field('columns').';';
    $styles = $columnsStyle;
?>
<div class="container">
    <div class="sn-wysiwyg <?=printCSSClasses($classes);?>" style="<?=$styles;?>">
        <?php the_sub_field('content'); ?>
    </div>
</div>