<?php
namespace Acciona\Models\Commercial;

use Acciona\User;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'commercial.clients';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'contact',
        'phone',
        'email',
        'address',
        'ruc',
        'user_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'usersid', 'user_id');
    }

    public function extraData()
    {
        return $this->hasOne(ClientExtraData::class, 'client_id', 'id');
    }
}
