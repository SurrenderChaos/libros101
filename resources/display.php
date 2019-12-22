<?php
include("/connection.php");
mysqli_select_db("tercer_parcial01",$con);
$result=mysqli_query("select * from libro",$con);

echo "<table border='1' >
<tr>
<td align=center> <b>id</b></td>
<td align=center><b>nombre</b></td>
<td align=center><b>resumen</b></td>
<td align=center><b>npagina</b></td>
<td align=center><b>edicion</b></td>
<td align=center><b>autor</b></td>
<td align=center><b>precio</b></td>";

while($data = mysqli_fetch_row($result))
{   
    echo "<tr>";
    echo "<td align=center>$data[0]</td>";
    echo "<td align=center>$data[1]</td>";
    echo "<td align=center>$data[2]</td>";
    echo "<td align=center>$data[3]</td>";
    echo "<td align=center>$data[4]</td>";
    echo "<td align=center>$data[5]</td>";
    echo "<td align=center>$data[6]</td>";
    echo "<td align=center>$data[7]</td>";
    echo "</tr>";
}
echo "</table>";
?>