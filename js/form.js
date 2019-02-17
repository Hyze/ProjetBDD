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
            success: function() {
                console.log(values);
            },

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
            success: function() {
                console.log(values);
            },

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
            success: function() {
                console.log(values);
            },

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
            success: function() {
                console.log(values);
            },

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
            success: function() {
                console.log(values);
            },

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
            success: function() {
                console.log(values);
            },

        })
    });
    $('#uComp').click(function () {
        $("#valmodif").change(function () {

            var values = $(this).text();
            console.log(values)

       $('#new').change(function (values) {
           var newval = $(this).text();
           var old = $('#valuemodif').val();

           var new1 = $("#newvalue").val();


           var result = values+"="+old+"&"+new1+"="+newval;

           $.ajax({
               type: 'POST',
               url: "php/update/updateComp.php",
               data : result ,
               success: function() {
                   console.log(result);
               },

           })

       });
        });


    });
    $('#uAdm').click(function () {
        $.ajax({
            type: 'POST',
            url: "php/update/updateAdm.php",
            success: function() {
                console.log("test ok ");
            },

        })
    });
    $('#uDate').click(function () {
        var values = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: "php/update/updateDate.php",
            data : values,
            success: function() {
                console.log("test ok ");
            },

        })
    });
    $('#udetA').click(function () {
        $.ajax({
            type: 'POST',
            url: "php/update/updatedetA.php",
            success: function() {
                console.log("test ok ");
            },

        })
    });
    $('#udetP').click(function () {
        $.ajax({
            type: 'POST',
            url: "php/update/updatedetP.php",
            success: function() {
                console.log("test ok ");
            },

        })
    });
    $('#uLoc').click(function () {
        $.ajax({
            type: 'POST',
            url: "php/update/updateLoc.php",
            success: function() {
                console.log("test ok ");
            },

        })
    });


    // RECUP la val des bouttons une fois fait ca sera bons







});