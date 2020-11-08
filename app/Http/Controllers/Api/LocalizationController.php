<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocalizationRequest;
use App\Localization;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    /**
     * @var Localization
     */
    private $localization;

    public function __construct(Localization $localization)
    {
        $this->localization = $localization;
    }

    /**
     * @OA\Get(
     *     path="/api/localizations/{id}",
     *     tags={"localizations"},
     *     summary="Find localization by ID",
     *     description="Returns a single localization",
     *     operationId="id",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of localization to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/localization"),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Localization not found"
     *     )
     * )
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        try {
            $localization = $this->localization->find($id);
            if (!$localization) throw new Exception(sprintf('Not found localization for #id:%d', $id), 404);
        } catch (Exception $exp) {
            return response()->json([
                "message" => 'Missing Data',
                "errors" => $exp->getMessage()
            ], $exp->getCode());
        }

        return response()->json($localization);
    }

    /**
     * Add a new pet to the store
     *
     * @OA\Post(
     *     path="/api/localizations",
     *     tags={"localization"},
     *     operationId="id",
     *     @OA\Response(
     *         response=201,
     *         description="successful operation"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Missing Data"
     *     ),
     *     requestBody={"$ref": "#/components/requestBodies/localization"}
     * )
     *
     * @param LocalizationRequest $request
     * @return JsonResponse
     */
    public function save(LocalizationRequest $request)
    {
        $data = $request->all();
        $localization = $this->localization->create($data);

        return response()->json($localization, 201);
    }
}
