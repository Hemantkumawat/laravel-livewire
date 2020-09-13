<!-- Modal -->
<div wire:ignore.self class="modal fade" id="showModal" tabindex="-1" role="dialog"
     aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel">User Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label> Name </label> <span class="text-primary"> {{ $user->name??null }}</span>
                    </div>
                    <div class="col-md-12">
                        <label for="email"> Email Id </label> <span class="text-primary"> {{ $user->email??null }}</span>
                    </div>
                    <div class="col-md-12">
                        <label> Join Date </label> <span class="text-primary"> {{ $user->created_at??null }}</span>
                    </div>
                    <div class="col-md-12">
                        <label> Last Updated </label> <span class="text-primary"> {{ $user->updated_at??null }}</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
