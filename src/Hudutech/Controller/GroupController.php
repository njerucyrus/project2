<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/25/17
 * Time: 12:05 PM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\GroupInterface;
use Hudutech\DBManager\DB;
use Hudutech\Entity\Group;

class GroupController implements GroupInterface
{
    public function create(Group $group)
    {
        $db = new DB();
        $conn = $db->connect();
        $groupName = $group->getGroupName();
        $refNo = $group->getRefNo();
        $region = $group->getRegion();
        $officialContact = $group->getOfficialContact();
        $dateFormed = $group->getDateFormed();
        $monthlyMeetingSchedule = $group->getMonthlyMeetingSchedule();

        try {
            $sql = "INSERT INTO sacco_group(
                                                groupName,
                                                refNo,
                                                region,
                                                officialContact,
                                                dateFormed,
                                                monthlyMeetingSchedule
                                            )
                                        VALUES 
                                        (
                                                :groupName,
                                                :refNo,
                                                :region,
                                                :officialContact,
                                                :dateFormed,
                                                :monthlyMeetingSchedule
                                        )";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":groupName", $groupName);
            $stmt->bindParam(":refNo", $refNo);
            $stmt->bindParam(":region", $region);
            $stmt->bindParam(":officialContact", $officialContact);
            $stmt->bindParam(":dateFormed", $dateFormed);
            $stmt->bindParam(":monthlyMeetingSchedule", $monthlyMeetingSchedule);

            return $stmt->execute() ? true : false;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public function update(Group $group, $id)
    {
        $db = new DB();
        $conn = $db->connect();

        $groupName = $group->getGroupName();
        $refNo = $group->getRefNo();
        $region = $group->getRegion();
        $officialContact = $group->getOfficialContact();
        $dateFormed = $group->getDateFormed();
        $monthlyMeetingSchedule = $group->getMonthlyMeetingSchedule();
        $sql = " UPDATE  sacco_group SET
                                        groupName:=groupName,
                                        refNo:=refNo,
                                        region:=refNo,
                                        officialContact:=officialContact,
                                        dateFormed:=dateFormed,
                                        monthlyMeetingSchedule:=monthlyMeetingSchedule
                                      WHERE id=:id
                                        ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":groupName", $groupName);
        $stmt->bindParam(":refNo", $refNo);
        $stmt->bindParam(":region", $region);
        $stmt->bindParam(":officialContact", $officialContact);
        $stmt->bindParam(":dateFormed", $dateFormed);
        $stmt->bindParam(":monthlyMeetingSchedule", $monthlyMeetingSchedule);
        return $stmt->execute() ? true : false;
    }

    public static function delete($id)
    {
        $db = new DB();
        $conn = $db->connect();

        try{
            $stmt = $conn->prepare("DELETE FROM sacco_group WHERE id=:id");
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

        try{
            $stmt = $conn->prepare("DELETE FROM sacco_group");
            return $stmt->execute() ? true : false;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public static function getGroupObject($id)
    {
        $db = new DB();
        $conn = $db->connect();

        try{
            $stmt = $conn->prepare("SELECT g.* FROM sacco_group g WHERE g.id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Group::class);

            return $stmt->execute() && $stmt->rowCount() == 1 ? $stmt->fetch() : null;

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
            $stmt = $conn->prepare("SELECT g.* FROM sacco_group g WHERE 1");
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $groups = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $groups;
            }
            else {
                return [];
            }
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }

    }

}