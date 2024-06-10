@extends('admin.layouts.main')

@section('content')
   <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Email</th>
                <th>Update</th>
                <th style="width: 85px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->updated_at }}</td>
                <td class="justify-content-center">
                    <a class="btn btn-warning btn-sm" href="/users/edit/{{ $user->id }}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="" 
                        onclick="removeRow({{ $user->id }}, '/users/destroy')">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
   </table>
        <div class="d-flex justify-content-center">
            {{$users->links()}}
        </div>
@endsection