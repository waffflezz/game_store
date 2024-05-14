<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Genre",
 *     title="Genre",
 *     description="Genre model",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Action"),
 * )
 */
class Genre extends Model
{
    use HasFactory;

    protected $guarded = false;
}
