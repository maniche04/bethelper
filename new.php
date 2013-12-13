<h1>Welcome</h1>
<?php
require_once('parser.php');
$html = new simple_html_dom();
$home = array();
$away = array();
$time = array();
$date = array();

$html->load_file('http://www.livescores.com/soccer/england/premier-league/results/30-days/');
foreach ($html->find('table.league-table tr') as $e) {
    foreach ($e->find('th') as $th) {
        foreach ($th->find('span.date') as $date) {
            $newdate = $date->plaintext;
        }
    }
    foreach ($e->find('td.fd') as $t) {
        //echo $h->plaintext;
        echo $newdate . " : ";
        echo $t->plaintext . " | ";
    }
    foreach ($e->find('td.fh') as $h) {
        //echo $h->plaintext;
        echo $h->plaintext . " ";
    }
    
    foreach ($e->find('td.fs') as $s) {
        //echo $h->plaintext;
        echo $s->plaintext . " ";
    }
    foreach ($e->find('td.fa') as $a) {
        //echo $a->plaintext;
        echo $a->plaintext . "<br>";
    }
}

$count = count($home);

$i = 0;

//Do {
//    echo $date[$i] . " : ". $time[$i] . " | " . $home[$i] . " vs " . $away[$i] . "<br>";
//    $i +=1;
//} while ($i < $count);;
?>