<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leave extends Model
{    protected $fillable = [

       
    'user_id',

    'leave_type_id',

    'start_date',

    'end_date',

    'reason',

    'leave_status_id',
       



    ];

    public function user()

    {

        return $this->belongsTo(User::class);

    }


    public function leaveType()

    {

        return $this->belongsTo(LeaveType::class);

    }
    public function leaveStatus()

    {

        return $this->belongsTo(LeaveStatus::class);

    }
}
