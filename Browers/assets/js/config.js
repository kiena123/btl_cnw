$(document).ready(function(e){
    $("#menuBtn").click(function(){
        CategoryChange();
    })
})

var start = 0;
function CategoryChange(){
    $("#category").stop(true);
    if(start == 0){
        $("#category").animate({
            left: "0px"
        });
        $("#content").animate({
            width: "50%"
        });
        $("#category").removeClass("position-absolute")
        $("#category").addClass("position-fixed")
        start = -1;
    }else{
        $("#category").animate({
            left: "-700px"
        });
        $("#content").animate({
            width: "75%"
        });
        $("#category").removeClass("position-fixed")
        $("#category").addClass("position-absolute")
        start = 0;
    }
};
