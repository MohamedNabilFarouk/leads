<!DOCTYPE html><html lang="en"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="{{$job->content}}">
<meta name="keywords" content="{{preg_replace('#\s+#',',',trim($job->title))}}">
<meta name="author" content="{{$job->title}}">
<meta name="robots" content="noindex, nofollow">
<title>Jobs - {{$job->title}}</title>

<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

@if(app()->getLocale()=='en')
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    @else
    <link rel="stylesheet" href="{{asset('assets/css/rtl_bootstrap.min.css')}}">
    @endif

<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    <style>
        .resp-sharing-button__link,
.resp-sharing-button__icon {
  display: inline-block
}

.resp-sharing-button__link {
  text-decoration: none;
  color: #fff;
  margin: 0.5em
}

.resp-sharing-button {
  border-radius: 5px;
  transition: 25ms ease-out;
  padding: 0.5em 0.75em;
  font-family: Helvetica Neue,Helvetica,Arial,sans-serif
}

.resp-sharing-button__icon svg {
  width: 1em;
  height: 1em;
  margin-right: 0.4em;
  vertical-align: top
}

.resp-sharing-button--small svg {
  margin: 0;
  vertical-align: middle
}

/* Non solid icons get a stroke */
.resp-sharing-button__icon {
  stroke: #fff;
  fill: none
}

/* Solid icons get a fill */
.resp-sharing-button__icon--solid,
.resp-sharing-button__icon--solidcircle {
  fill: #fff;
  stroke: none
}

.resp-sharing-button--twitter {
  background-color: #55acee
}

.resp-sharing-button--twitter:hover {
  background-color: #2795e9
}

.resp-sharing-button--pinterest {
  background-color: #bd081c
}

.resp-sharing-button--pinterest:hover {
  background-color: #8c0615
}

.resp-sharing-button--facebook {
  background-color: #3b5998
}

.resp-sharing-button--facebook:hover {
  background-color: #2d4373
}

.resp-sharing-button--tumblr {
  background-color: #35465C
}

.resp-sharing-button--tumblr:hover {
  background-color: #222d3c
}

.resp-sharing-button--reddit {
  background-color: #5f99cf
}

.resp-sharing-button--reddit:hover {
  background-color: #3a80c1
}

.resp-sharing-button--google {
  background-color: #dd4b39
}

.resp-sharing-button--google:hover {
  background-color: #c23321
}

.resp-sharing-button--linkedin {
  background-color: #0077b5
}

.resp-sharing-button--linkedin:hover {
  background-color: #046293
}

.resp-sharing-button--email {
  background-color: #777
}

.resp-sharing-button--email:hover {
  background-color: #5e5e5e
}

.resp-sharing-button--xing {
  background-color: #1a7576
}

.resp-sharing-button--xing:hover {
  background-color: #114c4c
}

.resp-sharing-button--whatsapp {
  background-color: #25D366
}

.resp-sharing-button--whatsapp:hover {
  background-color: #1da851
}

