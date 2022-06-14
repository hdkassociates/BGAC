<?php get_header(); ?>
<?php
function get_location($term, $county){
    if($county){
        return $county.', '.$term->name;
    } else {
        return $term->name;
    }
}
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


        <div class="section hero-section city-header">
            <div class="container">
                <div class="col-lg-1"></div>
                <div class="col-lg-6">
                    <h1 class="hero-heading"><?php the_title(); ?></h1>
                    <p class="hero-subheading"><?php echo strtoupper(get_location(get_field('state'), get_field('county')));?></p>
                </div>
                <div class="col-lg-4 text-right">
                    <div class="rating-indicator">
                        <div class="indicator-title">
                            <h3>City Rating</h3>
                        </div>
                        <ul class="list-unstyled list-inline <?php the_field('stars'); ?>">
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="clearfix"></div>
            </div>
            <div class="section-decoration bottom">
                <div class="stripe-1"></div>
                <div class="stripe-2"></div>
                <div class="stripe-3"></div>
                <div class="stripe-4"></div>
                <div class="stripe-5"></div>
                <div class="stripe-6"></div>
                <div class="stripe-7"></div>
            </div>
        </div>


        <div class="section city-info-wrapper">
            <div class="container">
                <!-- DESKTOP VERSION -->
                <div class="city-info hidden-xs hidden-sm hidden-md">
                    <div class="info-inner">
                        <div class="col-lg-12 col-md-12">
                            <div class="city-downloads">
                                <a href="#" class="btn btn-orange">Download Report</a>
                                <a href="#" class="btn btn-orange">Download City Page</a>
                                <div class="city-share pull-right">
                                   <span>Share your city's ranking:</span> <a href=""><i class="i-twitter"></a></i> <a href="#"><i class="i-facebook"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="cleatfix"></div>
                        <div class="row">
                            <div class="col-lg-9 col-md-12">
                                <div class="indicator-cards-wrapper">

                                        <?php get_template_part('framework/content/content', 'indicator-boxes') ?>













                                </div>
                            </div>

                            <div class="col-lg-3 col-md-12">
                                <div class="local-landscape-wrapper text-right">
                                    <h2>Local Landscape</h2>
                                    <hr>
                                    <?php if ( have_rows( 'landscape_entries' ) ) : ?>
                                        <ul class="list-unstyled text-right">
                                            <?php while ( have_rows( 'landscape_entries' ) ) : the_row(); ?>
                                                <li>
                                                    <h3>
                                                        <?php ( get_sub_field( 'other' ) ) ?  the_sub_field( 'other' ) : the_sub_field('header'); ?>
                                                        <?php echo get_sub_field('number_dropdown') ? '('.get_sub_field('number_dropdown').')' : ''; ?>
                                                        <?php echo get_sub_field('year_dropdown') ? '('.get_sub_field('year_dropdown').')' : ''; ?>
                                                    </h3>
                                                        <p><?php the_sub_field( 'datum' ); ?></p>
                                                    
                                                </li>
                                            <?php endwhile; ?>


                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                   </div> 
                </div>
                <!-- /DESKTOP VERSION -->
                                
                <!-- TABLET / MOBILE VERSION -->
                <div class="city-info hidden-lg">
                    <div class="info-inner">
                        <div class="col-lg-12 col-md-12">
                            <div class="city-downloads">
                                <a href="#" class="btn btn-orange download-report">Download Report</a>
                                <a href="#" class="btn btn-orange download-city">Download City Page</a>
                                <div class="city-share text-center">
                                   <p><span>Share your city's ranking:</span> <a href=""><i class="i-twitter"></a></i> <a href="#"><i class="i-facebook"></i></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="cleatfix"></div>
                        <div class="row">
                            <div class="col-lg-9 col-md-12">
                                <div class="indicator-cards-wrapper">
             
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default indicator-card">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                  <div class="card-title panel-title">
                                                      <i class="i-icon-abortion main-icon"></i>
                                                      <h2>Protecting Abortion Clinic Access</h2> 
                                                      <div></div>
                                                  </div>
                                                </div>
                                                </a>
                                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                  <div class="panel-body">
                                                    <div class="indicators-wrap">
                                                        <div class="row no-gutter">
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="indicator">
                                                                <div class="indicator-text">
                                                                <i class="i-x-altx-alt counry-lvl"></i>
                                                                <h4>Funding for abortion</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="indicator">
                                                                <div class="indicator-text">
                                                                <i class="i-tick"></i>
                                                                <h4>Funding for family planning</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="indicator">
                                                                <div class="indicator-text">
                                                                <i class="i-tick"></i>
                                                                <h4>Funding for abortion</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="row no-gutter">
                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="indicator">
                                                                    <div class="indicator-text">
                                                                    <i class="i-tick"></i>
                                                                    <h4>Funding for abortion</h4>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="indicator">
                                                                    <div class="indicator-text">
                                                                    <i class="i-tick"></i>
                                                                    <h4>Funding for abortion</h4>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="indicator">
                                                                    <div class="indicator-text">
                                                                    <i class="i-tick"></i>
                                                                    <h4>Funding for abortion</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                        </div>

                                        <div class="panel panel-default indicator-card">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                  <div class="card-title panel-title">
                                                      <i class="i-icon-youth main-icon"></i>
                                                      <h2>Supporting Young People</h2> 
                                                      <div></div>
                                                  </div>
                                                </div>
                                                </a>
                                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                  <div class="panel-body">
                                                    <div class="indicators-wrap">
                                                        <div class="row no-gutter">
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="indicator">
                                                                <div class="indicator-text">
                                                                <i class="i-x-altx-alt counry-lvl"></i>
                                                                <h4>Funding for abortion</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="indicator">
                                                                <div class="indicator-text">
                                                                <i class="i-tick"></i>
                                                                <h4>Funding for family planning</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="indicator">
                                                                <div class="indicator-text">
                                                                <i class="i-tick"></i>
                                                                <h4>Funding for abortion</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="row no-gutter">
                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="indicator">
                                                                    <div class="indicator-text">
                                                                    <i class="i-tick"></i>
                                                                    <h4>Funding for abortion</h4>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="indicator">
                                                                    <div class="indicator-text">
                                                                    <i class="i-tick"></i>
                                                                    <h4>Funding for abortion</h4>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="indicator">
                                                                    <div class="indicator-text">
                                                                    <i class="i-tick"></i>
                                                                    <h4>Funding for abortion</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                        </div>


                                        <div class="panel panel-default indicator-card">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                <div class="panel-heading" role="tab" id="headingThree">
                                                  <div class="card-title panel-title">
                                                      <i class="i-bank main-icon"></i>
                                                      <h2>Protecting Abortion Clinic Access</h2> 
                                                      <div></div>
                                                  </div>
                                                </div>
                                                </a>
                                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                  <div class="panel-body">
                                                    <div class="indicators-wrap">
                                                        <div class="row no-gutter">
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="indicator">
                                                                <div class="indicator-text">
                                                                <i class="i-x-altx-alt counry-lvl"></i>
                                                                <h4>Funding for abortion</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="indicator">
                                                                <div class="indicator-text">
                                                                <i class="i-tick"></i>
                                                                <h4>Funding for family planning</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="indicator">
                                                                <div class="indicator-text">
                                                                <i class="i-tick"></i>
                                                                <h4>Funding for abortion</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="row no-gutter">
                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="indicator">
                                                                    <div class="indicator-text">
                                                                    <i class="i-tick"></i>
                                                                    <h4>Funding for abortion</h4>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="indicator">
                                                                    <div class="indicator-text">
                                                                    <i class="i-tick"></i>
                                                                    <h4>Funding for abortion</h4>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="indicator">
                                                                    <div class="indicator-text">
                                                                    <i class="i-tick"></i>
                                                                    <h4>Funding for abortion</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                        </div>

                                        <div class="panel panel-default indicator-card">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                <div class="panel-heading" role="tab" id="headingFour">
                                                  <div class="card-title panel-title">
                                                      <i class="i-icon-families main-icon"></i>
                                                      <h2>Supporting Familes</h2> 
                                                      <div></div>
                                                  </div>
                                                </div>
                                                </a>
                                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                                  <div class="panel-body">
                                                    <div class="indicators-wrap">
                                                        <div class="row no-gutter">
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="indicator">
                                                                <div class="indicator-text">
                                                                <i class="i-x-altx-alt counry-lvl"></i>
                                                                <h4>Funding for abortion</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="indicator">
                                                                <div class="indicator-text">
                                                                <i class="i-tick"></i>
                                                                <h4>Funding for family planning</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="indicator">
                                                                <div class="indicator-text">
                                                                <i class="i-tick"></i>
                                                                <h4>Funding for abortion</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="row no-gutter">
                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="indicator">
                                                                    <div class="indicator-text">
                                                                    <i class="i-tick"></i>
                                                                    <h4>Funding for abortion</h4>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="indicator">
                                                                    <div class="indicator-text">
                                                                    <i class="i-tick"></i>
                                                                    <h4>Funding for abortion</h4>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="indicator">
                                                                    <div class="indicator-text">
                                                                    <i class="i-tick"></i>
                                                                    <h4>Funding for abortion</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                        </div>

                                        <div class="panel panel-default indicator-card">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                <div class="panel-heading" role="tab" id="headingFive">
                                                  <div class="card-title panel-title">
                                                      <i class="i-bank main-icon main-icon"></i>
                                                      <h2>Advancing Inclusive Policies</h2> 
                                                      <div></div>
                                                  </div>
                                                </div>
                                                </a>
                                                <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                                  <div class="panel-body">
                                                    <div class="indicators-wrap">
                                                        <div class="row no-gutter">
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="indicator">
                                                                <div class="indicator-text">
                                                                <i class="i-x-altx-alt counry-lvl"></i>
                                                                <h4>Funding for abortion</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="indicator">
                                                                <div class="indicator-text">
                                                                <i class="i-tick"></i>
                                                                <h4>Funding for family planning</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="indicator">
                                                                <div class="indicator-text">
                                                                <i class="i-tick"></i>
                                                                <h4>Funding for abortion</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="row no-gutter">
                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="indicator">
                                                                    <div class="indicator-text">
                                                                    <i class="i-tick"></i>
                                                                    <h4>Funding for abortion</h4>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="indicator">
                                                                    <div class="indicator-text">
                                                                    <i class="i-tick"></i>
                                                                    <h4>Funding for abortion</h4>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="indicator">
                                                                    <div class="indicator-text">
                                                                    <i class="i-tick"></i>
                                                                    <h4>Funding for abortion</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                        </div>

                                        <div class="panel panel-default indicator-card">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                <div class="panel-heading" role="tab" id="headingSix">
                                                  <div class="card-title panel-title">
                                                      <i class="i-icon-takingstand main-icon"></i>
                                                      <h2>Taking a Stand</h2> 
                                                      <div></div>
                                                  </div>
                                                </div>
                                                </a>
                                                <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                                                  <div class="panel-body">
                                                    <div class="indicators-wrap">
                                                        <div class="row no-gutter">
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="indicator">
                                                                <div class="indicator-text">
                                                                <i class="i-x-altx-alt counry-lvl"></i>
                                                                <h4>Funding for abortion</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="indicator">
                                                                <div class="indicator-text">
                                                                <i class="i-tick"></i>
                                                                <h4>Funding for family planning</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="indicator">
                                                                <div class="indicator-text">
                                                                <i class="i-tick"></i>
                                                                <h4>Funding for abortion</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="row no-gutter">
                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="indicator">
                                                                    <div class="indicator-text">
                                                                    <i class="i-tick"></i>
                                                                    <h4>Funding for abortion</h4>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="indicator">
                                                                    <div class="indicator-text">
                                                                    <i class="i-tick"></i>
                                                                    <h4>Funding for abortion</h4>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="indicator">
                                                                    <div class="indicator-text">
                                                                    <i class="i-tick"></i>
                                                                    <h4>Funding for abortion</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                    </div>
                 </div>
                            </div>

                            <div class="col-lg-3 col-md-12">
                                <div class="local-landscape-wrapper text-right">
                                    <h2>Local Landscape</h2>
                                    <hr>
                                    <?php if ( have_rows( 'landscape_entries' ) ) : ?>
                                        <ul class="list-unstyled text-right">
                                            <?php while ( have_rows( 'landscape_entries' ) ) : the_row(); ?>
                                                <li>
                                                    <h3><?php ( get_sub_field( 'other' ) ) ?  the_sub_field( 'other' ) : the_sub_field('header'); ?>
                                                        (<?php get_sub_field('number_dropdown') ? the_sub_field('number_dropdown') : the_sub_field( 'year_dropdown' ); ?>)</h3>
                                                        <p><?php the_sub_field( 'datum' ); ?></p>
                                                    
                                                </li>
                                            <?php endwhile; ?>

                                                                            ?>

                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                   </div> 
                </div>
                <!-- / TABLET / MOBILE VERSION -->
            </div>
        </div>


        <div class="city-info-legend-wrapper">
            <div class="container">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <ul class="list-unstyled list-inline">
                        <li><i class="i-tick"></i> <span>Yes</span></li>
                        <li><i class="i-x-altx-alt"></i> <span>No</span></li>
                        <li><i class="i-tick confidential"></i> <span>Yes (Confidential)</span></li>
                        <li><i class="i-city-statepolicy"></i> <span>Preempted by State Policy</span></li>
                        <li><i class="i-city-limited"></i> <span>Limited</span></li>
                    </ul>
                    <hr>
                    <span class="star"><strong>*</strong> County-level data</span>
                </div>
            </div>

        </div>


<?php endwhile; endif; ?>
<?php get_footer(); ?>