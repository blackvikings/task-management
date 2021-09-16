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
                                            <h5>Tasks</h5>
                                            @role('admin')
                                                <div class="card-header-right">
                                                    <a class="btn btn-primary" href="{{ route('tasks.create') }}">Add task</a>
                                                </div>
                                            @endrole
                                        </div>
                                        <div class="card-block pb-0">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Description</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($tasks as $task)
                                                            <tr>
                                                                <td>{{ $task->users->name }}</td>
                                                                <td>{{ $task->description }}</td>
                                                                <td><a href="{{ asset($task->file_name) }}" download>Download the Zip</a></td>
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
            {{--$('#validation-form123').validate({--}}
            {{--    submitHandler: function(form) {--}}

            {{--        $.ajaxSetup({--}}
            {{--            headers: {--}}
            {{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
            {{--            }--}}
            {{--        });--}}

            {{--        $.ajax({--}}
            {{--            type: 'POST',--}}
            {{--            data: $('form').serialize(),--}}
            {{--            url: '{{ route('roles.store') }}',--}}
            {{--            success: function (data) {--}}
            {{--                // console.log();--}}
            {{--                if (data == 200){--}}
            {{--                    swal("Good job!", "You clicked the button!", "success").then(() => {--}}
            {{--                        location.reload();--}}
            {{--                    });--}}
            {{--                }--}}
            {{--                else {--}}
            {{--                    swal("Good job!", "You clicked the button!", "error");--}}
            {{--                }--}}
            {{--            }--}}
            {{--        });--}}
            {{--    }--}}
            {{--});--}}

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
