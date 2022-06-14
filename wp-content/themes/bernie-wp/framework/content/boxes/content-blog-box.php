                <li>
                    <div class="card">
                        <div class="image-container" style="background: url(<?php the_post_thumbnail_url( 'sq_md' ); ?>)">
                                <a href="<?php the_permalink( );?>" class="cover-card-link"></a>
                                <div class="triangle-top-left"></div>
                                <div class="triangle-top-left-white"></div>
                                <div class="triangle-bottom-right"></div>
                        </div>
                        <a href="<?php the_permalink( );?>">
                            <h2><?php the_title( ); ?></h2>
                            <p class="card-date"><?php echo get_the_date('j F'); ?></p>
                            <p class="h2-description">
                                <?php the_excerpt(); ?>
                            </p>
                        </a>
                        <a href="<?php the_permalink( ); ?>" class="btn btn-md btn-white"><span>More Info</span></a>
                    </div>
                </li>