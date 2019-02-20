<?php
namespace Acciona\Models\Commercial;

use Illuminate\Database\Eloquent\Model;

class ClientCommercial extends Model
{
    protected $table = 'commercial.client_commercial';

    protected $fillable = [
        'client_id',
        'commercial_id',
        'created_by'
    ];
}