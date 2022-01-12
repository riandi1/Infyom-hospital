<script id="liveConsultationActionTemplate" type="text/x-jsrender">
    {{if status == 0}}
    <a title="{{:title}}" class="btn action-btn btn-primary btn-sm start-btn" data-id="{{:id}}">
         <i class="fas fa-video action-icon"></i>
    </a>
    {{/if}}
    
     {{if isDoctor || isAdmin}}
        {{if !isMeetingFinished}}
            <a title="Edit" class="btn action-btn btn-success btn-sm edit-btn" data-id="{{:id}}">
                <i class="fa fa-edit action-icon"></i>
            </a>
        {{/if}}
        <a title="Delete" class="btn action-btn btn-danger btn-sm delete-btn" data-id="{{:id}}">
            <i class="fa fa-trash action-icon"></i>
        </a>
     {{/if}}



</script>
<script id="liveMeetingActionTemplate" type="text/x-jsrender">
    {{if status == 0}}
        <a title="{{:title}}" class="btn action-btn btn-primary btn-sm start-btn" data-id="{{:id}}">
         <i class="fas fa-video action-icon"></i>
        </a>
    {{/if}}
    {{if isDoctor || isAdmin}}
        {{if !isMeetingFinished}}
            <a title="Edit" class="btn action-btn btn-success btn-sm edit-btn" data-id="{{:id}}">
                <i class="fa fa-edit action-icon"></i>
            </a>
        {{/if}}
        <a title="Delete" class="btn action-btn btn-danger btn-sm delete-btn" data-id="{{:id}}">
            <i class="fa fa-trash action-icon"></i>
        </a>
     {{/if}}


</script>
