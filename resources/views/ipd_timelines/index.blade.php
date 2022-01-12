@if(Auth::user()->hasRole('Admin'))
    <div class="col-lg-12">
        <a href="#" class="btn btn-primary filter-container__btn float-right mb-3" data-toggle="modal"
           data-target="#addIpdTimelineModal">
            {{ __('messages.ipd_patient_timeline.new_ipd_timeline') }}
        </a>
    </div>
@endif
@if(Auth::user()->hasRole('Admin'))
    <div class="timeline-spacer"></div>
@endif
@forelse($ipdTimelines as $ipdTimeline)
    <div class="timeline-item" date-is="{{ date('jS M, Y', strtotime($ipdTimeline->date)) }}">
        <div class="float-right bottom-sm">
            @if($ipdTimeline->ipd_timeline_document_url != '')
                <a title="download" class="btn action-btn btn-primary btn-sm"
                   href="{{ url('ipd-timeline-download'.'/'.$ipdTimeline->id) }}">
                    <i class="fa fa-download action-icon"></i>
                </a>
            @endif
            @if(Auth::user()->hasRole('Admin'))
                <a title="edit" class="btn action-btn btn-success btn-sm edit-timeline-btn"
                   data-timeline-id="{{ $ipdTimeline->id }}">
                    <i class="fa fa-edit action-icon"></i>
                </a>
                <a title="delete" class="btn action-btn btn-danger btn-sm delete-timeline-btn"
                   data-timeline-id="{{ $ipdTimeline->id }}">
                    <i class="fa fa-trash action-icon"></i>
                </a>
            @endif
        </div>
        <h3>{{ $ipdTimeline->title }}</h3>
        <p>{!! !empty($ipdTimeline->description) ? nl2br(e($ipdTimeline->description)) : __('messages.common.n/a') !!}</p>
    </div>
@empty
    <div class="timeline-item timeline-spacer">
        <h3 class="my-0">{{ __('messages.ipd_patient_timeline.no_timeline_found') }}</h3>
    </div>
@endforelse
