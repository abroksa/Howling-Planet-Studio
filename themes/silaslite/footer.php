    </div><!-- #silaslite-primary -->
    <footer id="silaslite-footer">
        <?php if ( get_theme_mod('silaslite_instagram_show') && is_active_sidebar('footer-ins') ) : ?>
        <div class="footer-ins">
            <?php dynamic_sidebar('footer-ins'); ?>
        </div>
        <?php endif; ?>
        <?php if ( get_theme_mod('silaslite_social_footer_enable') ) { ?>
        <div class="footer-social">
            <div class="container">
            <?php get_template_part( 'template-parts/social', 'network' ) ?>
            </div>
        </div>
        <?php } ?>        
        <div class="footer-copyright">
            <div class="copyright"><?php echo esc_html( get_theme_mod('silaslite_footer_copyright_text', '&copy; 2020 AzuraTheme.') ) ; ?></div>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>    
</body>
</html>