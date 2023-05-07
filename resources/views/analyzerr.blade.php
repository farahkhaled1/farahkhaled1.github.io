{{-- @extends('layouts.user_type.auth')

@section('content') --}}

<html></html>
@php
    
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

# ### yggluguh

// $curl = curl_init();

// curl_setopt_array($curl, [
// 	CURLOPT_URL => "https://seo-audit1.p.rapidapi.com/audit",
// 	CURLOPT_RETURNTRANSFER => true,
// 	CURLOPT_FOLLOWLOCATION => true,
// 	CURLOPT_ENCODING => "",
// 	CURLOPT_MAXREDIRS => 10,
// 	CURLOPT_TIMEOUT => 30,
// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// 	CURLOPT_CUSTOMREQUEST => "POST",
// 	CURLOPT_POSTFIELDS => "{\n    \"url\": \"https://www.utm.edu/staff/jlofaro/Joe%20Lofaro's%20Dive%20Shop%20Project/basic.html\",\n    \"results\": [\n        \"metadata\",\n        \"links\",\n        \"images\",\n        \"content\"\n    ]\n}",
// 	CURLOPT_HTTPHEADER => [
// 		"X-RapidAPI-Host: seo-audit1.p.rapidapi.com",
// 		"X-RapidAPI-Key: e1d4c245damsha7dc645641ffd43p142231jsn3330afedca88",
// 		"content-type: application/json"
// 	],
// ]);

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
// 	echo "cURL Error #:" . $err;
// } else {
// 	echo $response;
// }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


@endphp

@php
// $curl = curl_init();

// curl_setopt_array($curl, [
// 	CURLOPT_URL => "https://seo-audit1.p.rapidapi.com/audit",
// 	CURLOPT_RETURNTRANSFER => true,
// 	CURLOPT_FOLLOWLOCATION => true,
// 	CURLOPT_ENCODING => "",
// 	CURLOPT_MAXREDIRS => 10,
// 	CURLOPT_TIMEOUT => 30,
// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// 	CURLOPT_CUSTOMREQUEST => "POST",
// 	CURLOPT_POSTFIELDS => "{\n    \"url\": \"https://www.utm.edu/staff/jlofaro/Joe%20Lofaro's%20Dive%20Shop%20Project/basic.html\",\n    \"results\": [\n        \"metadata\",\n        \"links\",\n        \"images\",\n        \"content\"\n    ]\n}",
// 	CURLOPT_HTTPHEADER => [
// 		"X-RapidAPI-Host: seo-audit1.p.rapidapi.com",
// 		"X-RapidAPI-Key: e1d4c245damsha7dc645641ffd43p142231jsn3330afedca88",
// 		"content-type: application/json"
// 	],
// ]);

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
// 	echo "cURL Error #:" . $err;
// } else {
// 	echo $response;
// }


@endphp
<br>
<br>
<?php

// $curl = curl_init();

// curl_setopt_array($curl, [
// 	CURLOPT_URL => "https://domain-seo-analysis.p.rapidapi.com/domain-seo-analysis/?domain=apify.com&country=us",
// 	CURLOPT_RETURNTRANSFER => true,
// 	CURLOPT_FOLLOWLOCATION => true,
// 	CURLOPT_ENCODING => "",
// 	CURLOPT_MAXREDIRS => 10,
// 	CURLOPT_TIMEOUT => 30,
// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// 	CURLOPT_CUSTOMREQUEST => "GET",
// 	CURLOPT_HTTPHEADER => [
// 		"X-RapidAPI-Host: domain-seo-analysis.p.rapidapi.com",
// 		"X-RapidAPI-Key: e1d4c245damsha7dc645641ffd43p142231jsn3330afedca88"
// 	],
// ]);

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
// 	echo "cURL Error #:" . $err;
// } else {
// 	echo $response;
// }


?>

<br>
<br>


<?php

// $curl = curl_init();

// curl_setopt_array($curl, [
// 	CURLOPT_URL => "https://domain-seo-analysis.p.rapidapi.com/domain-seo-analysis/?domain=kyliecosmetics.com&country=us",
// 	CURLOPT_RETURNTRANSFER => true,
// 	CURLOPT_FOLLOWLOCATION => true,
// 	CURLOPT_ENCODING => "",
// 	CURLOPT_MAXREDIRS => 10,
// 	CURLOPT_TIMEOUT => 30,
// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// 	CURLOPT_CUSTOMREQUEST => "GET",
// 	CURLOPT_HTTPHEADER => [
// 		"X-RapidAPI-Host: domain-seo-analysis.p.rapidapi.com",
// 		"X-RapidAPI-Key: e1d4c245damsha7dc645641ffd43p142231jsn3330afedca88"
// 	],
// ]);
// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//     echo "cURL Error #:" . $err;
// } else {
//     // $response_data = json_decode($response, true);
//     // var_dump($response_data); // print the response data structure

// 	$response_data = json_decode($response, true);
// $domain_rank = $response_data['data']['domain_rank'];
// echo "Domain Rank: " . $domain_rank;

// }

?>





{{-- 
@extends('layouts.user_type.auth')

@section('content') --}}

  {{-- <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Your Domain's Global Rank</p>
                <h5 class="font-weight-bolder mb-0">
                  @php echo $domain_rank;
				  @endphp
                  <span class="text-success text-sm font-weight-bolder">+55%</span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Visitors</p>
                <h5 class="font-weight-bolder mb-0">
                  2,300
                  <span class="text-success text-sm font-weight-bolder">+3%</span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">New Traffic</p>
                <h5 class="font-weight-bolder mb-0">
                  +3,462
                  <span class="text-danger text-sm font-weight-bolder">-2%</span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Domain Authority</p>
                <h5 class="font-weight-bolder mb-0">
                  72%
                  <span class="text-success text-sm font-weight-bolder">+5%</span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}