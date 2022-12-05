<?php
if (isset($_REQUEST['reg-suc'])) {
?>
    <div id="id011" class="modal " style="display: block;">
        <div class="login-msg">
            <div class="modal-content animate">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id011').style.display='none'" class="close" title="Close Modal">&times;</span>
                </div>
                <h6 style="color: green;">Your registration is successful!</h6>
                <div class="okbtn">
                    <button class="btn btn-primary btn-lg btn-block" onclick="document.getElementById('id011').style.display='none'" style="width:auto;">Ok</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>