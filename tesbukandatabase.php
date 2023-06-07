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
    public function DFS($startNode)
    {
        // Inisialisasi array yang menandai simpul yang telah dikunjungi
        $visited = array();
        foreach (array_keys($this->adjList) as $node) {
            $visited[$node] = false;
        }

        // Inisialisasi array untuk menyimpan hasil penelusuran DFS
        $result = array();

        // Memanggil metode DFSUtil rekursif
        $this->DFSUtil($startNode, $visited, $result);

        // Mengembalikan hasil penelusuran DFS
        return $result;
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
    $graph->addEdge('B', 'C');
    $graph->addEdge('B', 'D');
    $graph->addEdge('C', 'D');
    $graph->addEdge('D', 'E');

    // Memanggil metode DFS dengan simpul awal yang dikirim melalui form
    $startNode = $_POST['startNode'];
    $traversalResult = $graph->DFS($startNode);
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
        input[type="text"] {
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
        <label for="startNode">Start Node:</label><br>
        <input type="text" id="startNode" name="startNode" required><br>

        <input type="submit" value="DFS Traversal">
    </form>

    <?php
    // Menampilkan hasil penelusuran DFS jika tersedia
    if (isset($traversalResult)) {
        echo '<div class="result">';
        echo 'DFS Traversal: ' . implode(' ', $traversalResult);
        echo '</div>';
    }
    ?>

</body>
</html>
