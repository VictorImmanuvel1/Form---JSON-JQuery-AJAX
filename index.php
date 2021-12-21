<?php require("script.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<title>Storing messages in a json file with PHP</title>
</head>
<body>

	<form class="registerform" action="" method="post">

      <div class="form-header">
        <h1>Registration</h1>
      </div>

   
      <div class="form-body">
		
	     <div class="horizontal-group">
          <div class="form-group left">
            <label for="firstname" class="label-title">First name </label>
            <input type="text" name="firstname" class="form-input" placeholder="enter your first name">
          </div>
          <div class="form-group right">
            <label for="lastname" class="label-title">Last name</label>
            <input type="text" name="lastname" class="form-input" placeholder="enter your last name" >
          </div>
        </div>

       
        <div class="form-group">
          <label for="age" class="label-title">Age</label>
          <input type="text" name="age" class="form-input" placeholder="enter your age">
        </div>

        <div class="horizontal-group">
          <div class="form-group left">
            <label class="label-title">Gender:</label>
            <div class="input-group">
              <label for="male"><input type="radio" name="gender" value="male" id="male"> Male</label>
              <label for="female"><input type="radio" name="gender" value="female" id="female"> Female</label>
            </div>
          </div>
          <div class="form-group right">
            <label class="label-title">Education</label>
            <div >
              <label><input type="checkbox" name="ug" value="B.Sc.,">B.Sc.,</label>
              <label><input type="checkbox" name="ug" value="B.Tech.,">B.Tech.,</label><br>
              <label><input type="checkbox" name="PG" value="MCA.,">MCA.,</label>
              <label><input type="checkbox" name="PG" value="M.Tech.,">M.Tech.,</label>
            </div>
          </div>
        </div>
      
          <div class="form-group" >
            <label class="label-title">State</label>
            <select class="form-input" id="states" name="states" >
            </select>
          </div>

          <div class="form-group" >
            <label class="label-title">City</label>
            <select class="form-input" id="cities" name="cities" >
            </select>
          </div>
     <script>
        "use strict";
        var sdata = {};
        var states = document.getElementById("states");
        var cities = document.getElementById("cities");
        fetch("./states.json")
            .then(function (resp) {
                return resp.json();
            })
            .then(function (data) {
                console.log(data);
                for (let state in data) {
                    console.log(state);
                    var option = document.createElement("OPTION");
                    option.innerHTML = state;
                    option.value = state;
                    states.options.add(option);
                    sdata[state] = data[state];
                }
            })
        states.onclick = () => {
            while (cities.firstChild) {
                cities.removeChild(cities.firstChild);
            }
            for (var city of sdata[states.value]) {
                var o = document.createElement("option");
                o.value = city;
                o.text =city;
                cities.appendChild(o);
            }
        }
    </script>

		<input type="submit" class="btn" name="submit" value="Send message">
    

		<p class="error"><?php echo @$error; ?></p>
		<p class="success"><?php echo @$success; ?></p>
	</form>
	
</body>
</html>