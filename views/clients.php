<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/27/17
 * Time: 7:18 AM
 */
require_once __DIR__.'/../vendor/autoload.php';
$clients = \Hudutech\Controller\ClientController::all();
$counter = 1;
?>
<!DOCTYPE html>
<html>
<?php include 'head_views.php'; ?>
<body>
<div class="container-fluid">

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
                    <td><? echo $counter++?></td>
                    <td><? echo $client['full_name']?></td>
                    <td><? echo $client['group_ref_no']?></td>
                    <td><? echo $client['membership_no']?></td>
                    <td><? echo $client['id_no']?></td>
                    <td><? echo $client['kra_pin']?></td>
                    <td><? echo $client['phone_number']?></td>
                    <td><? echo $client['email']?></td>
                    <td><? echo $client['county']?></td>

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

</body>
</html>



