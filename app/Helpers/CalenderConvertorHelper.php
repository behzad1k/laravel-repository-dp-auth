<?php
function gregorian_to_jalali($g_y, $g_m, $g_d)
{
    $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);
    $gy = $g_y - 1600;
    $gm = $g_m - 1;
    $gd = $g_d - 1;
    $g_day_no = 365 * $gy + div($gy + 3, 4) - div($gy + 99, 100) + div($gy + 399, 400);
    for ($i = 0; $i < $gm; ++$i)
        $g_day_no += $g_days_in_month[$i];
    if ($gm > 1 && (($gy % 4 == 0 && $gy % 100 != 0) || ($gy % 400 == 0)))
        /* leap and after Feb */
        $g_day_no++;
    $g_day_no += $gd;
    $j_day_no = $g_day_no - 79;
    $j_np = div($j_day_no, 12053); /* 12053 = 365*33 + 32/4 */
    $j_day_no = $j_day_no % 12053;
    $jy = 979 + 33 * $j_np + 4 * div($j_day_no, 1461); /* 1461 = 365*4 + 4/4 */
    $j_day_no %= 1461;
    if ($j_day_no >= 366) {
        $jy += div($j_day_no - 1, 365);
        $j_day_no = ($j_day_no - 1) % 365;
    }
    for ($i = 0; $i < 11 && $j_day_no >= $j_days_in_month[$i]; ++$i)
        $j_day_no -= $j_days_in_month[$i];
    $jm = $i + 1;
    $jd = $j_day_no + 1;

    //Edited by Ramin
    if ($jm < 10) {
        $jm = "0$jm";
    }
    if ($jd < 10) {
        $jd = "0$jd";
    }

    return "$jy/$jm/$jd";
}

function gregorian_to_jalali_month($j_y, $j_m, $j_d)
{
    $date = $this->gregorian_to_jalali($j_y, $j_m, $j_d);
    $month = explode('/', $date);
    $m = null;
    switch ($month[1]) {
        case 1:
            $m = "فروردین";
            break;
        case 2:
            $m = "اردیبهشت";
            break;
        case 3:
            $m = "خرداد";
            break;
        case 4:
            $m = "تیر";
            break;
        case 5:
            $m = "مرداد";
            break;
        case 6:
            $m = "شهریور";
            break;
        case 7:
            $m = "مهر";
            break;
        case 8:
            $m = "آبان";
            break;
        case 9:
            $m = "آذر";
            break;
        case 10:
            $m = "دی";
            break;
        case 11:
            $m = "بهمن";
            break;
        case 12:
            $m = "اسفند";
            break;
    }
    $date1 = $j_y . $m . $j_d;
    return $date1;

}

function jalali_to_gregorian($j_y, $j_m, $j_d)
{
    $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);
    $jy = $j_y - 979;
    $jm = $j_m - 1;
    $jd = $j_d - 1;
    $j_day_no = 365 * $jy + div($jy, 33) * 8 + div($jy % 33 + 3, 4);
    for ($i = 0; $i < $jm; ++$i)
        $j_day_no += $j_days_in_month[$i];
    $j_day_no += $jd;
    $g_day_no = $j_day_no + 79;
    $gy = 1600 + 400 * div($g_day_no, 146097); /* 146097 = 365*400 + 400/4 - 400/100 + 400/400 */
    $g_day_no = $g_day_no % 146097;
    $leap = true;
    if ($g_day_no >= 36525) /* 36525 = 365*100 + 100/4 */ {
        $g_day_no--;
        $gy += 100 * div($g_day_no, 36524); /* 36524 = 365*100 + 100/4 - 100/100 */
        $g_day_no = $g_day_no % 36524;
        if ($g_day_no >= 365)
            $g_day_no++;
        else
            $leap = false;
    }
    $gy += 4 * div($g_day_no, 1461); /* 1461 = 365*4 + 4/4 */
    $g_day_no %= 1461;
    if ($g_day_no >= 366) {
        $leap = false;
        $g_day_no--;
        $gy += div($g_day_no, 365);
        $g_day_no = $g_day_no % 365;
    }
    for ($i = 0; $g_day_no >= $g_days_in_month[$i] + ($i == 1 && $leap); $i++)
        $g_day_no -= $g_days_in_month[$i] + ($i == 1 && $leap);
    $gm = $i + 1;
    $gd = $g_day_no + 1;
    return "$gy/$gm/$gd";
}

///////////////// Private functions ///////////////////////

function div($a, $b)
{
    return (int)($a / $b);
}
?>
