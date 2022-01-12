@if(Auth::user()->hasRole('Admin'))
    <div class="col-lg-12">
        <a href="#" class="btn btn-primary filter-container__btn float-right mb-3" data-toggle="modal"
           data-target="#addOpdTimelineModal">
            {{ __('messages.ipd_patient_timeline.new_ipd_timeline') }}
        </a>
    </div>
@endif
@if(Auth::user()->hasRole('Admin'))
    <div class="timeline-spacer"></div>
@endif
@forelse($opdTimelines as $opdTimeline)
    <div class="timeline-item" date-is="{{ date('jS M, Y', strtotime($opdTimeline->date)) }}">
        <div class="float-right bottom-sm">
            @if($opdTimeline->opd_timeline_document_url != '')
                <a title="download" class="btn action-btn btn-primary btn-sm"
                   href="{{ url('opd-timelines-download'.'/'.$opdTimeline->id) }}">
                    <i class="fa fa-download action-icon"></i>
                </a>
            @endif
            @if(Auth::user()->hasRole('Admin'))
                <a title="edit" class="btn action-btn btn-success btn-sm edit-timeline-btn"
                   data-timeline-id="{{ $opdTimeline->id }}">
                    <i class="fa fa-edit action-icon"></i>
                </a>
                <a title="delete" class="btn action-btn btn-danger btn-sm delete-timeline-btn"
                   data-timeline-id="{{ $opdTimeline->id }}">
                    <i class="fa fa-trash action-icon"></i>
                </a>
            @endif
        </div>
        <h3>{{ $opdTimeline->title }}</h3>
        <p>{!! !empty($opdTimeline->description) ? nl2br(e($opdTimeline->description)) : __('messages.common.n/a') !!}</p>
    </div>
@empty
    <div class="timeline-item timeline-spacer">
        <h3 class="my-0">{{ __('messages.ipd_patient_timeline.no_timeline_found') }}</h3>
    </div>
@endforelse
