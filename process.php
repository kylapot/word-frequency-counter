<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = $_POST["text"];
    $sortOrder = ($_POST["sort"] == "asc") ? SORT_ASC : SORT_DESC;
    $displayLimit = $_POST["limit"];

    // Tokenize the input text into words
    $words = str_word_count($userInput, 1);

    // List of common stop words to ignore
    $stopWords = array("the", "and", "in", "to", "of", "a", "for", "on", "with", "as");

    // Remove stop words from the list
    $filteredWords = array_diff($words, $stopWords);

    // Calculate word frequencies
    $wordFrequencies = array_count_values($filteredWords);

    // Sort the word frequencies based on user-selected order
    if ($sortOrder == SORT_ASC) {
        asort($wordFrequencies);
    } else {
        arsort($wordFrequencies);
    }

    // Display the results up to the specified limit
    $counter = 0;
    echo "<h2>Word Frequencies:</h2>";
    echo "<ul>";
    foreach ($wordFrequencies as $word => $frequency) {
        if ($counter < $displayLimit) {
            echo "<li>$word: $frequency</li>";
            $counter++;
        } else {
            break;
        }
    }
    echo "</ul>";
    echo '<br><a href="index.php"><button>Go Back</button></a>';
}
?>
