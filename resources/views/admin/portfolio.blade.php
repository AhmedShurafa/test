@extends('layouts.linkes')
@section('content')
<style>
    .subpages{
        height: 100%;
    }
</style>
<div class="container">
    <h3>All Portfolio</h3>
    @if (session('success'))
        <div class="col-sm-12">
            <div class="alert alert-success text-center" role="alert">
                {{ session('success') }}
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="col-sm-12">
            <div class="alert alert-danger text-center" role="alert">
                {{ session('error') }}
            </div>
        </div>
    @endif
    <div class="mb-3 text-right">
    <a href="{{route('admin.portfolio.add')}}" class="btn btn-light" style="color:#FFF;background:#00bcd4">Add Information</a>
    <a href="{{route('admin.home')}}" class="btn btn-light" style="color:#FFF;background:#8bc34a">Home</a>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <p class="alert alert-primary">Portfolio</p>
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Project</th>
                    <th scope="col">Name Project</th>
                    <th scope="col">اسم المشروع</th>
                    <th scope="col">Type</th>
                    <th scope="col">النوع</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($portfolio as $value)
                    <tr>
                        <th scope="row">{{$value->id}}</th>
                        <td><img src="{{asset($value->image)}}" width="300px" alt=""></td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->name_ar}}</td>
                        <td>{{$value->type}}</td>
                        <td>
                            @if($value->type_ar =='media')
                                ميديا
                            @elseif($value->type_ar =='illustration')
                                صورة
                            @else
                                فيديو
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.portfolio.edit',$value->id)}}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>

                            <form style="display: inline-block"
                                  action="{{route('admin.portfolio.del',$value->id)}}"
                                  method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger text-right pr-2 pl-2"
                                        style="padding-left: 0px;">
                                    <i class="fa fa-trash-o m-r-5 float-right"></i>   حذف
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
