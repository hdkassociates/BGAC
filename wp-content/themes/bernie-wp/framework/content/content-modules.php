<?php
if( have_rows('blocks') ):

    while ( have_rows('blocks') ) : the_row();

        if( get_row_layout() == 'heading' ):

            echo get_template_part('framework/layouts/sn-heading');

        elseif( get_row_layout() == 'wysiwyg' ):

            echo get_template_part('framework/layouts/sn-wysiwyg');

        elseif( get_row_layout() == 'spacing' ):

            echo get_template_part('framework/layouts/sn-gap');

        elseif( get_row_layout() == 'cta' ):

            echo get_template_part('framework/layouts/sn-cta');

        elseif( get_row_layout() == 'stats' ):

            echo get_template_part('framework/layouts/sn-stats');
        
        elseif( get_row_layout() == 'logo_list' ):

            echo get_template_part('framework/layouts/sn-logos');

        elseif( get_row_layout() == 'icon_list' ):

            echo get_template_part('framework/layouts/sn-icons');

        elseif( get_row_layout() == 'testimonials' ):

            echo get_template_part('framework/layouts/sn-testimonials');

        elseif( get_row_layout() == 'case_studies' ):

            echo get_template_part('framework/layouts/sn-case-studies');

        elseif( get_row_layout() == 'image' ):

            echo get_template_part('framework/layouts/sn-image');

        elseif( get_row_layout() == 'blog_feed' ):

            echo get_template_part('framework/layouts/sn-blog-feed');

        elseif( get_row_layout() == 'slider' ):

            echo get_template_part('framework/layouts/sn-slider');

        elseif( get_row_layout() == 'vertical_slider' ):

            echo get_template_part('framework/layouts/sn-vertical-slider');

        elseif( get_row_layout() == 'separator' ):

            echo get_template_part('framework/layouts/sn-separator');

        elseif( get_row_layout() == 'cta_strip' ):

            echo get_template_part('framework/layouts/sn-cta-strip');

        elseif( get_row_layout() == 'spotlights' ):

            echo get_template_part('framework/layouts/sn-spotlight');

        elseif( get_row_layout() == 'breadcrumbs' ):

            echo get_template_part('framework/layouts/sn-breadcrumbs');

        elseif( get_row_layout() == 'job_list' ):

            echo get_template_part('framework/layouts/sn-job-list');

        elseif( get_row_layout() == 'faq' ):

            echo get_template_part('framework/layouts/sn-faq');

        elseif( get_row_layout() == 'form' ):

            echo get_template_part('framework/layouts/sn-form');

        elseif( get_row_layout() == 'management' ):

            echo get_template_part('framework/layouts/sn-management');

        endif;

    endwhile;

else :

    // no layouts found

endif;
?>