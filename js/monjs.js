

$(document).ready(function() {





  function graphe1() {
      var pie = document.getElementById('Pie').getContext('2d');


      $.ajax({
          type: 'GET',
          url: "php/graphe1.php",
          success: function (data) {
                 var  tableau = JSON.parse(data);
              var array = Object.values(tableau);


                   var myPieChart = new Chart(pie,{

                  type: 'pie',
                  data: {
                      labels:['Ville du loiret','Autres villes'],
                      datasets: [{

                          backgroundColor: ["#3e95cd","#8e5ea2"],
                          data: [array[0] ,array[1]]
                      }]
                  },
                  options: {
                      title: {
                          display: true,
                          text: 'Nombres de villes '
                      },
                  }
              });

          },


      });



  }

  graphe1();

    function graphe2() {

        $.ajax({
            type:'GET',
            url:'php/graphe2.php',
            success:function (data) {

                var  tableau = JSON.parse(data);
                var array = Object.values(tableau);
                console.log(array);
                var PhotoVille = document.getElementById('photoVille').getContext('2d');

                var graphe = new Chart(PhotoVille,
                    {type: 'bar',
                        data: {
                            labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                            datasets: [
                                {
                                    label: "Population (millions)",
                                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                                    data: [2478,5267,734,784,433]
                                }
                            ]
                        },
                        options: {
                            legend: { display: false },
                            title: {
                                display: true,
                                text: 'Predicted world population (millions) in 2050'
                            }
                        }
                    });
            }


        });




    }

    graphe2();

});
