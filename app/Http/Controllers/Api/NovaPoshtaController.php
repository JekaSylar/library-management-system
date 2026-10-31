<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NovaPoshtaController extends Controller
{
    private string $apiUrl = 'https://api.novaposhta.ua/v2.0/json/';

    public function searchCities(Request $request): JsonResponse
    {
        $query = $request->input('q');

        if (empty($query) || mb_strlen($query) < 2) {
            return response()->json([]);
        }

        $response = Http::post($this->apiUrl, [
            'apiKey'           => config('services.nova_poshta.api_key'),
            'modelName'        => 'Address',
            'calledMethod'     => 'searchSettlements',
            'methodProperties' => [
                'CityName' => $query,
                'Limit'    => 50,
            ],
        ]);

        $addresses = $response->json('data.0.Addresses') ?? [];

        $mapped = collect($addresses)->map(fn ($item) => [
            'ref'  => $item['Ref'],
            'text' => $item['Present'],
        ])->values();

        return response()->json($mapped);
    }

    public function searchStreets(Request $request): JsonResponse
    {
        $cityRef = $request->input('city_ref');
        $query   = $request->input('q');

        if (empty($cityRef) || empty($query) || mb_strlen($query) < 2) {
            return response()->json([]);
        }

        $response = Http::post($this->apiUrl, [
            'apiKey'           => config('services.nova_poshta.api_key'),
            'modelName'        => 'Address',
            'calledMethod'     => 'searchSettlementStreets',
            'methodProperties' => [
                'StreetName'    => $query,
                'SettlementRef' => $cityRef,
                'Limit'         => 50,
            ],
        ]);

        $addresses = $response->json('data.0.Addresses') ?? [];

        $mapped = collect($addresses)->map(fn ($item) => [
            'ref'  => $item['SettlementStreetRef'],
            'text' => $item['Present'],
        ])->values();

        return response()->json($mapped);
    }
}
