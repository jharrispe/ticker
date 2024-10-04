<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    public function index()
    {
        $response = Http::get('https://live-pricing.pepperstone.com/quotes?symbols=AUDUSD,XAUAUD');
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
                'link' => '',
                'description' => sprintf('Bid: %s, Ask: %s, Close %s', $row['bid'], $row['ask'], $row['close']),
                'date' => $now,
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
