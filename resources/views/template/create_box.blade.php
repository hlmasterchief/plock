<div class="create-box">
    <div class="modal fade" id="inputBox" tabindex="-1" role="dialog" aria-labelledby="createBox" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create a box</h4>
            </div>

            {{-- FORM create--}}
            <form class="createBox-form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for"boxName">Box name</label>
                        <input type="text" class="form-control" id="boxName" placeholder="Put in here">
                    </div>
                    <div class="form-group">
                        <label for"boxDescription">Description</label>
                        <textarea type="text" class="form-control" id="boxDescription" placeholder="What is your box about?"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Done</button>
                </div>
            </form>{{-- end new interest name --}}

        </div>
        </div>
    </div>
</div>