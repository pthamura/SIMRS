<?php
    tcpdf();
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT_DEFAULT, true, 'UTF-8', false);
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
    $obj_pdf->SetMargins(15, 10);
    $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $obj_pdf->SetFont('helvetica', '', 9);
    $obj_pdf->setFontSubsetting(false);
    $obj_pdf->AddPage();
    ob_start();
    // we can have any view part here like HTML, PHP etc
    $content .= '<style>table{width:100%;}.namars{font-size: 15px;}</style>';
    $content .= '<table cellpadding="1">
            <tr>
                <th class="logors" width="10%"><img src="'.base_url('assets/logo.png').'" alt=""></th>
                <th class="namars" width="80%" align="center">PEMERINTAH KABUPATEN KEPULAUAN YAPEN<br/>RUMAH SAKIT UMUM DAERAH SERUI</th>
                <th class="logors" width="10%"><img src="'.base_url('assets/logo-bhakti-husada.png').'" alt=""></th>
            </tr>
            <tr>
                <th align="center" colspan="4" style="font-size: 11px;border: 1px solid #000;">Alamat : Jln Dr Samratulangi Telp. (0983) 31132 - 31132 - 33489 Serui - Papua</th>
            </tr><br/>
            <tr>
                <th align="center" colspan="4" style="font-size: 11px"><strong>HASIL PEMERIKSAAN LABORATORIUM KLINIS</strong><br/></th>
            </tr>
            <tr>
                <th width="10%"><strong>NAMA</strong></th>
                <td width="2%">:</td>
                <td width="66%">'.ucwords($hasil->nama_lengkap).'</td>
            </tr>
            <tr>
                <th width="10%"><strong>UMUR</strong></th>
                <td width="2%">:</td>
                <td width="6%">'.umur($hasil->tgl_lahir).' Thn</td>
                <th width="13%"><strong>JENIS KEL</strong></th>
                <td width="67%">'.$hasil->jenis_kelamin.'</td>
            </tr>
            <tr>
                <th><strong>ALAMAT</strong></th>
                <td>:</td>
                <td>'.$hasil->jalan_1.'</td>
            </tr>
            <tr>
                <th width="10%"><strong>PENGIRIM</strong></th>
                <td width="2%">:</td>
                <td width="66%">.....................................................................</td>
            </tr>
            <tr>
                <th width="10%"><strong>NO</strong></th>
                <td width="2%">:</td>
                <td width="66%">.....................................................................</td>
            </tr>
        </table><br/><br/><br/>
        <table cellpadding="1">
            <tr>
                <th colspan="4"><strong>KIMIA</strong></th>
            </tr>
            <tr>
                <th width="20%"><strong>Protein Total</strong></th>
                <td width="2%">:</td>
                <td width="18%">'.$hasil->protein_total.'</td>
                <td width="60%"><small>(P/L : 6,7 - 8,7) g/100ml</small></td>
            </tr>
            <tr>
                <th><strong>Albumin</strong></th>
                <td>:</td>
                <td>'.$hasil->albumin.'</td>
                <td><small>(P/L : 3,5 - 5,2) g/dl</small></td>
            </tr>
            <tr>
                <th><strong>Bilirubin Total</strong></th>
                <td>:</td>
                <td>'.$hasil->bilirubin_total.'</td>
                <td><small>(P/L : 1 - 17) mg/g</small></td>
            </tr>
            <tr>
                <th><strong>Bilirubin Direct</strong></th>
                <td>:</td>
                <td>'.$hasil->bilirubin_direct.'</td>
                <td><small>(P/L : 0,25 - 0,43) mg/dl</small></td>
            </tr>
            <tr>
                <th><strong>Silirubin Indirect</strong></th>
                <td>:</td>
                <td>'.$hasil->silirubin_indirect.'</td>
                <td><small>(L : 0,2 - 0,5) mg/dl</small></td>
            </tr>
            <tr>
                <th><strong>SGOT</strong></th>
                <td>:</td>
                <td>'.$hasil->sgot.'</td>
                <td><small>(L : 7 - 34 | P : 7 - 24) U/L</small></td>
            </tr>
            <tr>
                <th><strong>SGPT</strong></th>
                <td>:</td>
                <td>'.$hasil->sgpt.'</td>
                <td><small>(L : &lt; 45 | P : &gt; 45) U/L</small></td>
            </tr>
            <tr>
                <th><strong>Ureum</strong></th>
                <td>:</td>
                <td>'.$hasil->ureum.'</td>
                <td><small>(L : 15 - 40 | P : 19 - 44) mg/dl</small></td>
            </tr>
            <tr>
                <th><strong>Creatinin</strong></th>
                <td>:</td>
                <td>'.$hasil->creatinin.'</td>
                <td><small>(L : 0,8 - 1,1 | P : 0,9 - 1,3) mg/dl</small></td>
            </tr>
            <tr>
                <th><strong>Glukosa Puasa</strong></th>
                <td>:</td>
                <td>'.$hasil->glukosa_puasa.'</td>
                <td><small>(L/P : 75 - 115) mg %</small></td>
            </tr>
            <tr>
                <th><strong>Glukosa 2JPP</strong></th>
                <td>:</td>
                <td>'.$hasil->glukosa_2_jpp.'</td>
                <td><small>(L/P : &lt; 140) mg %</small></td>
            </tr>
            <tr>
                <th><strong>Glukosa Sewaktu</strong></th>
                <td>:</td>
                <td>'.$hasil->glukosa_sewaktu.'</td>
                <td><small>(L/P : 80 - 115) mg %</small></td>
            </tr>
            <tr>
                <th><strong>Trigliseride</strong></th>
                <td>:</td>
                <td>'.$hasil->trigliseride.'</td>
                <td><small>(L : &lt; 200 | P : &lt; 200 - 400) mg/dl</small></td>
            </tr>
            <tr>
                <th><strong>Cholestrol Total</strong></th>
                <td>:</td>
                <td>'.$hasil->cholestrol_total.'</td>
                <td><small>(L : &lt; 200 | P : &lt; 200) mg/dl</small></td>
            </tr>
            <tr>
                <th><strong>Asam Urat</strong></th>
                <td>:</td>
                <td>'.$hasil->asam_urat.'</td>
                <td><small>(L : 2,6 - 6,1 | P : 3,6 - 8,2) mg/dl</small></td>
            </tr>
            <tr>
                <th><strong>Rheumatoid Factor</strong></th>
                <td>:</td>
                <td>'.$hasil->rheumatoid_factor.'</td>
                <td><small>(L/P : &lt; 80) lU/ml</small></td>
            </tr>
            <tr>
                <th><strong>Analisis Sperma</strong></th>
                <td>:</td>
                <td>'.$hasil->analisis_sperma.'</td>
                <td><small>(&gt; 20 x 10)</small></td>
            </tr>
        </table><br/><br/>
        <table cellpadding="1">
            <tr>
                <th align="center"><strong>Pemeriksa</strong><br/><br/><br/></th>
                <th align="center">&nbsp;</th>
                <th align="center">&nbsp;</th>
                <th align="center"><strong>Serui, '.date("d-m-Y", strtotime($hasil->tgl_periksa)).'</strong></th>
            </tr>
            <tr>
                <th align="center"><br/><br/><br/>'.$hasil->pemeriksa.'</th>
                <th align="center">&nbsp;</th>
                <th align="center">&nbsp;</th>
                <th align="center"><br/>Dokter</th>
            </tr>
    </table>';
    // force print dialog
$js .= 'print(true);';

// set javascript
$obj_pdf->IncludeJS($js);
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('pemeriksaan-klinis.pdf', 'I');