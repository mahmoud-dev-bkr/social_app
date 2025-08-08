@extends('dashboard.layout.master')

@section('content')
    <div class="card card-info card-outline mb-4">
        <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">
                Update User
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form class="needs-validation" novalidate action="{{ route('admin.users.update', $user->id) }}" method="post">
            @csrf
            @method('put')
            <!--begin::Body-->
            @include('dashboard.layout.shared.alert')
            
            @include('dashboard.users.form')
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer">
                <button class="btn btn-info" type="submit">Submit form</button>
            </div>
            <!--end::Footer-->
        </form>
        <!--end::Form-->
        <!--begin::JavaScript-->

        <!--end::JavaScript-->
    </div>
@endsection

@section('js')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict';

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation');

            // Loop over them and prevent submission
            Array.from(forms).forEach((form) => {
                form.addEventListener(
                    'submit',
                    (event) => {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }

                        form.classList.add('was-validated');
                    },
                    false,
                );
            });
        })();
    </script>
@endsection
