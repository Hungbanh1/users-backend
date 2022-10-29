@extends('layouts.admin')
@section('content')
    <style>
        .table td,
        .table th {
            border-top: none
        }

    </style>

    <div id="content" class="container-fluid">
        <div class="card">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách Role</h5>

            </div>
            <div class="card-body">


                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>

                            <th scope="col">#</th>
                            <th scope="col">ID</th>

                            <th scope="col">Tên vai trò</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Các quyền</th>
                            <th scope="col">Chỉnh sửa</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $t = 0;
                        @endphp
                        @foreach ($roles as $role) 
                        {{-- {{dd($role)}} --}}

                         @php
                                $t++;
                            @endphp

                            <tr class="" >
                                <td>{{$t}}</td>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->desc}}</td>
                                <td class="w-50">
                                    {{-- @php
                                        $on =$role->list_roles;
                                        dd($on)
                                    @endphp --}}
                       @foreach ( $role->list_roles as $item)

                                    <span class="badge badge-success">{{$item->name}}</span>
                                     
                                @endforeach 
                                    
                                </td>
                               
                                <td>
                                    <a href="{{route('edit_role' , $role->id)}}" class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                        data-toggle="tooltip" data-placement="top" title="Edit" style="margin-left: 18%"><i
                                            class="fa fa-edit" ></i></a>
                                </td>
                                
                            </tr>
                        @endforeach





                    </tbody>

                </table>




            </div>
        </div>
    </div>
@endsection
