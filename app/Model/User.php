<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //1.关联数据表
    public $table='user';
    //2.主键
    public $primaryKey='user_id';
//    3.允许批量操作的字段
//    public $fillable=['user_name','user_ass','email','phone'];
    public $guarded=[];
//    4.是否维护create_at 和update_at字段？
    public $timestamps=false;
}


