smt 1
1 0953112001 Agama                        2 
2 0953124002 Konsep Pemrograman           4              
3 0953123003 Sistem Digital               3          
4 0953123004 Kalkulus I                   3      
5 0953123005 Fisika                       3  
6 0953112006 Bahasa Inggris               2          
7 0953123007 Statistika & Probabilitas    3                     
8 0953112008 Bahasa Indonesia             2            

smt 2
9  0953223009   Kalkulus II
10 0953223010   Metematika Diskrit I
11 0953223011   Aljabar Linier
12 0953223012   Struktur Data & Algoritma
13 0953223013   Organisasi Sistem Komputer
14 0953212014   Pendidikan Kewarganegaraan
15 0953222015   Bahasa Inggris II

smt 3
16 0953122016   Matematika Diskrit II   
17 0953123017   Pemrograman Berorientasi Objek   
18 0953124018   Basis Data   
19 0953123019   Sistem Operasi   
20 0953112003   Kewarganegaraan   
21 0953123021   Metode Numerik   
22 0953123022   Desain & Analisis Algoritma   

smt 4
23 0953224023   Jaringan Komputer
24 0953223024   Pemrograman Web
25 0953223025   Kecerdasan Buatan
26 0953224026   Rekayasa Perangkat Lunak
27 0953223027   Pengembangan Aplikasi Bergerak
28 0953223028   Teori Bahasa & Automata

smt 5
29 0953123029
30 0953122030
31 0953133033 //
32 0953133032

Wajib Minat Semester 5
33 0953133031
34 0953133038
35 0953233051
36 0953133034

Pilihan Semester 5
37 0953133035
38 0953132036
39 0953133037
40 0953133039
41 0953133040
42 0953133041
43 0953133042
44 0953133043
45 0953133044
46 0953133045
47 0953133046

smt 6
48 0953223047
49 0953223008
50 0953233054

Wajib Minat Semester 6
51 0953233049
52 0953233050
53 0953233051
54 0953233052

Pilihan Semester 6
55 0953233053   Manajemen Proyek
56 0953233054   Proyek Perangkat Lunak
57 0953233055   Pengujian Perangkat Lunak
58 0953233056   Business Intelligence
59 0953032057   Kapita Selekta Ilmu Komputer
60 0953233058   Komputasi Cloud
61 0953233059   Keamanan Jaringan Komputer
62 0953233060   Cyber Security
63 0953233061   Sistem Pendukung Keputusan
64 0953233062   Software Process
65 0953233063   Pengamanan Data Multimedia
66 0953233064   Natural Language Processing

smt 7
67 0953122065
68 0900012007
69 0953112067

Wajib Minat Semester 7
70 0953133068
71 0953133069
72 0953133070
73 0953133071


Pilihan Semester 7
74 0953133072
75 0953133073
76 0953133074
77 0953133075
78 0953133076
79 0953133077

smt 8
80 0953226078


//SEMESTER 2
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Kalkulus II')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Metematika Diskrit I')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Aljabar Linier')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Struktur Data & Algoritma')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Organisasi Sistem Komputer')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Pendidikan Kewarganegaraan')");
mysqli_query($conn, "INSERT INTO nodes (nama) VALUES ('Bahasa Inggris II')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node A', 'Node B')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node B', 'Node C')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node C', 'Node D')");
mysqli_query($conn, "INSERT INTO edges (from_node, to_node) VALUES ('Node D', 'Node A')");