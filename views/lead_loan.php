<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 04/05/2017
 * Time: 00:42
 */
require_once __DIR__.'/../vendor/autoload.php';

$clients = \Hudutech\Controller\ClientController::all();
$loans= \Hudutech\Controller\LoanController::all();
include  __DIR__.'/includes/lead_loan.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    include_once 'head_views.php';

    ?>


    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <title>Admin</title>
</head>
<body style="height: 100%; margin-bottom: 15%;
    background-repeat: no-repeat;
    background-image: linear-gradient(rgb(250,250,250), rgb(236, 236, 236));">
<?php
//include __DIR__.'/right_menu_views.php';
?>

<div class="container">
    <div class="row main">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 class="title">Loan Leading</h1>
                <hr />
            </div>
        </div>
        <div class="main-login main-center">
            <div>
                <?php
                if(empty($success_msg) && !empty($error_msg)){
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $error_msg ?>
                    </div>
                    <?php
                }
                elseif(empty($error_msg) and !empty($success_msg)){
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $success_msg  ?>
                    </div>

                    <?php
                }
                else
                {
                    echo "";
                }
                ?>


            </div>
            <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Client Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <select name="clientId" class="form-control">
                                <option>--Select Client here--</option>
                                <?php foreach ($clients as $client): ?>
                                    <option value="<?php echo $client['id']?>"><?php echo $client['fullName']?></option>
                                <?php endforeach ?>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Loan Type</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-cog fa" aria-hidden="true"></i></span>
                            <select name="loanId" class="form-control">
                                <option>--Select Loan type--</option>
                                <?php foreach ($loans as $loan): ?>
                                    <option value="<?php echo $loan['id']?>"><?php echo $loan['loanType']?></option>
                                <?php endforeach ?>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Amount</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-money fa" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="amount"   placeholder="Loan amount" />

                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <input type="submit" name="submit" value="Save" class="btn btn-primary btn-lg btn-block login-button"></input>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="../public/assets/js/jquery-3.2.0.slim.min.js"></script>
<script src="../public/assets/js/bootstrap.min.js"></script>
</body>
</html>
