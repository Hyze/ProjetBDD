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
        $('#delComp').hide();
        $('#delDate').hide();
        $('#delAdm').hide();
        $('#deldetA').hide();
        $('#deldetP').hide();
        $('#delLoc').hide();

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
            $('#delComp').show();
            $('#delDate').hide();
            $('#delAdm').hide();
            $('#deldetA').hide();
            $('#deldetP').hide();
            $('#delLoc').hide();



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
            $('#delComp').hide();
            $('#delDate').hide();
            $('#delAdm').show();
            $('#deldetA').hide();
            $('#deldetP').hide();
            $('#delLoc').hide();
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
            $('#delComp').hide();
            $('#delDate').show();
            $('#delAdm').hide();
            $('#deldetA').hide();
            $('#deldetP').hide();
            $('#delLoc').hide();

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
            $('#delComp').hide();
            $('#delDate').hide();
            $('#delAdm').hide();
            $('#deldetA').show();
            $('#deldetP').hide();
            $('#delLoc').hide();
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
            $('#delComp').hide();
            $('#delDate').hide();
            $('#delAdm').hide();
            $('#deldetA').hide();
            $('#deldetP').show();
            $('#delLoc').hide();
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
            $('#delComp').hide();
            $('#delDate').hide();
            $('#delAdm').hide();
            $('#deldetA').hide();
            $('#deldetP').hide();
            $('#delLoc').show();

        });



    }

    form();


    $("#option1").click(function() {

        $('#update').hide();
        $('#insert').show();
        $("#delete").hide();
    });

    $("#option2").click(function() {

        $('#insert').hide();
        $('#update').show();
        $("#delete").hide();
    });

    $('#option3').click(function () {
        $('#insert').hide();
        $('#update').hide();
        $("#delete").show();

    });




    $('#inserComp').click(function () {
        var values ="date="+$('#fdate').val()+
            "&article="+$('#farticle').val() +
            "&reference_cindoc="+$('#freference_cindoc').val()+
            "&serie="+$('#fserie').val()+
            "&description="+$('#fdescription').val()+
            "&index_personne="+$('#findex_personne').val()+
            "&negatif_reversible="+$('#fnegatif_reversible').val()  +
            "&couleur_noirblanc="+$('#fcouleur_noirblanc').val()+
            "&discriminant="+$('#fdiscriminant').val();
        console.log(values)
        $.ajax({
            type: 'POST',
            url: "php/insert/inserComp.php",
            data : values,
            dataType : 'html',
            success: alert("Donnée inserer"),

        })
    });

    $('#inserAdm').click(function () {
        var values ="article="+$('#darticle').val() +
            "&reference_cindoc="+$('#dreference_cindoc').val()+
            "&serie="+$('#dserie').val()+
            "&discriminant="+$('#ddiscriminant').val();
        $.ajax({
            type: 'POST',
            url: "php/insert/inserAdm.php",
            data: values,
            success: alert("Donnée inserer"),
        })
    });
    $('#inserDate').click(function () {
        var values ="annee="+$('#cannee').val() +
            "&mois="+$('#cmois').val()+
            "&jour="+$('#cjour').val();

        $.ajax({
            type: 'POST',
            url: "php/insert/inserDate.php",
            data:values,
            success: alert("Donnée inserer"),
        })
    });

    $('#inserdetA').click(function () {
        var values ="nb_cliche="+$('#anb_cliche').val()+
            "&negatif_reversible="+$('#anegatif_reversible').val() +
            "&couleur_noirblanc="+$('#acouleur_noirblanc').val()+
            "&remarque="+$('#aremarque').val()+
            "&taille_cliche="+$('#ataille_cliche').val();
        $.ajax({
            type: 'POST',
            url: "php/insert/inserdetA.php",
            data: values,
            success: alert("Donnée inserer"),

        })
    });
    $('#inserdetP').click(function () {
        var values ="article="+$('#barticle').val()+
            "&description="+$('#bdescription').val() +
            "&sujet="+$('#bsujet').val()+
            "&notebasdepage="+$('#bnotebasdepage').val()+
            "&index_personne="+$('#findex_personne').val()+
            "&fichier_numerique="+$('#bfichier_numerique').val()+
            "&fichier_iconographique="+$('#bfichier_iconographique').val() ;
        $.ajax({
            type: 'POST',
            url: "php/insert/inserdetP.php",
            data:values,
            success:alert("Donnée inserer"),

        })
    });
    $('#inserLoc').click(function () {
        var values ="nom_ville="+$('#nnom_ville').val() +
            "&latlambert93="+$('#nlat').val()+
            "&longlambert93="+$('#nlong').val();

        $.ajax({
            type: 'POST',
            url: "php/insert/inserLoc.php",
            data : values,
            success:alert("Donnée inserer"),

        })
    });



    // RECUP la val des bouttons une fois fait ca sera bons


    $("#uComp").click(function(){
      var values = 'selectFieldValue='+$("select#selectionner").val() +
      '&valuemodif='+$('input[name$="valuemodif"]').val()+
      "&amodifier="+$('select#amodifier').val()+
      "&newvalue="+$('input[name$="newvalue"]').val();
      var flague1 = $('input[name$="valuemodif"]').val();
      var flague2=$('input[name$="newvalue"]').val();
      if(flague1 !="" && flague2!=""){
      $.ajax({
        type : 'POST',
        url:'php/update/updateComp.php',
        data : values,
        dataType: 'html',
        success : alert("Donnée mise a jour"),
      });
    }
    });


    $("#uAdm").click(function(){
      var values = 'selectFieldValue='+$("select#selectionnerA").val() +
      '&valuemodif='+$('input[name$="valuemodifA"]').val()+
      "&amodifier="+$('select#amodifierA').val()+
      "&newvalue="+$('input[name$="newvalueA"]').val();
      var flague1 =$('input[name$="valuemodifA"]').val();
      var flague2 = $('input[name$="newvalueA"]').val();
      if(flague1 !="" && flague2!=""){
      $.ajax({
        type : 'POST',
        url:'php/update/updateAdm.php',
        data : values,
        dataType: 'html',
        success :alert("Donnée mise a jour"),
      });
    }
    });

    $("#uDate").click(function(){
      var values = 'selectFieldValue='+$("select#selectionnerB").val() +
      '&valuemodif='+$('input[name$="valuemodifB"]').val()+
      "&amodifier="+$('select#amodifierB').val()+
      "&newvalue="+$('input[name$="newvalueB"]').val();
      var flague1 = $('input[name$="valuemodifB"]').val();
      var flague2 =$('input[name$="newvalueB"]').val();
  if(flague1 !="" && flague2!=""){
      $.ajax({
        type : 'POST',
        url:'php/update/updateDate.php',
        data : values,
        dataType: 'html',
        success : alert("Donnée mise a jour"),
      });
    }
    });


    $("#udetP").click(function(){
      var values = 'selectFieldValue='+$("select#selectionnerD").val() +
      '&valuemodif='+$('input[name$="valuemodifD"]').val()+
      "&amodifier="+$('select#amodifierD').val()+
      "&newvalue="+$('input[name$="newvalueD"]').val();
        var flague1 = $('input[name$="valuemodifD"]').val();
        var flague2 = $('input[name$="newvalueD"]').val();
        if( flague1!="" && flague2!=""){
      $.ajax({
        type : 'POST',
        url:'php/update/updatedetP.php',
        data : values,
        dataType: 'html',
        success :alert("Donnée mise a jour"),
      });
    }
    });

    $("#uLoc").click(function(){
      var values = 'selectFieldValue='+$("select#selectionnerE").val() +
      '&valuemodif='+$('input[name$="valuemodifE"]').val()+
      "&amodifier="+$('select#amodifierE').val()+
      "&newvalue="+$('input[name$="newvalueE"]').val();
        var flague1 = $('input[name$="valuemodifE"]').val();
        var flague2 = $('input[name$="newvalueE"]').val();
        if( flague1!="" && flague2!=""){
      $.ajax({
        type : 'POST',
        url:'php/update/updateLoc.php',
        data : values,
        dataType: 'html',
        success :alert("Donnée mise a jour"),
      });
    }
    });





    $("#delComp").click(function(){
      var values = 'selectFieldValue='+$("select#selectionnerF").val() +
      "&newvalue="+$('input[name$="newvalueF"]').val();
        var flague = $('input[name$="newvalueF"]').val();
        if( flague != ""){
      $.ajax({
        type : 'POST',
        url:'php/delete/delComp.php',
        data : values,
        dataType: 'html',
        success : alert("Donnée supprimer"),
      });
    }
    });
    $("#deladm").click(function(){
      var values = 'selectFieldValue='+$("select#selectionnerG").val() +
      "&newvalue="+$('input[name$="newvalueG"]').val();
        var flague = $('input[name$="newvalueG"]').val();
        if( flague !=""){

      $.ajax({
        type : 'POST',
        url:'php/delete/deleteAdm.php',
        data : values,
        dataType: 'html',
        success :  alert("Donnée supprimer"),
      });
    }
    });

    $("#delDate").click(function(){
      var values = 'selectFieldValue='+$("select#selectionnerH").val() +
      "&newvalue="+$('input[name$="newvalueH"]').val();
      var flague = $('input[name$="newvalueH"]').val();
      if(flague != "" ){
      $.ajax({
        type : 'POST',
        url:'php/delete/deleteDate.php',
        data : values,
        dataType: 'html',
        success :  alert("Donnée supprimer"),
      });
    }
    });



    $("#deldeta").click(function(){
      var values = 'selectFieldValue='+$("select#selectionnerI").val() +
      "&newvalue="+$('input[name$="newvalueI"]').val();
      var flague = $('input[name$="newvalueI"]').val();
      if( flague != "" ){
      $.ajax({
        type : 'POST',
        url:'php/delete/deldetA.php',
        data : values,
        dataType: 'html',
        success :  alert("Donnée supprimer"),
      });
    }
    });

    $("#deldetP").click(function(){
      var values = 'selectFieldValue='+$("select#selectionnerJ").val() +
      "&newvalue="+$('input[name$="newvalueJ"]').val();
      var flague  =$('input[name$="newvalueJ"]').val() ;
      if( flague != ""){
      $.ajax({
        type : 'POST',
        url:'php/delete/deldetP.php',
        data : values,
        dataType: 'html',
        success : alert("Donnée supprimer"),
      });
    }
    });


    $("#delLoc").click(function(values){
      var values = 'selectFieldValue='+$("#selectionnerK").val() +
      "&newvalue="+$('input[name$="newvalueK"]').val();
      var tes = $('input[name$="newvalueK"]').val()
      if( tes != ""){
      $.ajax({
        type : 'POST',
        url:'php/delete/deleteLoc.php',
        data : values,
        dataType: 'html',
        success : alert("Donnée supprimer"),
      });
    }
    });

});
