<!DOCTYPE html>
<html>
<head>
    <title>Cek Pilihan Mata Kuliah</title>

    <style>
    .button {
        background-color: blue;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
    }

    h2, p{
        text-align: center;
    }

    div{
        text-align: center;
        margin-top: -20px;
    }
    ul{
        display: inline-block;
        text-align: left;
    }

    </style>
</head>
<body>
    <header>
        <center>
        <figure>
        <img src="img/logoUNS.png" alt="logo" style="width:10%">
        </figure>
        <h1>Penyusunan Rencana Studi Prodi Informatika UNS</h1>
        </center>
    </header>

    <?php
    // Definisikan prasyarat untuk setiap mata kuliah
    $prasyarat = array(
        //SEMESTER 1
        'Agama' => array(),
        'Konsep Pemrograman' => array(),
        'Sistem Digital' => array(),
        'Kalkulus I' => array(),
        'Fisika' => array(),
        'Bahasa Inggris' => array(),
        'Statistika & Probabilitas' => array(),
        'Bahasa Indonesia' => array(),

        //SEMESTER 2
        'Kalkulus II' => array('Kalkulus I'),
        'Matematika Diskrit I' => array(),
        'Aljabar Linier' => array(),
        'Struktur Data & Algoritma' => array('Konsep Pemrograman'),
        'Organisasi Sistem Komputer' => array('Sistem Digital'),
        'Pendidikan Kewarganegaraan' => array(),
        'Bahasa Inggris II' => array(),

        //SEMESTER 3
        'Matematika Diskrit II' => array('Matematika Diskrit I'),
        'Pemrograman Berorientasi Objek' => array('Struktur Data & Algoritma'),
        'Basis Data' => array(),
        'Sistem Operasi' => array('Organisasi Sistem Komputer'),
        'Kewarganegaraan' => array(),
        'Metode Numerik' => array('Kalkulus II', 'Aljabar Linier'),
        'Desain & Analisis Algoritma' => array('Struktur Data & Algoritma'),
        //SEMESTER 4
        'Jaringan Komputer' => array('Sistem Operasi'),
        'Pemrograman Web' => array('Pemrograman Berorientasi Objek', 'Basis Data'),
        'Kecerdasan Buatan' => array('Statistika & Probabilitas', 'Struktur Data & Algoritma'),
        'Rekayasa Perangkat Lunak' => array('Pemrograman Berorientasi Objek'),
        'Pengembangan Aplikasi Bergerak' => array('Pemrograman Berorientasi Objek'),
        'Teori Bahasa & Automata' => array('Matematika Diskrit II'),

        //SEMESTER 5
        'Data Mining' => array('Kecerdasan Buatan'),  
        'Interaksi Manusia & Komputer' => array('Pemrograman Web'),  
        'Sistem Terdistribusi' => array('Jaringan Komputer'),
        'Pengolahan Citra Digital' => array('Statistika & Probabilitas', 'Aljabar Linier'), 

        //WAJIB MINAT SEMESTER 5
        'Machine Learning' => array('Kecerdasan Buatan'),
        'Pengolahan Sinyal Digital' => array('Kalkulus II','Aljabar Linier'),
        'Manajemen Jaringan' => array('Jaringan Komputer'),
        'Basis Data Lanjut' => array('Basis Data'),

        //PILIHAN SEMESTER 5
        'Logika Samar' => array('Kalkulus II', 'Metematika Diskrit I'),
        'Riset Operasi' => array('Aljabar Linier'),
        'Komputasi Grid' => array('Jaringan Komputer'),
        'Kriptografi' => array('Aljabar Linier'),
        'Wireless & Mobile Computing' => array('Jaringan Komputer', 'Pemrograman Berorientasi Objek'),
        'Biometric' => array('Pengolahan Citra Digital'),
        'Teori Game' => array('Struktur Data & Algoritma'),
        'Manajemen Sistem Informasi' => array('Rekayasa Perangkat Lunak'),
        'Metode Formal' => array('Kalkulus II', 'Metematika Diskrit I'),
        'Model-Based Programming' => array('Pemrograman Berorientasi Objek'),
        'Robotika' => array('Organisasi Sistem Komputer','Kecerdasan Buatan'),

        //SEMESTER 6
        'Metode Penelitian' => array(),
        'Magang' => array(),

        //WAJIB MINAT SEMESTER 6
        'Expert System' => array('Kecerdasan Buatan'),
        'Teknik Multimedia' => array('Pengolahan Citra Digital'),
        'Jaminan Mutu Perangkat Lunak' => array('Rekayasa Perangkat Lunak'),

        //PILIHAN SEMESTER 6
        'Manajemen Proyek' => array('Rekayasa Perangkat Lunak'),
        'Proyek Perangkat Lunak' => array('Rekayasa Perangkat Lunak'),
        'Pengujian Perangkat Lunak' => array('Rekayasa Perangkat Lunak'),
        'Business Intelligence' => array('Rekayasa Perangkat Lunak', 'Data Mining'),
        'Kapita Selekta Ilmu Komputer' => array(),
        'Komputasi Cloud' => array('Jaringan Komputer', 'Sistem Terdistribusi'),
        'Keamanan Jaringan Komputer' => array('Jaringan Komputer'),
        'Cyber Security' => array('Jaringan Komputer'),
        'Sistem Pendukung Keputusan' => array('Kecerdasan Buatan', 'Data Mining'),
        'Software Process' => array('Rekayasa Perangkat Lunak'),
        'Pengamanan Data Multimedia' => array('Pengolahan Citra Digital'),
        'Natural Language Processing' => array('Teori Bahasa & Automata'),

        //SEMESTER 7
        'Etika Profesi' => array(),
        'KKN' => array(),
        'Kewirausahaan' => array(),

        //WAJIB MINAT SEMESTER 7
        'Kecerdasan Komputasional' => array('Kecerdasan Buatan'),
        'Computer Vision' => array('Pengolahan Citra Digital'),
        'Teknologi IoT' => array('Jaringan Komputer'),
        'Semantic Web' => array('Kecerdasan Buatan'),


        //PILIHAN SEMESTER 7
        'E-commerce' => array('Rekayasa Perangkat Lunak', 'Pemrograman Web','Pengembangan Aplikasi Bergerak' ),
        'Simulasi & Pemodelan' => array('Statistika & Probabilitas'),
        'Forensik Digital' => array('Jaringan Komputer'),
        'Komputasi Biomedik' => array('Pengolahan Citra Digital', 'Kecerdasan Buatan'),
        'Enterprice Architecture' => array('Rekayasa Perangkat Lunak'),
        'Web Mining dan Information Retrieval' => array('Pemrograman Web', 'Data Mining', 'Kecerdasan Buatan'),

        //SEMESTER 8
        'Skripsi' => array()
    );

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $selectedMatkuls = $_POST['matkuls'];

        if (count($selectedMatkuls) == 49) {
            // Mengecek ketersambungan dan prasyarat menggunakan algoritma DFS
            function dfs($matkul, $selectedMatkuls, $prasyarat, &$visited) {
                $visited[$matkul] = true;

                foreach ($prasyarat[$matkul] as $prereq) {
                    if (!isset($visited[$prereq]) && in_array($prereq, $selectedMatkuls)) {
                        dfs($prereq, $selectedMatkuls, $prasyarat, $visited);
                    }
                }
            }

            $visited = array();

            // Mengecek ketersambungan dan prasyarat untuk setiap mata kuliah yang dipilih
            foreach ($selectedMatkuls as $matkul) {
                dfs($matkul, $selectedMatkuls, $prasyarat, $visited);
            }

            // Menyimpan informasi prasyarat yang belum dipenuhi
            $prasyaratTerlewat = array();
            foreach ($selectedMatkuls as $matkul) {
                foreach ($prasyarat[$matkul] as $prereq) {
                    if (!isset($visited[$prereq]) && !in_array($prereq, $prasyaratTerlewat)) {
                        $prasyaratTerlewat[] = $prereq;
                    }
                }
            }

            // Menampilkan pesan sesuai dengan hasil pengecekan prasyarat
            if (empty($prasyaratTerlewat)) {
                echo "<h2>Rencana studi baik</h2>";
            } else {
                echo "<h2>Rencana studi tidak baik</h2>";
                echo "<p>Anda belum memenuhi prasyarat untuk mata kuliah berikut:</p>";
                echo "<div>";
                echo "<ul>";
                foreach ($prasyaratTerlewat as $prereq) {
                    echo "<li>$prereq</li>";
                }
                echo "</ul>";
                echo "</div>";
            }
        }
    }
    ?>
    <center>
    <h2>Pilihan Mata Kuliah</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <?php
        // Tampilkan 49 select untuk memilih mata kuliah
        for ($i = 1; $i <= 49; $i++) {
            echo "<label for='matkul$i'>Mata Kuliah $i:</label>";
            echo "<select name='matkuls[]' id='matkul$i'>";
            foreach ($prasyarat as $matkul => $prereq) {
                echo "<option value='$matkul'>$matkul</option>";
            }
            echo "</select><br><br>";
        }
        ?>
        <input class="button" type="submit" value="Cek Prasyarat">
    </form>
    </center>
</body>
</html>
