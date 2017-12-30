$(document).ready(function () {

    var moisEnCours = $('#btnEnCour');
    var empEnCours = $('#moisEnCours');
    empEnCours.hide();
    var count = 0;

    moisEnCours.click(function () {

        count++;
        // debut de la requete ajax pour les moyenne de chaque mois
        $.ajax({
                // recuperation des données sur le fichier moyenne_mensuelle.json dans le dossier moyenne
                url: 'moyenne/moisEnCours.json',
                type: 'GET',
                dataType: 'json'
            })
            .done(function (data) {

                var mois = data.mois;
                var note = data.note;
                var color;

                if (note < 3) {
                    color = ["#ef2902",];

                } else if (note >= 3 && note <= 5) {
                    color = ["#F25F02",];

                } else if (note >= 6 && note <= 8) {
                    color = ["#1b5dd1",];

                } else if (note >= 9 && note <= 10) {
                    color = ["#16ed12",];
                }

                var dataTest = {
                    labels: [mois],
                    datasets: [{
                        label: [mois],
                        backgroundColor: color,
                        data: note,
                    }]
                };

                var option = {
                    animation: {
                        duration: 2000
                    },
                    responsive: false,
                };

                var ctx = empEnCours;
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    options: option,
                    data: dataTest
                })

                // }
            })
            .fail(function (jqxhr) {
                console.log("erreur");
            });

            if (count%1 ===0) {
                empEnCours.show('slow');
            }
            if (count%2 === 0) {
                empEnCours.hide('slow');
            }
    });
});