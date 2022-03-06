<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends Ci_model
{
    
    public function searchTvById($url) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return json_decode($result, true);
    
    }


    public function searchTvDbById($url) {

    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE1OTM2MzUzNjUsImlkIjoiY2ktYWRtaW4iLCJvcmlnX2lhdCI6MTU5MzAzMDU2NSwidXNlcmlkIjoyMjMxNjk4LCJ1c2VybmFtZSI6InJpZmFsbnVyY2h5YTJ4ajMifQ.0mxfAnHJ3eDqYDZz_RR0zeGevwov_1a3AOUPXq6-88iTGNsTt_xfpxO8bEh4ui_JN8OEPbp2MPTSfMmmIz6XZVG1ke4zMo6W7n_rv7uiPb7cgpQEmKw4bgnT9XWY7qZeHFGpsyADCTkC5OoQno98iTYZWkL3oRrMX8oADczBAZ5F2_vKptuEd4Y9wU68KfpmdAvB5EJP7Yf-4ZB5LPQKJi0hU1NuEZX9PeVAACNdWJpHOjvKLQ2lA2Rm5HmOePvWGTy0nkquYkumf2cTzKvfE3aS7glmbGyM1Atl-HWfr2RHwEQZ_CxHN_YuD7JUsxQUt5f3lCPsXkSWzKljgrk66w' , $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return json_decode($result, true);
 
 
    
    }
}