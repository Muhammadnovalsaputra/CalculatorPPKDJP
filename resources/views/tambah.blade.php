<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('storeTambah') }}" method="post">
        @csrf
        <label for="">Angka 1</label>
        <input type="text" placeholder="Masukan Angka" name="angka1">
        <br><br>
        <label for="">Angka 2</label>
        <input type="text" placeholder="Masukan Angka" name="angka2">
        <br><br>
        <button type="submit">simpan</button>
    </form>
    <p>Hasilnya adalah : <strong>{{ $jumlah ?? 0 }}</strong></p>
</body>

</html>
