$(document).ready(function () {

    var journaBtn = $('#journaBtn');
    var moyJourna = $('#moyJourna');
    var count = 0;
    moyJourna.hide();
    
    journaBtn.click(function(){
        count++
        
        // debut de la requete ajax pour les moyenne de chaque mois
        $.ajax({
            // recuperation des données sur le fichier moyenne_mensuelle.json dans le dossier moyenne
            url: 'moyenne/moyenne_journaliere.json',
            type: 'GET',
            dataType: 'json'
        })
            .done(function (data) {

                var jour = data.jour;
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
                    datasets: [{
                        label: jour,
                        backgroundColor: color,
                        data: note,
                    }]
                };

                var option = {
                    animation: {
                        duration: 3000
                    },
                    responsive: false,
                };

                var ctx = $('#moyJourna');
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
            moyJourna.show('slow');
        }
        if (count%2 === 0) {
            moyJourna.hide('slow');
        }
        
    })
    

})