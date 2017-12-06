<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });

</script>
<br/>
<?php
echo "<table id='datatable' class='display' cellspacing='0' width='85%'>";
$header = "<thead>
        <tr>
            <th>Tipe Barang</th>
            <th>Jumlah Tersedia</th>
            <th>Jumlah Terpakai</th>
            <th>Total</th>                       
        </tr>
    </thead>";
$footer = "<tfoot>
        <tr>
            <th>Tipe Barang</th>
            <th>Jumlah Tersedia</th>
            <th>Jumlah Terpakai</th>
            <th>Total</th>                                   
        </tr>
    </tfoot>";
echo $header;
echo $footer;
echo "<tbody>";

foreach ($query as $row) {
    echo "<tr>";
    echo "<td>";
    echo $row->TipeBarang;
    echo "</td><td>";
    echo $row->Ready;
    echo "</td><td>";
    echo $row->Used;
    echo "</td><td>";
    echo $row->Ready + $row->Used;
    echo "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>