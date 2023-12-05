

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>HR - Faraj Almadina Hotel </title>

    <link rel="stylesheet" href="{{asset('assets/css/stylelight.css')}}">

    @php
        $url=request()->getHost();
         $urlrxplode=explode(".",$url);
        $getclient=DB::connection('general')->table('clients')->where('slug',$urlrxplode[0])->first();
    // dd($getclient)
    @endphp

</head>
<body>

<div class="main-wrapper">



    <div class="page-wrapper">

            <div class="content container-fluid">

                <div id="generatePdf">
                    <div id="printableArea" class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 m-b-20">
                                            @if($getclient == null)
                                           <img style="width:100px;" src="{{asset('assets/img/smartlogo.png')}}" class="inv-logo" alt="">
                                            @else
                                                @if(!$getclient->photo)
                                                    <img style="width:100px;" src="{{asset('smartlogo.png')}}" alt="{{$getclient->name}}">
                                                @else
                                                    <img style="width:100px;" src="{{asset($getclient->photo)}}" alt="{{$getclient->name}}" >

                                                @endif
                                            @endif
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-sm-12">
                                            <h2>Dear , {{$details['name']}}</h2>
                                            <h3>{{ $details['body'] }}</h3>
                                            <h3>{{ $details['body_ar']??'' }}</h3>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

</body>
</html>
