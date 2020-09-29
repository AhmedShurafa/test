@extends('layouts.app')

    @if($user->info->color == 'css/main-teal.css')
        <p style="display: none;font-size: 0px">{{ $color = '#26D9AC' }}</p>
    @elseif($user->info->color == 'css/main-red.css')
        <p style="display: none;font-size: 0px">{{ $color = '#F44336' }}</p>
    @elseif($user->info->color == 'css/main-purple.css')
        <p style="display: none;font-size: 0px">{{ $color = '#AA00FF' }}</p>
    @elseif($user->info->color == 'css/main-pink.css')
        <p style="display: none;font-size: 0px">{{ $color = '#E91E63' }}</p>
    @elseif($user->info->color == 'css/main-orange.css')
        <p style="display: none;font-size: 0px">{{ $color = '#FF9800' }}</p>
    @elseif($user->info->color == 'css/main-lime.css')
        <p style="display: none;font-size: 0px">{{ $color = '#9dd100' }}</p>
    @elseif($user->info->color == 'css/main-light-blue.css')
        <p style="display: none;font-size: 0px">{{ $color = '#29B6F6' }}</p>
    @elseif($user->info->color == 'css/main-green.css')
        <p style="display: none;font-size: 0px">{{ $color = '#2eca7f' }}</p>
    @elseif($user->info->color == 'css/main-deep-purple.css')
        <p style="display: none;font-size: 0px">{{ $color = '#7e6df6' }}</p>
    @elseif($user->info->color == 'css/main-deep-orange.css')
        <p style="display: none;font-size: 0px">{{ $color = '#FF5722' }}</p>
    @elseif($user->info->color == 'css/main-blue.css')
        <p style="display: none;font-size: 0px">{{ $color = '#2196F3' }}</p>
    @elseif($user->info->color == 'css/main-amber.css')
        <p style="display: none;font-size: 0px">{{ $color = '#FFC107' }}</p>
    @endif
