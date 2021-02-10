@extends('layout.main')

@section('content')

	<!-- Highlighting News -->
	<div class="container my-4" id="highlight">
		<?php $a = 0 ?>
		@foreach($feature as $value)
			@if($value->status == 'featured')
			<?php $a++ ?>
				<?php if($a < 3) { ?>
				<div class="card p-4 bg-light mb-4">
					<a href="{{route('front.news', $value->id)}}">
						<h2 class="card-title text-center pb-2 text-dark" style="font-weight: 400px;">
							{{$value->title}}
						</h2>
						<img src="{{asset('user/image')}}/{{$value->image}}" class="card-img img-fluid w-100">
					</a>
				</div>
				<?php } ?>
			@endif
		@endforeach
	</div>
	<!-- /Highlighting News -->

	<!-- news list -->
	<div class="container-fluid darkbg">
		<div class="container py-4" id="list">
			<div class="row" id="heading">
				<div class="col-md-1"><h3>समाचार</h3></div>
				<div class="col-md-11"><hr style="background-color: #EF233C; height: 0.5px;"></div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<?php $a = 0 ?>
						@foreach($feature as $value)
							@if($value->status == 'featured')
							<?php $a++ ?>
								<?php if($a > 2 && $a < 9) { ?>
									<div class="col-md-4">
										<div class="card mt-4 bg-light">
											<a href="{{route('front.news', $value->id)}}">
												<img src="{{asset('user/image')}}/{{$value->image}}" class="card-img img-fluid w-100">
												<div class="d-flex flex-row justify-content-end" style="margin-top: -32px;">
													<span class="py-1 px-2" style="background-color: #EF233C; color: #fff;">{{$value->news->name}}</span>
												</div>
												<div>
													<h6 class="card-title text-center p-3" style="font-weight: 400px; font-size: 18px; font-weight: bold;">
														{{$value->title}}
													</h6>
													<i class="far fa-clock text-muted float-right p-2" style="font-size: 15px; font-weight: 300px;">&nbsp; &nbsp; {{$value->created_at}}</i>
												</div>
											</a>
										</div>
									</div>
								<?php } ?>
							@endif
						@endforeach
					</div>
				</div>
				<div class="col-md-4 mt-4" id="newslist">
					<ul style="list-style-type: none;">
						<?php $a = 0 ?>
						@foreach($feature as $value)
							@if($value->status == 'featured')
							<?php $a++ ?>
								<?php if($a > 8 && $a < 16) { ?>
									<li><a href="">{{$value->title}}</a></li><hr>
								<?php } ?>
							@endif
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- /news list -->

	<div class="container-fluid">
		<div class="container my-4">
			<div class="row">
				<div class="col-md-8">
					<!-- ad section -->
					<div>
						<div id="ad" class="text-center" style="height: 100px;">
							Place Ad here
						</div>
					</div>
					<!-- /ad section -->
					<!-- vishesh news -->					
                	<div class="row mt-4" id="heading">
						<div class="col-md-1"><h3>विशेष</h3></div>
						<div class="col-md-11 pl-md-3"><hr style="background-color: #EF233C; height: 0.5px;"></div>
					</div>
					<div  class="row" id="vishesh">
						<?php $a = 0 ?>
						@foreach($mainnews as $news)						
	                        @if($news->category_id==1)
	                        <?php $a++ ?>
		                        <?php if($a < "7") { ?>
									<div class="col-md-6">
										<div class="card mt-4 bg-light">
											<a href="{{route('front.news', $news->id)}}">
												<img src="{{asset('user/image')}}/{{$news->image}}" class="card-img img-fluid w-100">
												@if($subcategory->has('subcategory_id'))
													<div class="d-flex flex-row justify-content-end" style="margin-top: -32px;">
														<span class="py-1 px-2" style="background-color: #EF233C; color: #fff;">{{$news->mainnews->name}}</span>
													</div>
												@endif
												<div>
													<h6 class="card-title text-center p-3" style="font-weight: 400px; font-size: 18px; font-weight: bold;">
														{{ $news->title }}
													</h6>
													<i class="far fa-clock text-muted float-right p-2" style="font-size: 15px; font-weight: 300px;">&nbsp; &nbsp; {{ $news->created_at }}</i>
												</div>
											</a>
										</div>	
									</div>
								<?php } ?>
	                        @endif
						@endforeach
					</div>
					<a  value="{{$news->category_id = 1}}" href="{{ route('front.newslist', $news->category_id) }}" id="additional" class="float-right pt-3 text-danger">थप सामग्री</a>
					<!-- /vishesh news -->
				</div>
				<div class="col-md-4" class="sidecol">
					<!-- Ad -->
					<div id="ad" class="text-center" style="height: 350px;">
						Place Ad here
					</div>
					<div id="ad" class="text-center mt-4" style="height: 350px;">
						Place Ad here
					</div>
					<!-- /Ad -->
					<!-- charchama -->
					<div class="bg-light p-3 my-4" id="hashtags">
						<div class="row mb-2" id="heading">
							<div class="col-md-3"><h3>चर्चामा</h3></div>
							<div class="col-md-9 pl-md-3"><hr style="background-color: #EF233C; height: 0.5px;"></div>
						</div>
						<div class="row">
							@foreach($hashtag as $value)
							<div class="col-md-6 my-2">
								<form method="get" action="{{route('hashtag')}}">
			                      @csrf
			                      <input type="hidden" name="hashtag" value="{{$value->name}}">
	      					      <button type="submit" class="btn btn-primary">{{$value->name}}</button>
	      					    </form>
	      					</div>
      					    @endforeach
						</div>
					</div>
					<!-- /charchama -->
				</div>
			</div>
		</div>
	</div>

	<!-- desh pardesh -->
	<div class="container-fluid darkbg">
		<div class="container pt-4 pb-5">
			<div class="row" id="heading">
				<div class="col-md-2"><h3>देश परदेश</h3></div>
				<div class="col-md-10 pb-2"><hr style="background-color: #EF233C; height: 0.5px;"></div>
			</div>
			<div class="row" id="deshpradesh">
				<?php $a = 0 ?>
				@foreach($mainnews as $news)
					@if($news->category_id==8)
					<?php $a++ ?>
                        <?php if($a < "7") { ?>
						<div class="col-md-6 py-2">
							<div class="row">
								<div class="col-md-4">
									<a href="{{route('front.news', $news->id)}}">
										<img src="{{ asset('user/image') }}/{{ $news->image }}" class="img-fluid img-responsive w-100">
									</a>
									@if($subcategory->has('subcategory_id'))
										<div class="d-flex flex-row justify-content-end" style="margin-top: -32px;">
											<span class="py-1 px-2" style="background-color: #EF233C; color: #fff;">{{$news->mainnews->name}}</span>
										</div>
									@endif
								</div>
								<div class="col-md-8 d-flex flex-column justify-content-center">
									<h6 class="card-title p-2" style="font-weight: 400px; font-size: 18px; font-weight: bold;">
										<a href="" class="text-dark">{{ $news->title }}</a>
									</h6>
								</div>
							</div>
						</div>
					<?php } ?>
					@endif
				@endforeach
			</div>
			<a  value="{{$news->category_id = 8}}" href="{{ route('front.newslist', $news->category_id) }}" id="additional" class="float-right pt-3 text-danger">थप सामग्री</a>
		</div>
	</div>
	<!-- /desh pardesh -->

	<!-- Ad placement -->
	<div class="container my-4">
		<div id="ad" class="text-center">
			Place Ad here
		</div>
	</div>
	<!-- /Ad placement -->
	<!-- Rajniti -->
	<div class="container py-4" id="rajniti">
			<div class="row" id="heading">
				<div class="col-md-1"><h3>राजनीति</h3></div>
				<div class="col-md-11"><hr style="background-color: #EF233C; height: 0.5px;"></div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<?php $a = 0 ?>
						@foreach($mainnews as $news)
							@if($news->category_id == 3)
							<?php $a++ ?>
	                        	<?php if($a < "5") { ?>
								<div class="col-md-6">
									<div class="card mt-4 bg-light">
										<a href="{{route('front.news', $news->id)}}">
											<img src="{{asset('user/image')}}/{{$news->image}}" class="card-img img-fluid w-100">
											<div>
												<h6 class="card-title text-center p-3" style="font-weight: 400px; font-size: 18px; font-weight: bold;">
													{{ $news->title }}
												</h6>
												<i class="far fa-clock text-muted float-right p-2" style="font-size: 15px; font-weight: 300px;">&nbsp; {{ $news->created_at }}</i>
											</div>
										</a>
									</div>
								</div>
							<?php } ?>
							@endif
						@endforeach
					</div>
				</div>
				<div class="col-md-4 mt-4" id="newslist">
					<ul style="list-style-type: none;">							
						<?php $a = 0 ?>
						@foreach($mainnews as $news)
							@if($news->category_id == 3)
							<?php $a++ ?>
	                        	<?php if(($a > "4") && ($a < "12")) { ?>
									<li><a href="">{{$news->title}}</a></li><hr>							
								<?php } ?>
							@endif
						@endforeach
						<a  value="{{$news->category_id = 3}}" href="{{ route('front.newslist', $news->category_id) }}" id="additional" class="float-right pt-3 text-danger">थप सामग्री</a>
					</ul>
				</div>
			</div>
		</div>
	<!-- /Rajniti -->
	<!-- Ad placement -->
	<div class="container my-4">
		<div id="ad" class="text-center">
			Place Ad here
		</div>
	</div>
	<!-- /Ad placement -->
	<!-- sports -->
	<div class="container py-4" id="rajniti">
			<div class="row" id="heading">
				<div class="col-md-1"><h3>खेलकुद</h3></div>
				<div class="col-md-11"><hr style="background-color: #EF233C; height: 0.5px;"></div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<?php $a = 0 ?>
						@foreach($mainnews as $news)						
	                        @if($news->category_id==5)
	                        <?php $a++ ?>
		                        <?php if($a < "5") { ?>
									<div class="col-md-6">
										<div class="card mt-4 bg-light">
											<a href="{{route('front.news', $news->id)}}">
												<img src="{{asset('user/image')}}/{{$news->image}}" class="card-img img-fluid w-100">
												<div>
													<h6 class="card-title text-center p-3" style="font-weight: 400px; font-size: 18px; font-weight: bold;">
														{{ $news->title }}
													</h6>
													<i class="far fa-clock text-muted float-right p-2" style="font-size: 15px; font-weight: 300px;">&nbsp; &nbsp; {{ $news->created_at }}</i>
												</div>
											</a>
										</div>	
									</div>
								<?php } ?>
	                        @endif
						@endforeach
					</div>
				</div>
				<div class="col-md-4 mt-4" id="newslist">
					<ul style="list-style-type: none;">							
						<?php $a = 0 ?>
						@foreach($mainnews as $news)
							@if($news->category_id == 5)
							<?php $a++ ?>
	                        	<?php if(($a > "4") && ($a < "12")) { ?>
									<li><a href="">{{$news->title}}</a></li><hr>							
								<?php } ?>
							@endif
						@endforeach
						<a  value="{{$news->category_id = 5}}" href="{{ route('front.newslist', $news->category_id) }}" id="additional" class="float-right pt-3 text-danger">थप सामग्री</a>
					</ul>
				</div>
			</div>
		</div>
	<!-- /sports -->

	<!-- section -->
	<div class="container-fluid" style="background-color: #0E4473;">
		<!-- vichar -->
		<div class="container pt-4">
			<div class="row">
				<div class="col-md-7 bg-white py-3 mb-4" id="vichar">
					<div class="row pb-2" id="heading">
						<div class="col-md-2"><h3>विचार</h3></div>
						<div class="col-md-10 pb-2"><hr style="background-color: #EF233C; height: 0.5px;"></div>
					</div>
					<div class="row" id="box">
						<?php $a = 0 ?>
						@foreach($mainnews as $news)
							@if($news->category_id == 2)
							<?php $a++ ?>
								<?php if($a < "3") { ?>
									<div class="col-md-6">
										<a href="{{route('front.news', $news->id)}}">
											<div class="row">
												<div class="col-4 pb-3">
													<img src="{{asset('user/image')}}/{{$news->image}}" class="img-responsive img-fluid w-100 d-flex flex-row justify-content-center">
												</div>
												<div class="col-8 d-flex flex-column justify-content-center">
													<h6>{{$news->title}}</h6>
													<p>{{ $news->editor }}</p>
												</div>
												<p class="text-muted pt-2 px-3" style="font-size: 14px;"><?php echo substr($news->description,0, 100) ?>...</p>
											</div>
										</a>
									</div>
								<?php } ?>
							@endif
						@endforeach
					</div>
					<a  value="{{$news->category_id = 2}}" href="{{ route('front.newslist', $news->category_id) }}" id="additional" class="float-right pt-3 text-danger">थप सामग्री</a>
				</div>
				<!-- /vichar -->
				<div class="col-md-1"></div>
				<!-- blog -->
				<div class="col-md-4 bg-white py-3 mb-4" id="blog">
					<div class="row" id="heading">
						<div class="col-md-2"><h3>ब्लग</h3></div>
						<div class="col-md-10 pb-2"><hr style="background-color: #EF233C; height: 0.5px;"></div>
					</div>
					<div class="row p-3">
						<a href="{{route('front.news', $news->id)}}">
							<div class="row">
								<?php $a = 0 ?>
								@foreach($mainnews as $news)
									@if($news->category_id == 14)
									<?php $a++ ?>
										<?php if($a < "2") { ?>
											<div class="col-3 pb-3">
												<img src="{{asset('user/image')}}/{{$news->image}}" class="img-responsive img-fluid w-100 d-flex flex-row justify-content-center">
											</div>
											<div class="col-9 d-flex flex-column justify-content-center">
												<h6>{{$news->title}}</h6>
												<p>{{$news->editor}}</p>
											</div>
											<p class="text-muted pt-2 px-3" style="font-size: 14px;"><?php echo substr($news->description, 0 ,100) ?>...</p>
										<?php } ?>
									@endif
								@endforeach
							</div>
						</a>
					</div>
					<a  value="{{$news->category_id = 14}}" href="{{ route('front.newslist', $news->category_id) }}" id="additional" class="float-right pt-3 text-danger">थप सामग्री</a>
				</div>
			</div>
		</div>
		<!-- /blog -->
	</div>
	<!-- /section -->

	<!-- Ad placement -->
	<div class="container my-4">
		<div id="ad" class="text-center">
			Place Ad here
		</div>
	</div>
	<!-- /Ad placement -->
	<!-- kala -->
	<div class="container pt-4 pb-5" id="rajniti">
		<div class="row" id="heading">
			<div class="col-md-2"><h3>कला/साहित्य</h3></div>
			<div class="col-md-10"><hr style="background-color: #EF233C; height: 0.5px;"></div>
		</div>
		<div class="row">
			<?php $a = 0 ?>
			@foreach($mainnews as $news)
				@if($news->category_id == 10)
				<?php $a++ ?>
                	<?php if($a < "7") { ?>
					<div class="col-md-4">
						<div class="card mt-4 bg-light">
							<a href="{{route('front.news', $news->id)}}">
								<img src="{{asset('user/image')}}/{{$news->image}}" class="card-img img-fluid w-100">
								<div>
									<h6 class="card-title text-center p-3" style="font-weight: 400px; font-size: 18px; font-weight: bold;">
										{{$news->title}}
									</h6>
									<i class="far fa-clock text-muted float-right p-2" style="font-size: 15px; font-weight: 300px;">&nbsp; &nbsp; {{ $news->created_at }}</i>
								</div>
							</a>
						</div>
					</div>
				<?php } ?>
				@endif
			@endforeach
		</div>
		<a  value="{{$news->category_id = 10}}" href="{{ route('front.newslist', $news->category_id) }}" id="additional" class="float-right pt-3 text-danger">थप सामग्री</a>
	</div>
	<!-- /kala -->

	<!-- samaj -->
	<div class="container-fluid darkbg mt-2 pb-2" id="samaj">
		<div class="container pt-4 pb-4">
			<div class="row" id="heading">
				<div class="col-md-1"><h3>समाज</h3></div>
				<div class="col-md-11"><hr style="background-color: #EF233C; height: 0.5px;"></div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<?php $a = 0 ?>
						@foreach($mainnews as $news)
							@if($news->category_id == 4)
							<?php $a++ ?>
                				<?php if($a < "5") { ?>
								<div class="col-md-6">
									<div class="card mt-4 bg-light">
										<a href="{{route('front.news', $news->id)}}">
											<img src="{{asset('user/image')}}/{{$news->image}}" class="card-img img-fluid w-100">
											<div>
												<h6 class="card-title text-center p-3" style="font-weight: 400px; font-size: 18px; font-weight: bold;">
													{{ $news->title }}
												</h6>
												<i class="far fa-clock text-muted float-right p-2" style="font-size: 15px; font-weight: 300px;">&nbsp; &nbsp; {{ $news->created_at }}</i>
											</div>
										</a>
									</div>
								</div>
							<?php } ?>
							@endif
						@endforeach
					</div>
				</div>
				<div class="col-md-4 mt-4" id="newslist">
					<ul style="list-style-type: none;">							
						<?php $a = 0 ?>
						@foreach($mainnews as $news)
							@if($news->category_id == 4)
							<?php $a++ ?>
	                        	<?php if(($a > "4") && ($a < "12")) { ?>
									<li><a href="">{{$news->title}}</a></li><hr>							
								<?php } ?>
							@endif
						@endforeach
						<a  value="{{$news->category_id = 4}}" href="{{ route('front.newslist', $news->category_id) }}" id="additional" class="float-right pt-3 text-danger">थप सामग्री</a>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- /samaj -->

	<!-- radio -->
	<div class="conatiner-fluid pb-4 mb-2 pt-2" id="radio">
		<div class="container pt-4 pb-4">
			<div class="row" id="heading">
				<div class="col-md-3 pl-md-4"><h3>रेडियो कार्यक्रम</h3></div>
				<div class="col-md-9"><hr style="background-color: #EF233C; height: 0.5px;"></div>
			</div>
			<div class="row">
				<?php $a = 0 ?>
				@foreach($mainnews as $news)
					@if($news->category_id == 15)
					<?php $a++ ?>
						<?php if($a < "5") { ?>
						<div class="col-md-3">
							<div class="card mt-4 bg-light">
								<a href="{{route('front.news', $news->id)}}">
									<img src="{{asset('user/image')}}/{{$news->image}}" class="card-img img-fluid w-100">
									<div>
										<h6 class="card-title text-center p-3" style="font-weight: 400px; font-size: 18px; font-weight: bold;">
											{{ $news->title }}
										</h6>
										<i class="far fa-clock text-muted float-right p-2" style="font-size: 15px; font-weight: 300px;">&nbsp; &nbsp; {{ $news->created_at }}</i>
									</div>
								</a>
							</div>
						</div>
					<?php } ?>
					@endif
				@endforeach
			</div>
			<a  value="{{$news->category_id = 15}}" href="{{ route('front.newslist', $news->category_id) }}" id="additional" class="float-right pt-3 text-danger">थप सामग्री</a>
		</div>
	</div>
	<!-- /radio -->

	<!-- section -->
	<div class="container-fluid" style="background-color: #063C1C;">
		<!-- artha-->
		<div class="container pt-4">
			<div class="row" id="artha">
				<div class="col-md-7 bg-white py-3 mb-4">
					<div class="row pb-2" id="heading">
						<div class="col-md-1"><h3>अर्थ</h3></div>
						<div class="col-md-11 pb-2"><hr style="background-color: #EF233C; height: 0.5px;"></div>
					</div>
					<div class="row">
						<?php $a = 0 ?>
						@foreach($mainnews as $news)
							@if($news->category_id == 7)
							<?php $a++ ?>
								<?php if($a < "5") { ?>
									<div class="col-md-6">
										<div class="card mt-4 bg-light">
											<a href="{{route('front.news', $news->id)}}">
												<img src="{{asset('user/image')}}/{{$news->image}}" class="card-img img-fluid w-100">
												<div>
													<h6 class="card-title text-center p-3" style="font-weight: 400px; font-size: 18px; font-weight: bold;">
														{{ $news->title }}
													</h6>
													<i class="far fa-clock text-muted float-right p-2" style="font-size: 15px; font-weight: 300px;">&nbsp; &nbsp; {{ $news->created_at }}</i>
												</div>
											</a>
										</div>
									</div>
								<?php } ?>
							@endif
						@endforeach
					</div>
					<a  value="{{$news->category_id = 7}}" href="{{ route('front.newslist', $news->category_id) }}" id="additional" class="float-right pt-3 text-danger">थप सामग्री</a>
				</div>
				<!-- /artha-->
				<div class="col-md-1"></div>
				<!-- parwidhi -->
				<div class="col-md-4 bg-white py-3 mb-4" id="pravidhi">
					<div class="row" id="heading">
						<div class="col-md-3"><h3>प्रविधि</h3></div>
						<div class="col-md-9 pb-2"><hr style="background-color: #EF233C; height: 0.5px;"></div>
					</div>
					<?php $a = 0 ?>
					@foreach($mainnews as $news)
						@if($news->category_id == 16)
						<?php $a++ ?>
							<?php if($a < "6") { ?>
								<div class="row p-3">
									<div class="col-5 pb-3">
										<a href="{{route('front.news', $news->id)}}"><img src="{{asset('user/image')}}/{{$news->image}}" class="img-responsive img-fluid w-100 d-flex flex-row justify-content-center"></a>
									</div>
									<div class="col-7 d-flex flex-column justify-content-center">
										<a href="{{route('front.news', $news->id)}}">
											<h6>{{$news->title}}</h6>
										</a>
									</div> 
								</div>
							<?php } ?>
						@endif
					@endforeach
					<a  value="{{$news->category_id = 16}}" href="{{ route('front.newslist', $news->category_id) }}" id="additional" class="float-right pt-3 text-danger">थप सामग्री</a>
				</div>
			</div>
		</div>
		<!-- /parwidhi -->
	</div>
	<!-- /section -->

	<!-- Ad placement -->
	<div class="container my-4">
		<div class="row">
			<div class="col-md-8">
				<div id="ad" class="text-center">
					Place Ad here
				</div>
			</div>
			<div class="col-md-4">
				<div id="ad" class="text-center">
					Place Ad here
				</div>
			</div>
		</div>
	</div>
	<!-- /Ad placement -->

	<!-- manoranjan -->
	<div class="container-fluid mt-2 pb-2" id="manoranjan">
		<div class="container pt-4 pb-4">
			<div class="row" id="heading">
				<div class="col-md-1"><h3>मनोरञ्जन</h3></div>
				<div class="col-md-11"><hr style="background-color: #EF233C; height: 0.5px;"></div>
			</div>
			<div class="row">
				<div class="col-md-7">
					<div class="row">
						<?php $a = 0 ?>
						@foreach($mainnews as $news)
							@if($news->category_id == 6)
							<?php $a++ ?>
								<?php if($a < "5") { ?>
									<div class="col-md-6">
										<div class="card mt-4 bg-light">
											<a href="{{route('front.news', $news->id)}}">
												<img src="{{asset('user/image')}}/{{$news->image}}" class="card-img img-fluid w-100">
												<div>
													<h6 class="card-title text-center p-3" style="font-weight: 400px; font-size: 18px; font-weight: bold;">
														{{ $news->title }}
													</h6>
													<i class="far fa-clock text-muted float-right p-2" style="font-size: 15px; font-weight: 300px;">&nbsp; &nbsp; {{ $news->created_at }}</i>
												</div>
											</a>
										</div>
									</div>
								<?php } ?>
							@endif
						@endforeach
					</div>
				</div>
				<div class="col-md-5 mt-2" id="imglist">
					<?php $a = 0 ?>
						@foreach($mainnews as $news)
							@if($news->category_id == 6)
							<?php $a++ ?>
								<?php if(($a > "4") && ($a < "9")) { ?>
									<div class="row p-3">
										<div class="col-4 pb-3">
											<a href="{{route('front.news', $news->id)}}"><img src="{{asset('user/image')}}/{{$news->image}}" class="img-responsive img-fluid w-100 d-flex flex-row justify-content-center"></a>
										</div>
										<div class="col-8 d-flex flex-column justify-content-center">
											<a href="{{route('front.news', $news->id)}}">
												<h6>{{$news->title}}</h6>
											</a>
										</div> 
									</div>
								<?php } ?>
							@endif
						@endforeach
						<a  value="{{$news->category_id = 6}}" href="{{ route('front.newslist', $news->category_id) }}" id="additional" class="float-right pt-3 text-danger">थप सामग्री</a>
				</div>
			</div>
		</div>
	</div>
	<!-- /manoranjan -->

	<!-- sadak -->
	<div class="container-fluid darkbg mt-2 pb-2" id="sadak">
		<div class="container pt-4 pb-4">
			<div class="row" id="heading">
				<div class="col-md-2"><h3>सडक र सवारी</h3></div>
				<div class="col-md-10"><hr style="background-color: #EF233C; height: 0.5px;"></div>
			</div>
			<div class="row">
				<div class="col-md-7">
					<div class="row">
						<?php $a = 0 ?>
						@foreach($mainnews as $news)
							@if($news->category_id == 11)
							<?php $a++ ?>
								<?php if($a < "3") { ?>
									<div class="col-md-6">
										<div class="card mt-4 bg-light">
											<a href="{{route('front.news', $news->id)}}">
												<img src="{{asset('user/image')}}/{{$news->image}}" class="card-img img-fluid w-100">
												<div>
													<h6 class="card-title text-center p-3" style="font-weight: 400px; font-size: 18px; font-weight: bold;">
														{{$news->title}}
													</h6>
													<i class="far fa-clock text-muted float-right p-2" style="font-size: 15px; font-weight: 300px;">&nbsp; &nbsp; {{ $news->created_at }}</i>
												</div>
											</a>
										</div>
									</div>
								<?php } ?>
							@endif
						@endforeach
					</div>
				</div>
				<div class="col-md-5 mt-2" id="imglist">
					<?php $a = 0 ?>
						@foreach($mainnews as $news)
							@if($news->category_id == 11)
							<?php $a++ ?>
								<?php if(($a > "2") && ($a < "6")) { ?>
									<div class="row p-3">
										<div class="col-4 pb-3">
											<a href="{{route('front.news', $news->id)}}"><img src="{{asset('user/image')}}/{{$news->image}}" class="img-responsive img-fluid w-100 d-flex flex-row justify-content-center"></a>
										</div>
										<div class="col-8 d-flex flex-column justify-content-center">
											<a href="{{route('front.news', $news->id)}}">
												<h6>{{$news->title}}</h6>
											</a>
										</div> 
									</div>
								<?php } ?>
							@endif
						@endforeach
						<a  value="{{$news->category_id = 11}}" href="{{ route('front.newslist', $news->category_id) }}" id="additional" class="float-right pt-3 text-danger">थप सामग्री</a>
				</div>
			</div>
		</div>
	</div>
	<!-- /sadak -->

	<!-- Ad placement -->
	<div class="container my-4">
		<div class="row">
			<div class="col-md-4">
				<div id="ad" class="text-center">
					Place Ad here
				</div>
			</div>
			<div class="col-md-4">
				<div id="ad" class="text-center">
					Place Ad here
				</div>
			</div>
			<div class="col-md-4">
				<div id="ad" class="text-center">
					Place Ad here
				</div>
			</div>
		</div>
	</div>
	<!-- /Ad placement -->

	<!-- vishwa -->
	<div class="container pt-4 pb-5" id="rajniti">
		<div class="row" id="heading">
			<div class="col-md-1"><h3>विश्व</h3></div>
			<div class="col-md-11"><hr style="background-color: #EF233C; height: 0.5px;"></div>
		</div>
		<div class="row">
			<?php $a = 0 ?>
			@foreach($mainnews as $news)
				@if($news->category_id == 12)
				<?php $a++ ?>
					<?php if($a < "7") { ?>
						<div class="col-md-4">
							<div class="card mt-4 bg-light">
								<a href="{{route('front.news', $news->id)}}">
									<img src="{{asset('user/image')}}/{{$news->image}}" class="card-img img-fluid w-100">
									<div>
										<h6 class="card-title text-center p-3" style="font-weight: 400px; font-size: 18px; font-weight: bold;">
											{{$news->title}}
										</h6>
										<i class="far fa-clock text-muted float-right p-2" style="font-size: 15px; font-weight: 300px;">&nbsp; &nbsp; {{$news->created_at}}</i>
									</div>
								</a>
							</div>
						</div>
					<?php } ?>
				@endif
			@endforeach
		</div>
		<a  value="{{$news->category_id = 12}}" href="{{ route('front.newslist', $news->category_id) }}" id="additional" class="float-right pt-3 text-danger">थप सामग्री</a>
	</div>
	<!-- /vishwa -->
@endsection 