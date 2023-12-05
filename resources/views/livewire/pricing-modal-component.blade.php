<div>
    <div wire:ignore.self class="modal custom-modal fade" id="pop" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">{{__("Select")}}{{__("Plan")}}</h5>

                 {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close()">
                     <span aria-hidden="true">&times;</span>
                 </button> --}}
             </div>
             <div class="modal-body">
                {{-- <form wire:submit.prevent=""> --}}
                    <!-- Plan Tab Content -->
                      <div class="tab-content mb-5">

                          <!-- Monthly Tab -->
                          <div class="tab-pane fade active show" id="monthly">
                              <div class="row mb-30 equal-height-cards">

                                  @foreach($plans as $p)
                                  <div class="col-md-4  justify-content-center">
                                      <div class="card pricing-box">
                                          <div class="card-body d-flex flex-column">
                                              <div class="mb-4">
                                                  <h3>{{$p->name}}</h3>
                                                  <span class="display-4">{{$p->currency}}  {{$p->price}}</span>
                                              </div>
                                              <ul>
                                                  <li><i class="fa fa-check"></i> <b>{{$p->frequency}}</b></li>
                                                  <li><i class="fa fa-check"></i> {{$p->trail_days}} </li>
                                                  <li><i class="fa fa-check"></i> {{__('Unlimited Users')}}</li>
                                                  <li><i class="fa fa-check"></i> {{__(' 24/7 Customer Support')}}</li>
                                              </ul>

                                              @if(auth()->user()->can('company-profile-write'))  <a wire:click="ChoosePlan($event.target.value,{{$p->id}})" class="btn btn-lg btn-outline-secondary mt-auto">{{__("Upgrade")}}</a> @endif

                                          </div>
                                      </div>
                                  </div>
                                  @endforeach

                              </div>
                          </div>
                          <!-- /Monthly Tab -->



                      </div>
                      <!-- /Plan Tab Content -->
                  {{-- </form> --}}
             </div>
         </div>
        </div>
        </div>
</div>
