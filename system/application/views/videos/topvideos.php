<div class="homeTitleBox">
<a href="/videos/">LATEST BOOKMARK VIDEOS</a> &nbsp;
</div>
<div style="clear: both"> </div>
<br>

<?php

//print_r($videos);

/*Array ( [0] => Array ( [id] => 139 [category_id] => 3 [bandname] => Awesome 3 [songtitle] => Don't Go [tubecode] => -4HhUSQA_7s [info] => [tags] => [recom] => 0 [date] => 2009-09-19 [hasimg] => 0 [removed] => 1 [ip1] => [ip2] => [views] => 334 [viewdate] => [user_id] => 1 ) [1] => Array ( [id] => 137 [category_id] => 3 [bandname] => Prodigy [songtitle] => Wind It Up [tubecode] => oJzGyBTEzfg [info] => [tags] => [recom] => 1 [date] => 2009-09-19 [hasimg] => 0 [removed] => 1 [ip1] => [ip2] => [views] => 334 [viewdate] => [user_id] => 1 ) [2] => Array ( [id] => 136 [category_id] => 3 [bandname] => Shades Of Rhythm [songtitle] => Sweet Sensation [tubecode] => 3UxCOP22vus [info] => [tags] => [recom] => 1 [date] => 2009-09-19 [hasimg] => 0 [removed] => 1 [ip1] => [ip2] => [views] => 335 [viewdate] => [user_id] */

$cnt = 0;

foreach($videos as $video){
	$cnt++;

	
?>

	<div class="videoBoxElem" style="height: 160px">
		<div style="margin-bottom: 0px">
					</div>

		<div style="clear: both"></div>
		
		<div style="border:1px solid white; margin: 0 10px 10px 0; float: left">
			<div class="boxgrid captionfull">
				<A HREF="/videos/view/<?=$video["id"]?>/<?=$video["bandname"]?>">
					<img src="http://img.youtube.com/vi/<?=$video["tubecode"]?>/0.jpg" class="tubevideo">

				</a>
				<div class="cover boxcaption">
					<p><?=$video["songtitle"]?><br/></p>
				</div>
			</div>
		</div>

		<div style="margin: 0px; float: left; ">

			<A HREF="/videos/view/<?=$video["id"]?>/<?=$video["bandname"]?>">
				<img src="<?php echo base_url(); ?>webroot/img/heart.png" width=10 border="0">
				<span class="bandname"><?=$video["bandname"]?></span>
			</A><br /><br />
		</div>
		<div style="clear: both"></div>
	</div>

<?
	}

?>
	
<div id='pagination'>
	<? //echo $this->pagination->create_links(); ?>
	<?=$pagination?>
</div> 
