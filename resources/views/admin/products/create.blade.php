@extends('layouts.main')
@section('title','Products Create')
@section('content')
<!-- <script src="/path/to/cdn/jquery.slim.min.js"></script> -->
<!-- <script src="/path/to/src/jquery.multi-select.js"></script> -->
	<h1>Create Product</h1>
	<div class="jumbotron">
		<form method="POST" enctype="multipart/form-data">
		@include('errors.formErrors')
		@csrf

			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control">
				@error('name')
					<span class="invalid-feedback d-block" role="alert">
						<strong>{{$message}}</strong>
					</span>
				@enderror
			</div>
			<div class="form-group">
				<div >
					<input type="file" id="exampleFormControlFile1" value="$product->image" name="image" class="form-control-file">
					<label class="cutom-file-label" for="exampleFormControlFile1">Choose Image</label>
				</div>
				<div>
					@error('image')
						<span class="invalid-feedback d-block" role="alert">
							<strong>{{$message}}</strong>
						</span>
					@enderror
				</div>
			</div>
			<div class="form-group">
				<label>Short Description</label>
				<textarea name="short_description"  class="form-control"></textarea>
				@error('short_description')
					<span class="invalid-feedback d-block" role="alert">
						<strong>{{$message}}</strong>
					</span>
					@enderror
			</div>
			<div class="form-group">
				<label>Full Description</label>
				<textarea name="full_description" class="form-control"></textarea>
				@error('full_description')
					<span class="invalid-feedback d-block" role="alert">
						<strong>{{$message}}</strong>
					</span>
					@enderror

			</div>
			<div class="form-group">
				<label>Price</label>
				<input type="number" name="price" class="form-control">
				@error('price')
					<span class="invalid-feedback d-block" role="alert">
						<strong>{{$message}}</strong>
					</span>
				@enderror
			</div>
			<div>
				<dl class="dropdown">
				    <dt>
				    <a>
				      <span class="hida">Select</span>
				      <p class="multiSel"></p>
				    </a>
				    </dt>
				    <dd>
				        <div class="mutliSelect">
				            <ul>
								@foreach($categories as $category)
									<li>
										<input type="checkbox" name="category_id[]" value="{{$category->id}}" attr="{{$category->name}}"/>
										<label>{{$category->name}}</label>
									</li>
								@endforeach


				            </ul>
				        </div>
				    </dd>
				</dl>
			</div>

			<input type="submit" class="btn btn-success" value="Save">
		</form>
</div>
<script >
    /*
    Dropdown with Multiple checkbox select with jQuery - May 27, 2013
    (c) 2013 @ElmahdiMahmoud
    license: https://www.opensource.org/licenses/mit-license.php
*/

$(".dropdown dt").on('click', function() {
  $(".dropdown dd ul").slideToggle('fast');
});

// $(".dropdown dd ul li input").on('click', function() {
//   $(".dropdown dd ul").hide();
// });

function getSelectedValue(id) {
  return $("#" + id).find("dt a span.value").html();
}

$(document).bind('click', function(e) {
  var $clicked = $(e.target);
  if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
});

$('.mutliSelect input[type="checkbox"]').on('click', function() {

  var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
    title = $(this).val() + ",";
  var catName = $(this).attr('attr');

  if ($(this).is(':checked')) {
    var html = '<span name="category_id" title="' + title + '">' + catName + '</span>';
    console.log(catName);
    $('.multiSel').append(html);
    $(".hida").hide();
  } else {
    $('span[title="' + title + '"]').remove();
    var ret = $(".hida");
    $('.dropdown dt a').append(ret);

  }
});
</script>

@endsection



<style>.dropdown {
  /*position: absolute;*/
  /*top:50%;*/
  /*transform: translateY(-50%);*/
}

a {
  color: #fff;
}

.dropdown dd,
.dropdown dt {
  margin: 0px;
  padding: 0px;
}

.dropdown ul {
  margin: -1px 0 0 0;
}

.dropdown dd {
  position: relative;
}

.dropdown a,
.dropdown a:visited {
  color: #fff;
  text-decoration: none;
  outline: none;
  font-size: 18px;
}

.dropdown dt a {
  background-color: #4F6877;
  display: block;
  padding: 8px 20px 5px 10px;
  min-height: 25px;
  line-height: 24px;
  overflow: hidden;
  border: 0;
  width: 272px;
}

.dropdown dt a span,
.multiSel span {
  cursor: pointer;
  display: inline-block;
  padding: 0 3px 2px 0;
}

.dropdown dd ul {
  background-color: #4F6877;
  border: 0;
  color: #fff;
  display: none;
  left: 0px;
  padding: 2px 15px 2px 5px;
  position: absolute;
  top: 2px;
  width: 280px;
  list-style: none;
  height: 100px;
  overflow: auto;
}

.dropdown span.value {
  display: none;
}

.dropdown dd ul li {
  /*padding: 5px;*/
  /*display: block;*/
  /*cursor: pointer;*/
}
/*
.dropdown dd ul li a:hover {
  background-color: #fff;
}*/

button {
  background-color: #6BBE92;
  width: 302px;
  border: 0;
  padding: 10px 0;
  margin: 5px 0;
  text-align: center;
  color: #fff;
  font-weight: bold;
}
</style>
