<?php
header("Content-Type: application/json; charset=UTF-8");
header("Accept: application/json");

$requestJSON = file_get_contents('php://input');
$request = json_decode($requestJSON, true);
require_once '../TCPDF/tcpdf.php';

class Quiz_Results_PDF_API {
    
    public function __construct(){
        global $request;
        $this->ays_generate_pdf_content( $request );
    }
    
    public function ays_generate_pdf_content( $request ){
        ob_start();
        if(isset($request["type"]) && $request["type"] == "pdfapi"){

            $api_quiz_id = (isset($request["api_quiz_id"])) ? $request["api_quiz_id"] : null;
            if ($api_quiz_id == null) {
                echo json_encode(array(
                    "code" => 0,
                    "msg"  => "Fail"
                ));
                die();
            }

            $data_headers   = $request["data_headers"];
            $data_questions = $request["data_questions"];

            $table     = $this->ays_results_header($data_headers);
            $questions = $this->ays_results_questions($data_questions);

            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', true);

            $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
            $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetDefaultMonospacedFont('freeserif');
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            $pdf->SetMargins(PDF_MARGIN_LEFT, '0', PDF_MARGIN_RIGHT);
            $pdf->SetMargins(PDF_MARGIN_TOP, '10');
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->SetAutoPageBreak(TRUE, 10);
            
            // set default font subsetting mode
            $pdf->setFontSubsetting(true);
            $pdf->SetFont('freeserif', '', 14);

            $pdf->AddPage('L', 'A4');

            $html = '<!DOCTYPE html>
                <html>
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                    <meta charset="UTF-8"/>
                </head>
                <body style="">';

            $html .= $table['content'];

            $html .= '</body>
            </html>';

            $pdf->writeHTML( $html, true, false, true, false, '' );

            // reset pointer to the last page
            $pdf->lastPage();

            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            $pdf->SetMargins('10', '0', '10');
            $pdf->SetMargins(PDF_MARGIN_TOP, '10');
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->SetAutoPageBreak(TRUE, 10);
            
            $pdf->setFontSubsetting(true);
            $pdf->SetFont('freeserif', '', 16);


            $pdf->AddPage('L', 'A4');

            // set font
//            $pdf->SetFont('cid0jp', '', 16); // ๏ เป русский ליטה   Γαζέε んにちは  扡,拖
            // $pdf->SetFont('helvetica', '', 16); // default

            $html = '<!DOCTYPE html>
                <html>
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                    <meta charset="UTF-8"/>
                    <style>
                        body * {
                            font-family: serif !important;
                        }
                    </style>
                </head>
                <body style="">';

            $html .= $questions;

            $html .= '</body>
            </html>';

            $pdf->writeHTML( $html, true, false, true, false, '' );

            //reset pointer to the last page
            $pdf->lastPage();

            //Close and output PDF document
            $pdf->output(__DIR__ . '/single-report.pdf', 'F');

        //============================================================+
        // END OF FILE
        //============================================================+

            $fileContent = file_get_contents('single-report.pdf');
            ob_end_clean();
            echo json_encode(array(
                "code" => 1,
                "msg"  => "Success",
                "data" => base64_encode($fileContent),
            ));
            die();
        }else{
            ob_end_clean();
            echo json_encode(array(
                "code" => 0,
                "msg"  => "Fail"
            ));
            die();
        }
    }
    
