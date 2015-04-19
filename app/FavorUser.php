<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class FavorUser extends Model {

    protected $table = 'userfavorrel';

	protected $fillable = [
        'user_id',
        'favor_id'
    ];

}
