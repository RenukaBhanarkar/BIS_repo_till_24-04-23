<style>
        .inner_gallery_box {
            border-radius: 5px;
        }
        
        .inner_gallery_box img{
            border-radius: 5px;
            object-fit: fill;
        }
        p{
          text-align: center;
        }
        /* .item {
    height: 319px;
} */
.owl-theme .owl-dots {
    text-align: center;
    -webkit-tap-highlight-color: transparent;
    display: none;
}
    </style>
<section id="exchange_forum">
     <div class="container-fluid">
        <div class="row">
            <div class="exchange_section d-flex">
                <div class="col-md-2">
                    <div class="bis_logo">
                       <img src="<?=base_url();?>assets/images/bis_logo.png" class="opacity_img"> 
                    </div>
                    
                 </div>
         <div class="col-md-8" id="Forum">
                 <div class="bis_welcome">
                     <a href="">
                         <h2>An initiative to nurture the students as Brand Ambassadors of Quality & standards</h2>
                     </a>
                 </div>
               </div>
        <div class="col-md-2">
                 <div class="bis_logo">
                       <img src="<?=base_url();?>assets/images/bis_logo.png" class="opacity_img"> 
                  </div>
                 </div>
              </div>
            </div>
        </div>
    </section>
  <section id="winners_content">
        <div class="container-fluid">
            <div class="row">
               <div class="inner_content d-flex p-0">
                <div class="col-sm-3">
                    <div class="card" style="background: #014e9c; color:white;">
                        <div class="card-body new-card text-center">
                                 <h5 class="card-title">Winners of the Quiz</h5>
                                 <hr>
                                 <img src="<?=base_url();?>assets/images/background_img.webp" class="inner_image">
                                 <p class="card-text"><strong>Anis Mulani</strong></p>
                                 <p class="mb-0">k.b.p.v School Satara,Maharashtra</p>
                                  <div class="more_button">
                                 <button class="btn_common mt-1" onclick="location.href='<?php echo base_url();?>users/winners'">More<i class="fa fa-long-arrow-right ms-2" aria-hidden="true"></i></button>
                               </div>
                             </div>
                           </div>
                          </div>
                          <div class="col-sm-9">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                <?php  foreach($banner_data as $list=>$key){ ?>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $list; ?>" class="active" <?php if($list==0){ echo 'aria-current="true"';} ?> aria-label="Slide <?php echo $list=$list+1; ?>"></button>
                                    <?php }?>
                                  <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
                                </div>
                                <div class="carousel-inner">
                                  
                                  <?php  foreach($banner_data as $list=>$key){ ?>
                                    <div class="carousel-item <?php if($list==0){echo "active"; } ?>" >
                                    <img src="<?=base_url().'uploads/'.$key['banner_images'];?>"  class="background-banner-image">
                                  </div>
                                  <?php } ?>
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
                          </div>
                      </div>
              </div>
    </section>
    
    <section>
        <div class="container pt-4 pb-5" id="start-quiz">
            <div class="row text-center">
                <h3>Quiz Competition</h3>
                <p>Quizes For You</p>
            </div> 
            <?php if  (empty($allquize)) { ?>
              <div class="alert alert-danger">
                <strong>Sorry!</strong> Quizes are not available.
              </div>
           <?php  } else{  ?>
            <div class="row">
                <?php foreach ($allquize as $key => $quize) {  ?>
                    <div class="col-md-3">
                        <div class="quiz-section">
                            <div class="quiz-box">
                                <img src="<?=base_url();?><?php echo $quize['banner_img']?>" class="w-100 border-2">
                            </div> 
                            <div class="Quiz-button"><a href="aboutquiz.html">
                                <a href="<?= base_url();?>users/about_quiz/<?php echo $quize['id'];?>" class="btn startQuiz"> <span>Start Quiz</span></a>
                            </div>
                            <p class="quiz-text overflow-hidden p-1"><?php echo $quize['title']?></p>
                        </div>
                    </div>
                <?php  }?>
            </div>
            <div class="view-button">
                <a href="<?=base_url();?>users/quiz">View All</a>
            </div>    

            <?php } ?>
            
        </div>
    </section>
    <section id="cta" class="cta">
      <div class="container aos-init aos-animate" data-aos="zoom-out">

        <div class="row g-5">

          <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
            <h3>Standard Writting</h3>
            <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <a class="cta-btn align-self-start" href="#">View All</a>
          </div>

          <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
            <div class="img">
              <img src="<?=base_url();?>assets/images/standard.avif" alt="" class="img-standard">
            </div>
          </div>

        </div>

      </div>
    </section>
    
    <section style="background-color: #e3effb94;">
        <div class="container">
            <div class="row">
            <div class="new-content d-flex" style="margin-left: -37px;">
              <div class="col-md-3 col-lg-3 col-sm-3 m-2">
                  <a href="<?php echo base_url().'wall_of_wisdom/wallOfWisdom' ?>">
                    <div class="card image-card" style="width:100%; z-index: 1000;">                    
                        <img src="<?=base_url();?>assets/images/wall_1.jpg" class="card-img-top" alt="...">
                        <div class="card-body-new">
                          <p class="card-text">Wall Of Wisdom</p>
                        </div>                    
                      </div>
                    </a>
                    </div> 
                    <div class="col-md-3 col-lg-3 col-sm-3 m-2">
                    <a href="<?php echo base_url().'users/learning_standerd' ?>">
                     
 
                      <div class="card image-card" style="width:100%; z-index: 1000;">
 
                        <img src="<?=base_url();?>assets/images/wall_2.jpg" class="card-img-top" alt="...">
                        <div class="card-body-new">
                          <p class="card-text">Your Classroom</p>
                        </div>
                      </div>
                      </a>
                      </div>
                      <div class="col-md-3 col-lg-3 col-sm-3 m-2">
                      <a href="<?php echo base_url().'users/yourwall' ?>">
                      <div class="card image-card" style="width:100%; z-index: 1000;">                      
                        <img src="<?=base_url();?>assets/images/wall_3.jpg" class="card-img-top" alt="...">
                        <div class="card-body-new">
                          <p class="card-text">Your Wall</p>
                        </div>                      
                      </div>
                      </a>
                      </div>
                      <div class="col-md-3 col-lg-3 col-sm-3 m-2">
                      <a href="<?php echo base_url()."users/byTheMentor" ?>">
                      <div class="card image-card" style="width:100%; z-index: 1000;">
                      
                        <img src="<?=base_url();?>assets/images/wall_4.jpg" class="card-img-top" alt="...">
                        <div class="card-body-new">
                          <p class="card-text">By the Mentors</p>
                        </div>
                      
                      </div>
                      </a>
                      </div>
                      
                 </div>
            </div>
        </div>    

    </section>
    <section id="about" class="about" style="padding: 60px 0; overflow: hidden;">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-header">
          <h2>News And Events</h2>
          <p>Architecto nobis eos vel nam quidem vitae temporibus voluptates qui hic deserunt iusto omnis nam voluptas asperiores sequi tenetur dolores incidunt enim voluptatem magnam cumque fuga.</p>
        </div>

        <div class="row g-4 g-lg-5 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-5">
            <div class="about-img">
              <img src="<?=base_url();?>assets/images/wall_4.jpg" class="img-fluid" alt="" style="width:100%;">
            </div>
          </div>

          <div class="col-lg-7">
            

            <!-- Tabs -->
            <ul class="nav nav-pills mb-3" role="tablist">
              <li><a class="nav-link active" data-bs-toggle="pill" href="#tab1" aria-selected="true" role="tab">News</a></li>
              <li><a class="nav-link" data-bs-toggle="pill" href="#tab2" aria-selected="false" role="tab" tabindex="-1">Events</a></li>
              <li><a class="nav-link" data-bs-toggle="pill" href="#tab3" aria-selected="false" role="tab" tabindex="-1">Creative Tast</a></li>
            </ul><!-- End Tabs -->

            <!-- Tab Content -->
            <div class="tab-content">

              <div class="tab-pane fade active show" id="tab1" role="tabpanel">

                <p class="fst-italic">Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo suscipit voluptatem.</p>

                <div class="d-flex align-items-center mt-4">
                  <i class="bi bi-check2"></i>
                  <h4>Repudiandae rerum velit modi et officia quasi facilis</h4>
                </div>
                <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi dolorum non eveniet magni quaerat nemo et.</p>

                <div class="d-flex align-items-center mt-4">
                  <i class="bi bi-check2"></i>
                  <h4>Incidunt non veritatis illum ea ut nisi</h4>
                </div>
                <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur. Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem quo tempora. Quia et perferendis.</p>

                <div class="d-flex align-items-center mt-4">
                  <i class="bi bi-check2"></i>
                  <h4>Omnis ab quia nemo dignissimos rem eum quos..</h4>
                </div>
                <p>Eius alias aut cupiditate. Dolor voluptates animi ut blanditiis quos nam. Magnam officia aut ut alias quo explicabo ullam esse. Sunt magnam et dolorem eaque magnam odit enim quaerat. Vero error error voluptatem eum.</p>

              </div><!-- End Tab 1 Content -->

              <div class="tab-pane fade" id="tab2" role="tabpanel">

                <p class="fst-italic">Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo suscipit voluptatem.</p>

                <div class="d-flex align-items-center mt-4">
                  <i class="bi bi-check2"></i>
                  <h4>Repudiandae rerum velit modi et officia quasi facilis</h4>
                </div>
                <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi dolorum non eveniet magni quaerat nemo et.</p>

                <div class="d-flex align-items-center mt-4">
                  <i class="bi bi-check2"></i>
                  <h4>Incidunt non veritatis illum ea ut nisi</h4>
                </div>
                <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur. Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem quo tempora. Quia et perferendis.</p>

                <div class="d-flex align-items-center mt-4">
                  <i class="bi bi-check2"></i>
                  <h4>Omnis ab quia nemo dignissimos rem eum quos..</h4>
                </div>
                <p>Eius alias aut cupiditate. Dolor voluptates animi ut blanditiis quos nam. Magnam officia aut ut alias quo explicabo ullam esse. Sunt magnam et dolorem eaque magnam odit enim quaerat. Vero error error voluptatem eum.</p>

              </div><!-- End Tab 2 Content -->

              <div class="tab-pane fade" id="tab3" role="tabpanel">

                <p class="fst-italic">Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo suscipit voluptatem.</p>

                <div class="d-flex align-items-center mt-4">
                  <i class="bi bi-check2"></i>
                  <h4>Repudiandae rerum velit modi et officia quasi facilis</h4>
                </div>
                <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi dolorum non eveniet magni quaerat nemo et.</p>

                <div class="d-flex align-items-center mt-4">
                  <i class="bi bi-check2"></i>
                  <h4>Incidunt non veritatis illum ea ut nisi</h4>
                </div>
                <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur. Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem quo tempora. Quia et perferendis.</p>

                <div class="d-flex align-items-center mt-4">
                  <i class="bi bi-check2"></i>
                  <h4>Omnis ab quia nemo dignissimos rem eum quos..</h4>
                </div>
                <p>Eius alias aut cupiditate. Dolor voluptates animi ut blanditiis quos nam. Magnam officia aut ut alias quo explicabo ullam esse. Sunt magnam et dolorem eaque magnam odit enim quaerat. Vero error error voluptatem eum.</p>

              </div><!-- End Tab 3 Content -->

            </div>

          </div>

        </div>

      </div>
    </section>
    <section style="margin-bottom: 38px;">
        <div class="container">
            <div class="row">
               <div class="col-lg-12 text-center my-2 pt-5">
                   <h4>Images & Gallery</h4>
               </div>
            </div>
            <div class="portfolio-menu mt-2 mb-4">
               <ul>
                  <!-- <li class="btn btn-outline-dark active" data-filter="*" id="img">Images</li> -->
                  <li style="padding: 0px;"><button onclick="gal_images()" class="btn btn-outline-dark active img" id="img">Images</button></li>
                  <!-- <li class="btn btn-outline-dark" data-filter=".gts">Girls T-shirt</li>
                  <li class="btn btn-outline-dark" data-filter=".lap">Laptops</li> -->
                  <li style="padding: 0px;"><button onclick="abcd()" class="btn btn-outline-dark vdo" id="vdo">Video</button></li>
               </ul>
            </div>
            <div class="portfolio-item row" id="photo_gallary">
                  <?php if(!empty($images)){ foreach($images as $list){ ?>
                      <div class="item selfie col-lg-3 col-md-4 col-6 col-sm">
                          <a href="<?php echo base_url().'uploads/'.$list['image'];?>" class="fancylight popup-btn" data-fancybox-group="light"> 
                          <img class="img-fluid" src="<?php echo base_url().'uploads/'.$list['image'];?>" style="height:180px; width:280px; padding:20px;"; alt="">
                          </a>
                      </div>
                  <?php } ?>
                  <?php if(count($images) > 7){ ?>
                  <div class="view-button">
                    <a href="<?php echo base_url().'users/photo_gallary' ?>">View All</a>
                  </div>
                  <?php } } ?>
               <!-- <a class="content-right" href="">view More...</a> -->
             </div>
             <div class="portfolio-item row" id="video_gallary" style="display:none;">
             <?php if(!empty($videos)){ foreach($videos as $list){ ?>
                      <div class="item selfie col-lg-3 col-md-4 col-6 col-sm">
                          <a href="<?php echo base_url().'uploads/'.$list['video'];?>" class="fancylight popup-btn" data-fancybox-group="light"> 
                          <video class="img-fluid" src="<?php echo base_url().'uploads/'.$list['video'];?>" style="height:180px; width:280px; padding:20px;"; alt="">
                          </a>
                      </div>
                      <?php if(count($videos) > 7){ ?>
                      <div class="view-button">
                      <a href="<?php echo base_url().'users/video_gallary' ?>">View All</a>
                    </div>
                    <?php } ?>
                  <?php } }?>
             </div>
         </div>
    </section>    
    
    
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <script>
       $('#photo_gallary').show();
      function abcd(){         
              $('.vdo').addClass('active');
              $('.img').removeClass('active');
              $('#photo_gallary').hide();
              $('#video_gallary').show();                                
        }
     
      function gal_images(){        
              $('.img').addClass('active');
              $('.vdo').removeClass('active');
              $('#photo_gallary').show();
              $('#video_gallary').hide();                                
      }
        $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });
   
// $('.portfolio-item').isotope({
        //  	itemSelector: '.item',
        //  	layoutMode: 'fitRows'
        //  });
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
  