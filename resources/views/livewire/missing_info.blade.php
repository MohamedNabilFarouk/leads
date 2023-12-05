	<div>
    <!--POPUp Style-->
        <style media="screen">
.form-control[readonly]{
    background-color:#91949a;
}
.popup{
    display: block !important;
	direction: rtl;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0, 0.9);
    width: 100%;
    padding: 10% 10%;
    position: fixed;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
    border-radius: 8px;
    display: none;
    text-align: center;
	z-index: 2000;
}

.popup h2{
	margin-top: 40px;
	color: white;

}
.popup p{
    font-size: 14px;
    text-align: center;
    margin: 20px 0;
    line-height: 25px;
	color: white;
}

.popup table{color: white;}
.popup input {background-color: #000; color:white;}
.popup select{background-color: #000; color: white;}



/* Style tab links */
.tablink {
  background-color: #555;
  color: white;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 25%;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding: 20px 20px;
  height: 100%;
}

#Home{
    display: block;
}

    </style>


<div>

    <!-- Page Content -->
    <div class="content container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="welcome-box">
                    <div class="welcome-img">
                        <img style="width: 60px;height: 60px;" alt="" src="{{asset($user->photo)}}">
                    </div>
                    <div class="welcome-det">
                        <h3>{{__("Welcome")}}, {{$user->name}}</h3>
                        <p>{{$nowEmployee}}</p>
                    </div>
                </div>
            </div>
        </div>

        <a id="clearAll2"  class="clear-noti"> {{__("Clear All")}} </a>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <section class="dash-section">
                    <div class="dash-sec-content">

                        @foreach($activities as $activity)
                        <div class="dash-info-list">

                            <a href="{{url(''.$activity->activity->link)}}" class="dash-card text-danger">
                                <div class="dash-card-container">

                                    <div class="dash-card-content">
                                        <p>@if(app()->getLocale()== 'en'){{$activity->activity->description}} @else {{$activity->activity->description_ar}}  @endif</p>
                                    </div>

                                    <div class="dash-card-avatars">
                                        <div class="e-avatar"><img src="{{asset(@$activity->user->photo)}}"  style='width:40px; height:40px' alt=""></div>
                                    </div>

                                </div>
                            </a>

                        </div>
                        @endforeach


                    </div>
                </section>

            </div>

            <div class="col-lg-4 col-md-4">
                <div class="dash-sidebar">
                    <section>
                        <h5 class="dash-title">{{__("Replacement Request")}}</h5>
                        {{-- @dd(app()->getLocale()) --}}
                        @if($replacements->count()==0)
                            <div class="card">
                                <div class="card-body">
                                    <div class="time-list">
                                        <div class="dash-stats-list">
                                        <center>
                            <img style="width:20%;" src="{{asset('empty.png')}}">
                        </center>
                                            <h4></h4>
                                            <p></p>
                                        </div>
                                        <div class="dash-stats-list">
                                            <h4></h4>
                                            <p></p>
                                        </div>
                                    </div>


                                    <div class="request-btn">

                                    </div>

                                </div>
                            </div>
                            @else
                        @foreach($replacements as $replacement)

                        <div class="card">
                            <div class="card-body">
                                <div class="time-list">
                                    <div class="dash-stats-list">
                                        <h4>{{@$replacement->user->name}}</h4>
                                        <p>{{@$replacement->user->job->name}}</p>
                                    </div>
                                    <div class="dash-stats-list">
                                        <h4>{{\Carbon\Carbon::parse($replacement->period_from)->format('d/m/y')}}  </h4>
                                        <p>{{__("New Request")}}</p>
                                    </div>
                                </div>


                                <div class="request-btn">

                                    <button wire:click="changeEventApprove($event.target.value, {{$replacement->id}})" class="btn btn-primary">{{__("Approved")}}</button>
                                    <button wire:click="changeEventDeclined($event.target.value, {{$replacement->id}})" class="btn btn-primary">{{__("Declined")}}</button>

                                </div>

                            </div>
                        </div>
                        @endforeach
                        @endif
                    </section>



                    {{-- loan request --}}

                    <section>

                        <h5 class="dash-title">{{__("Loan Warranty Request")}}</h5>
                        @if($loan_as_warrantor->count()==0)
                            <div class="card">
                                <div class="card-body">
                                    <div class="time-list">
                                        <div class="dash-stats-list">
                                        <center>
                            <img style="width:20%;" src="{{asset('empty.png')}}">
                        </center>
                                            <h4></h4>
                                            <p></p>
                                        </div>
                                        <div class="dash-stats-list">
                                            <h4></h4>
                                            <p></p>
                                        </div>
                                    </div>


                                    <div class="request-btn">

                                    </div>

                                </div>
                            </div>
                            @else

                        @foreach($loan_as_warrantor as $loan)
                        <div class="card">
                            <div class="card-body">
                                <div class="time-list">
                                    <div class="dash-stats-list">
                                        <h4>{{$loan->user->name}}</h4>
                                        <p>{{$loan->user->job_title}}</p>
                                    </div>
                                    <div class="dash-stats-list">
                                        <h4>{{($loan->loan_explication)}} {{__('currency')}}  </h4>
                                        <p>{{$loan->payment_method}} - {{$loan->payment_date ?? $loan->payment_period}}</p>
                                    </div>
                                </div>


                                <div class="request-btn">

                                    <button wire:click="updateLoanStatus('warrantor_Approved', {{$loan->id}})" class="btn btn-primary">{{__("Approved")}}</button>
                                    <button wire:click="updateLoanStatus('warrantor_Declined', {{$loan->id}})" class="btn btn-primary">{{__("Declined")}}</button>

                                </div>

                            </div>
                        </div>
                        @endforeach
                        @endif
                    </section>



                    {{--end loan request  --}}

                    <section>
                        <h5 class="dash-title">{{__("Your Leave")}}</h5>
                        <div class="card">
                            <div class="card-body">
                                <div class="time-list">
                                    <div class="dash-stats-list">
                                        <h4>{{$leavesTakes}}</h4>
                                        <p>{{__("Leave Taken")}}</p>
                                    </div>
                                    @php
                                        $totalCost = 0;
                                    @endphp

                                    @foreach($leaves_count as $leaves_counts)
                                        @php
                                            $totalCost += $leaves_counts->leave_count;
                                        @endphp

                                    @endforeach
                                    <div class="dash-stats-list">
                                        <h4>

                                            <?php
                                            $sumleave= $leave_setting - $totalCost ;
                                            if($sumleave<0){
                                                echo 0;
                                            }else{
                                                echo $sumleave;
                                            }
                                            ?>

                                        </h4>
                                        <p>{{__("Remaining")}}</p>
                                    </div>
                                </div>
                                <div class="request-btn">
                                    <a class="btn btn-primary" href="{{url('leaves')}}">{{__("Show Leave")}}</a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section>
                        <h5 class="dash-title">{{__("Your OverTime This Month")}}</h5>
                        <div class="card">
                            <div class="card-body">
                                <div class="time-list">
                                    <div class="dash-stats-list">
                                        <h4>{{$overtimeApproved}} {{__("Hours")}}</h4>
                                        <p>{{__("Approved")}}</p>
                                    </div>
                                    <div class="dash-stats-list">
                                        <h4>{{$overtimeRemain}} {{__("Hours")}}</h4>
                                        <p>{{__("Overtime pending")}}</p>
                                    </div>
                                </div>
                                <div class="request-btn">
                                    <a class="btn btn-primary" href="{{url('/overtime')}}">{{__("Show Overtime")}}</a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section>
                        <h5 class="dash-title">{{__("Upcoming Holiday")}}</h5>
                        <div class="card">
                            <div class="card-body text-center">
                                @if($holiday !=NULL)
                                <h4 class="holiday-title mb-0">{{ \Carbon\Carbon::parse($holiday->date_from)->format('D d M Y')}}  -
                                    {{$holiday->title}}</h4>
                                @endif
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->
</div>



		<!--POPUp Code-->
    	<div class="popup">
            <div style="width:100%">
        <h2>تسجيل البيانات</h2>
        <p>
           برجاء إستكمل تسجيل البيانات المطلوبة لفتح النسخة التجريبية من سمارت أتش أر
        </p>


            <button class="tablink" onclick="openPage('Home', this, )" id="defaultOpen"> المنشآه العامة</button>
            <button class="tablink" onclick="openPage('News', this, )" >سجل المنشأة</button>
            <button class="tablink" onclick="openPage('Contact', this,)"> مكان العمل</button>

            <form  wire:submit.prevent="storeMissingInfo">

<div id="Home" class="tabcontent">

   <h3>اعدادات المنشآه العامة</h3>

			<section class="review-section information">

						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="table-responsive">
                                <form  id="step-one-form" enctype="multipart/form-data">

									<table class="table table-bordered table-nowrap  mb-0">
										<tbody>
											<tr>
												<td>

														<div class="form-group">
															<label for="name"> اسم المنشأة <span class="text-danger">*</span></label>

															<input  value="{{$client->company_name}}" name="company_name" type="text" class="form-control" @if($client->company_name) readonly @endif>
                                                            @error('company_name')
                                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                                            @enderror
														</div>
                                                    </form>
                                                    <form  id="upload-form-add">
                                                        @csrf
														<div class="form-group">
															<label for="photo">لوجو المنشآه <span class="text-danger">*</span></label><br>
                                                            <input class="form-control" type="file"  name="photo" accept="image/*" id="photo-input-add">
                                                            @error('photo')
                                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                                            @enderror
														</div>
                                                    </form>


												</td>
												<td>                                                                                                                                                                                                               <div class="form-group">
                                                    <form  id="step-one-form" enctype="multipart/form-data">
															<label>النشاط<span class="text-danger">*</span></label><br>
                                                            @if($client->company_business)
                                                            <input  value="{{$client->company_business}}" name="company_business" type="text" class="form-control" readonly >
                                                    @else
								                      		<select  name="company_business" value='{{$client->company_business}}' class="form-control" >
									                		<option>أختار النشاط</option>
									                		<option>التجارة</option>
									                		<option>المقاولات</option>
									                		<option>التشغيل والصيانة والنظافة للمنشأت</option>

                <option> العقارات والأراضي</option>
									                		<option>الصناعة والتعدين والتدوير</option>
									                		<option>الغاز والمياه والطاقة</option>
									                		<option>المناجم والبترول والمحاجر</option>
                <option>الاعلام والنشر والتوزيع</option>
									                		<option>الاتصالات وتقنية المعلومات</option>
									                		<option>الزراعة والصيد</option>
									                		<option>  الرعاية الصحية والنقاهة </option>

                <option> التعليم والتدريب </option>
									                		<option>التوظيف والاستقدام  </option>
									                		<option>الأمن والسلامة  </option>
									                		<option>النقل والبريد والتخزين  </option>
                <option>  المهن الاستشارية </option>
									                		<option>السياحة والمطاعم والفنادق وتنظيم المعارض   </option>
									                		<option>المالية والتمويل والتأمين  </option>
									                		<option>الخدمات الأخري </option>

								                 		</select>

                                                        @error('company_business')
                                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                                        @enderror
                                                        @endif
														</div>

														<div class="form-group">
															<label for="Country">عدد الموظفين<span class="text-danger">*</span></label><br>
                                                            @if($client->employees_number)
                                                            <input  value="{{$client->employees_number}}" name="employees_number" type="text" class="form-control" readonly >
                                                     @else
															<select wire:model.defer="employees_number" name="employees_number" class="form-control">
															<option value="1-9">1-9 </option>
															<option value="10-49">10-49</option>
															<option value="50-99">50-99 </option>
															<option value="100-199">100-199</option>
                                                            <option>200-499</option>
															<option>500-2999 </option>
															<option>+3000</option>
                                        					</select>
                                                            @error('employees_number')
                                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                                            @enderror
                                                            @endif
														</div>



												</td>

											</tr>
										</tbody>
									</table>
                                    </form>




								</div>
							</div>
						</div>
					</section>
			 <a id="stepOne">Next</a>


</div>

<div id="News" class="tabcontent ">
  <h3>سجل المنشأة</h3>

					<section class="review-section information">

<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="table-responsive">
                                <form  id="step-two-form">

									<table class="table table-bordered table-nowrap  mb-0">
										<tbody>
											<tr>
												<td>

														<div class="form-group">
															<label for="name"> رقم سجل المنشأة <span class="text-danger">*</span></label>

															<input value="{{$client->business_registration_number}}" name="business_registration_number" type="text" class="form-control" @if($client->business_registration_number) readonly @endif>
                                                            @error('business_registration_number')
                                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                                            @enderror
                                                        </div>


												</td>

											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="table-responsive">
									<table class="table table-bordered table-nowrap  mb-0">
										<tbody>
											<tr>
												<td>

														<div class="form-group">

															<label for="Country">البلد<span class="text-danger">*</span></label><br>
                                                            @if($client->country)
                                                            <input  value="{{$client->country}}" name="country" type="text" class="form-control" readonly >
                                                     @else

														<select wire:model.defer="country" name="country"  class="form-control" id="timezone">
                                                        <option>أختار البلد</option>
                                            <option value="-12">(UTC-12:00) International Date Line West</option>
                                            <option value="-11">(UTC-11:00) Coordinated Universal Time-11</option>
                                            <option value="-10">(UTC-10:00) Hawaii</option>
                                            <option value="-9">(UTC-09:00) Alaska</option>
                                            <option value="-7">(UTC-08:00) Baja California</option>
                                            <option value="-7">(UTC-07:00) Pacific Time (US &amp; Canada)</option>
                                            <option value="-8">(UTC-08:00) Pacific Time (US &amp; Canada)</option>
                                            <option value="-7">(UTC-07:00) Arizona</option>
                                            <option value="-6">(UTC-07:00) Chihuahua, La Paz, Mazatlan</option>
                                            <option value="-6">(UTC-07:00) Mountain Time (US &amp; Canada)</option>
                                            <option value="-6">(UTC-06:00) Central America</option>
                                            <option value="-5">(UTC-06:00) Central Time (US &amp; Canada)</option>
                                            <option value="-5">(UTC-06:00) Guadalajara, Mexico City, Monterrey</option>
                                            <option value="-6">(UTC-06:00) Saskatchewan</option>
                                            <option value="-5">(UTC-05:00) Bogota, Lima, Quito</option>
                                            <option value="-4">(UTC-05:00) Eastern Time (US &amp; Canada)</option>
                                            <option value="-4">(UTC-05:00) Indiana (East)</option>
                                            <option value="-4.5">(UTC-04:30) Caracas</option>
                                            <option value="-4">(UTC-04:00) Asuncion</option>
                                            <option value="-3">(UTC-04:00) Atlantic Time (Canada)</option>
                                            <option value="-4">(UTC-04:00) Cuiaba</option>
                                            <option value="-4">(UTC-04:00) Georgetown, La Paz, Manaus, San Juan</option>
                                            <option value="-4">(UTC-04:00) Santiago</option>
                                            <option value="-2.5">(UTC-03:30) Newfoundland</option>
                                            <option value="-3">(UTC-03:00) Brasilia</option>
                                            <option value="-3">(UTC-03:00) Buenos Aires</option>
                                            <option value="-3">(UTC-03:00) Cayenne, Fortaleza</option>
                                            <option value="-3">(UTC-03:00) Greenland</option>
                                            <option value="-3">(UTC-03:00) Montevideo</option>
                                            <option value="-3">(UTC-03:00) Salvador</option>
                                            <option value="-2">(UTC-02:00) Coordinated Universal Time-02</option>
                                            <option value="-1">(UTC-02:00) Mid-Atlantic - Old</option>
                                            <option value="0">(UTC-01:00) Azores</option>
                                            <option value="-1">(UTC-01:00) Cape Verde Is.</option>
                                            <option value="1">(UTC) Casablanca</option>
                                            <option value="0">(UTC) Coordinated Universal Time</option>
                                            <option value="0">(UTC) Edinburgh, London</option>
                                            <option value="1">(UTC+01:00) Edinburgh, London</option>
                                            <option value="1">(UTC) Dublin, Lisbon</option>
                                            <option value="0">(UTC) Monrovia, Reykjavik</option>
                                            <option value="2">(UTC+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                                            <option value="2">(UTC+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                                            <option value="2">(UTC+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                                            <option value="2">(UTC+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
                                            <option value="1">(UTC+01:00) West Central Africa</option>
                                            <option value="1">(UTC+01:00) Windhoek</option>
                                            <option value="3">(UTC+02:00) Athens, Bucharest</option>
                                            <option value="3">(UTC+02:00) Beirut</option>
                                            <option value="2">(UTC+02:00) Cairo</option>
                                            <option value="3">(UTC+02:00) Damascus</option>
                                            <option value="3">(UTC+02:00) E. Europe</option>
                                            <option value="2">(UTC+02:00) Harare, Pretoria</option>
                                            <option value="3">(UTC+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>
                                            <option value="3">(UTC+03:00) Istanbul</option>
                                            <option value="3">(UTC+02:00) Jerusalem</option>
                                            <option value="2">(UTC+02:00) Tripoli</option>
                                            <option value="3">(UTC+03:00) Amman</option>
                                            <option value="3">(UTC+03:00) Baghdad</option>
                                            <option value="3">(UTC+02:00) Kaliningrad</option>
                                            <option value="3">(UTC+03:00) Kuwait, Riyadh</option>
                                            <option value="3">(UTC+03:00) Nairobi</option>
                                            <option value="3">(UTC+03:00) Moscow, St. Petersburg, Volgograd, Minsk</option>
                                            <option value="4">(UTC+04:00) Samara, Ulyanovsk, Saratov</option>
                                            <option value="4.5">(UTC+03:30) Tehran</option>
                                            <option value="4">(UTC+04:00) Abu Dhabi, Muscat</option>
                                            <option value="5">(UTC+04:00) Baku</option>
                                            <option value="4">(UTC+04:00) Port Louis</option>
                                            <option value="4">(UTC+04:00) Tbilisi</option>
                                            <option value="4">(UTC+04:00) Yerevan</option>
                                            <option value="4.5">(UTC+04:30) Kabul</option>
                                            <option value="5">(UTC+05:00) Ashgabat, Tashkent</option>
                                            <option value="5">(UTC+05:00) Yekaterinburg</option>
                                            <option value="5">(UTC+05:00) Islamabad, Karachi</option>
                                            <option value="5.5">(UTC+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                                            <option value="5.5">(UTC+05:30) Sri Jayawardenepura</option>
                                            <option value="5.75">(UTC+05:45) Kathmandu</option>
                                            <option value="6">(UTC+06:00) Nur-Sultan (Astana)</option>
                                            <option value="6">(UTC+06:00) Dhaka</option>
                                            <option value="6.5">(UTC+06:30) Yangon (Rangoon)</option>
                                            <option value="7">(UTC+07:00) Bangkok, Hanoi, Jakarta</option>
                                            <option value="7">(UTC+07:00) Novosibirsk</option>
                                            <option value="8">(UTC+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                                            <option value="8">(UTC+08:00) Krasnoyarsk</option>
                                            <option value="8">(UTC+08:00) Kuala Lumpur, Singapore</option>
                                            <option value="8">(UTC+08:00) Perth</option>
                                            <option value="8">(UTC+08:00) Taipei</option>
                                            <option value="8">(UTC+08:00) Ulaanbaatar</option>
                                            <option value="8">(UTC+08:00) Irkutsk</option>
                                            <option value="9">(UTC+09:00) Osaka, Sapporo, Tokyo</option>
                                            <option value="9">(UTC+09:00) Seoul</option>
                                            <option value="9.5">(UTC+09:30) Adelaide</option>
                                            <option value="9.5">(UTC+09:30) Darwin</option>
                                            <option value="10">(UTC+10:00) Brisbane</option>
                                            <option value="10">(UTC+10:00) Canberra, Melbourne, Sydney</option>
                                            <option value="10">(UTC+10:00) Guam, Port Moresby</option>
                                            <option value="10">(UTC+10:00) Hobart</option>
                                            <option value="9">(UTC+09:00) Yakutsk</option>
                                            <option value="11">(UTC+11:00) Solomon Is., New Caledonia</option>
                                            <option value="11">(UTC+11:00) Vladivostok</option>
                                            <option value="12">(UTC+12:00) Auckland, Wellington</option>
                                            <option value="12">(UTC+12:00) Coordinated Universal Time+12</option>
                                            <option value="12">(UTC+12:00) Fiji</option>
                                            <option value="12">(UTC+12:00) Magadan</option>
                                            <option value="13">(UTC+12:00) Petropavlovsk-Kamchatsky - Old</option>
                                            <option value="13">(UTC+13:00) Nuku'alofa</option>
                                            <option value="13">(UTC+13:00) Samoa</option>
                                        </select>
                                        @error('country')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                        @endif
												</div>


												</td>
												<td>


														<div class="form-group">
															<label for="Country">العملة<span class="text-danger">*</span></label><br>
                                                            @if($client->currency)
                                                            <input  value="{{$client->currency}}" name="currency" type="text" class="form-control" readonly >
                                                         @else
															<select wire:model.defer="currency" name="currency" class="form-control" id="currency" >
                                                        <option>أختار العملة</option>
                                                        <option value="AFN">Afghan Afghani</option>
                                                        <option value="ALL">Albanian Lek</option>
                                                        <option value="DZD">Algerian Dinar</option>
                                                        <option value="AOA">Angolan Kwanza</option>
                                                        <option value="ARS">Argentine Peso</option>
                                                        <option value="AMD">Armenian Dram</option>
                                                        <option value="AWG">Aruban Florin</option>
                                                        <option value="AUD">Australian Dollar</option>
                                                        <option value="AZN">Azerbaijani Manat</option>
                                                        <option value="BSD">Bahamian Dollar</option>
                                                        <option value="BHD">Bahraini Dinar</option>
                                                        <option value="BDT">Bangladeshi Taka</option>
                                                        <option value="BBD">Barbadian Dollar</option>
                                                        <option value="BYR">Belarusian Ruble</option>
                                                        <option value="BEF">Belgian Franc</option>
                                                        <option value="BZD">Belize Dollar</option>
                                                        <option value="BMD">Bermudan Dollar</option>
                                                        <option value="BTN">Bhutanese Ngultrum</option>
                                                        <option value="BTC">Bitcoin</option>
                                                        <option value="BOB">Bolivian Boliviano</option>
                                                        <option value="BAM">Bosnia-Herzegovina Convertible Mark</option>
                                                        <option value="BWP">Botswanan Pula</option>
                                                        <option value="BRL">Brazilian Real</option>
                                                        <option value="GBP">British Pound Sterling</option>
                                                        <option value="BND">Brunei Dollar</option>
                                                        <option value="BGN">Bulgarian Lev</option>
                                                        <option value="BIF">Burundian Franc</option>
                                                        <option value="KHR">Cambodian Riel</option>
                                                        <option value="CAD">Canadian Dollar</option>
                                                        <option value="CVE">Cape Verdean Escudo</option>
                                                        <option value="KYD">Cayman Islands Dollar</option>
                                                        <option value="XOF">CFA Franc BCEAO</option>
                                                        <option value="XAF">CFA Franc BEAC</option>
                                                        <option value="XPF">CFP Franc</option>
                                                        <option value="CLP">Chilean Peso</option>
                                                        <option value="CNY">Chinese Yuan</option>
                                                        <option value="COP">Colombian Peso</option>
                                                        <option value="KMF">Comorian Franc</option>
                                                        <option value="CDF">Congolese Franc</option>
                                                        <option value="CRC">Costa Rican ColÃ³n</option>
                                                        <option value="HRK">Croatian Kuna</option>
                                                        <option value="CUC">Cuban Convertible Peso</option>
                                                        <option value="CZK">Czech Republic Koruna</option>
                                                        <option value="DKK">Danish Krone</option>
                                                        <option value="DJF">Djiboutian Franc</option>
                                                        <option value="DOP">Dominican Peso</option>
                                                        <option value="XCD">East Caribbean Dollar</option>
                                                        <option value="EGP">Egyptian Pound</option>
                                                        <option value="ERN">Eritrean Nakfa</option>
                                                        <option value="EEK">Estonian Kroon</option>
                                                        <option value="ETB">Ethiopian Birr</option>
                                                        <option value="EUR">Euro</option>
                                                        <option value="FKP">Falkland Islands Pound</option>
                                                        <option value="FJD">Fijian Dollar</option>
                                                        <option value="GMD">Gambian Dalasi</option>
                                                        <option value="GEL">Georgian Lari</option>
                                                        <option value="DEM">German Mark</option>
                                                        <option value="GHS">Ghanaian Cedi</option>
                                                        <option value="GIP">Gibraltar Pound</option>
                                                        <option value="GRD">Greek Drachma</option>
                                                        <option value="GTQ">Guatemalan Quetzal</option>
                                                        <option value="GNF">Guinean Franc</option>
                                                        <option value="GYD">Guyanaese Dollar</option>
                                                        <option value="HTG">Haitian Gourde</option>
                                                        <option value="HNL">Honduran Lempira</option>
                                                        <option value="HKD">Hong Kong Dollar</option>
                                                        <option value="HUF">Hungarian Forint</option>
                                                        <option value="ISK">Icelandic KrÃ³na</option>
                                                        <option value="INR">Indian Rupee</option>
                                                        <option value="IDR">Indonesian Rupiah</option>
                                                        <option value="IRR">Iranian Rial</option>
                                                        <option value="IQD">Iraqi Dinar</option>
                                                        <option value="ILS">Israeli New Sheqel</option>
                                                        <option value="ITL">Italian Lira</option>
                                                        <option value="JMD">Jamaican Dollar</option>
                                                        <option value="JPY">Japanese Yen</option>
                                                        <option value="JOD">Jordanian Dinar</option>
                                                        <option value="KZT">Kazakhstani Tenge</option>
                                                        <option value="KES">Kenyan Shilling</option>
                                                        <option value="KWD">Kuwaiti Dinar</option>
                                                        <option value="KGS">Kyrgystani Som</option>
                                                        <option value="LAK">Laotian Kip</option>
                                                        <option value="LVL">Latvian Lats</option>
                                                        <option value="LBP">Lebanese Pound</option>
                                                        <option value="LSL">Lesotho Loti</option>
                                                        <option value="LRD">Liberian Dollar</option>
                                                        <option value="LYD">Libyan Dinar</option>
                                                        <option value="LTL">Lithuanian Litas</option>
                                                        <option value="MOP">Macanese Pataca</option>
                                                        <option value="MKD">Macedonian Denar</option>
                                                        <option value="MGA">Malagasy Ariary</option>
                                                        <option value="MWK">Malawian Kwacha</option>
                                                        <option value="MYR">Malaysian Ringgit</option>
                                                        <option value="MVR">Maldivian Rufiyaa</option>
                                                        <option value="MRO">Mauritanian Ouguiya</option>
                                                        <option value="MUR">Mauritian Rupee</option>
                                                        <option value="MXN">Mexican Peso</option>
                                                        <option value="MDL">Moldovan Leu</option>
                                                        <option value="MNT">Mongolian Tugrik</option>
                                                        <option value="MAD">Moroccan Dirham</option>
                                                        <option value="MZM">Mozambican Metical</option>
                                                        <option value="MMK">Myanmar Kyat</option>
                                                        <option value="NAD">Namibian Dollar</option>
                                                        <option value="NPR">Nepalese Rupee</option>
                                                        <option value="ANG">Netherlands Antillean Guilder</option>
                                                        <option value="TWD">New Taiwan Dollar</option>
                                                        <option value="NZD">New Zealand Dollar</option>
                                                        <option value="NIO">Nicaraguan CÃ³rdoba</option>
                                                        <option value="NGN">Nigerian Naira</option>
                                                        <option value="KPW">North Korean Won</option>
                                                        <option value="NOK">Norwegian Krone</option>
                                                        <option value="OMR">Omani Rial</option>
                                                        <option value="PKR">Pakistani Rupee</option>
                                                        <option value="PAB">Panamanian Balboa</option>
                                                        <option value="PGK">Papua New Guinean Kina</option>
                                                        <option value="PYG">Paraguayan Guarani</option>
                                                        <option value="PEN">Peruvian Nuevo Sol</option>
                                                        <option value="PHP">Philippine Peso</option>
                                                        <option value="PLN">Polish Zloty</option>
                                                        <option value="QAR">Qatari Rial</option>
                                                        <option value="RON">Romanian Leu</option>
                                                        <option value="RUB">Russian Ruble</option>
                                                        <option value="RWF">Rwandan Franc</option>
                                                        <option value="SVC">Salvadoran ColÃ³n</option>
                                                        <option value="WST">Samoan Tala</option>
                                                        <option value="SAR">Saudi Riyal</option>
                                                        <option value="RSD">Serbian Dinar</option>
                                                        <option value="SCR">Seychellois Rupee</option>
                                                        <option value="SLL">Sierra Leonean Leone</option>
                                                        <option value="SGD">Singapore Dollar</option>
                                                        <option value="SKK">Slovak Koruna</option>
                                                        <option value="SBD">Solomon Islands Dollar</option>
                                                        <option value="SOS">Somali Shilling</option>
                                                        <option value="ZAR">South African Rand</option>
                                                        <option value="KRW">South Korean Won</option>
                                                        <option value="XDR">Special Drawing Rights</option>
                                                        <option value="LKR">Sri Lankan Rupee</option>
                                                        <option value="SHP">St. Helena Pound</option>
                                                        <option value="SDG">Sudanese Pound</option>
                                                        <option value="SRD">Surinamese Dollar</option>
                                                        <option value="SZL">Swazi Lilangeni</option>
                                                        <option value="SEK">Swedish Krona</option>
                                                        <option value="CHF">Swiss Franc</option>
                                                        <option value="SYP">Syrian Pound</option>
                                                        <option value="STD">São Tomé and Príncipe Dobra</option>
                                                        <option value="TJS">Tajikistani Somoni</option>
                                                        <option value="TZS">Tanzanian Shilling</option>
                                                        <option value="THB">Thai Baht</option>
                                                        <option value="TOP">Tongan pa'anga</option>
                                                        <option value="TTD">Trinidad & Tobago Dollar</option>
                                                        <option value="TND">Tunisian Dinar</option>
                                                        <option value="TRY">Turkish Lira</option>
                                                        <option value="TMT">Turkmenistani Manat</option>
                                                        <option value="UGX">Ugandan Shilling</option>
                                                        <option value="UAH">Ukrainian Hryvnia</option>
                                                        <option value="AED">United Arab Emirates Dirham</option>
                                                        <option value="UYU">Uruguayan Peso</option>
                                                        <option value="USD">US Dollar</option>
                                                        <option value="UZS">Uzbekistan Som</option>
                                                        <option value="VUV">Vanuatu Vatu</option>
                                                        <option value="VEF">Venezuelan BolÃ­var</option>
                                                        <option value="VND">Vietnamese Dong</option>
                                                        <option value="YER">Yemeni Rial</option>
                                                        <option value="ZMK">Zambian Kwacha</option>
                                                    </select>
                                                            @error('currency')
                                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                                            @enderror
                                                            @endif
														</div>


												</td>

											</tr>
										</tbody>
									</table>
                                 </form>
								</div>
							</div>
						</div>
					</section>
	 <a id="stepTwo">Next</a>

</div>

<div id="Contact" class="tabcontent">
  <h3>أماكن العمل تشمل المكاتب والمحلات والمستودعات</h3>
	<p>نصف قطر الموقع يحدد المساحة التي يستطيع الموظفون تسجيل حضورهم منها</p>
  	<section class="review-section information">

						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="table-responsive">
                                <form  id="step-three-form">

									<table class="table table-bordered table-nowrap  mb-0">
										<tbody>
											<tr>
												<td>

														<div class="form-group">
															<label for="name"> <span class="text-danger">*</span>Lat</label>
                                                            <input value="{{$client->lat}}" name="lat" type="text" class="form-control" @if($client->lat) readonly @endif>

                                                            @error('lat')
                                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                                            @enderror
                                                        </div>

														<div class="form-group">
															<label for="name"> <span class="text-danger">*</span>lng</label>
                                                            <input value="{{$client->lng}}" name="lng" type="text" class="form-control" @if($client->lng) readonly @endif>

                                                            @error('lng')
                                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                                            @enderror
														</div>




												</td>
												<td>


														<div class="form-group">
															<label for="name"> <span class="text-danger">*</span>radius</label>
                                                            <input value="{{$client->radius}}" name="radius" type="text" class="form-control" @if($client->radius) readonly @endif>

                                                            @error('radius')
                                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                                            @enderror
														</div>

														<div class="form-group">
															<label for="name"> <span class="text-danger">*</span>nfc token</label>
                                                            <input value="{{$client->nfc_id}}" name="nfc_id" type="text" class="form-control" @if($client->nfc_id) readonly @endif>

                                                            @error('nfc_id')
                                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                                            @enderror
														</div>

												</td>

											</tr>
										</tbody>
									</table>
                                    </form>
								</div>
							</div>
						</div>
					</section>
                    <a id="stepThree">{{__('Finish')}}</a>

</div>



       </form>
          </div>
                                        </div>
	   <!-- POPUp Script-->
       @push('scripts')
<script type="text/javascript">
    window.addEventListener('show', event =>{
        document.getElementById("defaultOpen").click();
        });

window.addEventListener("load", function(){
    setTimeout(
        function open(event){
            document.querySelector(".popup").style.display = "block";
        },1
    )
});
</script>
<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

$('#stepOne').on('click', function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
// var formData = new FormData($('#step-one-form')[0]);
var formData = $("form").serializeArray();

 console.log(formData);
$.ajax({
    url: '/missinginfo/step-one',
    type: 'POST',
    data: formData,
    enctype: 'multipart/form-data',
    headers: {
        'X-CSRF-TOKEN': csrfToken
    },
    success: function(data) {
        console.log(data);
        openPage('News', this, 'orange')
    },
    error: function(data){
        console.log(data);
    }
});
});

$('#stepTwo').on('click', function() {

// var formData = new FormData($('#step-two-form')[0]);
var formData = $("form").serializeArray();
 console.log(formData);
$.ajax({
    url: '/missinginfo/step-two',
    type: 'POST',
    data: formData,

    success: function(data) {
        console.log(data);
        openPage('Contact', this, 'midnightblue');
    },
    error: function(data){
        console.log(data);
        openPage('News', this, 'orange')
    }
});
});

$('#stepThree').on('click', function() {

// var formData = new FormData($('#step-three-form')[0]);
var formData = $("form").serializeArray();
 console.log(formData);
$.ajax({
    url: '/missinginfo/step-three',
    type: 'POST',
    data: formData,

    success: function(data) {
        console.log(data);
        //Go to the dashboard
        window.location.href = '{{url("admin-dashboard")}}';
    },
    error: function(data){
        console.log(data);
        openPage('Contact', this, 'midnightblue');
    }
});
});

$(document).ready(function() {
                            $('#photo-input-add').on('change', function() {

                                var formData = new FormData($('#upload-form-add')[0]);
                                $.ajax({
                                    url: '/add_photo',
                                    type: 'POST',
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(data) {
                                        console.log(data);
                                        $('#photo-preview-add').attr('src', data.path);

                                    },
                                    error: function(data){
                                        var errors = data.responseJSON;
                                        console.log(errors);
                                    }
                                });
                            });
                        });
</script>


</div>
@endpush
