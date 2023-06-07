<style>  
@import url('https://fonts.googleapis.com/css2?family=Work+Sans:wght@500&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

.container{
	max-width: 100%;
	margin:auto;
}

h5{
    font-family: 'Work Sans', sans-serif;
    font-style: normal;
    font-weight: 700;
}
li a{
    color: #000814;
    font-family: 'Work Sans', sans-serif;
    font-style: normal;
    font-weight: 400;
}
.row{
	display: flex;
	flex-wrap: wrap;
}
ul{
	list-style: none;
}
footer{
	background-image: url('wrp-assets/footer-bg.png');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding: 120px;
    
    
   
}
.section {
    min-height: 100vh; /* minus the height of the footer */
}
.footer-col{
   width: 25%;
   padding: 0 15px;
}
footer col h4{
	
	color: #000814;
	font-family: 'Work Sans', sans-serif;
	margin-bottom: 35px;
	font-weight: 700;
	position: relative;
    font-style: normal;
    font-weight: 700;
    font-size: 24px;
    line-height: 35px;
}

footer col ul li:not(:last-child){
	margin-bottom: 10px;
}
footer col ul li a{
    font-family: 'Work Sans', sans-serif;
    font-style: normal;
    font-weight: 400;
    font-size: 24px;
    line-height: 35px;
	
	
	color: #000814;
	text-decoration: none;
	font-weight: 300;
	color: #000814;
	display: block;
	transition: all 0.3s ease;
}


.left{
    padding-left: 40px;
  width: 0%;
}

.middle,.right {
  width: 25%;
}

/*responsive*/
@media(max-width: 767px){
  .footer-col{
    width: 50%;
    margin-bottom: 30px;
}
}
@media(max-width: 574px){
  .footer-col{
    width: 100%;
}
}

</style>

<div class="container-fluid">
  <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 min-height: 100vh ">
    
    
    <div class="col-6">
      <h5 style>Contact</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 "style="color: #000814;">westrembo.ph@gmail.com</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 "style="color: #000814;">+63 939 895 2293</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 "style="color: #000814;">West RemboMakati, Philippines</a></li>
      </ul>
    </div>

    <div class="col mb">
      <h5>Our Services</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 "style="color: #000814;">Document Request</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 "style="color: #000814;">Appointment</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 "style="color: #000814;">Announcement</a></li>
       
      </ul>
    </div>

    <div class="col mb">
      <h5>Quick links</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 " style="color: #000814;">Feedback</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 "style="color: #000814;">Contact us</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 "style="color: #000814;">About</a></li>
      </ul>
    </div>
  </footer>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>