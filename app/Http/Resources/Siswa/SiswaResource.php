<?php

namespace App\Http\Resources\Siswa;

use Illuminate\Http\Resources\Json\JsonResource;

class SiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'nama' => $this->nama,
            'nisn' => $this->nisn,
            'tempat_lahir' => $this->tempat_lahir,
            'jurusan' => $this->jurusan,
            'tempat_lahir' => $this->tempat_lahir,
            'mendaftar' => $this->created_at ->diffForHumans()
        ];
    }
}