function getWeather(city){
	if (city) {
	var xhr=new XMLHttpRequest();
	xhr.onreadystatechange=function(){
		if (this.status==200 && this.readyState==4) {
			var formattedData=formatWeather(JSON.parse(xhr.responseText));
			document.getElementById("weather-data").innerHTML=formattedData;
			document.getElementById('cityname').value="";
		}
	};
	xhr.open("GET","http://api.openweathermap.org/data/2.5/weather?q="+city+"&units=metric&appid=526a5423e823a1e1a92c51cd953e0b87");
	xhr.send();
  }
  else{
  	var error='<div class="alert alert-danger alert-dismissible text-center" role="alert">';
		error+='<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		error+='You must enter a city name!</div>';
	document.getElementById('error').innerHTML=error;
  }
	return false;
}

function formatWeather(data){
	return "<h3>Current Weather for " + data.name + ", " + data.sys.country + "</h3>" + 
			"<p>Weather: " + data.weather[0].main+ "</p>" + 
			"<p>Weather Description: " + data.weather[0].description +"<img src='http://openweathermap.org/img/w/" + data.weather[0].icon + ".png'/>" + "</p>" + 
			"<p>Temperature: " + data.main.temp + "&deg;C</p>" + 
			"<p>Pressure: " + data.main.pressure + "hPa</p>" + 
			"<p>Humidity: " + data.main.humidity + "%</p>" + 
			"<p>Min Temperature: " + data.main.temp_min + "&deg;C</p>" + 
			"<p>Max Temperature: " + data.main.temp_max + "&deg;C</p>" + 
			"<p>Wind Speed: " + data.wind.speed + "m/s</p>";
}


function getForecast(city,days){
	if (city) {
	var xhr=new XMLHttpRequest();
	xhr.onreadystatechange=function(){
		if (this.status==200 && this.readyState==4) {
			var formattedData=formatForecast(JSON.parse(xhr.responseText));
			document.getElementById("forecast").innerHTML=formattedData;
			document.getElementById('cityname').value="";
			document.getElementById('days').value=""
		}
	};
		xhr.open("GET","http://api.openweathermap.org/data/2.5/forecast/daily?q="+ city + "&cnt=" + days + "&units=metric&appid=d610395e85b50074b834a0234b0776db");
		xhr.send();
	}
	else{
		var error='<div class="alert alert-danger alert-dismissible text-center" role="alert">';
		  error+='<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		  error+='You must enter a city name and no of day!!!</div>';
	  document.getElementById('error').innerHTML=error;
	}
	return false;
}

function formatForecast(data){
	var table="";
	for (var i = 0; i < data.list.length; i++) {
		table += "<tr>";
		table += "<td><img src='http://openweathermap.org/img/w/" + data.list[i].weather[0].icon + ".png'/></td>";
		table += "<td>" + data.list[i].weather[0].main + "</td>";
		table += "<td>" + data.list[i].weather[0].description + "</td>";
		table += "<td>" + data.list[i].temp.morn + "&deg;C</td>";
		table += "<td>" + data.list[i].temp.night + "&deg;C</td>";
		table += "<td>" + data.list[i].temp.min + "&deg;C</td>";
		table += "<td>" + data.list[i].temp.max + "&deg;C</td>";
		table += "<td>" + data.list[i].pressure + "hPa</td>";
		table += "<td>" + data.list[i].humidity + "%</td>";
		table += "<td>" + data.list[i].speed + "m/s</td>";
		table += "</tr>";
	}
	return table;
}

function getPast(city,days){
	if (city) {
		var xhr=new XMLHttpRequest();
		xhr.onreadystatechange=function(){
			if (this.status==200 && this.readyState==4) {
				var formattedData=formatPast(JSON.parse(xhr.responseText));
				document.getElementById("weather-data").innerHTML=formattedData;
				document.getElementById('cityname').value="";
				document.getElementById('example1').value="";
				document.getElementById('example2').value="";
			}
		};
		xhr.open("GET","http://api.openweathermap.org/data/2.5/forecast/daily?q="+ city + "&cnt=" + days + "&units=metric&appid=d610395e85b50074b834a0234b0776db");
		xhr.send();
	}
	else{
		var error='<div class="alert alert-danger alert-dismissible text-center" role="alert">';
		  error+='<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		  error+='You must enter a city name!</div>';
	  document.getElementById('error').innerHTML=error;
	}
	return false;
}

function formatPast(data){
	var temp_max=0.0,temp_min=0.0,press=0.0,speed=0.0,humid=0.0;
	for (var i = 0; i < data.list.length; i++) {
		temp_max = temp_max + data.list[i].temp.max;
		temp_min = temp_min + data.list[i].temp.min;
		humid = humid  + data.list[i].humidity;
		press = press + data.list[i].pressure;
		speed = speed + data.list[i].speed;
	}
	temp_max/=5;
	temp_min/=5;
	humid=humid/5;
	speed=speed/5;
	press=press/5;
	//sum=press/5;
	return  "<h3>Past Weather for " + data.city.name + ", " + data.city.country + "</h3>" +
	 		"<p>Pressure: " + press.toFixed(2) + "hPa</p>" + 
			"<p>Humidity: " + humid.toFixed(2) + "%</p>" + 
			"<p>Min Temperature: " + temp_min.toFixed(2) + "&deg;C</p>" + 
			"<p>Max Temperature: " + temp_max.toFixed(2) + "&deg;C</p>" + 
			"<p>Wind Speed: " + speed.toFixed(2) + "m/s</p>";
}