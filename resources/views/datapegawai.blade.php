<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <title>CRUD Laravel 9</title>
    </head>
    <body>
        <h1 class="text-center mb-4">Data Pegawai</h1>

        <div class="container">
            <a href="/tambahpegawai" type="button" class="btn btn-success">Tambah +</a>

            <div class="row">
                    <div class="col-auto mt-3">
                        <form action="/pegawai" method="GET">
                        <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
                        </form>
                    </div>
            {{-- @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
               {{ $message }}
              </div>                   
            @endif --}}
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">No telpon</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $info)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $info->nama }}</td>
                            <td>
                                <img src="{{ asset('fotopegawai/'.$info->foto) }}" alt="" style="width: 40px;">
                            </td>
                            <td>{{ $info->jeniskelamin }}</td>
                            <td>0{{ $info->notelpon }}</td>
                            <td>{{ $info->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="/tampildata/{{ $info->id }}" type="button" class="btn btn-warning">
                                    Edit
                                </a>
                                <a href="{{ route('hapusdata',$info->id) }}" class="btn btn-danger delete" data-id="{{ $info->id }}">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper & JQuery cdn -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"
        ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
        
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    </body>
        <script type="text/javascript">
            $(document).ready(function() {
            $('.delete').click(function(e) {
                e.preventDefault();
                var pegawaiid = $(this).attr('data-id');
                swal({
                title: "Apa kamu yakin akan menghapus data ini?",
                text: "Jika kamu telah menghapus, maka data akan terhapus secara permanen",
                icon: "warning",
                buttons: {
                    cancel: "Cancel",
                    confirm: "Delete"
                },
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/hapusdata/" + pegawaiid ,   swal("Data berhasil dihapus!", {
                            icon: "success",
                        });
                
                } else {
                    swal("Data tidak jadi dihapus");
                }
                });
            });
            });
            </script>

        <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}") // ambil 'success' dari session pada EmployeeContorller.php
        @endif
        </script>
</html>



