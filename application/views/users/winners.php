<style>
  .services {
    padding: 60px 0;
    overflow: hidden;
}
.section-header {
    text-align: center;
    padding-bottom: 40px;
}
.services .img {
    border-radius: 8px;
    overflow: hidden;
}
.img-fluid {
    max-width: 100%;
    height: auto;
    transition: all ease-in-out 0.6s;
    
}
.img-fluid:hover {
    transform: scale(1.2);
}
.services .details {
    padding: 50px 30px;
    margin: -100px 30px 0 30px;
    transition: all ease-in-out 0.3s;
    background: white;
    position: relative;
    /* background: rgba(var(--color-white-rgb), 0.9); */
    text-align: center;
    border-radius: 8px;
    box-shadow: 0px 0 25px rgba(var(--color-black-rgb), 0.1);
}
.services .service-item:hover .details .icon {
    background: white;
    border: 2px solid #0ea2bd;
}
.services .details .icon {
    margin: 0;
    width: 72px;
    height: 72px;
    background:#0ea2bd;
    border-radius: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    color: var(--color-white);
    font-size: 28px;
    transition: ease-in-out 0.3s;
    position: absolute;
    top: -36px;
    left: calc(50% - 36px);
    border: 6px solid white;
}
.section-header h2 {
    font-weight: 600;
    font-family: 'FontAwesome';
    font-size: 55px;
    color: brown;
}
</style>
<section id="services" class="services">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-header">
          <h2>Winners Wall</h2>
          <p>Ea vitae aspernatur deserunt voluptatem impedit deserunt magnam occaecati dssumenda quas ut ad dolores adipisci aliquam.</p>
        </div>

        <div class="row gy-5">

          <div class="col-xl-4 col-md-6 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
            <div class="service-item">
              <div class="img">
                <img src="<?php echo base_url();?>/assets/images/w_1.jpg" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                  <!-- <i class="bi bi-activity"></i> -->
                  <i class="fa fa-trophy"></i>
                  <!-- <img src="<?php echo base_url();?>/assets/images/prize_2.avif" alt="" class=""> -->
                </div>
                <a href="#" class="stretched-link">
                  <h3>Nesciunt Mete</h3>
                </a>
                <p>Provide dgdt ergtrgtrg ergtrtgtrfgtrgh ertergtrtgregt rgergergter ertgergtergtergtergtergt trertertgergtertge tretergtergtergte ertergtergter erterugtergtertgte reergtergterter ergtergtergtergt tergtergtergter tertgergtert ergterte</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-md-6 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
            <div class="service-item">
              <div class="img">
                <img src="<?php echo base_url();?>/assets/images/w_2.jpg" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                <i class="fa fa-trophy"></i>
                </div>
                <a href="#" class="stretched-link">
                  <h3>Eosle Commodi</h3>
                </a>
                <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-md-6 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="400">
            <div class="service-item">
              <div class="img">
                <img src="<?php echo base_url();?>/assets/images/w_3.jpg" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                <i class="fa fa-trophy"></i>
                </div>
                <a href="#" class="stretched-link">
                  <h3>Ledo Markt</h3>
                </a>
                <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-md-6 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="500">
            <div class="service-item">
              <div class="img">
                <img src="<?php echo base_url();?>/assets/images/w_1.jpg" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                <i class="fa fa-trophy"></i>
                </div>
                <a href="#" class="stretched-link">
                  <h3>Asperiores Commodit</h3>
                </a>
                <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
                <a href="#" class="stretched-link"></a>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-md-6 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="600">
            <div class="service-item">
              <div class="img">
                <img src="<?php echo base_url();?>/assets/images/w_2.jpg" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                <i class="fa fa-trophy"></i>
                </div>
                <a href="#" class="stretched-link">
                  <h3>Velit Doloremque</h3>
                </a>
                <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p>
                <a href="#" class="stretched-link"></a>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-md-6 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="700">
            <div class="service-item">
              <div class="img">
                <img src="<?php echo base_url();?>/assets/images/w_3.jpg" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                <i class="fa fa-trophy"></i>
                </div>
                <a href="#" class="stretched-link">
                  <h3>Dolori Architecto</h3>
                </a>
                <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p>
                <a href="#" class="stretched-link"></a>
              </div>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>
    </section>
