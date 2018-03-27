<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

//默认接入数据库对应的数据表
class Article extends Model
{
    //设置表可以直接填充的字段
    protected $fillable = ['title', 'content', 'published_at'];

    //将字段添加到Carbon类中
    protected $dates = ['published_at'];

    //在创建时为文章添加发布时间
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    //设置筛选条件的方法
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    } 
}
