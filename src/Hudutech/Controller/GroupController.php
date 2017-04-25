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
                                                group_name,
                                                ref_no,
                                                region,
                                                official_contact,
                                                date_formed,
                                                monthly_meeting_schedule
                                            )
                                        VALUES 
                                        (
                                                :group_name,
                                                :ref_no,
                                                :region,
                                                :official_contact,
                                                :date_formed,
                                                :monthly_meeting_schedule
                                        )";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":group_name", $groupName);
            $stmt->bindParam(":ref_no", $refNo);
            $stmt->bindParam(":region", $region);
            $stmt->bindParam(":official_contact", $officialContact);
            $stmt->bindParam(":date_formed", $dateFormed);
            $stmt->bindParam(":monthly_meeting_schedule", $monthlyMeetingSchedule);

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
                                        group_name:=group_name,
                                        ref_no:=ref_no,
                                        region:=ref_no,
                                        official_contact:=official_contact,
                                        date_formed:=date_formed,
                                        monthly_meeting_schedule:=monthly_meeting_schedule
                                      WHERE id=:id
                                        ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":group_name", $groupName);
        $stmt->bindParam(":ref_no", $refNo);
        $stmt->bindParam(":region", $region);
        $stmt->bindParam(":official_contact", $officialContact);
        $stmt->bindParam(":date_formed", $dateFormed);
        $stmt->bindParam(":monthly_meeting_schedule", $monthlyMeetingSchedule);
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
        // TODO: Implement destroy() method.
    }

    public static function getGroupObject($id)
    {
        // TODO: Implement getGroupObject() method.
    }

    public static function all()
    {
        // TODO: Implement all() method.
    }

}