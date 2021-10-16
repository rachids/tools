<?php

namespace App\Http\Controllers;

use App\Service\Date\DateUtils;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DateToolsController extends Controller
{
    public function diff(Request $request): JsonResponse
    {
        $request->validate([
            'start' => 'required|date_format:Y-m-d|before:end',
            'end' => 'required|date_format:Y-m-d|after:start',
        ]);

        $dateService = DateUtils::makeFromString($request->get('start'), $request->get('end'));

        return response()->json([
            'data' => $dateService->getDifference(),
        ]);
    }

    public function counter(Request $request): JsonResponse
    {
        $request->validate([
            'target_date' => 'required|date|after:now',
        ]);

        $dateService = DateUtils::makeFromString(now()->format('Y-m-d'), $request->get('target_date'));

        return response()->json([
            'data' => $dateService->getDifference(),
        ]);
    }
}
