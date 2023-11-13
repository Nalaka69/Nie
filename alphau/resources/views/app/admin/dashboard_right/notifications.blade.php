@extends('app.admin.layout.app_right')
@section('title')
    AlphaU - NIE Radio for Students 24/7
@endsection

@section('adminbody')
    <div class="dashboard-title">
        <h5 class="mb-0 font_white">Notifications</h5>
    </div>
    <div class="dashboard-body">
        <div class="card card-sm crd_drk mb-2">
            <div class="card-body">
                This is some text within a card body.
            </div>
        </div>
        <div class="card card-sm crd_drk mb-2">
            <div class="card-body">
                <ol class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Nimal Perera</div>
                            sample msg 1
                        </div>
                        <span class="">
                            <b><i class="bi bi-reply-fill text-primary btn btn-lg"></i></b>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Amali Silva</div>
                            sample msg 2
                        </div>
                        <span class="">
                            <b><i class="bi bi-reply-fill text-primary btn btn-lg"></i></b>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Sunil Perera</div>
                            sample msg 3
                        </div>
                        <span class="">
                            <b><i class="bi bi-reply-fill text-primary btn btn-lg"></i></b>
                        </span>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <script>
        // $(document).ready(function() {
        //     $('#tbl_students').DataTable();
        // });
    </script>
@endsection
