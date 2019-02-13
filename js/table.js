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
  /////////////////////////////////////////////////////////////// Localisation /////////////////////////////////////////////////////////////


  function loc() {
    $.ajax({
      type: 'GET',
      url: "php/loc.php",
      success: function(data) {
        var tableau = JSON.parse(data);
        var array = Object.values(tableau);
        console.log(array);
        constructloc(array);

      },


    })
  }


  function constructloc(data) {

    var tab = '<thead>' +
      '<tr>' +
      '<th>ID ville</th>' +
      '<th>Nom</th>' +
      '<th>Latitude (Lambert93) </th>' +
      '<th>Longitude (Lambert93)</th>' +
      '</tr>' +
      '  </thead>';



    var bodystart = '<tbody>'
    var tbodyfin = "</tbody>"

    for (var j = 0; j < data.length; j++) {
      var content = content + '<tr>' +
        '<td>' + data[j].id_ville + '</td>' +
        '<td>' + data[j].nom_ville + '</td>' +
        '<td>' + data[j].latlambert93 + '</td>' +
        '<td>' + data[j].longlambert93 + '</td>' +

        ' </tr>'

    }


    var table = tab + bodystart + content + tbodyfin;

    console.log(table);
    $('#loc').html(table);
    $('#loc').DataTable();
  }

  ///////////////////////////////////////////////////////////Details Photos ///////////////////////////////////////////////////////


  function detP() {
    $.ajax({
      type: 'GET',
      url: "php/detP.php",
      success: function(data) {
        var tableau = JSON.parse(data);
        var array = Object.values(tableau);
        console.log(array);
        constructdetP(array);

      },


    })
  }


  function constructdetP(data) {

    var tab = '<thead>' +
      '<tr>' +
      '<th>ID photo</th>' +
      '<th>Article</th>' +
      '<th>Description</th>' +
      '  <th>Sujet</th>' +
      '  <th>Notes de bas de page</th>' +
      '<th>Fichier numerique  </th>' +
      '<th>Fichier iconographique </th>' +
      '  </tr>' +
      '</thead>';

    var bodystart = '<tbody>'
    var tbodyfin = "</tbody>"

    for (var j = 0; j < data.length; j++) {
      var photo = data[j].id_photo;
      var article = data[j].article;
      var desc = data[j].description
      var sujet = data[j].sujet;
      var note = data[j].notebasdepage;
      var file = data[j].fichier_numerique;
      var fich = data[j].fichier_iconographique;


      var content = content + '<tr>' +
        '<td>' + photo + '</td>' +
        '<td>' + article + '</td>' +
        '<td>' + desc + '</td>' +
        '<td>' + sujet + '</td>' +
        '<td>' + note + '</td>' +
        '<td>' + file + '</td>' +
        '<td>' + fich + '</td>' +
        ' </tr>'

    }


    var table = tab + bodystart + content + tbodyfin;

    console.log(table);
    $('#tP').html(table);
    $('#tP').DataTable();
  }







  ////////////////////////////////////////////////////////Detail Artistique //////////////////////////////////////////////////////



  function detA() {
    $.ajax({
      type: 'GET',
      url: "php/detA.php",
      success: function(data) {
        var tableau = JSON.parse(data);
        var array = Object.values(tableau);

        constructdetA(array);

      },


    })
  }


  function constructdetA(data) {

    var tab = ' <thead>' +
      '  <tr>' +
      '  <th>ID photo</th>' +
      '  <th>Nombre de cliche</th>' +
      '<th>Negatif / Inversible</th>' +
      '  <th>Couleur / Noir et Blanc</th>' +
      '<th>Remarque</th>' +
      '<th>Taille du cliche</th>' +
      '</tr>' +
      '</thead>';

    var bodystart = '<tbody>'
    var tbodyfin = "</tbody>"

    for (var j = 0; j < data.length; j++) {

      var content = content + '<tr> <td>' + data[j].id_photo + '</td>' + '<td>' + data[j].nb_cliche + '</td>' + '<td>' + data[j].negatif_reversible + '</td>' + '<td>' + data[j].couleur_noirblanc + '<td>' + data[j].remarque + '</td>' + '<td>' + data[j].taille_cliche + '</td>' + '</td> < /tr>'
    }

    var table = tab + bodystart + content + tbodyfin;
    var temp = data;

    $('#tA').html(table)


    $('#tA').DataTable();
  }





  //////////////////////////////////////////DATE////////////////////////////////////////////////

  function date() {
    $.ajax({
      type: 'GET',
      url: "php/date.php",
      success: function(data) {
        var tableau = JSON.parse(data);
        var array = Object.values(tableau);

        constructdate(array);

      },


    })
  }

  function constructdate(data) {

    var tab = '<thead>' +
      '<tr>' +
      '  <th>ID date</th>' +
      '<th>Jour</th>' +
      '  <th>Mois</th>' +
      '<th>Année</th>' +
      '</tr>'
    '</thead>'
    var bodystart = '<tbody>'
    var tbodyfin = "</tbody>"

    for (var j = 0; j < data.length; j++) {

      var content = content + '<tr> <td>' + data[j].id_date + '</td>' + '<td>' + data[j].jour + '</td>' + '<td>' + data[j].mois + '</td>' + '<td>' + data[j].annee + '</td> < /tr>'
    }

    var table = tab + bodystart + content + tbodyfin;
    var temp = data;

    $('#tdate').html(table)


    $('#tdate').DataTable();
  }



  //////////////////////////////////////////////////////ACOMPLETER /////////////////




  function acompleter(count) {
    $.ajax({
      type: 'GET',
      url: "php/compTable.php",
      success: function(data, count) {
        var tableau = JSON.parse(data);
        var array = Object.values(tableau);

        constructComp(array, count);

      },

    })
  }

  function Aministatif() {
    $.ajax({
      type: 'GET',
      url: "php/Adm.php",
      success: function(data) {
        var tableau = JSON.parse(data);
        var array = Object.values(tableau);

        constructAdm(array);

      },


    })
  }



  function constructAdm(data) {

    var tab = '<thead> <tr>' +
      '  <th>Reference Cindoc</th>' +
      '<th>Serie</th>' +
      '<th>Article</th>' +
      '<th>Discriminants</th>' +
      '</tr>' +
      '</thead>';
    var bodystart = '<tbody>'
    var tbodyfin = "</tbody>"

    for (var j = 0; j < data.length; j++) {

      var content = content + '<tr> <td>' + data[j].reference_cindoc + '</td>' + '<td>' + data[j].serie + '</td>' + '<td>' + data[j].article + '</td>' + '<td>' + data[j].discriminant + '</td> < /tr>'
    }

    var table = tab + bodystart + content + tbodyfin;
    var temp = data;

    $('#tab2').html(table)


    $('#tab2').DataTable();
  }


  function constructComp(data, count) {


    var tab = '  <thead> <tr>' +
      '<th>Date</th>' +
      '<th>Article</th>' +
      '<th>Reference Cindoc</th>' +
      ' <th>Serie</th>' +
      '<th>Ville</th>' +
      '<th>Sujet</th>' +
      '  <th>Description</th>' +
      '<th>Nombre de cliche</th>' +
      '<th>Negatif / Inversible</th>' +
      '  <th>Couleur / Noir et Blanc</th>' +
      '  <th>Discriminants</th>' +
      '</tr>' +
      '  </thead>';
    var bodystart = '<tbody>'
    var tbodyfin = "</tbody>"

    for (var i = 0; i < data.length; i++) {

      var content = content + '<tr> <td>' + data[i].date + '</td>' + '<td>' + data[i].article + '</td>' + '<td>' + data[i].reference_cindoc + '</td>' + '<td>' + data[i].serie + '</td>' + '<td>' + data[i].nom_ville + '</td>' + '<td>' + data[i].sujet + '</td>' + '<td>' + data[i].description + '</td>' + '<td>' + data[i].nb_cliche + '</td>' + '<td>' + data[i].negatif_reversible + '</td>' + '<td>' + data[i].couleur_noirblanc + '</td>' + '<td>' + data[i].discriminant + '</td> </tr>'

    }
    var table = tab + bodystart + content + tbodyfin;


    $('#tab').html(table)
    var temp = $('#tab').DataTable();
    if (count > 1) {
      temp.destroy();
      var temp = $('#tab').DataTable();
    }



  }
  acompleter();
  Aministatif();
  date();
  detA();
  detP();
  loc();





});