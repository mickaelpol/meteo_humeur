$(document).ready(function () {

    var moisEmpla = $('#moisChoisi');
    var fermer = $('#fermer');
    var count = 0;
    moisEmpla.hide();
    fermer.hide();

    
    $('#choix').change(function (e) {

        count++

        // debut de la requete ajax pour les moyenne de chaque mois
        $.ajax({
                // recuperation des données sur le fichier moyenne_mensuelle.json dans le dossier moyenne
                url: 'moyenne/moyennemensuelMoisNomleNom.json',
                type: 'GET',
                dataType: 'json'
            })
            .done(function (data) {
                var mois = $('#choix option:selected').text();
                var noteMois = data.moyenne[mois];
                var color;

                if (noteMois < 3) {
                    color = ["#ef2902",];

                } else if (noteMois >= 3 && noteMois <= 5) {
                    color = ["#F25F02",];

                } else if (noteMois >= 5 && noteMois <= 8) {
                    color = ["#1b5dd1",];

                } else if (noteMois >= 9 && noteMois <= 10) {
                    color = ["#16ed12",];
                }

                var dataTest = {
                    datasets: [{
                        label: [mois],
                        backgroundColor: color,
                        data: [noteMois],
                    }]
                };

                var option = {
                    animation: {
                        duration: 2000
                    },
                    responsive: false,
                    title: {
                        display: true,
                        text: 'Moyenne du mois de ' + mois
                    }
                };

                var ctx = $('#moisChoisi');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    options: option,
                    data: dataTest
                })

            })
            .fail(function (jqxhr) {
                console.log("erreur");
            });

            if (count%1 === 0) {
                fermer.show('slow');
                moisEmpla.show('slow');
                e.preventDefault();
            }
            if (fermer.click(function(){
                moisEmpla.hide('slow');
                fermer.hide('slow');
            })) { 
            }
            
    })
});