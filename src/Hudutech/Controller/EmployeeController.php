<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/25/17
 * Time: 12:03 PM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\EmployeeInterface;
use Hudutech\DBManager\DB;
use Hudutech\Entity\Employee;

class EmployeeController implements EmployeeInterface
{
    public function create(Employee $employee)
    {
        $db = new DB();
        $conn = $db->connect();

        $pfNo = $employee->getPfNo();
        $fullName = $employee->getFullName();
        $jobTitle = $employee->getJobTitle();
        $idNo = $employee->getIdNo();
        $nssfNo = $employee->getNssfNo();
        $nhifNo = $employee->getNhifNo();
        $remuneration = $employee->getRemuneration();
        $jobDescription = $employee->getJobDescription();
        $qualification = $employee->getQualification();
        $testimonial = $employee->getTestimonial();
        $bankName = $employee->getBankName();
        $bankAccountNo = $employee->getBankAccountNo();
        $postalAddress = $employee->getPostalAddress();
        $email = $employee->getEmail();
        $phoneNumber = $employee->getPhoneNumber();
        $nokName = $employee->getNokName();
        $nokRelationship = $employee->getNokRelationship();
        $nokContact = $employee->getNokContact();

        try {

            $sql = "INSERT INTO employees(
                                            pf_no,
                                            full_name,
                                            job_tile,
                                            id_no, 
                                            nssf_no, 
                                            nhif_no,
                                            remuneration,
                                            job_description,
                                            qualification,
                                            testimonial,
                                            bank_name,
                                            bank_account_no,
                                            postal_address,
                                            email, 
                                            phone_number,
                                            nok_name, 
                                            nok_relationship,
                                            nok_contact
                                            ) 
                                      VALUES(
                                            :pf_no,
                                            :full_name,
                                            :job_tile,
                                            :id_no, 
                                            :nssf_no, 
                                            :nhif_no,
                                            :remuneration,
                                            :job_description,
                                            :qualification,
                                            :testimonial,
                                            :bank_name,
                                            :bank_account_no,
                                            :postal_address,
                                            :email, 
                                            :phone_number,
                                            :nok_name, 
                                            :nok_relationship,
                                            :nok_contact
                                         )";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(":pf_no", $pfNo);
            $stmt->bindParam(":full_name",$fullName);
            $stmt->bindParam(":job_tile", $jobTitle);
            $stmt->bindParam(":id_no",$idNo);
            $stmt->bindParam(":nssf_no",$nssfNo);
            $stmt->bindParam(":nhif_no",$nhifNo);
            $stmt->bindParam(":remuneration",$remuneration);
            $stmt->bindParam(":job_description",$jobDescription);
            $stmt->bindParam(":qualification",$qualification);
            $stmt->bindParam(":testimonial",$testimonial);
            $stmt->bindParam(":bank_name",$bankName);
            $stmt->bindParam(":bank_account_no",$bankAccountNo);
            $stmt->bindParam(":postal_address",$postalAddress);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":phone_number",$phoneNumber);
            $stmt->bindParam(":nok_name",$nokName);
            $stmt->bindParam(":nok_relationship",$nokRelationship);
            $stmt->bindParam(":nok_contact",$nokContact);

            return $stmt->execute() ? true : false;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }


    }

    public function update(Employee $employee, $id)
    {
        // TODO: Implement update() method.
    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public static function destroy()
    {
        // TODO: Implement destroy() method.
    }

    public static function getEmployeeObject($id)
    {
        // TODO: Implement getEmployeeObject() method.
    }

    public static function all()
    {
        // TODO: Implement all() method.
    }

}