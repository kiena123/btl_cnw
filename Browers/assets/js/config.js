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
            width: "75%"
        });
        start = -1;
    }else{
        $("#category").animate({
            left: "-700px"
        });
        $("#content").animate({
            width: "100%"
        });
        start = 0;
    }
};
