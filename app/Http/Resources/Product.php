<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed photos
 * @property mixed description
 * @property mixed name
 * @property mixed id
 * @property mixed body
 * @property mixed price
 * @property mixed categories
 * @method photos()
 */
class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->name,
            'detalhes' => $this->description,
            'descrição' => $this->body,
            'preço' => $this->price,
            // TODO ! Refatorar para varias categorias.
            'categorias' => $this->categories->first()->name,
            // TODO ! Refatorar para varias imagens.
            'imagem' => $this->photos->count() > 0 ? 'http://127.0.0.1:8000/storage/'.$this->photos()->first()->image : null,
        ];
    }
}
