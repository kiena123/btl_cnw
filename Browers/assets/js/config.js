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
        // $("#mid").animate({
        //     width: "50%"
        // });
        start = -1;
    }else{
        $("#category").animate({
            left: "-700px"
        });
        // $("#mid").animate({
        //     width: "70%"
        // });
        start = 0;
    }
};
