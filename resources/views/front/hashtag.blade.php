@extends('layout.main')

@section('content')

<div class="container pt-2 pb-3" id="rajniti">
	@if (Count($hashtags) == 0)
	<span style="color: red">
		{{ 'No results found' }}
		@else
	</span>
		<div class="row py-3" id="heading">
			<div class="col-md-4"><hr style="background-color: #EF233C; height: 2px;"></div>
			<?php $a = 0 ?>
				@foreach($hashtags as $value)
					<?php $a++ ?>
						<?php if($a<2){ ?>
							<div class="col-md-4 text-center"><h3>{{$value->hashtag}}</h3></div>
						<?php } ?>
				@endforeach
			<div class="col-md-4"><hr style="background-color: #EF233C; height: 2px;"></div>
		</div>
		<div class="row">
			@foreach($hashtags as $value)
				<div class="col-md-4">
					<div class="card mt-4 bg-light">
						<a href="{{route('front.news', $value->id)}}">
							<img src="{{asset('user/image')}}/{{ $value->image }}" class="card-img img-fluid w-100">
							<div>
								<h6 class="card-title text-center p-3" style="font-weight: 400px; font-size: 18px; font-weight: bold;">
									{{$value->title}}
								</h6>
								<i class="far fa-clock text-muted float-right p-2" style="font-size: 15px; font-weight: 300px;">&nbsp; &nbsp; {{$value->created_at}}</i>
							</div>
						</a>
					</div>
				</div>
			@endforeach
		</div>
		@endif
	</div>
@endsection