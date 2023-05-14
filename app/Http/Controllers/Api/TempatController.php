<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tempat;
use App\Models\User;
use App\Http\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TempatController extends Controller
{
    use Helper;
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
            'kategori'=>'required',
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
        $tempat = Tempat::where('userId', $id)->where('isActive', true)->get();
        return $this->success($tempat);
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $tempat = Tempat::where('id', $id)->first();
        if($tempat){
            $tempat->update($request->all());
            return $this->success($tempat);
        } else{
            return $this->error('Tempat tidak ditemukan');
        }
    }
    public function destroy($id)
    {
        $tempat = Tempat::where('id', $id)->first();
        if($tempat){
            $tempat->update([
                'isActive' => false,
                'userId' => '0'
            ]);
            return $this->success($tempat, "Tempat berhasil di hapus");
        }else{
            return $this->error("Tempat tidak di temukan");
        }
    }
    public function cekTempat($id){
        $user = User::where('id', $id)->with('tempat')->first();
        if($user){
            return $this->success($user);
        }else{
            return $this->error("Pengguna tidak ditemukan");
        }
    }
    public function uploadImgTempat(Request $request){
        $fileName = "";
        if($request->imageTempat){
            $image = $request->imageTempat->getClientOriginalName();
            $image = str_replace(' ', '', $image);
            $image = date('Hs') . rand(1,999) . "_" . $image;
            $fileName = $image;
            $request->imageTempat->storeAs('public/imagetempat', $image);

            return  $this->success($fileName);
        }else{
            return $this->error("Image wajib di kirim");
        }
    }
    public function uploadImgPemilik(Request $request){
        $fileName = "";
        if($request->imagaPemilik){
            $image = $request->imagaPemilik->getClientOriginalName();
            $image = str_replace(' ', '', $image);
            $image = date('Hs') . rand(1,999) . "_" . $image;
            $fileName = $image;
            $request->imagaPemilik->storeAs('public/imagepemilik', $image);

            return  $this->success($fileName);
        }else{
            return $this->error("Image wajib di kirim");
        }
    }

}
