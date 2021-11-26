<?php
const MONTHS=  ["january"=> "Enero",
   "february"=> "Febrero",
   "march"=> "Marzo",
   "april"=> "Abril",
   "may"=> "Mayo",
   "june"=> "Junio",
   "july"=> "Julio",
   "august"=> "Agosto",
   "september"=> "Septiembre",
   "october"=> "Octubre",
   "november"=> "Noviembre",
   "december"=> "Diciembre"];
const MAX_CHARACTERS_PER_MONTH = 3;
const START = 0;
function getMonthForPost($month){
    return substr($month, START, MAX_CHARACTERS_PER_MONTH);
}
function hDParse($datetime){
    $time = strtotime($datetime);
    $month = MONTHS[strtolower(strftime("%B",  $time))];
    $day = strftime("%d", $time);
    $year = strftime("%Y", $time);
    $month = strtoupper(getMonthForPost($month));
    return "{$day} DE {$month} {$year}";
}