$(document).ready(function(e){
    $("#processCalendar").submit(function(e){
        e.preventDefault();
        
        $.ajax({
            url: "./",
        });
    })
})

var date,i;
function deleteNameTable(){
    $("##rowName th").remove();
}