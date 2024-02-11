<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    use HasFactory;

    protected $fillable = [
        'WasteID',
        'WasteName',
        'WasteType',
        'TimeCollected',
        'MassCollected',
        'AreaCollected',
        'DisposalLocation',
        'Solid',
        'Liquid',
        'Biodegradable',
        'NonBiodegradable',
        'Recyclable',
        'Hazardous',
        'Corrosive',
        'Ignitable',
        'Reactive',
        'Toxic',
        'WasteCategory',
        'OtherDescription',
    ];
}
