<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\materi;
use App\Http\Resources\User\MateriCollection;

class MateriController extends Controller
{
    public function show($id)
    {
        $materi = materi::where('user_id', $id)->get();
        //return response()->json('berhasil', 200);
        return new MateriCollection($materi);
    }
}
