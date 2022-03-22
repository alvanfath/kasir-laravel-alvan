<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>Vann Resto</title>
    @include('layout.head')
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('layout.top')


        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('layout.sidebar')

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" style="min-height: 250px;">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-#D3D3D3">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Data Transaksi</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-flex flex-row-reverse bd-highlight">
                        <div class="p-2 bd-highlight">
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#add">
                                <i class="fa-solid fa-plus"></i>
                                <span class="hide-menu">Tambah Pesanan</span>
                            </button>
                        </div>
                        <div class="p-2 bd-highlight">
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#menu">
                                <i class="fa-solid fa-bars"></i>
                                <span class="hide-menu">Daftar Menu</span>
                            </button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row justify-content-center">
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger" role="alert">
                           {{$message}}
                        </div>
                    @endif
                    <table id="table" class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Customer</th>
                                <th>Menu</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Tunai</th>
                                <th>Kembalian</th>
                                <th>Pegawai</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @foreach($trans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_pelanggan }}</td>
                            <td>{{ $item->nama_menu }}</td>
                            <td>RP.{{ number_format($item->harga) }}</td>
                            <td>{{ number_format($item->jumlah) }}</td>
                            <td>RP.{{ number_format($item->total_harga) }}</td>
                            <td>
                                @if ($item->bayar == 0)

                                @endif

                                @if ($item->bayar >= $item->total_harga)
                                    RP.{{ number_format($item->bayar) }}
                                @endif
                            </td>
                            <td>
                                @if ($item->bayar == 0)

                                @endif

                                @if ($item->bayar >= $item->total_harga)
                                    RP.{{ number_format($item->kembalian) }}
                                @endif
                            </td>
                            <td>{{ $item->nama_pegawai}}</td>
                            <td>{{ $item->tanggal}}</td>
                            <td>

                            @if ($item->bayar == 0)
                                <button type="button" class="btn btn-primary edit" data-id="{{$item->id}}">Bayar</button>
                            @endif

                            @if ($item-> bayar >= $item->total_harga)
                            <button type="button" class="btn btn-success ">Lunas</button>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->

                {{-- Menu --}}
                <div class="modal fade" id="menu" tabindex="-1" aria-labelledby="menuLabel" aria-hidden="true">
                    @include('kasir.menu')
                  </div>
                {{-- End Menu --}}

                <!-- Tambah Transaksi -->
                <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
                    @include('kasir.create')
                </div>
                <!-- End Tambah Transaksi -->

                {{-- Bayar --}}
                <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
                    @include('kasir.bayar')
                </div>
                {{-- End Bayar --}}

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include('layout.footer')

            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    @include('layout.js')
    @include('sweetalert::alert')
    <script>
        $(document).ready(function() {
        //edit data
            $('.edit').on("click",function() {
            var id = $(this).attr('data-id');
            $.ajax({
                    url : "{{route('editk')}}?id="+id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data)
                    {
                    console.log(data);
                    $('input[name="id"]').val(data.id);
                    $('#nama_pelanggan').text(data.nama_pelanggan)
                    $('#menu').text(data.nama_menu)
                    $('#kuantitas').text(data.jumlah)
                    $('#total_harga').text(data.harga_rp)
                    $('#modal-edit').modal('show');
                    }
                });
            });

        });
    </script>
</body>

</html>
