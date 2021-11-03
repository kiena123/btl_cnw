<?php
    if(isset($_POST['btnDangNhap'])){
        $date_str = $_POST['inputDate'];
        $date_item = explode("-",$date_str);
        $date_search = mktime(00,00,00,$date_item[1], $date_item[2], $date_item[0]);
        $date_search_value = getdate($date_search);
        $period = $date_search_value["wday"] - 1;
        if($period < 0){
            $period +=7;
        }
        $date_start = mktime(00,00,00,$date_item[1], $date_item[2] - $period, $date_item[0]);
        $date = getdate($date_start);
        for($i = 0;$i < 7;$i++){
            $weekForDate = mktime(00,00,00,$date["mon"], $date["mday"] + $i, $date["year"]);
            $weekForDate = getdate($weekForDate);
            echo "<th>".$weekForDate["mday"]."/".$weekForDate["mon"]."/".$weekForDate["year"]."</th>";
        }
    }
?>