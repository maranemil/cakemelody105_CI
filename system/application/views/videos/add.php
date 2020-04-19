<h1>"<?php echo $id; ?>" bearbeiten</h1>

Daten-Anzeigesprache:
<?php
$masterLanguage = $_SESSION["language"];
echo form_open('?c=dekore&m=edit');
echo form_hidden('id', $id);
$options = $languages;
echo form_dropdown('language', $options, 'en');
$buttonLanguage = array('name' => 'reference', 'value' => 'anzeigen');
echo form_submit($buttonLanguage);
echo form_close();
$LBL = labels_app($masterLanguage);
//print_r($LBL);
?>
<hr/>
<?php
echo form_open('?c=dekore&m=update');
if ($id == '') {
    echo form_hidden('mode', 'insert');
} else {
    echo form_hidden('id', $id);
}

echo 'Name in<br />';

echo '<table>';

echo '<tr><td>';
echo '' . $LBL["dekore"]["Feld"] . '';
echo '</td><td>';
echo '' . $LBL["dekore"]["Wert"] . '';
echo '</td><td>';
echo '' . $LBL["dekore"]["Pflicht"] . '';
echo '</td><td>';
echo '' . $LBL["dekore"]["Name"] . '';
echo '</td><td>';
echo '' . $LBL["dekore"]["Beschreibung"] . '';
echo '</td></tr>';


foreach ($languages as $language) {
    // if language was added in table than show it , otherwise show empty input EM 30.06.2010
    if (isset($dekorNames[$language])) $iLangDekOp = $dekorNames[$language]; else $iLangDekOp = "";

    echo '<tr><td>';
    echo 'Name ' . form_label($language, 'DEKORNAME_' . $language);
    echo '</td><td>';
    echo form_input(array('name' => 'DEKORNAME_' . $language, 'value' => $iLangDekOp));
    echo '</td><td>';
    echo $LBL["dekore"]["optional"];
    echo '</td><td>';
    echo '' . $LBL["dekore"]["NameSprache"] . '';
    echo '</td><td>';
    echo '.';
    echo '</td></tr>';
}

echo '<tr><td>';
echo form_label('DEKORGRUPPEID', 'DEKORGRUPPEID');
echo '</td><td>';
echo form_dropdown('DEKORGRUPPEID', $dekorgruppe, 0) . '<br />';
echo '</td><td>';
echo $LBL["dekore"]["pflicht"];
echo '</td><td>';
echo '' . $LBL["dekore"]["DekorGruppe"] . '';
echo '</td><td>';
echo '.';
echo '</td></tr>';

echo '<tr><td>';
echo form_label('DEKORNUMMER', 'DEKORNUMMER');
echo '</td><td>';
echo form_input(array('name' => 'DEKORNUMMER', 'value' => $dekor['DEKORNUMMER'])) . '<br />';
echo '</td><td>';
echo $LBL["dekore"]["pflicht"];
echo '</td><td>';
echo '' . $LBL["dekore"]["DekorNummer"] . '';
echo '</td><td>';
echo '.';
echo '</td></tr>';

echo '<tr><td>';
echo form_label('DEKORFARBRAUMID', 'DEKORFARBRAUMID');
echo '</td><td>';
echo form_dropdown('DEKORFARBRAUMID', $dekorfarbraum, 0) . '<br />';
echo '</td><td>';
echo $LBL["dekore"]["pflicht"];
echo '</td><td>';
echo '' . $LBL["dekore"]["Farbraum1"] . '';
echo '</td><td>';
echo '.';
echo '</td></tr>';

echo '<tr><td>';
echo form_label('DEKORMATERIALARTID', 'DEKORMATERIALARTID');
echo '</td><td>';
echo form_dropdown('DEKORMATERIALARTID', $dekormaterial, 0) . '<br />';
echo '</td><td>';
echo $LBL["dekore"]["pflicht"];
echo '</td><td>';
echo '' . $LBL["dekore"]["Farbraum2"] . '';
echo '</td><td>';
echo '.';
echo '</td></tr>';

echo '<tr><td>';
echo form_label('NCS1', 'NCS1');
echo '</td><td>';
echo form_input(array('name' => 'NCS1', 'value' => $dekor['NCS1'])) . '';
echo '</td><td>';
echo $LBL["dekore"]["optional"];
echo '</td><td>';
echo '' . $LBL["dekore"]["NCS1"] . '';
echo '</td><td>';
echo '.?';
echo '</td></tr>';

echo '<tr><td>';
echo form_label('NCS2', 'NCS2');
echo '</td><td>';
echo form_input(array('name' => 'NCS2', 'value' => $dekor['NCS2'])) . '';
echo '</td><td>';
echo $LBL["dekore"]["optional"];
echo '</td><td>';
echo '' . $LBL["dekore"]["NCS2"] . '';
echo '</td><td>';
echo '.?';
echo '</td></tr>';

echo '<tr><td>';
echo form_label('RAL', 'RAL');
echo '</td><td>';
echo form_input(array('name' => 'RAL', 'value' => $dekor['RAL'])) . '';
echo '</td><td>';
echo $LBL["dekore"]["optional"];
echo '</td><td>';
echo '' . $LBL["dekore"]["RAL"] . '';
echo '</td><td>';
echo '.?';
echo '</td></tr>';

