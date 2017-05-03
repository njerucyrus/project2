<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/26/17
 * Time: 11:54 AM
 */

require_once __DIR__.'/vendor/autoload.php';

//$ctrl = \Hudutech\Controller\SavingController::all();
//print_r($ctrl);

//$ctrl = \Hudutech\Controller\ClientController::getLoanLimit(1)
//$ctrl = \Hudutech\Controller\EmployeeController::getEmployeeObject(1);

$ctrl = \Hudutech\Controller\LoanController::getLoanObject(1);
$currentDate = "2017-11-31";
$monthOne = date('Y-m-d', strtotime($currentDate. ' + 30 days'));
echo $monthOne.PHP_EOL;
$monthTwo = date('Y-m-d', strtotime($monthOne. ' + 30 days'));
$monthThree = date('Y-m-d', strtotime($monthTwo. ' + 30 days'));
echo $monthTwo.PHP_EOL;
echo $monthThree;

echo "datetime ". date("Y-m-d h:i:s");