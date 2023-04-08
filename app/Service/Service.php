<?php
namespace App\Service;

use Carbon\Carbon;

class Service
 {
    static function duration($start, $end = ''){
        $end = empty($end) ? Carbon::now() : $end;
        
        $start = Carbon::parse($start);
        $end = Carbon::parse($end);

        $results = '';
        if($end->diffInDays($start) > 0){
            $results .= $end->diffInDays($start) . ' Days ';
        return  $results . 'ago';
        }
        if($end->diffInHours($start) > 0){
            $results .= fmod($end->diffInHours($start), (60)) . ' Hours ';
        return  $results . 'ago';
        }
        if($end->diffInMinutes($start) > 0){
            $tile = $end->diffInMinutes($start);
            $results .= fmod($tile, (60)) . ' Mins ';
        return  $results . 'ago';
        }
        if($end->diffInSeconds($start) > 0){
            $results .= ($end->diffInSeconds($start) % (60)) . ' Sec ';
        return  $results . 'ago';
        }

        return  $results . 'ago';
    }
 }
