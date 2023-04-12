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
                            <span><i class="fa fa-calendar icons"></i><?php echo date("m-d-Y",strtotime($list['created_on'])); ?></span>
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
                        <form action="<?php echo base_url(); ?>users/add_your_wall" method="post" name="addwall" id="addwall" class="was-validated" enctype="multipart/form-data">
                <h2 class="YourWallForm">Your Wall </h2>
                <div class="bg-light p-3">
                    <!-- <div class="Comment_image">
                        <img src="../assets/images/user_image.png">
                    </div> -->
                    
                    <div class="row">
                        <div class="col-sm-6 mt-3">

                            <input type="text" class="form-control title-height mb-4" name="title" placeholder="Title" required>
                            

                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="file-upload-wrapper" data-text="Select your file">
                                <input type="file" class="file-upload-field" name="image" id="image" value="" accept="image/*" required>
                                <span id="err_image" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group ">
                                <textarea class="form-control  w-100" rows="8" placeholder="Share Your Description......" name="description" id="description" required></textarea>
                                

                                <div class="button-group float-end mt-3">
                                    <button  type="submit" name="submit" class="btn btn-danger">Submit</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>


            </form>

            <ul class="posts">
            </ul>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#image').on('change', function(){
                    console.log("sdfgsdf");
                    var focusSet = false;
                    if ($("#image").val() != '') {
                    var fileSize = $('#image')[0].files[0].size;

                    // if ($("#image").val() != '') {
                    //     alert('please select Image');
                    // }

                    if (fileSize > 509600) {
                        var is_valid = false;
                        allfields = false;
                        $("#image").val('');
                        alert("Please select file size less than 500 KB");
                        if ($("#imgError1").next(".validation").length == 0) // only add if not added
                        {
                            var is_valid = false;
                            alert("Please select file size less than 500 KB");
                            $("#err_image").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size less than 500 KB </div>");
                        }
                        var is_valid = false;
                        if (!focusSet) {
                            $("#image").focus();
                        }
                    } else if(fileSize < 20480){
                        $("#image").val('');
                        is_valid = false;
                        allfields = false;
                        alert("Please select file size greater than 20 KB");
                        if ($("#err_image").next(".validation").length == 0) 
                        {
                        is_valid = false;
                        //    alert("Please select file size greater than 20 KB");
                           $("#err_image").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size greater than 20KB </div>");
                        return false;
                        }
                        is_valid = false;
                       
                    }else{
                        
                        $("#err_image").next(".validation").remove(); // remove it
                        $("#err_image").after("");
                    }
                    // check type  start
                    
                    var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
                    var fileName = $("#image").val();;
                    var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                    if ($.inArray(fileNameExt, validExtensions) == -1) {
                        $('#image').val('');
                        // alert("Invalid file type");
                        $('#invalidfiletype').modal('show');
                        var  is_valid = false;
                        if ($("#imgError1").next(".validation").length == 0) // only add if not added
                        {
                            $("#imgError1").text('Please upload .jpg / .jpeg/.png image ');
                            // $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please upload .jpg / .jpeg/.png image </div>");
                        }
                        allFields = false;
                        if (!focusSet) {
                            $("#image").focus();
                        }
                    } else {
                        is_valid = true;
                        $("#imgError1").next(".validation").remove(); // remove it
                    }
                    
                }else{
                    $("#imgError1").text('Please select file');
                    $("#image").focus();
                    return false;
                }
                if(is_valid){
                    return true;
                }else{
                    return false;
                }
            });
            })
            </script>
        <script>
           
           
    $('#addwall').submit( 'click',function() { 
                    // e.preventDefault();
                    var focusSet = false;
                    var allfields = true;
                    var title = $("#title").val();
                    var description = $("#description").val(); 
                    var image = $("#image").val(); 

                    if ($("#image").val() == '') {
                        alert('please select Image');
                        $("#image").val('');
                        $("#err_image").text("This value is required");
                
                var  is_valid = false;
                       false;
                        allfields = false;
                    }
                   








                    if (title == "" || title== null) {
                        if ($("#title").next(".validation").length == 0) // only add if not added
                        {
                            $("#title").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter Quiz Title </div>");
                        }
                        if (!focusSet) { $("#title").focus(); }
                        allfields = false;
                    } else {
                        allfields =true;
                        $("#title").next(".validation").remove(); // remove it
                    } 

                    if (description == "" || description== null) {
                        // if ($("#description").next(".validation").length == 0) // only add if not added
                        // {
                        //     $("#description_error").show();
                        // }
                        // if (!focusSet) { $("#description").focus(); }
                        allfields = false;
                    } else {
                        allfields =true;
                            $("#description_error").hide();

                    } 

                    if (allfields) { 
                        $('#addwall').submit();
                        return true;
                    } else {
                        return false;
                    }
                    // $('#addwall').submit();
                });
</script>

  
  