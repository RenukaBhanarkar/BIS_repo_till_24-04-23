<div class="container-fluid" id="que_bank_view">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Question Bank View</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top">
                <?php if (!empty($allRecords)) {
                    foreach ($allRecords as $row) { ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Question Bank Title</label>
                                    <div>
                                        <p><?php echo $row['title']; ?></p>
                                    </div>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Total Number of Question</label>
                                    <div>
                                        <p><?php echo $row['no_of_ques']; ?></p>
                                    </div>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Total Marks</label>
                                    <div>
                                        <p><?php echo $row['total_marks']; ?></p>
                                    </div>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Language of Question</label>
                                    <div>
                                        <p><?php echo $row['language']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="mb-2 col-md-12">
                                    <table id="example" class="hover table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Question Id</th>
                                                <th>Question Type</th>
                                                <th>Question Title</th>
                                                <!-- <th>Image</th> -->
                                                <th>Number of Options</th>
                                                <th>Options</th>
                                                <th>Correct Option No</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($row['queList'] as $r) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $r['que_id']; ?></td>
                                                    <td><?php if ($r['que_type'] == 1) {
                                                            echo "Text";
                                                        } else if ($r['que_type'] == 2) {
                                                            echo "Image";
                                                        } else {
                                                            echo "Text and Image";
                                                        } ?></td>
                                                    <td><?php echo $r['que']; ?></td>

                                                    <td><?php echo $r['no_of_options']; ?></td>
                                                    <td>
                                                    <?php if ($r['opt1_e'] != "") { 
                                                        echo "1. ".$r['opt1_e'] . " ";
                                                       }   if ($r['opt2_e'] != "") { 
                                                        echo "2. ".$r['opt2_e'] . " ";
                                                       } if ($r['opt3_e'] != "") { 
                                                        echo "3. ".$r['opt3_e'] . " ";
                                                       }  if ($r['opt4_e'] != "") { 
                                                        echo "4. ".$r['opt4_e'] . " ";
                                                       }  if ($r['opt5_e'] != "") { 
                                                        echo "5. ".$r['opt5_e'] . " ";
                                                       }
                                                        ?>
                                                       
                                                    </td>
                                                    <td><?php echo $r['corr_opt_e']; ?></td>
                                                    <!-- td><img src="/BIS_repo/assets/admin/img/bis_logo.png" width="36"></td> -->

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php if (encryptids("D", $_SESSION['admin_type']) == 2) { ?>
                            <?php if ($row['status'] == 2) { ?>
                                <div class="mb-2 col-md-12">
                                    <label class="d-block text-font">Rejection Reason</label>
                                    <textarea class="form-control" id="reason" name="reason" rows="5"></textarea>
                                    <span class="err_reason"> </span>
                                </div>
                                <div class="col-md-12 submit_btn p-3">
                                <button type="button" class="btn btn-primary btn-sm mr-2 changeStatus" data-id="<?php echo $row['que_bank_id']; ?>"  data-status="3">Approve</button>
                                <button type="button" class="btn btn-primary btn-sm mr-2 changeStatus" data-id="<?php echo $row['que_bank_id']; ?>"  data-status="4">Reject</button>
                                    </div>
                               
                            <?php  } ?>
                            <!-- <?php if (encryptids("D", $_SESSION['admin_type']) == 3) { ?>
                            <?php if ($row['status'] == 3) { ?>
                                <div class="col-md-12 submit_btn p-3">
                                <button type="button" class="btn btn-primary btn-sm mr-2 changeStatus" data-id="<?php echo $row['que_bank_id']; ?>"  data-status="5">Publish</button>
                                </div>
                            <?php } else if ($row['status'] == 5) { ?>
                                <div class="col-md-12 submit_btn p-3">
                                <button type="button" class="btn btn-primary btn-sm mr-2 changeStatus" data-id="<?php echo $row['que_bank_id']; ?>" data-status="6">Unpublish</button>
                                </div>
                            <?php  } } ?>  -->
                       <?php  } ?>
                    <?php }
                } else { ?>
                    <h6>Details are not availaible</h6>
                <?php  } ?>


            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
       
        $('#que_bank_view').on('click','.changeStatus', function(e) {
            e.preventDefault();
            const $root = $(this);
            var id = $root.data('id');
            var status = $root.data('status');
            var allfields = true;
            var reason ="";
            if (status == 4){
                var reason = $("#reason").val();                       
                  
                    if (reason == "") {
                        if ($("#reason").next(".validation").length == 0) // only add if not added
                        {
                            $("#reason").after("<div class='validation' style='color:red;margin-bottom:15px;'>Please enter rejection reason</div>");
                        }
                        if (!focusSet) {
                            $("#reason").focus();
                        }
                        allfields = false;
                    } else {
                        $("#reason").next(".validation").remove(); // remove it
                    }                        
            }
            if(allfields){
                jQuery.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>subadmin/changeStatus',
                dataType: 'json',
                data: {
                    "id": id,
                    "status": status,
                    "reason":reason
                },
                success: function(res) {
                    if (res.status == 0) {
                        alert(res.message);
                    } else {
                        alert(res.message);
                        window.location.replace("<?php echo base_url(); ?>admin/questionBankList");
                    }
                },
                error: function(xhr, status, error) {
                    //toastr.error('Failed to add '+xData.name+' in wishlist.');
                    console.log(error);
                }
            });

            }  
        });
    });
</script>
