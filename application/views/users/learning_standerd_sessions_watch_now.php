
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>
h1 {
    font-size: 20px;
    margin-bottom: 10px;
    color: rgb(3, 3, 3);
}
.join_video_content {
    padding: 39px 65px;
} 
.news__details {
    display: flex;
    margin-top: 10px; 
    
}
.author img {
    object-fit: cover;
    border-radius: 50%;
    height: 40px;
    width: 40px;
    margin-right: 10px;
}
.title {
    display: flex;
    flex-direction: column;
}
.title h3 {
    color: rgb(3, 3, 3);
    font-size: 14px;
    margin-bottom: 6px;
    font-weight: 600;
    line-height: 1.5em;
    height: 3em;
    overflow: hidden;
    
}
.title-text h3 {
    color: rgb(3, 3, 3);
    font-size: 14px;
    margin-bottom: 6px;
    font-weight: 600;
    line-height: 1.5em;
    /* height: 3em; */
    overflow: hidden;
    
}
.title a, span {
    text-decoration: none;
    /* color: rgb(96, 96, 96); */
    font-size: 14px;
}
.video_recent {
    display: flex;
    flex-direction: row;
    padding: 5px;
}
img.news_img {
    width: 100%;
    height: 244px;
}
.description_text {
    padding: 10px;
    /* font-size: 8px; */
}
.description_text p{
   font-size:14px;
   
}
.share_button {
    background: #ffd600;
    
    padding: 3px;
    width: 76px;
    text-align: center;
    border-radius: 10px;
    font-weight: 700;
    font-size: 14px;
}
.like_button {
    background: #ffd600;
    margin-left: 273px;
    padding: 3px;
    width: 76px;
    text-align: center;
    border-radius: 10px;
    font-weight: 700;
    font-size: 14px;
}   
</style>    
<section>
    <div class="container-fluid">
    <div class="join_video_content">
        <div class="row">
        <div class="col-md-4">
                <h1>Whats News</h1>
                <hr>     
                   <div class="whats_new">
                        <a href="#"> <img src="http://localhost/BIS/BIS_repo/assets/images/img_2.jpg" alt="#" class="news_img"/>
                        </a>
                         <div class="news__details">
                                <div class="title">
                                    <h3><a href="#">The Great Wall reflects collision and exchanges between agricultural civilizations and nomadic civilizations</a></h3>
                                    
                                    <span>10M Views</span>
                                </div>
                            </div>  
                        </div>
            </div> 
            <div class="col-md-8"> 
                <h1>Watch</h1>
                <div class="play_video">
                    <video width="100%" height="100%" controls autoplay>
                        <source src="<?= $WatchNow['session_link']?>">
                        <source src="movie.ogg" type="video/ogg">
                            Your browser does not support the video tag.
                    </video>
                </div> 
                <div class="video__details">
                    <div class="title-text">
                        <h3><?= $WatchNow['title']?></h3>
                        <span>Date : <?= date("d M Y", strtotime($WatchNow['created_on']));?></span>
                    </div> 
                </div>
                
            </div>


              
    </div>      
</section>   


