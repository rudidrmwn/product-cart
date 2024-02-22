<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'img_url' => $this->picture,
            'name' => $this->name,
            'sku' => $this->sku,
            'qty' => $this->qty,
            'price' => $this->price,
        ];
    }

}
