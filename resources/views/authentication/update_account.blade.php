@extends('template.template')

@section('main-content')

<div class="update-account">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Change account</h3>
        </div>

        <div class="panel-body">
            <form class="updateAccount-form" autocomplete="off">
                <h4>Do you want to change email address ?</h4><br>
                <div class="form-group">
                    <label for="newEmail">New Email</label>
                    <input type="text" id="newEmail" name="newEmail" class="input-block" placeholder="example: abc@mail.com">
                </div>
                <div class="form-group">
                    <label for="repeatEmail">Repeat Email</label>
                    <input type="text" id="repeatEmail" name="repeatEmail" class="input-block" placeholder="example: abc@mail.com">
                </div>
                <br>
                <br>
                <h4>Do you want to change password ?</h4><br>
                <div class="form-group">
                    <label for="currentPass">Current Password</label>
                    <input type="password" id="currentPass" name="currentPass" class="input-block" placeholder="Enter your current password here">
                </div>
                <div class="form-group">
                    <label for="newPass">New Password</label>
                    <input type="password" id="newPass" name="newPass" class="input-block" placeholder="Password should be at least 6 characters and contain symbols @#$&%">
                </div>
                <div class="form-group">
                    <label for="repeatPass">Repeat Password</label>
                    <input type="password" id="repeatPass" name="repeatPass" class="input-block" placeholder="Reapeat new password here">
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Done</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop