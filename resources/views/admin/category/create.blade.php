@extends('admin.layouts.admin')

@section('content')
    {{--
<div class="main-panel">
    <div class="content-wrapper"> --}}
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New Category</h4>
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                {{-- <p class="card-description"> Basic form elements </p> --}}
                <form class="forms-sample" id="categoryCreate" {{-- method="POST" action="{{ route('admin.category.store') }}" --}}>
                    @csrf
                    <div class="form-group">
                        <p class="card-description"> Category Details </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="enter category name" value="{{ old('name') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
    {{-- </div>
</div> --}}

@endsection

@section('scripts')
    <script>
        // Déclaration des variables
        const form = $('.forms-sample');
        const submitButton = form.find('button[type="submit"]');

        // Ajout d'un événement sur le formulaire
        form.on('submit', function(event) {
            event.preventDefault(); // Empêcher l'envoi du formulaire

            const formData = new FormData(this);
            formData.set('_token', '{{ csrf_token() }}');

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
                url: '{{ route('admin.category.store') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Traitement de la réponse réussie
                    Swal.fire({
                        icon: 'success',
                        title: 'Catégorie ajoutée avec succès',
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log(response);
                            // Réinitialiser le formulaire après le succès
                            form[0].reset();
                            window.location.href = "{{ route('admin.category.index') }}";
                        }
                    });
                },
                error: function(xhr, status, error) {
                    // Traitement de l'erreur
                    const errors = xhr.responseJSON.errors;
                    let errorMessage = '';

                    if (errors) {
                        for (const key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                errorMessage += `<li>${errors[key][0]}</li>`;
                            }
                        }
                    } else {
                        errorMessage = 'Une erreur est survenue lors de l\'ajout de la catégorie.';
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: `<ul>${errorMessage}</ul>`
                    });
                    console.error(error);
                }
            });
        });
    </script>
@endsection
