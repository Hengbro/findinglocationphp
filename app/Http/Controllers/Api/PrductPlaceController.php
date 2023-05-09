<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helper;
use App\Models\ProdukTemp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PrductPlaceController extends Controller
{
    use Helper;
    public function index()
    {
        //
    }
    public function create()
    {

    }
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validasi = Validator::make($request->all(), [
            'name'=> 'required',
            'price'=> 'required',
            'description'=> 'required',
        ]);

        if ($validasi->fails()) {
            return $this->error('Kesalahan: ' . $validasi->errors()->first());
        }
        $product = ProdukTemp::create($request->all());
        return $this->success($product);
    }
    public function show($id)
    {
        $lokasi = ProdukTemp::where('tempatId', $id)->where('isActive', true)->get();
        return $this->success($lokasi);
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $lokasi = ProdukTemp::where('Id', $id)->first();
        if($lokasi){
            $lokasi->update($request->all());
            return $this->success($lokasi);
        } else{
            return $this->error('Produk tidak ditemukan');
        }
    }
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $lokasi = ProdukTemp::where('id', $id)->first();
        if($lokasi){
            $lokasi->update([
                'isActive' => false
            ]);
            return $this->success($lokasi, "Produk berhasil di hapus");
        }else{
            return $this->error("Produk tidak di temukan");
        }
    }

}