@section('content')

    <!-- Home Subpage -->

    <section class="pt-page" data-id="home">

        <div class="section-inner start-page-content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="photo">
                            <img src="{{asset($user->info->image)}}" alt="">
                        </div>
                    </div>

                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <div class="title-block">
                            <h1>
                                @if(App::isLocale('en'))
                                    {{$user->name}}
                                @else
                                    {{$user->name_ar}}
                                @endif
                            </h1>
                            <div class="owl-carousel text-rotation">
                                <div class="item">
                                    <div class="sp-subtitle">
                                        @if(App::isLocale('en'))
                                            {{$user->info->N_job}}
                                        @else
                                            {{$user->info->N_job_ar}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="social-links">
                            <a href="{{$user->info->twitter}}"><i class="fa fa-twitter"></i></a>
                            <a href="{{$user->info->facebook}}"><i class="fa fa-facebook"></i></a>
                            <a href="{{$user->info->insta}}"><i class="fa fa-instagram"></i></a>
                            <a href="{{$user->info->linked}}"><i class="fa fa-linkedin"></i></a>
                            <a href="{{$user->info->github}}"><i class="fa fa-github"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-content">
                <div class="row">

                    <div class="col-sm-6 col-md-6 col-lg-6 about">
                        <div class="about-me">
                            <div class="block-title">
                                @if(App::isLocale('en'))
                                    <h3>{{__('message.about')}} <span>Me</span></h3>
                                @else
                                    <h3>{{__('message.about')}} <span>عني</span></h3>
                                @endif
                            </div>
                            <p>
                                @if(App::isLocale('en'))
                                    {{$user->info->D_job}}
                                @else
                                    {{$user->info->D_job_ar}}
                                @endif
                            </p>
                        </div>

                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <ul class="info-list">
                            <li><span class="title">{{__('message.age')}} </span><span class="value">{{$user->info->age}}</span></li>
                            <li><span class="title">{{__('message.residence')}}</span><span class="value">{{App::isLocale('en') ? $user->info->residence : $user->info->residence_ar }}</span></li>
                            <li><span class="title">{{__('message.address')}}</span><span class="value">{{App::isLocale('en') ? $user->info->address : $user->info->address_ar}}</span></li>
                            <li><span class="title">{{__('message.mail')}}</span><span class="value"><a href="mailto:hazemlababidi96@gmail.com"></a>{{$user->email}}</span></li>
                            <li><span class="title">{{__('message.phone')}}</span><span class="value phone">{{$user->info->phone}}</span></li>
                            <li><span class="title">{{__('message.free')}}</span><span class="value available">
                                    {{ App::isLocale('en') ? ($user->info->free==1 ? 'Available':'Unavailable') : ($user->info->free==1 ? 'متاح':'غير متاح') }}
                                </span>
                            </li>
                            <li>
                                <span class="title">{{__('message.download')}}</span>

                                <span class="value">
                                    <button type="button" data-toggle="modal" data-target="#CV">{{__('message.code')}}</button>
                                </span>
                                <span class="block">
                                    @if (session('code'))
                                    <div class="col-sm-12">
                                        <div class="alert alert-danger mt-4 text-center" role="alert">
                                            {{ session('code') }}
                                        </div>
                                    </div>
                                @endif
                                </span>
                            </li>
                        </ul>

                    </div>

                </div>
            </div>
        </div>

    </section>
    <!-- End of Home Subpage -->

    <!-- Resume Subpage -->
    <section class="pt-page" data-id="resume">
        <div class="section-inner custom-page-content">
            <div class="page-header color-1">
                <h2>{{__('message.resume')}}</h2>
            </div>
            <div class="page-content">

                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="block">
                            <div class="block-title">
                                <h3>{{__('message.Edu')}}</h3>
                            </div>

                            <div class="timeline">
                            @if(App::isLocale('en'))
                            @foreach($edu as $Edu)
                                <!-- Education 1 -->
                                    <div class="timeline-item">
                                        <h4 class="item-title">{{$Edu->title}}</h4>
                                        <span class="item-period">{{$Edu->year}}</span>
                                        <span class="item-small">{{$Edu->company}}</span>
                                        <p class="item-description">{{$Edu->description}}</p>
                                    </div>
                                    <!-- / Education 1 -->
                            @endforeach
                            @else
                                @foreach($edu as $Edu)
                                    <!-- Education 1 -->
                                        <div class="timeline-item"  style="border-right-color: {{$color}} !important;">
                                            <h4 class="item-title">{{$Edu->title_ar}}</h4>
                                            <span class="item-period">{{$Edu->year}}</span>
                                            <span class="item-small">{{$Edu->company_ar}}</span>
                                            <p class="item-description">{{$Edu->description_ar}}</p>
                                        </div>
                                        <!-- / Education 1 -->
                                    @endforeach
                            @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="block">
                            <div class="block-title">
                                <h3>{{__('message.Exp')}}</h3>
                            </div>

                            <div class="timeline">
                            @if(App::isLocale('en'))
                            @foreach($exp as $Exp)
                                <!-- Experience 1 -->
                                    <div class="timeline-item">
                                        <h4 class="item-title">{{$Exp->title}}</h4>
                                        <span class="item-period">{{$Exp->year}}</span>
                                        <span class="item-small">{{$Exp->company}}</span>
                                        <p class="item-description">{{$Exp->description}}</p>
                                    </div>
                                    <!-- / Experience 1 -->
                            @endforeach
                            @else
                                @foreach($exp as $Exp)
                                    <!-- Experience 1 -->
                                        <div class="timeline-item">
                                            <h4 class="item-title">{{$Exp->title_ar}}</h4>
                                            <span class="item-period">{{$Exp->year}}</span>
                                            <span class="item-small">{{$Exp->company_ar}}</span>
                                            <p class="item-description">{{$Exp->description_ar}}</p>
                                        </div>
                                    <!-- / Experience 1 -->
                                @endforeach
                            @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="block">
                            <div class="block-title">
                                @if(App::isLocale('en'))
                                    <h3>{{__('message.Android_S')}} <span>Skills</span></h3>
                                @else
                                    <h3>المهارات الخاصة في تطبيقات <span> {{__('message.Android_S')}}</span></h3>
                                @endif
                            </div>

                            <div class="skills-info">
                                @foreach(App\Models\Skill::all() as $skill)
                                    @if(App::isLocale('en'))
                                        <h4>{{$skill->name}}</h4>
                                    @else
                                        <h4>{{$skill->name_ar}}</h4>
                                    @endif
                                    <div class="skill-container" style="height: 15px">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated skill-percentage"
                                            role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                            style="width: {{$skill->value}}%;height: 13px;
                                            background-color:{{ ($user->info->color ==='css/main-teal.css') ? '#26d9ac':''}}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="block">
                            <div class="block-title">
                                @if(App::isLocale('en'))
                                    <h3>{{__('message.M_Skills')}} <span>Skills</span></h3>
                                @else
                                    <h3>  المهارات<span> {{__('message.M_Skills')}} </span></h3>
                                @endif
                            </div>

                            <div class="skills-info">
                                @foreach(App\Models\M_Skill::all() as $Mskill)
                                    @if(App::isLocale('en'))
                                        <h4>{{$Mskill->name}}</h4>
                                    @else
                                        <h4>{{$Mskill->name_ar}}</h4>
                                    @endif
                                    <div class="skill-container"style="height: 15px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated skill-percentage"
                                            role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                            style="width: {{$Mskill->value}}%;height: 13px;
                                            background-color:{{ ($user->info->color ==='css/main-teal.css') ? '#26d9ac':''}}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Resume Subpage -->

    <!-- Services Subpage -->
    <section class="pt-page" data-id="services">
        <div class="section-inner custom-page-content">
            <div class="page-header color-1">
                <h2>{{__('message.services')}}</h2>
            </div>
            <div class="page-content">
                <!-- My Services -->
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="block-title">
                            @if(App::isLocale('en'))
                                <h3>My <span>{{__('message.services')}}</span></h3>
                            @else
                                <h3> <span>{{__('message.services')}}</span></h3>
                            @endif
                        </div>
                    </div>

                    @foreach(\App\Models\Services::all() as $value)
                        <div class="col-sm-6 col-md-3">
                            <div class="service-block">
                                <div class="service-info">
                                    <div class="service-image">
                                        <img src="{{asset($value->image)}}" alt="Responsive Design" class="mCS_img_loaded">
                                    </div>
                                    @if(App::isLocale('en'))
                                        <h4>{{$value->title}}</h4>
                                        <p>{{$value->description}}</p>
                                    @else
                                        <h4>{{$value->title_ar}}</h4>
                                        <p style="direction: ltr;">{{$value->description_ar}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <!-- End of My Services -->
                <!-- Clients -->
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="block-title">
                            <h3>{{__('message.client')}}</h3>
                        </div>
                        @foreach(\App\Models\Clients::all() as $value)
                            <div class="col-sm-4 col-md-2 subpage-block">
                                <div class="client-block">
                                    <a href="index.html#" target="_blank"><img src="{{asset($value->image)}}" alt="image" class="mCS_img_loaded"></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- End of Clients -->

                <!-- Testimonials -->
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="block-title">
                            <h3>{{__('message.test')}}</h3>
                        </div>

                        <div class="testimonials owl-carousel block">
                        @foreach(\App\Models\Testimonial::all() as $value)
                            <!-- Testimonial 1 -->
                                <div class="testimonial-item">
                                    <!-- Testimonial Author -->
                                    <div class="testimonial-credits">
                                        <!-- Picture -->
                                        <div class="testimonial-picture">
                                            <img src="{{asset($value->image)}}" alt="">
                                        </div>
                                        <!-- /Picture -->
                                        <!-- Testimonial author information -->
                                        <div class="testimonial-author-info">
                                            @if(App::isLocale('en'))
                                                <p class="testimonial-author">{{$value->name}}</p>
                                                <p class="testimonial-firm">{{$value->company}}</p>
                                            @else
                                                <p class="testimonial-author">{{$value->name_ar}}</p>
                                                <p class="testimonial-firm">{{$value->company_ar}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /Testimonial author information -->
                                    <!-- Testimonial Content -->
                                    <div class="testimonial-content">
                                        <div class="testimonial-text">
                                            @if(App::isLocale('en'))
                                                <p>"{{$value->description}}"</p>
                                            @else
                                                <p>"{{$value->description_ar}}"</p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /Testimonial Content -->
                                </div>
                                <!-- End of Testimonial 1 -->
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- End of Tesimonials -->
            </div>
        </div>
    </section>
    <!-- End of Services Subpage -->

    <!-- Portfolio Subpage -->
    <section class="pt-page" data-id="portfolio">
        <div class="section-inner custom-page-content">
            <div class="page-header color-1">
                <h2>{{__('message.portfolio')}}</h2>
            </div>
            <div class="page-content">

                <!-- Portfolio Content -->
                <div class="portfolio-content">

                    <!-- Portfolio filter -->
                    <ul id="portfolio_filters" class="portfolio-filters">
                        <li class="active">
                            <a class="filter btn btn-sm btn-link active" data-group="all"> {{__('message.all')}} </a>
                        </li>
                        <li>
                            <a class="filter btn btn-sm btn-link" data-group="media">{{__('message.media')}}</a>
                        </li>
                        <li>
                            <a class="filter btn btn-sm btn-link" data-group="illustration">{{__('message.illustration')}}</a>
                        </li>
                        <li>
                            <a class="filter btn btn-sm btn-link" data-group="video">{{__('message.video')}}</a>
                        </li>
                    </ul>
                    <!-- End of Portfolio filter -->

                    <!-- Portfolio Grid -->
                    <div id="portfolio_grid" class="portfolio-grid portfolio-masonry masonry-grid-3">

                    @foreach(\App\Models\Portfolio::all() as $vaule)
                        <!-- Portfolio Item 1 -->
                            <figure class="item" data-groups='["all", "{{$vaule->type}}"]'>
                                <a class="ajax-page-load" href="#">
                                    <img src="{{asset($vaule->image)}}" alt="">
                                    <div>
                                        @if(App::isLocale('en'))
                                            <h5 class="name">{{$vaule->name}}</h5>
                                            <small>{{$vaule->type}}</small>
                                        @else
                                            <h5 class="name">{{$vaule->name_ar}}</h5>
                                            <small>{{$vaule->type_ar}}</small>
                                        @endif
                                        <i class="fa fa-file-text-o"></i>
                                    </div>
                                </a>
                            </figure>
                            <!-- /Portfolio Item 1 -->
                        @endforeach
                    </div>
                    <!-- /Portfolio Grid -->

                </div>
                <!-- /Portfolio Content -->
            </div>
        </div>
    </section>
    <!-- /Portfolio Subpage -->

    <!-- Contact Subpage -->
    <section class="pt-page" data-id="contact">
        <div class="section-inner custom-page-content">
            <div class="page-header color-1">
                <h2>{{__('message.content')}}</h2>
            </div>
            <div class="page-content">

                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="block-title">
                            @if(App::isLocale('en'))
                                <h3>My <span>{{__('message.M_locat')}}</span></h3>
                            @else
                                <h3><span>{{__('message.M_locat')}}</span></h3>
                            @endif
                        </div>


                        <div class="contact-info-block">
                            <div class="ci-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="ci-text">
                                @if(App::isLocale('en'))
                                    <h5>{{$user->info->address}}</h5>
                                @else
                                    <h5>{{$user->info->address_ar}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="contact-info-block">
                            <div class="ci-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="ci-text">
                                <h5>{{$user->email}}</h5>
                            </div>
                        </div>
                        <div class="contact-info-block">
                            <div class="ci-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="ci-text">
                                <h5 class="phone">{{$user->info->phone}}</h5>
                            </div>
                        </div>
                        <div class="contact-info-block">
                            <div class="ci-icon">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="ci-text">

                                <h5>{{ App::isLocale('en') ? ($user->info->free==1 ? 'Freelance Available':' Freelance Unavailable') :
                                    ($user->info->free==1 ? 'للعمل الحر متاح':'للعمل الحر غير متاح') }}
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="block-title">
                                @if(App::isLocale('en'))
                                    <h3>  {{ __('message.cont_qr') }} <span>QR</span> </h3>
                                @else
                                    <h3> {{ __('message.cont_qr') }} <span>الكود</span></h3>
                                @endif

                        </div>
                        <img src="{{asset($user->info->QrImage)}}" width="300px" alt="">

{{--                        <form id="contact-form" method="post" action="">--}}

{{--                            <div class="messages"></div>--}}

{{--                            <div class="controls">--}}
{{--                                <div class="form-group form-group-with-icon">--}}
{{--                                    <i class="fa fa-user"></i>--}}
{{--                                    <label>Full Name</label>--}}
{{--                                    <input id="form_name" type="text" name="name" class="form-control" placeholder required="required" data-error="Name is required.">--}}
{{--                                        <div class="form-control-border"></div>--}}
{{--                                        <div class="help-block with-errors"></div>--}}
{{--                                        </div>--}}

{{--                                <div class="form-group form-group-with-icon">--}}
{{--                                    <i class="fa fa-envelope"></i>--}}
{{--                                    <label>Email Address</label>--}}
{{--                                    <input id="form_email" type="email" name="email" class="form-control" placeholder required="required" data-error="Valid email is required.">--}}
{{--                                        <div class="form-control-border"></div>--}}
{{--                                        <div class="help-block with-errors"></div>--}}
{{--                                        </div>--}}

{{--                                <div class="form-group form-group-with-icon">--}}
{{--                                    <i class="fa fa-comment"></i>--}}
{{--                                    <label>Message for Me</label>--}}
{{--                                    <textarea id="form_message" name="message" class="form-control" placeholder rows="4" required="required" data-error="Please, leave me a message."></textarea>--}}
{{--                                    <div class="form-control-border"></div>--}}
{{--                                    <div class="help-block with-errors"></div>--}}
{{--                                </div>--}}

{{--                                <div class="g-recaptcha" data-sitekey="6LdqmCAUAAAAAMMNEZvn6g4W5e0or2sZmAVpxVqI"></div>--}}

{{--                                <input type="submit" class="button btn-send" value="Send message">--}}
{{--                                    </div>--}}
{{--                        </form>--}}

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Subpage -->

@endsection
