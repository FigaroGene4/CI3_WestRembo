
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>West Rembo</title>
        <link rel="stylesheet" href="css/style.css"/>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <style>
  body::before {
  display: block;
  content: '';
  height: 60px;
}

.navbar {
  background-color: #001D3D;
}

.navbar-dark .navbar-nav .nav-link {
  color: white;
}







</style>
    <!---navbar--->
<body>

<nav class="navbar navbar-expand-lg py-3 fixed-top ">
      <div class="container">
      <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
      <img src="../wrp-assets/logo-white1.png" style="width: 150px; height: 50px;">
      </a>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navmenu"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
          <ul class="navbar-nav ms-auto">
           
            <i class="bi bi-file-earmark-text "  style="color: #ffff;"></i><a id='noti_number'class="nav-link scrollto active"  style="color: #ffff;" href="<?php echo base_url('logout'); ?>">Logout</a>
        
            
          </li>
        </ul>

        <i class="bi bi-list mobile-nav-toggle"></i>
          </ul>
        </div>
      </div>
    </nav>
    <script>var links = document.getElementsByClassName('link')
for(var i = 0; i <= links.length; i++)
   addClass(i)


function addClass(id){
   setTimeout(function(){
      if(id > 0) links[id-1].classList.remove('hover')
      links[id].classList.add('hover')
   }, id*750) 
}</script>
</body>
    <!---navbar--->
    