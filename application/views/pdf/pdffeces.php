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
    $obj_pdf->SetMargins(15, 2);
    $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $obj_pdf->SetFont('helvetica', '', 9);
    $obj_pdf->setFontSubsetting(false);
    $obj_pdf->AddPage();
    ob_start();
    // we can have any view part here like HTML, PHP etc
    $content .= '<style>table{width:100%;}.namars{font-size: 7px;font-weight:bolder;}</style>';
    $content .= '<table cellpadding="1">
            <tr>
                <th align="center" colspan="2" class="namars">PEMERINTAH KABUPATEN KEPULAUAN YAPEN<br/>RUMAH SAKIT UMUM DAERAH SERUI<br/>LABORATORIUM<br/><u style="font-size:6px;">Hasil Pemeriksaan Feces Rutin</u></th>
            </tr>
    </table>
    <table cellpadding="1">
            <tr>
                <th align="center" colspan="4">&nbsp;</th>
            </tr>
            <tr style="font-size: 5px;">
                <th width="10%"><strong>NAMA</strong></th>
                <td width="2%">:</td>
                <td colspan="2" width="85%">'.$hasil->nama_lengkap.'</td>
            </tr>
            <tr style="font-size: 5px;">
                <th><strong>POLI / RUANG</strong></th>
                <td>:</td>
                <td>'.$hasil->poli_ruang.'</td>
                <td>'.$hasil->pembayaran.'</td>
            </tr>
    </table><br/>
    <table cellpadding="1">
        <tr>
            <th colspan="3" style="font-size: 6px;"><strong><u>Makroskopis :</u></strong></th>
        </tr>
        <tr style="font-size: 5px;">
            <th width="33.4%">1. Warna</th>
            <td width="4%">:</td>
            <td>'.$hasil->warna.'</td>
        </tr>
        <tr style="font-size: 5px;">
            <th>2. Konsistensi</th>
            <td>:</td>
            <td>'.$hasil->konsistensi.'</td>
        </tr>
        <tr style="font-size: 5px;">
            <th>3. Lendir</th>
            <td>:</td>
            <td>'.$hasil->lendir.'</td>
        </tr>
        <tr style="font-size: 5px;">
            <th>4. Darah</th>
            <td>:</td>
            <td>'.$hasil->darah.'</td>
        </tr>
    </table>
    <table cellpadding="1">
        <tr>
            <th colspan="3" style="font-size: 6px;"><strong><u>Mikroskopis :</u></strong></th>
        </tr>
        <tr style="font-size: 5px;">
            <th width="14%"><strong>I. Telur Cacing :</strong></th>
            <td colspan="3">
                <table cellpadding="1">
                    <tr style="font-size: 5px;">
                        <th width="28%">- Askaris Lumbricoides</th>
                        <td width="4%">:</td>
                        <td>'.$hasil->tc_askaris_lumbricoides.'</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>- Ankilostonum Duodenale</th>
                        <td>:</td>
                        <td>'.$hasil->tc_ankilostonum_duodenale.'</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>- Trikuris</th>
                        <td>:</td>
                        <td>'.$hasil->tc_trikuris.'</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>- Strongiloides</th>
                        <td>:</td>
                        <td>'.$hasil->tc_strongiloides.'</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr style="font-size: 5px;">
            <th><strong>II. Sel :</strong></th>
            <td colspan="3">
                <table cellpadding="1">
                    <tr style="font-size: 5px;">
                        <th width="28%">a. Eritrosit</th>
                        <td width="4%">:</td>
                        <td>'.$hasil->sel_eritrosit.'</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>b. Lekosit</th>
                        <td>:</td>
                        <td>'.$hasil->sel_lekosit.'</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>c. Epitel</th>
                        <td>:</td>
                        <td>'.$hasil->sel_epitel.'</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr style="font-size: 5px;">
            <th><strong>III. Parasit :</strong></th>
            <td colspan="3">
                <table cellpadding="1">
                    <tr style="font-size: 5px;">
                        <th width="28%">- Entamuba Histolitica</th>
                        <td width="4%">:</td>
                        <td>'.$hasil->parasit_entamuba_histolitica.'</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>- Entamuba Coli</th>
                        <td>:</td>
                        <td>'.$hasil->parasit_entamuba_coli.'</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>- Basil Coli</th>
                        <td>:</td>
                        <td>'.$hasil->parasit_basil_coli.'</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr style="font-size: 5px;">
            <th><strong>IV. Sisa Makanan :</strong></th>
            <td colspan="3">
                <table cellpadding="1">
                    <tr style="font-size: 5px;">
                        <th width="28%">a. Serat Daging</th>
                        <td width="4%">:</td>
                        <td>'.$hasil->sm_serat_daging.'</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>b. Sisa Tumbuh-tumbuhan</th>
                        <td>:</td>
                        <td>'.$hasil->sm_sisa_tumbuhan.'</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>c. Globul Lemak</th>
                        <td>:</td>
                        <td>'.$hasil->sm_globul_lemak.'</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table><br/><br/>
    <table cellpadding="1">
        <tr style="font-size: 6px;">
            <th align="center"><strong>Dokter</strong></th>
            <th align="center">&nbsp;</th>
            <th align="center">&nbsp;</th>
            <th align="center"><strong>Serui, '.date("d-m-Y", strtotime($hasil->tgl_periksa)).'</strong></th>
        </tr>
        <tr style="font-size: 6px;">
            <th align="center"><br/><br/><br/>..................</th>
            <th align="center">&nbsp;</th>
            <th align="center">&nbsp;</th>
            <th align="center">Pemeriksa,<br/><br/>'.$hasil->pemeriksa.'</th>
        </tr>
</table>';
    // force print dialog
// $js .= 'print(true);';

// set javascript
$obj_pdf->IncludeJS($js);
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('pemeriksaan-urine.pdf', 'I');