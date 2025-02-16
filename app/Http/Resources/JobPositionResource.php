<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobPositionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"            => $this->id,
            "title"         => $this->title,
            "about"         => $this->about,
            "opportunities" => OpportunityResource::collection($this->whenLoaded("opportunities")),
            "skills"        => SkillResource::collection($this->whenLoaded("skills"))
        ];
    }
}
