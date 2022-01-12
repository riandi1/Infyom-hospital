<div class="bed-status">
    <div class="row">
        <div class="col-md-12">
            @foreach($bedTypes as $bedType)
                <div class="bed-types">
                    <h5><strong class="bed-type-name">{{$bedType->title}}</strong></h5>
                </div>
                <hr>
                <div class="row ward-wise-bed">
                    @if(count($bedType->beds)>0)
                        @foreach($bedType->beds as $bed)
                            <div class="col-md-2">
                                <div class="bed text-center">
                                    @if(!$bed->bedAssigns->isEmpty() && !$bed->is_available && $bed->bedAssigns[0]->discharge_date == null)
                                        <div class="hover">
                                            <a href="#">
                                                <i class="fas fa-procedures fa-3x assigned-bed"></i>
                                            </a>
                                            <div class="popup">
                                                <strong>{{__('messages.bed_status.bed_name')}}
                                                    :</strong> {{$bed->name}}
                                                <br>
                                                <strong>{{__('messages.case.patient')}}
                                                    :</strong> {{$bed->bedAssigns[0]->patient->user->full_name}}
                                                <br>
                                                <strong>{{__('messages.bed_status.phone')}}
                                                    :</strong> {{!empty($bed->bedAssigns[0]->patient->user->phone)?$bed->bedAssigns[0]->patient->user->phone:'N/A'}}
                                                <br>
                                                <strong>{{__('messages.bed_status.admission_date')}}
                                                    :</strong> {{date('jS M, Y h:i:s A', strtotime($bed->bedAssigns[0]->assign_date))}}
                                                <br>
                                                <strong>{{__('messages.bed_status.gender')}}
                                                    :</strong> {{($bed->bedAssigns[0]->patient->user->gender === 0)? 'Male' : 'Female' }}
                                            </div>
                                        </div>
                                        <div class="patient-name">
                                            <strong class="assigned-bed">{{$bed->bedAssigns[0]->patient->user->full_name}}</strong>
                                        </div>
                                    @else
                                        @php
                                            $isTrue = true;
                                        @endphp
                                        @foreach($patientAdmissions as $patientAdmission)
                                            @if($patientAdmission->bed->id == $bed->id && !$patientAdmission->bed->is_available && ($patientAdmission->discharge_date == null))
                                                @php
                                                    $isTrue = false;
                                                @endphp
                                                <div class="hover">
                                                    <a href="#">
                                                        <i class="fas fa-procedures fa-3x assigned-bed"></i>
                                                    </a>
                                                    <div class="popup">
                                                        <strong>{{__('messages.bed_status.bed_name')}}
                                                            :</strong> {{$bed->name}}
                                                        <br>
                                                        <strong>{{__('messages.case.patient')}}
                                                            :</strong> {{$patientAdmission->patient->user->full_name}}
                                                        <br>
                                                        <strong>{{__('messages.bed_status.phone')}}
                                                            :</strong> {{!empty($patientAdmission->patient->user->phone)?$patientAdmission->patient->user->phone:'N/A'}}
                                                        <br>
                                                        <strong>{{__('messages.bed_status.admission_date')}}
                                                            :</strong> {{date('jS M, Y h:i:s A', strtotime($patientAdmission->admission_date))}}
                                                        <br>
                                                        <strong>{{__('messages.bed_status.gender')}}
                                                            :</strong> {{($patientAdmission->patient->user->gender === 0)? 'Male' : 'Female' }}
                                                    </div>
                                                </div>
                                                <div class="patient-name">
                                                    <strong class="assigned-bed">{{$patientAdmission->patient->user->full_name}}</strong>
                                                </div>
                                            @endif
                                        @endforeach
                                        @if($isTrue == true)
                                            <a href="{{route('bed-assigns.create', ['bed_id' => $bed->id])}}">
                                                <i class="fas fa-bed fa-3x unassigned-bed"></i>
                                                <div class="bed-name">
                                                    <strong class="unassigned-bed">{{$bed->name}} </strong>
                                                </div>
                                            </a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="no-bed-available">
                            <span><strong>No bed available.</strong></span>
                        </div>
                    @endif
                </div>
                <hr class="bed-section">
            @endforeach
        </div>
    </div>
</div>

