<br/>
<?php
if (isset($data)) {
    
} else {
    $data = 0;
}
$Divisi = array('Semua' => 'Semua', 'IT Helpdesk' => 'IT Helpdesk', 'IT Internal'=>'IT Internal');

echo form_open();
echo "<table>";
echo "<tr colspan=2 class='error'>";
echo "<td>";
echo validation_errors();
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Pilih Divisi:";
echo "</td>";
echo "<td>";
echo form_dropdown('Divisi',$Divisi, set_value('Divisi', $data['Divisi']),'required')."<td><td/>";
echo form_submit('submit', 'submit');
echo "</td>";
echo "</tr>";

echo "</tr>";
echo "</table>";
?>
