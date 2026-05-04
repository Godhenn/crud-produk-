<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial;
            padding: 50px;
        }

        h1 {
            margin-bottom: 20px;
        }

        input {
            padding: 8px;
            margin-right: 10px;
        }

        button {
            padding: 8px 15px;
        }
    </style>
</head>
<body>

    <h1>Tambah Data Mahasiswa</h1>

    @if(session('success'))
        <p style="color: lightgreen">{{ session('success') }}</p>
    @endif

    <form action="/mahasiswa/store" method="POST">
        @csrf

        <input type="text" name="nama" placeholder="Nama">
        <input type="text" name="nim" placeholder="NIM">
        <input type="text" name="jurusan" placeholder="Jurusan">

        <button type="submit">Simpan</button>
    </form>

</body>
</html>