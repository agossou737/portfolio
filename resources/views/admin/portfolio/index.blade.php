@extends('admin.layouts.admin')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Portfolios</h4>
                <a href="{{ route('admin.portfolio.create') }}">
                    <button type="button" class="btn btn-primary btn-fw">Ajouter</button>
                </a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Titre</th>
                            <th>Categorie</th>
                            <th>Gérer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($portfolios as $portfolio)
                            <tr>
                                <td>{{ $portfolio->id }}</td>
                                <td><img src="{{ asset("$portfolio->image") }}" alt="image"></td>
                                <td>{{ $portfolio->title }}</td>
                                <td>{{ $portfolio->category->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm me-1"
                                        onclick="location.href='{{ route('admin.portfolio.edit', $portfolio->id) }}';">Modifier</button>
                                    <button type="button" class="btn btn-danger btn-sm delete-portfolio"
                                        data-id="{{ $portfolio->id }}">Supprimer</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.delete-portfolio').on('click', function() {
                const portfolioId = $(this).data('id');
                Swal.fire({
                    title: 'Êtes-vous sûr ?',
                    text: "Vous ne pourrez pas revenir en arrière !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimer !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deletePortfolio(portfolioId);
                    }
                });
            });

            function deletePortfolio(portfolioId) {
                $.ajax({
                    url: '{{ route('admin.portfolio.destroy', ':id') }}'.replace(':id', portfolioId),
                    type: 'DELETE',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Supprimé !',
                            text: 'Le portfolio a été supprimé.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Une erreur est survenue lors de la suppression du portfolio.',
                        });
                        console.error(error);
                    }
                });
            }
        });
    </script>
@endsection
