<?php
/**
 * Created by PhpStorm.
 * User: wwj
 * Date: 2018-05-15
 * Time: 15:02
 */

namespace app\record\model;

use think\Model;

class ClassModel extends Model
{
    protected $table = 'class';

    protected function scopeClasslistincome($query)
    {
        $query->where('type','1')->where('state','Y')->field('id,classname')->order('classname desc');
    }

    protected function scopeClasslistpay($query)
    {
        $query->where('type','2')->where('state','Y')->field('id,classname')->order('classname desc');
    }


}