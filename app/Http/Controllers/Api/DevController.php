<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use App\Models\Desa;
use App\Models\GolonganDarah;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\StatusPerkawinan;
use App\Models\Suku;
use App\Models\Warga;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DevController extends Controller
{
    public function getcetaksurat(Request $request)
    {
        $data = [];
        $resources = Warga::orWhere('nama_warga', 'like', '%' . $request->q . '%')->orWhere('nik', 'like', '%' . $request->q . '%')->get();
        foreach ($resources as $resource) {
            $data[] = ['id' => $resource->id, 'text' => $resource->nama_warga . ' - ' . $resource->nik];
        }
        return response()->json($data);
    }
    public function showcetaksurat($id)
    {
        $resource = Warga::findOrFail($id);
        $response = [
            'resource' => $resource,
            'umur' =>  Carbon::now()->format('Y') - Carbon::parse($resource->tanggal_lahir)->format('Y')
        ];
        return response()->json($response);
    }
    public function getfindfamily($id)
    {
        $warga = Warga::find($id);
        $resource = Warga::where('kk', $warga->kk)->get();
        return response()->json($resource);
    }
    public function dev()
    {
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(public_path('template/template.docx'));

        $templateProcessor->setValues([
            'number' => '212/SKD/VII/2019',
            'name' => 'Alfa',
            'birthplace' => 'Bandung',
            'birthdate' => '4 Mei 1991',
            'gender' => 'Laki-Laki',
            'religion' => 'Islam',
            'address' => 'Jln. ABC no 12',
            'date' => date('Y-m-d'),
        ]);
        $templateProcessor->setImageValue('CompanyLogo', public_path('qsindoflatbaru.jpg'));
        header("Content-Disposition: attachment; filename=template.docx");

        $templateProcessor->saveAs('php://output');
    }
    public function agama()
    {
        $agamas = Agama::get();
        $array = [];
        foreach ($agamas as $agama) {
            array_push($array, [
                'label' => $agama->nama,
                'data' => [[1, round($agama->wargas()->where('desa_id',request()->desa_id)->count() / Warga::where('desa_id',request()->desa_id)->get()->count() * 100)]],
                'color' => '#' . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT)
            ]);
        }
        return response()->json($array);
    }
    public function suku()
    {

        $sukus = Suku::get();
        $array = [];
        foreach ($sukus as $suku) {
            array_push($array, [
                'label' => $suku->nama,
                'data' => [[1, round($suku->wargas()->where('desa_id',request()->desa_id)->count() / Warga::where('desa_id',request()->desa_id)->get()->count() * 100)]],
                'color' => '#' . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT)
            ]);
        }
        return response()->json($array);
    }
    public function golongandarah()
    {
        $golongandarahs = GolonganDarah::get();
        $array = [];
        foreach ($golongandarahs as $golongandarah) {
            array_push($array, [
                'label' => $golongandarah->nama,
                'data' => [[1, round($golongandarah->wargas()->where('desa_id',request()->desa_id)->count() / Warga::where('desa_id',request()->desa_id)->get()->count() * 100)]],
                'color' => '#' . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT)
            ]);
        }
        return response()->json($array);
    }
    public function jeniskelamin()
    {
        $array = [];
        foreach (Warga::getPossibleJenisKelamin() as $jeniskelamin) {
            array_push($array, [
                'label' => $jeniskelamin,
                'data' => [[1, round(Warga::where('jenis_kelamin',$jeniskelamin)->count()) / Warga::count() * 100]],
                'color' => '#' . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT)
            ]);
        }
        return response()->json($array);
    }
    public function statusperkawinan()
    {
        $statusperkawinans = StatusPerkawinan::get();
        $array = [];
        foreach ($statusperkawinans as $statusperkawinan) {
            array_push($array, [
                'label' => $statusperkawinan->nama,
                'data' => [[1, round($statusperkawinan->wargas()->where('desa_id',request()->desa_id)->count() / Warga::where('desa_id',request()->desa_id)->get()->count() * 100)]],
                'color' => '#' . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT)
            ]);
        }
        return response()->json($array);
    }
    public function pendidikan()
    {
        $pendidikans = Pendidikan::get();
        $array = [];
        foreach ($pendidikans as $pendidikan) {
            array_push($array, [
                'label' => $pendidikan->nama,
                'data' => [[1, round($pendidikan->wargas()->where('desa_id',request()->desa_id)->count() / Warga::where('desa_id',request()->desa_id)->get()->count() * 100)]],
                'color' => '#' . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT)
            ]);
        }
        return response()->json($array);
    }
    public function pekerjaan()
    {
        $pekerjaans = Pekerjaan::get();
        $array = [];
        foreach ($pekerjaans as $pekerjaan) {
            array_push($array, [
                'label' => $pekerjaan->nama,
                'data' => [[1, round($pekerjaan->wargas()->where('desa_id',request()->desa_id)->count() / Warga::where('desa_id',request()->desa_id)->get()->count() * 100)]],
                'color' => '#' . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT)
            ]);
        }
        return response()->json($array);
    }
    public function umur()
    {
        $warga = Warga::where('desa_id',request()->desa_id)->get();
        $arra = [];
        $range = range(1, 80);
        foreach ($warga as $data) {
            array_push($arra, Carbon::now()->format('Y') - Carbon::parse($data->tanggal_lahir)->format('Y'));
        }
        $result = [];
        foreach ($range as $me) {
            array_push($result,count(array_filter($arra, function ($data) use($me) {
                return $data == $me;
            })));
        }
        $response = [
            'label' => $range,
            'data' => $result
        ];
        return response()->json($response);
    }
    public function dusun()
    {
        $desas = Desa::get();
        $arra = [];
        $sad = [];
        foreach($desas as $desa){
            array_push($arra,$desa->nama_desa);
            array_push($sad,$desa->warga->count());
        }
        return response()->json([
            'desa' => $arra,
            'jumlah' => $sad
        ]);
    }
}
