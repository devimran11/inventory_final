<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('/admin')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{asset('/admin')}}/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Custom styles for this template-->
    <link href="{{asset('/admin')}}/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

@include('admin.includes.header')

<div id="wrapper">

    <!-- Sidebar -->
    @include('admin.includes.sidebar')

    <div id="content-wrapper">


            <!-- Breadcrumbs-->
            @yield('content')

            <!-- Icon Cards-->


            <!-- Area Chart Example-->


            <!-- DataTables Example -->


        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        @include('admin.includes.footer')

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
<script>
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })
</script>
{{--    <script src="{{asset('js/app.js')}}"></script>--}}

<script>
    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}");
    @endif
</script>
<script src="{{asset('js/toastr.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- Bootstrap core JavaScript-->
<script src="{{asset('/admin')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('/admin')}}/js/sweetalert.js"></script>
<script src="{{asset('/admin')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('/admin')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="{{asset('/admin')}}/vendor/chart.js/Chart.min.js"></script>
<script src="{{asset('/admin')}}/vendor/datatables/jquery.dataTables.js"></script>
<script src="{{asset('/admin')}}/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('/admin')}}/js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="{{asset('/admin')}}/js/demo/datatables-demo.js"></script>
<script src="{{asset('/admin')}}/js/demo/chart-area-demo.js"></script>

</body>

</html>

