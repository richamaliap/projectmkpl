<h2>Perbahaurui Info User</h2>
<div class="divider"></div>
<br/>


<?php
if (isset($data)) {
    
} else {
    $data = 0;
}

echo form_open();
echo "<table>";
echo "<tr colspan=2 class='error'>";
echo "<td>";
echo validation_errors();
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Divisi:";
echo "</td>";
echo "<td>";
$Divisi = array('IT Helpdesk' => 'IT Helpdesk', 'IT Internal' => 'IT Internal');
echo form_dropdown('Divisi', $Divisi, set_value('Divisi', $data['Divisi']), 'required');
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "NIP:";
echo "</td>";
echo "<td>";
echo form_input('NIP', set_value('NIP', $data['NIP']), 'readonly');
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Nama Depan:";
echo "</td>";
echo "<td>";
echo form_input('Nama_Dpn', set_value('Nama_Dpn', $data['Nama_Dpn']), 'required');
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Nama Belakang:";
echo "</td>";
echo "<td>";
echo form_input('Nama_Blkg', set_value('Nama_Blkg', $data['Nama_Blkg']), 'required');
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Email:";
echo "</td>";
echo "<td>";
echo form_input('Email', set_value('Email', $data['Email']), 'readonly');
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Password:";
echo "</td>";
echo "<td>";
echo form_input('Password', set_value('Password', $data['Password']), 'required');
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "</td>";
echo "<td>";
echo form_submit('submit', 'Submit');
echo " ";
echo form_submit('cancel', 'Cancel');
echo "</td>";

echo "</tr>";
echo "</table>";
?>