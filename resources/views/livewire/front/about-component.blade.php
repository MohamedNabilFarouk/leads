<div>
   <!--==========================-->
		<!--=         Banner         =-->
		<!--==========================-->
		<section class="page-banner">
			<div class="page-title-wrapper text-center">
				<h1 class="page-title">{{__('About Us')}}</h1>

				<ul class="breadcrumbs">
					<li><a href="{{url('/index')}}">{{__("Home")}}</a></li>
					<li>{{__("About Us")}}</li>
				</ul>
			</div>
			<!-- /.page-title-wrapper -->

			<ul class="banner-pertical">
				<li><img src="{{asset('front/media/banner/header/crose.png')}}" alt="astriol pertical"></li>
				<li><img src="{{asset('front/media/banner/header/box.png')}}" alt="astriol pertical"></li>
				<li><img src="{{asset('front/media/banner/header/dot.png')}}" alt="astriol pertical"></li>
				<li><img src="{{asset('front/media/banner/header/dot_sm.png')}}" data-parallax='{"y": 100}' alt="astriol pertical"></li>
				<li><img src="{{asset('front/media/banner/header/line.png')}}" data-parallax='{"y": 50, "x": 100}' alt="astriol pertical"></li>
				<li data-parallax='{"y": -100}'></li>
				<li></li>
			</ul>
			<!-- /.banner-pertical -->

		</section>
		<!-- /.page-banner -->

		<!--===========================-->
		<!--=         Feature         =-->
		<!--===========================-->
		<section class="feature-agency-about">
			<div class="bg-shape">
				<img src="{{asset('front/media/background/3.png')}}" alt="astriol shape bg">
			</div>
			<!-- /.bg-shape -->

			<div class="container">
				<div class="section-heading style-two color-theme">
					<h3 class="subtitle">{{__("Services")}}</h3>
					<h2 class="section-title">{{__("Best Solutions for You")}}</h2>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="icon-box style-three">
							<div class="icon-container">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="127px" height="94px">
									<path fill-rule="evenodd" opacity="0.078" fill="rgb(233, 167, 26)" d="M70.603,37.711 C101.750,37.711 127.000,6.625 127.000,37.711 C127.000,68.798 101.750,93.999 70.603,93.999 C39.455,93.999 9.153,63.668 2.926,33.209 C-12.866,-44.033 39.455,37.711 70.603,37.711 Z" />
								</svg>
								<img src="{{asset('front/media/feature/1.png')}}" alt="service">
							</div>

							<div class="box-content">
								<h3 class="box-title">
									<a href="#">{{__("Projects")}}</a>
								</h3>

								<p>
									{{__("Projects systems are the lifeblood of any successful organization, ensuring tasks are organized, deadlines are met, and collaboration is seamless. From project planning to execution, these systems streamline workflow and boost productivity, making project management a breeze.")}}
								</p>
								{{-- <a href="#" class="gp-btn btn-outline">{{__("Learn More")}}</a> --}}
							</div>
						</div>

						<!-- /.icon-box -->
					</div>
					<!-- /.col-md-4 -->

					<div class="col-md-4">
						<div class="icon-box style-three">
							<div class="icon-container">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="110px" height="101px">
									<path fill-rule="evenodd" opacity="0.078" fill="rgb(77, 90, 254)" d="M55.002,43.519 C77.774,66.637 133.891,21.810 98.647,76.302 C84.775,97.749 -27.184,120.078 7.044,69.959 C25.345,43.163 -9.947,35.696 26.692,6.684 C52.457,-13.716 32.230,20.400 55.002,43.519 Z" />
								</svg>

								<img src="{{asset('front/media/feature/2.png')}}" alt="service">
							</div>

							<div class="box-content">
								<h3 class="box-title">
									<a href="#">{{__("Leads")}}</a>
								</h3>

								<p>
									{{__("Leads systems are the backbone of sales and business development, providing a structured approach to capturing, nurturing, and converting potential customers. With lead tracking, automated follow-ups, and analytics, these systems empower businesses to maximize their sales efforts and drive revenue growth. Stay ahead of the game with a robust leads system in place.")}}
								</p>
								{{-- <a href="#" class="gp-btn btn-outline">{{__("Learn More")}}</a> --}}
							</div>
						</div>

						<!-- /.icon-box -->
					</div>
					<!-- /.col-md-4 -->

					<div class="col-md-4">
						<div class="icon-box style-three">
							<div class="icon-container">

								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="153px" height="91px">
									<path fill-rule="evenodd" opacity="0.078" fill="rgb(252, 98, 72)" d="M84.088,71.208 C105.396,49.760 192.817,115.939 131.565,32.447 C117.507,13.285 92.151,2.630 70.842,24.079 C49.534,45.527 -25.059,-43.676 8.580,32.102 C45.328,114.883 62.779,92.657 84.088,71.208 Z" />
								</svg>

								<img src="{{asset('front/media/feature/3.png')}}" alt="service">
							</div>

							<div class="box-content">
								<h3 class="box-title">
									<a href="#">{{__('Jobs')}}</a>
								</h3>

								<p>
								{{__("Recruitment systems revolutionize the hiring process, enabling organizations to find top talent efficiently and effectively. From creating job postings to managing applications and conducting interviews, these systems streamline the entire recruitment lifecycle. Stay ahead of the competition by leveraging a robust recruitment system that ensures you attract and onboard the best candidates for your team.")}}
								</p>

								{{-- <a href="#" class="gp-btn btn-outline">{{__('Learn More')}}</a> --}}
							</div>
						</div>

						<!-- /.icon-box -->
					</div>
					<!-- /.col-md-4 -->
				</div>
				<!-- /.row -->


			</div>
			<!-- /.container -->
		</section>
		<!-- /.feature-agency -->

		<!--===========================-->
		<!--=         Count Up        =-->
		<!--===========================-->
		<div id="countdown-creative" class="countdown-creative-page">
			<div class="wave-wrapper">
				<svg xmlns="http://www.w3.org/2000/svg" class="animated-wave" xmlns:xlink="http://www.w3.org/1999/xlink" width="1920px" height="440px">
					<title>Wave</title>
					<path id="animated-wave-one" fill-rule="evenodd" fill="rgba(218, 222, 255, 0.2)" d="M0.000,389.999 C0.000,389.999 190.914,303.146 458.265,307.140 C670.950,310.317 792.948,397.123 1071.477,417.140 C1307.537,434.105 1428.778,355.871 1615.580,349.999 C1812.762,343.803 1920.000,440.000 1920.000,440.000 L1920.000,-0.001 L0.000,-0.001 L0.000,389.999 Z" />
				</svg>

				<svg class="animated-wave" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1920px" height="409px">
					<title>Wave</title>
					<path id="animated-wave-two" fill-rule="evenodd" fill="rgba(218, 222, 255, 0.2)" d="M0.000,292.013 C0.000,292.013 178.837,368.003 357.380,368.003 C530.704,368.003 633.144,320.000 864.908,320.000 C1103.047,320.000 1138.719,389.258 1392.681,407.140 C1531.655,416.925 1641.961,367.852 1752.927,343.711 C1848.559,322.907 1920.000,370.000 1920.000,370.000 L1920.000,-0.001 L0.000,-0.001 L0.000,292.013 Z" />
				</svg>


			</div>
			<!-- /.wave-wrapper -->

			<div class="container">
				<div class="creative-countup-wrapper">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="fun-fact color--one wow fadeInUp" data-wow-delay="0.3s">
								<div class="count-icon-container">
									<i class="icon-people"></i>

									<span class="circle-shape"></span>
								</div>
								<!-- /.icon-box -->
								<h4 class="count" data-counter="44780">44780 </h4>
								<p class="count-name">{{__('Happy Client')}}</p>
							</div>
							<!-- /.fun-fact -->
						</div>
						<!-- /.col-lg-3 col-md-6 col-sm-6 -->

						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="fun-fact color--two wow fadeInUp" data-wow-delay="0.5s">
								<div class="count-icon-container">
									<i class="icon-like"></i>
									<span class="circle-shape"></span>
								</div>
								<!-- /.icon-box -->
								<h4 class="count" data-counter="670">670 </h4>
								<p class="count-name">{{__('Completed Projects')}}</p>
							</div>
							<!-- /.fun-fact -->
						</div>
						<!-- /.col-lg-3 col-md-6 col-sm-6 -->

						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="fun-fact color--three wow fadeInUp" data-wow-delay="0.7s">
								<div class="count-icon-container">
									<i class="icon-clock"></i>
									<span class="circle-shape"></span>
								</div>
								<!-- /.icon-box -->
								<h4 class="count" data-counter="23">23 </h4>
								<p class="count-name">{{__('Years of Service')}}</p>
							</div>
							<!-- /.fun-fact -->
						</div>
						<!-- /.col-lg-3 col-md-6 col-sm-6 -->

						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="fun-fact color--four wow fadeInUp" data-wow-delay="0.9s">
								<div class="count-icon-container">
									<i class="icon-bulb"></i>
									<span class="circle-shape"></span>
								</div>
								<!-- /.icon-box -->
								<h4 class="count" data-counter="6264">6264 </h4>
								<p class="count-name">{{__('People Consulted')}}</p>
							</div>
							<!-- /.fun-fact -->
						</div>
						<!-- /.col-lg-3 col-md-6 col-sm-6 -->

					</div>
					<!-- /.row -->
				</div>
				<!-- /.creative-countup-wrapper -->
			</div>
			<!-- /.container -->
		</div>
		<!-- /#countdown -->


    <!--=========================-->
    <!--=         About         =-->
    <!--=========================-->
    <section class="about about-single">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="about-feature-image">
                        <!--						<div class="top-content bg-gradient-two wow fadeInLeft">-->
                        <!--							<h4 class="ab-top-subtitle">About HR System</h4>-->
                        <!--							<h3 class="ab-subtitle">-->
                        <!--								Agency<br> Company-->
                        <!--							</h3>-->
                        <!--						</div>-->
                        <div class="image-wrapper wow fadeInRight">
                            <img src="{{asset('front/media/about/1.jpg')}}" alt="astriol about">
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
                <div class="col-md-6">
                    <div class="about-content-wrapper ">
                        <h2 class="about-title wow fadeInUp">
                            {{__("About HR System")}}

                        </h2>
                        <p class="wow fadeInUp" data-wow-delay="0.3s">
                            {{__('Alef Human resource management system is a type of human resource software that managees many tasks handled by the HR department, including maintaining employee data and performance reviews, processing payroll, managing the hiring and training processes, and keeping track of attendance records, which are combined in one software. Additionally, this system makes sure that all HR operations are simple to access and administer. The system integrates all essential HR procedures and tasks in order to assure simple management of human resources, salaries, and employees data.')}}

                        </p>

                        <ul class="icon-lists color-theme wow fadeInUp" data-wow-delay="0.5s">
                            <li><i class="ei ei-icon_check"></i>
                                {{__('Employees record')}}</li>
                            <li><i class="ei ei-icon_check"></i>{{__("Attendance")}}</li>
                            <li><i class="ei ei-icon_check"></i>{{__("Compensation and benefits")}}</li>
                            <li><i class="ei ei-icon_check"></i>{{__("Employee’s appraisal")}}</li>
                            <li><i class="ei ei-icon_check"></i>{{__("Reports")}}</li>

                        </ul>

                        <!--						<a href="#" class="gp-btn wow fadeInUp" data-wow-delay="0.7s">More About Us</a>-->
                    </div>
                    <!-- /.about-content-wrapper -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->

        <!-- <div class="js-canvas-textbox" data-gradient-left="#1d3ede" data-gradient-right="#01e6f8">
    <canvas></canvas>
