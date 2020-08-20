<?php

namespace App\Http\Resources\User;

use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = User::where('email', $request->email)->get()[0];
        return [
            'api_token' => $data->api_token,
            'email' => $this->email
        ];
    }
}
