<!DOCTYPE html>
<html lang="en">

<head>
  <link href="/css/app.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <script src="/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="/css/style.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion école </title>
</head>

<body>
 


  <div class="container" style="margin-top: -500px; margin-left:0px;">
    <div class="row">

     
    <div class="col-2" style="margin-right:20px; margin-bottom:5px;">
       

       <div class="sidebar">
         <header>Menu</header>
         <a href="{{ url('/etudiants/create')}}" id="add" class="active">
           <i class="fas fa-qrcode" id="add"></i>
           <span>Ajouter étudiant</span>
         </a>

         <a href="{{ url('/enseignants/create')}}" id="add" class="active">
           <i class="fas fa-qrcode" id="add"></i>
           <span>Ajouter Prof</span>
         </a>


         <a href="{{ url('/courses/create')}}" id="add" class="active">
           <i class="fas fa-qrcode" id="add"></i>
           <span>Ajouter cours</span>
         </a>

         <a href="{{ url('/groupes/create')}}" id="add" class="active">
           <i class="fas fa-qrcode" id="add"></i>
           <span>Ajouter groupe</span>
         </a>

         <a href="{{ url('/filieres/create')}}" id="add" class="active">
           <i class="fas fa-qrcode" id="add"></i>
           <span>Ajouter filiere</span>
         </a>
       </div>

     </div>
      <div class="col-9">
        <div class="card" style="width: 100%; margin-left:75px; margin-right:0px;">
          <div class="card-header bg-info" style="color:white; font-size: 18px; font-weight:bold;" style="width: 100%;">
            Gestion école App
          </div>
          <div class="card-body">

            <div class="container" id="gr">
              <!-- <form type="get" action="{{ route('search') }}">
                @csrf
                <input type="search" name="search">
                <button type="submit">Rechercher</button>
              </form> -->
              @yield('content')

            </div>

            <p class="card-text">

            </p>
          
          </div>
        </div>
      </div>

    </div>
  </div>
  <footer class="bg-secondary text-center text-white">
    
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2023 Copyright:
      Safouane Boumoula
    </div>
  </footer>

</body>

</html>