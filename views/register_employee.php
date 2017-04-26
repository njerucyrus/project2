<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 25/04/2017
 * Time: 11:19
 */
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width",initial-scale="1.0">
    <title> rep sacco</title>
    <link href= "../public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/assets/css/custom.css " rel="stylesheet">
    <script src="../public/assets/js/respond.js"></script>
</head>
<body>
<!-- Name Section -->
<div class="row">
    <div class="col-md-8 col-md-offset-1">
        <form class="form-horizontal" role="form">
            <fieldset>

                <!-- Form Name -->
                <legend>Personal Information Details</legend>

                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="text" name="fistName" placeholder="First Name" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="middleName" placeholder="Middle Name" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="lastName" placeholder="Last Name" class="form-control">
                    </div>
                </div>



                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="text" name="pf_number" placeholder="Personal file number (PF No)" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="job_title" placeholder="Job title" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="job_grade" placeholder="Job Grade" class="form-control">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="text" name="id_number" placeholder="Identity card number" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="kra_umber" placeholder="KRA Pin Number" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="nssf_number" placeholder="NSSF Number" class="form-control">
                    </div>
                </div>

                <legend>Contact Information Details</legend>
                <!-- Text input-->
                <div class="form-group">

                    <div class="col-sm-4">
                        <input type="text" name="phone" placeholder="Phone Number" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="email" placeholder="email" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="postal_address" placeholder="postal address" class="form-control">
                    </div>
                </div>

                <!-- Address Section -->
                <!-- Form Name -->
                <legend>Job Details</legend>
                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="number" name="remuneration" placeholder="Remuneration" class="form-control">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-10">
                        <textarea placeholder="Job description" cols="10" rows="2" class="form-control" name="job description" ></textarea>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-10">
                        <textarea placeholder="qualifications" cols="10" rows="2" class="form-control" name="Qualifications" ></textarea>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-10">
                        <textarea placeholder="testimonials" cols="10" rows="2" class="form-control" name="Testimonials" ></textarea>
                    </div>
                </div>

                <!-- Parent/Guadian Contact Section -->
                <!-- Form Name -->
                <legend>Bank Account Details</legend>
                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-5">
                        <input type="text" name="bank_name" placeholder="Bank Name" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="text" name="account_number" placeholder="Account Number" class="form-control">
                    </div>

                </div>


                <!-- Emergency Contact Section -->
                <!-- Form Name -->
                <legend>Next of kin  Information</legend>
                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-5">
                        <input type="text" name="nok_name" placeholder="Full Name" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="text" name="nok_relationship" placeholder="Relationship" class="form-control">
                    </div>

                </div>
                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-5">
                        <input type="text" name="nok_phone" placeholder="Phone Number" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <input type="text" name="nok_email" placeholder="Email" class="form-control">
                    </div>

                </div>


                <!-- Command -->
                <div class="form-group">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-danger">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
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