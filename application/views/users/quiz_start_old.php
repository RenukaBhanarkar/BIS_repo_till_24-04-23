<!doctype html>
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
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="" rel="stylesheet">
    <!-- CSS File -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/bis_logo.png" type="image/x-icon">
    <style>
        .shadow-1 {
            box-shadow: 0 0 2px 0 rgba(0, 0, 0, .07), 0 1px 1px 0 rgba(0, 0, 0, .04)!important;
        }
        
        /* .quiz-left-side.shadow-1 {} */
        
        .quiz-left-side ul {
            height: 236px;
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            padding: 0px;
            margin: 0px;
            overflow: auto;
            margin: 0px;
            justify-content: space-around;
        }
        
        .quiz-left-side ul li {
            border: 1px solid;
            padding: 8px 0px 0px;
            border-radius: 50%;
            height: 35px;
            margin-right: 10px;
            width: 35px;
            font-size: 13px;
            margin-bottom: 15px;
            text-align: center;
            background: white;
        }
        
        .quiz-title {
            font-size: 17px;
            border-bottom: 1px dashed;
            padding-bottom: 11px;
        }
        
        #regForm {
            background-color: #ffffff;
            margin: 10px auto;
            min-width: 300px;
        }
        /* Mark input boxes that gets an error on validation: */
        
        input.invalid {
            background-color: #ffdddd;
        }
        /* Hide all steps by default: */
        
        .tab {
            display: none;
        }
        
        button {
            cursor: pointer;
        }
        
        button:hover {
            opacity: 0.8;
        }
        
        #prevBtn {
            background-color: #bbbbbb;
        }
        /* Make circles that indicate the steps of the form: */
        
        .step {
            height: 30px;
            width: 30px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            padding: 5px 10px 0px;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
            margin-right: 19px;
        }
        
        .step.active {
            opacity: 1;
            background: #185ab2;
            color: white;
        }
        /* Mark the steps that are finished and valid: */
        
        .step.finish {
            background-color: #04AA6D;
        }
        
        .inner-section h3 {
            font-size: 18px;
            padding: 15px 23px;
            border-bottom: 1px dashed #ccc;
            font-weight: 600;
        }
        
        .quiz-ans-section p {
            font-size: 14px;
            margin: 24px 0px;
            padding: 0px 15px;
        }
        
        .quiz-ans-section ul li {
            line-height: 30px;
            list-style: none;
            font-size: 14px;
        }
        
        .quiz-radio-btn {
            margin-right: 15px;
        }
        
        .Quiz-circle {
            height: 12px;
            width: 12px;
            margin-right: 10px;
            display: inline-block;
            position: absolute;
            top: 6px;
            left: -25px;
            border-radius: 50%;
        }
        
        .Quiz-circle.red {
            background: #e30404;
        }
        
        .Quiz-circle.green {
            background: #048e2a;
        }
        
        .Quiz-circle.gray {
            background: #bbbbbb;
        }
        
        .Quiz-circle.blue {
            background: #040491;
        }
        
        .as-color ol li {
            position: relative;
            list-style: none;
            line-height: 29px;
        }
        /* .margin-quiz {
            margin: 83px 0px;
        } */
        
        .ans-green {
            background-color: #048e2a !important;
            color: white;
        }
        
        .ans-red {
            background-color: #e30404 !important;
            color: white;
        }
        
        .ans-blue {
            background-color: #040491 !important;
            color: white;
        }
        
        .ans-gray {
            background-color: #bbbbbb !important;
            color: white;
        }
        
        .thank_you_box {
            text-align: center;
            margin: 34px 0px;
        }
        
        .text_box {
            margin: 39px 0px 0px;
            line-height: 46px;
        }
        
        .text_box h4 {
            font-size: 35px;
            color: red;
            margin: 0px;
            font-weight: 700;
        }
        
        .text_box p {
            font-size: 17px;
            /* color: #0000a6; */
            font-weight: 600;
            margin-bottom: 2px;
        }
        
        .Certificate-link {
            font-size: 14px !important;
            font-weight: 500 !important;
        }
        
        .text_box p {
            font-size: 25px;
            color: #0000a6;
            font-weight: 600;
            margin-bottom: 2px;
        }
        
        .Certificate-link {
            font-size: 14px !important;
            font-weight: 500 !important;
            margin-top: 12px;
        }
        
        .thank_you_box img {
            width: 143px;
            margin-top: 60px;
        }
        
        .purple {
            background-color: #5d5dc2 !important;
        }
        
        .orange {
            background-color: orange !important;
        }
        
        .quiz-left-side-main {
            width: 75%;
            margin: 58px 0px 45px 27px;
            height: fit-content;
        }
        
        .quiz-right-side-main {
            width: 20%;
            height: 100%;
            background: #ededed96;
            color: #373434;
            border-radius: 7px px 0px 0px 7px;
            padding: 18px 18px;
            height: auto;
        }
        
        .Quiz_section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        
        .user-icon {
            width: 13%;
            height: 35px;
            border: 1px solid #ccc;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        .user-name {
            display: flex;
            margin-bottom: 25px;
        }
        
        .nav-bar-user-icon-section {
            width: 76%;
            text-align: left;
            padding: 5px 12px 0px;
        }
        
        .user-profile-font,
        .user-profile-font b {
            font-size: 15px;
        }
        
        .time-left {
            margin: 5px 0px 0px 0px;
        }
        
        .timer {
            background: green;
            font-weight: 600;
            color: white;
            padding: 3px 7px;
            border-radius: 4px;
            font-size: 15px;
        }
        
        .time-left {
            margin: 0px 0px 20px;
            font-weight: 600;
        }
        
        #right-bar-ans-none {
            background: white;
            padding: 9px 16px;
        }
    </style>
