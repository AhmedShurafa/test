@extends('layouts.linkes')
@section('content')
<style>
    .subpages{
        height: 100%;
    }
</style>
<div class="container">
    <h3>All Services
        {{Auth::id()}}
    </h3>
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
        <div class="col">
            <div class="text-right mb-3">
                <a href="{{route('admin.services.add')}}" class="btn btn-light" style="color:#FFF;background:#00bcd4">
                    <i class="fa fa-plus"></i> Add Services
                </a>

                <a href="{{route('admin.home')}}" class="btn btn-light" style="color:#FFF;background:#8bc34a">Home</a>
            </div>

            <table class="table">
                <p class="btn btn-secondary mb-3 d-block text-left">My Services</p>
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">العنوان</th>
                    <th scope="col">Description</th>
                    <th scope="col">الوصف</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $value)
                    <tr>
                        <th scope="row">{{$value->id}}</th>
                        <th scope="row" style="width: 100px"><img src="{{asset($value->image)}}" alt="asd"></th>
                        <td>{{$value->title}}</td>
                        <td>{{$value->title_ar}}</td>
                        <td>{{$value->description}}</td>
                        <td>{{$value->description_ar}}</td>
                        <td>
                            <a href="{{route('admin.services.edit',$value->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>

                            <form style="display: inline-block"
                                action="{{route('admin.services.del',$value->id)}}"
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
        <div class="col">
            <table class="table">
                <p class="btn btn-warning d-block text-left mb-3 text-white" style="background-color: #9C27B0;">Clients</p>
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td><img src="{{asset($value->image)}}" alt="logo" style="width: 100px"></td>
                        <td>
                            <form style="display: inline-block"
                                  action="{{route('admin.client.del',$value->id)}}"
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
        <div class="col">
            <table class="table">
                <p class="btn btn-info d-block text-left mb-3" style="background-color: #26d9ac">Testimonials</p>
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">Company</th>
                    <th scope="col">الشركة</th>
                    <th scope="col">Description</th>
                    <th scope="col">الوصف</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($testimonials as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td><img src="{{asset($value->image)}}" alt="user" style="width: 100px;"></td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->name_ar}}</td>
                        <td>{{$value->company}}</td>
                        <td>{{$value->company_ar}}</td>
                        <td>{{$value->description}}</td>
                        <td>{{$value->description_ar}}</td>
                        <td>
                            <a href="{{route('admin.services.edit.test',$value->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>

                            <form style="display: inline-block"
                                action="{{route('admin.services.del.test',$value->id)}}"
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
