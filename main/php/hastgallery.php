<?php
include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> HAST Art Gallery </title>
	<link rel="stylesheet" href="../css/main.css">
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body>

<section id="main">
	<div class="name"> 
		<h3> welcome to </h3>
		<div id="effect"></div>
	</div>
</section>

<section id="About">
	<div class="about-text">
	<h1>about</h1>
	<p> Hi, Welcome to the HAST Art Gallery! We're so glad you're here!<br>
	<br>The HAST Art Gallery is an online galley made for exploration and experimentation. We want to encourage everyone to experience the world through the lens of art. <br><br> We are a fairly new gallery made for art lovers and others who want to explore and see different art pieces, and give everyone the opportunity to buy some art work! <br>
	<br>Feel free to look around, buy a piece or two, and leave some feedback at the end! We'd love to hear your feedback!<br><br> Happy Exploring 🖼 </p>
	</div>
	<div class="about-image">
	<img src="https://images.unsplash.com/photo-1569084024058-1632922a4e1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1000&q=80" height="800" width="680">
	</div>
</section>

<section id="ArtWork">
<h1>art works</h1>
<!---CARD 1----->
	<div class="cards">
	<div class="image">
		<img src="https://images.unsplash.com/photo-1569063386798-345908ef9a62?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80">
	</div>
		<div class="title">
			<h2>PRÉCIS</h2>
		</div>
		<div class="descrip">
			<p>An abstract painting of a graffiti wall(1999)</p>
			<p><b>$250</b></p>
			<button>Add to Cart</button>
		</div>	
	</div>

<!---CARD 2----->
	<div class="cards">
	<div class="image">
		<img src="https://www.digitaldeployment.com/sites/main/files/imagecache/lightbox/main-images/unsplash-photo-example.jpg">
	</div>
		<div class="title">
			<h2>GOLDEN</h2>
		</div>
		<div class="descrip">
			<p>A detailed close-up of the golden gate bridge(2003)</p>
			<p><b>$400</b></p>
			<button>Add to Cart</button>
		</div>	
	</div>

<!---CARD 3----->
	<div class="cards">
	<div class="image">
		<img src="https://images.unsplash.com/photo-1578397766155-32cf962daa40?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80">
	</div>
		<div class="title">
			<h2>INGENIUM</h2>
		</div>
		<div class="descrip">
			<p>A watercolor painting of nature(2000)</p>
			<p><b>$175</b></p>
			<button>Add to Cart</button>
		</div>	
	</div>

<!---CARD 4----->
	<div class="cards">
	<div class="image">
		<img src="https://images.unsplash.com/photo-1523554888454-84137e72c3ce?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max">
	</div>
		<div class="title">
			<h2>INTUEOR</h2>
		</div>
		<div class="descrip">
			<p>A meledy of different colors and shapes(2003)</p>
			<p><b>$200</b></p>
			<button>Add to Cart</button>
		</div>	
	</div>

<!---CARD 5----->
	<div class="cards">
	<div class="image">
		<img src="https://images.unsplash.com/photo-1580647336415-f6e422ad2b83?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1000&q=80">
	</div>
		<div class="title">
			<h2>SENTENTIA</h2>
		</div>
		<div class="descrip">
			<p>A gift portraying the minds feelings(2005)</p>
			<p><b>$250</b></p>
			<button>Add to Cart</button>
		</div>	
	</div>
<!---CARD 6----->
	<div class="cards">
	<div class="image">
		<img src="https://images.unsplash.com/photo-1485796826113-174aa68fd81b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1000&q=80">
	</div>
		<div class="title">
			<h2>GLO</h2>
		</div>
		<div class="descrip">
			<p>A vibrant glow in the dark image(2010)</p>
			<p><b>$300</b></p>
			<button>Add to Cart</button>
		</div>	
	</div>
<!---CARD 7----->
	<div class="cards">
	<div class="image">
		<img src="https://images.unsplash.com/photo-1518709517357-c124f2f640a9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1000&q=80">
	</div>
		<div class="title">
			<h2>FLORIA</h2>
		</div>
		<div class="descrip">
			<p>A combination of 2D and 3D textures(2007)</p>
			<p><b>$350</b></p>
			<button>Add to Cart</button>
		</div>	
	</div>
<!---CARD 8----->
	<div class="cards">
	<div class="image">
		<img src="https://images.unsplash.com/photo-1569172122301-bc5008bc09c5?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max">
	</div>
		<div class="title">
			<h2>STROKES</h2>
		</div>
		<div class="descrip">
			<p>A painting of many vivid colors(1997)</p>
			<p><b>$150</b></p>
			<button>Add to Cart</button>
		</div>	
	</div>
</section>
<!---JAVASCRIPT--->
<script>	
	var x = 0;
	var texteffect = "HAST art gallery";
	var container = document.getElementById('effect')

	function animate() {
if (x<texteffect.length){
	container.innerHTML+=texteffect.charAt(x);
	x++;
	setTimeout(animate, 160);
	}
}
animate();
</script>


</body>
<div>
<?php
include 'footer.php';
?> 
</div>  
</html>