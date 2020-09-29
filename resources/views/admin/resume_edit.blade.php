@extends('layouts.linkes')
@section('content')
    <h1 class="text-center">Edit Information</h1>

    @php
        if(isset($edu))
            $id = $edu->id;
        elseif (isset($Exp))
            $id = $Exp->id;
        elseif (isset($skill))
            $id = $skill->id;
        else
            $id = $M_skill->id;
    @endphp
    <div class="container">
        @if (session('success'))
            <div class="col-sm-12">
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <form action="{{ route('admin.resume.update',$id )}}" method="POST">

            @csrf
            <div class="form-row">
                <!-- Start Add Education -->
                @if(isset($edu))
                    <div class="col-md-6 card p-2 m-auto">
                        <h2 class="btn-primary">Education</h2>

                        <div class="form-group">
                            <p for="inputName">Name Education</p>
                            <input type="text" class="form-control" name="N_edu" value="{{$edu->title}}" id="inputName" placeholder="Name Education">
                        </div>

                        <div class="form-group">
                            <p>الاسم بالعربي</p>
                            <input type="text" class="form-control" name="N_edu_ar" value="{{$edu->title_ar}}" placeholder="الاسم بالعربي">
                        </div>

                        <div class="form-group">
                            <p for="inputYear">Year Education</p>
                            <input type="text" class="form-control" name="Y_edu" value="{{$edu->year}}" id="inputYear" placeholder="Your Education">
                        </div>

                        <div class="form-group">
                            <p for="inputCompany">Name Company</p>
                            <input type="text" class="form-control" name="C_edu" value="{{$edu->company}}" id="inputCompany" placeholder="Company Education">
                        </div>

                        <div class="form-group">
                            <p>اسم الشركة بالعربي</p>
                            <input type="text" class="form-control" name="C_edu_ar" value="{{$edu->company_ar}}" placeholder="اسم الشركة بالعربي">
                        </div>

                        <div class="form-group">
                            <p for="inputDesc">Description Education</p>
                            <textarea class="form-control" name="D_edu"
                            id="inputDesc"placeholder="Description Education...">{{$edu->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <p>وصف العربي</p>
                            <textarea class="form-control" name="D_edu_ar"
                            id="inputDesc"placeholder="وصف العربي...">{{$edu->description_ar}}</textarea>
                        </div>
                    </div>
                @endif
                <!-- End Add Education -->

                @if(isset($Exp))
                <!-- Start Add Experience -->
                <div class="col-md-6 card p-2 m-auto">
                    <h2 class="btn btn-success text-left mb-3">Experience</h2>
                    <div class="form-group">
                        <p for="inputName">Name Experience</p>
                        <input type="text" id="inputName" class="form-control" value="{{$Exp->title}}" name="N_exp" placeholder="Name Experience">
                    </div>

                    <div class="form-group">
                        <p>اسم الخبرة</p>
                        <input type="text" id="inputName" class="form-control" name="N_exp_ar" value="{{$Exp->title_ar}}" placeholder="اسم الخبرة">
                    </div>


                    <div class="form-group">
                        <p for="inputYear">Year Experience</p>
                        <input type="text" class="form-control" id="inputYear" value="{{$Exp->year}}" name="Y_exp" placeholder="Year Experience">
                    </div>

                    <div class="form-group">
                        <p for="inputCompany">Company Experience</p>
                        <input type="text" class="form-control" id="inputCompany" value="{{$Exp->company}}" name="C_exp" placeholder="Company Experience">
                    </div>

                    <div class="form-group">
                        <p>اسم الشركة </p>
                        <input type="text" class="form-control" id="inputCompany" value="{{$Exp->company_ar}}" name="C_exp_ar" placeholder="اسم الشركة">
                    </div>

                    <div class="form-group">
                        <p for="inputDesc">Description Experience</p>
                        <textarea class="form-control" id="inputDesc"
                        name="D_exp" placeholder="Description Experience">{{$Exp->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <p for="inputDesc_ar">وصف الخبرة</p>
                        <textarea class="form-control" id="inputDesc_ar" name="D_exp_ar" placeholder="وصف الخبرة ...">{{$Exp->description_ar}}</textarea>
                    </div>
                </div>
                @endif
                <!-- End Add Experience -->
            </div>

            <div class="mt-4 mb-4">
                <div class="form-row">
                    @if(isset($skill))
                        <div class="col-md-6 card p-2 m-auto">
                                <h3>Skills</h3>
                                <div class="form-group">
                                    <p for="inputDesc">Name Language</p>
                                    <input type="text" class="form-control" value="{{$skill->name}}" name="Job_name" placeholder="Your Language">
                                </div>

                                <div class="form-group">
                                    <p for="inputDesc_ar">اسم اللغة</p>
                                    <input type="text" class="form-control" value="{{$skill->name_ar}}" name="Job_name_ar" placeholder="اسم اللغة">
                                </div>

                                <div class="form-group">
                                    <p for="inputDesc">Value Language</p>
                                    <input type="text" class="form-control" name="Job_val" value="{{$skill->value}}" min="0" max="100" step="5" placeholder="Your Language Values">
                                </div>
                        </div>
                    @endif
                    @if(isset($M_skill))
                        <div class="col-md-6 card p-2 m-auto">
                                <h3>More</h3>
                                <div class="form-group">
                                    <p for="inputDesc">Name Language</p>
                                    <input type="text" class="form-control" value="{{$M_skill->name}}" name="More_name" placeholder="Your Language">
                                </div>

                                <div class="form-group">
                                    <p for="inputDesc">اسم اللغة الاخرى</p>
                                    <input type="text" class="form-control" value="{{$M_skill->name_ar}}" name="More_name_ar" placeholder="اسم اللغة الاخرى">
                                </div>

                                <div class="form-group">
                                    <p for="inputDesc">Value Language</p>
                                    <input type="text" class="form-control" value="{{$M_skill->value}}" name="More_val" min="0" max="100" step="5" placeholder="Your Language Values">
                                </div>
                        </div>
                    @endif
                </div>
            </div>
            <!-- Start Submit Filed -->
            <div class="form-group text-center">
                <div class="col">
                    <input type="submit" value="update" class="btn btn-primary">
                </div>
            </div>

        </form>
    </div>
@endsection
