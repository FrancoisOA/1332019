<?php

namespace Acciona\Models\Commercial;

use Acciona\Models\Base\File;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'commercial.comments';
    protected $primaryKey = 'id';
    protected $fillable = [
        'icon',
        'type',
        'mood',
        'comment',
        'date',
        'hour',
        'user_id',
        'client_id'
    ];

    public function getHourAttribute($value)
    {
        return str_limit($value, 5, '');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'module_id', 'id')
            ->select('module_id', 'original_name', 'url_preview', 'url_download', 'created_at')
            ->where('module', 'customer-tracking');
    }
}
