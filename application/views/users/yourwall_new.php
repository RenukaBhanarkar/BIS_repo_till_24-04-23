<style>
    .cards-wrapper {
    display: flex;
    height: 342px;
}
  .winner-content .card{
    width: calc(100%/2);
    margin: 0 0.5em;

  }
  .Your_Wall_Description{
        display: block;
  width: 100px;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
    }
    #yourwall_title{
        overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
    }
    .cloned{
        height:400px;
    }
    .item .card {
    border: none;
    border-radius: 0;
    box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18)!important;
}
.heading-underline .left_1 {
    width: 25%;
    height: 5px;
    float: left;
    background-color: #014e9d;
}
.owl-dot{
        color: black;
    } 
    #yourwall_description{
        display:block;
        overflow: hidden;
        height: 80px;
    }
   
  </style>

   <section>
        <div class="container">
        <div class="row my-4">
            <div class="col-md-8">
            <div class="static-content">
                <div class="bloginfo">
                    <h3 style="margin-bottom: 5px; color: #0086b2!important;font-weight: 600;">Your Wall</h3>
                </div>
                <div class="heading-underline" style="width: 324px;">
                    <div class="left_1"></div><div class="right"></div>
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
    <div class="owl-carousel owl-theme" id="carouselExampleControls">
        <?php foreach($published_wall as $list){ ?>

                <div class="item">
                    <div class="card" style="width: 18rem;">
                        <div class="yourWall_image">
                            <img src="<?php echo base_url()."uploads/your_wall/".$list['image']; ?>" class="card-img-top" alt="">
                            <span><i class="fa fa-calendar icons"></i><?php echo $list['created_on']; ?></span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $list['title']; ?></h5>
                            <p class="card-text" id="yourwall_description"><?php echo $list['description']; ?></p>
                                <div class="button_container">
                                    <a href="<?php echo base_url().'users/yourwallview/'.$list['id']; ?>" class="btn btn_viewAll">View</a>
                                </div>
                        </div>
                    </div>
                </div>
            
            <?php } ?>
        
    </div>
                
                
            </div>
        
      </div>          
   </section>
   <div class="container">
   <?php if($this->session->flashdata()){
                echo $this->session->flashdata('MSG');
            } ?>
                        <form action="<?php echo base_url(); ?>users/add_your_wall" method="post" enctype="multipart/form-data">
                <h2 class="YourWallForm">Your Wall </h2>
                <div class="bg-light p-3">
                    <!-- <div class="Comment_image">
                        <img src="../assets/images/user_image.png">
                    </div> -->
                    
                    <div class="row">
                        <div class="col-sm-6 mt-3">

                            <input type="text" class="form-control title-height mb-4" name="title" placeholder="Title">

                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="file-upload-wrapper" data-text="Select your file">
                                <input type="file" class="file-upload-field" name="image" value="">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group ">
                                <textarea class="form-control  w-100" rows="8" placeholder="Share Your Description......" name="description"></textarea>

                                <div class="button-group float-end mt-3">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>


            </form>

            <ul class="posts">
            </ul>
        </div>

  
  