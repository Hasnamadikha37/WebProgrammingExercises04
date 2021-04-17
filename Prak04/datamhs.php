<!DOCTYPE html>
<html>

<head>
<title> DATA MAHASISWA </title>
</head>

<body>

    <p>DATA MAHASISWA</p>
    <table border="1">
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Tempat Lahir</th>
        <th>Usia</th>

<?php

$file_handle = fopen("datamhs.dat", "rb");

function hitungUsia($tgl1, $tgl2){

// memisahkan tanggal untuk mendapatkan bagian tanggal, bulan, dan tahun. Dari tanggal pertama
    
    $pisah1 = explode("-", $tgl1);
    $date1 = $pisah1[2];
    $month1 = $pisah1[1];
    $year1 = $pisah1[0];

//memisahkan tanggal untuk mendapatkan bagian tanggal, bulan, dan tahun. Dari tanggal kedua

    $pisah2 = explode("-", $tgl2);
    $date2 = $pisah2[2];
    $month2 = $pisah2[1];
    $year2 = $pisah2[0];

// menghitung JDN 

    $jd1 = GregorianToJD($month1, $date1, $year1);
    $jd2 = GregorianToJD($month2, $date2, $year2);

//hitung selisih tahun

    $usia = ceil(($jd2 - $jd1) / 365);
    return $usia;
}

$i=0;
while (!feof($file_handle)){
    $i++;
    $line_of_text = fgets($file_handle);
    $parts = explode('|', $line_of_text);
    echo "<tr>
    <td height='119'>".$i."</td>
    <td>$parts[0]</td>
    <td>$parts[1]</td>
    <td>$parts[2]</td>
    <td>$parts[3]</td>
    <td>".hitungUsia($parts[2], date("Y-m-d"));"</td
    </tr>";
}

fclose($file_handle);

?>

</table>
<?php
echo "<br>";
echo "Jumlah Data : " .$i;
?>

</body>
</html>