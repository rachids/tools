<?php

namespace App\Http\Controllers;

use App\Service\Random\DiceUtil;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RandomController extends Controller
{
    public function dice(Request $request, DiceUtil $dice): JsonResponse
    {
        $request->validate([
            'min' => 'required|integer|lt:max',
            'max' => 'required|integer|gt:min',
        ]);

        return response()->json([
            'data' => $dice->generateRandomNumber($request->get('min'), $request->get('max')),
        ]);
    }

    public function pick(Request $request): JsonResponse
    {
        $request->validate([
            'items' => 'required|array|min:2',
        ]);

        $collection = collect($request->get('items'));

        return response()->json([
            'data' => $collection->shuffle()->first(),
        ]);
    }
}
