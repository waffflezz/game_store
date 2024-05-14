<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @OA\Schema(
 *     schema="Game",
 *     title="Game",
 *     description="Game model",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="The Witcher 3: Wild Hunt"),
 *     @OA\Property(property="description", type="string", example="An action role-playing game."),
 *     @OA\Property(property="main_image", type="string", example="http://example.com/images/witcher.jpg"),
 *     @OA\Property(
 *         property="genres",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/Genre")
 *     ),
 *     @OA\Property(
 *         property="platforms",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/Platform")
 *     ),
 * )
 */
class Game extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    public function platforms(): BelongsToMany
    {
        return $this->belongsToMany(Platform::class);
    }
}