echo '<tr><td>';
echo form_label('DEKORMASERUNGID', 'DEKORMASERUNGID');
echo '</td><td>';
echo form_dropdown('DEKORMASERUNGID', $dekormaserung, 0) . '<br />';
echo '</td><td>';
echo $LBL["dekore"]["optional"];
echo '</td><td>';
echo '' . $LBL["dekore"]["MaserungRapport"] . '';
echo '</td><td>';
echo '.?';
echo '</td></tr>';

echo '<tr><td>';
echo form_label('FARBVERBUND', 'FARBVERBUND');
echo '</td><td>';
echo form_dropdown('FARBVERBUND', array(0 => 0, 1 => 1), 0) . '<br />';
echo '</td><td>';
echo $LBL["dekore"]["optional"];
echo '</td><td>';
echo '' . $LBL["dekore"]["Farberbund"] . '';
echo '</td><td>';
echo '.?';
echo '</td></tr>';

echo '<tr><td>';
echo form_label('FARBWERT', 'FARBWERT');
echo '</td><td>';
echo form_input(array('name' => 'FARBWERT', 'value' => $dekor['FARBWERT'])) . '<br />';
echo '</td><td>';
echo $LBL["dekore"]["optional"];
echo '</td><td>';
echo '' . $LBL["dekore"]["Farbwert"] . '';
echo '</td><td>';
echo '.?';
echo '</td></tr>';

echo '<tr><td>';
echo form_label('TRANSPARENZ', 'TRANSPARENZ');
echo '</td><td>';
echo form_input(array('name' => 'TRANSPARENZ', 'value' => $dekor['TRANSPARENZ'])) . '<br />';
echo '</td><td>';
echo $LBL["dekore"]["optional"];
echo '</td><td>';
echo '' . $LBL["dekore"]["Transparenz"] . '';
echo '</td><td>';
echo '.?';
echo '</td></tr>';

echo '<tr><td>';
echo form_label('HYDROFUGE', 'HYDROFUGE');
echo '</td><td>';
echo form_dropdown('HYDROFUGE', array(0 => 0, 1 => 1), $dekor['HYDROFUGE']) . '<br />';
echo '</td><td>';
echo $LBL["dekore"]["optional"];
echo '</td><td>';
echo '' . $LBL["dekore"]["Hydrofuge"] . '';
echo '</td><td>';
echo '.?';
echo '</td></tr>';

//echo 'SORT ?'.'<br />';

echo '<tr><td>';
echo form_label('FVOBERFLAECHE', 'FVOBERFLAECHE');
echo '</td><td>';
echo form_input(array('name' => 'FVOBERFLAECHE', 'value' => $dekor['FVOBERFLAECHE'])) . '<br />';
echo '</td><td>';
echo $LBL["dekore"]["optional"];
echo '</td><td>';
echo '' . $LBL["dekore"]["Oberflaeche"] . '';
echo '</td><td>';
echo '.';
echo '</td></tr>';
//echo 'FVSORT ?'.'<br />';

echo '<tr><td>';
echo form_label('GESAMTUMBRUCH', 'GESAMTUMBRUCH');
echo '</td><td>';
echo form_dropdown('GESAMTUMBRUCH', array(0 => 0, 1 => 1), $dekor['GESAMTUMBRUCH']) . '<br />';
echo '</td><td>';
echo $LBL["dekore"]["optional"];
echo '</td><td>';
echo '' . $LBL["dekore"]["Gesamtumbruch"] . '';
echo '</td><td>';
echo '.';
echo '</td></tr>';

echo '<tr><td>';
echo form_label('FV_NL', 'FV_NL');
echo '</td><td>';
echo form_dropdown('FV_NL', array(0 => 0, 1 => 1), $dekor['FV_NL']) . '<br />';
echo '</td><td>';
echo $LBL["dekore"]["optional"];
echo '</td><td>';
echo '' . $LBL["dekore"]["FV_NL"] . '';
echo '</td><td>';
echo '.?';
echo '</td></tr>';

echo '<tr><td>';
echo form_label('NEUHEITEN', 'NEUHEITEN');
echo '</td><td>';
echo form_dropdown('NEUHEITEN', array(0 => 0, 1 => 1), $dekor['NEUHEITEN']) . '<br />';
echo '</td><td>';
echo $LBL["dekore"]["optional"];
echo '</td><td>';
echo '' . $LBL["dekore"]["Neueheiten"] . '';
echo '</td><td>';
echo '.?';
echo '</td></tr>';

echo '<tr><td>';
echo form_label('HPL_EXTRA', 'HPL_EXTRA');
echo '</td><td>';
echo form_input(array('name' => 'HPL_EXTRA', 'value' => $dekor['HPL_EXTRA'])) . '<br />';
echo '</td><td>';
echo $LBL["dekore"]["optional"];
echo '</td><td>';
echo '' . $LBL["dekore"]["HPL_Extra"] . '';
echo '</td><td>';
echo '.';
echo '</td></tr>';

echo '<tr><td>';
echo form_label('RAPPORT_BILD', 'RAPPORT_BILD');
echo '</td><td>';
echo form_input(array('name' => 'RAPPORT_BILD', 'value' => $dekor['RAPPORT_BILD'])) . '<br />';
echo '</td><td>';
echo $LBL["dekore"]["optional"];
echo '</td><td>';
echo '' . $LBL["dekore"]["Rapport_Bild"] . '';
echo '</td><td>';
echo '.?';
echo '</td></tr>';
echo '</table>';

$buttonSubmit = array('name' => 'refernce', 'value' => 'aktualisieren');
echo form_submit($buttonSubmit);
echo form_close();
?>