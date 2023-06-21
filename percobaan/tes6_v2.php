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
    // $startNode1 = $_POST['startNode1'];
    // $startNode2 = $_POST['startNode2'];
    // $startNode3 = $_POST['startNode3'];
    // $startNode4 = $_POST['startNode4'];
    // $startNode5 = $_POST['startNode5'];
    // $startNode6 = $_POST['startNode6'];
    // $startNode7 = $_POST['startNode7'];
    // $startNode8 = $_POST['startNode8'];
    // $startNode9  = $_POST['startNode9'];
    // $startNode10 = $_POST['startNode10'];
    // $startNode11 = $_POST['startNode11'];
    // $startNode12 = $_POST['startNode12'];
    // $startNode13 = $_POST['startNode13'];
    // $startNode14 = $_POST['startNode14'];
    // $startNode15 = $_POST['startNode15'];
    // $startNode16 = $_POST['startNode16'];
    // $startNode17 = $_POST['startNode17'];
    // $startNode18 = $_POST['startNode18'];
    // $startNode19 = $_POST['startNode19'];
    // $startNode20 = $_POST['startNode20'];
    // $startNode21 = $_POST['startNode21'];
    // $startNode22 = $_POST['startNode22'];
    // $startNode23 = $_POST['startNode23'];
    // $startNode24 = $_POST['startNode24'];
    // $startNode25 = $_POST['startNode25'];
    // $startNode26 = $_POST['startNode26'];
    // $startNode27 = $_POST['startNode27'];
    // $startNode28 = $_POST['startNode28'];
    // $startNode29 = $_POST['startNode29'];
    // $startNode30 = $_POST['startNode30'];
    // $startNode31 = $_POST['startNode31'];
    // $startNode32 = $_POST['startNode32'];
    // $startNode33 = $_POST['startNode33'];
    // $startNode34 = $_POST['startNode34'];
    // $startNode35 = $_POST['startNode35'];
    // $startNode36 = $_POST['startNode36'];
    // $startNode37 = $_POST['startNode37'];
    // $startNode38 = $_POST['startNode38'];
    // $startNode39 = $_POST['startNode39'];
    // $startNode40 = $_POST['startNode40'];
    // $startNode41 = $_POST['startNode41'];
    // $startNode42 = $_POST['startNode42'];
    // $startNode43 = $_POST['startNode43'];
    // $startNode44 = $_POST['startNode44'];
    // $startNode45 = $_POST['startNode45'];
    // $startNode46 = $_POST['startNode46'];
    // $startNode47 = $_POST['startNode47'];
    // $startNode48 = $_POST['startNode48'];

    
    // Memeriksa ketersambungan antara simpul-simpul awal yang dipilih
    $startNodeCount = 48;
    $isConnected = array();

    for ($i = 1; $i <= $startNodeCount; $i++) {
        $isConnected[$i] = array();
        for ($j = 1; $j <= $startNodeCount; $j++) {
            $isConnected[$i][$j] = $graph->isConnected(${"startNode".$i}, ${"startNode".$j});
        }
    }

    $allConnected = true;
    for ($i = 1; $i <= $startNodeCount; $i++) {
        if (!$isConnected[$i]) {
            $allConnected = false;
        break;
        }
    }

    if ($allConnected) {
        $message = "Semua simpul awal terhubung!";
    } else {
        $message = "Tidak semua simpul awal terhubung!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>DFS Web App</title>
    <style>
        body {
            font-family: Roboto, sans-serif;
            margin: 20px;
        }
        label {
            font-weight: bold;
        }
        select {
            width: 400px;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #2a5c8e;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>


<h2>DFS Web App</h2>

<div class="container">
    <div class="row">
        <div class="col-6">
            <!--Semester 1-->
            <form method="POST" action="">
                <label for="startNode1">Semester 1:</label><br>
                <select id="startNode1" name="startNode1">
                    <option>Pilih Matkul</option>
                    <option value="1">Agama</option>
                    <option value="2">Konsep Pemrograman </option>
                    <option value="3">Sistem Digital </option>
                    <option value="4">Kalkulus I</option>
                    <option value="5">Fisika </option>
                    <option value="6">Bahasa Inggris</option>
                    <option value="7">Statistika & Probabilitas</option>
                    <option value="8">Bahasa Indonesia </option>
                </select>

                <label for="startNode2"></label><br>
                <select id="startNode2" name="startNode2">
                    <option>Pilih Matkul</option>
                    <option value="1">Agama</option>
                    <option value="2">Konsep Pemrograman </option>
                    <option value="3">Sistem Digital </option>
                    <option value="4">Kalkulus I</option>
                    <option value="5">Fisika </option>
                    <option value="6">Bahasa Inggris</option>
                    <option value="7">Statistika & Probabilitas</option>
                    <option value="8">Bahasa Indonesia </option>
                </select>

                <label for="startNode3"></label><br>
                <select id="startNode3" name="startNode3">
                    <option>Pilih Matkul</option>
                    <option value="1">Agama</option>
                    <option value="2">Konsep Pemrograman </option>
                    <option value="3">Sistem Digital </option>
                    <option value="4">Kalkulus I</option>
                    <option value="5">Fisika </option>
                    <option value="6">Bahasa Inggris</option>
                    <option value="7">Statistika & Probabilitas</option>
                    <option value="8">Bahasa Indonesia </option>
                </select>

                <label for="startNode4"></label><br>
                <select id="startNode4" name="startNode4">
                    <option>Pilih Matkul</option>    
                    <option value="1">Agama</option>
                    <option value="2">Konsep Pemrograman </option>
                    <option value="3">Sistem Digital </option>
                    <option value="4">Kalkulus I</option>
                    <option value="5">Fisika </option>
                    <option value="6">Bahasa Inggris</option>
                    <option value="7">Statistika & Probabilitas</option>
                    <option value="8">Bahasa Indonesia </option>
                </select>

                <label for="startNode5"></label><br>
                <select id="startNode5" name="startNode5">
                    <option>Pilih Matkul</option>
                    <option value="1">Agama</option>
                    <option value="2">Konsep Pemrograman </option>
                    <option value="3">Sistem Digital </option>
                    <option value="4">Kalkulus I</option>
                    <option value="5">Fisika </option>
                    <option value="6">Bahasa Inggris</option>
                    <option value="7">Statistika & Probabilitas</option>
                    <option value="8">Bahasa Indonesia </option>
                </select>

                <label for="startNode6"></label><br>
                <select id="startNode6" name="startNode6">
                    <option>Pilih Matkul</option>
                    <option value="1">Agama</option>
                    <option value="2">Konsep Pemrograman </option>
                    <option value="3">Sistem Digital </option>
                    <option value="4">Kalkulus I</option>
                    <option value="5">Fisika </option>
                    <option value="6">Bahasa Inggris</option>
                    <option value="7">Statistika & Probabilitas</option>
                    <option value="8">Bahasa Indonesia </option>
                </select>

                <label for="startNode7"></label><br>
                <select id="startNode7" name="startNode7">
                    <option>Pilih Matkul</option>
                    <option value="1">Agama</option>
                    <option value="2">Konsep Pemrograman </option>
                    <option value="3">Sistem Digital </option>
                    <option value="4">Kalkulus I</option>
                    <option value="5">Fisika </option>
                    <option value="6">Bahasa Inggris</option>
                    <option value="7">Statistika & Probabilitas</option>
                    <option value="8">Bahasa Indonesia </option>
                </select>

                <label for="startNode8"></label><br>
                <select id="startNode8" name="startNode8">
                    <option>Pilih Matkul</option>
                    <option value="1">Agama</option>
                    <option value="2">Konsep Pemrograman </option>
                    <option value="3">Sistem Digital </option>
                    <option value="4">Kalkulus I</option>
                    <option value="5">Fisika </option>
                    <option value="6">Bahasa Inggris</option>
                    <option value="7">Statistika & Probabilitas</option>
                    <option value="8">Bahasa Indonesia </option>
                </select><br>

                <!--Semester 3-->
            <label for="startNode16">Semester 3:</label><br>
            <select id="startNode16" name="startNode6">
                <option>Pilih Matkul</option>
                <option value="16">Matematika Diskrit II</option>
                <option value="17">Pemrograman Berorientasi Objek</option>
                <option value="18">Basis Data</option>
                <option value="19">Sistem Operasi</option>
                <option value="20">Kewarganegaraan</option>
                <option value="21">Metode Numerik </option>
                <option value="22">Desain & Analisis Algoritma</option>
            </select>

            <select id="startNode17" name="startNode17">
                <option>Pilih Matkul</option>
                <option value="16">Matematika Diskrit II</option>
                <option value="17">Pemrograman Berorientasi Objek</option>
                <option value="18">Basis Data</option>
                <option value="19">Sistem Operasi</option>
                <option value="20">Kewarganegaraan</option>
                <option value="21">Metode Numerik </option>
                <option value="22">Desain & Analisis Algoritma</option>
            </select>

            <select id="startNode18" name="startNode18">
                <option>Pilih Matkul</option>
                <option value="16">Matematika Diskrit II</option>
                <option value="17">Pemrograman Berorientasi Objek</option>
                <option value="18">Basis Data</option>
                <option value="19">Sistem Operasi</option>
                <option value="20">Kewarganegaraan</option>
                <option value="21">Metode Numerik </option>
                <option value="22">Desain & Analisis Algoritma</option>
            </select>

            <select id="startNode19" name="startNode19">
                <option>Pilih Matkul</option>
                <option value="16">Matematika Diskrit II</option>
                <option value="17">Pemrograman Berorientasi Objek</option>
                <option value="18">Basis Data</option>
                <option value="19">Sistem Operasi</option>
                <option value="20">Kewarganegaraan</option>
                <option value="21">Metode Numerik </option>
                <option value="22">Desain & Analisis Algoritma</option>
            </select>

            <select id="startNod20" name="startNode20">
                <option>Pilih Matkul</option>
                <option value="16">Matematika Diskrit II</option>
                <option value="17">Pemrograman Berorientasi Objek</option>
                <option value="18">Basis Data</option>
                <option value="19">Sistem Operasi</option>
                <option value="20">Kewarganegaraan</option>
                <option value="21">Metode Numerik </option>
                <option value="22">Desain & Analisis Algoritma</option>
            </select>

            <select id="startNode21" name="startNode21">
                <option>Pilih Matkul</option>
                <option value="16">Matematika Diskrit II</option>
                <option value="17">Pemrograman Berorientasi Objek</option>
                <option value="18">Basis Data</option>
                <option value="19">Sistem Operasi</option>
                <option value="20">Kewarganegaraan</option>
                <option value="21">Metode Numerik </option>
                <option value="22">Desain & Analisis Algoritma</option>
            </select>

            <select id="startNode22" name="startNode22">
                <option>Pilih Matkul</option>
                <option value="16">Matematika Diskrit II</option>
                <option value="17">Pemrograman Berorientasi Objek</option>
                <option value="18">Basis Data</option>
                <option value="19">Sistem Operasi</option>
                <option value="20">Kewarganegaraan</option>
                <option value="21">Metode Numerik </option>
                <option value="22">Desain & Analisis Algoritma</option>
            </select><br>

             <!--Semester 5-->
             <label for="startNode30">Semester 5:</label><br>
             <select id="startNode30" name="startNode30">
                 <option>Pilih Matkul</option>
                 <option value="29">Data Mining</option>
                 <option value="30">Interaksi Manusia & Komputer</option>
                 <option value="31">Sistem Terdistribusi</option>
                 <option value="32">Sistem Terdistribusi</option>
             </select>

             <select id="startNode31" name="startNode31">
                 <option>Pilih Matkul</option>
                 <option value="29">Data Mining</option>
                 <option value="30">Interaksi Manusia & Komputer</option>
                 <option value="31">Sistem Terdistribusi</option>
                 <option value="32">Sistem Terdistribusi</option>
             </select>

             <select id="startNode32" name="startNode32">
                 <option>Pilih Matkul</option>
                 <option value="29">Data Mining</option>
                 <option value="30">Interaksi Manusia & Komputer</option>
                 <option value="31">Sistem Terdistribusi</option>
                 <option value="32">Sistem Terdistribusi</option>
             </select>

             <select id="startNode33" name="startNode33">
                 <option>Pilih Matkul</option>
                 <option value="29">Data Mining</option>
                 <option value="30">Interaksi Manusia & Komputer</option>
                 <option value="31">Sistem Terdistribusi</option>
                 <option value="32">Sistem Terdistribusi</option>
             </select><br>

            <!--Wajib Minat Semester 5-->
             <label for="startNode34">Wajib Minat Semester 5:</label><br>
             <select id="startNode34" name="startNode34">
                 <option>Pilih Matkul</option>
                 <option value="33">Machine Learning</option>
                 <option value="34">Pengolahan Sinyal Digital</option>
                 <option value="35">Manajemen Jaringan</option>
                 <option value="36">Basis Data Lanjut</option>
             </select><br>


            <!--Pilihan1 Semester 5-->
             <label for="startNode35">Pilihan Semester 5:</label><br>
             <select id="startNode35" name="startNode35">
                 <option>Pilih Matkul</option>
                 <option value="37">Logika Samar</option>
                 <option value="38">Riset Operasi</option>
                 <option value="39">Komputasi Grid</option>
                 <option value="40">Kriptografi</option>
                 <option value="41">Wireless & Mobile Computing</option>
                 <option value="42">Biometric</option>
                 <option value="43">Teori Game</option>
                 <option value="44">Manajemen Sistem Informasi</option>
                 <option value="45">Metode Formal</option>
                 <option value="46">Model-Based Programming</option>
                 <option value="47">Robotika</option>
             </select>

            <!--Pilihan2 Semester 5-->
             <select id="startNode36" name="startNode36">
                 <option>Pilih Matkul</option>
                 <option value="37">Logika Samar</option>
                 <option value="38">Riset Operasi</option>
                 <option value="39">Komputasi Grid</option>
                 <option value="40">Kriptografi</option>
                 <option value="41">Wireless & Mobile Computing</option>
                 <option value="42">Biometric</option>
                 <option value="43">Teori Game</option>
                 <option value="44">Manajemen Sistem Informasi</option>
                 <option value="45">Metode Formal</option>
                 <option value="46">Model-Based Programming</option>
                 <option value="47">Robotika</option>
             </select><br>

            <!--Semester 7-->
            <label for="startNode44">Semester 7:</label><br>
            <select id="startNode44" name="startNode44">
                <option>Pilih Matkul</option>
                <option value="67">Etika Profesi</option>
                <option value="68">KKN</option>
                <option value="69">Kewirausahaan</option>
            </select><br>

            <!--Wajib Minat Semester 7-->
            <label for="startNode45">Minat Wajib Semester 7:</label><br>
            <select id="startNode45" name="startNode45">
                <option>Pilih Matkul</option>
                <option value="70">Kecerdasan Komputasional</option>
                <option value="71">Computer Vision</option>
                <option value="72">Teknologi IoT</option>
                <option value="73">Semantic Web</option>
            </select><br>

            <!--Pilihan Semester 7-->
            <label for="startNode46">Pilihan Semester 7:</label><br>
            <select id="startNode46" name="startNode46">
                <option>Pilih Matkul</option>
                <option value="74">E-commerce</option>
                <option value="75">Simulasi & Pemodelan</option>
                <option value="76">Forensik Digital</option>
                <option value="77">Komputasi Biomedikn</option>
                <option value="78">Enterprice Architecture</option>
                <option value="79">Web Mining dan Information Retrieval</option>
            </select>

            <!--Pilihan Semester 7-->
            <select id="startNode47" name="startNode47">
                <option>Pilih Matkul</option>
                <option value="74">E-commerce</option>
                <option value="75">Simulasi & Pemodelan</option>
                <option value="76">Forensik Digital</option>
                <option value="77">Komputasi Biomedikn</option>
                <option value="78">Enterprice Architecture</option>
                <option value="79">Web Mining dan Information Retrieval</option>
            </select><br>
        </div>
        
        <div class="col-6">
            <!--Semester 2-->
            <label for="startNode9">Semester 2:</label><br>
            <select id="startNode9" name="startNode9">
                <option>Pilih Matkul</option>
                <option value="9">Kalkulus II</option>
                <option value="10">Metematika Diskrit I</option>
                <option value="11">Aljabar Linier</option>
                <option value="12">Struktur Data & Algoritma</option>
                <option value="13">Organisasi Sistem Komputer</option>
                <option value="14">Pendidikan Kewarganegaraan</option>
                <option value="15">Bahasa Inggris II</option>
            </select>

            <label for="startNode10"></label><br>
            <select id="startNode10" name="startNode10">
                <option>Pilih Matkul</option>
                <option value="9">Kalkulus II</option>
                <option value="10">Metematika Diskrit I</option>
                <option value="11">Aljabar Linier</option>
                <option value="12">Struktur Data & Algoritma</option>
                <option value="13">Organisasi Sistem Komputer</option>
                <option value="14">Pendidikan Kewarganegaraan</option>
                <option value="15">Bahasa Inggris II</option>
            </select>
        
            <label for="startNode11"></label><br>
            <select id="startNode11" name="startNode">
                <option>Pilih Matkul</option>
                <option value="9">Kalkulus II</option>
                <option value="10">Metematika Diskrit I</option>
                <option value="11">Aljabar Linier</option>
                <option value="12">Struktur Data & Algoritma</option>
                <option value="13">Organisasi Sistem Komputer</option>
                <option value="14">Pendidikan Kewarganegaraan</option>
                <option value="15">Bahasa Inggris II</option>
            </select>
        
            <label for="startNode12"></label><br>
            <select id="startNode12" name="startNode2">
                <option>Pilih Matkul</option>
                <option value="9">Kalkulus II</option>
                <option value="10">Metematika Diskrit I</option>
                <option value="11">Aljabar Linier</option>
                <option value="12">Struktur Data & Algoritma</option>
                <option value="13">Organisasi Sistem Komputer</option>
                <option value="14">Pendidikan Kewarganegaraan</option>
                <option value="15">Bahasa Inggris II</option>
            </select>
        
            <label for="startNode13"></label><br>
            <select id="startNode13" name="startNode13">
                <option>Pilih Matkul</option>
                <option value="9">Kalkulus II</option>
                <option value="10">Metematika Diskrit I</option>
                <option value="11">Aljabar Linier</option>
                <option value="12">Struktur Data & Algoritma</option>
                <option value="13">Organisasi Sistem Komputer</option>
                <option value="14">Pendidikan Kewarganegaraan</option>
                <option value="15">Bahasa Inggris II</option>
            </select>
        
            <label for="startNode14"></label><br>
            <select id="startNode14" name="startNode14">
                <option>Pilih Matkul</option>
                <option value="9">Kalkulus II</option>
                <option value="10">Metematika Diskrit I</option>
                <option value="11">Aljabar Linier</option>
                <option value="12">Struktur Data & Algoritma</option>
                <option value="13">Organisasi Sistem Komputer</option>
                <option value="14">Pendidikan Kewarganegaraan</option>
                <option value="15">Bahasa Inggris II</option>
            </select>
        
            <label for="startNode15"></label><br>
            <select id="startNode15" name="startNode15">
                <option>Pilih Matkul</option>
                <option value="9">Kalkulus II</option>
                <option value="10">Metematika Diskrit I</option>
                <option value="11">Aljabar Linier</option>
                <option value="12">Struktur Data & Algoritma</option>
                <option value="13">Organisasi Sistem Komputer</option>
                <option value="14">Pendidikan Kewarganegaraan</option>
                <option value="15">Bahasa Inggris II</option>
            </select><br>

        <!--Semester 4-->
            <label for="startNode23">Semester 4:</label><br>
            <select id="startNode23" name="startNode23">
                <option>Pilih Matkul</option>
                <option value="23">Jaringan Komputer</option>
                <option value="24">Pemrograman Web</option>
                <option value="25">Kecerdasan Buatan</option>
                <option value="26">Rekayasa Perangkat Lunak</option>
                <option value="27">Pengembangan Aplikasi Bergerak</option>
                <option value="28">Teori Bahasa & Automata</option>
            </select>

            <select id="startNode24" name="startNode24">
                <option>Pilih Matkul</option>
                <option value="23">Jaringan Komputer</option>
                <option value="24">Pemrograman Web</option>
                <option value="25">Kecerdasan Buatan</option>
                <option value="26">Rekayasa Perangkat Lunak</option>
                <option value="27">Pengembangan Aplikasi Bergerak</option>
                <option value="28">Teori Bahasa & Automata</option>
            </select>

            <select id="startNode25" name="startNode25">
                <option>Pilih Matkul</option>
                <option value="23">Jaringan Komputer</option>
                <option value="24">Pemrograman Web</option>
                <option value="25">Kecerdasan Buatan</option>
                <option value="26">Rekayasa Perangkat Lunak</option>
                <option value="27">Pengembangan Aplikasi Bergerak</option>
                <option value="28">Teori Bahasa & Automata</option>
            </select>

            <select id="startNode26" name="startNode26">
                <option>Pilih Matkul</option>
                <option value="23">Jaringan Komputer</option>
                <option value="24">Pemrograman Web</option>
                <option value="25">Kecerdasan Buatan</option>
                <option value="26">Rekayasa Perangkat Lunak</option>
                <option value="27">Pengembangan Aplikasi Bergerak</option>
                <option value="28">Teori Bahasa & Automata</option>
            </select>

            <select id="startNode27" name="startNode27">
                <option>Pilih Matkul</option>
                <option value="23">Jaringan Komputer</option>
                <option value="24">Pemrograman Web</option>
                <option value="25">Kecerdasan Buatan</option>
                <option value="26">Rekayasa Perangkat Lunak</option>
                <option value="27">Pengembangan Aplikasi Bergerak</option>
                <option value="28">Teori Bahasa & Automata</option>
            </select>

            <select id="startNode28" name="startNode28">
                <option>Pilih Matkul</option>
                <option value="23">Jaringan Komputer</option>
                <option value="24">Pemrograman Web</option>
                <option value="25">Kecerdasan Buatan</option>
                <option value="26">Rekayasa Perangkat Lunak</option>
                <option value="27">Pengembangan Aplikasi Bergerak</option>
                <option value="28">Teori Bahasa & Automata</option>
            </select><br>


        <!--Semester 6-->
            <label for="startNode37">Semester 6:</label><br>
            <select id="startNode37" name="startNode37">
                <option>Pilih Matkul</option>
                <option value="48">Metode Penelitian</option>
                <option value="49">Magang</option>
                <option value="50">Proyek Perangkat Lunak</option>
            </select>

        <!--Semester 6-->
            <select id="startNode38" name="startNode38">
                <option>Pilih Matkul</option>
                <option value="48">Metode Penelitian</option>
                <option value="49">Magang</option>
                <option value="50">Proyek Perangkat Lunak</option>
            </select>

        <!--Semester 6-->
            <select id="startNode39" name="startNode39">
                <option>Pilih Matkul</option>
                <option value="48">Metode Penelitian</option>
                <option value="49">Magang</option>
                <option value="50">Proyek Perangkat Lunak</option>
            </select><br>

        <!--Wajib Minat Semester 6-->
            <label for="startNode40">Wajib Minat Semester 6:</label><br>
            <select id="startNode40" name="startNode40">
                <option>Pilih Matkul</option>
                <option value="51">Expert System</option>
                <option value="52">Teknik Multimedia</option>
                <option value="53">Manajemen Jaringan</option>
                <option value="54">Jaminan Mutu Perangkat Lunak</option>
            </select><br>


        <!--Pilihan1 Semester 6-->
            <label for="startNode41">Pilihan Semester 6:</label><br>
            <select id="startNode41" name="startNode41">
            <option>Pilih Matkul</option>
                <option value="55">Manajemen Proyek</option>
                <option value="56">Proyek Perangkat Lunak</option>
                <option value="57">Pengujian Perangkat Lunak</option>
                <option value="58">Business Intelligence</option>
                <option value="59">Kapita Selekta Ilmu Komputer</option>
                <option value="60">Komputasi Cloud</option>
                <option value="61">Keamanan Jaringan Komputer</option>
                <option value="62">Cyber Security</option>
                <option value="63">Sistem Pendukung Keputusan</option>
                <option value="64">Software Process</option>
                <option value="65">Pengamanan Data Multimedia</option>
                <option value="66">Natural Language Processing</option>
            </select>

        <!--Pilihan2 Semester 6-->
            <select id="startNode41" name="startNode42">
            <option>Pilih Matkul</option>
                <option value="55">Manajemen Proyek</option>
                <option value="56">Proyek Perangkat Lunak</option>
                <option value="57">Pengujian Perangkat Lunak</option>
                <option value="58">Business Intelligence</option>
                <option value="59">Kapita Selekta Ilmu Komputer</option>
                <option value="60">Komputasi Cloud</option>
                <option value="61">Keamanan Jaringan Komputer</option>
                <option value="62">Cyber Security</option>
                <option value="63">Sistem Pendukung Keputusan</option>
                <option value="64">Software Process</option>
                <option value="65">Pengamanan Data Multimedia</option>
                <option value="66">Natural Language Processing</option>
            </select>

            <!--Pilihan1 Semester 6-->
            <select id="startNode43" name="startNode43">
                <option>Pilih Matkul</option>
                <option value="55">Manajemen Proyek</option>
                <option value="56">Proyek Perangkat Lunak</option>
                <option value="57">Pengujian Perangkat Lunak</option>
                <option value="58">Business Intelligence</option>
                <option value="59">Kapita Selekta Ilmu Komputer</option>
                <option value="60">Komputasi Cloud</option>
                <option value="61">Keamanan Jaringan Komputer</option>
                <option value="62">Cyber Security</option>
                <option value="63">Sistem Pendukung Keputusan</option>
                <option value="64">Software Process</option>
                <option value="65">Pengamanan Data Multimedia</option>
                <option value="66">Natural Language Processing</option>
            </select><br>

            <!--Semester 8-->
            <label for="startNode48">Semester 8:</label><br>
            <select id="startNode48" name="startNode48">
                <option>Pilih Matkul</option>
                <option value="80">Skripsi/KM</option>
            </select><br>
                </div>
            </div>
        </div>

<input type="submit" value="Check">

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