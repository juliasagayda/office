<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'departments';

    public function employees()
    {
        return $this->hasMany(Employees::class,'departments_id', 'id');
    }

}
