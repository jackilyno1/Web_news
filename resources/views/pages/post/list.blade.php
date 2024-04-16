@extends('layouts.main')

@section('content')
   <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Describe</th>
                <th>Content</th>
                <th>Update</th>
                <th style="width: 85px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $key => $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->post->name }}</td>
                <td>{{ $post->description }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->updated_at }}</td>
                <td class="justify-content-center">
                    <a class="btn btn-warning btn-sm" href="/admin/posts/edit/{{ $post->id }}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="" 
                        onclick="removeRow({{ $post->id }}, '/admin/posts/destroy')">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
   </table>
        <div class="d-flex justify-content-center">
            {{$posts->links()}}
        </div>
@endsection