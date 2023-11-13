@extends('app.admin.layout.app_left')
@section('title')
    AlphaU - Programs
@endsection

@section('adminbody')
    <div class="dashboard-title">
        <h5 class="mb-0 font_white">Programs</h5>
    </div>
    <div class="dashboard-body">
        <div>
            <div class="d-flex flex-row-reverse mb-2">
                <div class="p-2">
                    <img class="icn_imgs" data-bs-toggle="modal" data-bs-target="#model_program" id="new_school_modal"
                        src="{{ asset('imgs/icons/plus-lg.svg') }}" alt="">
                </div>
            </div>
            <!--School Modal Modal -->
            <div class="modal fade" id="model_program" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="mdl_title mb-2">
                                Add New Program
                            </div>
                            <form>
                                <div class="mb-3">
                                    <label for="program_name" class="form-label frm_lbl">Program Name</label>
                                    <input type="text" class="form-control" id="program_name">
                                </div>
                                <div class="mb-3">
                                    <label for="program_genre" class="form-label frm_lbl">Genre</label>
                                    <select class="form-select" id="program_genre">
                                        <option value="Entertainment">Entertainment</option>
                                        <option value="Science">Science</option>
                                        <option value="History">History</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="program_directory" class="form-label frm_lbl">Directory</label>
                                    <input type="text" class="form-control" id="program_directory">
                                </div>
                                <div id="loadingSpinner" class="text-center" style="display: none;">
                                    <div class="spinner-border text-success" role="status">
                                    </div>
                                </div>
                                <div class="d-flex flex-row-reverse">
                                    <div class="p-2">
                                        <Button class="btn btn-primary" type="button"
                                            data-bs-dismiss="modal"  id="btn_cncl">Cancel</Button>
                                    </div>
                                    <div class="p-2">
                                        <Button class="btn btn-primary" type="submit" id="btn_sbmt_prgrm">OK</Button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-2">
            <table id="tbl_programs" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Program Name</th>
                        <th>Genre</th>
                        <th>Functions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($programs_list as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->program_name }}</td>
                            <td>{{ $item->program_genre }}</td>
                            <td>
                                <i class="bi bi-trash text-danger btn"></i>
                                <i class="bi bi-pencil-square btn text-info"></i>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan=4 class="text-danger">
                                <b><i class="bi bi-exclamation-diamond"></i> No file found.</b>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#tbl_programs').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#btn_sbmt_prgrm').click(function(e) {
                e.preventDefault();
                $('#loadingSpinner').show();
                $('#btn_sbmt_prgrm').prop('disabled', true);
                $('#btn_cncl').prop('disabled', true);

                var formData = new FormData();
                formData.append('program_name', $('#program_name').val());
                formData.append('program_genre', $('#program_genre').val());
                formData.append('program_directory', $('#program_directory').val());

                if (!$('#program_name').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_prgrm').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'Program is required.',
                        showConfirmButton: true
                    });
                } else if (!$('#program_genre').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_prgrm').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'Genre is required.',
                        showConfirmButton: true
                    });
                } else if (!$('#program_directory').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_prgrm').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'Directory is required.',
                        showConfirmButton: true
                    });
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('archive.store') }}',
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
                                    text: "Program Submitted.",
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
                                    text: 'Input Valid Data',
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
                                    icon: 'error',
                                    title: "Error",
                                    text: "Program Submission Failed",
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        },

                    });
                }
            });
        });
    </script>
@endsection
