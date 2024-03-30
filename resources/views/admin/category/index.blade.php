@extends('admin.layouts.admin')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Categories Records</h4>
                <a href="{{ route('admin.category.create') }}">
                    <button type="button" class="btn btn-primary btn-fw">Add New</button>
                </a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm me-1"
                                        onclick="location.href='{{ route('admin.category.edit', $category->id) }}';">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm delete-category"
                                        data-id="{{ $category->id }}">Delete</button>
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
            $('.delete-category').on('click', function() {
                const categoryId = $(this).data('id');
                Swal.fire({
                    title: 'Supprimer ?',
                    text: "Cette action est irreversible!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, Supprimé !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteCategory(categoryId);
                    }
                });
            });

            function deleteCategory(categoryId) {
                $.ajax({
                    url: '{{ route('admin.category.destroy', ':id') }}'.replace(':id', categoryId),
                    type: 'DELETE',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {

                        if (response == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Supprimé!',
                                text: 'La catégorie a été supprimé avec succès.',
                                showConfirmButton: false,
                                timer: 1500
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    window.location.reload();
                                }
                            });
                        } else {

                        }

                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Une erreur est survenue.',
                        });
                        console.error(error);
                    }
                });
            }
        });
    </script>
@endsection
