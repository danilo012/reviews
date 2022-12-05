<!-- Student Login Section -->

<?php
if (isset($_REQUEST['stu-msg'])) {
?>
    <div id="id01" class="modal" style="display: block;">
    <?php
} else {
    ?>
        <div id="id01" class="modal">
        <?php
    }
        ?>
        <div class="login-form">
            <form class="modal-content animate" action="stu_login_ac.php" method="POST">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                </div>
                <h2>Student Login</h2>
                <div class="form-group has-error">
                    <button class="btn btn-primary btn-lg btn-block navbtn" onclick="document.getElementById('id02').style.display='block', document.getElementById('id01').style.display='none'" style="width:auto;">College Login</button>

                    <div class="form-group has-error">
                        <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="psw" placeholder="Password" required="required">
                    </div>

                    <?php
                    if (isset($_REQUEST['stu-msg'])) {
                    ?>
                        <div style="text-align: center; color: red; margin-bottom: 13px;">
                            Invalid email and password!
                        </div>
                    <?php
                    }
                    ?>

                    <div class="form-group">
                        <input type="submit" value="Login" class="btn btn-primary btn-lg btn-block">
                    </div>
                    <p><a href="#">Lost your Password?</a></p>
                </div>
            </form>
        </div>
        </div>

<!-- College Login Section -->

<?php
if (isset($_REQUEST['clg-msg'])) {
?>
    <div id="id02" class="modal" style="display: block;">
    <?php
} else {
    ?>
        <div id="id02" class="modal">
        <?php
    }
        ?>
        <div class="login-form">
            <form class="modal-content animate" action="clg_login_ac.php" method="POST">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                </div>
                <h2>College Login</h2>
                <div class="form-group has-error">
                    <button class="btn btn-primary btn-lg btn-block navbtn" onclick="document.getElementById('id01').style.display='block', document.getElementById('id02').style.display='none' " style="width:auto;">Student Login</button>
                    <div class="form-group has-error">
                        <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="psw" placeholder="Password" required="required">
                    </div>

                    <?php
                    if (isset($_REQUEST['clg-msg'])) {
                    ?>
                        <div style="text-align: center; color: red; margin-bottom: 13px;">
                            Invalid email and password!
                        </div>
                    <?php
                    }
                    ?>

                    <div class="form-group">
                        <input type="submit" value="Login" class="btn btn-primary btn-lg btn-block">
                    </div>
                    <p><a href="#">Lost your Password?</a></p>
                </div>
            </form>
        </div>
        </div>