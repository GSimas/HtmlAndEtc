<?php
global $smof_data, $zo_meta;

$container='container';
if(!empty($zo_meta->_zo_footer_width)){
    if($zo_meta->_zo_footer_width=='on')
        $container='container-fluid';
}else{
    if(isset($smof_data['footer_width']) && $smof_data['footer_width']){
        $container='container-fluid';
    }
}

if(!empty($zo_meta->_zo_footer_widget)){
    if($zo_meta->_zo_footer_widget=='on')
        $smof_data['footer_widgets'] = 1;
    else
        $smof_data['footer_widgets'] = 0;
}
?>

<?php if (!empty($smof_data['footer_widgets']) && $smof_data['footer_widgets']){ ?>
<div id="zo-footer-newsletter" class="zo-footer-newsletter">
    <div class="<?php echo $container;?>">
        <?php if (is_active_sidebar('newsletter-title')) : ?>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 newsletter-title"><?php dynamic_sidebar('newsletter-title'); ?></div>
        <?php endif; ?>
        <?php if (is_active_sidebar('newsletter')) : ?>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-8 newsletter-form"><?php dynamic_sidebar('newsletter'); ?></div>
        <?php endif; ?>
    </div>
</div>
<div id="zo-footer" class="zo-footer">
    <div class="<?php echo $container;?>">
        <footer id="zo-footer-content">
            <?php
                $columns = (int)$smof_data['footer_column'];
                $column_width = ($columns==5) ? 2 : 12/ $columns;
                if($columns==1){
                    $small_column = 12;
                }else{
                    $small_column = ($columns==3) ? 4 : 6;
                }
            ?>
            <div class="zo-footer-columns zo-footer-columns-<?php echo $columns; ?> zo-footer-widget-area row">
                <?php for($i=1; $i<7; $i++) :
                    if($i <= $columns){ ?>
                        <div class="zo-footer-column<?php echo ( $i == $columns ) ? ' zo-footer-column-last' : ''; ?> col-lg-<?php echo $column_width; ?> col-md-<?php echo $column_width; ?> col-sm-<?php echo $small_column;?>">
                        <?php if (is_active_sidebar('footer-sidebar-' . $i)) dynamic_sidebar('footer-sidebar-' . $i); ?>
                        </div>
                <?php } endfor; ?>
            </div>
        </footer>
    </div>
</div>
<?php } ?>
<?php if(!empty($smof_data['footer_copyright'])) {?>
<div id="zo-footer-copyright" class="zo-footer-copyright">
    <div class="<?php echo $container;?>">
        <footer>
            <?php if(!empty($smof_data['footer_copyright_extra'])){
                if(!empty($smof_data['footer_copyright_alignment']) && !empty($smof_data['footer_copyright_extra_position']) && $smof_data['footer_copyright_alignment']!='right' && $smof_data['footer_copyright_extra_position']!='above'){?>
                    <div class="zo-footer-copyright-notice">
                        <div><?php if(!empty($smof_data['footer_copyright_text'])) echo html_entity_decode( $smof_data['footer_copyright_text'] ); ?></div>
                    </div>
                    <div class="zo-copyright-secondary">
                        <?php
                            if(!empty($smof_data['footer_copyright_extra'])){
                                if($smof_data['footer_copyright_extra']==1) {
                                    zo_footer_social();
                                }else{
                                    if (is_active_sidebar('copyright-extra')) dynamic_sidebar('copyright-extra');
                                }
                            }
                        ?>
                    </div>
                <?php }else{ ?>
                    <div class="zo-copyright-secondary">
                        <?php
                            if(!empty($smof_data['footer_copyright_extra'])){
                                if($smof_data['footer_copyright_extra']==1) {
                                    zo_footer_social();
                                }else{
                                    if (is_active_sidebar('copyright-extra')) dynamic_sidebar('copyright-extra');
                                }
                            }
                        ?>
                    </div>
                    <div class="zo-footer-copyright-notice">
                        <div><?php if(!empty($smof_data['footer_copyright_text'])) echo html_entity_decode( $smof_data['footer_copyright_text'] ); ?></div>
                    </div>
                <?php } ?>
            <?php }else{?>
            <div class="zo-footer-copyright-notice">
                <div><?php if(!empty($smof_data['footer_copyright_text'])) echo html_entity_decode( $smof_data['footer_copyright_text'] ); ?></div>
            </div>
            <?php } ?>
        </footer>
    </div>
</div>
<?php } ?>
