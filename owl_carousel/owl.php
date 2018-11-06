
     <!--   <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    
    Stylesheets
     <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,400italic,300italic' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="owl/OwlCarousel2-2.3.4/docs/assets/css/docs.theme.min.css">
    <!-- Owl Stylesheets 
    <link rel="stylesheet" href="../owl/OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../owl/OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.theme.default.min.css">
    <!-- Favicons 
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="owl/OwlCarousel2-2.3.4/docs/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="shortcut icon" href="../owl/OwlCarousel2-2.3.4/docs/assets/ico/favicon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <!-- javascript 
    <script src="../owl/OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js"></script>
    <script src="../owl/OwlCarousel2-2.3.4/docs/assets/owlcarousel/owl.carousel.js"></script> -->
	
	
<!-- Owl Stylesheets -->
<link rel="stylesheet" href="owl/OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="owl/OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.theme.default.min.css">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="owl/OwlCarousel2-2.3.4/docs/assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="shortcut icon" href="owl/OwlCarousel2-2.3.4/docs/assets/ico/favicon.png">
<link rel="shortcut icon" href="favicon.ico">
<script src="owl/OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js"></script>
<script src="owl/OwlCarousel2-2.3.4/docs/assets/owlcarousel/owl.carousel.js"></script>
	
    <style>
        .owl-dots{
            display: none;
        }
        
        .owl-nav{
            width: auto;
            position: absolute;
            right: 20px;
            top: 90%;
            transform: translateY(-80%)
        }
        
        span{
            font-size: 30px; color: #ccc;
        }
        .owl-prev{outline: none;}
        
        
      .post {
          width: 100%;
          background-color: #fff;
          margin: 10px 0px 10px 0px;
          padding: 10px 10px 10px 10px;
          border: 1px solid;
          border-color: #dfe3ee;
      }
	  .float {  
          display: inline-block;
          vertical-align: middle;
          -webkit-transform: perspective(1px) translateZ(0);
          transform: perspective(1px) translateZ(0);
          box-shadow: 0 0 1px transparent;
          -webkit-transition-duration: 0.3s;
          transition-duration: 0.3s;
          -webkit-transition-property: transform;
          transition-property: transform;
          -webkit-transition-timing-function: ease-out;
          transition-timing-function: ease-out;
      }

      .float:hover, .float:focus, .float:active {
          -webkit-transform: translateY(-8px);
          transform: translateY(-8px);
          -webkit-box-shadow: -1px 5px 20px -12px rgba(0,0,0,0.75);
      }
      
      .shadow:hover, .shadow:focus, .shadow:active {
          -webkit-box-shadow: -1px 5px 20px -12px rgba(0,0,0,0.75);
      }
        
    </style>

<div id="owl-demo" class="owl-carousel owl-theme">

    <div class="item post ef-box float">
        <br /><br /><br /><br />1<br /><br /><br />
    </div>

    <div class="item post ef-box float">
       <br /><br /><br /><br />2<br /><br /><br />
    </div>

    <div class="item post ef-box float">
       <br /><br /><br /><br />3<br /><br /><br />
    </div>

    <div class="item post ef-box float">
       <br /><br /><br /><br />4<br /><br /><br />
    </div>
    
    <div class="item post ef-box float">
       <br /><br /><br /><br />5<br /><br /><br />
    </div>
    
    <div class="item post ef-box float">
       <br /><br /><br /><br />6<br /><br /><br />
    </div>
    
    <div class="item post ef-box float">
      <br /><br /><br /><br />7<br /><br /><br />
    </div>
    
    
</div>

<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        margin: 10,
        loop: true,
        nav:true,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
</script>

<script src="../owl/OwlCarousel2-2.3.4/docs/assets/vendors/highlight.js"></script>
<script src="../owl/OwlCarousel2-2.3.4/docs/assets/js/app.js"></script>
