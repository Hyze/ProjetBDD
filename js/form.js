$(document).ready(function() {

  function form() {

    $('#adm').hide();
    $('#date1').hide();
    $('#deta').hide();
    $('#detp').hide();
    $('#locF').hide();
    $('#comp').hide();

    $('#b1F').click(function() {
      $('#adm').hide();
      $('#date1').hide();
      $('#deta').hide();
      $('#detp').hide();
      $('#locF').hide();
      $('#comp').show();



    });
    $('#b2F').click(function() {
      $('#adm').show();
      $('#date1').hide();
      $('#deta').hide();
      $('#detp').hide();
      $('#locF').hide();
      $('#comp').hide();


    });

    $('#b3F').click(function() {
      $('#adm').hide();
      $('#date1').show();
      $('#deta').hide();
      $('#detp').hide();
      $('#locF').hide();
      $('#comp').hide();

    });


    $('#b4F').click(function() {
      $('#adm').hide();
      $('#date1').hide();
      $('#deta').show();
      $('#detp').hide();
      $('#locF').hide();
      $('#comp').hide();

    });
    $('#b4F').click(function() {
      $('#adm').hide();
      $('#date1').hide();
      $('#deta').show();
      $('#detp').hide();
      $('#locF').hide();
      $('#comp').hide();

    });
    $('#b5F').click(function() {
      $('#adm').hide();
      $('#date1').hide();
      $('#deta').hide();
      $('#detp').show();
      $('#locF').hide();
      $('#comp').hide();

    });
    $('#b6F').click(function() {
      $('#adm').hide();
      $('#date1').hide();
      $('#deta').hide();
      $('#detp').hide();
      $('#locF').show();
      $('#comp').hide();

    });



  }

  form();


  $("#option1").click(function() {
    console.log("stylesheet");
    $("#acomp").attr('action', 'php/inserComp.php')
  });

  $("#option2").click(function() {
    console.log('tests');
    $("#acomp").attr('action', 'php/updateComp.php')
  });

  // RECUP la val des bouttons une fois fait ca sera bons







});