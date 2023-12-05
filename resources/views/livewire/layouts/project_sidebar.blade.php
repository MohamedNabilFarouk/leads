  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 400px;"><div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 400px;">
                <div class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="{{url('/')}}"><i class="la la-home"></i> <span>{{__('Back to Home')}}</span></a>
                        </li>
{{--                        <li class="menu-title">Projects <a href="#" data-bs-toggle="modal" data-bs-target="#create_project"><i class="fa fa-plus"></i></a></li>--}}

                           @php
                              if(auth()->user()->role_id==1){
                               $projects=\App\Models\Project::all();
                               }else{
                                $projects=\App\Models\Project::whereHas('user', function ($query) {
                                $query->where('id',auth()->user()->id)->orWhere('team_leader',auth()->user()->id);
                                })->get();
                              }
                        @endphp

                        @foreach($projects as $project)
                            @if(Request::segment(3)!='')
                        <li @if(\Crypt::decrypt(Request::segment(3))==$project->id) class="active" @endif>
                            <a href="{{url(Request::segment(2))}}/{{\Crypt::encrypt($project->id)}}">{{$project->title}}</a>

                        </li>
                            @else
                                @php
                                $projectid=\App\Models\Project::first();
                                @endphp
                                <li @if($projectid->id==$project->id) class="active" @endif>
                                    <a href="{{url(Request::segment(2))}}/{{\Crypt::encrypt($project->id)}}">{{$project->title}}</a>

                                </li>
                            @endif
                        @endforeach

                    </ul>
                </div>
            </div><div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 400px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
    </div>
    <!-- /Sidebar -->
