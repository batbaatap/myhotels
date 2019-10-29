@extends('layouts.adminLayout.admin_design')
@section('content')



<div class="container-fluid">
   
                  
                    <?php
                        
                        // if($result_room !== false){

                            foreach($result_room as $j => $row){
                                $room_id = $row->room_id;
                                //  echo $room_id;
                                $room_title = $row->room_title; 
                                // echo $room_title;
                                $stock = $row->stock; 
                                // echo $stock;
                                
                                $rooms[$room_id] = $row;
                                
                                $max_n = $stock-1; echo $max_n;
                               
                                // if($result_book !== false){

                                    foreach($result_book as $i => $row){
                                        $start_date = $row->from_date;    
                                        // echo '$start_date'.$start_date.'<br>';
                                        $end_date   = $row->to_date;     
                                        // echo '$end_date'.$end_date.'<br>';
                                        
                                        // $start_date = strtotime(gmdate('Y', $start_date).'-'.gmdate('n', $start_date).'-'.gmdate('j', $start_date).' 00:00:00');
                                        // $end_date = strtotime(gmdate('Y', $end_date).'-'.gmdate('n', $end_date).'-'.gmdate('j', $end_date).' 00:00:00');
                                        
                                        $start = ($start_date < $time_1d_before) ? $time_1d_before : $start_date;
                                        $end = ($end_date > $time_1d_after) ? $time_1d_after : $end_date;
                                        
                                        // echo '$start'.$start.'<br>';
                                        // echo '$end'.$end.'<br>';

                                        $n = 0;
                                        for($date = $start; $date < $end; $date += 86400){
                                            
                                            $k = null;
                                            $c = 0;
                                            while(is_null($k)){
                                                // var_dump(!isset($bookings[$room_id][$date][$c]));
                                                // var_dump(!isset($closing[$room_id][$date][$c]));

                                                if(!isset($bookings[$room_id][$date][$c]) && !isset($closing[$room_id][$date][$c]))

                                                $k = $c;
                                            
                                                else $c++;
                                            }
                                            if($c > $n) $n = $c;
                                        }

                                        for($date = $start; $date < $end; $date += 86400)
                                            $bookings[$room_id][$date][$n] = $row;
                                            // var_dump(isset($bookings[$room_id][$date][$n]));
                                    }
                                // }

                            } 
                            ?>

                        
                            <div class="panel-body mb15">
                                <div class="container-fluid">
                                    <div class="row">
                                        
                                        <div class="col-lg-10 col-md-9 col-sm-8 timeline-wrapper">

                                            <!-- part 2 -->
                                            <?php
                                            foreach($rooms as $room_id => $row){
                                                $room_title = $row->room_title;   
                                                // echo $room_title;
                                                $hotel_id = $row->id_hotel;       
                                                // echo $hotel_id;
                                                ?>
                                            
                                                <div class="room-row">
                                                    
                                                    <?php
                                                    for($n = 0; $n <= $max_n; $n++){ ?>
                                                        <div class="timeline-row" style="width: <?php echo $width; ?>px;">
                                                            <?php
                                                            $prev_date = $time_1d_before; 
                                                            // echo '$prev_date'.$prev_date;
                                                            // echo '$room_id'.$room_id;
                                                            
                                                            for($date = $from_time; $date <= $to_time; $date += 86400){
                                                                $date = strtotime(gmdate('Y', $date).'-'.gmdate('n', $date).'-'.gmdate('j', $date).' 00:00:00');
                                                                
                                                                $day = '(^|,)'.gmdate('N', $date).'(,|$)';    
                                                                
                                                                $start_date = $date;    
                                                                $end_date = strtotime(gmdate('Y-m-d H:i:s', $start_date).' + 1 day');  
                                                                
                                                                // echo '$n'.$n;
                                                                // echo '$date:'.$date;

                                                                // Is there a booking for today and the previous day
                                                                $prev_booked = (isset($bookings[$room_id][$prev_date][$n]));
                                                                $is_booked   = (isset($bookings[$room_id][$date][$n]));
                                                                
                                                                
                                                                // echo var_dump($prev_booked); 

                                                                // if($prev_booked)  echo "hi";
                                                                // else echo 'sh';

                                                                // Is there a closed room for today and the previous day
                                                                $prev_closed = (isset($closing[$room_id][$prev_date][$n]));
                                                                $is_closed   = (isset($closing[$room_id][$date][$n]));
                                                                
                                                                $class = '';
                                                                $prev_status = '';
                                                                $status = '';
                                                              
                                                                if($is_booked){
                                                                    $class .= ' booked';
                                                                    if($prev_closed || ($prev_booked && $bookings[$room_id][$date][$n]->bookid != $bookings[$room_id][$prev_date][$n]->bookid)) $class .= ' start-end-d';
                                                                    elseif($bookings[$room_id][$date][$n]->from_date == $date) $class .= ' start-d';
                                                                    elseif($bookings[$room_id][$date][$n]->from_date < $date) $class .= ' full';
                                                                    
                                                                    if($bookings[$room_id][$date][$n]->to_date < time()) $status .= ' checked-out';
                                                                    elseif($bookings[$room_id][$date][$n]->from_date <= time()) $status .= ' in-house';
                                                                    elseif($bookings[$room_id][$date][$n]->status == 1) $status .= ' pending';
                                                                    elseif($bookings[$room_id][$date][$n]->status == 4) $status .= ' confirmed';
                                                                }
                                                                
                                                               ?>
                                                                
                                                                <div id="cel-<?php echo $hotel_id.'-'.$room_id.'-'.$n.'-'.$date; ?>" class="timeline-cel timeline-default<?php echo $class.$status; ?><?php if($date == $today) echo ' today'; ?>">
                                                                    <?php

                                                                        if($is_booked){
                                                                        $details = 1;
                                                                        echo '<a data-html="true" data-container="body" class="tips ajax-popup-link'.$status.'" href="popup-details.php" title="'.$details.'" data-params="id='.$bookings[$room_id][$date][$n]->bookid.'"></a>';
                                                                        }

                                                                    ?>
                                                                </div>

                                                                <?php
                                                                // $prev_date = $date;
                                                            } ?>
                                                        </div>
                                                        <?php
                                                    } ?>
                                                </div>
                                                <?php
                                            } ?>
                                        </div>
                                    </div>
                            
                                </div>
                            </div>
                            <?php
                        // }
                         ?>
                    
            


            
@endsection