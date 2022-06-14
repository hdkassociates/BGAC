  <div class="container request-box text-left _text-white" id="<?= esc_attr(strip_tags(get_sub_field('section_id'))); ?>">
      <div class="logo"><img src="<?=get_template_directory_uri();?>/assets/images/Vertical-Logo.png" alt=""></div>
      <?php gravity_form( get_sub_field('form_id'), true, true, false, array(), false ); ?>
  </div>
