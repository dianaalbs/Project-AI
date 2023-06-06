<?php
// Langkah 1: Buat database dan tabel
// Jalankan query berikut di MySQL untuk membuat database dan tabel:

// CREATE DATABASE dfs_example;
// USE dfs_example;

// CREATE TABLE nodes (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     nama VARCHAR(50)
// );

// CREATE TABLE edges (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     from_node VARCHAR(50),
//     to_node VARCHAR(50)
// );

// Langkah 2: Koneksi ke Database
$conn = mysqli_connect("localhost", "root", "", "dfs_example");

// Langkah 3: Memasukkan Data
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Node A')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Node B')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Node C')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Node D')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node A', 'Node B')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node B', 'Node C')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node C', 'Node D')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node D', 'Node A')");


//SEMESTER 1
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Node A')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Node B')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Node C')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Node D')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node A', 'Node B')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node B', 'Node C')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node C', 'Node D')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node D', 'Node A')");

//SEMESTER 2
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Node A')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Node B')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Node C')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Node D')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node A', 'Node B')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node B', 'Node C')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node C', 'Node D')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node D', 'Node A')");

//SEMESTER 3
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Node A')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Node B')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Node C')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Node D')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node A', 'Node B')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node B', 'Node C')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node C', 'Node D')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node D', 'Node A')");


//SEMESTER 4
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Node A')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Node B')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Node C')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Node D')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node A', 'Node B')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node B', 'Node C')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node C', 'Node D')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node D', 'Node A')");

// Langkah 4: Mengambil Data
$result = mysqli_query($conn, "SELECT * FROM nodes");

// Langkah 5: Implementasi Algoritma DFS
$visited = array(); // Array untuk menyimpan status node yang telah dikunjungi

function dfs($conn, $node) {
    global $visited;
    $visited[$node] = true; // Set status node menjadi dikunjungi

    echo $node . " "; // Lakukan operasi pada node (misalnya, mencetaknya)

    $neighborsQuery = mysqli_query($conn, "SELECT to_node FROM edges WHERE from_node = '$node'");
    while ($row = mysqli_fetch_assoc($neighborsQuery)) {
        $neighbor = $row['to_node'];
        if (!isset($visited[$neighbor])) {
            dfs($conn, $neighbor); // Panggil rekursif DFS pada tetangga yang belum dikunjungi
        }
    }
}

// Panggil DFS pada node awal
while ($row = mysqli_fetch_assoc($result)) {
    $node = $row['nama'];
    if (!isset($visited[$node])) {
        dfs($conn, $node);
    }
}

// Tutup koneksi
mysqli_close($conn);
?>