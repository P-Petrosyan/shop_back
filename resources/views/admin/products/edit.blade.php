@extends('layouts.main')
@section('title','Products Edit')
@section('content')

	
	<h1>Edit Product</h1>
	<form method="POST" enctype="multipart/form-data">
	@include('errors.formErrors')
	@csrf
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" value="{{$product->name}}" class="form-control @error('name') is-invalid @enderror"">
		</div>
		@error('name')
		    <div class="alert alert-danger">{{$message}}</div>
		@enderror
		@error('name')
			<span class="invalid-feedback d-block" role="alert">
				<strong>{{$message}}</strong>
			</span>
		@enderror

		
		<div class="form-group">
			<img src="{{ asset('/storage/images/products/'.$product->image )}}" value="{{$product->image}}" width="60px" alt="image" name="oldImage">
			<input type="hidden" value="{{$product->image}}" name="oldImage" >
			<input type="hidden"  name="image" >
		</div>
		<div class="form-group">
			<div >
				<input type="file" id="exampleFormControlFile1" value="$product->image" name="image" class="form-control-file">
				<label class="custom-file-label" for="exampleFormControlFile1">Choose Image</label>
			</div>
		</div>
		<div class="form-group">
			<label>Short Description</label>
			<!-- <input type="" name="name" value="{{$product->short_description}}" class="form-control"> -->
			<textarea name="short_description"  class="form-control">{{$product->short_description}}</textarea>
		</div>
		<div class="form-group">
			<label>Full Description</label>
			<textarea name="full_description" class="form-control">{{$product->full_description}}</textarea>
			<!-- <input type="" name="name" value="{{$product->full_description}}" class="form-control"> -->
		</div>
		<div class="form-group">
			<label>Price</label>
			<input type="number" name="price" value="{{$product->price}}" class="form-control">
			@error('price')
				<span class="invalid-feedback d-block" role="alert">
					<strong>{{$message}}</strong>
				</span>
			@enderror
		</div>
		<div>
			<label>Category</label>
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
			                    <input type="checkbox"
			                    @php
				                    foreach ($product->categories as $cat){
					                     if ($cat->id == $category->id){
					                    	echo 'checked';
					                     }
				                    }
		                      	@endphp	
			                    name="category_id[]" value="{{$category->id}}" attr="{{$category->name}}"/>
			                    <label>{{$category->name}}</label>
			                </li>
			
			            @endforeach
			              
			            </ul>
			        </div>
			    </dd>
			  <!-- <button>Filter</button> -->
			</dl>
		</div>

		<input type="submit" class="btn btn-success" value="Save">
	</form>
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

<script>
	var expanded = false;

	function showCheckboxes() {
	  var checkboxes = document.getElementByClassName("checkboxes");
	  if (!expanded) {
	    checkboxes.style.display = "block";
	    expanded = true;
	  } else {
	    checkboxes.style.display = "none";
	    expanded = false;
	  }
	}

	$("js-select2").select2({
      closeOnSelect : false,
      placeholder : "Placeholder",
      // allowHtml: true,
      allowClear: true,
      tags: true // создает новые опции на лету
    });
</script>

<style>

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