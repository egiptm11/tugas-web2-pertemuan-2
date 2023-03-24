<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP Dasar</title>
</head>
<body>
<h2>Form Input</h2>
<form method="post">
<label>Nama: </label>
<input type="text" name="nama">
<input type="submit" value="Kirim">
</form>
<?php
echo 'Selamat Datang ' . $_POST['nama'];
?>
<?php
if(isset($_POST['submit'])){
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $tgl_lahir = new DateTime($tanggal_lahir);
  $sekarang = new DateTime();
  $diff = $sekarang->diff($tgl_lahir);
  echo "Usia Anda adalah: " . $diff->y . " tahun, " . $diff->m . " bulan, dan " . $diff->d . " hari.";
}
?>

<form method="post">
  Tanggal Lahir: <input type="date" name="tanggal_lahir"><br>
  <input type="submit" name="submit" value="Hitung Usia">
</form>

<?php
// Membuat array dengan jenis pekerjaan dan gaji
$pekerjaan = array(
    "Manajer" => 20000000,
    "Supervisor" => 10000000,
    "Leader" => 7000000,
    "Operator" => 5000000
);

// Memeriksa apakah formulir telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memeriksa apakah jenis pekerjaan telah dipilih
    if (!empty($_POST["jenis_pekerjaan"])) {
        $jenis_pekerjaan = $_POST["jenis_pekerjaan"];
        $gaji = $pekerjaan[$jenis_pekerjaan];
        echo "Gaji untuk " . $jenis_pekerjaan . " adalah " . $gaji . " rupiah.";
    } else {
        echo "Silahkan pilih jenis pekerjaan.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Input Gaji Pekerjaan</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="jenis_pekerjaan">Jenis Pekerjaan:</label>
        <select id="jenis_pekerjaan" name="jenis_pekerjaan">
            <option value="">Pilih jenis pekerjaan</option>
            <option value="Manajer">Manajer</option>
            <option value="Programmer">Supervisor</option>
            <option value="Desainer">Leader</option>
            <option value="Admin">Operator</option>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>