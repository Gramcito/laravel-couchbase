<?php declare(strict_types=1);

use Mpociot\Couchbase\Eloquent\Model as Eloquent;

class Client extends Eloquent
{
    protected $connection = 'couchbase-not-default';

    protected $table = 'clients';

    protected static $unguarded = true;

//    public $incrementing = false;

//    protected $keyType = 'string';

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function photo()
    {
        return $this->morphOne('Photo', 'imageable');
    }

    public function addresses()
    {
        return $this->hasMany('Address', 'data.address_id', 'data.client_id');
    }
}
