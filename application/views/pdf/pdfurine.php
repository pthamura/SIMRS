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
    $obj_pdf->SetMargins(2, 2);
    $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $obj_pdf->SetFont('helvetica', '', 9);
    $obj_pdf->setFontSubsetting(false);
    $obj_pdf->AddPage();
    ob_start();
    // we can have any view part here like HTML, PHP etc
    $content .= '<style>table{width:100%;}.namars{font-size: 5px;font-weight:bolder;}</style>';
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
                <th align="center" colspan="3" style="font-size: 5px;"><strong>LABORATORIUM</strong><br/><em>HASIL PEMERIKSAAN URINE</em></th>
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
                <th><strong>Poli / Bangsal</strong></th>
                <td>:</td>
                <td>'.$hasil->poli_bangsal.'</td>
            </tr>
            <tr style="font-size: 5px;">
                <th><strong>Diagnosis</strong></th>
                <td>:</td>
                <td>'.$hasil->diagnosa.'</td>
            </tr>
            <tr style="font-size: 5px;">
                <th><strong>Status Pasien</strong></th>
                <td>:</td>
                <td>'.$hasil->pembayaran.'</td>
            </tr>
    </table><br/><br/>
    <table cellpadding="1">
        <tr>
            <td>
                <table cellpadding="1">
                    <tr>
                        <th colspan="3" style="font-size: 6px;"><strong>URINE CELUP / STICK :</strong></th>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th width="32%">Warna</th>
                        <td width="4%">:</td>
                        <td>'.$hasil->warna.'</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>BJ</th>
                        <td>:</td>
                        <td>'.$hasil->bj.'</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>pH</th>
                        <td>:</td>
                        <td>'.$hasil->ph.'</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>Leukosit</th>
                        <td>:</td>
                        <td>'.$hasil->leukosit.'</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>Nitrite</th>
                        <td>:</td>
                        <td>'.$hasil->nitrite.'</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>Protein</th>
                        <td>:</td>
                        <td>'.$hasil->protein.'</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>Glucosa / Reduksi</th>
                        <td>:</td>
                        <td>'.$hasil->glucosa_reduksi.'</td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>Keton</th>
                        <td>:</td>
                        <td>'.$hasil->keton.'</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>Urobilinogen</th>
                        <td>:</td>
                        <td>'.$hasil->urobilinogen.'</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>Bilirubin</th>
                        <td>:</td>
                        <td>'.$hasil->bilirubin.'</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>Eritrosit / Blood</th>
                        <td>:</td>
                        <td>'.$hasil->eritrosit_blood.'</td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th><strong>Test Kehamilan</strong></th>
                        <td>:</td>
                        <td>'.$hasil->test_kehamilan.'</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>Comment</th>
                        <td>:</td>
                        <td>'.$hasil->komentar.'</td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th colspan="3">Dokter,</th>
                    </tr>
                </table>
            </td>
            <td>
                <table cellpadding="1">
                    <tr>
                        <th colspan="4" style="font-size: 6px;"><strong>MIKROSKOPIS :</strong></th>
                    </tr>
                    <tr>
                        <td colspan="4" style="font-size: 6px;"><strong>Sedimen:</strong></td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th width="16%">- Eritrosit</th>
                        <td width="4%">:</td>
                        <td>'.$hasil->sedimen_eritrosit.'</td>
                        <td>/LP (0-3)</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>- Lekosit</th>
                        <td>:</td>
                        <td>'.$hasil->sedimen_lekosit.'</td>
                        <td>/LP (0-4)</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>- Epitel</th>
                        <td>:</td>
                        <td>'.$hasil->sedimen_epitel.'</td>
                        <td>/LP (0-1)</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="font-size: 6px;"><strong>Silinder:</strong></td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>Jenis</th>
                        <td>:</td>
                        <td colspan="2">'.$hasil->silinder_jenis.'</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="font-size: 6px;"><strong>Kristal:</strong></td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>- Asam Urat</th>
                        <td>:</td>
                        <td>'.$hasil->kristal_asam_urat.'</td>
                        <td>(Neg)</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>- Triple PO4</th>
                        <td>:</td>
                        <td>'.$hasil->kristal_tripel_po4.'</td>
                        <td>(Neg)</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>- Ca Oksalat</th>
                        <td>:</td>
                        <td>'.$hasil->kristal_ca_oksalat.'</td>
                        <td>(Neg)</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>- Ca CO3</th>
                        <td>:</td>
                        <td>'.$hasil->kristal_ca_co3.'</td>
                        <td>(Neg)</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>- Ca PO4</th>
                        <td>:</td>
                        <td>'.$hasil->kristal_ca_po4.'</td>
                        <td>(Neg)</td>
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>Bakteri</th>
                        <td>:</td>
                        <td>'.$hasil->bakteri.'</td>
                        <td>(Neg)</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th>Jamur</th>
                        <td>:</td>
                        <td>'.$hasil->jamur.'</td>
                        <td>(Neg)</td>
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th colspan="4">Serui, '.date("d-m-Y", strtotime($hasil->tgl_periksa)).'</th>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th colspan="4">Pemeriksa</th>
                    </tr>
                    <tr style="font-size: 5px;">
                        <th colspan="4">'.$hasil->pemeriksa.'</th>
                    </tr>
                </table>
            </td>
        </tr>
    </table>';
    // force print dialog
// $js .= 'print(true);';

// set javascript
$obj_pdf->IncludeJS($js);
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('pemeriksaan-urine.pdf', 'I');