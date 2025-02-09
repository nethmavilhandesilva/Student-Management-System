<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'enrollment_id',  // ✅ Fixed typo
        'paid_date',
        'amount',
    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class, 'enrollment_id');  // ✅ Explicitly define foreign key
    }
}
