@extends('layouts.linkes')
@section('content')
    <h1 class="text-center">Add Information</h1>
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
        <form action="{{route('admin.resume.store')}}" method="POST">
            @csrf
            <div class="form-row">
                <!-- Start Add Education -->
                <div class="col-md-6 card p-2 float-left">
                    <h2 class="btn-primary">Education</h2>
                    <div class="form-group">
                        <p for="inputName">Name Education</p>
                        <input type="text" class="form-control" name="N_edu" id="inputName" placeholder="Name Education">
                    </div>

                    <div class="form-group">
                        <p>الاسم بالعربي</p>
                        <input type="text" class="form-control" name="N_edu_ar" placeholder="الاسم بالعربي">
                    </div>

                    <div class="form-group">
                        <p for="inputYear">Year Education</p>
                        <input type="text" class="form-control" name="Y_edu" id="inputYear" placeholder="Your Education">
                    </div>

                    <div class="form-group">
                        <p for="inputCompany">Name Company</p>
                        <input type="text" class="form-control" name="C_edu" id="inputCompany" placeholder="Company Education">
                    </div>

                    <div class="form-group">
                        <p>اسم الشركة بالعربي</p>
                        <input type="text" class="form-control" name="C_edu_ar" placeholder="اسم الشركة بالعربي">
                    </div>

                    <div class="form-group">
                        <p for="inputDesc">Description Education</p>
                        <textarea class="form-control" name="D_edu" id="inputDesc" placeholder="Description Education"></textarea>
                    </div>

                    <div class="form-group">
                        <p>وصف العربي</p>
                        <textarea class="form-control" name="D_edu_ar"
                        id="inputDesc"placeholder="وصف العربي..."></textarea>
                    </div>
                </div>
                <!-- End Add Education -->

                <!-- Start Add Experience -->
                <div class="col-md-6 card p-2">
                    <h2 class="btn btn-success text-left mb-3">Experience</h2>
                    <div class="form-group">
                        <p for="inputName">Name Experience</p>
                        <input type="text" id="inputName" class="form-control" name="N_exp" placeholder="Name Experience">
                    </div>

                    <div class="form-group">
                        <p>اسم الخبرة</p>
                        <input type="text" id="inputName" class="form-control" name="N_exp_ar" placeholder="اسم الخبرة">
                    </div>

                    <div class="form-group">
                        <p for="inputYear">Year Experience</p>
                        <input type="text" class="form-control" id="inputYear" name="Y_exp" placeholder="Year Experience">
                    </div>
                    <div class="form-group">
                        <p for="inputCompany">Company Experience</p>
                        <input type="text" class="form-control" id="inputCompany" name="C_exp" placeholder="Company Experience">
                    </div>

                    <div class="form-group">
                        <p>اسم الشركة </p>
                        <input type="text" class="form-control" id="inputCompany" name="C_exp_ar" placeholder="اسم الشركة">
                    </div>

                    <div class="form-group">
                        <p for="inputDesc">Description Experience</p>
                        <textarea class="form-control" id="inputDesc" name="D_exp" placeholder="Description Experience"></textarea>
                    </div>

                    <div class="form-group">
                        <p for="inputDesc_ar">وصف الخبرة</p>
                        <textarea class="form-control" id="inputDesc_ar" name="D_exp_ar" placeholder="وصف الخبرة ..."></textarea>
                    </div>
                </div>
                <!-- End Add Experience -->
            </div>

            <div class="mt-4 mb-5">
                <div class="form-row">
                    <div class="col-md-6 card p-2">
                            <h3>Skills</h3>
                            <div class="form-group">
                                <p for="inputDesc">Name Language</p>
                                <input type="text" class="form-control" name="Job_name" placeholder="Your Language">
                            </div>

                            <div class="form-group">
                                <p for="inputDesc_ar">اسم اللغة</p>
                                <input type="text" class="form-control" name="Job_name_ar" placeholder="اسم اللغة">
                            </div>

                            <div class="form-group">
                                <p for="inputDesc">Value Language</p>
                                <input type="text" class="form-control" name="Job_val" min="0" max="100" step="5" placeholder="Your Language Values">
                            </div>
                    </div>

                    <div class="col-md-6 card p-2">
                            <h3>More</h3>
                            <div class="form-group">
                                <p for="inputDesc">Name Language</p>
                                <input type="text" class="form-control" name="More_name" placeholder="Your Language">
                            </div>

                            <div class="form-group">
                                <p for="inputDesc">اسم اللغة الاخرى</p>
                                <input type="text" class="form-control" name="More_name_ar" placeholder="اسم اللغة الاخرى">
                            </div>

                            <div class="form-group">
                                <p for="inputDesc">Value Language</p>
                                <input type="text" class="form-control" name="More_val" min="0" max="100" step="5" placeholder="Your Language Values">
                            </div>
                    </div>
                </div>
            </div>
            <!-- Start Submit Filed -->
            <div class="form-group text-center">
                <div class="col">
                    <input type="submit" value="Add" class="btn btn-primary">
                </div>
            </div>

        </form>
    </div>
@endsection
