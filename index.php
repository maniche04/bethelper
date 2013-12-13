<h1>Welcome</h1>
<?php
require_once('parser.php');
$html = new simple_html_dom();
$home = array();
$away = array();
$date = array();

$html->load_file('http://www.livescores.com/soccer/england/premier-league/');
foreach ($html->find('table.league-table tr') as $e) {
    foreach ($e->find('td.fd') as $d) {
        //echo $h->plaintext;
        $date[] = $d->plaintext;
    }
    foreach ($e->find('td.fh') as $h) {
        //echo $h->plaintext;
        $home[] = $h->plaintext;
    }
    foreach ($e->find('td.fa') as $a) {
        //echo $a->plaintext;
        $away[] = $a->plaintext;
    }
}

$count = count($home);

$i = 0;

Do {
    echo $date[$i] . " : " . $home[$i] . " vs " . $away[$i] . "<br>";
    $i +=1;
} while ($i < $count);
?>