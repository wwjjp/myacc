<?php
/**
 * Created by PhpStorm.
 * User: wwj
 * Date: 2018-05-16
 * Time: 23:34
 */
namespace app\report\model;

use think\Model;

class AccountBalanceModel  extends Model
{
    protected $table = 'account_balance';
    protected function scopeIndexList($query)
    {
        $query->order('balance');
    }

}