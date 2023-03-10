<?php

namespace UrsacoreLab\Blog\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            //'id'           => $this->id,
            //'category_id'  => $this->category_id,
            'name'         => $this->name,
            'keywords'     => $this->keywords,
            'title'        => $this->title,
            'introductory' => $this->introductory,
            'content'      => $this->content,
            'slug'         => $this->slug,
            //'status'       => $this->status,
            'category'     => CategoryResource::make($this->parent_category),
        ];
    }
}