</div> -->
    </section>
    <!-- /.about -->


		<!--===============================-->
		<!--=         Client Logo         =-->
		<!--===============================-->
		<section class="animate-client-logo-service">
			<div class="section-heading">
				<h2>{{__('Over 1200+ completd work')}} &<br> {{__('Still counting.')}}</h2>
			</div>
			<!-- /.section-heading -->

			<div class="container">

				<div class="client-logo-wrapper">
					<ul class="client-logo-items-two">
						<li class="logo-item wow zoomBounce">
							<a href="#"><img src="{{asset('front/media/client/ehotel.png')}}" alt="ehotel-logo"></a>
						</li>
						<li class="logo-item wow zoomBounce">
							<a href="#"><img src="{{asset('front/media/client/Richhomes.png')}}" alt="richHome-logo"></a>
						</li>
						<li class="logo-item wow zoomBounce">
							<a href="#"><img src="{{asset('front/media/client/faraj.png')}}" alt="faraj-logo"></a>
						</li>
						<li class="logo-item wow zoomBounce">
							<a href="#"><img src="{{asset('front/media/client/jawhara.png')}}" alt="jawhara-logo"></a>
						</li>
						<li class="logo-item wow zoomBounce">
							<a href="#"><img src="{{asset('front/media/client/massage.png')}}" alt="masssageMajed-logo"></a>
						</li>
						<li class="logo-item wow zoomBounce">
							<a href="#"><img src="{{asset('front/media/client/productive.png')}}" alt="productivefamily-logo"></a>
						</li>
						{{-- <li class="logo-item wow zoomBounce">
							<a href="#"><img src="{{asset('front/media/client/jawhara.png')}}" alt="astrol-logo"></a>
						</li> --}}
						{{-- <li class="logo-item wow zoomBounce">
							<a href="#"><img src="{{asset('front/media/client/s8.png')}}" alt="astrol-logo"></a>
						</li>
						<li class="logo-item wow zoomBounce">
							<a href="#"><img src="{{asset('front/media/client/s9.png')}}" alt="astrol-logo"></a>
						</li>
						<li class="logo-item wow zoomBounce">
							<a href="#"><img src="{{asset('front/media/client/s10.png')}}" alt="astrol-logo"></a>
						</li> --}}
					</ul>
				</div>
				<!-- /.client-logo-wrapper -->

			</div>
			<!-- /.container -->
		</section>
		<!-- /.animate-client-logo -->
</div>
