<?php
tcpdf();
$obj_pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT_DAFTAR, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$obj_pdf->setPrintHeader(false);
$obj_pdf->setPrintFooter(false);
// $title = "PDF Report";
// $obj_pdf->SetTitle($title);
// $obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
// $obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();
// we can have any view part here like HTML, PHP etc
$content .= '<style>table{width:100%; border: 1px solid #000;padding-top:2px;padding-bottom: 2px;}.logors{text-align:center;}.namars{text-align: center;font-size:8px;}.alamatrs{text-align: center;font-size:7px;}.kartu{text-align:center;color:#fff;font-weight: bolder;font-size:12px;}.nodaftar{letter-spacing:1px;}.perhatian{font-size:6px;font-weight:bolder;border-top:1px solid #000;}.ttd{border-top:1px solid #000;font-size:5.2px;text-align:center;}</style>';
$content .= '<table>
    <tr>
        <th class="logors" width="13%"><img src="'.base_url('assets/logo.png').'" alt=""></th>
        <th class="namars" width="87%">PEMERINTAH KABUPATEN KEPULAUAN YAPEN<br/>RUMAH SAKIT UMUM DAERAH SERUI<br/><small>JL. Pertanian - Wahakawini Telp. (0983) 311131 Serui - Papua</small></th>
    </tr>
    <tr>
        <th bgcolor="#000" class="kartu" width="100%">KARTU BEROBAT</th>
    </tr>
    <tr>
        <th width="20%">NORM</th>
        <td width="4%">:</td>
        <td class="nodaftar">'.$pendaftaran->norm.'</td>
    </tr>
    <tr>
        <th>NAMA</th>
        <td width="4%">:</td>
        <td class="datapasien">'.ucwords($pendaftaran->nama_lengkap).'</td>
    </tr>
    <tr>
        <th>TTL</th>
        <td width="4%">:</td>
        <td class="datapasien">'.ucwords($pendaftaran->tpt_lahir).', '.date("d-m-Y", strtotime($pendaftaran->tgl_lahir)).'</td>
    </tr>
    <tr>
        <th>ALAMAT</th>
        <td width="4%">:</td>
        <td class="datapasien">'.$pendaftaran->jalan_1.'</td>
    </tr>
    <tr>
        <th class="perhatian" width="56%">PERHATIAN<br/>
            <small>1. Setiap kali berobat di RSUD Serui, kartu ini harus selalu dibawa.<br/>
            2. Kartu berobat ini tidak dipergunakan oleh orang lain.<br/>
            3. Apabila kartu ini hilang mohon dilaporkan ke loket adm RSUD.</small>
        </th>
        <td class="ttd" width="44%">
            Serui, 03 Maret 2015<br/>Penanggung Jawab Adm Pelayanan<br/>TTD<br/><strong>PIGELUS REMATOBI</strong><br/>NIP. 19862805 200909 1 001
        </td>
    </tr>
</table>';
// force print dialog
$js .= 'print(true);';

// set javascript
$obj_pdf->IncludeJS($js);
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('pendaftaran.pdf', 'I');