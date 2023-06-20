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
        'Skripsi' => array(),
    );

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $selectedMatkuls = $_POST['matkuls'];

        if (count($selectedMatkuls) === 49) {
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
            echo "<h2>Pilih semua mata kuliah.</h2>";
        }
    }
    ?>

    <h2>Pilihan Mata Kuliah</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="matkul1">Mata Kuliah 1:</label>
        <select name="matkuls[]" id="matkul1">
            <?php
            $matakuliah = array('Agama', 'Konsep Pemrograman', 'Sistem Digital', 'Kalkulus I', 'Fisika','Bahasa Inggris','Statistika & Probabilitas',
                                'Bahasa Indonesia','Kalkulus II','Matematika Diskrit I','Aljabar Linier','Struktur Data & Algoritma','Organisasi Sistem Komputer',
                                'Pendidikan Kewarganegaraan','Bahasa Inggris II','Matematika Diskrit II','Pemrograman Berorientasi Objek','Basis Data','Sistem Operasi',
                                'Kewarganegaraan','Metode Numerik','Desain & Analisis Algoritma','Jaringan Komputer', 'Pemrograman Web', 'Kecerdasan Buatan', 'Rekayasa Perangkat Lunak',
                                'Pengembangan Aplikasi Bergerak', 'Teori Bahasa & Automata','Data Mining','Interaksi Manusia & Komputer', 'Sistem Terdistribusi', 'Pengolahan Citra Digital',
                                'Machine Learning', 'Pengolahan Sinyal Digital','Manajemen Jaringan','Basis Data Lanjut','Logika Samar','Riset Operasi','Komputasi Grid','Kriptografi','Wireless & Mobile Computing',
                                'Biometric','Teori Game','Manajemen Sistem Informasi','Metode Formal','Model-Based Programming','Robotika','Metode Penelitian','Magang','Proyek Perangkat Lunak','Expert System',
                                'Teknik Multimedia','Manajemen Jaringan','Jaminan Mutu Perangkat Lunak','Manajemen Proyek','Proyek Perangkat Lunak','Pengujian Perangkat Lunak','Business Intelligence','Kapita Selekta Ilmu Komputer',
                                'Komputasi Cloud','Keamanan Jaringan Komputer','Cyber Security','Sistem Pendukung Keputusan','Software Process','Pengamanan Data Multimedia','Natural Language Processing','Etika Profesi','KKN','Kewirausahaan',
                                'Kecerdasan Komputasional', 'Computer Vision','Teknologi IoT','Semantic Web','E-commerce','Simulasi & Pemodelan','Forensik Digital','Komputasi Biomedik','Enterprice Architecture','Web Mining dan Information Retrieval',
                                'Skripsi');
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 2:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul3">Mata Kuliah 3:</label>
        <select name="matkuls[]" id="matkul3">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul4">Mata Kuliah 4:</label>
        <select name="matkuls[]" id="matkul4">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul5">Mata Kuliah 5:</label>
        <select name="matkuls[]" id="matkul5">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul6">Mata Kuliah 6:</label>
        <select name="matkuls[]" id="matkul6">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul7">Mata Kuliah 7:</label>
        <select name="matkuls[]" id="matkul7">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul8">Mata Kuliah 8:</label>
        <select name="matkuls[]" id="matkul8">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul9">Mata Kuliah 9:</label>
        <select name="matkuls[]" id="matkul9">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul10">Mata Kuliah 10:</label>
        <select name="matkuls[]" id="matkul10">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul11">Mata Kuliah 11:</label>
        <select name="matkuls[]" id="matkul11">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul12">Mata Kuliah 12:</label>
        <select name="matkuls[]" id="matkul12">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul13">Mata Kuliah 13:</label>
        <select name="matkuls[]" id="matkul3">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul14">Mata Kuliah 14:</label>
        <select name="matkuls[]" id="matkul14">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul15">Mata Kuliah 15:</label>
        <select name="matkuls[]" id="matkul15">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul16">Mata Kuliah 16:</label>
        <select name="matkuls[]" id="matkul16">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul17">Mata Kuliah 17:</label>
        <select name="matkuls[]" id="matkul17">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul18">Mata Kuliah 18:</label>
        <select name="matkuls[]" id="matkul18">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul19">Mata Kuliah 19:</label>
        <select name="matkuls[]" id="matkul19">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul20">Mata Kuliah 20:</label>
        <select name="matkuls[]" id="matkul20">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 21:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 22:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 23:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 24:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 25:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 26:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 27:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 28:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 29:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 30:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 31:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 32:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 33:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 34:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 35:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 36:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 37:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 38:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 39:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 40:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 41:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 42:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 43:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 44:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 45:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 46:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 47:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 48:</label>
        <select name="matkuls[]" id="matkul2">
            <?php
            foreach ($matakuliah as $matkul) {
                echo '<option value="' . $matkul . '">' . $matkul . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="matkul2">Mata Kuliah 49:</label>
        <select name="matkuls[]" id="matkul2">
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
