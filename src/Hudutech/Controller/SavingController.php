<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/25/17
 * Time: 11:29 PM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\SavingInterface;
use Hudutech\DBManager\DB;
use Hudutech\Entity\Saving;

class SavingController implements SavingInterface
{
    public function create(Saving $saving)
    {
        $db = new DB();
        $conn = $db->connect();

        $clientId = $saving->getClientId();
        $groupId = $saving->getGroupId();
        $cashReceived = $saving->getCashRecieved();
        $contribution = $saving->getContribution();
        $paymentMethod = $saving->getPaymentMethod();
        $datePaid = $saving->getDatePaid();

        try {

            $stmt = $conn->prepare("INSERT INTO savings(
                                                        clientId,
                                                        groupId,
                                                        cashReceived,
                                                        contribution,
                                                        paymentMethod,
                                                        datePaid
                                                        )
                                                VALUES (
                                                        :clientId,
                                                        :groupId,
                                                        :cash_recieved,
                                                        :contribution,
                                                        :paymentMethod,
                                                        :datePaid
                                                        )");
            $stmt->bindParam(":clientId", $clientId);
            $stmt->bindParam(":groupId", $groupId);
            $stmt->bindParam(":cashReceived", $cashReceived);
            $stmt->bindParam(":contribution", $contribution);
            $stmt->bindParam(":paymentMethod", $paymentMethod);
            $stmt->bindParam(":datePaid", $datePaid);
            return $stmt->execute() ? true : false;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public function createMultiple(array $savings)
    {
       $db = new DB();
       $conn = $db->connect();

       try{

           $stmt = $conn->prepare("INSERT INTO savings(
                                                        clientId,
                                                        groupId,
                                                        cashReceived,
                                                        contribution,
                                                        dumpedSaving,
                                                        fine,
                                                        paymentMethod,
                                                        datePaid
                                                        )
                                                VALUES (
                                                        :clientId,
                                                        :groupId,
                                                        :cash_recieved,
                                                        :contribution,
                                                        :dumpedSaving,
                                                        :fine,
                                                        :paymentMethod,
                                                        :datePaid
                                                        )");

           foreach ($savings as $saving) {
               $clientId = $saving['clientId'];
               $groupId = $saving['groupId'];
               $cashReceived = (float)$saving['cashReceived'];
               $paymentMethod = $saving['paymentMethod'];
               $dumpedSaving = null;
               $contribution = $cashReceived;
               $fine = null;
               $datePaid = date("Y-m-d h:i:s");
               if ($cashReceived > 5000){
                  $dumpedSaving = $cashReceived- 5000;
                  $contribution = 5000;
               }

               $stmt->bindParam(":clientId", $clientId);
               $stmt->bindParam(":groupId", $groupId);
               $stmt->bindParam(":cashReceived", $cashReceived);
               $stmt->bindParam(":contribution", $contribution);
               $stmt->bindParam(":dumpedSaving", $dumpedSaving);
               $stmt->bindParam(":fine", $fine);
               $stmt->bindParam(":paymentMethod", $paymentMethod);
               $stmt->bindParam(":datePaid", $datePaid);
               $stmt->execute();

           }
           $db->closeConnection();
           return true;

       } catch (\PDOException $exception) {
           echo $exception->getMessage();
           return false;
       }
    }


    public static function getClientTotalSavings($id)
    {
        $db = new DB();
        $conn = $db->connect();

        try {

            $sql = "(SELECT c.fullName , g.groupName , SUM(s.contribution) as totalSavings FROM
                    clients c , sacco_group g , savings s
                    WHERE c.id = (SELECT s.clientId FROM savings s WHERE s.clientId=:id LIMIT 1)
                    AND g.id = (SELECT s.groupId FROM savings s WHERE c.id = s.clientId LIMIT 1)
                    AND c.id=s.clientId)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $total_saving = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                $total_saving = array(
                    "clientName" => $row['fullName'],
                    "groupName" => $row['groupName'],
                    "totalSavings" => $row['totalSavings']
                );
            }
            return $total_saving;
        } catch (\PDOException $exception) {
            return null;
        }
    }

    public static function getGroupTotalSavings($groupId)
    {
        $db = new DB();
        $conn = $db->connect();

        try{
            $sql = "(SELECT g.groupName, SUM(s.contribution) as totalGroupSavings FROM savings s,
            sacco_group g WHERE s.groupId =(SELECT g.id from sacco_group g WHERE g.id=:groupId LIMIT 1)
            AND s.groupId=g.id)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":groupId", $groupId);

            if ( $stmt->execute() && $stmt->rowCount() == 1){
                $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                $groupSavings = array(
                    "groupName"=>$row['groupName'],
                    "totalGroupSavings"=>$row['totalGroupSavings']
                );
                $db->closeConnection();
                return $groupSavings;
            }
            else{
                return [];
            }


        } catch (\PDOException $exception) {

            echo $exception->getMessage();
            return [];
        }
    }

    public static function showClientSavingsLog($clientId)
    {
        $db = new DB();
        $conn = $db->connect();

        try{

            $sql = "SELECT c.fullName, g.groupName, s.contribution,s.paymentMethod, s.datePaid
                    FROM clients c , sacco_group g, savings s
                    WHERE s.clientId=:clientId AND s.groupId=g.id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":clientId", $clientId);
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $savingsLog = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                $db->closeConnection();
                return $savingsLog;
            } else{
                return [];
            }

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

    public static function showGroupSavingsLog()
    {
        $db = new DB();
        $conn = $db->connect();

        try{

            $sql = "((SELECT g.groupName, SUM(s.contribution) as total_group_savings, s.datePaid FROM savings s,
                    sacco_group g  WHERE g.id = s.groupId GROUP BY groupName))";
            $stmt = $conn->prepare($sql);

            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $groupSavingsLog = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                $db->closeConnection();
                return $groupSavingsLog;
            }
            else{
                return [];
            }

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
            $sql = "SELECT c.fullName, g.groupName, s.contribution,s.paymentMethod, s.datePaid
                    FROM clients c , sacco_group g, savings s
                    WHERE s.clientId=c.id AND s.groupId=g.id";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $savings = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                $db->closeConnection();
                return $savings;
            } else{
                return [];
            }

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

    /**
     *shows total saving for every clients
     */
    public static function clientsTotalSavingsLog(){
       $db = new DB();
       $conn = $db->connect();
       try{
            $sql = "SELECT c.fullName, g.groupName, SUM(s.contribution) as totalSaving
                     FROM clients c, sacco_group g, savings s
                     WHERE c.groupRefNo = g.refNo AND s.groupId=g.id GROUP BY g.groupName";
                                $stmt = $conn->prepare($sql);
            return $stmt->execute() && $stmt->rowCount() > 0 ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];
       } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
       }
    }

}