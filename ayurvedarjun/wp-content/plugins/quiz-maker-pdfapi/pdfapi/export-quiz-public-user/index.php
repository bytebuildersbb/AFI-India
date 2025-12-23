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

            $data_questions = $request["data"];

            $questions = $this->ays_results_questions($data_questions);

            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', true);

            $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
            $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetDefaultMonospacedFont('freeserif');

            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            $pdf->SetMargins('10', '0', '10');
            $pdf->SetMargins(PDF_MARGIN_TOP, '10');
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->SetAutoPageBreak(TRUE, 10);
            
            $pdf->setFontSubsetting(true);
            $pdf->SetFont('freeserif', '', 14);


            $pdf->AddPage('P', 'A4');

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
            $pdf->output(__DIR__ . '/public-quiz-user.pdf', 'F');

        //============================================================+
        // END OF FILE
        //============================================================+

            $fileContent = file_get_contents('public-quiz-user.pdf');
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
    
    public function ays_results_questions($results){
        $questions = $results['data_questions'];
        $quiz_title = $results['quiz_title'];

        $export_quiz_answers = $results['export_quiz_answers'] === 'true'? true: false;

        $index = 1;
        $row   = '';

        $row .= '<h1 style="font-size:25px; color:#23555F">'.$quiz_title["title"].'</h1>';

        $row .= '<div style="width:100%;">';
        foreach ($questions as $key => $question) {

            if ( $question['questionType'] == 'custom' ) {
                continue;
            }

            $question_title =  $question["questions"];

            $question_numering_value = $index . ". ";

            if (substr( $question_title , 0, 1) === '<') {
                preg_match('/<([a-z]+[1-9]*)\b[^>]*>(.*?)<\/\1>/', $question_title, $matches );
                if(empty($matches)){
                    $question_title = $question_title;
                }else{
                    $question_title_numbering_1 = $matches[2];
                    $question_title_numbering_2 = str_replace( $matches[2], $question_title_numbering_1, $matches[0] );
                    $question_title = str_replace( $matches[0], $question_title_numbering_2, $question_title );
                }
            } else {
                $question_title = $question_title;
            }

            $question_content = $question_title;
            $question_answers = $question['questionAnswers'];

            if( $question['questionType'] == 'fill_in_blank' ){
                // $new_question_content = $question_content;
                // foreach ($question_answers as $key => $answer) {
                //     $row .= '<p style="padding-top: 100px;">&#9744; ' . htmlentities( nl2br( stripslashes( $answer["answer"] ) ) ) . '</p>';
                // }

                $fill_in_blank_question_title_correct = $question_content;

                foreach ($question_answers as $answer_key => $answer_data) {
                    $slug = isset($answer_data["slug"]) && $answer_data["slug"] != '' ? stripslashes(htmlentities($answer_data["slug"], ENT_QUOTES)) : '';
                    $answer_id = (isset($answer_data['id']) && $answer_data['id'] != '') ? $answer_data["id"] : "";
                    $corect_answer = "______";

                    if( $slug == "" ){
                        continue;
                    }

                    $answer_html = $corect_answer;

                    $fill_in_blank_question_title_correct = str_replace( $slug ,$answer_html, $fill_in_blank_question_title_correct);
                }
                $question_content = $fill_in_blank_question_title_correct;
            }

            $row .= '<div nobr="true">
                        <p style="width:250px;"><b>'. html_entity_decode( nl2br( stripslashes($question_content) ) ) .'</b></p>';
            if($export_quiz_answers) {
                switch ($question['questionType']) {
                    case 'text':
                        $row .= '<hr>';
                        break;
                    case 'short_text':
                    case 'number':
                    case 'date':
                        $row .= '<p>____________________________</p>';
                        break;
                        // foreach ($question_answers as $key => $answer) {
                        //     $row .= '<p>&#9675; ' . htmlentities( nl2br( stripslashes( $answer["answer"] ) ) ) . '</p>';
                        // }
                        break;
                    case 'checkbox':
                        foreach ($question_answers as $key => $answer) {
                            $row .= '<p style="padding-top: 100px;">&#9744; ' . htmlentities( nl2br( stripslashes( $answer["answer"] ) ) ) . '</p>';
                        }
                        break;
                    case 'fill_in_blank':

                        break;
                    case 'matching':
                        $question_matches = isset( $question['questionMatches'] ) && !empty( $question['questionMatches'] ) ? $question['questionMatches'] : array();

                        $row .= "<table>";
                            $row .= '<tr>';
                                $row .= '<td>';
                                    $row .= "<table border='1'>";
                                    foreach ($question_answers as $key => $answer) {
                                        $row .= '<tr>';
                                            $row .= '<td>&#9675; ' . htmlentities( nl2br( stripslashes( $answer["answer"] ) ) ) . '</td>';
                                        $row .= '</tr>';
                                    }
                                    $row .= "</table>";
                                $row .= '</td>';

                                $row .= '<td>';
                                    $row .= "<table border='1'>";
                                    foreach ($question_matches as $__key => $__answer) {
                                        $row .= '<tr>';
                                            $row .= '<td>&#9675; ' . htmlentities( nl2br( stripslashes( $__answer["answer"] ) ) ) . '</td>';
                                        $row .= '</tr>';
                                    }
                                    $row .= "</table>";
                                $row .= '</td>';
                            $row .= '</tr>';
                        $row .= "</table>";
                        break;
                    case 'radio':
                    case 'select':
                    case 'true_or_false':
                        foreach ($question_answers as $key => $answer) {
                            $row .= '<p>&#9675; ' . htmlentities( nl2br( stripslashes( $answer["answer"] ) ) ) . '</p>';

                        }
                        break;
                    default:
                        foreach ($question_answers as $key => $answer) {
                            $row .= '<p>&#9675; ' . htmlentities( nl2br( stripslashes( $answer["answer"] ) ) ) . '</p>';

                        }
                }
                
            }           
            
            $row .= '</div>';

            $index++;
        }
        $row .= '</div>';
        return $row;
    }
}

$pdf = new Quiz_Results_PDF_API();