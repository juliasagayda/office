<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employees';

    public function departments()
    {
        return $this->belongsTo(Departments::class, 'departments_id', 'id');
    }

    public static function getMonthSalary($rate, $hours)
    {
        return $rate*$hours;
    }

}
