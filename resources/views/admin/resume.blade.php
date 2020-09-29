@extends('layouts.linkes')
@section('content')
<style>
    .subpages{
        height: 100%;
    }
</style>
<div class="container">
    <h3>All Resume</h3>
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


    <div class="row">
        <div class="text-right mb-3">
            <a href="{{route('admin.resume.add')}}" class="btn btn-light" style="color:#FFF;background:#00bcd4">Add Information</a>
            <a href="{{route('admin.home')}}" class="btn btn-light" style="color:#FFF;background:#8bc34a">Home</a>
        </div>
        <div class="col-md-12">
            <table class="table">
                <p class="col-md-12 btn-primary">Education</p>
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">Year</th>
                    <th scope="col">Company</th>
                    <th scope="col">الشركة</th>
                    <th scope="col">Description</th>
                    <th scope="col">الوصف</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($edu as $value)
                    <tr>
                        <th scope="row">{{$value->id}}</th>
                        <td>{{$value->title}}</td>
                        <td>{{$value->title_ar}}</td>
                        <td>{{$value->year}}</td>
                        <td>{{$value->company}}</td>
                        <td>{{$value->company_ar}}</td>
                        <td>{{$value->description}}</td>
                        <td>{{$value->description_ar}}</td>
                        <td>
                            <a href="{{route('admin.resume.edit.edu',$value->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>

                            <form style="display: inline-block"
                                  action="{{route('admin.resume.del.edu',$value->id)}}"
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

        <div class="col-md-12">
            <table class="table">
                <p class="btn btn-success d-block text-left mb-3">Experiences</p>
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">Year</th>
                    <th scope="col">Company</th>
                    <th scope="col">الشركة</th>
                    <th scope="col">Description</th>
                    <th scope="col">الوصف</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($exp as $value)
                    <tr>
                        <th scope="row">{{$value->id}}</th>
                        <td>{{$value->title}}</td>
                        <td>{{$value->title_ar}}</td>
                        <td>{{$value->year}}</td>
                        <td>{{$value->company}}</td>
                        <td>{{$value->company_ar}}</td>
                        <td>{{$value->description}}</td>
                        <td>{{$value->description_ar}}</td>
                        <td>
                            <a href="{{route('admin.resume.edit.exp',$value->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>

                            <form style="display: inline-block"
                                  action="{{route('admin.resume.del.exp',$value->id)}}"
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

    <div class="row">

        <div class="col-md-6">
            <table class="table">
                <p class="btn btn-warning d-block text-left mb-3 font-weight-bold">Android Skills</p>
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">Value</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($skill as $value)
                    <tr>
                        <th scope="row">{{$value->id}}</th>
                        <td>{{$value->name}}</td>
                        <td>{{$value->name_ar}}</td>
                        <td>{{$value->value}}</td>
                        <td>
                            <a href="{{route('admin.resume.edit.skill',$value->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>

                            <form style="display: inline-block"
                                  action="{{route('admin.resume.del.skill',$value->id)}}"
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

        <div class="col-md-6">
            <table class="table">
                <p class="btn btn-info d-block text-left mb-3">More Skills</p>
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">Value</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($more as $value)
                    <tr>
                        <th scope="row">{{$value->id}}</th>
                        <td>{{$value->name}}</td>
                        <td>{{$value->name_ar}}</td>
                        <td>{{$value->value}}</td>
                        <td>
                            <a href="{{route('admin.resume.edit.more',$value->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>

                            <form style="display: inline-block"
                                action="{{route('admin.resume.del.more',$value->id)}}"
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
