<!doctype html>
<?php
date_default_timezone_set("Asia/Calcutta");
$quiz_start_time = $_SESSION['quiz_start_time'] = date('h:i:s');
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Bureau of Indian standard">
    <meta name="description" content="Bureau of Indian standard">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" />
    <!-- Bootstrap CSS -->
    <title>Bureau of Indian standard | Quiz Start</title>
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="<?= base_url(); ?>" rel="stylesheet">
    <!-- CSS File -->
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/bis_logo.png" type="image/x-icon">
    <link href="<?= base_url(); ?>assets/css/quiz_start.css" rel="stylesheet" />

</head>
<style>
    h3.quiz_title_heading {
        margin-left: 12px;
        padding: 14px 0px 0px 0px;
        font-weight: 600;
        color: crimson;
    }
</style>

<body>
   
    <section>
        <div class="">
            <div class="Quiz_section ">
                <div class="quiz-left-side-main shadow">
                    <h3 class="quiz_title_heading"><?= $quizdata['title'] ?></h3>
                    <form id="regForm" action="<?= base_url() . 'Users/quiz_submit' ?>" method="post" enctype="multipart/form-data">
                    <?php $setLang =$_SESSION["quiz_lang_id"]; ;?>
                        <div class="inner-section " id="qustions-tab">
                           <?php  echo  $user_id; ?>
                            <input type="hidden" value="<?= $quiz_start_time; ?>" name="start_time">
                            <input type="hidden" value="<?= $user_id; ?>" name="user_id">
                            <input type="hidden" value="<?= $quizdata['id'] ?>" name="quiz_id">


                            <?php $i = 1; ?>
                            <h3>Question <?= $i; ?> to <?= count($que_details); ?></h3>
                            <?php
                            $k = 1;
                            foreach ($que_details as $key => $details) { 
                               
                                ?>
                                <div class="tab">
                                    <div class="quiz-ans-section">
                                    <?php if ($quizdata['language_id'] == 1 || $setLang == 1) { ?>
                                        <p class="qustion-ans"> <?= $i++ . " . " .  $details['que'] ?> </p>        
                                        <?php } else{ ?> 
                                         <p class="qustion-ans"> <?= $i++ . " . " .  $details['que_h'] ?> </p>
                                         <?php }   ?>
                                         <?php if ($details['que_type'] == 2 || $details['que_type'] == 3) { ?>
                                                           
                                                            <img width="100" src="<?php echo base_url(); ?>uploads/que_img/bankid<?php echo $details['que_bank_id']; ?>/<?php echo $details['image']; ?>">
                                                        <?php }  ?>
                                        <div class="quiz-option">
                                            <input type="hidden" value="<?= $details['que_id'] ?>" name="que_id[]">
                                            <input type="hidden" value="<?= $details['corr_opt_e'] ?>" name="corr_opt[]">
                                            <?php
                                            if ($details['option1_image'] != "") {
                                                $op1_img = $details['option1_image'];
                                                $opt1_e = '<img width="100" src=' . base_url() . 'uploads/que_img/bankid' . $details['que_bank_id'] . '/' . $op1_img . '>';
                                            } else {
                                                if ($details['opt1_e'] != "") {
                                                    $opt1_e = $details['opt1_e'];
                                                } else {
                                                    $opt1_e = "";
                                                }
                                            }
                                            if ($details['option2_image'] != "") {
                                                $op2_img = $details['option2_image'];
                                                $opt2_e = '<img width="100" src=' . base_url() . 'uploads/que_img/bankid' . $details['que_bank_id'] . '/' . $op2_img . '>';
                                            } else {
                                                if ($details['opt2_e'] != "") {
                                                    $opt2_e = $details['opt2_e'];
                                                } else {
                                                    $opt2_e = "";
                                                }
                                            }
                                            if ($details['option3_image'] != "") {
                                                $op3_img = $details['option3_image'];
                                                $opt3_e = '<img width="100" src=' . base_url() . 'uploads/que_img/bankid' . $details['que_bank_id'] . '/' . $op3_img . '>';
                                            } else {
                                                if ($details['opt3_e'] != "") {
                                                    $opt3_e = $details['opt3_e'];
                                                } else {
                                                    $opt3_e = "";
                                                }
                                            }
                                            if ($details['option4_image'] != "") {
                                                $op4_img = $details['option4_image'];
                                                $opt4_e = '<img width="100" src=' . base_url() . 'uploads/que_img/bankid' . $details['que_bank_id'] . '/' . $op4_img . '>';
                                            } else {

                                                if ($details['opt4_e'] != "") {
                                                    $opt4_e = $details['opt4_e'];
                                                } else {
                                                    $opt4_e = "";
                                                }
                                            }
                                            if ($details['option5_image'] != "") {
                                                $op5_img = $details['option5_image'];
                                                $opt5_e = '<img width="100" src=' . base_url() . 'uploads/que_img/bankid' . $details['que_bank_id'] . '/' . $op5_img . '>';
                                            } else {

                                                if ($details['opt5_e'] != "") {
                                                    $opt5_e = $details['opt5_e'];
                                                } else {
                                                    $opt5_e = "";
                                                }
                                            }
                                            if ($details['option1_h_image'] != "") {
                                                $op1_h_img = $details['option1_h_image'];
                                                $opt1_h = '<img width="100" src=' . base_url() . 'uploads/que_img/bankid' . $details['que_bank_id'] . '/' . $op1_h_img . '>';
                                            } else {

                                                if ($details['opt1_h'] != "") {
                                                    $opt1_h = $details['opt1_h'];
                                                } else {
                                                    $opt1_h = "";
                                                }
                                            }
                                            if ($details['option2_h_image'] != "") {
                                                $op2_h_img = $details['option2_h_image'];
                                                $opt2_h = '<img width="100" src=' . base_url() . 'uploads/que_img/bankid' . $details['que_bank_id'] . '/' . $op2_h_img . '>';
                                            } else {

                                                if ($details['opt2_h'] != "") {
                                                    $opt2_h = $details['opt2_h'];
                                                } else {
                                                    $opt2_h = "";
                                                }
                                            }
                                            if ($details['option3_h_image'] != "") {
                                                $op3_h_img = $details['option3_h_image'];
                                                $opt3_h = '<img width="100" src=' . base_url() . 'uploads/que_img/bankid' . $details['que_bank_id'] . '/' . $op3_h_img . '>';
                                            } else {

                                                if ($details['opt3_h'] != "") {
                                                    $opt3_h = $details['opt3_h'];
                                                } else {
                                                    $opt3_h = "";
                                                }
                                            }
                                            if ($details['option4_h_image'] != "") {
                                                $op4_h_img = $details['option4_h_image'];
                                                $opt4_h = '<img width="100" src=' . base_url() . 'uploads/que_img/bankid' . $details['que_bank_id'] . '/' . $op4_h_img . '>';
                                            } else {

                                                if ($details['opt4_e'] != "") {
                                                    $opt4_h = $details['opt4_e'];
                                                } else {
                                                    $opt4_h = "";
                                                }
                                            }
                                            if ($details['option5_h_image'] != "") {
                                                $op5_h_img = $details['option5_h_image'];
                                                $opt5_h = '<img width="100" src=' . base_url() . 'uploads/que_img/bankid' . $details['que_bank_id'] . '/' . $op5_h_img . '>';
                                            } else {

                                                if ($details['opt5_h'] != "") {
                                                    $opt5_h = $details['opt5_h'];
                                                } else {
                                                    $opt5_h = "";
                                                }
                                            }
                                            ?>
                                            <ul>
                                                <?php if (
                                                    $details['no_of_options'] == 2 || $details['no_of_options'] == 3 ||
                                                    $details['no_of_options'] == 4  ||  $details['no_of_options'] == 5
                                                ) { ?>
                                                    <?php if ($quizdata['language_id'] == 1 || $setLang == 1) { ?>
                                                        <li> <input type="radio" class="quiz-radio-btn op<?= $details['que_id'] ?>" name="option<?= $details['que_id'] ?><?= $k; ?>" value="1">
                                                            <?= $opt1_e ?>
                                                        </li>
                                                        <li> <input type="radio" class="quiz-radio-btn op<?= $details['que_id'] ?>" name="option<?= $details['que_id'] ?><?= $k; ?>" value="2">
                                                            <?= $opt2_e  ?>
                                                        </li>
                                                    <?php } else { ?>
                                                        <li> <input type="radio" class="quiz-radio-btn op<?= $details['que_id'] ?>" name="option<?= $details['que_id'] ?><?= $k; ?>" value="1">
                                                            <?= $opt1_h ?>
                                                        </li>
                                                        <li> <input type="radio" class="quiz-radio-btn op<?= $details['que_id'] ?>" name="option<?= $details['que_id'] ?><?= $k; ?>" value="2">
                                                            <?= $opt2_h  ?>
                                                        </li>
                                                    <?php } ?>
                                                <?php } ?>

                                                <?php if ($details['no_of_options'] == 3 || $details['no_of_options'] == 4  ||  $details['no_of_options'] == 5) { ?>
                                                    <?php if ($quizdata['language_id'] == 1 || $setLang == 1) { ?>

                                                        <li> <input type="radio" class="quiz-radio-btn op<?= $details['que_id'] ?>" name="option<?= $details['que_id'] ?><?= $k; ?>" value="3">
                                                            <?= $opt3_e ?></li>


                                                    <?php } else { ?>
                                                        <li> <input type="radio" class="quiz-radio-btn op<?= $details['que_id'] ?>" name="option<?= $details['que_id'] ?><?= $k; ?>" value="3">
                                                            <?= $opt3_h ?></li>

                                                    <?php } ?>
                                                <?php } ?>

                                                <?php if ($details['no_of_options'] == 4  ||  $details['no_of_options'] == 5) { ?>
                                                    <?php if ($quizdata['language_id'] == 1 || $setLang == 1) { ?>

                                                        <li> <input type="radio" class="quiz-radio-btn op<?= $details['que_id'] ?>" name="option<?= $details['que_id'] ?><?= $k; ?>" value="4"><?= $opt4_e  ?></li>
                                                    <?php } else { ?>
                                                        <li> <input type="radio" class="quiz-radio-btn op<?= $details['que_id'] ?>" name="option<?= $details['que_id'] ?><?= $k; ?>" value="4"><?= $opt4_h ?></li>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php if ($details['no_of_options'] == 5) { ?>
                                                    <?php if ($quizdata['language_id'] == 1 || $setLang == 1) { ?>
                                                        <li> <input type="radio" class="quiz-radio-btn op<?= $details['que_id'] ?>" name="option<?= $details['que_id'] ?><?= $k; ?>" value="5"> <?= $opt5_e  ?> </li>
                                                    <?php } else { ?>
                                                        <li> <input type="radio" class="quiz-radio-btn op<?= $details['que_id'] ?>" name="option<?= $details['que_id'] ?><?= $k; ?>" value="5"> <?= $opt5_h  ?> </li>
                                                    <?php } ?>

                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php $k++;
                            } ?>

                            <div class="d-flex float-end my-4">
                                <button type="button" id="review" class="btn btn-primary" style="margin-right: 838px;" id="markForReview" data-queid="<?= $details['que_id'] ?>" data-userid="<?= $user_id; ?>" data-quizid="<?= $quizdata['id']; ?>">Mark For Review</button>

                                <button type="button" id="prevBtn" class="btn btn-primary startQuiz me-2" onclick="nextPrev(-1)">Previous</button>

                                <button type="button" id="nextBtn" class="btn btn-success startQuiz me-2" onclick="nextPrev(1)"><span>Next</span></button>

                                <!-- <?php //if($quizdata['switching_type']== 1){
                                        ?>
                                    <button type="button" id="nextBtn"   class="btn btn-success startQuiz me-2" onclick="nextPrev(1)"><span>Next</span></button>
                                <?php //}else { 
                                ?>
                                    <input type = "hidden" id="checkQue" value="1"/>
                                    <button type="button" id="nextBtn"   data-queid="<?= $quizdata['switching_type'] ?>" class="btn btn-success startQuiz me-2" ><span>Next</span></button>
                                   
                                <?php // } 
                                ?> -->

                            </div>

                        </div>

                </div>
                <div class="quiz-right-side-main shadow-1">
                    <div class="quiz-left-side ">
                        <div class="user-name">

                            <img src="<?php echo base_url(); ?>assets/images/user.png" class="user-icon">
                            <div class="nav-bar-user-icon-section">
                                <span class="user-profile-font"><b>Admin Name</b></span>

                            </div>

                        </div>
                        <div class="time-left">
                            Time left - <span class="timer"> <span class="countdown"></span></span>
                        </div>
                        <div Id="right-bar-ans-none">

                            <h6 class="quiz-title mb-4"><?= $quizdata['title'] ?></h2>
                                <ul id="afterSubmitHide">
                                    <!-- <li class="ans-green">1</li>
                                    <li class="ans-red">2</li>
                                    <li class="ans-blue">3</li>
                                    <li class="ans-blue">4</li> -->
                                    <?php
                                    foreach ($que_details as $key => $details) {
                                        $key++; ?>
                                        <li id="counter<?= $details['que_id'] ?>" class="ans-red"><?= $key; ?></li>
                                    <?php } ?>
                                </ul>

                        </div>
                        <div class="as-color">
                            <ol>
                                <li><span class="Quiz-circle green"></span>Answered </li>
                                <li><span class="Quiz-circle red"></span>Not Answered </li>
                                <li><span class="Quiz-circle gray"></span>Not Visited</li>
                                <li><span class="Quiz-circle blue"></span>Mark for Review</li>
                            </ol>
                        </div>
                        <!-- <input type="" name="Submit" class="btn btn-info btn-sm"> -->
                        <button type="submit" class="btn btn-success w-100" id="submit_button">Submit</button>
                    </div>
                </div>

            </div>
        </div>
        </form>
    </section>


    <script src="<?= base_url(); ?>assets/js/bootstrap.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/font_resize.js"></script>
    <script src="<?= base_url(); ?>assets/js/tab.js"></script>
    <script src="<?= base_url(); ?>assets/js/dark_mode.js"></script>
    <script>
    </script>
    <script>
        $('#submit_button').hide();
        $('#thankYou').hide();

        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab
        document.getElementById("submit_button").style.display = "none";


        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";

            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                // document.getElementById("nextBtn").innerHTML = "Submit";
                document.getElementById("nextBtn").style.display = "none";
                document.getElementById("submit_button").style.display = "block";

            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            var valid = true;
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            // if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                // $("#myForm").submit();
                // document.getElementById("regForm").submit();
                document.getElementById("afterSubmitHide").style.display = "none";
                // $('#afterSubmitHide').hide();
                console.log('hello')
                return false;

            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;


            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            //  x[n].className += " active";
        }
        $('#submit_button').click(function() {

            $('#qustions-tab').hide();
            $('#thankYou').show();
            $('#submit_button').hide();
            $('#right-bar-ans-none').hide();

        });
    </script>
    <script>
        $('.login_details').hide()
        jQuery('.show').on('click', function() {
            jQuery('.login_details').toggle();
        });
    </script>



    <script>
        var timer2 = "<?= $quizdata['duration'] ?>:01";
        var interval = setInterval(function() {


            var timer = timer2.split(':');
            //by parsing integer, I avoid all extra string processing
            var minutes = parseInt(timer[0], 10);
            var seconds = parseInt(timer[1], 10);
            --seconds;
            minutes = (seconds < 0) ? --minutes : minutes;
            if (minutes < 0) clearInterval(interval);
            seconds = (seconds < 0) ? 59 : seconds;
            seconds = (seconds < 10) ? '0' + seconds : seconds;
            //minutes = (minutes < 10) ?  minutes : minutes;
            $('.countdown').html(minutes + ':' + seconds);
            timer2 = minutes + ':' + seconds;
            if (timer2 == '0:00') {
                $('#regForm').submit();
            }
        }, 1000);




        $(function() {
            <?php
            foreach ($que_details as $key => $details) { ?>
                $("input[class$='op<?= $details['que_id'] ?>']").change(function() {
                    $("#counter<?= $details['que_id'] ?>").removeClass('ans-red').addClass('ans-green');
                });
            <?php } ?>

        });
    </script>

    <script>
        $(document).ready(function() {
            var quiz_id = "<?= $quizdata['id']; ?>";
            var user_id = "<?= $user_id; ?>"
            checkUserAttempt(quiz_id, user_id);
        });

        function checkUserAttempt(quiz_id, user_id) {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>users/checkUserAttempt',
                data: {
                    quiz_id: quiz_id,
                    user_id: user_id,
                },
                success: function(result) {
                    var res = JSON.parse(result);
                    //console.log(res.userAttempt);
                    if (res.userAttempt == 2) {
                        window.location.href = "<?php echo base_url(); ?>users/user_attempt";
                    }
                },
                error: function(result) {
                    alert("Error,Please try again.");
                }
            });
        }
    </script>

</body>

</html>