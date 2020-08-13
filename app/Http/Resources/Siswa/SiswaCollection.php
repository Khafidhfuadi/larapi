<?php

namespace App\Http\Resources\Siswa;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SiswaCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
        return[
            'data' => SiswaResource::collection($this->collection),
            'jumlah' => $this->collection->count(),
            
        ];
    }
}