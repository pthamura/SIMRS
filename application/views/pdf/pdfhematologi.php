<?php
    tcpdf();
    $obj_pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT_DARAH, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->setPrintHeader(false);
    $obj_pdf->setPrintFooter(false);
    // $title = "PDF Report";
    // $obj_pdf->SetTitle($title);
    // $obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(15, 5);
    $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $obj_pdf->SetFont('helvetica', '', 9);
    $obj_pdf->setFontSubsetting(false);
    $obj_pdf->AddPage();
    ob_start();
    // we can have any view part here like HTML, PHP etc
    $content .= '<style>table{width:100%;}.namars{font-size: 8px;font-weight:bolder;}</style>';
    $content .= '<table cellpadding="1">
            <tr>
                <th align="center" colspan="2" class="namars">PEMERINTAH KABUPATEN KEPULAUAN YAPEN<br/>RUMAH SAKIT UMUM DAERAH SERUI</th>
            </tr>
            <tr>
                <th align="left" style="font-size: 6px;border-bottom: 1px solid #000;">Alamat : Jl. Waina Kawini</th>
                <th align="right" style="font-size: 6px;border-bottom: 1px solid #000;">Serui - Papua 98212</th>
            </tr>
    </table>
    <table cellpadding="1">
            <tr>
                <th align="center" colspan="3" style="font-size: 6px;"><strong>HASIL PEMERIKSAAN HEMATOLOGI MANUAL</strong></th>
            </tr>
            <tr style="font-size: 5px;">
                <th width="13%"><strong>Nama Pasien</strong></th>
                <td width="2%">:</td>
                <td width="85%">'.$hasil->nama_lengkap.'</td>
            </tr>
            <tr style="font-size: 5px;">
                <th><strong>Umur</strong></th>
                <td>:</td>
                <td>'.umur($hasil->tgl_lahir).' Thn</td>
            </tr>
            <tr style="font-size: 5px;">
                <th><strong>Poli / Ruang</strong></th>
                <td>:</td>
                <td>'.$hasil->poli_ruang.'</td>
            </tr>
            <tr style="font-size: 5px;">
                <th><strong>Diagnosis</strong></th>
                <td>:</td>
                <td>'.$hasil->diagnosa.'</td>
            </tr>
    </table><br/><br/>
    <table cellpadding="1">
        <tr style="font-size: 5px;">
            <th width="25%">Haemoglobin (Hb)</th>
            <td width="2%">:</td>
            <td width="15%">'.$hasil->haemoglobin.'</td>
            <td width="10%">gr/dl</td>
            <td>(12 - 18) gr/dl</td>
        </tr>
        <tr style="font-size: 5px;">
            <th>Lekosit</th>
            <td>:</td>
            <td>'.$hasil->lekosit.'</td>
            <td>sel/ul</td>
            <td>(6.000 - 10.000) sel/ul</td>
        </tr>
        <tr style="font-size: 5px;">
            <th>Hitung Jenis Lekosit</th>
            <td>:</td>
            <td>- eosinofil '.$hasil->hjl_eosinofil.'</td>
            <td>%</td>
            <td>(1 - 3) %</td>
        </tr>
        <tr style="font-size: 5px;">
            <th>&nbsp;</th>
            <td>&nbsp;</td>
            <td>- basofil '.$hasil->hjl_basofil.'</td>
            <td>%</td>
            <td>(0 - 2) %</td>
        </tr>
        <tr style="font-size: 5px;">
            <th>&nbsp;</th>
            <td>&nbsp;</td>
            <td>- Netrofil '.$hasil->hjl_netrofil.'</td>
            <td>%</td>
            <td>(50 - 70) %</td>
        </tr>
        <tr style="font-size: 5px;">
            <th>&nbsp;</th>
            <td>&nbsp;</td>
            <td>- Limfosit '.$hasil->hjl_limfosit.'</td>
            <td>%</td>
            <td>(25 - 35) %</td>
        </tr>
        <tr style="font-size: 5px;">
            <th>&nbsp;</th>
            <td>&nbsp;</td>
            <td>- Monosit '.$hasil->hjl_monosit.'</td>
            <td>%</td>
            <td>(4 - 6) %</td>
        </tr>
        <tr>
            <td colspan="5">&nbsp;</td>
        </tr>
        <tr style="font-size: 5px;">
            <th>Trombosit</th>
            <td>:</td>
            <td>'.$hasil->trombosit.'</td>
            <td>sel/ul</td>
            <td>(150.000 - 450.000) sel/ul</td>
        </tr>
        <tr style="font-size: 5px;">
            <th>LED (jam)</th>
            <td>:</td>
            <td>'.$hasil->led_jam.'</td>
            <td>mm/jam</td>
            <td>(L &lt; 15 mm, P &lt; 20 mm)</td>
        </tr>
        <tr style="font-size: 5px;">
            <th>Bleeding Time (masa pendarahan)</th>
            <td>:</td>
            <td>'.$hasil->bleeding_time.'</td>
            <td>&nbsp;</td>
            <td>(2 - 6 menit)</td>
        </tr>
        <tr style="font-size: 5px;">
            <th>Clotting Time (masa pembekuan)</th>
            <td>:</td>
            <td>'.$hasil->clotting_time.'</td>
            <td>&nbsp;</td>
            <td>(6 - 12 menit)</td>
        </tr>
        <tr style="font-size: 5px;">
            <th>Golongan Darah</th>
            <td>:</td>
            <td>'.$hasil->golongan_darah.'</td>
            <td>Rh '.$hasil->golongan_darah.'</td>
            <td>&nbsp;</td>
        </tr>
        <tr style="font-size: 5px;">
            <th>Malaria (DDR)</th>
            <td>:</td>
            <td>'.$hasil->malaria_ddr.'</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </table><br/><br/>
    <table cellpadding="1">
        <tr style="font-size: 5px;">
            <th align="center"><strong>Dokter</strong></th>
            <th align="center">&nbsp;</th>
            <th align="center">&nbsp;</th>
            <th align="center"><strong>Serui, '.date("d-m-Y", strtotime($hasil->tgl_periksa)).'</strong></th>
        </tr>
        <tr style="font-size: 5px;">
            <th align="center"><br/><br/><br/><br/>..................</th>
            <th align="center">&nbsp;</th>
            <th align="center">&nbsp;</th>
            <th align="center">Pemeriksa,<br/><br/><br/>'.$hasil->pemeriksa.'</th>
        </tr>
</table>';
    // force print dialog
// $js .= 'print(true);';

// set javascript
$obj_pdf->IncludeJS($js);
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('pemeriksaan-urine.pdf', 'I');