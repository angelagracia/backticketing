<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubMenu extends Model
{
    use HasFactory;

    protected $table = 'master_sub_menu';
    protected $fillable = ['name', 'menu_code', 'url', 'icon', 'status'];


    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_code', 'code');
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'menu_code', 'code');
    }
    
}
