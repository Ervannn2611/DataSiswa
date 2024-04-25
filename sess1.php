<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>DATA SISWA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            padding: 20px;
            text-align: center;

        }
        .container{
            margin: 5rem;
            padding: 5rem;
            margin-top: 10px;
            background-color:#FF9800;
            border-radius: 10px;
        }
        form {
            padding: 20px;
        text-align: center;
        border-radius: 50px 10 50px 10;
        margin-bottom: 20px; 
        }
        label {
            display: inline-block;
            width: 100px;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="number"] {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
            border-radius: 20px 0 20px 0;
        }
        button[type="submit"],
        button[type="button"] {
            padding: 8px 15px;
            background-color: #007bff;
            color: ;
            border-radius: 10px 0 10px 0;
            cursor: pointer;
        }
        button[type="submit"]:hover,
        button[type="button"]:hover {
            background-color: #0056b3;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        h1{
            color: #fff;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr {
            background-color: #f2f2f2;
        }
        a.btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
            padding: 5px 10px;
            border-radius: 3px;
            text-decoration: none;
        }
        a.btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>
</head>
<body>
    <div class="container">
    <h1>MASUKAN DATA SISWA</h1>
    <form action="?aksi=tambah" method="post">
    <label for="nama">NAMA :</label>
    <input type="text" id="nama" name="nama"><br></br>
    <label for="nama">NIS :</label>
    <input type="number" id="nis" name="nis"><br></br>
    <label for="rayon">RAYON :</label>
    <input type="text" id="rayon" name="rayon"><br></br>
    <button type="submit" name="kirim" value="kirim" ><i class='bx bx-plus-medical'>  SUBMIT</i></button>
    <button type="submit" name="kirim" value="kirim" ><i class='bx bxs-printer'><a href="sess2.php">CETAK</i>  </a> </button>
    <button type="submit" name="reset" value="reset"><i class='bx bxs-trash'></i>     HAPUS DATA</i></button>
    </form>

<?php
session_start();

if (!isset($_SESSION['dataSiswa'])) {
    $_SESSION['dataSiswa'] = array();
}

if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] === 'tambah' && isset($_POST['nama'], $_POST['nis'], $_POST['rayon'])) {
        $data = array(
            'nama' => $_POST['nama'],
            'nis' => $_POST['nis'],
            'rayon' => $_POST['rayon']
        );
        array_push($_SESSION['dataSiswa'], $data);
    } elseif ($_GET['aksi'] === 'hapus' && isset($_GET['index'])) {
        $index = $_GET['index'];
        if (isset($_SESSION['dataSiswa'][$index])) {
            unset($_SESSION['dataSiswa'][$index]);
        }
    }if(isset($_POST['reset'])){
        session_destroy();
        header('http://localhost:8089/datasiswa/sess1.php');
        exit;
    }
}

echo '<table border="1">';
echo '<tr>';
echo '<th>NAMA</th>';
echo '<th>NIS</th>';
echo '<th>RAYON</th>';
echo '<th>AKSI</th>';
echo '</tr>';

foreach ($_SESSION['dataSiswa'] as $key => $value) {
    echo '<tr>';
    echo '<td>' . $value['nama'] . '</td>';
    echo '<td>' . $value['nis'] . '</td>';
    echo '<td>' . $value['rayon'] . '</td>';
    echo '<td><a href="?aksi=hapus&index='.$key.'" class="btn btn-danger btn-sm">Hapus</a></td>';
    echo '</tr>';
}

echo '</table>';
?>
</div>
</body>
</html>
