<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Category extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome' => $this->name,
            'descrição' => $this->description,
            'slug' => $this->slug,
            // TODO ! Refotorar para varios produtos e fazer do jeito certo. 
            'produtos' => $this->products() ? $this->products()->get()->first()['name'] : null,
        ];
    }
}
