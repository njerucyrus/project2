<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 04/05/2017
 * Time: 13:58
 */
require_once __DIR__.'/../vendor/autoload.php';
$groups = \Hudutech\Controller\GroupController::all();
$counter=1;


$refNo = isset($_POST['group_ref_no']) ? $_POST['group_ref_no'] : false;

if ($refNo) {
    $table= 'clients';
    $searchText = $refNo;
    $tableColumns= ['groupRefNo'];
    $options=array(
        // "groupName"=>'KAMAKWA GROUP',
        "refNo"=> $refNo
    );

    $clients = \Hudutech\Controller\ClientController::search($table,$tableColumns,$searchText);

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
include __DIR__.'/right_menu_views.php';
?>
<!--stop menu-->
<div class="container-fluid" style="margin-top: 70px;">
    <div class="h2" style="text-align: center;">
        Record Savings
    </div>




    <div class="table-responsive">
        <div class="col-md-5 pull-left">
            <div class="col-sm-5 form-horizontal">

                <form   role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" METHOD="post">
                    <select name="group_ref_no" class="form-control">
                        <option>--Select Group here--</option>
                        <?php foreach ($groups as $group): ?>
                            <option value="<?php echo $group['refNo']?>"><?php echo $group['groupName']?></option>
                        <?php endforeach ?>

                    </select>

                    <input type="submit" class="btn btn-primary" style="padding-top: 10px; margin-top: 5px; margin-bottom: 5px; margin-left: 5px;" value="View Group Members"/>
                </form>
            </div>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" METHOD="post" name="saving">
        <table class="table ">
            <thead>
            <tr class="bg-primary">
                <th>#</th>
                <th>FullName</th>


                <th>Id Number</th>
                <th>Contribution</th>



            </tr>
            </thead>
            <tbody>
            <?php foreach ($clients as $client ): ?>
                <tr>
                    <td><?php echo $counter++?></td>
                    <td><?php echo $client['fullName']?></td>


                    <td><?php echo $client['idNo']?></td>
                    <td><input type="number" min="200" name="amount[]" class="form-control" /></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="form-group col-md-3 col-md-offset-4">
            <input type="submit" name="submit" value="Submit Savings" class="btn btn-primary btn-lg btn-block login-button"/>
        </div>
        </form>
    </div>

</div>
<script src="../public/assets/js/jquery-3.2.0.slim.min.js"></script>
<script src="../public/assets/js/bootstrap.min.js"></script>
</body>
</html>
