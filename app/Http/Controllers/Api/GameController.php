<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Admin\GameBaseController;
use App\Http\Requests\Admin\StoreGameRequest;
use App\Http\Requests\Admin\UpdateGameRequest;
use App\Http\Resources\GameCollection;
use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Laravel OpenApi Demo Documentation",
 *      description="L5 Swagger OpenApi description",
 *      @OA\Contact(
 *          email="admin@admin.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Demo API Server"
 * )

 *
 * @OA\Tag(
 *     name="Best Game Store",
 *     description="API Endpoints of Projects"
 * )
 */
class GameController extends GameBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     *
     * @OA\Get(
     *      path="/api/game",
     *      operationId="index",
     *      tags={"Games"},
     *      summary="Get all games",
     *      description="Returns a list of all games.",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/GameCollection")
     *      )
     * )
     */
    public function index()
    {
        $games = Game::all();
        return (new GameCollection($games))->response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGameRequest $request
     * @return JsonResponse
     *
     * @OA\Post(
     *      path="/api/game",
     *      operationId="store",
     *      tags={"Games"},
     *      summary="Create a new game",
     *      description="Creates a new game record.",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="title",
     *                      type="string",
     *                      example="The Witcher 3: Wild Hunt"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      type="string",
     *                      example="An action role-playing game."
     *                  ),
     *                  @OA\Property(
     *                      property="main_image",
     *                      type="string",
     *                      format="binary",
     *                      description="The main image file of the game."
     *                  ),
     *                  @OA\Property(
     *                      property="genre_ids[]",
     *                      type="array",
     *                      @OA\Items(anyOf={@OA\Schema(type="integer")}),
     *                  ),
     *                  @OA\Property(
     *                      property="platform_ids[]",
     *                      type="array",
     *                      @OA\Items(anyOf={@OA\Schema(type="integer")}),
     *                  ),
     *                  @OA\Property(
     *                      property="price",
     *                      type="number",
     *                      format="float",
     *                      example=59.99
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Game created successfully",
     *          @OA\JsonContent(ref="#/components/schemas/GameResource")
     *      )
     * )
     */
    public function store(StoreGameRequest $request)
    {
        $data = $request->validated();
        $game = $this->service->store($data);
        Log::info("Game ID $game->id created successfully");

        return (new GameResource($game))->response()->setStatusCode(ResponseAlias::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param Game $game
     * @return JsonResponse
     *
     * @OA\Get(
     *      path="/api/game/{game}",
     *      operationId="show",
     *      tags={"Games"},
     *      summary="Get a specific game",
     *      description="Returns a specific game by ID.",
     *      @OA\Parameter(
     *          name="game",
     *          in="path",
     *          description="ID of the game to retrieve",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/GameResource")
     *      )
     * )
     */
    public function show(Game $game)
    {
        return (new GameResource($game))->response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateGameRequest $request
     * @param Game $game
     * @return JsonResponse
     *
     * @OA\Patch  (
     *      path="/api/game/{game}",
     *      operationId="update",
     *      tags={"Games"},
     *      summary="Update a game",
     *      description="Updates a game record.",
     *
     *      @OA\Parameter(
     *           name="game",
     *           in="path",
     *           description="ID of the game to update",
     *           required=true,
     *           @OA\Schema(type="integer")
     *       ),
     *      @OA\RequestBody(
     *          required=true[h,
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="title",
     *                      type="string",
     *                      example="The Witcher 3: Wild Hunt"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      type="string",
     *                      example="An action role-playing game."
     *                  ),
     *                  @OA\Property(
     *                      property="main_image",
     *                      type="string",
     *                      format="binary",
     *                      description="The main image file of the game."
     *                  ),
     *                  @OA\Property(
     *                      property="genre_ids",
     *                      type="array",
     *                      @OA\Items(anyOf={@OA\Schema(type="integer")}),
     *                  ),
     *                  @OA\Property(
     *                      property="platform_ids",
     *                      type="array",
     *                      @OA\Items(anyOf={@OA\Schema(type="integer")}),
     *                  ),
     *                  @OA\Property(
     *                      property="price",
     *                      type="number",
     *                      format="float",
     *                      example=59.99
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Game updated successfully",
     *          @OA\JsonContent(ref="#/components/schemas/GameResource")
     *      )
     * )
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        $data = $request->validated();
        $game = $this->service->update($data, $game);
        Log::info("Game ID $game->id updated successfully");

        return (new GameResource($game))->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Game $game
     * @return Response
     *
     * @OA\Delete(
     *      path="/api/game/{game}",
     *      operationId="destroy",
     *      tags={"Games"},
     *      summary="Delete a game",
     *      description="Deletes an existing game record.",
     *      @OA\Parameter(
     *          name="game",
     *          in="path",
     *          description="ID of the game to delete",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Game deleted successfully"
     *      )
     * )
     */
    public function destroy(Game $game)
    {
        $game->delete();

        Log::info("Game ID $game->id deleted successfully");
        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
