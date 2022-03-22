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
                        <h4 class="page-title">Menu</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#add">
                                <i class="fa-solid fa-plus"></i>
                                <span class="hide-menu">Add Menu</span>
                            </button>
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
                    @foreach($stok as $s)
                    <div class="alert alert-danger" role="alert">
                           !! Perhatian ketersediaan menu {{$s->nama_menu}} tersisa {{$s->ketersediaan}}
                        </div>
                    @endforeach
                    <table id="table" class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Menu</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Ketersediaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @foreach($menu as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_menu }}</td>
                            <td>RP.{{ number_format($item->harga) }}</td>
                            <td rows="3">{{ $item->deskripsi }}</td>
                            <td>{{ $item->ketersediaan }}</td>
                            <td>
                                <button type="button" class="btn btn-warning edit" data-id="{{$item->id}}" ><i class="fa-solid fa-pen-to-square"></i></button>
                                <a href="destroym/{{ $item->id }}" class="btn btn-danger" onclick="return confirm('are you sure to delete this?')"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                                        
                </div>
                <!-- ============================================================== -->
                <!-- Tambah Menu -->
                <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
                    @include('manager.create')
                </div>
                <!-- End Tambah Menu -->
                
                

                <!-- Edit Menu -->
                <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
                    @include('manager.edit')
                </div>
                
                <!-- End Edit Menu -->

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
    <script>
        $(document).ready(function() {
        //edit data
            $('.edit').on("click",function() {
            var id = $(this).attr('data-id');
            $.ajax({
                    url : "{{route('editm')}}?id="+id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data)
                    {
                    console.log(data);
                    $('input[name="id"]').val(data.id);
                    $('input[name="nama_menu"]').val(data.nama_menu);
                    $('input[name="harga"]').val(data.harga);
                    $('input[name="deskripsi"]').val(data.deskripsi);
                    $('input[name="ketersediaan"]').val(data.ketersediaan);
                    // $('#harga').val(data.harga);
                    // $('#deskripsi').val(data.deskripsi);
                    // $('#ketersediaan').val(data.ketersediaan);
                    $('#modal-edit').modal('show');
                    }
                });
            });

        });
</script>
</body>

</html>