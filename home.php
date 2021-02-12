<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 20px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
img {
    float: left;
    width:  100px;
    height: 100px;
    object-fit: cover;
}
</style>
</head>
<body>

<div class="about-section">
  <h1>Basic Banking System</h1>
  <p>This a simple banking system.</p>
  <p>Here we can see the customer's details  and transfer the money between them</p>
</div>
<a href="customer.php"><h2 style="text-align:center;color: #474e5d">View Customers</h2></a>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="image1.jpg" alt="Jane" style="width:100%">
      <div class="container">
        <h2>James Grant</h2>
        <p class="title">"Progress is cumulative in science and engineering, but cyclical in finance."</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="image2.jpg" alt="Mike" style="width:100%">
      <div class="container">
        <h2>Warren Buffett</h2>
        <p class="title">"Banking is very good business if you don't do anything dumb."</p>
        
       
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="image3.jpg" alt="John" style="width:100%">
      <div class="container">
        <h2>Jamie Dimon</h2>
        <p class="title">"You don't run a business hoping you don't have a recession."</p>
        
      </div>
    </div>
  </div>
</div>

</body>
</html>

