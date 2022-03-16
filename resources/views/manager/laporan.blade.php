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
                        <h4 class="page-title">Laporan Transaksi</h4>
                    </div>                   
                    <div class="d-flex flex-row-reverse bd-highlight">
                        <div class="p-2 bd-highlight">
                            <a href="{{ route('PrintAll') }}" target="_blank" class="btn btn-info">
                            <i class="fa-solid fa-print"></i>
                            <span class="hide-menu">Print All</span>
                            </a>
                        </div>    
                        <div class="p-2 bd-highlight">
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#print">
                                <i class="fa-solid fa-print"></i>
                                <span class="hide-menu">Print By Date</span>
                            </button>
                        </div> 
                    </div>  
                </div>
                <br>
                <div class="card" style="width: 15rem; background:grey; color:white;">
                    <div class="card-header">
                        Total Pendapatan
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" style="color: white;">RP. {{number_format($total)}}</h5>
                    </div>
                </div>
                <form action="{{ route('search') }}" method="get">
                        @csrf
                        <div class="form-group row">
                            <label for="from" class="col-form-label col-sm-2">Date From:</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control input-sm w-100" style="border-style: groove;" id="from" name="from"  required>
                            </div>
                            <label for="to" class="col-form-label col-sm-2">Date to:</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control input-sm w-100" style="border-style: groove;" id="to" name="to" required>
                            </div>
                            <div class="col-sm-2">
                            <button type="submit" style="border-style: groove;" class="btn btn-warning mb-1"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
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
                   
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
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
                        </thead>
                        @foreach($report as $item)
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
                    {!! $report->links() !!}           
                </div>
                <!-- ============================================================== -->
                
                <!-- modal -->
                <div class="modal fade" id="print" tabindex="-1" aria-labelledby="PrintLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="pop modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="PrintLabel">Print</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="PrintCustom" target="blank" method="get">
                                <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="from" class="form-label">Date From</label>
                                            <input type="date" name="from" class="form-control" id="from" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="to" class="form-label">Date To</label>
                                            <input type="date" class="form-control" name="to" id="to">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Print</button>
                                </div>
                            </form>   
                        </div>   
                    </div>
                </div>
                <!-- End Modal -->
            <!-- End PAge Content -->    
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
</body>

</html>