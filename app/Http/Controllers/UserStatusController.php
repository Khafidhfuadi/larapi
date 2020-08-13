<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\User_status;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserCollection;

class UserStatusController extends Controller
{
    
    public function show($id)
	{
		$data = User::find($id);
		if (is_null($data)) {
			return response()->json('data tidak ditemukan', 400); // mwmberitahu jika tidak ada data
		}
		return new UserResource($data);
		// return response()->json($data, 200);
	}
}
