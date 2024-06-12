<?php
$countrycode = 'KE';
    if ($countrycode == 'KE') {
        $currencyCon = 1;
    } else {      
        $currencyCon = 50;
    }
    
    if ($total >=1 && $total <=800) {
        # code...
        $shipping = 240 / $currencyCon;
    }

    elseif ($total >=801 && $total <=1800) {
        # code...
        $shipping = 344 / $currencyCon;
    }

    elseif ($total >=1801 && $total <=3000) {
        # code...
        $shipping = 360 / $currencyCon;
    }

    elseif ($total >=3001 && $total <=5601) {
        # code...
        $shipping = 380 / $currencyCon;
    }

    elseif ($total >=5601 && $total <=9000) {
        # code...
        $shipping = 425 / $currencyCon;
    }

    elseif ($total >=9001 && $total <=14000) {
        # code...
        $shipping = 470 / $currencyCon;
    }

    elseif ($total >=14001 && $total <=17000) {
        # code...
        $shipping = 505 / $currencyCon;
    }

    elseif ($total >= 17000) {
        # code...
        $shipping = 645 / $currencyCon;
    }

?>