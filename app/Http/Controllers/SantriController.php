<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;
use App\Services\SantriService;
use App\Http\Requests\StoreSantriRequest;
use Illuminate\Http\Response;
use Illuminate\View\View;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SantriController extends Controller
{
    protected $santriservice;

    public function __construct(SantriService $santriservice) {
        $this->santriservice = $santriservice;
    }

    public function index(Request $request): View
    {
        $perPage = $request->get('per_page', 10);
        $santri = $this->santriservice->getAllPaginate($perPage);
        return view('santri.santri-index', compact('santri','perPage'));
    }

    public function add(): View
    {
        return view('santri.santri-add');
    }

    
    public function store(StoreSantriRequest $request) {
        $this->santriservice->store($request->validated());
        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    //view santri
    public function view($id) {
        $santri = $this->santriservice->getById($id);
        return view('santri.santri-view', compact('santri'));
    }

    public function destroy($id) {
        $this->santriservice->destroy($id);
        return redirect()->to('santri')->with('success', 'Data berhasil dihapus.');
    }
    //generate last nis
    public function generateNis(Request $request)
    {
        $angkatan = $request->angkatan;
        $tahun = $request->tahun;

        $lastNis = Santri::where('angkatan', $angkatan)
        ->whereYear('tgl_lahir', $tahun)
        ->orderByDesc('nis')
        ->value('nis');

        $urutan = 1;

        if ($lastNis) {
            $urutan = intval(substr($lastNis, -3)) + 1;
        }
    
        return response()->json([
            'urut' => str_pad($urutan, 3, '0', STR_PAD_LEFT)
        ]);
    }

    //download qr code
    public function downloadQr(Request $request) {
        $nis = $request->query('nisqr') ?? 'default_nis';
        $svg = QrCode::format('svg')->size(300)->generate($nis);
    
    // Set the filename for the download
    $filename = 'qrcode_' . $nis . '.svg';

    // Return the SVG file directly with the correct headers
    return response($svg)
        ->header('Content-Type', 'image/svg+xml')
        ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}
