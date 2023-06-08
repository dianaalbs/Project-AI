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
    $graph->addEdge('29', '25');

    // Memanggil metode DFS dengan simpul awal yang dikirim melalui form
    $startNode1 = $_POST['1'];
    $startNode2 = $_POST['2'];
    $startNode3 = $_POST['3 '];
    $startNode4 = $_POST['4'];
    $startNode5 = $_POST['5'];
    $startNode6 = $_POST['6'];
    $startNode7 = $_POST['7'];
    $startNode8 = $_POST['8'];

    $startNode9  = $_POST['9'];
    $startNode10 = $_POST['10'];
    $startNode11 = $_POST['11'];
    $startNode12 = $_POST['12'];
    $startNode13 = $_POST['13'];
    $startNode14 = $_POST['14'];
    $startNode15 = $_POST['15'];

    $startNode16 = $_POST['16'];
    $startNode17 = $_POST['17'];
    $startNode18 = $_POST['18'];
    $startNode19 = $_POST['19'];
    $startNode20 = $_POST['20'];
    $startNode21 = $_POST['21'];
    $startNode22 = $_POST['22'];

    $startNode23 = $_POST['23'];
    $startNode24 = $_POST['24'];
    $startNode25 = $_POST['25'];
    $startNode26 = $_POST['26'];
    $startNode27 = $_POST['27'];
    $startNode28 = $_POST['28'];

    $startNode29 = $_POST['29'];
    $startNode30 = $_POST['30'];
    $startNode31 = $_POST['31'];
    $startNode32 = $_POST['32'];

    $startNode33 = $_POST['33'];
    $startNode34 = $_POST['34'];
    $startNode35 = $_POST['35'];
    $startNode36 = $_POST['36'];

    $startNode37 = $_POST['37'];
    $startNode38 = $_POST['38'];
    $startNode39 = $_POST['39'];
    $startNode40 = $_POST['40'];
    $startNode41 = $_POST['41'];
    $startNode42 = $_POST['42'];
    $startNode43 = $_POST['43'];
    $startNode44 = $_POST['44'];
    $startNode45 = $_POST['45'];
    $startNode46 = $_POST['46'];
    $startNode47 = $_POST['47'];

    $startNode48 = $_POST['48'];
    $startNode49 = $_POST['49'];
    $startNode50 = $_POST['50'];

    $startNode51 = $_POST['51'];
    $startNode52 = $_POST['52'];
    $startNode53 = $_POST['53'];
    $startNode54 = $_POST['54'];

    $startNode55 = $_POST['55'];
    $startNode56 = $_POST['56'];
    $startNode57 = $_POST['57'];
    $startNode58 = $_POST['58'];
    $startNode59 = $_POST['59'];
    $startNode60 = $_POST['60'];
    $startNode61 = $_POST['61'];
    $startNode62 = $_POST['62'];
    $startNode63 = $_POST['63'];
    $startNode64 = $_POST['64'];
    $startNode65 = $_POST['65'];
    $startNode66 = $_POST['66'];

    $startNode67 = $_POST['67'];
    $startNode68 = $_POST['68'];
    $startNode69 = $_POST['69'];

    $startNode70 = $_POST['70'];
    $startNode70 = $_POST['70'];
    $startNode71 = $_POST['71'];
    $startNode72 = $_POST['72'];
    $startNode73 = $_POST['73'];

    $startNode74 = $_POST['74'];
    $startNode75 = $_POST['75'];
    $startNode76 = $_POST['76'];
    $startNode77 = $_POST['77'];
    $startNode78 = $_POST['78'];
    $startNode79 = $_POST['79'];

    $startNode80 = $_POST['80'];
    
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
    $isConnected49 = $graph->isConnected($startNode1, $startNode50);
    $isConnected50 = $graph->isConnected($startNode1, $startNode51);
    $isConnected51 = $graph->isConnected($startNode1, $startNode52);
    $isConnected52 = $graph->isConnected($startNode1, $startNode53);
    $isConnected53 = $graph->isConnected($startNode1, $startNode54);
    $isConnected54 = $graph->isConnected($startNode1, $startNode55);
    $isConnected55 = $graph->isConnected($startNode1, $startNode56);
    $isConnected56 = $graph->isConnected($startNode1, $startNode57);
    $isConnected57 = $graph->isConnected($startNode1, $startNode58);
    $isConnected58 = $graph->isConnected($startNode1, $startNode59);
    $isConnected59 = $graph->isConnected($startNode1, $startNode60);
    $isConnected60 = $graph->isConnected($startNode1, $startNode61);
    $isConnected61 = $graph->isConnected($startNode1, $startNode62);
    $isConnected62 = $graph->isConnected($startNode1, $startNode63);
    $isConnected63 = $graph->isConnected($startNode1, $startNode64);
    $isConnected64 = $graph->isConnected($startNode1, $startNode65);
    $isConnected65 = $graph->isConnected($startNode1, $startNode66);
    $isConnected66 = $graph->isConnected($startNode1, $startNode67);
    $isConnected67 = $graph->isConnected($startNode1, $startNode68);
    $isConnected68 = $graph->isConnected($startNode1, $startNode69);
    $isConnected69 = $graph->isConnected($startNode1, $startNode70);
    $isConnected70 = $graph->isConnected($startNode1, $startNode71);
    $isConnected71 = $graph->isConnected($startNode1, $startNode72);
    $isConnected72 = $graph->isConnected($startNode1, $startNode73);
    $isConnected73 = $graph->isConnected($startNode1, $startNode74);
    $isConnected74 = $graph->isConnected($startNode1, $startNode75);
    $isConnected75 = $graph->isConnected($startNode1, $startNode76);
    $isConnected76 = $graph->isConnected($startNode1, $startNode77);
    $isConnected77 = $graph->isConnected($startNode1, $startNode78);
    $isConnected78 = $graph->isConnected($startNode1, $startNode79);
    $isConnected79 = $graph->isConnected($startNode1, $startNode80);
    
    $isConnected80 = $graph->isConnected($startNode2, $startNode3);
    $isConnected81 = $graph->isConnected($startNode2, $startNode4);
    $isConnected82 = $graph->isConnected($startNode2, $startNode5);
    $isConnected83 = $graph->isConnected($startNode2, $startNode6);
    $isConnected84 = $graph->isConnected($startNode2, $startNode7);
    $isConnected85 = $graph->isConnected($startNode2, $startNode8);
    $isConnected86 = $graph->isConnected($startNode2, $startNode9);
    $isConnected87 = $graph->isConnected($startNode2, $startNode10);
    $isConnected88 = $graph->isConnected($startNode2, $startNode11);
    $isConnected89 = $graph->isConnected($startNode2, $startNode12);
    $isConnected90 = $graph->isConnected($startNode2, $startNode13);
    $isConnected91 = $graph->isConnected($startNode2, $startNode14);
    $isConnected92 = $graph->isConnected($startNode2, $startNode15);
    $isConnected93 = $graph->isConnected($startNode2, $startNode16);
    $isConnected94 = $graph->isConnected($startNode2, $startNode17);
    $isConnected95 = $graph->isConnected($startNode2, $startNode18);
    $isConnected96 = $graph->isConnected($startNode2, $startNode19);
    $isConnected97 = $graph->isConnected($startNode2, $startNode20);
    $isConnected98 = $graph->isConnected($startNode2, $startNode21);
    $isConnected99 = $graph->isConnected($startNode2, $startNode22);
    $isConnected100 = $graph->isConnected($startNode2, $startNode23);
    $isConnected101 = $graph->isConnected($startNode2, $startNode24);
    $isConnected102 = $graph->isConnected($startNode2, $startNode25);
    $isConnected103 = $graph->isConnected($startNode2, $startNode26);
    $isConnected104 = $graph->isConnected($startNode2, $startNode27);
    $isConnected105 = $graph->isConnected($startNode2, $startNode28);
    $isConnected106 = $graph->isConnected($startNode2, $startNode29);
    $isConnected107 = $graph->isConnected($startNode2, $startNode30);
    $isConnected108 = $graph->isConnected($startNode2, $startNode31);
    $isConnected109 = $graph->isConnected($startNode2, $startNode32);
    $isConnected110 = $graph->isConnected($startNode2, $startNode33);
    $isConnected111 = $graph->isConnected($startNode2, $startNode34);
    $isConnected112 = $graph->isConnected($startNode2, $startNode35);
    $isConnected113 = $graph->isConnected($startNode2, $startNode36);
    $isConnected114 = $graph->isConnected($startNode2, $startNode37);
    $isConnected115 = $graph->isConnected($startNode2, $startNode38);
    $isConnected116 = $graph->isConnected($startNode2, $startNode39);
    $isConnected117 = $graph->isConnected($startNode2, $startNode40);
    $isConnected118 = $graph->isConnected($startNode2, $startNode41);
    $isConnected119 = $graph->isConnected($startNode2, $startNode42);
    $isConnected120 = $graph->isConnected($startNode2, $startNode43);
    $isConnected121 = $graph->isConnected($startNode2, $startNode44);
    $isConnected122 = $graph->isConnected($startNode2, $startNode45);
    $isConnected123 = $graph->isConnected($startNode2, $startNode46);
    $isConnected124 = $graph->isConnected($startNode2, $startNode47);
    $isConnected125 = $graph->isConnected($startNode2, $startNode48);
    $isConnected126 = $graph->isConnected($startNode2, $startNode49);
    $isConnected127 = $graph->isConnected($startNode2, $startNode50);
    $isConnected128 = $graph->isConnected($startNode2, $startNode51);
    $isConnected129 = $graph->isConnected($startNode2, $startNode52);
    $isConnected130 = $graph->isConnected($startNode2, $startNode53);
    $isConnected131 = $graph->isConnected($startNode2, $startNode54);
    $isConnected132 = $graph->isConnected($startNode2, $startNode55);
    $isConnected133 = $graph->isConnected($startNode2, $startNode56);
    $isConnected134 = $graph->isConnected($startNode2, $startNode57);
    $isConnected135 = $graph->isConnected($startNode2, $startNode58);
    $isConnected136 = $graph->isConnected($startNode2, $startNode59);
    $isConnected137 = $graph->isConnected($startNode2, $startNode60);
    $isConnected138 = $graph->isConnected($startNode2, $startNode61);
    $isConnected139 = $graph->isConnected($startNode2, $startNode62);
    $isConnected140 = $graph->isConnected($startNode2, $startNode63);
    $isConnected141 = $graph->isConnected($startNode2, $startNode64);
    $isConnected142 = $graph->isConnected($startNode2, $startNode65);
    $isConnected143 = $graph->isConnected($startNode2, $startNode66);
    $isConnected144 = $graph->isConnected($startNode2, $startNode67);
    $isConnected145 = $graph->isConnected($startNode2, $startNode68);
    $isConnected146 = $graph->isConnected($startNode2, $startNode69);
    $isConnected147 = $graph->isConnected($startNode2, $startNode70);
    $isConnected148 = $graph->isConnected($startNode2, $startNode71);
    $isConnected149 = $graph->isConnected($startNode2, $startNode72);
    $isConnected150 = $graph->isConnected($startNode2, $startNode73);
    $isConnected151 = $graph->isConnected($startNode2, $startNode74);
    $isConnected152 = $graph->isConnected($startNode2, $startNode75);
    $isConnected153 = $graph->isConnected($startNode2, $startNode76);
    $isConnected154 = $graph->isConnected($startNode2, $startNode77);
    $isConnected155 = $graph->isConnected($startNode2, $startNode78);
    $isConnected156 = $graph->isConnected($startNode2, $startNode79);
    $isConnected157 = $graph->isConnected($startNode2, $startNode80);
  
    $isConnected158 = $graph->isConnected($startNode3, $startNode4);
    $isConnected159 = $graph->isConnected($startNode3, $startNode5);
    $isConnected160 = $graph->isConnected($startNode3, $startNode6);
    $isConnected161 = $graph->isConnected($startNode3, $startNode7);
    $isConnected162 = $graph->isConnected($startNode3, $startNode8);
    $isConnected163 = $graph->isConnected($startNode3, $startNode9);
    $isConnected164 = $graph->isConnected($startNode3, $startNode10);
    $isConnected165 = $graph->isConnected($startNode3, $startNode11);
    $isConnected166 = $graph->isConnected($startNode3, $startNode12);
    $isConnected167 = $graph->isConnected($startNode3, $startNode13);
    $isConnected168 = $graph->isConnected($startNode3, $startNode14);
    $isConnected169 = $graph->isConnected($startNode3, $startNode15);
    $isConnected170 = $graph->isConnected($startNode3, $startNode16);
    $isConnected171 = $graph->isConnected($startNode3, $startNode17);
    $isConnected172 = $graph->isConnected($startNode3, $startNode18);
    $isConnected173 = $graph->isConnected($startNode3, $startNode19);
    $isConnected174 = $graph->isConnected($startNode3, $startNode20);
    $isConnected175 = $graph->isConnected($startNode3, $startNode21);
    $isConnected176 = $graph->isConnected($startNode3, $startNode22);
    $isConnected177 = $graph->isConnected($startNode3, $startNode23);
    $isConnected178 = $graph->isConnected($startNode3, $startNode24);
    $isConnected179 = $graph->isConnected($startNode3, $startNode25);
    $isConnected180 = $graph->isConnected($startNode3, $startNode26);
    $isConnected181 = $graph->isConnected($startNode3, $startNode27);
    $isConnected182 = $graph->isConnected($startNode3, $startNode28);
    $isConnected183 = $graph->isConnected($startNode3, $startNode29);
    $isConnected184 = $graph->isConnected($startNode3, $startNode30);
    $isConnected185 = $graph->isConnected($startNode3, $startNode31);
    $isConnected186 = $graph->isConnected($startNode3, $startNode32);
    $isConnected187 = $graph->isConnected($startNode3, $startNode33);
    $isConnected188 = $graph->isConnected($startNode3, $startNode34);
    $isConnected189 = $graph->isConnected($startNode3, $startNode35);
    $isConnected190 = $graph->isConnected($startNode3, $startNode36);
    $isConnected191 = $graph->isConnected($startNode3, $startNode37);
    $isConnected192 = $graph->isConnected($startNode3, $startNode38);
    $isConnected193 = $graph->isConnected($startNode3, $startNode39);
    $isConnected194 = $graph->isConnected($startNode3, $startNode40);
    $isConnected195 = $graph->isConnected($startNode3, $startNode41);
    $isConnected196 = $graph->isConnected($startNode3, $startNode42);
    $isConnected197 = $graph->isConnected($startNode3, $startNode43);
    $isConnected198 = $graph->isConnected($startNode3, $startNode44);
    $isConnected199 = $graph->isConnected($startNode3, $startNode45);
    $isConnected200 = $graph->isConnected($startNode3, $startNode46);
    $isConnected201 = $graph->isConnected($startNode3, $startNode47);
    $isConnected202 = $graph->isConnected($startNode3, $startNode48);
    $isConnected203 = $graph->isConnected($startNode3, $startNode49);
    $isConnected204 = $graph->isConnected($startNode3, $startNode50);
    $isConnected205 = $graph->isConnected($startNode3, $startNode51);
    $isConnected206 = $graph->isConnected($startNode3, $startNode52);
    $isConnected207 = $graph->isConnected($startNode3, $startNode53);
    $isConnected208 = $graph->isConnected($startNode3, $startNode54);
    $isConnected209 = $graph->isConnected($startNode3, $startNode55);
    $isConnected210 = $graph->isConnected($startNode3, $startNode56);
    $isConnected211 = $graph->isConnected($startNode3, $startNode57);
    $isConnected212 = $graph->isConnected($startNode3, $startNode58);
    $isConnected213 = $graph->isConnected($startNode3, $startNode59);
    $isConnected214 = $graph->isConnected($startNode3, $startNode60);
    $isConnected215 = $graph->isConnected($startNode3, $startNode61);
    $isConnected216 = $graph->isConnected($startNode3, $startNode62);
    $isConnected217 = $graph->isConnected($startNode3, $startNode63);
    $isConnected218 = $graph->isConnected($startNode3, $startNode64);
    $isConnected219 = $graph->isConnected($startNode3, $startNode65);
    $isConnected220 = $graph->isConnected($startNode3, $startNode66);
    $isConnected221 = $graph->isConnected($startNode3, $startNode67);
    $isConnected222 = $graph->isConnected($startNode3, $startNode68);
    $isConnected223 = $graph->isConnected($startNode3, $startNode69);
    $isConnected224 = $graph->isConnected($startNode3, $startNode70);
    $isConnected225 = $graph->isConnected($startNode3, $startNode71);
    $isConnected226 = $graph->isConnected($startNode3, $startNode72);
    $isConnected227 = $graph->isConnected($startNode3, $startNode73);
    $isConnected228 = $graph->isConnected($startNode3, $startNode74);
    $isConnected229 = $graph->isConnected($startNode3, $startNode75);
    $isConnected230 = $graph->isConnected($startNode3, $startNode76);
    $isConnected231 = $graph->isConnected($startNode3, $startNode77);
    $isConnected232 = $graph->isConnected($startNode3, $startNode78);
    $isConnected233 = $graph->isConnected($startNode3, $startNode79);
    $isConnected234 = $graph->isConnected($startNode3, $startNode80);

    $isConnected235 = $graph->isConnected($startNode4, $startNode5);
    $isConnected236 = $graph->isConnected($startNode4, $startNode6);
    $isConnected237 = $graph->isConnected($startNode4, $startNode7);
    $isConnected238 = $graph->isConnected($startNode4, $startNode8);
    $isConnected239 = $graph->isConnected($startNode4, $startNode9);
    $isConnected240 = $graph->isConnected($startNode4, $startNode10);
    $isConnected241 = $graph->isConnected($startNode4, $startNode11);
    $isConnected242 = $graph->isConnected($startNode4, $startNode12);
    $isConnected243 = $graph->isConnected($startNode4, $startNode13);
    $isConnected244 = $graph->isConnected($startNode4, $startNode14);
    $isConnected245 = $graph->isConnected($startNode4, $startNode15);
    $isConnected246 = $graph->isConnected($startNode4, $startNode16);
    $isConnected247 = $graph->isConnected($startNode4, $startNode17);
    $isConnected248 = $graph->isConnected($startNode4, $startNode18);
    $isConnected249 = $graph->isConnected($startNode4, $startNode19);
    $isConnected250 = $graph->isConnected($startNode4, $startNode20);
    $isConnected251 = $graph->isConnected($startNode4, $startNode21);
    $isConnected252 = $graph->isConnected($startNode4, $startNode22);
    $isConnected253 = $graph->isConnected($startNode4, $startNode23);
    $isConnected254 = $graph->isConnected($startNode4, $startNode24);
    $isConnected255 = $graph->isConnected($startNode4, $startNode25);
    $isConnected256 = $graph->isConnected($startNode4, $startNode26);
    $isConnected257 = $graph->isConnected($startNode4, $startNode27);
    $isConnected258 = $graph->isConnected($startNode4, $startNode28);
    $isConnected259 = $graph->isConnected($startNode4, $startNode29);
    $isConnected260 = $graph->isConnected($startNode4, $startNode30);
    $isConnected261 = $graph->isConnected($startNode4, $startNode31);
    $isConnected262 = $graph->isConnected($startNode4, $startNode32);
    $isConnected263 = $graph->isConnected($startNode4, $startNode33);
    $isConnected264 = $graph->isConnected($startNode4, $startNode34);
    $isConnected265 = $graph->isConnected($startNode4, $startNode35);
    $isConnected266 = $graph->isConnected($startNode4, $startNode36);
    $isConnected267 = $graph->isConnected($startNode4, $startNode37);
    $isConnected268 = $graph->isConnected($startNode4, $startNode38);
    $isConnected269 = $graph->isConnected($startNode4, $startNode39);
    $isConnected270 = $graph->isConnected($startNode4, $startNode40);
    $isConnected271 = $graph->isConnected($startNode4, $startNode41);
    $isConnected272 = $graph->isConnected($startNode4, $startNode42);
    $isConnected273 = $graph->isConnected($startNode4, $startNode43);
    $isConnected274 = $graph->isConnected($startNode4, $startNode44);
    $isConnected275 = $graph->isConnected($startNode4, $startNode45);
    $isConnected276 = $graph->isConnected($startNode4, $startNode46);
    $isConnected277 = $graph->isConnected($startNode4, $startNode47);
    $isConnected278 = $graph->isConnected($startNode4, $startNode48);
    $isConnected279 = $graph->isConnected($startNode4, $startNode49);
    $isConnected280 = $graph->isConnected($startNode4, $startNode50);
    $isConnected281 = $graph->isConnected($startNode4, $startNode51);
    $isConnected282 = $graph->isConnected($startNode4, $startNode52);
    $isConnected283 = $graph->isConnected($startNode4, $startNode53);
    $isConnected284 = $graph->isConnected($startNode4, $startNode54);
    $isConnected285 = $graph->isConnected($startNode4, $startNode55);
    $isConnected286 = $graph->isConnected($startNode4, $startNode56);
    $isConnected287 = $graph->isConnected($startNode4, $startNode57);
    $isConnected288 = $graph->isConnected($startNode4, $startNode58);
    $isConnected289 = $graph->isConnected($startNode4, $startNode59);
    $isConnected290 = $graph->isConnected($startNode4, $startNode60);
    $isConnected291 = $graph->isConnected($startNode4, $startNode61);
    $isConnected292 = $graph->isConnected($startNode4, $startNode62);
    $isConnected293 = $graph->isConnected($startNode4, $startNode63);
    $isConnected294 = $graph->isConnected($startNode4, $startNode64);
    $isConnected295 = $graph->isConnected($startNode4, $startNode65);
    $isConnected296 = $graph->isConnected($startNode4, $startNode66);
    $isConnected297 = $graph->isConnected($startNode4, $startNode67);
    $isConnected298 = $graph->isConnected($startNode4, $startNode68);
    $isConnected299 = $graph->isConnected($startNode4, $startNode69);
    $isConnected300 = $graph->isConnected($startNode4, $startNode70);
    $isConnected301 = $graph->isConnected($startNode4, $startNode71);
    $isConnected302 = $graph->isConnected($startNode4, $startNode72);
    $isConnected303 = $graph->isConnected($startNode4, $startNode73);
    $isConnected304 = $graph->isConnected($startNode4, $startNode74);
    $isConnected305 = $graph->isConnected($startNode4, $startNode75);
    $isConnected306 = $graph->isConnected($startNode4, $startNode76);
    $isConnected307 = $graph->isConnected($startNode4, $startNode77);
    $isConnected308 = $graph->isConnected($startNode4, $startNode78);
    $isConnected309 = $graph->isConnected($startNode4, $startNode79);
    $isConnected310 = $graph->isConnected($startNode4, $startNode80);

    $isConnected311 = $graph->isConnected($startNode5, $startNode6);
    $isConnected312 = $graph->isConnected($startNode5, $startNode7);
    $isConnected313 = $graph->isConnected($startNode5, $startNode8);
    $isConnected314 = $graph->isConnected($startNode5, $startNode9);
    $isConnected315 = $graph->isConnected($startNode5, $startNode10);
    $isConnected316 = $graph->isConnected($startNode5, $startNode11);
    $isConnected317 = $graph->isConnected($startNode5, $startNode12);
    $isConnected318 = $graph->isConnected($startNode5, $startNode13);
    $isConnected319 = $graph->isConnected($startNode5, $startNode14);
    $isConnected320 = $graph->isConnected($startNode5, $startNode15);
    $isConnected321 = $graph->isConnected($startNode5, $startNode16);
    $isConnected322 = $graph->isConnected($startNode5, $startNode17);
    $isConnected323 = $graph->isConnected($startNode5, $startNode18);
    $isConnected324 = $graph->isConnected($startNode5, $startNode19);
    $isConnected325 = $graph->isConnected($startNode5, $startNode20);
    $isConnected326 = $graph->isConnected($startNode5, $startNode21);
    $isConnected327 = $graph->isConnected($startNode5, $startNode22);
    $isConnected328 = $graph->isConnected($startNode5, $startNode23);
    $isConnected329 = $graph->isConnected($startNode5, $startNode24);
    $isConnected330 = $graph->isConnected($startNode5, $startNode25);
    $isConnected331 = $graph->isConnected($startNode5, $startNode26);
    $isConnected332 = $graph->isConnected($startNode5, $startNode27);
    $isConnected333 = $graph->isConnected($startNode5, $startNode28);
    $isConnected334 = $graph->isConnected($startNode5, $startNode29);
    $isConnected335 = $graph->isConnected($startNode5, $startNode30);
    $isConnected336 = $graph->isConnected($startNode5, $startNode31);
    $isConnected337 = $graph->isConnected($startNode5, $startNode32);
    $isConnected338 = $graph->isConnected($startNode5, $startNode33);
    $isConnected339 = $graph->isConnected($startNode5, $startNode34);
    $isConnected340 = $graph->isConnected($startNode5, $startNode35);
    $isConnected341 = $graph->isConnected($startNode5, $startNode36);
    $isConnected342 = $graph->isConnected($startNode5, $startNode37);
    $isConnected343 = $graph->isConnected($startNode5, $startNode38);
    $isConnected344 = $graph->isConnected($startNode5, $startNode39);
    $isConnected345 = $graph->isConnected($startNode5, $startNode40);
    $isConnected346 = $graph->isConnected($startNode5, $startNode41);
    $isConnected347 = $graph->isConnected($startNode5, $startNode42);
    $isConnected348 = $graph->isConnected($startNode5, $startNode43);
    $isConnected349 = $graph->isConnected($startNode5, $startNode44);
    $isConnected350 = $graph->isConnected($startNode5, $startNode45);
    $isConnected351 = $graph->isConnected($startNode5, $startNode46);
    $isConnected352 = $graph->isConnected($startNode5, $startNode47);
    $isConnected353 = $graph->isConnected($startNode5, $startNode48);
    $isConnected354 = $graph->isConnected($startNode5, $startNode49);
    $isConnected355 = $graph->isConnected($startNode5, $startNode50);
    $isConnected356 = $graph->isConnected($startNode5, $startNode51);
    $isConnected357 = $graph->isConnected($startNode5, $startNode52);
    $isConnected358 = $graph->isConnected($startNode5, $startNode53);
    $isConnected359 = $graph->isConnected($startNode5, $startNode54);
    $isConnected360 = $graph->isConnected($startNode5, $startNode55);
    $isConnected361 = $graph->isConnected($startNode5, $startNode56);
    $isConnected362 = $graph->isConnected($startNode5, $startNode57);
    $isConnected363 = $graph->isConnected($startNode5, $startNode58);
    $isConnected364 = $graph->isConnected($startNode5, $startNode59);
    $isConnected365 = $graph->isConnected($startNode5, $startNode60);
    $isConnected366 = $graph->isConnected($startNode5, $startNode61);
    $isConnected367 = $graph->isConnected($startNode5, $startNode62);
    $isConnected368 = $graph->isConnected($startNode5, $startNode63);
    $isConnected369 = $graph->isConnected($startNode5, $startNode64);
    $isConnected370 = $graph->isConnected($startNode5, $startNode65);
    $isConnected371 = $graph->isConnected($startNode5, $startNode66);
    $isConnected372 = $graph->isConnected($startNode5, $startNode67);
    $isConnected373 = $graph->isConnected($startNode5, $startNode68);
    $isConnected374 = $graph->isConnected($startNode5, $startNode69);
    $isConnected375 = $graph->isConnected($startNode5, $startNode70);
    $isConnected376 = $graph->isConnected($startNode5, $startNode71);
    $isConnected377 = $graph->isConnected($startNode5, $startNode72);
    $isConnected378 = $graph->isConnected($startNode5, $startNode73);
    $isConnected379 = $graph->isConnected($startNode5, $startNode74);
    $isConnected380 = $graph->isConnected($startNode5, $startNode75);
    $isConnected381 = $graph->isConnected($startNode5, $startNode76);
    $isConnected382 = $graph->isConnected($startNode5, $startNode77);
    $isConnected383 = $graph->isConnected($startNode5, $startNode78);
    $isConnected384 = $graph->isConnected($startNode5, $startNode79);
    $isConnected385 = $graph->isConnected($startNode5, $startNode80);
    
    $isConnected386 = $graph->isConnected($startNode6, $startNode7);
    $isConnected387 = $graph->isConnected($startNode6, $startNode8);
    $isConnected388 = $graph->isConnected($startNode6, $startNode9);
    $isConnected389 = $graph->isConnected($startNode6, $startNode10);
    $isConnected390 = $graph->isConnected($startNode6, $startNode11);
    $isConnected391 = $graph->isConnected($startNode6, $startNode12);
    $isConnected392 = $graph->isConnected($startNode6, $startNode13);
    $isConnected393 = $graph->isConnected($startNode6, $startNode14);
    $isConnected394 = $graph->isConnected($startNode6, $startNode15);
    $isConnected395 = $graph->isConnected($startNode6, $startNode16);
    $isConnected396 = $graph->isConnected($startNode6, $startNode17);
    $isConnected397 = $graph->isConnected($startNode6, $startNode18);
    $isConnected398 = $graph->isConnected($startNode6, $startNode19);
    $isConnected399 = $graph->isConnected($startNode6, $startNode20);
    $isConnected400 = $graph->isConnected($startNode6, $startNode21);
    $isConnected401 = $graph->isConnected($startNode6, $startNode22);
    $isConnected402 = $graph->isConnected($startNode6, $startNode23);
    $isConnected403 = $graph->isConnected($startNode6, $startNode24);
    $isConnected404 = $graph->isConnected($startNode6, $startNode25);
    $isConnected405 = $graph->isConnected($startNode6, $startNode26);
    $isConnected406 = $graph->isConnected($startNode6, $startNode27);
    $isConnected407 = $graph->isConnected($startNode6, $startNode28);
    $isConnected408 = $graph->isConnected($startNode6, $startNode29);
    $isConnected409 = $graph->isConnected($startNode6, $startNode30);
    $isConnected410 = $graph->isConnected($startNode6, $startNode31);
    $isConnected411 = $graph->isConnected($startNode6, $startNode32);
    $isConnected412 = $graph->isConnected($startNode6, $startNode33);
    $isConnected413 = $graph->isConnected($startNode6, $startNode34);
    $isConnected414 = $graph->isConnected($startNode6, $startNode35);
    $isConnected415 = $graph->isConnected($startNode6, $startNode36);
    $isConnected416 = $graph->isConnected($startNode6, $startNode37);
    $isConnected417 = $graph->isConnected($startNode6, $startNode38);
    $isConnected418 = $graph->isConnected($startNode6, $startNode39);
    $isConnected419 = $graph->isConnected($startNode6, $startNode40);
    $isConnected420 = $graph->isConnected($startNode6, $startNode41);
    $isConnected421 = $graph->isConnected($startNode6, $startNode42);
    $isConnected422 = $graph->isConnected($startNode6, $startNode43);
    $isConnected423 = $graph->isConnected($startNode6, $startNode44);
    $isConnected424 = $graph->isConnected($startNode6, $startNode45);
    $isConnected425 = $graph->isConnected($startNode6, $startNode46);
    $isConnected426 = $graph->isConnected($startNode6, $startNode47);
    $isConnected427 = $graph->isConnected($startNode6, $startNode48);
    $isConnected428 = $graph->isConnected($startNode6, $startNode49);
    $isConnected429 = $graph->isConnected($startNode6, $startNode50);
    $isConnected430 = $graph->isConnected($startNode6, $startNode51);
    $isConnected431 = $graph->isConnected($startNode6, $startNode52);
    $isConnected432 = $graph->isConnected($startNode6, $startNode53);
    $isConnected433 = $graph->isConnected($startNode6, $startNode54);
    $isConnected434 = $graph->isConnected($startNode6, $startNode55);
    $isConnected435 = $graph->isConnected($startNode6, $startNode56);
    $isConnected436 = $graph->isConnected($startNode6, $startNode57);
    $isConnected437 = $graph->isConnected($startNode6, $startNode58);
    $isConnected438 = $graph->isConnected($startNode6, $startNode59);
    $isConnected439 = $graph->isConnected($startNode6, $startNode60);
    $isConnected440 = $graph->isConnected($startNode6, $startNode61);
    $isConnected441 = $graph->isConnected($startNode6, $startNode62);
    $isConnected442 = $graph->isConnected($startNode6, $startNode63);
    $isConnected443 = $graph->isConnected($startNode6, $startNode64);
    $isConnected444 = $graph->isConnected($startNode6, $startNode65);
    $isConnected445 = $graph->isConnected($startNode6, $startNode66);
    $isConnected446 = $graph->isConnected($startNode6, $startNode67);
    $isConnected447 = $graph->isConnected($startNode6, $startNode68);
    $isConnected448 = $graph->isConnected($startNode6, $startNode69);
    $isConnected449 = $graph->isConnected($startNode6, $startNode70);
    $isConnected450 = $graph->isConnected($startNode6, $startNode71);
    $isConnected451 = $graph->isConnected($startNode6, $startNode72);
    $isConnected452 = $graph->isConnected($startNode6, $startNode73);
    $isConnected453 = $graph->isConnected($startNode6, $startNode74);
    $isConnected454 = $graph->isConnected($startNode6, $startNode75);
    $isConnected455 = $graph->isConnected($startNode6, $startNode76);
    $isConnected456 = $graph->isConnected($startNode6, $startNode77);
    $isConnected457 = $graph->isConnected($startNode6, $startNode78);
    $isConnected458 = $graph->isConnected($startNode6, $startNode79);
    $isConnected459 = $graph->isConnected($startNode6, $startNode80);

    $isConnected460 = $graph->isConnected($startNode7, $startNode8);
    $isConnected461 = $graph->isConnected($startNode7, $startNode9);
    $isConnected462 = $graph->isConnected($startNode7, $startNode10);
    $isConnected463 = $graph->isConnected($startNode7, $startNode11);
    $isConnected464 = $graph->isConnected($startNode7, $startNode12);
    $isConnected465 = $graph->isConnected($startNode7, $startNode13);
    $isConnected466 = $graph->isConnected($startNode7, $startNode14);
    $isConnected467 = $graph->isConnected($startNode7, $startNode15);
    $isConnected468 = $graph->isConnected($startNode7, $startNode16);
    $isConnected469 = $graph->isConnected($startNode7, $startNode17);
    $isConnected470 = $graph->isConnected($startNode7, $startNode18);
    $isConnected471 = $graph->isConnected($startNode7, $startNode19);
    $isConnected472 = $graph->isConnected($startNode7, $startNode20);
    $isConnected473 = $graph->isConnected($startNode7, $startNode21);
    $isConnected474 = $graph->isConnected($startNode7, $startNode22);
    $isConnected475 = $graph->isConnected($startNode7, $startNode23);
    $isConnected476 = $graph->isConnected($startNode7, $startNode24);
    $isConnected477 = $graph->isConnected($startNode7, $startNode25);
    $isConnected478 = $graph->isConnected($startNode7, $startNode26);
    $isConnected479 = $graph->isConnected($startNode7, $startNode27);
    $isConnected480 = $graph->isConnected($startNode7, $startNode28);
    $isConnected481 = $graph->isConnected($startNode7, $startNode29);
    $isConnected482 = $graph->isConnected($startNode7, $startNode30);
    $isConnected483 = $graph->isConnected($startNode7, $startNode31);
    $isConnected484 = $graph->isConnected($startNode7, $startNode32);
    $isConnected485 = $graph->isConnected($startNode7, $startNode33);
    $isConnected486 = $graph->isConnected($startNode7, $startNode34);
    $isConnected487 = $graph->isConnected($startNode7, $startNode35);
    $isConnected488 = $graph->isConnected($startNode7, $startNode36);
    $isConnected489 = $graph->isConnected($startNode7, $startNode37);
    $isConnected490 = $graph->isConnected($startNode7, $startNode38);
    $isConnected491 = $graph->isConnected($startNode7, $startNode39);
    $isConnected492 = $graph->isConnected($startNode7, $startNode40);
    $isConnected493 = $graph->isConnected($startNode7, $startNode41);
    $isConnected494 = $graph->isConnected($startNode7, $startNode42);
    $isConnected495 = $graph->isConnected($startNode7, $startNode43);
    $isConnected496 = $graph->isConnected($startNode7, $startNode44);
    $isConnected497 = $graph->isConnected($startNode7, $startNode45);
    $isConnected498 = $graph->isConnected($startNode7, $startNode46);
    $isConnected499 = $graph->isConnected($startNode7, $startNode47);
    $isConnected500 = $graph->isConnected($startNode7, $startNode48);
    $isConnected501 = $graph->isConnected($startNode7, $startNode49);
    $isConnected502 = $graph->isConnected($startNode7, $startNode50);
    $isConnected503 = $graph->isConnected($startNode7, $startNode51);
    $isConnected504 = $graph->isConnected($startNode7, $startNode52);
    $isConnected505 = $graph->isConnected($startNode7, $startNode53);
    $isConnected506 = $graph->isConnected($startNode7, $startNode54);
    $isConnected507 = $graph->isConnected($startNode7, $startNode55);
    $isConnected508 = $graph->isConnected($startNode7, $startNode56);
    $isConnected509 = $graph->isConnected($startNode7, $startNode57);
    $isConnected510 = $graph->isConnected($startNode7, $startNode58);
    $isConnected511 = $graph->isConnected($startNode7, $startNode59);
    $isConnected512 = $graph->isConnected($startNode7, $startNode60);
    $isConnected513 = $graph->isConnected($startNode7, $startNode61);
    $isConnected514 = $graph->isConnected($startNode7, $startNode62);
    $isConnected515 = $graph->isConnected($startNode7, $startNode63);
    $isConnected516 = $graph->isConnected($startNode7, $startNode64);
    $isConnected517 = $graph->isConnected($startNode7, $startNode65);
    $isConnected518 = $graph->isConnected($startNode7, $startNode66);
    $isConnected519 = $graph->isConnected($startNode7, $startNode67);
    $isConnected520 = $graph->isConnected($startNode7, $startNode68);
    $isConnected521 = $graph->isConnected($startNode7, $startNode69);
    $isConnected522 = $graph->isConnected($startNode7, $startNode70);
    $isConnected523 = $graph->isConnected($startNode7, $startNode71);
    $isConnected524 = $graph->isConnected($startNode7, $startNode72);
    $isConnected525 = $graph->isConnected($startNode7, $startNode73);
    $isConnected526 = $graph->isConnected($startNode7, $startNode74);
    $isConnected527 = $graph->isConnected($startNode7, $startNode75);
    $isConnected528 = $graph->isConnected($startNode7, $startNode76);
    $isConnected529 = $graph->isConnected($startNode7, $startNode77);
    $isConnected530 = $graph->isConnected($startNode7, $startNode78);
    $isConnected531 = $graph->isConnected($startNode7, $startNode79);
    $isConnected532 = $graph->isConnected($startNode7, $startNode80);

    $isConnected533 = $graph->isConnected($startNode8, $startNode9);
    $isConnected534 = $graph->isConnected($startNode8, $startNode10);
    $isConnected535 = $graph->isConnected($startNode8, $startNode11);
    $isConnected536 = $graph->isConnected($startNode8, $startNode12);
    $isConnected537 = $graph->isConnected($startNode8, $startNode13);
    $isConnected538 = $graph->isConnected($startNode8, $startNode14);
    $isConnected539 = $graph->isConnected($startNode8, $startNode15);
    $isConnected540 = $graph->isConnected($startNode8, $startNode16);
    $isConnected541 = $graph->isConnected($startNode8, $startNode17);
    $isConnected542 = $graph->isConnected($startNode8, $startNode18);
    $isConnected543 = $graph->isConnected($startNode8, $startNode19);
    $isConnected544 = $graph->isConnected($startNode8, $startNode20);
    $isConnected545 = $graph->isConnected($startNode8, $startNode21);
    $isConnected546 = $graph->isConnected($startNode8, $startNode22);
    $isConnected547 = $graph->isConnected($startNode8, $startNode23);
    $isConnected548 = $graph->isConnected($startNode8, $startNode24);
    $isConnected549 = $graph->isConnected($startNode8, $startNode25);
    $isConnected550 = $graph->isConnected($startNode8, $startNode26);
    $isConnected551 = $graph->isConnected($startNode8, $startNode27);
    $isConnected552 = $graph->isConnected($startNode8, $startNode28);
    $isConnected553 = $graph->isConnected($startNode8, $startNode29);
    $isConnected554 = $graph->isConnected($startNode8, $startNode30);
    $isConnected555 = $graph->isConnected($startNode8, $startNode31);
    $isConnected556 = $graph->isConnected($startNode8, $startNode32);
    $isConnected557 = $graph->isConnected($startNode8, $startNode33);
    $isConnected558 = $graph->isConnected($startNode8, $startNode34);
    $isConnected559 = $graph->isConnected($startNode8, $startNode35);
    $isConnected560 = $graph->isConnected($startNode8, $startNode36);
    $isConnected561 = $graph->isConnected($startNode8, $startNode37);
    $isConnected562 = $graph->isConnected($startNode8, $startNode38);
    $isConnected563 = $graph->isConnected($startNode8, $startNode39);
    $isConnected564 = $graph->isConnected($startNode8, $startNode40);
    $isConnected565 = $graph->isConnected($startNode8, $startNode41);
    $isConnected566 = $graph->isConnected($startNode8, $startNode42);
    $isConnected567 = $graph->isConnected($startNode8, $startNode43);
    $isConnected568 = $graph->isConnected($startNode8, $startNode44);
    $isConnected569 = $graph->isConnected($startNode8, $startNode45);
    $isConnected570 = $graph->isConnected($startNode8, $startNode46);
    $isConnected571 = $graph->isConnected($startNode8, $startNode47);
    $isConnected572 = $graph->isConnected($startNode8, $startNode48);
    $isConnected573 = $graph->isConnected($startNode8, $startNode49);
    $isConnected574 = $graph->isConnected($startNode8, $startNode50);
    $isConnected575 = $graph->isConnected($startNode8, $startNode51);
    $isConnected576 = $graph->isConnected($startNode8, $startNode52);
    $isConnected577 = $graph->isConnected($startNode8, $startNode53);
    $isConnected578 = $graph->isConnected($startNode8, $startNode54);
    $isConnected579 = $graph->isConnected($startNode8, $startNode55);
    $isConnected580 = $graph->isConnected($startNode8, $startNode56);
    $isConnected581 = $graph->isConnected($startNode8, $startNode57);
    $isConnected582 = $graph->isConnected($startNode8, $startNode58);
    $isConnected583 = $graph->isConnected($startNode8, $startNode59);
    $isConnected584 = $graph->isConnected($startNode8, $startNode60);
    $isConnected585 = $graph->isConnected($startNode8, $startNode61);
    $isConnected586 = $graph->isConnected($startNode8, $startNode62);
    $isConnected587 = $graph->isConnected($startNode8, $startNode63);
    $isConnected588 = $graph->isConnected($startNode8, $startNode64);
    $isConnected589 = $graph->isConnected($startNode8, $startNode65);
    $isConnected590 = $graph->isConnected($startNode8, $startNode66);
    $isConnected591 = $graph->isConnected($startNode8, $startNode67);
    $isConnected592 = $graph->isConnected($startNode8, $startNode68);
    $isConnected593 = $graph->isConnected($startNode8, $startNode69);
    $isConnected594 = $graph->isConnected($startNode8, $startNode70);
    $isConnected595 = $graph->isConnected($startNode8, $startNode71);
    $isConnected596 = $graph->isConnected($startNode8, $startNode72);
    $isConnected597 = $graph->isConnected($startNode8, $startNode73);
    $isConnected598 = $graph->isConnected($startNode8, $startNode74);
    $isConnected599 = $graph->isConnected($startNode8, $startNode75);
    $isConnected600 = $graph->isConnected($startNode8, $startNode76);
    $isConnected601 = $graph->isConnected($startNode8, $startNode77);
    $isConnected602 = $graph->isConnected($startNode8, $startNode78);
    $isConnected603 = $graph->isConnected($startNode8, $startNode79);
    $isConnected604 = $graph->isConnected($startNode8, $startNode80);

    $isConnected605 = $graph->isConnected($startNode9, $startNode10);
    $isConnected606 = $graph->isConnected($startNode9, $startNode11);
    $isConnected607 = $graph->isConnected($startNode9, $startNode12);
    $isConnected608 = $graph->isConnected($startNode9, $startNode13);
    $isConnected609 = $graph->isConnected($startNode9, $startNode14);
    $isConnected610 = $graph->isConnected($startNode9, $startNode15);
    $isConnected611 = $graph->isConnected($startNode9, $startNode16);
    $isConnected612 = $graph->isConnected($startNode9, $startNode17);
    $isConnected613 = $graph->isConnected($startNode9, $startNode18);
    $isConnected614 = $graph->isConnected($startNode9, $startNode19);
    $isConnected615 = $graph->isConnected($startNode9, $startNode20);
    $isConnected616 = $graph->isConnected($startNode9, $startNode21);
    $isConnected617 = $graph->isConnected($startNode9, $startNode22);
    $isConnected618 = $graph->isConnected($startNode9, $startNode23);
    $isConnected619 = $graph->isConnected($startNode9, $startNode24);
    $isConnected620 = $graph->isConnected($startNode9, $startNode25);
    $isConnected621 = $graph->isConnected($startNode9, $startNode26);
    $isConnected622 = $graph->isConnected($startNode9, $startNode27);
    $isConnected623 = $graph->isConnected($startNode9, $startNode28);
    $isConnected624 = $graph->isConnected($startNode9, $startNode29);
    $isConnected625 = $graph->isConnected($startNode9, $startNode30);
    $isConnected626 = $graph->isConnected($startNode9, $startNode31);
    $isConnected627 = $graph->isConnected($startNode9, $startNode32);
    $isConnected628 = $graph->isConnected($startNode9, $startNode33);
    $isConnected629 = $graph->isConnected($startNode9, $startNode34);
    $isConnected630 = $graph->isConnected($startNode9, $startNode35);
    $isConnected631 = $graph->isConnected($startNode9, $startNode36);
    $isConnected632 = $graph->isConnected($startNode9, $startNode37);
    $isConnected633 = $graph->isConnected($startNode9, $startNode38);
    $isConnected634 = $graph->isConnected($startNode9, $startNode39);
    $isConnected635 = $graph->isConnected($startNode9, $startNode40);
    $isConnected636 = $graph->isConnected($startNode9, $startNode41);
    $isConnected637 = $graph->isConnected($startNode9, $startNode42);
    $isConnected638 = $graph->isConnected($startNode9, $startNode43);
    $isConnected639 = $graph->isConnected($startNode9, $startNode44);
    $isConnected640 = $graph->isConnected($startNode9, $startNode45);
    $isConnected641 = $graph->isConnected($startNode9, $startNode46);
    $isConnected642 = $graph->isConnected($startNode9, $startNode47);
    $isConnected643 = $graph->isConnected($startNode9, $startNode48);
    $isConnected644 = $graph->isConnected($startNode9, $startNode49);
    $isConnected645 = $graph->isConnected($startNode9, $startNode50);
    $isConnected646 = $graph->isConnected($startNode9, $startNode51);
    $isConnected647 = $graph->isConnected($startNode9, $startNode52);
    $isConnected648 = $graph->isConnected($startNode9, $startNode53);
    $isConnected649 = $graph->isConnected($startNode9, $startNode54);
    $isConnected650 = $graph->isConnected($startNode9, $startNode55);
    $isConnected651 = $graph->isConnected($startNode9, $startNode56);
    $isConnected652 = $graph->isConnected($startNode9, $startNode57);
    $isConnected653 = $graph->isConnected($startNode9, $startNode58);
    $isConnected654 = $graph->isConnected($startNode9, $startNode59);
    $isConnected655 = $graph->isConnected($startNode9, $startNode60);
    $isConnected656 = $graph->isConnected($startNode9, $startNode61);
    $isConnected657 = $graph->isConnected($startNode9, $startNode62);
    $isConnected658 = $graph->isConnected($startNode9, $startNode63);
    $isConnected659 = $graph->isConnected($startNode9, $startNode64);
    $isConnected660 = $graph->isConnected($startNode9, $startNode65);
    $isConnected661 = $graph->isConnected($startNode9, $startNode66);
    $isConnected662 = $graph->isConnected($startNode9, $startNode67);
    $isConnected663 = $graph->isConnected($startNode9, $startNode68);
    $isConnected664 = $graph->isConnected($startNode9, $startNode69);
    $isConnected665 = $graph->isConnected($startNode9, $startNode70);
    $isConnected666 = $graph->isConnected($startNode9, $startNode71);
    $isConnected667 = $graph->isConnected($startNode9, $startNode72);
    $isConnected668 = $graph->isConnected($startNode9, $startNode73);
    $isConnected669 = $graph->isConnected($startNode9, $startNode74);
    $isConnected670 = $graph->isConnected($startNode9, $startNode75);
    $isConnected671 = $graph->isConnected($startNode9, $startNode76);
    $isConnected672 = $graph->isConnected($startNode9, $startNode77);
    $isConnected673 = $graph->isConnected($startNode9, $startNode78);
    $isConnected674 = $graph->isConnected($startNode9, $startNode79);
    $isConnected675 = $graph->isConnected($startNode9, $startNode80);

    $isConnected676 = $graph->isConnected($startNode10, $startNode11);
    $isConnected677 = $graph->isConnected($startNode10, $startNode12);
    $isConnected678 = $graph->isConnected($startNode10, $startNode13);
    $isConnected679 = $graph->isConnected($startNode10, $startNode14);
    $isConnected680 = $graph->isConnected($startNode10, $startNode15);
    $isConnected681 = $graph->isConnected($startNode10, $startNode16);
    $isConnected682 = $graph->isConnected($startNode10, $startNode17);
    $isConnected683 = $graph->isConnected($startNode10, $startNode18);
    $isConnected684 = $graph->isConnected($startNode10, $startNode19);
    $isConnected685 = $graph->isConnected($startNode10, $startNode20);
    $isConnected686 = $graph->isConnected($startNode10, $startNode21);
    $isConnected687 = $graph->isConnected($startNode10, $startNode22);
    $isConnected688 = $graph->isConnected($startNode10, $startNode23);
    $isConnected689 = $graph->isConnected($startNode10, $startNode24);
    $isConnected690 = $graph->isConnected($startNode10, $startNode25);
    $isConnected691 = $graph->isConnected($startNode10, $startNode26);
    $isConnected692 = $graph->isConnected($startNode10, $startNode27);
    $isConnected693 = $graph->isConnected($startNode10, $startNode28);
    $isConnected694 = $graph->isConnected($startNode10, $startNode29);
    $isConnected695 = $graph->isConnected($startNode10, $startNode30);
    $isConnected696 = $graph->isConnected($startNode10, $startNode31);
    $isConnected697 = $graph->isConnected($startNode10, $startNode32);
    $isConnected698 = $graph->isConnected($startNode10, $startNode33);
    $isConnected699 = $graph->isConnected($startNode10, $startNode34);
    $isConnected700 = $graph->isConnected($startNode10, $startNode35);
    $isConnected701 = $graph->isConnected($startNode10, $startNode36);
    $isConnected702 = $graph->isConnected($startNode10, $startNode37);
    $isConnected703 = $graph->isConnected($startNode10, $startNode38);
    $isConnected704 = $graph->isConnected($startNode10, $startNode39);
    $isConnected705 = $graph->isConnected($startNode10, $startNode40);
    $isConnected706 = $graph->isConnected($startNode10, $startNode41);
    $isConnected707 = $graph->isConnected($startNode10, $startNode42);
    $isConnected708 = $graph->isConnected($startNode10, $startNode43);
    $isConnected709 = $graph->isConnected($startNode10, $startNode44);
    $isConnected710 = $graph->isConnected($startNode10, $startNode45);
    $isConnected711 = $graph->isConnected($startNode10, $startNode46);
    $isConnected712 = $graph->isConnected($startNode10, $startNode47);
    $isConnected713 = $graph->isConnected($startNode10, $startNode48);
    $isConnected714 = $graph->isConnected($startNode10, $startNode49);
    $isConnected715 = $graph->isConnected($startNode10, $startNode50);
    $isConnected716 = $graph->isConnected($startNode10, $startNode51);
    $isConnected717 = $graph->isConnected($startNode10, $startNode52);
    $isConnected718 = $graph->isConnected($startNode10, $startNode53);
    $isConnected719 = $graph->isConnected($startNode10, $startNode54);
    $isConnected720 = $graph->isConnected($startNode10, $startNode55);
    $isConnected721 = $graph->isConnected($startNode10, $startNode56);
    $isConnected722 = $graph->isConnected($startNode10, $startNode57);
    $isConnected723 = $graph->isConnected($startNode10, $startNode58);
    $isConnected724 = $graph->isConnected($startNode10, $startNode59);
    $isConnected725 = $graph->isConnected($startNode10, $startNode60);
    $isConnected726 = $graph->isConnected($startNode10, $startNode61);
    $isConnected727 = $graph->isConnected($startNode10, $startNode62);
    $isConnected728 = $graph->isConnected($startNode10, $startNode63);
    $isConnected729 = $graph->isConnected($startNode10, $startNode64);
    $isConnected730 = $graph->isConnected($startNode10, $startNode65);
    $isConnected731 = $graph->isConnected($startNode10, $startNode66);
    $isConnected732 = $graph->isConnected($startNode10, $startNode67);
    $isConnected733 = $graph->isConnected($startNode10, $startNode68);
    $isConnected734 = $graph->isConnected($startNode10, $startNode69);
    $isConnected735 = $graph->isConnected($startNode10, $startNode70);
    $isConnected736 = $graph->isConnected($startNode10, $startNode71);
    $isConnected737 = $graph->isConnected($startNode10, $startNode72);
    $isConnected738 = $graph->isConnected($startNode10, $startNode73);
    $isConnected739 = $graph->isConnected($startNode10, $startNode74);
    $isConnected740 = $graph->isConnected($startNode10, $startNode75);
    $isConnected741 = $graph->isConnected($startNode10, $startNode76);
    $isConnected742 = $graph->isConnected($startNode10, $startNode77);
    $isConnected743 = $graph->isConnected($startNode10, $startNode78);
    $isConnected744 = $graph->isConnected($startNode10, $startNode79);
    $isConnected745 = $graph->isConnected($startNode10, $startNode80);

    $isConnected746 = $graph->isConnected($startNode11, $startNode12);
    $isConnected747 = $graph->isConnected($startNode11, $startNode13);
    $isConnected748 = $graph->isConnected($startNode11, $startNode14);
    $isConnected749 = $graph->isConnected($startNode11, $startNode15);
    $isConnected750 = $graph->isConnected($startNode11, $startNode16);
    $isConnected751 = $graph->isConnected($startNode11, $startNode17);
    $isConnected752 = $graph->isConnected($startNode11, $startNode18);
    $isConnected753 = $graph->isConnected($startNode11, $startNode19);
    $isConnected754 = $graph->isConnected($startNode11, $startNode20);
    $isConnected755 = $graph->isConnected($startNode11, $startNode21);
    $isConnected756 = $graph->isConnected($startNode11, $startNode22);
    $isConnected757 = $graph->isConnected($startNode11, $startNode23);
    $isConnected758 = $graph->isConnected($startNode11, $startNode24);
    $isConnected759 = $graph->isConnected($startNode11, $startNode25);
    $isConnected760 = $graph->isConnected($startNode11, $startNode26);
    $isConnected761 = $graph->isConnected($startNode11, $startNode27);
    $isConnected762 = $graph->isConnected($startNode11, $startNode28);
    $isConnected763 = $graph->isConnected($startNode11, $startNode29);
    $isConnected764 = $graph->isConnected($startNode11, $startNode30);
    $isConnected765 = $graph->isConnected($startNode11, $startNode31);
    $isConnected766 = $graph->isConnected($startNode11, $startNode32);
    $isConnected767 = $graph->isConnected($startNode11, $startNode33);
    $isConnected768 = $graph->isConnected($startNode11, $startNode34);
    $isConnected769 = $graph->isConnected($startNode11, $startNode35);
    $isConnected770 = $graph->isConnected($startNode11, $startNode36);
    $isConnected771 = $graph->isConnected($startNode11, $startNode37);
    $isConnected772 = $graph->isConnected($startNode11, $startNode38);
    $isConnected773 = $graph->isConnected($startNode11, $startNode39);
    $isConnected774 = $graph->isConnected($startNode11, $startNode40);
    $isConnected775 = $graph->isConnected($startNode11, $startNode41);
    $isConnected776 = $graph->isConnected($startNode11, $startNode42);
    $isConnected777 = $graph->isConnected($startNode11, $startNode43);
    $isConnected778 = $graph->isConnected($startNode11, $startNode44);
    $isConnected779 = $graph->isConnected($startNode11, $startNode45);
    $isConnected780 = $graph->isConnected($startNode11, $startNode46);
    $isConnected781 = $graph->isConnected($startNode11, $startNode47);
    $isConnected782 = $graph->isConnected($startNode11, $startNode48);
    $isConnected783 = $graph->isConnected($startNode11, $startNode49);
    $isConnected784 = $graph->isConnected($startNode11, $startNode50);
    $isConnected785 = $graph->isConnected($startNode11, $startNode51);
    $isConnected786 = $graph->isConnected($startNode11, $startNode52);
    $isConnected787 = $graph->isConnected($startNode11, $startNode53);
    $isConnected788 = $graph->isConnected($startNode11, $startNode54);
    $isConnected789 = $graph->isConnected($startNode11, $startNode55);
    $isConnected790 = $graph->isConnected($startNode11, $startNode56);
    $isConnected791 = $graph->isConnected($startNode11, $startNode57);
    $isConnected792 = $graph->isConnected($startNode11, $startNode58);
    $isConnected793 = $graph->isConnected($startNode11, $startNode59);
    $isConnected794 = $graph->isConnected($startNode11, $startNode60);
    $isConnected795 = $graph->isConnected($startNode11, $startNode61);
    $isConnected796 = $graph->isConnected($startNode11, $startNode62);
    $isConnected797 = $graph->isConnected($startNode11, $startNode63);
    $isConnected798 = $graph->isConnected($startNode11, $startNode64);
    $isConnected799 = $graph->isConnected($startNode11, $startNode65);
    $isConnected800 = $graph->isConnected($startNode11, $startNode66);
    $isConnected801 = $graph->isConnected($startNode11, $startNode67);
    $isConnected802 = $graph->isConnected($startNode11, $startNode68);
    $isConnected803 = $graph->isConnected($startNode11, $startNode69);
    $isConnected804 = $graph->isConnected($startNode11, $startNode70);
    $isConnected805 = $graph->isConnected($startNode11, $startNode71);
    $isConnected806 = $graph->isConnected($startNode11, $startNode72);
    $isConnected807 = $graph->isConnected($startNode11, $startNode73);
    $isConnected808 = $graph->isConnected($startNode11, $startNode74);
    $isConnected809 = $graph->isConnected($startNode11, $startNode75);
    $isConnected810 = $graph->isConnected($startNode11, $startNode76);
    $isConnected811 = $graph->isConnected($startNode11, $startNode77);
    $isConnected812 = $graph->isConnected($startNode11, $startNode78);
    $isConnected813 = $graph->isConnected($startNode11, $startNode79);
    $isConnected814 = $graph->isConnected($startNode11, $startNode80);

    $isConnected815 = $graph->isConnected($startNode12, $startNode13);
    $isConnected816 = $graph->isConnected($startNode12, $startNode14);
    $isConnected817 = $graph->isConnected($startNode12, $startNode15);
    $isConnected818 = $graph->isConnected($startNode12, $startNode16);
    $isConnected819 = $graph->isConnected($startNode12, $startNode17);
    $isConnected820 = $graph->isConnected($startNode12, $startNode18);
    $isConnected821 = $graph->isConnected($startNode12, $startNode19);
    $isConnected822 = $graph->isConnected($startNode12, $startNode20);
    $isConnected823 = $graph->isConnected($startNode12, $startNode21);
    $isConnected824 = $graph->isConnected($startNode12, $startNode22);
    $isConnected825 = $graph->isConnected($startNode12, $startNode23);
    $isConnected826 = $graph->isConnected($startNode12, $startNode24);
    $isConnected827 = $graph->isConnected($startNode12, $startNode25);
    $isConnected828 = $graph->isConnected($startNode12, $startNode26);
    $isConnected829 = $graph->isConnected($startNode12, $startNode27);
    $isConnected830 = $graph->isConnected($startNode12, $startNode28);
    $isConnected831 = $graph->isConnected($startNode12, $startNode29);
    $isConnected832 = $graph->isConnected($startNode12, $startNode30);
    $isConnected833 = $graph->isConnected($startNode12, $startNode31);
    $isConnected834 = $graph->isConnected($startNode12, $startNode32);
    $isConnected835 = $graph->isConnected($startNode12, $startNode33);
    $isConnected836 = $graph->isConnected($startNode12, $startNode34);
    $isConnected837 = $graph->isConnected($startNode12, $startNode35);
    $isConnected838 = $graph->isConnected($startNode12, $startNode36);
    $isConnected839 = $graph->isConnected($startNode12, $startNode37);
    $isConnected840 = $graph->isConnected($startNode12, $startNode38);
    $isConnected841 = $graph->isConnected($startNode12, $startNode39);
    $isConnected842 = $graph->isConnected($startNode12, $startNode40);
    $isConnected843 = $graph->isConnected($startNode12, $startNode41);
    $isConnected844 = $graph->isConnected($startNode12, $startNode42);
    $isConnected845 = $graph->isConnected($startNode12, $startNode43);
    $isConnected846 = $graph->isConnected($startNode12, $startNode44);
    $isConnected847 = $graph->isConnected($startNode12, $startNode45);
    $isConnected848 = $graph->isConnected($startNode12, $startNode46);
    $isConnected849 = $graph->isConnected($startNode12, $startNode47);
    $isConnected850 = $graph->isConnected($startNode12, $startNode48);
    $isConnected851 = $graph->isConnected($startNode12, $startNode49);
    $isConnected852 = $graph->isConnected($startNode12, $startNode50);
    $isConnected853 = $graph->isConnected($startNode12, $startNode51);
    $isConnected854 = $graph->isConnected($startNode12, $startNode52);
    $isConnected855 = $graph->isConnected($startNode12, $startNode53);
    $isConnected856 = $graph->isConnected($startNode12, $startNode54);
    $isConnected857 = $graph->isConnected($startNode12, $startNode55);
    $isConnected858 = $graph->isConnected($startNode12, $startNode56);
    $isConnected859 = $graph->isConnected($startNode12, $startNode57);
    $isConnected860 = $graph->isConnected($startNode12, $startNode58);
    $isConnected861 = $graph->isConnected($startNode12, $startNode59);
    $isConnected862 = $graph->isConnected($startNode12, $startNode60);
    $isConnected863 = $graph->isConnected($startNode12, $startNode61);
    $isConnected864 = $graph->isConnected($startNode12, $startNode62);
    $isConnected865 = $graph->isConnected($startNode12, $startNode63);
    $isConnected866 = $graph->isConnected($startNode12, $startNode64);
    $isConnected867 = $graph->isConnected($startNode12, $startNode65);
    $isConnected868 = $graph->isConnected($startNode12, $startNode66);
    $isConnected869 = $graph->isConnected($startNode12, $startNode67);
    $isConnected870 = $graph->isConnected($startNode12, $startNode68);
    $isConnected871 = $graph->isConnected($startNode12, $startNode69);
    $isConnected872 = $graph->isConnected($startNode12, $startNode70);
    $isConnected873 = $graph->isConnected($startNode12, $startNode71);
    $isConnected874 = $graph->isConnected($startNode12, $startNode72);
    $isConnected875 = $graph->isConnected($startNode12, $startNode73);
    $isConnected876 = $graph->isConnected($startNode12, $startNode74);
    $isConnected877 = $graph->isConnected($startNode12, $startNode75);
    $isConnected878 = $graph->isConnected($startNode12, $startNode76);
    $isConnected879 = $graph->isConnected($startNode12, $startNode77);
    $isConnected880 = $graph->isConnected($startNode12, $startNode78);
    $isConnected881 = $graph->isConnected($startNode12, $startNode79);
    $isConnected882 = $graph->isConnected($startNode12, $startNode80);

    $isConnected883 = $graph->isConnected($startNode13, $startNode14);
    $isConnected884 = $graph->isConnected($startNode13, $startNode15);
    $isConnected885 = $graph->isConnected($startNode13, $startNode16);
    $isConnected886 = $graph->isConnected($startNode13, $startNode17);
    $isConnected887 = $graph->isConnected($startNode13, $startNode18);
    $isConnected888 = $graph->isConnected($startNode13, $startNode19);
    $isConnected889 = $graph->isConnected($startNode13, $startNode20);
    $isConnected890 = $graph->isConnected($startNode13, $startNode21);
    $isConnected891 = $graph->isConnected($startNode13, $startNode22);
    $isConnected892 = $graph->isConnected($startNode13, $startNode23);
    $isConnected893 = $graph->isConnected($startNode13, $startNode24);
    $isConnected894 = $graph->isConnected($startNode13, $startNode25);
    $isConnected895 = $graph->isConnected($startNode13, $startNode26);
    $isConnected896 = $graph->isConnected($startNode13, $startNode27);
    $isConnected897 = $graph->isConnected($startNode13, $startNode28);
    $isConnected898 = $graph->isConnected($startNode13, $startNode29);
    $isConnected899 = $graph->isConnected($startNode13, $startNode30);
    $isConnected900 = $graph->isConnected($startNode13, $startNode31);
    $isConnected901 = $graph->isConnected($startNode13, $startNode32);
    $isConnected902 = $graph->isConnected($startNode13, $startNode33);
    $isConnected903 = $graph->isConnected($startNode13, $startNode34);
    $isConnected904 = $graph->isConnected($startNode13, $startNode35);
    $isConnected905 = $graph->isConnected($startNode13, $startNode36);
    $isConnected906 = $graph->isConnected($startNode13, $startNode37);
    $isConnected907 = $graph->isConnected($startNode13, $startNode38);
    $isConnected908 = $graph->isConnected($startNode13, $startNode39);
    $isConnected909 = $graph->isConnected($startNode13, $startNode40);
    $isConnected910 = $graph->isConnected($startNode13, $startNode41);
    $isConnected911 = $graph->isConnected($startNode13, $startNode42);
    $isConnected912 = $graph->isConnected($startNode13, $startNode43);
    $isConnected913 = $graph->isConnected($startNode13, $startNode44);
    $isConnected914 = $graph->isConnected($startNode13, $startNode45);
    $isConnected915 = $graph->isConnected($startNode13, $startNode46);
    $isConnected916 = $graph->isConnected($startNode13, $startNode47);
    $isConnected917 = $graph->isConnected($startNode13, $startNode48);
    $isConnected918 = $graph->isConnected($startNode13, $startNode49);
    $isConnected919 = $graph->isConnected($startNode13, $startNode50);
    $isConnected920 = $graph->isConnected($startNode13, $startNode51);
    $isConnected921 = $graph->isConnected($startNode13, $startNode52);
    $isConnected922 = $graph->isConnected($startNode13, $startNode53);
    $isConnected923 = $graph->isConnected($startNode13, $startNode54);
    $isConnected924 = $graph->isConnected($startNode13, $startNode55);
    $isConnected925 = $graph->isConnected($startNode13, $startNode56);
    $isConnected926 = $graph->isConnected($startNode13, $startNode57);
    $isConnected927 = $graph->isConnected($startNode13, $startNode58);
    $isConnected928 = $graph->isConnected($startNode13, $startNode59);
    $isConnected929 = $graph->isConnected($startNode13, $startNode60);
    $isConnected930 = $graph->isConnected($startNode13, $startNode61);
    $isConnected931 = $graph->isConnected($startNode13, $startNode62);
    $isConnected932 = $graph->isConnected($startNode13, $startNode63);
    $isConnected933 = $graph->isConnected($startNode13, $startNode64);
    $isConnected934 = $graph->isConnected($startNode13, $startNode65);
    $isConnected935 = $graph->isConnected($startNode13, $startNode66);
    $isConnected936 = $graph->isConnected($startNode13, $startNode67);
    $isConnected937 = $graph->isConnected($startNode13, $startNode68);
    $isConnected938 = $graph->isConnected($startNode13, $startNode69);
    $isConnected939 = $graph->isConnected($startNode13, $startNode70);
    $isConnected940 = $graph->isConnected($startNode13, $startNode71);
    $isConnected941 = $graph->isConnected($startNode13, $startNode72);
    $isConnected942 = $graph->isConnected($startNode13, $startNode73);
    $isConnected943 = $graph->isConnected($startNode13, $startNode74);
    $isConnected944 = $graph->isConnected($startNode13, $startNode75);
    $isConnected945 = $graph->isConnected($startNode13, $startNode76);
    $isConnected946 = $graph->isConnected($startNode13, $startNode77);
    $isConnected947 = $graph->isConnected($startNode13, $startNode78);
    $isConnected948 = $graph->isConnected($startNode13, $startNode79);
    $isConnected949 = $graph->isConnected($startNode13, $startNode80);

    $isConnected950 = $graph->isConnected($startNode14, $startNode15);
    $isConnected951 = $graph->isConnected($startNode14, $startNode16);
    $isConnected952 = $graph->isConnected($startNode14, $startNode17);
    $isConnected953 = $graph->isConnected($startNode14, $startNode18);
    $isConnected954 = $graph->isConnected($startNode14, $startNode19);
    $isConnected955 = $graph->isConnected($startNode14, $startNode20);
    $isConnected956 = $graph->isConnected($startNode14, $startNode21);
    $isConnected957 = $graph->isConnected($startNode14, $startNode22);
    $isConnected958 = $graph->isConnected($startNode14, $startNode23);
    $isConnected959 = $graph->isConnected($startNode14, $startNode24);
    $isConnected960 = $graph->isConnected($startNode14, $startNode25);
    $isConnected961 = $graph->isConnected($startNode14, $startNode26);
    $isConnected962 = $graph->isConnected($startNode14, $startNode27);
    $isConnected963 = $graph->isConnected($startNode14, $startNode28);
    $isConnected964 = $graph->isConnected($startNode14, $startNode29);
    $isConnected965 = $graph->isConnected($startNode14, $startNode30);
    $isConnected966 = $graph->isConnected($startNode14, $startNode31);
    $isConnected967 = $graph->isConnected($startNode14, $startNode32);
    $isConnected968 = $graph->isConnected($startNode14, $startNode33);
    $isConnected969 = $graph->isConnected($startNode14, $startNode34);
    $isConnected970 = $graph->isConnected($startNode14, $startNode35);
    $isConnected971 = $graph->isConnected($startNode14, $startNode36);
    $isConnected972 = $graph->isConnected($startNode14, $startNode37);
    $isConnected973 = $graph->isConnected($startNode14, $startNode38);
    $isConnected974 = $graph->isConnected($startNode14, $startNode39);
    $isConnected975 = $graph->isConnected($startNode14, $startNode40);
    $isConnected976 = $graph->isConnected($startNode14, $startNode41);
    $isConnected977 = $graph->isConnected($startNode14, $startNode42);
    $isConnected978 = $graph->isConnected($startNode14, $startNode43);
    $isConnected979 = $graph->isConnected($startNode14, $startNode44);
    $isConnected980 = $graph->isConnected($startNode14, $startNode45);
    $isConnected981 = $graph->isConnected($startNode14, $startNode46);
    $isConnected982 = $graph->isConnected($startNode14, $startNode47);
    $isConnected983 = $graph->isConnected($startNode14, $startNode48);
    $isConnected984 = $graph->isConnected($startNode14, $startNode49);
    $isConnected985 = $graph->isConnected($startNode14, $startNode50);
    $isConnected986 = $graph->isConnected($startNode14, $startNode51);
    $isConnected987 = $graph->isConnected($startNode14, $startNode52);
    $isConnected988 = $graph->isConnected($startNode14, $startNode53);
    $isConnected989 = $graph->isConnected($startNode14, $startNode54);
    $isConnected990 = $graph->isConnected($startNode14, $startNode55);
    $isConnected991 = $graph->isConnected($startNode14, $startNode56);
    $isConnected992 = $graph->isConnected($startNode14, $startNode57);
    $isConnected993 = $graph->isConnected($startNode14, $startNode58);
    $isConnected994 = $graph->isConnected($startNode14, $startNode59);
    $isConnected995 = $graph->isConnected($startNode14, $startNode60);
    $isConnected996 = $graph->isConnected($startNode14, $startNode61);
    $isConnected997 = $graph->isConnected($startNode14, $startNode62);
    $isConnected998 = $graph->isConnected($startNode14, $startNode63);
    $isConnected999 = $graph->isConnected($startNode14, $startNode64);
    $isConnected1000 = $graph->isConnected($startNode14, $startNode65);
    $isConnected1001 = $graph->isConnected($startNode14, $startNode66);
    $isConnected1002 = $graph->isConnected($startNode14, $startNode67);
    $isConnected1003 = $graph->isConnected($startNode14, $startNode68);
    $isConnected1004 = $graph->isConnected($startNode14, $startNode69);
    $isConnected1005 = $graph->isConnected($startNode14, $startNode70);
    $isConnected1006 = $graph->isConnected($startNode14, $startNode71);
    $isConnected1007 = $graph->isConnected($startNode14, $startNode72);
    $isConnected1008 = $graph->isConnected($startNode14, $startNode73);
    $isConnected1009 = $graph->isConnected($startNode14, $startNode74);
    $isConnected1010 = $graph->isConnected($startNode14, $startNode75);
    $isConnected1011 = $graph->isConnected($startNode14, $startNode76);
    $isConnected1012 = $graph->isConnected($startNode14, $startNode77);
    $isConnected1013 = $graph->isConnected($startNode14, $startNode78);
    $isConnected1014 = $graph->isConnected($startNode14, $startNode79);
    $isConnected1015 = $graph->isConnected($startNode14, $startNode80);

    $isConnected1016 = $graph->isConnected($startNode15, $startNode16);
    $isConnected1017 = $graph->isConnected($startNode15, $startNode17);
    $isConnected1018 = $graph->isConnected($startNode15, $startNode18);
    $isConnected1019 = $graph->isConnected($startNode15, $startNode19);
    $isConnected1020 = $graph->isConnected($startNode15, $startNode20);
    $isConnected1021 = $graph->isConnected($startNode15, $startNode21);
    $isConnected1022 = $graph->isConnected($startNode15, $startNode22);
    $isConnected1023 = $graph->isConnected($startNode15, $startNode23);
    $isConnected1024 = $graph->isConnected($startNode15, $startNode24);
    $isConnected1025 = $graph->isConnected($startNode15, $startNode25);
    $isConnected1026 = $graph->isConnected($startNode15, $startNode26);
    $isConnected1027 = $graph->isConnected($startNode15, $startNode27);
    $isConnected1028 = $graph->isConnected($startNode15, $startNode28);
    $isConnected1029 = $graph->isConnected($startNode15, $startNode29);
    $isConnected1030 = $graph->isConnected($startNode15, $startNode30);
    $isConnected1031 = $graph->isConnected($startNode15, $startNode31);
    $isConnected1032 = $graph->isConnected($startNode15, $startNode32);
    $isConnected1033 = $graph->isConnected($startNode15, $startNode33);
    $isConnected1034 = $graph->isConnected($startNode15, $startNode34);
    $isConnected1035 = $graph->isConnected($startNode15, $startNode35);
    $isConnected1036 = $graph->isConnected($startNode15, $startNode36);
    $isConnected1037 = $graph->isConnected($startNode15, $startNode37);
    $isConnected1038 = $graph->isConnected($startNode15, $startNode38);
    $isConnected1039 = $graph->isConnected($startNode15, $startNode39);
    $isConnected1040 = $graph->isConnected($startNode15, $startNode40);
    $isConnected1041 = $graph->isConnected($startNode15, $startNode41);
    $isConnected1042 = $graph->isConnected($startNode15, $startNode42);
    $isConnected1043 = $graph->isConnected($startNode15, $startNode43);
    $isConnected1044 = $graph->isConnected($startNode15, $startNode44);
    $isConnected1045 = $graph->isConnected($startNode15, $startNode45);
    $isConnected1046 = $graph->isConnected($startNode15, $startNode46);
    $isConnected1047 = $graph->isConnected($startNode15, $startNode47);
    $isConnected1048 = $graph->isConnected($startNode15, $startNode48);
    $isConnected1049 = $graph->isConnected($startNode15, $startNode49);
    $isConnected1050 = $graph->isConnected($startNode15, $startNode50);
    $isConnected1051 = $graph->isConnected($startNode15, $startNode51);
    $isConnected1052 = $graph->isConnected($startNode15, $startNode52);
    $isConnected1053 = $graph->isConnected($startNode15, $startNode53);
    $isConnected1054 = $graph->isConnected($startNode15, $startNode54);
    $isConnected1055 = $graph->isConnected($startNode15, $startNode55);
    $isConnected1056 = $graph->isConnected($startNode15, $startNode56);
    $isConnected1057 = $graph->isConnected($startNode15, $startNode57);
    $isConnected1058 = $graph->isConnected($startNode15, $startNode58);
    $isConnected1059 = $graph->isConnected($startNode15, $startNode59);
    $isConnected1060 = $graph->isConnected($startNode15, $startNode60);
    $isConnected1061 = $graph->isConnected($startNode15, $startNode61);
    $isConnected1062 = $graph->isConnected($startNode15, $startNode62);
    $isConnected1063 = $graph->isConnected($startNode15, $startNode63);
    $isConnected1064 = $graph->isConnected($startNode15, $startNode64);
    $isConnected1065 = $graph->isConnected($startNode15, $startNode65);
    $isConnected1066 = $graph->isConnected($startNode15, $startNode66);
    $isConnected1067 = $graph->isConnected($startNode15, $startNode67);
    $isConnected1068 = $graph->isConnected($startNode15, $startNode68);
    $isConnected1069 = $graph->isConnected($startNode15, $startNode69);
    $isConnected1070 = $graph->isConnected($startNode15, $startNode70);
    $isConnected1071 = $graph->isConnected($startNode15, $startNode71);
    $isConnected1072 = $graph->isConnected($startNode15, $startNode72);
    $isConnected1073 = $graph->isConnected($startNode15, $startNode73);
    $isConnected1074 = $graph->isConnected($startNode15, $startNode74);
    $isConnected1075 = $graph->isConnected($startNode15, $startNode75);
    $isConnected1076 = $graph->isConnected($startNode15, $startNode76);
    $isConnected1077 = $graph->isConnected($startNode15, $startNode77);
    $isConnected1078 = $graph->isConnected($startNode15, $startNode78);
    $isConnected1079 = $graph->isConnected($startNode15, $startNode79);
    $isConnected1080 = $graph->isConnected($startNode15, $startNode80);

    $isConnected1081 = $graph->isConnected($startNode16, $startNode17);
    $isConnected1082 = $graph->isConnected($startNode16, $startNode18);
    $isConnected1083 = $graph->isConnected($startNode16, $startNode19);
    $isConnected1084 = $graph->isConnected($startNode16, $startNode20);
    $isConnected1085 = $graph->isConnected($startNode16, $startNode21);
    $isConnected1086 = $graph->isConnected($startNode16, $startNode22);
    $isConnected1087 = $graph->isConnected($startNode16, $startNode23);
    $isConnected1088 = $graph->isConnected($startNode16, $startNode24);
    $isConnected1089 = $graph->isConnected($startNode16, $startNode25);
    $isConnected1090 = $graph->isConnected($startNode16, $startNode26);
    $isConnected1091 = $graph->isConnected($startNode16, $startNode27);
    $isConnected1092 = $graph->isConnected($startNode16, $startNode28);
    $isConnected1093 = $graph->isConnected($startNode16, $startNode29);
    $isConnected1094 = $graph->isConnected($startNode16, $startNode30);
    $isConnected1095 = $graph->isConnected($startNode16, $startNode31);
    $isConnected1096 = $graph->isConnected($startNode16, $startNode32);
    $isConnected1097 = $graph->isConnected($startNode16, $startNode33);
    $isConnected1098 = $graph->isConnected($startNode16, $startNode34);
    $isConnected1099 = $graph->isConnected($startNode16, $startNode35);
    $isConnected1100 = $graph->isConnected($startNode16, $startNode36);
    $isConnected1101 = $graph->isConnected($startNode16, $startNode37);
    $isConnected1102 = $graph->isConnected($startNode16, $startNode38);
    $isConnected1103 = $graph->isConnected($startNode16, $startNode39);
    $isConnected1104 = $graph->isConnected($startNode16, $startNode40);
    $isConnected1105 = $graph->isConnected($startNode16, $startNode41);
    $isConnected1106 = $graph->isConnected($startNode16, $startNode42);
    $isConnected1107 = $graph->isConnected($startNode16, $startNode43);
    $isConnected1108 = $graph->isConnected($startNode16, $startNode44);
    $isConnected1109 = $graph->isConnected($startNode16, $startNode45);
    $isConnected1110 = $graph->isConnected($startNode16, $startNode46);
    $isConnected1111 = $graph->isConnected($startNode16, $startNode47);
    $isConnected1112 = $graph->isConnected($startNode16, $startNode48);
    $isConnected1113 = $graph->isConnected($startNode16, $startNode49);
    $isConnected1114 = $graph->isConnected($startNode16, $startNode50);
    $isConnected1115 = $graph->isConnected($startNode16, $startNode51);
    $isConnected1116 = $graph->isConnected($startNode16, $startNode52);
    $isConnected1117 = $graph->isConnected($startNode16, $startNode53);
    $isConnected1118 = $graph->isConnected($startNode16, $startNode54);
    $isConnected1119 = $graph->isConnected($startNode16, $startNode55);
    $isConnected1120 = $graph->isConnected($startNode16, $startNode56);
    $isConnected1121 = $graph->isConnected($startNode16, $startNode57);
    $isConnected1122 = $graph->isConnected($startNode16, $startNode58);
    $isConnected1123 = $graph->isConnected($startNode16, $startNode59);
    $isConnected1124 = $graph->isConnected($startNode16, $startNode60);
    $isConnected1125 = $graph->isConnected($startNode16, $startNode61);
    $isConnected1126 = $graph->isConnected($startNode16, $startNode62);
    $isConnected1127 = $graph->isConnected($startNode16, $startNode63);
    $isConnected1128 = $graph->isConnected($startNode16, $startNode64);
    $isConnected1129 = $graph->isConnected($startNode16, $startNode65);
    $isConnected1130 = $graph->isConnected($startNode16, $startNode66);
    $isConnected1131 = $graph->isConnected($startNode16, $startNode67);
    $isConnected1132 = $graph->isConnected($startNode16, $startNode68);
    $isConnected1133 = $graph->isConnected($startNode16, $startNode69);
    $isConnected1134 = $graph->isConnected($startNode16, $startNode70);
    $isConnected1135 = $graph->isConnected($startNode16, $startNode71);
    $isConnected1136 = $graph->isConnected($startNode16, $startNode72);
    $isConnected1137 = $graph->isConnected($startNode16, $startNode73);
    $isConnected1138 = $graph->isConnected($startNode16, $startNode74);
    $isConnected1139 = $graph->isConnected($startNode16, $startNode75);
    $isConnected1140 = $graph->isConnected($startNode16, $startNode76);
    $isConnected1141 = $graph->isConnected($startNode16, $startNode77);
    $isConnected1142 = $graph->isConnected($startNode16, $startNode78);
    $isConnected1143 = $graph->isConnected($startNode16, $startNode79);
    $isConnected1144 = $graph->isConnected($startNode16, $startNode80);

    $isConnected1145 = $graph->isConnected($startNode17, $startNode18);
    $isConnected1146 = $graph->isConnected($startNode17, $startNode19);
    $isConnected1147 = $graph->isConnected($startNode17, $startNode20);
    $isConnected1148 = $graph->isConnected($startNode17, $startNode21);
    $isConnected1149 = $graph->isConnected($startNode17, $startNode22);
    $isConnected1150 = $graph->isConnected($startNode17, $startNode23);
    $isConnected1151 = $graph->isConnected($startNode17, $startNode24);
    $isConnected1152 = $graph->isConnected($startNode17, $startNode25);
    $isConnected1153 = $graph->isConnected($startNode17, $startNode26);
    $isConnected1154 = $graph->isConnected($startNode17, $startNode27);
    $isConnected1155 = $graph->isConnected($startNode17, $startNode28);
    $isConnected1156 = $graph->isConnected($startNode17, $startNode29);
    $isConnected1157 = $graph->isConnected($startNode17, $startNode30);
    $isConnected1158 = $graph->isConnected($startNode17, $startNode31);
    $isConnected1159 = $graph->isConnected($startNode17, $startNode32);
    $isConnected1160 = $graph->isConnected($startNode17, $startNode33);
    $isConnected1161 = $graph->isConnected($startNode17, $startNode34);
    $isConnected1162 = $graph->isConnected($startNode17, $startNode35);
    $isConnected1163 = $graph->isConnected($startNode17, $startNode36);
    $isConnected1164 = $graph->isConnected($startNode17, $startNode37);
    $isConnected1165 = $graph->isConnected($startNode17, $startNode38);
    $isConnected1166 = $graph->isConnected($startNode17, $startNode39);
    $isConnected1167 = $graph->isConnected($startNode17, $startNode40);
    $isConnected1168 = $graph->isConnected($startNode17, $startNode41);
    $isConnected1169 = $graph->isConnected($startNode17, $startNode42);
    $isConnected1170 = $graph->isConnected($startNode17, $startNode43);
    $isConnected1171 = $graph->isConnected($startNode17, $startNode44);
    $isConnected1172 = $graph->isConnected($startNode17, $startNode45);
    $isConnected1173 = $graph->isConnected($startNode17, $startNode46);
    $isConnected1174 = $graph->isConnected($startNode17, $startNode47);
    $isConnected1175 = $graph->isConnected($startNode17, $startNode48);
    $isConnected1176 = $graph->isConnected($startNode17, $startNode49);
    $isConnected1177 = $graph->isConnected($startNode17, $startNode50);
    $isConnected1178 = $graph->isConnected($startNode17, $startNode51);
    $isConnected1179 = $graph->isConnected($startNode17, $startNode52);
    $isConnected1180 = $graph->isConnected($startNode17, $startNode53);
    $isConnected1181 = $graph->isConnected($startNode17, $startNode54);
    $isConnected1182 = $graph->isConnected($startNode17, $startNode55);
    $isConnected1183 = $graph->isConnected($startNode17, $startNode56);
    $isConnected1184 = $graph->isConnected($startNode17, $startNode57);
    $isConnected1185 = $graph->isConnected($startNode17, $startNode58);
    $isConnected1186 = $graph->isConnected($startNode17, $startNode59);
    $isConnected1187 = $graph->isConnected($startNode17, $startNode60);
    $isConnected1188 = $graph->isConnected($startNode17, $startNode61);
    $isConnected1189 = $graph->isConnected($startNode17, $startNode62);
    $isConnected1190 = $graph->isConnected($startNode17, $startNode63);
    $isConnected1191 = $graph->isConnected($startNode17, $startNode64);
    $isConnected1192 = $graph->isConnected($startNode17, $startNode65);
    $isConnected1193 = $graph->isConnected($startNode17, $startNode66);
    $isConnected1194 = $graph->isConnected($startNode17, $startNode67);
    $isConnected1195 = $graph->isConnected($startNode17, $startNode68);
    $isConnected1196 = $graph->isConnected($startNode17, $startNode69);
    $isConnected1197 = $graph->isConnected($startNode17, $startNode70);
    $isConnected1198 = $graph->isConnected($startNode17, $startNode71);
    $isConnected1199 = $graph->isConnected($startNode17, $startNode72);
    $isConnected1200 = $graph->isConnected($startNode17, $startNode73);
    $isConnected1201 = $graph->isConnected($startNode17, $startNode74);
    $isConnected1202 = $graph->isConnected($startNode17, $startNode75);
    $isConnected1203 = $graph->isConnected($startNode17, $startNode76);
    $isConnected1204 = $graph->isConnected($startNode17, $startNode77);
    $isConnected1205 = $graph->isConnected($startNode17, $startNode78);
    $isConnected1206 = $graph->isConnected($startNode17, $startNode79);
    $isConnected1207 = $graph->isConnected($startNode17, $startNode80);

    $isConnected1208 = $graph->isConnected($startNode18, $startNode19);
    $isConnected1209 = $graph->isConnected($startNode18, $startNode20);
    $isConnected1210 = $graph->isConnected($startNode18, $startNode21);
    $isConnected1211 = $graph->isConnected($startNode18, $startNode22);
    $isConnected1212 = $graph->isConnected($startNode18, $startNode23);
    $isConnected1213 = $graph->isConnected($startNode18, $startNode24);
    $isConnected1214 = $graph->isConnected($startNode18, $startNode25);
    $isConnected1215 = $graph->isConnected($startNode18, $startNode26);
    $isConnected1216 = $graph->isConnected($startNode18, $startNode27);
    $isConnected1217 = $graph->isConnected($startNode18, $startNode28);
    $isConnected1218 = $graph->isConnected($startNode18, $startNode29);
    $isConnected1219 = $graph->isConnected($startNode18, $startNode30);
    $isConnected1220 = $graph->isConnected($startNode18, $startNode31);
    $isConnected1221 = $graph->isConnected($startNode18, $startNode32);
    $isConnected1222 = $graph->isConnected($startNode18, $startNode33);
    $isConnected1223 = $graph->isConnected($startNode18, $startNode34);
    $isConnected1224 = $graph->isConnected($startNode18, $startNode35);
    $isConnected1225 = $graph->isConnected($startNode18, $startNode36);
    $isConnected1226 = $graph->isConnected($startNode18, $startNode37);
    $isConnected1227 = $graph->isConnected($startNode18, $startNode38);
    $isConnected1228 = $graph->isConnected($startNode18, $startNode39);
    $isConnected1229 = $graph->isConnected($startNode18, $startNode40);
    $isConnected1230 = $graph->isConnected($startNode18, $startNode41);
    $isConnected1231 = $graph->isConnected($startNode18, $startNode42);
    $isConnected1232 = $graph->isConnected($startNode18, $startNode43);
    $isConnected1233 = $graph->isConnected($startNode18, $startNode44);
    $isConnected1234 = $graph->isConnected($startNode18, $startNode45);
    $isConnected1235 = $graph->isConnected($startNode18, $startNode46);
    $isConnected1236 = $graph->isConnected($startNode18, $startNode47);
    $isConnected1237 = $graph->isConnected($startNode18, $startNode48);
    $isConnected1238 = $graph->isConnected($startNode18, $startNode49);
    $isConnected1239 = $graph->isConnected($startNode18, $startNode50);
    $isConnected1240 = $graph->isConnected($startNode18, $startNode51);
    $isConnected1241 = $graph->isConnected($startNode18, $startNode52);
    $isConnected1242 = $graph->isConnected($startNode18, $startNode53);
    $isConnected1243 = $graph->isConnected($startNode18, $startNode54);
    $isConnected1244 = $graph->isConnected($startNode18, $startNode55);
    $isConnected1245 = $graph->isConnected($startNode18, $startNode56);
    $isConnected1246 = $graph->isConnected($startNode18, $startNode57);
    $isConnected1247 = $graph->isConnected($startNode18, $startNode58);
    $isConnected1248 = $graph->isConnected($startNode18, $startNode59);
    $isConnected1249 = $graph->isConnected($startNode18, $startNode60);
    $isConnected1250 = $graph->isConnected($startNode18, $startNode61);
    $isConnected1251 = $graph->isConnected($startNode18, $startNode62);
    $isConnected1252 = $graph->isConnected($startNode18, $startNode63);
    $isConnected1253 = $graph->isConnected($startNode18, $startNode64);
    $isConnected1254 = $graph->isConnected($startNode18, $startNode65);
    $isConnected1255 = $graph->isConnected($startNode18, $startNode66);
    $isConnected1256 = $graph->isConnected($startNode18, $startNode67);
    $isConnected1257 = $graph->isConnected($startNode18, $startNode68);
    $isConnected1258 = $graph->isConnected($startNode18, $startNode69);
    $isConnected1259 = $graph->isConnected($startNode18, $startNode70);
    $isConnected1260 = $graph->isConnected($startNode18, $startNode71);
    $isConnected1261 = $graph->isConnected($startNode18, $startNode72);
    $isConnected1262 = $graph->isConnected($startNode18, $startNode73);
    $isConnected1263 = $graph->isConnected($startNode18, $startNode74);
    $isConnected1264 = $graph->isConnected($startNode18, $startNode75);
    $isConnected1265 = $graph->isConnected($startNode18, $startNode76);
    $isConnected1266 = $graph->isConnected($startNode18, $startNode77);
    $isConnected1267 = $graph->isConnected($startNode18, $startNode78);
    $isConnected1268 = $graph->isConnected($startNode18, $startNode79);
    $isConnected1269 = $graph->isConnected($startNode18, $startNode80);

    $isConnected1270 = $graph->isConnected($startNode19, $startNode20);
    $isConnected1271 = $graph->isConnected($startNode19, $startNode21);
    $isConnected1272 = $graph->isConnected($startNode19, $startNode22);
    $isConnected1273 = $graph->isConnected($startNode19, $startNode23);
    $isConnected1274 = $graph->isConnected($startNode19, $startNode24);
    $isConnected1275 = $graph->isConnected($startNode19, $startNode25);
    $isConnected1276 = $graph->isConnected($startNode19, $startNode26);
    $isConnected1277 = $graph->isConnected($startNode19, $startNode27);
    $isConnected1278 = $graph->isConnected($startNode19, $startNode28);
    $isConnected1279 = $graph->isConnected($startNode19, $startNode29);
    $isConnected1280 = $graph->isConnected($startNode19, $startNode30);
    $isConnected1281 = $graph->isConnected($startNode19, $startNode31);
    $isConnected1282 = $graph->isConnected($startNode19, $startNode32);
    $isConnected1283 = $graph->isConnected($startNode19, $startNode33);
    $isConnected1284 = $graph->isConnected($startNode19, $startNode34);
    $isConnected1285 = $graph->isConnected($startNode19, $startNode35);
    $isConnected1286 = $graph->isConnected($startNode19, $startNode36);
    $isConnected1287 = $graph->isConnected($startNode19, $startNode37);
    $isConnected1288 = $graph->isConnected($startNode19, $startNode38);
    $isConnected1289 = $graph->isConnected($startNode19, $startNode39);
    $isConnected1290 = $graph->isConnected($startNode19, $startNode40);
    $isConnected1291 = $graph->isConnected($startNode19, $startNode41);
    $isConnected1292 = $graph->isConnected($startNode19, $startNode42);
    $isConnected1293 = $graph->isConnected($startNode19, $startNode43);
    $isConnected1294 = $graph->isConnected($startNode19, $startNode44);
    $isConnected1295 = $graph->isConnected($startNode19, $startNode45);
    $isConnected1296 = $graph->isConnected($startNode19, $startNode46);
    $isConnected1297 = $graph->isConnected($startNode19, $startNode47);
    $isConnected1298 = $graph->isConnected($startNode19, $startNode48);
    $isConnected1299 = $graph->isConnected($startNode19, $startNode49);
    $isConnected1300 = $graph->isConnected($startNode19, $startNode50);
    $isConnected1301 = $graph->isConnected($startNode19, $startNode51);
    $isConnected1302 = $graph->isConnected($startNode19, $startNode52);
    $isConnected1303 = $graph->isConnected($startNode19, $startNode53);
    $isConnected1304 = $graph->isConnected($startNode19, $startNode54);
    $isConnected1305 = $graph->isConnected($startNode19, $startNode55);
    $isConnected1306 = $graph->isConnected($startNode19, $startNode56);
    $isConnected1307 = $graph->isConnected($startNode19, $startNode57);
    $isConnected1308 = $graph->isConnected($startNode19, $startNode58);
    $isConnected1309 = $graph->isConnected($startNode19, $startNode59);
    $isConnected1310 = $graph->isConnected($startNode19, $startNode60);
    $isConnected1311 = $graph->isConnected($startNode19, $startNode61);
    $isConnected1312 = $graph->isConnected($startNode19, $startNode62);
    $isConnected1313 = $graph->isConnected($startNode19, $startNode63);
    $isConnected1314 = $graph->isConnected($startNode19, $startNode64);
    $isConnected1315 = $graph->isConnected($startNode19, $startNode65);
    $isConnected1316 = $graph->isConnected($startNode19, $startNode66);
    $isConnected1317 = $graph->isConnected($startNode19, $startNode67);
    $isConnected1318 = $graph->isConnected($startNode19, $startNode68);
    $isConnected1319 = $graph->isConnected($startNode19, $startNode69);
    $isConnected1320 = $graph->isConnected($startNode19, $startNode70);
    $isConnected1321 = $graph->isConnected($startNode19, $startNode71);
    $isConnected1322 = $graph->isConnected($startNode19, $startNode72);
    $isConnected1323 = $graph->isConnected($startNode19, $startNode73);
    $isConnected1324 = $graph->isConnected($startNode19, $startNode74);
    $isConnected1325 = $graph->isConnected($startNode19, $startNode75);
    $isConnected1326 = $graph->isConnected($startNode19, $startNode76);
    $isConnected1327 = $graph->isConnected($startNode19, $startNode77);
    $isConnected1328 = $graph->isConnected($startNode19, $startNode78);
    $isConnected1329 = $graph->isConnected($startNode19, $startNode79);
    $isConnected1330 = $graph->isConnected($startNode19, $startNode80);

    $isConnected1331 = $graph->isConnected($startNode20, $startNode21);
    $isConnected1332 = $graph->isConnected($startNode20, $startNode22);
    $isConnected1333 = $graph->isConnected($startNode20, $startNode23);
    $isConnected1334 = $graph->isConnected($startNode20, $startNode24);
    $isConnected1335 = $graph->isConnected($startNode20, $startNode25);
    $isConnected1336 = $graph->isConnected($startNode20, $startNode26);
    $isConnected1337 = $graph->isConnected($startNode20, $startNode27);
    $isConnected1338 = $graph->isConnected($startNode20, $startNode28);
    $isConnected1339 = $graph->isConnected($startNode20, $startNode29);
    $isConnected1340 = $graph->isConnected($startNode20, $startNode30);
    $isConnected1341 = $graph->isConnected($startNode20, $startNode31);
    $isConnected1342 = $graph->isConnected($startNode20, $startNode32);
    $isConnected1343 = $graph->isConnected($startNode20, $startNode33);
    $isConnected1344 = $graph->isConnected($startNode20, $startNode34);
    $isConnected1345 = $graph->isConnected($startNode20, $startNode35);
    $isConnected1346 = $graph->isConnected($startNode20, $startNode36);
    $isConnected1347 = $graph->isConnected($startNode20, $startNode37);
    $isConnected1348 = $graph->isConnected($startNode20, $startNode38);
    $isConnected1349 = $graph->isConnected($startNode20, $startNode39);
    $isConnected1350 = $graph->isConnected($startNode20, $startNode40);
    $isConnected1351 = $graph->isConnected($startNode20, $startNode41);
    $isConnected1352 = $graph->isConnected($startNode20, $startNode42);
    $isConnected1353 = $graph->isConnected($startNode20, $startNode43);
    $isConnected1354 = $graph->isConnected($startNode20, $startNode44);
    $isConnected1355 = $graph->isConnected($startNode20, $startNode45);
    $isConnected1356 = $graph->isConnected($startNode20, $startNode46);
    $isConnected1357 = $graph->isConnected($startNode20, $startNode47);
    $isConnected1358 = $graph->isConnected($startNode20, $startNode48);
    $isConnected1359 = $graph->isConnected($startNode20, $startNode49);
    $isConnected1360 = $graph->isConnected($startNode20, $startNode50);
    $isConnected1361 = $graph->isConnected($startNode20, $startNode51);
    $isConnected1362 = $graph->isConnected($startNode20, $startNode52);
    $isConnected1363 = $graph->isConnected($startNode20, $startNode53);
    $isConnected1364 = $graph->isConnected($startNode20, $startNode54);
    $isConnected1365 = $graph->isConnected($startNode20, $startNode55);
    $isConnected1366 = $graph->isConnected($startNode20, $startNode56);
    $isConnected1367 = $graph->isConnected($startNode20, $startNode57);
    $isConnected1368 = $graph->isConnected($startNode20, $startNode58);
    $isConnected1369 = $graph->isConnected($startNode20, $startNode59);
    $isConnected1370 = $graph->isConnected($startNode20, $startNode60);
    $isConnected1371 = $graph->isConnected($startNode20, $startNode61);
    $isConnected1372 = $graph->isConnected($startNode20, $startNode62);
    $isConnected1373 = $graph->isConnected($startNode20, $startNode63);
    $isConnected1374 = $graph->isConnected($startNode20, $startNode64);
    $isConnected1375 = $graph->isConnected($startNode20, $startNode65);
    $isConnected1376 = $graph->isConnected($startNode20, $startNode66);
    $isConnected1377 = $graph->isConnected($startNode20, $startNode67);
    $isConnected1378 = $graph->isConnected($startNode20, $startNode68);
    $isConnected1379 = $graph->isConnected($startNode20, $startNode69);
    $isConnected1380 = $graph->isConnected($startNode20, $startNode70);
    $isConnected1381 = $graph->isConnected($startNode20, $startNode71);
    $isConnected1382 = $graph->isConnected($startNode20, $startNode72);
    $isConnected1383 = $graph->isConnected($startNode20, $startNode73);
    $isConnected1384 = $graph->isConnected($startNode20, $startNode74);
    $isConnected1385 = $graph->isConnected($startNode20, $startNode75);
    $isConnected1386 = $graph->isConnected($startNode20, $startNode76);
    $isConnected1387 = $graph->isConnected($startNode20, $startNode77);
    $isConnected1388 = $graph->isConnected($startNode20, $startNode78);
    $isConnected1389 = $graph->isConnected($startNode20, $startNode79);
    $isConnected1390 = $graph->isConnected($startNode20, $startNode80);

    $isConnected1391 = $graph->isConnected($startNode21, $startNode22);
    $isConnected1392 = $graph->isConnected($startNode21, $startNode23);
    $isConnected1393 = $graph->isConnected($startNode21, $startNode24);
    $isConnected1394 = $graph->isConnected($startNode21, $startNode25);
    $isConnected1395 = $graph->isConnected($startNode21, $startNode26);
    $isConnected1396 = $graph->isConnected($startNode21, $startNode27);
    $isConnected1397 = $graph->isConnected($startNode21, $startNode28);
    $isConnected1398 = $graph->isConnected($startNode21, $startNode29);
    $isConnected1399 = $graph->isConnected($startNode21, $startNode30);
    $isConnected1400 = $graph->isConnected($startNode21, $startNode31);
    $isConnected1401 = $graph->isConnected($startNode21, $startNode32);
    $isConnected1402 = $graph->isConnected($startNode21, $startNode33);
    $isConnected1403 = $graph->isConnected($startNode21, $startNode34);
    $isConnected1404 = $graph->isConnected($startNode21, $startNode35);
    $isConnected1405 = $graph->isConnected($startNode21, $startNode36);
    $isConnected1406 = $graph->isConnected($startNode21, $startNode37);
    $isConnected1407 = $graph->isConnected($startNode21, $startNode38);
    $isConnected1408 = $graph->isConnected($startNode21, $startNode39);
    $isConnected1409 = $graph->isConnected($startNode21, $startNode40);
    $isConnected1410 = $graph->isConnected($startNode21, $startNode41);
    $isConnected1411 = $graph->isConnected($startNode21, $startNode42);
    $isConnected1412 = $graph->isConnected($startNode21, $startNode43);
    $isConnected1413 = $graph->isConnected($startNode21, $startNode44);
    $isConnected1414 = $graph->isConnected($startNode21, $startNode45);
    $isConnected1415 = $graph->isConnected($startNode21, $startNode46);
    $isConnected1416 = $graph->isConnected($startNode21, $startNode47);
    $isConnected1417 = $graph->isConnected($startNode21, $startNode48);
    $isConnected1418 = $graph->isConnected($startNode21, $startNode49);
    $isConnected1419 = $graph->isConnected($startNode21, $startNode50);
    $isConnected1420 = $graph->isConnected($startNode21, $startNode51);
    $isConnected1421 = $graph->isConnected($startNode21, $startNode52);
    $isConnected1422 = $graph->isConnected($startNode21, $startNode53);
    $isConnected1423 = $graph->isConnected($startNode21, $startNode54);
    $isConnected1424 = $graph->isConnected($startNode21, $startNode55);
    $isConnected1425 = $graph->isConnected($startNode21, $startNode56);
    $isConnected1426 = $graph->isConnected($startNode21, $startNode57);
    $isConnected1427 = $graph->isConnected($startNode21, $startNode58);
    $isConnected1428 = $graph->isConnected($startNode21, $startNode59);
    $isConnected1429 = $graph->isConnected($startNode21, $startNode60);
    $isConnected1430 = $graph->isConnected($startNode21, $startNode61);
    $isConnected1431 = $graph->isConnected($startNode21, $startNode62);
    $isConnected1432 = $graph->isConnected($startNode21, $startNode63);
    $isConnected1433 = $graph->isConnected($startNode21, $startNode64);
    $isConnected1434 = $graph->isConnected($startNode21, $startNode65);
    $isConnected1435 = $graph->isConnected($startNode21, $startNode66);
    $isConnected1436 = $graph->isConnected($startNode21, $startNode67);
    $isConnected1437 = $graph->isConnected($startNode21, $startNode68);
    $isConnected1438 = $graph->isConnected($startNode21, $startNode69);
    $isConnected1439 = $graph->isConnected($startNode21, $startNode70);
    $isConnected1440 = $graph->isConnected($startNode21, $startNode71);
    $isConnected1441 = $graph->isConnected($startNode21, $startNode72);
    $isConnected1442 = $graph->isConnected($startNode21, $startNode73);
    $isConnected1443 = $graph->isConnected($startNode21, $startNode74);
    $isConnected1444 = $graph->isConnected($startNode21, $startNode75);
    $isConnected1445 = $graph->isConnected($startNode21, $startNode76);
    $isConnected1446 = $graph->isConnected($startNode21, $startNode77);
    $isConnected1447 = $graph->isConnected($startNode21, $startNode78);
    $isConnected1448 = $graph->isConnected($startNode21, $startNode79);
    $isConnected1449 = $graph->isConnected($startNode21, $startNode80);

    $isConnected1450 = $graph->isConnected($startNode22, $startNode23);
    $isConnected1451 = $graph->isConnected($startNode22, $startNode24);
    $isConnected1452 = $graph->isConnected($startNode22, $startNode25);
    $isConnected1453 = $graph->isConnected($startNode22, $startNode26);
    $isConnected1454 = $graph->isConnected($startNode22, $startNode27);
    $isConnected1455 = $graph->isConnected($startNode22, $startNode28);
    $isConnected1456 = $graph->isConnected($startNode22, $startNode29);
    $isConnected1457 = $graph->isConnected($startNode22, $startNode30);
    $isConnected1458 = $graph->isConnected($startNode22, $startNode31);
    $isConnected1459 = $graph->isConnected($startNode22, $startNode32);
    $isConnected1460 = $graph->isConnected($startNode22, $startNode33);
    $isConnected1461 = $graph->isConnected($startNode22, $startNode34);
    $isConnected1462 = $graph->isConnected($startNode22, $startNode35);
    $isConnected1463 = $graph->isConnected($startNode22, $startNode36);
    $isConnected1464 = $graph->isConnected($startNode22, $startNode37);
    $isConnected1465 = $graph->isConnected($startNode22, $startNode38);
    $isConnected1466 = $graph->isConnected($startNode22, $startNode39);
    $isConnected1467 = $graph->isConnected($startNode22, $startNode40);
    $isConnected1468 = $graph->isConnected($startNode22, $startNode41);
    $isConnected1469 = $graph->isConnected($startNode22, $startNode42);
    $isConnected1470 = $graph->isConnected($startNode22, $startNode43);
    $isConnected1471 = $graph->isConnected($startNode22, $startNode44);
    $isConnected1472 = $graph->isConnected($startNode22, $startNode45);
    $isConnected1473 = $graph->isConnected($startNode22, $startNode46);
    $isConnected1474 = $graph->isConnected($startNode22, $startNode47);
    $isConnected1475 = $graph->isConnected($startNode22, $startNode48);
    $isConnected1476 = $graph->isConnected($startNode22, $startNode49);
    $isConnected1477 = $graph->isConnected($startNode22, $startNode50);
    $isConnected1478 = $graph->isConnected($startNode22, $startNode51);
    $isConnected1479 = $graph->isConnected($startNode22, $startNode52);
    $isConnected1480 = $graph->isConnected($startNode22, $startNode53);
    $isConnected1481 = $graph->isConnected($startNode22, $startNode54);
    $isConnected1482 = $graph->isConnected($startNode22, $startNode55);
    $isConnected1483 = $graph->isConnected($startNode22, $startNode56);
    $isConnected1484 = $graph->isConnected($startNode22, $startNode57);
    $isConnected1485 = $graph->isConnected($startNode22, $startNode58);
    $isConnected1486 = $graph->isConnected($startNode22, $startNode59);
    $isConnected1487 = $graph->isConnected($startNode22, $startNode60);
    $isConnected1488 = $graph->isConnected($startNode22, $startNode61);
    $isConnected1489 = $graph->isConnected($startNode22, $startNode62);
    $isConnected1490 = $graph->isConnected($startNode22, $startNode63);
    $isConnected1491 = $graph->isConnected($startNode22, $startNode64);
    $isConnected1492 = $graph->isConnected($startNode22, $startNode65);
    $isConnected1493 = $graph->isConnected($startNode22, $startNode66);
    $isConnected1494 = $graph->isConnected($startNode22, $startNode67);
    $isConnected1495 = $graph->isConnected($startNode22, $startNode68);
    $isConnected1496 = $graph->isConnected($startNode22, $startNode69);
    $isConnected1497 = $graph->isConnected($startNode22, $startNode70);
    $isConnected1498 = $graph->isConnected($startNode22, $startNode71);
    $isConnected1499 = $graph->isConnected($startNode22, $startNode72);
    $isConnected1500 = $graph->isConnected($startNode22, $startNode73);
    $isConnected1501 = $graph->isConnected($startNode22, $startNode74);
    $isConnected1502 = $graph->isConnected($startNode22, $startNode75);
    $isConnected1503 = $graph->isConnected($startNode22, $startNode76);
    $isConnected1504 = $graph->isConnected($startNode22, $startNode77);
    $isConnected1505 = $graph->isConnected($startNode22, $startNode78);
    $isConnected1506 = $graph->isConnected($startNode22, $startNode79);
    $isConnected1507 = $graph->isConnected($startNode22, $startNode80);

    $isConnected1508 = $graph->isConnected($startNode23, $startNode24);
    $isConnected1509 = $graph->isConnected($startNode23, $startNode25);
    $isConnected1510 = $graph->isConnected($startNode23, $startNode26);
    $isConnected1511 = $graph->isConnected($startNode23, $startNode27);
    $isConnected1512 = $graph->isConnected($startNode23, $startNode28);
    $isConnected1513 = $graph->isConnected($startNode23, $startNode29);
    $isConnected1514 = $graph->isConnected($startNode23, $startNode30);
    $isConnected1515 = $graph->isConnected($startNode23, $startNode31);
    $isConnected1516 = $graph->isConnected($startNode23, $startNode32);
    $isConnected1517 = $graph->isConnected($startNode23, $startNode33);
    $isConnected1518 = $graph->isConnected($startNode23, $startNode34);
    $isConnected1519 = $graph->isConnected($startNode23, $startNode35);
    $isConnected1520 = $graph->isConnected($startNode23, $startNode36);
    $isConnected1521 = $graph->isConnected($startNode23, $startNode37);
    $isConnected1522 = $graph->isConnected($startNode23, $startNode38);
    $isConnected1523 = $graph->isConnected($startNode23, $startNode39);
    $isConnected1524 = $graph->isConnected($startNode23, $startNode40);
    $isConnected1525 = $graph->isConnected($startNode23, $startNode41);
    $isConnected1526 = $graph->isConnected($startNode23, $startNode42);
    $isConnected1527 = $graph->isConnected($startNode23, $startNode43);
    $isConnected1528 = $graph->isConnected($startNode23, $startNode44);
    $isConnected1529 = $graph->isConnected($startNode23, $startNode45);
    $isConnected1530 = $graph->isConnected($startNode23, $startNode46);
    $isConnected1531 = $graph->isConnected($startNode23, $startNode47);
    $isConnected1532 = $graph->isConnected($startNode23, $startNode48);
    $isConnected1533 = $graph->isConnected($startNode23, $startNode49);
    $isConnected1534 = $graph->isConnected($startNode23, $startNode50);
    $isConnected1535 = $graph->isConnected($startNode23, $startNode51);
    $isConnected1536 = $graph->isConnected($startNode23, $startNode52);
    $isConnected1537 = $graph->isConnected($startNode23, $startNode53);
    $isConnected1538 = $graph->isConnected($startNode23, $startNode54);
    $isConnected1539 = $graph->isConnected($startNode23, $startNode55);
    $isConnected1540 = $graph->isConnected($startNode23, $startNode56);
    $isConnected1541 = $graph->isConnected($startNode23, $startNode57);
    $isConnected1542 = $graph->isConnected($startNode23, $startNode58);
    $isConnected1543 = $graph->isConnected($startNode23, $startNode59);
    $isConnected1544 = $graph->isConnected($startNode23, $startNode60);
    $isConnected1545 = $graph->isConnected($startNode23, $startNode61);
    $isConnected1546 = $graph->isConnected($startNode23, $startNode62);
    $isConnected1547 = $graph->isConnected($startNode23, $startNode63);
    $isConnected1548 = $graph->isConnected($startNode23, $startNode64);
    $isConnected1549 = $graph->isConnected($startNode23, $startNode65);
    $isConnected1550 = $graph->isConnected($startNode23, $startNode66);
    $isConnected1551 = $graph->isConnected($startNode23, $startNode67);
    $isConnected1552 = $graph->isConnected($startNode23, $startNode68);
    $isConnected1553 = $graph->isConnected($startNode23, $startNode69);
    $isConnected1554 = $graph->isConnected($startNode23, $startNode70);
    $isConnected1555 = $graph->isConnected($startNode23, $startNode71);
    $isConnected1556 = $graph->isConnected($startNode23, $startNode72);
    $isConnected1557 = $graph->isConnected($startNode23, $startNode73);
    $isConnected1558 = $graph->isConnected($startNode23, $startNode74);
    $isConnected1559 = $graph->isConnected($startNode23, $startNode75);
    $isConnected1560 = $graph->isConnected($startNode23, $startNode76);
    $isConnected1561 = $graph->isConnected($startNode23, $startNode77);
    $isConnected1562 = $graph->isConnected($startNode23, $startNode78);
    $isConnected1563 = $graph->isConnected($startNode23, $startNode79);
    $isConnected1564 = $graph->isConnected($startNode23, $startNode80);

    $isConnected1565 = $graph->isConnected($startNode24, $startNode25);
    $isConnected1566 = $graph->isConnected($startNode24, $startNode26);
    $isConnected1567 = $graph->isConnected($startNode24, $startNode27);
    $isConnected1568 = $graph->isConnected($startNode24, $startNode28);
    $isConnected1569 = $graph->isConnected($startNode24, $startNode29);
    $isConnected1570 = $graph->isConnected($startNode24, $startNode30);
    $isConnected1571 = $graph->isConnected($startNode24, $startNode31);
    $isConnected1572 = $graph->isConnected($startNode24, $startNode32);
    $isConnected1573 = $graph->isConnected($startNode24, $startNode33);
    $isConnected1574 = $graph->isConnected($startNode24, $startNode34);
    $isConnected1575 = $graph->isConnected($startNode24, $startNode35);
    $isConnected1576 = $graph->isConnected($startNode24, $startNode36);
    $isConnected1577 = $graph->isConnected($startNode24, $startNode37);
    $isConnected1578 = $graph->isConnected($startNode24, $startNode38);
    $isConnected1579 = $graph->isConnected($startNode24, $startNode39);
    $isConnected1580 = $graph->isConnected($startNode24, $startNode40);
    $isConnected1581 = $graph->isConnected($startNode24, $startNode41);
    $isConnected1582 = $graph->isConnected($startNode24, $startNode42);
    $isConnected1583 = $graph->isConnected($startNode24, $startNode43);
    $isConnected1584 = $graph->isConnected($startNode24, $startNode44);
    $isConnected1585 = $graph->isConnected($startNode24, $startNode45);
    $isConnected1586 = $graph->isConnected($startNode24, $startNode46);
    $isConnected1587 = $graph->isConnected($startNode24, $startNode47);
    $isConnected1588 = $graph->isConnected($startNode24, $startNode48);
    $isConnected1589 = $graph->isConnected($startNode24, $startNode49);
    $isConnected1590 = $graph->isConnected($startNode24, $startNode50);
    $isConnected1591 = $graph->isConnected($startNode24, $startNode51);
    $isConnected1592 = $graph->isConnected($startNode24, $startNode52);
    $isConnected1593 = $graph->isConnected($startNode24, $startNode53);
    $isConnected1594 = $graph->isConnected($startNode24, $startNode54);
    $isConnected1595 = $graph->isConnected($startNode24, $startNode55);
    $isConnected1596 = $graph->isConnected($startNode24, $startNode56);
    $isConnected1597 = $graph->isConnected($startNode24, $startNode57);
    $isConnected1598 = $graph->isConnected($startNode24, $startNode58);
    $isConnected1599 = $graph->isConnected($startNode24, $startNode59);
    $isConnected1600 = $graph->isConnected($startNode24, $startNode60);
    $isConnected1601 = $graph->isConnected($startNode24, $startNode61);
    $isConnected1602 = $graph->isConnected($startNode24, $startNode62);
    $isConnected1603 = $graph->isConnected($startNode24, $startNode63);
    $isConnected1604 = $graph->isConnected($startNode24, $startNode64);
    $isConnected1605 = $graph->isConnected($startNode24, $startNode65);
    $isConnected1606 = $graph->isConnected($startNode24, $startNode66);
    $isConnected1607 = $graph->isConnected($startNode24, $startNode67);
    $isConnected1608 = $graph->isConnected($startNode24, $startNode68);
    $isConnected1609 = $graph->isConnected($startNode24, $startNode69);
    $isConnected1610 = $graph->isConnected($startNode24, $startNode70);
    $isConnected1611 = $graph->isConnected($startNode24, $startNode71);
    $isConnected1612 = $graph->isConnected($startNode24, $startNode72);
    $isConnected1613 = $graph->isConnected($startNode24, $startNode73);
    $isConnected1614 = $graph->isConnected($startNode24, $startNode74);
    $isConnected1615 = $graph->isConnected($startNode24, $startNode75);
    $isConnected1616 = $graph->isConnected($startNode24, $startNode76);
    $isConnected1617 = $graph->isConnected($startNode24, $startNode77);
    $isConnected1618 = $graph->isConnected($startNode24, $startNode78);
    $isConnected1619 = $graph->isConnected($startNode24, $startNode79);
    $isConnected1620 = $graph->isConnected($startNode24, $startNode80);

    $isConnected1621 = $graph->isConnected($startNode25, $startNode26);
    $isConnected1622 = $graph->isConnected($startNode25, $startNode27);
    $isConnected1623 = $graph->isConnected($startNode25, $startNode28);
    $isConnected1624 = $graph->isConnected($startNode25, $startNode29);
    $isConnected1625 = $graph->isConnected($startNode25, $startNode30);
    $isConnected1626 = $graph->isConnected($startNode25, $startNode31);
    $isConnected1627 = $graph->isConnected($startNode25, $startNode32);
    $isConnected1628 = $graph->isConnected($startNode25, $startNode33);
    $isConnected1629 = $graph->isConnected($startNode25, $startNode34);
    $isConnected1630 = $graph->isConnected($startNode25, $startNode35);
    $isConnected1631 = $graph->isConnected($startNode25, $startNode36);
    $isConnected1632 = $graph->isConnected($startNode25, $startNode37);
    $isConnected1633 = $graph->isConnected($startNode25, $startNode38);
    $isConnected1634 = $graph->isConnected($startNode25, $startNode39);
    $isConnected1635 = $graph->isConnected($startNode25, $startNode40);
    $isConnected1636 = $graph->isConnected($startNode25, $startNode41);
    $isConnected1637 = $graph->isConnected($startNode25, $startNode42);
    $isConnected1638 = $graph->isConnected($startNode25, $startNode43);
    $isConnected1639 = $graph->isConnected($startNode25, $startNode44);
    $isConnected1640 = $graph->isConnected($startNode25, $startNode45);
    $isConnected1641 = $graph->isConnected($startNode25, $startNode46);
    $isConnected1642 = $graph->isConnected($startNode25, $startNode47);
    $isConnected1643 = $graph->isConnected($startNode25, $startNode48);
    $isConnected1644 = $graph->isConnected($startNode25, $startNode49);
    $isConnected1645 = $graph->isConnected($startNode25, $startNode50);
    $isConnected1646 = $graph->isConnected($startNode25, $startNode51);
    $isConnected1647 = $graph->isConnected($startNode25, $startNode52);
    $isConnected1648 = $graph->isConnected($startNode25, $startNode53);
    $isConnected1649 = $graph->isConnected($startNode25, $startNode54);
    $isConnected1650 = $graph->isConnected($startNode25, $startNode55);
    $isConnected1651 = $graph->isConnected($startNode25, $startNode56);
    $isConnected1652 = $graph->isConnected($startNode25, $startNode57);
    $isConnected1653 = $graph->isConnected($startNode25, $startNode58);
    $isConnected1654 = $graph->isConnected($startNode25, $startNode59);
    $isConnected1655 = $graph->isConnected($startNode25, $startNode60);
    $isConnected1656 = $graph->isConnected($startNode25, $startNode61);
    $isConnected1657 = $graph->isConnected($startNode25, $startNode62);
    $isConnected1658 = $graph->isConnected($startNode25, $startNode63);
    $isConnected1659 = $graph->isConnected($startNode25, $startNode64);
    $isConnected1660 = $graph->isConnected($startNode25, $startNode65);
    $isConnected1661 = $graph->isConnected($startNode25, $startNode66);
    $isConnected1662 = $graph->isConnected($startNode25, $startNode67);
    $isConnected1663 = $graph->isConnected($startNode25, $startNode68);
    $isConnected1664 = $graph->isConnected($startNode25, $startNode69);
    $isConnected1665 = $graph->isConnected($startNode25, $startNode70);
    $isConnected1666 = $graph->isConnected($startNode25, $startNode71);
    $isConnected1667 = $graph->isConnected($startNode25, $startNode72);
    $isConnected1668 = $graph->isConnected($startNode25, $startNode73);
    $isConnected1669 = $graph->isConnected($startNode25, $startNode74);
    $isConnected1670 = $graph->isConnected($startNode25, $startNode75);
    $isConnected1671 = $graph->isConnected($startNode25, $startNode76);
    $isConnected1672 = $graph->isConnected($startNode25, $startNode77);
    $isConnected1673 = $graph->isConnected($startNode25, $startNode78);
    $isConnected1674 = $graph->isConnected($startNode25, $startNode79);
    $isConnected1675 = $graph->isConnected($startNode25, $startNode80);

    $isConnected1676 = $graph->isConnected($startNode26, $startNode27);
    $isConnected1677 = $graph->isConnected($startNode26, $startNode28);
    $isConnected1678 = $graph->isConnected($startNode26, $startNode29);
    $isConnected1679 = $graph->isConnected($startNode26, $startNode30);
    $isConnected1680 = $graph->isConnected($startNode26, $startNode31);
    $isConnected1681 = $graph->isConnected($startNode26, $startNode32);
    $isConnected1682 = $graph->isConnected($startNode26, $startNode33);
    $isConnected1683 = $graph->isConnected($startNode26, $startNode34);
    $isConnected1684 = $graph->isConnected($startNode26, $startNode35);
    $isConnected1685 = $graph->isConnected($startNode26, $startNode36);
    $isConnected1686 = $graph->isConnected($startNode26, $startNode37);
    $isConnected1687 = $graph->isConnected($startNode26, $startNode38);
    $isConnected1688 = $graph->isConnected($startNode26, $startNode39);
    $isConnected1689 = $graph->isConnected($startNode26, $startNode40);
    $isConnected1690 = $graph->isConnected($startNode26, $startNode41);
    $isConnected1691 = $graph->isConnected($startNode26, $startNode42);
    $isConnected1692 = $graph->isConnected($startNode26, $startNode43);
    $isConnected1693 = $graph->isConnected($startNode26, $startNode44);
    $isConnected1694 = $graph->isConnected($startNode26, $startNode45);
    $isConnected1695 = $graph->isConnected($startNode26, $startNode46);
    $isConnected1696 = $graph->isConnected($startNode26, $startNode47);
    $isConnected1697 = $graph->isConnected($startNode26, $startNode48);
    $isConnected1698 = $graph->isConnected($startNode26, $startNode49);
    $isConnected1699 = $graph->isConnected($startNode26, $startNode50);
    $isConnected1700 = $graph->isConnected($startNode26, $startNode51);
    $isConnected1701 = $graph->isConnected($startNode26, $startNode52);
    $isConnected1702 = $graph->isConnected($startNode26, $startNode53);
    $isConnected1703 = $graph->isConnected($startNode26, $startNode54);
    $isConnected1704 = $graph->isConnected($startNode26, $startNode55);
    $isConnected1705 = $graph->isConnected($startNode26, $startNode56);
    $isConnected1706 = $graph->isConnected($startNode26, $startNode57);
    $isConnected1707 = $graph->isConnected($startNode26, $startNode58);
    $isConnected1708 = $graph->isConnected($startNode26, $startNode59);
    $isConnected1709 = $graph->isConnected($startNode26, $startNode60);
    $isConnected1710 = $graph->isConnected($startNode26, $startNode61);
    $isConnected1711 = $graph->isConnected($startNode26, $startNode62);
    $isConnected1712 = $graph->isConnected($startNode26, $startNode63);
    $isConnected1713 = $graph->isConnected($startNode26, $startNode64);
    $isConnected1714 = $graph->isConnected($startNode26, $startNode65);
    $isConnected1715 = $graph->isConnected($startNode26, $startNode66);
    $isConnected1716 = $graph->isConnected($startNode26, $startNode67);
    $isConnected1717 = $graph->isConnected($startNode26, $startNode68);
    $isConnected1718 = $graph->isConnected($startNode26, $startNode69);
    $isConnected1719 = $graph->isConnected($startNode26, $startNode70);
    $isConnected1720 = $graph->isConnected($startNode26, $startNode71);
    $isConnected1721 = $graph->isConnected($startNode26, $startNode72);
    $isConnected1722 = $graph->isConnected($startNode26, $startNode73);
    $isConnected1723 = $graph->isConnected($startNode26, $startNode74);
    $isConnected1724 = $graph->isConnected($startNode26, $startNode75);
    $isConnected1725 = $graph->isConnected($startNode26, $startNode76);
    $isConnected1726 = $graph->isConnected($startNode26, $startNode77);
    $isConnected1727 = $graph->isConnected($startNode26, $startNode78);
    $isConnected1728 = $graph->isConnected($startNode26, $startNode79);
    $isConnected1729 = $graph->isConnected($startNode26, $startNode80);

    $isConnected1730 = $graph->isConnected($startNode27, $startNode28);
    $isConnected1731 = $graph->isConnected($startNode27, $startNode29);
    $isConnected1732 = $graph->isConnected($startNode27, $startNode30);
    $isConnected1733 = $graph->isConnected($startNode27, $startNode31);
    $isConnected1734 = $graph->isConnected($startNode27, $startNode32);
    $isConnected1735 = $graph->isConnected($startNode27, $startNode33);
    $isConnected1736 = $graph->isConnected($startNode27, $startNode34);
    $isConnected1737 = $graph->isConnected($startNode27, $startNode35);
    $isConnected1738 = $graph->isConnected($startNode27, $startNode36);
    $isConnected1739 = $graph->isConnected($startNode27, $startNode37);
    $isConnected1740 = $graph->isConnected($startNode27, $startNode38);
    $isConnected1741 = $graph->isConnected($startNode27, $startNode39);
    $isConnected1742 = $graph->isConnected($startNode27, $startNode40);
    $isConnected1743 = $graph->isConnected($startNode27, $startNode41);
    $isConnected1744 = $graph->isConnected($startNode27, $startNode42);
    $isConnected1745 = $graph->isConnected($startNode27, $startNode43);
    $isConnected1746 = $graph->isConnected($startNode27, $startNode44);
    $isConnected1747 = $graph->isConnected($startNode27, $startNode45);
    $isConnected1748 = $graph->isConnected($startNode27, $startNode46);
    $isConnected1749 = $graph->isConnected($startNode27, $startNode47);
    $isConnected1750 = $graph->isConnected($startNode27, $startNode48);
    $isConnected1751 = $graph->isConnected($startNode27, $startNode49);
    $isConnected1752 = $graph->isConnected($startNode27, $startNode50);
    $isConnected1753 = $graph->isConnected($startNode27, $startNode51);
    $isConnected1754 = $graph->isConnected($startNode27, $startNode52);
    $isConnected1755 = $graph->isConnected($startNode27, $startNode53);
    $isConnected1756 = $graph->isConnected($startNode27, $startNode54);
    $isConnected1757 = $graph->isConnected($startNode27, $startNode55);
    $isConnected1758 = $graph->isConnected($startNode27, $startNode56);
    $isConnected1759 = $graph->isConnected($startNode27, $startNode57);
    $isConnected1760 = $graph->isConnected($startNode27, $startNode58);
    $isConnected1761 = $graph->isConnected($startNode27, $startNode59);
    $isConnected1762 = $graph->isConnected($startNode27, $startNode60);
    $isConnected1763 = $graph->isConnected($startNode27, $startNode61);
    $isConnected1764 = $graph->isConnected($startNode27, $startNode62);
    $isConnected1765 = $graph->isConnected($startNode27, $startNode63);
    $isConnected1766 = $graph->isConnected($startNode27, $startNode64);
    $isConnected1767 = $graph->isConnected($startNode27, $startNode65);
    $isConnected1768 = $graph->isConnected($startNode27, $startNode66);
    $isConnected1769 = $graph->isConnected($startNode27, $startNode67);
    $isConnected1770 = $graph->isConnected($startNode27, $startNode68);
    $isConnected1771 = $graph->isConnected($startNode27, $startNode69);
    $isConnected1772 = $graph->isConnected($startNode27, $startNode70);
    $isConnected1773 = $graph->isConnected($startNode27, $startNode71);
    $isConnected1774 = $graph->isConnected($startNode27, $startNode72);
    $isConnected1775 = $graph->isConnected($startNode27, $startNode73);
    $isConnected1776 = $graph->isConnected($startNode27, $startNode74);
    $isConnected1777 = $graph->isConnected($startNode27, $startNode75);
    $isConnected1778 = $graph->isConnected($startNode27, $startNode76);
    $isConnected1779 = $graph->isConnected($startNode27, $startNode77);
    $isConnected1780 = $graph->isConnected($startNode27, $startNode78);
    $isConnected1781 = $graph->isConnected($startNode27, $startNode79);
    $isConnected1782 = $graph->isConnected($startNode27, $startNode80);

    $isConnected1783 = $graph->isConnected($startNode28, $startNode29);
    $isConnected1784 = $graph->isConnected($startNode28, $startNode30);
    $isConnected1785 = $graph->isConnected($startNode28, $startNode31);
    $isConnected1786 = $graph->isConnected($startNode28, $startNode32);
    $isConnected1787 = $graph->isConnected($startNode28, $startNode33);
    $isConnected1788 = $graph->isConnected($startNode28, $startNode34);
    $isConnected1789 = $graph->isConnected($startNode28, $startNode35);
    $isConnected1790 = $graph->isConnected($startNode28, $startNode36);
    $isConnected1791 = $graph->isConnected($startNode28, $startNode37);
    $isConnected1792 = $graph->isConnected($startNode28, $startNode38);
    $isConnected1793 = $graph->isConnected($startNode28, $startNode39);
    $isConnected1794 = $graph->isConnected($startNode28, $startNode40);
    $isConnected1795 = $graph->isConnected($startNode28, $startNode41);
    $isConnected1796 = $graph->isConnected($startNode28, $startNode42);
    $isConnected1797 = $graph->isConnected($startNode28, $startNode43);
    $isConnected1798 = $graph->isConnected($startNode28, $startNode44);
    $isConnected1799 = $graph->isConnected($startNode28, $startNode45);
    $isConnected1800 = $graph->isConnected($startNode28, $startNode46);
    $isConnected1801 = $graph->isConnected($startNode28, $startNode47);
    $isConnected1802 = $graph->isConnected($startNode28, $startNode48);
    $isConnected1803 = $graph->isConnected($startNode28, $startNode49);
    $isConnected1804 = $graph->isConnected($startNode28, $startNode50);
    $isConnected1805 = $graph->isConnected($startNode28, $startNode51);
    $isConnected1806 = $graph->isConnected($startNode28, $startNode52);
    $isConnected1807 = $graph->isConnected($startNode28, $startNode53);
    $isConnected1808 = $graph->isConnected($startNode28, $startNode54);
    $isConnected1809 = $graph->isConnected($startNode28, $startNode55);
    $isConnected1810 = $graph->isConnected($startNode28, $startNode56);
    $isConnected1811 = $graph->isConnected($startNode28, $startNode57);
    $isConnected1812 = $graph->isConnected($startNode28, $startNode58);
    $isConnected1813 = $graph->isConnected($startNode28, $startNode59);
    $isConnected1814 = $graph->isConnected($startNode28, $startNode60);
    $isConnected1815 = $graph->isConnected($startNode28, $startNode61);
    $isConnected1816 = $graph->isConnected($startNode28, $startNode62);
    $isConnected1817 = $graph->isConnected($startNode28, $startNode63);
    $isConnected1818 = $graph->isConnected($startNode28, $startNode64);
    $isConnected1819 = $graph->isConnected($startNode28, $startNode65);
    $isConnected1820 = $graph->isConnected($startNode28, $startNode66);
    $isConnected1821 = $graph->isConnected($startNode28, $startNode67);
    $isConnected1822 = $graph->isConnected($startNode28, $startNode68);
    $isConnected1823 = $graph->isConnected($startNode28, $startNode69);
    $isConnected1824 = $graph->isConnected($startNode28, $startNode70);
    $isConnected1825 = $graph->isConnected($startNode28, $startNode71);
    $isConnected1826 = $graph->isConnected($startNode28, $startNode72);
    $isConnected1827 = $graph->isConnected($startNode28, $startNode73);
    $isConnected1828 = $graph->isConnected($startNode28, $startNode74);
    $isConnected1829 = $graph->isConnected($startNode28, $startNode75);
    $isConnected1830 = $graph->isConnected($startNode28, $startNode76);
    $isConnected1831 = $graph->isConnected($startNode28, $startNode77);
    $isConnected1832 = $graph->isConnected($startNode28, $startNode78);
    $isConnected1833 = $graph->isConnected($startNode28, $startNode79);
    $isConnected1834 = $graph->isConnected($startNode28, $startNode80);

    $isConnected1835 = $graph->isConnected($startNode29, $startNode30);
    $isConnected1836 = $graph->isConnected($startNode29, $startNode31);
    $isConnected1837 = $graph->isConnected($startNode29, $startNode32);
    $isConnected1838 = $graph->isConnected($startNode29, $startNode33);
    $isConnected1839 = $graph->isConnected($startNode29, $startNode34);
    $isConnected1840 = $graph->isConnected($startNode29, $startNode35);
    $isConnected1841 = $graph->isConnected($startNode29, $startNode36);
    $isConnected1842 = $graph->isConnected($startNode29, $startNode37);
    $isConnected1843 = $graph->isConnected($startNode29, $startNode38);
    $isConnected1844 = $graph->isConnected($startNode29, $startNode39);
    $isConnected1845 = $graph->isConnected($startNode29, $startNode40);
    $isConnected1846 = $graph->isConnected($startNode29, $startNode41);
    $isConnected1847 = $graph->isConnected($startNode29, $startNode42);
    $isConnected1848 = $graph->isConnected($startNode29, $startNode43);
    $isConnected1849 = $graph->isConnected($startNode29, $startNode44);
    $isConnected1850 = $graph->isConnected($startNode29, $startNode45);
    $isConnected1851 = $graph->isConnected($startNode29, $startNode46);
    $isConnected1852 = $graph->isConnected($startNode29, $startNode47);
    $isConnected1853 = $graph->isConnected($startNode29, $startNode48);
    $isConnected1854 = $graph->isConnected($startNode29, $startNode49);
    $isConnected1855 = $graph->isConnected($startNode29, $startNode50);
    $isConnected1856 = $graph->isConnected($startNode29, $startNode51);
    $isConnected1857 = $graph->isConnected($startNode29, $startNode52);
    $isConnected1858 = $graph->isConnected($startNode29, $startNode53);
    $isConnected1859 = $graph->isConnected($startNode29, $startNode54);
    $isConnected1860 = $graph->isConnected($startNode29, $startNode55);
    $isConnected1861 = $graph->isConnected($startNode29, $startNode56);
    $isConnected1862 = $graph->isConnected($startNode29, $startNode57);
    $isConnected1863 = $graph->isConnected($startNode29, $startNode58);
    $isConnected1864 = $graph->isConnected($startNode29, $startNode59);
    $isConnected1865 = $graph->isConnected($startNode29, $startNode60);
    $isConnected1866 = $graph->isConnected($startNode29, $startNode61);
    $isConnected1867 = $graph->isConnected($startNode29, $startNode62);
    $isConnected1868 = $graph->isConnected($startNode29, $startNode63);
    $isConnected1869 = $graph->isConnected($startNode29, $startNode64);
    $isConnected1870 = $graph->isConnected($startNode29, $startNode65);
    $isConnected1871 = $graph->isConnected($startNode29, $startNode66);
    $isConnected1872 = $graph->isConnected($startNode29, $startNode67);
    $isConnected1873 = $graph->isConnected($startNode29, $startNode68);
    $isConnected1874 = $graph->isConnected($startNode29, $startNode69);
    $isConnected1875 = $graph->isConnected($startNode29, $startNode70);
    $isConnected1876 = $graph->isConnected($startNode29, $startNode71);
    $isConnected1877 = $graph->isConnected($startNode29, $startNode72);
    $isConnected1878 = $graph->isConnected($startNode29, $startNode73);
    $isConnected1879 = $graph->isConnected($startNode29, $startNode74);
    $isConnected1880 = $graph->isConnected($startNode29, $startNode75);
    $isConnected1881 = $graph->isConnected($startNode29, $startNode76);
    $isConnected1882 = $graph->isConnected($startNode29, $startNode77);
    $isConnected1883 = $graph->isConnected($startNode29, $startNode78);
    $isConnected1884 = $graph->isConnected($startNode29, $startNode79);
    $isConnected1885 = $graph->isConnected($startNode29, $startNode80);

    $isConnected1886 = $graph->isConnected($startNode30, $startNode31);
    $isConnected1887 = $graph->isConnected($startNode30, $startNode32);
    $isConnected1888 = $graph->isConnected($startNode30, $startNode33);
    $isConnected1889 = $graph->isConnected($startNode30, $startNode34);
    $isConnected1890 = $graph->isConnected($startNode30, $startNode35);
    $isConnected1891 = $graph->isConnected($startNode30, $startNode36);
    $isConnected1892 = $graph->isConnected($startNode30, $startNode37);
    $isConnected1893 = $graph->isConnected($startNode30, $startNode38);
    $isConnected1894 = $graph->isConnected($startNode30, $startNode39);
    $isConnected1895 = $graph->isConnected($startNode30, $startNode40);
    $isConnected1896 = $graph->isConnected($startNode30, $startNode41);
    $isConnected1897 = $graph->isConnected($startNode30, $startNode42);
    $isConnected1898 = $graph->isConnected($startNode30, $startNode43);
    $isConnected1899 = $graph->isConnected($startNode30, $startNode44);
    $isConnected1900 = $graph->isConnected($startNode30, $startNode45);
    $isConnected1901 = $graph->isConnected($startNode30, $startNode46);
    $isConnected1902 = $graph->isConnected($startNode30, $startNode47);
    $isConnected1903 = $graph->isConnected($startNode30, $startNode48);
    $isConnected1904 = $graph->isConnected($startNode30, $startNode49);
    $isConnected1905 = $graph->isConnected($startNode30, $startNode50);
    $isConnected1906 = $graph->isConnected($startNode30, $startNode51);
    $isConnected1907 = $graph->isConnected($startNode30, $startNode52);
    $isConnected1908 = $graph->isConnected($startNode30, $startNode53);
    $isConnected1909 = $graph->isConnected($startNode30, $startNode54);
    $isConnected1910 = $graph->isConnected($startNode30, $startNode55);
    $isConnected1911 = $graph->isConnected($startNode30, $startNode56);
    $isConnected1912 = $graph->isConnected($startNode30, $startNode57);
    $isConnected1913 = $graph->isConnected($startNode30, $startNode58);
    $isConnected1914 = $graph->isConnected($startNode30, $startNode59);
    $isConnected1915 = $graph->isConnected($startNode30, $startNode60);
    $isConnected1916 = $graph->isConnected($startNode30, $startNode61);
    $isConnected1917 = $graph->isConnected($startNode30, $startNode62);
    $isConnected1918 = $graph->isConnected($startNode30, $startNode63);
    $isConnected1919 = $graph->isConnected($startNode30, $startNode64);
    $isConnected1920 = $graph->isConnected($startNode30, $startNode65);
    $isConnected1921 = $graph->isConnected($startNode30, $startNode66);
    $isConnected1922 = $graph->isConnected($startNode30, $startNode67);
    $isConnected1923 = $graph->isConnected($startNode30, $startNode68);
    $isConnected1924 = $graph->isConnected($startNode30, $startNode69);
    $isConnected1925 = $graph->isConnected($startNode30, $startNode70);
    $isConnected1926 = $graph->isConnected($startNode30, $startNode71);
    $isConnected1927 = $graph->isConnected($startNode30, $startNode72);
    $isConnected1928 = $graph->isConnected($startNode30, $startNode73);
    $isConnected1929 = $graph->isConnected($startNode30, $startNode74);
    $isConnected1930 = $graph->isConnected($startNode30, $startNode75);
    $isConnected1931 = $graph->isConnected($startNode30, $startNode76);
    $isConnected1932 = $graph->isConnected($startNode30, $startNode77);
    $isConnected1933 = $graph->isConnected($startNode30, $startNode78);
    $isConnected1934 = $graph->isConnected($startNode30, $startNode79);
    $isConnected1935 = $graph->isConnected($startNode30, $startNode80);

    $isConnected1936 = $graph->isConnected($startNode31, $startNode32);
    $isConnected1937 = $graph->isConnected($startNode31, $startNode33);
    $isConnected1938 = $graph->isConnected($startNode31, $startNode34);
    $isConnected1939 = $graph->isConnected($startNode31, $startNode35);
    $isConnected1940 = $graph->isConnected($startNode31, $startNode36);
    $isConnected1941 = $graph->isConnected($startNode31, $startNode37);
    $isConnected1942 = $graph->isConnected($startNode31, $startNode38);
    $isConnected1943 = $graph->isConnected($startNode31, $startNode39);
    $isConnected1944 = $graph->isConnected($startNode31, $startNode40);
    $isConnected1945 = $graph->isConnected($startNode31, $startNode41);
    $isConnected1946 = $graph->isConnected($startNode31, $startNode42);
    $isConnected1947 = $graph->isConnected($startNode31, $startNode43);
    $isConnected1948 = $graph->isConnected($startNode31, $startNode44);
    $isConnected1949 = $graph->isConnected($startNode31, $startNode45);
    $isConnected1950 = $graph->isConnected($startNode31, $startNode46);
    $isConnected1951 = $graph->isConnected($startNode31, $startNode47);
    $isConnected1952 = $graph->isConnected($startNode31, $startNode48);
    $isConnected1953 = $graph->isConnected($startNode31, $startNode49);
    $isConnected1954 = $graph->isConnected($startNode31, $startNode50);
    $isConnected1955 = $graph->isConnected($startNode31, $startNode51);
    $isConnected1956 = $graph->isConnected($startNode31, $startNode52);
    $isConnected1957 = $graph->isConnected($startNode31, $startNode53);
    $isConnected1958 = $graph->isConnected($startNode31, $startNode54);
    $isConnected1959 = $graph->isConnected($startNode31, $startNode55);
    $isConnected1960 = $graph->isConnected($startNode31, $startNode56);
    $isConnected1961 = $graph->isConnected($startNode31, $startNode57);
    $isConnected1962 = $graph->isConnected($startNode31, $startNode58);
    $isConnected1963 = $graph->isConnected($startNode31, $startNode59);
    $isConnected1964 = $graph->isConnected($startNode31, $startNode60);
    $isConnected1965 = $graph->isConnected($startNode31, $startNode61);
    $isConnected1966 = $graph->isConnected($startNode31, $startNode62);
    $isConnected1967 = $graph->isConnected($startNode31, $startNode63);
    $isConnected1968 = $graph->isConnected($startNode31, $startNode64);
    $isConnected1969 = $graph->isConnected($startNode31, $startNode65);
    $isConnected1970 = $graph->isConnected($startNode31, $startNode66);
    $isConnected1971 = $graph->isConnected($startNode31, $startNode67);
    $isConnected1972 = $graph->isConnected($startNode31, $startNode68);
    $isConnected1973 = $graph->isConnected($startNode31, $startNode69);
    $isConnected1974 = $graph->isConnected($startNode31, $startNode70);
    $isConnected1975 = $graph->isConnected($startNode31, $startNode71);
    $isConnected1976 = $graph->isConnected($startNode31, $startNode72);
    $isConnected1977 = $graph->isConnected($startNode31, $startNode73);
    $isConnected1978 = $graph->isConnected($startNode31, $startNode74);
    $isConnected1979 = $graph->isConnected($startNode31, $startNode75);
    $isConnected1980 = $graph->isConnected($startNode31, $startNode76);
    $isConnected1981 = $graph->isConnected($startNode31, $startNode77);
    $isConnected1982 = $graph->isConnected($startNode31, $startNode78);
    $isConnected1983 = $graph->isConnected($startNode31, $startNode79);
    $isConnected1984 = $graph->isConnected($startNode31, $startNode80);

    $isConnected1985 = $graph->isConnected($startNode32, $startNode33);
    $isConnected1986 = $graph->isConnected($startNode32, $startNode34);
    $isConnected1987 = $graph->isConnected($startNode32, $startNode35);
    $isConnected1988 = $graph->isConnected($startNode32, $startNode36);
    $isConnected1989 = $graph->isConnected($startNode32, $startNode37);
    $isConnected1990 = $graph->isConnected($startNode32, $startNode38);
    $isConnected1991 = $graph->isConnected($startNode32, $startNode39);
    $isConnected1992 = $graph->isConnected($startNode32, $startNode40);
    $isConnected1993 = $graph->isConnected($startNode32, $startNode41);
    $isConnected1994 = $graph->isConnected($startNode32, $startNode42);
    $isConnected1995 = $graph->isConnected($startNode32, $startNode43);
    $isConnected1996 = $graph->isConnected($startNode32, $startNode44);
    $isConnected1997 = $graph->isConnected($startNode32, $startNode45);
    $isConnected1998 = $graph->isConnected($startNode32, $startNode46);
    $isConnected1999 = $graph->isConnected($startNode32, $startNode47);
    $isConnected2000 = $graph->isConnected($startNode32, $startNode48);
    $isConnected2001 = $graph->isConnected($startNode32, $startNode49);
    $isConnected2002 = $graph->isConnected($startNode32, $startNode50);
    $isConnected2003 = $graph->isConnected($startNode32, $startNode51);
    $isConnected2004 = $graph->isConnected($startNode32, $startNode52);
    $isConnected2005 = $graph->isConnected($startNode32, $startNode53);
    $isConnected2006 = $graph->isConnected($startNode32, $startNode54);
    $isConnected2007 = $graph->isConnected($startNode32, $startNode55);
    $isConnected2008 = $graph->isConnected($startNode32, $startNode56);
    $isConnected2009 = $graph->isConnected($startNode32, $startNode57);
    $isConnected2010 = $graph->isConnected($startNode32, $startNode58);
    $isConnected2011 = $graph->isConnected($startNode32, $startNode59);
    $isConnected2012 = $graph->isConnected($startNode32, $startNode60);
    $isConnected2013 = $graph->isConnected($startNode32, $startNode61);
    $isConnected2014 = $graph->isConnected($startNode32, $startNode62);
    $isConnected2015 = $graph->isConnected($startNode32, $startNode63);
    $isConnected2016 = $graph->isConnected($startNode32, $startNode64);
    $isConnected2017 = $graph->isConnected($startNode32, $startNode65);
    $isConnected2018 = $graph->isConnected($startNode32, $startNode66);
    $isConnected2019 = $graph->isConnected($startNode32, $startNode67);
    $isConnected2020 = $graph->isConnected($startNode32, $startNode68);
    $isConnected2021 = $graph->isConnected($startNode32, $startNode69);
    $isConnected2022 = $graph->isConnected($startNode32, $startNode70);
    $isConnected2023 = $graph->isConnected($startNode32, $startNode71);
    $isConnected2024 = $graph->isConnected($startNode32, $startNode72);
    $isConnected2025 = $graph->isConnected($startNode32, $startNode73);
    $isConnected2026 = $graph->isConnected($startNode32, $startNode74);
    $isConnected2027 = $graph->isConnected($startNode32, $startNode75);
    $isConnected2028 = $graph->isConnected($startNode32, $startNode76);
    $isConnected2029 = $graph->isConnected($startNode32, $startNode77);
    $isConnected2030 = $graph->isConnected($startNode32, $startNode78);
    $isConnected2031 = $graph->isConnected($startNode32, $startNode79);
    $isConnected2032 = $graph->isConnected($startNode32, $startNode80);

    $isConnected2033 = $graph->isConnected($startNode33, $startNode34);
    $isConnected2034 = $graph->isConnected($startNode33, $startNode35);
    $isConnected2035 = $graph->isConnected($startNode33, $startNode36);
    $isConnected2036 = $graph->isConnected($startNode33, $startNode37);
    $isConnected2037 = $graph->isConnected($startNode33, $startNode38);
    $isConnected2038 = $graph->isConnected($startNode33, $startNode39);
    $isConnected2039 = $graph->isConnected($startNode33, $startNode40);
    $isConnected2040 = $graph->isConnected($startNode33, $startNode41);
    $isConnected2041 = $graph->isConnected($startNode33, $startNode42);
    $isConnected2042 = $graph->isConnected($startNode33, $startNode43);
    $isConnected2043 = $graph->isConnected($startNode33, $startNode44);
    $isConnected2044 = $graph->isConnected($startNode33, $startNode45);
    $isConnected2045 = $graph->isConnected($startNode33, $startNode46);
    $isConnected2046 = $graph->isConnected($startNode33, $startNode47);
    $isConnected2047 = $graph->isConnected($startNode33, $startNode48);
    $isConnected2048 = $graph->isConnected($startNode33, $startNode49);
    $isConnected2049 = $graph->isConnected($startNode33, $startNode50);
    $isConnected2050 = $graph->isConnected($startNode33, $startNode51);
    $isConnected2051 = $graph->isConnected($startNode33, $startNode52);
    $isConnected2052 = $graph->isConnected($startNode33, $startNode53);
    $isConnected2053 = $graph->isConnected($startNode33, $startNode54);
    $isConnected2054 = $graph->isConnected($startNode33, $startNode55);
    $isConnected2055 = $graph->isConnected($startNode33, $startNode56);
    $isConnected2056 = $graph->isConnected($startNode33, $startNode57);
    $isConnected2057 = $graph->isConnected($startNode33, $startNode58);
    $isConnected2058 = $graph->isConnected($startNode33, $startNode59);
    $isConnected2059 = $graph->isConnected($startNode33, $startNode60);
    $isConnected2060 = $graph->isConnected($startNode33, $startNode61);
    $isConnected2061 = $graph->isConnected($startNode33, $startNode62);
    $isConnected2062 = $graph->isConnected($startNode33, $startNode63);
    $isConnected2063 = $graph->isConnected($startNode33, $startNode64);
    $isConnected2064 = $graph->isConnected($startNode33, $startNode65);
    $isConnected2065 = $graph->isConnected($startNode33, $startNode66);
    $isConnected2066 = $graph->isConnected($startNode33, $startNode67);
    $isConnected2067 = $graph->isConnected($startNode33, $startNode68);
    $isConnected2068 = $graph->isConnected($startNode33, $startNode69);
    $isConnected2069 = $graph->isConnected($startNode33, $startNode70);
    $isConnected2070 = $graph->isConnected($startNode33, $startNode71);
    $isConnected2071 = $graph->isConnected($startNode33, $startNode72);
    $isConnected2072 = $graph->isConnected($startNode33, $startNode73);
    $isConnected2073 = $graph->isConnected($startNode33, $startNode74);
    $isConnected2074 = $graph->isConnected($startNode33, $startNode75);
    $isConnected2075 = $graph->isConnected($startNode33, $startNode76);
    $isConnected2076 = $graph->isConnected($startNode33, $startNode77);
    $isConnected2077 = $graph->isConnected($startNode33, $startNode78);
    $isConnected2078 = $graph->isConnected($startNode33, $startNode79);
    $isConnected2079 = $graph->isConnected($startNode33, $startNode80);

    $isConnected2080 = $graph->isConnected($startNode34, $startNode35);
    $isConnected2081 = $graph->isConnected($startNode34, $startNode36);
    $isConnected2082 = $graph->isConnected($startNode34, $startNode37);
    $isConnected2083 = $graph->isConnected($startNode34, $startNode38);
    $isConnected2084 = $graph->isConnected($startNode34, $startNode39);
    $isConnected2085 = $graph->isConnected($startNode34, $startNode40);
    $isConnected2086 = $graph->isConnected($startNode34, $startNode41);
    $isConnected2087 = $graph->isConnected($startNode34, $startNode42);
    $isConnected2088 = $graph->isConnected($startNode34, $startNode43);
    $isConnected2089 = $graph->isConnected($startNode34, $startNode44);
    $isConnected2090 = $graph->isConnected($startNode34, $startNode45);
    $isConnected2091 = $graph->isConnected($startNode34, $startNode46);
    $isConnected2092 = $graph->isConnected($startNode34, $startNode47);
    $isConnected2093 = $graph->isConnected($startNode34, $startNode48);
    $isConnected2094 = $graph->isConnected($startNode34, $startNode49);
    $isConnected2095 = $graph->isConnected($startNode34, $startNode50);
    $isConnected2096 = $graph->isConnected($startNode34, $startNode51);
    $isConnected2097 = $graph->isConnected($startNode34, $startNode52);
    $isConnected2098 = $graph->isConnected($startNode34, $startNode53);
    $isConnected2099 = $graph->isConnected($startNode34, $startNode54);
    $isConnected2100 = $graph->isConnected($startNode34, $startNode55);
    $isConnected2101 = $graph->isConnected($startNode34, $startNode56);
    $isConnected2102 = $graph->isConnected($startNode34, $startNode57);
    $isConnected2103 = $graph->isConnected($startNode34, $startNode58);
    $isConnected2104 = $graph->isConnected($startNode34, $startNode59);
    $isConnected2105 = $graph->isConnected($startNode34, $startNode60);
    $isConnected2106 = $graph->isConnected($startNode34, $startNode61);
    $isConnected2107 = $graph->isConnected($startNode34, $startNode62);
    $isConnected2108 = $graph->isConnected($startNode34, $startNode63);
    $isConnected2109 = $graph->isConnected($startNode34, $startNode64);
    $isConnected2110 = $graph->isConnected($startNode34, $startNode65);
    $isConnected2111 = $graph->isConnected($startNode34, $startNode66);
    $isConnected2112 = $graph->isConnected($startNode34, $startNode67);
    $isConnected2113 = $graph->isConnected($startNode34, $startNode68);
    $isConnected2114 = $graph->isConnected($startNode34, $startNode69);
    $isConnected2115 = $graph->isConnected($startNode34, $startNode70);
    $isConnected2116 = $graph->isConnected($startNode34, $startNode71);
    $isConnected2117 = $graph->isConnected($startNode34, $startNode72);
    $isConnected2118 = $graph->isConnected($startNode34, $startNode73);
    $isConnected2119 = $graph->isConnected($startNode34, $startNode74);
    $isConnected2120 = $graph->isConnected($startNode34, $startNode75);
    $isConnected2121 = $graph->isConnected($startNode34, $startNode76);
    $isConnected2122 = $graph->isConnected($startNode34, $startNode77);
    $isConnected2123 = $graph->isConnected($startNode34, $startNode78);
    $isConnected2124 = $graph->isConnected($startNode34, $startNode79);
    $isConnected2125 = $graph->isConnected($startNode34, $startNode80);

    $isConnected2126 = $graph->isConnected($startNode35, $startNode36);
    $isConnected2127 = $graph->isConnected($startNode35, $startNode37);
    $isConnected2128 = $graph->isConnected($startNode35, $startNode38);
    $isConnected2129 = $graph->isConnected($startNode35, $startNode39);
    $isConnected2130 = $graph->isConnected($startNode35, $startNode40);
    $isConnected2131 = $graph->isConnected($startNode35, $startNode41);
    $isConnected2132 = $graph->isConnected($startNode35, $startNode42);
    $isConnected2133 = $graph->isConnected($startNode35, $startNode43);
    $isConnected2134 = $graph->isConnected($startNode35, $startNode44);
    $isConnected2135 = $graph->isConnected($startNode35, $startNode45);
    $isConnected2136 = $graph->isConnected($startNode35, $startNode46);
    $isConnected2137 = $graph->isConnected($startNode35, $startNode47);
    $isConnected2138 = $graph->isConnected($startNode35, $startNode48);
    $isConnected2139 = $graph->isConnected($startNode35, $startNode49);
    $isConnected2140 = $graph->isConnected($startNode35, $startNode50);
    $isConnected2141 = $graph->isConnected($startNode35, $startNode51);
    $isConnected2142 = $graph->isConnected($startNode35, $startNode52);
    $isConnected2143 = $graph->isConnected($startNode35, $startNode53);
    $isConnected2144 = $graph->isConnected($startNode35, $startNode54);
    $isConnected2145 = $graph->isConnected($startNode35, $startNode55);
    $isConnected2146 = $graph->isConnected($startNode35, $startNode56);
    $isConnected2147 = $graph->isConnected($startNode35, $startNode57);
    $isConnected2148 = $graph->isConnected($startNode35, $startNode58);
    $isConnected2149 = $graph->isConnected($startNode35, $startNode59);
    $isConnected2150 = $graph->isConnected($startNode35, $startNode60);
    $isConnected2151 = $graph->isConnected($startNode35, $startNode61);
    $isConnected2152 = $graph->isConnected($startNode35, $startNode62);
    $isConnected2153 = $graph->isConnected($startNode35, $startNode63);
    $isConnected2154 = $graph->isConnected($startNode35, $startNode64);
    $isConnected2155 = $graph->isConnected($startNode35, $startNode65);
    $isConnected2156 = $graph->isConnected($startNode35, $startNode66);
    $isConnected2157 = $graph->isConnected($startNode35, $startNode67);
    $isConnected2158 = $graph->isConnected($startNode35, $startNode68);
    $isConnected2159 = $graph->isConnected($startNode35, $startNode69);
    $isConnected2160 = $graph->isConnected($startNode35, $startNode70);
    $isConnected2161 = $graph->isConnected($startNode35, $startNode71);
    $isConnected2162 = $graph->isConnected($startNode35, $startNode72);
    $isConnected2163 = $graph->isConnected($startNode35, $startNode73);
    $isConnected2164 = $graph->isConnected($startNode35, $startNode74);
    $isConnected2165 = $graph->isConnected($startNode35, $startNode75);
    $isConnected2166 = $graph->isConnected($startNode35, $startNode76);
    $isConnected2167 = $graph->isConnected($startNode35, $startNode77);
    $isConnected2168 = $graph->isConnected($startNode35, $startNode78);
    $isConnected2169 = $graph->isConnected($startNode35, $startNode79);
    $isConnected2170 = $graph->isConnected($startNode35, $startNode80);

    $isConnected2171 = $graph->isConnected($startNode36, $startNode37);
    $isConnected2172 = $graph->isConnected($startNode36, $startNode38);
    $isConnected2173 = $graph->isConnected($startNode36, $startNode39);
    $isConnected2174 = $graph->isConnected($startNode36, $startNode40);
    $isConnected2175 = $graph->isConnected($startNode36, $startNode41);
    $isConnected2176 = $graph->isConnected($startNode36, $startNode42);
    $isConnected2177 = $graph->isConnected($startNode36, $startNode43);
    $isConnected2178 = $graph->isConnected($startNode36, $startNode44);
    $isConnected2179 = $graph->isConnected($startNode36, $startNode45);
    $isConnected2180 = $graph->isConnected($startNode36, $startNode46);
    $isConnected2181 = $graph->isConnected($startNode36, $startNode47);
    $isConnected2182 = $graph->isConnected($startNode36, $startNode48);
    $isConnected2183 = $graph->isConnected($startNode36, $startNode49);
    $isConnected2184 = $graph->isConnected($startNode36, $startNode50);
    $isConnected2185 = $graph->isConnected($startNode36, $startNode51);
    $isConnected2186 = $graph->isConnected($startNode36, $startNode52);
    $isConnected2187 = $graph->isConnected($startNode36, $startNode53);
    $isConnected2188 = $graph->isConnected($startNode36, $startNode54);
    $isConnected2189 = $graph->isConnected($startNode36, $startNode55);
    $isConnected2190 = $graph->isConnected($startNode36, $startNode56);
    $isConnected2191 = $graph->isConnected($startNode36, $startNode57);
    $isConnected2192 = $graph->isConnected($startNode36, $startNode58);
    $isConnected2193 = $graph->isConnected($startNode36, $startNode59);
    $isConnected2194 = $graph->isConnected($startNode36, $startNode60);
    $isConnected2195 = $graph->isConnected($startNode36, $startNode61);
    $isConnected2196 = $graph->isConnected($startNode36, $startNode62);
    $isConnected2197 = $graph->isConnected($startNode36, $startNode63);
    $isConnected2198 = $graph->isConnected($startNode36, $startNode64);
    $isConnected2199 = $graph->isConnected($startNode36, $startNode65);
    $isConnected2200 = $graph->isConnected($startNode36, $startNode66);
    $isConnected2201 = $graph->isConnected($startNode36, $startNode67);
    $isConnected2202 = $graph->isConnected($startNode36, $startNode68);
    $isConnected2203 = $graph->isConnected($startNode36, $startNode69);
    $isConnected2204 = $graph->isConnected($startNode36, $startNode70);
    $isConnected2205 = $graph->isConnected($startNode36, $startNode71);
    $isConnected2206 = $graph->isConnected($startNode36, $startNode72);
    $isConnected2207 = $graph->isConnected($startNode36, $startNode73);
    $isConnected2208 = $graph->isConnected($startNode36, $startNode74);
    $isConnected2209 = $graph->isConnected($startNode36, $startNode75);
    $isConnected2210 = $graph->isConnected($startNode36, $startNode76);
    $isConnected2211 = $graph->isConnected($startNode36, $startNode77);
    $isConnected2212 = $graph->isConnected($startNode36, $startNode78);
    $isConnected2213 = $graph->isConnected($startNode36, $startNode79);
    $isConnected2214 = $graph->isConnected($startNode36, $startNode80);

    $isConnected2215 = $graph->isConnected($startNode37, $startNode38);
    $isConnected2216 = $graph->isConnected($startNode37, $startNode39);
    $isConnected2217 = $graph->isConnected($startNode37, $startNode40);
    $isConnected2218 = $graph->isConnected($startNode37, $startNode41);
    $isConnected2219 = $graph->isConnected($startNode37, $startNode42);
    $isConnected2220 = $graph->isConnected($startNode37, $startNode43);
    $isConnected2221 = $graph->isConnected($startNode37, $startNode44);
    $isConnected2222 = $graph->isConnected($startNode37, $startNode45);
    $isConnected2223 = $graph->isConnected($startNode37, $startNode46);
    $isConnected2224 = $graph->isConnected($startNode37, $startNode47);
    $isConnected2225 = $graph->isConnected($startNode37, $startNode48);
    $isConnected2226 = $graph->isConnected($startNode37, $startNode49);
    $isConnected2227 = $graph->isConnected($startNode37, $startNode50);
    $isConnected2228 = $graph->isConnected($startNode37, $startNode51);
    $isConnected2229 = $graph->isConnected($startNode37, $startNode52);
    $isConnected2230 = $graph->isConnected($startNode37, $startNode53);
    $isConnected2231 = $graph->isConnected($startNode37, $startNode54);
    $isConnected2232 = $graph->isConnected($startNode37, $startNode55);
    $isConnected2233 = $graph->isConnected($startNode37, $startNode56);
    $isConnected2234 = $graph->isConnected($startNode37, $startNode57);
    $isConnected2235 = $graph->isConnected($startNode37, $startNode58);
    $isConnected2236 = $graph->isConnected($startNode37, $startNode59);
    $isConnected2237 = $graph->isConnected($startNode37, $startNode60);
    $isConnected2238 = $graph->isConnected($startNode37, $startNode61);
    $isConnected2239 = $graph->isConnected($startNode37, $startNode62);
    $isConnected2240 = $graph->isConnected($startNode37, $startNode63);
    $isConnected2241 = $graph->isConnected($startNode37, $startNode64);
    $isConnected2242 = $graph->isConnected($startNode37, $startNode65);
    $isConnected2243 = $graph->isConnected($startNode37, $startNode66);
    $isConnected2244 = $graph->isConnected($startNode37, $startNode67);
    $isConnected2245 = $graph->isConnected($startNode37, $startNode68);
    $isConnected2246 = $graph->isConnected($startNode37, $startNode69);
    $isConnected2247 = $graph->isConnected($startNode37, $startNode70);
    $isConnected2248 = $graph->isConnected($startNode37, $startNode71);
    $isConnected2249 = $graph->isConnected($startNode37, $startNode72);
    $isConnected2250 = $graph->isConnected($startNode37, $startNode73);
    $isConnected2251 = $graph->isConnected($startNode37, $startNode74);
    $isConnected2252 = $graph->isConnected($startNode37, $startNode75);
    $isConnected2253 = $graph->isConnected($startNode37, $startNode76);
    $isConnected2254 = $graph->isConnected($startNode37, $startNode77);
    $isConnected2255 = $graph->isConnected($startNode37, $startNode78);
    $isConnected2256 = $graph->isConnected($startNode37, $startNode79);
    $isConnected2257 = $graph->isConnected($startNode37, $startNode80);

    $isConnected2258 = $graph->isConnected($startNode38, $startNode39);
    $isConnected2259 = $graph->isConnected($startNode38, $startNode40);
    $isConnected2260 = $graph->isConnected($startNode38, $startNode41);
    $isConnected2261 = $graph->isConnected($startNode38, $startNode42);
    $isConnected2262 = $graph->isConnected($startNode38, $startNode43);
    $isConnected2263 = $graph->isConnected($startNode38, $startNode44);
    $isConnected2264 = $graph->isConnected($startNode38, $startNode45);
    $isConnected2265 = $graph->isConnected($startNode38, $startNode46);
    $isConnected2266 = $graph->isConnected($startNode38, $startNode47);
    $isConnected2267 = $graph->isConnected($startNode38, $startNode48);
    $isConnected2268 = $graph->isConnected($startNode38, $startNode49);
    $isConnected2269 = $graph->isConnected($startNode38, $startNode50);
    $isConnected2270 = $graph->isConnected($startNode38, $startNode51);
    $isConnected2271 = $graph->isConnected($startNode38, $startNode52);
    $isConnected2272 = $graph->isConnected($startNode38, $startNode53);
    $isConnected2273 = $graph->isConnected($startNode38, $startNode54);
    $isConnected2274 = $graph->isConnected($startNode38, $startNode55);
    $isConnected2275 = $graph->isConnected($startNode38, $startNode56);
    $isConnected2276 = $graph->isConnected($startNode38, $startNode57);
    $isConnected2277 = $graph->isConnected($startNode38, $startNode58);
    $isConnected2278 = $graph->isConnected($startNode38, $startNode59);
    $isConnected2279 = $graph->isConnected($startNode38, $startNode60);
    $isConnected2280 = $graph->isConnected($startNode38, $startNode61);
    $isConnected2281 = $graph->isConnected($startNode38, $startNode62);
    $isConnected2282 = $graph->isConnected($startNode38, $startNode63);
    $isConnected2283 = $graph->isConnected($startNode38, $startNode64);
    $isConnected2284 = $graph->isConnected($startNode38, $startNode65);
    $isConnected2285 = $graph->isConnected($startNode38, $startNode66);
    $isConnected2286 = $graph->isConnected($startNode38, $startNode67);
    $isConnected2287 = $graph->isConnected($startNode38, $startNode68);
    $isConnected2288 = $graph->isConnected($startNode38, $startNode69);
    $isConnected2289 = $graph->isConnected($startNode38, $startNode70);
    $isConnected2290 = $graph->isConnected($startNode38, $startNode71);
    $isConnected2291 = $graph->isConnected($startNode38, $startNode72);
    $isConnected2292 = $graph->isConnected($startNode38, $startNode73);
    $isConnected2293 = $graph->isConnected($startNode38, $startNode74);
    $isConnected2294 = $graph->isConnected($startNode38, $startNode75);
    $isConnected2295 = $graph->isConnected($startNode38, $startNode76);
    $isConnected2296 = $graph->isConnected($startNode38, $startNode77);
    $isConnected2297 = $graph->isConnected($startNode38, $startNode78);
    $isConnected2298 = $graph->isConnected($startNode38, $startNode79);
    $isConnected2299 = $graph->isConnected($startNode38, $startNode80);

    $isConnected2300 = $graph->isConnected($startNode39, $startNode40);
    $isConnected2301 = $graph->isConnected($startNode39, $startNode41);
    $isConnected2302 = $graph->isConnected($startNode39, $startNode42);
    $isConnected2303 = $graph->isConnected($startNode39, $startNode43);
    $isConnected2304 = $graph->isConnected($startNode39, $startNode44);
    $isConnected2305 = $graph->isConnected($startNode39, $startNode45);
    $isConnected2306 = $graph->isConnected($startNode39, $startNode46);
    $isConnected2307 = $graph->isConnected($startNode39, $startNode47);
    $isConnected2308 = $graph->isConnected($startNode39, $startNode48);
    $isConnected2309 = $graph->isConnected($startNode39, $startNode49);
    $isConnected2310 = $graph->isConnected($startNode39, $startNode50);
    $isConnected2311 = $graph->isConnected($startNode39, $startNode51);
    $isConnected2312 = $graph->isConnected($startNode39, $startNode52);
    $isConnected2313 = $graph->isConnected($startNode39, $startNode53);
    $isConnected2314 = $graph->isConnected($startNode39, $startNode54);
    $isConnected2315 = $graph->isConnected($startNode39, $startNode55);
    $isConnected2316 = $graph->isConnected($startNode39, $startNode56);
    $isConnected2317 = $graph->isConnected($startNode39, $startNode57);
    $isConnected2318 = $graph->isConnected($startNode39, $startNode58);
    $isConnected2319 = $graph->isConnected($startNode39, $startNode59);
    $isConnected2320 = $graph->isConnected($startNode39, $startNode60);
    $isConnected2321 = $graph->isConnected($startNode39, $startNode61);
    $isConnected2322 = $graph->isConnected($startNode39, $startNode62);
    $isConnected2323 = $graph->isConnected($startNode39, $startNode63);
    $isConnected2324 = $graph->isConnected($startNode39, $startNode64);
    $isConnected2325 = $graph->isConnected($startNode39, $startNode65);
    $isConnected2326 = $graph->isConnected($startNode39, $startNode66);
    $isConnected2327 = $graph->isConnected($startNode39, $startNode67);
    $isConnected2328 = $graph->isConnected($startNode39, $startNode68);
    $isConnected2329 = $graph->isConnected($startNode39, $startNode69);
    $isConnected2330 = $graph->isConnected($startNode39, $startNode70);
    $isConnected2331 = $graph->isConnected($startNode39, $startNode71);
    $isConnected2332 = $graph->isConnected($startNode39, $startNode72);
    $isConnected2333 = $graph->isConnected($startNode39, $startNode73);
    $isConnected2334 = $graph->isConnected($startNode39, $startNode74);
    $isConnected2335 = $graph->isConnected($startNode39, $startNode75);
    $isConnected2336 = $graph->isConnected($startNode39, $startNode76);
    $isConnected2337 = $graph->isConnected($startNode39, $startNode77);
    $isConnected2338 = $graph->isConnected($startNode39, $startNode78);
    $isConnected2339 = $graph->isConnected($startNode39, $startNode79);
    $isConnected2340 = $graph->isConnected($startNode39, $startNode80);

    $isConnected2341 = $graph->isConnected($startNode40, $startNode41);
    $isConnected2342 = $graph->isConnected($startNode40, $startNode42);
    $isConnected2343 = $graph->isConnected($startNode40, $startNode43);
    $isConnected2344 = $graph->isConnected($startNode40, $startNode44);
    $isConnected2345 = $graph->isConnected($startNode40, $startNode45);
    $isConnected2346 = $graph->isConnected($startNode40, $startNode46);
    $isConnected2347 = $graph->isConnected($startNode40, $startNode47);
    $isConnected2348 = $graph->isConnected($startNode40, $startNode48);
    $isConnected2349 = $graph->isConnected($startNode40, $startNode49);
    $isConnected2350 = $graph->isConnected($startNode40, $startNode50);
    $isConnected2351 = $graph->isConnected($startNode40, $startNode51);
    $isConnected2352 = $graph->isConnected($startNode40, $startNode52);
    $isConnected2353 = $graph->isConnected($startNode40, $startNode53);
    $isConnected2354 = $graph->isConnected($startNode40, $startNode54);
    $isConnected2355 = $graph->isConnected($startNode40, $startNode55);
    $isConnected2356 = $graph->isConnected($startNode40, $startNode56);
    $isConnected2357 = $graph->isConnected($startNode40, $startNode57);
    $isConnected2358 = $graph->isConnected($startNode40, $startNode58);
    $isConnected2359 = $graph->isConnected($startNode40, $startNode59);
    $isConnected2360 = $graph->isConnected($startNode40, $startNode60);
    $isConnected2361 = $graph->isConnected($startNode40, $startNode61);
    $isConnected2362 = $graph->isConnected($startNode40, $startNode62);
    $isConnected2363 = $graph->isConnected($startNode40, $startNode63);
    $isConnected2364 = $graph->isConnected($startNode40, $startNode64);
    $isConnected2365 = $graph->isConnected($startNode40, $startNode65);
    $isConnected2366 = $graph->isConnected($startNode40, $startNode66);
    $isConnected2367 = $graph->isConnected($startNode40, $startNode67);
    $isConnected2368 = $graph->isConnected($startNode40, $startNode68);
    $isConnected2369 = $graph->isConnected($startNode40, $startNode69);
    $isConnected2370 = $graph->isConnected($startNode40, $startNode70);
    $isConnected2371 = $graph->isConnected($startNode40, $startNode71);
    $isConnected2372 = $graph->isConnected($startNode40, $startNode72);
    $isConnected2373 = $graph->isConnected($startNode40, $startNode73);
    $isConnected2374 = $graph->isConnected($startNode40, $startNode74);
    $isConnected2375 = $graph->isConnected($startNode40, $startNode75);
    $isConnected2376 = $graph->isConnected($startNode40, $startNode76);
    $isConnected2377 = $graph->isConnected($startNode40, $startNode77);
    $isConnected2378 = $graph->isConnected($startNode40, $startNode78);
    $isConnected2379 = $graph->isConnected($startNode40, $startNode79);
    $isConnected2380 = $graph->isConnected($startNode40, $startNode80);

    $isConnected2381 = $graph->isConnected($startNode41, $startNode42);
    $isConnected2382 = $graph->isConnected($startNode41, $startNode43);
    $isConnected2383 = $graph->isConnected($startNode41, $startNode44);
    $isConnected2384 = $graph->isConnected($startNode41, $startNode45);
    $isConnected2385 = $graph->isConnected($startNode41, $startNode46);
    $isConnected2386 = $graph->isConnected($startNode41, $startNode47);
    $isConnected2387 = $graph->isConnected($startNode41, $startNode48);
    $isConnected2388 = $graph->isConnected($startNode41, $startNode49);
    $isConnected2389 = $graph->isConnected($startNode41, $startNode50);
    $isConnected2390 = $graph->isConnected($startNode41, $startNode51);
    $isConnected2391 = $graph->isConnected($startNode41, $startNode52);
    $isConnected2392 = $graph->isConnected($startNode41, $startNode53);
    $isConnected2393 = $graph->isConnected($startNode41, $startNode54);
    $isConnected2394 = $graph->isConnected($startNode41, $startNode55);
    $isConnected2395 = $graph->isConnected($startNode41, $startNode56);
    $isConnected2396 = $graph->isConnected($startNode41, $startNode57);
    $isConnected2397 = $graph->isConnected($startNode41, $startNode58);
    $isConnected2398 = $graph->isConnected($startNode41, $startNode59);
    $isConnected2399 = $graph->isConnected($startNode41, $startNode60);
    $isConnected2400 = $graph->isConnected($startNode41, $startNode61);
    $isConnected2401 = $graph->isConnected($startNode41, $startNode62);
    $isConnected2402 = $graph->isConnected($startNode41, $startNode63);
    $isConnected2403 = $graph->isConnected($startNode41, $startNode64);
    $isConnected2404 = $graph->isConnected($startNode41, $startNode65);
    $isConnected2405 = $graph->isConnected($startNode41, $startNode66);
    $isConnected2406 = $graph->isConnected($startNode41, $startNode67);
    $isConnected2407 = $graph->isConnected($startNode41, $startNode68);
    $isConnected2408 = $graph->isConnected($startNode41, $startNode69);
    $isConnected2409 = $graph->isConnected($startNode41, $startNode70);
    $isConnected2410 = $graph->isConnected($startNode41, $startNode71);
    $isConnected2411 = $graph->isConnected($startNode41, $startNode72);
    $isConnected2412 = $graph->isConnected($startNode41, $startNode73);
    $isConnected2413 = $graph->isConnected($startNode41, $startNode74);
    $isConnected2414 = $graph->isConnected($startNode41, $startNode75);
    $isConnected2415 = $graph->isConnected($startNode41, $startNode76);
    $isConnected2416 = $graph->isConnected($startNode41, $startNode77);
    $isConnected2417 = $graph->isConnected($startNode41, $startNode78);
    $isConnected2418 = $graph->isConnected($startNode41, $startNode79);
    $isConnected2419 = $graph->isConnected($startNode41, $startNode80);

    $isConnected2420 = $graph->isConnected($startNode42, $startNode43);
    $isConnected2421 = $graph->isConnected($startNode42, $startNode44);
    $isConnected2422 = $graph->isConnected($startNode42, $startNode45);
    $isConnected2423 = $graph->isConnected($startNode42, $startNode46);
    $isConnected2424 = $graph->isConnected($startNode42, $startNode47);
    $isConnected2425 = $graph->isConnected($startNode42, $startNode48);
    $isConnected2426 = $graph->isConnected($startNode42, $startNode49);
    $isConnected2427 = $graph->isConnected($startNode42, $startNode50);
    $isConnected2428 = $graph->isConnected($startNode42, $startNode51);
    $isConnected2429 = $graph->isConnected($startNode42, $startNode52);
    $isConnected2430 = $graph->isConnected($startNode42, $startNode53);
    $isConnected2431 = $graph->isConnected($startNode42, $startNode54);
    $isConnected2432 = $graph->isConnected($startNode42, $startNode55);
    $isConnected2433 = $graph->isConnected($startNode42, $startNode56);
    $isConnected2434 = $graph->isConnected($startNode42, $startNode57);
    $isConnected2435 = $graph->isConnected($startNode42, $startNode58);
    $isConnected2436 = $graph->isConnected($startNode42, $startNode59);
    $isConnected2437 = $graph->isConnected($startNode42, $startNode60);
    $isConnected2438 = $graph->isConnected($startNode42, $startNode61);
    $isConnected2439 = $graph->isConnected($startNode42, $startNode62);
    $isConnected2440 = $graph->isConnected($startNode42, $startNode63);
    $isConnected2441 = $graph->isConnected($startNode42, $startNode64);
    $isConnected2442 = $graph->isConnected($startNode42, $startNode65);
    $isConnected2443 = $graph->isConnected($startNode42, $startNode66);
    $isConnected2444 = $graph->isConnected($startNode42, $startNode67);
    $isConnected2445 = $graph->isConnected($startNode42, $startNode68);
    $isConnected2446 = $graph->isConnected($startNode42, $startNode69);
    $isConnected2447 = $graph->isConnected($startNode42, $startNode70);
    $isConnected2448 = $graph->isConnected($startNode42, $startNode71);
    $isConnected2449 = $graph->isConnected($startNode42, $startNode72);
    $isConnected2450 = $graph->isConnected($startNode42, $startNode73);
    $isConnected2451 = $graph->isConnected($startNode42, $startNode74);
    $isConnected2452 = $graph->isConnected($startNode42, $startNode75);
    $isConnected2453 = $graph->isConnected($startNode42, $startNode76);
    $isConnected2454 = $graph->isConnected($startNode42, $startNode77);
    $isConnected2455 = $graph->isConnected($startNode42, $startNode78);
    $isConnected2456 = $graph->isConnected($startNode42, $startNode79);
    $isConnected2457 = $graph->isConnected($startNode42, $startNode80);

    $isConnected2458 = $graph->isConnected($startNode43, $startNode44);
    $isConnected2459 = $graph->isConnected($startNode43, $startNode45);
    $isConnected2460 = $graph->isConnected($startNode43, $startNode46);
    $isConnected2461 = $graph->isConnected($startNode43, $startNode47);
    $isConnected2462 = $graph->isConnected($startNode43, $startNode48);
    $isConnected2463 = $graph->isConnected($startNode43, $startNode49);
    $isConnected2464 = $graph->isConnected($startNode43, $startNode50);
    $isConnected2465 = $graph->isConnected($startNode43, $startNode51);
    $isConnected2466 = $graph->isConnected($startNode43, $startNode52);
    $isConnected2467 = $graph->isConnected($startNode43, $startNode53);
    $isConnected2468 = $graph->isConnected($startNode43, $startNode54);
    $isConnected2469 = $graph->isConnected($startNode43, $startNode55);
    $isConnected2470 = $graph->isConnected($startNode43, $startNode56);
    $isConnected2471 = $graph->isConnected($startNode43, $startNode57);
    $isConnected2472 = $graph->isConnected($startNode43, $startNode58);
    $isConnected2473 = $graph->isConnected($startNode43, $startNode59);
    $isConnected2474 = $graph->isConnected($startNode43, $startNode60);
    $isConnected2475 = $graph->isConnected($startNode43, $startNode61);
    $isConnected2476 = $graph->isConnected($startNode43, $startNode62);
    $isConnected2477 = $graph->isConnected($startNode43, $startNode63);
    $isConnected2478 = $graph->isConnected($startNode43, $startNode64);
    $isConnected2479 = $graph->isConnected($startNode43, $startNode65);
    $isConnected2480 = $graph->isConnected($startNode43, $startNode66);
    $isConnected2481 = $graph->isConnected($startNode43, $startNode67);
    $isConnected2482 = $graph->isConnected($startNode43, $startNode68);
    $isConnected2483 = $graph->isConnected($startNode43, $startNode69);
    $isConnected2484 = $graph->isConnected($startNode43, $startNode70);
    $isConnected2485 = $graph->isConnected($startNode43, $startNode71);
    $isConnected2486 = $graph->isConnected($startNode43, $startNode72);
    $isConnected2487 = $graph->isConnected($startNode43, $startNode73);
    $isConnected2488 = $graph->isConnected($startNode43, $startNode74);
    $isConnected2489 = $graph->isConnected($startNode43, $startNode75);
    $isConnected2490 = $graph->isConnected($startNode43, $startNode76);
    $isConnected2491 = $graph->isConnected($startNode43, $startNode77);
    $isConnected2492 = $graph->isConnected($startNode43, $startNode78);
    $isConnected2493 = $graph->isConnected($startNode43, $startNode79);
    $isConnected2494 = $graph->isConnected($startNode43, $startNode80);

    $isConnected2495 = $graph->isConnected($startNode44, $startNode45);
    $isConnected2496 = $graph->isConnected($startNode44, $startNode46);
    $isConnected2497 = $graph->isConnected($startNode44, $startNode47);
    $isConnected2498 = $graph->isConnected($startNode44, $startNode48);
    $isConnected2499 = $graph->isConnected($startNode44, $startNode49);
    $isConnected2500 = $graph->isConnected($startNode44, $startNode50);
    $isConnected2501 = $graph->isConnected($startNode44, $startNode51);
    $isConnected2502 = $graph->isConnected($startNode44, $startNode52);
    $isConnected2503 = $graph->isConnected($startNode44, $startNode53);
    $isConnected2504 = $graph->isConnected($startNode44, $startNode54);
    $isConnected2505 = $graph->isConnected($startNode44, $startNode55);
    $isConnected2506 = $graph->isConnected($startNode44, $startNode56);
    $isConnected2507 = $graph->isConnected($startNode44, $startNode57);
    $isConnected2508 = $graph->isConnected($startNode44, $startNode58);
    $isConnected2509 = $graph->isConnected($startNode44, $startNode59);
    $isConnected2510 = $graph->isConnected($startNode44, $startNode60);
    $isConnected2511 = $graph->isConnected($startNode44, $startNode61);
    $isConnected2512 = $graph->isConnected($startNode44, $startNode62);
    $isConnected2513 = $graph->isConnected($startNode44, $startNode63);
    $isConnected2514 = $graph->isConnected($startNode44, $startNode64);
    $isConnected2515 = $graph->isConnected($startNode44, $startNode65);
    $isConnected2516 = $graph->isConnected($startNode44, $startNode66);
    $isConnected2517 = $graph->isConnected($startNode44, $startNode67);
    $isConnected2518 = $graph->isConnected($startNode44, $startNode68);
    $isConnected2519 = $graph->isConnected($startNode44, $startNode69);
    $isConnected2520 = $graph->isConnected($startNode44, $startNode70);
    $isConnected2521 = $graph->isConnected($startNode44, $startNode71);
    $isConnected2522 = $graph->isConnected($startNode44, $startNode72);
    $isConnected2523 = $graph->isConnected($startNode44, $startNode73);
    $isConnected2524 = $graph->isConnected($startNode44, $startNode74);
    $isConnected2525 = $graph->isConnected($startNode44, $startNode75);
    $isConnected2526 = $graph->isConnected($startNode44, $startNode76);
    $isConnected2527 = $graph->isConnected($startNode44, $startNode77);
    $isConnected2528 = $graph->isConnected($startNode44, $startNode78);
    $isConnected2529 = $graph->isConnected($startNode44, $startNode79);
    $isConnected2530 = $graph->isConnected($startNode44, $startNode80);

    $isConnected2531 = $graph->isConnected($startNode45, $startNode46);
    $isConnected2532 = $graph->isConnected($startNode45, $startNode47);
    $isConnected2533 = $graph->isConnected($startNode45, $startNode48);
    $isConnected2534 = $graph->isConnected($startNode45, $startNode49);
    $isConnected2535 = $graph->isConnected($startNode45, $startNode50);
    $isConnected2536 = $graph->isConnected($startNode45, $startNode51);
    $isConnected2537 = $graph->isConnected($startNode45, $startNode52);
    $isConnected2538 = $graph->isConnected($startNode45, $startNode53);
    $isConnected2539 = $graph->isConnected($startNode45, $startNode54);
    $isConnected2540 = $graph->isConnected($startNode45, $startNode55);
    $isConnected2541 = $graph->isConnected($startNode45, $startNode56);
    $isConnected2542 = $graph->isConnected($startNode45, $startNode57);
    $isConnected2543 = $graph->isConnected($startNode45, $startNode58);
    $isConnected2544 = $graph->isConnected($startNode45, $startNode59);
    $isConnected2545 = $graph->isConnected($startNode45, $startNode60);
    $isConnected2546 = $graph->isConnected($startNode45, $startNode61);
    $isConnected2547 = $graph->isConnected($startNode45, $startNode62);
    $isConnected2548 = $graph->isConnected($startNode45, $startNode63);
    $isConnected2549 = $graph->isConnected($startNode45, $startNode64);
    $isConnected2550 = $graph->isConnected($startNode45, $startNode65);
    $isConnected2551 = $graph->isConnected($startNode45, $startNode66);
    $isConnected2552 = $graph->isConnected($startNode45, $startNode67);
    $isConnected2553 = $graph->isConnected($startNode45, $startNode68);
    $isConnected2554 = $graph->isConnected($startNode45, $startNode69);
    $isConnected2555 = $graph->isConnected($startNode45, $startNode70);
    $isConnected2556 = $graph->isConnected($startNode45, $startNode71);
    $isConnected2557 = $graph->isConnected($startNode45, $startNode72);
    $isConnected2558 = $graph->isConnected($startNode45, $startNode73);
    $isConnected2559 = $graph->isConnected($startNode45, $startNode74);
    $isConnected2560 = $graph->isConnected($startNode45, $startNode75);
    $isConnected2561 = $graph->isConnected($startNode45, $startNode76);
    $isConnected2562 = $graph->isConnected($startNode45, $startNode77);
    $isConnected2563 = $graph->isConnected($startNode45, $startNode78);
    $isConnected2564 = $graph->isConnected($startNode45, $startNode79);
    $isConnected2565 = $graph->isConnected($startNode45, $startNode80);

    $isConnected2566 = $graph->isConnected($startNode46, $startNode47);
    $isConnected2567 = $graph->isConnected($startNode46, $startNode48);
    $isConnected2568 = $graph->isConnected($startNode46, $startNode49);
    $isConnected2569 = $graph->isConnected($startNode46, $startNode50);
    $isConnected2570 = $graph->isConnected($startNode46, $startNode51);
    $isConnected2571 = $graph->isConnected($startNode46, $startNode52);
    $isConnected2572 = $graph->isConnected($startNode46, $startNode53);
    $isConnected2573 = $graph->isConnected($startNode46, $startNode54);
    $isConnected2574 = $graph->isConnected($startNode46, $startNode55);
    $isConnected2575 = $graph->isConnected($startNode46, $startNode56);
    $isConnected2576 = $graph->isConnected($startNode46, $startNode57);
    $isConnected2577 = $graph->isConnected($startNode46, $startNode58);
    $isConnected2578 = $graph->isConnected($startNode46, $startNode59);
    $isConnected2579 = $graph->isConnected($startNode46, $startNode60);
    $isConnected2580 = $graph->isConnected($startNode46, $startNode61);
    $isConnected2581 = $graph->isConnected($startNode46, $startNode62);
    $isConnected2582 = $graph->isConnected($startNode46, $startNode63);
    $isConnected2583 = $graph->isConnected($startNode46, $startNode64);
    $isConnected2584 = $graph->isConnected($startNode46, $startNode65);
    $isConnected2585 = $graph->isConnected($startNode46, $startNode66);
    $isConnected2586 = $graph->isConnected($startNode46, $startNode67);
    $isConnected2587 = $graph->isConnected($startNode46, $startNode68);
    $isConnected2588 = $graph->isConnected($startNode46, $startNode69);
    $isConnected2589 = $graph->isConnected($startNode46, $startNode70);
    $isConnected2590 = $graph->isConnected($startNode46, $startNode71);
    $isConnected2591 = $graph->isConnected($startNode46, $startNode72);
    $isConnected2592 = $graph->isConnected($startNode46, $startNode73);
    $isConnected2593 = $graph->isConnected($startNode46, $startNode74);
    $isConnected2594 = $graph->isConnected($startNode46, $startNode75);
    $isConnected2595 = $graph->isConnected($startNode46, $startNode76);
    $isConnected2596 = $graph->isConnected($startNode46, $startNode77);
    $isConnected2597 = $graph->isConnected($startNode46, $startNode78);
    $isConnected2598 = $graph->isConnected($startNode46, $startNode79);
    $isConnected2599 = $graph->isConnected($startNode46, $startNode80);

    $isConnected2600 = $graph->isConnected($startNode47, $startNode48);
    $isConnected2601 = $graph->isConnected($startNode47, $startNode49);
    $isConnected2602 = $graph->isConnected($startNode47, $startNode50);
    $isConnected2603 = $graph->isConnected($startNode47, $startNode51);
    $isConnected2604 = $graph->isConnected($startNode47, $startNode52);
    $isConnected2605 = $graph->isConnected($startNode47, $startNode53);
    $isConnected2606 = $graph->isConnected($startNode47, $startNode54);
    $isConnected2607 = $graph->isConnected($startNode47, $startNode55);
    $isConnected2608 = $graph->isConnected($startNode47, $startNode56);
    $isConnected2609 = $graph->isConnected($startNode47, $startNode57);
    $isConnected2610 = $graph->isConnected($startNode47, $startNode58);
    $isConnected2611 = $graph->isConnected($startNode47, $startNode59);
    $isConnected2612 = $graph->isConnected($startNode47, $startNode60);
    $isConnected2613 = $graph->isConnected($startNode47, $startNode61);
    $isConnected2614 = $graph->isConnected($startNode47, $startNode62);
    $isConnected2615 = $graph->isConnected($startNode47, $startNode63);
    $isConnected2616 = $graph->isConnected($startNode47, $startNode64);
    $isConnected2617 = $graph->isConnected($startNode47, $startNode65);
    $isConnected2618 = $graph->isConnected($startNode47, $startNode66);
    $isConnected2619 = $graph->isConnected($startNode47, $startNode67);
    $isConnected2620 = $graph->isConnected($startNode47, $startNode68);
    $isConnected2621 = $graph->isConnected($startNode47, $startNode69);
    $isConnected2622 = $graph->isConnected($startNode47, $startNode70);
    $isConnected2623 = $graph->isConnected($startNode47, $startNode71);
    $isConnected2624 = $graph->isConnected($startNode47, $startNode72);
    $isConnected2625 = $graph->isConnected($startNode47, $startNode73);
    $isConnected2626 = $graph->isConnected($startNode47, $startNode74);
    $isConnected2627 = $graph->isConnected($startNode47, $startNode75);
    $isConnected2628 = $graph->isConnected($startNode47, $startNode76);
    $isConnected2629 = $graph->isConnected($startNode47, $startNode77);
    $isConnected2630 = $graph->isConnected($startNode47, $startNode78);
    $isConnected2631 = $graph->isConnected($startNode47, $startNode79);
    $isConnected2632 = $graph->isConnected($startNode47, $startNode80);

    $isConnected2633 = $graph->isConnected($startNode48, $startNode49);
    $isConnected2634 = $graph->isConnected($startNode48, $startNode50);
    $isConnected2635 = $graph->isConnected($startNode48, $startNode51);
    $isConnected2636 = $graph->isConnected($startNode48, $startNode52);
    $isConnected2637 = $graph->isConnected($startNode48, $startNode53);
    $isConnected2638 = $graph->isConnected($startNode48, $startNode54);
    $isConnected2639 = $graph->isConnected($startNode48, $startNode55);
    $isConnected2640 = $graph->isConnected($startNode48, $startNode56);
    $isConnected2641 = $graph->isConnected($startNode48, $startNode57);
    $isConnected2642 = $graph->isConnected($startNode48, $startNode58);
    $isConnected2643 = $graph->isConnected($startNode48, $startNode59);
    $isConnected2644 = $graph->isConnected($startNode48, $startNode60);
    $isConnected2645 = $graph->isConnected($startNode48, $startNode61);
    $isConnected2646 = $graph->isConnected($startNode48, $startNode62);
    $isConnected2647 = $graph->isConnected($startNode48, $startNode63);
    $isConnected2648 = $graph->isConnected($startNode48, $startNode64);
    $isConnected2649 = $graph->isConnected($startNode48, $startNode65);
    $isConnected2650 = $graph->isConnected($startNode48, $startNode66);
    $isConnected2651 = $graph->isConnected($startNode48, $startNode67);
    $isConnected2652 = $graph->isConnected($startNode48, $startNode68);
    $isConnected2653 = $graph->isConnected($startNode48, $startNode69);
    $isConnected2654 = $graph->isConnected($startNode48, $startNode70);
    $isConnected2655 = $graph->isConnected($startNode48, $startNode71);
    $isConnected2656 = $graph->isConnected($startNode48, $startNode72);
    $isConnected2657 = $graph->isConnected($startNode48, $startNode73);
    $isConnected2658 = $graph->isConnected($startNode48, $startNode74);
    $isConnected2659 = $graph->isConnected($startNode48, $startNode75);
    $isConnected2660 = $graph->isConnected($startNode48, $startNode76);
    $isConnected2661 = $graph->isConnected($startNode48, $startNode77);
    $isConnected2662 = $graph->isConnected($startNode48, $startNode78);
    $isConnected2663 = $graph->isConnected($startNode48, $startNode79);
    $isConnected2664 = $graph->isConnected($startNode48, $startNode80);

    $isConnected2665 = $graph->isConnected($startNode49, $startNode50);
    $isConnected2666 = $graph->isConnected($startNode49, $startNode51);
    $isConnected2667 = $graph->isConnected($startNode49, $startNode52);
    $isConnected2668 = $graph->isConnected($startNode49, $startNode53);
    $isConnected2669 = $graph->isConnected($startNode49, $startNode54);
    $isConnected2670 = $graph->isConnected($startNode49, $startNode55);
    $isConnected2671 = $graph->isConnected($startNode49, $startNode56);
    $isConnected2672 = $graph->isConnected($startNode49, $startNode57);
    $isConnected2673 = $graph->isConnected($startNode49, $startNode58);
    $isConnected2674 = $graph->isConnected($startNode49, $startNode59);
    $isConnected2675 = $graph->isConnected($startNode49, $startNode60);
    $isConnected2676 = $graph->isConnected($startNode49, $startNode61);
    $isConnected2677 = $graph->isConnected($startNode49, $startNode62);
    $isConnected2678 = $graph->isConnected($startNode49, $startNode63);
    $isConnected2679 = $graph->isConnected($startNode49, $startNode64);
    $isConnected2680 = $graph->isConnected($startNode49, $startNode65);
    $isConnected2681 = $graph->isConnected($startNode49, $startNode66);
    $isConnected2682 = $graph->isConnected($startNode49, $startNode67);
    $isConnected2683 = $graph->isConnected($startNode49, $startNode68);
    $isConnected2684 = $graph->isConnected($startNode49, $startNode69);
    $isConnected2685 = $graph->isConnected($startNode49, $startNode70);
    $isConnected2686 = $graph->isConnected($startNode49, $startNode71);
    $isConnected2687 = $graph->isConnected($startNode49, $startNode72);
    $isConnected2688 = $graph->isConnected($startNode49, $startNode73);
    $isConnected2689 = $graph->isConnected($startNode49, $startNode74);
    $isConnected2690 = $graph->isConnected($startNode49, $startNode75);
    $isConnected2691 = $graph->isConnected($startNode49, $startNode76);
    $isConnected2692 = $graph->isConnected($startNode49, $startNode77);
    $isConnected2693 = $graph->isConnected($startNode49, $startNode78);
    $isConnected2694 = $graph->isConnected($startNode49, $startNode79);
    $isConnected2695 = $graph->isConnected($startNode49, $startNode80);

    $isConnected2696 = $graph->isConnected($startNode50, $startNode51);
    $isConnected2697 = $graph->isConnected($startNode50, $startNode52);
    $isConnected2698 = $graph->isConnected($startNode50, $startNode53);
    $isConnected2699 = $graph->isConnected($startNode50, $startNode54);
    $isConnected2700 = $graph->isConnected($startNode50, $startNode55);
    $isConnected2701 = $graph->isConnected($startNode50, $startNode56);
    $isConnected2702 = $graph->isConnected($startNode50, $startNode57);
    $isConnected2703 = $graph->isConnected($startNode50, $startNode58);
    $isConnected2704 = $graph->isConnected($startNode50, $startNode59);
    $isConnected2705 = $graph->isConnected($startNode50, $startNode60);
    $isConnected2706 = $graph->isConnected($startNode50, $startNode61);
    $isConnected2707 = $graph->isConnected($startNode50, $startNode62);
    $isConnected2708 = $graph->isConnected($startNode50, $startNode63);
    $isConnected2709 = $graph->isConnected($startNode50, $startNode64);
    $isConnected2710 = $graph->isConnected($startNode50, $startNode65);
    $isConnected2711 = $graph->isConnected($startNode50, $startNode66);
    $isConnected2712 = $graph->isConnected($startNode50, $startNode67);
    $isConnected2713 = $graph->isConnected($startNode50, $startNode68);
    $isConnected2714 = $graph->isConnected($startNode50, $startNode69);
    $isConnected2715 = $graph->isConnected($startNode50, $startNode70);
    $isConnected2716 = $graph->isConnected($startNode50, $startNode71);
    $isConnected2717 = $graph->isConnected($startNode50, $startNode72);
    $isConnected2718 = $graph->isConnected($startNode50, $startNode73);
    $isConnected2719 = $graph->isConnected($startNode50, $startNode74);
    $isConnected2720 = $graph->isConnected($startNode50, $startNode75);
    $isConnected2721 = $graph->isConnected($startNode50, $startNode76);
    $isConnected2722 = $graph->isConnected($startNode50, $startNode77);
    $isConnected2723 = $graph->isConnected($startNode50, $startNode78);
    $isConnected2724 = $graph->isConnected($startNode50, $startNode79);
    $isConnected2725 = $graph->isConnected($startNode50, $startNode80);

    $isConnected2726 = $graph->isConnected($startNode51, $startNode52);
    $isConnected2727 = $graph->isConnected($startNode51, $startNode53);
    $isConnected2728 = $graph->isConnected($startNode51, $startNode54);
    $isConnected2729 = $graph->isConnected($startNode51, $startNode55);
    $isConnected2730 = $graph->isConnected($startNode51, $startNode56);
    $isConnected2731 = $graph->isConnected($startNode51, $startNode57);
    $isConnected2732 = $graph->isConnected($startNode51, $startNode58);
    $isConnected2733 = $graph->isConnected($startNode51, $startNode59);
    $isConnected2734 = $graph->isConnected($startNode51, $startNode60);
    $isConnected2735 = $graph->isConnected($startNode51, $startNode61);
    $isConnected2736 = $graph->isConnected($startNode51, $startNode62);
    $isConnected2737 = $graph->isConnected($startNode51, $startNode63);
    $isConnected2738 = $graph->isConnected($startNode51, $startNode64);
    $isConnected2739 = $graph->isConnected($startNode51, $startNode65);
    $isConnected2740 = $graph->isConnected($startNode51, $startNode66);
    $isConnected2741 = $graph->isConnected($startNode51, $startNode67);
    $isConnected2742 = $graph->isConnected($startNode51, $startNode68);
    $isConnected2743 = $graph->isConnected($startNode51, $startNode69);
    $isConnected2744 = $graph->isConnected($startNode51, $startNode70);
    $isConnected2745 = $graph->isConnected($startNode51, $startNode71);
    $isConnected2746 = $graph->isConnected($startNode51, $startNode72);
    $isConnected2747 = $graph->isConnected($startNode51, $startNode73);
    $isConnected2748 = $graph->isConnected($startNode51, $startNode74);
    $isConnected2749 = $graph->isConnected($startNode51, $startNode75);
    $isConnected2750 = $graph->isConnected($startNode51, $startNode76);
    $isConnected2751 = $graph->isConnected($startNode51, $startNode77);
    $isConnected2752 = $graph->isConnected($startNode51, $startNode78);
    $isConnected2753 = $graph->isConnected($startNode51, $startNode79);
    $isConnected2754 = $graph->isConnected($startNode51, $startNode80);

    $isConnected2755 = $graph->isConnected($startNode52, $startNode53);
    $isConnected2756 = $graph->isConnected($startNode52, $startNode54);
    $isConnected2757 = $graph->isConnected($startNode52, $startNode55);
    $isConnected2758 = $graph->isConnected($startNode52, $startNode56);
    $isConnected2759 = $graph->isConnected($startNode52, $startNode57);
    $isConnected2760 = $graph->isConnected($startNode52, $startNode58);
    $isConnected2761 = $graph->isConnected($startNode52, $startNode59);
    $isConnected2762 = $graph->isConnected($startNode52, $startNode60);
    $isConnected2763 = $graph->isConnected($startNode52, $startNode61);
    $isConnected2764 = $graph->isConnected($startNode52, $startNode62);
    $isConnected2765 = $graph->isConnected($startNode52, $startNode63);
    $isConnected2766 = $graph->isConnected($startNode52, $startNode64);
    $isConnected2767 = $graph->isConnected($startNode52, $startNode65);
    $isConnected2768 = $graph->isConnected($startNode52, $startNode66);
    $isConnected2769 = $graph->isConnected($startNode52, $startNode67);
    $isConnected2770 = $graph->isConnected($startNode52, $startNode68);
    $isConnected2771 = $graph->isConnected($startNode52, $startNode69);
    $isConnected2772 = $graph->isConnected($startNode52, $startNode70);
    $isConnected2773 = $graph->isConnected($startNode52, $startNode71);
    $isConnected2774 = $graph->isConnected($startNode52, $startNode72);
    $isConnected2775 = $graph->isConnected($startNode52, $startNode73);
    $isConnected2776 = $graph->isConnected($startNode52, $startNode74);
    $isConnected2777 = $graph->isConnected($startNode52, $startNode75);
    $isConnected2778 = $graph->isConnected($startNode52, $startNode76);
    $isConnected2779 = $graph->isConnected($startNode52, $startNode77);
    $isConnected2780 = $graph->isConnected($startNode52, $startNode78);
    $isConnected2781 = $graph->isConnected($startNode52, $startNode79);
    $isConnected2782 = $graph->isConnected($startNode52, $startNode80);

    $isConnected2783 = $graph->isConnected($startNode53, $startNode54);
    $isConnected2784 = $graph->isConnected($startNode53, $startNode55);
    $isConnected2785 = $graph->isConnected($startNode53, $startNode56);
    $isConnected2786 = $graph->isConnected($startNode53, $startNode57);
    $isConnected2787 = $graph->isConnected($startNode53, $startNode58);
    $isConnected2788 = $graph->isConnected($startNode53, $startNode59);
    $isConnected2789 = $graph->isConnected($startNode53, $startNode60);
    $isConnected2790 = $graph->isConnected($startNode53, $startNode61);
    $isConnected2791 = $graph->isConnected($startNode53, $startNode62);
    $isConnected2792 = $graph->isConnected($startNode53, $startNode63);
    $isConnected2793 = $graph->isConnected($startNode53, $startNode64);
    $isConnected2794 = $graph->isConnected($startNode53, $startNode65);
    $isConnected2795 = $graph->isConnected($startNode53, $startNode66);
    $isConnected2796 = $graph->isConnected($startNode53, $startNode67);
    $isConnected2797 = $graph->isConnected($startNode53, $startNode68);
    $isConnected2798 = $graph->isConnected($startNode53, $startNode69);
    $isConnected2799 = $graph->isConnected($startNode53, $startNode70);
    $isConnected2800 = $graph->isConnected($startNode53, $startNode71);
    $isConnected2801 = $graph->isConnected($startNode53, $startNode72);
    $isConnected2802 = $graph->isConnected($startNode53, $startNode73);
    $isConnected2803 = $graph->isConnected($startNode53, $startNode74);
    $isConnected2804 = $graph->isConnected($startNode53, $startNode75);
    $isConnected2805 = $graph->isConnected($startNode53, $startNode76);
    $isConnected2806 = $graph->isConnected($startNode53, $startNode77);
    $isConnected2807 = $graph->isConnected($startNode53, $startNode78);
    $isConnected2808 = $graph->isConnected($startNode53, $startNode79);
    $isConnected2809 = $graph->isConnected($startNode53, $startNode80);

    $isConnected2810 = $graph->isConnected($startNode54, $startNode55);
    $isConnected2811 = $graph->isConnected($startNode54, $startNode56);
    $isConnected2812 = $graph->isConnected($startNode54, $startNode57);
    $isConnected2813 = $graph->isConnected($startNode54, $startNode58);
    $isConnected2814 = $graph->isConnected($startNode54, $startNode59);
    $isConnected2815 = $graph->isConnected($startNode54, $startNode60);
    $isConnected2816 = $graph->isConnected($startNode54, $startNode61);
    $isConnected2817 = $graph->isConnected($startNode54, $startNode62);
    $isConnected2818 = $graph->isConnected($startNode54, $startNode63);
    $isConnected2819 = $graph->isConnected($startNode54, $startNode64);
    $isConnected2820 = $graph->isConnected($startNode54, $startNode65);
    $isConnected2821 = $graph->isConnected($startNode54, $startNode66);
    $isConnected2822 = $graph->isConnected($startNode54, $startNode67);
    $isConnected2823 = $graph->isConnected($startNode54, $startNode68);
    $isConnected2824 = $graph->isConnected($startNode54, $startNode69);
    $isConnected2825 = $graph->isConnected($startNode54, $startNode70);
    $isConnected2826 = $graph->isConnected($startNode54, $startNode71);
    $isConnected2827 = $graph->isConnected($startNode54, $startNode72);
    $isConnected2828 = $graph->isConnected($startNode54, $startNode73);
    $isConnected2829 = $graph->isConnected($startNode54, $startNode74);
    $isConnected2830 = $graph->isConnected($startNode54, $startNode75);
    $isConnected2831 = $graph->isConnected($startNode54, $startNode76);
    $isConnected2832 = $graph->isConnected($startNode54, $startNode77);
    $isConnected2833 = $graph->isConnected($startNode54, $startNode78);
    $isConnected2834 = $graph->isConnected($startNode54, $startNode79);
    $isConnected2835 = $graph->isConnected($startNode54, $startNode80);

    $isConnected2836 = $graph->isConnected($startNode55, $startNode56);
    $isConnected2837 = $graph->isConnected($startNode55, $startNode57);
    $isConnected2838 = $graph->isConnected($startNode55, $startNode58);
    $isConnected2839 = $graph->isConnected($startNode55, $startNode59);
    $isConnected2840 = $graph->isConnected($startNode55, $startNode60);
    $isConnected2841 = $graph->isConnected($startNode55, $startNode61);
    $isConnected2842 = $graph->isConnected($startNode55, $startNode62);
    $isConnected2843 = $graph->isConnected($startNode55, $startNode63);
    $isConnected2844 = $graph->isConnected($startNode55, $startNode64);
    $isConnected2845 = $graph->isConnected($startNode55, $startNode65);
    $isConnected2846 = $graph->isConnected($startNode55, $startNode66);
    $isConnected2847 = $graph->isConnected($startNode55, $startNode67);
    $isConnected2848 = $graph->isConnected($startNode55, $startNode68);
    $isConnected2849 = $graph->isConnected($startNode55, $startNode69);
    $isConnected2850 = $graph->isConnected($startNode55, $startNode70);
    $isConnected2851 = $graph->isConnected($startNode55, $startNode71);
    $isConnected2852 = $graph->isConnected($startNode55, $startNode72);
    $isConnected2853 = $graph->isConnected($startNode55, $startNode73);
    $isConnected2854 = $graph->isConnected($startNode55, $startNode74);
    $isConnected2855 = $graph->isConnected($startNode55, $startNode75);
    $isConnected2856 = $graph->isConnected($startNode55, $startNode76);
    $isConnected2857 = $graph->isConnected($startNode55, $startNode77);
    $isConnected2858 = $graph->isConnected($startNode55, $startNode78);
    $isConnected2859 = $graph->isConnected($startNode55, $startNode79);
    $isConnected2860 = $graph->isConnected($startNode55, $startNode80);

    $isConnected2861 = $graph->isConnected($startNode56, $startNode57);
    $isConnected2862 = $graph->isConnected($startNode56, $startNode58);
    $isConnected2863 = $graph->isConnected($startNode56, $startNode59);
    $isConnected2864 = $graph->isConnected($startNode56, $startNode60);
    $isConnected2865 = $graph->isConnected($startNode56, $startNode61);
    $isConnected2866 = $graph->isConnected($startNode56, $startNode62);
    $isConnected2867 = $graph->isConnected($startNode56, $startNode63);
    $isConnected2868 = $graph->isConnected($startNode56, $startNode64);
    $isConnected2869 = $graph->isConnected($startNode56, $startNode65);
    $isConnected2870 = $graph->isConnected($startNode56, $startNode66);
    $isConnected2871 = $graph->isConnected($startNode56, $startNode67);
    $isConnected2872 = $graph->isConnected($startNode56, $startNode68);
    $isConnected2873 = $graph->isConnected($startNode56, $startNode69);
    $isConnected2874 = $graph->isConnected($startNode56, $startNode70);
    $isConnected2875 = $graph->isConnected($startNode56, $startNode71);
    $isConnected2876 = $graph->isConnected($startNode56, $startNode72);
    $isConnected2877 = $graph->isConnected($startNode56, $startNode73);
    $isConnected2878 = $graph->isConnected($startNode56, $startNode74);
    $isConnected2879 = $graph->isConnected($startNode56, $startNode75);
    $isConnected2880 = $graph->isConnected($startNode56, $startNode76);
    $isConnected2881 = $graph->isConnected($startNode56, $startNode77);
    $isConnected2882 = $graph->isConnected($startNode56, $startNode78);
    $isConnected2883 = $graph->isConnected($startNode56, $startNode79);
    $isConnected2884 = $graph->isConnected($startNode56, $startNode80);

    $isConnected2885 = $graph->isConnected($startNode57, $startNode58);
    $isConnected2886 = $graph->isConnected($startNode57, $startNode59);
    $isConnected2887 = $graph->isConnected($startNode57, $startNode60);
    $isConnected2888 = $graph->isConnected($startNode57, $startNode61);
    $isConnected2889 = $graph->isConnected($startNode57, $startNode62);
    $isConnected2890 = $graph->isConnected($startNode57, $startNode63);
    $isConnected2891 = $graph->isConnected($startNode57, $startNode64);
    $isConnected2892 = $graph->isConnected($startNode57, $startNode65);
    $isConnected2893 = $graph->isConnected($startNode57, $startNode66);
    $isConnected2894 = $graph->isConnected($startNode57, $startNode67);
    $isConnected2895 = $graph->isConnected($startNode57, $startNode68);
    $isConnected2896 = $graph->isConnected($startNode57, $startNode69);
    $isConnected2897 = $graph->isConnected($startNode57, $startNode70);
    $isConnected2898 = $graph->isConnected($startNode57, $startNode71);
    $isConnected2899 = $graph->isConnected($startNode57, $startNode72);
    $isConnected2900 = $graph->isConnected($startNode57, $startNode73);
    $isConnected2901 = $graph->isConnected($startNode57, $startNode74);
    $isConnected2902 = $graph->isConnected($startNode57, $startNode75);
    $isConnected2903 = $graph->isConnected($startNode57, $startNode76);
    $isConnected2904 = $graph->isConnected($startNode57, $startNode77);
    $isConnected2905 = $graph->isConnected($startNode57, $startNode78);
    $isConnected2906 = $graph->isConnected($startNode57, $startNode79);
    $isConnected2907 = $graph->isConnected($startNode57, $startNode80);

    $isConnected2908 = $graph->isConnected($startNode58, $startNode59);
    $isConnected2909 = $graph->isConnected($startNode58, $startNode60);
    $isConnected2910 = $graph->isConnected($startNode58, $startNode61);
    $isConnected2911 = $graph->isConnected($startNode58, $startNode62);
    $isConnected2912 = $graph->isConnected($startNode58, $startNode63);
    $isConnected2913 = $graph->isConnected($startNode58, $startNode64);
    $isConnected2914 = $graph->isConnected($startNode58, $startNode65);
    $isConnected2915 = $graph->isConnected($startNode58, $startNode66);
    $isConnected2916 = $graph->isConnected($startNode58, $startNode67);
    $isConnected2917 = $graph->isConnected($startNode58, $startNode68);
    $isConnected2918 = $graph->isConnected($startNode58, $startNode69);
    $isConnected2919 = $graph->isConnected($startNode58, $startNode70);
    $isConnected2920 = $graph->isConnected($startNode58, $startNode71);
    $isConnected2921 = $graph->isConnected($startNode58, $startNode72);
    $isConnected2922 = $graph->isConnected($startNode58, $startNode73);
    $isConnected2923 = $graph->isConnected($startNode58, $startNode74);
    $isConnected2924 = $graph->isConnected($startNode58, $startNode75);
    $isConnected2925 = $graph->isConnected($startNode58, $startNode76);
    $isConnected2926 = $graph->isConnected($startNode58, $startNode77);
    $isConnected2927 = $graph->isConnected($startNode58, $startNode78);
    $isConnected2928 = $graph->isConnected($startNode58, $startNode79);
    $isConnected2929 = $graph->isConnected($startNode58, $startNode80);

    $isConnected2930 = $graph->isConnected($startNode59, $startNode60);
    $isConnected2931 = $graph->isConnected($startNode59, $startNode61);
    $isConnected2932 = $graph->isConnected($startNode59, $startNode62);
    $isConnected2933 = $graph->isConnected($startNode59, $startNode63);
    $isConnected2934 = $graph->isConnected($startNode59, $startNode64);
    $isConnected2935 = $graph->isConnected($startNode59, $startNode65);
    $isConnected2936 = $graph->isConnected($startNode59, $startNode66);
    $isConnected2937 = $graph->isConnected($startNode59, $startNode67);
    $isConnected2938 = $graph->isConnected($startNode59, $startNode68);
    $isConnected2939 = $graph->isConnected($startNode59, $startNode69);
    $isConnected2940 = $graph->isConnected($startNode59, $startNode70);
    $isConnected2941 = $graph->isConnected($startNode59, $startNode71);
    $isConnected2942 = $graph->isConnected($startNode59, $startNode72);
    $isConnected2943 = $graph->isConnected($startNode59, $startNode73);
    $isConnected2944 = $graph->isConnected($startNode59, $startNode74);
    $isConnected2945 = $graph->isConnected($startNode59, $startNode75);
    $isConnected2946 = $graph->isConnected($startNode59, $startNode76);
    $isConnected2947 = $graph->isConnected($startNode59, $startNode77);
    $isConnected2948 = $graph->isConnected($startNode59, $startNode78);
    $isConnected2949 = $graph->isConnected($startNode59, $startNode79);
    $isConnected2950 = $graph->isConnected($startNode59, $startNode80);

    $isConnected2951 = $graph->isConnected($startNode60, $startNode61);
    $isConnected2952 = $graph->isConnected($startNode60, $startNode62);
    $isConnected2953 = $graph->isConnected($startNode60, $startNode63);
    $isConnected2954 = $graph->isConnected($startNode60, $startNode64);
    $isConnected2955 = $graph->isConnected($startNode60, $startNode65);
    $isConnected2956 = $graph->isConnected($startNode60, $startNode66);
    $isConnected2957 = $graph->isConnected($startNode60, $startNode67);
    $isConnected2958 = $graph->isConnected($startNode60, $startNode68);
    $isConnected2959 = $graph->isConnected($startNode60, $startNode69);
    $isConnected2960 = $graph->isConnected($startNode60, $startNode70);
    $isConnected2961 = $graph->isConnected($startNode60, $startNode71);
    $isConnected2962 = $graph->isConnected($startNode60, $startNode72);
    $isConnected2963 = $graph->isConnected($startNode60, $startNode73);
    $isConnected2964 = $graph->isConnected($startNode60, $startNode74);
    $isConnected2965 = $graph->isConnected($startNode60, $startNode75);
    $isConnected2966 = $graph->isConnected($startNode60, $startNode76);
    $isConnected2967 = $graph->isConnected($startNode60, $startNode77);
    $isConnected2968 = $graph->isConnected($startNode60, $startNode78);
    $isConnected2969 = $graph->isConnected($startNode60, $startNode79);
    $isConnected2970 = $graph->isConnected($startNode60, $startNode80);
    
    $isConnected2971 = $graph->isConnected($startNode61, $startNode62);
    $isConnected2972 = $graph->isConnected($startNode61, $startNode63);
    $isConnected2973 = $graph->isConnected($startNode61, $startNode64);
    $isConnected2974 = $graph->isConnected($startNode61, $startNode65);
    $isConnected2975 = $graph->isConnected($startNode61, $startNode66);
    $isConnected2976 = $graph->isConnected($startNode61, $startNode67);
    $isConnected2977 = $graph->isConnected($startNode61, $startNode68);
    $isConnected2978 = $graph->isConnected($startNode61, $startNode69);
    $isConnected2979 = $graph->isConnected($startNode61, $startNode70);
    $isConnected2980 = $graph->isConnected($startNode61, $startNode71);
    $isConnected2981 = $graph->isConnected($startNode61, $startNode72);
    $isConnected2982 = $graph->isConnected($startNode61, $startNode73);
    $isConnected2983 = $graph->isConnected($startNode61, $startNode74);
    $isConnected2984 = $graph->isConnected($startNode61, $startNode75);
    $isConnected2985 = $graph->isConnected($startNode61, $startNode76);
    $isConnected2986 = $graph->isConnected($startNode61, $startNode77);
    $isConnected2987 = $graph->isConnected($startNode61, $startNode78);
    $isConnected2988 = $graph->isConnected($startNode61, $startNode79);
    $isConnected2989 = $graph->isConnected($startNode61, $startNode80);

    $isConnected2990 = $graph->isConnected($startNode62, $startNode63);
    $isConnected2991 = $graph->isConnected($startNode62, $startNode64);
    $isConnected2992 = $graph->isConnected($startNode62, $startNode65);
    $isConnected2993 = $graph->isConnected($startNode62, $startNode66);
    $isConnected2994 = $graph->isConnected($startNode62, $startNode67);
    $isConnected2995 = $graph->isConnected($startNode62, $startNode68);
    $isConnected2996 = $graph->isConnected($startNode62, $startNode69);
    $isConnected2997 = $graph->isConnected($startNode62, $startNode70);
    $isConnected2998 = $graph->isConnected($startNode62, $startNode71);
    $isConnected2999 = $graph->isConnected($startNode62, $startNode72);
    $isConnected3000 = $graph->isConnected($startNode62, $startNode73);
    $isConnected3001 = $graph->isConnected($startNode62, $startNode74);
    $isConnected3002 = $graph->isConnected($startNode62, $startNode75);
    $isConnected3003 = $graph->isConnected($startNode62, $startNode76);
    $isConnected3004 = $graph->isConnected($startNode62, $startNode77);
    $isConnected3005 = $graph->isConnected($startNode62, $startNode78);
    $isConnected3006 = $graph->isConnected($startNode62, $startNode79);
    $isConnected3007 = $graph->isConnected($startNode62, $startNode80);

    $isConnected3008 = $graph->isConnected($startNode63, $startNode64);
    $isConnected3009 = $graph->isConnected($startNode63, $startNode65);
    $isConnected3010 = $graph->isConnected($startNode63, $startNode66);
    $isConnected3011 = $graph->isConnected($startNode63, $startNode67);
    $isConnected3012 = $graph->isConnected($startNode63, $startNode68);
    $isConnected3013 = $graph->isConnected($startNode63, $startNode69);
    $isConnected3014 = $graph->isConnected($startNode63, $startNode70);
    $isConnected3015 = $graph->isConnected($startNode63, $startNode71);
    $isConnected3016 = $graph->isConnected($startNode63, $startNode72);
    $isConnected3017 = $graph->isConnected($startNode63, $startNode73);
    $isConnected3018 = $graph->isConnected($startNode63, $startNode74);
    $isConnected3019 = $graph->isConnected($startNode63, $startNode75);
    $isConnected3020 = $graph->isConnected($startNode63, $startNode76);
    $isConnected3021 = $graph->isConnected($startNode63, $startNode77);
    $isConnected3022 = $graph->isConnected($startNode63, $startNode78);
    $isConnected3023 = $graph->isConnected($startNode63, $startNode79);
    $isConnected3024 = $graph->isConnected($startNode63, $startNode80);

    $isConnected3025 = $graph->isConnected($startNode64, $startNode65);
    $isConnected3026 = $graph->isConnected($startNode64, $startNode66);
    $isConnected3027 = $graph->isConnected($startNode64, $startNode67);
    $isConnected3028 = $graph->isConnected($startNode64, $startNode68);
    $isConnected3029 = $graph->isConnected($startNode64, $startNode69);
    $isConnected3030 = $graph->isConnected($startNode64, $startNode70);
    $isConnected3031 = $graph->isConnected($startNode64, $startNode71);
    $isConnected3032 = $graph->isConnected($startNode64, $startNode72);
    $isConnected3033 = $graph->isConnected($startNode64, $startNode73);
    $isConnected3034 = $graph->isConnected($startNode64, $startNode74);
    $isConnected3035 = $graph->isConnected($startNode64, $startNode75);
    $isConnected3036 = $graph->isConnected($startNode64, $startNode76);
    $isConnected3037 = $graph->isConnected($startNode64, $startNode77);
    $isConnected3038 = $graph->isConnected($startNode64, $startNode78);
    $isConnected3039 = $graph->isConnected($startNode64, $startNode79);
    $isConnected3040 = $graph->isConnected($startNode64, $startNode80);

    $isConnected3041 = $graph->isConnected($startNode65, $startNode66);
    $isConnected3042 = $graph->isConnected($startNode65, $startNode67);
    $isConnected3043 = $graph->isConnected($startNode65, $startNode68);
    $isConnected3044 = $graph->isConnected($startNode65, $startNode69);
    $isConnected3045 = $graph->isConnected($startNode65, $startNode70);
    $isConnected3046 = $graph->isConnected($startNode65, $startNode71);
    $isConnected3047 = $graph->isConnected($startNode65, $startNode72);
    $isConnected3048 = $graph->isConnected($startNode65, $startNode73);
    $isConnected3049 = $graph->isConnected($startNode65, $startNode74);
    $isConnected3050 = $graph->isConnected($startNode65, $startNode75);
    $isConnected3051 = $graph->isConnected($startNode65, $startNode76);
    $isConnected3052 = $graph->isConnected($startNode65, $startNode77);
    $isConnected3053 = $graph->isConnected($startNode65, $startNode78);
    $isConnected3054 = $graph->isConnected($startNode65, $startNode79);
    $isConnected3055 = $graph->isConnected($startNode65, $startNode80);

    $isConnected3056 = $graph->isConnected($startNode65, $startNode67);
    $isConnected3057 = $graph->isConnected($startNode66, $startNode68);
    $isConnected3058 = $graph->isConnected($startNode66, $startNode69);
    $isConnected3059 = $graph->isConnected($startNode66, $startNode70);
    $isConnected3060 = $graph->isConnected($startNode66, $startNode71);
    $isConnected3061 = $graph->isConnected($startNode66, $startNode72);
    $isConnected3062 = $graph->isConnected($startNode66, $startNode73);
    $isConnected3063 = $graph->isConnected($startNode66, $startNode74);
    $isConnected3064 = $graph->isConnected($startNode66, $startNode75);
    $isConnected3065 = $graph->isConnected($startNode66, $startNode76);
    $isConnected3066 = $graph->isConnected($startNode66, $startNode77);
    $isConnected3067 = $graph->isConnected($startNode66, $startNode78);
    $isConnected3068 = $graph->isConnected($startNode66, $startNode79);
    $isConnected3069 = $graph->isConnected($startNode66, $startNode80);

    $isConnected3070 = $graph->isConnected($startNode67, $startNode68);
    $isConnected3071 = $graph->isConnected($startNode67, $startNode69);
    $isConnected3072 = $graph->isConnected($startNode67, $startNode70);
    $isConnected3073 = $graph->isConnected($startNode67, $startNode71);
    $isConnected3074 = $graph->isConnected($startNode67, $startNode72);
    $isConnected3075 = $graph->isConnected($startNode67, $startNode73);
    $isConnected3076 = $graph->isConnected($startNode67, $startNode74);
    $isConnected3077 = $graph->isConnected($startNode67, $startNode75);
    $isConnected3078 = $graph->isConnected($startNode67, $startNode76);
    $isConnected3079 = $graph->isConnected($startNode67, $startNode77);
    $isConnected3080 = $graph->isConnected($startNode67, $startNode78);
    $isConnected3081 = $graph->isConnected($startNode67, $startNode79);
    $isConnected3082 = $graph->isConnected($startNode67, $startNode80);

    $isConnected3083 = $graph->isConnected($startNode68, $startNode69);
    $isConnected3084 = $graph->isConnected($startNode68, $startNode70);
    $isConnected3085 = $graph->isConnected($startNode68, $startNode71);
    $isConnected3086 = $graph->isConnected($startNode68, $startNode72);
    $isConnected3087 = $graph->isConnected($startNode68, $startNode73);
    $isConnected3088 = $graph->isConnected($startNode68, $startNode74);
    $isConnected3089 = $graph->isConnected($startNode68, $startNode75);
    $isConnected3090 = $graph->isConnected($startNode68, $startNode76);
    $isConnected3091 = $graph->isConnected($startNode68, $startNode77);
    $isConnected3092 = $graph->isConnected($startNode68, $startNode78);
    $isConnected3093 = $graph->isConnected($startNode68, $startNode79);
    $isConnected3094 = $graph->isConnected($startNode68, $startNode80);

    $isConnected3095 = $graph->isConnected($startNode69, $startNode70);
    $isConnected3096 = $graph->isConnected($startNode69, $startNode71);
    $isConnected3097 = $graph->isConnected($startNode69, $startNode72);
    $isConnected3098 = $graph->isConnected($startNode69, $startNode73);
    $isConnected3099 = $graph->isConnected($startNode69, $startNode74);
    $isConnected3100 = $graph->isConnected($startNode69, $startNode75);
    $isConnected3101 = $graph->isConnected($startNode69, $startNode76);
    $isConnected3102 = $graph->isConnected($startNode69, $startNode77);
    $isConnected3103 = $graph->isConnected($startNode69, $startNode78);
    $isConnected3104 = $graph->isConnected($startNode69, $startNode79);
    $isConnected3105 = $graph->isConnected($startNode69, $startNode80);

    $isConnected3106 = $graph->isConnected($startNode70, $startNode71);
    $isConnected3107 = $graph->isConnected($startNode70, $startNode72);
    $isConnected3108 = $graph->isConnected($startNode70, $startNode73);
    $isConnected3109 = $graph->isConnected($startNode70, $startNode74);
    $isConnected3100 = $graph->isConnected($startNode70, $startNode75);
    $isConnected3111 = $graph->isConnected($startNode70, $startNode76);
    $isConnected3112 = $graph->isConnected($startNode70, $startNode77);
    $isConnected3113 = $graph->isConnected($startNode70, $startNode78);
    $isConnected3114 = $graph->isConnected($startNode70, $startNode79);
    $isConnected3115 = $graph->isConnected($startNode70, $startNode80);

    $isConnected3116 = $graph->isConnected($startNode71, $startNode72);
    $isConnected3117 = $graph->isConnected($startNode71, $startNode73);
    $isConnected3118 = $graph->isConnected($startNode71, $startNode74);
    $isConnected3119 = $graph->isConnected($startNode71, $startNode75);
    $isConnected3120 = $graph->isConnected($startNode71, $startNode76);
    $isConnected3121 = $graph->isConnected($startNode71, $startNode77);
    $isConnected3122 = $graph->isConnected($startNode71, $startNode78);
    $isConnected3123 = $graph->isConnected($startNode71, $startNode79);
    $isConnected3124 = $graph->isConnected($startNode71, $startNode80);

    $isConnected3125 = $graph->isConnected($startNode72, $startNode73);
    $isConnected3126 = $graph->isConnected($startNode72, $startNode74);
    $isConnected3127 = $graph->isConnected($startNode72, $startNode75);
    $isConnected3128 = $graph->isConnected($startNode72, $startNode76);
    $isConnected3129 = $graph->isConnected($startNode72, $startNode77);
    $isConnected3130 = $graph->isConnected($startNode72, $startNode78);
    $isConnected3131 = $graph->isConnected($startNode72, $startNode79);
    $isConnected3132 = $graph->isConnected($startNode72, $startNode80);

    $isConnected3133 = $graph->isConnected($startNode73, $startNode74);
    $isConnected3134 = $graph->isConnected($startNode73, $startNode75);
    $isConnected3135 = $graph->isConnected($startNode73, $startNode76);
    $isConnected3136 = $graph->isConnected($startNode73, $startNode77);
    $isConnected3137 = $graph->isConnected($startNode73, $startNode78);
    $isConnected3138 = $graph->isConnected($startNode73, $startNode79);
    $isConnected3139 = $graph->isConnected($startNode73, $startNode80);

    $isConnected3140 = $graph->isConnected($startNode74, $startNode75);
    $isConnected3141 = $graph->isConnected($startNode74, $startNode76);
    $isConnected3142 = $graph->isConnected($startNode74, $startNode77);
    $isConnected3143 = $graph->isConnected($startNode74, $startNode78);
    $isConnected3144 = $graph->isConnected($startNode74, $startNode79);
    $isConnected3145 = $graph->isConnected($startNode74, $startNode80);

    $isConnected3146 = $graph->isConnected($startNode75, $startNode76);
    $isConnected3147 = $graph->isConnected($startNode75, $startNode77);
    $isConnected3148 = $graph->isConnected($startNode75, $startNode78);
    $isConnected3149 = $graph->isConnected($startNode75, $startNode79);
    $isConnected3150 = $graph->isConnected($startNode75, $startNode80);

    $isConnected3151 = $graph->isConnected($startNode76, $startNode77);
    $isConnected3152 = $graph->isConnected($startNode76, $startNode78);
    $isConnected3153 = $graph->isConnected($startNode76, $startNode79);
    $isConnected3154 = $graph->isConnected($startNode76, $startNode80);

    $isConnected3155 = $graph->isConnected($startNode77, $startNode78);
    $isConnected3156 = $graph->isConnected($startNode77, $startNode79);
    $isConnected3157 = $graph->isConnected($startNode77, $startNode80);

    $isConnected3158 = $graph->isConnected($startNode78, $startNode79);
    $isConnected3159 = $graph->isConnected($startNode78, $startNode80);

    $isConnected3160 = $graph->isConnected($startNode79, $startNode80);

    // Membuat pesan yang sesuai berdasarkan hasil ketersambungan
    if ($isConnected1 && $isConnected2 && $isConnected3) {
        $message = "Semua simpul awal terhubung!";
    } else {
        $message = "Tidak semua simpul awal terhubung!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>DFS Web App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        label {
            font-weight: bold;
        }
        select {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>DFS Web App</h2>
    
    <!--Semester 1-->
    <form method="POST" action="">
        <label for="startNode1">Semseter 1:</label><br>
        <select id="startNode1" name="startNode1">
            <option>Pilih Matkul</option>
            <option value="1">Agama</option>
            <option value="2">Konsep Pemrograman </option>
            <option value="3">Sistem Digital </option>
            <option value="4">Kalkulus I</option>
            <option value="5">Fisika </option>
            <option value="6">Bahasa Inggris</option>
            <option value="7">Statistika & Probabilitas</option>
            <option value="8">Bahasa Indonesia </option>
        </select><br>

        <label for="startNode2">Semseter 1:</label><br>
        <select id="startNode2" name="startNode2">
            <option>Pilih Matkul</option>
            <option value="1">Agama</option>
            <option value="2">Konsep Pemrograman </option>
            <option value="3">Sistem Digital </option>
            <option value="4">Kalkulus I</option>
            <option value="5">Fisika </option>
            <option value="6">Bahasa Inggris</option>
            <option value="7">Statistika & Probabilitas</option>
            <option value="8">Bahasa Indonesia </option>
        </select><br>

        <label for="startNode3">Semseter 1:</label><br>
        <select id="startNode3" name="startNode3">
            <option>Pilih Matkul</option>
            <option value="1">Agama</option>
            <option value="2">Konsep Pemrograman </option>
            <option value="3">Sistem Digital </option>
            <option value="4">Kalkulus I</option>
            <option value="5">Fisika </option>
            <option value="6">Bahasa Inggris</option>
            <option value="7">Statistika & Probabilitas</option>
            <option value="8">Bahasa Indonesia </option>
        </select><br>

        <label for="startNode4">Semseter 1:</label><br>
        <select id="startNode4" name="startNode4">
            <option>Pilih Matkul</option>    
            <option value="1">Agama</option>
            <option value="2">Konsep Pemrograman </option>
            <option value="3">Sistem Digital </option>
            <option value="4">Kalkulus I</option>
            <option value="5">Fisika </option>
            <option value="6">Bahasa Inggris</option>
            <option value="7">Statistika & Probabilitas</option>
            <option value="8">Bahasa Indonesia </option>
        </select><br>

        <label for="startNode5">Semseter 1:</label><br>
        <select id="startNode5" name="startNode5">
            <option>Pilih Matkul</option>
            <option value="1">Agama</option>
            <option value="2">Konsep Pemrograman </option>
            <option value="3">Sistem Digital </option>
            <option value="4">Kalkulus I</option>
            <option value="5">Fisika </option>
            <option value="6">Bahasa Inggris</option>
            <option value="7">Statistika & Probabilitas</option>
            <option value="8">Bahasa Indonesia </option>
        </select><br>

        <label for="startNode6">Semseter 1:</label><br>
        <select id="startNode6" name="startNode6">
            <option>Pilih Matkul</option>
            <option value="1">Agama</option>
            <option value="2">Konsep Pemrograman </option>
            <option value="3">Sistem Digital </option>
            <option value="4">Kalkulus I</option>
            <option value="5">Fisika </option>
            <option value="6">Bahasa Inggris</option>
            <option value="7">Statistika & Probabilitas</option>
            <option value="8">Bahasa Indonesia </option>
        </select><br>

        <label for="startNode7">Semseter 1:</label><br>
        <select id="startNode7" name="startNode7">
            <option>Pilih Matkul</option>
            <option value="1">Agama</option>
            <option value="2">Konsep Pemrograman </option>
            <option value="3">Sistem Digital </option>
            <option value="4">Kalkulus I</option>
            <option value="5">Fisika </option>
            <option value="6">Bahasa Inggris</option>
            <option value="7">Statistika & Probabilitas</option>
            <option value="8">Bahasa Indonesia </option>
        </select><br>

        <label for="startNode8">Semseter 1:</label><br>
        <select id="startNode8" name="startNode8">
            <option>Pilih Matkul</option>
            <option value="1">Agama</option>
            <option value="2">Konsep Pemrograman </option>
            <option value="3">Sistem Digital </option>
            <option value="4">Kalkulus I</option>
            <option value="5">Fisika </option>
            <option value="6">Bahasa Inggris</option>
            <option value="7">Statistika & Probabilitas</option>
            <option value="8">Bahasa Indonesia </option>
        
    <!--Semester 2-->
        <label for="startNode9">Semseter 2:</label><br>
        <select id="startNode9" name="startNode9">
            <option>Pilih Matkul</option>
            <option value="9">Kalkulus II</option>
            <option value="10">Metematika Diskrit I</option>
            <option value="11">Aljabar Linier</option>
            <option value="12">Struktur Data & Algoritma</option>
            <option value="13">Organisasi Sistem Komputer</option>
            <option value="14">Pendidikan Kewarganegaraan</option>
            <option value="15">Bahasa Inggris II</option>
        </select><br>

        <label for="startNode10">Semseter 2:</label><br>
        <select id="startNode10" name="startNode10">
            <option>Pilih Matkul</option>
            <option value="9">Kalkulus II</option>
            <option value="10">Metematika Diskrit I</option>
            <option value="11">Aljabar Linier</option>
            <option value="12">Struktur Data & Algoritma</option>
            <option value="13">Organisasi Sistem Komputer</option>
            <option value="14">Pendidikan Kewarganegaraan</option>
            <option value="15">Bahasa Inggris II</option>
        </select><br>

        <label for="startNode11">Semseter 2:</label><br>
        <select id="startNode11" name="startNode">
            <option>Pilih Matkul</option>
            <option value="9">Kalkulus II</option>
            <option value="10">Metematika Diskrit I</option>
            <option value="11">Aljabar Linier</option>
            <option value="12">Struktur Data & Algoritma</option>
            <option value="13">Organisasi Sistem Komputer</option>
            <option value="14">Pendidikan Kewarganegaraan</option>
            <option value="15">Bahasa Inggris II</option>
        </select><br>

        <label for="startNode12">Semseter 2:</label><br>
        <select id="startNode12" name="startNode2">
            <option>Pilih Matkul</option>
            <option value="9">Kalkulus II</option>
            <option value="10">Metematika Diskrit I</option>
            <option value="11">Aljabar Linier</option>
            <option value="12">Struktur Data & Algoritma</option>
            <option value="13">Organisasi Sistem Komputer</option>
            <option value="14">Pendidikan Kewarganegaraan</option>
            <option value="15">Bahasa Inggris II</option>
        </select><br>

        <label for="startNode13">Semseter 2:</label><br>
        <select id="startNode13" name="startNode13">
            <option>Pilih Matkul</option>
            <option value="9">Kalkulus II</option>
            <option value="10">Metematika Diskrit I</option>
            <option value="11">Aljabar Linier</option>
            <option value="12">Struktur Data & Algoritma</option>
            <option value="13">Organisasi Sistem Komputer</option>
            <option value="14">Pendidikan Kewarganegaraan</option>
            <option value="15">Bahasa Inggris II</option>
        </select><br>

        <label for="startNode14">Semseter 2:</label><br>
        <select id="startNode14" name="startNode14">
            <option>Pilih Matkul</option>
            <option value="9">Kalkulus II</option>
            <option value="10">Metematika Diskrit I</option>
            <option value="11">Aljabar Linier</option>
            <option value="12">Struktur Data & Algoritma</option>
            <option value="13">Organisasi Sistem Komputer</option>
            <option value="14">Pendidikan Kewarganegaraan</option>
            <option value="15">Bahasa Inggris II</option>
        </select><br>

        <label for="startNode15">Semseter 2:</label><br>
        <select id="startNode15" name="startNode15">
            <option>Pilih Matkul</option>
            <option value="9">Kalkulus II</option>
            <option value="10">Metematika Diskrit I</option>
            <option value="11">Aljabar Linier</option>
            <option value="12">Struktur Data & Algoritma</option>
            <option value="13">Organisasi Sistem Komputer</option>
            <option value="14">Pendidikan Kewarganegaraan</option>
            <option value="15">Bahasa Inggris II</option>
        </select><br>

    <!--Semester 3-->
        <label for="startNode16">Semseter 3:</label><br>
        <select id="startNode16" name="startNode6">
            <option>Pilih Matkul</option>
            <option value="16">Matematika Diskrit II</option>
            <option value="17">Pemrograman Berorientasi Objek</option>
            <option value="18">Basis Data</option>
            <option value="19">Sistem Operasi</option>
            <option value="20">Kewarganegaraan</option>
            <option value="21">Metode Numerik </option>
            <option value="22">Desain & Analisis Algoritma</option>
        </select><br>

        <label for="startNode17">Semseter 3:</label><br>
        <select id="startNode17" name="startNode17">
            <option>Pilih Matkul</option>
            <option value="16">Matematika Diskrit II</option>
            <option value="17">Pemrograman Berorientasi Objek</option>
            <option value="18">Basis Data</option>
            <option value="19">Sistem Operasi</option>
            <option value="20">Kewarganegaraan</option>
            <option value="21">Metode Numerik </option>
            <option value="22">Desain & Analisis Algoritma</option>
        </select><br>

        <label for="startNode18">Semseter 3:</label><br>
        <select id="startNode18" name="startNode18">
            <option>Pilih Matkul</option>
            <option value="16">Matematika Diskrit II</option>
            <option value="17">Pemrograman Berorientasi Objek</option>
            <option value="18">Basis Data</option>
            <option value="19">Sistem Operasi</option>
            <option value="20">Kewarganegaraan</option>
            <option value="21">Metode Numerik </option>
            <option value="22">Desain & Analisis Algoritma</option>
        </select><br>

        <label for="startNode19">Semseter 3:</label><br>
        <select id="startNode19" name="startNode19">
            <option>Pilih Matkul</option>
            <option value="16">Matematika Diskrit II</option>
            <option value="17">Pemrograman Berorientasi Objek</option>
            <option value="18">Basis Data</option>
            <option value="19">Sistem Operasi</option>
            <option value="20">Kewarganegaraan</option>
            <option value="21">Metode Numerik </option>
            <option value="22">Desain & Analisis Algoritma</option>
        </select><br>

        <label for="startNod20">Semseter 3:</label><br>
        <select id="startNod20" name="startNode20">
            <option>Pilih Matkul</option>
            <option value="16">Matematika Diskrit II</option>
            <option value="17">Pemrograman Berorientasi Objek</option>
            <option value="18">Basis Data</option>
            <option value="19">Sistem Operasi</option>
            <option value="20">Kewarganegaraan</option>
            <option value="21">Metode Numerik </option>
            <option value="22">Desain & Analisis Algoritma</option>
        </select><br>

        <label for="startNode21">Semseter 3:</label><br>
        <select id="startNode21" name="startNode21">
            <option>Pilih Matkul</option>
            <option value="16">Matematika Diskrit II</option>
            <option value="17">Pemrograman Berorientasi Objek</option>
            <option value="18">Basis Data</option>
            <option value="19">Sistem Operasi</option>
            <option value="20">Kewarganegaraan</option>
            <option value="21">Metode Numerik </option>
            <option value="22">Desain & Analisis Algoritma</option>
        </select><br>

        <label for="startNode22">Semseter 3:</label><br>
        <select id="startNode22" name="startNode22">
            <option>Pilih Matkul</option>
            <option value="16">Matematika Diskrit II</option>
            <option value="17">Pemrograman Berorientasi Objek</option>
            <option value="18">Basis Data</option>
            <option value="19">Sistem Operasi</option>
            <option value="20">Kewarganegaraan</option>
            <option value="21">Metode Numerik </option>
            <option value="22">Desain & Analisis Algoritma</option>
        </select><br>

    <!--Semester 4-->
        <label for="startNode23">Semester 4:</label><br>
        <select id="startNode23" name="startNode23">
            <option>Pilih Matkul</option>
            <option value="23">Jaringan Komputer</option>
            <option value="24">Pemrograman Web</option>
            <option value="25">Kecerdasan Buatan</option>
            <option value="26">Rekayasa Perangkat Lunak</option>
            <option value="27">Pengembangan Aplikasi Bergerak</option>
            <option value="28">Teori Bahasa & Automata</option>
        </select><br>

        <label for="startNode24">Semester 4:</label><br>
        <select id="startNode24" name="startNode24">
            <option>Pilih Matkul</option>
            <option value="23">Jaringan Komputer</option>
            <option value="24">Pemrograman Web</option>
            <option value="25">Kecerdasan Buatan</option>
            <option value="26">Rekayasa Perangkat Lunak</option>
            <option value="27">Pengembangan Aplikasi Bergerak</option>
            <option value="28">Teori Bahasa & Automata</option>
        </select><br>

        <label for="startNode24">Semester 4:</label><br>
        <select id="startNode24" name="startNode24">
            <option>Pilih Matkul</option>
            <option value="23">Jaringan Komputer</option>
            <option value="24">Pemrograman Web</option>
            <option value="25">Kecerdasan Buatan</option>
            <option value="26">Rekayasa Perangkat Lunak</option>
            <option value="27">Pengembangan Aplikasi Bergerak</option>
            <option value="28">Teori Bahasa & Automata</option>
        </select><br>

        <label for="startNode25">Semester 4:</label><br>
        <select id="startNode25" name="startNode25">
            <option>Pilih Matkul</option>
            <option value="23">Jaringan Komputer</option>
            <option value="24">Pemrograman Web</option>
            <option value="25">Kecerdasan Buatan</option>
            <option value="26">Rekayasa Perangkat Lunak</option>
            <option value="27">Pengembangan Aplikasi Bergerak</option>
            <option value="28">Teori Bahasa & Automata</option>
        </select><br>

        <label for="startNode26">Semester 4:</label><br>
        <select id="startNode26" name="startNode26">
            <option>Pilih Matkul</option>
            <option value="23">Jaringan Komputer</option>
            <option value="24">Pemrograman Web</option>
            <option value="25">Kecerdasan Buatan</option>
            <option value="26">Rekayasa Perangkat Lunak</option>
            <option value="27">Pengembangan Aplikasi Bergerak</option>
            <option value="28">Teori Bahasa & Automata</option>
        </select><br>

        <label for="startNode27">Semester 4:</label><br>
        <select id="startNode27" name="startNode27">
            <option>Pilih Matkul</option>
            <option value="23">Jaringan Komputer</option>
            <option value="24">Pemrograman Web</option>
            <option value="25">Kecerdasan Buatan</option>
            <option value="26">Rekayasa Perangkat Lunak</option>
            <option value="27">Pengembangan Aplikasi Bergerak</option>
            <option value="28">Teori Bahasa & Automata</option>
        </select><br>

        <label for="startNode28">Semester 4:</label><br>
        <select id="startNode28" name="startNode28">
            <option>Pilih Matkul</option>
            <option value="23">Jaringan Komputer</option>
            <option value="24">Pemrograman Web</option>
            <option value="25">Kecerdasan Buatan</option>
            <option value="26">Rekayasa Perangkat Lunak</option>
            <option value="27">Pengembangan Aplikasi Bergerak</option>
            <option value="28">Teori Bahasa & Automata</option>
        </select><br>

    <!--Semester 5-->
        <label for="startNode29">Semester 5:</label><br>
        <select id="startNode29" name="startNode29">
            <option>Pilih Matkul</option>
            <option value="29">Data Mining</option>
            <option value="30">Interaksi Manusia & Komputer</option>
            <option value="31">Sistem Terdistribusi</option>
            <option value="32">Sistem Terdistribusi</option>
        </select><br>

        <label for="startNode30">Semester 5:</label><br>
        <select id="startNode30" name="startNode30">
            <option>Pilih Matkul</option>
            <option value="29">Data Mining</option>
            <option value="30">Interaksi Manusia & Komputer</option>
            <option value="31">Sistem Terdistribusi</option>
            <option value="32">Sistem Terdistribusi</option>
        </select><br>

        <label for="startNode31">Semester 5:</label><br>
        <select id="startNode31" name="startNode31">
            <option>Pilih Matkul</option>
            <option value="29">Data Mining</option>
            <option value="30">Interaksi Manusia & Komputer</option>
            <option value="31">Sistem Terdistribusi</option>
            <option value="32">Sistem Terdistribusi</option>
        </select><br>

        <label for="startNode32">Semester 5:</label><br>
        <select id="startNode32" name="startNode32">
            <option>Pilih Matkul</option>
            <option value="29">Data Mining</option>
            <option value="30">Interaksi Manusia & Komputer</option>
            <option value="31">Sistem Terdistribusi</option>
            <option value="32">Sistem Terdistribusi</option>
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

        <label for="startNode34">Wajib Minat Semester 5:</label><br>
        <select id="startNode34" name="startNode34">
            <option>Pilih Matkul</option>
            <option value="33">Machine Learning</option>
            <option value="34">Pengolahan Sinyal Digital</option>
            <option value="35">Manajemen Jaringan</option>
            <option value="36">Basis Data Lanjut</option>
        </select><br>

        <label for="startNode35">Wajib Minat Semester 5:</label><br>
        <select id="startNode35" name="startNode35">
            <option>Pilih Matkul</option>
            <option value="33">Machine Learning</option>
            <option value="34">Pengolahan Sinyal Digital</option>
            <option value="35">Manajemen Jaringan</option>
            <option value="36">Basis Data Lanjut</option>
        </select><br>

        <label for="startNode36">Wajib Minat 1:</label><br>
        <select id="startNode36" name="startNode36">
            <option>Pilih Matkul</option>
            <option value="33">Machine Learning</option>
            <option value="34">Pengolahan Sinyal Digital</option>
            <option value="35">Manajemen Jaringan</option>
            <option value="36">Basis Data Lanjut</option>
        </select><br>

    <!--Pilihan1 Semester 5-->
    <label for="startNode37">Pilihan 1:</label><br>
        <select id="startNode37" name="startNode37">
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

    <!--Pilihan2 Semester 5-->
        <label for="startNode38">Pilihan 2:</label><br>
        <select id="startNode38" name="startNode38">
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

        <input type="submit" value="DFS Traversal">
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

</body>
</html>
