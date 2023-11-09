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
                                <div class="mb-3">
                                    <label for="automation_url" class="form-label frm_lbl">URL</label>
                                    <input type="text" class="form-control" id="automation_url">
                                </div>
                                <div class="mb-3">
                                    <label for="automation_file" class="form-label frm_lbl">Files</label>
                                    <input type="file" class="form-control" id="automation_file" name="automation_file[]"
                                        multiple accept=".mp3">
                                </div>
                                <div class="mb-3">
                                    <label for="file_repeat" class="form-label frm_lbl">Repeat</label>
                                    <select class="form-select" id="file_repeat">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="d-flex flex-row-reverse">
                                    <div class="p-2">
                                        <Button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</Button>
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
                        <th>Functions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($automation_list as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>/belt/{{ $item->automation_file }}</td>
                            <td>0.00</td>
                            <td>
                                <i class="bi bi-trash text-danger btn"></i>
                                <i class="bi bi-pencil-square text-info btn"></i>
                            </td>
                        </tr>
                    @empty
                        <td>1</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    {{-- <script>
        $(document).ready(function() {
            var table = $('#tbl_automation_files').DataTable({
                "processing": true,
                "serverSide": true, // Enable server-side processing
                "ajax": {
                    "url": '/admin/automation/list', // URL to your controller method
                    "type": "GET",
                },
                "columns": [{
                        "data": "automation_list.id"
                    },
                    {
                        "data": "automation_file"
                    },
                    {
                        "data": "duration",
                        "defaultContent": '0.00'
                    }, // Set the default value for the duration column
                    {
                        "data": null,
                        "render": function(data, type, full, meta) {
                            return '<i class="bi bi-trash text-danger btn"></i>&nbsp;' +
                                '<i class="bi bi-pencil-square btn text-info"></i>';
                        }
                    }
                ]
            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            $('#tbl_automation_files').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#btn_sbmt_prgrm').click(function(e) {
                e.preventDefault();

                var automation_files = $('input[name="automation_file[]"]').prop('files');

                var formData = new FormData();
                formData.append('program_name', $('#program_name').val());
                formData.append('automation_episode', $('#automation_episode').val());
                formData.append('automation_url', $('#automation_url').val());
                formData.append('file_repeat', $('#file_repeat').val());

                $.each(automation_files, function(i, file) {
                    formData.append('automation_file[]', file);
                });

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
