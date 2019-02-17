$(document).ready(function() {

  function form() {

    $('#adm').hide();
    $('#date1').hide();
    $('#deta').hide();
    $('#detp').hide();
    $('#locF').hide();
    $('#comp').hide()
    $('#updateComp').hide();
    $('#updateDate').hide();
    $('#updateAdm').hide();
    $('#updatedetA').hide();
    $('#updatedetP').hide();
    $('#updateLoc').hide();

    $('#b1F').click(function() {
      $('#adm').hide();
      $('#date1').hide();
      $('#deta').hide();
      $('#detp').hide();
      $('#locF').hide();
      $('#comp').show();
      $('#updateComp').show();
      $('#updateDate').hide();
      $('#updateAdm').hide();
      $('#updatedetA').hide();
      $('#updatedetP').hide();
      $('#updateLoc').hide();



    });
    $('#b2F').click(function() {
      $('#adm').show();
      $('#date1').hide();
      $('#deta').hide();
      $('#detp').hide();
      $('#locF').hide();
      $('#comp').hide();
      $('#updateComp').hide();
      $('#updateDate').hide();
      $('#updateAdm').show();
      $('#updatedetA').hide();
      $('#updatedetP').hide();
      $('#updateLoc').hide();

    });

    $('#b3F').click(function() {
      $('#adm').hide();
      $('#date1').show();
      $('#deta').hide();
      $('#detp').hide();
      $('#locF').hide();
      $('#comp').hide();
      $('#updateComp').hide();
      $('#updateDate').show();
      $('#updateAdm').hide();
      $('#updatedetA').hide();
      $('#updatedetP').hide();
      $('#updateLoc').hide();


    });


    $('#b4F').click(function() {
      $('#adm').hide();
      $('#date1').hide();
      $('#deta').show();
      $('#detp').hide();
      $('#locF').hide();
      $('#comp').hide();
      $('#updateComp').hide();
      $('#updateDate').hide();
      $('#updateAdm').hide();
      $('#updatedetA').show();
      $('#updatedetP').hide();
      $('#updateLoc').hide();
    });
    $('#b5F').click(function() {
      $('#adm').hide();
      $('#date1').hide();
      $('#deta').hide();
      $('#detp').show();
      $('#locF').hide();
      $('#comp').hide();
      $('#updateComp').hide();
      $('#updateDate').hide();
      $('#updateAdm').hide();
      $('#updatedetA').hide();
      $('#updatedetP').show();
      $('#updateLoc').hide();
    });
    $('#b6F').click(function() {
      $('#adm').hide();
      $('#date1').hide();
      $('#deta').hide();
      $('#detp').hide();
      $('#locF').show();
      $('#comp').hide();
      $('#updateComp').hide();
      $('#updateDate').hide();
      $('#updateAdm').hide();
      $('#updatedetA').hide();
      $('#updatedetP').hide();
      $('#updateLoc').show();

    });



  }

  form();


  $("#option1").click(function() {

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


  // RECUP la val des bouttons une fois fait ca sera bons







});