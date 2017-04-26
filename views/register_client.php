<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 25/04/2017
 * Time: 11:19
 */
require_once __DIR__.'/../vendor/autoload.php';
include  __DIR__.'/includes/register_client.inc.php';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width",initial-scale="1.0">
    <title> REP SACCO</title>
    <link href= "../public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/assets/css/custom.css " rel="stylesheet">
    <script src="../public/assets/js/respond.js"></script>
</head>
<body>
<!-- Name Section -->
<div class="row">
    <div class="col-md-8 col-md-offset-1">
        <form class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" METHOD="post">
            <fieldset>

                <!-- Form Name -->
                <legend>Personal Information Details</legend>

                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="text" name="first_name" placeholder="First Name" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="middle_name" placeholder="Middle Name" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="last_name" placeholder="Last Name" class="form-control">
                    </div>
                </div>



                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="text" name="membership_no" placeholder="Membership Number" class="form-control">
                    </div>

                    <div class="col-sm-4">
                        <input type="text" name="id_no" placeholder="Identity card number" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="kra_pin" placeholder="KRA Pin Number" class="form-control">
                    </div>




                    </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-4">

                        <input placeholder="Date Of Birth" name="dob"  class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" >
                    </div>

                    <div class="col-sm-4">

                        <input placeholder="Date of enrollment" name="date_enrolled" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" >
                    </div>

                    <div class="col-sm-4">
                        <input type="text" name="occupation" placeholder="Occupation" class="form-control">
                    </div>
                </div>



                <legend>Contact Information Details</legend>
                <!-- Text input-->
                <div class="form-group">

                    <div class="col-sm-4">
                        <input type="text" name="phone_number" placeholder="Phone Number" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="email" placeholder="email" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="postal_address" placeholder="postal address" class="form-control">
                    </div>
                </div>
<!--                text input-->
                <div class="form-group">
                  <div class="col-sm-8">
                        <input type="text" name="emergency_contact" placeholder="Emergency contacts (not group members)" class="form-control">
                    </div>
                </div>

                <legend>Resident Information Details</legend>
                <!-- Text input-->
                <div class="form-group">

                    <div class="col-sm-4">
                        <input type="text" name="county" placeholder="County" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="sub_county" placeholder="Sub County" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="location" placeholder="Location" class="form-control">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">

                    <div class="col-sm-4">
                        <input type="text" name="sub_location" placeholder="Sub Location" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="village" placeholder="village/estate" class="form-control">
                    </div>

                </div>

                <!-- Form Name -->
                <legend>Next of kin  Information</legend>
                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="text" name="nok_name" placeholder="Full Name" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="nok_contact" placeholder="Relationship" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="nok_relationship" placeholder="Relationship" class="form-control">
                    </div>

                </div>

                <!-- Address Section -->
                <!-- Form Name -->
                <legend>Expectation Details</legend>
               <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-10">
                        <textarea placeholder="expectation" cols="10" rows="3" class="form-control" name="Expectations" ></textarea>
                    </div>
                </div>

                <!-- Parent/Guadian Contact Section -->
                <!-- Form Name -->
                <legend>Group Details</legend>
                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-5">
                        <input type="text" name="group_reference_number" placeholder="Group reference number" class="form-control">
                    </div>


                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="checkbox" name="is_member_of_other_org" data-toggle="modal" data-target="#sibling">   Member of other organization ?
                    </div>
                </div>



                <!-- Command -->
                <div class="form-group">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-danger">Cancel</button>
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->


<!--javascript-->
<script src="../public/js/jquery-3.2.0.slim.min.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
</body>
</html>