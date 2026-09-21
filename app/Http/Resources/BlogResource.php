<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'status' => (bool) $this->status,
            'created_at' => $this->created_at ? $this->created_at->format('Y-m-d H:i:s') : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('Y-m-d H:i:s') : null,
        ];
    }
    public function show($id)
{
    $blog = Blog::findOrFail($id);
    return new BlogResource($blog);
}

// PUT /api/blogs/{id}
public function update(Request $request, $id)
{
    $blog = Blog::findOrFail($id);
    
    $request->validate([
        'title' => 'sometimes|required|string|max:255',
        'content' => 'sometimes|required|string'
    ]);

    $blog->update($request->all());
    return new BlogResource($blog);
}

// DELETE /api/blogs/{id}
public function destroy($id)
{
    $blog = Blog::findOrFail($id);
    $blog->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'ลบบทความเรียบร้อยแล้ว'
    ], 200);
}
}