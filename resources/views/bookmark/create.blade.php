<div class="create-post">
    <div class="modal fade" id="inputPost" tabindex="-1" role="dialog" aria-labelledby="createPost" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Plock keeps your interest</h4>
            </div>

            {{-- FORM 1 TITLE HERE --}}
            <form class="createPost-form" style="display: none;">
                <div class="modal-body">
                    <div class="form-group">
                        <label for"postName">New interest</label>
                        <input type="text" class="form-control" id="postName" placeholder="Put in here">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </form>{{-- end new interest name --}}

            {{-- FORM 2 select 1 type --}}
            <form class="createPost-form">
                <div class="modal-body">
                    <h4>Hapymaher</h4>
                    <br/>
                    <h5>Hapymaher is existed in Plock !</h5>

                {{-- exist database --}}
                <div class="existedBookmark">

                    <div class="panel panel-default">
                        <div class="panel-body">
                        <div class="media">
                            <div class="media-left">
                                <div class="comment-poster">
                                    <a href="#">
                                    <img class="media-object img-responsive" src="https://s.vndb.org/cv/53/15453.jpg" alt="...">
                                    </a>
                                </div>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading">Hapymaher</h5>
                                <small>Admiration we surrounded possession frequently he.</small>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>{{-- end existed database --}}

                </div>

                <div class="modal-footer">
                    <h5>Do you want a new ?</h5>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Create new</button>
                    <button type="submit" class="btn btn-primary">Use Plock</button>
                </div>
            </form>
            {{-- end select --}}

            {{-- FORM 3 create new --}}
            <form class="createPost-form" style="display: none;">
                <div class="modal-body">
                    <h4>Hapymaher</h4>

                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <input type="text" class="form-control" id="genre" placeholder="Add genre">
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" placeholder="Add Country">
                    </div>
                    <div class="form-group">
                        <label for="director">Director</label>
                        <input type="text" class="form-control" id="director" placeholder="Add director">
                    </div>
                    <div class="form-group">
                        <label for="published">Published</label>
                        <input type="text" class="form-control" id="published" placeholder="Published year">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" placeholder="Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="review">Review</label>
                        <textarea class="form-control" id="review" placeholder="Review"></textarea>
                    </div>

                    <div class="form-group">
                        <h5>Set a picture for your bookmark</h5>
                        <p class="help-block">The image size shoul be 50x60px</p>
                        <div class="file-button btn btn-primary">
                            {{-- <button class="select-img" class="btn btn-primary">Select picture</button>--}}
                            <span>Select picture</span>
                            <input type="file" class="input-img">
                        </div>
                        <div class="message">
                            <div id="demo-img">
                            <img class="img-thumbnail" src="https://s.vndb.org/cv/53/15453.jpg" />
                        </div>
                    </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </form>
            {{-- end create new --}}

        </div>
        </div>
    </div>
</div>