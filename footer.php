    <!-- Daftar -->
    <aside class="dark-bg aside-cta">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <h3 class="margin-10 text-white cta-heading"><?php echo get_option('edu_need_bp_konten'); ?></h3>
                    <a href="<?php echo get_option('edu_need_bp_link'); ?>" class="template-button">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </aside>

    <!-- Footer -->
    <section class="main-footer">
        <div class="container">
            <div class="row">
            <!--footer widget one-->
            <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widget-1')) ?>

            <!--footer widget Two-->
            <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widget-2')) ?>

            <!--footer widget Three-->
            <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widget-3')) ?>
            </div>
        </div>
    </section>

    <!-- Copyright -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-right">
                <p> &copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>. <?php _e('Powered by', 'TelkomEdu'); ?> <a href="//wordpress.org" title="WordPress">WordPress</a> </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Script -->
    <?php wp_footer(); ?>
</body>

</html>