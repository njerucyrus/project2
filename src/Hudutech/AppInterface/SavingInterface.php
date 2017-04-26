<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/25/17
 * Time: 11:19 PM
 */

namespace Hudutech\AppInterface;


use Hudutech\Entity\Saving;

interface SavingInterface
{
    public function create(Saving $saving);
    public static function getClientTotalSavings($id);
    public static function getGroupTotalSavings($groupId);
    public static function showClientSavingsLog($clientId);
    public static function showGroupSavingsLog($group);
    public static function all();
}