<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 03/05/2017
 * Time: 20:33
 */
require_once __DIR__ . '/../vendor/autoload.php';
$counter = 1;
$client = \Hudutech\Controller\ClientController::getId($_GET['id']);
$groups = \Hudutech\Controller\GroupController::all();
$savings = \Hudutech\Controller\SavingController::getClientTotalSavings($_GET['id']);
$singleClientSavings = \Hudutech\Controller\SavingController::showClientSavingsLog($_GET['id']);
//print_r($client);
foreach ($groups as $group):

    if ($group['refNo'] == $client['groupRefNo']) {
        $groupName = $group['groupName'];

    }
endforeach;
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
include __DIR__ . '/right_menu_views.php';
?>
<!--stop menu-->
<div class="container-fluid" style="padding-top: 100px;">
    <div class="row">
        <div class="fb-profile">

            <div class="fb-profile-text">
                <img align="left" class="fb-image-profile thumbnail " height="150px" width="100px"
                     src="../public/assets/img/profile_default.jpg" alt="Profile image example"/>

                <h2><b>Name:</b> <?php echo $client['fullName'] ?></h2>
                <h3><b>Group:</b> <?php echo $groupName ?></h3>

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
                                    <p><?php echo $client['fullName'] ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Membership Number:</label>
                                    <p> <?php echo $client['membershipNo'] ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Identity card number:</label>
                                    <p> <?php echo $client['idNo'] ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">KRA Pin Number:</label>
                                    <p> <?php echo $client['kraPin'] ?></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Date Of Birth:</label>
                                    <p> <?php echo $client['dob'] ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Date of enrollment:</label>
                                    <p> <?php echo $client['dateEnrolled'] ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Occupation:</label>
                                    <p> <?php echo $client['occupation'] ?></p>
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
                                    <p> <?php echo $client['phoneNumber'] ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <p> <?php echo $client['email'] ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Postal Address:</label>
                                    <p> <?php echo $client['postalAddress'] ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Emergency contacts:</label>
                                    <p> <?php echo $client['emergencyContact'] ?></p>
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
                                    <p><?php echo $client['county'] ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Sub County:</label>
                                    <p> <?php echo $client['subCounty'] ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Location:</label>
                                    <p> <?php echo $client['location'] ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Sub Location:</label>
                                    <p><?php echo $client['subLocation'] ?></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Village/Estate:</label>
                                    <p> <?php echo $client['village'] ?></p>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_default_4">
                        <p>
                            Next of kin Information

                        </p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Full Name:</label>
                                    <p> <?php echo $client['nokName'] ?></p>
                                </div>

                                <div class="form-group">
                                    <label for="email">Contact:</label>
                                    <p> <?php echo $client['nokContact'] ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Relationship:</label>
                                    <p> <?php echo $client['nokRelationship'] ?></p>
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
                                    <p> <?php echo $client['expectation'] ?></p>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col col-md-12" style="margin: 5px;">
                <div class="table-responsive">

                    <table class="table">
                        <h3>Saving Log</h3>
                        <thead>
                        <tr class="bg-primary">
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Contribution</th>
                            <th>Payment Method</th>
                            <th>Date Paid</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($singleClientSavings as $clientSaving): ?>
                            <tr>
                                <td><?php echo $counter++ ?></td>
                                <td><?php echo $clientSaving['fullName'] ?></td>
                                <td><?php echo $clientSaving['contribution'] ?></td>
                                <td><?php echo $clientSaving['paymentMethod'] ?></td>
                                <td><?php echo $clientSaving['datePaid'] ?></td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="jumbotron">
                    <h3>Total Savings <?php echo $savings['totalSavings'] ?></h3>
                </div>
            </div>
        </div>
    </div>

</div>


<script src="../public/assets/js/jquery-3.2.0.slim.min.js"></script>
<script src="../public/assets/js/bootstrap.min.js"></script>
</body>
</html>
