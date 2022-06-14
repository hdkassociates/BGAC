<div class="container">
    <div class="_max-width-780">
        <div class="panel-group faq-list" id="accordion" role="tablist" aria-multiselectable="true">
        <?php if( have_rows('faqs') ): $index = 0; ?>
            <?php while( have_rows('faqs') ): the_row(); ?>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading_<?=$index;?>">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?=$index;?>" aria-expanded="<?=$index == 0 ? 'true' : 'false';?>" aria-controls="collapse_<?=$index;?>">
                                <?php the_sub_field('title'); ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse_<?=$index;?>" class="panel-collapse collapse<?=$index == 0 ? ' in' : '';?>" role="tabpanel" aria-labelledby="heading_<?=$index;?>">
                        <div class="panel-body">
                            <div class="_text-content">
                                <?php the_sub_field('answer'); ?>
                            </div>
                            <div class="gap gap-40"></div>
                        </div>
                    </div>
                </div>
                <?php $index++;?>
            <?php endwhile; ?>
        <?php endif; ?>
        </div>
    </div>
</div>