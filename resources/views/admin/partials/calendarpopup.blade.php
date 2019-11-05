@extends('layouts.adminLayout.admin_design')
@section('content')


<div class="white-popup-block" id="popup-booking-25">
            
        <h2>Booking summary #25</h2>
        <a href="index.php?view=form&amp;id=25" class="pull-right action-btn"><svg class="svg-inline--fa fa-edit fa-w-18 fa-fw" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg><!-- <i class="fas fa-fw fa-edit"></i> --></a>
        <a href="#" onclick="javascript:printElem('popup-booking-25');return false;" class="pull-right action-btn"><svg class="svg-inline--fa fa-print fa-w-16 fa-fw" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="print" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M464 192h-16V81.941a24 24 0 0 0-7.029-16.97L383.029 7.029A24 24 0 0 0 366.059 0H88C74.745 0 64 10.745 64 24v168H48c-26.51 0-48 21.49-48 48v132c0 6.627 5.373 12 12 12h52v104c0 13.255 10.745 24 24 24h336c13.255 0 24-10.745 24-24V384h52c6.627 0 12-5.373 12-12V240c0-26.51-21.49-48-48-48zm-80 256H128v-96h256v96zM128 224V64h192v40c0 13.2 10.8 24 24 24h40v96H128zm304 72c-13.254 0-24-10.746-24-24s10.746-24 24-24 24 10.746 24 24-10.746 24-24 24z"></path></svg><!-- <i class="fas fa-fw fa-print"></i> --></a>
        
        <table class="table table-responsive table-bordered">
            <tbody><tr>
                <th width="50%">Booking details</th>
                <th width="50%">Billing address</th>
            </tr>
            <tr>
                <td>
                    Check-in <strong>2019-11-05</strong><br>
                    Check-out <strong>2019-11-20</strong><br>
                    <strong>15</strong> Nights<br>
                    <strong>1</strong> Persons - 
                    Adults: <strong>1</strong> / 
                    Children: <strong>0</strong>
                </td>
                <td>
                    batbaatar Myadagaa<br>Company : Shepherd<br>street 17<br>
                    976 Ulaanbaatar<br>
                    Phone : +97688998507<br>Mobile : 88998507<br>E-mail : batbaatp@gmail.com
                </td>
            </tr>
        </tbody></table>
            <table class="table table-responsive table-bordered">
                <tbody><tr>
                    <th>Room</th>
                    <th>Persons</th>
                    <th class="text-center">Total</th>
                </tr><tr>
                        <td>КОНТИНЕНТАЛ - Стандарт өрөө 3</td>
                        <td>
                            1 person (1 adult )
                        </td>
                        <td class="text-right" width="15%">$300</td>
                    </tr>
            </tbody></table>
        <table class="table table-responsive table-bordered">
            <tbody><tr>
                <th class="text-right">Total (incl. tax)</th>
                <td class="text-right" width="15%"><b>$300</b></td>
            </tr>
        </tbody></table><p><strong>Payment</strong></p><p></p><p>Payment method : arrival<br>Status: Pending<br><b>Balance : $300</b><br></p>        <button title="Close (Esc)" type="button" class="mfp-close">×</button></div>


        @endsection