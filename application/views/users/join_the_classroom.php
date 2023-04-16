    <style>
    .item {
    height: 100%;
    
}
h2.up_coming {
    font-weight: 600;
    /* margin-top: 43px; */
    margin-bottom: 16px;
    /* FONT-WEIGHT: 600; */
    color: white;
    /* font-family: emoji; */
    font-size: 30px;
    padding: 12px;
}
section.background_coming {
    background: #000000e8;
    color: white;
}
.owl-carousel .owl-dots.disabled, .owl-carousel .owl-nav.disabled {
    display: inherit;
}
.live_section_title {
    text-align: center;
    margin-top: 30px;
}
a.view-btn {
    background: linear-gradient(233.19deg, #43879d -256.88%, #c5232c -167.3%, #2d329a -81.23%, #c25757 -2.2%, #000000 80.36%);
    border: 0.5px solid rgba(74, 74, 74, 0.25);
    border-radius: 4px;
    padding: 3px 12px;
    display: inline-flex;
    margin: 9px auto;
    color: #fff;
    text-align: center;
    
}
.live_content {
    text-align: center;
}
.owl-theme .owl-nav [class*='owl-']:hover {
    background: #869791;
    color: #f00;
    text-decoration: none;
}
.owl-theme .owl-dots .owl-dot span {
    width: 25px;
    height: 6px;
    margin: 5px 3px;
    background: #D6D6D6;
    display: block;
    -webkit-backface-visibility: visible;
    transition: opacity 200ms ease;
    border-radius: 30px;
}
.owl-theme .owl-dots {
    text-align: center;
    -webkit-tap-highlight-color: transparent;
    display: none;
}
#owl-caraousal_2 .owl-dots {
    text-align: center;
    -webkit-tap-highlight-color: transparent;
    display: none;
}
#owl-caraousal_2 button.owl-prev {
    background: 0 0;
    color: inherit;
    border: none;
    padding: 0!important;
    font: inherit;
    margin-left: -335px;
    margin-right: 412px; 
    /* margin-bottom: -57px; */
    margin-bottom: 153px;
}
#owl-caraousal_2 .owl-nav {
    margin-top: 10px;
    text-align: center;
    -webkit-tap-highlight-color: transparent;
    position: absolute;
}
#owl-caraousal_3 .owl-dots {
    text-align: center;
    -webkit-tap-highlight-color: transparent;
    display: none;
}
#owl-caraousal_3 button.owl-prev {
    background: 0 0;
    color: inherit;
    border: none;
    padding: 0!important;
    font: inherit;
    margin-left: -335px;
    margin-right: 412px; 
    /* margin-bottom: -57px; */
    margin-bottom: 153px;
}
#owl-caraousal_3 .owl-nav {
    margin-top: 10px;
    text-align: center;
    -webkit-tap-highlight-color: transparent;
    position: absolute;
}
#owl-caraousal_4 .owl-dots {
    text-align: center; 
    -webkit-tap-highlight-color: transparent;
    display: none;
}
#owl-caraousal_4 button.owl-prev {
    background: 0 0;
    color: inherit;
    border: none;
    padding: 0!important;
    font: inherit;
    margin-left: -335px;
    margin-right: 412px;
    /* margin-bottom: -57px; */
    margin-bottom: 153px;
}
#owl-caraousal_4 .owl-nav {
    margin-top: 10px;
    text-align: center;
    -webkit-tap-highlight-color: transparent;
    position: absolute;
}

</style>
<section class="background_coming">
    <div class="container">
        <h2 class="up_coming">Upcomings Sessions</h2>
        <div class="coming_content" style="margin-top:32px;">
            <div class="owl-carousel owl-theme" id="owl-caraousal_1">
                 <?php foreach ($UpcomingsSessions as $key => $value): ?>
                    <div class="item">
                        <div class="quiz-section">
                            <div class="quiz-box">
                                <img src="<?php echo base_url(); ?><?= $value['thumbnail']?>" class="w-100 border-2">
                            </div> 
                            <p class="quiz-text overflow-hidden p-1"><a href=""><?= $value['title']?></a></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>    
</section>
<section class="">
    <div class="container-fluid">
        <div class="live_session d-flex">
             <div class="col-md-4" style="background: linear-gradient(180.83deg, rgb(246 196 79 / 82%) 1.43%, rgba(194, 87, 155, 0.1) 98.57%);">
                <div class="row">
                    <div class="live_content">
                        <div class="live_section_title">
                            <h2>Live Sessions</h2>
                        </div>
                        <div class="owl-carousel owl-theme" id="owl-caraousal_2" style="padding: 25px 60px 0px 60px;">
                            <?php foreach ($LiveSessions as $key => $value): ?>
                            <div class="item">
                                <div class="quiz-section">
                                    <div class="quiz-box_live">
                                        <img src="<?php echo base_url(); ?><?= $value['thumbnail']?>" class="live_img border-2">
                                    </div>
                                    <p class="quiz-text overflow-hidden p-1"><a href=""><?= $value['title']?></a></p>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                        <a href="join_the_classroom_view" class="view-btn" title="View All">View All</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="live_content">
                        <div class="live_section_title">
                            <h2>Latest Posts</h2>
                        </div>
                        <div class="owl-carousel owl-theme" id="owl-caraousal_3" style="padding: 25px 60px 0px 60px;">
                            <?php foreach ($LatestPosts as $key => $value): ?>
                                <div class="item">
                                    <div class="quiz-section">
                                        <div class="quiz-box_live">
                                            <img src="<?php echo base_url(); ?><?= $value['thumbnail']?>" class="live_img border-2">
                                        </div>
                                        <p class="quiz-text overflow-hidden p-1" ><?= $value['title']?></p>
                                        <a href="<?php echo base_url(); ?><?= $value['doc_pdf']?>" class="view-btn" title="View PDF" style="margin-right: 16px;" target="_blank">View PDF</a>
                                        <a href="letest_post_view" class="view-btn" title="View All">View All</a>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="background: linear-gradient(180.83deg, rgb(38 135 214) 1.43%, rgba(194, 87, 155, 0.1) 98.57%);">
                <div class="row">
                    <div class="live_content">
                        <div class="live_section_title">
                            <h2>Informative Video</h2>
                        </div>
                        <div class="owl-carousel owl-theme" id="owl-caraousal_4" style="padding: 25px 60px 0px 60px;">
                            <?php foreach ($InformativeVideo as $key => $value): ?>
                                <div class="item">
                                    <div class="quiz-section">
                                        <div class="quiz-box_live">
                                            <img src="<?php echo base_url(); ?><?= $value['thumbnail']?>" class="live_img border-2">
                                        </div> 
                                        <p class="quiz-text overflow-hidden p-1" ><?= $value['title']?></p>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <a href="informative_video_view" class="view-btn" title="View All">View All</a>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</section> 

