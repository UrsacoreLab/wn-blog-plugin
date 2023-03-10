<?php

namespace UrsacoreLab\Blog\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            //'id'       => $this->id,
            'name'     => $this->name,
            'slug'     => $this->slug,
            'keywords' => $this->keywords,
            //'status'   => $this->status,
        ];
    }
}
