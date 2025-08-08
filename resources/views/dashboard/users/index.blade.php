@extends('dashboard.layout.master')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Users List</h3>
            <div class="card-tools">
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
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
                        <th>username</th>
                        <th>email</th>
                        <th>mobile number</th>
                        <th>
                            action
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($resources as $get)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $get->username }}</td>
                            <td>{{ $get->email }}</td>
                            <td>{{ $get->mobile_number }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.users.edit', $get->id) }}" class="btn btn-primary">
                                        edit
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $get->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            delete
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
@endsection
