<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Siswa;
use App\Http\Resources\Siswa\SiswaResource;
use App\Http\Resources\Siswa\SiswaCollection;



class SiswaController extends Controller
{
	public function corona()
	{
		$response = Http::get('https://api.kawalcorona.com/indonesia/provinsi');
		$data = $response->json();
		// return dump($data);
		return view('index', compact('data'));
	}

	public function get_siswa()
	{
		$data = Siswa::all();
		return new SiswaCollection($data);
		return response()->json($data, 200);
	}

	public function show($id)
	{
		$data = Siswa::find($id);
		if (is_null($data)) {
			return response()->json('data tidak ditemukan', 400); // mwmberitahu jika tidak ada data
		}
		return new SiswaResource($data);
		// return response()->json($data, 200);
	}

	public function store(Request $request, Siswa $siswa)
	{
		
		$this->validate($request,[
			'nama'=> 'required',
			'nisn'=> 'required',
			'tempat_lahir'=> 'required',
			'tanggal_lahir'=> 'required',
			'jurusan'=> 'required',
		]);

		$data = $siswa ->create([
			'nisn' => $request->nisn,
			'nama' => $request->nama,
			'tempat_lahir' => $request->tempat_lahir,
			'tanggal_lahir' => $request->tanggal_lahir,
			'jurusan' => $request->jurusan,
		]);
		return response()->json('success', 200);
	}

	public function update(Request $request, $id)
	{

		Siswa::where('id', $id)->first()->update([
			'nisn' => $request->nisn,
			'nama' => $request->nama,
			'tempat_lahir' => $request->tempat_lahir,
			'tanggal_lahir' => $request->tanggal_lahir,
			'jurusan' => $request->jurusan,
		]);
		return response()->json('update success', 200);
	}

	public function destroy(Request $request)
	{ 

		$jml = count($request->delete);
		// $id =  $request->delete[0]["id"];
		// return response()->json($id, 200); 
		$i = 0;
		while($i < $jml){
			$siswa = Siswa::find($request->delete[$i]["id"]);
			$siswa -> delete();
			$i++;
		}
		
		return response()->json('Delete Success', 200);
	}
}