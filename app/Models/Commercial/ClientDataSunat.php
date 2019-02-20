<?php
namespace Acciona\Models\Commercial;


use Illuminate\Database\Eloquent\Model;

class ClientDataSunat extends Model
{
    protected $table = 'commercial.client_data_sunat';
    protected $primaryKey = 'ruc';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'ruc',
        'social_reason',
        'address',
        'condition',
        'status',
        'commercial_name'
    ];
}