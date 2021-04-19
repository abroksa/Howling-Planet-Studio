<?php 

    $silaslite_post_format  = get_post_format();
    if ( is_single() ) {
        if ( function_exists( 'rwmb_meta' ) )
        {
            if ( $silaslite_post_format == 'gallery' ) {
            $images = rwmb_meta( 'silaslite_post_gallery' );
            $featured_image = azuratheme_resize_image( get_post_thumbnail_id(), null, 1270, 900, true, true );
            ?>
            <div class="post-format post-gallery">
                <div class="owl-carousel nav-pos" data-loop="false" data-autoplay="true" data-items="1" data-dots="false" data-nav="true">
                    <div class="slide-item"><img src="<?php echo esc_url($featured_image); ?>" alt="<?php the_title_attribute(); ?>" /></div>
                    <?php
                    if ( is_array($images) && !empty($images) ) {
                        foreach ( $images as $image_id => $info ) : ?>
                            <?php
                                $featured_image = azuratheme_resize_image( $image_id, null, 1270, 900, true, true ); ?>
                                <div class="slide-item"><img src="<?php echo esc_url($featured_image); ?>" alt="<?php the_title_attribute(); ?>" /></div>
                        <?php
                        endforeach;
                    }
                    ?>
                </div>
            </div>
            <?php
            } elseif ( $silaslite_post_format == 'video' ) { ?>
                <div class="post-format post-video">
                    <?php $video = rwmb_meta( 'silaslite_post_video' ); ?>
                    <?php if ( wp_oembed_get($video) ) : ?>
                        <?php echo wp_oembed_get($video); ?>
                    <?php else : ?>
                        <?php echo wp_kses_post($video); ?>
                    <?php endif; ?>
                </div><?php
            } elseif ( $silaslite_post_format == 'audio' ) { ?>
                <div class="post-format silaslite-post-audio">
                    <?php 
                    if ( has_post_thumbnail() )
                    {            
                           $featured_image = azuratheme_resize_image( get_post_thumbnail_id(), null, 1270, 900, true, true );
                        ?>
                        <div class="post-image-audio">
                            <img class="pinit" src="<?php echo esc_url( $featured_image ); ?>" alt="<?php the_title_attribute(); ?>" />
                        </div>
                    <?php } ?>
                    <?php $audio = rwmb_meta( 'silaslite_post_audio' ); ?>
                    <div class="post-audio">
                        <audio src="<?php echo esc_url($audio) ?>" controls="controls">
                    </div>
                </div><?php               
            }else{ 
                if ( has_post_thumbnail() )
                {            
                    $featured_image = azuratheme_resize_image( get_post_thumbnail_id(), null, 1270, 900, true, true );
                    ?>
                    <div class="post-format">
                        <img src="<?php echo esc_url($featured_image); ?>" alt="<?php the_title_attribute(); ?>" />
                    </div><?php
                }
            }
        } else {
            if ( has_post_thumbnail() )
            {            
                $featured_image = azuratheme_resize_image( get_post_thumbnail_id(), null, 1270, 900, true, true );
                ?>
                <div class="post-format">
                    <img src="<?php echo esc_url($featured_image); ?>" alt="<?php the_title_attribute(); ?>" />
                </div><?php
            }
        }
        
    }else{
        if ( has_post_thumbnail() )
        {            
            $featured_image = wp_get_attachment_url( get_post_thumbnail_id() );
            ?>
            <div class="post-format">
                 <a class="post-image" style="background-image: url('<?php echo esc_url($featured_image);?>');" href="<?php the_permalink()?>"></a>
                 <a class="pin-img" target="_blank" href="<?php echo esc_url( 'https://pinterest.com/pin/create/button/?url=' . get_the_permalink() . '&media=' . esc_url($featured_image) . '&description=' . esc_html( get_the_title() ) ); ?>"><i class="fab fa-pinterest-p"></i></a>
            </div><?php
        }    
    }

?>