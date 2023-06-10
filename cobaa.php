<!DOCTYPE html>
<html>
<head>
    <title>Cek Pilihan Mata Kuliah</title>
</head>
<body>
    <?php
    // Definisikan prasyarat untuk setiap mata kuliah
    $prasyarat = array(
        'Matkul A' => array(),
        'Matkul B' => array('Matkul A'),
        'Matkul C' => array('Matkul A'),
        'Matkul D' => array('Matkul B', 'Matkul C')
    );

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $selectedMatkuls = $_POST['matkuls'];

        // Fungsi DFS untuk mengecek ketersambungan
        function dfs($matkul, $prasyarat, &$visited, &$stack) {
            $visited[$matkul] = true;
            
            foreach ($prasyarat[$matkul] as $p) {
                if (!isset($visited[$p])) {
                    dfs($p, $prasyarat, $visited, $stack);
                }
            }
            
            array_push($stack, $matkul);
        }

        // Menyimpan hasil pengecekan prasyarat untuk setiap mata kuliah
        $hasilCekPrasyarat = array();

        // Cek prasyarat untuk setiap mata kuliah yang dipilih
        foreach ($selectedMatkuls as $matkul) {
            $visited = array();
            $stack = array();
            
            dfs($matkul, $prasyarat, $visited, $stack);
            
            $hasilCekPrasyarat[$matkul] = count($stack) === count($prasyarat) + 1;
        }

        // Menampilkan hasil pengecekan prasyarat
        echo "<h2>Hasil Pengecekan Prasyarat</h2>";
        echo "<ul>";
        foreach ($hasilCekPrasyarat as $matkul => $hasil) {
            if ($hasil) {
                echo "<li>Anda dapat mengambil mata kuliah $matkul.</li>";
            } else {
                echo "<li>Anda tidak dapat mengambil mata kuliah $matkul karena belum memenuhi prasyarat.</li>";
            }
        }
        echo "</ul>";
    }
    ?>

    <h2>Pilihan Mata Kuliah</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="matkuls">Pilih Mata Kuliah:</label><br>
        <?php
        $matakuliah = array('Matkul A', 'Matkul B', 'Matkul C', 'Matkul D');
        foreach ($matakuliah as $matkul) {
            echo '<input type="checkbox" name="matkuls[]" value="' . $matkul . '"> ' . $matkul . '<br>';
        }
        ?>
        <br>
        <input type="submit" value="Cek Prasyarat">
    </form>
</body>
</html>
