@extends('layouts.linkes')
@section('content')
    <h1 class="text-center">Add Portfolio</h1>
    <div class="container">
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li class="btn btn-danger text-left mb-1"> {{ $error }} </li>
                @endforeach
            </ul>
        @endif
        @if (session('success'))
            <div class="col-sm-12">
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <form action="{{route('admin.portfolio.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <!-- Start Add Education -->
                <div class="col-md-6 card p-2 m-auto">
                    <h2 class="alert alert-primary">Portfolio</h2>
                    <div class="form-group">
                        <p for="inputTitle">Name Project</p>
                        <input type="text" class="form-control" name="name" id="inputTitle" placeholder="Name Project">
                    </div>

                    <div class="form-group">
                        <p for="inputTitle_ar">اسم المشروع</p>
                        <input type="text" class="form-control" name="name_ar" id="inputTitle_ar" placeholder="اسم المشروع">
                    </div>


                    <div class="form-group">
                        <p for="Select">Type</p>
                        <select name="type" class="form-control form-control-lg" id="Select">
                            <option>...</option>
                            <option value="media" style="font-size: 18px">Media</option>
                            <option value="illustration" style="font-size: 18px">Illustration</option>
                            <option value="video" style="font-size: 18px">Video</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <p for="Select">نوع المشروع</p>
                        <select name="type_ar" class="form-control form-control-lg" id="Select">
                            <option>...</option>
                            <option value="media" style="font-size: 18px">ميديا </option>
                            <option value="illustration" style="font-size: 18px">صورة </option>
                            <option value="video" style="font-size: 18px">فيديو</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <p for="inputImage">Image</p>
                        <input type="file" class="form-control h-25" name="images[]" id="inputImage" multiple>
                    </div>

                </div>
                <!-- End Add Education -->
            </div>

            <!-- Start Submit Filed -->
            <div class="form-group text-center mt-3">
                <div class="col">
                    <input type="submit" value="Add" class="btn btn-primary">
                </div>
            </div>

        </form>
    </div>
@endsection
