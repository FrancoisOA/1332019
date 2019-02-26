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

    public function scopeGetByCargo($query, array $cargoIds)
    {
        return $query->whereIn('cargoid', $cargoIds);
    }

    public function scopeByCompany($query, int $companyId)
    {
        return $query->where('companyid', $companyId);
    }

    public function scopeSelectCodeAndName($query)
    {
        return $query->selectRaw("usersid as code, concat(v_apellido_paterno, ' ', v_apellido_materno, ' ', v_nombre) as description");
    }
}