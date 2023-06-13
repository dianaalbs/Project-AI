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
        //SEMESTER 5
        //SEMESTER 6
        //SEMESTER 7
        //SEMESTER 8
    );

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $selectedMatkuls = $_POST['matkuls'];

        if (count($selectedMatkuls) == 3) {
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
        <label for="matkul1">Mata Kuliah 1:</label>
        <select name="matkuls[]" id="matkul1">
            <?php
            $matakuliah = array('Agama', 'Konsep Pemrograman', 'Sistem Digital', 'Kalkulus I', 'Fisika','Bahasa Inggris','Statistika & Probabilitas',
                                'Bahasa Indonesia','Kalkulus II','Metematika Diskrit I','Aljabar Linier','Struktur Data & Algoritma','Organisasi Sistem Komputer',
                                'Pendidikan Kewarganegaraan','Bahasa Inggris II','Matematika Diskrit II','Pemrograman Berorientasi Objek','Basis Data','Sistem Operasi',
                                'Kewarganegaraan','Metode Numerik','Desain & Analisis Algoritma');
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
        <input type="submit" value="Cek Prasyarat">
    </form>
</body>
</html>
