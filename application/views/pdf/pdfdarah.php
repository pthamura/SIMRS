<?php
    tcpdf();
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT_DARAH, true, 'UTF-8', false);
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
    $obj_pdf->SetMargins(10, 10);
    $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $obj_pdf->SetFont('helvetica', '', 9);
    $obj_pdf->setFontSubsetting(false);
    $obj_pdf->AddPage();
    ob_start();
    // we can have any view part here like HTML, PHP etc
    $content .= '<style>table{width:100%;}.namars{font-size: 10px;}</style>';
    $content .= '<table cellpadding="1">
            <tr>
                <th style="border-bottom: 1px solid #000;font-size: 11px;" align="center" colspan="3"><span class="namars">PEMERINTAH KABUPATEN KEPULAUAN YAPEN</span><br/>RUMAH SAKIT UMUM DAERAH SERUI</th>
            </tr><br/>
            <tr>
                <th align="center" colspan="3" style="font-size: 11px"><u><strong>LABORATORIUM</strong></u><br/></th>
            </tr>
            <tr>
                <th width="30%"><strong>Penderita</strong></th>
                <td width="4%">:</td>
                <td width="66%">'.ucwords($hasil->nama_lengkap).'</td>
            </tr>
            <tr>
                <th><strong>Bangsal / Poli</strong></th>
                <td>:</td>
                <td>'.$hasil->nama_poli.'</td>
            </tr>
        </table><br/><br/><br/>
        <table cellpadding="1">
            <tr>
                <th align="center" colspan="3" style="font-size: 12px;"><strong>PEMERIKSAAN DARAH</strong><br/></th>
            </tr>
            <tr>
                <th width="40%"><strong>Haemoglobin</strong></th>
                <td width="4%">:</td>
                <td width="56%">'.$hasil->haemoglobin.'</td>
            </tr>
            <tr>
                <th><strong>Leucocyt</strong></th>
                <td>:</td>
                <td>'.$hasil->leucocyt.'</td>
            </tr>
            <tr>
                <th><strong>Difrential Count</strong></th>
                <td>:</td>
                <td>'.$hasil->difrential_count.'</td>
            </tr>
            <tr>
                <th><strong>Laju Endap Darah</strong></th>
                <td>:</td>
                <td>'.$hasil->laju_endap_darah.'</td>
            </tr>
            <tr>
                <th><strong>Malaria (DDR)</strong></th>
                <td>:</td>
                <td>'.$hasil->malaria_ddr.'</td>
            </tr>
            <tr>
                <th><strong>Masa Pendarahan</strong></th>
                <td>:</td>
                <td>'.$hasil->masa_pendarahan.'</td>
            </tr>
            <tr>
                <th><strong>Masa Pembekuan</strong></th>
                <td>:</td>
                <td>'.$hasil->masa_pembekuan.'</td>
            </tr>
            <tr>
                <th><strong>Golongan Darah</strong></th>
                <td>:</td>
                <td>'.$hasil->golongan_darah.'</td>
            </tr>
            <tr>
                <th><strong>Thrombocyt</strong></th>
                <td>:</td>
                <td>'.$hasil->thrombocyt.'</td>
            </tr>
            <tr>
                <th><strong>Haematocyt</strong></th>
                <td>:</td>
                <td>'.$hasil->haematocyt.'</td>
            </tr>
            <tr>
                <th><strong>Rumplead</strong></th>
                <td>:</td>
                <td>'.$hasil->rumplead.'</td>
            </tr>
        </table><br/><br/>
        <table cellpadding="1">
            <tr>
                <th align="center"><strong>Tanggal</strong></th>
                <th align="center"><strong>Dokter</strong></th>
            </tr>
            <tr>
                <th align="center"><br/><br/><br/>'.date("d-m-Y", strtotime($hasil->tgl_periksa)).'</th>
                <th align="center"></th>
            </tr>
    </table>';
    // force print dialog
$js .= 'print(true);';

// set javascript
$obj_pdf->IncludeJS($js);
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('pemeriksaan-darah.pdf', 'I');