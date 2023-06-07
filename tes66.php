<?php
session_start();

require "Graph.php";
require "Old.php";

$allNode = ['A', 'B', 'C', 'D', 'E'];


// Cek apakah ada permintaan penelusuran DFS yang dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST) && count($_POST) == 3) {
    // Membuat objek Grafik
    $graph = new Graph();

    // Menambahkan simpul ke graf
    $graph->addNode('A');
    $graph->addNode('B');
    $graph->addNode('C');
    $graph->addNode('D');
    $graph->addNode('E');

    // Menambahkan tepian ke graf
    $graph->addEdge('A', 'B');
    $graph->addEdge('B', 'C');
    //$graph->addEdge('B', 'D');
    //$graph->addEdge('C', 'D');
    $graph->addEdge('D', 'E');

    // Memanggil metode DFS dengan simpul awal yang dikirim melalui form
    $startNode1 = $_POST['startNode1'];
    $startNode2 = $_POST['startNode2'];
    $startNode3 = $_POST['startNode3'];

    // SetVariable di Session
    setVar('startNode1', $startNode1);
    setVar('startNode2', $startNode2);
    setVar('startNode3', $startNode3);

    // Memeriksa ketersambungan antara simpul-simpul awal yang dipilih
    $isConnected1 = $graph->isConnected($startNode1, $startNode2);
    $isConnected2 = $graph->isConnected($startNode1, $startNode3);
    $isConnected3 = $graph->isConnected($startNode2, $startNode3);

    // Membuat pesan yang sesuai berdasarkan hasil ketersambungan
    if ($isConnected1 && $isConnected2 && $isConnected3) {
        $message = "Semua simpul awal terhubung!";
    } else {
        $message = "Tidak semua simpul awal terhubung!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>DFS Web App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        label {
            font-weight: bold;
        }

        select {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .result {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>DFS Web App</h2>
    <form method="POST" action="">
        <label for="startNode1">Start Node 1:</label><br>
        <select id="startNode1" name="startNode1" required>
            <option value="A" disabled selected>Pilih Node</option>
            <option value="A" <?= wasSelected('startNode1', 'A') ?>>A</option>
            <option value="B" <?= wasSelected('startNode1', 'B') ?>>B</option>
            <option value="C" <?= wasSelected('startNode1', 'C') ?>>C</option>
            <option value="D" <?= wasSelected('startNode1', 'D') ?>>D</option>
            <option value="E" <?= wasSelected('startNode1', 'E') ?>>E</option>
        </select><br>

        <label for="startNode2">Start Node 2:</label><br>
        <select id="startNode2" name="startNode2">
            <option value="A" disabled selected>Pilih Node</option>
            <option value="A" <?= wasSelected('startNode2', 'A') ?>>A</option>
            <option value="B" <?= wasSelected('startNode2', 'B') ?>>B</option>
            <option value="C" <?= wasSelected('startNode2', 'C') ?>>C</option>
            <option value="D" <?= wasSelected('startNode2', 'D') ?>>D</option>
            <option value="E" <?= wasSelected('startNode2', 'E') ?>>E</option>
        </select><br>

        <label for="startNode3">Start Node 3:</label><br>
        <select id="startNode3" name="startNode3">
            <option value="A" disabled selected>Pilih Node</option>
            <option value="A" <?= wasSelected('startNode3', 'A') ?>>A</option>
            <option value="B" <?= wasSelected('startNode3', 'B') ?>>B</option>
            <option value="C" <?= wasSelected('startNode3', 'C') ?>>C</option>
            <option value="D" <?= wasSelected('startNode3', 'D') ?>>D</option>
            <option value="E" <?= wasSelected('startNode3', 'E') ?>>E</option>
        </select><br>

        <input type="submit" value="DFS Traversal">
    </form>

    <?php
    // Menampilkan pesan ketersambungan jika tersedia
    if (isset($message)) {
        echo '<div class="result">';
        echo $message;
        echo '</div>';
    }
    ?>

</body>

</html>