<?php

namespace App\Models;

use App\Enums\CustomerSalutationEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    use HasUuids;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'salutation',
        'first_name',
        'last_name',
        'company_name',
        'tax_number',
        'street',
        'location',
        'country',
        'mobile_number',
        'email',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'salutation' => CustomerSalutationEnum::class,
    ];

    /**
     * Get the projects for the customer.
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
