<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 04/05/2017
 * Time: 00:25
 */
?>
<!DOCTYPE html>
<html>
<?php
include_once 'head_views.php';

?>
<body style=" margin-bottom: 13.5%;height: 100%;background-repeat: no-repeat; background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));">
<div class="container" >
    <div>

    </div>
    <div class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"><h3 style="text-align: center">Rep Management System</h3></p>
        <form class="form-signin">
            <span id="reauth-email" class="reauth-email"></span>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <div id="remember" class="checkbox">

            </div>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Log in</button>
        </form><!-- /form -->

    </div><!-- /card-container -->
</div><!-- /container -->
<script src="../public/assets/js/jquery-3.2.0.slim.min.js"></script>
<script src="../public/assets/js/custom.js"></script>
<script src="../public/assets/js/bootstrap.js"></script>
</body>
</html>
