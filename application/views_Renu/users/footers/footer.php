<footer>
    <div class="main_footer">
        <div class="triangle"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-sm-4 col-lg-4 footer_text">
                            <h4>Accessibility & Help</h4>
                            <ul>
                                <li><a href="">Feedback</a></li>
                                <li><a href="sitemap.html">Sitemap</a></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="#">Accessibility</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4 col-lg-4 footer_text">
                            <h4>Legal</h4>
                            <div class="col-lg-12 footer_text">
                                <ul>
                                    <li><a href="<?php echo base_url(); ?>users/terms_condition">Terms & Conditions</a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>users/privacy_policy">Privacy Policy</a></li>
                                    <li><a href="<?php echo base_url(); ?>users/hyperlinking_policy">Hyper Linking
                                            Policy</a></li>
                                    <li><a href="<?php echo base_url(); ?>users/disclaimer">Disclaimer</a></li>
                                    <li><a href="<?php echo base_url(); ?>users/copyright">Copyright Policy</a></li>
                                    <li><a href="<?php echo base_url(); ?>users/cmap">Website Content Contribution,
                                            Moderation & Approval Policy (CMAP)</a></li>
                                    <li><a href="<?php echo base_url(); ?>users/cap">Content Archival Policy (CAP)</a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>users/content_review_policy">Content Review
                                            Policy (CRP)</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-4 footer_text">
                            <h4>Other Links</h4>
                            <div class="col-lg-12 footer_text">
                                <ul>
                                    
                                    <li><a href="<?php echo base_url(); ?>users/about_exchange_forum">About Exchange
                                            Forum</a></li>
                                    <li><a href="<?php echo base_url(); ?>users/standard">Know your Standars</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 footer_text">
                            <div class="block-menu">
                                <h4>Useful Links</h4>
                                <ul class="usefull-links">
                                    <li><a href="#" class="jquery-once"><img
                                                src="<?php echo base_url(); ?>assets/images/msme_logo.png"></a></li>
                                    <li><a href="#" class="jquery-once"><img
                                                src="<?php echo base_url(); ?>assets/images/ministry.png"></a></li>
                                    <li><a href="#" class="jquery-once"><img
                                                src="<?php echo base_url(); ?>assets/images/bis_logo.png"></a></li>
                                    <li><a href="#" class="jquery-once"><img
                                                src="<?php echo base_url(); ?>assets/images/msme_logo.png"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="social-content">
                        <h4>Follow us</h4>
                        <a href="#" target="_blank" title="Twitter" class="jquery-once-4-processed"><img
                                src="<?php echo base_url(); ?>assets/images/facebook.png"
                                class="social_image">Twitter</a>
                        <a href="#" target="_blank" title="Twitter" class="jquery-once-4-processed"><img
                                src="<?php echo base_url(); ?>assets/images/twitter.png"
                                class="social_image">Twitter</a>
                        <a href="#" target="_blank" title="Twitter" class="jquery-once-4-processed"><img
                                src="<?php echo base_url(); ?>assets/images/instagram.png"
                                class="social_image">Twitter</a>
                        <a href="#" target="_blank" title="Twitter" class="jquery-once-4-processed"><img
                                src="<?php echo base_url(); ?>assets/images/linkedin.png"
                                class="social_image">Twitter</a>
                    </div>

                </div>

                <div class="col-md-12">
                    <hr>
                    <p>Copyright <i class="fa fa-copyright" aria-hidden="true"></i> 2023 - Bureau of Indian Standards.
                        All rights reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>



<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/font_resize.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dark_mode.js"></script>
<script>
$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: false,
    responsive: {
        0: {
            items: 1
        }
    }
})
$('.login_details').hide()
jQuery('.show').on('click', function() {
    jQuery('.login_details').toggle();
})
</script>
</body>

</html>