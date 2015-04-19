<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Favor extends Model
{

    protected $table = 'favor';
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'start_location',
        'end_location',
        'price',
        'start_time',
        'end_time',
    ];

    public function setEndTimeAttribute($time)
    {
        $time_in_24_hour_format  = date("H:i", strtotime($time));

        //adds a day for some reason, don't know why
        $this->attributes['end_time'] = date('Y-m-d H:i', strtotime($time_in_24_hour_format));
    }
}
