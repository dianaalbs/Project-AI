<?php

// Membuat kelas Graph untuk merepresentasikan graf
class Graph
{
    private $adjList;

    // Menginisialisasi objek Graph dengan daftar kosong
    public function __construct()
    {
        $this->adjList = array();
    }

    // Menambahkan simpul ke graf
    public function addNode($node)
    {
        $this->adjList[$node] = array();
    }

    // Menambahkan tepian antara dua simpul dalam graf
    public function addEdge($node1, $node2)
    {
        $this->adjList[$node1][] = $node2;
        $this->adjList[$node2][] = $node1;
    }

    // Metode rekursif untuk DFS
    private function DFSUtil($node, &$visited, &$result)
    {
        // Menandai simpul saat ini sebagai dikunjungi
        $visited[$node] = true;

        // Menambahkan simpul saat ini ke hasil
        $result[] = $node;

        // Melakukan rekursi untuk semua tetangga yang belum dikunjungi
        foreach ($this->adjList[$node] as $neighbor) {
            if (!$visited[$neighbor]) {
                $this->DFSUtil($neighbor, $visited, $result);
            }
        }
    }

    // Metode DFS wrapper
    public function DFS($startNodes)
    {
        // Inisialisasi array yang menandai simpul yang telah dikunjungi
        $visited = array();
        foreach (array_keys($this->adjList) as $node) {
            $visited[$node] = false;
        }

        // Memanggil metode DFSUtil rekursif untuk setiap simpul awal
        foreach ($startNodes as $startNode) {
            $this->DFSUtil($startNode, $visited, $result);
        }

        // Mengecek apakah semua simpul awal terhubung atau tidak
        $allConnected = true;
        foreach ($startNodes as $startNode) {
            if (!$visited[$startNode]) {
                $allConnected = false;
                break;
            }
        }

        return $allConnected;
    }

    // Metode untuk memeriksa ketersambungan antara dua simpul
    public function isConnected($startNode1, $startNode2)
    {
        // Inisialisasi array yang menandai simpul yang telah dikunjungi
        $visited = array();
        foreach (array_keys($this->adjList) as $node) {
            $visited[$node] = false;
        }

        // Memanggil metode DFSUtil rekursif untuk simpul awal pertama
        $this->DFSUtil($startNode1, $visited, $result);

        // Mengembalikan hasil ketersambungan simpul awal kedua
        return $visited[$startNode2];
    }
}

