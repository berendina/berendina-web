<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LocalizationController extends Controller
{
    public function index($locale)
    {
        $languages = [
            'en' => 'English',
            'si' => 'Sinhala',
            'ta' => 'Tamil',
        ];

        if (array_key_exists($locale, $languages)) {
            Session::put('applocale', $locale);
        }
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
