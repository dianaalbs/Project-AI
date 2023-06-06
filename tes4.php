<!DOCTYPE html>
<html>
<head>
    <title>DFS dengan MySQLi dan Form Pilihan</title>
</head>
<body>
    <h1>DFS dengan MySQLi dan Form Pilihan</h1>

    <form method="post" action="">
        <label for="start_node">Pilih Start Node:</label>
        <select name="start_node" id="start_node">
            <?php
            // Membuat koneksi ke database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "study_plan";

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            //SEMESTER 1
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Agama')");
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Konsep Pemrograman')");
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Sistem Digital')");
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Kalkulus I')");
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Fisika')");
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Bahasa Inggris')");
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Statistika & Probabilitas')");
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Bahasa Indonesia')");

//SEMESTER 2
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Kalkulus II')");
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Metematika Diskrit I')");
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Aljabar Linier')");
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Struktur Data & Algoritma')");
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Organisasi Sistem Komputer')");
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Pendidikan Kewarganegaraan')");
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Bahasa Inggris II')");


//SEMESTER 3
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Matematika Diskrit II')");
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Pemrograman Berorientasi Objek')");
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Basis Data')");
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Sistem Operasi')");
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Kewarganegaraan')");
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Metode Numerik')");
mysqli_query($conn, "INSERT INTO nodes (matkul) VALUES ('Desain & Analisis Algoritma')");


mysqli_query($conn, "INSERT INTO edges (node_id, neighbor_id) VALUES ('9', '4')");
mysqli_query($conn, "INSERT INTO edges (node_id, neighbor_id) VALUES ('12', '2')");
mysqli_query($conn, "INSERT INTO edges (node_id, neighbor_id) VALUES ('11', '7')");
mysqli_query($conn, "INSERT INTO edges (node_id, neighbor_id) VALUES ('13', '3')");
mysqli_query($conn, "INSERT INTO edges (node_id, neighbor_id) VALUES ('22', '12')");
mysqli_query($conn, "INSERT INTO edges (node_id, neighbor_id) VALUES ('19', '13')");
mysqli_query($conn, "INSERT INTO edges (node_id, neighbor_id) VALUES ('17', '12')");
mysqli_query($conn, "INSERT INTO edges (node_id, neighbor_id) VALUES ('16 ', '10')");

            // Memeriksa koneksi
            if (!$conn) {
                die("Koneksi gagal: " . mysqli_connect_error());
            }

            // Mendapatkan daftar start node dari database
            $result = mysqli_query($conn, "SELECT * FROM nodes");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id'] . "'>" . $row['matkul'] . "</option>";
            }

            // Menutup koneksi
            mysqli_close($conn);
            ?>
        </select>
        <br>
        <input type="submit" value="Jalankan DFS">
    </form>

    <?php
    // Cek apakah form telah disubmit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Mengambil start node dari form
        $startNodeID = $_POST['start_node'];

        // Membuat koneksi ke database
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Memeriksa koneksi
        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        // Fungsi DFS
        function dfs($conn, $startNodeID)
        {
            $visited = array();
            $stack = array($startNodeID);

            while (!empty($stack)) {
                $nodeID = array_pop($stack);
                if (!in_array($nodeID, $visited)) {
                    // Mengambil data node dari database
                    $result = mysqli_query($conn, "SELECT * FROM nodes WHERE id = $nodeID");
                    $node = mysqli_fetch_assoc($result);
                    echo $node['matkul'] . " ";
                    $visited[] = $nodeID;

                    // Mengambil tetangga node dari database
                    $result = mysqli_query($conn, "SELECT * FROM nodes WHERE id IN (SELECT neighbor_id FROM edges WHERE node_id = $nodeID)");
                    while ($row = mysqli_fetch_assoc($result)) {
                        $neighborID = $row['id'];
                        if (!in_array($neighborID, $visited)) {
                            $stack[] = $neighborID;
                        }
                    }
                }
            }
        }

        // Menjalankan DFS
        dfs($conn, $startNodeID);

        // Menutup koneksi
        mysqli_close($conn);
    }
    ?>

</body>
</html>
