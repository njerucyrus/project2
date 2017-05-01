<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/25/17
 * Time: 12:03 PM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\ClientInterface;
use Hudutech\DBManager\DB;
use Hudutech\Entity\Client;
use Hudutech\Entity\Saving;

class ClientController implements ClientInterface
{
    public function create(Client $client)
    {
        $db = new DB();
        $conn = $db->connect();
        $groupRefNo = $client->getGroupRefNo();
        $fullName = $client->getFullName();
        $membershipNo = $client->getMembershipNo();
        $idNo = $client->getIdNo();
        $kraPin = $client->getKraPin();
        $dob = $client->getDob();
        $occupation = $client->getOccupation();
        $postalAddress = $client->getPostalAddress();
        $email = $client->getEmail();
        $phoneNumber = $client->getPhoneNumber();
        $county = $client->getCounty();
        $subCounty = $client->getSubCounty();
        $location = $client->getLocation();
        $subLocation = $client->getSubLocation();
        $village = $client->getVillage();
        $emergencyContact = $client->getEmergencyContact();
        $isMemberOfOtherOrg = $client->getMemberOfOtherOrg();
        $expectation = $client->getExpectation();
        $nokName = $client->getNokName();
        $nokRelationship = $client->getNokRelationShip();
        $nokContact = $client->getNokContact();
        $dateEnrolled = $client->getDateEnrolled();

        try {

            $sql = "INSERT INTO clients(
                                            group_ref_no,
                                            full_name,
                                            membership_no,
                                            id_no,
                                            kra_pin,
                                            dob,
                                            occupation,
                                            postal_address,
                                            email,
                                            phone_number,
                                            county,
                                            sub_county,
                                            location,
                                            sub_location,
                                            village,
                                            emergency_contact,
                                            is_member_of_other_org,
                                            expectation,
                                            nok_name,
                                            nok_relationship,
                                            date_enrolled,
                                            nok_contact
                                        ) 
                                    VALUES (
                                            :group_ref_no,
                                            :full_name,
                                            :membership_no,
                                            :id_no,
                                            :kra_pin,
                                            :dob,
                                            :occupation,
                                            :postal_address,
                                            :email,
                                            :phone_number,
                                            :county,
                                            :sub_county,
                                            :location,
                                            :sub_location,
                                            :village,
                                            :emergency_contact,
                                            :is_member_of_other_org,
                                            :expectation,
                                            :nok_name,
                                            :nok_relationship,
                                            :date_enrolled,
                                            :nok_contact
                                        )";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(":group_ref_no", $groupRefNo);
            $stmt->bindParam(":full_name", $fullName);
            $stmt->bindParam(":membership_no", $membershipNo);
            $stmt->bindParam(":id_no", $idNo);
            $stmt->bindParam(":kra_pin", $kraPin);
            $stmt->bindParam(":dob", $dob);
            $stmt->bindParam(":occupation", $occupation);
            $stmt->bindParam(":postal_address", $postalAddress);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phone_number", $phoneNumber);
            $stmt->bindParam(":county", $county);
            $stmt->bindParam(":sub_county", $subCounty);
            $stmt->bindParam(":location", $location);
            $stmt->bindParam(":sub_location", $subLocation);
            $stmt->bindParam(":village", $village);
            $stmt->bindParam(":emergency_contact", $emergencyContact);
            $stmt->bindParam(":is_member_of_other_org", $isMemberOfOtherOrg);
            $stmt->bindParam(":expectation", $expectation);
            $stmt->bindParam(":nok_name", $nokName);
            $stmt->bindParam(":nok_relationship", $nokRelationship);
            $stmt->bindParam(":date_enrolled", $dateEnrolled);
            $stmt->bindParam(":nok_contact", $nokContact);
            return $stmt->execute() ? true : false;
        } catch (\PDOException $exception) {
            print_r( $exception->getMessage());
            return false;
        }
    }

    public function update(Client $client, $id)
    {
        $db = new DB();
        $conn = $db->connect();
        $groupRefNo = $client->getGroupRefNo();
        $fullName = $client->getFullName();
        $membershipNo = $client->getMembershipNo();
        $idNo = $client->getIdNo();
        $kraPin = $client->getKraPin();
        $dob = $client->getDob();
        $occupation = $client->getOccupation();
        $postalAddress = $client->getPostalAddress();
        $email = $client->getEmail();
        $phoneNumber = $client->getPhoneNumber();
        $county = $client->getCounty();
        $subCounty = $client->getSubCounty();
        $location = $client->getLocation();
        $subLocation = $client->getSubLocation();
        $village = $client->getVillage();
        $emergencyContact = $client->getEmergencyContact();
        $isMemberOfOtherOrg = $client->getMemberOfOtherOrg();
        $expectation = $client->getExpectation();
        $nokName = $client->getNokName();
        $nokRelationship = $client->getNokRelationShip();
        $nokContact = $client->getNokContact();
        $dateEnrolled = $client->getDateEnrolled();

        try {

            $sql = "UPDATE clients SET
                                    group_ref_no=:group_ref_no,
                                    full_name=:full_name,
                                    membership_no=:membership_no,
                                    id_no=:id_no,
                                    kra_pin=:kra_pin,
                                    dob=:dob,
                                    occupation=:occupation,
                                    postal_address=:postal_address,
                                    email=:email,
                                    phone_number=:phone_number,
                                    county=:county,
                                    sub_county=:sub_county,
                                    location=:location,
                                    sub_location=:sub_location,
                                    village=:village,
                                    emergency_contact=:emergency_contact,
                                    is_member_of_other_org=:is_member_of_other_org,
                                    expectation=:expectation,
                                    nok_name=:nok_name,
                                    nok_relationship=:nok_relationship,
                                    date_enrolled=:date_enrolled,
                                    nok_contact=:nok_contact
                            WHERE  
                                id=:id
                            ";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":group_ref_no", $groupRefNo);
            $stmt->bindParam(":full_name", $fullName);
            $stmt->bindParam(":membership_no", $membershipNo);
            $stmt->bindParam(":id_no", $idNo);
            $stmt->bindParam(":kra_pin", $kraPin);
            $stmt->bindParam(":dob", $dob);
            $stmt->bindParam(":occupation", $occupation);
            $stmt->bindParam(":postal_address", $postalAddress);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phone_number", $phoneNumber);
            $stmt->bindParam(":county", $county);
            $stmt->bindParam(":sub_county", $subCounty);
            $stmt->bindParam(":location", $location);
            $stmt->bindParam(":sub_location", $subLocation);
            $stmt->bindParam(":village", $village);
            $stmt->bindParam(":emergency_contact", $emergencyContact);
            $stmt->bindParam(":is_member_of_other_org", $isMemberOfOtherOrg);
            $stmt->bindParam(":expectation", $expectation);
            $stmt->bindParam(":nok_name", $nokName);
            $stmt->bindParam(":nok_relationship", $nokRelationship);
            $stmt->bindParam(":date_enrolled", $dateEnrolled);
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
            $stmt = $conn->prepare("DELETE FROM clients WHERE id=:id");
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
            $stmt = $conn->prepare("DELETE FROM clients");
            return $stmt->execute() ? true : false;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public static function getClientObject($id)
    {
        $db = new DB();
        $conn = $db->connect();

        try {
            $stmt = $conn->prepare("SELECT c.* FROM clients c WHERE c.id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->setFetchMode(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE, Client::class);
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

        try {
            $stmt = $conn->prepare("SELECT c.* FROM clients c WHERE 1");
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $clients = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $clients;

            } else {
                return [];
            }

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }

    }

    public static function getLoanLimit($clientId)
    {
        $savings = SavingController::getClientTotalSavings($clientId);

        $loanLimit = (float)($savings['total_savings'] * 3);
        return $loanLimit;
    }

}