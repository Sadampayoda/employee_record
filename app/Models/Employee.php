<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Employee extends Model
{
    protected $guarded = ['id'];



    public static function uploadFile($file)
    {
        $name = time() . '-' . $file->getClientOriginalName();
        $file->storeAs('img/employee/', $name,'public');
        return $name;
    }
    public static function updateFile($new_file, $old_file)
    {


        $path = 'img/employee/' . $old_file;
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
        $name = time() . '-' . $new_file->getClientOriginalName();
        $new_file->storeAs('img/employee/', $name,'public');
        return $name;


        // return '';
    }

    public static function destroyFile($old_file)
    {


        $path = 'img/employee/' . $old_file;
        if (Storage::exists($path)) {
            Storage::delete($path);
        }    // return '';
    }

    public function emp_presence()
    {
        return $this->belongsTo(EmpPresence::class);
    }

    public function salaries()
    {
        return $this->hasMany(EmpSalary::class, 'employee_id');
    }



}
