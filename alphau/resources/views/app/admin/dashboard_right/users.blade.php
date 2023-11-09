@extends('app.admin.layout.app_right')
@section('title')
    AlphaU - NIE Radio for Students 24/7
@endsection

@section('adminbody')
    <div class="dashboard-title">
        <h5 class="mb-0 font_white">Users</h5>
    </div>
    <div class="dashboard-body">
        <div>
            <div class="d-flex flex-row-reverse mb-2">
                <div class="p-2">
                    <img class="icn_imgs" data-bs-toggle="modal" data-bs-target="#model_user" id="new_user_modal"
                        src="{{ asset('imgs/icons/person-plus-fill.svg') }}" alt="">
                </div>
            </div>
            <div class="mb-2">
                <select class="form-select form-select-sm" id="list_view_category">
                    <option value="dv_tbl_stdnts">Student</option>
                    <option value="dv_tbl_schl_admns">School Admins</option>
                    <option value="dv_tbl_gsts">Guest</option>
                </select>
            </div>
            <!--User Modal Modal -->
            <div class="modal fade" id="model_user" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="mdl_title mb-2">
                                Add New User
                            </div>
                            <form>
                                <div class="mb-3">
                                    <label for="category" class="form-label frm_lbl">Category</label>
                                    <select class="form-select" id="category">
                                        <option value="school">School Admins</option>
                                        <option value="user">Student</option>
                                        <option value="guest">Guest</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="first_name" class="form-label frm_lbl">First Name</label>
                                    <input type="text" class="form-control" id="first_name">
                                </div>
                                <div class="mb-3">
                                    <label for="last_name" class="form-label frm_lbl">Last Name</label>
                                    <input type="text" class="form-control" id="last_name">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label frm_lbl">Email Address</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="mb-3">
                                    <label for="school" class="form-label frm_lbl">School</label>
                                    <select class="form-select" id="school">
                                        @forelse ($schools_list as $item)
                                            <option value="{{ $item->school_name }}">{{ $item->school_name }}
                                            </option>
                                        @empty
                                            <option value="Science">Science</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="student_index" class="form-label frm_lbl">Index No</label>
                                    <input type="text" class="form-control" id="student_index">
                                </div>
                                <div class="d-flex flex-row-reverse">
                                    <div class="p-2">
                                        <Button class="btn btn-primary" type="button"
                                            data-bs-dismiss="modal">Cancel</Button>
                                    </div>
                                    <div class="p-2">
                                        <Button class="btn btn-primary" type="submit" id="btn_sbmt_user">OK</Button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-2" id="dv_tbl_stdnts">
            <table id="tbl_students" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>School</th>
                        <th>Index No.</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students_list as $item)
                        <tr>
                            <td>{{ $item->first_name }}&nbsp;{{ $item->last_name }}</td>
                            <td>{{ $item->school }}</td>
                            <td>{{ $item->student_index }}</td>
                        </tr>
                    @empty
                        <td>1</td>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mb-2" id="dv_tbl_gsts">
            <table id="tbl_guest_users" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>School</th>
                        <th>Index No.</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($guests_list as $item)
                        <tr>
                            <td>{{ $item->first_name }}&nbsp;{{ $item->last_name }}</td>
                            <td>{{ $item->school }}</td>
                            <td>{{ $item->student_index }}</td>
                        </tr>
                    @empty
                        <td>1</td>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mb-2" id="dv_tbl_schl_admns">
            <table id="tbl_school_admins" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>School</th>
                        <th>Index No.</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($school_admins_list as $item)
                        <tr>
                            <td>{{ $item->first_name }}&nbsp;{{ $item->last_name }}</td>
                            <td>{{ $item->school }}</td>
                            <td>{{ $item->student_index }}</td>
                        </tr>
                    @empty
                        <td>1</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#tbl_students').DataTable();
            $('#tbl_guest_users').DataTable();
            $('#tbl_school_admins').DataTable();
        });
    </script>
    <script>
        $('#dv_tbl_gsts').hide();
        $('#dv_tbl_schl_admns').hide();
        $('#list_view_category').on('change', function() {
            var selectedOption = $(this).val();
            if (selectedOption === 'dv_tbl_stdnts') {
                $('#dv_tbl_stdnts').show();
                $('#dv_tbl_gsts').hide();
                $('#dv_tbl_schl_admns').hide();
            } else if (selectedOption === 'dv_tbl_gsts') {
                $('#dv_tbl_stdnts').hide();
                $('#dv_tbl_gsts').show();
                $('#dv_tbl_schl_admns').hide();
            } else if (selectedOption === 'dv_tbl_schl_admns') {
                $('#dv_tbl_stdnts').hide();
                $('#dv_tbl_gsts').hide();
                $('#dv_tbl_schl_admns').show();
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#btn_sbmt_user').click(function(e) {
                e.preventDefault();

                var formData = new FormData();
                formData.append('category', $('#category').val());
                formData.append('first_name', $('#first_name').val());
                formData.append('last_name', $('#last_name').val());
                formData.append('email', $('#email').val());
                formData.append('school', $('#school').val());
                formData.append('student_index', $('#student_index').val());

                $.ajax({
                    type: 'POST',
                    url: '{{ route('user.store') }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data, status, xhr) {
                        var statusCode = xhr.status;
                        if (statusCode === 200) {
                            // Do something with success message here
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: "Success",
                                text: "Files Submitted",
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                // Reload the page
                                location.reload();
                            });
                        } else if (statusCode === 422) {
                            // handle the validation errors
                            // ----------------------------------------------------------------------------------
                            // var errors = data.errors;
                            // loop through the errors and show them
                            // for (var key in errors) {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Error',
                                text: 'Input Valid Data!',
                                // title: key,
                                // text: errors[key][0],
                                showConfirmButton: false,
                                timer: 1500
                            });
                            // }
                        } else {
                            // Do something with failure message here
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: "Error",
                                text: "File Submission Failed",
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    },

                });
            });
        });
    </script>
@endsection
