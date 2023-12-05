<div>


    <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">{{__('Roles & Permissions')}}</h3>
                  </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">

                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
                    <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add_role"><i class="fa fa-plus"></i> {{__('Add Roles')}}</a>
                    <div class="roles-menu">
                        <ul>
                            @foreach($roles as $role)
                            @if($role->id == $idd)
                                    <li class="active">
                                @else
                                <li>
                                    @endif
                                <a wire:click="changeEvent($event.target.value, {{$role->id}})">@if(app()->getLocale()== 'en'){{$role->name}}@else {{$role->name_ar}}@endif
                                    <b class="role-action">
												<!-- <button wire:click="editRole({{ $role->id }})" class="action-circle large" data-toggle="modal" data-target="#edit_role">
													<i class="material-icons">edit</i>
												</button> -->
												<!-- <button wire:click="deleteConfirmation({{ $role->id }})" class="action-circle large delete-btn" data-toggle="modal" data-target="#delete_role">
													<i class="material-icons">delete</i>
                                                </button> -->
                                    </b>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
                    <h6 class="card-title m-b-20">{{__('Module Access')}}</h6>
                    <div class="m-b-30">
                        <ul class="list-group notification-list">

                            @foreach($modules as $module)
                            <li class="list-group-item">
                                {{__($module->module_name)}}
                                <div class="status-toggle">
                                    @php $m=DB::table('role_modules')->where('module_id',$module->id)->where('role_id',$idd)->first();@endphp
                                    @if((!empty($m)))
                                    <input wire:change="changeEventt($event.target.value, {{$module->id}})"  type="checkbox" id="{{$module->module_name}}_module" class="check" checked value="1">
                                   @else
                                        <input wire:change="changeEventt($event.target.value, {{$module->id}})" type="checkbox" id="{{$module->module_name}}_module" class="check" value="0">

                                        @endif
                                        <label for="{{($module->module_name)}}_module" class="checktoggle">checkbox</label>
                                </div>

                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped custom-table">
                            <thead>
                            <tr>
                                <th>{{__('Module Permission')}}</th>
                                <th class="text-center">{{__('Read')}}</th>
                                <th class="text-center">{{__('Edit')}}</th>
                                <th class="text-center">{{__('Create')}}</th>
                                <th class="text-center">{{__('Delete')}}</th>
                                <th class="text-center">{{__('Approve')}}</th>
                                <th class="text-center">{{__('Read All')}}</th>
                                <th class="text-center">{{__('Edit All')}}</th>
                                <th class="text-center">{{__('Create All')}}</th>
                                <th class="text-center">{{__('Delete All')}}</th>


                            </tr>
                            </thead>
                            <tbody>
                             @php
                    $module_views=DB::table('role_modules')
                                ->join('modules','role_modules.module_id','=','modules.id')
                                ->join('roles','role_modules.role_id','=','roles.id')
                                ->join('sub_modules','modules.id','sub_modules.module_id')
                                ->where('roles.id', $idd)
                                ->whereIn('modules.id', $modulesArr)
                                ->select('modules.id as id','sub_modules.name as module_name','roles.id as roles_id')
                                ->orderby('sub_modules.id')
                                ->get();
                             @endphp

                                @foreach($module_views as $module_view)
                                <tr>
                                <td>{{__($module_view->module_name)}}</td>
                                  <?php
                                        $resStr =  strtolower($module_view->module_name);

                                        $replacestr= str_replace(" ","-",$resStr);
                                        $permissionRead=DB::table('permissions')
                                                     ->where('name',$replacestr.'-read')
                                                      ->select('id as permission_id','name as permission_name')
                                                      ->first();
                                        ?>


                                    @if($permissionRead!=NULL)
                                        <?php
                                        $module_permission_read=DB::table('role_has_permissions')->where('role_id',$module_view->roles_id)->where('permission_id',$permissionRead->permission_id)->exists();
                                        ?>
                                @if(str_contains($permissionRead->permission_name,'-read') and $permissionRead->permission_name==$replacestr.'-read')
                                            <td class="text-center">
                                                @if($module_permission_read!=NULL)
                                                    <input checked  wire:change="changeEventtt($event.target.value, {{$permissionRead->permission_id}})" type="checkbox">

                                                @else
                                    <input  wire:change="changeEventtt($event.target.value, {{$permissionRead->permission_id}})" type="checkbox">
                                                @endif
                                </td>
                                 @endif
                                        @else
                                        <td></td>

                                    @endif
                                    @php
                                    $permissionWrite=DB::table('permissions')
                                                     ->where('name',$replacestr.'-write')
                                                      ->select('id as permission_id','name as permission_name')
                                                      ->first();
                                                      @endphp
                                    @if($permissionWrite!=NULL)
                                            <?php
                                            $module_permission_write=DB::table('role_has_permissions')->where('role_id',$module_view->roles_id)->where('permission_id',$permissionWrite->permission_id)->exists();
                                            ?>
                                    @if(str_contains($permissionWrite->permission_name,'write') and $permissionWrite->permission_name==$replacestr.'-write')
                                    <td class="text-center">
                                        @if($module_permission_write!=NULL)
                                            <input checked wire:change="changeEventtt($event.target.value, {{$permissionWrite->permission_id}})" type="checkbox">
                                        @else
                                        <input wire:change="changeEventtt($event.target.value, {{$permissionWrite->permission_id}})" type="checkbox">
                                        @endif
                                    </td>
                                        @endif
                                    @else
                                        <td></td>
                                    @endif
                                    @php
                                        $permissionCreate=DB::table('permissions')
                                                         ->where('name',$replacestr.'-create')
                                                          ->select('id as permission_id','name as permission_name')
                                                          ->first();
                                    @endphp
                                    @if($permissionCreate!=NULL)
                                            <?php
                                            $module_permission_create=DB::table('role_has_permissions')->where('role_id',$module_view->roles_id)->where('permission_id',$permissionCreate->permission_id)->exists();
                                            ?>
                                    @if(str_contains($permissionCreate->permission_name,'create') and $permissionCreate->permission_name==$replacestr.'-create')

                                            <td class="text-center">
                                                @if($module_permission_create!=NULL)

                                        <input checked wire:change="changeEventtt($event.target.value, {{$permissionCreate->permission_id}})" type="checkbox">
                                        @else
                                            <input wire:change="changeEventtt($event.target.value, {{$permissionCreate->permission_id}})" type="checkbox">
                                        @endif

                                    </td>
                                        @endif
                                    @else
                                        <td></td>
                                    @endif
                                    @php
                                        $permissionDelete=DB::table('permissions')
                                                         ->where('name',$replacestr.'-delete')
                                                          ->select('id as permission_id','name as permission_name')
                                                          ->first();
                                    @endphp
                                    @if($permissionDelete!=NULL)
                                            <?php
                                            $module_permission_delete=DB::table('role_has_permissions')->where('role_id',$module_view->roles_id)->where('permission_id',$permissionDelete->permission_id)->exists();
                                            ?>
                                        @if(str_contains($permissionDelete->permission_name,'delete') and $permissionDelete->permission_name==$replacestr.'-delete')

                                    <td class="text-center">
                                        @if($module_permission_delete!=NULL)
                                        <input checked wire:change="changeEventtt($event.target.value, {{$permissionDelete->permission_id}})" type="checkbox">
                                        @else
                                            <input wire:change="changeEventtt($event.target.value, {{$permissionDelete->permission_id}})" type="checkbox">
                                        @endif
                                    </td>
                                        @endif
                                    @else
                                        <td></td>
                                    @endif

                                    @php
                                        $permissionApprove=DB::table('permissions')
                                                         ->where('name',$replacestr.'-approve')
                                                          ->select('id as permission_id','name as permission_name')
                                                          ->first();
                                    @endphp
                                    @if($permissionApprove!=NULL)
                                            <?php
                                            $module_permission_approve=DB::table('role_has_permissions')->where('role_id',$module_view->roles_id)->where('permission_id',$permissionApprove->permission_id)->exists();
                                            ?>
                                        @if(str_contains($permissionApprove->permission_name,'approve') and $permissionApprove->permission_name==$replacestr.'-approve')

                                            <td class="text-center">
                                                @if($module_permission_approve!=NULL)
                                                    <input checked wire:change="changeEventtt($event.target.value, {{$permissionApprove->permission_id}})" type="checkbox">
                                                @else
                                                    <input wire:change="changeEventtt($event.target.value, {{$permissionApprove->permission_id}})" type="checkbox">
                                                @endif
                                            </td>
                                        @endif
                                    @else
                                        <td></td>
                                    @endif


