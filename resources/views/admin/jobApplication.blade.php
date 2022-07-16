@extends('layouts.mainLayout')
<!-- Datatable CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" async>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 topHead">
            <div class="card">
                <div class="card-header">Job Application List</div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="messages" id="ajax-msg"></div>
                    </div>
                    @if($response = session('response'))
                    <div class="alert alert-{{ $response['class'] }} alert-dismissible1 fade show" role="alert" id="list-msg">
                        <strong>{{ $response['msg'] }}</strong>
                    </div>
                    @endif
                    <div class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="row" style="overflow-x: auto;">
                            <div class="col-sm-12">
                                <table id="jobApplication" class="table table-bordered text-nowrap mb-0 no-footer" role="grid" aria-describedby="data-table_info">
                                    <thead class="border-top">
                                        <tr role="row" style="background: #363e7242;">
                                            <th class="bg-transparent border-bottom-1">id</th>
                                            <th class="bg-transparent border-bottom-1">First Name</th>
                                            <th class="bg-transparent border-bottom-1">Last Name</th>
                                            <th class="bg-transparent border-bottom-1">Created On</th>
                                            <th class="bg-transparent border-bottom-1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Datatable JS -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js">
</script>
<script>
    $(document).ready(function() {
        $('#jobApplication').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('JobApplicationList')}}",
            columns: [{
                    data: 'id'
                },
                {
                    data: 'first_name'
                },
                {
                    data: 'last_name'
                },
                {
                    data: 'created_at'
                },
                {
                    data: 'action',
                    "orderable": false
                },
            ],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ]
        });
    });


    function deleteJobApplication(id) {
        swal("Are you sure want to delete this job application?", "", "warning", {
            dangerMode: true,
            buttons: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    method: "get",
                    url: "{{url('deleteJobApplication')}}",
                    data: {
                        "id": id,
                    },
                    success: function(data) {
                        $('#list-msg').hide();
                        var messages = $('.messages');
                        var successHtml = '<div class="alert alert-success">' +
                            '<strong>Job application  deleted successfully.</strong></div>';
                        if (JSON.parse(data).msg == "something went wrong") {
                            var messages = $('.messages');
                            var successHtml = '<div class="alert alert-danger">' +
                                '<strong>Something went wrong!</strong></div>';
                        } else {
                            var messages = $('.messages');
                            var successHtml = '<div class="alert alert-success">' +
                                '<strong>Job application  deleted successfully.</strong></div>';
                        }
                        $(messages).html(successHtml);

                        $('#jobApplication').DataTable().ajax.reload();
                    },
                })
            
            }
        });
    }
</script>