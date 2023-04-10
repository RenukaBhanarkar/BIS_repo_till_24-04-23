<style>

#banner-section {
    padding: 30px 0px;
}

.quiz-image {
    width: 100%;
    height: 300px;
    overflow-y: hidden;
    border-radius: 10px;
}

.quiz-image img {
    width: 100%;
    object-fit: fill;
    height: 100%;
}

.Quiz_text {
    padding: 40px 0px 11px 50px;
}

.startQuiz {
    background: #db2721;
    color: white;
    padding: 7px 25px 7px;
    margin-top: 25px;
    overflow: hidden;
}

.startQuiz:hover {
    color: white;
}

.number-quiz {
    margin-right: 13px;
    font-size: 16px;
    font-weight: 600;
    WIDTH: 100px;
    display: inline-block;
    background: #4E606D;
    padding: 14px;
    text-align: center;
    border-radius: 5px;
}

.main-title {
    font-size: 25px;
    font-weight: 600;
    margin-bottom: 12px;
}

.quiz-text {
    font-size: 14px;
    color: red;
    font-weight: 500;
    width: 100%;
    display: block;
    margin-top: 5px;
}

.start-end-time-title {
    font-size: 16px;
    font-weight: 600;
}

.startQuiz span {
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
}

.startQuiz span:after {
    content: "\00bb";
    position: absolute;
    opacity: 0;
    top: 0;
    right: -20px;
    transition: 0.5s;
}

.startQuiz:hover span {
    padding-right: 25px;
}

.startQuiz:hover span:after {
    opacity: 1;
    right: 0;
}

.about-section {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 20px;
}

.about-inner {
    border: 1px solid #f1f1f1;
    border-radius: 5px;
    padding: 20px;
}

.About_point p {
    font-size: 14px;
    line-height: 30px;
}

.About_point ol li {
    line-height: 30px;
}
.question_no{
    font-size:25px;
}

/* about quiz end */
    </style>
<div class="container">
        <section id="banner-section">
            <div class="row">
                <div class="col-sm-5">
                    <div class="quiz-image shadow">
                        <img src="../../<?= $quizdata['banner_img'];?>" class="image-section" alt="Bis Quiz Images" />
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="Quiz_text">
                        <h3 class="main-title"><?= $quizdata['title'];?></h3>
                        <p class="time-and-qus" style="color:white;">
                            <span class="number-quiz"><span class="question_no"><?= $quizdata['total_question'];?></span><span class="quiz-text">Questions</span>
                            </span>
                            <span class="number-quiz"><span class="question_no"><?= $quizdata['duration'];?></span><span class="quiz-text">Sec</span>
                            </span>
                        </p>
                        <p class="time-start-end d-flex">
                            <span class="start-end-time-title m-2">Start Date  <span class="quiz-text m-2"><?= date("m-d-Y", strtotime($quizdata['start_date']));?></span>
                            </span>
                            <span class="start-end-time-title m-2">End Date <span class="quiz-text m-2"><?= date("m-d-Y", strtotime($quizdata['end_date']));?></span>
                            </span>
                        </p>
                        <a href="<?= base_url();?>users/quiz_start/<?= $quizdata['id'];?>" class="btn startQuiz"> <span>Start Quiz</span></a>
                          <?php 
          if ($this->session->flashdata('MSG')) {   
            echo $this->session->flashdata('MSG');  
          } 
          ?>
                    </div>
                </div>
            </div>

        </section>
        <section id="quiz-about" class="mb-5">
            <div class="about-inner ">
                <h2 class="about-section">About Quiz</h2>
                <div class="About_point"> 
                    <?= $quizdata['description'];?>
                </div>
            </div>
        </section>
        <section id="quiz-about" class="mb-5">
            <div class="about-inner">
                <h2 class="about-section">Team's and Conditions</h2>
                <div class="About_point ">
                   <?= $quizdata['terms_conditions'];?>

                </div>
        </section>
        </div>