    public function ays_results_header($results){
        $user_attributes = $results['custom_fild'];
        $results = $results['user_data'];
        // All headers
        $user_information_header = $results['api_user_information_header'];
        $quiz_information_header = $results['api_quiz_information_header'];

        $user_ip_header         = $results['api_user_ip_header'];
        $user_id_header         = $results['api_user_id_header'];
        $user_header            = $results['api_user_header'];
        $user_mail_header       = $results['api_user_mail_header'];
        $user_name_header       = $results['api_user_name_header'];
        $user_phone_header      = $results['api_user_phone_header'];
        $checked_header         = $results['api_checked_header'];

        $start_date_header      = $results['api_start_date_header'];
        $duration_header        = $results['api_duration_header'];
        $score_header           = $results['api_score_header'];
        $rate_header            = $results['api_rate_header'];
        $unique_code_header     = $results['api_unique_code_header'];
        $keywords_header        = $results['api_keywords_header'];
        $res_by_cats_header     = $results['api_res_by_cats_header'];

        // All results
        $user_ip                = $results['api_user_ip'];
        $user_id                = $results['api_user_id'];
        $user                   = $results['api_user'];
        $user_mail              = $results['api_user_mail'];
        $user_name              = $results['api_user_name'];
        $user_phone             = $results['api_user_phone'];

        $start_date             = $results['api_start_date'];
        $duration               = $results['api_duration'];
        $score                  = $results['api_score'];
        $rate                   = $results['api_rate'];
        $unique_code            = $results['api_unique_code'];
        $keywords               = $results['api_keywords'];
        $res_by_cats            = $results['api_res_by_cats'];


        $file_name = '';
        $row = '';

        $style = 'style="margin:0; line-height:2; font-size:12px; padding:20px;';

        $row .= '<table style="border: 1px solid #ccc;">
            <tbody>';

        $row .= '<tr nobr="true">
                    <td colspan="4" style="border: 1px solid #ccc;"><p style="margin:0; line-height:2; padding:20px;"><b>'.$user_information_header.'</b></p></td>
                 </tr>';

        // User IP
        if(isset($user_ip) && $user_ip != ''){
            $row .= '<tr nobr="true">
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><b>'.$user_ip_header.'</b></p></td>
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><span>'.$user_ip.'</span></p></td>
                     </tr>';
        }

        // User ID
        if(isset($user_id) && $user_id != ''){
            $row .= '<tr nobr="true">
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><b>'.$user_id_header.'</b></p></td>
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><span>'.$user_id.'</span></p></td>
                     </tr>';
        }

        // User
        if(isset($user) && $user != ''){
            $row .= '<tr nobr="true">
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><b>'.$user_header.'</b></p></td>
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><span>'.stripslashes($user).'</span></p></td>
                     </tr>';
        }

        // User Mail
        if(isset($user_mail) && $user_mail != ''){
            $row .= '<tr nobr="true">
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><b>'.$user_mail_header.'</b></p></td>
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><span>'.$user_mail.'</span></p></td>
                     </tr>';
        }

        // User Name
        if(isset($user_name) && $user_name != ''){
            $row .= '<tr nobr="true">
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><b>'.$user_name_header.'</b></p></td>
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><span>'.stripslashes($user_name).'</span></p></td>
                     </tr>';
            $file_name .= stripslashes($user_name) . ' ';         
        }

        // User Phone
        if(isset($user_phone) && $user_phone != ''){
            $row .= '<tr nobr="true">
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><b>'.$user_phone_header.'</b></p></td>
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><span>'.stripslashes($user_phone).'</span></p></td>
                     </tr>';
        }
        
        // Custom Fields
        if ($user_attributes !== null) {
            foreach ($user_attributes as $name => $value) {
                if(stripslashes($value['api_custom_fild_value']) == ''){
                    $attr_value = ' - ';
                }else{
                    $attr_value = stripslashes($value['api_custom_fild_value']);
                }
                
                if($attr_value == 'on'){
                    $attr_value = $checked_header;
                }
                
                $row .= '<tr nobr="true">
                            <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><b>' . stripslashes($value['api_custom_fild_name']) . '</b></p></td>
                            <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .';"><span>' . $attr_value . '</span></p></td>
                        </tr>';
            }
        }

        $row .= '</tbody></table>';
        $row .= '<div style="padding:10px;"></div>';
        
        $row .= '<table style="border: 1px solid #ccc;">
                <tbody>';
        
        $row .= '<tr nobr="true">
                    <td colspan="4" style="border: 1px solid #ccc;"><p style="margin:0;line-height:2; padding:20px;"><b>'.$quiz_information_header.'</b></p></td>
                 </tr>';

        // Start date
        if(isset($start_date) && $start_date != ''){
            $row .= '<tr nobr="true">
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><b>'.$start_date_header.'</b></p></td>
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><span>'.$start_date.'</span></p></td>
                     </tr>';
        }

        // Duration
        if(isset($duration) && $duration != ''){
            $row .= '<tr nobr="true">
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><b>'.$duration_header.'</b></p></td>
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><span>' . $duration . '</span></p></td>
                     </tr>';
        }

        // Score
        if(isset($score) && $score != ''){
             $row .= '<tr nobr="true">
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><b>'.$score_header.'</b></p></td>
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><span>' . $score . '</span></p></td>
                     </tr>';
        }

        // Rate
        if(isset($rate) && $rate != ''){
             $row .= '<tr nobr="true">
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><b>'.$rate_header.'</b></p></td>
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><span>' . $rate . '</span></p></td>
                     </tr>';
        }

        // Unique Code
        if(isset($unique_code) && $unique_code != ''){
             $row .= '<tr nobr="true">
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><b>'.$unique_code_header.'</b></p></td>
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><span>' . $unique_code . '</span></p></td>
                     </tr>';
        }

        // Keywords
        if(isset($keywords) && $keywords != ''){
             $row .= '<tr nobr="true">
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><b>'.$keywords_header.'</b></p></td>
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><span>' . $keywords . '</span></p></td>
                     </tr>';
        }

        // Results by Categories
        if(isset($res_by_cats) && $res_by_cats != ''){
             $row .= '<tr nobr="true">
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><b>'.$res_by_cats_header.'</b></p></td>
                        <td colspan="2" style="border: 1px solid #ccc;"><p '. $style .'"><span>' . $res_by_cats . '</span></p></td>
                     </tr>';
        }

        $row .= '</tbody></table>';

        if($file_name == ''){
            if(isset($start_date) && $start_date != ''){
                $file_name = date('Y-m-d', strtotime($start_date) );
            }
        }
        return array(
            'content' => $row,
            'file_name' => $file_name
        );        
    }

