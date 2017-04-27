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

$ctrl = \Hudutech\Controller\ClientController::getLoanLimit(1);
print_r($ctrl);
