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

        <ul class="dropdown-menu" role="menu">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="createPost">Create post</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="createBox">Create box</a></li>
        </ul>
    </div>
</div>

@include('bookmark.create')
@include('box.create')