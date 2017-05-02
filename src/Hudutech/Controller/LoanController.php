<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/2/17
 * Time: 7:35 AM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\LoanInterface;
use Hudutech\DBManager\DB;
use Hudutech\Entity\Loan;

class LoanController implements LoanInterface
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

        try{
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

        try{
            $stmt = $this->conn->prepare("UPDATE loans SET loanType=:loanType, interestRate=:interestRate, defaulterFine=:defaulterFine
                                          WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":loanType", $loanType);
            $stmt->bindParam(":interestRate", $interestRate);
            $stmt->bindParam(":defaulterFine", $defaulterFine);
            return $stmt->execute() ? true : false;

        }catch (\PDOException $exception){
            echo $exception->getMessage();
            return false;
        }
    }


    public static function getId($id)
    {
        $db = new DB();
        $conn = $db->connect();
        try{
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
        try{
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

        try{
            $stmt = $conn->prepare("SELECT t.* FROM loans t WHERE t.id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->setFetchMode(\PDO::FETCH_CLASS |\PDO::FETCH_PROPS_LATE, Loan::class);
            return $stmt->execute() && $stmt->rowCount() > 0 ? $stmt->fetch() : null;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return null;
        }
    }
}