<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
<style>
  
.World_of_standers_inner_Box {
    width: 23%;
    background: white;
    margin: 0px 0px 30px;
    padding: 8px 8px 8px;
    border-radius: 2%;
    margin-right: 2%;

    position:relative;

}
.Title_Section {
    position: absolute;
    bottom: 8px;
    margin: 0px;
    background: rgb(201 0 5 / 74%);
    display: block;
    width: 94%;
    padding: 6px 10px;
    color: white;
    font-weight: 600;
    font-size: 15px;
    text-align: center;
}
.World_of_standers_image_box img {
    object-fit: cover;
    width: 100%;
}
.World_of_standers_inner_Box.shadow:hover {
    transition: all .5s;
    transform: scale(1.2);
}
.carousel-item {
    height: 420px !important;
    background-repeat: no-repeat;
    background-size: 100% 100%;
    background-position: 100%;
}
</style>
<section>
    <div class="world_standard_banner">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img src="<?=base_url();?>assets/images/banner1.jpg" class="d-block w-100 standard_banner_scroll" alt="...">
                                </div>
                                <div class="carousel-item">
                                <img src="<?=base_url();?>assets/images/banner2.jpg" class="d-block w-100 standard_banner_scroll" alt="...">
                                </div>
                                <div class="carousel-item">
                                <img src="<?=base_url();?>assets/images/banner1.jpg" class="d-block w-100 standard_banner_scroll"  alt="...">
                                </div>
                            </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                </div>

    </div>
