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
    font-size: 16px;
    font-weight: 600;
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
    margin: 0px 28px 0px 4px;
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


/* about quiz end */
    </style>
<div class="container">
        <section id="banner-section">
            <div class="row">
                <div class="col-sm-5">
                    <div class="quiz-image shadow">
                        <img src="../../<?php echo $quizdata['banner_img'];?>" class="image-section" alt="Bis Quiz Images" />
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="Quiz_text">
                        <h3 class="main-title"><?php echo $quizdata['title'];?></h3>
                        <p class="time-and-qus">
                            <span class="number-quiz"><?php echo $quizdata['total_question'];?> <span class="quiz-text">Questions</span>
                            </span>
                            <span class="number-quiz"><?php echo $quizdata['duration'];?> <span class="quiz-text">Sec</span>
                            </span>
                        </p>
                        <p class="time-start-end">
                            <span class="start-end-time-title">Start Date  <span class="quiz-text"><?php echo date("m-d-Y", strtotime($quizdata['start_date']));?></span>
                            </span>
                            <span class="start-end-time-title">End Date <span class="quiz-text"><?php echo date("m-d-Y", strtotime($quizdata['end_date']));?></span>
                            </span>
                        </p>
                        <a href="<?= base_url();?>users/quiz_start/<?php echo $quizdata['id'];?>" class="btn startQuiz"> <span>Start Quiz</span></a>
                    </div>
                </div>
            </div>

        </section>
        <section id="quiz-about" class="mb-5">
            <div class="about-inner ">
                <h2 class="about-section">About Quiz</h2>
                <div class="About_point"> 
                    <?php echo $quizdata['description'];?>
                </div>
            </div>
        </section>
        <section id="quiz-about" class="mb-5">
            <div class="about-inner">
                <h2 class="about-section">Team's and Conditions</h2>
                <div class="About_point ">
                   <?php echo $quizdata['terms_conditions'];?>

                </div>
        </section>
        </div>