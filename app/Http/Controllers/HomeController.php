<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $symbols = $request->query('symbols', 'AUDUSD,XAUAUD');
        $response = Http::get('https://live-pricing.pepperstone.com/quotes?symbols=' . $symbols);
        if ($response->failed()) {
            $response = Response::make('', 422);
            $response->header('Content-Type', 'application/rss+xml');
        }
        $responseData = json_decode($response->body(), true);

        $now = date("D, d M Y H:i:s O");

        $data = [];
        foreach ($responseData as $symbol => $row) {
            $data[] = [
                'title' => $symbol,
                'link' => 'https://ticker.prov1022.com',
                'description' => sprintf('Bid: %s, Ask: %s, Close %s', $row['bid'], $row['ask'], $row['close']),
                'date' => $now,
                'guid' => 'PS-PRV-000000' . rand(1000, 9999),
            ];
        }

        $contents = View::make('home')
            ->with('data', $data)
            ->with('now', $now);
        $response = Response::make($contents);
        $response->header('Content-Type', 'application/rss+xml');

        return $response;
    }
}
