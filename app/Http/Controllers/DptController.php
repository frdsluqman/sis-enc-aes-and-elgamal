<?php

namespace App\Http\Controllers;

use App\Helpers\CTR;
use App\Helpers\AES;
use App\Models\Dpt;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $dpt = Dpt::all();
        return view('dpt.index-dpt', \compact('dpt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $kec = Kecamatan::all();
        return view('dpt.create-dpt', \compact('kec'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // $fileLama = "/storage/files/F-61324aa3b12bf.xlsx";
        // $isiFileLama = file_get_contents(public_path() . $fileLama);

        $request->validate([
            'file' => ['required', 'file', 'mimes:docx,xls,xlsx,csv,pdf']
        ]);

        $file = $request->file('file');
        $fileContent = $file->get();
        $name = uniqid('F-');
        $extension = $file->getClientOriginalExtension();
        $newname = $name . '.' . $extension;
        $text = $fileContent;
        $key = $request->key;
        $cipher = new CTR(new AES($key));
        $enkrip = $cipher->enkripsi($text);
        $code = base64_encode($enkrip);
        // $p = $request->p;
        // $g = $this->g($p);
        // $x = $this->x($p);
        // $y = $this->y($g,$p,$x);
        
        // $txt = $text;
        // $plainText = $code;
        // $enkrip = $this->enkrip_elgamal($txt, $p, $g, $x, $y);
    

        Storage::disk('public')->put("files/" . $newname,$code);
        /**test */
        $key = 'luqmanfirdaus123';
        $cipher = new CTR(new AES($key));
        $decrypt = $cipher->decrypt(base64_decode($code));
        Storage::disk('public')->put("files/" . "Descrypt-" . $newname, $decrypt);
        /**end ted */

        Dpt::create([
            'jml_tps' => $request->jml_tps,
            'jml_laki' => $request->jml_laki,
            'jml_perempuan' => $request->jml_perempuan,
            'kecamatan_id' => $request->kecamatan_id,
            'file' => 'storage/files/' . $newname,
        ]);

        return redirect('index-dpt')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

	


    public function enkrip_elgamal($txt, $p, $g, $x, $y)
    {

        for($i=2; $i<($p-2); $i++) {
            $m[] = $i;
        }

        $str = str_split($txt);

        for($i=0; $i<count($str); $i++) {
            $k = rand(1, $p-2);
            $a = ord($str[$i]);
            $b = bcpowmod($g, $k, $p);
            $pow = gmp_pow(abs($y), abs($k));
            $c = gmp_strval($pow);
            $r = bcmul($c, $a);
            $mod = gmp_mod($r, $p);
            $d = gmp_strval($mod);
            $pt = $b.".".$d.",";
        }
        return $pt;
    }

    // membangkitkan bilangan prima p (public key dan privat)
    // private function p() {
    //     $i = TRUE;
    //     while ($i) {
    //         $n = rand(100, 1000);
    //         $z = rand(3, $n);
    //         $y = $this->rekursifMod($z+1, $n, $n);
    //         $x = (1 + $this->rekursifMod($z,$n,$n))%$n;
    //         if($y==$x) {
    //             $i=FALSE;
    //         }
    //     }
    //     return $n;
    // }

    public function generate($p) {
        $g = $this->g($p);
        $x = $this->x($p);
        $y = $this->y($g,$p,$x);
        $data = [
            'p' => $p,
            'g' => $g,
            'x' => $x,
            'y' => $y,
            'p1' => $p,
        ];
        return $data;
    }

    public function generateKey($input) {
        $data = [
            'status' => 'berhasil',
            'msg' => '',
            'data' => [
                'bilangan_prima' => '',
                'x' => '',
                'y' => '',
                'p' => '',
                'g' => '',
                'p1' => ''
            ]
        ];
        
        if($input == "") {
            $data['status'] = 'gagal';
            $data['msg'] = 'Nilai tidak boleh kosong';
            $data['data']['bilangan_prima'] = $input;
        } else {
            if(intval($input)) {
                // inputan benar
                if ($this->cekBilanganPrima($input)) {
                    $generateData = $this->generate($input);

                    $data['data']['y'] = $generateData['y'];
                    $data['data']['x'] = $generateData['x'];
                    $data['data']['p'] = $generateData['p'];
                    $data['data']['g'] = $generateData['g'];
                    $data['data']['p1'] = $generateData['p1'];
                    $data['status'] = 'berhasil';
                    $data['data']['bilangan_prima'] = $input;

                } else {
                    // bukan bilangan prima
                    $data['status'] = 'gagal';
                    $data['msg'] = 'Bukan bilangan prima';
                    $data['data']['bilangan_prima'] = $input;
                }
            } else {
                $data['status'] = 'gagal';
                $data['msg'] = 'Nilai bukan angka';
                $data['data']['bilangan_prima'] = $input;
            }
        }

        return response()->json($data);
    }

    private function cekBilanganPrima($n) {
        for($x=2; $x<$n; $x++)
          {
             if($n % $x == 0)
                 {
                  return false;
                 }
           }
         return true;
       }

    // membangkitkan bilangan g (public key)
    private function g($p) {
        return rand(1, $p-1);
    }

    // membangkitakan bilangan x (private key)
    private function x($p) {
        return rand(1, $p-1);
    }

    // membangkitkan bilangan y (public key)
    // y = gk mod p
    private function y($g,$x,$p) {
        return bcpowmod($g,$x,$p);
    }

    // membangkitkan bilangan k 
    private function k($p) {
        return rand(1, $p-2);
    }

    // convert text to ascii
    // private function TexttoAscii($text) {
    //     $ascii = "";
    //     for($i=0; $i<(strlen($text)); $i++) {
    //         $char = substr($text,$i,1);
    //         $a = ord($char);
    //         if(strlen($a)==1) $a = "00".$a;
    //         if(strlen($a)==2) $a = "0".$a;
    //         if(strlen($a)==3) $a = "".$a;
    //         $ascii = $a;
    //     }
    //     return $ascii;
    // }

    // pencarian modulus
    // private function rekursifMod($basis,$pangkat,$mod) {
    //     if($pangkat<=2) 
    //         return ((pow($basis,$pangkat)) % $mod);
    //         else {
    //             $s = $pangkat % 2;
    //             if($s==0) {
    //                 $b = $pangkat / 2;
    //                 $b1 = $b; $b2 = $b;
    //             }
    //         else {
    //             $b = floor($pangkat/2);
    //             $b1 = $b; $b2 = $b + 1;
    //         }
    //         return ((($this->rekursifMod($basis,$b1,$mod)) . 
    //                 ($this->rekursifMod($basis,$b2,$mod))) % $mod);
    //         }
    // }

    // private function enkripsi($plainText,$p,$g,$y) {
    //     // r = gk mod p
    //     // s = ykm mod p
    //     // chipper = r[] s[]
    //     $ascii = $this->TexttoAscii($plainText);
    //     $chipperText = "";
    //     for($i=0; $i<(strlen($ascii)); $i+=3) {
    //         $k = $this->k($p);
    //         $tmp = substr($ascii,$i,3);
    //         if(strlen($tmp)==1) $tmp = "00".$tmp;
    //         if(strlen($tmp)==2) $tmp = "0".$tmp;
    //         $r = $this->rekursifMod($g,$k,$p);
    //         $s = ((($this->rekursifMod($y,$k,$p)) . 
    //                 ($this->rekursifMod($tmp,1,$p))) % $p);
    //         $chipperText = $r.".".$s."";
    //     }
    //     return $chipperText;
    // }

    public function show($id)
    {
        $file = Dpt::find($id);
        return view('dpt.view-dpt', \compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kec = Kecamatan::all();
        $dpt = Dpt::findOrFail($id);
        return view('dpt.edit-dpt', \compact('dpt', 'kec'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Request()->file <> "") {
            // hapus file
            $dpt = Dpt::findOrFail($id);
            if ($dpt->file <> "") {
                unlink(public_path('file').'/'.$dpt->file);
            }
        
        $file = Request()->file;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('file'), $filename);

        $dpt = Dpt::findOrFail($id);
        $dpt->update($request->all());
        } else {
            // tidak ganti file
        $dpt = Dpt::findOrFail($id);
        $dpt->update($request->all());
        }

        return redirect('index-dpt')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dpt = Dpt::findOrFail($id);
        $dpt->delete();
        return back()->with('success', 'Data Berhasil Dihapus!');
    }

    // public function download(Request $request, $file)
    // {
    //     if (Storage::disk('public')->exists("file/$request->file")) {
    //         $path = Storage::disk('public')->path("file/$request->file");
    //         $content = file_get_contents($path);
    //         return response($content)->withHeaders([
    //             'Content-Type' => mime_content_type($path)
    //         ]);
    //     }
    //     return redirect('index-dpt');
    // }

    public function download(Request $request, $file)
    {
        // $key = 'luqmanfirdaus123';
        // $cipher = new CTR(new AES($key));
        // $decrypt = $cipher->decrypt(base64_decode($code));
        return Storage::download('public/files/', $file);
    }
}
