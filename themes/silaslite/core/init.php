<?php

if ( function_exists('silaslite_require_file') )
{
    # Load Classes
    silaslite_require_file( SILASLITE_CORE_CLASSES . 'class-tgm-plugin-activation.php' );
    
    # Load Functions
    silaslite_require_file( SILASLITE_CORE_FUNCTIONS . 'customizer/azr_customizer_settings.php' );
    silaslite_require_file( SILASLITE_CORE_FUNCTIONS . 'customizer/azr_customizer_style.php' );
    silaslite_require_file( SILASLITE_CORE_FUNCTIONS . 'azuratheme_resize_image.php' );

    # Widgets
    silaslite_require_file( SILASLITE_CORE_PATH . 'widgets/silaslite_social_network.php' );
    silaslite_require_file( SILASLITE_CORE_PATH . 'widgets/silaslite_latest_posts_widget.php' );

}