<div class="container-fluid">

<nav class="row main-navbar" role="navigation">
    <div class="col-md-3 col-sm-3 col-xs-4">
        <div class="navbar-wrap">
            <a href="{{ url("/home") }}" class="logo"><h4>Clever Croblmask</h4></a>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6 text-center">
        <div class="navbar-wrap">
            <div class="heading">
                <div class="heading-title">
                <h4 class="title">Box content</h4>
                <p class="sub-title">Created by <a href="/home">CroblMask</a></p>
                </div>

                <div class="buttonLockEdit"><!-- main action -->
                    {{-- if other user page --}}
                    {{-- <abbr title="Lock it"><a href="#"><span class="glyphicon glyphicon-lock"></span></a></abbr> --}}

                    {{-- if user own page --}}
                    <abbr title="Edit"><a href="#"><span class="glyphicon glyphicon-edit"></span></a></abbr>

                </div>
            </div>
        </div>
    </div>
    <div class="navbar-right text-right">
        <div class="navbar-wrap">
            <div class="input-icon search">
                <label for="search" id="search-icon"><span class="glyphicon glyphicon-search"></span></label>
                <input type="text" id="search" placeholder="Search" name="search">
            </div>
            <div class="setting">
                <div class="dropdown">
                    <div data-toggle="dropdown" class="dropdown-toggle" id="createButton">
                        <button type="button" class="setting-button" data-toggle="dropdown"><span class="glyphicon glyphicon-menu-hamburger"></span>
                        </button>
                    </div>
                    <ul class="dropdown-menu">
                        <li><a href="/home">Home page</a></li><!-- back to home page/ newfeeds -->
                        <li><a href="/profile">An Pham</a></li><!-- back to profile page -->
                        <li class="divider"></li>
                        <li>Edit profile</li>
                        <li>Log out</li>
                        <li class="divider"></li>
                        <li>Help</li>
                        <li>Term & Privacy</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav> <!-- /.navigation -->

</div>