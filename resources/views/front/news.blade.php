@extends('layout.main')

@section('content')

<style type="text/css">
	#review form label, #review form input{
		font-size: 15px;
	}
	.form-control, textarea{
	    border-style: none;
	    box-shadow: none;
	    border: 1px solid #BCBDBE;
	    display: block;
	    border-radius: 0;
	    resize: none;
	}

	.form-control:focus, textarea:focus {
	    border-color: inherit;
	    -webkit-box-shadow: none;
	    box-shadow: none;
	    border: 1px solid transparent;
	    border-bottom: 1px solid #031A2D;
	}
</style>

<script src='https://www.google.com/recaptcha/api.js'></script>

<div class="container-fluid">
	<div class="container">
		<ul class="breadcrumb pl-2">
			<li><a href="/"><i class="fas fa-home"></i></a></li>
			<li aria-current="page">{{$news->news->name}}</li>
		</ul>
		<!-- ad placement -->
		<div class="row mt-4">
			<div class="col-md-8">
				<div id="ad" class="text-center">
					Place Ad here
				</div>
			</div>
			<div class="col">
				<div id="ad" class="text-center">
					Place Ad here
				</div>
			</div>
		</div>
		<!-- /ad placement -->

		<!-- news -->
		<div class="row" id="news">
			<!-- news section -->
			<div class="col-md-8 mt-4">
				<div class="card p-3 mb-2">
					<div class="card-header mb-2">
						<h1 style="font-weight: bold; font-size: 35px; line-height: 52px;">{{ $news->title }}</h1>
						<div class="row">
							<div class="col-md-8 pt-2" style="font-size: 14px;">
								<i class="far fa-clock text-muted" style="font-size: 13px; font-weight: 300px;">&nbsp; &nbsp;{{ $news->created_at }} </i> | {{ $news->editor }}
							</div>
							<div class="col-md-4 d-flex flex-row justify-content-end" style="font-size: 30px;">
								<i class="fab fa-facebook-square pr-2"></i>
								<i class="fab fa-twitter-square pr-2"></i>
								<i class="fas fa-envelope pr-2"></i>
								<i class="fab fa-instagram pr-2"></i>
							</div>
						</div>
					</div>
					<img src="{{asset('user/image')}}/{{ $news->image }}" class="card-img img-fluid img-responsive w-100 py-3">
					<p class="card-text py-3">
						{!! $news->description !!}
					</p>
					<div class="card-footer text-right" style="font-size: 13px;">
						अन्तिम अपडेट: &nbsp;{{ $news->updated_at }}
					</div>
				</div>

				<!-- ad placement -->
				<div id="ad" class="text-center my-4">
					Place Ad here
				</div>
				<div id="ad" class="text-center my-4">
					Place Ad here
				</div>
				<!-- /ad placement -->

				<!-- review -->
				<div class="px-4" style="background-color: #EBEBEB;" id="review">
					<div class="row py-3" id="heading">
						<div class="col-4"><h3 style="font-size: 22px; font-weight: bold;">तपाईको प्रतिक्रिया</h3></div>
						<div class="col-8"><hr style="background-color: #EF233C; height: 1px;"></div>
					</div>
					<form role="form" method="POST" action="{{ route('storereview') }}">
						@csrf
						<div class="form-group pt-2">
							<input type="hidden" name="news_id" value="{{ $news->id }}">
						    <div class="form-group pt-2">
						    	<label>नाम (अनिवार्य)</label>
						        <input type="text" class="form-control" name="name">
						    </div>
						    <div class="form-group pt-2">
						    	<label>इमेल (अनिवार्य) (गोप्य राखिनेछ)</label>
						        <input type="text" class="form-control" name="email">
						    </div>
						    <div class="form-group pt-2">
						    	<label>प्रतिक्रिया दिनुहोस्</label>
						        <textarea class="form-control" name="description" style="width: 100%; height: 150px; line-height: 15px; font-size: 15px;"></textarea>
						    </div>
						     <div class="g-reCAPTCHA" data-sitekey="your_site_key"></div>
						</div>
						<button type="submit" class="btn py-2 px-3 my-2 mb-3" style="background-color: #0C3E69; color: white; font-size: 15px;">पठाउनुहोस्</button>
					</form>
					<div class="row">
						@foreach($reviews as $review)
							@if($news->id == $review->news_id)
						        <div class="col-md-12 pb-3">
						            <div class="card">
						                <div class="card-body p-3" style="width: 100%;">
						                    <h5>{{ $review->name }}</h5>
						                    <p style="font-size: 15px;">{{ $review->description }}</p>
						                </div>
						            </div>
						        </div>
						    @endif
					    @endforeach
					</div>
				</div>
				<!-- /review -->
			</div>
			<!-- news section -->
			
			<div class="col-md-4">

				<!-- ad placement -->
				<div id="ad" class="text-center d-flex flex-column justify-content-center my-4" style="height: 350px;">
					Place Ad here
				</div>
				<div id="ad" class="text-center mb-4">
					Place Ad here
				</div>
				<!-- /ad placement -->

				<!-- news list -->
				<div class="p-3" id="banner">
					<div class="row pb-1" id="heading">
						<div class="col-md-4"><h3>समाचार</h3></div>
						<div class="col-md-8 pb-2"><hr style="background-color: #EF233C; height: 2px;"></div>
					</div>
					<?php $a = 0 ?>
						@foreach($feature as $value)
							@if($value->status == 'featured')
							<?php $a++ ?>
								<?php if($a < 9) { ?>
									<div class="row">
										<div class="col-4 py-2">
											<a href="{{route('front.news', $value->id)}}"><img src="{{asset('user/image')}}/{{$value->image}}" class="img-responsive img-fluid w-100 d-flex flex-row justify-content-center"></a>
										</div>
										<div class="col-8 d-flex flex-column justify-content-center">
											<a href="{{route('front.news', $value->id)}}">
												<h6>{{$value->title}}</h6>
											</a>
										</div> 
									</div><hr>
								<?php } ?>
							@endif
						@endforeach
				</div>
				<!-- /news list -->

				<!-- ad placement -->
				<div id="ad" class="text-center my-4">
					Place Ad here
				</div>
				<!-- /ad placement -->

				<!-- charchama -->
					<div class="p-3 my-4" id="hashtag">
						<div class="row mb-2" id="heading">
							<div class="col-md-3"><h3>चर्चामा</h3></div>
							<div class="col-md-9 pl-md-3"><hr style="background-color: #EF233C; height: 2px;"></div>
						</div>
						<div class="row">
							@foreach($hashtag as $value)
							<div class="col-md-6">
								<button class="btn btn-primary m-2">
									<a href="">
										<h6 class="text-white">{{ $value->name }}</h6>
									</a>
								</button>
							</div>
							@endforeach
						</div>
					</div>
					<!-- /charchama -->
			</div>
		</div>
		<!-- /news -->
	</div>
</div>

@endsection