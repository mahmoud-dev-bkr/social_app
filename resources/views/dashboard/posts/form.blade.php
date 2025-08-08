<div class="card-body">
    <!--begin::Row-->
    <div class="row g-3">
        <!--begin::Col-->
        <div class="col-md-12">
            <label for="validationCustom01" class="form-label">
                User
            </label>
            <select name="user_id" id="" class="form-control">
                <option value="">
                    Select User
                </option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $post->user_id ? 'selected' : '' }}>{{ $user->username }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12">
            <label for="validationCustom02" class="form-label">
                title
            </label>
            <input type="text" class="form-control" id="validationCustom02" name="title" required
                value="{{ old('title', $post->title) }}" />
            <div class="valid-feedback">Looks good!</div>
        </div>

        <div class="col-md-12">
            <label for="validationCustom02" class="form-label">
                Contact Phone
            </label>
            <input type="text" class="form-control" id="validationCustom02" name="contact_phone" required
                value="{{ old('contact_phone', $post->contact_phone) }}" />
            <div class="valid-feedback">Looks good!</div>
        </div>

        <div class="col-md-12">
            <label for="validationCustom03" class="form-label">
                description
            </label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ old('description', $post->description) }}</textarea>
        </div>
        
        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>
