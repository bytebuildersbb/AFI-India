<?php
header("Content-Type: application/json; charset=UTF-8");
header("Accept: application/json");

$requestJSON = file_get_contents('php://input');
$request = json_decode($requestJSON, true);
require_once 'TCPDF/tcpdf.php';

if(isset($request["type"]) && $request["type"] == "pdfapi"){
    $title = (isset($request["cert_title"])) ? $request["cert_title"] : '<span style="font-size:50px; font-weight:bold">Certificate of Completion</span>';
    $description = (isset($request["cert_body"])) ? $request["cert_body"] : '<span style="font-size:25px"><i>This is to certify that</i></span>
            <br><br>
            <span style="font-size:30px"><b>%%user_name%%</b></span><br/><br/>
            <span style="font-size:25px"><i>has completed the quiz</i></span> <br/><br/>
            <span style="font-size:30px">"%%quiz_name%%"</span> <br/><br/>
            <span style="font-size:20px">with score of <b>%%score%%</b></span> <br/><br/>
            <span style="font-size:25px"><i>dated</i></span><br>
            <span style="font-size:30px">%%current_date%%</span><br/><br/><br/>';
    $score = (isset($request["cert_score"])) ? $request["cert_score"] : "0%";
    $user_name = (isset($request["cert_user"])) ? $request["cert_user"] : "You";
    $quiz_name = (isset($request["cert_quiz"])) ? $request["cert_quiz"] : "Unknown";
    $quiz_data = (isset($request["cert_data"])) ? $request["cert_data"] : array();
    $cert_image = (isset($request["cert_image"]) && $request["cert_image"] != '') ? $request["cert_image"] : '';
    $cert_frame = (isset($request["cert_frame"]) && $request["cert_frame"] != '') ? $request["cert_frame"] : 'default';
    $cert_orientation = (isset($request["cert_orientation"]) && $request["cert_orientation"] != '') ? $request["cert_orientation"] : 'l';
    $current_date = (isset($request["current_date"])) ? $request["current_date"] : date('Y-m-d');
    $current_date = date('M d, Y', strtotime($current_date));
    
    foreach($quiz_data as $variable => $value){
        if ( !is_array( $value ) ) {
            $title = str_replace("%%".$variable."%%", $value, $title);
            $description = str_replace("%%".$variable."%%", $value, $description);
        }
    }
    
    $title = str_replace('%%user_name%%',$user_name, $title);
    $title = str_replace('%%quiz_name%%', stripslashes($quiz_name), $title);
    $title = str_replace('%%score%%', $score, $title);
    $title = str_replace('%%current_date%%', $current_date, $title);
    
    $description = str_replace('%%user_name%%',$user_name, $description);
    $description = str_replace('%%quiz_name%%', stripslashes($quiz_name), $description);
    $description = str_replace('%%score%%', $score, $description);
    $description = str_replace('%%current_date%%', $current_date, $description);

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', true);
    
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    $pdf->SetMargins(PDF_MARGIN_LEFT, '0', PDF_MARGIN_RIGHT);
    $pdf->SetMargins(PDF_MARGIN_TOP, '20');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    $pdf_content = '
        <div style="padding:20px; text-align:center; margin: 0 auto;">
            <div style="padding:20px; text-align:center;">
                '.$title.'
                <br>
                <br>
                <br>
                <br>
                '.$description.'
            </div>
        </div>';

    $page_orientation = strtoupper($cert_orientation);

    if($cert_frame == 'none'){
        $pdf_content = '<div style="padding:20px; text-align:center; margin: 0 auto;">
            '.$title.'
            <br><br>
            '.$description.'
        </div>';
    }elseif($cert_frame == 'default'){
        $pdf_content = '<div style="width:100%; min-height:800px; padding:20px; text-align:center; border: 10px solid #787878; margin: 0 auto;">
            <div style="width:50%; min-height:550px; padding:20px; text-align:center; border: 5px solid #787878">
                '.$title.'
                <br><br>
                '.$description.'
            </div>
        </div>';
    }else{
        if(strrpos($cert_frame, 'vertical') !== false){
            switch ($cert_frame) {
                case 'vertical-1':
                case 'vertical-2':
                case 'vertical-3':
                    $pdf_margin_top = '35';
                    break;
                case 'vertical-4':
                    $pdf_margin_top = '55';
                    break;
                case 'vertical-5':
                    $pdf_margin_top = '38';
                    break;
                case 'vertical-6':
                    $pdf_margin_top = '70';
                    break;
                default:
                    $pdf_margin_top = '35';
                    break;
            }

            $pdf->SetMargins(PDF_MARGIN_TOP, $pdf_margin_top);
        }else{
            switch ($cert_frame) {
                case 'horizontal-1':
                case 'horizontal-2':
                case 'horizontal-3':
                case 'horizontal-4':
                case 'horizontal-5':
                case 'horizontal-6':
                case 'horizontal-8':
                    $pdf_margin_top = '20';
                    break;
                case 'horizontal-7':
                    $pdf_margin_top = '45';
                    $pdf_content = '
                        <div style="padding:0px; text-align:center; margin: 0 auto;">
                            <div style="padding:0px; text-align:center;">
                                '.$title.'
                                '.$description.'
                            </div>
                        </div>';
                    break;
                default:
                    $pdf_margin_top = '20';
                    break;
            }
            $pdf->SetMargins(PDF_MARGIN_TOP, $pdf_margin_top);
        }
    }

    $pdf->AddPage($page_orientation, 'A4');

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // get the current page break margin
    $bMargin = $pdf->getBreakMargin();

    // disable auto-page-break
    $pdf->SetAutoPageBreak(false, 0);

    
    // set margins
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    

    // Certificate background image
    $bg_image_info = 'chi mte ifi mej';
    if($cert_image != ''){
        $bg_image_info = $pdf->Image($cert_image, 0, 0, $pdf->getPageWidth(), $pdf->getPageHeight(), '', '', '', false, 300, '', false, false, 0);
    }

    // Certificate background image
    $frame_info = 'chi mte ifi mej';
    if($cert_frame != 'none' && $cert_frame != '' && $cert_frame != 'default'){
        $frame_path = 'frames/' . $cert_frame . '.png';
        $frame_info = $pdf->Image($frame_path, 0, 0, $pdf->getPageWidth(), $pdf->getPageHeight(), '', '', '', false, 300, '', false, false, 0);
    }

    // set the starting point for the page content
    $pdf->setPageMark();
    
    // set default font subsetting mode
    $pdf->setFontSubsetting(true);

    // set font
    $pdf->SetFont('freeserif', '', 12);

    // remove default footer
    $pdf->setPrintFooter(false);
    
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
    $html = '<!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta charset="UTF-8"/>
            <title>Quiz</title>
        </head>
        <body>
            '.$pdf_content.'
        </body>
    </html>';
    
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->output(__DIR__ . '/certificate.pdf', 'F');
    $fileContent = file_get_contents('certificate.pdf');
    
    echo json_encode(array(
        "code" => 1,
        "msg"  => "Success",
        "data" => base64_encode($fileContent),
        "bg_img" => $bg_image_info,
        "frame" => $frame_info,
        "cert_image" => $cert_image,
        "cert_frame" => $cert_frame,
    ));
    die();
}else{
    echo json_encode(array(
        "code" => 0,
        "msg"  => "Fail"
    ));
    die();
}
