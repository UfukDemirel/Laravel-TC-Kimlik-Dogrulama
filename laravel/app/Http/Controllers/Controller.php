<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Cookie\SetCookie;
use http\Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use phpDocumentor\Reflection\Location;
use Epigra\TcKimlik;
use App\Classes\Recording;


class Controller extends BaseController
{

    public function __construct()
    {
        $this->rec = new Recording();
    }

    public function index()
    {
        return view('welcome');
    }

    public function sonuc(Request $request)
    {
        $data = array(
            'tcno' => $request->get('tc'),
            'isim' => $request->get('ad'),
            'soyisim' => $request->get('soyad'),
            'dogumyili' => $request->get('dogumyili'),
        );
        $userIp = $request->ip();


        $check = TcKimlik::validate($data);

        if ($check) {
            $kaydet = $this->rec->kiskaydet($data['tcno'], $data['isim'], $data['soyisim'], $data['dogumyili']);

            if ($kaydet) {
                $sonuc = [
                    'status' => true,
                    'name' => $data['isim'],
                    'surname' => $data['soyisim']
                ];
                $request->session()->keep('failedCount',0);

                return view('sonuc', compact('sonuc'))->with('failedCount', 0);
            } else {
                $failedlogs=$this->rec->hatalikaydet($data['tcno'], $data['isim'], $data['soyisim'], $data['dogumyili'], $userIp, "DUPLICATE");
                $sonuc = ['status' => false,
                    'message' => 'Bilgiler doğru, böyle bir kayıt zaten var.'
                ];

                $request->session()->put('lastActivity',(int)\Carbon\Carbon::now()->format('i'));
                $request->session()->put('lastActivityHour',(int)\Carbon\Carbon::now()->format('h'));
                return redirect()->back()->with('status', false);

            }
        } else {
            $failedlogs=$this->rec->hatalikaydet($data['tcno'], $data['isim'], $data['soyisim'], $data['dogumyili'], $userIp, "WRONG TC");
            $sonuc = [
                'status' => false,
                'message' => 'Geçersiz bilgiler girdiniz.'
            ];

           $request->session()->put('lastActivity',(int)\Carbon\Carbon::now()->format('i'));
            $request->session()->put('lastActivityHour',(int)\Carbon\Carbon::now()->format('h'));
            return redirect()->back()->with('status', false);

        }
    }

}

?>
