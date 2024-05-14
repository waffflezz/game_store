<?php

namespace App\Http\Service;

use App\Models\Game;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GameService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $genreIds = $data['genre_ids'] ?? [];
            unset($data['genre_ids']);

            $platformIds = $data['platform_ids'] ?? [];
            unset($data['platform_ids']);

            $data['main_image'] = Storage::disk('local')->put('/images', $data['main_image']);

            $game = Game::firstOrCreate($data);
            $game->genres()->attach($genreIds);
            $game->platforms()->attach($platformIds);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $game;
    }

    public function update($data, $game)
    {
        try {
            DB::beginTransaction();

            $genreIds = $data['genre_ids'] ?? [];
            unset($data['genre_ids']);

            $platformIds = $data['platform_ids'] ?? [];
            unset($data['platform_ids']);

            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('local')->put('/images', $data['main_image']);
            }

            $game->update($data);
            $game->genres()->sync($genreIds);
            $game->platforms()->sync($platformIds);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $game;
    }
}
