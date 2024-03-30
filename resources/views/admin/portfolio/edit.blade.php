@extends('admin.layouts.admin')

@section('content')
    {{-- <div class="main-panel"> <div class="content-wrapper"> --}}
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Portfolio</h4>
                <div id="error-alert" class="alert alert-danger" style="display: none;"></div>

                <form class="forms-sample" id="portfolio-form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <p class="card-description"> Portfolio Details</p>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title" class="form-control"
                                            placeholder="Enter Project title" value="{{ $portfolio->title }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Url</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="project_url" class="form-control"
                                            placeholder="enter project url" value="{{ $portfolio->project_url }}"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" name="image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary"
                                            type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-control text-black" id="selectCat" name="cat_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $portfolio->category->name == "$category->name" ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- </div> </div> --}}
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#portfolio-form').on('submit', function(event) {
                event.preventDefault();

                const formData = new FormData(this);

                // Afficher le loader de SweetAlert2
                Swal.fire({
                    title: 'Chargement...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: '{{ route('admin.portfolio.update', $portfolio->id) }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        if (response == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Projet mis à jour avec succès',
                                showConfirmButton: false,
                                timer: 1500
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    window.location.href =
                                        '{{ route('admin.portfolio.index') }}'
                                }
                            });

                        }
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        const errors = xhr.responseJSON.errors;
                        let errorMessage = '';

                        if (errors) {
                            for (const key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    errorMessage += `<li>${errors[key][0]}</li>`;
                                }
                            }
                        } else {
                            errorMessage =
                                'Une erreur est survenue lors de la mise à jour du projet.';
                        }

                        $('#error-alert').html(`<ul>${errorMessage}</ul>`).show();

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: `<ul>${errorMessage}</ul>`
                        });
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
