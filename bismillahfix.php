<!DOCTYPE html>
<html>
<head>
    <title>Penyusunan Rencana Studi</title>
    <style>
        * {
            text-decoration: none;
            margin: 0px;
            padding: 0px;
            }

        html, body {
            max-width: 100%;
            overflow-x: hidden;
        }
        body {
            font-family: sans-serif;
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
       
    </style>
</head>
<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <div class="d-flex justify-content-center mt-3">
    <header class="w-auto">
        <center>
        <figure>
        <img src="img/logoUNS.png" alt="logo" style="width:20%">
        </figure>
        <h2 class="fw-bold my-1 form mb-5 text-center">Penyusunan Rencana Studi Prodi Informatika UNS</h2>
        </center>
    </header>
    </div>

    <?php
    // Definisikan prasyarat untuk setiap mata kuliah
    $prasyarat = array(
        'Pilih Matkuls' => array(),  
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
        'Pendidikan Kewarganegaraan' => array(''),
        'Bahasa Inggris II' => array(''),

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
        'Proyek Perangkat Lunak' => array(),

        //WAJIB MINAT SEMESTER 6
        'Expert System' => array('Kecerdasan Buatan'),
        'Teknik Multimedia' => array('Pengolahan Citra Digital'),
        'Manajemen Jaringan' => array('Jaringan Komputer'),
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
        'Skripsi/KM' => array(),
    );

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $selectedMatkuls = $_POST['matkuls'];

        if (count($selectedMatkuls)) {
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
                echo "<ul>";
                foreach ($prasyaratTerlewat as $prereq) {
                    echo "<li>$prereq</li>";
                }
                echo "</ul>";
            }
        } else {
            echo "<h2>Pilih 3 mata kuliah.</h2>";
        }
    }
    ?>

    <div class="container">
    <h2>Pilihan Mata Kuliah</h2><br>
    <div class="row">
        <div class="col-6">
        <h3>Semester 1</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="matkul"></label>
            <select name="matkuls[]" id="matkul1">
                <?php
                $semester1 = array(
                    'Pilih Matkul', 
                    'Agama', 
                    'Konsep Pemrograman', 
                    'Sistem Digital', 
                    'Kalkulus I', 
                    'Fisika',
                    'Bahasa Inggris',
                    'Statistika & Probabilitas',
                    'Bahasa Indonesia');

                foreach ($semester1 as $matkul) {
                    //echo '<option>Pilih Matkul</option>';
                    echo '<option value="' . $matkul . '">' . $matkul . '</option>';
                }
                ?>
            </select>
            <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester1 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester1 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester1 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester1 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester1 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester1 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester1 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <h3>Semester 3</h3>
        <label for="matkul5"></label>
        <select name="matkuls[]" id="matkul5">
            <?php
            $semester3 = array(
                'Pilih Matkul', 
                'Matematika Diskrit II',   
                'Pemrograman Berorientasi Objek',  
                'Basis Data',
                'Sistem Operasi',  
                'Kewarganegaraan',   
                'Metode Numerik',  
                'Desain & Analisis Algoritma');

            foreach ($semester3 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester3 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>


        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester3 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester3 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>


        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester3 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester3 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>


        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester3 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <h3>Semester 5</h3>
        <label for="matkul5"></label>
        <select name="matkuls[]" id="matkul5">
            <?php
            $semester5 = array(
                'Pilih Matkul', 
                'Data Mining', 
                'Interaksi Manusia & Komputer',
                'Sistem Terdistribusi',
                'Pengolahan Citra Digital');

            foreach ($semester5 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester5 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>


        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester5 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester5 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <p>Wajib Minat Semester 5</p>
        <label for="matkul5"></label>
        <select name="matkuls[]" id="matkul5">
        <?php
            $wajibSemester5 = array(
                'Pilih Matkul', 
                'Machine Learning',
                'Pengolahan Sinyal Digital',
                'Manajemen Jaringanuter',
                'Basis Data Lanjut');

            foreach ($wajibSemester5 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <p>Pilihan Semester 5</p>
        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
        <?php
            $pilihanSemester5 = array(
                'Pilih Matkul', 
                'Logika Samar',
                'Riset Operasi',
                'Komputasi Grid',
                'Kriptografi',
                'Wireless & Mobile Computing',
                'Biometric',
                'Teori Game',
                'Manajemen Sistem Informasi',
                'Metode Formal',
                'Model-Based Programming',
                'Robotika');

            foreach ($pilihanSemester5 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>


        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($pilihanSemester5 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <h3>Semester 7</h3>
        <label for="matkul5"></label>
        <select name="matkuls[]" id="matkul5">
            <?php
            $semester7 = array(
                'Pilih Matkul', 
                'Etika Profesi',
                'KKN',
                'Kewirausahaan');

            foreach ($semester7 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester7 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>


        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester7 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <p>Wajib Minat Semester 7</p>
        <label for="matkul5"></label>
        <select name="matkuls[]" id="matkul5">
        <?php
            $wajibSemester7 = array(
                'Pilih Matkul',
                'Kecerdasan Komputasional',
                'Computer Vision',
                'Teknologi IoT',
                'Semantic Web');

            foreach ($wajibSemester7 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <p>Pilihan Semester 7</p>
        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
        <?php
            $pilihanSemester7 = array(
                'Pilih Matkul', 
                'E-commerce',
                'Simulasi & Pemodelan',
                'Forensik Digital',
                'Komputasi Biomedik',
                'Enterprice Architecture',
                'Web Mining dan Information Retrieval');

            foreach ($pilihanSemester7 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($pilihanSemester7 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        </div>

        <div class="col-6">
        <h3>Semester 2</h3>
        <label for="matkul4"></label>
        <select name="matkuls[]" id="matkul4">
            <?php
            $semester2 = array(
                'Pilih Matkul', 
                'Kalkulus II',
                'Matematika Diskrit I',
                'Aljabar Linier',
                'Struktur Data & Algoritma',
                'Organisasi Sistem Komputer',
                'Pendidikan Kewarganegaraan',
                'Bahasa Inggris II');

            foreach ($semester2 as $matkul) {
            echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester2 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>


        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester2 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester2 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>


        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester2 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester2 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>


        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester2 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>


        <h3>Semester 4</h3>
        <label for="matkul5"></label>
        <select name="matkuls[]" id="matkul5">
            <?php
            $semester4 = array(
                'Pilih Matkul', 
                'Jaringan Komputer',
                'Pemrograman Web',
                'Kecerdasan Buatan',
                'Rekayasa Perangkat Lunak',
                'Pengembangan Aplikasi Bergerak',
                'Teori Bahasa & Automata');

            foreach ($semester4 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester4 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>


        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester4 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester4 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>


        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester4 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester4 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>


        <h3>Semester 6</h3>
        <label for="matkul5"></label>
        <select name="matkuls[]" id="matkul5">
            <?php
            $semester6 = array(
                'Pilih Matkul', 
                'Metode Penelitian',
                'Magang',
                'Proyek Perangkat Lunak');

            foreach ($semester6 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester6 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>


        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($semester6 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <p>Wajib Minat Semester 6</p>
        <label for="matkul5"></label>
        <select name="matkuls[]" id="matkul5">
        <?php
            $wajibSemester6 = array(
                'Pilih Matkul',
                'Expert System',
                'Teknik Multimedia',
                'Manajemen Jaringan',
                'Jaminan Mutu Perangkat Lunak');

            foreach ($wajibSemester6 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <p>Pilihan Semester 6</p>
        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
        <?php
            $pilihanSemester6 = array(
                'Pilih Matkul', 
                'Manajemen Proyek',
                'Proyek Perangkat Lunak',
                'Pengujian Perangkat Lunak',
                'Business Intelligence',
                'Kapita Selekta Ilmu Komputer',
                'Komputasi Cloud',
                'Keamanan Jaringan Komputer',
                'Cyber Security',
                'Sistem Pendukung Keputusan',
                'Software Process',
                'Pengamanan Data Multimedia',
                'Natural Language Processing');

            foreach ($pilihanSemester6 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($pilihanSemester6 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($pilihanSemester6 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <h3>Semester 8</h3>
        <label for="matkul5"></label>
        <select name="matkuls[]" id="matkul5">
            <?php
            $semester8 = array(
                'Pilih Matkul', 
                'Skripsi/KM');

            foreach ($semester8 as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        </div>
    </div>
        <input type="submit" value="Cek Prasyarat">
    </div>


    </form>
</body>
</html>
