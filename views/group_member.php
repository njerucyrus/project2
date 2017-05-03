<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 02/05/2017
 * Time: 15:51
 */
require_once __DIR__.'/../vendor/autoload.php';

//print_r($clients);
$counter = 1;



$groups = \Hudutech\Controller\GroupController::all();

//$groups = \Hudutech\Controller\GroupController::customFilter($table,$tableColumns,$options);
//$groups = \Hudutech\Controller\GroupController::search($table,$tableColumns,$searchText);
//print_r(json_encode($groups));


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
<?php include 'head_views.php'; ?>
<body>
<!--start menu-->
<?php
include __DIR__.'/right_menu_views.php';
?>
<!--stop menu-->
<div class="container-fluid" style="margin-top: 70px;">
    <div class="h2" style="text-align: center;">
        Group Members
    </div>




    <div class="table-responsive">
        <div class="col-md-5 pull-left">
            <div class="col-sm-5">

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
        <table class="table">
            <thead>
            <tr class="bg-primary">
                <th>#</th>
                <th>FullName</th>
                <th>GroupRefNo</th>
                <th>MembershipNo</th>
                <th>ID</th>
                <th>KRA PIN</th>
                <th>PhoneNumber</th>
                <th>Email</th>
                <th>County</th>

                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($clients as $client ): ?>
                <tr>
                    <td><?php echo $counter++?></td>
                    <td><?php echo $client['fullName']?></td>
                    <td><?php echo $client['groupRefNo']?></td>
                    <td><?php echo $client['membershipNo']?></td>
                    <td><?php echo $client['idNo']?></td>
                    <td><?php echo $client['kraPin']?></td>
                    <td><?php echo $client['phoneNumber']?></td>
                    <td><?php echo $client['email']?></td>
                    <td><?php echo $client['county']?></td>

                    <td colspan="3">
                        <button class="btn btn-xs btn-primary">Edit</button>
                        <button class="btn btn-xs btn-success">ViewMore</button>
                        <button class="btn btn-xs btn-danger">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
<script src="../public/assets/js/jquery-3.2.0.slim.min.js"></script>
<script src="../public/assets/js/bootstrap.min.js"></script>
</body>
</html>




