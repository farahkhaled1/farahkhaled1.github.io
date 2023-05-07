


<?php
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


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


?>

<?php
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://seo-audit1.p.rapidapi.com/audit",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "{\n    \"url\": \"https://www.utm.edu/staff/jlofaro/Joe%20Lofaro's%20Dive%20Shop%20Project/basic.html\",\n    \"results\": [\n        \"metadata\",\n        \"links\",\n        \"images\",\n        \"content\"\n    ]\n}",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: seo-audit1.p.rapidapi.com",
		"X-RapidAPI-Key: e1d4c245damsha7dc645641ffd43p142231jsn3330afedca88",
		"content-type: application/json"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}


?>
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







  <?php /**PATH /Users/farahkhaled/Desktop/seopro/resources/views/analyzerr.blade.php ENDPATH**/ ?>