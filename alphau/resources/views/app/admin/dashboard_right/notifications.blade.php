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
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold">Subheading</div>
                        Content for list item
                      </div>
                      <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold">Subheading</div>
                        Content for list item
                      </div>
                      <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold">Subheading</div>
                        Content for list item
                      </div>
                      <span class="badge bg-primary rounded-pill">14</span>
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
