<?php

namespace App\Http\Resources\Job;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetDeletedJobResource extends JsonResource
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
            'slug' => $this->slug,
            'description' => $this->description,
            'working_hours' => $this->working_hours,
            'company_name' => $this->company_name,
            'category' => $this->category_name,
            // 'image_id' => $this->image_id,
        ];
    }
}