</head>

<body>
    <header>
        <div class="sub_header">
            <div class="container-xxl">
                <div class="row">
                   <div class="col-lg-5 d-none d-lg-block">
                        <div class="contact">
                            <ul>
                                <li><a href="#">हिन्दी</a></li>
                                <li><a href="#" onclick="increaseFontSize();" class="me-2">A+</a><a href="#"
                                        onclick="normalFontSize();" class="me-2">A</a> <a href="#"
                                        onclick="decreaseFontSize();" class="me-2">A-</a></li>
                                <li>
                                    <a href="#" id="blue_theme"><i class="fa fa-square" aria-hidden="true"></i></i></a>
                                    <a href="#" id="bright_contrast"><i class="fa fa-square"
                                            aria-hidden="true"></i></i></a>
                                    <a href="#" id="orange_theme"><i class="fa fa-square"
                                            aria-hidden="true"></i></i></a>
                                    <a href="#" id="red_theme"><i class="fa fa-square" aria-hidden="true"></i></i></a>
                                </li>
                               
                            </ul>
                        </div>
                    </div> 
                    <div class="col-lg-7">
                        <div class="accessibility">
                            <ul>
                                <li><a href="#" class="show"><img src="<?php echo base_url();?>assets/images/user.png" style="height:31px;"></a></li>
                                
                               
                            </ul>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="login_details">
            <span>Welcome To Bureau of Indian Standards</span>
            <div class="login-link-wrapper">
                     <a href="login.html" class="ac-login jquery-once-2-processed" title="Login">Login</a>
                     <a href="login.html" class="ac-register jquery-once-2-processed" title="Register">Register</a></div>
             </div>
        <!-- <div class="menu_header" id="menu_header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="container-fluid">
                                <a class="navbar-brand d-flex" href="index.html">
                                    <img src="assets/images/logo-strip.png" class="main_logo" alt="BIS logo">
                                    
                                </a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                
                            </div>
                        </nav>
                    </div>
                    
                </div>
            </div>
        </div> -->
    </header>

    <!-- <section id="welcome_text">
        <div>
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light navbar_padding">
                    <div>
                        
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="index.html" style="color: white;">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" target="_blank" aria-current="page" href="https://www.bis.gov.in/" style="color: white;">BIS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="aboutExchangeForum.html" style="color: white;">About Exchange Forum</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" target="_blank" href="https://www.services.bis.gov.in/php/BIS_2.0/bisconnect/knowyourstandards/indian_standards/isdetails" style="color: white;">Know Your Standards</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html" style="color: white;">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </section> -->
    <section>
        <div class="">
            <div class="Quiz_section ">
                <div class="quiz-left-side-main shadow">
                    <form id="#regForm">
                        <div class="inner-section " id="qustions-tab">
                            <h3>Question 1 to 100</h3>
                            <div class="tab">
                                <div class="quiz-ans-section">
                                    <p class="qustion-ans">
                                        1. What was the aim to set up Sushma Swaraj Bhawan, (Previously known as Pravasi Bharatiya Kendra)? / सुषमा स्वराज भवन, (पहले प्रवासी भारतीय केंद्र के रूप में जाना जाता था) स्थापित करने का उद्देश्य क्या है?
                                    </p>
                                    <div class="quiz-option">
                                        <ul>
                                            <li>
                                                <input type="radio" class="quiz-radio-btn" name="qus1"> for business deals between the nations/राष्ट्रों के बीच व्यापार सौदों के लिए
                                            </li>
                                            <li>
                                                <input type="radio" class="quiz-radio-btn" name="qus1"> To become the bridge between NRIs and Indian/अनिवासी भारतीयों और भारतीयों के बीच सेतु बनना
                                            </li>
                                            <li>
                                                <input type="radio" class="quiz-radio-btn" name="qus1"> For NRIs grievences to be heard in the country/अनिवासी भारतीयों के लिए देश में सुनी जाने वाली शिकायतें
                                            </li>
                                            <li> <input type="radio" class="quiz-radio-btn" name="qus1">None of these/इनमें से कोई नहीं</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab">
                                <div class="quiz-ans-section">
                                    <p class="qustion-ans">
                                        2. What was the aim to set up Sushma Swaraj Bhawan, (Previously known as Pravasi Bharatiya Kendra)? / सुषमा स्वराज भवन, (पहले प्रवासी भारतीय केंद्र के रूप में जाना जाता था) स्थापित करने का उद्देश्य क्या है?
                                    </p>
                                    <div class="quiz-option">
                                        <ul>
                                            <li>
                                                <input type="radio" class="quiz-radio-btn" name="qus"> for business deals between the nations/राष्ट्रों के बीच व्यापार सौदों के लिए
                                            </li>
                                            <li>
                                                <input type="radio" class="quiz-radio-btn" name="qus"> To become the bridge between NRIs and Indian/अनिवासी भारतीयों और भारतीयों के बीच सेतु बनना
                                            </li>
                                            <li>
                                                <input type="radio" class="quiz-radio-btn" name="qus"> For NRIs grievences to be heard in the country/अनिवासी भारतीयों के लिए देश में सुनी जाने वाली शिकायतें
                                            </li>
                                            <li> <input type="radio" class="quiz-radio-btn" name="qus">None of these/इनमें से कोई नहीं</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab">
                                <div class="quiz-ans-section">
                                    <p class="qustion-ans">
                                        3. What was the aim to set up Sushma Swaraj Bhawan, (Previously known as Pravasi Bharatiya Kendra)? / सुषमा स्वराज भवन, (पहले प्रवासी भारतीय केंद्र के रूप में जाना जाता था) स्थापित करने का उद्देश्य क्या है?
                                    </p>
                                    <div class="quiz-option">
                                        <ul>
                                            <li>
                                                <input type="radio" class="quiz-radio-btn"> for business deals between the nations/राष्ट्रों के बीच व्यापार सौदों के लिए
                                            </li>
                                            <li>
                                                <input type="radio" class="quiz-radio-btn"> To become the bridge between NRIs and Indian/अनिवासी भारतीयों और भारतीयों के बीच सेतु बनना
                                            </li>
                                            <li>
                                                <input type="radio" class="quiz-radio-btn"> For NRIs grievences to be heard in the country/अनिवासी भारतीयों के लिए देश में सुनी जाने वाली शिकायतें
                                            </li>
                                            <li> <input type="radio" class="quiz-radio-btn">None of these/इनमें से कोई नहीं</li>
                                        </ul>




                                    </div>

                                </div>

                            </div>

                            <div class="d-flex float-end my-4">
                                <button type="button" id="prevBtn" class="btn startQuiz me-2" onclick="nextPrev(-1)"><span>Previous</span></button>
                                <button type="button" id="nextBtn" class="btn startQuiz me-2" onclick="nextPrev(1)"><span>Next</span></button>
                            </div>

                        </div>
                    </form>
                    <!-- <div class="thank_you_box" id="thankYou">

                        <img src="<?php echo base_url();?>assets/images/certificate.png" alt="">
                        <div class="text_box">
                            <h4>Thank You </h4>
                            <p>For Participating In The Quiz </p>
                            <p class="Certificate-link"><a href="#">Click here</a> to download the Certificate</p>
                        </div>
                    </div> -->
                </div>


                <div class="quiz-right-side-main shadow-1">
                    <div class="quiz-left-side ">

                        <div class="user-name">

                            <img src="<?php echo base_url();?>assets/images/user.png" class="user-icon">
                            <div class="nav-bar-user-icon-section">
                                <span class="user-profile-font"><b>Admin Name</b></span>

                            </div>

                        </div>
                        <div class="time-left">
                            Time left - <span class="timer">00:00:00</span>
                        </div>
                        <div Id="right-bar-ans-none">

                            <h6 class="quiz-title mb-4">Swachh Bharat Quiz</h2>
                                <ul id="afterSubmitHide">
                                    <li class="ans-green">1</li>
                                    <li class="ans-red">2</li>
                                    <li class="ans-blue">3</li>
                                    <li class="ans-blue">4</li>
                                    <li>5</li>
                                    <li>6</li>
                                    <li>7</li>
                                    <li>8</li>
                                    <li>9</li>
                                    <li>10</li>
                                    <li>11</li>
                                    <li>12</li>
                                    <li>13</li>
                                    <li>14</li>
                                    <li>15</li>
                                    <li>16</li>
                                    <li>17</li>
                                    <li>18</li>
                                    <li>19</li>
                                    <li>20</li>
                                    <li>21</li>
                                    <li>22</li>
                                    <li>23</li>
                                    <li>24</li>
                                    <li>25</li>
                                    <li>26</li>
                                    <li>27</li>
                                    <li>28</li>
                                    <li>29</li>
                                    <li>30</li>
                                    <li>31</li>
                                    <li>32</li>
                                    <li>33</li>
                                    <li>34</li>
                                </ul>

                        </div>
                        <div class="as-color">
                            <ol>
                                <li><span class="Quiz-circle green"></span>Answered </li>
                                <li><span class="Quiz-circle red"></span>Not Answered </li>
                                <li><span class="Quiz-circle purple"></span>Marked For Review </li>
                                <li><span class="Quiz-circle gray"></span>Not Visited</li>
                                <li><span class="Quiz-circle orange"></span>Answered And Marked For Review</li>
                            </ol>
                        </div>
                        <button type="button" class="btn btn-success w-100" id="submit_button">Submit</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php
    require('users/footer.php');
    ?>



    <script src="<?php base_url();?>assets/js/bootstrap.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/font_resize.js"></script>
    <script src="<?php echo base_url();?>assets/js/tab.js"></script>
    <script src="<?php echo base_url();?>assets/js/dark_mode.js"></script> 
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

            // $('#qustions-tab').hide();
            // $('#thankYou').show();
            // $('#submit_button').hide();
            // $('#right-bar-ans-none').hide();

        });

    </script>
    <script>
        $('.login_details').hide()
jQuery('.show').on('click',function(){
  jQuery('.login_details').toggle();
});
</script>
</body>

</html>