<?php

// Membuat kelas Graph untuk merepresentasikan graf
class Graph
{
    private $adjList;

    // Menginisialisasi objek Graph dengan daftar kosong
    public function __construct()
    {
        $this->adjList = array();
    }

    // Menambahkan simpul ke graf
    public function addNode($node)
    {
        $this->adjList[$node] = array();
    }

    // Menambahkan tepian antara dua simpul dalam graf
    public function addEdge($node1, $node2)
    {
        $this->adjList[$node1][] = $node2;
        $this->adjList[$node2][] = $node1;
    }

    // Metode rekursif untuk DFS
    private function DFSUtil($node, &$visited, &$result)
    {
        // Menandai simpul saat ini sebagai dikunjungi
        $visited[$node] = true;

        // Menambahkan simpul saat ini ke hasil
        $result[] = $node;

        // Melakukan rekursi untuk semua tetangga yang belum dikunjungi
        foreach ($this->adjList[$node] as $neighbor) {
            if (!$visited[$neighbor]) {
                $this->DFSUtil($neighbor, $visited, $result);
            }
        }
    }

    // Metode DFS wrapper
    public function DFS($startNodes)
    {
        // Inisialisasi array yang menandai simpul yang telah dikunjungi
        $visited = array();
        foreach (array_keys($this->adjList) as $node) {
            $visited[$node] = false;
        }

        // Memanggil metode DFSUtil rekursif untuk setiap simpul awal
        foreach ($startNodes as $startNode) {
            $this->DFSUtil($startNode, $visited, $result);
        }

        // Mengecek apakah semua simpul awal terhubung atau tidak
        $allConnected = true;
        foreach ($startNodes as $startNode) {
            if (!$visited[$startNode]) {
                $allConnected = false;
                break;
            }
        }

        return $allConnected;
    }
}

// Cek apakah ada permintaan penelusuran DFS yang dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Memanggil metode DFS dengan simpul awal yang dikirim melalui form
    $startNodes = array();
    if (isset($_POST['startNode1'])) {
        $startNodes[] = $_POST['startNode1'];
    }
    if (isset($_POST['startNode2'])) {
        $startNodes[] = $_POST['startNode2'];
    }
    if (isset($_POST['startNode3'])) {
        $startNodes[] = $_POST['startNode3'];
    }

    // Memeriksa ketersambungan dari simpul-simpul awal yang dipilih
    $isConnected = $graph->DFS($startNodes);

    // Membuat pesan yang sesuai berdasarkan hasil ketersambungan
    if ($isConnected) {
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
        <select id="startNode1" name="startNode1">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
        </select><br>

        <label for="startNode2">Start Node 2:</label><br>
        <select id="startNode2" name="startNode2">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
        </select><br>

        <label for="startNode3">Start Node 3:</label><br>
        <select id="startNode3" name="startNode3">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
        </select><br>

        <input type="submit" value="DFS Traversal">
    </form>

    <?php
    // Menampilkan pesan ketersambungan jika tersedia
    if (isset($isConnected)) {
        echo '<div class="result">';
        echo $message;
        echo '</div>';
    }
    ?>

</body>
</html>
