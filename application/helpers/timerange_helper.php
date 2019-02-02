<?php
/** 
 * create time range by CodexWorld
 *  
 * @param mixed $start start time, e.g., 7:30am or 7:30 
 * @param mixed $end   end time, e.g., 8:30pm or 20:30 
 * @param string $interval time intervals, 1 hour, 1 mins, 1 secs, etc.
 * @param string $format time format, e.g., 12 or 24
 */ 
function create_time_range($start, $end, $interval = '30 mins', $format = '12') {
    $startTime = strtotime($start); 
    $endTime   = strtotime($end);
    $returnTimeFormat = ($format == '12')?'g:i:s A':'G:i:s';

    $current   = time(); 
    $addTime   = strtotime('+'.$interval, $current); 
    $diff      = $addTime - $current;

    $times = array(); 
    while ($startTime < $endTime) { 
        $times[] = date($returnTimeFormat, $startTime); 
        $startTime += $diff; 
    } 
    $times[] = date($returnTimeFormat, $startTime); 
    return $times; 
}

//$times = create_time_range('7:00', '17:00', '1 hour');

