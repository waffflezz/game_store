<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;


/**
 * @OA\Schema(
 *     schema="StoreGameRequest",
 *     title="Store Game Request",
 *     description="Request schema for storing a new game",
 *     required={"title", "description", "main_image", "platform_ids", "price"},
 *     @OA\Property(property="title", type="string", example="The Witcher 3: Wild Hunt"),
 *     @OA\Property(property="description", type="string", example="An action role-playing game."),
 *     @OA\Property(property="main_image", type="string", format="binary", description="Image file of the game."),
 *     @OA\Property(property="genre_ids", type="array", @OA\Items(type="integer"), example={1, 2}),
 *     @OA\Property(property="platform_ids", type="array", @OA\Items(type="integer", example=1)),
 *     @OA\Property(property="price", type="number", format="float", example=59.99),
 * )
 */
class StoreGameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'main_image' => 'required|file',
            'genre_ids' => 'nullable|array',
            'genre_ids.*' => 'nullable|integer|exists:genres,id',
            'platform_ids' => 'required|array',
            'platform_ids.*' => 'required|integer|exists:platforms,id',
            'price' => 'required|numeric|regex:/^\d{1,8}(\.\d{1,2})?$/'
        ];
    }
}
