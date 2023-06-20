<!DOCTYPE html>
<html>
<head>
    <title>Cek Pilihan Mata Kuliah</title>
</head>
<body>
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
        'Proyek Perangkat Lunak' => array('Rekayasa Perangkat Lunak'),
        //SEMESTER 7
        'Etika Profesi' => array(),
        'KKN' => array(),
        'Kewirausahaan' => array(),
         //SEMESTER 8
         'Skripsi' => array()
    );

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $selectedMatkuls = $_POST['matkuls'];

        if (count($selectedMatkuls) == 54) {
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

    <h2>Pilihan Mata Kuliah</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="matkul1"></label>
        <select name="matkuls[]" id="matkul1">
            <?php
            $matakuliah = array(
                'Agama', 
                'Konsep Pemrograman', 
                'Sistem Digital', 
                'Kalkulus I', 
                'Fisika',
                'Bahasa Inggris',
                'Statistika & Probabilitas',
                'Bahasa Indonesia',

                'Kalkulus II',
                'Matematika Diskrit I',
                'Aljabar Linier',
                'Struktur Data & Algoritma',
                'Organisasi Sistem Komputer',
                'Pendidikan Kewarganegaraan',
                'Bahasa Inggris II',

                'Matematika Diskrit II',
                'Pemrograman Berorientasi Objek',
                'Basis Data',
                'Sistem Operasi',
                'Kewarganegaraan',
                'Metode Numerik',
                'Desain & Analisis Algoritma',

                'Jaringan Komputer',
                'Pemrograman Web',
                'Kecerdasan Buatan',
                'Rekayasa Perangkat Lunak',
                'Pengembangan Aplikasi Bergerak',
                'Teori Bahasa & Automata',

                'Data Mining', 
                'Interaksi Manusia & Komputer',
                'Sistem Terdistribusi',
                'Pengolahan Citra Digital',

                'Machine Learning',
                'Pengolahan Sinyal Digital',
                'Manajemen Jaringanuter',
                'Basis Data Lanjut',

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
                'Robotika',

                'Metode Penelitian',
                'Magang',
                'Proyek Perangkat Lunak',
            
                'Etika Profesi',
                'KKN',
                'Kewirausahaan',

                'Skripsi');
                
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul2"></label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul3"></label>
        <select name="matkuls[]" id="matkul3">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul4"></label>
        <select name="matkuls[]" id="matkul4">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul5"></label>
        <select name="matkuls[]" id="matkul5">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul6"></label>
        <select name="matkuls[]" id="matkul6">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul7"></label>
        <select name="matkuls[]" id="matkul7">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

                <label for="matkul8"></label>
        <select name="matkuls[]" id="matkul8">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <h4>Semester 2</h4>
        <label for="matkul9"></label>
        <select name="matkuls[]" id="matkul9">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

                <label for="matkul10"></label>
        <select name="matkuls[]" id="matkul10">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul11"></label>
        <select name="matkuls[]" id="matkul11">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

                <label for="matkul12"></label>
        <select name="matkuls[]" id="matkul12">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul13"></label>
        <select name="matkuls[]" id="matkul13">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

                <label for="matkul14"></label>
        <select name="matkuls[]" id="matkul14">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul15"></label>
        <select name="matkuls[]" id="matkul15">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>


        <h4>Semester 3</h4>
        <label for="matkul16"></label>
        <select name="matkuls[]" id="matkul16">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul17"></label>
        <select name="matkuls[]" id="matkul17">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

                <label for="matkul18"></label>
        <select name="matkuls[]" id="matkul18">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul19"></label>
        <select name="matkuls[]" id="matkul19">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

                <label for="matkul20"></label>
        <select name="matkuls[]" id="matkul20">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul21"></label>
        <select name="matkuls[]" id="matkul21">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

                <label for="matkul22"></label>
        <select name="matkuls[]" id="matkul22">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>


        <h4>Semester 4</h4>
        <label for="matkul23"></label>
        <select name="matkuls[]" id="matkul23">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

                <label for="matkul24"></label>
        <select name="matkuls[]" id="matkul24">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul25"></label>
        <select name="matkuls[]" id="matkul25">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

                <label for="matkul26"></label>
        <select name="matkuls[]" id="matkul26">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

                <label for="matkul27"></label>
        <select name="matkuls[]" id="matkul27">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul28"></label>
        <select name="matkuls[]" id="matkul28">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <h4>Semester 5</h4>
        <label for="matkul29"></label>
        <select name="matkuls[]" id="matkul29">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul30"></label>
        <select name="matkuls[]" id="matkul30">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul31"></label>
        <select name="matkuls[]" id="matkul31">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

                <label for="matkul32"></label>
        <select name="matkuls[]" id="matkul32">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <h4>Semester 6</h4>
        <label for="matkul33"></label>
        <select name="matkuls[]" id="matkul33">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul34"></label>
        <select name="matkuls[]" id="matkul34">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul35"></label>
        <select name="matkuls[]" id="matkul35">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <h4>Semester 7</h4>
                <label for="matkul36"></label>
        <select name="matkuls[]" id="matkul36">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

                <label for="matkul37"></label>
        <select name="matkuls[]" id="matkul37">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="matkul38"></label>
        <select name="matkuls[]" id="matkul38">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>

        <h4>Semester 8</h4>
        <label for="matkul39"></label>
        <select name="matkuls[]" id="matkul39">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>












        <input type="submit" value="Cek Prasyarat">
    </form>
</body>
</html>
 