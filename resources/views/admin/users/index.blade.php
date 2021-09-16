@extends('layouts.app')

@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->

                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="row">
                                <div class="col-xl-12 col-md-12">
                                    <div class="card User-Activity">
                                        <div class="card-header">
                                            <h5>User</h5>
                                            <div class="card-header-right">
                                                <div id="exampleModalCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Add User</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <form id="validation-form123" method="POST" action="javascript:void(0)">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">

                                                                            <div class="form-group">
                                                                                <label>Name</label>
                                                                                <input type="text" name="name" class="form-control">
                                                                            </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Add</button>
                                            </div>
                                        </div>
                                        <div class="card-block pb-0">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Postion</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($users as $user)
                                                            <tr>
                                                                <td>{{ $user->name }}</td>
                                                                <td>{{ $user->role }}</td>
                                                                <td>
                                                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                                    <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display: inline-block;">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('DELETE') }}

                                                                        <div class="form-group">
                                                                            <button class="btn btn-danger delete-user"><i class="fas fa-trash-alt"></i></button>
                                                                        </div>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <!-- jquery-validation Js -->
    <script src="{{ asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
    <!-- form-picker-custom Js -->
    <script src="{{ asset('assets/js/pages/form-validation.js') }}"></script>

    <script src="{{ asset('assets/plugins/sweetalert/js/sweetalert.min.js') }}"></script>

    <script>
        $(document).ready( function (){
            $('#validation-form123').validate({
                submitHandler: function(form) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        data: $('form').serialize(),
                        url: '{{ route('roles.store') }}',
                        success: function (data) {
                            // console.log();
                            if (data == 200){
                                swal("Good job!", "You clicked the button!", "success").then(() => {
                                    location.reload();
                                });
                            }
                            else {
                                swal("Good job!", "You clicked the button!", "error");
                            }
                        }
                    });
                }
            });

            $('.delete-user').click(function(e){
                e.preventDefault() // Don't post the form, unless confirmed
                if (confirm('Are you sure?')) {
                    // Post the form
                    $(e.target).closest('form').submit() // Post the surrounding form
                }
            });

        });
    </script>
@endpush
