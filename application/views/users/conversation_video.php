
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>
h1 {
    font-size: 20px;
    margin-bottom: 10px;
    color: rgb(3, 3, 3);
}
.video_content {
    padding: 39px 136px;
} 
.video__details {
    display: flex;
    /* margin-top: 10px; */
    margin-left: 10px;
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
.recent_img{
    width: 41%;
    border-radius: 5px;
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
    <div class="video_content">
        <div class="row">
            <div class="col-md-8">
                <h1><?= $Conversation['title']?></h1>
                <div class="play_video">
                    <video width="100%" height="100%" controls autoplay>
                        <source src="<?php echo base_url(); ?><?= $Conversation['video']?>">
                        <source src="movie.ogg" type="video/ogg">
                            Your browser does not support the video tag.
                    </video>
                </div> 
                <div class="video__details">
                    <div class="title-text">
                        <h3> <?= $Conversation['title']?> </h3>
                        <span>10M Views • <?= time_elapsed_string($Conversation['created_on'])?></span>
                        <div class='large-font text-center top-20'>
                            <ion-icon name="heart">
                                <div class='red-bg'></div>
                            </ion-icon>
                        </div>
                        <a href="" class="like_button" type="button"><i class="fa fa-heart" style="margin:4px;"></i>like</a>
                        <a href="<?php echo base_url().'users/conversation_video/'?><?php echo encryptids("E", $Conversation['id'] )?>" data-toggle="tooltip" title="Copy Link and Share" class="share_button" type="button"><i class="fa fa-share" style="margin:4px;"></i>share</a>

                          
                    </div> 
                </div>
                <div class="description_text">
                    <p class=""><?= $Conversation['description']?></p>
                </div>
            </div>


             <div class="col-md-4">
                <h1>Recent Search</h1> 
                <?php foreach ($getRecentSearch as $key => $value) {?>
                    <div class="video_recent">
                        <a href="<?php echo base_url().'users/conversation_video/'?><?php echo encryptids("E", $value['id'] )?>"> <img src="<?= base_url()?><?= $value['video_thumbnail']?>" alt="" class="recent_img"/>
                        </a>
                            <div class="video__details">
                                <div class="title">
                                    <h3><a href="<?php echo base_url().'users/conversation_video/'?><?php echo encryptids("E", $value['id'] )?>"> <?= $value['title']?></a></h3>
                                    
                                    <span>10M Views • <?= time_elapsed_string($value['created_on'])?></span>
                                </div>
                            </div>  
                        </div>
               <?php }?>
 
                     
            </div>  
    </div>      
</section>   
<?php

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

?>
<script>
$('.share_button').click(function (e) {
   e.preventDefault();
   var copyText = $(this).attr('href');

   document.addEventListener('copy', function(e) {
      e.clipboardData.setData('text/plain', copyText);
      e.preventDefault();
   }, true);

   document.execCommand('copy');  
   console.log('copied text : ', copyText);
   alert('copied text: ' + copyText); 
 });
 </script> 