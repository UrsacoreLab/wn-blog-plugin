<?php

namespace UrsacoreLab\Blog\Resources;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use System\Classes\PluginManager;

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
            'gallery'      => $this->getGallery($this->gallery),
        ];
    }

    protected function getGallery($gallery): ?AnonymousResourceCollection
    {
        if (PluginManager::instance()->hasPlugin('UrsacoreLab.Gallery')) {
            return \UrsacoreLab\Gallery\Resources\GalleryResource::collection($gallery);
        }

        return null;
    }
}
