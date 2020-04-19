<div class="homeTitleBox">
    <a href="/videos/">LATEST BOOKMARK VIDEOS</a> &nbsp;
</div>
<div style="clear: both"></div>
<br>
<?php
$cnt = 0;
foreach ($videos as $video) {
    $cnt++;
    ?>
    <div class="videoBoxElem" style="height: 160px">
        <div style="margin-bottom: 0px">
        </div>
        <div style="clear: both"></div>
        <div style="border:1px solid white; margin: 0 10px 10px 0; float: left">
            <div class="boxgrid captionfull">
                <A HREF="/videos/view/<?= $video["id"] ?>/<?= $video["bandname"] ?>">
                    <img src="http://img.youtube.com/vi/<?= $video["tubecode"] ?>/0.jpg" class="tubevideo">

                </a>
                <div class="cover boxcaption">
                    <p><?= $video["songtitle"] ?><br/></p>
                </div>
            </div>
        </div>
        <div style="margin: 0px; float: left; ">
            <A HREF="/videos/view/<?= $video["id"] ?>/<?= $video["bandname"] ?>">
                <img src="<?php echo base_url(); ?>webroot/img/heart.png" width=10 border="0">
                <span class="bandname"><?= $video["bandname"] ?></span>
            </A><br/><br/>
        </div>
        <div style="clear: both"></div>
    </div>
<?php } ?>
<div id='pagination'>
    <? //echo $this->pagination->create_links(); ?>
    <?= $pagination ?>
</div> 
