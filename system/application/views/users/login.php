<h1>Login</h1>

<div id="login">
    <?php
    /*if($error == "true") {
        //echo "<p>Die Login-Informationen konnten nicht verifiziert werden, kontrollieren Sie ihre Daten und versuchen Sie es erneut</p>";
    }*/

    //$arSesUsr = $this->session->all_userdata();

    if (!$this->arSesUsr["username"]) {
        echo form_open(base_url() . 'users/login/');
        ?>
        Username<br/>
        <?php echo form_input(array('name' => 'username', 'value' => '', 'type' => 'text', 'class' => 'input_medium', 'size' => '15')); ?>
        <br/><br/>
        Passwort<br/>
        <?php echo form_input(array('name' => 'password', 'value' => '', 'type' => 'text', 'class' => 'input_medium', 'size' => '15')); ?>
        <br/>
        <?php
        $buttonSubmit = array('name' => 'Login', 'value' => 'Login');
        echo form_submit($buttonSubmit);
        echo form_close();
        ?>
        <?php
    } else {
        echo "<p>You are already logged</p>";
    }
    ?>
</div>
<?php if (!$this->arSesUsr["username"]) { ?>
    <div id="login_foot">
        <?php echo anchor(base_url() . 'users/register', 'Register', array('title' => 'Register here!')); ?>
    </div>
<?php } ?>