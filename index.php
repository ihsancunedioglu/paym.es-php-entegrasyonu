 
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

<div class="row">
  <div class="">
    <div class="container" style="float:left;">
        <form action="ikinciasama.php" method="POST">
      
        <div class="row">
          <div class="col-50">
            <h3>ÖDEME</h3>
            <label for="cname">Ödeme ID</label>
            <input type="number" id="tutar" name="invoiceId" placeholder="Ödeme ID" value="100"/>
            <label for="cname">Ödeme Tutarı</label>
            <input type="text" id="tutar" name="amount" placeholder="Ödeme Tutarı" value="100"/>
            <label for="cname">Kart Sahibinin Adı</label>
            <input type="text" id="cname" name="firstname" placeholder="Kart Sahibinin Adı" value="hakan">
             <label for="cname">Kart Sahibinin Soyadı</label>
            <input type="text" id="cname" name="lastname" placeholder="Kart Sahibinin Soyadı" value="hakan">
            <label for="ccnum">Kredi Kart Numarası</label>
            <input type="text" id="ccnum" name="cardNumber" placeholder="Kredi Kart Numarası" />
            <label for="expmonth">Son Kullanım Ay</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="12" value="12">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Son Kullanım Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2020" value="2026"/>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cardCvv" placeholder="000" value="000">
              </div>
            </div>
            <div class="oranlar">
            </div>
          </div>
          
        </div>
        <input type="hidden" id="pos_id" name="pos_id" >
        <input type="submit" value="Onayla" class="btn">
      </form>
	  
    </div>
		 
  </div>
</div> 
</body>
</html>
