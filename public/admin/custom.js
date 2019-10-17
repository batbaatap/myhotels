// ====================
// Өрөө нэмэх дээр дарахад сүүлийн баганы утгыг авч хэвлэнэ
// ==================-=
$("#uruu_nemeh").on('click', function(){        
            var newRow = $('.room_table_row:last').clone().insertAfter('.room_table_body tr:last');
                newRow.find('th:first').text($('.room_table_body tr').length - 1); //increment each row by 1
            $('.room_table_body tr:last td :input').val(''); //clear form field values
});

// ====================
// Хоногийг бодож гаргав тооцоолов
// ==================-=

jQuery('#reservation').on("change", function (e) {
        Calc();
    });
        function Calc(){
        
        var start = $('#reservation').data('daterangepicker').startDate;
        var end = 	$('#reservation').data('daterangepicker').endDate;
        
        var days = Math.floor((end - start)/1000/60/60/24);
        $('#honog').val(days);  
    }


// ====================
// Өрөө нэмэх дээр дарахад сүүлийн баганы утгыг авч хэвлэнэ
// ==================-=






// ====================
// Өрөө нэмэх дээр дарахад сүүлийн баганы утгыг авч хэвлэнэ
// ==================-=




// ====================
// Өрөө нэмэх дээр дарахад сүүлийн баганы утгыг авч хэвлэнэ
// ==================-=





// ====================
// Өрөө нэмэх дээр дарахад сүүлийн баганы утгыг авч хэвлэнэ
// ==================-=


