<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 04/05/2017
 * Time: 13:58
 */
require_once __DIR__ . '/../vendor/autoload.php';
$groups = \Hudutech\Controller\GroupController::all();
$counter = 1;


$refNo = isset($_POST['group_ref_no']) ? $_POST['group_ref_no'] : false;

if ($refNo) {
    $table = 'clients';
    $searchText = $refNo;
    $tableColumns = ['groupRefNo'];
    $options = array(
        // "groupName"=>'KAMAKWA GROUP',
        "refNo" => $refNo
    );

    $clients = \Hudutech\Controller\ClientController::search($table, $tableColumns, $searchText);

} else {
    $clients = \Hudutech\Controller\ClientController::all();

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
                                <th>Today Contribution</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($contributions as $contribution): ?>
                          <tr>
                              <td><?php echo $contribution['fullName'] ?></td>
                              <td><?php echo $contribution['amount'] ?></td>
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
