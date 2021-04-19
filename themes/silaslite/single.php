<?php 
    get_header();
    $col = ( is_active_sidebar('sidebar') ) ? 'has-sidebar col px-4' : 'no-sidebar px-4 col';
 ?>
<div class="main-contaier">
    <div class="container">
        <div class="row wrapper-main-content mx-n4">
            <div class="main-content <?php echo esc_attr($col); ?>">
                <?php
                    while ( have_posts() ) {
                        the_post();
                        ?>
                    <div class="silaslite-single-post">
                        <article <?php post_class('post-single'); ?>>
                            <div class="post-inner">
                                <div class="post-header">
                                    <div class="post-cats"><?php the_category(' '); ?></div>
                                    <h1 class="post-title"><?php the_title(); ?></h1>
                                    <?php get_template_part('template-parts/post', 'meta'); ?>  
                                </div>
                                <?php get_template_part('template-parts/post', 'format'); ?>
                                <div class="post-info">
                                                        
                                    <div class="post-content">
                                        <?php
                                            the_content();
                                            wp_link_pages(
                                                array(
                                                    'before'   => '<p class="page-nav">' . esc_html__( 'Pages:', 'silaslite' ),
                                                    'after'    => '</p>'
                                                )
                                            );
                                        ?>
                                    </div>
                                    <?php get_template_part('template-parts/post', 'footer'); ?>
                                </div>
                            </div>
                        </article>
                        <?php  if ( get_the_author_meta( 'description' ) ) { ?>
                            <div class="post-about">
                                <div class="ab-img"><?php echo get_avatar( get_the_author_meta( 'ID' ), 140 ); ?></div>
                                <div class="ab-info">
                                    <h4><a class="name-ath" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></h4>
                                    <div class="ab-text"><?php echo get_the_author_meta( 'description' );?></div>
                                    <?php get_template_part( 'template-parts/social','network' ) ?>
                                </div>
                            </div>
                        <?php }?>
                        <?php get_template_part( 'template-parts/single', 'post-related' ); ?>
                        <?php
                            if ( comments_open() || get_comments_number() ) :
                                comments_template('', true);
                            endif;
                        ?>    
                    </div>
                <?php } ?>
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