</section>
<section id="quality-outer my-5">
    <div class="quality_section">
        <div class="container">
            <div class="row my-5">
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="item_proposal_list">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/world_stander/New_work_item.png" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">New Work Item Proposals</p>
                    </a>
                  
                       
                </div>
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="important_draft">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/world_stander/Draft1.png" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">Important Draft Standards</p>
                    </a>
                  
                       
                </div>
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="https://www.services.bis.gov.in/php/BIS_2.0/dgdashboard/Published_Standards_new/new_standards">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/world_stander/PUBLISHED.png" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">New Standards Published</p>
                    </a>
                  
                       
                </div>
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="https://www.services.bis.gov.in/php/BIS_2.0/dgdashboard/review/">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/world_stander/REVIEW.png" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">Standards Under Review</p>
                    </a>
                  
                       
                </div>
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="https://www.services.bis.gov.in/php/BIS_2.0/bisconnect/standard_review/Standard_review/">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/world_stander/revised.png" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">Standards Revised</p>
                    </a>
                  
                       
                </div>
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="<?php echo base_url().'users/share_your_thoughts'?>">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/world_stander/shareYourthoughts.png" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">Share Your Thoughts</p>
                    </a>
                  
                       
                </div>
                <div class="World_of_standers_inner_Box  shadow">
                <a href="<?php echo base_url().'users/join_the_classroom'?>">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/world_stander/classroom.png" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">Join The Classroom</p>
                    </a>
                  
                       
                </div>
                <div class="World_of_standers_inner_Box  shadow">
                    <a href="<?php echo base_url().'users/conversation_with_experts'?>">
                    <div class="World_of_standers_image_box">
                        <img src="<?=base_url();?>assets/images/world_stander/Experts.png" class="card-img-top" alt="Discussion Forum">
                       
                    </div>
                    <p class="Title_Section">In Conversation with Experts</p>
                    </a>
                  
                       
                </div>
            </div>
          
            
        </div>
    </section>    
    <section style="margin-bottom: 38px;">
        <div class="container">
            <div class="row">
               <div class="col-lg-12 text-center my-2">
                   <h4>Images & Gallery</h4>
               </div>
            </div>
            <div class="portfolio-menu mt-2 mb-4">
               <ul>
                  <li class="btn btn-outline-dark active" data-filter="*">All</li>
                  <!-- <li class="btn btn-outline-dark" data-filter=".gts">Girls T-shirt</li>
                  <li class="btn btn-outline-dark" data-filter=".lap">Laptops</li> -->
                  <li class="btn btn-outline-dark text" data-filter=".selfie">selfie</li>
               </ul>
            </div>
            <div class="portfolio-item row">
                <div class="item selfie col-lg-3 col-md-4 col-6 col-sm">
                   <a href="https://image.freepik.com/free-photo/stylish-young-woman-with-bags-taking-selfie_23-2147962203.jpg" class="fancylight popup-btn" data-fancybox-group="light"> 
                   <img class="img-fluid" src="https://image.freepik.com/free-photo/stylish-young-woman-with-bags-taking-selfie_23-2147962203.jpg" alt="">
                   </a>
                </div>
                <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                   <a href="https://image.freepik.com/free-photo/pretty-girl-near-car_1157-16962.jpg" class="fancylight popup-btn" data-fancybox-group="light"> 
                   <img class="img-fluid" src="https://image.freepik.com/free-photo/pretty-girl-near-car_1157-16962.jpg" alt="">
                   </a>
                </div>
                <div class="item selfie col-lg-3 col-md-4 col-6 col-sm">
                   <a href="https://image.freepik.com/free-photo/blonde-tourist-taking-selfie_23-2147978899.jpg" class="fancylight popup-btn" data-fancybox-group="light">
                   <img class="img-fluid" src="https://image.freepik.com/free-photo/blonde-tourist-taking-selfie_23-2147978899.jpg" alt="">
                   </a>
                </div>
                <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                   <a href="https://image.freepik.com/free-photo/cute-girls-oin-studio_1157-18211.jpg" class="fancylight popup-btn" data-fancybox-group="light">
                   <img class="img-fluid" src="https://image.freepik.com/free-photo/cute-girls-oin-studio_1157-18211.jpg" alt="">
                   </a>
                </div>
                <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                   <a href="https://image.freepik.com/free-photo/stylish-pin-up-girls_1157-18451.jpg" class="fancylight popup-btn" data-fancybox-group="light">
                   <img class="img-fluid" src="https://image.freepik.com/free-photo/stylish-pin-up-girls_1157-18451.jpg" alt="">
                   </a>
                </div>
                <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                   <a href="https://image.freepik.com/free-photo/stylish-pin-up-girl_1157-18940.jpg" class="fancylight popup-btn" data-fancybox-group="light">
                   <img class="img-fluid" src="https://image.freepik.com/free-photo/stylish-pin-up-girl_1157-18940.jpg" alt="">
                   </a>
                </div>
                <div class="item lap col-lg-3 col-md-4 col-6 col-sm">
                   <a href="https://image.freepik.com/free-photo/digital-laptop-working-global-business-concept_53876-23438.jpg" class="fancylight popup-btn" data-fancybox-group="light">
                   <img class="img-fluid" src="https://image.freepik.com/free-photo/digital-laptop-working-global-business-concept_53876-23438.jpg" alt="">
                   </a>
                </div>
                <div class="item lap col-lg-3 col-md-4 col-6 col-sm">
                   <a href="https://image.freepik.com/free-psd/set-digital-devices-screen-mockup_53876-76507.jpg" class="fancylight popup-btn" data-fancybox-group="light">
                   <img class="img-fluid" src="https://image.freepik.com/free-psd/set-digital-devices-screen-mockup_53876-76507.jpg" alt="">
                   </a>
                </div>
                
                
                
                
              </div>
         </div>
    </section>
    
    <script src="<?=base_url();?>assets/js/bootstrap.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/js/owl.carousel.min.js"></script>
    <script src="<?=base_url();?>assets/js/font_resize.js"></script>
    <script src="<?=base_url();?>assets/js/dark_mode.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>

<script>
    
    $('.portfolio-menu ul li').click(function(){
         	$('.portfolio-menu ul li').removeClass('active');
         	$(this).addClass('active');
         	
         	var selector = $(this).attr('data-filter');
         	$('.portfolio-item').isotope({
         		filter:selector
         	});
         	return  false;
         });
         $(document).ready(function() {
         var popup_btn = $('.popup-btn');
         popup_btn.magnificPopup({
         type : 'image',
         gallery : {
         	enabled : true
         }
         });
         });
    
    </script>