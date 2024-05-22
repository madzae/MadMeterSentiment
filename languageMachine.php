<?php
namespace Madzae;

function MadMeterSentiment($sentence) {
    $mysqli = new \mysqli('host', 'user', 'pass', 'database');
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $positiveWords = fetchWords($mysqli, "kbbi_positive");
    $negativeWords = fetchWords($mysqli, "kbbi_negative");
    $contextPositive = fetchPhrases($mysqli, "kbbi_PhrasePositive");
    $contextNegative = fetchPhrases($mysqli, "kbbi_PhraseNegative");

    $results = calculateSentiment($sentence, $positiveWords, $negativeWords, $contextPositive, $contextNegative);
    $mysqli->close();

    header('Content-Type: application/json');
    echo json_encode([
        'Analyzing sentence' => $sentence,
        'Results' => $results
    ]);
}

function fetchWords($mysqli, $tableName) {
    $words = [];
    $result = $mysqli->query("SELECT word FROM $tableName");
    while ($row = $result->fetch_assoc()) {
        $words[] = strtolower($row['word']);
    }
    return $words;
}

function fetchPhrases($mysqli, $tableName) {
    $phrases = [];
    $result = $mysqli->query("SELECT phrase FROM $tableName");
    while ($row = $result->fetch_assoc()) {
        $phrases[] = strtolower($row['phrase']);
    }
    return $phrases;
}

function calculateSentiment($sentence, $positiveWords, $negativeWords, $contextPositive, $contextNegative) {
    $sentence = strtolower($sentence);
    $words = explode(' ', preg_replace('/[^\w\s]/', '', $sentence));
    $positiveCount = $negativeCount = 0;

    foreach ($contextPositive as $phrase) {
        if (strpos($sentence, $phrase) !== false) {
            $positiveCount++;
        }
    }
    foreach ($contextNegative as $phrase) {
        if (strpos($sentence, $phrase) !== false) {
            $negativeCount++;
        }
    }

    foreach ($words as $word) {
        if (in_array($word, $positiveWords)) {
            $positiveCount++;
        }
        if (in_array($word, $negativeWords)) {
            $negativeCount++;
        }
    }

    $totalWords = $positiveCount + $negativeCount;
    $sentimentScore = $totalWords > 0 ? (5 * ($positiveCount - $negativeCount) / $totalWords + 2.5) : 2.5;
    $sentimentScore = max(0, min(5, $sentimentScore));

    return [
        'Positive Words' => $positiveCount,
        'Negative Words' => $negativeCount,
        'Sentiment Score' => $sentimentScore,
        'Overall Sentiment' => $sentimentScore > 3.5 ? 'Positive' : ($sentimentScore < 1.5 ? 'Negative' : 'Neutral')
    ];
}
?>
