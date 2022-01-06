<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\Antrian;
use App\Models\Desa;
use App\Models\Gallery;
use App\Models\Informasi;
use App\Models\JenisSurat;
use App\Models\KategoriInformasi;
use App\Models\Loket;
use App\Models\Marque;
use App\Models\Playlist;
use App\Models\Rate;
use App\Models\Rating;
use App\Models\Slider;
use App\Models\Warga;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        $desa = getDesaFromUrl();
        $sliders = Slider::where('desa_id', $desa->id)->get();
        $informations = Informasi::where('desa_id', $desa->id)->latest()->paginate(6);
        return view('landing.home', compact('desa', 'sliders', 'informations'));
    }
    public function profile()
    {
        $desa = getDesaFromUrl();
        $sliders = Slider::where('desa_id', $desa->id)->get();
        return view('landing.profile', compact('desa', 'sliders'));
    }
    public function sejarah()
    {
        $desa = getDesaFromUrl();
        $sliders = Slider::where('desa_id', $desa->id)->get();
        return view('landing.sejarah', compact('desa', 'sliders'));
    }
    public function kategori($id)
    {
        $desa = getDesaFromUrl();
        $informasis = Informasi::where('kategori_informasi_id', $id)->latest()->paginate(12);
        $sliders = Slider::where('desa_id', $desa->id)->get();
        $kategori_informasi = KategoriInformasi::findOrFail($id);
        return view('landing.kategori', compact('desa', 'informasis', 'sliders', 'kategori_informasi'));
    }
    public function gallery()
    {
        $desa = getDesaFromUrl();
        $galleries = Gallery::where('desa_id', $desa->id)->get();
        return view('landing.gallery', compact('desa', 'galleries'));
    }

    public function antrian()
    {
        $url = url()->current();
        $url = explode('/', $url);
        $desa = Desa::where('sub_domain', $url[2])->firstOrFail();
        $title = $desa->nama_desa;

        // $selesai = Antrian::with('loket')->where('tanggal_antri', now('Asia/Jakarta')->format('Y-m-d'))->where('status', 2)->get();
        $no_antri = Antrian::where('tanggal_antri', now('Asia/Jakarta')->format('Y-m-d'))->count();
        $sisaloket = Loket::where('kuota', '>', 0)->where('desa_id', $desa->id)->count();
        $loket = Loket::where('desa_id', $desa->id)->get();
        $jenis = JenisSurat::get();
        // $playlist = Playlist::firstOrFail();
        $marques = Marque::where('desa_id', $desa->id)->get();
        $siswa = Antrian::where('tanggal_antri', now('Asia/Jakarta')->format('Y-m-d'))->where('status', 0)->count();

        return view('landing.antrian', compact('no_antri', 'jenis',  'loket', 'sisaloket',  'marques', 'title'));
    }

    public function storeAntrian(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'jenis' => 'required',
            'loket_id' => 'required'
        ]);

        try {
            $warga = Warga::where('nik', $request->nik)->firstOrFail();

            $loket = Loket::where('desa_id', $warga->desa_id)->where('kuota', '>', 0)->find($request->loket_id);

            $antrian =  Antrian::create([
                'warga_id' => $warga->id,
                'jenis_surat_id' => $request->jenis,
                'no_antrian' => $request->no_antri,
                'desa_id' => $warga->desa_id,
                'loket_id' => $loket->id

            ]);
            $sisa = $loket->kuota - 1;
            $loket->update(['kuota' => $sisa]);

            Alert::success('Selamat!', 'Pendaftaran antrian berhasil dilakukan');
            return view('landing.print', compact('antrian', 'sisa'));
        } catch (\Throwable $th) {
            Alert::error('Error!', $th->getMessage());
            return back();
        }
    }

    public function aduan()
    {
        $url = url()->current();
        $url = explode('/', $url);
        $desa = Desa::where('sub_domain', $url[2])->firstOrFail();
        $title = $desa->nama_desa;

        return view('landing.aduan', compact('title'));
    }

    public function storeAduan()
    {
        request()->validate([
            'nik' => 'required',
            'aduan' => 'required'
        ]);

        try {
            $warga = Warga::where('nik', request('nik'))->firstOrFail();

            Aduan::create([
                'warga_id' => $warga->id,
                'desa_id' => $warga->desa_id,
                'aduan' => request('aduan'),
            ]);

            Alert::success('Success!', 'Aduan berhasil dikirim');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Error!', 'Mohon periksa kembali data yang anda masukkan');
            return back();
        }
    }

    public function penilaian()
    {
        $url = url()->current();
        $url = explode('/', $url);
        $desa = Desa::where('sub_domain', $url[2])->firstOrFail();
        $title = $desa->nama_desa;

        $rates = Rate::get();
        return view('landing.penilaian', compact('rates', 'title'));
    }

    public function storePenilaian($id)
    {
        Rating::create(['rate_id' => $id]);

        Alert::success('Selamat!', 'Penilaian anda berhasil dikirimkan, terima kasih.');
        return back();
    }
}
