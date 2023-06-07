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

    // Metode untuk memeriksa ketersambungan antara dua simpul
    public function isConnected($startNode1, $startNode2)
    {
        // Inisialisasi array yang menandai simpul yang telah dikunjungi
        $visited = array();
        foreach (array_keys($this->adjList) as $node) {
            $visited[$node] = false;
        }

        // Memanggil metode DFSUtil rekursif untuk simpul awal pertama
        $this->DFSUtil($startNode1, $visited, $result);

        // Mengembalikan hasil ketersambungan simpul awal kedua
        return $visited[$startNode2];
    }
}

// Cek apakah ada permintaan penelusuran DFS yang dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Membuat objek Grafik
    $graph = new Graph();

    // Menambahkan simpul ke graf
    $graph->addNode('1');
    $graph->addNode('2');
    $graph->addNode('3');
    $graph->addNode('4');
    $graph->addNode('5');
    $graph->addNode('6');
    $graph->addNode('7');
    $graph->addNode('8');

    $graph->addNode('9');
    $graph->addNode('10');
    $graph->addNode('11');
    $graph->addNode('12');
    $graph->addNode('13');
    $graph->addNode('14');
    $graph->addNode('15');

    $graph->addNode('16');
    $graph->addNode('17');
    $graph->addNode('18');
    $graph->addNode('19');
    $graph->addNode('20');
    $graph->addNode('21');
    $graph->addNode('22');

    $graph->addNode('23');
    $graph->addNode('24');
    $graph->addNode('25');
    $graph->addNode('26');
    $graph->addNode('27');
    $graph->addNode('28');

    $graph->addNode('29');
    $graph->addNode('30');
    $graph->addNode('31');
    $graph->addNode('32');
    $graph->addNode('33');
    $graph->addNode('34');
    $graph->addNode('35');
    $graph->addNode('36');
    $graph->addNode('37');
    $graph->addNode('38');
    $graph->addNode('39');
    $graph->addNode('40');
    $graph->addNode('41');
    $graph->addNode('42');
    $graph->addNode('43');
    $graph->addNode('44');
    $graph->addNode('45');
    $graph->addNode('46');
    $graph->addNode('47');

    $graph->addNode('48');
    $graph->addNode('49');
    $graph->addNode('50');
    $graph->addNode('51');
    $graph->addNode('52');
    $graph->addNode('53');
    $graph->addNode('54');
    $graph->addNode('55');
    $graph->addNode('56');
    $graph->addNode('57');
    $graph->addNode('58');
    $graph->addNode('59');
    $graph->addNode('60');
    $graph->addNode('61');
    $graph->addNode('62');
    $graph->addNode('63');
    $graph->addNode('64');
    $graph->addNode('65');
    $graph->addNode('66');

    $graph->addNode('67');
    $graph->addNode('68');
    $graph->addNode('69');
    $graph->addNode('70');
    $graph->addNode('71');
    $graph->addNode('72');
    $graph->addNode('73');
    $graph->addNode('74');
    $graph->addNode('75');
    $graph->addNode('76');
    $graph->addNode('77');
    $graph->addNode('78');
    $graph->addNode('79');

    $graph->addNode('80');

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
        <select id="startNode1" name="startNode1">
            <option>Pilih Matkul</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
        </select><br>

        <label for="startNode2">Start Node 2:</label><br>
        <select id="startNode2" name="startNode2">
            <option>Pilih Matkul</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
        </select><br>

        <label for="startNode3">Start Node 3:</label><br>
        <select id="startNode3" name="startNode3">
            <option>Pilih Matkul</option>
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
    if (isset($message)) {
        echo '<div class="result">';
        echo $message;
        echo '</div>';
    }
    ?>

    <script>
    // Simpan nilai dropdown sebagai parameter URL saat dipilih
    document.getElementById("startNode1").addEventListener("change", function() {
        var selectedValue = this.value;
        var url = new URL(window.location.href);
        url.searchParams.set("dropdownValue", selectedValue);
        window.history.replaceState({}, '', url);
    });

    // Atur nilai dropdown saat halaman dimuat ulang
    document.addEventListener("DOMContentLoaded", function() {
        var urlParams = new URLSearchParams(window.location.search);
        var dropdownValue = urlParams.get("dropdownValue");
        if (dropdownValue) {
        document.getElementById("startNode1").value = dropdownValue;
        }
    });
    </script>

</body>
</html>
