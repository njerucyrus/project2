<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 03/05/2017
 * Time: 11:54
 */
require_once __DIR__.'/../vendor/autoload.php';
$counter=1;
$groupSavings=\Hudutech\Controller\SavingController::showGroupSavingsLog();
//print_r($groupSaving);
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
        Group Savings
    </div>




    <div class="table-responsive">

        <table class="table">
            <thead>
            <tr class="bg-primary">
                <th>#</th>
                <th>GroupName</th>
                <th>GroupSaving</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($groupSavings as $groupSaving ): ?>
                <tr>
                    <td><?php echo $counter++?></td>
                    <td><?php echo $groupSaving['groupName']?></td>
                    <td><?php echo $groupSaving['total_group_savings']?></td>



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
