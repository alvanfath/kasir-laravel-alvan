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
                        <h4 class="page-title">Data User</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#add">
                                <i class="fa-solid fa-plus"></i>
                                <span class="hide-menu">Add User</span>
                            </button>
                        </div>
                    </div>
                </div>
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
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <img width ="100px" height= "80px" src="{{ asset('storage/foto/' . $user->foto )}}" alt="eweh">
                            </td>
                            <td>
                            <button type="button" class="btn btn-warning edit" data-id="{{$user->id}}" ><i class="fa-solid fa-pen-to-square"></i></button>
                                <a href="destroyuser/{{ $user->id }}" class="btn btn-danger" onclick="return confirm('are you sure to delete this?')"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                {!! $users->links() !!}
                </div>
                <!-- ============================================================== -->

                <!-- Tambah User -->
                <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
                    @include('admin.create')
                </div>
                <!-- End Tambah User -->



                <!-- Edit -->

                <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
                   @include('admin.edit')
                </div>

                <!-- End Edit  -->

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
                    url : "{{route('editu')}}?id="+id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data)
                    {
                    console.log(data);
                    $('input[name="nama"]').val(data.nama);
                    $('input[name="username"]').val(data.username);
                    $('select[name="role"] option:selected').text(data.role);
                    let url = "{{route('updateuser',':id')}}";
                    $('form[id="updateu"]').attr('action', url.replace(':id',data.id));
                    $('#modal-edit').modal('show');
                    }
                });
            });

        });
</script>
</body>

</html>
