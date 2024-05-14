<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Platform",
 *     title="Platform",
 *     description="Platform model",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="PlayStation 5"),
 * )
 */
class Platform extends Model
{
    use HasFactory;

    protected $guarded = false;
}
