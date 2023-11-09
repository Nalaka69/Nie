@extends('app.admin.layout.app_left')
@section('title')
    AlphaU - Program Archive
@endsection

@section('adminbody')
    <div class="dashboard-title">
        <h5 class="mb-0 font_white">Program Content</h5>
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
                                Add Program Clip
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
                                    <label for="episode" class="form-label frm_lbl">Episode</label>
                                    <input type="number" class="form-control" id="episode">
                                </div>

                                <div class="mb-3">
                                    <label for="episode_date" class="form-label frm_lbl">Directory</label>
                                    <input type="date" class="form-control" id="episode_date">
                                </div>
                                <div class="mb-3">
                                    <label for="program_file" class="form-label frm_lbl">Files</label>
                                    <input type="file" class="form-control" id="program_file" name="program_file[]"
                                        multiple accept=".mp3">
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
            <table id="tbl_programs" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Media Name</th>
                        <th>Date</th>
                        <th>Functions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($program_file_list as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->program_file }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <i class="bi bi-trash text-danger btn"></i>
                                <i class="bi bi-pencil-square btn text-info"></i>
                            </td>
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
            $('#tbl_programs').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#btn_sbmt_prgrm').click(function(e) {
                e.preventDefault();

                var program_files = $('input[name="program_file[]"]').prop('files');

                var formData = new FormData();
                formData.append('program_name', $('#program_name').val());
                formData.append('episode', $('#episode').val());
                formData.append('episode_date', $('#episode_date').val());

                $.each(program_files, function(i, file) {
                    formData.append('program_file[]', file);
                });

                $.ajax({
                    type: 'POST',
                    url: '{{ route('program.store') }}',
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
            });
        });
    </script>
@endsection
