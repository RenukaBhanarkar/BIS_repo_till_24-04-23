<style>
.card-winners {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    /* border: 1px solid rgba(0,0,0,.125); */
    box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
    border-radius: 0.25rem;
    height: 100%;
    transition: transform 250ms;
}
.last-date{
    display: block;
    overflow: hidden;
    height: 80px;
    text-overflow: ellipsis;
}
h5{
    height:20px;
    overflow: hidden;
    display: block;
    text-overflow: ellipsis;
}
</style>
<div id="privacy-content" class="container">
<div class="bloginfo">
                <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">By The Mentors</h3>
            </div>
            <div class="heading-underline" style="width: 200px;">
                <div class="left"></div><div class="right"></div>
             </div>
    <div class="row mt-5">
        <?php foreach($by_the_mentor as $list){ ?>
        <div class="col-md-4 mb-4">
            <a href="<?php echo base_url().'users/by_the_mentor_detail/'.$list['id']; ?>">
                  <div class="card-winners">
                      <img src="<?php echo base_url().'uploads/by_the_mentors/img/'.$list['image'];?>" class="card-img-top" alt="Discussion Forum">
                      <div class="winner-body p-2">
                          <!-- <div class="node-status"><span>Status : </span>
                              <div class="status-open">Open</div>
                          </div> -->
                          <div class="title">
                              <p><?php echo $list['title'];?></p>
                          </div>
                          <div class="field-item even">
                              <span class="time_left">
                                  <span class="last-date"><?php echo $list['description'];?></span>
                              </span>
                          </div>
                      </div>
                  </div>
                  </a>
            </div>
            <?php } ?>
                
                
    </div>
    <?php if((count($by_the_mentor) > 5)){ ?>
    <div class="view-button">
                <a href="<?php echo base_url(); ?>users/all_by_the_mentors">View All</a>
            </div>    
            <?php } ?>
    <div class="col-sx-12 col-sm-12 col-md-12" style="border-left: 3px solid cadetblue; padding: 0px 25px;">
    <div class="bloginfo">
                <h3 style="margin-bottom: 0px;margin-top:20px;color: #0086b2!important;font-weight: 600;">Post Here...</h3>
            </div>
            <div class="heading-underline" style="width: 200px;">
                <div class="left"></div><div class="right"></div>
             </div>
        <div class="static-content">
           <?php if($this->session->flashdata()){
                echo $this->session->flashdata('MSG');
            } ?>
            <form action="<?php echo base_url().'users/add_btm'?>" method="post" enctype="multipart/form-data">
            <div class="row">
                  <div class="mb-3 col-md-4">
                          <label class="d-block text-font">Title<sup class="text-danger">*</sup></label>
                              <div class="d-flex">
                                    <input type="text" class="form-control input-font" name="title" id="" placeholder="Enter Title">
                              </div>
                  </div>
                  <div class="mb-3 col-md-4">
                          <label class="d-block text-font">Upload Image<sup class="text-danger">*</sup></label>
                              <div class="d-flex">
                                    <input type="file" class="form-control input-font" name="image" id="Image" >
                              </div>
                  </div>
                  <div class="mb-3 col-md-4">
                          <label class="d-block text-font">Upload Document</label>
                              <div class="d-flex">
                                    <input type="file" class="form-control input-font" name="document" id="">
                              </div>
                  </div>
                  <div class="mb-3 col-md-12">
                          <label class="d-block text-font">Description<sup class="text-danger">*</sup></label>
                          <textarea class="form-control input-font" name="description" id="#"></textarea>
                              
                  </div>
                  <div class="mb-3 col-md-12">
                       <div class="mentor_submit">
                          <button type="submit" class="btn btn-primary btn-sm mr-2">Submit</button>
                       </div> 
                  </div> 
             </div> 
            </form>
         </div>
    </div>
  </div>
