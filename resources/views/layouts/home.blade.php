@extends('layouts.master')

@section('content')

<div class="container">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin-top: 20px">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://i.kym-cdn.com/entries/icons/mobile/000/010/843/ricardo.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://i.kym-cdn.com/entries/icons/mobile/000/010/843/ricardo.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://i.kym-cdn.com/entries/icons/mobile/000/010/843/ricardo.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
   <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button>
  </div>
  <h1 class="text-color" style="margin-top: 40px; margin-bottom: 40px">Tagihan Pascabayar</h1>
  <div class="row">
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/pln.jpg')}}" class="card-img-top icon" alt="tagihan-pln">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Listrik</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/indihome.jpg')}}" class="card-img-top icon" alt="tagihan-indihome">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Indihome</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/bpjs.jpg')}}" class="card-img-top icon" alt="tagihan-bpjs">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>BPJS</strong></h6>
          </div>
        </div>
      </a>
    </div>
  </div>

  <h1 class="text-color" style="margin-top: 40px; margin-bottom: 40px">Listrik & Pulsa</h1>
  <div class="row">
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/pln.jpg')}}" class="card-img-top icon" alt="top-up-token-listrik">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Token Listrik</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/telkomsel.jpg')}}" class="card-img-top icon" alt="top-up-token-listrik">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Telkomsel</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/indosat.jpg')}}" class="card-img-top icon" alt="top-up-token-listrik">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Indosat</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/axis.jpg')}}" class="card-img-top icon" alt="top-up-token-listrik">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Axis</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/smartfrend.jpg')}}" class="card-img-top icon" alt="top-up-token-listrik">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Smartfren</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/tri.jpg')}}" class="card-img-top icon" alt="top-up-token-listrik">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Tri</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/xl.jpg')}}" class="card-img-top icon" alt="top-up-token-listrik">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>XL</strong></h6>
          </div>
        </div>
      </a>
    </div>
  </div>

  <h1 class="text-color" style="margin-top: 40px; margin-bottom: 40px">Data</h1>
  <div class="row">
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/telkomsel.jpg')}}" class="card-img-top icon" alt="top-up-token-listrik">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Telkomsel</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/indosat.jpg')}}" class="card-img-top icon" alt="top-up-token-listrik">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Indosat</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/axis.jpg')}}" class="card-img-top icon" alt="top-up-token-listrik">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Axis</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/smartfrend.jpg')}}" class="card-img-top icon" alt="top-up-token-listrik">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Smartfren</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/tri.jpg')}}" class="card-img-top icon" alt="top-up-token-listrik">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Tri</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/xl.jpg')}}" class="card-img-top icon" alt="top-up-token-listrik">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>XL</strong></h6>
          </div>
        </div>
      </a>
    </div>
  </div>

  <h1 class="text-color" style="margin-top: 40px; margin-bottom: 40px">TopUp Game</h1>
  <div class="row">
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/mlbb_mobile.jpg')}}" class="card-img-top icon" alt="top-up-mobile-legends">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Mobile Legends</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/free_fire.jpg')}}" class="card-img-top icon" alt="top-up-free-fire">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Free Fire</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/aov.jpg')}}" class="card-img-top icon" alt="top-up-arena-of-valor">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Arena Of Valor</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/pubg.jpg')}}" class="card-img-top icon" alt="top-up-pubg-mobile">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>PUBG Mobile</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/genshin_impact.jpg')}}" class="card-img-top icon" alt="top-up-genshin-impact">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Genshin Impact</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/apex_mobile.jpg')}}" class="card-img-top icon" alt="top-up-apex-mobile">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Apex Mobile</strong></h6>
          </div>
        </div>
      </a>
    </div>>
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/life_after.jpeg')}}" class="card-img-top icon" alt="top-up-life-after">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Life After</strong></h6>
          </div>
        </div>
      </a>
    </div>>
    <div class="col col-md-2 item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/garena.jpg')}}" class="card-img-top icon" alt="top-up-garena-shell">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Garena Shell</strong></h6>
          </div>
        </div>
      </a>
    </div>
  </div>

  <h1 class="text-color" style="margin-top: 40px; margin-bottom: 40px">TopUp E-Wallet</h1>
  <div class="row">
    <div class="col item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/gopay.jpg')}}" class="card-img-top icon" alt="top-up-gopay">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>Go-Pay</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/ovo.jpg')}}" class="card-img-top icon" alt="top-up-ovo">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>OVO</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/dana.jpg')}}" class="card-img-top icon" alt="top-up-dana">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>DANA</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/linkaja.jpg')}}" class="card-img-top icon" alt="top-up-linkaja">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>LinkAja</strong></h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col item-col">
      <a class="a-none" href="">
        <div class="card card-cst">
          <img src="{{asset('logo/shopee_pay.jpg')}}" class="card-img-top icon" alt="top-up-shopee-pay">
          <div class="card-body text-center">
            <h6 class="text-color"><strong>ShopeePay</strong></h6>
          </div>
        </div>
      </a>
    </div>
  </div>

</div>
@endsection
