<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'master_menu'; // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key dari tabel

    // Kolom yang dapat diisi menggunakan mass assignment
    protected $fillable = ['name', 'url', 'icon', 'code', 'parent_code', 'sequence', 'status'];

    /**
     * Helper untuk mendapatkan nilai ENUM dari kolom tertentu
     */
    public static function getEnumValues($column)
    {
        $type = DB::select("SHOW COLUMNS FROM " . (new self)->getTable() . " WHERE Field = ?", [$column]);
        preg_match("/^enum\((.*)\)$/", $type[0]->Type, $matches);
        return str_getcsv($matches[1], ",", "'");
    }

    public function children()
    {
        return $this->hasMany(SubMenu::class,'menu_code', 'code');
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_code', 'code');
    }

    public function subMenu()
    {
        return $this->hasMany(SubMenu::class, 'menu_code', 'code');
    }


    
    // Di model Menu
public function permissions()
{
    return $this->hasMany(Permission::class, 'menu_code', 'code');
}

    
    

}
