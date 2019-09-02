<?php

namespace App\Models\usuarios;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
	protected $table 		= 'password_resets';
    protected $primaryKey 	= 'id';

	public $timestamps = false;

    public static function create(array $data){
        $reset = new PasswordReset();
        $reset->email     = $data['email'];
        $reset->token     = bcrypt($data['token']);
        $reset->save();

        return $reset;
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }


}
