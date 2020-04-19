<?php

$this->arSesUsr = $this->session->all_userdata();
//print_r($this->arSesUsr);
/*Array ( [session_id] => 2c75f15602742b8ffb3ec85d504f80cc [ip_address] => 127.0.0.1 [user_agent] => Mozilla/5.0 (Windows NT 5.1; rv:6.0) Gecko/2010010 [last_activity] => 1314802717
[username] => Admins [email] => demo@yahoo.com [logged_in] => 1 [id] => 1 )
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>

    <title>
        Eopp cakeMelody Social Bookmark 2.0 CodeIgniter
    </title>

    <!--
        This website is powered by CodeIgniter -
        CodeIgniter : the rapid development php framework
        CodeIgniter enables PHP users at all levels to rapidly develop robust web applications.

        CodeIgniter is a free open source Framework licensed under GNU/GPL.
        Information and contribution at http://codeigniter.com/
    -->

    <meta name="keywords" content="Social Portal, Youtube Songs, Favourites "/>
    <meta name="description" content="Social Portal - Keep your favourite songs in your list"/>

    <link href="<?php echo base_url(); ?>webroot/favicon.ico" type="image/x-icon" rel="icon"/>
    <!-- <link href="<?php echo base_url(); ?>webroot/favicon.ico" type="image/x-icon" rel="shortcut icon"/> -->

    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>webroot/css/jquery-impromptu.3.1.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>webroot/css/tipTip.css"/>

    <script type="text/javascript" src="<?php echo base_url(); ?>webroot/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>webroot/js/jquery_ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>webroot/js/boxgrid.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>webroot/js/jquery.tipTip.minified.js"></script>
    <!-- jquery.tipTip -->
    <script type="text/javascript" src="<?php echo base_url(); ?>webroot/js/jquery-impromptu.3.1.js"></script>
    <!-- jquery-impromptu -->

    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script> -->

    <?php
    if (strstr($_SERVER['HTTP_USER_AGENT'], 'MSIE 7.')) {
        echo '<meta http-equiv="X-UA-Compatible" content="IE=7" />';
    }
    ?>

    <script type="text/javascript">
        // tiptip tooltip jquery
        $(function () {
            $(".tipnfo").tipTip({maxWidth: "200px", edgeOffset: 10});
        });
    </script>

</head>

<body>
<!-- Navigatore -->
<div id="navxbar">
    <div id="navbar">
        <div style="float: left; margin: 8px 20px 5px 0">
            <? if ($this->session->userdata('username')) { ?>
                Logged as: &nbsp; <A HREF=""><?= $this->session->userdata('username'); ?></A> |
                <A HREF="<?php echo base_url(); ?>users/logout">Logout</A>
            <?php } else { ?>
                <?php echo form_open(base_url() . 'users/login/'); ?>
                <table>
                    <tr>
                        <td>
                            Login: &nbsp;
                            <?php echo form_input(array('name' => 'username', 'value' => 'email@', 'type' => 'text', 'class' => 'input_medium', 'size' => '15', 'onfocus' => "this.value=&quot;&quot;", "id" => "UserUsername")) . ''; ?>
                            <br/>
                        </td>
                        <td>
                            <?php echo form_input(array('name' => 'password', 'value' => 'password', 'type' => 'password', 'class' => 'input_medium', 'size' => '15', 'onfocus' => "this.value=&quot;&quot;", "id" => "UserPassword")) . ''; ?>
                            <br/>
                        </td>
                        <td>
                            <div class="submit"><input type="submit" value="Login"/></div>
                        </td>
                    </tr>
                </table>
                <?php echo form_close(); ?>
            <?php } ?>
        </div>

        <!-- Search Box -->
        <div id="searchform" style="float: right; margin: 10px 20px 5px 0">
            <?php echo form_open(base_url() . 'videos/search/'); ?>
            <label for="searchq"></label>
            <input type="text" name="searchq" id="searchq" size="30" value="Search" onfocus='this.value=""'/>
            </form>
        </div>
        <!-- / Search Box -->
    </div>
</div>
<!-- / Navigatore -->
<div id="breadcrumb" style="">
    <!-- You are here: &nbsp; --><!--  http:// --><? //$_SERVER['HTTP_HOST']?><? //$_SERVER['REQUEST_URI']?>
    <div id="menutop" style="float: left">
        <a href="<?php echo base_url(); ?>videos/index/" id="">Home</a> |
        <a href="<?php echo base_url(); ?>videos/topvideos/" id="">Top Videos</a> |
        <a href="<?php echo base_url(); ?>videos/newvideos/" id="">Fresh Videos</a> |
        <a href="<?php echo base_url(); ?>infos/contactus/" id="">Impressum</a> |
        <a href="<?php echo base_url(); ?>users/register/" id="">Register</a> |
        <a href="<?php echo base_url(); ?>users/login/" id="">Login </a> |
        <a href="<?php echo base_url(); ?>infos/whatisthis/" id="">What is this?</a> |
    </div>
    <div id="menutoplogo" style="float: right"></div>
    <div style="clear: both"></div>
</div>
<div id="middlepage" style="">
    <!-- Contenitore -->
    <div id="content">
        <!-- Contenitore Sinistro -->
        <div id="contentleft">