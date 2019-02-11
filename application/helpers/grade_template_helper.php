<?php

global $CI;



function template_printgrade($data){
	$CI =& get_instance();

	$str = '';

	$remarks = '';

	$CI->load->library('enrollment_library');


        $htmlContent= '<html><head><title>Student Gradest</title><body>';
        $htmlContent.="<style>";
                $htmlContent.="

                td, th ,td ,tr{
                     border: 1px solid black;
                     text-transform:none;
                }
                table{
                    font-family: 'Open-Sans Serif';
                    border-collapse: collapse;
                }
                ";
                $htmlContent.="</style>";

                $htmlContent.="<div style='font-family:Tahoma;'>";
                $htmlContent.="<h1 style='text-align:center;'> Grading Sheet </h1>";
     
                $htmlContent.="<br>";
                $htmlContent.="<span> Subject Code: ".$data['subject_info']['code']."<span>";
                $htmlContent.="<br>";
                $htmlContent.="<span> Subject Name: ".$data['subject_info']['name']."<span>";
                $htmlContent.="<br>";
                $htmlContent.="<span> Teacher : ". $data['teacher_name']->first_name.' '.$data['teacher_name']->last_name[0].'. '.$data['teacher_name']->last_name."<span>";
                $htmlContent.="<br>";

                $htmlContent.="<span> Date Generated: ".date('F j , Y @ h:i:s a')."<span>";

                $htmlContent.="<br>";
                $htmlContent.="<br>";

                $htmlContent.="<table style='font-family:Tahoma; width:1000px;' border='0' >
                    <thead>
                    <tr style='background-color:#8ad919; color:white;'>;
                        <th style='color:white; font-weight:bold;'>Student Name</th>
                        <th style='color:white; font-weight:bold;'>1st Grading</th>
                        <th style='color:white; font-weight:bold;'>2nd Grading</th>
                        <th style='color:white; font-weight:bold;'>3rd Grading</th>
                        <th style='color:white; font-weight:bold;'>4th Grading</th>
                        <th style='color:white; font-weight:bold;'>Final Grade</th>
                        <th style='color:white; font-weight:bold;'>Remarks</th>
                    </tr>
                    </thead>
                    <tbody>";
					foreach($data['enrolled_studs'] as $k=>$stud):

						$ave = ($data['grades'][$k]->first_grading + $data['grades'][$k]->second_grading + $data['grades'][$k]->third_grading + $data['grades'][$k]->fourth_grading) / 4;

						if($ave < 75){
							$remarks = '<span style="color:red;">Failed</span>';
						}else if($ave >=75){
							$remarks = '<span style="color:green;">Passed</span>';
						}else{
							$remarks = '<span style="color:yellow;">INC</span>';
						}

						 $htmlContent.='<tr>';
						 $htmlContent.='<td style="width:250px;">'.$CI->enrollment_library->get_student_complete_name($stud->student_id)->first_name.' '.$CI->enrollment_library->get_student_complete_name($stud->student_id)->last_name.'</td>';
						  $htmlContent.='<td style="text-align:center;">'.$data['grades'][$k]->first_grading.'</td>';
						  $htmlContent.='<td style="text-align:center;">'.$data['grades'][$k]->second_grading.'</td>';
						  $htmlContent.='<td style="text-align:center;">'.$data['grades'][$k]->third_grading.'</td>';
				 		  $htmlContent.='<td style="text-align:center;">'.$data['grades'][$k]->fourth_grading.'</td>';
						  $htmlContent.='<td style="text-align:center;">'.round($ave,1).'</td>';
						  $htmlContent.='<td style="text-align:center;">'.$remarks.'</td>';
						 $htmlContent.='</tr>';

					endforeach;

				     $htmlContent.="</tbody></table></body></html>";

					 return $htmlContent;
}

?>
 