<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quiz View</h1>

    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card border-top">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Quiz ID</label>
                            <div>

                                <p><?= $quizdata['quiz_id']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Quiz Title</label>
                            <div>
                                <p><?= $quizdata['title']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Quiz Start Date</label>
                            <div>
                                
                                <p><?= date("d-m-Y", strtotime($quizdata['start_date']));?></p>
                                 
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Quiz end Date</label>
                            <div>
                                <p><?= date("d-m-Y", strtotime($quizdata['end_date']));?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Start Time</label>
                            <div>
                                <p><?= $quizdata['start_time']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">End Time</label>
                            <div>
                                <p><?= $quizdata['end_time']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Total Question in Quiz</label>
                            <div>
                                <p><?= $quizdata['total_question']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Total Question in QB<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $quizdata['qbquestion']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Total Marks<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $quizdata['total_mark']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Level of Quiz<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $quizdata['level']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Language of Quiz<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $quizdata['language']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Upload Quiz Banner<sup class="text-danger">*</sup></label>
                            <div>
                                <p><img src="../../<?= $quizdata['banner_img']; ?>" style="width:200px;"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">First Prize</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4 ">
                            <label class="d-block text-font">Number of Prizes<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $firstprize['no_of_prize']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Prize Details<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $firstprize['prize_details']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Image<sup class="text-danger">*</sup></label>
                            <div>
                                <p><img src="../../<?= $firstprize['prize_img']; ?>" style="width:200px;"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">2<sup>nd</sup>Prizes</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Number of Prizes<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $secondprize['no_of_prize']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Prize Details<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $secondprize['prize_details']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Image<sup class="text-danger">*</sup></label>
                            <div>
                                <p><img src="../../<?= $secondprize['prize_img']; ?>" style="width:200px;"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">3<sup>nd</sup>Prizes</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Number of Prizes<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $thirdprize['no_of_prize']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Prize Details<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $thirdprize['prize_details']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Image<sup class="text-danger">*</sup></label>
                            <div>
                                <p><img src="../../<?= $thirdprize['prize_img']; ?>" style="width:200px;"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">Consolation Prizes</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Number of Prizes<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $fourthprize['no_of_prize']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Prize Details<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $fourthprize['prize_details']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">Available for</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Select Option<sup class="text-danger">*</sup></label>
                            <div>
                                <p><?= $quizdata['availability']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 prizes-section">
                            <h4 class="m-2">Load Question</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Question Bank Id<sup class="text-danger">*</sup></label>
                            <div>
                                <p id="qbid"></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Title<sup class="text-danger">*</sup></label>
                            <div>
                                <p id="qbtitle"></p>
                            </div>
                        </div>
                        <div class="mb-2 col-md-4">
                            <label class="d-block text-font">Number of Question<sup class="text-danger">*</sup></label>
                            <div>
                                <p id="qbquestion"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mb-2 col-md-12">
                            <table id="example" class="hover table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Question No.</th>
                                        <th>Question</th>
                                        <th>Option 1</th>
                                        <th>Option 1 in Hindi</th>
                                        <th>Option 2</th>
                                        <th>Option 2 in Hindi</th>
                                        <th>Option 3</th>
                                        <th>Option 2 in Hindi</th>
                                        <th>Option 4</th>
                                        <th>Option 4 in Hindi</th>
                                        <th>Option 5</th>
                                        <th>Correct</th>

                                    </tr>
                                </thead>
                                <tbody id="que_body">
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 submit_btn p-3">
                    <a class="btn btn-primary btn-sm text-white" onclick="location.href='<?= base_url(); ?>Quiz/quiz_list'">Back</a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="cancelForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to cancel?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
            </div>
        </div>
        <?php if (encryptids("D", $_SESSION['admin_type']) == 2) { ?>
            <div class="col-12 mt-3">
                <form name="quiz_reg" action="<?= base_url() . 'Admin/updateQuizStatus/' . $quizdata['id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="row" id="remarkdiv">
                        <div class="mb-2 col-md-8">
                            <label class="d-block text-font" text-font>Remarks<sup class="text-danger">*</sup></label>
                            <textarea class="form-control input-font" placeholder="Enter Remark" name="remark" id="remark"><?= set_value('terms_conditions'); ?></textarea>
                            <span class="error_text"><?= form_error('terms_conditions'); ?></span>
                            <input type="hidden" name="status_id" value="3" id="status_id">
                        </div>
                    </div>
            </div>
            <?php if( $quizdata['status']==2){?>
            <div class="col-md-12 submit_btn p-3">
                <!-- <a id="approve" class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#approval">Approval</a> -->
                <input type="submit" name="Approval" value="Approve" class="btn btn-success btn-sm text-white" id="approve">
                <input type="submit" name="Approval" value="Submit" class="btn btn-success btn-sm text-white" id="submit">
                <!-- <a class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#approval" id="submit">Submit</a> -->
                <a class="btn btn-primary btn-sm text-white" id="reject" onclick="rejectFun()">Reject</a>
            </div>
            <?php } ?>
            </form>


<?php } ?>
</div>
</div>


</div>


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<script type="text/javascript">
     $(document).ready(function () 
    {   
        var id="<?= $quizdata['que_bank_id'];?>"
        getQuestionListByQueBankId(id);
        getQBDetails(id);
        $("#submit").hide();
        $("#remarkdiv").hide();
    });
    function rejectFun()
     {
        $("#submit").show();
        $("#remarkdiv").show();
        $("#approve").hide();
        $("#reject").hide();
        $("#status_id").val(4);

    }
</script>

<script type="text/javascript">
    function getQuestionListByQueBankId(id) {
        $.post("<?= base_url(); ?>subadmin/getQuestionListByQueBankId/", {
            que_bank_id: id
        }, function(result) {
            if (result.status == 0) {
                $('.errorbox').show().text("Error,Please try again.");
            } else {

                res = JSON.parse(result);
                //console.log(res.data)
                data = res.data;

                var row = '';
                j = 0
                for (i in data) {
                    j++;

                    row += '<tr id="row' + data[i].que_id + '">' +
                        '<td>' + j + '</td>' +
                        '<td>' + data[i].que + '</td>' +
                        '<td>' + data[i].opt1_e + '</td>' +
                        '<td>' + data[i].opt2_e + '</td>' +
                        '<td>' + data[i].opt3_e + '</td>' +
                        '<td>' + data[i].opt4_e + '</td>' +
                        '<td>' + data[i].opt5_e + '</td>' +
                        '<td>' + data[i].corr_opt_e + '</td></tr>';
                }

                $("#que_body").html(row);
            }
        });

    }

    function getQBDetails(id) {
        $.ajax({

            url: "<?= base_url(); ?>Quiz/getQbdata/" + id,
            type: "JSON",
            method: "get",
            success: function(result) {
                var res = JSON.parse(result);
                console.log(res)
                $("#qbid").text(res.result.que_bank_id);
                $("#qbtitle").text(res.result.title);
                $("#qbquestion").text(res.result.no_of_ques);
                getQuestionListByQueBankId(id)
            }
        });
        // body...
    }
</script>