.resp-sharing-button--hackernews {
background-color: #FF6600
}
.resp-sharing-button--hackernews:hover, .resp-sharing-button--hackernews:focus {   background-color: #FB6200 }

.resp-sharing-button--vk {
  background-color: #507299
}

.resp-sharing-button--vk:hover {
  background-color: #43648c
}

.resp-sharing-button--facebook {
  background-color: #3b5998;
  border-color: #3b5998;
}

.resp-sharing-button--facebook:hover,
.resp-sharing-button--facebook:active {
  background-color: #2d4373;
  border-color: #2d4373;
}

.resp-sharing-button--twitter {
  background-color: #55acee;
  border-color: #55acee;
}

.resp-sharing-button--twitter:hover,
.resp-sharing-button--twitter:active {
  background-color: #2795e9;
  border-color: #2795e9;
}

.resp-sharing-button--email {
  background-color: #777777;
  border-color: #777777;
}

.resp-sharing-button--email:hover,
.resp-sharing-button--email:active {
  background-color: #5e5e5e;
  border-color: #5e5e5e;
}

.resp-sharing-button--linkedin {
  background-color: #0077b5;
  border-color: #0077b5;
}

.resp-sharing-button--linkedin:hover,
.resp-sharing-button--linkedin:active {
  background-color: #046293;
  border-color: #046293;
}

.resp-sharing-button--whatsapp {
  background-color: #25D366;
  border-color: #25D366;
}

.resp-sharing-button--whatsapp:hover,
.resp-sharing-button--whatsapp:active {
  background-color: #1DA851;
  border-color: #1DA851;
}

.resp-sharing-button--telegram {
  background-color: #54A9EB;
}

.resp-sharing-button--telegram:hover {
  background-color: #4B97D1;}

    </style>
</head>
<body>

<div class="main-wrapper">

<div class="header">

<div class="header-left">
<a class="logo" href="{{url('/')}}">
<img src="{{url($client->photo)}}" width="40" height="40" alt>
</a>
</div>


<div class="page-title-box float-left">
<h3>{{$client->name}}</h3>
</div>


<ul class="nav user-menu">



<li class="nav-item dropdown has-arrow flag-nav">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" role="button">
                    @if(app()->getLocale()=='en')
                        <img src="{{asset('assets/img/flags/us.png')}}" alt="" height="20"> <span>  English  </span>
                    @else
                        <img src="{{asset('assets/img/flags/sa.png')}}" alt="" height="20"> <span>  Arabic  </span>

                    @endif
                </a>
                <form action="{{route('setLang')}}" method='post' id='LangForm'>
                    @csrf
                <div class="dropdown-menu dropdown-menu-right">
                    {{-- <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" class="dropdown-item">
                        <img src="{{asset('assets/img/flags/us.png')}}" alt="" height="16"> English
                    </a> --}}
                    {{-- <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" class="dropdown-item">
                        <img src="{{asset('assets/img/flags/sa.png')}}" alt="" height="16"> Arabic
                    </a> --}}
                    <input type="hidden" id="lang" name="lang">
                    <a href="javascript: $('#lang').val('en'); $('#LangForm').submit();"  id='en' class="dropdown-item">
                        <img src="{{asset('assets/img/flags/us.png')}}" alt="" height="16"> English
                    </a>
                    <a href="javascript: $('#lang').val('ar'); $('#LangForm').submit();"  id='ar' class="dropdown-item">
                        <img src="{{asset('assets/img/flags/sa.png')}}" alt="" height="16"> Arabic
                    </a>

                </div>
            </form>
            </li>


</ul>

</div>


<div class="page-wrapper job-wrapper">

<div class="content container">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">{{__("Jobs")}}</h3>

</div>
</div>
</div>

<div class="row">
<div class="col-md-8">
<div class="job-info job-widget">
<h3 class="job-title">@if(app()->getLocale() == "en") {{$job->title}} @else {{$job->title_ar}} @endif</h3>
<span class="job-dept">@if(app()->getLocale() == "en") {{$job->category->title}} @else {{$job->category->title_ar}} @endif</span>
<ul class="job-post-det">
<!-- Sharingbutton Facebook -->
<a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u={{urlencode(Request::url())}}" target="_blank" rel="noopener" aria-label="">
  <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/></svg>
    </div>
  </div>
</a>

<!-- Sharingbutton Twitter -->
<a class="resp-sharing-button__link" href="https://twitter.com/intent/tweet/?text={{urlencode($job->title)}}&amp;url={{urlencode(Request::url())}}" target="_blank" rel="noopener" aria-label="">
  <div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z"/></svg>
    </div>
  </div>
</a>

<!-- Sharingbutton E-Mail -->
<a class="resp-sharing-button__link" href="mailto:?subject={{urlencode($job->title)}}&amp;body={{urlencode(Request::url())}}" target="_self" rel="noopener" aria-label="">
  <div class="resp-sharing-button resp-sharing-button--email resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22 4H2C.9 4 0 4.9 0 6v12c0 1.1.9 2 2 2h20c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zM7.25 14.43l-3.5 2c-.08.05-.17.07-.25.07-.17 0-.34-.1-.43-.25-.14-.24-.06-.55.18-.68l3.5-2c.24-.14.55-.06.68.18.14.24.06.55-.18.68zm4.75.07c-.1 0-.2-.03-.27-.08l-8.5-5.5c-.23-.15-.3-.46-.15-.7.15-.22.46-.3.7-.14L12 13.4l8.23-5.32c.23-.15.54-.08.7.15.14.23.07.54-.16.7l-8.5 5.5c-.08.04-.17.07-.27.07zm8.93 1.75c-.1.16-.26.25-.43.25-.08 0-.17-.02-.25-.07l-3.5-2c-.24-.13-.32-.44-.18-.68s.44-.32.68-.18l3.5 2c.24.13.32.44.18.68z"/></svg>
    </div>
  </div>
</a>

<!-- Sharingbutton LinkedIn -->
<a class="resp-sharing-button__link" href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{urlencode(Request::url())}}&amp;title={{urlencode($job->title)}}&amp;summary={{urlencode($job->title)}}&amp;source={{urlencode(Request::url())}}" target="_blank" rel="noopener" aria-label="">
  <div class="resp-sharing-button resp-sharing-button--linkedin resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6.5 21.5h-5v-13h5v13zM4 6.5C2.5 6.5 1.5 5.3 1.5 4s1-2.4 2.5-2.4c1.6 0 2.5 1 2.6 2.5 0 1.4-1 2.5-2.6 2.5zm11.5 6c-1 0-2 1-2 2v7h-5v-13h5V10s1.6-1.5 4-1.5c3 0 5 2.2 5 6.3v6.7h-5v-7c0-1-1-2-2-2z"/></svg>
    </div>
  </div>
</a>

<!-- Sharingbutton WhatsApp -->
<a class="resp-sharing-button__link" href="whatsapp://send?text={{urlencode($job->title)}}.%20{{urlencode(Request::url())}}" target="_blank" rel="noopener" aria-label="">
  <div class="resp-sharing-button resp-sharing-button--whatsapp resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20.1 3.9C17.9 1.7 15 .5 12 .5 5.8.5.7 5.6.7 11.9c0 2 .5 3.9 1.5 5.6L.6 23.4l6-1.6c1.6.9 3.5 1.3 5.4 1.3 6.3 0 11.4-5.1 11.4-11.4-.1-2.8-1.2-5.7-3.3-7.8zM12 21.4c-1.7 0-3.3-.5-4.8-1.3l-.4-.2-3.5 1 1-3.4L4 17c-1-1.5-1.4-3.2-1.4-5.1 0-5.2 4.2-9.4 9.4-9.4 2.5 0 4.9 1 6.7 2.8 1.8 1.8 2.8 4.2 2.8 6.7-.1 5.2-4.3 9.4-9.5 9.4zm5.1-7.1c-.3-.1-1.7-.9-1.9-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.1-.2.2-.3.2-.6.1s-1.2-.5-2.3-1.4c-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6s.3-.3.4-.5c.2-.1.3-.3.4-.5.1-.2 0-.4 0-.5C10 9 9.3 7.6 9 7c-.1-.4-.4-.3-.5-.3h-.6s-.4.1-.7.3c-.3.3-1 1-1 2.4s1 2.8 1.1 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.7-.7 1.9-1.3.2-.7.2-1.2.2-1.3-.1-.3-.3-.4-.6-.5z"/></svg>
    </div>
  </div>
</a>

<!-- Sharingbutton Telegram -->
<a class="resp-sharing-button__link" href="https://telegram.me/share/url?text={{urlencode($job->title)}}&amp;url={{urlencode(Request::url())}}" target="_blank" rel="noopener" aria-label="">
  <div class="resp-sharing-button resp-sharing-button--telegram resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M.707 8.475C.275 8.64 0 9.508 0 9.508s.284.867.718 1.03l5.09 1.897 1.986 6.38a1.102 1.102 0 0 0 1.75.527l2.96-2.41a.405.405 0 0 1 .494-.013l5.34 3.87a1.1 1.1 0 0 0 1.046.135 1.1 1.1 0 0 0 .682-.803l3.91-18.795A1.102 1.102 0 0 0 22.5.075L.706 8.475z"/></svg>
    </div>
  </div>
</a>


</ul>
</div>
<div class="job-content job-widget">
<div class="job-desc-title"><h4>{{__("Job Description")}}</h4></div>
<div class="job-description">
<p>@if(app()->getLocale() == "en") {{$job->content}} @else {{$job->content_ar}} @endif</p>
</div>

</div>
</div>
<div class="col-md-4">
<div class="job-det-info job-widget">
<a class="btn job-btn" href="#" data-toggle="modal" data-target="#apply_job">{{__("Apply For This Job")}}</a>
<div class="info-list">
<span><i class="fa fa-bar-chart"></i></span>
<h5>{{__("Job Type")}}</h5>
<p> {{$job->job_type}}</p>
</div>
<div class="info-list">
<span><i class="fa fa-money"></i></span>
<h5>{{__("Salary")}}</h5>
<p>{{$job->salary_from}} - {{$job->salary_to}}</p>
</div>
<div class="info-list">
<span><i class="fa fa-ticket"></i></span>
<h5>{{__("Max Age")}}</h5>
<p>{{$job->max_age}}</p>
</div>
<div class="info-list">
<span><i class="fa fa-suitcase"></i></span>
<h5>{{__("Experience")}}</h5>
<p>{{$job->experience}} Years</p>
</div>

<div class="info-list">
<span><i class="fa fa-map-signs"></i></span>
<h5>{{__("Location")}}</h5>
<p> @if(app()->getLocale() == "en") {{$job->address}} @else {{$job->address_ar}} @endif</p>
</div>


</div>
</div>
</div>
</div>


<div class="modal custom-modal fade" id="apply_job" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">{{__('Add Your Details')}}</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<form method="post" enctype='multipart/form-data' action="{{url('apply_job')}}">
@csrf
<div class="form-group">
<input name="job_id" value="{{$job->id}}" type="hidden">

<label>{{__('Name')}}</label>
<input class="form-control" required name="name" type="text">
</div>
<div class="form-group">
<label>{{__('Mobile')}}</label>
<input class="form-control" required name="mobile" type="text">
</div>
<div class="form-group">
<label>{{__('Email Address')}}</label>
<input class="form-control" required name="email" type="text">
</div>
<div class="form-group">
<label>{{__('Message')}}</label>
<textarea name="message"  class="form-control"></textarea>
</div>
<div class="form-group">
<label>{{__('Upload your CV')}}</label>
<div class="custom-file">
<input type="file" accept="application/pdf" name="cv" required class="custom-file-input" id="cv_upload">
<label class="custom-file-label" for="cv_upload">{{__('Choose file')}}</label>
</div>
</div>
<div class="submit-section">
<button class="btn btn-primary submit-btn">{{__('Submit')}}</button>
</div>
</form>
</div>
</div>
</div>
</div>

</div>

</div>


    <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.ui.touch-punch.min.js')}}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    @if(app()->getLocale()=='en')
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    @else
    <script src="{{asset('assets/js/rtl_bootstrap.min.js')}}"></script>
    @endif

    <!-- Slimscroll JS -->
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>

    <!-- Select2 JS -->
    <script src="{{asset('assets/js/select2.min.js')}}"></script>

    <!-- Datetimepicker JS -->
    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/combodate.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

    <!-- Multiselect JS -->
    <script src="{{asset('assets/js/multiselect.min.js')}}"></script>

    <!-- Slimscroll JS -->
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>

    <!-- Custom JS -->
    <script src="{{asset('assets/js/app.js')}}"></script>

</body></html>