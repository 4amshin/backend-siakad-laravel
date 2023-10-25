<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //display all
        return parent::toArray($request);

        //display certain data
        // return [
        //     'id' => $this->id,
        //     'title' => $this->title,
        //     'dosen_id' => $this->dosen_id,
        // ];
    }
}
