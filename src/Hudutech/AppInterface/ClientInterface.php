<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/25/17
 * Time: 12:00 PM
 */

namespace Hudutech\AppInterface;


use Hudutech\Entity\Client;

interface ClientInterface
{
  public function create(Client $client);
  public function update(Client $client, $id);
  public static function delete($id);
  public static function destroy();
  public static function getClientObject($id);
  public static function getId($clientId);
  public static function all();
  public static function getLoanLimit($clientId);

    /**
     * @param array $config
     * @return boolean
     * $config => array("amount"=>val, "details"=>val, "clientId"=>val)
     *
     */
    public static function createTransactionLog(array $config);

}