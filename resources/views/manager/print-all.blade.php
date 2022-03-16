<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Print laporan</title>
  </head>
  <body>
    <h3 class="text-center">Laporan</h3>
    <br>
    <table class="table table-striped">
      <tr>
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>Nama Menu</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
        <th>Nama Pegawai</th>
        <th>Tanggal</th>
      </tr>
      @foreach($all as $item)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->nama_pelanggan }}</td>
        <td>{{ $item->nama_menu }}</td>
        <td>RP.{{ number_format($item->harga) }}</td>
        <td>{{ number_format($item->jumlah) }}</td>
        <td>RP.{{ number_format($item->total_harga) }}</td>
        <td>{{ $item->nama_pegawai}}</td>
        <td>{{ $item->tanggal}}</td> 
      </tr>
      @endforeach
    </table>
    <br>
    <h3 class="text-lg-start">Total Pendapatan: {{number_format($total)}}</h3>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>