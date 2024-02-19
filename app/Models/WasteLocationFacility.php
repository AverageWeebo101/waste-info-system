<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteLocationFacility extends Model
{
    use HasFactory;

    protected $table = 'waste_location_facilities';
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'facility_id',
        'facility_name',
        'facility_address',
        'facility_description',
        'facility_status',
    ];
}
