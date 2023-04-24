<?php

namespace App\Http\Resources\Member;

use App\Http\Resources\Book\BookResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
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
            'member_name' => $this->name,
            'gender' => $this->formatGender($this->gender),
            'birthday' => $this->birthday,
            'books' => ($this->whenLoaded('books', function () {
                $data = $this->books()->get();
                return BookResource::collection($data);
            }))
        ];
    }

    public function formatGender($gender)
    {
        $genderName = '';
        switch ($gender) {
            case 1:
                $genderName = 'male';
                break;
            case 2:
                $genderName = 'female';
                break;
            case 3:
                $genderName = 'other male';
                break;
        }
        return $genderName;
    }
}
