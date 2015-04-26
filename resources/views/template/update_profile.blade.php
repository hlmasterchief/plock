@extends('template.template')

@section('main-content')

<div class="update-profile">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Change your information</h3>
        </div>

        <div class="panel-body">
            <form class="updateProfile-form" autocomplete="off">
                <div class="form-group">
                    <label for="displayname">Display name</label>
                    <input type="text" id="displayname" name="displayname" class="input-block" placeholder="Displayname">
                </div>
                <div class="form-group">
                    <label for="repeatEmail">Location</label>
                    <input type="text" id="repeatEmail" name="repeatEmail" class="input-block" placeholder="New location">
                </div>
                <div class="form-group">
                    <label for="currentPass">Your website</label>
                    <input type="password" id="currentPass" name="currentPass" class="input-block" placeholder="Your personal page">
                </div>
                <div class="form-group">
                    <h5>Change your profile picture</h5>
                    <p class="help-block">The image size shoul be 50x60px</p>
                    <div class="file-button btn btn-primary">
                        {{-- <button class="select-img" class="btn btn-primary">Select picture</button>--}}
                        <span>Select picture</span>
                        <input type="file" class="input-img">
                    </div>
                    <div class="message">
                        <div class="demo-img avartar crop-140">
                        <img class="media-object" src="https://s.vndb.org/cv/53/15453.jpg" />
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <h5>Change your cover picture</h5>
                    <p class="help-block">The image size should be 50x60px</p>
                    <div class="file-button btn btn-primary">
                        {{-- <button class="select-img" class="btn btn-primary">Select picture</button>--}}
                        <span>Select picture</span>
                        <input type="file" class="input-img">
                    </div>
                    <div class="message">
                        <div class="demo-img cover">
                        <img class="img-responsive" src="https://s.vndb.org/cv/53/15453.jpg" />
                        </div>
                    </div>
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