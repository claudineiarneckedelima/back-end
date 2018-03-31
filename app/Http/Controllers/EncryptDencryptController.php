<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncryptDencryptController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
	
	public function encrypt($string){
		return strrev(self::string2Hex(strrev(base64_encode($string))));
	}
	
	public function decrypt($string){
		return base64_decode(strrev(self::hex2String(strrev($string))));
	}
	
	private function string2Hex($string){
		$hex='';
		for ($i=0; $i < strlen($string); $i++){
			$hex .= dechex(ord($string[$i]));
		}
		return $hex;
	}
	
	private function hex2String($hex){
		$string='';
		for ($i=0; $i < strlen($hex)-1; $i+=2){
			$string .= chr(hexdec($hex[$i].$hex[$i+1]));
		}
		return $string;
	}
}
