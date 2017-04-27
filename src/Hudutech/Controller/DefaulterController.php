<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/25/17
 * Time: 12:04 PM
 */

namespace Hudutech\Controller;

use Hudutech\AppInterface\DefaulterInterface;
use Hudutech\DBManager\DB;
use Hudutech\Entity\Defaulter;

class DefaulterController implements DefaulterInterface
{
    public function create(Defaulter $defaulter)
    {
        $db = new DB();
        $conn = $db->connect();
        $clientId = $defaulter->getClientId();
        $groupId = $defaulter->getGroupId();
        $amountDefaulted = $defaulter->getAmountDefaulted();

        try {
            $stmt = $conn->prepare("INSERT INTO defaulters(
                                                            client_id,
                                                            group_id,
                                                            amount_defaulted
                                                          ) 
                                                    VALUES
                                                     (
                                                        :client_id,
                                                        :group_id,
                                                        :amount_defaulted
                                                     )");
            $stmt->bindParam(":client_id", $clientId);
            $stmt->bindParam(":group_id", $groupId);
            $stmt->bindParam(":amount_defaulted", $amountDefaulted);

            return $stmt->execute() ? true : false;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }

    }

    public function update(Defaulter $defaulter, $id)
    {
        $db = new DB();
        $conn = $db->connect();
        $clientId = $defaulter->getClientId();
        $groupId = $defaulter->getGroupId();
        $amountDefaulted = $defaulter->getAmountDefaulted();

        try {
            $stmt = $conn->prepare("UPDATE defaulters SET  
                                                            client_id:=client_id,
                                                            group_id:=group_id,
                                                            amount_defaulted:=amount_defaulted
                                                      WHERE id=:id
                                  ");

            $stmt->bindParam(":client_id", $clientId);
            $stmt->bindParam(":group_id", $groupId);
            $stmt->bindParam(":amount_defaulted", $amountDefaulted);

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

            $stmt = $conn->prepare("DELETE FROM defaulters WHERE id=:id");
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
            $stmt = $conn->prepare("DELETE FROM defaulters");
            return $stmt->execute() ? true : false;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public static function getDefaulterObject($id)
    {
        $db = new DB();
        $conn = $db->connect();

        try {
            $stmt = $conn->prepare("SELECT d.* FROM defaulters d WHERE d.id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            if ($stmt->rowCount() == 0) {
                $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                $defaulter = new Defaulter();
                $defaulter->setClientId($row['client_id']);
                $defaulter->setGroupId($row['group_id']);
                $defaulter->setAmountDefaulted($row['amount_defaulted']);
                $db->closeConnection();
                return $defaulter;
            } else {
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

        try{
            $stmt = $conn->prepare("SELECT d.* FROM defaulters d WHERE  1");
            $stmt->execute();
            if ($stmt->rowCount() > 0){
               $defaulters = $stmt->fetchAll(\PDO::FETCH_ASSOC);
               $db->closeConnection();
               return $defaulters;
            }
            else{
                return [];
            }

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

}