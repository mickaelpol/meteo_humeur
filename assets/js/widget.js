$(document).ready(function () {

    var temperature = $('#temperature');
    var maximale = $('#maximale');;
    var minimale = $('#minimale');
    var temp = $('#temp');
    var ville = $('#ville');
    var icone = $('#icone');
    var humidité = $('#humidité');
    var vent = $('#vent');

    var keyApi = "a46b3c46d72e846fc8c834a487a2b41d";
    var unite = "metric";
    var langue = "fr";

    function arrondir(x, n) {
        var decalage = Math.pow(10, n);
        x *= decalage;
        x = Math.round(x);
        x /= decalage;
        return x;
    }

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            var lienComplet = "http://api.openweathermap.org/data/2.5/weather?lat=" + latitude + "&lon=" + longitude + "&units=" + unite + "&lang=" + langue + "&appid=" + keyApi + "";

            $.ajax({
                    url: lienComplet
                })
                .done(function (data) {

                    var img = "<img class='ico' src=http://openweathermap.org/img/w/" + data.weather[0].icon + ".png alt='image du temps actuel'>";
                    var ventMs = data.wind.speed;
                    var ventKmh = (ventMs * 3600) / 1000;
                    var arrondisVent = arrondir(ventKmh,1);

                    ville.html(data.name);
                    icone.html(img);
                    temperature.html(data.main.temp + "°C");
                    maximale.html("max : " + data.main.temp_max + "°C");
                    minimale.html("min : " + data.main.temp_min + "°C");
                    temp.html(data.weather[0].description);
                    humidité.html(data.main.humidity + "%  d'humidité");
                    vent.html(arrondisVent + " Km/h");
                })

                .fail(function () {
                    ville.html("erreur de chargement de l'api");
                })
        });
    } else {
        alert('Votre navigateur ne prend malheureusement pas en charge la géolocalisation.');
    }
});