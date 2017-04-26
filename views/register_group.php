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
                <legend>Group Information Details</legend>

                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-5">
                        <input type="text" name="group_name" placeholder="Name of group" class="form-control">
                    </div>

                </div>



                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-5">
                        <input type="text" name="reference_number" placeholder="Reference number" class="form-control">
                    </div>
                     </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-5">
                        <input type="text" name="number_of_members" placeholder="Number of members" class="form-control">
                    </div>

                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-5">
                        <input type="text" name="location" placeholder="Region of location" class="form-control">
                    </div>

                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-5">
                        <input type="text" name="officials_contact" placeholder="Group officials’ contact" class="form-control">
                    </div>

                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-5">
                        <input type="text" name="monthly_meeting_schedules" placeholder="Monthly meeting schedules" class="form-control">
                    </div>

                </div>


                <div class="form-group">
                <div class="col-sm-5">

                    <input placeholder="Date of formation" name="date_of_formation" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" >
                </div>
                </div>


                <!-- Command -->
                <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-1">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-danger  ">Cancel</button>
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