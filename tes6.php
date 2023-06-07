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
    $graph->addEdge('21', '9');
    $graph->addEdge('21', '11');
    $graph->addEdge('9', '4');
    $graph->addEdge('22', '12');
    $graph->addEdge('12', '2');
    $graph->addEdge('29', '25');
    $graph->addEdge('25', '7');
    $graph->addEdge('30', '24');
    $graph->addEdge('24', '18');
    $graph->addEdge('33', '25');
    $graph->addEdge('34', '9');
    $graph->addEdge('34', '11');
    $graph->addEdge('35', '23');
    $graph->addEdge('23', '19');
    $graph->addEdge('19', '13');
    $graph->addEdge('13', '3');
    $graph->addEdge('36', '18');
    $graph->addEdge('37', '9');
    $graph->addEdge('37', '10');
    $graph->addEdge('38', '11');
    $graph->addEdge('39', '23');
    $graph->addEdge('40', '11');
    $graph->addEdge('41', '23');
    $graph->addEdge('42', '32');
    $graph->addEdge('32', '7');
    $graph->addEdge('32', '11');
    $graph->addEdge('43', '12');
    $graph->addEdge('44', '26');
    $graph->addEdge('26', '17');
    $graph->addEdge('45', '9');
    $graph->addEdge('45', '10');
    $graph->addEdge('46', '17');
    $graph->addEdge('17', '12');
    $graph->addEdge('47', '25');
    $graph->addEdge('51', '25');
    $graph->addEdge('52', '32');
    $graph->addEdge('53', '23');
    $graph->addEdge('54', '26');
    $graph->addEdge('55', '26');
    $graph->addEdge('56', '26');
    $graph->addEdge('57', '26');
    $graph->addEdge('58', '26');
    $graph->addEdge('58', '29');
    $graph->addEdge('60', '31');
    $graph->addEdge('60', '23');
    $graph->addEdge('31', '23');
    $graph->addEdge('61', '23');
    $graph->addEdge('62', '23');
    $graph->addEdge('63', '29');
    $graph->addEdge('64', '26');
    $graph->addEdge('65', '32');
    $graph->addEdge('66', '28');
    $graph->addEdge('28', '16');
    $graph->addEdge('16', '10');
    $graph->addEdge('70', '25');
    $graph->addEdge('71', '32');
    $graph->addEdge('72', '23');
    $graph->addEdge('73', '25');
    $graph->addEdge('74', '24');
    $graph->addEdge('74', '26');
    $graph->addEdge('24', '17');
    $graph->addEdge('26', '17');
    $graph->addEdge('75', '7');
    $graph->addEdge('76', '23');
    $graph->addEdge('77', '25');
    $graph->addEdge('77', '32');
    $graph->addEdge('78', '26');
    $graph->addEdge('79', '29');
    $graph->addEdge('29', '25');

    // Memanggil metode DFS dengan simpul awal yang dikirim melalui form
    $startNode1 = $_POST['1'];
    $startNode2 = $_POST['2'];
    $startNode3 = $_POST['3 '];
    $startNode4 = $_POST['4'];
    $startNode5 = $_POST['5'];
    $startNode6 = $_POST['6'];
    $startNode7 = $_POST['7'];
    $startNode8 = $_POST['8'];

    $startNode9  = $_POST['9'];
    $startNode10 = $_POST['10'];
    $startNode11 = $_POST['11'];
    $startNode12 = $_POST['12'];
    $startNode13 = $_POST['13'];
    $startNode14 = $_POST['14'];
    $startNode15 = $_POST['15'];

    $startNode16 = $_POST['16'];
    $startNode17 = $_POST['17'];
    $startNode18 = $_POST['18'];
    $startNode19 = $_POST['19'];
    $startNode20 = $_POST['20'];
    $startNode21 = $_POST['21'];
    $startNode22 = $_POST['22'];

    $startNode23 = $_POST['23'];
    $startNode24 = $_POST['24'];
    $startNode25 = $_POST['25'];
    $startNode26 = $_POST['26'];
    $startNode27 = $_POST['27'];
    $startNode28 = $_POST['28'];

    $startNode29 = $_POST['29'];
    $startNode30 = $_POST['30'];
    $startNode31 = $_POST['31'];
    $startNode32 = $_POST['32'];

    $startNode33 = $_POST['33'];
    $startNode34 = $_POST['34'];
    $startNode35 = $_POST['35'];
    $startNode36 = $_POST['36'];

    $startNode37 = $_POST['37'];
    $startNode38 = $_POST['38'];
    $startNode39 = $_POST['39'];
    $startNode40 = $_POST['40'];
    $startNode41 = $_POST['41'];
    $startNode42 = $_POST['42'];
    $startNode43 = $_POST['43'];
    $startNode44 = $_POST['44'];
    $startNode45 = $_POST['45'];
    $startNode46 = $_POST['46'];
    $startNode47 = $_POST['47'];

    $startNode48 = $_POST['48'];
    $startNode49 = $_POST['49'];
    $startNode50 = $_POST['50'];

    $startNode51 = $_POST['51'];
    $startNode52 = $_POST['52'];
    $startNode53 = $_POST['53'];
    $startNode54 = $_POST['54'];

    $startNode55 = $_POST['55'];
    $startNode56 = $_POST['56'];
    $startNode57 = $_POST['57'];
    $startNode58 = $_POST['58'];
    $startNode59 = $_POST['59'];
    $startNode60 = $_POST['60'];
    $startNode61 = $_POST['61'];
    $startNode62 = $_POST['62'];
    $startNode63 = $_POST['63'];
    $startNode64 = $_POST['64'];
    $startNode65 = $_POST['65'];
    $startNode66 = $_POST['66'];

    $startNode67 = $_POST['67'];
    $startNode68 = $_POST['68'];
    $startNode69 = $_POST['69'];

    $startNode70 = $_POST['70'];
    $startNode70 = $_POST['70'];
    $startNode71 = $_POST['71'];
    $startNode72 = $_POST['72'];
    $startNode73 = $_POST['73'];

    $startNode74 = $_POST['74'];
    $startNode75 = $_POST['75'];
    $startNode76 = $_POST['76'];
    $startNode77 = $_POST['77'];
    $startNode78 = $_POST['78'];
    $startNode79 = $_POST['79'];

    $startNode80 = $_POST['80'];
    
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
