$(document).ready(function(e){
    $("#txtDateEnd").change(function(){
        dateStart();
        dateEnd();
        if(date_diff(dateEnd1,dateStart1) < 0){
            alert("Ngày kết thúc đang sớm hơn ngày bắt đầu");
            // $("#warned").text("Ngày kết thúc đang lớn hơn ngày bắt đầu");
        }
    });
    $("#processCalendar").submit(function(e){
        var checked = new FormData(this);
        // for(checked)
        checked.forEach(function(data){
            if(data == ""){
                e.preventDefault();
                alert("Vẫn đang nhập thiếu");
            }
        });
        dateStart();
        dateEnd();
        if((dateEnd1 - dateStart1) < 0){
            e.preventDefault();
            alert("Ngày kết thúc đang sớm hơn ngày bắt đầu");
        }
    });
})

var i;
function dateStart(){
    var dateStart1,timeStart1;
    timeStart1 = $("#txtTimeStart").var();
    dateStart1 = $("#txtDateStart").var();
    dateStart1 = dateStart1.getTime();
}
function dateEnd(){
    var dateEnd1;
    dateEnd1 = $("#txtTimeEnd").var();
    dateEnd1 = $("#txtDateEnd").var();
    dateEnd1 = dateEnd1.getTime();
}