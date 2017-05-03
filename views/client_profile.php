<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 03/05/2017
 * Time: 20:33
 */
require_once __DIR__.'/../vendor/autoload.php';
$client = \Hudutech\Controller\ClientController::getId($_GET['id']);
?>
<!DOCTYPE html>
<html>
<!--starting head-->
<?php
include_once 'head_views.php';

?>
<!--end of head-->

<body>
<!--start menu-->
<?php
include __DIR__.'/right_menu_views.php';
?>
<!--stop menu-->
<div class="container-fluid">
    <div class="row">
        <div class="fb-profile">

            <img align="left" class="fb-image-profile thumbnail " src="../public/assets/img/profile_default.jpg" alt="Profile image example"/>
            <div class="fb-profile-text">
                <h1>Name: <?php echo $client['fullName']?></h1>
                <h1>Group: Kamakwa Group</h1>

            </div>
        </div>
    </div>
</div> <!-- /container fluid-->
<div class="container">
    <div class="col-sm-10">

        <div data-spy="scroll" class="tabbable-panel">
            <div class="tabbable-line">
                <ul class="nav nav-tabs ">
                    <li class="active">
                        <a href="#tab_default_1" data-toggle="tab">
                            Personal Information </a>
                    </li>
                    <li>
                        <a href="#tab_default_2" data-toggle="tab">
                            Contact Information</a>
                    </li>
                    <li>
                        <a href="#tab_default_3" data-toggle="tab">
                            Resident Information</a>
                    </li>
                    <li>
                        <a href="#tab_default_4" data-toggle="tab">
                            Next of kin Information</a>
                    </li>
                    <li>
                        <a href="#tab_default_5" data-toggle="tab">
                            Expectation Details</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_default_1">

                        <p>
                            Personal Information
                        </p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Full Name:</label>
                                    <p> MBA/PGDM</p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Membership Number:</label>
                                    <p> pune, maharashtra</p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Identity card number:</label>
                                    <p> pune, maharashtra</p>
                                </div>
                                <div class="form-group">
                                    <label for="email">KRA Pin Number:</label>
                                    <p> pune, maharashtra</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Date Of Birth:</label>
                                    <p> pune, maharashtra</p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Date of enrollment:</label>
                                    <p> pune, maharashtra</p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Occupation:</label>
                                    <p> pune, maharashtra</p>
                                </div>


                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="tab_default_2">
                        <p>
                            Contact Information
                        </p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Phone Number:</label>
                                    <p> MBA/PGDM</p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <p> pune, maharashtra</p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Postal Address:</label>
                                    <p> pune, maharashtra</p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Emergency contacts:</label>
                                    <p> pune, maharashtra</p>
                                </div>
                            </div>

                        </div>



                    </div>
                    <div class="tab-pane" id="tab_default_3">
                        <p>
                            Resident Information Details
                        </p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">County:</label>
                                    <p> MBA/PGDM</p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Sub County:</label>
                                    <p> pune, maharashtra</p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Location:</label>
                                    <p> pune, maharashtra</p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Sub Location:</label>
                                    <p> pune, maharashtra</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Village/Estate:</label>
                                    <p> pune, maharashtra</p>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_default_4">
                        <p>
                            Next of kin  Information

                        </p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Full Name:</label>
                                    <p> MBA/PGDM</p>
                                </div>

                                <div class="form-group">
                                    <label for="email">Contact:</label>
                                    <p> pune, maharashtra</p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Relationship:</label>
                                    <p> pune, maharashtra</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="tab_default_5">
                        <p>
                            Expectation Details

                        </p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Expectation:</label>
                                    <p> MBA/PGDM</p>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<script src="../public/assets/js/jquery-3.2.0.slim.min.js"></script>
<script src="../public/assets/js/bootstrap.min.js"></script>
</body>
</html>
