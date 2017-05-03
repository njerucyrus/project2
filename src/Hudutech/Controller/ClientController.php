<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/25/17
 * Time: 12:03 PM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\ClientInterface;
use Hudutech\DBManager\ComplexQuery;
use Hudutech\DBManager\DB;
use Hudutech\Entity\Client;
use Hudutech\Entity\Saving;

class ClientController  extends ComplexQuery implements ClientInterface
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
                                            groupRefNo,
                                            fullName,
                                            membershipNo,
                                            idNo,
                                            kraPin,
                                            dob,
                                            occupation,
                                            postalAddress,
                                            email,
                                            phoneNumber,
                                            county,
                                            subCounty,
                                            location,
                                            subLocation,
                                            village,
                                            emergencyContact,
                                            isMemberOfOtherOrg,
                                            expectation,
                                            nokName,
                                            nokRelationship,
                                            dateEnrolled,
                                            nokContact
                                        ) 
                                    VALUES (
                                            :groupRefNo,
                                            :fullName,
                                            :membershipNo,
                                            :idNo,
                                            :kraPin,
                                            :dob,
                                            :occupation,
                                            :postalAddress,
                                            :email,
                                            :phoneNumber,
                                            :county,
                                            :subCounty,
                                            :location,
                                            :subLocation,
                                            :village,
                                            :emergencyContact,
                                            :isMemberOfOtherOrg,
                                            :expectation,
                                            :nokName,
                                            :nokRelationship,
                                            :dateEnrolled,
                                            :nokContact
                                        )";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(":groupRefNo", $groupRefNo);
            $stmt->bindParam(":fullName", $fullName);
            $stmt->bindParam(":membershipNo", $membershipNo);
            $stmt->bindParam(":idNo", $idNo);
            $stmt->bindParam(":kraPin", $kraPin);
            $stmt->bindParam(":dob", $dob);
            $stmt->bindParam(":occupation", $occupation);
            $stmt->bindParam(":postalAddress", $postalAddress);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phoneNumber", $phoneNumber);
            $stmt->bindParam(":county", $county);
            $stmt->bindParam(":subCounty", $subCounty);
            $stmt->bindParam(":location", $location);
            $stmt->bindParam(":subLocation", $subLocation);
            $stmt->bindParam(":village", $village);
            $stmt->bindParam(":emergencyContact", $emergencyContact);
            $stmt->bindParam(":isMemberOfOtherOrg", $isMemberOfOtherOrg);
            $stmt->bindParam(":expectation", $expectation);
            $stmt->bindParam(":nokName", $nokName);
            $stmt->bindParam(":nokRelationship", $nokRelationship);
            $stmt->bindParam(":dateEnrolled", $dateEnrolled);
            $stmt->bindParam(":nokContact", $nokContact);
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
                                    groupRefNo=:groupRefNo,
                                    fullName=:fullName,
                                    membershipNo=:membershipNo,
                                    idNo=:idNo,
                                    kraPin=:kraPin,
                                    dob=:dob,
                                    occupation=:occupation,
                                    postalAddress=:postalAddress,
                                    email=:email,
                                    phoneNumber=:phoneNumber,
                                    county=:county,
                                    subCounty=:subCounty,
                                    location=:location,
                                    subLocation=:subLocation,
                                    village=:village,
                                    emergencyContact=:emergencyContact,
                                    isMemberOfOtherOrg=:isMemberOfOtherOrg,
                                    expectation=:expectation,
                                    nokName=:nokName,
                                    nokRelationship=:nokRelationship,
                                    dateEnrolled=:dateEnrolled,
                                    nokContact=:nokContact
                            WHERE  
                                id=:id
                            ";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":groupRefNo", $groupRefNo);
            $stmt->bindParam(":fullName", $fullName);
            $stmt->bindParam(":membershipNo", $membershipNo);
            $stmt->bindParam(":idNo", $idNo);
            $stmt->bindParam(":kraPin", $kraPin);
            $stmt->bindParam(":dob", $dob);
            $stmt->bindParam(":occupation", $occupation);
            $stmt->bindParam(":postalAddress", $postalAddress);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phoneNumber", $phoneNumber);
            $stmt->bindParam(":county", $county);
            $stmt->bindParam(":subCounty", $subCounty);
            $stmt->bindParam(":location", $location);
            $stmt->bindParam(":subLocation", $subLocation);
            $stmt->bindParam(":village", $village);
            $stmt->bindParam(":emergencyContact", $emergencyContact);
            $stmt->bindParam(":isMemberOfOtherOrg", $isMemberOfOtherOrg);
            $stmt->bindParam(":expectation", $expectation);
            $stmt->bindParam(":nokName", $nokName);
            $stmt->bindParam(":nokRelationship", $nokRelationship);
            $stmt->bindParam(":dateEnrolled", $dateEnrolled);
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

        $loanLimit = (float)($savings['totalSavings'] * 3);
        return $loanLimit;
    }

}