$(document).ready(function () {

    var btnMois = $('#moisBtn');
    var moyMois = $('#moyenneParMois');
    var count = 0;
    moyMois.hide();

    btnMois.click(function () {
        count++;

        // debut de la requete ajax pour les moyenne de chaque mois
        $.ajax({
                // recuperation des données sur le fichier moyenne_mensuelle.json dans le dossier moyenne
                url: 'moyenne/moyenne_mensuelle.json',
                type: 'GET',
                dataType: 'json'
            })
            .done(function (data) {

                var noteJ = data.moyenne[0];
                var noteF = data.moyenne[1];
                var noteM = data.moyenne[2];
                var noteA = data.moyenne[3];
                var noteMa = data.moyenne[4];
                var noteJu = data.moyenne[5];
                var noteJL = data.moyenne[6];
                var noteAo = data.moyenne[7];
                var noteS = data.moyenne[8];
                var noteO = data.moyenne[9];
                var noteN = data.moyenne[10];
                var noteD = data.moyenne[11];
                
                
                var dataTest = {
                    labels: ["Jan", "Fev", "Mar", "Avr", "Mai", "Juin", "Juil", "aout", "sept", "oct", "nov", "dec"],
                    datasets: [{
                        label: ["Moyenne"],
                        backgroundColor: ["#FFCD56", "#FF6384", "#36A2EB", "#F83FDA", "#FFA13D", "#7FF03C", "#9e19c6", "#00FF80", "#F64649", "#4D5361", "#949FB1", "#C45850",],
                        data: [noteJ, noteF, noteM, noteA, noteMa, noteJu, noteJL, noteAo, noteS, noteO, noteN, noteD]
                    }]
                };

                var option = {
                    legend: { display: false },
                    animation: {
                        duration: 3500
                    },
                    responsive: false,
                    title: {
                        display: true,
                        text: 'Moyenne mensuelle detaillée'
                    }
                };

                var ctx = $('#moyenneParMois');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    options: option,
                    data: dataTest
                })
            })
            .fail(function (jqxhr) {
                console.log("erreur");
            });

        if (count % 1 === 0) {
            moyMois.show('slow');
        }
        if (count % 2 === 0) {
            moyMois.hide('slow');
        }
    });
});