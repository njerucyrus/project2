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
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($employees as $employee ): ?>
                <tr>
                    <td><? echo $counter++ ?></td>
                    <td><? echo $employee['pf_no'] ?></td>
                    <td><? echo $employee['full_name'] ?></td>
                    <td><? echo $employee['job_title'] ?></td>
                    <td><? echo $employee['id_no'] ?></td>
                    <td><? echo $employee['nssf_no'] ?></td>
                    <td><? echo $employee['nhif_no'] ?></td>
                    <td><? echo $employee['kra_pin'] ?></td>
                    <td><? echo $employee['remuneration'] ?></td>
                    <td><? echo $employee['bank_name'] ?></td>
                    <td><? echo $employee['bank_account_no'] ?></td>
                    <td><? echo $employee['phone_number'] ?></td>
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
