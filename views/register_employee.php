<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 25/04/2017
 * Time: 11:19
 */
require_once __DIR__.'/../vendor/autoload.php';
include  __DIR__.'/includes/register_employee.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add website</title>

    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>




<div id="wrapper">
    <?php include_once 'right_menu.php'?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Register Employee</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Fill Employee Details


                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div>
                                <?php if($errorMsg == '' and $successMsg != '') {?>
                                    <div class="alert alert-success">
                                        <?php echo $successMsg; ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-10 col-md-offset-1">
                                <form class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" METHOD="post">
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
                                                <input type="text" name="pf_no" placeholder="Personal file number (PF No)" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="id_no" placeholder="Identity card number" class="form-control">
                                            </div>

                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">

                                            <div class="col-sm-4">
                                                <input type="text" name="kra_pin" placeholder="KRA Pin Number" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="nssf_no" placeholder="NSSF Number" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="nhif_no" placeholder="NHIF Number" class="form-control">
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

                                        <!-- Address Section -->
                                        <!-- Form Name -->
                                        <legend>Job Details</legend>
                                        <div class="form-group">
                                            <div class="col-sm-5">
                                                <input type="text" name="job_title" placeholder="Job title" class="form-control">
                                            </div>
                                            <div class="col-sm-5">
                                                <input type="text" name="job_grade" placeholder="Job Grade" class="form-control">
                                            </div>
                                        </div>
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                <input type="number" name="remuneration" placeholder="Remuneration" class="form-control">
                                            </div>
                                        </div>
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                <textarea placeholder="Job description" cols="10" rows="2" class="form-control" name="job_description" ></textarea>
                                            </div>
                                        </div>
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                <textarea placeholder="Qualifications" cols="10" rows="2" class="form-control" name="qualification" ></textarea>
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                <textarea placeholder="Testimonials" cols="10" rows="2" class="form-control" name="testimonial" ></textarea>
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
                                                <input type="text" name="bank_account_no" placeholder="Account Number" class="form-control">
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
                                                <input type="text" name="nok_contact" placeholder="Contact" class="form-control">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--start menu-->
<?php
include 'footer.php';
?>

</body>
</html>