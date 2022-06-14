<?php 
    $classes = array();

    // width
    $classes = addCSSClass(get_sub_field('width'), $classes);

    // text color
    $classes = addCSSClass(get_sub_field('text_color'), $classes);

    // text align
    $classes = addCSSClass(get_sub_field('text_align'), $classes);

    $size = get_sub_field('size');

    if($size == 'h1') {
        $classes = addCSSClass('heading-main', $classes);
    } else if($size == 'h2') {
        $classes = addCSSClass('heading', $classes);        
    }

    
?>
<div class="container">
    <<?=$size;?> class="<?=printCSSClasses($classes);?>">
        <?php the_sub_field('text'); ?>
    </<?=$size;?>>
</div>