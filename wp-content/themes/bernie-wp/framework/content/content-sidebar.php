<?php if(get_field('use_custom_sidebar')): ?>

    <?php 
    if ( have_rows( 'custom_sidebar' ) ) : ?>
    <div class="aside">
        <ul class="row-3 text-center list-inline list-unstyled">
            <?php while ( have_rows( 'custom_sidebar' ) ) : the_row(); ?>
                <?php $sidebarId = get_sub_field('sidebar'); ?>
                <li>
                    <div class="card two-cta">
                        <div class="image-container" style="background: url(<?php echo hd_get_image_url_from_id(get_field('photo', $sidebarId ), 'sq_md'); ?>)">
                            <div class="triangle-top-left"></div>
                            <div class="triangle-top-left-white"></div>
                            <div class="triangle-bottom-right"></div>
                        </div>
                        <a href="<?php the_permalink( get_field('widget_1', $sidebarId ) ); ?>">
                            <h2><?php the_field('title', $sidebarId ) ?></h2>
                            <p class="card-date"><?php the_field('subtitle', $sidebarId ) ?></p>
                            <p class="h2-description">
                                <?php the_field('description', $sidebarId ); ?>
                            </p>
                        </a>
                        <a href="<?php the_field('button_1_url', $sidebarId ); ?>" class="btn btn-md btn-white"><span><?php the_field('button_1_text', $sidebarId); ?></span></a>
                        <?php if(get_field('button_2_url', $sidebarId)): ?>
                        <a href="<?php the_field('button_2_url', $sidebarId ); ?>" class="btn btn-md btn-white btn-second"><span><?php the_field('button_2_text', $sidebarId); ?></span></a>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>

    <?php endif;?>

<?php else: ?>
    <div class="aside">
        <ul class="row-3 text-center list-inline list-unstyled">
            <li>
                <div class="card two-cta">
                    <div class="image-container" style="background: url(<?php echo hd_get_image_url_from_id(get_field('widget_image', 'options'), 'sq_md'); ?>)">
                        <div class="triangle-top-left"></div>
                        <div class="triangle-top-left-white"></div>
                        <div class="triangle-bottom-right"></div>
                    </div>
                    <a>
                        <h2><?php the_field('widget_title', 'options') ?></h2>
                        <p class="card-date"><?php the_field('widget_subtitle', 'options') ?></p>
                        <p class="h2-description">
                            <?php the_field('widget_description', 'options'); ?>
                        </p>
                    </a>
                    <?php if(strip_tags(get_field('widget_button_url_copy', 'options'))): ?>
                    <a href="<?=strip_tags(get_field('widget_button_url_copy', 'options')); ?>" class="btn btn-md btn-white"><span><?php the_field('widget_button_text_copy', 'options'); ?></span></a>
                    <?php endif; ?>
                    <?php if(strip_tags(get_field('widget_button_url', 'options'))): ?>
                    <a href="<?=strip_tags(get_field('widget_button_url', 'options')); ?>" class="btn btn-md btn-white btn-second"><span><?php the_field('widget_button_text', 'options'); ?></span></a>
                    <?php endif; ?>
                </div>
            </li>
            <li>
                <div class="card two-cta">
                    <div class="image-container" style="background: url(<?php echo hd_get_image_url_from_id(get_field('widget2_image', 'options'), 'sq_md'); ?>)">
                        <div class="triangle-top-left"></div>
                        <div class="triangle-top-left-white"></div>
                        <div class="triangle-bottom-right"></div>
                    </div>
                    <a>
                        <h2><?php the_field('widget2_title', 'options') ?></h2>
                        <p class="card-date"><?php the_field('widget2_subtitle', 'options') ?></p>
                        <p class="h2-description">
                            <?php the_field('widget2_description', 'options'); ?>
                        </p>
                    </a>
                    <?php if(strip_tags(get_field('widget2_button_url_copy', 'options'))): ?>
                        <a href="<?=strip_tags(get_field('widget2_button_url_copy', 'options')); ?>" class="btn btn-md btn-white"><span><?php the_field('widget2_button_text_copy', 'options'); ?></span></a>
                    <?php endif; ?>
                    <?php if(strip_tags(get_field('widget2_button_url', 'options'))): ?>
                        <a href="<?=strip_tags(get_field('widget2_button_url', 'options')); ?>" class="btn btn-md btn-white btn-second"><span><?php the_field('widget2_button_text', 'options'); ?></span></a>
                    <?php endif; ?>
                </div>
            </li>
        </ul>
    </div>
<?php endif; ?>