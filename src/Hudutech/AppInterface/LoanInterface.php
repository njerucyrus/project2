<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/1/17
 * Time: 11:10 PM
 */

namespace Hudutech\AppInterface;


use Hudutech\Entity\Loan;

interface LoanInterface
{
    public function create(Loan $loan);
    public function update(Loan $loan, $id);
    public static function getId($id);
    public static function all();
    public static function getLoanObject($id);
    public function lendLoan($clientId, $loanId, $amount);
}