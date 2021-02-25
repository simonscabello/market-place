<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Store extends JsonResource
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
            'telefone' => $this->phone,
            'whatsapp' => $this->mobile_phone,
            'slug' => $this->slug,
            'imagem' => $this->logo ? 'http://127.0.0.1:8000/storage/'.$this->logo : null
        ];
    }
}
