<?php

// use Illuminate\Support\Facades\Http;

// $url = 'https://google.com';
// $response = Http::get('http://localhost:5000/python/get_text?url=' . urlencode($url));

// if ($response->ok()) {
//     $text = $response->json()['text'];
//     // display text on your website
// } else {
//     // handle error
// }

// $query = 'cars';
// $response = Http::get('http://localhost:5000/python/scrape_google?query=' . urlencode($query));

// if ($response->ok()) {
//     $links = $response->json()['links'];
//     // display links on your website
// } else {
//     // handle error
// }

// $keyword = 'cars';
// $response = Http::get('http://localhost:5000/python/tf_idf_analysis?keyword=' . urlencode($keyword));

// if ($response->ok()) {
//     $result = $response->json()['result'];
//     // display result on your website
// } else {
//     // handle error
// }




?>
{{-- <form action="{{ url('tf_idf.html') }}" method="post">
    @csrf
    <label for="keyword">Keyword:</label>
    <input type="text" id="keyword" name="keyword">
    <button type="submit">Analyze</button>
</form>

@if (!empty($result))
    <h2>Results for "{{ $keyword }}"</h2>
    <table>
        <thead>
            <tr>
                <th>Word</th>
                <th>Average TF-IDF</th>
                <th>Max TF-IDF</th>
                <th>Frequency</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($result as $word)
                <tr>
                    <td>{{ $word['word'] }}</td>
                    <td>{{ $word['average_tfidf'] }}</td>
                    <td>{{ $word['max_tfidf'] }}</td>
                    <td>{{ $word['frequency'] }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Please enter a keyword to analyze.</p>
@endif --}}
