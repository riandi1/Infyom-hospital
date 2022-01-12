<div id="editProfileModal" class="modal fade px-0" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content   ">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.profile.edit_profile') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'editProfileForm','files'=>true]) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="editProfileValidationErrorsBox"></div>
                {{ Form::hidden('user_id',null,['id'=>'editUserId']) }}
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('first_name', __('messages.profile.first_name').':') }}<span
                                class="required">*</span>
                        {{ Form::text('first_name', null, ['id'=>'firstName','class' => 'form-control','required']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('last_name', __('messages.profile.last_name').':') }}<span
                                class="required">*</span>
                        {{ Form::text('last_name', null, ['id'=>'lastName','class' => 'form-control','required']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('email', __('messages.profile.email').':') }}<span class="required">*</span>
                        {{ Form::email('email', null, ['id'=>'email','class' => 'form-control','required']) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('phone', __('messages.profile.phone').':') }}
                        {{ Form::number('phone', null, ['id'=>'phone','class' => 'form-control']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6 col-md-8 d-flex">
                        <div class="col-sm-3 pl-0">
                            {{ Form::label('image', __('messages.profile.profile').':') }}
                            <label class="edit-profile__file-upload pointer"> {{ __('messages.common.choose') }}
                                {{ Form::file('image',['id'=>'profileImage','class' => 'd-none']) }}
                            </label>
                        </div>
                        <div class="col-sm-3 pl-0 mt-2 float-right">
                            <img id='editPhoto' class="img-thumbnail thumbnail-preview ml-5 image-stretching"
                                 src=""/>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnPrEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light left-margin"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

<div id="changeLanguageModal" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content left-margin">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.profile.change_language')}}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id'=>'changeLanguageForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="editProfileValidationErrorsBox"></div>
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-12">
                        {{ Form::label('language',__('messages.profile.language').':') }}<span
                                class="required">*</span>
                        {{ Form::select('language', \App\Models\User::LANGUAGES, Auth::user()->language, ['id'=>'language','class' => 'form-control','required']) }}
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnLanguageChange','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light left-margin"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

