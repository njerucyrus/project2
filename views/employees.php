<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/27/17
 * Time: 7:18 AM
 */
require_once __DIR__.'/../vendor/autoload.php';
$employees  = \Hudutech\Controller\EmployeeController::all();
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
<div class="container-fluid" style="padding-top: 10px;">
    <div class="h2" style="text-align: center;">
        Employees
    </div>

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
                <th>PF_No</th>
                <th>FullName</th>
                <th>JobTitle</th>
                <th>ID</th>
                <th>NSSF</th>
                <th>NHIF</th>
                <th>KRA PIN</th>
                <th>Remuneration</th>
                <th>BankName</th>
                <th>BankAccNo</th>
                <th>PhoneNumber</th>
                <th colspan="3"> Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($employees as $employee ): ?>
                <tr>
                    <td><?php echo $counter++ ?></td>
                    <td><?php echo $employee['pfNo'] ?></td>
                    <td><?php echo $employee['fullName'] ?></td>
                    <td><?php echo $employee['jobTitle'] ?></td>
                    <td><?php echo $employee['idNo'] ?></td>
                    <td><?php echo $employee['nssfNo'] ?></td>
                    <td><?php echo $employee['nhifNo'] ?></td>
                    <td><?php echo $employee['kraPin'] ?></td>
                    <td><?php echo $employee['remuneration'] ?></td>
                    <td><?php echo $employee['bankName'] ?></td>
                    <td><?php echo $employee['bankAccountNo'] ?></td>
                    <td><?php echo $employee['phoneNumber'] ?></td>
                    <td colspan="3" class="btn-xs">
                        <button class="btn-xs btn-primary">Edit</button>

                        <button class="btn-xs btn-danger">Delete</button>
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
