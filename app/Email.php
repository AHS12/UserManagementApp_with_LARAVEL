<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    //
    protected $fillable = [
        'user_id', 'admin_id', 'title', 'body',
    ];

    //for showing user information on history 'user_id'
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //lets try admin..nice working for 'admin_id'
    public function admin()
    {
        return $this->belongsTo(USER::class, 'admin_id');
    }
}
