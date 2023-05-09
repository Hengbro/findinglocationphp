<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tempat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TempatController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validasi = Validator::make($request->all(), [
            'userId' => 'required',
            'nameTempat' => 'required',
            'kota' => 'required',
            'openH' => 'required',
            'closeH' => 'required',
            'nameKategori' => 'required',
            'deskription' => 'required',
        ]);

        if ($validasi->fails()) {
            return $this->error('Kesalahan: ' . $validasi->errors()->first());
        }
        $tempat = Tempat::create($request->all());
        return $this->success($tempat);
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
    public function cekTempat($id){
        $user = User::where('id', $id)->with('tempat')->first();
        if($user){
            return $this->success($user);
        }else{
            return $this->error("Pengguna tidak ditemukan");
        }
    }
    public function success($user, $message = "success"){
        return response()->json([
            'code' => 200,
            'message' => $message,
            'data' =>$user
        ]);
    }

    public function error($message){
        return response()->json([
            'code' => 400,
            'message' => $message
        ], 400);
    }
}
