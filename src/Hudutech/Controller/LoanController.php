<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/2/17
 * Time: 7:35 AM
 */

namespace Hudutech\Controller;

use Hudutech\AppInterface\LoanInterface;
use Hudutech\DBManager\ComplexQuery;
use Hudutech\DBManager\DB;
use Hudutech\Entity\Loan;

class LoanController extends ComplexQuery implements LoanInterface
{
    private $conn;

    public function __construct(DB $db)
    {
        $this->conn = $db->connect();
    }

    public function create(Loan $loan)
    {
        $loanType = $loan->getLoanType();
        $interestRate = $loan->getInterestRate();
        $defaulterFine = $loan->getDefaulterFine();

        try {
            $stmt = $this->conn->prepare("INSERT INTO loans(loanType, interestRate, defaulterFine) VALUES (:loanType, :interestRate, :defaulterFine)");
            $stmt->bindParam(":loanType", $loanType);
            $stmt->bindParam(":interestRate", $interestRate);
            $stmt->bindParam(":defaulterFine", $defaulterFine);
            return $stmt->execute() ? true : false;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public function update(Loan $loan, $id)
    {
        $loanType = $loan->getLoanType();
        $interestRate = $loan->getInterestRate();
        $defaulterFine = $loan->getDefaulterFine();

        try {
            $stmt = $this->conn->prepare("UPDATE loans SET loanType=:loanType, interestRate=:interestRate, defaulterFine=:defaulterFine
                                          WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":loanType", $loanType);
            $stmt->bindParam(":interestRate", $interestRate);
            $stmt->bindParam(":defaulterFine", $defaulterFine);
            return $stmt->execute() ? true : false;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }


    public static function getId($id)
    {
        $db = new DB();
        $conn = $db->connect();
        try {
            $stmt = $conn->prepare("SELECT t.* FROM loans t WHERE t.id=:id");
            $stmt->bindParam(":id", $id);
            return $stmt->execute() && $stmt->rowCount() == 0 ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

    public static function all()
    {
        $db = new DB();
        $conn = $db->connect();
        try {
            $stmt = $conn->prepare("SELECT t.* FROM loans t WHERE 1");
            $stmt->bindParam(":id", $id);
            return $stmt->execute() && $stmt->rowCount() == 0 ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

    public static function getLoanObject($id)
    {
        $db = new DB();
        $conn = $db->connect();

        try {
            $stmt = $conn->prepare("SELECT t.* FROM loans t WHERE t.id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Loan::class);
            return $stmt->execute() && $stmt->rowCount() > 0 ? $stmt->fetch() : null;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return null;
        }
    }

    public static function createLoanServicing(array $config)
    {

        $clientId = $config['clientId'];
        $principal = $config['principal'];
        $loanInterest = $config['loanInterest'];
        $loanBal = $config['loanBal'];
        $clientLoanId = $config['clientLoanId'];

        $db = new DB();
        $conn = $db->connect();
        try {
            $stmt = $conn->prepare("INSERT INTO monthly_loan_servicing(principal, clientId, clientLoadId, loanInterest, loanBal)
                                  VALUES (:principal, :clientId, :clientLoadId, :loanInterest, :loanBal)");
            $stmt->bindParam(":principal", $principal);
            $stmt->bindParam(":clientId", $clientId);
            $stmt->bindParam(":clientLoanId", $clientLoanId);
            $stmt->bindParam(":loanInterest", $loanInterest);
            $stmt->bindParam(":loanBal", $loanBal);
            return $stmt->execute() ? true : false;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public static function createRepaymentDates($clientId, $loanType)
    {
        $db = new DB();
        $conn = $db->connect();

        try {
            $currentDate = date('Y-m-d');
            $monthOne = null;
            $monthTwo = null;
            $monthThree = null;
            if ($loanType == 'monthly') {
                $monthOne = date('Y-m-d', strtotime($currentDate . ' + 30 days'));
            } elseif ($loanType == 'trimester') {
                $monthOne = date('Y-m-d', strtotime($currentDate . ' + 30 days'));
                $monthTwo = date('Y-m-d', strtotime($monthOne . ' + 30 days'));
                $monthThree = date('Y-m-d', strtotime($monthTwo . ' + 30 days'));
            }
            $stmt = $conn->prepare("INSERT INTO loan_repayment_dates(clientId, monthOne, monthTwo, monthThree, loanType, loanDate)
                                     VALUES (:clientId, :monthOne, :monthTwo, :monthThree, :loanType, :loanDate)");

            $stmt->bindParam(":clientId", $clientId);
            $stmt->bindParam(":monthOne", $monthOne);
            $stmt->bindParam(":monthTwo", $monthTwo);
            $stmt->bindParam(":monthThree", $monthThree);
            $stmt->bindParam(":loanType", $loanType);
            $stmt->bindParam(":loanDate", $currentDate);
            return $stmt->execute() ? true : false;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public static function calculateInterest($loanType, $amount)
    {
        $table = 'loans';
        $tableColumn = array();
        $options = array("loanType" => $loanType);
        $loan = self::customFilter($table, $tableColumn, $options);
        $interestRate = $loan['interestRate'];
        return (float)($amount * $interestRate);
    }

    public static function createLoanStatus($clientId, $loanType)
    {
        $db = new DB;
        $conn = $db->connect();

        $currentDate = date('Y-m-d');
        try {
            $status = 'not_defaulted';
            if ($loanType == 'monthly') {
                $monthOne = date('Y-m-d', strtotime($currentDate . ' + 30 days'));
                $sql = "INSERT INTO loan_status(clientId, deadline, status, loanType, loanDate)
                          VALUES (:clientId, :deadline, :status, :loanType, :loanDate)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":clientId", $clientId);
                $stmt->bindParam(":deadline", $monthOne);
                $stmt->bindParam(":status", $status);
                $stmt->bindParam(":loanType", $loanType);
                $stmt->bindParam(":loanDate", $currentDate);
                $stmt->execute();
                return true;

            } elseif ($loanType == 'trimester') {

                $monthOne = date('Y-m-d', strtotime($currentDate . ' + 30 days'));
                $monthTwo = date('Y-m-d', strtotime($monthOne . ' + 30 days'));
                $monthThree = date('Y-m-d', strtotime($monthTwo . ' + 30 days'));
                $months = array($monthOne, $monthTwo, $monthThree);
                $sql = "INSERT INTO loan_status(clientId, deadline, status, loanType, loanDate) VALUES (:clientId, :deadline, :status, :loanType, :loanDate)";
                $stmt = $conn->prepare($sql);

                foreach ($months as $month) {
                    $stmt->bindParam(":clientId", $clientId);
                    $stmt->bindParam(":deadline", $month);
                    $stmt->bindParam(":status", $status);
                    $stmt->bindParam(":loanType", $loanType);
                    $stmt->bindParam(":loanDate", $currentDate);
                    $stmt->execute();
                }
            }
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public function lendLoan($clientId, $loanId, $amount)
    {
        $db = new DB();
        $conn = $db->connect();
        // check if the client can be given amount requested
        $loanLimit = ClientController::getLoanLimit($clientId);
        $loanDate = date('Y-m-d');
        if ($amount <= $loanLimit) {
            $loan = self::getId($loanId);
            $loanType = $loan['loanType'];
            $interest = self::calculateInterest($loanType, $amount);
            $loanBal = $amount + $interest;


            //save loan detain to client loan table.
            try {
                $stmt = $conn->prepare("INSERT INTO client_loans(clientId, loanAmount, loadType, loanDate)
                          VALUES (:clientId, :loanAmount, :loadType, :loanDate)");
                $stmt->bindParam(":clientId", $clientId);
                $stmt->bindParam(":loanAmount", $amount);
                $stmt->bindParam(":loanType", $loanType);
                $stmt->bindParam(":loadDate", $loanDate);

                if ($stmt->execute()) {
                    $config = array(
                        "clientId" => $clientId,
                        "principal" => $amount,
                        "loanInterest" => $interest,
                        "loanBal" => $loanBal,
                        "clientLoanId" => $conn->lastInsertId()
                    );
                    self::createRepaymentDates($clientId, $loanType);
                    self::createLoanStatus($clientId, $loanType);
                    self::createLoanServicing($config);
                    return true;
                } else {
                    return false;
                }

            } catch (\PDOException $exception) {
                echo $exception->getMessage();
                return false;
            }
        } else {
            return false;
        }
    }


    public static function getPreviousRepayment($clientId, $clientLoanId)
    {
        $db = new DB();
        $conn = $db->connect();
        try {
            $stmt = $conn->prepare("SELECT * FROM monthly_loan_servicing 
                                    WHERE clientId='{$clientId}' AND
                                     clientLoadId='{$clientLoanId}'
                                      ORDER BY id DESC LIMIT 1");
            return $stmt->execute() && $stmt->rowCount() == 1 ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];


        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

    public static function markLoanCleared($clientId, $clientLoanId){
        $db = new DB();
        $conn = $db->connect();

        try{
            $stmt = $conn->prepare("UPDATE client_loans SET `status`='repaid'
            WHERE id='{$clientLoanId}' AND clientId='{$clientId}'");
            return $stmt->execute() ? true: false;

         } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public static function serviceLoan($clientId, $clientLoanId, $amount)
    {
        $db = new DB();
        $conn = $db->connect();

        $table = "client_loans";
        $tableColumns = array();
        $options = array(
            "clientId" => $clientId,
            "status" => "active",
            "id" => $clientLoanId
        );

        $table2 = "monthly_loan_servicing";
        $cols = array();
        $options2 = array(
            "clientId" => $clientId,
            "clientLoanId" => $clientLoanId
        );
        $loanServicing = self::customFilter($table2, $cols, $options2);


        $clientLoan = self::customFilter($table, $tableColumns, $options);
        $loanType = $clientLoan['loanType'];

        // make first payment

        try {
             $previousPayment = self::getPreviousRepayment($clientId, $clientLoanId);

            if (sizeof($loanServicing) == 1 &&
                empty($loanServicing['loanCF']) &&
                empty($loanServicing['amountPaid'])
            ) {

                $loanCF = (float)($loanServicing['loanBal'] - $amount);
                $id = $previousPayment['id'];
                if ($loanCF == 0){
                    self::markLoanCleared($clientId, $clientLoanId);
                }

                $stmt = $conn->prepare("UPDATE monthly_loan_servicing SET amountPaid=:amountPaid, loanCF=:loanCF
                                        WHERE id=:id");
                $stmt->bindParam(":id", $id);
                $stmt->bindParam(":amountPaid", $amount);
                $stmt->bindParam(":loanCF", $loanCF);
                return $stmt->execute() ? true : false;
            }
            if (sizeof($loanServicing) == 1 && !empty($loanServicing['loanCF']) && !empty($loanServicing['amountPaid']) && $loanServicing['loanCF'] > 0){
                // get the previous payment and create an new record
                //previous LoanCF = new principal
                $previousLoanCF = $loanServicing['loanCF'];
                $createdAt = $loanServicing['createdAt'];
                $newInterest = self::calculateInterest($loanType, $previousLoanCF);
                $newLoanBal = $previousLoanCF + $newInterest;
                $newLoanCF = (float)($newLoanBal - $amount);
                $datePaid = date("Y-m-d h:i:s");

                if ($newLoanCF == 0){
                    self::markLoanCleared($clientId, $clientLoanId);
                }

                //create new row for the payment

                $stmt = $conn->prepare("INSERT INTO monthly_loan_servicing(
                                                                            principal,
                                                                            clientId,
                                                                            clientLoadId,
                                                                            loanInterest,
                                                                            loanBal,
                                                                            amountPaid,
                                                                            loanCF,
                                                                            datePaid,
                                                                            createdAt
                                                                        )
                                                                VALUES (
                                                                            :principal,
                                                                            :clientId,
                                                                            :clientLoadId,
                                                                            :loanInterest,
                                                                            :loanBal,
                                                                            :amountPaid,
                                                                            :loanCF,
                                                                            :datePaid,
                                                                            :createdAt
                                                                        )");
                $stmt->bindParam(":principal", $newLoanCF);
                $stmt->bindParam(":clientId", $clientId);
                $stmt->bindParam(":clientLoanId", $clientLoanId);
                $stmt->bindParam(":loanInterest", $newInterest);
                $stmt->bindParam(":loanBal", $newLoanBal);
                $stmt->bindParam(":amountPaid", $amount);
                $stmt->bindParam(":loanCF", $newLoanCF);
                $stmt->bindParam(":datePaid", $datePaid);
                $stmt->bindParam(":createdAt", $createdAt);
                return $stmt->execute() ? true : false;
            }


            if (sizeof($loanServicing) > 1 && !empty($loanServicing['loanCF']) && !empty($loanServicing['amountPaid']) && $loanServicing['loanCF']>0){
                // get the previous payment and create an new record
                //previous LoanCF = new principal
                $previousLoanCF = $loanServicing['loanCF'];
                $createdAt = $loanServicing['createdAt'];
                $newInterest = self::calculateInterest($loanType, $previousLoanCF);
                $newLoanBal = $previousLoanCF + $newInterest;
                $newLoanCF = (float)($newLoanBal - $amount);
                $datePaid = date("Y-m-d h:i:s");

                if ($newLoanCF == 0){
                    self::markLoanCleared($clientId, $clientLoanId);
                }

                //create new row for the payment

                $stmt = $conn->prepare("INSERT INTO monthly_loan_servicing(
                                                                            principal,
                                                                            clientId,
                                                                            clientLoadId,
                                                                            loanInterest,
                                                                            loanBal,
                                                                            amountPaid,
                                                                            loanCF,
                                                                            datePaid,
                                                                            createdAt
                                                                        )
                                                                VALUES (
                                                                            :principal,
                                                                            :clientId,
                                                                            :clientLoadId,
                                                                            :loanInterest,
                                                                            :loanBal,
                                                                            :amountPaid,
                                                                            :loanCF,
                                                                            :datePaid,
                                                                            :createdAt
                                                                        )");
                $stmt->bindParam(":principal", $newLoanCF);
                $stmt->bindParam(":clientId", $clientId);
                $stmt->bindParam(":clientLoanId", $clientLoanId);
                $stmt->bindParam(":loanInterest", $newInterest);
                $stmt->bindParam(":loanBal", $newLoanBal);
                $stmt->bindParam(":amountPaid", $amount);
                $stmt->bindParam(":loanCF", $newLoanCF);
                $stmt->bindParam(":datePaid", $datePaid);
                $stmt->bindParam(":createdAt", $createdAt);
                return $stmt->execute() ? true : false;
            }



        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }

    }


}