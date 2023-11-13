@extends('app.admin.layout.app_left')
@section('title')
    AlphaU - Automation & Archive
@endsection

@section('adminbody')
    <div class="dashboard-title">
        <h5 class="mb-0 font_white">Automation and Archive</h5>
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
                                Add New Clip
                            </div>
                            <form>
                                <div class="mb-3">
                                    <label for="program_name" class="form-label frm_lbl">Program</label>
                                    <select class="form-select" id="program_name">
                                        @forelse ($created_archive as $item)
                                            <option value="{{ $item->program_name }}">{{ $item->program_name }}
                                            </option>
                                        @empty
                                            <option value="Science">Science</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="automation_episode" class="form-label frm_lbl">Episode</label>
                                    <input type="text" class="form-control" id="automation_episode">
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="automation_url" class="form-label frm_lbl">URL</label>
                                    <input type="text" class="form-control" id="automation_url">
                                </div> --}}
                                <div class="mb-3">
                                    <label for="automation_file" class="form-label frm_lbl">Files</label>
                                    <input type="file" class="form-control" id="automation_file" name="automation_file[]"
                                        accept=".mp3">
                                </div>
                                <div class="mb-3">
                                    <label for="file_repeat" class="form-label frm_lbl">Repeat</label>
                                    <select class="form-select" id="file_repeat">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div id="loadingSpinner" class="text-center" style="display: none;">
                                    <div class="spinner-border text-success" role="status">
                                    </div>
                                </div>
                                <div class="d-flex flex-row-reverse">
                                    <div class="p-2">
                                        <Button class="btn btn-primary" type="button" data-bs-dismiss="modal"
                                            id="btn_cncl">Cancel</Button>
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
            <table id="tbl_automation_files" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Media Name</th>
                        <th>Duration</th>
                        {{-- <th>Functions</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($automation_list as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>/belt/{{ $item->automation_file }}</td>
                            <td>{{ $item->duration }}mins.</td>
                            {{-- <td>
                                <i class="bi bi-trash text-danger btn"></i>
                                <i class="bi bi-pencil-square text-info btn"></i>
                            </td> --}}
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
            $('#tbl_automation_files').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#btn_sbmt_prgrm').click(function(e) {
                e.preventDefault();
                $('#loadingSpinner').show();
                $('#btn_sbmt_prgrm').prop('disabled', true);
                $('#btn_cncl').prop('disabled', true);

                var automation_files = $('input[name="automation_file[]"]').prop('files');

                var formData = new FormData();
                formData.append('program_name', $('#program_name').val());
                formData.append('automation_episode', $('#automation_episode').val());
                // formData.append('automation_url', $('#automation_url').val());
                formData.append('automation_url', 'abcd');
                formData.append('file_repeat', $('#file_repeat').val());

                $.each(automation_files, function(i, file) {
                    formData.append('automation_file[]', file);
                });

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
                } else if (!$('#automation_episode').val()) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_prgrm').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'Episode is required.',
                        showConfirmButton: true
                    });
                } else if (automation_files.length === 0) {
                    $('#loadingSpinner').hide();
                    $('#btn_sbmt_prgrm').prop('disabled', false);
                    $('#btn_cncl').prop('disabled', false);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error',
                        text: 'At least 1 file must be selected.',
                        showConfirmButton: true
                    });
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('automation.store') }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data, status, xhr) {
                            var statusCode = xhr.status;
                            $('#loadingSpinner').hide();
                            $('#btn_sbmt_prgrm').prop('disabled', false);
                            $('#btn_cncl').prop('disabled', false);
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
                }
            });
        });
    </script>
@endsection
