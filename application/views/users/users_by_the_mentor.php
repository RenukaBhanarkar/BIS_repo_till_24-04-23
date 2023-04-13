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
#last-date{
    /* display: block;
    overflow: hidden; */
    /* height: 80px; */
    /* width: 400px;
    text-overflow: ellipsis;
    white-space: nowrap; */

    display: block;
    height: 71px;
  /* width: 330px; */
  overflow: hidden;
  /* white-space: nowrap; */
  text-overflow: ellipsis;
  padding: 0px;
}
.title{
    display: block;
    overflow: hidden;
  /* white-space: nowrap; */
  text-overflow: ellipsis;
  /* width: 331px; */
    height: 25px;
    overflow: hidden;

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
                          <div class="card-body" id="last-date">
                              <!-- <span class="time_left"> -->
                                  <?php echo $list['description'];?>
                              <!-- </span> -->
                          </div>
                          <hr>  
                          <div class="">
                            <!-- <p><?php print_r($list);?></p> -->
                            <span>Posted By..<?php echo $list['user_name']; ?></b></span>
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
            <form action="javascript:;" class="" method="post" id="updateform" enctype="multipart/form-data">
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
                              <div class="">
                                    <input type="file" class="form-control input-font" name="image" id="document2" required accept="image/*">
                                    <span style="color:red;" id="err_image"></span>
                              </div>
                  </div>
                  <div class="mb-3 col-md-4">
                          <label class="d-block text-font">Upload Document</label>
                              <div class="">
                                    <input type="file" class="form-control input-font" name="document" id="upload_pdf" accept="pdf/*">
                                    <span style="color:red;" id="err_doc"></span>
                              </div>
                              
                  </div>
                  <!-- <div class="mb-3 col-md-4">
                          <label class="d-block text-font">Upload Thumbnail for Document</label>
                              <div class="d-flex">
                                    <input type="file" class="form-control input-font" name="thumbnail" id="thumbnail" accept="image/*">
                              </div>
                  </div> -->
                  <div class="mb-3 col-md-12">
                          <label class="d-block text-font">Description<sup class="text-danger">*</sup></label>
                          <textarea class="form-control input-font" name="description" id="description" required minlength="5" maxlength="1000"></textarea>
                              <span style="color:red;"  id="err_description"></span>
                  </div>
                  <div class="mb-3 col-md-12">
                       <div class="mentor_submit">
                          <button onclick="return submitButton()" type="submit" class="btn btn-primary btn-sm mr-2">Submit</button>
                       </div> 
                  </div> 
             </div> 
            </form>
         </div>
    </div>
  </div>


  <div class="modal fade" id="invalidfiletype" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Error</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Only jpg,png,jpeg files accepted.</p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary ok" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="lessSize" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Error</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>File size should be 50KB or more</p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary ok" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="greaterSize" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Error</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>File size should be less than 250KB </p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary ok" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="greaterSize_pdf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Error</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>File size should be greater than 5MB </p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary ok" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="invalidfiletype_pdf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Error</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Only pdf files accepted.</p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary ok" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
  
  <script> 
  function submitButton() {
             var title = $("#title").val();
             var document = $("#document").val();
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
             }else if (title == "") {
                 $("#err_doc").text("This value is required");
                 $("#document").focus();
                 is_valid = false;
             
             }else {
                 $("#err_description").text("");
             }     
             
             



             if ($("#document2").val() != '') {
                   var fileSize = $('#document2')[0].files[0].size;

                   if (fileSize > 256000) {
                       var is_valid = false;
                       $('#greaterSize').modal('show');
                       $("#document2").val();
                       if ($("#imgerror3").next(".validation").length == 0) // only add if not added
                       {
                           var is_valid = false;
                           // alert("Please select file size greater than 500 KB");
                           return false;
                           $("#imgerror3").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size less than 500 KB </div>");
                       }
                       var is_valid = false;
                       if (!focusSet) {
                           $("#document2").focus();
                       }
                   } else if(fileSize < 51200){
                       is_valid = false;
                       $("#document2").val();
                       if ($("#imgerror3").next(".validation").length == 0) 
                       {
                       is_valid = false;
                       $('#lessSize').modal('show');
                       //    alert("Please select file size greater than 20 KB");
                       //    $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size greater than 20 KB </div>");
                       return false;
                       }
                       is_valid = false;
                       if (!focusSet) {
                           $("#document2").focus();
                       }
                   }else{
                       $("#imgerror3").next(".validation").remove(); // remove it
                   }
                   // check type  start 
                   var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
                   var fileName = $("#document2").val();;
                   var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   if ($.inArray(fileNameExt, validExtensions) == -1) {
                       $('#document2').val('');
                       // alert("Invalid file type");
                       $('#invalidfiletype').modal('show');
                       var  is_valid = false;
                       if ($("#imgerror3").next(".validation").length == 0) // only add if not added
                       {
                           $("#err_image").text('Please upload .jpg / .jpeg/.png image ');
                           // $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please upload .jpg / .jpeg/.png image </div>");
                       }
                       allFields = false;
                       if (!focusSet) {
                           $("#document2").focus();
                       }
                   } else {
                       is_valid = true;
                       $("#imgerror3").next(".validation").remove(); // remove it
                   }
               }else{
                   $("#err_image").text('This value is required');
                //    $("#document2").focus();
               }




        //        if (is_valid) {
        //        return true;
        //    } else {
        //        return false;
        //    }








        if ($("#upload_pdf").val() != '') {
                   var fileSize = $('#upload_pdf')[0].files[0].size;

                   if (fileSize > 5242880) {
                       var is_valid = false;
                       $('#greaterSize_pdf').modal('show');
                       $("#upload_pdf").val();
                       if ($("#imgerror3").next(".validation").length == 0) // only add if not added
                       {
                           var is_valid = false;
                           // alert("Please select file size greater than 500 KB");
                           return false;
                           $("#imgerror3").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size less than 500 KB </div>");
                       }
                       var is_valid = false;
                       if (!focusSet) {
                           $("#upload_pdf").focus();
                       }
                   } else if(fileSize < 1024){
                       is_valid = false;
                       $("#upload_pdf").val();
                       if ($("#imgerror3").next(".validation").length == 0) 
                       {
                       is_valid = false;
                       $('#lessSize').modal('show');
                       //    alert("Please select file size greater than 20 KB");
                       //    $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size greater than 20 KB </div>");
                       return false;
                       }
                       is_valid = false;
                       if (!focusSet) {
                           $("#upload_pdf").focus();
                       }
                   }else{
                       $("#imgerror3").next(".validation").remove(); // remove it
                   }
                   // check type  start 
                   var validExtensions = ['pdf']; //array of valid extensions
                   var fileName = $("#upload_pdf").val();;
                   var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                   if ($.inArray(fileNameExt, validExtensions) == -1) {
                       $('#upload_pdf').val('');
                       // alert("Invalid file type");
                       $('#invalidfiletype_pdf').modal('show');
                       var  is_valid = false;
                       if ($("#imgerror3").next(".validation").length == 0) // only add if not added
                       {
                           $("#err_image").text('Please upload .jpg / .jpeg/.png image ');
                           // $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please upload .jpg / .jpeg/.png image </div>");
                       }
                       allFields = false;
                       if (!focusSet) {
                           $("#upload_pdf").focus();
                       }
                   } else {
                       is_valid = true;
                       $("#imgerror3").next(".validation").remove(); // remove it
                   }
               }else{
                //    $("#err_image").text('Please select file');
                //    $("#upload_pdf").focus();
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
