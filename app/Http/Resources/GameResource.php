<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="GameResource",
 *     title="Game Resource",
 *     description="Resource representing a Game",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="The Witcher 3: Wild Hunt"),
 *     @OA\Property(property="description", type="string", example="An action role-playing game."),
 *     @OA\Property(property="main_image", type="string", example="http://example.com/images/witcher.jpg"),
 *     @OA\Property(property="genre_ids", type="array", @OA\Items(type="integer"), example={1, 2}),
 *     @OA\Property(property="platform_ids", type="array", @OA\Items(type="integer", example=1)),
 *     @OA\Property(property="price", type="number", format="float", example=59.99),
 * )
 */
class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
