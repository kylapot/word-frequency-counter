<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Word Frequency Counter</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Word Frequency Counter</h1>
    
    <form action="process.php" method="post">
        <label for="text">Paste your text here:</label><br>
        <textarea id="text" name="text" rows="10" cols="50" required></textarea><br><br>
        
        <label for="sort">Sort by frequency:</label>
        <select id="sort" name="sort">
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select><br><br>
        
        <label for="limit">Number of words to display:</label>
        <input type="number" id="limit" name="limit" value="10" min="1"><br><br>
        
        <input type="submit" value="Calculate Word Frequency">
    </form>

    <?php
    // Include the processing logic here after the form
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
    }
    ?>

</body>
</html>