    public function ays_results_questions($results){
        $headers   = $results['headers'];
        $questions = $results['data_question'];

        // All headers
        $glob_question_header   = $headers['api_glob_question_header'];
        $question_header        = $headers['api_question_header'];
        $correct_answer_header  = $headers['api_correct_answer_header'];
        $user_answer_header     = $headers['api_user_answer_header'];
        $api_user_answer_points = $headers['api_user_answer_points'];
        $calc_method            = isset( $headers['api_calc_method'] ) ? $headers['api_calc_method'] : 'by_correctness';

        $index = 1;
        $row   = '';

        $row .= '<h1 style="margin-bottom:15px;text-align:center;font-size:25px;">' . $glob_question_header . '</h1>';
        $row .= '<table style="border: 0px solid #ccc; width:100%;">
                  <tbody>';

        if($calc_method == 'by_correctness'){
            foreach ($questions as $key => $question) {
                $row .= '<tr nobr="true">
                            <td style="border: 1px solid #ccc;width:250px;"><b style="font-size: 12px;">'. $question_header .' ' . $index . ':</b><br><br>' . html_entity_decode( nl2br( stripslashes( $question["api_question"] ) ) ) . '</td>
                            <td style="border: 1px solid #ccc;"><b style="font-size: 12px;">'. $correct_answer_header .':</b><br><br><span>' . html_entity_decode( nl2br( stripslashes( $question["api_correct_answer"] ) ) ) . '<br></span></td>
                            <td style="border: 1px solid #ccc;"><b style="font-size: 12px;">'. $user_answer_header .':</b><br/><br/><span>' . html_entity_decode( nl2br( stripslashes( $question["api_user_answer"] ) ) ) . '</span></td>';
                if ($question["api_check_status"]) {
                    $row .= '<td style="border: 1px solid #ccc; text-align:center;width:100px;" valign="middle">
                                <p style="margin:0;line-height:1.2; padding:20px;color: green;" valign="middle">'. $question["api_status"] .'!</p>
                            </td>';
                }else{
                    $row .= '<td style="border: 1px solid #ccc; text-align:center;width:100px;" valign="middle">
                                <p style="margin:0;line-height:1.2; padding:20px;color: red;" valign="middle">'. $question["api_status"] .'!</p>
                            </td>';
                }
                $row .= '</tr>';

                $index++;
            }
        }elseif($calc_method == 'by_points'){
            foreach ($questions as $key => $question) {
                $row .= '<tr nobr="true">
                            <td style="border: 1px solid #ccc;width:250px;"><b style="font-size: 12px;">'. $question_header .' ' . $index . ':</b><br><br>' . html_entity_decode( nl2br( stripslashes( $question["api_question"] ) ) ) . '</td>
                            <td style="border: 1px solid #ccc;"><b style="font-size: 12px;">'. $user_answer_header .':</b><br/><br/><span>' . html_entity_decode( nl2br( stripslashes( $question["api_user_answer"] ) ) ) . '</span></td>';
                    $row .= '
                            <td style="border: 1px solid #ccc;"><b style="font-size: 12px;">'. $api_user_answer_points .':</b><br/><br/><span>' . html_entity_decode( nl2br( stripslashes( $question['api_answer_point'] ) ) ) . '</span></td>';
                $row .= '</tr>';

                $index++;
            }
        }
        $row .= '</tbody></table>';
        return $row;
    }
}

$pdf = new Quiz_Results_PDF_API();