@extends('admin.layouts.admin')

@section('content')
    {{--
<div class="main-panel">
    <div class="content-wrapper"> --}}
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">About me</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="forms-sample" id="aboutUpdate" {{-- method="POST" action="{{ route('admin.aboutme.update', $user->id) }}" --}} enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <p class="card-description"> Personal info </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" value="{{ $user->email }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="address"
                                        value="{{ $user->address }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Job</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="job" value="{{ $user->job }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Degree</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="degree" value="{{ $user->degree }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Experience</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="experience"
                                        value="{{ $user->experience }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Birth Day</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="birth_day"
                                        value="{{ $user->birth_day }}" />
                                </div>
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
                                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                </form>
            </div>
        </div>

        {{-- </div>
</div> --}}



    @endsection


    @section('scripts')
        <script>
            // Déclaration des variables
            const form = $('#aboutUpdate');
            const submitButton = form.find('button[type="submit"]');

            // Ajout d'un événement sur le formulaire
            form.on('submit', function(event) {
                event.preventDefault(); // Empêcher l'envoi du formulaire

                const formData = new FormData(this);
                formData.set('_method', 'PUT');
                formData.set('_token', '{{ csrf_token() }}');

                const fileInput = form.find('input[type="file"]');
                if (fileInput.length > 0 && fileInput[0].files.length > 0) {
                    formData.append('image', fileInput[0].files[0]);
                }

                // Afficher le loader de SweetAlert2
                Swal.fire({
                    title: 'Chargement...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Envoyer la requête Ajax
                $.ajax({
                    url: '{{ route('admin.aboutme.update', $user->id) }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Traitement de la réponse réussie
                        if (response == "success") {

                            Swal.fire({
                                icon: 'success',
                                title: 'Mise à jour réussie',
                                showConfirmButton: false,
                                timer: 1500
                            }).then((result) => {

                                if (result.dismiss === Swal.DismissReason.timer) {

                                    window.location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Une erreur est survenue lors de la mise à jour.'
                            });
                        }
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        // Traitement de l'erreur
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Une erreur est survenue lors de la mise à jour.'
                        });
                        console.error(error);
                    }
                });
            });
        </script>
    @endsection
