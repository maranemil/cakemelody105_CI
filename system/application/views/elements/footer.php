</div>
<div id="contentright">
    <?php if (isset($this->arSesUsr["username"])) { ?>
        <div class="sidebaruser">
            <ul class="sidebaruser">
                <li><a href="<?php echo base_url(); ?>videos/step1/1">Add Video</a></li>
            </ul>
        </div>
    <?php } ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Latest Posts -->
        <ul class="sidebar">
            <li style="background: #F0D000; padding: 10px 0 5px 10px">
                <img src="<?php echo base_url(); ?>webroot/img/cakemelody.gif" width="214" height="33"
                     alt="">
            </li>
            <li style="" id="downloadbutton">
                <a href="https://code.google.com/p/marancakemelody/" target="_blank" class="downloadbutton">
                    Download cakeMelody 1.04
                </a>
            </li>
            <li><a href="<?php echo base_url(); ?>videos/recommended/" id="">Recomended Videos</a></li>
            <li><a href="<?php echo base_url(); ?>videos/newvideos" id="">Fresh Videos</a></li>
            <li><a href="<?php echo base_url(); ?>videos/topvideos/" id="">Top Videos</a></li>
            <li><a href="<?php echo base_url(); ?>videos/" id="">Last Videos</a></li>
        </ul>
    </div>
    <div class="sidebarcat">
        <ul class="sidebarcat">
            <?php
            $arCat = $this->model_category->get();
            $this->arCatAll = $arCat->result_array(); // set array results
            //print_r($this->arCatAll);
            /*
            Array ( [0] => Array ( [id] => 16 [name] => Skale Tracker Songs ) [1] => Array ( [id] => 15 [name] => Radio SWR3 ) [2] => Array ( [id] => 14 [name] => Hed Kandi ) [3] => Array ( [id] => 13 [name] => Drum & Bass & Jungle ) [4] => Array ( [id] => 12 [name] => Best Romanian Songs ) [5] => Array ( [id] => 11 [name] => Progressive & Trance ) [6] => Array ( [id] => 10 [name] => Progressive & House ) [7] => Array ( [id] => 9 [name] => World & Reggae ) [8] => Array ( [id] => 8 [name] => Rock & Alternative ) [9] => Array ( [id] => 7 [name] => R'n'B ) [10] => Array ( [id] => 6 [name] => Pop ) [11] => Array ( [id] => 5 [name] => Latin ) [12] => Array ( [id] => 4 [name] => Hip-Hop ) [13] => Array ( [id] => 3 [name] => Dance ) [14] => Array ( [id] => 2 [name] => Blues & Slow ) [15] => Array ( [id] => 1 [name] => Best Rock Songs ) )
            */
            foreach ($this->arCatAll as $categ) {
                ?>
                <li><a href="<?php echo base_url(); ?>videos/category/<?= $categ["id"] ?>"
                       id=""><?= $categ["name"] ?></a></li>
                <?php
            }
            ?>
        </ul>
    </div>
    <br/>
    <div id="contentRtTags">
        <?php
        /*foreach($this->requestAction("/videos/getrandomvideotags/15") as $sVideo){

            $arTags = explode(" ",$sVideo["videos"]["tags"]);

            foreach($arTags as $sSnTag){
                if(strlen($sSnTag)>4){
                    $myfont = rand(8,18);
                    echo ' <A style="font: bold '.$myfont.'px arial; margin-right: 10px;" HREF="'.$this->webroot.'videos/search?searchq='.trim($sSnTag).'">'.ucfirst($sSnTag).'</A> ';
                }
            }
        }*/
        ?>
    </div>
    <br/>

    <!-- / Sidebar -->
</div>
<!-- / Contenitore Destro -->


<div style="clear:both;"></div>
</div>
<!-- / Contenitore -->


<div style="clear:both;"></div>
</div>


