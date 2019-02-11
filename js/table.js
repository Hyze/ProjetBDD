$(document).ready(function() {

  function table() {



    $('#Adm').hide();
    $('#date').hide();
    $('#detA').hide();
    $('#detP').hide();
    $('#Loc').hide();
    $('#Comp').hide();

    $('#b1').click(function() {
      $('#Adm').hide();
      $('#date').hide();
      $('#detA').hide();
      $('#detP').hide();
      $('#Loc').hide();
      $('#Comp').show();

    });
    $('#b2').click(function() {
      $('#Adm').show();
      $('#date').hide();
      $('#detA').hide();
      $('#detP').hide();
      $('#Loc').hide();
      $('#Comp').hide();

    });

    $('#b3').click(function() {
      $('#Adm').hide();
      $('#date').show();
      $('#detA').hide();
      $('#detP').hide();
      $('#Loc').hide();
      $('#Comp').hide();

    });


    $('#b4').click(function() {
      $('#Adm').hide();
      $('#date').hide();
      $('#detA').show();
      $('#detP').hide();
      $('#Loc').hide();
      $('#Comp').hide();

    });
    $('#b4').click(function() {
      $('#Adm').hide();
      $('#date').hide();
      $('#detA').show();
      $('#detP').hide();
      $('#Loc').hide();
      $('#Comp').hide();

    });
    $('#b5').click(function() {
      $('#Adm').hide();
      $('#date').hide();
      $('#detA').hide();
      $('#detP').show();
      $('#Loc').hide();
      $('#Comp').hide();

    });
    $('#b6').click(function() {
      $('#Adm').hide();
      $('#date').hide();
      $('#detA').hide();
      $('#detP').hide();
      $('#Loc').show();
      $('#Comp').hide();

    });



  }

  table();



  $('#tab').DataTable({
    "scrollY": "200px",
    "scrollCollapse": true,
    "paging": false
  });

  function acompleter() {
    $.ajax({
      type: 'GET',
      url: "php/compTable.php",
      success: function(data) {
        var tableau = JSON.parse(data);
        var array = Object.values(tableau);

        constructComp(array);

      },

    })
  }


  function constructComp(data) {

    for (var i = 0; i < data.length; i++) {
      var content = content + '<tr> <td>' + data[i].date + '</td>' + '<td>' + data[i].article + '</td>' + '<td>' + data[i].reference_cindoc + '</td>' + '<td>' + data[i].serie + '</td>' + '<td>' + data[i].nom_ville + '</td>' + '<td>' + data[i].sujet + '</td>' + '<td>' + data[i].description + '</td>' + '<td>' + data[i].nb_cliche + '</td>' + '<td>' + data[i].negatif_reversible + '</td>' + '<td>' + data[i].couleur_noirblanc + '</td>' + '<td>' + data[i].discriminant + '</td> </tr>'

    }
    $('#Acomp').html(content)

  }

  acompleter();




});