{{-- new update --}}

                                    <?php
                                        $resStr =  strtolower($module_view->module_name);

                                        $replacestr= str_replace(" ","-",$resStr);
                                        $permissionReadAll=DB::table('permissions')
                                                     ->where('name',$replacestr.'-read-all')
                                                      ->select('id as permission_id','name as permission_name')
                                                      ->first();


                                        ?>


                                    @if($permissionReadAll!=NULL)
                                        <?php
                                        $module_permission_read_all=DB::table('role_has_permissions')->where('role_id',$module_view->roles_id)->where('permission_id',$permissionReadAll->permission_id)->exists();
                                        ?>
                                @if(str_contains($permissionReadAll->permission_name,'-read-all') and $permissionReadAll->permission_name==$replacestr.'-read-all')
                                            <td class="text-center">
                                                @if($module_permission_read_all!=NULL)
                                                    <input checked  wire:change="changeEventtt($event.target.value, {{$permissionReadAll->permission_id}})" type="checkbox">

                                                @else
                                    <input  wire:change="changeEventtt($event.target.value, {{$permissionReadAll->permission_id}})" type="checkbox">
                                                @endif
                                </td>
                                 @endif
                                        @else
                                        <td></td>

                                    @endif


                                    @php
                                    $permissionWriteAll=DB::table('permissions')
                                                     ->where('name',$replacestr.'-write-all')
                                                      ->select('id as permission_id','name as permission_name')
                                                      ->first();
                                                      @endphp
                                    @if($permissionWriteAll!=NULL)
                                            <?php
                                            $module_permission_write_all=DB::table('role_has_permissions')->where('role_id',$module_view->roles_id)->where('permission_id',$permissionWriteAll->permission_id)->exists();
                                            ?>
                                    @if(str_contains($permissionWriteAll->permission_name,'write-all') and $permissionWriteAll->permission_name==$replacestr.'-write-all')
                                    <td class="text-center">
                                        @if($module_permission_write_all!=NULL)
                                            <input checked wire:change="changeEventtt($event.target.value, {{$permissionWriteAll->permission_id}})" type="checkbox">
                                        @else
                                        <input wire:change="changeEventtt($event.target.value, {{$permissionWriteAll->permission_id}})" type="checkbox">
                                        @endif
                                    </td>
                                        @endif
                                    @else
                                        <td></td>
                                    @endif


                                    @php
                                    $permissionCreateAll=DB::table('permissions')
                                                     ->where('name',$replacestr.'-create-all')
                                                      ->select('id as permission_id','name as permission_name')
                                                      ->first();
                                @endphp
                                @if($permissionCreateAll!=NULL)
                                        <?php
                                        $module_permission_create_all=DB::table('role_has_permissions')->where('role_id',$module_view->roles_id)->where('permission_id',$permissionCreateAll->permission_id)->exists();
                                        ?>
                                @if(str_contains($permissionCreateAll->permission_name,'create-all') and $permissionCreateAll->permission_name==$replacestr.'-create-all')

                                        <td class="text-center">
                                            @if($module_permission_create_all!=NULL)

                                    <input checked wire:change="changeEventtt($event.target.value, {{$permissionCreateAll->permission_id}})" type="checkbox">
                                    @else
                                        <input wire:change="changeEventtt($event.target.value, {{$permissionCreateAll->permission_id}})" type="checkbox">
                                    @endif

                                </td>
                                    @endif
                                @else
                                    <td></td>
                                @endif


                                @php
                                $permissionDeleteAll=DB::table('permissions')
                                                 ->where('name',$replacestr.'-delete-all')
                                                  ->select('id as permission_id','name as permission_name')
                                                  ->first();
                            @endphp
                            @if($permissionDeleteAll!=NULL)
                                    <?php
                                    $module_permission_delete_all=DB::table('role_has_permissions')->where('role_id',$module_view->roles_id)->where('permission_id',$permissionDeleteAll->permission_id)->exists();
                                    ?>
                                @if(str_contains($permissionDeleteAll->permission_name,'delete-all') and $permissionDeleteAll->permission_name==$replacestr.'-delete-all')

                            <td class="text-center">
                                @if($module_permission_delete_all!=NULL)
                                <input checked wire:change="changeEventtt($event.target.value, {{$permissionDeleteAll->permission_id}})" type="checkbox">
                                @else
                                    <input wire:change="changeEventtt($event.target.value, {{$permissionDeleteAll->permission_id}})" type="checkbox">
                                @endif
                            </td>
                                @endif
                            @else
                                <td></td>
                            @endif

