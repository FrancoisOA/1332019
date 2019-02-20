<?php
namespace Acciona\Models\Users;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users.users';
    protected $primaryKey = 'usersid';

    public function scopeGetActives($query)
    {
        return $query->where('v_estado', 'ACTIVADO');
    }

    public function scopeGetCommercials($query)
    {
        return $query->where('cargoid', 2);
    }

    public function scopeByCompany($query, int $companyId)
    {
        return $query->where('companyid', $companyId);
    }

    public function scopeSelectCodeAndName($query)
    {
        return $query->selectRaw("usersid as id, concat(v_apellido_paterno, ' ', v_apellido_materno, ' ', v_nombre) as name");
    }
}