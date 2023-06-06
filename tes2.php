<?php
// Langkah 1: Buat database dan tabel
// Jalankan query berikut di MySQL untuk membuat database dan tabel:

// CREATE DATABASE dfs_example;
// USE dfs_example;

// CREATE TABLE nodes (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     node_label VARCHAR(10)
// );

// CREATE TABLE edges (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     from_node INT,
//     to_node INT
// );

// Langkah 2: Koneksi ke Database
$conn = mysqli_connect("localhost", "root", "", "nodeangka");

// Langkah 3: Memasukkan Data
mysqli_query($conn, "INSERT INTO nodes (node_label) VALUES ('A')");
mysqli_query($conn, "INSERT INTO nodes (node_label) VALUES ('B')");
mysqli_query($conn, "INSERT INTO nodes (node_label) VALUES ('C')");
mysqli_query($conn, "INSERT INTO nodes (node_label) VALUES ('D')");
mysqli_query($conn, "INSERT INTO nodes (node_label) VALUES ('E')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('A', 'B')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('A', 'C')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('B', 'D')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('C', 'D')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('D', 'E')");

// Langkah 4: Mengambil Data
$result = mysqli_query($conn, "SELECT * FROM nodes");

// Langkah 5: Implementasi Algoritma DFS
function dfs($conn, $startNode, $targetNode, $visited, $path) {
    global $found;
    $visited[$startNode] = true; // Set status node menjadi dikunjungi
    $path[] = $startNode; // Tambahkan node ke jalur yang sedang dibangun

    if ($startNode == $targetNode) {
        $found = true;
        echo "Jalur ditemukan: " . implode(' -> ', $path) . "<br>";
        return;
    }

    $neighborsQuery = mysqli_query($conn, "SELECT to_node FROM edges WHERE from_node = '$startNode'");
    while ($row = mysqli_fetch_assoc($neighborsQuery)) {
        $neighbor = $row['to_node'];
        if (!isset($visited[$neighbor])) {
            dfs($conn, $neighbor, $targetNode, $visited, $path); // Panggil rekursif DFS pada tetangga yang belum dikunjungi
        }
    }
}

// Panggil DFS untuk mencari jalur dari node A ke node E
$startNode = 'A';
$targetNode = 'E';
$visited = array();
$path = array();
$found = false;

dfs($conn, $startNode, $targetNode, $visited, $path);

if (!$found) {
    echo "Tidak ditemukan jalur dari $startNode";
}