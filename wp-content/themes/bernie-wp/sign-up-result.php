<?php get_header(); ?>
<div class="hero-section">
      <div class="white-space"></div>
      <div class="hero-bg">
      </div>
  </div>
  <div class="section inner-page">
      <div class="main-content header-slider">
          <div class="page-content">
              <div class="triangle-top-left"></div>
              <h1 class="main-header">
                  Sign Up
              </h1>
              <?php
              if (isset($_GET['Error']) && $_GET['Error'] == 'EmailExists')
              {
                echo "<p>That email already exists on our system. Please try again.</p>";
              }
              else if (isset($_GET['Error']) && $_GET['Error'] == 'NoEmail')
              {
                echo "<p>No email address has been given. Please try again.</p>";
              }
              else if (isset($_GET['Error']) && $_GET['Error'] == 'NoLastName')
              {
                echo "<p>No last name has been given. Please try again.</p>";
              }
              else
              {
                echo "<p>Thank you for signing up. Please review our privacy policy for details on how to unsubscribe, if you change your mind.</p>";
              }
              ?>
          <div class="clearfix"></div>
        </div>
      </div>
      <?php
      get_template_part( 'framework/content/content', 'sidebar' );
       ?>
  </div>
  <div class="clearfix"></div>
<?php get_footer(); ?>
