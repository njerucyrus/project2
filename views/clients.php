<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/27/17
 * Time: 7:18 AM
 */
require_once __DIR__.'/../vendor/autoload.php';
$clients = \Hudutech\Controller\ClientController::all();
//print_r($clients);
$counter = 1;
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

    <div class="table-responsive">
        <div class="col-md-4 pull-right">
            <form style="padding: 10px;">
                <div class="form-inline">
                    <input type="text" class="form-control" placeholder="Search ...">
                    <input type="submit" class="btn btn-success" value="Go">
                </div>
            </form>
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