<!-- <style>
  .winner-content .card{
    width: calc(100%/2);
    margin: 0 0.5em;

  }

  </style>

   <section>
        <div class="container">
        <div class="row my-4">
            <div class="col-md-8">
            <div class="static-content">
                <div class="bloginfo">
                    <h3 style="margin-bottom: 5px; color: #0086b2!important;font-weight: 600;">Winners of the Post Maker</h3>
                </div>
                <div class="heading-underline" style="width: 324px;">
                    <div class="left"></div><div class="right"></div>
                 </div>
             </div> 
             </div>
             <div class="col-md-4">
                <div class="input-group search_icon">
                    <input class="form-control border-end-0 border rounded-pill" type="search" value="search" id="example-search-input">
                    <span class="input-group-append">
                        <button class="search_button btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
             </div>    
           </div>
            <div class="winner-content">
                <div id="carouselExampleControls_1" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="cards-wrapper">
                          <div class="card">
                            <div class="image-wrapper">
                              <img src="<?php echo base_url();?>/assets/images/student-1.jpg" alt="...">
                            </div>
                            <div class="card-body-winner">
                              <h5 class="card-title">Anis Mulani</h5>
                              <p class="card-text-winner">Pune, Maharashtra</p>
                              <div class="first-Prize">
                              <a href="#">1<sup>st</sup> Prize</a>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="image-wrapper">
                              <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                            </div>
                            <div class="card-body-winner">
                                <h5 class="card-title">Anis Mulani</h5>
                                <p class="card-text-winner">Pune, Maharashtra</p>
                                <div class="first-Prize">
                                <a href="#">2<sup>st</sup> Prize</a>
                                </div>
                              </div>
                          </div>
                          <div class="card">
                            <div class="image-wrapper">
                              <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                            </div>
                            <div class="card-body-winner">
                                <h5 class="card-title">Anis Mulani</h5>
                                <p class="card-text-winner">Pune, Maharashtra</p>
                                <div class="first-Prize">
                                <a href="#">3<sup>st</sup> Prize</a>
                                </div>
                              </div>
                          </div>
                          <div class="card">
                            <div class="image-wrapper">
                              <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                            </div>
                            <div class="card-body-winner">
                                <h5 class="card-title">Anis Mulani</h5>
                                <p class="card-text-winner">Pune, Maharashtra</p>
                                <div class="first-Prize">
                                <a href="#">4<sup>st</sup> Prize</a>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="cards-wrapper">
                          <div class="card">
                            <div class="image-wrapper">
                              <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                            </div>
                            <div class="card-body-winner">
                                <h5 class="card-title">Anis Mulani</h5>
                                <p class="card-text-winner">Pune, Maharashtra</p>
                                <div class="first-Prize">
                                <a href="#">5<sup>st</sup> Prize</a>
                                </div>
                              </div>
                          </div>
                          <div class="card">
                            <div class="image-wrapper">
                              <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                            </div>
                            <div class="card-body-winner">
                                <h5 class="card-title">Anis Mulani</h5>
                                <p class="card-text-winner">Pune, Maharashtra</p>
                                <div class="first-Prize">
                                <a href="#">6<sup>st</sup> Prize</a>
                                </div>
                              </div>
                          </div>
                          <div class="card">
                            <div class="image-wrapper">
                              <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                            </div>
                            <div class="card-body-winner">
                                <h5 class="card-title">Anis Mulani</h5>
                                <p class="card-text-winner">Pune, Maharashtra</p>
                                <div class="first-Prize">
                                <a href="#">7<sup>st</sup> Prize</a>
                                </div>
                              </div>
                          </div>
                          <div class="card">
                            <div class="image-wrapper">
                              <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                            </div>
                            <div class="card-body-winner">
                                <h5 class="card-title">Anis Mulani</h5>
                                <p class="card-text-winner">Pune, Maharashtra</p>
                                <div class="first-Prize">
                                <a href="#">8<sup>st</sup> Prize</a>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="cards-wrapper">
                          <div class="card">
                            <div class="image-wrapper">
                              <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                            </div>
                            <div class="card-body-winner">
                                <h5 class="card-title">Anis Mulani</h5>
                                <p class="card-text-winner">Pune, Maharashtra</p>
                                <div class="first-Prize">
                                <a href="#">9<sup>st</sup> Prize</a>
                                </div>
                              </div>
                          </div>
                          <div class="card">
                            <div class="image-wrapper">
                              <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                            </div>
                            <div class="card-body-winner">
                                <h5 class="card-title">Anis Mulani</h5>
                                <p class="card-text-winner">Pune, Maharashtra</p>
                                <div class="first-Prize">
                                <a href="#">10<sup>st</sup> Prize</a>
                                </div>
                              </div>
                          </div>
                          <div class="card">
                            <div class="image-wrapper">
                              <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                            </div>
                            <div class="card-body-winner">
                                <h5 class="card-title">Anis Mulani</h5>
                                <p class="card-text-winner">Pune, Maharashtra</p>
                                <div class="first-Prize">
                                <a href="#">11<sup>st</sup> Prize</a>
                                </div>
                              </div>
                          </div>
                          <div class="card">
                            <div class="image-wrapper">
                              <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                            </div>
                            <div class="card-body-winner">
                                <h5 class="card-title">Anis Mulani</h5>
                                <p class="card-text-winner">Pune, Maharashtra</p>
                                <div class="first-Prize">
                                <a href="#">12<sup>st</sup> Prize</a>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button class="carousel-control-prev scroll-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next scroll-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
        
      </div>          
   </section>
   <section>
    <div class="container">
    <div class="row my-4">
        <div class="col-md-8">
        <div class="static-content">
            <div class="bloginfo">
                <h3 style="margin-bottom: 5px; color: #0086b2!important;font-weight: 600;">Quiz Winners</h3>
            </div>
            <div class="heading-underline" style="width: 324px;">
                <div class="left"></div><div class="right"></div>
             </div>
         </div> 
         </div>
            
       </div>
        <div class="winner-content">
            <div id="carouselExampleControls1" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="cards-wrapper">
                      <div class="card">
                        <div class="image-wrapper">
                          <img src="<?php echo base_url(); ?>assets/images/student-1.jpg" alt="...">
                        </div>
                        <div class="card-body-winner">
                          <h5 class="card-title">Anis Mulani</h5>
                          <p class="card-text-winner">Pune, Maharashtra</p>
                          <div class="first-Prize">
                          <a href="#">1<sup>st</sup> Prize</a>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="image-wrapper">
                          <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                        </div>
                        <div class="card-body-winner">
                            <h5 class="card-title">Anis Mulani</h5>
                            <p class="card-text-winner">Pune, Maharashtra</p>
                            <div class="first-Prize">
                            <a href="#">2<sup>st</sup> Prize</a>
                            </div>
                          </div>
                      </div>
                      <div class="card">
                        <div class="image-wrapper">
                          <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                        </div>
                        <div class="card-body-winner">
                            <h5 class="card-title">Anis Mulani</h5>
                            <p class="card-text-winner">Pune, Maharashtra</p>
                            <div class="first-Prize">
                            <a href="#">3<sup>st</sup> Prize</a>
                            </div>
                          </div>
                      </div>
                      <div class="card">
                        <div class="image-wrapper">
                          <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                        </div>
                        <div class="card-body-winner">
                            <h5 class="card-title">Anis Mulani</h5>
                            <p class="card-text-winner">Pune, Maharashtra</p>
                            <div class="first-Prize">
                            <a href="#">4<sup>st</sup> Prize</a>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="cards-wrapper">
                      <div class="card">
                        <div class="image-wrapper">
                          <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                        </div>
                        <div class="card-body-winner">
                            <h5 class="card-title">Anis Mulani</h5>
                            <p class="card-text-winner">Pune, Maharashtra</p>
                            <div class="first-Prize">
                            <a href="#">5<sup>st</sup> Prize</a>
                            </div>
                          </div>
                      </div>
                      <div class="card">
                        <div class="image-wrapper">
                          <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                        </div>
                        <div class="card-body-winner">
                            <h5 class="card-title">Anis Mulani</h5>
                            <p class="card-text-winner">Pune, Maharashtra</p>
                            <div class="first-Prize">
                            <a href="#">6<sup>st</sup> Prize</a>
                            </div>
                          </div>
                      </div>
                      <div class="card">
                        <div class="image-wrapper">
                          <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                        </div>
                        <div class="card-body-winner">
                            <h5 class="card-title">Anis Mulani</h5>
                            <p class="card-text-winner">Pune, Maharashtra</p>
                            <div class="first-Prize">
                            <a href="#">7<sup>st</sup> Prize</a>
                            </div>
                          </div>
                      </div>
                      <div class="card">
                        <div class="image-wrapper">
                          <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                        </div>
                        <div class="card-body-winner">
                            <h5 class="card-title">Anis Mulani</h5>
                            <p class="card-text-winner">Pune, Maharashtra</p>
                            <div class="first-Prize">
                            <a href="#">8<sup>st</sup> Prize</a>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="cards-wrapper">
                      <div class="card">
                        <div class="image-wrapper">
                          <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                        </div>
                        <div class="card-body-winner">
                            <h5 class="card-title">Anis Mulani</h5>
                            <p class="card-text-winner">Pune, Maharashtra</p>
                            <div class="first-Prize">
                            <a href="#">9<sup>st</sup> Prize</a>
                            </div>
                          </div>
                      </div>
                      <div class="card">
                        <div class="image-wrapper">
                          <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                        </div>
                        <div class="card-body-winner">
                            <h5 class="card-title">Anis Mulani</h5>
                            <p class="card-text-winner">Pune, Maharashtra</p>
                            <div class="first-Prize">
                            <a href="#">10<sup>st</sup> Prize</a>
                            </div>
                          </div>
                      </div>
                      <div class="card">
                        <div class="image-wrapper">
                          <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                        </div>
                        <div class="card-body-winner">
                            <h5 class="card-title">Anis Mulani</h5>
                            <p class="card-text-winner">Pune, Maharashtra</p>
                            <div class="first-Prize">
                            <a href="#">11<sup>st</sup> Prize</a>
                            </div>
                          </div>
                      </div>
                      <div class="card">
                        <div class="image-wrapper">
                          <img src="https://www.daysoftheyear.com/wp-content/uploads/world-student-day1.jpg" alt="...">
                        </div>
                        <div class="card-body-winner">
                            <h5 class="card-title">Anis Mulani</h5>
                            <p class="card-text-winner">Pune, Maharashtra</p>
                            <div class="first-Prize">
                            <a href="#">12<sup>st</sup> Prize</a>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev scroll-prev" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next scroll-next" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>
    
  </div>          
</section> -->