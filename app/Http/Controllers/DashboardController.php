<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\Desa;
use App\Models\Footer;
use App\Models\Header;
use App\Models\Produk;
use App\Models\User;
use App\Models\Warga;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index()
    {
        $warga = Warga::where('desa_id', getDesaFromUrl()->id)->count();
        $aduan = Aduan::where('desa_id', getDesaFromUrl()->id)->count();
        $produk = Produk::where('desa_id', getDesaFromUrl()->id)->count();
        $pengguna = User::where('desa_id', getDesaFromUrl()->id)->whereHas('roles', function ($qr) {
            return $qr->where('name', 'Warga');
        })->count();

        return view('dashboard.index', [
            'warga' => $warga,
            'aduan' => $aduan,
            'pengguna' => $pengguna,
            'produk' => $produk
        ]);
    }

    public function setting()
    {
        $desa = Desa::findOrFail(auth()->user()->desa_id);

        if ($desa->header == null) {
            try {
                Header::create([
                    'desa_id' => auth()->user()->desa_id
                ]);
            } catch (\Throwable $th) {
                dd($th->getMessage());
            }
        }
        if ($desa->footer == null) {
            try {
                Footer::create([
                    'desa_id' => auth()->user()->desa_id
                ]);
            } catch (\Throwable $th) {
                dd($th->getMessage());
            }
        }

        return view('dashboard.setting', compact('desa'));
    }

    public function updateSetting(Desa $desa)
    {
        if ($desa->id != getDesaFromUrl()->id) {
            toast('akses dilarang', 'warning');
            return back();
        }
        $this->validate(request(), [
            'alamat' => 'required',
            'email' => 'required',
            'color' => 'required',
            'tentang' => 'required',
            'telepon' => 'required',
        ]);
        $fieldOfDesa = [
            'alamat' => request('alamat')
        ];
        if (request()->file('dark_logo')) {
            Storage::delete($desa->dark_logo);
            $name = rand() . '_' . Carbon::now()->format('YmdHis') . '_' . request()->file('dark_logo')->getClientOriginalName();
            $dark_logo = request()->file('dark_logo')->storeAs('desa/logo/', $name);
            $fieldOfDesa['dark_logo'] = $dark_logo;
        }

        if (request()->file('light_logo')) {
            Storage::delete($desa->light_logo);
            $name = rand() . '_' . Carbon::now()->format('YmdHis') . '_' . request()->file('light_logo')->getClientOriginalName();
            $light_logo = request()->file('light_logo')->storeAs('desa/logo/', $name);
            $fieldOfDesa['light_logo'] = $light_logo;
        }

        DB::beginTransaction();
        try {
            $desa->update($fieldOfDesa);
            $desa->header()->update([
                'email' => request('email'),
                'color' => request('color')
            ]);
            $desa->footer()->update([
                'tentang' => request('tentang'),
                'alamat' => request('alamat'),
                'telepon' => request('telepon'),
                'email' => request('email')
            ]);
            DB::commit();
            Alert::success('Selamat', 'Background berhasil diubah');
            return back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Error', $th->getMessage());
            return back();
        }
    }
}
