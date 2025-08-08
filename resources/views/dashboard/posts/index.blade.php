@extends('dashboard.layout.master')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Posts List</h3>
            <div class="card-tools">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                    +
                </a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>User</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Contact Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resources as $get)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ optional($get->user)->username }}</td>
                            <td>{{ $get->title }}</td>
                            <td>{{ Illuminate\Support\Str::limit($get->description, 50, '..') }}</td>
                            <td>{{ $get->contact_phone }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.posts.edit', $get->id) }}" class="btn btn-primary">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.posts.block', $get->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-dark">
                                            {{ $get->is_block ? 'Unblock' : 'Block' }}
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.posts.destroy', $get->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-4">
                {{ $resources->links('dashboard.layout.shared.pagination') }}
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <!-- Display success/error messages -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
@endsection