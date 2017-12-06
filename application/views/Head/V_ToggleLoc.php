<br/>
<?php

if (isset($data)) {
    
} else {
    $data = 0;
}

$Lokasi = array('Gudang 1' => 'Gudang 1', 'Gudang 2'=>'Gudang 2',
    'Gudang 3' => 'Gudang 3', 'Gudang 4' => 'Gudang 4', 'Gudang 5' => 'Gudang 5');

echo form_open();
echo "<table>";
echo "<tr colspan=2 class='error'>";
echo "<td>";
echo validation_errors();
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Pilih Lokasi:";
echo "</td>";
echo "<td>";
echo form_dropdown('Lokasi',$Lokasi, set_value('Lokasi', $data['Lokasi']),'required')."<td><td/>";
echo form_submit('submit', 'submit');
echo "</td>";
echo "</tr>";

echo "</tr>";
echo "</table>";

?>