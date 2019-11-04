@extends('layouts.adminLayout.admin_design') @section('content')

<div class="card card-default">
    <form action="/admin/booking/view-calendar" method="GET" enctype="multipart/form-data">
        <div class="card-header">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Эхлэх Өдөр:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text ">
                                <i class="far fa-calendar-alt"></i>
                            </span>
                            </div>
                            <input type="text" name="from_date" class="from_date_cal form-control  float-right" id="">
                        </div>
                    </div>
                </div>

                <!-- /.col -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Дуусах Өдөр:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text ">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control to_date_cal" id="" rel="" name="to_date" value="30/11/2019">
                        </div>

                    </div>
                    <!-- /.form-group -->
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label style="color:transparent;">=</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                {{-- <span class="input-group-text "> --}}
                                        {{-- <i class="far fa-calendar-alt"></i> --}}
                                    {{-- </span> --}}
                            </div>
                            <button type="submit" class="btn btn-primary btn-flat">ХАЙХ</button>
                        </div>

                    </div>
                    <!-- /.form-group -->
                </div>
            </div>
        </div>
        {{-- end card header --}}

        <div class="card-body">
            <div class="row">

                {{-- =========== --}} {{-- Өрөөнүүд --}} {{-- =========== --}}
                <div class="col-lg-2 col-md-3 col-sm-4 rooms-title">
                    <?php
                        foreach($rooms as $room_id => $row){ ?>
                        <div class="room-title bg-info text-info" style="background-color: #d9edf7!important;color: #31708f!important;" id="room-title-<?php echo $room_id; ?>">
                            <?php echo $row->room_title; ?>
                        </div>
                        <?php
                            $initials = $row->room_title;
                            for($n = 0; $n <= $row->n; $n++){ ?>
                            <div class="room-label">
                                <span id="room-num-<?php echo $room_id; ?>-<?php echo $n; ?>"><?php echo $initials.' #'.($n+1); ?></span>
                                <?php if($n+1 > $row->stock) echo '<div class="label label-danger"><i class="fas fa-fw fa-exclamation-circle"></i> '.'OVERBOOKING'.'</div>'; ?>
                            </div>
                            <?php
                            }
                        } ?>
                </div>

                {{-- =========== --}} {{-- Захиалгууд, Өдөр --}} {{-- =========== --}}
                <div class="col-lg-10 col-md-9 col-sm-8 timeline-wrapper">

                    {{-- =================== --}} {{-- check in, check out, occupancy /Ачаалал/ --}} {{-- =================== --}}
                    <div class="timeline-row" style="width: <?php echo $width; ?>px;">
                        <?php

                        $stock = array_sum(array_column($rooms, 'stock'));

                        $prev_date = $time_1d_before;
                        for($date = $from_time; $date <= $to_time; $date += 86400){

                            $checkin = 0;
                            $checkout = 0;
                            $booked = 0;

                            $dat = (gmdate('Y', $date).'-'.gmdate('n', $date).'-'.gmdate('j', $date).' 00:00:00');
                            $date = strtotime($dat.' GMT');

                            foreach($bookings as $id_room => $dates){
                                if(isset($dates[$date])){
                                    foreach($dates[$date] as $n => $booking)
                                        if($booking->from_date == $date) $checkin++;
                                    $booked += ($n+1 < $rooms[$id_room]->stock) ? $n+1 : $rooms[$id_room]->stock;
                                }
                                if(isset($dates[$prev_date])){
                                    foreach($dates[$prev_date] as $n => $booking)
                                        if($booking->to_date == $date) $checkout++;
                                }
                            }

                            $occupancy = ($stock > 0) ? round($booked*100/$stock, 2) : 0;

                            $d = gmdate('N', $date); ?>

                            <div class="timeline-cel timeline-d<?php if($d == 6 || $d == 7) echo ' bg-warning shar_ungu'; ?><?php if($date == $today) echo ' today'; ?>">
                                <?php echo mb_strtoupper(strftime('<b>%a</b><br>%d/%m', $date)); ?>
                                    <br>
                                    <?php
                                if($checkin > 0){ ?>
                                        <a href="popup-check-in-out.php" class="ajax-popup-link" data-params="date=<?php echo $date; ?>">
                                            <div class="badge badge-checkin">
                                                <?php echo $checkin; ?>
                                            </div>
                                        </a>
                                        <?php
                                }else{ ?>
                                            <div class="badge">
                                                <?php echo $checkin; ?>
                                            </div>
                                            <?php
                                }
                                if($checkout > 0){ ?>
                                                <a href="popup-check-in-out.php" class="ajax-popup-link" data-params="date=<?php echo $date; ?>">
                                                    <div class="badge badge-checkout">
                                                        <?php echo $checkout; ?>
                                                    </div>
                                                </a>
                                                <?php
                                }else{ ?>
                                                    <div class="badge">
                                                        <?php echo $checkout; ?>
                                                    </div>
                                                    <?php
                                } ?>
                                                        <div class="<?php echo ($occupancy >= 70) ? 'text-danger' : (($occupancy >= 50) ? 'text-warning' : ''); ?>">
                                                            <?php echo $occupancy; ?>%
                                                        </div>
                            </div>

                            <?php
                            $prev_date = $date;
                        } ?>
                    </div>

                    {{-- ====================== --}} {{-- price, remaining room --}} {{-- ====================== --}}
                    <?php
                    foreach($rooms as $room_id => $row){
                        $room_title = $row->room_title;
                        $hotel_id = $row->id_hotel;
                        $stock = $row->stock;
                        $min_price = $row->price;
                        $start_lock = $row->start_lock;
                        $end_lock = $row->end_lock;
                        $max_n = $row->n;
                        ?>

                        <div class="room-row">
                            <div class="timeline-row" style="width: <?php echo $width; ?>px;">
                                <?php
                                for($date = $from_time; $date <= $to_time; $date += 86400){

                                    $d = gmdate('N', $date);
                                    $day = '(^|,)'.$d.'(,|$)';

                                    // price
                                    $price = 0;
                                    // if($result_rate !== false && last_row_count() > 0){
                                        // $row = $result_rate->fetch();
                                    //     $price = $result_rate->price;
                                    // }

                                    foreach ($result_rate as $key => $value) {
                                        # code...
                                        echo $value;
                                    }

                                    // remaining rooms
                                    $remain = $stock;
                                    if(isset($bookings[$room_id][$date])){
                                        $num_bookings = count($bookings[$room_id][$date]);
                                        $remain = ($stock <= $num_bookings) ? 0 : $stock-$num_bookings;
                                    } ?>
                                    <div class="timeline-cel timeline-price<?php if($d == 6 || $d == 7) echo ' bg-warning shar_ungu'; ?><?php if($date == $today) echo ' today'; ?>">
                                        <div>
                                            <?php if($price > 0) echo $price; ?>
                                        </div>
                                        <span class="text-muted"><?php echo $remain;/* ?> / <?php echo $stock;*/ ?></span>
                                    </div>
                                    <?php
                                } 
                                ?>
                            </div>

                            {{-- ====================== --}} {{-- Color line --}} {{-- ====================== --}}
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

                                        // Is there a closed room for today and the previous day
                                        $prev_closed = (isset($closing[$room_id][$prev_date][$n]));
                                        $is_closed   = (isset($closing[$room_id][$date][$n]));
                                        // echo var_dump($prev_closed);

                                        $class = '';
                                        $prev_status = '';
                                        $status = '';
                                        if($prev_closed){
                                            if(!$is_closed && !$is_booked) $class .= ' end-d';
                                            $prev_status .= ' closed';
                                        }elseif($prev_booked){
                                            if(!$is_booked && !$is_closed) $class .= ' end-d';
                                            if    ($bookings[$room_id][$prev_date][$n]->to_date    < time()) $prev_status .= ' checked-out';
                                            elseif($bookings[$room_id][$prev_date][$n]->from_date <= time()) $prev_status .= ' in-house';
                                            elseif($bookings[$room_id][$prev_date][$n]->status == 1) $prev_status .= ' pending';
                                            elseif($bookings[$room_id][$prev_date][$n]->status == 4) $prev_status .= ' confirmed';
                                        }

                                        if($is_closed){
                                            $class .= ' closed';
                                            if($prev_closed) $class .= ' full';
                                            elseif($prev_booked) $class .= ' start-end-d';
                                            else $class .= ' start-d';
                                            $status .= ' closed';
                                        }elseif($is_booked){
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
                                            if(!$is_closed && $prev_closed){
                                                $details = '';
                                                echo '<a data-html="true" data-container="body" class="tips ajax-popup-link '.$prev_status.'" href="popup-details.php" title="'.$details.'" data-params="id="></a>';

                                            }elseif((!$is_booked && $prev_booked) || ($is_booked && $prev_booked && $bookings[$room_id][$date][$n]->bookid != $bookings[$room_id][$prev_date][$n]->bookid)){

                                                $details = '<b>'.$bookings[$room_id][$prev_date][$n]->firstname.' '.$bookings[$room_id][$prev_date][$n]->lastname.'</b>
                                                <br>#'.$bookings[$room_id][$prev_date][$n]->bookid.'
                                                <br>'.$bookings[$room_id][$prev_date][$n]->from_date.' &rarr; '.$bookings[$room_id][$prev_date][$n]->to_date.'
                                                <br>'.'TOTAL'.': '.$bookings[$room_id][$prev_date][$n]->total;
                                                echo '<a data-html="true" data-container="body" class="tips ajax-popup-link '.$prev_status.'" href="popup-details.php" title="'.$details.'" data-params="id='.$bookings[$room_id][$prev_date][$n]->bookid.'"></a>';
                                            }
                                            if($is_closed){
                                                $details = '';
                                                echo '<a data-html="true" data-container="body" class="tips ajax-popup-link'.$status.'" href="popup-details.php" title="'.$details.'" data-params="id="></a>';
                                            }elseif($is_booked){
                                                $details = '<b>'.$bookings[$room_id][$date][$n]->firstname.' '.$bookings[$room_id][$date][$n]->lastname.
                                                '</b><br>#'.$bookings[$room_id][$date][$n]->bookid.
                                                '<br>'.$bookings[$room_id][$date][$n]->from_date.' &rarr; '.$bookings[$room_id][$date][$n]->to_date.
                                                '<br>'.'TOTAL'.': '.$bookings[$room_id][$date][$n]->total;
                                                echo '<a data-html="true" data-container="body" class="tips ajax-popup-link'.$status.'" href="popup-details.php" title="'.$details.'" data-params="id='.$bookings[$room_id][$date][$n]->bookid.'"></a>';
                                            }

                                            ?>
                                        </div>

                                        <?php
                                                    $prev_date = $date;
                                                } ?>
                                </div>
                                <?php
                                        } ?>
                        </div>
                        <?php
                                }
                            ?>
                </div>
            </div>
        </div>
    
    <div class="card-footer">
            <legend>Тайлбар</legend>
            <div class="col-xs-6 col-sm-5 col-md-4 col-lg-2">
                    <div class="timeline-legend in-house"></div> <div class="legend-label mb5">In house</div>
                    <div class="timeline-legend confirmed"></div> <div class="legend-label mb5">Confirmed</div>
                    <div class="timeline-legend pending"></div> <div class="legend-label mb5">Pending</div>
                    <div class="timeline-legend checked-out"></div> <div class="legend-label mb5">Checked out</div>
                    <div class="timeline-legend closed"></div> <div class="legend-label mb5">Unavailable</div>
                </div>
    </div>
    </form>
</div>
   

    @endsection