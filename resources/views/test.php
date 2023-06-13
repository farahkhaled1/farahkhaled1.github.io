<?php
use Orhanerday\OpenAi\OpenAi;

require 'path/to/openai-php/openai-php.php'; // Include the OpenAI PHP library

$openai = new OpenAI('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'); // Initialize the OpenAI client with your API key
$words = ['list', 'of', 'words', 'goes', 'here']; // List of words provided as input

$maxTokens = 50; // Maximum number of tokens in the generated sentence
$temp = 0.6; // Temperature parameter for controlling randomness (between 0.2 and 1.0)
$prompt = 'Create a sentence using the following words: ' . implode(', ', $words);
$response = $openai->complete(
    'gpt-3.5-turbo',
    [
        'prompt' => $prompt,
        'max_tokens' => $maxTokens,
        'temperature' => $temp,
        'n' => 1 // Generate a single sentence
    ]
);

$sentence = $response['choices'][0]['text']; // Extract the generated sentence from the API response
echo 'Generated Sentence: ' . $sentence;
?>