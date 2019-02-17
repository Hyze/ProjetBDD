$(document).ready(function() {

  function form() {

    $('#adm').hide();
    $('#date1').hide();
    $('#deta').hide();
    $('#detp').hide();
    $('#locF').hide();
<<<<<<< HEAD
    $('#comp').hide()
    $('#updateComp').hide();
    $('#updateDate').hide();
    $('#updateAdm').hide();
    $('#updatedetA').hide();
    $('#updatedetP').hide();
    $('#updateLoc').hide();
=======
    $('#comp').hide();
>>>>>>> c744ebc8f575b2a67ae77ff10be2667a5e02cfb6

    $('#b1F').click(function() {
      $('#adm').hide();
      $('#date1').hide();
      $('#deta').hide();
      $('#detp').hide();
      $('#locF').hide();
      $('#comp').show();
<<<<<<< HEAD
      $('#updateComp').show();
      $('#updateDate').hide();
      $('#updateAdm').hide();
      $('#updatedetA').hide();
      $('#updatedetP').hide();
      $('#updateLoc').hide();
=======
>>>>>>> c744ebc8f575b2a67ae77ff10be2667a5e02cfb6



    });
    $('#b2F').click(function() {
      $('#adm').show();
      $('#date1').hide();
      $('#deta').hide();
      $('#detp').hide();
      $('#locF').hide();
      $('#comp').hide();
<<<<<<< HEAD
      $('#updateComp').hide();
      $('#updateDate').hide();
      $('#updateAdm').show();
      $('#updatedetA').hide();
      $('#updatedetP').hide();
      $('#updateLoc').hide();
=======

>>>>>>> c744ebc8f575b2a67ae77ff10be2667a5e02cfb6

    });

    $('#b3F').click(function() {
      $('#adm').hide();
      $('#date1').show();
      $('#deta').hide();
      $('#detp').hide();
      $('#locF').hide();
      $('#comp').hide();
<<<<<<< HEAD
      $('#updateComp').hide();
      $('#updateDate').show();
      $('#updateAdm').hide();
      $('#updatedetA').hide();
      $('#updatedetP').hide();
      $('#updateLoc').hide();

=======
>>>>>>> c744ebc8f575b2a67ae77ff10be2667a5e02cfb6

    });


    $('#b4F').click(function() {
      $('#adm').hide();
      $('#date1').hide();
      $('#deta').show();
      $('#detp').hide();
      $('#locF').hide();
      $('#comp').hide();
<<<<<<< HEAD
      $('#updateComp').hide();
      $('#updateDate').hide();
      $('#updateAdm').hide();
      $('#updatedetA').show();
      $('#updatedetP').hide();
      $('#updateLoc').hide();
=======

    });
    $('#b4F').click(function() {
      $('#adm').hide();
      $('#date1').hide();
      $('#deta').show();
      $('#detp').hide();
      $('#locF').hide();
      $('#comp').hide();

>>>>>>> c744ebc8f575b2a67ae77ff10be2667a5e02cfb6
    });
    $('#b5F').click(function() {
      $('#adm').hide();
      $('#date1').hide();
      $('#deta').hide();
      $('#detp').show();
      $('#locF').hide();
      $('#comp').hide();
<<<<<<< HEAD
      $('#updateComp').hide();
      $('#updateDate').hide();
      $('#updateAdm').hide();
      $('#updatedetA').hide();
      $('#updatedetP').show();
      $('#updateLoc').hide();
=======

>>>>>>> c744ebc8f575b2a67ae77ff10be2667a5e02cfb6
    });
    $('#b6F').click(function() {
      $('#adm').hide();
      $('#date1').hide();
      $('#deta').hide();
      $('#detp').hide();
      $('#locF').show();
      $('#comp').hide();
<<<<<<< HEAD
      $('#updateComp').hide();
      $('#updateDate').hide();
      $('#updateAdm').hide();
      $('#updatedetA').hide();
      $('#updatedetP').hide();
      $('#updateLoc').show();
=======
>>>>>>> c744ebc8f575b2a67ae77ff10be2667a5e02cfb6

    });



  }

  form();


  $("#option1").click(function() {
<<<<<<< HEAD

    $('#update').hide();
    $('#insert').show();
  });

  $("#option2").click(function() {

    $('#insert').hide();
    $('#update').show();
  });

  $('#option3').click(function () {
    $('#acomp').attr('action',"php/delComp.php")
  });




  $('#inserComp').click(function () {
    $.ajax({
      type: 'POST',
      url: "php/insert/inserComp.php",
      success: function() {
        console.log("test ok ");
      },

    })
  });

  $('#inserAdm').click(function () {
    $.ajax({
      type: 'POST',
      url: "php/insert/inserAdm.php",
      success: function() {
        console.log("test ok ");
      },

    })
  });
  $('#inserDate').click(function () {
    $.ajax({
      type: 'POST',
      url: "php/insert/inserDate.php",
      success: function() {
        console.log("test ok ");
      },

    })
  });

  $('#inserdetA').click(function () {
    $.ajax({
      type: 'POST',
      url: "php/insert/inserdetA.php",
      success: function() {
        console.log("test ok ");
      },

    })
  });
  $('#inserdetP').click(function () {
    $.ajax({
      type: 'POST',
      url: "php/insert/inserdetP.php",
      success: function() {
        console.log("test ok ");
      },

    })
  });
  $('#inserLoc').click(function () {
    $.ajax({
      type: 'POST',
      url: "php/insert/inserLoc.php",
      success: function() {
        console.log("test ok ");
      },

    })
  });
  $('#uComp').click(function () {
    $.ajax({
      type: 'POST',
      url: "php/insert/updateComp.php",
      success: function() {
        console.log("test ok ");
      },

    })
  });
  $('#uAdm').click(function () {
    $.ajax({
      type: 'POST',
      url: "php/insert/updateAdm.php",
      success: function() {
        console.log("test ok ");
      },

    })
  });
  $('#uDate').click(function () {
    $.ajax({
      type: 'POST',
      url: "php/insert/updateDate.php",
      success: function() {
        console.log("test ok ");
      },

    })
  });
  $('#udetA').click(function () {
    $.ajax({
      type: 'POST',
      url: "php/insert/updatedetA.php",
      success: function() {
        console.log("test ok ");
      },

    })
  });
  $('#udetP').click(function () {
    $.ajax({
      type: 'POST',
      url: "php/insert/updatedetP.php",
      success: function() {
        console.log("test ok ");
      },

    })
  });
  $('#uLoc').click(function () {
    $.ajax({
      type: 'POST',
      url: "php/insert/updateLoc.php",
      success: function() {
        console.log("test ok ");
      },

    })
  });

=======
    console.log("stylesheet");
    $("#acomp").attr('action', 'php/inserComp.php')
  });

  $("#option2").click(function() {
    console.log('tests');
    $("#acomp").attr('action', 'php/updateComp.php')
  });
>>>>>>> c744ebc8f575b2a67ae77ff10be2667a5e02cfb6

  // RECUP la val des bouttons une fois fait ca sera bons







});