@extends('layouts.app')

@section('content')

@include('admin/header')

<div class="content-wrapper">
	@if(count($errors)>0)
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    @endif
    @if(Session::has('msg'))
        <div class="alert alert-success">
            {{Session::get('msg')}}
        </div>
    @endif

    <div class="container-fluid">
		<!-- Card Start -->
        <div class="card card-primary">
            <h1 class="text-center pt-3 pb-2 bg-light" style="font-family: times new roman;">Edit News</h1>
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('updatenews', $news->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <!-- Title -->
                    <div class="form-group">
                        <div class="form-group">
                            <label>News title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter title" id="title" value="{{ $news->title }}">
                        </div>
                    </div>
                    <!-- /title -->

                    <!-- description -->
                    <div class="form-group">
                        <div class="form-group">
                            <label>News description</label>
                            <textarea class="textarea p-2" name="description" id="textarea" placeholder="Place news description here" style="width: 100%; height: 120px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 5px;">{{ $news->description }}</textarea>
                        </div>
                    </div>
                    <!-- /description -->

                    <!-- image -->
                    <div class="form-group">
                        <label for="exampleInputFile">Insert Image</label>
                        <div class="input-group">
                            <input type="file" name="image" id="fileToUpload" class="form-control" value="{{ $news->image }}">
                        </div>
                    </div>
                    <!-- /image -->

                    <!-- editor's name -->
                    <div class="form-group">
                         <div class="form-group">
                            <label>Editor's Name</label>
                            <input type="text" class="form-control" name="editor" placeholder="Enter Editor's Name" value="{{ $news->editor }}">
                        </div>
                    </div>
                    <!-- /editor's name -->

                    <!-- Keyword -->
                    <div class="form-group">
                         <div class="form-group">
                            <label>Keyword</label>
                            <input type="text" class="form-control" name="keyword" placeholder="Enter Keyword" value="{{ $news->keyword }}">
                        </div>
                    </div>
                    <!-- /Keyword -->

                    <!-- Hashtag -->
                    <div class="form-group">
                         <div class="form-group">
                            <label>Hashtag</label>
                            <input type="text" class="form-control" name="hashtag" placeholder="Enter Hashtag" value="{{ $news->hashtag }}">
                        </div>
                    </div>
                    <!-- /Hashtag -->

                    <!-- status -->
                    <div class="form-group">
                       <label>Status <small>(To be displayed at the top)</small></label><br>
                       <select class="form-control" name="status">
                            <option selected>-- Select Status --</option>
                            <option value="featured">Featured</option>
                            <option value="normal">Normal</option>
                        </select>
                    </div>
                    <!-- /status -->

                    <!-- category dropdown -->
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" class="form-control input-sm" id="category">
                            <option value="">--- Select Category ---</option>
                            @foreach ($categories as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- /category dropdown -->

                    <!-- subcategory dropdown -->
                    <div class="form-group">
                        <label for="subcategory">Sub Category</label>
                        <select name="subcategory_id" class="form-control input-sm" id="subcategory">
                            <option>-- Sub Category --</option>
                        </select>
                    </div>
                    <!-- /subcategory dropdown -->
                   
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
            <!-- /form start -->
        </div>
        <!-- /card start -->
	</div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="category_id"]').on('change',function(){
               var categoryID = jQuery(this).val();
               if(categoryID)
               {
                  jQuery.ajax({
                     url : '/addnews/subcategory/' +categoryID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="subcategory_id"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="subcategory_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="subcategory_id"]').empty();
               }
            });
    });
    </script>

@endsection