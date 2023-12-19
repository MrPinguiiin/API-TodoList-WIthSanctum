<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
            'created_diff_human' => $this->created_at->diffForHumans(),
            'user' => UserResource::make($this->user),
            'success' => 201,
            'messsage' => 'Todo created successfully',
        ];
    }
}