<!-- Footer Bar -->
<div id="footerbg">
    <!-- Footer -->
    <div id="footer">
        <!-- Footer Element Left -->
        <div id="footerleft">
            <H1>CodeIgniter Resources</H1><br/>
            <ul>
                <li><a href="https://www.open-blog.info/" target="_blank">Open blog</a></li>
                <li><a href="https://www.ionizecms.com/" target="_blank"> Ionize Cms </a></li>
                <li><a href="https://classroombookings.com/" target="_blank"> Classroom Bookings App</a></li>
                <li><a href="https://www.bambooinvoice.org/" target="_blank"> Bamboo Invoice App</a></li>
                <li><a href="https://blazeeboy.github.com/Codeigniter-Egypt/" target="_blank"> Egypt CMS</a></li>
                <li><a href="https://max-3000.com/" target="_blank"> Max CMS</a></li>
                <li><a href="https://myclientbase.com/" target="_blank"> MyClientBase Invoice App</a></li>
                <li><a href="https://www.getfuelcms.com/" target="_blank"> Getfuel Cms</a></li>
                <li><a href="https://codefight.org/" target="_blank"> CodeFight Cms</a></li>
                <li><a href="https://pyrocms.com/" target="_blank"> Pyro Cms</a></li>
                <li><a href="https://github.com/68kb/" target="_blank"> 68 Knowledge Base App</a></li>
                <li><a href="https://designelemental.net/sitemanagr" target="_blank"> Sitemanager App</a></li>
                <li><a href="https://sourceforge.net/projects/forumprojesi/" target="_blank"> Forum App</a></li>
                <li><a href="https://github.com/stblog/Stblog" target="_blank"> Stblog</a></li>
                <li><a href="https://github.com/eoinmcg/QuickSnaps" target="_blank"> QuickSnaps Gall App</a></li>
                <li><a href="https://github.com/ChrisBaines/Dove-Forums" target="_blank"> Dove Forum</a></li>
                <li><a href="https://github.com/valfreixo/Social-Network-Framework" target="_blank"> Social Network
                        Framework</a></li>
                <li><a href="https://github.com/indranil/scribe" target="_blank"> Simple blogging App</a></li>
                <li><a href="https://github.com/mengu/ciblog" target="_blank"> Blog system App</a></li>
                <li><a href="https://github.com/firstrow/ImageCMS" target="_blank"> Image CMS</a></li>
                <li><a href="https://github.com/viaduk/BookSharing" target="_blank"> Book Sharing social network</a>
                </li>
                <li><a href="https://github.com/lammoth/Cloubiz" target="_blank"> Social ecommerce platform</a></li>
                <li><a href="https://github.com/brenden/Ignited-Blog" target="_blank"> Blogging App</a></li>
                <li><a href="https://github.com/souzadavi/CMS" target="_blank"> Manager CMS</a></li>
                <li><a href="https://github.com/Ajmal/todo" target="_blank"> ToDo list App</a></li>
                <li><a href="https://github.com/bensonarts/GalleryCMS" target="_blank"> Photo gall CMS</a></li>
                <li><a href="https://fotochest.com/" target="_blank"> Fotochest gall CMS</a></li>
                <li><a href="https://net.tutsplus.com/tutorials/php/creating-a-file-hosting-site-with-codeigniter/"
                       target="_blank"> File Hosting App</a></li>
            </ul>
        </div>
        <!-- / Footer Element Left -->

        <!-- Blogroll -->
        <div id="footermiddle">
            <H1>Related Webs</H1><br/>
            <ul>
                <li><a href="https://codeigniter.com" target="_blank">codeigniter.com</a></li>
                <li><a href="https://www.hotscripts.com/" target="_blank">www.hotscripts.com</a></li>
                <li><a href="https://www.maran-emil.de/" target="_blank">www.maran-emil.de</a></li>
                <li><a href="https://code.google.com/" target="_blank">code.google.com</a></li>
                <li><a href="https://www.search-scripts.com/" target="_blank">www.search-scripts.com</a></li>
                <li><a href="https://www.youtube.com/" target="_blank">www.youtube.com</a></li>
                <li><a href="https://www.kewego.de/" target="_blank">www.kewego.de</a></li>
                <li><a href="https://www.imagine-things.com/" target="_blank">www.imagine-things.com</a></li>
            </ul>
        </div>
        <!-- / Blogroll -->

        <!-- Footer Element Right -->
        <div id="footerright">

            <!-- Credits -->

            <H1>Credits</H1>
            <p>
                Developed with Emil Maran ( https://www.maran-emil.de ).<br/>
                Copyright&copy; <?php echo date("Y"); ?> Emil Maran.<br/>
                Icons from iconarchive.com <br/>
            </p>
            <!-- / Credits -->
            <?php //echo $html->image("card.gif"); ?>
        </div>
        <!-- / Footer Element Right -->
    </div>
    <div style="clear: both"></div>
    <!-- / Footer -->
</div>
<!-- / Footer Bar -->

</body>
</html>