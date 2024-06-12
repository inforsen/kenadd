<?php
$countrycode = 'KE';
    if ($countrycode == 'KE') {
        $currencyCon = 1;
    } else {      
        $currencyCon = 50;
    }
    
    if ($tootal >=1 && $tootal <=800) {
        # code...
        $shipping = 240 / $currencyCon;
    }

    elseif ($tootal >=801 && $tootal <=1800) {
        # code...
        $shipping = 344 / $currencyCon;
    }

    elseif ($tootal >=1801 && $tootal <=3000) {
        # code...
        $shipping = 360 / $currencyCon;
    }

    elseif ($tootal >=3001 && $tootal <=5601) {
        # code...
        $shipping = 380 / $currencyCon;
    }

    elseif ($tootal >=5601 && $tootal <=9000) {
        # code...
        $shipping = 425 / $currencyCon;
    }

    elseif ($tootal >=9001 && $tootal <=14000) {
        # code...
        $shipping = 470 / $currencyCon;
    }

    elseif ($tootal >=14001 && $tootal <=17000) {
        # code...
        $shipping = 505 / $currencyCon;
    }

    elseif ($tootal >= 17000) {
        # code...
        $shipping = 645 / $currencyCon;
    }

?>