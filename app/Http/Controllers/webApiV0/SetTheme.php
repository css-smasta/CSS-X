<?php

namespace App\Http\Controllers\webApiV0;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SetTheme extends Controller
{
    public function theme($themeMode){
        if($themeMode == 'light'){
            session(['themeMode' => 'light']);
            return back()->withInput();
        }elseif ($themeMode == 'dark'){
            session(['themeMode' => 'dark']);
            return back()->withInput();
        }else{
            abort('404', 'Tema tidak valid');
        }
    }
}
