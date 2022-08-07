<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use app\Models\Qr;

use Illuminate\Support\Facades\DB;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrcodeController extends BaseController
{
    // public function __construct()
    // {
        
    // }
    public function index()
    {
        // $qr = DB::table("data_aset ")
        //     ->select("data_produk.nama_produk, data_wilayah.nama_wilayah, tgl")
        //     ->join('data_produk','id_produk','=','data_produk.id')
        //     ->join('data_wilayah','id_wilayah','=','data_wilayah.id')
        //     ->get();
        // $data['qr'] = $qr;
        // var_dump($qr); die;

        // $qr = Qr::getall();
        // $kode_produk = "MN";
        $kode_produk = "MN,DPK,JULI 2022";
        // $kode_daerah = "DPK";
        // $tgl = "Juli 2022";
        // var_dump($tgl); die;
        // $gabung = array($kode_daerah,$kode_produk,$tgl);

        $qrcode = QrCode::size(400)->generate($kode_produk);
        // $qrcode = QrCode::size(400)->generate($kode_daerah);
        // $qrcode = QrCode::size(400)->generate($tgl);

        return view("qrcode",compact("qrcode"));

    }
}