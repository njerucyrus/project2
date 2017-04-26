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
            $stmt->bindParam(":full_name", $fullName);
            $stmt->bindParam(":job_tile", $jobTitle);
            $stmt->bindParam(":id_no", $idNo);
            $stmt->bindParam(":nssf_no", $nssfNo);
            $stmt->bindParam(":nhif_no", $nhifNo);
            $stmt->bindParam(":remuneration", $remuneration);
            $stmt->bindParam(":job_description", $jobDescription);
            $stmt->bindParam(":qualification", $qualification);
            $stmt->bindParam(":testimonial", $testimonial);
            $stmt->bindParam(":bank_name", $bankName);
            $stmt->bindParam(":bank_account_no", $bankAccountNo);
            $stmt->bindParam(":postal_address", $postalAddress);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phone_number", $phoneNumber);
            $stmt->bindParam(":nok_name", $nokName);
            $stmt->bindParam(":nok_relationship", $nokRelationship);
            $stmt->bindParam(":nok_contact", $nokContact);
            return $stmt->execute() ? true : false;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }


    }

    public function update(Employee $employee, $id)
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

            $sql = "UPDATE employees SET
                                        pf_no=:pf_no,
                                        full_name=:full_name,
                                        job_tile=:job_tile,
                                        id_no=:id_no, 
                                        nssf_no=:nssf_no, 
                                        nhif_no=:nssf_no,
                                        remuneration=:remuneration,
                                        job_description=:job_description,
                                        qualification=:qualification,
                                        testimonial=:testimonial,
                                        bank_name=:bank_name,
                                        bank_account_no=:bank_account_no,
                                        postal_address=:postal_address,
                                        email=:email, 
                                        phone_number=:phone_number,
                                        nok_name=:nok_name, 
                                        nok_relationship=:nok_relationship,
                                        nok_contact=:nok_contact
                                    WHERE 
                                        id=:id
                                    ";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":pf_no", $pfNo);
            $stmt->bindParam(":full_name", $fullName);
            $stmt->bindParam(":job_tile", $jobTitle);
            $stmt->bindParam(":id_no", $idNo);
            $stmt->bindParam(":nssf_no", $nssfNo);
            $stmt->bindParam(":nhif_no", $nhifNo);
            $stmt->bindParam(":remuneration", $remuneration);
            $stmt->bindParam(":job_description", $jobDescription);
            $stmt->bindParam(":qualification", $qualification);
            $stmt->bindParam(":testimonial", $testimonial);
            $stmt->bindParam(":bank_name", $bankName);
            $stmt->bindParam(":bank_account_no", $bankAccountNo);
            $stmt->bindParam(":postal_address", $postalAddress);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phone_number", $phoneNumber);
            $stmt->bindParam(":nok_name", $nokName);
            $stmt->bindParam(":nok_relationship", $nokRelationship);
            $stmt->bindParam(":nok_contact", $nokContact);
            return $stmt->execute() ? true : false;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public static function delete($id)
    {
        $db = new DB();
        $conn = $db->connect();

        try {
            $stmt = $conn->prepare("DELETE FROM employees WHERE id=:id");
            $stmt->bindParam(":id", $id);
            return $stmt->execute() ? true : false;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }

    }

    public static function destroy()
    {
        $db = new DB();
        $conn = $db->connect();

        try {
            $stmt = $conn->prepare("DELETE FROM employees");
            return $stmt->execute() ? true : false;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public static function getEmployeeObject($id)
    {
        $db = new DB();
        $conn = $db->connect();
        try {
            $stmt = $conn->prepare("SELECT e.* FROM employees e WHERE e.id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            if ($stmt->rowCount() == 1) {
                $employee = new Employee();
                $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                $employee->setPfNo($row['pf_no']);
                $employee->setFullName($row['full_name']);
                $employee->setJobTitle($row['job_title']);
                $employee->setIdNo($row['id_no']);
                $employee->setNssfNo($row['nssf_no']);
                $employee->setNhifNo($row['nhif_no']);
                $employee->setRemuneration($row['remuneration']);
                $employee->setJobDescription($row['job_description']);
                $employee->setQualification($row['qualification']);
                $employee->setTestimonial($row['testimonial']);
                $employee->setBankName($row['bank_name']);
                $employee->setBankAccountNo($row['bank_account_no']);
                $employee->setPostalAddress($row['postal_address']);
                $employee->setEmail($row['email']);
                $employee->setPhoneNumber($row['phone_number']);
                $employee->setNokName($row['nok_name']);
                $employee->setNokRelationship($row['nok_relationship']);
                $employee->setNokContact($row['nok_contact']);

                $db->closeConnection();

                return $employee;
            } else {
                $db->closeConnection();
                return null;
            }

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return null;
        }
    }

    public static function all()
    {
        $db = new DB();
        $conn = $db->connect();
        try {
            $stmt = $conn->prepare("SELECT e.* FROM employees e WHERE 1");
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $employees = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $employees;
            }
            else{
                return [];
            }
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

}