// Cek apakah ada permintaan penelusuran DFS yang dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Membuat objek Grafik
    $graph = new Graph();

    // Menambahkan simpul ke graf
    $graph->addNode('1');
    $graph->addNode('2');
    $graph->addNode('3');
    $graph->addNode('4');
    $graph->addNode('5');
    $graph->addNode('6');
    $graph->addNode('7');
    $graph->addNode('8');

    $graph->addNode('9');
    $graph->addNode('10');
    $graph->addNode('11');
    $graph->addNode('12');
    $graph->addNode('13');
    $graph->addNode('14');
    $graph->addNode('15');

    $graph->addNode('16');
    $graph->addNode('17');
    $graph->addNode('18');
    $graph->addNode('19');
    $graph->addNode('20');
    $graph->addNode('21');
    $graph->addNode('22');

    $graph->addNode('23');
    $graph->addNode('24');
    $graph->addNode('25');
    $graph->addNode('26');
    $graph->addNode('27');
    $graph->addNode('28');

    $graph->addNode('29');
    $graph->addNode('30');
    $graph->addNode('31');
    $graph->addNode('32');
    $graph->addNode('33');
    $graph->addNode('34');
    $graph->addNode('35');
    $graph->addNode('36');
    $graph->addNode('37');
    $graph->addNode('38');
    $graph->addNode('39');
    $graph->addNode('40');
    $graph->addNode('41');
    $graph->addNode('42');
    $graph->addNode('43');
    $graph->addNode('44');
    $graph->addNode('45');
    $graph->addNode('46');
    $graph->addNode('47');

    $graph->addNode('48');
    $graph->addNode('49');
    $graph->addNode('50');
    $graph->addNode('51');
    $graph->addNode('52');
    $graph->addNode('53');
    $graph->addNode('54');
    $graph->addNode('55');
    $graph->addNode('56');
    $graph->addNode('57');
    $graph->addNode('58');
    $graph->addNode('59');
    $graph->addNode('60');
    $graph->addNode('61');
    $graph->addNode('62');
    $graph->addNode('63');
    $graph->addNode('64');
    $graph->addNode('65');
    $graph->addNode('66');

    $graph->addNode('67');
    $graph->addNode('68');
    $graph->addNode('69');
    $graph->addNode('70');
    $graph->addNode('71');
    $graph->addNode('72');
    $graph->addNode('73');
    $graph->addNode('74');
    $graph->addNode('75');
    $graph->addNode('76');
    $graph->addNode('77');
    $graph->addNode('78');
    $graph->addNode('79');

    $graph->addNode('80');

    // Menambahkan tepian ke graf  
    $graph->addEdge('21', '9');
    $graph->addEdge('21', '11');
    $graph->addEdge('9', '4');
    $graph->addEdge('22', '12');
    $graph->addEdge('12', '2');
    $graph->addEdge('29', '25');
    $graph->addEdge('25', '7');
    $graph->addEdge('30', '24');
    $graph->addEdge('24', '18');
    $graph->addEdge('33', '25');
    $graph->addEdge('34', '9');
    $graph->addEdge('34', '11');
    $graph->addEdge('35', '23');
    $graph->addEdge('23', '19');
    $graph->addEdge('19', '13');
    $graph->addEdge('13', '3');
    $graph->addEdge('36', '18');
    $graph->addEdge('37', '9');
    $graph->addEdge('37', '10');
    $graph->addEdge('38', '11');
    $graph->addEdge('39', '23');
    $graph->addEdge('40', '11');
    $graph->addEdge('41', '23');
    $graph->addEdge('42', '32');
    $graph->addEdge('32', '7');
    $graph->addEdge('32', '11');
    $graph->addEdge('43', '12');
    $graph->addEdge('44', '26');
    $graph->addEdge('26', '17');
    $graph->addEdge('45', '9');
    $graph->addEdge('45', '10');
    $graph->addEdge('46', '17');
    $graph->addEdge('17', '12');
    $graph->addEdge('47', '25');
    $graph->addEdge('51', '25');
    $graph->addEdge('52', '32');
    $graph->addEdge('53', '23');
    $graph->addEdge('54', '26');
    $graph->addEdge('55', '26');
    $graph->addEdge('56', '26');
    $graph->addEdge('57', '26');
    $graph->addEdge('58', '26');
    $graph->addEdge('58', '29');
    $graph->addEdge('60', '31');
    $graph->addEdge('60', '23');
    $graph->addEdge('31', '23');
    $graph->addEdge('61', '23');
    $graph->addEdge('62', '23');
    $graph->addEdge('63', '29');
    $graph->addEdge('64', '26');
    $graph->addEdge('65', '32');
    $graph->addEdge('66', '28');
    $graph->addEdge('28', '16');
    $graph->addEdge('16', '10');
    $graph->addEdge('70', '25');
    $graph->addEdge('71', '32');
    $graph->addEdge('72', '23');
    $graph->addEdge('73', '25');
    $graph->addEdge('74', '24');
    $graph->addEdge('74', '26');
    $graph->addEdge('24', '17');
    $graph->addEdge('26', '17');
    $graph->addEdge('75', '7');
    $graph->addEdge('76', '23');
    $graph->addEdge('77', '25');
    $graph->addEdge('77', '32');
    $graph->addEdge('78', '26');
    $graph->addEdge('79', '29');

    // Memanggil metode DFS dengan simpul awal yang dikirim melalui form
    $startNode1 = $_POST['startNode1'];
    $startNode2 = $_POST['startNode2'];
    $startNode3 = $_POST['startNode3'];
    $startNode4 = $_POST['startNode4'];
    $startNode5 = $_POST['startNode5'];
    $startNode6 = $_POST['startNode6'];
    $startNode7 = $_POST['startNode7'];
    $startNode8 = $_POST['startNode8'];
    $startNode9  = $_POST['startNode9'];
    $startNode10 = $_POST['startNode10'];
    $startNode11 = $_POST['startNode11'];
    $startNode12 = $_POST['startNode12'];
    $startNode13 = $_POST['startNode13'];
    $startNode14 = $_POST['startNode14'];
    $startNode15 = $_POST['startNode15'];
    $startNode16 = $_POST['startNode16'];
    $startNode17 = $_POST['startNode17'];
    $startNode18 = $_POST['startNode18'];
    $startNode19 = $_POST['startNode19'];
    $startNode20 = $_POST['startNode20'];
    $startNode21 = $_POST['startNode21'];
    $startNode22 = $_POST['startNode22'];
    $startNode23 = $_POST['startNode23'];
    $startNode24 = $_POST['startNode24'];
    $startNode25 = $_POST['startNode25'];
    $startNode26 = $_POST['startNode26'];
    $startNode27 = $_POST['startNode27'];
    $startNode28 = $_POST['startNode28'];
    $startNode29 = $_POST['startNode29'];
    $startNode30 = $_POST['startNode30'];
    $startNode31 = $_POST['startNode31'];
    $startNode32 = $_POST['startNode32'];
    $startNode33 = $_POST['startNode33'];
    $startNode34 = $_POST['startNode34'];
    $startNode35 = $_POST['startNode35'];
    $startNode36 = $_POST['startNode36'];
    $startNode37 = $_POST['startNode37'];
    $startNode38 = $_POST['startNode38'];
    $startNode39 = $_POST['startNode39'];
    $startNode40 = $_POST['startNode40'];
    $startNode41 = $_POST['startNode41'];
    $startNode42 = $_POST['startNode42'];
    $startNode43 = $_POST['startNode43'];
    $startNode44 = $_POST['startNode44'];
    $startNode45 = $_POST['startNode45'];
    $startNode46 = $_POST['startNode46'];
    $startNode47 = $_POST['startNode47'];
    $startNode48 = $_POST['startNode48'];
    $startNode49 = $_POST['startNode49'];

    // Memeriksa ketersambungan antara simpul-simpul awal yang dipilih
    $isConnected1 = $graph->isConnected($startNode1, $startNode2);
    $isConnected2 = $graph->isConnected($startNode1, $startNode3);
    $isConnected3 = $graph->isConnected($startNode1, $startNode4);
    $isConnected4 = $graph->isConnected($startNode1, $startNode5);
    $isConnected5 = $graph->isConnected($startNode1, $startNode6);
    $isConnected6 = $graph->isConnected($startNode1, $startNode7);
    $isConnected7 = $graph->isConnected($startNode1, $startNode8);
    $isConnected8 = $graph->isConnected($startNode1, $startNode9);
    $isConnected9 = $graph->isConnected($startNode1, $startNode10);
    $isConnected10 = $graph->isConnected($startNode1, $startNode11);
    $isConnected11 = $graph->isConnected($startNode1, $startNode12);
    $isConnected12 = $graph->isConnected($startNode1, $startNode13);
    $isConnected13 = $graph->isConnected($startNode1, $startNode14);
    $isConnected14 = $graph->isConnected($startNode1, $startNode15);
    $isConnected15 = $graph->isConnected($startNode1, $startNode16);
    $isConnected16 = $graph->isConnected($startNode1, $startNode17);
    $isConnected17 = $graph->isConnected($startNode1, $startNode18);
    $isConnected18 = $graph->isConnected($startNode1, $startNode19);
    $isConnected19 = $graph->isConnected($startNode1, $startNode20);
    $isConnected20 = $graph->isConnected($startNode1, $startNode21);
    $isConnected21 = $graph->isConnected($startNode1, $startNode22);
    $isConnected22 = $graph->isConnected($startNode1, $startNode23);
    $isConnected23 = $graph->isConnected($startNode1, $startNode24);
    $isConnected24 = $graph->isConnected($startNode1, $startNode25);
    $isConnected25 = $graph->isConnected($startNode1, $startNode26);
    $isConnected26 = $graph->isConnected($startNode1, $startNode27);
    $isConnected27 = $graph->isConnected($startNode1, $startNode28);
    $isConnected28 = $graph->isConnected($startNode1, $startNode29);
    $isConnected29 = $graph->isConnected($startNode1, $startNode30);
    $isConnected30 = $graph->isConnected($startNode1, $startNode31);
    $isConnected31 = $graph->isConnected($startNode1, $startNode32);
    $isConnected32 = $graph->isConnected($startNode1, $startNode33);
    $isConnected33 = $graph->isConnected($startNode1, $startNode34);
    $isConnected34 = $graph->isConnected($startNode1, $startNode35);
    $isConnected35 = $graph->isConnected($startNode1, $startNode36);
    $isConnected36 = $graph->isConnected($startNode1, $startNode37);
    $isConnected37 = $graph->isConnected($startNode1, $startNode38);
    $isConnected38 = $graph->isConnected($startNode1, $startNode39);
    $isConnected39 = $graph->isConnected($startNode1, $startNode40);
    $isConnected40 = $graph->isConnected($startNode1, $startNode41);
    $isConnected41 = $graph->isConnected($startNode1, $startNode42);
    $isConnected42 = $graph->isConnected($startNode1, $startNode43);
    $isConnected43 = $graph->isConnected($startNode1, $startNode44);
    $isConnected44 = $graph->isConnected($startNode1, $startNode45);
    $isConnected45 = $graph->isConnected($startNode1, $startNode46);
    $isConnected46 = $graph->isConnected($startNode1, $startNode47);
    $isConnected47 = $graph->isConnected($startNode1, $startNode48);
    $isConnected48 = $graph->isConnected($startNode1, $startNode49);

    $isConnected49 = $graph->isConnected($startNode2, $startNode3);
    $isConnected50 = $graph->isConnected($startNode2, $startNode4);
    $isConnected51 = $graph->isConnected($startNode2, $startNode5);
    $isConnected52 = $graph->isConnected($startNode2, $startNode6);
    $isConnected53 = $graph->isConnected($startNode2, $startNode7);
    $isConnected54 = $graph->isConnected($startNode2, $startNode8);
    $isConnected55 = $graph->isConnected($startNode2, $startNode9);
    $isConnected56 = $graph->isConnected($startNode2, $startNode10);
    $isConnected57 = $graph->isConnected($startNode2, $startNode11);
    $isConnected58 = $graph->isConnected($startNode2, $startNode12);
    $isConnected59 = $graph->isConnected($startNode2, $startNode13);
    $isConnected60 = $graph->isConnected($startNode2, $startNode14);
    $isConnected61 = $graph->isConnected($startNode2, $startNode15);
    $isConnected62 = $graph->isConnected($startNode2, $startNode16);
    $isConnected63 = $graph->isConnected($startNode2, $startNode17);
    $isConnected64 = $graph->isConnected($startNode2, $startNode18);
    $isConnected65 = $graph->isConnected($startNode2, $startNode19);
    $isConnected66 = $graph->isConnected($startNode2, $startNode20);
    $isConnected67 = $graph->isConnected($startNode2, $startNode21);
    $isConnected68 = $graph->isConnected($startNode2, $startNode22);
    $isConnected69 = $graph->isConnected($startNode2, $startNode23);
    $isConnected70 = $graph->isConnected($startNode2, $startNode24);
    $isConnected71 = $graph->isConnected($startNode2, $startNode25);
    $isConnected72 = $graph->isConnected($startNode2, $startNode26);
    $isConnected73 = $graph->isConnected($startNode2, $startNode27);
    $isConnected74 = $graph->isConnected($startNode2, $startNode28);
    $isConnected75 = $graph->isConnected($startNode2, $startNode29);
    $isConnected76 = $graph->isConnected($startNode2, $startNode30);
    $isConnected77 = $graph->isConnected($startNode2, $startNode31);
    $isConnected78 = $graph->isConnected($startNode2, $startNode32);
    $isConnected79 = $graph->isConnected($startNode2, $startNode33);
    $isConnected80 = $graph->isConnected($startNode2, $startNode34);
    $isConnected81 = $graph->isConnected($startNode2, $startNode35);
    $isConnected82 = $graph->isConnected($startNode2, $startNode36);
    $isConnected83 = $graph->isConnected($startNode2, $startNode37);
    $isConnected84 = $graph->isConnected($startNode2, $startNode38);
    $isConnected85 = $graph->isConnected($startNode2, $startNode39);
    $isConnected86 = $graph->isConnected($startNode2, $startNode40);
    $isConnected87 = $graph->isConnected($startNode2, $startNode41);
    $isConnected88 = $graph->isConnected($startNode2, $startNode42);
    $isConnected89 = $graph->isConnected($startNode2, $startNode43);
    $isConnected90 = $graph->isConnected($startNode2, $startNode44);
    $isConnected91 = $graph->isConnected($startNode2, $startNode45);
    $isConnected92 = $graph->isConnected($startNode2, $startNode46);
    $isConnected93 = $graph->isConnected($startNode2, $startNode47);
    $isConnected94 = $graph->isConnected($startNode2, $startNode48);
    $isConnected95 = $graph->isConnected($startNode2, $startNode49);

    $isConnected96 = $graph->isConnected($startNode3, $startNode4);
    $isConnected97 = $graph->isConnected($startNode3, $startNode5);
    $isConnected98 = $graph->isConnected($startNode3, $startNode6);
    $isConnected99 = $graph->isConnected($startNode3, $startNode7);
    $isConnected100 = $graph->isConnected($startNode3, $startNode8);
    $isConnected101 = $graph->isConnected($startNode3, $startNode9);
    $isConnected102 = $graph->isConnected($startNode3, $startNode10);
    $isConnected103 = $graph->isConnected($startNode3, $startNode11);
    $isConnected104 = $graph->isConnected($startNode3, $startNode12);
    $isConnected105 = $graph->isConnected($startNode3, $startNode13);
    $isConnected106 = $graph->isConnected($startNode3, $startNode14);
    $isConnected107 = $graph->isConnected($startNode3, $startNode15);
    $isConnected108 = $graph->isConnected($startNode3, $startNode16);
    $isConnected109 = $graph->isConnected($startNode3, $startNode17);
    $isConnected110 = $graph->isConnected($startNode3, $startNode18);
    $isConnected111 = $graph->isConnected($startNode3, $startNode19);
    $isConnected112 = $graph->isConnected($startNode3, $startNode20);
    $isConnected113 = $graph->isConnected($startNode3, $startNode21);
    $isConnected114 = $graph->isConnected($startNode3, $startNode22);
    $isConnected115 = $graph->isConnected($startNode3, $startNode23);
    $isConnected116 = $graph->isConnected($startNode3, $startNode24);
    $isConnected117 = $graph->isConnected($startNode3, $startNode25);
    $isConnected118 = $graph->isConnected($startNode3, $startNode26);
    $isConnected119 = $graph->isConnected($startNode3, $startNode27);
    $isConnected120 = $graph->isConnected($startNode3, $startNode28);
    $isConnected121 = $graph->isConnected($startNode3, $startNode29);
    $isConnected122 = $graph->isConnected($startNode3, $startNode30);
    $isConnected123 = $graph->isConnected($startNode3, $startNode31);
    $isConnected124 = $graph->isConnected($startNode3, $startNode32);
    $isConnected125 = $graph->isConnected($startNode3, $startNode33);
    $isConnected126 = $graph->isConnected($startNode3, $startNode34);
    $isConnected127 = $graph->isConnected($startNode3, $startNode35);
    $isConnected128 = $graph->isConnected($startNode3, $startNode36);
    $isConnected129 = $graph->isConnected($startNode3, $startNode37);
    $isConnected130 = $graph->isConnected($startNode3, $startNode38);
    $isConnected131 = $graph->isConnected($startNode3, $startNode39);
    $isConnected132 = $graph->isConnected($startNode3, $startNode40);
    $isConnected133 = $graph->isConnected($startNode3, $startNode41);
    $isConnected134 = $graph->isConnected($startNode3, $startNode42);
    $isConnected135 = $graph->isConnected($startNode3, $startNode43);
    $isConnected136 = $graph->isConnected($startNode3, $startNode44);
    $isConnected137 = $graph->isConnected($startNode3, $startNode45);
    $isConnected138 = $graph->isConnected($startNode3, $startNode46);
    $isConnected139 = $graph->isConnected($startNode3, $startNode47);
    $isConnected140 = $graph->isConnected($startNode3, $startNode48);
    $isConnected141 = $graph->isConnected($startNode3, $startNode49);

    $isConnected142 = $graph->isConnected($startNode4, $startNode5);
    $isConnected143 = $graph->isConnected($startNode4, $startNode6);
    $isConnected144 = $graph->isConnected($startNode4, $startNode7);
    $isConnected145 = $graph->isConnected($startNode4, $startNode8);
    $isConnected146 = $graph->isConnected($startNode4, $startNode9);
    $isConnected147 = $graph->isConnected($startNode4, $startNode10);
    $isConnected148 = $graph->isConnected($startNode4, $startNode11);
    $isConnected149 = $graph->isConnected($startNode4, $startNode12);
    $isConnected150 = $graph->isConnected($startNode4, $startNode13);
    $isConnected151 = $graph->isConnected($startNode4, $startNode14);
    $isConnected152 = $graph->isConnected($startNode4, $startNode15);
    $isConnected153 = $graph->isConnected($startNode4, $startNode16);
    $isConnected154 = $graph->isConnected($startNode4, $startNode17);
    $isConnected155 = $graph->isConnected($startNode4, $startNode18);
    $isConnected156 = $graph->isConnected($startNode4, $startNode19);
    $isConnected157 = $graph->isConnected($startNode4, $startNode20);
    $isConnected158 = $graph->isConnected($startNode4, $startNode21);
    $isConnected159 = $graph->isConnected($startNode4, $startNode22);
    $isConnected160 = $graph->isConnected($startNode4, $startNode23);
    $isConnected161 = $graph->isConnected($startNode4, $startNode24);
    $isConnected162 = $graph->isConnected($startNode4, $startNode25);
    $isConnected163 = $graph->isConnected($startNode4, $startNode26);
    $isConnected164 = $graph->isConnected($startNode4, $startNode27);
    $isConnected165 = $graph->isConnected($startNode4, $startNode28);
    $isConnected166 = $graph->isConnected($startNode4, $startNode29);
    $isConnected167 = $graph->isConnected($startNode4, $startNode30);
    $isConnected168 = $graph->isConnected($startNode4, $startNode31);
    $isConnected169 = $graph->isConnected($startNode4, $startNode32);
    $isConnected170 = $graph->isConnected($startNode4, $startNode33);
    $isConnected171 = $graph->isConnected($startNode4, $startNode34);
    $isConnected172 = $graph->isConnected($startNode4, $startNode35);
    $isConnected173 = $graph->isConnected($startNode4, $startNode36);
    $isConnected174 = $graph->isConnected($startNode4, $startNode37);
    $isConnected175 = $graph->isConnected($startNode4, $startNode38);
    $isConnected176 = $graph->isConnected($startNode4, $startNode39);
    $isConnected177 = $graph->isConnected($startNode4, $startNode40);
    $isConnected178 = $graph->isConnected($startNode4, $startNode41);
    $isConnected179 = $graph->isConnected($startNode4, $startNode42);
    $isConnected180 = $graph->isConnected($startNode4, $startNode43);
    $isConnected181 = $graph->isConnected($startNode4, $startNode44);
    $isConnected182 = $graph->isConnected($startNode4, $startNode45);
    $isConnected183 = $graph->isConnected($startNode4, $startNode46);
    $isConnected184 = $graph->isConnected($startNode4, $startNode47);
    $isConnected185 = $graph->isConnected($startNode4, $startNode48);
    $isConnected186 = $graph->isConnected($startNode4, $startNode49);

    $isConnected187 = $graph->isConnected($startNode5, $startNode6);
    $isConnected188 = $graph->isConnected($startNode5, $startNode7);
    $isConnected189 = $graph->isConnected($startNode5, $startNode8);
    $isConnected190 = $graph->isConnected($startNode5, $startNode9);
    $isConnected191 = $graph->isConnected($startNode5, $startNode10);
    $isConnected192 = $graph->isConnected($startNode5, $startNode11);
    $isConnected193 = $graph->isConnected($startNode5, $startNode12);
    $isConnected194 = $graph->isConnected($startNode5, $startNode13);
    $isConnected195 = $graph->isConnected($startNode5, $startNode14);
    $isConnected196 = $graph->isConnected($startNode5, $startNode15);
    $isConnected197 = $graph->isConnected($startNode5, $startNode16);
    $isConnected198 = $graph->isConnected($startNode5, $startNode17);
    $isConnected199 = $graph->isConnected($startNode5, $startNode18);
    $isConnected200 = $graph->isConnected($startNode5, $startNode19);
    $isConnected201 = $graph->isConnected($startNode5, $startNode20);
    $isConnected202 = $graph->isConnected($startNode5, $startNode21);
    $isConnected203 = $graph->isConnected($startNode5, $startNode22);
    $isConnected204 = $graph->isConnected($startNode5, $startNode23);
    $isConnected205 = $graph->isConnected($startNode5, $startNode24);
    $isConnected206 = $graph->isConnected($startNode5, $startNode25);
    $isConnected207 = $graph->isConnected($startNode5, $startNode26);
    $isConnected208 = $graph->isConnected($startNode5, $startNode27);
    $isConnected209 = $graph->isConnected($startNode5, $startNode28);
    $isConnected210 = $graph->isConnected($startNode5, $startNode29);
    $isConnected211 = $graph->isConnected($startNode5, $startNode30);
    $isConnected212 = $graph->isConnected($startNode5, $startNode31);
    $isConnected213 = $graph->isConnected($startNode5, $startNode32);
    $isConnected214 = $graph->isConnected($startNode5, $startNode33);
    $isConnected215 = $graph->isConnected($startNode5, $startNode34);
    $isConnected216 = $graph->isConnected($startNode5, $startNode35);
    $isConnected217 = $graph->isConnected($startNode5, $startNode36);
    $isConnected218 = $graph->isConnected($startNode5, $startNode37);
    $isConnected219 = $graph->isConnected($startNode5, $startNode38);
    $isConnected220 = $graph->isConnected($startNode5, $startNode39);
    $isConnected221 = $graph->isConnected($startNode5, $startNode40);
    $isConnected222 = $graph->isConnected($startNode5, $startNode41);
    $isConnected223 = $graph->isConnected($startNode5, $startNode42);
    $isConnected224 = $graph->isConnected($startNode5, $startNode43);
    $isConnected225 = $graph->isConnected($startNode5, $startNode44);
    $isConnected226 = $graph->isConnected($startNode5, $startNode45);
    $isConnected227 = $graph->isConnected($startNode5, $startNode46);
    $isConnected228 = $graph->isConnected($startNode5, $startNode47);
    $isConnected229 = $graph->isConnected($startNode5, $startNode48);
    $isConnected230 = $graph->isConnected($startNode5, $startNode49);

    $isConnected231 = $graph->isConnected($startNode6, $startNode7);
    $isConnected232 = $graph->isConnected($startNode6, $startNode8);
    $isConnected233 = $graph->isConnected($startNode6, $startNode9);
    $isConnected234 = $graph->isConnected($startNode6, $startNode10);
    $isConnected235 = $graph->isConnected($startNode6, $startNode11);
    $isConnected236 = $graph->isConnected($startNode6, $startNode12);
    $isConnected237 = $graph->isConnected($startNode6, $startNode13);
    $isConnected238 = $graph->isConnected($startNode6, $startNode14);
    $isConnected239 = $graph->isConnected($startNode6, $startNode15);
    $isConnected240 = $graph->isConnected($startNode6, $startNode16);
    $isConnected241 = $graph->isConnected($startNode6, $startNode17);
    $isConnected242 = $graph->isConnected($startNode6, $startNode18);
    $isConnected243 = $graph->isConnected($startNode6, $startNode19);
    $isConnected244 = $graph->isConnected($startNode6, $startNode20);
    $isConnected245 = $graph->isConnected($startNode6, $startNode21);
    $isConnected246 = $graph->isConnected($startNode6, $startNode22);
    $isConnected247 = $graph->isConnected($startNode6, $startNode23);
    $isConnected248 = $graph->isConnected($startNode6, $startNode24);
    $isConnected249 = $graph->isConnected($startNode6, $startNode25);
    $isConnected250 = $graph->isConnected($startNode6, $startNode26);
    $isConnected251 = $graph->isConnected($startNode6, $startNode27);
    $isConnected252 = $graph->isConnected($startNode6, $startNode28);
    $isConnected253 = $graph->isConnected($startNode6, $startNode29);
    $isConnected254 = $graph->isConnected($startNode6, $startNode30);
    $isConnected255 = $graph->isConnected($startNode6, $startNode31);
    $isConnected256 = $graph->isConnected($startNode6, $startNode32);
    $isConnected257 = $graph->isConnected($startNode6, $startNode33);
    $isConnected258 = $graph->isConnected($startNode6, $startNode34);
    $isConnected259 = $graph->isConnected($startNode6, $startNode35);
    $isConnected260 = $graph->isConnected($startNode6, $startNode36);
    $isConnected261 = $graph->isConnected($startNode6, $startNode37);
    $isConnected262 = $graph->isConnected($startNode6, $startNode38);
    $isConnected263 = $graph->isConnected($startNode6, $startNode39);
    $isConnected264 = $graph->isConnected($startNode6, $startNode40);
    $isConnected265 = $graph->isConnected($startNode6, $startNode41);
    $isConnected266 = $graph->isConnected($startNode6, $startNode42);
    $isConnected267 = $graph->isConnected($startNode6, $startNode43);
    $isConnected268 = $graph->isConnected($startNode6, $startNode44);
    $isConnected269 = $graph->isConnected($startNode6, $startNode45);
    $isConnected270 = $graph->isConnected($startNode6, $startNode46);
    $isConnected271 = $graph->isConnected($startNode6, $startNode47);
    $isConnected272 = $graph->isConnected($startNode6, $startNode48);
    $isConnected273 = $graph->isConnected($startNode6, $startNode49);

    $isConnected274 = $graph->isConnected($startNode7, $startNode8);
    $isConnected275 = $graph->isConnected($startNode7, $startNode9);
    $isConnected276 = $graph->isConnected($startNode7, $startNode10);
    $isConnected277 = $graph->isConnected($startNode7, $startNode11);
    $isConnected278 = $graph->isConnected($startNode7, $startNode12);
    $isConnected279 = $graph->isConnected($startNode7, $startNode13);
    $isConnected280 = $graph->isConnected($startNode7, $startNode14);
    $isConnected281 = $graph->isConnected($startNode7, $startNode15);
    $isConnected282 = $graph->isConnected($startNode7, $startNode16);
    $isConnected283 = $graph->isConnected($startNode7, $startNode17);
    $isConnected284 = $graph->isConnected($startNode7, $startNode18);
    $isConnected285 = $graph->isConnected($startNode7, $startNode19);
    $isConnected286 = $graph->isConnected($startNode7, $startNode20);
    $isConnected287 = $graph->isConnected($startNode7, $startNode21);
    $isConnected288 = $graph->isConnected($startNode7, $startNode22);
    $isConnected289 = $graph->isConnected($startNode7, $startNode23);
    $isConnected290 = $graph->isConnected($startNode7, $startNode24);
    $isConnected291 = $graph->isConnected($startNode7, $startNode25);
    $isConnected292 = $graph->isConnected($startNode7, $startNode26);
    $isConnected293 = $graph->isConnected($startNode7, $startNode27);
    $isConnected294 = $graph->isConnected($startNode7, $startNode28);
    $isConnected295 = $graph->isConnected($startNode7, $startNode29);
    $isConnected296 = $graph->isConnected($startNode7, $startNode30);
    $isConnected297 = $graph->isConnected($startNode7, $startNode31);
    $isConnected298 = $graph->isConnected($startNode7, $startNode32);
    $isConnected299 = $graph->isConnected($startNode7, $startNode33);
    $isConnected300 = $graph->isConnected($startNode7, $startNode34);
    $isConnected301 = $graph->isConnected($startNode7, $startNode35);
    $isConnected302 = $graph->isConnected($startNode7, $startNode36);
    $isConnected303 = $graph->isConnected($startNode7, $startNode37);
    $isConnected304 = $graph->isConnected($startNode7, $startNode38);
    $isConnected305 = $graph->isConnected($startNode7, $startNode39);
    $isConnected306 = $graph->isConnected($startNode7, $startNode40);
    $isConnected307 = $graph->isConnected($startNode7, $startNode41);
    $isConnected308 = $graph->isConnected($startNode7, $startNode42);
    $isConnected309 = $graph->isConnected($startNode7, $startNode43);
    $isConnected310 = $graph->isConnected($startNode7, $startNode44);
    $isConnected311 = $graph->isConnected($startNode7, $startNode45);
    $isConnected312 = $graph->isConnected($startNode7, $startNode46);
    $isConnected313 = $graph->isConnected($startNode7, $startNode47);
    $isConnected314 = $graph->isConnected($startNode7, $startNode48);
    $isConnected315 = $graph->isConnected($startNode7, $startNode49);

    $isConnected316 = $graph->isConnected($startNode8, $startNode9);
    $isConnected317 = $graph->isConnected($startNode8, $startNode10);
    $isConnected318 = $graph->isConnected($startNode8, $startNode11);
    $isConnected319 = $graph->isConnected($startNode8, $startNode12);
    $isConnected320 = $graph->isConnected($startNode8, $startNode13);
    $isConnected321 = $graph->isConnected($startNode8, $startNode14);
    $isConnected322 = $graph->isConnected($startNode8, $startNode15);
    $isConnected323 = $graph->isConnected($startNode8, $startNode16);
    $isConnected324 = $graph->isConnected($startNode8, $startNode17);
    $isConnected325 = $graph->isConnected($startNode8, $startNode18);
    $isConnected326 = $graph->isConnected($startNode8, $startNode19);
    $isConnected327 = $graph->isConnected($startNode8, $startNode20);
    $isConnected328 = $graph->isConnected($startNode8, $startNode21);
    $isConnected329 = $graph->isConnected($startNode8, $startNode22);
    $isConnected330 = $graph->isConnected($startNode8, $startNode23);
    $isConnected331 = $graph->isConnected($startNode8, $startNode24);
    $isConnected332 = $graph->isConnected($startNode8, $startNode25);
    $isConnected333 = $graph->isConnected($startNode8, $startNode26);
    $isConnected334 = $graph->isConnected($startNode8, $startNode27);
    $isConnected335 = $graph->isConnected($startNode8, $startNode28);
    $isConnected336 = $graph->isConnected($startNode8, $startNode29);
    $isConnected337 = $graph->isConnected($startNode8, $startNode30);
    $isConnected338 = $graph->isConnected($startNode8, $startNode31);
    $isConnected339 = $graph->isConnected($startNode8, $startNode32);
    $isConnected340 = $graph->isConnected($startNode8, $startNode33);
    $isConnected341 = $graph->isConnected($startNode8, $startNode34);
    $isConnected342 = $graph->isConnected($startNode8, $startNode35);
    $isConnected343 = $graph->isConnected($startNode8, $startNode36);
    $isConnected344 = $graph->isConnected($startNode8, $startNode37);
    $isConnected345 = $graph->isConnected($startNode8, $startNode38);
    $isConnected346 = $graph->isConnected($startNode8, $startNode39);
    $isConnected347 = $graph->isConnected($startNode8, $startNode40);
    $isConnected348 = $graph->isConnected($startNode8, $startNode41);
    $isConnected349 = $graph->isConnected($startNode8, $startNode42);
    $isConnected350 = $graph->isConnected($startNode8, $startNode43);
    $isConnected351 = $graph->isConnected($startNode8, $startNode44);
    $isConnected352 = $graph->isConnected($startNode8, $startNode45);
    $isConnected353 = $graph->isConnected($startNode8, $startNode46);
    $isConnected354 = $graph->isConnected($startNode8, $startNode47);
    $isConnected355 = $graph->isConnected($startNode8, $startNode48);
    $isConnected356 = $graph->isConnected($startNode8, $startNode49);

    $isConnected357 = $graph->isConnected($startNode9, $startNode10);
    $isConnected358 = $graph->isConnected($startNode9, $startNode11);
    $isConnected359 = $graph->isConnected($startNode9, $startNode12);
    $isConnected360 = $graph->isConnected($startNode9, $startNode13);
    $isConnected361 = $graph->isConnected($startNode9, $startNode14);
    $isConnected362 = $graph->isConnected($startNode9, $startNode15);
    $isConnected363 = $graph->isConnected($startNode9, $startNode16);
    $isConnected364 = $graph->isConnected($startNode9, $startNode17);
    $isConnected365 = $graph->isConnected($startNode9, $startNode18);
    $isConnected366 = $graph->isConnected($startNode9, $startNode19);
    $isConnected367 = $graph->isConnected($startNode9, $startNode20);
    $isConnected368 = $graph->isConnected($startNode9, $startNode21);
    $isConnected369 = $graph->isConnected($startNode9, $startNode22);
    $isConnected370 = $graph->isConnected($startNode9, $startNode23);
    $isConnected371 = $graph->isConnected($startNode9, $startNode24);
    $isConnected372 = $graph->isConnected($startNode9, $startNode25);
    $isConnected373 = $graph->isConnected($startNode9, $startNode26);
    $isConnected374 = $graph->isConnected($startNode9, $startNode27);
    $isConnected375 = $graph->isConnected($startNode9, $startNode28);
    $isConnected376 = $graph->isConnected($startNode9, $startNode29);
    $isConnected377 = $graph->isConnected($startNode9, $startNode30);
    $isConnected378 = $graph->isConnected($startNode9, $startNode31);
    $isConnected379 = $graph->isConnected($startNode9, $startNode32);
    $isConnected380 = $graph->isConnected($startNode9, $startNode33);
    $isConnected381 = $graph->isConnected($startNode9, $startNode34);
    $isConnected382 = $graph->isConnected($startNode9, $startNode35);
    $isConnected383 = $graph->isConnected($startNode9, $startNode36);
    $isConnected384 = $graph->isConnected($startNode9, $startNode37);
    $isConnected385 = $graph->isConnected($startNode9, $startNode38);
    $isConnected386 = $graph->isConnected($startNode9, $startNode39);
    $isConnected387 = $graph->isConnected($startNode9, $startNode40);
    $isConnected388 = $graph->isConnected($startNode9, $startNode41);
    $isConnected389 = $graph->isConnected($startNode9, $startNode42);
    $isConnected390 = $graph->isConnected($startNode9, $startNode43);
    $isConnected391 = $graph->isConnected($startNode9, $startNode44);
    $isConnected392 = $graph->isConnected($startNode9, $startNode45);
    $isConnected393 = $graph->isConnected($startNode9, $startNode46);
    $isConnected394 = $graph->isConnected($startNode9, $startNode47);
    $isConnected395 = $graph->isConnected($startNode9, $startNode48);
    $isConnected396 = $graph->isConnected($startNode9, $startNode49);

    $isConnected397 = $graph->isConnected($startNode10, $startNode11);
    $isConnected398 = $graph->isConnected($startNode10, $startNode12);
    $isConnected399 = $graph->isConnected($startNode10, $startNode13);
    $isConnected400 = $graph->isConnected($startNode10, $startNode14);
    $isConnected401 = $graph->isConnected($startNode10, $startNode15);
    $isConnected402 = $graph->isConnected($startNode10, $startNode16);
    $isConnected403 = $graph->isConnected($startNode10, $startNode17);
    $isConnected404 = $graph->isConnected($startNode10, $startNode18);
    $isConnected405 = $graph->isConnected($startNode10, $startNode19);
    $isConnected406 = $graph->isConnected($startNode10, $startNode20);
    $isConnected407 = $graph->isConnected($startNode10, $startNode21);
    $isConnected408 = $graph->isConnected($startNode10, $startNode22);
    $isConnected409 = $graph->isConnected($startNode10, $startNode23);
    $isConnected410 = $graph->isConnected($startNode10, $startNode24);
    $isConnected411 = $graph->isConnected($startNode10, $startNode25);
    $isConnected412 = $graph->isConnected($startNode10, $startNode26);
    $isConnected413 = $graph->isConnected($startNode10, $startNode27);
    $isConnected414 = $graph->isConnected($startNode10, $startNode28);
    $isConnected415 = $graph->isConnected($startNode10, $startNode29);
    $isConnected416 = $graph->isConnected($startNode10, $startNode30);
    $isConnected417 = $graph->isConnected($startNode10, $startNode31);
    $isConnected418 = $graph->isConnected($startNode10, $startNode32);
    $isConnected419 = $graph->isConnected($startNode10, $startNode33);
    $isConnected420 = $graph->isConnected($startNode10, $startNode34);
    $isConnected421 = $graph->isConnected($startNode10, $startNode35);
    $isConnected422 = $graph->isConnected($startNode10, $startNode36);
    $isConnected423 = $graph->isConnected($startNode10, $startNode37);
    $isConnected424 = $graph->isConnected($startNode10, $startNode38);
    $isConnected425 = $graph->isConnected($startNode10, $startNode39);
    $isConnected426 = $graph->isConnected($startNode10, $startNode40);
    $isConnected427 = $graph->isConnected($startNode10, $startNode41);
    $isConnected428 = $graph->isConnected($startNode10, $startNode42);
    $isConnected429 = $graph->isConnected($startNode10, $startNode43);
    $isConnected430 = $graph->isConnected($startNode10, $startNode44);
    $isConnected431 = $graph->isConnected($startNode10, $startNode45);
    $isConnected432 = $graph->isConnected($startNode10, $startNode46);
    $isConnected433 = $graph->isConnected($startNode10, $startNode47);
    $isConnected434 = $graph->isConnected($startNode10, $startNode48);
    $isConnected435 = $graph->isConnected($startNode10, $startNode49);

    $isConnected436 = $graph->isConnected($startNode11, $startNode12);
    $isConnected437 = $graph->isConnected($startNode11, $startNode13);
    $isConnected438 = $graph->isConnected($startNode11, $startNode14);
    $isConnected439 = $graph->isConnected($startNode11, $startNode15);
    $isConnected440 = $graph->isConnected($startNode11, $startNode16);
    $isConnected441 = $graph->isConnected($startNode11, $startNode17);
    $isConnected442 = $graph->isConnected($startNode11, $startNode18);
    $isConnected443 = $graph->isConnected($startNode11, $startNode19);
    $isConnected444 = $graph->isConnected($startNode11, $startNode20);
    $isConnected445 = $graph->isConnected($startNode11, $startNode21);
    $isConnected446 = $graph->isConnected($startNode11, $startNode22);
    $isConnected447 = $graph->isConnected($startNode11, $startNode23);
    $isConnected448 = $graph->isConnected($startNode11, $startNode24);
    $isConnected449 = $graph->isConnected($startNode11, $startNode25);
    $isConnected450 = $graph->isConnected($startNode11, $startNode26);
    $isConnected451 = $graph->isConnected($startNode11, $startNode27);
    $isConnected452 = $graph->isConnected($startNode11, $startNode28);
    $isConnected453 = $graph->isConnected($startNode11, $startNode29);
    $isConnected454 = $graph->isConnected($startNode11, $startNode30);
    $isConnected455 = $graph->isConnected($startNode11, $startNode31);
    $isConnected456 = $graph->isConnected($startNode11, $startNode32);
    $isConnected457 = $graph->isConnected($startNode11, $startNode33);
    $isConnected458 = $graph->isConnected($startNode11, $startNode34);
    $isConnected459 = $graph->isConnected($startNode11, $startNode35);
    $isConnected460 = $graph->isConnected($startNode11, $startNode36);
    $isConnected461 = $graph->isConnected($startNode11, $startNode37);
    $isConnected462 = $graph->isConnected($startNode11, $startNode38);
    $isConnected463 = $graph->isConnected($startNode11, $startNode39);
    $isConnected464 = $graph->isConnected($startNode11, $startNode40);
    $isConnected465 = $graph->isConnected($startNode11, $startNode41);
    $isConnected466 = $graph->isConnected($startNode11, $startNode42);
    $isConnected467 = $graph->isConnected($startNode11, $startNode43);
    $isConnected468 = $graph->isConnected($startNode11, $startNode44);
    $isConnected469 = $graph->isConnected($startNode11, $startNode45);
    $isConnected470 = $graph->isConnected($startNode11, $startNode46);
    $isConnected471 = $graph->isConnected($startNode11, $startNode47);
    $isConnected472 = $graph->isConnected($startNode11, $startNode48);
    $isConnected473 = $graph->isConnected($startNode11, $startNode49);

    $isConnected474 = $graph->isConnected($startNode12, $startNode13);
    $isConnected475 = $graph->isConnected($startNode12, $startNode14);
    $isConnected476 = $graph->isConnected($startNode12, $startNode15);
    $isConnected477 = $graph->isConnected($startNode12, $startNode16);
    $isConnected478 = $graph->isConnected($startNode12, $startNode17);
    $isConnected479 = $graph->isConnected($startNode12, $startNode18);
    $isConnected480 = $graph->isConnected($startNode12, $startNode19);
    $isConnected481 = $graph->isConnected($startNode12, $startNode20);
    $isConnected482 = $graph->isConnected($startNode12, $startNode21);
    $isConnected483 = $graph->isConnected($startNode12, $startNode22);
    $isConnected484 = $graph->isConnected($startNode12, $startNode23);
    $isConnected485 = $graph->isConnected($startNode12, $startNode24);
    $isConnected486 = $graph->isConnected($startNode12, $startNode25);
    $isConnected487 = $graph->isConnected($startNode12, $startNode26);
    $isConnected488 = $graph->isConnected($startNode12, $startNode27);
    $isConnected489 = $graph->isConnected($startNode12, $startNode28);
    $isConnected490 = $graph->isConnected($startNode12, $startNode29);
    $isConnected491 = $graph->isConnected($startNode12, $startNode30);
    $isConnected492 = $graph->isConnected($startNode12, $startNode31);
    $isConnected493 = $graph->isConnected($startNode12, $startNode32);
    $isConnected494 = $graph->isConnected($startNode12, $startNode33);
    $isConnected495 = $graph->isConnected($startNode12, $startNode34);
    $isConnected496 = $graph->isConnected($startNode12, $startNode35);
    $isConnected497 = $graph->isConnected($startNode12, $startNode36);
    $isConnected498 = $graph->isConnected($startNode12, $startNode37);
    $isConnected499 = $graph->isConnected($startNode12, $startNode38);
    $isConnected500 = $graph->isConnected($startNode12, $startNode39);
    $isConnected501 = $graph->isConnected($startNode12, $startNode40);
    $isConnected502 = $graph->isConnected($startNode12, $startNode41);
    $isConnected503 = $graph->isConnected($startNode12, $startNode42);
    $isConnected504 = $graph->isConnected($startNode12, $startNode43);
    $isConnected505 = $graph->isConnected($startNode12, $startNode44);
    $isConnected506 = $graph->isConnected($startNode12, $startNode45);
    $isConnected507 = $graph->isConnected($startNode12, $startNode46);
    $isConnected508 = $graph->isConnected($startNode12, $startNode47);
    $isConnected509 = $graph->isConnected($startNode12, $startNode48);
    $isConnected510 = $graph->isConnected($startNode12, $startNode49);

    $isConnected511 = $graph->isConnected($startNode13, $startNode14);
    $isConnected512 = $graph->isConnected($startNode13, $startNode15);
    $isConnected513 = $graph->isConnected($startNode13, $startNode16);
    $isConnected514 = $graph->isConnected($startNode13, $startNode17);
    $isConnected515 = $graph->isConnected($startNode13, $startNode18);
    $isConnected516 = $graph->isConnected($startNode13, $startNode19);
    $isConnected517 = $graph->isConnected($startNode13, $startNode20);
    $isConnected518 = $graph->isConnected($startNode13, $startNode21);
    $isConnected519 = $graph->isConnected($startNode13, $startNode22);
    $isConnected520 = $graph->isConnected($startNode13, $startNode23);
    $isConnected521 = $graph->isConnected($startNode13, $startNode24);
    $isConnected522 = $graph->isConnected($startNode13, $startNode25);
    $isConnected523 = $graph->isConnected($startNode13, $startNode26);
    $isConnected524 = $graph->isConnected($startNode13, $startNode27);
    $isConnected525 = $graph->isConnected($startNode13, $startNode28);
    $isConnected526 = $graph->isConnected($startNode13, $startNode29);
    $isConnected527 = $graph->isConnected($startNode13, $startNode30);
    $isConnected528 = $graph->isConnected($startNode13, $startNode31);
    $isConnected529 = $graph->isConnected($startNode13, $startNode32);
    $isConnected530 = $graph->isConnected($startNode13, $startNode33);
    $isConnected531 = $graph->isConnected($startNode13, $startNode34);
    $isConnected532 = $graph->isConnected($startNode13, $startNode35);
    $isConnected533 = $graph->isConnected($startNode13, $startNode36);
    $isConnected534 = $graph->isConnected($startNode13, $startNode37);
    $isConnected535 = $graph->isConnected($startNode13, $startNode38);
    $isConnected536 = $graph->isConnected($startNode13, $startNode39);
    $isConnected537 = $graph->isConnected($startNode13, $startNode40);
    $isConnected538 = $graph->isConnected($startNode13, $startNode41);
    $isConnected539 = $graph->isConnected($startNode13, $startNode42);
    $isConnected540 = $graph->isConnected($startNode13, $startNode43);
    $isConnected541 = $graph->isConnected($startNode13, $startNode44);
    $isConnected542 = $graph->isConnected($startNode13, $startNode45);
    $isConnected543 = $graph->isConnected($startNode13, $startNode46);
    $isConnected544 = $graph->isConnected($startNode13, $startNode47);
    $isConnected545 = $graph->isConnected($startNode13, $startNode48);
    $isConnected546 = $graph->isConnected($startNode13, $startNode49);

    $isConnected547 = $graph->isConnected($startNode14, $startNode15);
    $isConnected548 = $graph->isConnected($startNode14, $startNode16);
    $isConnected549 = $graph->isConnected($startNode14, $startNode17);
    $isConnected550 = $graph->isConnected($startNode14, $startNode18);
    $isConnected551 = $graph->isConnected($startNode14, $startNode19);
    $isConnected552 = $graph->isConnected($startNode14, $startNode20);
    $isConnected553 = $graph->isConnected($startNode14, $startNode21);
    $isConnected554 = $graph->isConnected($startNode14, $startNode22);
    $isConnected555 = $graph->isConnected($startNode14, $startNode23);
    $isConnected556 = $graph->isConnected($startNode14, $startNode24);
    $isConnected557 = $graph->isConnected($startNode14, $startNode25);
    $isConnected558 = $graph->isConnected($startNode14, $startNode26);
    $isConnected559 = $graph->isConnected($startNode14, $startNode27);
    $isConnected560 = $graph->isConnected($startNode14, $startNode28);
    $isConnected561 = $graph->isConnected($startNode14, $startNode29);
    $isConnected562 = $graph->isConnected($startNode14, $startNode30);
    $isConnected563 = $graph->isConnected($startNode14, $startNode31);
    $isConnected564 = $graph->isConnected($startNode14, $startNode32);
    $isConnected565 = $graph->isConnected($startNode14, $startNode33);
    $isConnected566 = $graph->isConnected($startNode14, $startNode34);
    $isConnected567 = $graph->isConnected($startNode14, $startNode35);
    $isConnected568 = $graph->isConnected($startNode14, $startNode36);
    $isConnected569 = $graph->isConnected($startNode14, $startNode37);
    $isConnected570 = $graph->isConnected($startNode14, $startNode38);
    $isConnected571 = $graph->isConnected($startNode14, $startNode39);
    $isConnected572 = $graph->isConnected($startNode14, $startNode40);
    $isConnected573 = $graph->isConnected($startNode14, $startNode41);
    $isConnected574 = $graph->isConnected($startNode14, $startNode42);
    $isConnected575 = $graph->isConnected($startNode14, $startNode43);
    $isConnected576 = $graph->isConnected($startNode14, $startNode44);
    $isConnected577 = $graph->isConnected($startNode14, $startNode45);
    $isConnected578 = $graph->isConnected($startNode14, $startNode46);
    $isConnected579 = $graph->isConnected($startNode14, $startNode47);
    $isConnected580 = $graph->isConnected($startNode14, $startNode48);
    $isConnected581 = $graph->isConnected($startNode14, $startNode49);

    $isConnected582 = $graph->isConnected($startNode15, $startNode16);
    $isConnected583 = $graph->isConnected($startNode15, $startNode17);
    $isConnected584 = $graph->isConnected($startNode15, $startNode18);
    $isConnected585 = $graph->isConnected($startNode15, $startNode19);
    $isConnected586 = $graph->isConnected($startNode15, $startNode20);
    $isConnected587 = $graph->isConnected($startNode15, $startNode21);
    $isConnected588 = $graph->isConnected($startNode15, $startNode22);
    $isConnected589 = $graph->isConnected($startNode15, $startNode23);
    $isConnected590 = $graph->isConnected($startNode15, $startNode24);
    $isConnected591 = $graph->isConnected($startNode15, $startNode25);
    $isConnected592 = $graph->isConnected($startNode15, $startNode26);
    $isConnected593 = $graph->isConnected($startNode15, $startNode27);
    $isConnected594 = $graph->isConnected($startNode15, $startNode28);
    $isConnected595 = $graph->isConnected($startNode15, $startNode29);
    $isConnected596 = $graph->isConnected($startNode15, $startNode30);
    $isConnected597 = $graph->isConnected($startNode15, $startNode31);
    $isConnected598 = $graph->isConnected($startNode15, $startNode32);
    $isConnected599 = $graph->isConnected($startNode15, $startNode33);
    $isConnected600 = $graph->isConnected($startNode15, $startNode34);
    $isConnected601 = $graph->isConnected($startNode15, $startNode35);
    $isConnected602 = $graph->isConnected($startNode15, $startNode36);
    $isConnected603 = $graph->isConnected($startNode15, $startNode37);
    $isConnected604 = $graph->isConnected($startNode15, $startNode38);
    $isConnected605 = $graph->isConnected($startNode15, $startNode39);
    $isConnected606 = $graph->isConnected($startNode15, $startNode40);
    $isConnected607 = $graph->isConnected($startNode15, $startNode41);
    $isConnected608 = $graph->isConnected($startNode15, $startNode42);
    $isConnected609 = $graph->isConnected($startNode15, $startNode43);
    $isConnected610 = $graph->isConnected($startNode15, $startNode44);
    $isConnected611 = $graph->isConnected($startNode15, $startNode45);
    $isConnected612 = $graph->isConnected($startNode15, $startNode46);
    $isConnected613 = $graph->isConnected($startNode15, $startNode47);
    $isConnected614 = $graph->isConnected($startNode15, $startNode48);
    $isConnected615 = $graph->isConnected($startNode15, $startNode49);

    $isConnected616 = $graph->isConnected($startNode16, $startNode17);
    $isConnected617 = $graph->isConnected($startNode16, $startNode18);
    $isConnected618 = $graph->isConnected($startNode16, $startNode19);
    $isConnected619 = $graph->isConnected($startNode16, $startNode20);
    $isConnected620 = $graph->isConnected($startNode16, $startNode21);
    $isConnected621 = $graph->isConnected($startNode16, $startNode22);
    $isConnected622 = $graph->isConnected($startNode16, $startNode23);
    $isConnected623 = $graph->isConnected($startNode16, $startNode24);
    $isConnected624 = $graph->isConnected($startNode16, $startNode25);
    $isConnected625 = $graph->isConnected($startNode16, $startNode26);
    $isConnected626 = $graph->isConnected($startNode16, $startNode27);
    $isConnected627 = $graph->isConnected($startNode16, $startNode28);
    $isConnected628 = $graph->isConnected($startNode16, $startNode29);
    $isConnected629 = $graph->isConnected($startNode16, $startNode30);
    $isConnected630 = $graph->isConnected($startNode16, $startNode31);
    $isConnected631 = $graph->isConnected($startNode16, $startNode32);
    $isConnected632 = $graph->isConnected($startNode16, $startNode33);
    $isConnected633 = $graph->isConnected($startNode16, $startNode34);
    $isConnected634 = $graph->isConnected($startNode16, $startNode35);
    $isConnected635 = $graph->isConnected($startNode16, $startNode36);
    $isConnected636 = $graph->isConnected($startNode16, $startNode37);
    $isConnected637 = $graph->isConnected($startNode16, $startNode38);
    $isConnected638 = $graph->isConnected($startNode16, $startNode39);
    $isConnected639 = $graph->isConnected($startNode16, $startNode40);
    $isConnected640 = $graph->isConnected($startNode16, $startNode41);
    $isConnected641 = $graph->isConnected($startNode16, $startNode42);
    $isConnected642 = $graph->isConnected($startNode16, $startNode43);
    $isConnected643 = $graph->isConnected($startNode16, $startNode44);
    $isConnected644 = $graph->isConnected($startNode16, $startNode45);
    $isConnected645 = $graph->isConnected($startNode16, $startNode46);
    $isConnected646 = $graph->isConnected($startNode16, $startNode47);
    $isConnected647 = $graph->isConnected($startNode16, $startNode48);
    $isConnected648 = $graph->isConnected($startNode16, $startNode49);

    $isConnected649 = $graph->isConnected($startNode17, $startNode18);
    $isConnected650 = $graph->isConnected($startNode17, $startNode19);
    $isConnected651 = $graph->isConnected($startNode17, $startNode20);
    $isConnected652 = $graph->isConnected($startNode17, $startNode21);
    $isConnected653 = $graph->isConnected($startNode17, $startNode22);
    $isConnected654 = $graph->isConnected($startNode17, $startNode23);
    $isConnected655 = $graph->isConnected($startNode17, $startNode24);
    $isConnected656 = $graph->isConnected($startNode17, $startNode25);
    $isConnected657 = $graph->isConnected($startNode17, $startNode26);
    $isConnected658 = $graph->isConnected($startNode17, $startNode27);
    $isConnected659 = $graph->isConnected($startNode17, $startNode28);
    $isConnected660 = $graph->isConnected($startNode17, $startNode29);
    $isConnected661 = $graph->isConnected($startNode17, $startNode30);
    $isConnected662 = $graph->isConnected($startNode17, $startNode31);
    $isConnected663 = $graph->isConnected($startNode17, $startNode32);
    $isConnected664 = $graph->isConnected($startNode17, $startNode33);
    $isConnected665 = $graph->isConnected($startNode17, $startNode34);
    $isConnected666 = $graph->isConnected($startNode17, $startNode35);
    $isConnected667 = $graph->isConnected($startNode17, $startNode36);
    $isConnected668 = $graph->isConnected($startNode17, $startNode37);
    $isConnected669 = $graph->isConnected($startNode17, $startNode38);
    $isConnected670 = $graph->isConnected($startNode17, $startNode39);
    $isConnected671 = $graph->isConnected($startNode17, $startNode40);
    $isConnected672 = $graph->isConnected($startNode17, $startNode41);
    $isConnected673 = $graph->isConnected($startNode17, $startNode42);
    $isConnected674 = $graph->isConnected($startNode17, $startNode43);
    $isConnected675 = $graph->isConnected($startNode17, $startNode44);
    $isConnected676 = $graph->isConnected($startNode17, $startNode45);
    $isConnected677 = $graph->isConnected($startNode17, $startNode46);
    $isConnected678 = $graph->isConnected($startNode17, $startNode47);
    $isConnected679 = $graph->isConnected($startNode17, $startNode48);
    $isConnected680 = $graph->isConnected($startNode17, $startNode49);

    $isConnected681 = $graph->isConnected($startNode18, $startNode19);
    $isConnected682 = $graph->isConnected($startNode18, $startNode20);
    $isConnected683 = $graph->isConnected($startNode18, $startNode21);
    $isConnected684 = $graph->isConnected($startNode18, $startNode22);
    $isConnected685 = $graph->isConnected($startNode18, $startNode23);
    $isConnected686 = $graph->isConnected($startNode18, $startNode24);
    $isConnected687 = $graph->isConnected($startNode18, $startNode25);
    $isConnected688 = $graph->isConnected($startNode18, $startNode26);
    $isConnected689 = $graph->isConnected($startNode18, $startNode27);
    $isConnected690 = $graph->isConnected($startNode18, $startNode28);
    $isConnected691 = $graph->isConnected($startNode18, $startNode29);
    $isConnected692 = $graph->isConnected($startNode18, $startNode30);
    $isConnected693 = $graph->isConnected($startNode18, $startNode31);
    $isConnected694 = $graph->isConnected($startNode18, $startNode32);
    $isConnected695 = $graph->isConnected($startNode18, $startNode33);
    $isConnected696 = $graph->isConnected($startNode18, $startNode34);
    $isConnected697 = $graph->isConnected($startNode18, $startNode35);
    $isConnected698 = $graph->isConnected($startNode18, $startNode36);
    $isConnected699 = $graph->isConnected($startNode18, $startNode37);
    $isConnected700 = $graph->isConnected($startNode18, $startNode38);
    $isConnected701 = $graph->isConnected($startNode18, $startNode39);
    $isConnected702 = $graph->isConnected($startNode18, $startNode40);
    $isConnected703 = $graph->isConnected($startNode18, $startNode41);
    $isConnected704 = $graph->isConnected($startNode18, $startNode42);
    $isConnected705 = $graph->isConnected($startNode18, $startNode43);
    $isConnected706 = $graph->isConnected($startNode18, $startNode44);
    $isConnected707 = $graph->isConnected($startNode18, $startNode45);
    $isConnected708 = $graph->isConnected($startNode18, $startNode46);
    $isConnected709 = $graph->isConnected($startNode18, $startNode47);
    $isConnected710 = $graph->isConnected($startNode18, $startNode48);
    $isConnected711 = $graph->isConnected($startNode18, $startNode49);

    $isConnected712 = $graph->isConnected($startNode19, $startNode20);
    $isConnected713 = $graph->isConnected($startNode19, $startNode21);
    $isConnected714 = $graph->isConnected($startNode19, $startNode22);
    $isConnected715 = $graph->isConnected($startNode19, $startNode23);
    $isConnected716 = $graph->isConnected($startNode19, $startNode24);
    $isConnected717 = $graph->isConnected($startNode19, $startNode25);
    $isConnected718 = $graph->isConnected($startNode19, $startNode26);
    $isConnected719 = $graph->isConnected($startNode19, $startNode27);
    $isConnected720 = $graph->isConnected($startNode19, $startNode28);
    $isConnected721 = $graph->isConnected($startNode19, $startNode29);
    $isConnected722 = $graph->isConnected($startNode19, $startNode30);
    $isConnected723 = $graph->isConnected($startNode19, $startNode31);
    $isConnected724 = $graph->isConnected($startNode19, $startNode32);
    $isConnected725 = $graph->isConnected($startNode19, $startNode33);
    $isConnected726 = $graph->isConnected($startNode19, $startNode34);
    $isConnected727 = $graph->isConnected($startNode19, $startNode35);
    $isConnected728 = $graph->isConnected($startNode19, $startNode36);
    $isConnected729 = $graph->isConnected($startNode19, $startNode37);
    $isConnected730 = $graph->isConnected($startNode19, $startNode38);
    $isConnected731 = $graph->isConnected($startNode19, $startNode39);
    $isConnected732 = $graph->isConnected($startNode19, $startNode40);
    $isConnected733 = $graph->isConnected($startNode19, $startNode41);
    $isConnected734 = $graph->isConnected($startNode19, $startNode42);
    $isConnected735 = $graph->isConnected($startNode19, $startNode43);
    $isConnected736 = $graph->isConnected($startNode19, $startNode44);
    $isConnected737 = $graph->isConnected($startNode19, $startNode45);
    $isConnected738 = $graph->isConnected($startNode19, $startNode46);
    $isConnected739 = $graph->isConnected($startNode19, $startNode47);
    $isConnected740 = $graph->isConnected($startNode19, $startNode48);
    $isConnected741 = $graph->isConnected($startNode19, $startNode49);

    $isConnected742 = $graph->isConnected($startNode20, $startNode21);
    $isConnected743 = $graph->isConnected($startNode20, $startNode22);
    $isConnected744 = $graph->isConnected($startNode20, $startNode23);
    $isConnected745 = $graph->isConnected($startNode20, $startNode24);
    $isConnected746 = $graph->isConnected($startNode20, $startNode25);
    $isConnected747 = $graph->isConnected($startNode20, $startNode26);
    $isConnected748 = $graph->isConnected($startNode20, $startNode27);
    $isConnected749 = $graph->isConnected($startNode20, $startNode28);
    $isConnected750 = $graph->isConnected($startNode20, $startNode29);
    $isConnected751 = $graph->isConnected($startNode20, $startNode30);
    $isConnected752 = $graph->isConnected($startNode20, $startNode31);
    $isConnected753 = $graph->isConnected($startNode20, $startNode32);
    $isConnected754 = $graph->isConnected($startNode20, $startNode33);
    $isConnected755 = $graph->isConnected($startNode20, $startNode34);
    $isConnected756 = $graph->isConnected($startNode20, $startNode35);
    $isConnected757 = $graph->isConnected($startNode20, $startNode36);
    $isConnected758 = $graph->isConnected($startNode20, $startNode37);
    $isConnected759 = $graph->isConnected($startNode20, $startNode38);
    $isConnected760 = $graph->isConnected($startNode20, $startNode39);
    $isConnected761 = $graph->isConnected($startNode20, $startNode40);
    $isConnected762 = $graph->isConnected($startNode20, $startNode41);
    $isConnected763 = $graph->isConnected($startNode20, $startNode42);
    $isConnected764 = $graph->isConnected($startNode20, $startNode43);
    $isConnected765 = $graph->isConnected($startNode20, $startNode44);
    $isConnected766 = $graph->isConnected($startNode20, $startNode45);
    $isConnected767 = $graph->isConnected($startNode20, $startNode46);
    $isConnected768 = $graph->isConnected($startNode20, $startNode47);
    $isConnected769 = $graph->isConnected($startNode20, $startNode48);
    $isConnected770 = $graph->isConnected($startNode20, $startNode49);

    $isConnected771 = $graph->isConnected($startNode21, $startNode22);
    $isConnected772 = $graph->isConnected($startNode21, $startNode23);
    $isConnected773 = $graph->isConnected($startNode21, $startNode24);
    $isConnected774 = $graph->isConnected($startNode21, $startNode25);
    $isConnected775 = $graph->isConnected($startNode21, $startNode26);
    $isConnected776 = $graph->isConnected($startNode21, $startNode27);
    $isConnected777 = $graph->isConnected($startNode21, $startNode28);
    $isConnected778 = $graph->isConnected($startNode21, $startNode29);
    $isConnected779 = $graph->isConnected($startNode21, $startNode30);
    $isConnected780 = $graph->isConnected($startNode21, $startNode31);
    $isConnected781 = $graph->isConnected($startNode21, $startNode32);
    $isConnected782 = $graph->isConnected($startNode21, $startNode33);
    $isConnected783 = $graph->isConnected($startNode21, $startNode34);
    $isConnected784 = $graph->isConnected($startNode21, $startNode35);
    $isConnected785 = $graph->isConnected($startNode21, $startNode36);
    $isConnected786 = $graph->isConnected($startNode21, $startNode37);
    $isConnected787 = $graph->isConnected($startNode21, $startNode38);
    $isConnected788 = $graph->isConnected($startNode21, $startNode39);
    $isConnected789 = $graph->isConnected($startNode21, $startNode40);
    $isConnected790 = $graph->isConnected($startNode21, $startNode41);
    $isConnected791 = $graph->isConnected($startNode21, $startNode42);
    $isConnected792 = $graph->isConnected($startNode21, $startNode43);
    $isConnected793 = $graph->isConnected($startNode21, $startNode44);
    $isConnected794 = $graph->isConnected($startNode21, $startNode45);
    $isConnected795 = $graph->isConnected($startNode21, $startNode46);
    $isConnected796 = $graph->isConnected($startNode21, $startNode47);
    $isConnected797 = $graph->isConnected($startNode21, $startNode48);
    $isConnected798 = $graph->isConnected($startNode21, $startNode49);

    $isConnected799 = $graph->isConnected($startNode22, $startNode23);
    $isConnected800 = $graph->isConnected($startNode22, $startNode24);
    $isConnected801 = $graph->isConnected($startNode22, $startNode25);
    $isConnected802 = $graph->isConnected($startNode22, $startNode26);
    $isConnected803 = $graph->isConnected($startNode22, $startNode27);
    $isConnected804 = $graph->isConnected($startNode22, $startNode28);
    $isConnected805 = $graph->isConnected($startNode22, $startNode29);
    $isConnected806 = $graph->isConnected($startNode22, $startNode30);
    $isConnected807 = $graph->isConnected($startNode22, $startNode31);
    $isConnected808 = $graph->isConnected($startNode22, $startNode32);
    $isConnected809 = $graph->isConnected($startNode22, $startNode33);
    $isConnected810 = $graph->isConnected($startNode22, $startNode34);
    $isConnected811 = $graph->isConnected($startNode22, $startNode35);
    $isConnected812 = $graph->isConnected($startNode22, $startNode36);
    $isConnected813 = $graph->isConnected($startNode22, $startNode37);
    $isConnected814 = $graph->isConnected($startNode22, $startNode38);
    $isConnected815 = $graph->isConnected($startNode22, $startNode39);
    $isConnected816 = $graph->isConnected($startNode22, $startNode40);
    $isConnected817 = $graph->isConnected($startNode22, $startNode41);
    $isConnected818 = $graph->isConnected($startNode22, $startNode42);
    $isConnected819 = $graph->isConnected($startNode22, $startNode43);
    $isConnected820 = $graph->isConnected($startNode22, $startNode44);
    $isConnected821 = $graph->isConnected($startNode22, $startNode45);
    $isConnected822 = $graph->isConnected($startNode22, $startNode46);
    $isConnected823 = $graph->isConnected($startNode22, $startNode47);
    $isConnected824 = $graph->isConnected($startNode22, $startNode48);
    $isConnected825 = $graph->isConnected($startNode22, $startNode49);

    $isConnected862 = $graph->isConnected($startNode23, $startNode24);
    $isConnected827 = $graph->isConnected($startNode23, $startNode25);
    $isConnected828 = $graph->isConnected($startNode23, $startNode26);
    $isConnected829 = $graph->isConnected($startNode23, $startNode27);
    $isConnected830 = $graph->isConnected($startNode23, $startNode28);
    $isConnected831 = $graph->isConnected($startNode23, $startNode29);
    $isConnected832 = $graph->isConnected($startNode23, $startNode30);
    $isConnected833 = $graph->isConnected($startNode23, $startNode31);
    $isConnected834 = $graph->isConnected($startNode23, $startNode32);
    $isConnected835 = $graph->isConnected($startNode23, $startNode33);
    $isConnected836 = $graph->isConnected($startNode23, $startNode34);
    $isConnected837 = $graph->isConnected($startNode23, $startNode35);
    $isConnected838 = $graph->isConnected($startNode23, $startNode36);
    $isConnected839 = $graph->isConnected($startNode23, $startNode37);
    $isConnected840 = $graph->isConnected($startNode23, $startNode38);
    $isConnected841 = $graph->isConnected($startNode23, $startNode39);
    $isConnected842 = $graph->isConnected($startNode23, $startNode40);
    $isConnected843 = $graph->isConnected($startNode23, $startNode41);
    $isConnected844 = $graph->isConnected($startNode23, $startNode42);
    $isConnected845 = $graph->isConnected($startNode23, $startNode43);
    $isConnected846 = $graph->isConnected($startNode23, $startNode44);
    $isConnected847 = $graph->isConnected($startNode23, $startNode45);
    $isConnected848 = $graph->isConnected($startNode23, $startNode46);
    $isConnected849 = $graph->isConnected($startNode23, $startNode47);
    $isConnected850 = $graph->isConnected($startNode23, $startNode48);
    $isConnected851 = $graph->isConnected($startNode23, $startNode49);

    $isConnected852 = $graph->isConnected($startNode24, $startNode25);
    $isConnected853 = $graph->isConnected($startNode24, $startNode26);
    $isConnected854 = $graph->isConnected($startNode24, $startNode27);
    $isConnected855 = $graph->isConnected($startNode24, $startNode28);
    $isConnected856 = $graph->isConnected($startNode24, $startNode29);
    $isConnected857 = $graph->isConnected($startNode24, $startNode30);
    $isConnected858 = $graph->isConnected($startNode24, $startNode31);
    $isConnected859 = $graph->isConnected($startNode24, $startNode32);
    $isConnected860 = $graph->isConnected($startNode24, $startNode33);
    $isConnected861 = $graph->isConnected($startNode24, $startNode34);
    $isConnected862 = $graph->isConnected($startNode24, $startNode35);
    $isConnected863 = $graph->isConnected($startNode24, $startNode36);
    $isConnected864 = $graph->isConnected($startNode24, $startNode37);
    $isConnected865 = $graph->isConnected($startNode24, $startNode38);
    $isConnected866 = $graph->isConnected($startNode24, $startNode39);
    $isConnected867 = $graph->isConnected($startNode24, $startNode40);
    $isConnected868 = $graph->isConnected($startNode24, $startNode41);
    $isConnected869 = $graph->isConnected($startNode24, $startNode42);
    $isConnected870 = $graph->isConnected($startNode24, $startNode43);
    $isConnected871 = $graph->isConnected($startNode24, $startNode44);
    $isConnected872 = $graph->isConnected($startNode24, $startNode45);
    $isConnected873 = $graph->isConnected($startNode24, $startNode46);
    $isConnected874 = $graph->isConnected($startNode24, $startNode47);
    $isConnected875 = $graph->isConnected($startNode24, $startNode48);
    $isConnected876 = $graph->isConnected($startNode24, $startNode49);

    $isConnected877 = $graph->isConnected($startNode25, $startNode26);
    $isConnected878 = $graph->isConnected($startNode25, $startNode27);
    $isConnected879 = $graph->isConnected($startNode25, $startNode28);
    $isConnected880 = $graph->isConnected($startNode25, $startNode29);
    $isConnected881 = $graph->isConnected($startNode25, $startNode30);
    $isConnected882 = $graph->isConnected($startNode25, $startNode31);
    $isConnected883 = $graph->isConnected($startNode25, $startNode32);
    $isConnected884 = $graph->isConnected($startNode25, $startNode33);
    $isConnected885 = $graph->isConnected($startNode25, $startNode34);
    $isConnected886 = $graph->isConnected($startNode25, $startNode35);
    $isConnected887 = $graph->isConnected($startNode25, $startNode36);
    $isConnected888 = $graph->isConnected($startNode25, $startNode37);
    $isConnected889 = $graph->isConnected($startNode25, $startNode38);
    $isConnected890 = $graph->isConnected($startNode25, $startNode39);
    $isConnected891 = $graph->isConnected($startNode25, $startNode40);
    $isConnected892 = $graph->isConnected($startNode25, $startNode41);
    $isConnected893 = $graph->isConnected($startNode25, $startNode42);
    $isConnected894 = $graph->isConnected($startNode25, $startNode43);
    $isConnected895 = $graph->isConnected($startNode25, $startNode44);
    $isConnected896 = $graph->isConnected($startNode25, $startNode45);
    $isConnected897 = $graph->isConnected($startNode25, $startNode46);
    $isConnected898 = $graph->isConnected($startNode25, $startNode47);
    $isConnected899 = $graph->isConnected($startNode25, $startNode48);
    $isConnected900 = $graph->isConnected($startNode25, $startNode49);

    $isConnected901 = $graph->isConnected($startNode26, $startNode27);
    $isConnected902 = $graph->isConnected($startNode26, $startNode28);
    $isConnected903 = $graph->isConnected($startNode26, $startNode29);
    $isConnected904 = $graph->isConnected($startNode26, $startNode30);
    $isConnected905 = $graph->isConnected($startNode26, $startNode31);
    $isConnected906 = $graph->isConnected($startNode26, $startNode32);
    $isConnected907 = $graph->isConnected($startNode26, $startNode33);
    $isConnected908 = $graph->isConnected($startNode26, $startNode34);
    $isConnected909 = $graph->isConnected($startNode26, $startNode35);
    $isConnected910 = $graph->isConnected($startNode26, $startNode36);
    $isConnected911 = $graph->isConnected($startNode26, $startNode37);
    $isConnected912 = $graph->isConnected($startNode26, $startNode38);
    $isConnected913 = $graph->isConnected($startNode26, $startNode39);
    $isConnected914 = $graph->isConnected($startNode26, $startNode40);
    $isConnected915 = $graph->isConnected($startNode26, $startNode41);
    $isConnected916 = $graph->isConnected($startNode26, $startNode42);
    $isConnected917 = $graph->isConnected($startNode26, $startNode43);
    $isConnected918 = $graph->isConnected($startNode26, $startNode44);
    $isConnected919 = $graph->isConnected($startNode26, $startNode45);
    $isConnected920 = $graph->isConnected($startNode26, $startNode46);
    $isConnected921 = $graph->isConnected($startNode26, $startNode47);
    $isConnected922 = $graph->isConnected($startNode26, $startNode48);
    $isConnected923 = $graph->isConnected($startNode26, $startNode49);

    $isConnected924 = $graph->isConnected($startNode27, $startNode28);
    $isConnected925 = $graph->isConnected($startNode27, $startNode29);
    $isConnected926 = $graph->isConnected($startNode27, $startNode30);
    $isConnected927 = $graph->isConnected($startNode27, $startNode31);
    $isConnected928 = $graph->isConnected($startNode27, $startNode32);
    $isConnected929 = $graph->isConnected($startNode27, $startNode33);
    $isConnected930 = $graph->isConnected($startNode27, $startNode34);
    $isConnected931 = $graph->isConnected($startNode27, $startNode35);
    $isConnected932 = $graph->isConnected($startNode27, $startNode36);
    $isConnected933 = $graph->isConnected($startNode27, $startNode37);
    $isConnected934 = $graph->isConnected($startNode27, $startNode38);
    $isConnected935 = $graph->isConnected($startNode27, $startNode39);
    $isConnected936 = $graph->isConnected($startNode27, $startNode40);
    $isConnected937 = $graph->isConnected($startNode27, $startNode41);
    $isConnected938 = $graph->isConnected($startNode27, $startNode42);
    $isConnected939 = $graph->isConnected($startNode27, $startNode43);
    $isConnected940 = $graph->isConnected($startNode27, $startNode44);
    $isConnected941 = $graph->isConnected($startNode27, $startNode45);
    $isConnected942 = $graph->isConnected($startNode27, $startNode46);
    $isConnected943 = $graph->isConnected($startNode27, $startNode47);
    $isConnected944 = $graph->isConnected($startNode27, $startNode48);
    $isConnected945 = $graph->isConnected($startNode27, $startNode49);

    $isConnected946 = $graph->isConnected($startNode28, $startNode29);
    $isConnected947 = $graph->isConnected($startNode28, $startNode30);
    $isConnected948 = $graph->isConnected($startNode28, $startNode31);
    $isConnected949 = $graph->isConnected($startNode28, $startNode32);
    $isConnected950 = $graph->isConnected($startNode28, $startNode33);
    $isConnected951 = $graph->isConnected($startNode28, $startNode34);
    $isConnected952 = $graph->isConnected($startNode28, $startNode35);
    $isConnected953 = $graph->isConnected($startNode28, $startNode36);
    $isConnected954 = $graph->isConnected($startNode28, $startNode37);
    $isConnected955 = $graph->isConnected($startNode28, $startNode38);
    $isConnected956 = $graph->isConnected($startNode28, $startNode39);
    $isConnected957 = $graph->isConnected($startNode28, $startNode40);
    $isConnected958 = $graph->isConnected($startNode28, $startNode41);
    $isConnected959 = $graph->isConnected($startNode28, $startNode42);
    $isConnected960 = $graph->isConnected($startNode28, $startNode43);
    $isConnected961 = $graph->isConnected($startNode28, $startNode44);
    $isConnected962 = $graph->isConnected($startNode28, $startNode45);
    $isConnected963 = $graph->isConnected($startNode28, $startNode46);
    $isConnected964 = $graph->isConnected($startNode28, $startNode47);
    $isConnected965 = $graph->isConnected($startNode28, $startNode48);
    $isConnected966 = $graph->isConnected($startNode28, $startNode49);

    $isConnected967 = $graph->isConnected($startNode29, $startNode30);
    $isConnected968 = $graph->isConnected($startNode29, $startNode31);
    $isConnected969 = $graph->isConnected($startNode29, $startNode32);
    $isConnected970 = $graph->isConnected($startNode29, $startNode33);
    $isConnected971 = $graph->isConnected($startNode29, $startNode34);
    $isConnected972 = $graph->isConnected($startNode29, $startNode35);
    $isConnected973 = $graph->isConnected($startNode29, $startNode36);
    $isConnected974 = $graph->isConnected($startNode29, $startNode37);
    $isConnected975 = $graph->isConnected($startNode29, $startNode38);
    $isConnected976 = $graph->isConnected($startNode29, $startNode39);
    $isConnected977 = $graph->isConnected($startNode29, $startNode40);
    $isConnected978 = $graph->isConnected($startNode29, $startNode41);
    $isConnected979 = $graph->isConnected($startNode29, $startNode42);
    $isConnected980 = $graph->isConnected($startNode29, $startNode43);
    $isConnected981 = $graph->isConnected($startNode29, $startNode44);
    $isConnected982 = $graph->isConnected($startNode29, $startNode45);
    $isConnected983 = $graph->isConnected($startNode29, $startNode46);
    $isConnected984 = $graph->isConnected($startNode29, $startNode47);
    $isConnected985 = $graph->isConnected($startNode29, $startNode48);
    $isConnected986 = $graph->isConnected($startNode29, $startNode49);

    $isConnected987 = $graph->isConnected($startNode30, $startNode31);
    $isConnected988 = $graph->isConnected($startNode30, $startNode32);
    $isConnected989 = $graph->isConnected($startNode30, $startNode33);
    $isConnected990 = $graph->isConnected($startNode30, $startNode34);
    $isConnected991 = $graph->isConnected($startNode30, $startNode35);
    $isConnected992 = $graph->isConnected($startNode30, $startNode36);
    $isConnected993 = $graph->isConnected($startNode30, $startNode37);
    $isConnected994 = $graph->isConnected($startNode30, $startNode38);
    $isConnected995 = $graph->isConnected($startNode30, $startNode39);
    $isConnected996 = $graph->isConnected($startNode30, $startNode40);
    $isConnected997 = $graph->isConnected($startNode30, $startNode41);
    $isConnected998 = $graph->isConnected($startNode30, $startNode42);
    $isConnected999 = $graph->isConnected($startNode30, $startNode43);
    $isConnected1000 = $graph->isConnected($startNode30, $startNode44);
    $isConnected1001 = $graph->isConnected($startNode30, $startNode45);
    $isConnected1002 = $graph->isConnected($startNode30, $startNode46);
    $isConnected1003 = $graph->isConnected($startNode30, $startNode47);
    $isConnected1004 = $graph->isConnected($startNode30, $startNode48);
    $isConnected1005 = $graph->isConnected($startNode30, $startNode49);

    $isConnected1006 = $graph->isConnected($startNode31, $startNode32);
    $isConnected1007 = $graph->isConnected($startNode31, $startNode33);
    $isConnected1008 = $graph->isConnected($startNode31, $startNode34);
    $isConnected1009 = $graph->isConnected($startNode31, $startNode35);
    $isConnected1010 = $graph->isConnected($startNode31, $startNode36);
    $isConnected1011 = $graph->isConnected($startNode31, $startNode37);
    $isConnected1012 = $graph->isConnected($startNode31, $startNode38);
    $isConnected1013 = $graph->isConnected($startNode31, $startNode39);
    $isConnected1014 = $graph->isConnected($startNode31, $startNode40);
    $isConnected1015 = $graph->isConnected($startNode31, $startNode41);
    $isConnected1016 = $graph->isConnected($startNode31, $startNode42);
    $isConnected1017 = $graph->isConnected($startNode31, $startNode43);
    $isConnected1018 = $graph->isConnected($startNode31, $startNode44);
    $isConnected1019 = $graph->isConnected($startNode31, $startNode45);
    $isConnected1020 = $graph->isConnected($startNode31, $startNode46);
    $isConnected1021 = $graph->isConnected($startNode31, $startNode47);
    $isConnected1022 = $graph->isConnected($startNode31, $startNode48);
    $isConnected1023 = $graph->isConnected($startNode31, $startNode49);

    $isConnected1024 = $graph->isConnected($startNode32, $startNode33);
    $isConnected1025 = $graph->isConnected($startNode32, $startNode34);
    $isConnected1026 = $graph->isConnected($startNode32, $startNode35);
    $isConnected1027 = $graph->isConnected($startNode32, $startNode36);
    $isConnected1028 = $graph->isConnected($startNode32, $startNode37);
    $isConnected1029 = $graph->isConnected($startNode32, $startNode38);
    $isConnected1030 = $graph->isConnected($startNode32, $startNode39);
    $isConnected1031 = $graph->isConnected($startNode32, $startNode40);
    $isConnected1032 = $graph->isConnected($startNode32, $startNode41);
    $isConnected1033 = $graph->isConnected($startNode32, $startNode42);
    $isConnected1034 = $graph->isConnected($startNode32, $startNode43);
    $isConnected1035 = $graph->isConnected($startNode32, $startNode44);
    $isConnected1036 = $graph->isConnected($startNode32, $startNode45);
    $isConnected1037 = $graph->isConnected($startNode32, $startNode46);
    $isConnected1038 = $graph->isConnected($startNode32, $startNode47);
    $isConnected1039 = $graph->isConnected($startNode32, $startNode48);
    $isConnected1040 = $graph->isConnected($startNode32, $startNode49);

    $isConnected1041 = $graph->isConnected($startNode33, $startNode34);
    $isConnected1042 = $graph->isConnected($startNode33, $startNode35);
    $isConnected1043 = $graph->isConnected($startNode33, $startNode36);
    $isConnected1044 = $graph->isConnected($startNode33, $startNode37);
    $isConnected1045 = $graph->isConnected($startNode33, $startNode38);
    $isConnected1046 = $graph->isConnected($startNode33, $startNode39);
    $isConnected1047 = $graph->isConnected($startNode33, $startNode40);
    $isConnected1048 = $graph->isConnected($startNode33, $startNode41);
    $isConnected1049 = $graph->isConnected($startNode33, $startNode42);
    $isConnected1050 = $graph->isConnected($startNode33, $startNode43);
    $isConnected1051 = $graph->isConnected($startNode33, $startNode44);
    $isConnected1052 = $graph->isConnected($startNode33, $startNode45);
    $isConnected1053 = $graph->isConnected($startNode33, $startNode46);
    $isConnected1054 = $graph->isConnected($startNode33, $startNode47);
    $isConnected1055 = $graph->isConnected($startNode33, $startNode48);
    $isConnected1056 = $graph->isConnected($startNode33, $startNode49);

    $isConnected1057 = $graph->isConnected($startNode34, $startNode35);
    $isConnected1058 = $graph->isConnected($startNode34, $startNode36);
    $isConnected1059 = $graph->isConnected($startNode34, $startNode37);
    $isConnected1060 = $graph->isConnected($startNode34, $startNode38);
    $isConnected1061 = $graph->isConnected($startNode34, $startNode39);
    $isConnected1062 = $graph->isConnected($startNode34, $startNode40);
    $isConnected1063 = $graph->isConnected($startNode34, $startNode41);
    $isConnected1064 = $graph->isConnected($startNode34, $startNode42);
    $isConnected1065 = $graph->isConnected($startNode34, $startNode43);
    $isConnected1066 = $graph->isConnected($startNode34, $startNode44);
    $isConnected1067 = $graph->isConnected($startNode34, $startNode45);
    $isConnected1068 = $graph->isConnected($startNode34, $startNode46);
    $isConnected1069 = $graph->isConnected($startNode34, $startNode47);
    $isConnected1070 = $graph->isConnected($startNode34, $startNode48);
    $isConnected1071 = $graph->isConnected($startNode34, $startNode49);

    $isConnected1072 = $graph->isConnected($startNode35, $startNode36);
    $isConnected1073 = $graph->isConnected($startNode35, $startNode37);
    $isConnected1074 = $graph->isConnected($startNode35, $startNode38);
    $isConnected1075 = $graph->isConnected($startNode35, $startNode39);
    $isConnected1076 = $graph->isConnected($startNode35, $startNode40);
    $isConnected1077 = $graph->isConnected($startNode35, $startNode41);
    $isConnected1078 = $graph->isConnected($startNode35, $startNode42);
    $isConnected1079 = $graph->isConnected($startNode35, $startNode43);
    $isConnected1080 = $graph->isConnected($startNode35, $startNode44);
    $isConnected1081 = $graph->isConnected($startNode35, $startNode45);
    $isConnected1082 = $graph->isConnected($startNode35, $startNode46);
    $isConnected1083 = $graph->isConnected($startNode35, $startNode47);
    $isConnected1084 = $graph->isConnected($startNode35, $startNode48);
    $isConnected1085 = $graph->isConnected($startNode35, $startNode49);

    $isConnected1086 = $graph->isConnected($startNode36, $startNode37);
    $isConnected1087 = $graph->isConnected($startNode36, $startNode38);
    $isConnected1088 = $graph->isConnected($startNode36, $startNode39);
    $isConnected1089 = $graph->isConnected($startNode36, $startNode40);
    $isConnected1090 = $graph->isConnected($startNode36, $startNode41);
    $isConnected1091 = $graph->isConnected($startNode36, $startNode42);
    $isConnected1092 = $graph->isConnected($startNode36, $startNode43);
    $isConnected1093 = $graph->isConnected($startNode36, $startNode44);
    $isConnected1094 = $graph->isConnected($startNode36, $startNode45);
    $isConnected1095 = $graph->isConnected($startNode36, $startNode46);
    $isConnected1096 = $graph->isConnected($startNode36, $startNode47);
    $isConnected1097 = $graph->isConnected($startNode36, $startNode48);
    $isConnected1098 = $graph->isConnected($startNode36, $startNode49);

    $isConnected1099 = $graph->isConnected($startNode37, $startNode38);
    $isConnected1100 = $graph->isConnected($startNode37, $startNode39);
    $isConnected1101 = $graph->isConnected($startNode37, $startNode40);
    $isConnected1102 = $graph->isConnected($startNode37, $startNode41);
    $isConnected1103 = $graph->isConnected($startNode37, $startNode42);
    $isConnected1104 = $graph->isConnected($startNode37, $startNode43);
    $isConnected1105 = $graph->isConnected($startNode37, $startNode44);
    $isConnected1106 = $graph->isConnected($startNode37, $startNode45);
    $isConnected1107 = $graph->isConnected($startNode37, $startNode46);
    $isConnected1108 = $graph->isConnected($startNode37, $startNode47);
    $isConnected1109 = $graph->isConnected($startNode37, $startNode48);
    $isConnected1110 = $graph->isConnected($startNode37, $startNode49);

    $isConnected1111 = $graph->isConnected($startNode38, $startNode39);
    $isConnected1112 = $graph->isConnected($startNode38, $startNode40);
    $isConnected1113 = $graph->isConnected($startNode38, $startNode41);
    $isConnected1114 = $graph->isConnected($startNode38, $startNode42);
    $isConnected1115 = $graph->isConnected($startNode38, $startNode43);
    $isConnected1116 = $graph->isConnected($startNode38, $startNode44);
    $isConnected1117 = $graph->isConnected($startNode38, $startNode45);
    $isConnected1118 = $graph->isConnected($startNode38, $startNode46);
    $isConnected1119 = $graph->isConnected($startNode38, $startNode47);
    $isConnected1120 = $graph->isConnected($startNode38, $startNode48);
    $isConnected1121 = $graph->isConnected($startNode38, $startNode49);

    $isConnected1122 = $graph->isConnected($startNode39, $startNode40);
    $isConnected1123 = $graph->isConnected($startNode39, $startNode41);
    $isConnected1124 = $graph->isConnected($startNode39, $startNode42);
    $isConnected1125 = $graph->isConnected($startNode39, $startNode43);
    $isConnected1126 = $graph->isConnected($startNode39, $startNode44);
    $isConnected1127 = $graph->isConnected($startNode39, $startNode45);
    $isConnected1128 = $graph->isConnected($startNode39, $startNode46);
    $isConnected1129 = $graph->isConnected($startNode39, $startNode47);
    $isConnected1130 = $graph->isConnected($startNode39, $startNode48);
    $isConnected1131 = $graph->isConnected($startNode39, $startNode49);

    $isConnected1132 = $graph->isConnected($startNode40, $startNode41);
    $isConnected1133 = $graph->isConnected($startNode40, $startNode42);
    $isConnected1134 = $graph->isConnected($startNode40, $startNode43);
    $isConnected1135 = $graph->isConnected($startNode40, $startNode44);
    $isConnected1136 = $graph->isConnected($startNode40, $startNode45);
    $isConnected1137 = $graph->isConnected($startNode40, $startNode46);
    $isConnected1138 = $graph->isConnected($startNode40, $startNode47);
    $isConnected1139 = $graph->isConnected($startNode40, $startNode48);
    $isConnected1140 = $graph->isConnected($startNode40, $startNode49);

    $isConnected1141 = $graph->isConnected($startNode41, $startNode42);
    $isConnected1142 = $graph->isConnected($startNode41, $startNode43);
    $isConnected1143 = $graph->isConnected($startNode41, $startNode44);
    $isConnected1144 = $graph->isConnected($startNode41, $startNode45);
    $isConnected1145 = $graph->isConnected($startNode41, $startNode46);
    $isConnected1146 = $graph->isConnected($startNode41, $startNode47);
    $isConnected1147 = $graph->isConnected($startNode41, $startNode48);
    $isConnected1148 = $graph->isConnected($startNode41, $startNode49);

    $isConnected1149 = $graph->isConnected($startNode42, $startNode43);
    $isConnected1150 = $graph->isConnected($startNode42, $startNode44);
    $isConnected1151 = $graph->isConnected($startNode42, $startNode45);
    $isConnected1152 = $graph->isConnected($startNode42, $startNode46);
    $isConnected1153 = $graph->isConnected($startNode42, $startNode47);
    $isConnected1154 = $graph->isConnected($startNode42, $startNode48);
    $isConnected1155 = $graph->isConnected($startNode42, $startNode49);

    $isConnected1156 = $graph->isConnected($startNode43, $startNode44);
    $isConnected1157 = $graph->isConnected($startNode43, $startNode45);
    $isConnected1158 = $graph->isConnected($startNode43, $startNode46);
    $isConnected1159 = $graph->isConnected($startNode43, $startNode47);
    $isConnected1160 = $graph->isConnected($startNode43, $startNode48);
    $isConnected1161 = $graph->isConnected($startNode43, $startNode49);

    $isConnected1162 = $graph->isConnected($startNode44, $startNode45);
    $isConnected1163 = $graph->isConnected($startNode44, $startNode46);
    $isConnected1164 = $graph->isConnected($startNode44, $startNode47);
    $isConnected1165 = $graph->isConnected($startNode44, $startNode48);
    $isConnected1166 = $graph->isConnected($startNode44, $startNode49);

    $isConnected1167 = $graph->isConnected($startNode45, $startNode46);
    $isConnected1168 = $graph->isConnected($startNode45, $startNode47);
    $isConnected1169 = $graph->isConnected($startNode45, $startNode48);
    $isConnected1170 = $graph->isConnected($startNode45, $startNode49);

    $isConnected1171 = $graph->isConnected($startNode46, $startNode47);
    $isConnected1172 = $graph->isConnected($startNode46, $startNode48);
    $isConnected1173 = $graph->isConnected($startNode46, $startNode49);

    $isConnected1174 = $graph->isConnected($startNode47, $startNode48);
    $isConnected1175 = $graph->isConnected($startNode47, $startNode49);

    $isConnected1176 = $graph->isConnected($startNode48, $startNode49);

    // Membuat pesan yang sesuai berdasarkan hasil ketersambungan
    if ($isConnected1 && 
        $isConnected2 && 
        $isConnected3 &&
        $isConnected4 &&
        $isConnected5 &&
        $isConnected6 &&
        $isConnected7 &&
        $isConnected8 &&
        $isConnected9 &&
        $isConnected10 &&
        $isConnected11 &&
        $isConnected12 &&
        $isConnected13 &&
        $isConnected14 &&
        $isConnected15 &&
        $isConnected16 &&
        $isConnected17 &&
        $isConnected18 &&
        $isConnected19 &&
        $isConnected20 &&
        $isConnected21 &&
        $isConnected22 &&
        $isConnected23 &&
        $isConnected24 &&
        $isConnected25 &&
        $isConnected26 &&
        $isConnected27 &&
        $isConnected28 &&
        $isConnected29 &&
        $isConnected30 &&
        $isConnected31 &&
        $isConnected32 &&
        $isConnected33 &&
        $isConnected34 &&
        $isConnected35 &&
        $isConnected36 &&
        $isConnected37 &&
        $isConnected38 &&
        $isConnected39 &&
        $isConnected40 &&
        $isConnected41 &&
        $isConnected42 &&
        $isConnected43 &&
        $isConnected44 &&
        $isConnected45 &&
        $isConnected46 &&
        $isConnected47 &&
        $isConnected48 &&
        $isConnected49){
        $message = "Penyusunan Rencana Studi Sudah Efektif";
    } else {
        $message = "Penyusunan Rencana Studi Belum Efektif";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Study Plan Checker by Kelompok 6</title>
    <style>
        body {
            font-family: Roboto, sans-serif;
            margin: 20px;
        }
        label {
            font-weight: bold;
        }
        select {
            width: 400px;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #2a5c8e;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            font-weight: bold;
        }

    </style>

<div class="d-flex justify-content-center">
<header class="w-auto">
    <center>
    <figure>
    <img src="img/logoUNS.png" alt="logo" style="width:20%">
    </figure>
    <h2 class="fw-bold my-1 form mb-5 text-center">Penyusunan Rencana Studi Prodi Informatika UNS</h2>
    </center>
</header>
</div>


<div class="container">
    <div class="row">
        <div class="col-6">
            <!--Semester 1-->
            <form method="POST" action="">
                <!--Semester 1-->
                <label for="startNode1">Semester 1:</label><br>
                <select id="startNode1" name="startNode1">
                    <option>Pilih Matkul</option>
                    <option value="1">Agama</option>
                </select>

                <label for="startNode2"></label>
                <select id="startNode2" name="startNode2">
                    <option>Pilih Matkul</option>
                    <option value="2">Konsep Pemrograman </option>
                </select>

                <label for="startNode3"></label><br>
                <select id="startNode3" name="startNode3">
                    <option>Pilih Matkul</option>
                    <option value="3">Sistem Digital </option>
                </select>

                <label for="startNode4"></label><br>
                <select id="startNode4" name="startNode4">
                    <option>Pilih Matkul</option>    
                    <option value="4">Kalkulus I</option>
                </select>

                <label for="startNode5"></label><br>
                <select id="startNode5" name="startNode5">
                    <option>Pilih Matkul</option>
                    <option value="5">Fisika </option>
                </select>

                <label for="startNode6"></label><br>
                <select id="startNode6" name="startNode6">
                    <option>Pilih Matkul</option>
                    <option value="6">Bahasa Inggris</option>
                </select>

                <label for="startNode7"></label><br>
                <select id="startNode7" name="startNode7">
                    <option>Pilih Matkul</option>
                    <option value="7">Statistika & Probabilitas</option>
                </select>

                <label for="startNode8"></label><br>
                <select id="startNode8" name="startNode8">
                    <option>Pilih Matkul</option>
                    <option value="8">Bahasa Indonesia </option>
                </select><br>

                <!--Semester 3-->
                <label for="startNode16">Semester 3:</label><br>
                <select id="startNode16" name="startNode16">
                    <option>Pilih Matkul</option>
                    <option value="16">Matematika Diskrit II</option>
                </select>

                <label for="startNode17"><label>
                <select id="startNode17" name="startNode17">
                    <option>Pilih Matkul</option>
                    <option value="17">Pemrograman Berorientasi Objek</option>
                </select>

                <label for="startNode18"><label>
                <select id="startNode18" name="startNode18">
                    <option>Pilih Matkul</option>
                    <option value="18">Basis Data</option>
                </select>

                <label for="startNode19"><label>
                <select id="startNode19" name="startNode19">
                    <option>Pilih Matkul</option>
                    <option value="19">Sistem Operasi</option>
                </select>

                <label for="startNode20"><label>
                <select id="startNod20" name="startNode20">
                    <option>Pilih Matkul</option>
                    <option value="20">Kewarganegaraan</option>
                </select>
        
                <label for="startNode21"><label>
                <select id="startNode21" name="startNode21">
                    <option>Pilih Matkul</option>
                    <option value="21">Metode Numerik </option>
                </select>
        
                <label for="startNode22"><label>
                <select id="startNode22" name="startNode22">
                    <option>Pilih Matkul</option>
                    <option value="22">Desain & Analisis Algoritma</option>
                </select><br>
        
                <!--Semester 5-->
                <label for="startNode29">Semester 5:</label><br>
                <select id="startNode29" name="startNode29">
                    <option>Pilih Matkul</option>
                    <option value="29">Data Mining</option>
                </select>
        
                <label for="startNode30"><label>
                <select id="startNode30" name="startNode30">
                    <option>Pilih Matkul</option>
                    <option value="30">Interaksi Manusia & Komputer</option>
                </select>
        
                <label for="startNode31"><label>
                <select id="startNode31" name="startNode31">
                    <option>Pilih Matkul</option>
                    <option value="31">Sistem Terdistribusi</option>
                </select>
        
                <label for="startNode32"><label>
                <select id="startNode32" name="startNode32">
                    <option>Pilih Matkul</option>
                    <option value="32">Pengolahan Citra Digital</option>
                </select><br>

                <!--Wajib Minat Semester 5-->
                <label for="startNode33">Wajib Minat Semester 5:</label><br>
                <select id="startNode33" name="startNode33">
                    <option>Pilih Matkul</option>
                    <option value="33">Machine Learning</option>
                    <option value="34">Pengolahan Sinyal Digital</option>
                    <option value="35">Manajemen Jaringan</option>
                    <option value="36">Basis Data Lanjut</option>
                </select><br>


                <!--Pilihan1 Semester 5-->
                <label for="startNode34">Pilihan Semester 5:</label><br>
                <select id="startNode34" name="startNode34">
                    <option>Pilih Matkul</option>
                    <option value="37">Logika Samar</option>
                    <option value="38">Riset Operasi</option>
                    <option value="39">Komputasi Grid</option>
                    <option value="40">Kriptografi</option>
                    <option value="41">Wireless & Mobile Computing</option>
                    <option value="42">Biometric</option>
                    <option value="43">Teori Game</option>
                    <option value="44">Manajemen Sistem Informasi</option>
                    <option value="45">Metode Formal</option>
                    <option value="46">Model-Based Programming</option>
                    <option value="47">Robotika</option>
                </select>

                <!--Pilihan2 Semester 5-->
                <label for="startNode35"><label>
                <select id="startNode35" name="startNode35">
                    <option>Pilih Matkul</option>
                    <option value="37">Logika Samar</option>
                    <option value="38">Riset Operasi</option>
                    <option value="39">Komputasi Grid</option>
                    <option value="40">Kriptografi</option>
                    <option value="41">Wireless & Mobile Computing</option>
                    <option value="42">Biometric</option>
                    <option value="43">Teori Game</option>
                    <option value="44">Manajemen Sistem Informasi</option>
                    <option value="45">Metode Formal</option>
                    <option value="46">Model-Based Programming</option>
                    <option value="47">Robotika</option>
                </select><br>

                <!--Semester 7-->
                <label for="startNode43">Semester 7:</label><br>
                <select id="startNode43" name="startNode43">
                    <option>Pilih Matkul</option>
                    <option value="67">Etika Profesi</option>
                </select><br>

                <select id="startNode44" name="startNode44">
                    <option>Pilih Matkul</option>
                    <option value="68">KKN</option>
                </select><br>

                <select id="startNode45" name="startNode45">
                    <option>Pilih Matkul</option>
                    <option value="69">Kewirausahaan</option>
                </select><br>

                <!--Wajib Minat Semester 7-->
                <label for="startNode46">Minat Wajib Semester 7:</label><br>
                <select id="startNode46" name="startNode46">
                    <option>Pilih Matkul</option>
                    <option value="70">Kecerdasan Komputasional</option>
                    <option value="71">Computer Vision</option>
                    <option value="72">Teknologi IoT</option>
                    <option value="73">Semantic Web</option>
                </select><br>

                <!--Pilihan Semester 7-->
                <label for="startNode47">Pilihan Semester 7:</label><br>
                <select id="startNode47" name="startNode47">
                    <option>Pilih Matkul</option>
                    <option value="74">E-commerce</option>
                    <option value="75">Simulasi & Pemodelan</option>
                    <option value="76">Forensik Digital</option>
                    <option value="77">Komputasi Biomedik</option>
                    <option value="78">Enterprice Architecture</option>
                    <option value="79">Web Mining dan Information Retrieval</option>
                </select>

                <!--Pilihan Semester 7-->
                <label for="startNode48"><label>
                <select id="startNode48" name="startNode48">
                    <option>Pilih Matkul</option>
                    <option value="74">E-commerce</option>
                    <option value="75">Simulasi & Pemodelan</option>
                    <option value="76">Forensik Digital</option>
                    <option value="77">Komputasi Biomedik</option>
                    <option value="78">Enterprice Architecture</option>
                    <option value="79">Web Mining dan Information Retrieval</option>
                </select><br>
            </div>
        
        <div class="col-6">
            <!--Semester 2-->
            <label for="startNode9">Semester 2:</label><br>
            <select id="startNode9" name="startNode9">
                <option>Pilih Matkul</option>
                <option value="9">Kalkulus II</option>
            </select>

            <label for="startNode10"></label><br>
            <select id="startNode10" name="startNode10">
                <option>Pilih Matkul</option>
                <option value="10">Metematika Diskrit I</option>
            </select>
        
            <label for="startNode11"></label><br>
            <select id="startNode11" name="startNode11">
                <option>Pilih Matkul</option>
                <option value="11">Aljabar Linier</option>
            </select>
        
            <label for="startNode12"></label><br>
            <select id="startNode12" name="startNode12">
                <option>Pilih Matkul</option>
                <option value="12">Struktur Data & Algoritma</option>
            </select>
        
                <label for="startNode13"></label><br>
                <select id="startNode13" name="startNode13">
                    <option>Pilih Matkul</option>
                    <option value="13">Organisasi Sistem Komputer</option>
                </select>

                <label for="startNode14"></label><br>
                <select id="startNode14" name="startNode14">
                    <option>Pilih Matkul</option>
                    <option value="14">Pendidikan Kewarganegaraan</option>
                </select>

                <label for="startNode15"></label><br>
                <select id="startNode15" name="startNode15">
                    <option>Pilih Matkul</option>
                    <option value="15">Bahasa Inggris II</option>
                </select><br>

                <!--Semester 4-->
                <label for="startNode23">Semester 4:</label><br>
                <select id="startNode23" name="startNode23">
                    <option>Pilih Matkul</option>
                    <option value="23">Jaringan Komputer</option>
                </select>

                <label for="startNode24"><label>
                <select id="startNode24" name="startNode24">
                    <option>Pilih Matkul</option>
                    <option value="24">Pemrograman Web</option>
                </select>

                <label for="startNode25"><label>
                <select id="startNode25" name="startNode25">
                    <option>Pilih Matkul</option>
                    <option value="25">Kecerdasan Buatan</option>
                </select>

                <label for="startNode26"><label>
                <select id="startNode26" name="startNode26">
                    <option>Pilih Matkul</option>
                    <option value="26">Rekayasa Perangkat Lunak</option>
                </select>

                <label for="startNode27"><label>
                <select id="startNode27" name="startNode27">
                    <option>Pilih Matkul</option>
                    <option value="27">Pengembangan Aplikasi Bergerak</option>
                </select>

                <label for="startNode28"><label>
                <select id="startNode28" name="startNode28">
                    <option>Pilih Matkul</option>
                    <option value="28">Teori Bahasa & Automata</option>
                </select><br>

                <!--Semester 6-->
                <label for="startNode36">Semester 6:</label><br>
                <select id="startNode36" name="startNode36">
                    <option>Pilih Matkul</option>
                    <option value="48">Metode Penelitian</option>
                </select>

                <!--Semester 6-->
                <label for="startNode37"><label>
                <select id="startNode37" name="startNode37">
                    <option>Pilih Matkul</option>
                    <option value="49">Magang</option>
                </select>
        
                <!--Semester 6-->
                <label for="startNode38"><label>
                <select id="startNode38" name="startNode38">
                    <option>Pilih Matkul</option>
                    <option value="50">Proyek Perangkat Lunak</option>
                </select><br>
        
                <!--Wajib Minat Semester 6-->
                <label for="startNode39">Wajib Minat Semester 6:</label><br>
                <select id="startNode39" name="startNode39">
                    <option>Pilih Matkul</option>
                    <option value="51">Expert System</option>
                    <option value="52">Teknik Multimedia</option>
                    <option value="53">Manajemen Jaringan</option>
                    <option value="54">Jaminan Mutu Perangkat Lunak</option>
                </select><br>


                <!--Pilihan1 Semester 6-->
                <label for="startNode40">Pilihan Semester 6:</label><br>
                <select id="startNode40" name="startNode40">
                <option>Pilih Matkul</option>
                    <option value="55">Manajemen Proyek</option>
                    <option value="56">Proyek Perangkat Lunak</option>
                    <option value="57">Pengujian Perangkat Lunak</option>
                    <option value="58">Business Intelligence</option>
                    <option value="59">Kapita Selekta Ilmu Komputer</option>
                    <option value="60">Komputasi Cloud</option>
                    <option value="61">Keamanan Jaringan Komputer</option>
                    <option value="62">Cyber Security</option>
                    <option value="63">Sistem Pendukung Keputusan</option>
                    <option value="64">Software Process</option>
                    <option value="65">Pengamanan Data Multimedia</option>
                    <option value="66">Natural Language Processing</option>
                </select>

                <!--Pilihan2 Semester 6-->
                <label for="startNode41"><label>
                <select id="startNode41" name="startNode41">
                    <option>Pilih Matkul</option>
                    <option value="55">Manajemen Proyek</option>
                    <option value="56">Proyek Perangkat Lunak</option>
                    <option value="57">Pengujian Perangkat Lunak</option>
                    <option value="58">Business Intelligence</option>
                    <option value="59">Kapita Selekta Ilmu Komputer</option>
                    <option value="60">Komputasi Cloud</option>
                    <option value="61">Keamanan Jaringan Komputer</option>
                    <option value="62">Cyber Security</option>
                    <option value="63">Sistem Pendukung Keputusan</option>
                    <option value="64">Software Process</option>
                    <option value="65">Pengamanan Data Multimedia</option>
                    <option value="66">Natural Language Processing</option>
                </select>

                <!--Pilihan3 Semester 6-->
                <label for="startNode42"><label>
                <select id="startNode42" name="startNode42">
                    <option>Pilih Matkul</option>
                    <option value="55">Manajemen Proyek</option>
                    <option value="56">Proyek Perangkat Lunak</option>
                    <option value="57">Pengujian Perangkat Lunak</option>
                    <option value="58">Business Intelligence</option>
                    <option value="59">Kapita Selekta Ilmu Komputer</option>
                    <option value="60">Komputasi Cloud</option>
                    <option value="61">Keamanan Jaringan Komputer</option>
                    <option value="62">Cyber Security</option>
                    <option value="63">Sistem Pendukung Keputusan</option>
                    <option value="64">Software Process</option>
                    <option value="65">Pengamanan Data Multimedia</option>
                    <option value="66">Natural Language Processing</option>
                </select><br>

            <!--Semester 8-->
            <label for="startNode49">Semester 8:</label><br>
            <select id="startNode49" name="startNode49">
                <option>Pilih Matkul</option>
                <option value="80">Skripsi/KM</option>
            </select><br>
            </div>
        </div>

            <input class="btn w-30 mt-2 mb-2 btn-primary" type="submit" value="Check">
        </form>

    <?php
    // Menampilkan pesan ketersambungan jika tersedia
    if (isset($message)) {
        echo '<div class="result">';
        echo $message;
        echo '</div>';
    }
    ?>

    <script>
    // Simpan nilai dropdown sebagai parameter URL saat dipilih
    document.getElementById("startNode1").addEventListener("change", function() {
        var selectedValue = this.value;
        var url = new URL(window.location.href);
        url.searchParams.set("dropdownValue", selectedValue);
        window.history.replaceState({}, '', url);
    });

    // Atur nilai dropdown saat halaman dimuat ulang
    document.addEventListener("DOMContentLoaded", function() {
        var urlParams = new URLSearchParams(window.location.search);
        var dropdownValue = urlParams.get("dropdownValue");
        if (dropdownValue) {
        document.getElementById("startNode1").value = dropdownValue;
        }
    });
    </script>

    <form method="get" action="">
        <input class="btn w-30 mb-2 ml-3 btn-primary" type="submit" value="Reset" />
    </form>
    </div>
</body>
</html>
