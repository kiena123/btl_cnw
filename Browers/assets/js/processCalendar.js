$(document).ready(function(e){
    $("#processCalendar").submit(function(e){
        var checked = new FormData(this);
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
            alert("Thời gian kết thúc đang sớm hơn thời gian bắt đầu");
        }
    });
})

var i,dateStart1,dateEnd1;
function dateStart(){
    var Starttime = $("#txtTimeStart").val();
    var Startdate = $("#txtDateStart").val();
    Starttime = Starttime.split(":");
    Startdate = Startdate.split("-");
    dateStart1= Startdate.concat(Starttime);
    for(i = 0;i< 5;i++){
        dateStart1[i] = parseInt(dateStart1[i]);
    }
    dateStart1 = new Date(dateStart1[0], dateStart1[1], dateStart1[2], dateStart1[3], dateStart1[4]);
    dateStart1 = dateStart1.getTime();
}
function dateEnd(){
    var Endtime = $("#txtTimeEnd").val();
    var Enddate = $("#txtDateEnd").val();
    Endtime = Endtime.split(":");
    Enddate = Enddate.split("-");
    dateEnd1= Enddate.concat(Endtime);
    for(i = 0;i < 5;i++){
        dateEnd1[i] = parseInt(dateEnd1[i]);
    }
    dateEnd1 = new Date(dateEnd1[0],dateEnd1[1],dateEnd1[2],dateEnd1[3],dateEnd1[4]);
    dateEnd1 = dateEnd1.getTime();
}