<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ExternalTaskService
{
    protected string $baseUrl =
        'https://jsonplaceholder.typicode.com';

    public function getPosts()
    {
        $start = microtime(true);

        $response = Http::get(
            $this->baseUrl . '/posts'
        );

        $time = microtime(true) - $start;

        if ($response->successful()) {

            Log::info('GET /posts success', [
                'time' => $time
            ]);

            return $response->json();
        }

        Log::error('GET /posts failed', [
            'status' => $response->status(),
            'time' => $time
        ]);

        return null;
    }

    public function getPostById($id)
    {
        $start = microtime(true);

        $response = Http::get(
            $this->baseUrl . '/posts/' . $id
        );

        $time = microtime(true) - $start;

        if ($response->successful()) {

            Log::info('GET /posts/{id} success', [
                'id' => $id,
                'time' => $time
            ]);

            return $response->json();
        }

        Log::error('GET /posts/{id} failed', [
            'id' => $id,
            'status' => $response->status(),
            'time' => $time
        ]);

        return null;
    }

    public function createPost(array $data)
    {
        $start = microtime(true);

        $response = Http::post(
            $this->baseUrl . '/posts',
            $data
        );

        $time = microtime(true) - $start;

        if ($response->successful()) {

            Log::info('POST /posts success', [
                'time' => $time
            ]);

            return [
                'status' => $response->status(),
                'data' => $response->json()
            ];
        }

        Log::error('POST /posts failed', [
            'status' => $response->status(),
            'time' => $time
        ]);

        return null;
    }
}
