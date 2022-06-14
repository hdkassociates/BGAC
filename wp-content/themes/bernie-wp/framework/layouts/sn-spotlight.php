<div class="container">
    <div class="three-columns important-items _text-center row">
        <?php if( have_rows('spotlight') ): $i=0; while( have_rows('spotlight') ): the_row(); $i++; ?>
        <div class="col-xs-12 col-sm-4 item">
            <h3 class="heading"><?php the_sub_field('header'); ?></h3>
            <div class="gap gap-30"></div>
            <p class="_text-content"><?php the_sub_field('description'); ?></p>
        </div>
        <?php
            if($i % 3 === 0):
              echo '<div class="clearfix"></div>';
            endif;
        ?>

        <?php endwhile; endif; ?>
    </div>
</div>