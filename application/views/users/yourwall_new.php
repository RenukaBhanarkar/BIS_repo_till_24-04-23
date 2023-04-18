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

                            <input type="text" class="form-control title-height mb-4" name="title" id="title" placeholder="Title" >
                            

                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="file-upload-wrapper" data-text="">
                                <input type="file" class="file-upload-field" name="image" id="image" value="" accept="image/*" >
                                <span id="err_image" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group ">
                                <textarea class="form-control  w-100" rows="8" placeholder="Share Your Description......" name="description" id="description" ></textarea>
                                

                                <div class="button-group float-end mt-3">
                                    <button onclick="return submitButton()" type="submit" name="submit" class="btn btn-danger submit">Submit</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>


            </form>

            <ul class="posts">
            </ul>
        </div>

        <!-- <div class="modal fade" id="invalidfiletype" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Warning!</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Only jpg,png,jpeg files accepted.</p>
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button> 
                    <button type="button" class="btn btn-primary ok" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div> -->
    <div class="modal fade" id="submit_alert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Warning!</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to submit ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="submit" onclick="submit1()" class="btn btn-primary ok" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="lessSize" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Warning!</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>File size shoud be 20KB or more</p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button> -->
                    <button type="button" class="btn btn-primary ok" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="greaterSize" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Warning!</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>File size shoud be less than 250KB </p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button> -->
                    <button type="button" class="btn btn-primary ok" data-bs-dismiss="modal">Ok</button>
                </div>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script>
            function submit1(){
                // event.preventDefault();
                // return true;
                 $('#addwall').submit();
            }
            $(document).ready(function(){

                $('#addwall').removeClass('was-validated');


                $('#image').on('change', function(){
                    $("#title").attr('required',true);
                    $('#addwall').addClass('was-validated');
                    console.log("sdfgsdf");
                    var focusSet = false;
                    var is_valid = true;
                    if ($("#image").val() != '') {
                    var fileSize = $('#image')[0].files[0].size;

                    // if ($("#image").val() != '') {
                    //     alert('please select Image');
                    // }

                    if (fileSize > 509600) {
                         is_valid = false;
                        allfields = false;
                        $("#image").val('');
                        // alert("Please select file size less than 500 KB");
                        $('#greaterSize').modal('show');
                        // if ($("#imgError1").next(".validation").length == 0) // only add if not added
                        // {
                        //     var is_valid = false;
                        //     // alert("Please select file size less than 500 KB");
                        //     $("#err_image").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size less than 500 KB </div>");
                        // }
                        //  is_valid = false;
                        if (!focusSet) {
                            $("#image").focus();
                        }
                        return false;
                    } else if(fileSize < 20480){
                        $("#image").val('');
                        is_valid = false;
                        allfields = false;
                        // $('#lessSize').modal('show');
                        // // alert("Please select file size greater than 20 KB");
                        // if ($("#err_image").next(".validation").length == 0) 
                        // {
                        // is_valid = false;
                        // //    alert("Please select file size greater than 20 KB");
                        // //    $("#err_image").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size greater than 20KB </div>");
                        // return false;
                        // }
                        // is_valid = false;
                       
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
                          is_valid = false;
                        // if ($("#imgError1").next(".validation").length == 0) // only add if not added
                        // {
                        //     // $("#imgError1").text('Please upload .jpg / .jpeg/.png image ');
                        //     // $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please upload .jpg / .jpeg/.png image </div>");
                        // }
                        allFields = false;
                        // if (!focusSet) {
                        //     $("#image").focus();
                        // }
                    } else {
                        // is_valid = true;
                        $("#imgError1").next(".validation").remove(); // remove it
                    }
                    
                }else{
                    $("#imgError1").text('This value is required');
                    $("#image").focus();
                    return false;
                }
                if(is_valid){
                    return true;
                }else{
                    // alert('is_valid');
                    return false;
                }
            });
            })
            </script>
        <script>
           
           
    // $('#addwall').submit( 'click',function(e) {
        // $('.submit').on( 'click',function(e) {
            function submitButton() {
    // event.preventDefault();
           var is_valid = true;
                    // e.preventDefault();
                    $('#addwall').addClass('was-validated');
                    var focusSet = false;
                    var allfields = true;
                    var title = $("#title").val();
                    var description = $("#description").val(); 
                    var image = $("#image").val(); 

                    if ($("#image").val() == '') {
                        // alert('please select Image');
                        $("#image").val('');
                        $("#image").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please upload .jpg / .jpeg/.png image </div>");
                        $("#err_image").text("This value is required");                
                is_valid = false;
                allfields = false;
                    }else{
                       
                    }
                   








                    if (title == "" || title== null) {
                        if ($("#title").next(".validation").length == 0) // only add if not added
                        {
                            $('#title').attr('required',true);
                            $("#title").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required </div>");
                        }
                        if (!focusSet) { $("#title").focus(); }
                        allfields = false;
                    } else {
                        // allfields =true;
                        // is_valid = true;
                        $("#title").next(".validation").remove(); // remove it
                    } 

                    if (description == "" || description== null) {
                        if ($("#description").next(".validation").length == 0) // only add if not added
                        {
                            $('#description').attr('required',true);
                            $("#description").after("<div class='validation' style='color:red;margin-bottom:15px;'>This value is required </div>");
                        }
                        if (!focusSet) { $("#description").focus(); }
                        allfields = false;
                    } else {
                        // is_valid = true;
                        // allfields =true;
                            $("#description_error").hide();

                    } 

                //     if ($("#image").val() != '') {
                //     var fileSize = $('#image')[0].files[0].size;
                //     if (fileSize > 509600) {
                //         var is_valid = false;
                //         allfields = false;
                //         $("#image").val('');
                //         // alert("Please select file size less than 500 KB");
                //         $('#greaterSize').modal('show');
                //         if ($("#imgError1").next(".validation").length == 0) // only add if not added
                //         {
                //             var is_valid = false;
                //             // alert("Please select file size less than 500 KB");
                //             $("#err_image").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size less than 500 KB </div>");
                //         }
                //         var is_valid = false;
                //         if (!focusSet) {
                //             $("#image").focus();
                //         }
                //         return false;
                //     } else if(fileSize < 20480){
                //         $("#image").val('');
                //         is_valid = false;
                //         allfields = false;
                //         $('#lessSize').alert('show');
                //         // alert("Please select file size greater than 20 KB");
                //         if ($("#err_image").next(".validation").length == 0) 
                //         {
                //         is_valid = false;
                //         //    alert("Please select file size greater than 20 KB");
                //            $("#err_image").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please select file size greater than 20KB </div>");
                //         return false;
                //         }
                //         is_valid = false;
                       
                //     }else{
                        
                //         $("#err_image").next(".validation").remove(); // remove it
                //         $("#err_image").after("");
                //     }
                //     // check type  start
                    
                //     var validExtensions = ['jpg', 'jpeg', 'png']; //array of valid extensions
                //     var fileName = $("#image").val();;
                //     var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                //     if ($.inArray(fileNameExt, validExtensions) == -1) {
                //         $('#image').val('');
                        
                //         // alert("Invalid file type");
                //         $('#invalidfiletype').modal('show');
                //         var  is_valid = false;
                //         if ($("#imgError1").next(".validation").length == 0) // only add if not added
                //         {
                //             $("#imgError1").text('Please upload .jpg / .jpeg/.png image ');
                //             // $("#imgError1").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please upload .jpg / .jpeg/.png image </div>");
                //         }
                //         allFields = false;
                //         if (!focusSet) {
                //             $("#image").focus();
                //         }
                //     } else {
                //         is_valid = true;
                //         $("#imgError1").next(".validation").remove(); // remove it
                //     }
                    
                // }else{
                //     $("#imgError1").text('This value is required');
                //     $("#image").focus();
                //     return false;
                // }





// alert(allfields);
//                 if(is_valid){
//                     // return true;
// alert('not valid');
                    if (allfields) { 
                        // $('#addwall').submit();
                        // $('#submit_alert').modal('show');
                        Swal.fire({
                            title: 'Do you want to Submit?',
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: 'Submit',
                            denyButtonText: `Cancle`,
                            }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                Swal.fire('Saved!', '', 'success')
                                // return true;
                                $('#addwall').submit();
                                return true
                            } else if (result.isDenied) {
                                Swal.fire('Changes are not saved', '', 'info')
                            }
                            })
                        // return true;
                    } else {
                        return false;
                    }
                // }else{
                //     return false;
                // }

// function submit(e){
//     e.preventDefault();
//     $('#addwall').submit();
// }
// $('.ok').on('click',function(e){
//     e.preventDefault();
//     $('#addwall').submit();
// });
                







                    // if (allfields) { 
                    //     $('#addwall').submit();
                    //     return true;
                    // } else {
                    //     return false;
                    // }


                    // $('#addwall').submit();
                // });
                    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  