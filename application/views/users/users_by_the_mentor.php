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
    /* display: block;
    overflow: hidden; */
    /* height: 80px; */
    /* width: 400px;
    text-overflow: ellipsis;
    white-space: nowrap; */

    display: block;
    height: 93px;
  width: 330px;
  overflow: hidden;
  /* white-space: nowrap; */
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
                              <p style="font-weight:600;"><?php echo $list['title'];?></p>
                          </div>
                          <div class="card-body">
                              <!-- <span class="time_left"> -->
                                  <p class="last-date"><?php echo $list['description'];?></p>
                              <!-- </span> -->
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
            <form action="javascript:;" class="was-validated" method="post" id="updateform" enctype="multipart/form-data">
            <div class="row">
                  <div class="mb-3 col-md-4">
                          <label class="d-block text-font">Title<sup class="text-danger">*</sup></label>
                              <div class="d-flex">
                                    <input type="text" class="form-control input-font" name="title" id="title" placeholder="Enter Title" placeholder="Enter Title" required minlength="5" maxlength="200">
                              </div>
                              <span style="color:red;" id="err_title"></span>
                  </div>
                  <div class="mb-3 col-md-4">
                          <label class="d-block text-font">Upload Image<sup class="text-danger">*</sup></label>
                              <div class="d-flex">
                                    <input type="file" class="form-control input-font" name="image" id="Image" required accept="image/*">
                              </div>
                  </div>
                  <div class="mb-3 col-md-4">
                          <label class="d-block text-font">Upload Document</label>
                              <div class="d-flex">
                                    <input type="file" class="form-control input-font" name="document" id="" accept="pdf/*">
                              </div>
                  </div>
                  <div class="mb-3 col-md-12">
                          <label class="d-block text-font">Description<sup class="text-danger">*</sup></label>
                          <textarea class="form-control input-font" name="description" id="description" required minlength="5" maxlength="1000"></textarea>
                              <span style="color:red;"  id="err_description"></span>
                  </div>
                  <div class="mb-3 col-md-12">
                       <div class="mentor_submit">
                          <button onclick="submitButton()" type="submit" class="btn btn-primary btn-sm mr-2">Submit</button>
                       </div> 
                  </div> 
             </div> 
            </form>
         </div>
    </div>
  </div>
  
  <script> 
  function submitButton() {
             var title = $("#title").val();
            //  var description= $("#description").val();
             var description = CKEDITOR.instances['description'].getData(); 
             var is_valid = true;
                        console.log(description.length)
             if (title == "") {
                 $("#err_title").text("This value is required");
                 $("#title").focus();
                 is_valid = false;
             
             } else if (!(title.length > 4)) {
                 $("#err_title").text("Please Enter minimum 5 Characters");
                 $("#title").focus();
                 is_valid = false;
             } else {
                 $("#err_title").text("");
             }
             if (description== "") {
                 $("#err_description").text("This value is required");
                 $("#link1").focus();
                 is_valid = false;
             } else if (description.length < 10 ) {
                 $("#err_description").text("Description suould be 5 to 1000 characters");
                 $("#description").focus();
                 is_valid = false;
             } else if(description.length > 1500 ){
                $("#err_description").text("Description suould be 5 to 1000 characters");
                 $("#description").focus();
                 is_valid = false;
             }else {
                 $("#err_description").text("");
             }            

             if (is_valid) { 
                $('#updateform').attr('action','<?php echo base_url().'users/add_btm'?>');                
                 return true;
             } else {
                 return false;
             }
         };
</script>
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
         CKEDITOR.replace( 'description' );
            </script>
