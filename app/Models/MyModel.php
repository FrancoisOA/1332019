<?php
namespace Acciona\Models;

use Illuminate\Database\Eloquent\Model;

class MyModel extends Model
{
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}