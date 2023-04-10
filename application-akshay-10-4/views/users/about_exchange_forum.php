<style>
    #about_new {
    float: left;
    margin: 0px 20px 20px 0px;
    width: 21%;
}
</style>
<div id="privacy-content" class="container">
    <div class="col-sx-12 col-sm-12 col-md-12" style="border-left: 3px solid cadetblue; padding: 0px 25px;">
        <div class="static-content">
            <div class="bloginfo">
                <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">About Exchange Forum</h3>
            </div>
            <div class="heading-underline" style="width: 200px;">
                <div class="left"></div><div class="right"></div>
             </div>
            <div class="bloginfo">
                
                <!-- <img src="<?php echo base_url(); ?>assets/images/indexBanner.jpeg" id="about_new"> -->
                <img src="<?php echo base_url().'uploads/'.$about_exchange_forum['image']; ?>" id="about_new">
                <p>
                    <?php echo $about_exchange_forum['description']; ?>
                </p>
            </div>
         </div>
    </div>
  </div>
