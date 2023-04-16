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
                                <!-- <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Total Marks</label>
                                    <div>
                                        <p><?php //echo $row['total_marks']; 
                                            ?></p>
                                    </div>
                                </div> -->
                                <div class="mb-2 col-md-4">
                                    <label class="d-block text-font">Language of Question</label>
                                    <div>
                                        <p><?php echo $row['type']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="mb-2 col-md-12">
                                    <table id="example" class="hover table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sr.No.</th>
                                                <th>Ques Id</th>
                                                <th>Ques Type</th>
                                                <th>Ques Title</th>
                                                <th>Ques Title Hindi</th>
                                                <th>Number of Options</th>
                                                <th>English Options </th>
                                                <th>Hindi Options</th>
                                                <th>Correct Option No</th>
                                                <!-- <th>Action</th> -->
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
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($r['language'] == 1  || $r['language'] == 3) {
                                                            echo $r['que'];
                                                        } else {
                                                            echo "--";
                                                        }
                                                        ?>
                                                        <?php if ($r['que_type'] == 2 || $r['que_type'] == 3) { ?>
                                                            <br>
                                                            <img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid<?php echo $r['que_bank_id']; ?>/<?php echo $r['image']; ?>">
                                                        <?php } ?>
                                                    </td>

                                                    <td> <?php if ($r['language'] == 2 || $r['language'] == 3) {
                                                                echo $r['que_h'];
                                                            } else {
                                                                echo '--';
                                                            }
                                                            ?></td>

                                                    <td><?php echo $r['no_of_options']; ?></td>


                                                    <?php
                                                    $opt1_e = $opt2_e = $opt3_e = $opt4_e = $opt5_e = "NA";
                                                    $opt1_h = $opt2_h = $opt3_h = $opt4_h = $opt5_h = "NA";
                                                    if ($r['opt1_e'] != "") {
                                                        $opt1_e = $r['opt1_e'];
                                                    }
                                                    if ($r['opt2_e'] != "") {
                                                        $opt2_e = $r['opt2_e'];
                                                    }
                                                    if ($r['opt3_e'] != "") {
                                                        $opt3_e = $r['opt3_e'];
                                                    }
                                                    if ($r['opt4_e'] != "") {
                                                        $opt4_e = $r['opt4_e'];
                                                    }
                                                    if ($r['opt5_e'] != "") {
                                                        $opt5_e = $r['opt5_e'];
                                                    }
                                                    if ($r['opt1_h'] != "") {
                                                        $opt1_h = $r['opt1_h'];
                                                    }
                                                    if ($r['opt2_h'] != "") {
                                                        $opt2_h = $r['opt2_h'];
                                                    }
                                                    if ($r['opt3_h'] != "") {
                                                        $opt3_h = $r['opt3_h'];
                                                    }
                                                    if ($r['opt4_h'] != "") {
                                                        $opt4_h = $r['opt4_h'];
                                                    }
                                                    if ($r['opt5_h'] != "") {
                                                        $opt5_h = $r['opt5_h'];
                                                    }

                                                    ?>
                                                    <td>
                                                        <?php if ($r['language'] == 1 || $r['language'] == 3) {
                                                            echo "1. " . $opt1_e . '<br>2. ' . $opt2_e . '<br>3. ' . $opt3_e . '<br>4. ' . $opt4_e . '<br>5. ' . $opt5_e;
                                                        } else {
                                                            echo "NA";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($r['language'] == 2 || $r['language'] == 3) {
                                                            echo "1. " . $opt1_h . '<br>2. ' . $opt2_h . '<br>3. ' . $opt3_h . '<br>4. ' . $opt4_h . '<br>5. ' . $opt5_h; ?>
                                                        <?php } else {
                                                            echo "NA";
                                                        } ?>
                                                    </td>
                                                    <!-- <td>
                                                        <ul>Hindi Text</ul>
                                                        <img src="http://localhost/BIS/BIS_repo/assets/admin/img/picture.png" alt="#" width="33"></td> -->

                                                    <td><?php echo $r['corr_opt_e']; ?></td>

                                                    <!-- <td class="d-flex border-bottom-0"><a class="btn btn-primary btn-sm mr-2"><i class="fa fa-eye" aria-hidden="true" data-toggle="modal" data-target="#view_data"></i></a></td> -->
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
                                    <button type="button" class="btn btn-primary btn-sm mr-2 changeStatus" data-id="<?php echo $row['que_bank_id']; ?>" data-status="3">Approve</button>
                                    <button type="button" class="btn btn-primary btn-sm mr-2 changeStatus" data-id="<?php echo $row['que_bank_id']; ?>" data-status="4">Reject</button>
                                </div>

                            <?php  } ?>
                            <!-- <?php if ($row['status'] == 3) { ?>
                                <div class="col-md-12 submit_btn p-3">
                                <button type="button" class="btn btn-primary btn-sm mr-2 changeStatus" data-id="<?php echo $row['que_bank_id']; ?>"  data-status="5">Publish</button>
                                </div>
                            <?php } else if ($row['status'] == 5) { ?>
                                <div class="col-md-12 submit_btn p-3">
                                <button type="button" class="btn btn-primary btn-sm mr-2 changeStatus" data-id="<?php echo $row['que_bank_id']; ?>" data-status="6">Unpublish</button>
                                </div>
                            <?php  } ?> -->
                        <?php  } ?>
                    <?php }
                } else { ?>
                    <h6>Details are not availaible</h6>
                <?php  } ?>


            </div>

        </div>
    </div>
</div>
<!-- Modal -->
<!--<div class="modal fade" id="view_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Question</h5>

                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Question ID</label>
                        <div>
                            <p>1234</p>
                        </div>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Question Type</label>
                        <div>
                            <p>Text</p>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="mb-2 col-md-12">
                        <label class="d-block text-font">Question Title</label>
                        <div>
                            <p>Text</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Options 1</label>
                        <div>
                            <p>5</p>
                        </div>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Options 2</label>
                        <div>
                            <p>5</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Options 3</label>
                        <div>
                            <p>5</p>
                        </div>
                    </div>
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Options 4</label>
                        <div>
                            <p>5</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Options 5</label>
                        <div>
                            <p>5</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-2 col-md-4">
                        <label class="d-block text-font">Correct Option No.</label>
                        <div>
                            <p>Text</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="resetbanner()" class="btn btn-primary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>-->
<!-- Modal -->
<script>
    $(document).ready(function() {

        $('#que_bank_view').on('click', '.changeStatus', function(e) {
            e.preventDefault();
            const $root = $(this);
            var id = $root.data('id');
            var status = $root.data('status');
            var allfields = true;
            var reason = "";
            if (status == 4) {
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
            if (allfields) {
                jQuery.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>subadmin/changeStatus',
                    dataType: 'json',
                    data: {
                        "id": id,
                        "status": status,
                        "reason": reason
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