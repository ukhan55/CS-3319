<?php
$query = "SELECT * FROM BusTrips";
$result = mysqli_query($connection,$query);

//Its the first page of the website

if (!$result) {
    die("databases query failed.");
}
echo "<table border='1'>
<tr>
<th>BusID</th>
<th>CountryDestination</th>
<th>TripName</th>
<th>LicensePlateID</th>
<th>Start</th>
<th>End</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['BusID'] . "</td>";
echo "<td>" . $row['CountryDestination'] . "</td>";
echo "<td>" . $row['TripName'] . "</td>";
echo "<td>" . $row['LicensePlateID'] . "</td>";
echo "<td>" . $row['Start'] . "</td>";
echo "<td>" . $row['End'] . "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_free_result($result);

?>
