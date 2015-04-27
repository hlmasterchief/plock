<div class="create-post">
    <div class="modal fade" id="inputPost-1" tabindex="-1" role="dialog" aria-labelledby="createPost" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Plock keeps your interest</h4>
            </div>

            {{-- FORM 1 TITLE HERE --}}
            <form class="createPost-form" id="createPost-form-1">
                <div class="modal-body">
                    <div class="form-group float-label">
                        <input type="text" class="input-block" name="name" id="name" required>
                        <label for="postName">New Bookmark</label>
                        <input type="hidden" id="type" name="type" value="" required>
                    </div>

                    <div class="dropdown">
                        <div class="dropdown-toggle" id="createButton">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <span id="current-category">Select a category</span> <span class="caret"></span>
                            </button>
                            <span class="text-warning" id="warning-category"></span>
                        </div>
                        <ul class="dropdown-menu">
                            <li value="musics">Music</li>
                            <li value="movies">Movie</li>
                        </ul>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </form>{{-- end new interest name --}}

        </div>
        </div>
    </div>


    <div class="modal fade" id="inputPost-2" tabindex="-1" role="dialog" aria-labelledby="createPost" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Plock keeps your interest</h4>
            </div>

            {{-- FORM 2 select 1 type --}}
            <form class="createPost-form">
                <div class="modal-body">
                <h3><span id="search-words"></span> is existed in Plock</h3>
                <p>Choose existed <span id="search-type"></span> below or create a new one</p>

                {{-- exist database --}}
                <div class="ex-list panel panel-default" id="found-app">
                    <div class="panel-body" id="found-list"></div>
                </div>{{-- end existed database --}}

                </div>

                <div class="modal-footer">
                    <h5>Do you want a new ?</h5>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create new</button>
                </div>
            </form>
            {{-- end select --}}

        </div>
        </div>
    </div>


    <div class="modal fade" id="inputPost-3" tabindex="-1" role="dialog" aria-labelledby="createPost" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Plock keeps your interest</h4>
            </div>

            {{-- FORM 3 create new --}}
            <form class="createPost-form">
                <div class="modal-body">
                    <h4>Hapymaher</h4>

                    <div class="form-group">
                        <input type="text" class="input-block" id="genre" placeholder="Genre">
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-block" id="country" placeholder="Country">
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-block" id="director" placeholder="Drector">
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-block" id="published" placeholder="Published year">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="review" placeholder="What is your bookmark about?"></textarea>
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
                            <div class="demo-img">
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



<script type="text/template" id="bookmarkfound-template">
    <div class="ex-bookmark panel panel-default">
        <div class="panel-body">
        <div class="media">
            <div class="media-left">
                <div class="comment-poster">
                    <img class="media-object img-responsive" src="https://s.vndb.org/cv/53/15453.jpg" alt="...">
                </div>
            </div>
            <div class="media-body">
                <h5 class="media-heading"><%- short_data.name %></h5>
                <small><%- short_data.description %></small>
            </div>
        </div>
        </div>

        <div class="overlay">
            <div class="overlay-main transition">
                <span class="glyphicon glyphicon-lock" id="plock-fav"></span>
                <span class="ripple"></span>
            </div>
        </div>
    </div>
</script>