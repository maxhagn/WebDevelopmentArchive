<?php
$alledateien = scandir('../../www'); //Ordner "files" auslesen

foreach ($alledateien as $datei) { // Ausgabeschleife
   echo $datei."<br />"; //Ausgabe Einzeldatei
};

?>
