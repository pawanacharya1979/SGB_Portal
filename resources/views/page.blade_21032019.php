@extends('layouts.master1')
@section('content')

<div class="slider-inner-about" style="background-image: url(http://dai.avedemos.uk/storage/uploads/{{ $Data->path }}); background-repeat:no-repeat;">
	<div class="row m-0">
		<div class="col-md-8 col-sm-12 col-xs-12">
			<h2>{{$Data->bannertext}}</h2>
		</div>
	</div>
</div>

<div class="container custom-container">
	@if($Data->contentblock1 != '')
	{!!$Data->contentblock1!!}
	@endif
	
	@if($Data->contentblock2 != '')
	{!!$Data->contentblock2!!}
	@endif
</div>


@endsection
