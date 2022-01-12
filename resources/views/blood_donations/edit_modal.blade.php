<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.blood_donation.edit_blood_donation') }}</h5>
                <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
            </div>
            {{ Form::open(['id' => 'editForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger display-none" id="editValidationErrorsBox"></div>
                {{ Form::hidden('blood_donation_id', null, ['id' => 'bloodDonationId']) }}
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('blood_donor_id', __('messages.blood_donor.name').(':')) }}<span
                                class="required">*</span>
                        {{ Form::select('blood_donor_id', $donorName, null, ['id' => 'editDonorName', 'class' => 'form-control', 'required']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('bags', __('messages.blood_donation.bags').(':')) }}<span
                                class="required">*</span>
                        {{ Form::number('bags', '', ['id' => 'editBags', 'class' => 'form-control', 'required', 'min' => 1, 'max' => 100]) }}
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'btnEditSave', 'data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

