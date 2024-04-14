@extends('layouts.main')

@section('content')
   <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Name</th>
                <th>Update</th>
                <th style="width: 150px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Functions::category($categories) !!}
        </tbody>
   </table>
        <div class="d-flex justify-content-center">
            {{$categories->links()}}
        </div>
@endsection