<?php

namespace App\Http\Resources\Job;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetJobCompanyResource extends JsonResource
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
            'status' => $this->status,
            'name' => $this->name,
            'web_address' => $this->web_address,
            'email' => $this->email,
            'location' => $this->location,
            'address' => $this->address,
            'description' => $this->description,
            // 'image_id' => $this->image_id,
        ];
    }
}
