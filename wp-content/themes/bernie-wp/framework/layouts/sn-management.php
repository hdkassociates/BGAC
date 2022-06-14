<div class="container">
    <div class="people-cards items items-4">
        <?php if( have_rows('team') ): while( have_rows('team') ): the_row(); ?>
        <div class="item" data-toggle="modal" data-target="#teamMemberModal<?=get_row_index();?>">
            <img src="<?=hd_get_image_url_from_id(get_sub_field('photo'), 'thumbnail');?>" alt="<?=esc_attr(strip_tags(get_sub_field('full_name')));?>" class="img">
            <div class="person-data">
                <h6 class="name"><?php the_sub_field('full_name'); ?></h6>
                <p class="title"><?php the_sub_field('role'); ?></p>
                <div class="contacts _text-center">
                    <a href="<?php the_sub_field('linkedin'); ?>" target="_blank"><i class="i i-linkedin"></i></a>
                    <a href="mailto:<?php the_sub_field('email'); ?>" target="_blank"><i class="i i-email"></i></a>
                </div>
            </div>
        </div>
        <?php endwhile; endif; ?>
    </div>
</div>
<!-- Modal -->
<?php if( have_rows('team') ): while( have_rows('team') ): the_row(); ?>
<div class="modal fade simplanova" id="teamMemberModal<?=get_row_index();?>" tabindex="-1" role="dialog" aria-labelledby="teamMemberModal<?=get_row_index();?>Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-left">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h6 class="modal-title-above"><?php the_sub_field('role'); ?></h6>
        <h4 class="modal-title" id="teamMemberModal<?=get_row_index();?>Label"><?php the_sub_field('full_name'); ?></h4>
        <div class="contacts">
            <a href="<?php the_sub_field('linkedin'); ?>" target="_blank"><i class="i i-linkedin"></i></a>
            <a href="mailto:<?php the_sub_field('email'); ?>" target="_blank"><i class="i i-email"></i></a>
        </div>
      </div>
      <div class="modal-body">
        <div class="">
            <div class="_text-content">
                <p><img src="<?=hd_get_image_url_from_id(get_sub_field('photo'), 'thumbnail');?>" alt="<?=esc_attr(strip_tags(get_sub_field('full_name')));?>"></p>
                <?php the_sub_field('description'); ?>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endwhile; endif; ?>