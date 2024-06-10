<?php
// process.php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $targetted = $_POST['targetted'];
    $implemented = $_POST['implemented'];

    // Validation
    foreach (array_merge($targetted, $implemented) as $value) {
        if (!is_numeric($value) || $value < 0 || $value > 5) {
            echo "Invalid input. Values must be numbers between 0 and 5.";
            exit;
        }
    }

    // Store in database
    $targetted_json = json_encode($targetted);
    $implemented_json = json_encode($implemented);

    $stmt = $conn->prepare("INSERT INTO submission (targetted, implemented) VALUES (?, ?)");
    $stmt->bind_param("ss", $targetted_json, $implemented_json);
    $stmt->execute();

    // Calculate percentage
    $output = '<table border="1">';
    $output .= '<tr><th style="width: 20px";
} >Targetted</th><th >Implemented</th><th>Percentage</th></tr>';
    $overall_total = 0;
    for ($i = 0; $i < count($targetted); $i++) {
        $percentage = 0;
        if ($targetted[$i] === $implemented[$i]) {
            $percentage = 100;
        } elseif ($targetted[$i] != null || $implemented[$i] != null) {
            $percentage = 0;
        }
        $overall_total += $percentage;
        $output .= "<tr><td>{$targetted[$i]}</td><td>{$implemented[$i]}</td><td>{$percentage}%</td></tr>";
    }
    $overall_percentage = $overall_total / count($targetted);
    $output .= "<tr><td colspan='2'>Overall Total</td><td>{$overall_percentage}%</td></tr>";
    $output .= '</table>';

    echo $output;

    $stmt->close();
    $conn->close();
}
?>
