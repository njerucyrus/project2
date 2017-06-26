<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/3/17
 * Time: 11:26 AM
 */

require_once __DIR__.'/vendor/autoload.php';
$clientId = 1;
$loanId = 2; // id for loan eg monthly trimester, longTerm;
$loanAmount = 4000;
//$loan = \Hudutech\Controller\LoanController::lendLoan($clientId, $loanId, $loanAmount);
//print_r($loan);

//$loan = new \Hudutech\Controller\LoanController(new \Hudutech\DBManager\DB());


$serv = \Hudutech\Controller\LoanController::serviceLoan(1, 7, 600);
print_r($serv);


