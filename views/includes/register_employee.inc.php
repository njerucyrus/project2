<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 26/04/2017
 * Time: 12:49
 */
require_once __DIR__.'/../../vendor/autoload.php';

$successMsg = '';
$errorMsg = '';
if(isset($_POST['first_name'], $_POST['middle_name'], $_POST['last_name'])) {
    $employee = new \Hudutech\Entity\Employee();
    $fullName = $_POST['first_name'] . " " . $_POST['middle_name'] . " " . $_POST['last_name'];
    $employee-> setPfNo($_POST['pf_no']);
    $employee-> setFullName($fullName);
    $employee-> setJobTitle($_POST['job_title']);
    $employee-> setIdNo($_POST['id_no']);







}
else{
    $errorMsg .= "KEY  FIELDS REQUIERED";
}
?>
