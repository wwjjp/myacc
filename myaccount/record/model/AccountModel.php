<?php
/**
 * Created by PhpStorm.
 * User: wwj
 * Date: 2018-05-15
 * Time: 15:02
 */

namespace app\record\model;

use think\Model;

class AccountModel extends Model
{
    protected $table = 'account';

    protected function scopeAccountlistincome($query)
    {
        $query->where('state','Y')->field('id,accname')->order('accname ');
    }
    protected function scopeAccountlistpay($query)
    {
        $query->where('state','Y')->field('id,accname')->order('accname ');
    }
    protected function scopeTransferpayaccount($query)
    {
        $query->where('state','Y')->field('id,accname')->order('accname ');
    }
    protected function scopeTransferincomeaccount($query)
    {
        $query->where('state','Y')->field('id,accname')->order('accname ');
    }

}