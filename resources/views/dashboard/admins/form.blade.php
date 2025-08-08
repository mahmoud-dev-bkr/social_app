<div class="card-body">
    <!--begin::Row-->
    <div class="row g-3">
        <!--begin::Col-->
        <div class="col-md-12">
            <label for="validationCustom01" class="form-label">
                Username
            </label>
            <input type="text" class="form-control" id="validationCustom01" name="username" required
                value="{{ old('username', $admin->username) }}" />
        </div>

        <div class="col-md-12">
            <label for="validationCustom02" class="form-label">
                email
            </label>
            <input type="text" class="form-control" id="validationCustom02" name="email" required
                value="{{ old('email', $admin->email) }}" />
            <div class="valid-feedback">Looks good!</div>
        </div>
        <div class="col-md-12">
            <label for="validationCustom04" class="form-label">
                password
            </label>
            <input type="password" class="form-control" id="validationCustom04" name="password" {{ $admin->id  ? '' : 'required' }}
                value="{{ old('password') }}" placeholder="If you do not want to change your password, leave it blank" />
            <div class="valid-feedback">Looks good!</div>
        </div>




        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>
