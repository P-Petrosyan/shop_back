@extends('layouts.main')
@section('title','Products')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ url('/css/card.css') }}" />
    <div class="cards-body">
    @foreach($products as $product)
    <?php
    $color_part1 = str_pad( dechex( mt_rand( 55, 255 ) ), 2, '0', STR_PAD_LEFT);
    $color_part2 = str_pad( dechex( mt_rand( 33, 255 ) ), 2, '0', STR_PAD_LEFT);
    $color_part3 = str_pad( dechex( mt_rand( 11, 255 ) ), 2, '0', STR_PAD_LEFT);
    $color = $color_part1 . $color_part2 . $color_part3;
    $rand_color = '#'. $color ;
    ?>
    <div class="main-card" style="background-color: {{$rand_color}}">
        <div class="img-div">
            <img src="{{ asset('/storage/images/products/'.$product->image )}}" width="60px" alt="image"></td>
        </div>
        <div class="rest-div">
            <p class="name">{{$product->name}}</p>
            <div class="description-div">
                <ul>

                    @foreach($product->categories as $category)
                        <li>{{$category->name}}</li>
                    @endforeach

                </ul>
            </div>
            <p>{{$product->short_description}}</p>
        </div>
        <div class="price-div">
            <p>{{$product->price}}</p>
        </div>
        <div class="button-div">
            <form method="POST" action="/baskets/add/{{$product->id}}">
                @csrf
                <input type="submit"  value="Add to Basket">
            </form>
        </div>
    </div>

    @endforeach

    </div>
    <div class="d-flex justify-content-center paginator">
        {!! $products->links() !!}
    </div>


@endsection

<style>
    .paginator .hidden {
        display: none;
    }
    .cards-body{
        display: flex;
        /*justify-content: space-between;*/
        flex-wrap: wrap;
        align-items: flex-start;

    }
    .main-card{
        {{--background-color: {{$rand_color}};--}}
        width: 16%;
        height: 300px;
        margin-bottom: 45px;
        margin-right: 45px;
        border-radius: 20% 20% 26px 26px;
        display: flex;
        flex-direction: column;
        align-items: center;
        opacity: .9;
        box-sizing: border-box;
    }
    .main-card:nth-of-type(6), .main-card:first-child{
        margin-left: 60px;
    }
    .main-card p{
        margin: 0;
        padding: 0;
    }
    .main-card > .img-div{
        border-radius: 20% ;
        width: 100%;
        height: 50%;
        display: flex;
        align-items: flex-start;
        justify-content: center;
    }
    .img-div > img{
        border-radius: 20%;
        width: 100%;
        height: 100%;
    }
    .main-card > .rest-div{
        width: 100%;
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: space-around;
    }
    .rest-div > .name{
        color: #2b2e3a;
        text-transform: uppercase;
        font-weight: bold;

    }
    .rest-div > .description-div{
        color: #2b2e3a;
        width: 100%;
    }
    .description-div > ul{
        list-style-type: none;
        display: flex;
        justify-content: space-around;
        padding: 0;
    }
    .main-card > .button-div{
        width: 100%;
        display: flex;
        border-radius: 0 0 25px 25px;
        height: 50%;
        background: #37c059;
        justify-content: center;
    }
    .button-div input{
        background: transparent;
        color: white;
        border-radius: 0 0 25px 25px;
        width: 100%;
        height: 100%;
        border: none;
    }

</style>


