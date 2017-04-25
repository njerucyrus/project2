<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/25/17
 * Time: 11:59 AM
 */

namespace Hudutech\Entity;


class Defaulter
{
    /**
     * @var integer
     */
    private $id;
    /**
     * @var integer
     */
    private $clientId;
    /**
     * @var integer
     */
    private $groupId;
    /**
     * @var float
     */
    private $amountDefulted;

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
     * @return int
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @return int
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param int $groupId
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
    }

    /**
     * @return float
     */
    public function getAmountDefulted()
    {
        return $this->amountDefulted;
    }

    /**
     * @param float $amountDefulted
     */
    public function setAmountDefulted($amountDefulted)
    {
        $this->amountDefulted = $amountDefulted;
    }

}