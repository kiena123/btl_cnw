$(document).ready(function(e){
    $("#dateSearch").submit(function(e){
        e.preventDefault();
        deleteNameTable();
    })
})

var date,i;
function deleteNameTable(){
    $("##rowName th").remove();
}