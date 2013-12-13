<h1>Welcome</h1>
<?php
require_once('parser.php');
$html = new simple_html_dom();
$home = array();
$away = array();
$time = array();
$date = array();
$scoreh = array();
$scorea = array();

$html->load_file('http://www.livescores.com/soccer/england/premier-league/results/30-days/');
foreach ($html->find('table.league-table tr') as $e) {
    foreach ($e->find('th') as $th) {
        foreach ($th->find('span.date') as $date) {
            $newdate = $date;
        }
    }
    foreach ($e->find('td.fd') as $t) {
        $date[] = $newdate->plaintext;
        $time[] = $t->plaintext;
    }
    foreach ($e->find('td.fh') as $h) {
        $home[] = $h->plaintext;
    }
    foreach ($e->find('td.fs') as $s) {
        $score = $s->plaintext;
        $pos = strpos($score, '-');
        (int)$scoreh[] = substr($score, 0, ($pos-1));
        (int)$scorea[] = substr($score, ($pos+1));
    }
    foreach ($e->find('td.fa') as $a) {
        $away[] = $a->plaintext;
    }
}

$count = count($home);

$i = 0;

Do {
    echo $date[$i] . " : ". $time[$i] . " | " . $home[$i] . " " . $scoreh[$i] . " | " . $scorea[$i]. " ". $away[$i] . "<br>";
    $i +=1;
} while ($i < $count);;
?>