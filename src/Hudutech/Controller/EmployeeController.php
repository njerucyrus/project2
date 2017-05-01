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
        $kraPin = $employee->getKraPin();
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
                                            pfNo,
                                            fullName,
                                            jobTitle,
                                            idNo, 
                                            nssfNo, 
                                            nhifNo,
                                            kraPin,
                                            remuneration,
                                            jobDescription,
                                            qualification,
                                            testimonial,
                                            bankName,
                                            bankAccountNo,
                                            postalAddress,
                                            email, 
                                            phoneNumber,
                                            nokName, 
                                            nokRelationship,
                                            nokContact
                                            ) 
                                      VALUES(
                                            :pfNo,
                                            :fullName,
                                            :jobTitle,
                                            :idNo, 
                                            :nssfNo, 
                                            :nhifNo,
                                            :kraPin,
                                            :remuneration,
                                            :jobDescription,
                                            :qualification,
                                            :testimonial,
                                            :bankName,
                                            :bankAccountNo,
                                            :postalAddress,
                                            :email, 
                                            :phoneNumber,
                                            :nokName, 
                                            :nokRelationship,
                                            :nokContact
                                         )";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(":pfNo", $pfNo);
            $stmt->bindParam(":fullName", $fullName);
            $stmt->bindParam(":jobTitle", $jobTitle);
            $stmt->bindParam(":idNo", $idNo);
            $stmt->bindParam(":nssfNo", $nssfNo);
            $stmt->bindParam(":nhifNo", $nhifNo);
            $stmt->bindParam(":kraPin", $kraPin);
            $stmt->bindParam(":remuneration", $remuneration);
            $stmt->bindParam(":jobDescription", $jobDescription);
            $stmt->bindParam(":qualification", $qualification);
            $stmt->bindParam(":testimonial", $testimonial);
            $stmt->bindParam(":bankName", $bankName);
            $stmt->bindParam(":bankAccountNo", $bankAccountNo);
            $stmt->bindParam(":postalAddress", $postalAddress);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phoneNumber", $phoneNumber);
            $stmt->bindParam(":nokName", $nokName);
            $stmt->bindParam(":nokRelationship", $nokRelationship);
            $stmt->bindParam(":nokContact", $nokContact);
            return $stmt->execute() ? true : false;

        } catch (\PDOException $exception) {
            print_r($exception->getMessage());
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
        $kraPin = $employee->getKraPin();
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
                                        pfNo=:pfNo,
                                        fullName=:fullName,
                                        jobTitle=:jobTitle,
                                        idNo=:idNo, 
                                        nssfNo=:nssfNo, 
                                        nhifNo=:nssfNo,
                                        kraPin=:kraPin,
                                        remuneration=:remuneration,
                                        jobDescription=:jobDescription,
                                        qualification=:qualification,
                                        testimonial=:testimonial,
                                        bankName=:bankName,
                                        bankAccountNo=:bankAccountNo,
                                        postalAddress=:postalAddress,
                                        email=:email, 
                                        phoneNumber=:phoneNumber,
                                        nokName=:nokName, 
                                        nokRelationship=:nokRelationship,
                                        nokContact=:nokContact
                                    WHERE 
                                        id=:id
                                    ";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":pfNo", $pfNo);
            $stmt->bindParam(":fullName", $fullName);
            $stmt->bindParam(":jobTitle", $jobTitle);
            $stmt->bindParam(":idNo", $idNo);
            $stmt->bindParam(":nssfNo", $nssfNo);
            $stmt->bindParam(":nhifNo", $nhifNo);
            $stmt->bindParam(":kraPin", $kraPin);
            $stmt->bindParam(":remuneration", $remuneration);
            $stmt->bindParam(":jobDescription", $jobDescription);
            $stmt->bindParam(":qualification", $qualification);
            $stmt->bindParam(":testimonial", $testimonial);
            $stmt->bindParam(":bankName", $bankName);
            $stmt->bindParam(":bankAccountNo", $bankAccountNo);
            $stmt->bindParam(":postalAddress", $postalAddress);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phoneNumber", $phoneNumber);
            $stmt->bindParam(":nokName", $nokName);
            $stmt->bindParam(":nokRelationship", $nokRelationship);
            $stmt->bindParam(":nokContact", $nokContact);
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
                $employee->setPfNo($row['pfNo']);
                $employee->setFullName($row['fullName']);
                $employee->setJobTitle($row['jobTitle']);
                $employee->setIdNo($row['idNo']);
                $employee->setNssfNo($row['nssfNo']);
                $employee->setNhifNo($row['nhifNo']);
                $employee->setKraPin($row['kraPin']);
                $employee->setRemuneration($row['remuneration']);
                $employee->setJobDescription($row['jobDescription']);
                $employee->setQualification($row['qualification']);
                $employee->setTestimonial($row['testimonial']);
                $employee->setBankName($row['bankName']);
                $employee->setBankAccountNo($row['bankAccountNo']);
                $employee->setPostalAddress($row['postalAddress']);
                $employee->setEmail($row['email']);
                $employee->setPhoneNumber($row['phoneNumber']);
                $employee->setNokName($row['nokName']);
                $employee->setNokRelationship($row['nokRelationship']);
                $employee->setNokContact($row['nokContact']);

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