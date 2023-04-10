 <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">In Conversation with Expert</h1>
    </div>
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top">
                <form name="conversation_form" id="conversation_form" action="<?php echo base_url().'Standardsmaking/conversation_form'?>" method="post"enctype="multipart/form-data">

                     
                <div class="card-body">
                    <div class="row">
                        <div class="mb-2 col-md-8">
                            <label class="d-block text-font">Title of Video<sup class="text-danger">*</sup>
                            </label>
                            <input type="text" class="form-control input-font" name="title" id="title" placeholder="Enter Title of Video">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label class="d-block text-font" text-font>About Video (Description)<sup class="text-danger">*</sup></label>
                            <textarea class="form-control input-font" placeholder="Enter About Video (Description)" name="description" id="description"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block">Upload Thumbnail<sup class="text-danger">*</sup></label>
                            <div class="d-flex"> 
                                <input type="file" id="video_thumbnail" name="video_thumbnail" class="form-control-file" onchange="loadFileThumbnail(event)">
                                <span class="error_text"></span> 
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalImg">Preview </button>
                            </div>
                        </div>
                        <div class="modal fade"id="exampleModalImg"tabindex="-1"aria-labelledby="exampleModalLabelImg"aria-hidden="true">
                            <div class="modal-dialog" style="max-width:700px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabelImg">Upload Thumbnail</h5>
                                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <img id="outputThumbnail"width="100%"/>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"  onclick="resetimg()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
                                        <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="mb-2 col-md-4">
                            <label class="d-block">Upload Video<sup class="text-danger">*</sup></label>
                            <div class="d-flex">
                                <input type="file" id="video" name="video" class="form-control-file">
                                <span class="error_text"></span>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"> Preview  </button>
                            </div>
                        </div> 
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"aria-hidden="true">
                            <div class="modal-dialog" style="max-width:700px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Upload Video</h5>
                                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body"> 

                                        <video width="100%" height="100%" controls>
                                        <source id="outputvideo" type="video/mp4">
                                        <source id="" type="video/ogg">
                                        </video>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"  onclick="resetvideo()" class="btn btn-secondary" data-bs-dismiss="modal">ReSet</button>
                                        <button type="button" class="btn btn-primary"data-bs-dismiss="modal">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-12 submit_btn p-3">
                        <a class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#submitForm">Submit</a>
                        <input type="reset" name="Reset" class="btn btn-warning btn-sm text-white">
                    </div> 
                   <!-- Modal -->
                   <div class="modal fade" id="submitForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Submit Form</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to Submit?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" name="Submit" class="btn btn-success btn-sm text-white" id="btnsubmit" > 
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        </div>
    </div>

<script type="text/javascript">
var loadFileThumbnail = function(event) 
    {
        $("#outputThumbnail").show();
        var outputThumbnail = document.getElementById('outputThumbnail');
        outputThumbnail.src = URL.createObjectURL(event.target.files[0]);
        outputThumbnail.onload = function()
        {
            URL.revokeObjectURL(outputThumbnail.src);
        }
    };
    function resetimg()
    {
        $("#video_thumbnail").val(''); 
        $("#outputThumbnail").hide(); 
    }


    var loadFilevideo = function(event) 
    {
        $("#outputvideo").show();
        var outputvideo = document.getElementById('outputvideo');
        outputvideo.src = URL.createObjectURL(event.target.files[0]);
        outputvideo.onload = function()
        {
            URL.revokeObjectURL(outputvideo.src);
        }
    };
    function resetvideo()
    {
        $("#video").val(''); 
        $("#outputvideo").hide(); 
    }
        </script>

        <script type="text/javascript">
    $('#conversation_form').submit(function(e) { 
                    e.preventDefault();
                    var focusSet = false;
                    var allfields = true;
                    var title = $("#title").val(); 

                    if (title == "" || title== null) {
                        if ($("#title").next(".validation").length == 0) // only add if not added
                        {
                            $("#title").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter Quiz Title </div>");
                        }
                        if (!focusSet) { $("#title").focus(); }
                        allfields = false;
                    } else {
                        $("#title").next(".validation").remove(); // remove it
                    } 
                    var description = $("#description").val();  

                    if (description == "" || description== null) {
                        if ($("#description").next(".validation").length == 0) // only add if not added
                        {
                            $("#description").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Enter description </div>");
                        }
                        if (!focusSet) { $("#description").focus(); }
                        allfields = false;
                    } else {
                        $("#description").next(".validation").remove(); // remove it
                    }

                    var video_thumbnail = $("#video_thumbnail").val();
                    if (video_thumbnail == "" || video_thumbnail== null) {
                        if ($("#video_thumbnail").next(".validation").length == 0) // only add if not added
                        {
                            $("#video_thumbnail").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Select Thumbnail Image</div>");
                        }
                        if (!focusSet) { $("#video_thumbnail").focus(); }
                        allfields = false;
                    } else {
                        $("#video_thumbnail").next(".validation").remove(); // remove it
                    }

                     var video = $("#video").val();
                    if (video == "" || video== null) {
                        if ($("#video").next(".validation").length == 0) // only add if not added
                        {
                            $("#video").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please Select Video</div>");
                        }
                        if (!focusSet) { $("#video").focus(); }
                        allfields = false;
                    } else {
                        $("#video").next(".validation").remove(); // remove it
                    }
                    if (allfields) { 
                        $('#conversation_form').submit();
                    } else {
                        return false;
                    }
                });</script>