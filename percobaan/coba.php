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
        'Matkul D' => array('Matkul B', 'Matkul C'),
        'Matkul E' => array('Matkul D')
    );

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $selectedMatkuls = $_POST['matkuls'];

        if (count($selectedMatkuls) == 3) {
            // Fungsi DFS untuk mengecek ketersambungan
            function dfs($matkul, $prasyarat, &$visited) {
                $visited[$matkul] = true;

                foreach ($prasyarat[$matkul] as $p) {
                    if (!isset($visited[$p])) {
                        dfs($p, $prasyarat, $visited);
                    }
                }
            }

            // Menyimpan hasil pengecekan prasyarat
            $hasilCekPrasyarat = array();

            // Cek prasyarat untuk setiap mata kuliah yang dipilih
            foreach ($selectedMatkuls as $matkul) {
                $visited = array();

                dfs($matkul, $prasyarat, $visited);

                $hasilCekPrasyarat[$matkul] = count($visited) === count(array_keys($prasyarat));
            }

            // Menampilkan hasil pengecekan prasyarat
            echo "<h2>Hasil Pengecekan Prasyarat</h2>";
            echo "<ul>";
            foreach ($hasilCekPrasyarat as $matkul => $hasil) {
                if ($hasil) {
                    echo "<li>Anda tidak dapat mengambil mata kuliah $matkul karena belum memenuhi prasyarat.</li>";
                } else {
                    echo "<li>Anda dapat mengambil mata kuliah $matkul.</li>";
                }
            }
            echo "</ul>";
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
            $matakuliah = array('Matkul A', 'Matkul B', 'Matkul C', 'Matkul D', 'Matkul E');
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
