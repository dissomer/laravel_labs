<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ExternalTaskService;

class ExternalApiController extends Controller
{
    protected ExternalTaskService $service;

    public function __construct(
        ExternalTaskService $service
    ) {
        $this->service = $service;
    }

    public function posts()
    {
        $posts = $this->service->getPosts();

        if (!$posts) {
            return response()->json([
                'message' => 'External API error'
            ], 500);
        }

        return response()->json($posts);
    }

    public function show($id)
    {
        $post = $this->service->getPostById($id);

        if (!$post) {
            return response()->json([
                'message' => 'Post not found'
            ], 404);
        }

        return response()->json($post);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'userId' => 'required|integer'
        ]);

        $response = $this->service
            ->createPost($validated);

        if (!$response) {
            return response()->json([
                'message' => 'Create failed'
            ], 500);
        }

        return response()->json($response);
    }
}
