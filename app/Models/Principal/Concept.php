<?php
namespace Acciona\Models\Principal;

use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{
    protected $table = 'principal.concepto';
    protected $primaryKey = 'conceptoid';

    public function scopeOnlyWithCodeSunat($query)
    {
        return $query->whereNotNull('v_codigo_sunat');
    }

    public function scopeOfCompany($query, $company_id)
    {
        return $query->where('companyid', $company_id);
    }
}