<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //display all
        // return parent::toArray($request);

        //display certain data only
        return [
            'id' => $this->id,
            // 'student_id' => $this->student_id,
            // 'subject_id' => $this->subject_id,
            'schedule_type' => $this->schedule_type,
            'subject' => new SubjectResource($this->subject),
            'student' => new UserResource($this->student),
        ];
    }
}
