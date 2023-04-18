<style>
.your_wall_main_card_view {
    box-shadow: 0px 1px 20px rgb(225 225 225);
    border-radius: 3px;
    -ms-box-shadow: 0px 1px 20px rgb(225 225 225);
    margin-bottom: 36px;

}

.yourWall_image_view {
    height: 200px;
    margin-bottom: 17px;
    position: relative;
}

.Text-container_view {
    padding: 0px 19px 4px;
    text-align: justify;
    min-height: 180px;
}

.yourWall_title_view {
    font-weight: 600;
    font-size: 16px;
    color: #000000;
}

.Your_Wall_Description_view {
    font-size: 14px;
    color: #424242;
}

.Your_Wall_Description_view {
    font-size: 15px;
    color: #424242;

    display: -webkit-box;

}

.banner_image {
    border-radius: 4px;
}

.banner_image img {
    border-radius: 4px;
}

.title_right h6 {
    font-size: 17px;
    color: #bb1212;
    font-weight: 600;

}

.banner_image p {
    font-size: 15px;
    margin-top: 10px;
    font-weight: 600;
}

.tranding_outer_box {
    display: flex;
    flex-wrap: wrap;

    margin-bottom: 11px;

}

.image_tranding {
    width: 26%;
    height: 62px;
}

.text_container_tranding {
    width: 74%;
    line-height: 20px;
    padding: 0px 14px;
}

.Btn-do {
    font-size: 12px;
    padding: 3px 4px;
    border-radius: 5px;
}

.tending_para {
    padding: 2px 0px 0px;
    font-size: 13px;
    font-weight: 600;
    display: -webkit-box;
    max-width: 100%;
    height: 40px;
    -webkit-line-clamp: 2;
    overflow: hidden;
    -webkit-box-orient: vertical;
}
.img_mentor {
    padding: 8px;
    border-radius: 15px;
    height: 201px;
}
.input_box {
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    height: 201px;
    border-radius: 12px;
    position: relative;
}
</style>
<div class="container">
    <div class="your_wall_Outer_Box">
        <div class="inner_wall">
            <div class="row mt-5">
                <div class="col-sm-9">
                <h6 class="yourWall_title_view ">
                            <?php echo $published_wall['title']; ?>                                
                            </h6>
                    <div class="your_wall_main_card_view">
                        <div class="yourWall_image"> 

                            <img src="<?php echo base_url().'uploads/your_wall/'.$published_wall['image'] ?>" alt="not found" class="w-100 h-100">
                            <span><i class="fa fa-calendar icons"><?php echo date("m-d-Y",strtotime($published_wall['created_on'])); ?></i></span>
                        </div>
                        <div class="Text-container_view ">
                            
                            <p class="Your_Wall_Description_view">
                            <?php echo $published_wall['description']; ?>                               
                            </p>

                        </div>
                        <div class="row" style="padding:10px;">
                        <div class="mb-3 col-md-3">
                            <div class="input_box" >
                                <img src="<?php echo base_url().'assets/images/img_1.jpg'; ?>" id="outputThumbnail" alt="" class="w-100 img_mentor">
                               
                            </div>
                        </div>
                        <div class="mb-3 col-md-3">
                            <div class="input_box" >
                                <img src="<?php echo base_url().'assets/images/img_1.jpg'; ?>" id="outputThumbnail" alt="" class="w-100 img_mentor">
                               
                            </div>
                        </div>
                        <div class="mb-3 col-md-3">
                            <div class="input_box" >
                                <img src="<?php echo base_url().'assets/images/img_1.jpg'; ?>" id="outputThumbnail" alt="" class="w-100 img_mentor">
                               
                            </div>
                        </div>
                        <div class="mb-3 col-md-3">
                            <div class="input_box" >
                                <img src="<?php echo base_url().'assets/images/img_1.jpg'; ?>" id="outputThumbnail" alt="" class="w-100 img_mentor">
                               
                            </div>
                        </div>
                    </div>
                    </div>



                </div>
                <div class="col-sm-3">
                    <div class="right_side">
                        <div class="title_right">
                            <h6>What's New</h6>
                            <div class="banner_image">
                                <img src="<?php echo base_url();?>/assets/images/1.jpg" class="w-100">
                                <p>Photography Competition- Share the unknown spots of Mizoram</p>
                            </div>
                        </div>
                        <div class="title_right mt-3">
                            <h6>Trending</h6>
                            <div class="banner_image_tending">
                                <div class="tranding_outer_box">
                                    <div class="image_tranding">
                                        <img src="<?php echo base_url();?>/assets/images/2.jpg" class="w-100 h-100">
                                    </div>
                                    <div class="text_container_tranding">
                                        <span class="bg-success text-white Btn-do">Do</span>
                                        <a href="#" class="tending_para d-block">Photography Competition- Share the
                                            unknown
                                            spots of
                                            Mizoram</a>
                                    </div>
                                </div>
                                <div class="tranding_outer_box">
                                    <div class="image_tranding">
                                        <img src="<?php echo base_url();?>/assets/images/2.jpg" class="w-100 h-100">
                                    </div>
                                    <div class="text_container_tranding">
                                        <span class="bg-success text-white Btn-do">Do</span>
                                        <a href="#" class="tending_para d-block">Photography Competition- Share the
                                            unknown
                                            spots of
                                            Mizoram</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>