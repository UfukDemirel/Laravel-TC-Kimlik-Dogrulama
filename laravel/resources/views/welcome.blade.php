<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>TC. Doğrulama</title>
</head>
<body>
<br>
<br>
<br>
<br>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">TC. DOĞRULAMA</h2>
            </div>
        </div>

@if(Session::get('status') === false)
    <div class="alert alert-danger" role="alert">
        -Hata-
    </div>
    @if(Session::has('failedCount'))
        @php

            $failedCount = Session::get('failedCount');
            $failedCount = $failedCount +1;
            echo $failedCount;
            Session::put('failedCount',$failedCount);
        @endphp
    @else
        @php

          Session::put('failedCount',1);
          $hata= Session::get('failedCount');
          echo $hata;
        @endphp

    @endif

{{--//doğru TC girilirse failedcount sıfırlanacak.--}}
{{--//sayfa yenilendiğinde last activity değişmeyecek.--}}
@endif

@php

        $lastActivityHour = Session::get('lastActivityHour');
        $lastActivity = Session::get('lastActivity');
                   $now=(int)\Carbon\Carbon::now()->format('i');
                   $nowHour=(int)\Carbon\Carbon::now()->format('h');
                   if (Session::get('failedCount') >= 3 && !($nowHour > $lastActivityHour))
                   {
                       if ($now - $lastActivity < 2){
                           Session::put('locked', true);
                       }else{
                            Session::put('locked' , false);
                       }
                   } else {
                      Session::put('locked' , false);
                   }
@endphp
<br>
<br>
<br>
@if(Session::get('locked') == false)


    <div align="center">
        <form action="{{route("sonuc")}}" method="post">
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                   <input type="text" class="form-control" name="tc" value="{{old('tcNo')}}"
                           placeholder="TC. Giriniz.">
                    <br>
                    <input type="text" class="form-control" name="ad" value="{{old('tcNo')}}" placeholder="Ad Giriniz.">
                    <br>
                    <input type="text" class="form-control" name="soyad" value="{{old('tcNo')}}"
                           placeholder="Soyad Giriniz.">
                    <br>
                    <input type="text" class="form-control" name="dogumyili" value="{{old('tcNo')}}"
                           placeholder="Doğum Yılı Giriniz.">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">DOĞRULA</button>
            </div>
        </form>
                </div>

@else

    {{Session::get('lastActivity')}}
    {{Session::get('failedCount')}}
    kilitlendiniz

@endif


</section>
</div>
    </div>
    </div>
    </div>




    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>


