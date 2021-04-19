<?php
function silaslite_custom_css()
{	
    $custom_css = "";
    if ( get_theme_mod('silaslite_body_color') )
    {
    	$body_color = esc_attr(get_theme_mod('silaslite_body_color'));
        $custom_css .= "
            :root{
                --body-color: {$body_color};
            }
            ";
    }
    if ( get_theme_mod('silaslite_accent_color') )
    {
        $accent_color = esc_attr(get_theme_mod('silaslite_accent_color'));
        $accent_color_rgb = silaslite_hex2rgba( $accent_color );
        $custom_css .= "
        	:root{
                --accent-color: {$accent_color};
                --accent-color-rgb: {$accent_color_rgb};
            }
            root{
                --accent-color: {$accent_color};
                --accent-color-rgb: {$accent_color_rgb};
            }
        ";

    }
    wp_add_inline_style( 'silaslite-theme-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'silaslite_custom_css', 15 );
