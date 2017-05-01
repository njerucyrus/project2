<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 25/04/2017
 * Time: 11:19
 */
require_once __DIR__.'/../vendor/autoload.php';
include  __DIR__.'/includes/register_group.inc.php';
?>
<!doctype html>
<html>
<!--start head-->
<?php
include 'head_views.php';
?>
<!--stop head-->
<body>

<?php
include __DIR__.'/right_menu_views.php';
?>
<!-- Name Section -->
<div class="row">
    <div>
        <?php if($errorMsg == '' and $successMsg != '') {?>
            <div class="alert alert-success">
                <?php echo $successMsg; ?>
            </div>
        <?php } ?>
    </div>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >

            <div class="col-md-8 col-md-offset-1">
        <form class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" METHOD="post">
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
                        <input type="text" name="ref_no" placeholder="Reference number" class="form-control">
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
                        <input type="text" name="region" placeholder="Region of location" class="form-control">
                    </div>

                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-5">
                        <input type="text" name="official_contact" placeholder="Group officials’ contact" class="form-control">
                    </div>

                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-5">
                        <input type="text" name="monthly_meeting_schedule" placeholder="Monthly meeting schedules" class="form-control">
                    </div>

                </div>


                <div class="form-group">
                <div class="col-sm-5">

                    <input placeholder="Date of formation" name="date_formed" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" >
                </div>
                </div>


                <!-- Command -->
                <div class="form-group">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="pull-left">
                            <button type="submit" class="btn btn-danger  ">Cancel</button>
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
<!--javascript-->


<script src="../public/assets/js/jquery-3.2.0.slim.min.js"></script>
<script src="../public/assets/js/bootstrap.min.js"></script>
</body>
</html>