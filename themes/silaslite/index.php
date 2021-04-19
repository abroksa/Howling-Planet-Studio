<?php
    get_header();

    $col = ( is_active_sidebar('sidebar') ) ? 'has-sidebar col px-4' : 'no-sidebar px-4 col';
?>
<?php
    if (is_active_sidebar( 'newsletter' )) {
?>
    <div class="ss-newsletter">
        <div class="container">
            <?php dynamic_sidebar('newsletter'); ?>
        </div>
    </div>
<?php        
   }
?>

<div class="main-contaier">
    <div class="container">
        <div class="row wrapper-main-content mx-n4">
            <div class="main-content <?php echo esc_attr($col); ?>">
                <?php
                    get_template_part( 'loop/blog');
                ?>
            </div>
            <?php if ( is_active_sidebar('sidebar') ) { ?>
            <div class="col w-300 px-4">
                <?php get_sidebar() ?>
            </div>
            <?php } ?>
        </div>
    </div>        
</div>
<?php get_footer(); ?>
