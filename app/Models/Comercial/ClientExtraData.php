<?php
namespace Acciona\Models\Comercial;

use Illuminate\Database\Eloquent\Model;

class ClientExtraData extends Model
{
    protected $table = 'commercial.client_extra_data';
    protected $primaryKey = 'id';

    protected $fillable = [
        'ia_cnt_tn',
        'ia_product',
        'ia_origin',
        'ia_airline',
        'ia_customs',
        'ea_cnt_tn',
        'ea_product',
        'ea_destiny',
        'ea_airline',
        'ea_customs',
        'im_cnt_teus',
        'im_product',
        'im_origin',
        'im_shipping_company',
        'im_customs',
        'em_cant_teus',
        'em_product',
        'em_destiny',
        'em_shipping_company',
        'em_customs',
        'client_id',
        'created_by',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
