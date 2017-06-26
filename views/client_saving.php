<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 03/05/2017
 * Time: 11:54
 */
require_once __DIR__.'/../vendor/autoload.php';
$counter=1;
$clientSavings=\Hudutech\Controller\SavingController::clientsTotalSavingsLog();
//print_r($clientSavings);
?>
<!DOCTYPE html>
<html>
<!--starting head-->
<?php
include_once 'head_views.php';
?>
<!--end of head-->
<!--start of menu-->
<?php
include_once 'right_menu_views.php';
?>
<!--end of menu-->
<div class="container-fluid" style="margin-top: 70px;">
    <div class="h2" style="text-align: center;">
        Client Savings
    </div>




    <div class="table-responsive">

        <table class="table">
            <thead>
            <tr class="bg-primary">
                <th>#</th>
                <th>Full Name</th>
                <th>Group Name</th>
                <th>Total Saving</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($clientSavings as $clientSaving ): ?>
                <tr>
                    <td><?php echo $counter++?></td>
                    <td><?php echo $clientSaving['fullName']?></td>
                    <td><?php echo $clientSaving['groupName']?></td>
                    <td><?php echo $clientSaving['totalSaving']?></td>

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
