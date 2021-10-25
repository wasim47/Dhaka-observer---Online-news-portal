<link rel="stylesheet" href="<?php echo base_url();?>assets/css/global.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/slides.min.jquery.js"></script>
<script>
    $(function(){
        $('#slides').slides({
            preload: false,
            preloadImage: 'img/loading.gif',
            play: 5000,
            pause: 2500,
            hoverPause: true,
            animationStart: function(current){
                $('.caption').animate({
                    bottom:-35
                },100);
                if (window.console && console.log) {
                    // example return of current slide number
                    console.log('animationStart on slide: ', current);
                };
            },
            animationComplete: function(current){
                $('.caption').animate({
                    bottom:0
                },200);
                if (window.console && console.log) {
                    // example return of current slide number
                    console.log('animationComplete on slide: ', current);
                };
            },
            slidesLoaded: function() {
                $('.caption').animate({
                    bottom:0
                },200);
            }
        });
    });
</script>

<div id="container">
    <div id="example">
      <div id="slides">
            <div class="slides_container">
            <?php
                $res1=mysql_query("select * from photo_ablum_gall order by ph_id desc");
                while($row=mysql_fetch_array($res1)){
                    $ph_name=$row['ph_name'];
                    echo $ph_ima=$row['ph_ima'];
            ?>
                <div class="slide">
                    <a href="http://www.flickr.com/photos/jliba/4665625073/" title="145.365 - Happy Bokeh Thursday! | Flickr - Photo Sharing!" target="_blank"><img src="<?php echo base_url();?>uploads/images/album_photo/<?php echo $ph_ima; ?>" width="570" height="270" ></a>
                    <div class="caption" style="bottom:0">
                        <p><?php echo $ph_name; ?></p>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <a href="#" class="prev"><img src="<?php echo base_url();?>assets/images/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
            <a href="#" class="next"><img src="<?php echo base_url();?>assets/images/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
        </div>
    </div>
    </div>
