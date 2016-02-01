<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function tgl_indo($day){ 
    $day = explode ("-",$day);
    switch ($day[1]){
        case 1:
            $day[1] = "Januari";
        break;
        case 2:
            $day[1] = "Februari";
        break;
        case 3:
            $day[1] = "Maret";
        break;
        case 4:
            $day[1] = "April";
        break;
        case 5:
            $day[1] = "Mei";
        break;
        case 6:
            $day[1] = "Juni";
        break;
        case 7:
            $day[1] = "Juli";
        break;
        case 8:
            $day[1] = "Agustus";
        break;
        case 9:
            $day[1] = "September";
        break;
        case 10:
            $day[1] = "Oktober";
        break;
        case 11:
            $day[1] = "November";
        break;
        case 12:
            $day[1] = "Desember";
        break; 
    }
    $day_indo = $day[2]." ".$day[1]." ".$day[0];
    return $day_indo;
}
function indonesian_date ($timestamp = '', $date_format = 'j F Y | H:i', $suffix = 'WIB') {
    if (trim ($timestamp) == ''){
            $timestamp = time ();
    }elseif (!ctype_digit ($timestamp)){
        $timestamp = strtotime ($timestamp);
    }
    # remove S (st,nd,rd,th) there are no such things in indonesia :p
    $date_format = preg_replace ("/S/", "", $date_format);
    $pattern = array (
        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
        '/April/','/June/','/July/','/August/','/September/','/October/',
        '/November/','/December/',
    );
    $replace = array ( 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
        'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
        'Oktober','November','Desember',
    );
    $date = date ($date_format, $timestamp);
    $date = preg_replace ($pattern, $replace, $date);
    $date = "{$date} {$suffix}";
    return $date;
} 
function rupiah($nilai, $pecahan = 0){
   return number_format($nilai, $pecahan, ',', '.');
}
function umur($tgl_lahir){
    $thn_lahir = date_format(date_create($tgl_lahir), 'Y');
    $thn_skrg = date('Y');
    $umur = $thn_skrg-$thn_lahir;
    return $umur;
}

/* End of file tanggal_helper.php */
/* Location: ./application/helpers/tanggal_helper.php */