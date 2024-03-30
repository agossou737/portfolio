@extends('admin.layouts.admin')

@section('content')
    {{-- <div class="main-panel"> <div class="content-wrapper"> --}}
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Mises à jour de la catégorie</h4>
                <div id="error-alert" class="alert alert-danger" style="display: none;"></div>

                <form class="forms-sample" id="categoryEdit">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <p class="card-description"> Details de la catégorie </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nom</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="enter category name" value="{{ $category->name }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary me-2">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
    {{-- </div> </div> --}}
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#categoryEdit').on('submit', function(event) {
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
                    url: '{{ route('admin.category.update', $category->id) }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        if (response == "success") {

                            Swal.fire({
                                icon: 'success',
                                title: 'Catégorie mise à jour avec succès',
                                showConfirmButton: false,
                                timer: 1500
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    window.location.href =
                                        '{{ route('admin.category.index') }}';
                                }
                            });
                        } else {

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
                                'Une erreur est survenue lors de la mise à jour de la catégorie.';
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
