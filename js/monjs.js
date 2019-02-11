$(document).ready(function() {

  $('#sidebarCollapse')
    .on('click', function() {
      $('#sidebar')
        .toggleClass('active');
      $(this)
        .toggleClass('active');
    });


  function graphe1_construct(data) {
    var pie = document.getElementById('Pie')
      .getContext('2d');
    var tableau = JSON.parse(data);
    var array = Object.values(tableau);


    var myPieChart = new Chart(pie, {

      type: 'pie',
      data: {
        labels: ['Ville du loiret', 'Autres villes'],
        datasets: [{

          backgroundColor: ["#3e95cd", "#8e5ea2"],
          data: [array[0], array[1]]
        }]
      },
      options: {
        title: {
          display: true,
          text: 'Nombres de villes '
        },
      }
    });
  }






  function construc_graph2(data) {
    var tableau = JSON.parse(data);
    var array = Object.values(tableau);
    console.log(array);
    var PhotoVille = document.getElementById('photoVille')
      .getContext('2d');
    var i = 0;
    var nom = [];
    var val = [];
    var coloR = [];

    var dynamicColors = function() {
      var r = Math.floor(Math.random() * 255);
      var g = Math.floor(Math.random() * 255);
      var b = Math.floor(Math.random() * 255);
      return "rgb(" + r + "," + g + "," + b + ")";
    };
    while (i < array.length) {
      nom.push(array[i].nom_ville);
      val.push(array[i].max);
      coloR.push(dynamicColors());
      i++;
    }

    var graphe = new Chart(PhotoVille, {
      type: 'bar',
      data: {
        labels: nom,
        datasets: [{
          label: "nombre de photos",
          backgroundColor: coloR,
          data: val
        }]
      },
      options: {
        legend: {
          display: false
        },
        scaleShowValues: true,
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }],
          xAxes: [{
            ticks: {
              autoSkip: false
            }
          }]
        }

      }
    });
  }



  function construc_graph3(data) {
    var pie = document.getElementById('incomplet')
      .getContext('2d');
    var tableau = JSON.parse(data);
    var array = Object.values(tableau);


    var myPieChart = new Chart(pie, {

      type: 'pie',
      data: {
        labels: ['Donnée totale ', 'Donnée incomplete'],
        datasets: [{

          backgroundColor: ["#4C9900", "#990000"],
          data: [array[0], array[1]]
        }]
      },
      options: {
        title: {
          display: true,
          text: 'Données '
        },

      }
    });

  }

  function graphe1() {
    $.ajax({
      type: 'GET',
      url: "php/graphe1.php",
      success: function(data) {
        graphe1_construct(data);
      },

    })
  }



  function graphe2() {

    $.ajax({
      type: 'GET',
      url: 'php/graphe2.php',
      success: function(data) {
        construc_graph2(data)
      }

    })
  }

  function graphe3() {

    $.ajax({
      type: 'GET',
      url: 'php/graphe3.php',
      success: function(data) {
        construc_graph3(data)
      },
    })
  }

  function photoNB() {
    $.ajax({
      type: 'GET',
      url: 'php/photonb.php',
      success: function(data) {
        var tableau = JSON.parse(data);
        var array = Object.values(tableau);
        console.log(array[0]);
        $('#photoNb').html('Noir et blanc : ' + array[0] + ' photos ');

      },
    })

  }

  function photoCouleur() {
    $.ajax({
      type: 'GET',
      url: 'php/couleur.php',
      success: function(data) {
        var tableau = JSON.parse(data);
        var array = Object.values(tableau);
        console.log(array[0]);
        $('#couleur').html('Couleurs : ' + array[0] + ' photos ');

      },
    })

  }


  function photoNR() {
    $.ajax({
      type: 'GET',
      url: 'php/reversible.php',
      success: function(data) {
        var tableau = JSON.parse(data);
        var array = Object.values(tableau);
        console.log(array[0]);
        $('#photoReversible').html('Negatif : ' + array[0] + ' photos ');

      },
    })

  }

  function photoInv() {
    $.ajax({
      type: 'GET',
      url: 'php/inversible.php',
      success: function(data) {
        var tableau = JSON.parse(data);
        var array = Object.values(tableau);
        console.log(array[0]);
        $('#reverse').html('Inversible : ' + array[0] + ' photos ');

      },
    })

  }

  graphe3();

  graphe1();

  graphe2();

  photoNB();
  photoNR();
  photoCouleur();

  photoInv();
});