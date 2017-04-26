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
                                                        client_id,
                                                        group_id,
                                                        cash_received,
                                                        contribution,
                                                        payment_method,
                                                        date_paid
                                                        )
                                                VALUES (
                                                        :client_id,
                                                        :group_id,
                                                        :cash_recieved,
                                                        :contribution,
                                                        :payment_method,
                                                        :date_paid
                                                        )");
            $stmt->bindParam(":client_id", $clientId);
            $stmt->bindParam(":group_id", $groupId);
            $stmt->bindParam(":cash_received", $cashReceived);
            $stmt->bindParam(":contribution", $contribution);
            $stmt->bindParam(":payment_method", $paymentMethod);
            $stmt->bindParam(":date_paid", $datePaid);
            return $stmt->execute() ? true : false;

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
            $sql = "(SELECT c.full_name , g.group_name , SUM(s.contribution) as total_savings FROM
                      clients c , sacco_group g , savings s
                       WHERE c.id = (SELECT s.client_id FROM savings s WHERE s.client_id=:id LIMIT 1)
                        AND g.id = (SELECT s.group_id FROM savings s WHERE s.group_id=g.id LIMIT 1))";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $total_saving = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                $total_saving = array(
                    "client_name" => $row['full_name'],
                    "group_name" => $row['group_name'],
                    "total_savings" => $row['total_savings']
                );
            }
            return $total_saving;
        } catch (\PDOException $exception) {
            return null;
        }
    }

    public static function getGroupSavings($groupId)
    {
        // TODO: Implement getGroupSavings() method.
    }

    public static function all()
    {
        // TODO: Implement all() method.
    }

}