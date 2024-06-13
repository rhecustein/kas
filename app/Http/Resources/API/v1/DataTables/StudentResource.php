<?php

namespace App\Http\Resources\API\v1\DataTables;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'email' => $this->email,
            'gender' => $this->gender,
            'gender_name' => $this->getGenderName(),
            'school_year_start' => $this->school_year_start,
            'school_year_end' => $this->school_year_end,
        ];
    }
}
