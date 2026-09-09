<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <title>Footer</title>
<style>
* {
  box-sizing: border-box;
}

/* Create four equal columns that floats next to each other */
.column {
  float: left;
  width: 25%;
  padding: 10px;
  height: 150px; 
}


/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

h3 {
  color: black; 
  text-align: center;
}

p {
  text-align: center;
}

.mapforfooter-image {
  display: block;
  margin: auto;
  width: 100px;
  height: 100px;
  border: 3px solid #333333;
}

footer {
  position: fixed;
  left: 0;
  bottom: 40px;
  width: 100%;
  text-align: center;
}




</style>

</head>
<body>

</body>

  <footer>
    <div class="row">
      <div class="column">
        <h3>About Us</h3>
        <p>Makhanda Gateway
        <br><a href="https://www.google.com/maps/@-33.3093483,26.5240896,17z?entry=ttu&g_ep=EgoyMDI2MDkwMi4wIKXMDSoASAFQAw%3D%3D">
            <i class="fa fa-map-marker" aria-hidden="true"></i></a> New Street, Makhanda, 6139

        <br><a href = "tel:+27645213976">
            <i class="fa fa-phone" aria-hidden="true"></i></a> +64 521 3976

        <br><a href="mailto:megansearle04@gmail.com">
            <i class="fa fa-envelope-o aria-hidden="true"></i></a> info.MakhandaGateway@gmail.com
        </p>
      </div>

      <div class="column">
        <h3>Follow us on</h3>
        <p><i class="fa fa-instagram" aria-hidden="true"></i>  @MakhandaGateway.2026</p>
      </div>

      <div class="column">
        <h3>Location</h3>
        <p> 
          <a href="https://www.google.com/maps/@-33.3093483,26.5240896,17z?entry=ttu&g_ep=EgoyMDI2MDkwMi4wIKXMDSoASAFQAw%3D%3D">
          <img class="mapforfooter-image" id="footer-mapforfooter-image" src="../Images/mapforfooter.png" alt="Map of New Steet"></a>
      </article></p>
      </div>

      <div class="column">
        <h3>The Team</h3>
        <p>Beng Molodi <br> Caitlin Elliott <br> Megan Searle <br> Dylan McDonogh <br> Micky Oscar</p>
      </div>
    </div>
  </footer>
</html>

