    </main>
    <footer id="footer">
        <div class="footer-content-wrapper">
            <div class="box-wrapper">
                <ul class="list-unstyled list-inline">
                    <li class="box-contact">
                        <ul class="list-unstyled">
                            <li>
                                <h2 class="footer-box-title">Contact</h2>
                            </li>
                            <li>
                                <p>
                                    <span>Bernie Grant Arts Centre</span>
                                    <span>Town Hall Approach Road</span>
                                    <span>Tottenham Green</span>
                                    <span>London, N15 4RX</span>
                                </p>
                            </li>
                            <li>
                                <p class="footer-phone-title btn btn-md btn-green pull-left"><span> <a style = "color:black;" href="https://www.berniegrantcentre.co.uk/?post_type=explore&p=3345&preview=true">Contact us</a> <!--Telephone--></span></p>
                                <p class="footer-phone"><!--0208 054 4447--></p> 
                            </li>
                          <!-- <li>
                                <p class="footer-mail-title"><span>Email:</span></p>
                                <p class="footer-mail" style="font-size: 11px;"><strong>generalenquiries@berniegrantcentre.co.uk</strong></p>
                            </li>-->
                        </ul>
                    </li>
                    <li class="box-support">
                        <ul class="list-unstyled">
                            <li>
                                <h2 class="footer-box-title">Supporters/ Funders</h2>
                            </li>
                            <?php 
                            if ( have_rows( 'supporters_logos', 'options' ) ) : ?>
                                    <?php while ( have_rows( 'supporters_logos', 'options' ) ) : the_row(); ?>
                                        <li>
                                            <a href="<?= get_sub_field('url'); ?>"><img src="<?php echo hd_get_image_url_from_id( get_sub_field( 'image' ), 'full' ); ?>"></a>
                                        </li>
                                    <?php endwhile; ?>
                            <?php endif;
                            ?>
                        </ul>
                    </li>
                    <li class="footer-posts">
                        <ul class="list-unstyled">
                            <li>
                                <a href="<?=get_permalink(get_field('blog_page', 'options'));?>"><h2 class="footer-box-title">Heart of the matter</h2></a>
                            </li>
                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'posts_per_page' => 2,
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'cache_results' => false
                            );

                            $the_query = new WP_Query( $args );
                            if ( $the_query->have_posts() ) :
                            ?>

                            <?php
                            while ( $the_query->have_posts() ) : $the_query->the_post();
                              get_template_part( 'framework/content/boxes/content', 'footer-box' );
                            endwhile;
                            ?>
                            <?php else: ?>
                            <p>no posts found</p>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="footer-connect">
                        <ul class="list-unstyled">
                            <li>
                                <h2 class="footer-box-title">Connect</h2>
                            </li>
                            <li>
                                <p class="follow-us"><span>Follow Us</span></p>
                                <ul class="list-unstyled list-inline social-icons">
                                    <li><a href="https://twitter.com/BGArtsCentre"><i class="i-twitter"></i></a></li>
                                    <li><a href="https://www.facebook.com/BGArtsCentre/"><i class="i-facebook"></i></a></li>
                                    <li><a href="https://www.instagram.com/bgartscentre/"><i class="i-instagram"></i></a></li>
                                </ul>
                            </li>
                            <li>
                                <p class="footer-form-title"><span>Join our mailing list:</span></p>
                                <!-- <?php gravity_form( 5, false, false, false, null, true, 1, true ); ?> -->
                                <a href="https://www.berniegrantcentre.co.uk/sign-up/" class="btn btn-md btn-green pull-left" style="padding-top: 7px; margin-left: 5px;"><span style="-webkit-transform: skew(25deg); -moz-transform: skew(25deg); -o-transform: skew(25deg); display: inline-block;">Sign Up</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <ul class="list-inline list-unstyled footer-credits">
                <li><p class="footer-copyright pull-left">© <?php the_time('Y'); ?> Bernie Grant Arts Centre. | <a href="https://www.berniegrantcentre.co.uk/privacy-policy/">Privacy & Cookies</a></p></li>
                <p class="footer-copyright">Designed by <a href="http://westcreative.co/">West Creative</a> Built by <a href="http://www.dekretser.com">HdK</a></p>
        </ul>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>

</html>