{{-- end new update --}}

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        <!-- Add Role Modal -->
    <div wire:ignore.self class="modal custom-modal fade" id="add_role" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Add Role')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  wire:click="close()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="storeRoleData">
                            <div class="form-group">
                                <label>{{__('Role Name')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" wire:model="name">
                                @error('name')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{__('Role Name')}} {{__('ar')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" wire:model="name_ar">
                                @error('name_ar')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">{{__('Submit')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Role Modal -->

        <!-- Edit Role Modal -->
    <div wire:ignore.self  class="modal custom-modal fade" id="editRoleModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-md">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Edit Role')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close()>
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="editRoleData">

                        <div class="form-group">
                                <label>{{__('Role Name')}} <span class="text-danger">*</span></label>
                                <input class="form-control" wire:model="name" type="text">
                            </div>
                            @error('name')
                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        <div class="form-group">
                                <label>{{__('Role Name')}} {{__('ar')}} <span class="text-danger">*</span></label>
                                <input class="form-control" wire:model="name_ar" type="text">
                            </div>
                            @error('name_ar')
                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Role Modal -->

        <!-- Delete Role Modal -->
    <div wire:ignore.self class="modal custom-modal fade" id="delete_role" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>{{__('Delete Role')}}</h3>
                            <p>{{__('Are you sure want to delete?')}}</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <button wire:click="deleteRoleData()" class="btn btn-primary continue-btn">{{__('Delete')}}</button>
                                </div>
                                <div class="col-6">
                                    <button  wire:click="cancel()"  data-dismiss="modal" class="btn btn-primary cancel-btn">{{__('Cancel')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Role Modal -->

    <!-- /Page Wrapper -->
</div>

@push('scripts')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#add_role').modal('hide');
            $('#editRoleModal').modal('hide');
            $('#delete_role').modal('hide');
        });

        window.addEventListener('show-edit-role-modal', event =>{
            $('#editRoleModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#delete_role').modal('show');
        });

        window.addEventListener('show-view-employee-modal', event =>{
            $('#viewEmployeeModal').modal('show');
        });
    </script>
@endpush
