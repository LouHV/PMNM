<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmuc extends Model
{
    use HasFactory;
    protected $fillable = [
        'TenDM',
        'MaDM',
        'MoTa',
        'Vitri'
    ];
    public function scopeSearch($query)
    {
        return empty(request()->search) ? $query : $query->where('id', 'like', '%' . request()->search . '%')
                                                    // ->orWhere('MaDM', 'like', '%' . request()->search . '%')
                                                    ->orWhere('TenDM','like','%'.request()->search.'%');
                                                    // ->orWhere('Vitri','like','%'.request()->search.'%');
    }
}
