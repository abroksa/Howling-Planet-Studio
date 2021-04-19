<?php
$word_standard = 45;
?>
<div class="silaslite-blogs blog-standard">
    <div class="row mx-n4">
    <?php if ( have_posts() ) { ?>
        <?php while ( have_posts() ) {
                the_post();
            ?>
            <article <?php post_class('col-md-12 px-4 post-standard'); ?>>
                <div class="post-inner">
                    <div class="post-header">
                        <div class="post-cats"><?php the_category(' '); ?></div>
                        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php get_template_part('template-parts/post', 'meta'); ?>
                    </div>
                    <?php get_template_part('template-parts/post', 'format'); ?>                            
                    <div class="post-info">
                        <div class="post-content"><?php echo wp_trim_words( get_the_excerpt(), $word_standard , '...' ) ?></div>
                        <div class="post-footer">
                            <a class="readmore silaslite-button" href="<?php the_permalink() ?>"><?php echo esc_html__( 'Read More','silaslite' ); ?></a>
                            <?php get_template_part('template-parts/post', 'share'); ?> 
                        </div>                                    
                    </div>
                </div>
            </article>      
        <?php } ?>
    <?php } ?>
    </div>
</div>
<?php silaslite_pagination(); ?>