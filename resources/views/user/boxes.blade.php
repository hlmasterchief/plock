@extends('template.profile')

@section('menu-content')

<div class="boxs-list">

<div class="thumbnails">
<div class="row">

    @foreach ($boxes as $box)
    <div class="col-md-4 col-sm-4 col-xs-6">
        <div class="thumbnail transition">
            <div class="thumbnail-wrap">
                <div class="thumbnail-img transition">
                    <img class="transition" src="{{ $box->bookmarks->first()->favourite->image or '/img/unknown.png'}}">
                </div>

                <div class="thumbnail-a"><a href="/box/{{ $box->id }}"></a></div>

                <div class="caption">
                    <h4>
                        <span class="text-left">{{ $box->title }}</span>
                        <span class="text-right">{{ $box->bookmarks->count() }}</span>
                    </h4>
                </div>
                <div class="thumbnail-data">

                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
</div><!-- /.boxs-list -->

</div><!-- /.boxs-list page -->

@stop
