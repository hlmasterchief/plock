{{-- <div class="create-button-fixed" id="createButton">
    <div class="create-icon transition">
        <span class="glyphicon glyphicon-plus"></span>
    </div>
</div>
 --}}
<div class="menu-create">
    <div class="dropdown">
        <div data-toggle="dropdown" class="create-button-fixed dropdown-toggle" id="createButton">
            <div class="create-icon transition">
            <span class="glyphicon glyphicon-plus"></span>
            </div>
        </div>

        <ul class="dropdown-menu">
            <li id="createPost">Create bookmark</li>
            <li id="createBox">Create box</li>
            <li id="createFavourite">Create favourite</li>
        </ul>
    </div>
</div>

@include('bookmark.create')
@include('box.create')
@include('favourite.create')
