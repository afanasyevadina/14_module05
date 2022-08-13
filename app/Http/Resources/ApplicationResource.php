<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->candidate->name,
            'email' => $this->candidate->email,
            'phone' => $this->candidate->phone,
            'competences' => $this->applicationCompetences?->map(function ($item) {
                return [
                    'competence_id' => $item->competence_id,
                    'level_id' => $item->level_id,
                ];
            }),
        ];
    }
}
