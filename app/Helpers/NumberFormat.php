<?php
 function faNumToEng($num){
    $replace_pairs = array(
        '۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4', '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9',
        '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4', '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9'
    );
    return (int)strtr( $num, $replace_pairs );
}
// retrieves a string and returns one
 function engNumToFa($num){
    $replace_pairs = array(
        '0' => '۰', '1' => '۱', '2' => '۲', '3' => '۳', '4' => '۴', '5' => '۵', '6' => '۶', '7' => '۷', '8' => '۸', '9' => '۹',
        '0' => '۰', '1' => '۱', '2' => '۲', '3' => '۳', '4' => '۴', '5' => '۵', '6' => '۶', '7' => '۷', '8' => '۸', '9' => '۹'
    );
    return strtr( $num, $replace_pairs );
}
 function faDateToEng($date){
    $birthdayArray = explode('/',$date);
    return faNumToEng($birthdayArray[0]).'/'
        .faNumToEng($birthdayArray[1]).'/'
        .faNumToEng($birthdayArray[2]);
}
