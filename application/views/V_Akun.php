<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });

</script>

<h2>Daftar Akun</h2>
<div class="divider"></div>
<br/>

<?php
echo "<table id='datatable' class='display' cellspacing='0' width='100%'>";
$header = "<thead>
        <tr>
            <th>Divisi</th>
            <th>NIP</th>
            <th>Nama Lengkap</th>
            <th>Email</th>           
            <th>Password</th>
            <th>Aksi</th>
        </tr>
    </thead>";
$footer = "<tfoot>
        <tr>
            <th>Divisi</th>
            <th>NIP</th>
            <th>Nama Lengkap</th>
            <th>Email</th>                       
            <th>Password</th>
            <th>Aksi</th>
        </tr>
    </tfoot>";
echo $header;
echo $footer;
echo "<tbody>";

foreach ($query as $row) {
    echo "<tr>";
    echo "<td>";
    echo $row->Divisi;
    echo "</td><td>";
    echo "$row->NIP";
    echo "</td><td>";
    echo $row->Nama_Dpn.' '.$row->Nama_Blkg;
    echo "</td><td>";
    echo $row->Email;
    echo "</td><td>";
    echo md5($row->Password);
    echo "</td><td>";
    echo "<a href='" . base_url('index.php/C_Akun/Edit') . '/' . $row->NIP . "'>Edit</a>" . ' ' . "<a href='" . base_url('index.php/C_Akun/Hapus') . '/' . $row->NIP . "'>Hapus</a>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
?>