<!DOCTYPE html>
<html>
<head>
    <title>DFS Web App</title>
</head>
<body>
    <h2>DFS Web App</h2>

    <?php
    // Menghubungkan ke database
    $host = 'localhost';
    $dbname = 'dfs_example';
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Gagal terhubung ke database: " . $e->getMessage();
        die();
    }

    // Memproses form start node yang dikirimkan
    if (isset($_POST['start_node'])) {
        $startNodeID = $_POST['start_node'];

        // Mengambil data start node dari database
        $startNode = $conn->prepare("SELECT * FROM nodes WHERE id = :id");
        $startNode->bindParam(':id', $startNodeID);
        $startNode->execute();
        $startNodeData = $startNode->fetch();

        // Menjalankan algoritma DFS
        $visited = array();
        $stack = array($startNodeData);

        echo "<h3>Hasil DFS:</h3>";

        while (!empty($stack)) {
            $node = array_pop($stack);
            if (!in_array($node, $visited)) {
                echo $node['nama'] . " ";
                $visited[] = $node;

                // Mengambil tetangga node dari database
                $neighbors = $conn->prepare("SELECT * FROM nodes WHERE id IN (SELECT neighbor_id FROM edges WHERE node_id = :id)");
                $neighbors->bindParam(':id', $node['id']);
                $neighbors->execute();
                $neighborsData = $neighbors->fetchAll();

                // Menambahkan tetangga yang belum dikunjungi ke dalam stack
                foreach ($neighborsData as $neighbor) {
                    if (!in_array($neighbor, $visited)) {
                        $stack[] = $neighbor;
                    }
                }
            }
        }
    }

    // Mengambil daftar start node dari database
    $startNodes = $conn->query("SELECT * FROM nodes")->fetchAll();
    ?>

    <form method="post" action="">
        <label for="start_node">Pilih Start Node:</label>
        <select name="start_node" id="start_node">
            <?php foreach ($startNodes as $node): ?>
                <option value="<?php echo $node['id']; ?>"><?php echo $node['nama']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Jalankan DFS</button>
    </form>

</body>
</html>
