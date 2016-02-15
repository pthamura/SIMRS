<?php
    tcpdf();
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT_RUJUKAN, true, 'UTF-8', false);
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
            <th width="25%">DOKTER</th>
            <td width="4%">:</td>
            <td width="71%">'.ucwords($this->session->userdata('fullname')).'</td>
        </tr>
        <tr>
            <th>UPF</th>
            <td>:</td>
            <td>........................................................</td>
        </tr>
        <tr>
            <th>TANGGAL</th>
            <td>:</td>
            <td>'.tgl_indo(date('Y-m-d')).'</td>
        </tr>
        <tr>
            <th align="right">R/</th>
            <td>:</td>
            <td>........................................................</td>
        </tr>
        <tr>
            <td colspan="3"><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/></td>
        </tr>
        <tr>
            <th>PRO</th>
            <td>:</td>
            <td>........................................................</td>
        </tr>
        <tr>
            <th>UMUM / BB</th>
            <td>:</td>
            <td>........................................................</td>
        </tr>
        <tr>
            <th>NO. UMUM</th>
            <td>:</td>
            <td>........................................................</td>
        </tr>
    </table>';
// force print dialog
$js .= 'print(true);';

// set javascript
$obj_pdf->IncludeJS($js);
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('rujukan.pdf', 'I');