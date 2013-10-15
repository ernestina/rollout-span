<!DOCTYPE html>
<html>
    <head>
        <title>.:SIMS - LOGIN:.</title>
        <script src="<?php echo URL; ?>public/js/jquery-2.0.3.min.js"></script>
        <link rel="stylesheet" href="<?php echo URL; ?>public/js/jquery-ui-1.10.3/themes/base/jquery.ui.all.css">

        <script src="<?php echo URL; ?>public/js/jquery-ui.js"></script>
        <script src="<?php echo URL; ?>public/js/jquery.form.js"></script>
        <script src="<?php echo URL; ?>public/js/myjs.js"></script>
        <script src="<?php echo URL; ?>public/js/teamdf-jquery-number/jquery.number.js"></script>
        <link href="<?php echo URL; ?>public/css/style.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/css/form.css" rel="stylesheet">
    </head>
    <body>
        <?php
        if (isset($this->error)) {
            echo "<div style='color:red' id=notfound><h2>" . $this->error . "<h2></div>";
        }
        ?>
        <div class="login-container">
                <?php
                if (isset($this->error)) {
                    echo "<div style='color:red' id=notfound><h2>" . $this->error . "<h2></div>";
                }
                ?>
                <h1>Login</h1>
                <form id="login-form" action="<?php echo URL; ?>auth/login" method="post">	<div class="row">
                        <label>Username <input name="user" id="nuser" type="text" /> </label>
                        <div class="error" id="wuser" style="display:none"></div>	</div>
                    <div class="row">
                        <label>Password <input style="" name="pass" id="pass" type="password" /> </label>
                        <div class="error" id="wpass" style="display:none"></div>	</div>
                    <div class="row buttons">
                        <label> <input id="button" type="submit" name="yt0" value="Login" onClick="return cek()"/> </label>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

<script type="text/javascript">
    $(function(){
        var notfound = document.getElementById('notfound');
        $('#nuser').focus();
        $('#wuser').fadeOut();
        $('#wpass').fadeOut();
        $('#nuser').keyup(function(){
            if(notfound!=null){
                $('#notfound').fadeOut(200);
            }
            if($('#nuser').val()!=''){
                $('#wuser').fadeOut(200);
            }
        })
        $('#pass').keyup(function(){
            if(notfound!=null){
                $('#notfound').fadeOut(200);
            }
            if($('#npass').val()!=''){
                $('#wpass').fadeOut(200);
            }
        })
    })

    function cek(){
        var jml=0;
        if(document.getElementById('nuser').value==''){
            var data = "Isikan nama user anda!";
            $('#wuser').fadeIn(200);
            $('#wuser').html(data);
            jml++;
        }
    
        if(document.getElementById('pass').value==''){
            var data = "Isikan password anda!";
            $('#wpass').fadeIn(200);
            $('#wpass').html(data);
            jml++;
        }
    
        if(jml>0){
            return false;
        }else{
            return true;
        }
    }

</script>