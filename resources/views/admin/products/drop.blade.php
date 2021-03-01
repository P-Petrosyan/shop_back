@extends('layouts.main')
@section('title','Products Create')
@section('content')




in_array($product->id, $category->products->toArray()) ? 'checked' : ''





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
        <div class="input-group">
            <div class="custom-file">
                <input type="file" name="image" class="custom-file-input">
                <label class="custom-file-label">Choose Image</label>
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
            <label>Category</label>
            <select name="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            </select>
            @error('category_id')
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
                  @if( isset($product->categories))
                  @foreach($product->categories as $category)
                    <li>
                          <input type="checkbox" checked="" name="category_id[]" value="{{$category->id}}" />{{$category->name}}
                      </li>
                  @endforeach
                  @endif
                  @foreach($categories as $category)
                  @if($category->products->has($product->id))
                  @continue
                  @else
                      <li>
                          <input type="checkbox" name="category_id[]" value="{{$category->id}}" id="{{$category->name}}" />{{$category->name}}
                      </li>
                  @endif
                  @endforeach
                    
                  </ul>
                </div>
            </dd>
          <button>Filter</button>
        </dl>
        </div>
        <input type="submit" class="btn btn-success" value="Save">
        </form>
    </div>
@endsection

<style>
.dropdown {
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
  cursor: pointer;
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
</html>