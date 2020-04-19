<?php
// clean blank space around string - EM 31.08.2011
$video[0]['tubecode'] = trim($video[0]['tubecode']);
$arTmpBName = explode(" ", $video[0]['bandname']);
$arTmpSName = explode(" ", $video[0]['songtitle']);
?>
<div style="width: 640px; float: left; padding: 0 5px 5px 5px">
    <h1 style="margin: 0px; color: white"><?= $video[0]['bandname'] ?> - <?= $video[0]['songtitle'] ?></h1>
    <div style="width: 630px; ">
        <!-- layerFlash  -->
        <a id="layerFlashCnt"></a>
        <div id="layerFlash">
            <object width="630" height="376">
                <param name="movie" value="http://www.youtube.com/v/<?= $video[0]['tubecode'] ?>&hl=en">
                <param name="wmode" value="transparent">
                <embed src="http://www.youtube.com/v/<?= $video[0]['tubecode'] ?>&hl=en"
                       type="application/x-shockwave-flash" wmode="transparent" width="630" height="376">
            </object>
        </div>
        <!-- layerFlash / -->
        <HR>
        <h3 class="videoInfoBox"> <!-- <?php echo base_url(); ?> -->
            Views : <?= $video[0]['views'] ?> <br/>
            Videos from
            <A HREF="<? echo base_url() . "videos/uservideos/" . $video[0]['user_id']; ?>">
                ( xx user )
            </a><BR>
            Youtube <A HREF="http://www.youtube.com/watch?v=<?= $video[0]['tubecode'] ?>" target="_blank">( source )</A>
            <BR>
        </h3>
        <div style="clear: both"></div>
    </div>
    <br><br>
    <!--  -->
    <script>
        //$(document).ready(function(){
        $.getJSON('http://gdata.youtube.com/feeds/api/videos?q=<?=trim($arTmpBName[0])?> - <?=$arTmpSName[0]?>&alt=json-in-script&callback=?&max-results=20&start-index=1', function (data) {

            $.each(data.feed.entry, function (i, item) {
                let title = item['title']['$t'];
                let video = item['id']['$t'];

                video = video.replace('http://gdata.youtube.com/feeds/api/videos/', 'http://www.youtube.com/watch?v=');  //replacement of link
                const videoID = video.replace('http://www.youtube.com/watch?v=', '');
                // removing link and getting the video ID
                //$('#BoxVidAlternativ').append('<a href="'+video+'"> '+title+'</a> -'+videoID+'<br/> ');
                //$('#BoxVidAlternativ').append('<a href="'+video+'"><img src="http://img.youtube.com/vi/'+videoID+'/default.jpg"></a> ');

                let DinVidItem = '<div id="videoBoxElemAlt" style="">';
                DinVidItem += '<div style="margin-bottom: 0px">';
                DinVidItem += '</div>';
                DinVidItem += '<div style="clear: both"></div>';
                DinVidItem += '<div style="border:1px solid white; margin: 0 10px 10px 0; float: left">';
                DinVidItem += '<a href="javascript:void(0)" onclick="replaceContentFlash(\'' + videoID + '\')"><img src="http://img.youtube.com/vi/' + videoID + '/default.jpg"></a>';
                DinVidItem += '</div>';
                DinVidItem += '<div style="margin: 0px; float: left; ">';
                //DinVidItem +='<a href="'+video+'"';
                DinVidItem += '<a href="javascript:void(0)" onclick="replaceContentFlash(\'' + videoID + '\')">';
                DinVidItem += '<font style="margin: 0px; color: #333; font: bold 11px arial">' + title.substr(0, 65) + '</font>';
                DinVidItem += '</a><br /><br />';
                DinVidItem += '';
                DinVidItem += '<br />';
                DinVidItem += '<br />';
                DinVidItem += '</div>';
                DinVidItem += '<div style="clear: both"></div>';
                $('#BoxVidAlternativ').append(DinVidItem);
            });
        });

        //});


        function replaceContentFlash(videoID) {

            let VidRepItem = '<object width="630" height="376">';
            VidRepItem += '<param name="movie" value="http://www.youtube.com/v/' + videoID + '&hl=en">';
            VidRepItem += '<param name="wmode" value="transparent">';
            VidRepItem += '<embed src="http://www.youtube.com/v/' + videoID + '&hl=en" type="application/x-shockwave-flash" wmode="transparent" width="630" height="376">';
            VidRepItem += '</object>';

            $("#layerFlash").html(VidRepItem);
            $('html, body').animate({scrollTop: $("#layerFlashCnt").offset().top}, 500);
        }

    </script>

    <style>
        #BoxVidAlternativ {
            width: 650px;
            /*height: 600px;*/
            color: #333;
        }

        #BoxVidAlternativ a {
            color: #333;
        }

        #videoBoxElemAlt {
            /*background:none repeat scroll 0 0 #FAF301;*/
            border: 1px solid #888888;
            float: left;
            height: 170px;
            margin-bottom: 10px;
            margin-right: 10px;
            padding: 10px;
            width: 128px;
            background: #FAF301;
        }
    </style>
    <div id="BoxVidAlternativ"></div>
    <div style="clear: both"></div>
    <!--  -->
</div>
<!-- / Comments Area -->
