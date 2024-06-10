<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f8f8f8;
            color: #333;
        }

        .container {
            margin: 50px auto;
            width: 60%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }

        h2 {
            color: #4CAF50;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            color: black;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            margin-right: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <form id="submissionForm">
            <h2>Targetted</h2>
            <table>
                <thead>
                    <tr>
                        <th>Key</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><input type="number" id="targetted<?php echo $i; ?>" name="targetted[]" min="0" max="5" required></td>
                    </tr>
                    <?php endfor; ?>
                </tbody>
            </table>

            <h2>Implemented</h2>
            <table>
                <thead>
                    <tr>
                        <th>Key</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><input type="number" id="implemented<?php echo $i; ?>" name="implemented[]" min="0" max="5" required></td>
                    </tr>
                    <?php endfor; ?>
                </tbody>
            </table>

            <button type="button" id="storeDetails">Store Details</button>
            <button type="reset" id="clearForm">Clear</button>
        </form>

        <div id="output"></div>
    </div>

    <script src="script.js"></script>
</body>
</html>
