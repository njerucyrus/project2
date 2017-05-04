<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 04/05/2017
 * Time: 13:58
 */
require_once __DIR__ . '/../vendor/autoload.php';
$contributions = \Hudutech\Controller\SavingController::getTodaySaving();
$successMsg = '';
$errorMsg = '';
if (isset($_POST['submit'])) {
    if (!empty($_POST['clientIdNo']) && !empty($_POST['contribution'])) {
        $table = "clients";
        $tableColumn = ["id", "groupRefNo"];
        $options = ["idNo" => $_POST['clientIdNo'], "limit" => 1];
        $client = \Hudutech\DBManager\ComplexQuery::customFilter($table, $tableColumn, $options);
        $clientId = $client[0]['id'];
        $groupRefNo = $client[0]['groupRefNo'];
        $table2 = "sacco_group";
        $tableColumn2 = ['id'];
        $options2 = ["refNo" => $groupRefNo, "limit" => 1];
        $group = \Hudutech\DBManager\ComplexQuery::customFilter($table2, $tableColumn2, $options2);
        $groupId = $group[0]['id'];
        $datePaid = date("Y-m-d h:i:s");

        $saving = new \Hudutech\Entity\Saving();
        $saving->setGroupId($groupId);
        $saving->setClientId($clientId);
        $saving->setCashRecieved($_POST['contribution']);
        $saving->setPaymentMethod("Cash");
        $saving->setDatePaid($datePaid);

        $savingCtrl = new \Hudutech\Controller\SavingController();
        $created = $savingCtrl->createSingle($saving);

        if ($created) {
            $successMsg .= "Contribution Received Successfully";
            header("Refresh:0");
        } else {
            $errorMsg .= "Error Occurred Contribution not recorded. Try again later";
        }
    } else {
        $errorMsg .= "All fields required";
    }
}
?>

<!DOCTYPE html>
<html>
<?php
include_once 'head_views.php';

?>
<body>
<!--start menu-->
<?php
include __DIR__ . '/right_menu_views.php';

?>
<!--stop menu-->
<div class="container-fluid" style="margin-top: 70px;">
    <div class="h2" style="text-align: center;">
        Record Savings
    </div>
    <div class="row">
        <div class="col col-md-12">
            <div class="col col-md-10">
            <div class="jumbotron">
                <div>
                    <?php
                    if(empty($successMsg) && !empty($errorMsg)){
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $errorMsg ?>
                        </div>
                        <?php
                    }
                    elseif(empty($errorMsg) and !empty($successMsg)){
                        ?>
                        <div class="alert alert-success alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $successMsg ?>
                        </div>

                        <?php
                    }

                    ?>
                </div>

                    <form class="form-group" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"
                          method="post">

                        <label for="clientIdNo">National Id:</label>
                        <input type="number" class="form-control" name="clientIdNo" id="clientIdNo" required>

                        <label for="contribution">Contribution:</label>
                        <input type="number" class="form-control" name="contribution" id="contribution" required>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit" style="margin-top: 10px;">
                    </form>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>FullName</th>
                                <th>Group</th>
                                <th>Today Contribution</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($contributions as $contribution): ?>
                          <tr>
                              <td><?php echo $contribution['fullName'] ?></td>
                              <td><?php echo $contribution['groupName'] ?></td>
                              <td><?php echo $contribution['contribution'] ?></td>
                          </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
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
