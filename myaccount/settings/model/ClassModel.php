<?php
/**
 * Created by PhpStorm.
 * User: wwj
 * Date: 2018-05-15
 * Time: 15:02
 */

namespace app\settings\model;

use think\Model;

class ClassModel  extends Model
{
    protected $table = 'Class';
    public function getStateAttr($value)
    {
        $state= ['Y' =>'有效','N' => '失效'];
        return $state[$value];
    }
    public function getTypeAttr($value)
    {
        $state= ['1' =>'收入','2' => '支出'];
        return $state[$value];
    }
}