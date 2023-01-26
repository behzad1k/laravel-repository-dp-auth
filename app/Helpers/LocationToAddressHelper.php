<?php
function getAddress($lat, $lng)
{
    //google map api url
    $api_key = 'AIzaSyCAqk_i3Qn62MzHTqM9MGaxILlc7VGGGCk';
    $request ='http://maps.googleapis.com/maps/api/geocode/json?latlng='.$geolocation.'';
    $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
    $json = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=true_or_false&key='.$api_key);
    $data=json_decode($json);
    return $json;
    $status = $data->status;
    if($status=="OK")
    {
        return $data->results[0]->formatted_address;
    }
    else
    {
        return false;
    }
}
?>
