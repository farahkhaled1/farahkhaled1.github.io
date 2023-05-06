<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use 
class DomainController extends Controller
{
    public function index(){
        return view('analyzer');
    }
    
 public function result(Request $request){

    $topic = $request->topic;


$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://domain-seo-analysis.p.rapidapi.com/domain-seo-analysis/?domain=$topic&country=us",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: domain-seo-analysis.p.rapidapi.com",
		"X-RapidAPI-Key: e1d4c245damsha7dc645641ffd43p142231jsn3330afedca88"
	],
]);
$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    // $response_data = json_decode($response, true);
    // var_dump($response_data); // print the response data structure

	$response_data = json_decode($response, true);
$domain_rank = $response_data['data']['domain_rank'];
$domain_auth = $response_data['data']['domain_authority'];
$ctr_scope = $response_data['data']['ctr_scope'];
$seo_difficulty = $response_data['data']['seo_difficulty'];
$off_page_difficulty = $response_data['data']['off_page_difficulty'];
$on_page_difficulty = $response_data['data']['on_page_difficulty'];
$indexed_pages = $response_data['data']['indexed_pages'];
$page_authority = $response_data['data']['page_authority'];
$popularity_score = $response_data['data']['popularity_score'];
$traffic = $response_data['data']['traffic'];
$traffic_costs = $response_data['data']['traffic_costs'];
$organic_keywords = $response_data['data']['organic_keywords'];
$backlinks = $response_data['data']['backlinks'];
$equity = $response_data['data']['equity'];
$cpc = $response_data['data']['cpc'];
$search_volume = $response_data['data']['search_volume'];

$data = [
    'domain_rank' => $domain_rank,
    'domain_auth' => $domain_auth,
    'ctr_scope' => $ctr_scope,
    'seo_difficulty' => $seo_difficulty,
    'off_page_difficulty' => $off_page_difficulty,
    'on_page_difficulty' => $on_page_difficulty,
    'indexed_pages' => $indexed_pages,
    'page_authority' => $page_authority,
    'popularity_score' => $popularity_score,
    'traffic' => $traffic,
    'traffic_costs' => $traffic_costs,
    'organic_keywords' => $organic_keywords,
    'backlinks' => $backlinks,
    'equity' => $equity,
    'cpc' => $cpc,
    'search_volume' => $search_volume,
];
return view('analyzer', ['result' => $data]);
// return view('analyzer',['result'=> $domain_rank, $domain_auth, $ctr_scope , $seo_difficulty, $off_page_difficulty, $on_page_difficulty, $indexed_pages, $page_authority, $popularity_score,$traffic,$traffic_costs, $organic_keywords, $backlinks, $equity, $cpc, $search_volume]);

}

    }
}
