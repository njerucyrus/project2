<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/25/17
 * Time: 11:58 AM
 */

namespace Hudutech\Entity;


class Employee
{
    /**
     * @var integer
     */
    private $id;
    /**
     * @var string
     */
    private $pfNo;
    /**
     * @var string
     */
    private $fullName;
    /**
     * @var string
     */
    private $jobTitle;
    /**
     * @var integer
     */
    private $idNo;
    /**
     * @var string
     */
    private $nssfNo;
    /**
     * @var string
     */
    private $nhifNo;
    /**
     * @var float
     */
    private $renumeration;
    /**
     * @var string
     */
    private $jobDescription;
    /**
     * @var string
     */
    private $qualification;
    /**
     * @var string
     */
    private $testmonial;
    /**
     * @var string
     */
    private $bankName;
    /**
     * @var string
     */
    private $bankAcountNo;
    /**
     * @var string
     */
    private $postalAddress;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $phoneNumber;
    /**
     * @var string
     */
    private $nokName;
    /**
     * @var string
     */
    private $nokRelationship;
    /**
     * @var string
     */
    private $nokContact;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPfNo()
    {
        return $this->pfNo;
    }

    /**
     * @param string $pfNo
     */
    public function setPfNo($pfNo)
    {
        $this->pfNo = $pfNo;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return string
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * @param string $jobTitle
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;
    }

    /**
     * @return int
     */
    public function getIdNo()
    {
        return $this->idNo;
    }

    /**
     * @param int $idNo
     */
    public function setIdNo($idNo)
    {
        $this->idNo = $idNo;
    }

    /**
     * @return string
     */
    public function getNssfNo()
    {
        return $this->nssfNo;
    }

    /**
     * @param string $nssfNo
     */
    public function setNssfNo($nssfNo)
    {
        $this->nssfNo = $nssfNo;
    }

    /**
     * @return string
     */
    public function getNhifNo()
    {
        return $this->nhifNo;
    }

    /**
     * @param string $nhifNo
     */
    public function setNhifNo($nhifNo)
    {
        $this->nhifNo = $nhifNo;
    }

    /**
     * @return float
     */
    public function getRenumeration()
    {
        return $this->renumeration;
    }

    /**
     * @param float $renumeration
     */
    public function setRenumeration($renumeration)
    {
        $this->renumeration = $renumeration;
    }

    /**
     * @return string
     */
    public function getJobDescription()
    {
        return $this->jobDescription;
    }

    /**
     * @param string $jobDescription
     */
    public function setJobDescription($jobDescription)
    {
        $this->jobDescription = $jobDescription;
    }

    /**
     * @return string
     */
    public function getQualification()
    {
        return $this->qualification;
    }

    /**
     * @param string $qualification
     */
    public function setQualification($qualification)
    {
        $this->qualification = $qualification;
    }

    /**
     * @return string
     */
    public function getTestmonial()
    {
        return $this->testmonial;
    }

    /**
     * @param string $testmonial
     */
    public function setTestmonial($testmonial)
    {
        $this->testmonial = $testmonial;
    }

    /**
     * @return string
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * @param string $bankName
     */
    public function setBankName($bankName)
    {
        $this->bankName = $bankName;
    }

    /**
     * @return string
     */
    public function getBankAcountNo()
    {
        return $this->bankAcountNo;
    }

    /**
     * @param string $bankAcountNo
     */
    public function setBankAcountNo($bankAcountNo)
    {
        $this->bankAcountNo = $bankAcountNo;
    }

    /**
     * @return string
     */
    public function getPostalAddress()
    {
        return $this->postalAddress;
    }

    /**
     * @param string $postalAddress
     */
    public function setPostalAddress($postalAddress)
    {
        $this->postalAddress = $postalAddress;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getNokName()
    {
        return $this->nokName;
    }

    /**
     * @param string $nokName
     */
    public function setNokName($nokName)
    {
        $this->nokName = $nokName;
    }

    /**
     * @return string
     */
    public function getNokRelationship()
    {
        return $this->nokRelationship;
    }

    /**
     * @param string $nokRelationship
     */
    public function setNokRelationship($nokRelationship)
    {
        $this->nokRelationship = $nokRelationship;
    }

    /**
     * @return string
     */
    public function getNokContact()
    {
        return $this->nokContact;
    }

    /**
     * @param string $nokContact
     */
    public function setNokContact($nokContact)
    {
        $this->nokContact = $nokContact;
    }

}