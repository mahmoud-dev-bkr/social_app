<div class="card-body">
    <!--begin::Row-->
    <div class="row g-3">
        <!--begin::Col-->
        <div class="col-md-12">
            <label for="validationCustom01" class="form-label">
                Username
            </label>
            <input type="text" class="form-control" id="validationCustom01" name="username" required
                value="{{ old('username', $user->username) }}" />
        </div>

        <div class="col-md-12">
            <label for="validationCustom02" class="form-label">
                email
            </label>
            <input type="text" class="form-control" id="validationCustom02" name="email" required
                value="{{ old('email', $user->email) }}" />
            <div class="valid-feedback">Looks good!</div>
        </div>
        <div class="col-md-12">
            <label for="validationCustom03" class="form-label">
                mobile_number
            </label>
            <input type="text" class="form-control" id="validationCustom03" name="mobile_number" required
                value="{{ old('mobile_number', $user->mobile_number) }}" />
        </div>

        <div class="col-md-12">
            <label for="validationCustom04" class="form-label">
                password
            </label>
            <input type="password" class="form-control" id="validationCustom04" name="password" {{ $user->id  ? '' : 'required' }}
                value="{{ old('password') }}" placeholder="If you do not want to change your password, leave it blank" />
            <div class="valid-feedback">Looks good!</div>
        </div>




        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>
