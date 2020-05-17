// Regex inscription
$.validator.addMethod(
    "regex2",
    function(value, element, reg) {
        if (reg.constructor != RegExp)
            reg = new RegExp(reg);
        else if (reg.global)
            reg.lastIndex = 0;
        return this.optional(element) || reg.test(value);
    },
    "Wrong input found, please check your input."
);

  
$("#form-inscription").validate({
    rules: {
        nom : {
            required: true,
            regex2:("^(?=.{2,25}$)([a-zA-Z\u0080-\u024F]+(?:. |-| |'))*[a-zA-Z\u0080-\u024F]*$")
        },
        prenom : {
            required: true,
            regex2:("^(?=.{2,25}$)([a-zA-Z\u0080-\u024F]+(?:. |-| |'))*[a-zA-Z\u0080-\u024F]*$")
        },
        numero : {
            required: true,
            minlength: 1,
            maxlength: 10
        },
        rue : {
            required: true,
            regex2:("^(?=.{1,50}$)([a-zA-Z\u0080-\u024F]+(?:. |-| |'))*[a-zA-Z\u0080-\u024F]*$")
        },
        ville: {
            required: true,
            regex2:("^(?=.{1,50}$)([a-zA-Z\u0080-\u024F]+(?:. |-| |'))*[a-zA-Z\u0080-\u024F]*$")
        },
        codePostal: {
            required: true,
            regex2:("^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$")
        },
        telephone: {
            required: true,
            regex2:("^(0|\\+33)[1-9]([-. ]?[0-9]{2}){4}$")
        },
        mail: {
            required: true,
            regex2:("^(?=.{6,50}$)([a-zA-Z0-9_\\-\\.]+)@([a-zA-Z0-9_\\-\\.]+)\\.([a-zA-Z]{2,4})$")
        },
        password: {
            required:true,
            regex2:("^(?=.{8,20}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[-!@#\$%\^&\*])")
        },
        confirmPassword: {
            required:true,
            equalTo: "#password"
        }
    },
    
    messages : {
        nom: {
            required: "Vous devez renseigner le nom.",
            regex2: "Le nom est incorrect. Minimum 2 caractères, maximum 25 caractères."
        },
        prenom: {
            required: "Vous devez renseigner le prénom.",
            regex2: "Le prénom est incorrect. Minimum 2 caractères, maximum 25 caractères."
            },
        numero: {
            required: "Vous devez renseigner le numéro.",
            maxlength: "15 caractères au maximum."
        },
        rue: {
            required: "Vous devez renseigner la voie.",
            regex2: "Le nom de la voie est incorrect."
        },
        ville: {
            required: "Vous devez renseigner la ville.",  
            regex2: "Le nom de la ville est incorrect."
        },
        codePostal: {
            required: "Vous devez renseigner le code postal.",  
            regex2: "Le code postal est incorrect."
        },
        telephone: {
            required: "Vous devez renseigner le téléphone.",
            regex2: "Le numéro de téléphone est incorrect."
        },
        mail: {
            required: "Vous devez renseigner l'email.",
            regex2: "L'adresse email est incorrecte. Exemple valide : \"nom.prenom@example.com\"."
        },
        password:{
            required: "Vous devez renseigner le mot de passe.",
            regex2: "Minimum 8 caractères, maximum 20 caractères. 1 minsucule, 1 majuscule, 1 chiffre, 1 caractère special."
        },
        confirmPassword:{
            required: "Vous devez confirmer le mot de passe.",  
            equalTo: "Les deux mots de passe ne correspondent pas."
        }
    }
});

//Gestion de l'inscription
currentMail = $("#current-mail").val();

bothPassControlAffichage();
$("#form-inscription").submit(function(e){
    e.preventDefault();
    var postData = $(this).serialize();
    var email = $("#inputemailinscription").val();
    var p = isMailAlreadyUsed(email);
    p.done(function(resultat) {
        if(resultat == false && $("#form-inscription").valid()) {
            $.post({
                url: "AJAXAnswerInscriptions.php",
                data: postData,
                success: function(resultat){
                        window.location = "index.php";
                },
                error: function(xhr, message, status) {
                    alert("Erreur !");
                }
            })
        } else {
        }
    });
    p.fail(function(resultat) {
        var error = resultat;
        console.log(error);
    });
})

//bouton "Une question ?" fiche animal
$('#btn-form-une-question').click(function(e) {
    $('#form-une-question').slideToggle('slow', function() {

    })
})

//gestion de la connexion formulaire header
$('#btnconnexionheader').click(function(e) {
    event.preventDefault();
    let searchedEmailParam=$('#emailconnexionheader').val();
    let searchedPassParam=$('#passconnexionheader').val();
    var p = passVerify(searchedEmailParam, searchedPassParam);
    p.done(function(resultat) {
        data=JSON.parse(resultat);
        $('#tempdiv').remove();
        if(data[0]==false || data[1]==false) {
            connexionIsInvalid();
            $('#connexion').keyup(function(e) {
                $('#emailconnexionheader, #passconnexionheader').removeClass("is-invalid");
            })
        } else {
            let location = window.location.href;
            if(window.location.href.includes("#")) {
                location = window.location.href;
                location = location.substring(0, location.indexOf('#'));
            } else if(window.location.href == "http://localhost/fil_rouge/inscriptions.php" || window.location.href == "http://localhost/fil_rouge/inscriptions.php?error=1") {
                location = "http://localhost/fil_rouge/index.php";
            }
            window.location = location;
        } 
    });
    p.fail(function(resultat) {
        var error = resultat;
        console.log(error);
    });
})

//gestion de la déconnexion
$("#deconnexion").click(function(e) {
    e.preventDefault();
    $.ajax({
        url: "header.php",
        type: "POST",
        data: {deconnexion: ""},
        success: function(response) {
            let location = window.location.href;
            if(window.location.href.includes("#")) {
                location = window.location.href;
                location = location.substring(0, location.indexOf('#'));
            }
            else if(window.location.href == "http://localhost/fil_rouge/monCompte.php") {
                location = "http://localhost/fil_rouge/index.php";
            }
            window.location = location;
        },
        error: function(xhr, errorStatus, errorText) {
            console.log(errorText);
        }
    })
})

//édition numéro de téléphone
$("#div-telephone").hover(function(e){
    createEditBtn("edit-tel-1", "#col-btn-edit-tel");
    $("#edit-tel-1").one("click", function(e){
        e.preventDefault();
        var inputValue = $("#p-tel").text();
        $("#p-tel").empty();
        var form = $("<form>").attr({id: "form-telephone", method: "post", action: ""})
        var input = createInput("input-tel","telephone", "text", inputValue);
        modifyEditBtn("#edit-tel-1", "edit-tel-2");
        form.append(input, $("#edit-tel-2"));
        $("#p-tel").append(form);
        $("#form-telephone").validate({
            rules: {
                telephone: {
                    required: true,
                    regex2:("^(0|\\+33)[1-9]([-. ]?[0-9]{2}){4}$")
                }
            },
            messages: {
                telephone: {
                    required: "Vous devez renseigner le téléphone.",
                    regex2: "Le numéro de téléphone est incorrect."
                }
            },
            success: function(e) {
                let postData = $("#form-telephone").serializeArray();
                postData = postData.concat({name: "mail", value: currentMail}, {name: "edit-tel", value: ""});
                $("#form-telephone").submit(function(e){
                    e.preventDefault();
                    $("#p-tel").load("AJAXAnswerMonCompte.php", postData);
                    $("#form-telephone").remove();
                })
            }
        })
    })
},
function(e){
    $("#edit-tel-1, #edit-tel-2, #form-telephone").remove();
    $("#p-tel").load("AJAXAnswerMonCompte.php?telOf=" + currentMail);
})

//édition adresse
var inputNumeroValue;
var inputRueValue;
var inputVilleValue;
var inputCodePostalValue;
var inputNumero;
var inputRue;
var inputVille;
var inputCodePostal;
displayAdresse();
function displayAdresse() {
    $("#display-adresse").load("displayAdresse.php", function(e){
        $("#div-adresse").hover(function(e){
            createEditBtn("edit-adresse-1", "#col-btn-edit-adresse");
            $("#edit-adresse-1").one("click", function(e){
                e.preventDefault();
                setAllInputs();
                emptyAllParag();
                var form = $("<form>").attr({id: "form-adresse", method: "post", action: ""})
                createAllInputs();
                form.append(inputNumero, inputRue, inputVille, inputCodePostal, $("#edit-adresse-1"));
                $("#parent-form").append(form);
                modifyEditBtn("#edit-adresse-1", "edit-adresse-2");
                $("#form-adresse").validate({
                    rules: {
                        numero : {
                            required: true,
                            minlength: 1,
                            maxlength: 10
                        },
                        rue : {
                            required: true,
                            regex2:("^(?=.{1,50}$)([a-zA-Z\u0080-\u024F]+(?:. |-| |'))*[a-zA-Z\u0080-\u024F]*$")
                        },
                        ville: {
                            required: true,
                            regex2:("^(?=.{1,50}$)([a-zA-Z\u0080-\u024F]+(?:. |-| |'))*[a-zA-Z\u0080-\u024F]*$")
                        },
                        codePostal: {
                            required: true,
                            regex2:("^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$")
                        }
                    },
                    messages: {
                        numero: {
                            required: "Vous devez renseigner le numéro.",
                            maxlength: "15 caractères au maximum."
                        },
                        rue: {
                            required: "Vous devez renseigner la voie.",
                            regex2: "Le nom de la voie est incorrect."
                        },
                        ville: {
                            required: "Vous devez renseigner la ville.",  
                            regex2: "Le nom de la ville est incorrect."
                        },
                        codePostal: {
                            required: "Vous devez renseigner le code postal.",  
                            regex2: "Le code postal est incorrect."
                        }
                    }
                })
                $("#form-adresse").submit(function(e){
                    e.preventDefault();
                    if($("#form-adresse").length) {
                        if($("#form-adresse").valid()) {
                            let postData = $("#form-adresse").serializeArray();
                            postData = postData.concat({name: "mail", value: currentMail}, {name: "edit-adresse", value: ""});
                            $("#display-adresse").load("displayAdresse.php", postData);
                            $("#edit-adresse-2").remove();
                            displayAdresse();
                        }
                    }
                })
            })
        },
        function(e){
            $("#edit-adresse-1, #edit-adresse-2").remove();
            displayAdresse();
            removeAdresseInputs();
        })
    });
}

keyupMailAlreadyUsed('#inputemailinscription', '#divemailinscription');

function keyupMailAlreadyUsed(inputTarget, selectedDivForDisplay) { 
    $(inputTarget).keyup(function(e){
        let searchedEmail=$(inputTarget).val();
        var p = isMailAlreadyUsed(searchedEmail);
        p.done(function(resultat) {
            //console.log(resultat)
            $('#tempdiv').remove();
            if(resultat==true) {
                $(inputTarget).addClass("is-invalid");
                createDiv(selectedDivForDisplay, "Cette adresse email est déjà utilisée.");
            } else {
                $(inputTarget).removeClass("is-invalid");
            }
        });
        p.fail(function(resultat) {
            var error = resultat;
            console.log(error);
        });
    })
}

//édition mail 
$("#div-email").hover(function(e){
    createEditBtn("edit-mail-1", "#col-btn-edit-mail");
    $("#edit-mail-1").one("click", function(e){
        e.preventDefault();
        var inputValue = currentMail;
        $("#p-mail").empty();
        form = $("<form>").attr({id:"form-email", method:"post", action:""});
        let div = $("<div>").attr({id: "div-input-mail-edit"});
        input = createInput("input-mail","new-mail", "email", inputValue);
        modifyEditBtn("#edit-mail-1", "edit-mail-2");
        div.append(input);
        form.append(div, $("#edit-mail-2"));
        $("#p-mail").append(form);
        keyupMailAlreadyUsed('#input-mail', "#div-input-mail-edit");
        $("#form-email").validate({
            rules: {
                "new-mail": {
                    required: true,
                    regex2:("^(?=.{6,50}$)([a-zA-Z0-9_\\-\\.]+)@([a-zA-Z0-9_\\-\\.]+)\\.([a-zA-Z]{2,4})$")
                }
            },
            messages: {
                "new-mail": {
                    required: "Vous devez renseigner l'email.",
                    regex2: "L'adresse email est incorrecte."
                }
            }
        })
        $("#form-email").submit(function(e){
            e.preventDefault();
            searchedEmail = $("#input-mail").val();
            var p = isMailAlreadyUsed(searchedEmail);
            p.done(function(resultat) {
                if(resultat == true) {
                    $('#tempdiv').remove();
                }
                else if (resultat == false && $("#form-email").length) {
                    if($("#form-email").valid()) {
                        var postData = $("#form-email").serializeArray();
                        postData = postData.concat({name: "current-mail", value: currentMail}, {name: "edit-mail", value: ""});
                        $.post("AJAXAnswerMonCompte.php", postData, function(data){
                        })
                        .done(function(){
                            window.location = "monCompte.php";
                        })
                        .fail(function(){
                            alert("error");
                        })
                    }
                }
            });
            p.fail(function(resultat) {
                var error = resultat;
                console.log(error);
            });
            
        })
    })
},
function(e){
    $("#edit-mail-1, #form-email").remove();
    $("#p-mail").html(currentMail);
})

// édition password
$("#display-form-password").click(function(e){
    $("#form-password").toggle("slow", function(e){
        reinitAffichage();
    })
})

var password_regex = /^(?=.{8,20}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[-!@#\$%\^&\*])/i;
var hiddenInput = createHiddenInput("mail", currentMail);
$("#form-password").append(hiddenInput);
$("#form-password").submit(function(e){
    e.preventDefault();
    if($('#new-pass-feedback').html()) {
        $('#new-pass-feedback').html("");
    }
    if($('#new-pass-confirmed-feedback').html()) {
        $('#new-pass-confirmed-feedback').html("");
    }
    email = currentMail;
    givenPass = $("#current-pass").val();
    var p = controlPass("AJAXAnswerMonCompte.php");
    p.done(function(resultat){
        console.log(resultat);
        if($("#current-pass").val() == "" || $("#new-pass").val() == "" || $("#new-pass-confirmed").val() == "") {
            affichageWrongPassEdit();
        }
        else if(resultat == false || $("#new-pass").val() != $("#new-pass-confirmed").val() || !password_regex.test($("#new-pass").val())) {
            if(!password_regex.test($("#new-pass").val())) {
                $('#new-pass').addClass("is-invalid");
                $('#new-pass-feedback').html("Minimum 8 caractères, maximum 20 caractères. 1 minsucule, 1 majuscule, 1 chiffre, 1 caractère special.");
            }
            if($("#new-pass").val() != $("#new-pass-confirmed").val()) {
                $('#new-pass-confirmed').addClass("is-invalid");
                $('#new-pass-confirmed-feedback').html("Les deux mots de passe ne correspondent pas.");
            } 
            if(resultat == false) {
                affichageWrongPassEdit();
            }
        }
        else {
            var postData = $("#form-password").serialize();
            $.post("AJAXAnswerMonCompte.php", postData, function(data){
            })
            .done(function(){
                reinitAffichage();
            })
            .fail(function(){
                alert("error");
            })
        }
    });
    p.fail(function(resultat){
        var error = resultat;
        console.log(error);
    });
})

// reset password
$("#form-reset-pass").submit(function(e) {
    e.preventDefault();
    searchedEmail=$('#email-reset').val();
    var p = isMailAlreadyUsed(searchedEmail);
    p.done(function(response) {
        $('#tempdiv').remove();
        if(response==true) {
            $('#email-reset').removeClass("is-invalid");
            console.log("prepost");
            $.post({
                url: "AJAXAnswerResetPass.php",
                data: {"mail": searchedEmail, "reset-pass": ""},
                success: function(response) {
                    console.log(response);
                    if(response == "resetPass") {
                        let divAlert = $("<div>").addClass("alert alert-success text-center").text("Votre mot de passe vient d'être réinitialisé");
                        $("#bloc-reset-pass").append(divAlert);
                    }
                },
                error: function(xhr, errorStatus, errorText) {
                    console.log(errorText);
                }
            })
        } else {
            $('#email-reset').addClass("is-invalid");
            createDiv('#div-reset-pass', "Aucun compte ne correspond à cette adresse email.");
        }
    });
    p.fail(function(response) {
        var error = response;
        console.log(error);
    });
})

//display-favs
displayFavs();
function displayFavs() {
    $("#display-favs").load("displayFavs.php", function(e) {
        loadPagination(4);
        $(".fav").each(function(index, element) {
            $(element).click(function(e) {
                e.preventDefault();
                let idAnimal = $(element).data("idanimal");
                $.post({
                    url: "AJAXAnswerFavori.php",
                    data: {"remove-favori": "", "id-animal": idAnimal},
                    success: function(response) {
                        displayFavs();
                    },
                    error: function(xhr, message, status) {
                        console.log(message);
                    }
                })
            })
        })
    })
}

//fonctions

function passVerify(searchedEmailParam, searchedPassParam) {
    var d = $.Deferred();
    $.ajax({
        url: 'AJAXAnswerMonCompte.php',
        type: "POST",
        data: {searchedEmail: searchedEmailParam, searchedPass: searchedPassParam, controlEmailAndPass:""},
        success: function(resultat) {
            d.resolve(resultat);
        },
        error: function(xhr, errorStatus, errorText) {
            alert(errorText);
            d.reject(errorText);
        }
    })
    return d.promise();
}

function bothPassControlAffichage() {
    $("#password, #confirmPassword").keyup(function(e) {
        if($("#password").attr("aria-invalid")) {
            if($("#password").attr("aria-invalid").includes("false")) {
                let confirmedPassword=$("#confirmPassword").val();
                let password=$("#password").val();
                if(confirmedPassword!="" && confirmedPassword!=password) {
                    $("#confirmPassword, #password").removeClass("is-valid");
                    $("#confirmPassword, #password").addClass("is-invalid");
                }
                else if(confirmedPassword!="" && confirmedPassword==password) {
                    $("#confirmPassword, #password").removeClass("is-invalid");
                    $("#confirmPassword, #password").addClass("is-valid");
                }
                else if(confirmedPassword=="") {
                    $("#confirmPassword, #password").removeClass("is-invalid");
                    $("#confirmPassword, #password").removeClass("is-valid");
                }
            }
        }
    })
}

function createInputsAndAppend(inputValue) {
    var input = createInput("input-tel","telephone", "number", inputValue);
    var hiddenInput = createHiddenInput("mail", $("#current-mail").val());
    var hiddenInput2 = createHiddenInput("edit-tel", null);
    $("#p-tel").append(input);
    $("#form-telephone").append(hiddenInput);
    $("#form-telephone").append(hiddenInput2);
}

function createInputsAndAppend2(inputValue) {
    var input = createInput("input-mail","new-mail", "email", inputValue);
    var hiddenInput = createHiddenInput("current-mail", $("#current-mail").val());
    var hiddenInput2 = createHiddenInput("edit-mail", null);
    $("#p-mail").append(input);
    $("#form-email").append(hiddenInput);
    $("#form-email").append(hiddenInput2);
}

function createDiv(selectedDiv, message) {
    div=$('<div>').attr({'id':'tempdiv', 'class':'invalid-feedback'});
    div.html(message);
    $(selectedDiv).append(div);
};

function removeAdresseInputs() {
    $("#input-numero, #input-rue, #input-ville, #input-codePostal").remove();
}

function connexionIsInvalid() {
    // $('#emailconnexionheader, #passconnexionheader').val('');
    $('#emailconnexionheader, #passconnexionheader').addClass("is-invalid");
    createDiv('#divpassconnexionheader', "L'email ou le mot de passe est incorrect.");
}

function affichageEditMailAlreadyUsed() {
    $("#tempdiv").remove();
    $('#input-mail').addClass("is-invalid");
    createDiv("#form-email", "Cet email est déjà utilisé.");
}

function affichageEditMailAlreadyUsedNew() {
    $("#input-mail").attr("class", "form-control is-invalid");
    div=$('<div>').attr({'id':'tempdiv', 'class':'invalid-feedback'});
    div.html("Cet email est déjà utilisé.");
    div.insertAfter($("#input-mail"));
    $("#tempdiv").insertAfter($("#input-mail"));
}

function reinitAffichage() {
    $('#current-pass, #new-pass, #new-pass-confirmed').val("");
    $("#tempdiv").remove();
    $('#current-pass, #new-pass, #new-pass-confirmed').removeClass("is-invalid");
}

function affichageWrongPassEdit() {
    $("#tempdiv").remove();
    $('#current-pass, #new-pass, #new-pass-confirmed').addClass("is-invalid");
    createDiv('#editPassFormRow', "La saisie est incorrecte.");
}

function createEditBtn(id, parent) {
    var col = $("<div>").attr("class","text-left");
    var button = $("<input>").attr({"id":id, "class":"btn btn-primary btn-sm", "value":"Modifier", "type":"submit"});
    col.append(button);
    $(parent).append(col);
}

function createInput(id, name, type, value) {
    var input = $("<input>");
    input.attr("id", id);
    input.attr("name", name);
    input.attr("type", type);
    input.attr("class","form-control");
    input.attr("value",value);
    return input;
}

function createHiddenInput(name, value) {
    var input = $("<input>");
    input.attr("name", name);
    input.attr("type", "hidden");
    input.attr("value", value);
    return input
}

function modifyEditBtn(currentId, newId) {
    $(currentId).attr({"id":newId,"value":"Valider", "class":"btn btn-sm btn-primary", "type":"submit"});
}

function setAllInputs() {
    inputNumeroValue = $("#p-numero").text();
    inputRueValue = $("#p-rue").text();
    inputVilleValue = $("#p-ville").text();
    inputCodePostalValue = $("#p-codePostal").text();
}

function emptyAllParag() {
    $("#p-numero").empty();
    $("#p-rue").empty();
    $("#p-ville").empty();
    $("#p-codePostal").empty();
}

function createAllInputs() {
    inputNumero = createInput("input-numero","numero", "text", inputNumeroValue);
    inputRue = createInput("input-rue","rue", "text", inputRueValue);
    inputVille = createInput("input-ville", "ville", "text", inputVilleValue);
    inputCodePostal = createInput("input-codePostal", "codePostal", "text", inputCodePostalValue);
}

function appendAllInputs() {
    $("#p-numero").append(inputNumero);
    $("#p-rue").append(inputRue);
    $("#p-ville").append(inputVille);
    $("#p-codePostal").append(inputCodePostal);
}

function isMailAlreadyUsed(searchedEmail) {
    var d = $.Deferred();
    $.ajax({
        url: 'AJAXAnswerMonCompte.php?checkMail=' + searchedEmail,
        success: function(resultat) {
            d.resolve(resultat);
        },
        error: function(xhr, errorStatus, errorText) {
            alert(errorText);
            d.reject(errorText);
        }
    })
    return d.promise();
}

function controlPass(url) {
    var d = $.Deferred();
    $.ajax({
        url: url,
        type: "GET",
        data: {email: email, givenPass: givenPass, controlPass:""},
        success: function(resultat) {
            d.resolve(resultat);
        },
        error: function(xhr, errorStatus, errorText) {
            alert(errorText);
            d.reject(errorText);
        }
    })
    return d.promise();
}

function edit(url, ...objects) {
    var d = $.Deferred();
    $.ajax({
        url: url,
        data: {...objects},
        success: function(resultat) {
            d.resolve(resultat);
        },
        error: function(xhr, errorStatus, errorText) {
            alert(errorText);
            d.reject(errorText);
        }
    })
    return d.promise();
}

setForAnimalAdd = false;
$("#addAnimal").click(function(e){
    e.preventDefault();
    $(this).text() == "+" ? $(this).html('-') : $(this).html('+'); // bouton + quand formulaire d'ajout non déployé, - quand l'inverse
    if($("#row-form-admin-animal").is(":visible")) {
        setForAnimalAdd = false;
        displayTableauListeAnimaux(setForAnimalAdd); // au moment du clic, si formulaire d'ajout présent, il se rétracte : affichage sans formulaire d'ajout dans le load 
    } else {
        setForAnimalAdd = true;
        displayTableauListeAnimaux(setForAnimalAdd); // au moment du clic, si formulaire d'ajout non présent, il se déploie : affichage avec formulaire d'ajout dans le load
    }
    $("#row-form-admin-animal").slideToggle("slow",function(){
        $("#btn-add-animal").remove();
        createAddAnimalBtn();
    })
})

$( document ).ready(function() {
    if($(".listeAnimaux").is(':visible')) {
        //alert('existe');
        allForAddAnimal();
    } else {
        //alert('existe pas');
    }
});

displayTableauListeAnimaux(setForAnimalAdd);
function displayTableauListeAnimaux(setForAnimalAdd, get = null) {
    if(get == null) {
       // console.log("get null");
        var tableau = "tableauListeAnimaux.php";
    } else {
        //console.log("recherche en cours");
        var tableau = "tableauListeAnimaux.php?searchAnimaux="+get;
    }

    $("#tableauAnimauxAdmin").load(tableau, function(e) {
        setForAnimalAdd == true ? $("#row-form-admin-animal").attr("style", "") : $("#row-form-admin-animal").attr("style", "display:none");
        loadPagination(5);
        allForAddAnimal();
        if(setForAnimalAdd) {
            $("#btn-add-animal").click(function(e) {
                alert("hello");
            })
        }
        if(setForAnimalAdd == false) {
            $('td').click(function(e) {
                clickedCell = e.target;
                var tdVal = $(this).html();
                var tdName = $(this).attr("name");
                var tdid = $(this).attr("id");
                var idAnimal = $(this).parent().find("th").text();
                if(idAnimal == "") {
                    idAnimal = tdid;
                }
              //  console.log(tdid);
                if(tdName == "sexe-animal" || tdName == "handicap-animal" || tdName == "urgence-animal") { // gestion des cas d'édition binaire
                    currentValue = $(this).text();
                    switch(tdName) {
                        case "sexe-animal":
                            currentValue == "Mâle" ? newValue = "Femelle" : newValue = "Mâle";
                            editName = "edit-sexe-animal";
                            break;
                        case "handicap-animal":
                            currentValue == 0 ? newValue = 1 : newValue = 0;
                            editName = "edit-handicap-animal";
                            break;
                        case "urgence-animal":
                            currentValue == 0 ? newValue = 1 : newValue = 0;
                            editName = "edit-urgence-animal";
                            break;
                    }
                    postData = {new_value: newValue, id_animal: idAnimal, [editName]: ""};
                    $(this).load("AJAXAnswerAdminAnimaux.php", postData);
                }
                else if(tdName == "delete") { // gestion du delete
                    $.ajax({
                        url: "AJAXAnswerAdminAnimaux.php?delete=" + idAnimal,
                        success: function(resultat) {
                           // console.log(resultat);
                            displayTableauListeAnimaux(setForAnimalAdd);
                        },
                        error: function(xhr, errorStatus,errorText) {
                            alert(errorText);
                        }
                    })
                }
                else if (tdName == "id-refuge" || tdName == "race" || tdName == "espece") {
                    switch(tdName) {
                        case "id-refuge":
                            var propertyName = "refuge_animal";
                            var editName = "edit-refuge-animal";
                            var selectName = "select-refuge";
                            rechercherRefuge();
                            break;
                        case "race":
                            let searchedEspeceId = $(this).parent().find("th").next().attr("value");
                            var propertyName = "race";
                            var editName = "edit-race-animal";
                            var selectName = "select-race";
                            rechercherRaces(searchedEspeceId);
                            break;
                        case "espece":
                            var propertyName = "espece";
                            var editName = "edit-espece-animal";
                            var selectName = "select-espece";
                            rechercherEspeces();
                    }
                    let select = $("<select>").attr({id: selectName, class: "form-control"});
                    $(clickedCell).empty();
                    $(clickedCell).append(select);
                    $("#" + selectName).change(function(e) {
                        e.stopPropagation();
                        let val = $(this).val();
                        postData = {[propertyName]: val, id_animal: idAnimal, [editName]:""};
                       // console.log(postData);
                        $(this).parent().load("AJAXAnswerAdminAnimaux.php", postData, function(e) {
                            if(selectName == "select-espece") {
                                console.log(val);
                                $(this).attr("value", val)
                            }
                        });
                    })
                }
                else { // gestion des cas d'édition non binaire
                    inputType="";
                    switch(tdName) {
                        case "nom-animal":
                            inputType = "text";
                            propertyName = "nom_animal";
                            editName = "edit-nom-animal";
                            break;
                        case "date-naissance-animal":
                            inputType = "date";
                            propertyName = "date_naissance_animal";
                            editName = "edit-date-naissance-animal";
                            break;
                        case "date-entree-animal":
                            inputType = "date";
                            propertyName = "date_entree";
                            editName = "edit-date-entree-animal";
                            break;
                        case "age-animal":
                            inputType = "number";
                            propertyName = "age_animal";
                            editName = "edit-age-animal";
                            break;
                        case "description-animal":
                            inputType = "textarea";
                            propertyName = "description_animal";
                            editName = "edit-description-animal";
                            break;
                    }
                    input = $("<input>").attr({"type": inputType, "class": "form-control form-control-sm", "value": tdVal});
                    $(clickedCell).empty();
                    $(clickedCell).append(input);
                    input.focus();
                    input.focusout(function(e) {
                        lostfocus = e.target;
                        val = addslashes(lostfocus.value);
                        postData = {[propertyName]: val, id_animal: idAnimal, [editName]:""};
                        $(this).parent().load("AJAXAnswerAdminAnimaux.php", postData);
                    })
                }
            })
        }
    })
}

//admin association
$(".admin-association").each(function(index, element) {
    $(element).one("click", function(e) {
        e.preventDefault();
        let clickedElement = e.target;
        let elementVal = $(this).html();
        let elementName = $(this).attr("name");
       // console.log(elementName);
        switch(elementName) {
        case "titre-association":
            var propertyName = "titre";
            var editName = "edit-titre-association";
            var appended = $("<input>").attr({type: "text", class: "form-control", value: elementVal});
            break;
        case "chapo-association":
            var propertyName = "chapo";
            var editName = "edit-chapo-association";
            var appended = $("<textarea>").attr({rows: 6, cols: 80}).html(elementVal);
            break;
        case "mission-association": 
            var propertyName = "mission";
            var editName = "edit-mission-association";
            var appended = $("<textarea>").attr({rows: 10, cols: 80}).html(elementVal);
            break;
        case "mail-association": 
            var propertyName = "mail";
            var editName = "edit-mail-association";
            var appended = $("<input>").attr({type: "text", class: "form-control", value: elementVal});
            break;
        case "facebook-association": 
            var propertyName = "facebook";
            var editName = "edit-facebook-association";
            var appended = $("<input>").attr({type: "text", class: "form-control", value: elementVal});
            break;
        case "telephone-association": 
            var propertyName = "telephone";
            var editName = "edit-telephone-association";
            var appended = $("<input>").attr({type: "text", class: "form-control", value: elementVal});
            break;
        case "adresse-association": 
            var propertyName = "adresse";
            var editName = "edit-adresse-association";
            var appended = $("<input>").attr({type: "text", class: "form-control", value: elementVal});
            break;
        case "jours-association": 
            var propertyName = "jours";
            var editName = "edit-jours-association";
            var appended = $("<input>").attr({type: "text", class: "form-control", value: elementVal});
            break;
        case "am-association": 
            var propertyName = "am";
            var editName = "edit-am-association";
            var appended = $("<input>").attr({type: "text", class: "form-control", value: elementVal});
            break;
        case "pm-association": 
            var propertyName = "pm";
            var editName = "edit-pm-association";
            var appended = $("<input>").attr({type: "text", class: "form-control", value: elementVal});
            break;
        }
        $(clickedElement).empty();
        $(clickedElement).append(appended);
        appended.focus();
        appended.focusout(function(e) {
            let lostfocus = e.target;
            let val = lostfocus.value;
            postData = {[propertyName]: val, [editName]:""};
            $(this).parent().load("AJAXAnswerAssociation.php", postData);
            // console.log(postData);
        })
    })
})

function allForAddAnimal() {
    rechercherEspecesAndRaces();
    rechercherRefuge();
    $("#form-admin-animal").submit(function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        // console.log(formData);
        $.ajax({
            url: "AJAXAnswerAdminAnimaux.php",
            type: 'POST',
            data: formData,
            async: true,
            success: function(response){
                console.log(response);
                displayTableauListeAnimaux(!setForAnimalAdd);
                $("#addAnimal").text("+");   

            },
            cache: false,
            contentType: false,
            processData: false,
            error: function(xhr, message, status) {
                console.log(message);
            }
        });
    })
}

allForAddTemoignage();

function allForAddTemoignage() {
    rechercherAdoptedByUtilisateur();
    $("#AddTemoignageForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "AJAXAnswerTemoignage.php",
            type: 'POST',
            data: formData,
            async: true,
            success: function(response){
                // console.log(response);  
                if(response == true) {
                    $("#affichage-temoignage").remove();
                    div = $("<div>").attr({class: "alert alert-success", role: "alert"}).html("Nous avons bien reçu votre témoignage. Il sera bientôt en ligne s'il est en accord avec notre charte de modération.")
                    $("#affichage-temoignage-parent").append(div);
                }   
            },
            cache: false,
            contentType: false,
            processData: false,
            error: function(xhr, message, status) {
                console.log(message);
            }
        });
    })
}

function rechercherRefuge() {
    var p = rechercher("AJAXAnswerAdminAnimaux.php?refuges=");
        p.done(function(resultat) {
            tab=JSON.parse(resultat);
           // console.log(tab);
            $('#select-refuge').empty();
            afficherRefuges(tab);
        });
        p.fail(function(resultat) {
            var error = resultat;
            console.log(error);
        });
}

function rechercherEspeces() {
    var p = rechercher("AJAXAnswerAdminAnimaux.php?especes=");
        p.done(function(resultat) {
            tab=JSON.parse(resultat);
         //   console.log(tab);
            $('#select-espece').empty();
            afficherEspeces(tab);
        });
        p.fail(function(resultat) {
            var error = resultat;
            console.log(error);
        });
}

function rechercherRaces(searchedEspeceId) {
    var p = rechercher("AJAXAnswerAdminAnimaux.php?racesOfEspece=" + searchedEspeceId);
        p.done(function(resultat) {
            tab=JSON.parse(resultat);
        //    console.log(tab);
            $('#select-race').empty();
            afficherRaces(tab);
        });
        p.fail(function(resultat) {
            var error = resultat;
            console.log(error);
        });
}

function rechercherEspecesAndRaces() {
    var p = rechercher("AJAXAnswerAdminAnimaux.php?especes=");
        p.done(function(resultat) {
            tab=JSON.parse(resultat);
            $('#select-espece').empty();
            afficherEspeces(tab);
            $("#select-espece").change(function(e){
                var searchedEspeceId = $("#select-espece").val();
                var p = rechercher("AJAXAnswerAdminAnimaux.php?racesOfEspece=" + searchedEspeceId);
                    p.done(function(resultat) {
                        tab = JSON.parse(resultat);
                        $('#select-race').empty();
                        afficherRaces(tab);
                    });
                    p.fail(function(resultat) {
                        var error = resultat;
                        console.log(error);
                    });
            })
        p.fail(function(resultat) {
            var error = resultat;
            console.log(error);
        });
    })
}

rechercherAdoptedByUtilisateur();

function rechercherAdoptedByUtilisateur() {
    var r = rechercher("AJAXAnswerUtilisateur.php?idUser=");
    r.done(function(resultat) {
        if(resultat) {
            console.log(resultat);
            idUtilisateur = resultat;
            var p = rechercher("AJAXAnswerAdoption.php?adoptedBy=" + idUtilisateur);
            p.done(function(resultat) {
                tab = JSON.parse(resultat);
                $('#select-animal-adopte').empty();
                afficherAdoptedBy(tab);
            });
            p.fail(function(resultat) {
                var error = resultat;
                console.log(error);
            });
        }
    })
    r.fail(function(resultat) {
        var error = resultat;
        console.log(error);
    });
}

function rechercher(url) {
    var d = $.Deferred();
    $.ajax({
        url: url,
        success: function(resultat) {
            d.resolve(resultat);
        },
        error: function() {
            d.reject("Erreur !");
        }
    })
    return d.promise();
}

function afficherEspeces(tab) {
    selected = $("<option>").attr("id", "Especes").attr("selected","selected").html("Espèce");
    $("#select-espece").append(selected);
    for(i=0; i<tab.length; i++) {
        var objetsVar =  tab[i].espece;
        option = $("<option>").attr({"id": objetsVar, "value": tab[i].id_espece}).html(objetsVar);      
        $("#select-espece").append(option);
    }
}

function afficherRefuges(tab) {    
    selected = $("<option>").attr("id", "Refuge").attr("selected","selected").html("Refuge");
    $("#select-refuge").append(selected);
    for(i=0; i<tab.length; i++) {
        var objetsVar =  tab[i].nom_refuge;
        option = $("<option>").attr({"id": objetsVar, "value":tab[i].id_refuge}).html(objetsVar);      
        $("#select-refuge").append(option);
    }
}

function afficherRaces(tab) {
    selected = $("<option>").attr("id", "Races").attr("selected","selected").html("Race");
    $("#select-race").append(selected);
    for(i=0; i<tab.length; i++) {
        var objetsVar =  tab[i].race;
        option = $("<option>").attr({"id": objetsVar, "value":tab[i].id_race}).html(objetsVar);
        $("#select-race").append(option);
    }
}

function afficherAdoptedBy(tab) {
    selected = $("<option>").attr("id", "Animal").attr("selected","selected").html("Votre animal adopté");
    $("#select-animal-adopte").append(selected);
    for(i=0; i<tab.length; i++) {
        var objetsVar =  tab[i].nom_animal;
        option = $("<option>").attr({"id": objetsVar, "value":tab[i].id_animal}).html(objetsVar);
        $("#select-animal-adopte").append(option);
    }
}

function createAddAnimalBtn() {
    var postBtn = $("<input>").attr({"id":"btn-add-animal", "class":"btn btn-success", "value":"+", "type":"submit", "form":"form-admin-animal"});
    var namePostBtn = $("<input>").attr({"name":"add-animal","type":"hidden", "form":"form-admin-animal"});
    $("#row-form-admin-animal").append(namePostBtn);
    $("#row-form-admin-animal").append(postBtn);
}

function getNameOfPic() {
    $("#photo").change(function(e){
        nomPhoto=($("#photo")[0].files[0]).name;
        console.log(nomPhoto);
        var input = $("<input>").attr({"name":"nom-photo","type":"hidden", "form":"form-admin-animal", "value":nomPhoto});
        $("#row-form-admin-animal").append(input);
    })
}

function loadPagination(pageSize) {
  //  console.log("pagination");
    var pageCount =  $(".line-content").length / pageSize;
    
    if(pageCount > 1) {
        var nav = $("<nav>").attr({"class" : "text-center", "aria-label" : "text-secondary"});
        var ul = $("<ul>").addClass("list-unstyled d-inline-flex");
        nav.append(ul);
        for(var i = 0 ; i<pageCount;i++){
            ul.append('<li class="page-item"><a class="page-link" href="#">'+(i+1)+'</a></li> ');
            $("#pagin").append(nav);
        }

        $("#pagin li").first().find("a").addClass("current")
        showPage = function(page) {
            $(".line-content").hide();
            $(".line-content").each(function(n) {
                if (n >= pageSize * (page - 1) && n < pageSize * page)
                    $(this).show();
            });        
        }
        
        showPage(1);

        $("#pagin li a").click(function() {
            $("#pagin li a").removeClass("current");
            $(this).addClass("current");
            showPage(parseInt($(this).text())) 
        });
    }
}

//DEBUT scripts affichage liste de stats admin
//Affichage du tableau a l'ouverture de la page

$("#tableauStatsAdmin").ready(function() {

    var name = $("#tableauStatsAdmin").attr("name");
    var data = {page : ''+name+''};
    rechercherStats(data);
});

//function de rechercher/affichage
function rechercherStats(data) {
 
    $("#tableauStatsAdmin").load("tableauListeStats.php",data,function( response, status, xhr ) {
        if ( status == "error" ) {
        var msg = "Sorry but there was an error: ";
        $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
        }
        loadPagination(10);
        //Pagination
        $('#pagination li a').click(function(e) {
            clickedCell = e.target;
            var pages = $(this).attr("href");
            var name = $(this).attr("name");
            var data = {page : ''+name+''};
            var p = pagination(data);
            p.done(function() {
            return;
            }).fail(function(error){
            console.log("erreur de maj");
            });
               
        });

        //modificication des cellulles en inpt txt on clic
        $('td').click(function(e) {
            clickedCell = e.target;
            var row_index = $(this).parent().index('tr');
            var col_index = $(this).index('tr:eq('+row_index+') td');
            var tdClass = $(this).attr("class");
            if (tdClass == "Manuelle") {
                var tdVal = $(this).html();
                var tdId = $(this).attr("id");
                var tdName = $(this).attr("name");
                var tdClass = $(this).attr("class");
                var iptType = '<input>';
                if (tdName == "nom_statistique") {
                    var tdType = "texte";
                }
                if (tdName == "derniere_edition_statistique") {
                    var tdType = "date";
                }
                if (tdName == "chiffres_statistique") {
                    var tdType = "number";
                }
                if (tdName == "type_gestion_statistique") {
                    if(tdVal=="Manuelle") {
                        var data = {majStats : ''+tdId+''};
                        eval("data." + tdName + " = '0'");
                        
                       // console.log(data);
                        var s = majStats(data);
                        s.done(function(data) {
                            var data = {none : "none"};
                           rechercherStats(data);
                        }).fail(function(error){
                            console.log("erreur de maj");
                            rechercherStats();
                        });
                    } 
                } else if (tdName == "delete") {
                    var data = {delStats : ''+tdId+''};
                    var d = majStats(data);
                    d.done(function(data) {
                        var data = {none : "none"};
                       rechercherStats(data);
                       return;
                    }).fail(function(error){
                        console.log("erreur de maj");
                    });
                } else if (tdName == "afficher_statistique") {
                    if(tdVal=="AFFICHER") {
                        var data = {majStats : ''+tdId+''};
                        eval("data." + tdName + " = '1'");
                        
                    } else {
                        var data = {majStats : ''+tdId+''};
                        eval("data." + tdName + " = '0'");
                    }
                  //  console.log(data);
                    var s = majStats(data);
                    s.done(function(data) {
                    var data = {none : "none"};
                        rechercherStats(data);
                    }).fail(function(error){
                        console.log("erreur de maj");
                    });
                } else {
                    ipt = $(iptType).attr("type",tdType).attr("id",tdId).attr("class","form-control form-control-sm").val(tdVal);
                    clickedCell.innerHTML = ""; //vide el td
                    $(this).append(ipt);
                    ipt.focus();// place le curseur
                    ipt.focusout(function(e) {
                    lostfocus = e.target;
                    val = addslashes(lostfocus.value);
                    lostfocus.parentNode.innerHTML = val;
                    var data = {majStats : ''+tdId+''};
                    eval("data." + tdName + " = '" + val + "'");
                    var s = majStats(data);
                    s.done(function(data) {
                        var data = {none : ""};
                        rechercherStats(data);
                    }).fail(function(error){
                    console.log("erreur de maj");
                    });
                
                    });
                }
            } 
        })
       
        //retrait du bouton "+"
        $('#newStats').click(function(e){;
            var data = {addStats : ""};
            rechercherStats(data);
        });

        //Ajout du bouton "+" et de la nouvelle stats
        $('#sendNewStat').click(function(){
            var de = $("#derniere_edition_statistique").val();
            var ns = $("#nom_statistique").val();
            var cs = $("#chiffres_statistique").val();
            var tgs = $("#type_gestion_statistique").val();
            var as = $("#afficher_stats").val();
            var data = {sendNewStat : "", derniere_edition_statistique : ''+de+'', nom_statistique : ns,  chiffres_statistique : cs, type_gestion_statistique : tgs, afficher_stats :as};
            var d = ajoutStats(data);
            d.done(function(data) {
               
                rechercherStats();
            }).fail(function(error){
                console.log("erreur d'ajout");
                rechercherStats();
            });      
        });
    });
};

function majStats(data) {
    //console.log("recu");
    var s = $.Deferred();
    $.ajax({
        type: "POST",
        url: "tableauListeStats.php",
        data: data,
        success : function(reponse) {
            s.resolve(reponse);       
        },
        error : function(xhr,errorStatus,errorText) {
            alert('Erreur detectée lors de l\'appel ajax');
            s.reject($errorText);
        }
    });
return s.promise();
}

function ajoutStats(data) {
  //  console.log("ajoutStats");
  //  console.log(data);
    var d = $.Deferred();
    $.ajax({
        type: "POST",
        url: "tableauListeStats.php",
        data: data,
        success : function(reponse) {
            d.resolve();       
        },
        error : function(xhr,errorStatus,errorText) {
            alert('Erreur detectée lors de l\'appel ajax');
            d.reject($errorText);
        }
    });
return d.promise();
}

//FIN scripts affichage liste de stats admin

//DEBUT scripts adopter.php
$("#ListeAnimaux").ready(function() {
  var data = {searchAdopter : ''};

    searchAdoper(data);
});
$(".resetTags").click(function() {
    if($(".tagEspece").is(':visible')) { $(".tagEspece").remove(); };
    if($(".tagRace").is(':visible')) { $(".tagRace").remove(); };
    if($(".tagSexe").is(':visible')) { $(".tagSexe").remove(); }; 
    if($(".tagHandicap").is(':visible')) { $(".tagHandicap").remove(); };
    if($(".tagAge").is(':visible')) { $(".tagAge").remove(); };
    if($(".tagRefuge").is(':visible')) { $(".tagRefuge").remove(); };
    $("select")
    searchAdoper()
})
$("select")
    .change(function() {
        //GESTION ESPECES
        if($(this).attr('name') == "espece") {
           // CREATION DU TAG ou update
            if($(".tagEspece").is(':visible')) {
               //console.log($(this).children(":selected").attr("id"));
                if($(this).children(":selected").attr("id") == "Especes") {
                    $(".tagEspece").remove();
                } else {
                    $(".tagEspece").html($(this).children(":selected").attr("id"));
                }
               // $(".tagEspece").html($(this).children(":selected").attr("id")); 
                if($(".tagRace").is(':visible')) { $(".tagRace").remove(); };
                if($(".tagSexe").is(':visible')) { $(".tagSexe").remove(); }; 
                if($(".tagHandicap").is(':visible')) { $(".tagHandicap").remove(); };
                if($(".tagAge").is(':visible')) { $(".tagAge").remove(); };
                if($(".tagRefuge").is(':visible')) { $(".tagRefuge").remove(); };
           } else {
                tag = $('<div>').attr("id", "espece").attr("class", "m-2 p-2 border border-dark offset-1 rounded tagEspece").html($(this).children(":selected").attr("id"));
                $('#rowTags').append(tag);
           }

           searchAdoper()
        } 


        //POUR LES RACE
        if($(this).attr('name') == "race") {
           // CREATION DU TAG
            if($(this).children(":selected").attr("id") == "Races") {
                $(".tagRace").remove();
                searchAdoper();
            return;
            } 
            if($(".tagRace").is(':visible')) {
                $(".tagRace").html($(this).children(":selected").attr("id")); 
           // console.log($(this).children(":selected").attr("id"));
            } else {
                tag = $('<div>').attr("id", "race").attr("name", $(this).children(":selected").attr("name")).attr("class", "m-2 p-2 border border-dark offset-1 rounded tagRace").html($(this).children(":selected").attr("id"));
                $('#rowTags').append(tag);
            }

            searchAdoper()
        } 


        //POUR LE SEXE
        if($(this).attr('name') == "sexe") {
            // CREATION DU TAG
            if($(this).children(":selected").attr("id") == "Sexe") {
                $(".tagSexe").remove();
                searchAdoper();
                return;
            }
            if($(".tagSexe").is(':visible')) {
                $(".tagSexe").html($(this).children(":selected").attr("id")); 
            } else {
                tag = $('<div>').attr("id", "sexe_animal").attr("name", $(this).children(":selected").attr("name")).attr("class", "m-2 p-2 border border-dark offset-1 rounded tagSexe").html($(this).children(":selected").attr("id"));
                $('#rowTags').append(tag);    
            }  

             searchAdoper()
         } 

         //POUR LE HANDICAP
        if($(this).attr('name') == "handicap") {
            // CREATION DU TAG
            if($(this).children(":selected").attr("id") == "HandicapNon") {
                $(".tagHandicap").remove();
                searchAdoper();
                return;
            }
            if($(".tagHandicap").is(':visible')) {
                $(".tagHandicap").html($(this).children(":selected").attr("id")); 
            } else {
                tag = $('<div>').attr("id", "handicap_animal").attr("class", "m-2 p-2 border border-dark offset-1 rounded tagHandicap").html($(this).children(":selected").attr("id"));
                $('#rowTags').append(tag);      
            }            
 
            searchAdoper()
        } 

         //POUR L AGE
        if($(this).attr('name') == "age") {
            // CREATION DU TAG
            if($(this).children(":selected").attr("id") == "Age max") {
                $(".tagAge").remove();
                searchAdoper();
                return;
            }
            if($(".tagAge").is(':visible')) {
                $(".tagAge").attr("name", $(this).children(":selected").val()).html("Moins de " + $(this).children(":selected").val() + " ans");
            } else {
                tag = $('<div>').attr("id", "age_animal").attr("name", $(this).children(":selected").val()).attr("class", "m-2 p-2 border border-dark offset-1 rounded tagAge").html("Moins de " + $(this).children(":selected").val() + " ans");
                $('#rowTags').append(tag);     
            }
   
             searchAdoper();
        } 

         //POUR LES REFUGES
         if($(this).attr('name') == "refuge") {
            // CREATION DU TAG
            if($(this).children(":selected").attr("id") == "Refuge") { 
                $(".tagRefuge").remove();
                searchAdoper();
                return;
            }
            if($(".tagRefuge").is(':visible')) {
                $(".tagRefuge").html($(this).children(":selected").val());       
            } else {
                tag = $('<div>').attr("id", "nom_refuge").attr("class", "m-2 p-2 border border-dark offset-1 rounded tagRefuge").html($(this).children(":selected").attr("id"));
                 $('#rowTags').append(tag);              
            }

             searchAdoper();
        } 
       

    });

function searchAdoper() {
    var rowTags = $("#rowTags div");
    var data = {searchAdopter : ''};

    for(i=0; i<rowTags.length; i++) {
        var tagId =  rowTags[i].id;
        var tagVal =  addslashes(rowTags[i].innerHTML);
        if(tagId == "handicap_animal") {
            tagVal = "1";
        }
        if(tagId == "age_animal") {
            //alert(tagVal.replace(new RegExp("[^(0-9)]", "g"), ''));
            var tagVal = tagVal.replace(new RegExp("[^(0-9)]", "g"), '');
        }
        eval("data." + tagId + " = '" + tagVal + "'");
    }
   // console.log(data)
    // Ici creer la fonction de recherche Ajax
    // affichageAdopter(data)
    $("#ListeAnimaux").load("AJAXAnswerAdopter.php",data,function( response, status, xhr ) {
        loadPagination(10);
        addOrRemoveFav();
        if ( status == "error" ) {
            var msg = "Sorry but there was an error: ";
            $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
        }
    });
}

addOrRemoveFav();

function addOrRemoveFav() {
    $(".fav").each(function(index, element) {
        $(element).click(function(e) {
            e.preventDefault();
            p = isConnected("AJAXAnswerFavori.php?is-connected=");
            p.done(function(resultat) {
                if(resultat == "connected") {
                    let idAnimal = $(element).data("idanimal");
                    if($(element).find("i").attr("class").includes("fas")) {
                        paramDisplay(element, "fas fa-heart fa-2x", "far fa-heart fa-2x");
                        var postName = "remove-favori";
                    } else {
                        paramDisplay(element, "far fa-heart fa-2x", "fas fa-heart fa-2x");
                        var postName = "add-favori";
                    }   
                    $.post({
                        url: "AJAXAnswerFavori.php",
                        data: {[postName]: "", "id-animal": idAnimal},
                        success: function(response) {
                        // console.log(response);
                        },
                        error: function(xhr, message, status) {
                        // console.log(message);
                        }
                    })
                } 
                else {
                    $(".modal").removeAttr("style");
                    $(".modal_close-bar").click(function(e) {
                        $(".modal").attr("style", "display: none");
                    })
                }
            });
            p.fail(function(resultat) {
                var error = resultat;
                console.log(error);
            });
        })
    })
}

function isConnected(url) {
    var d = $.Deferred();
    $.ajax({
        url: url,
        success: function(resultat) {
            d.resolve(resultat);
        },
        error: function() {
            d.reject("Erreur !");
        }
    })
    return d.promise();
}

function paramDisplay(element, previousClass, newClass) {
    $(element).find("i").removeClass(previousClass);
    $(element).find("i").addClass(newClass);
}


function affichageAdopter(data) {
    var p = $.Deferred();
    $.ajax({
        type: "POST",
        url: "AJAXAnswerAdopter.php",
        data: data,
        success : function(reponse) {
         // console.log(reponse);
          p.resolve();     
        },
        error : function(xhr,errorStatus,errorText) {
            p.reject($errorText); 
        }
    });
    return p.promise()
}

function addslashes(chaine) { 
    chaine = chaine.replace(/\\/g,"\\\\");
    chaine = chaine.replace(/\'/g,"\\'"); 
    chaine = chaine.replace(/\"/g,"\\\""); 
    return chaine;
}



//FIN scripts adopter.php


//DEBUT scripts affichage liste temoignages admin
//Affichage du tableau a l'ouverture de la page

$("#tableauTemoignageAdmin").ready(function() {
    //console.log("Oo");
    var name = $("#tableauTemoignageAdmin").attr("name");
    var data = {page : ''+name+''};
    rechercherTemoignages(data);
});

//function de rechercher/affichage
function rechercherTemoignages(data) {
 
    $("#tableauTemoignageAdmin").load("tableauListeTemoignages.php",data,function( response, status, xhr ) {
        if ( status == "error" ) {
        var msg = "Sorry but there was an error: ";
        $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
        }
        loadPagination(10);
        //Pagination
        $('#pagination li a').click(function(e) {
            clickedCell = e.target;
            var pages = $(this).attr("href");
            var name = $(this).attr("name");
            var data = {page : ''+name+''};
            var p = pagination(data);
            p.done(function() {
            return;
            }).fail(function(error){
            console.log("erreur de maj");
            });
               
        });

        //modificication des cellulles en inpt txt on clic
        $('td').click(function(e) {
            clickedCell = e.target;
            var row_index = $(this).parent().index('tr');
            var col_index = $(this).index('tr:eq('+row_index+') td');
            var tdClass = $(this).attr("class");
            if (tdClass == "Manuelle") {
                var tdVal = addslashes($(this).html());
                var tdId = $(this).attr("id");
                var tdName = $(this).attr("name");
                var tdClass = $(this).attr("class");
                var iptType = '<input>';
                if (tdName == "nom_animal") {
                    var tdType = "texte";
                }
                if (tdName == "date_adoption") {
                    var tdType = "date";
                }
               if (tdName == "delete") {
                    var data = {delTemoignages : ''+tdId+''};
                    var d = majTemoignages(data);
                    d.done(function(data) {
                        var data = {none : "none"};
                       rechercherTemoignages(data);
                       return;
                    }).fail(function(error){
                        console.log("erreur de maj");
                    });
                } else if (tdName == "afficher") {
                    if(tdVal=="AFFICHER") {
                        var data = {majTemoignages : ''+tdId+''};
                        eval("data." + tdName + " = '1'");
                        
                    } else {
                        var data = {majTemoignages : ''+tdId+''};
                        eval("data." + tdName + " = '0'");
                    }
                   // console.log(data);
                    var s = majTemoignages(data);
                    s.done(function(data) {
                    var data = {none : "none"};
                        rechercherTemoignages(data);
                    }).fail(function(error){
                        console.log("erreur de maj");
                    });
                } else {
                    ipt = $(iptType).attr("type",tdType).attr("id",tdId).attr("class","form-control form-control-sm").val(tdVal);
                    clickedCell.innerHTML = ""; //vide el td
                    $(this).append(ipt);
                    ipt.focus();// place le curseur
                    ipt.focusout(function(e) {
                    lostfocus = e.target;
                    val = addslashes(lostfocus.value);
                    lostfocus.parentNode.innerHTML = val;
                    var data = {majTemoignages : ''+tdId+''};
                    eval("data." + tdName + " = '" + val + "'");
                    var s = majTemoignages(data);
                    s.done(function(data) {
                        var data = {none : ""};
                        rechercherTemoignages(data);
                    }).fail(function(error){
                    console.log("erreur de maj");
                    });
                
                    });
                }
            } 
        })

    });
};


function majTemoignages(data) {
  //  console.log("recu" + data);
    var s = $.Deferred();
    $.ajax({
        type: "POST",
        url: "tableauListeTemoignages.php",
        data: data,
        success : function(reponse) {
            //console.log(reponse);
            s.resolve(reponse);       
        },
        error : function(xhr,errorStatus,errorText) {
            console.log('Erreur detectée lors de l\'appel ajax');
            s.reject($errorText);
        }
    });
return s.promise();
}

//FIN scripts affichage liste de temoignages admin

//DEBUT scripts affichage liste preventions admin
//Affichage du tableau a l'ouverture de la page

$("#tableauPreventionsAdmin").ready(function() {
    //console.log("Oo");
    var name = $("#tableauPreventionsAdmin").attr("name");
    var data = {page : ''+name+''};
    rechercherPreventions(data);
});

//function de rechercher/affichage
function rechercherPreventions(data) {
 
    $("#tableaupreventionsAdmin").load("tableauListePreventions.php",data,function( response, status, xhr ) {
        if ( status == "error" ) {
        var msg = "Sorry but there was an error: ";
        $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
        }
        loadPagination(10);
        //Pagination
        $('#pagination li a').click(function(e) {
            clickedCell = e.target;
            var pages = $(this).attr("href");
            var name = $(this).attr("name");
            var data = {page : ''+name+''};
            var p = pagination(data);
            p.done(function() {
            return;
            }).fail(function(error){
            console.log("erreur de maj");
            });
               
        });

        //modificication des cellulles en inpt txt on clic
        $('td').click(function(e) {
            clickedCell = e.target;
            var row_index = $(this).parent().index('tr');
            var col_index = $(this).index('tr:eq('+row_index+') td');
            var tdClass = $(this).attr("class");
            if (tdClass == "Manuelle") {
                var tdVal = $(this).html();
                var tdId = $(this).attr("id");
                var tdName = $(this).attr("name");
                var tdClass = $(this).attr("class");
                var iptType = '<input>';
                if (tdName == "nom_prevention") {
                    var tdType = "texte";
                }
                if (tdName == "date_ajout_prevention") {
                    var tdType = "date";
                }
                if (tdName == "texte_prevention") {
                    var tdType = "textarea";
                }
                
               if (tdName == "delete") {
                    var data = {delPreventions : ''+tdId+''};
                    var d = majPreventions(data);
                    d.done(function(data) {
                        var data = {none : "none"};
                       rechercherPreventions(data);
                       return;
                    }).fail(function(error){
                        console.log("erreur de maj");
                    });
                 } else {
                    ipt = $(iptType).attr("type",tdType).attr("id",tdId).attr("class","form-control form-control-sm").val(tdVal);
                    clickedCell.innerHTML = ""; //vide el td
                    $(this).append(ipt);
                    ipt.focus();// place le curseur
                    ipt.focusout(function(e) {
                    lostfocus = e.target;
                    val = addslashes(lostfocus.value);
                    lostfocus.parentNode.innerHTML = val;
                    var data = {majPreventions : ''+tdId+''};
                    eval("data." + tdName + " = '" + addslashes(val) + "'");
                    var s = majPreventions(data);
                    s.done(function(data) {
                        var data = {none : ""};
                        rechercherPreventions(data);
                    }).fail(function(error){
                    console.log("erreur de maj");
                    });
                
                    });
                }
            } 
        })
         //retrait du bouton "+"
         $('#newPreventions').click(function(e){;
           // console.log("clic");
            var data = {addPrevention : ""};
            rechercherPreventions(data);
        });

        //Ajout du bouton "+" et de la nouvelle stats
        $('#sendNewPreventions').click(function(e){
            var formData = new FormData($("#form-admin-prevention")[0]);
        //    console.log(formData);
            var d = ajoutPrevention(formData);
            d.done(function(data) {
                rechercherPreventions();
            }).fail(function(error){
                console.log("erreur d'ajout");
                rechercherPreventions();
            });      
        });
    });
};


function majPreventions(data) {
    //console.log("recu" + data);
    var s = $.Deferred();
    $.ajax({
        type: "POST",
        url: "tableauListePreventions.php",
        data: data,
        success : function(reponse) {
            //console.log(reponse);
            s.resolve(reponse);       
        },
        error : function(xhr,errorStatus,errorText) {
            console.log('Erreur detectée lors de l\'appel ajax');
            s.reject($errorText);
        }
    });
return s.promise();
}

function ajoutPrevention(data) {
   // console.log("ajoutPrevention");
   // alert(data);
    var d = $.Deferred();
    $.ajax({
        type: "POST",
        url: "tableauListePreventions.php",
        data: data,
        async: true,
        success : function(reponse) {
            d.resolve();       
        },
        cache: false,
        contentType: false,
        processData: false,
        error : function(xhr,errorStatus,errorText) {
            console.log('Erreur detectée lors de l\'appel ajax');
            d.reject($errorText);
        }
    });
return d.promise();
}
//FIN scripts affichage liste de prevention admin

//DEBUT scripts Admin user
//Affichage du tableau a l'ouverture de la page

$("#tableaUsersAdmin").ready(function() {
    //console.log("Oo");
    var name = $("#tableauUsersAdmin").attr("name");
    var data = {page : ''+name+''};
    rechercherUsers(data);
});

//function de rechercher/affichage
function rechercherUsers(data) {
 
    $("#tableauUsersAdmin").load("tableauListeUsers.php",data,function( response, status, xhr ) {
        if ( status == "error" ) {
        var msg = "Sorry but there was an error: ";
        $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
        }
        loadPagination(10);
        //Pagination
        $('#pagination li a').click(function(e) {
            clickedCell = e.target;
            var pages = $(this).attr("href");
            var name = $(this).attr("name");
            var data = {page : ''+name+''};
            var p = pagination(data);
            p.done(function() {
            return;
            }).fail(function(error){
            console.log("erreur de maj");
            });
               
        });

        //modificication des cellulles en inpt txt on clic
        $('td').click(function(e) {
            clickedCell = e.target;
            var row_index = $(this).parent().index('tr');
            var col_index = $(this).index('tr:eq('+row_index+') td');
            var tdClass = $(this).attr("class");
            if (tdClass == "Manuelle") {
                var tdVal = $(this).html();
                var tdId = $(this).attr("id");
                var tdName = $(this).attr("name");
                var tdClass = $(this).attr("class");
                var iptType = '<input>';
               
               if (tdName == "delete") {
                    var data = {delUsers : ''+tdId+''};
                    var d = majUsers(data);
                    d.done(function(data) {
                        var data = {none : "none"};
                       rechercherUsers(data);
                       return;
                    }).fail(function(error){
                        console.log("erreur de maj");
                    });
                 } else if (tdName == "grade") {
                     //console.log(tdName + " " + tdVal  + " 4");
                    if(tdVal=="Nommer Admin") {
                        var data = {majUsers : ''+tdId+''};
                        eval("data." + tdName + " = 'admin'");
                        var d = majUsers(data);
                        d.done(function(data) {
                            var data = {none : "none"};
                           rechercherUsers(data);
                           return;
                        }).fail(function(error){
                            console.log("erreur de maj");
                        });
                                             
                    } else {
                        var data = {majUsers : ''+tdId+''};
                        eval("data." + tdName + " = 'user'");
                        var d = majUsers(data);
                        d.done(function(data) {
                            var data = {none : "none"};
                           rechercherUsers(data);
                           return;
                        }).fail(function(error){
                            console.log("erreur de maj");
                        });
                        
                    }
                } else {
                    ipt = $(iptType).attr("type",tdType).attr("id",tdId).attr("class","form-control form-control-sm").val(tdVal);
                    clickedCell.innerHTML = ""; //vide el td
                    $(this).append(ipt);
                    ipt.focus();// place le curseur
                    ipt.focusout(function(e) {
                    lostfocus = e.target;
                    val = addslashes(lostfocus.value);
                    lostfocus.parentNode.innerHTML = val;
                    var data = {majUsers : ''+tdId+''};
                    eval("data." + tdName + " = '" + addslashes(val) + "'");
                    var s = majUsers(data);
                    s.done(function(data) {
                        var data = {none : ""};
                        rechercherUsers(data);
                    }).fail(function(error){
                    console.log("erreur de maj");
                    });
                
                    });
                 }
            } 
        })

    });
};



function majUsers(data) {
    //console.log("recu" + data);
    var s = $.Deferred();
    $.ajax({
        type: "POST",
        url: "tableauListeUsers.php",
        data: data,
        success : function(reponse) {
            //console.log(reponse);
            s.resolve(reponse);       
        },
        error : function(xhr,errorStatus,errorText) {
            console.log('Erreur detectée lors de l\'appel ajax');
            s.reject($errorText);
        }
    });
return s.promise();
}
//FIN scripts affichage liste de prevention admin

//Opti fonction de recherches input keyup
$("input").keyup(function() {
    var iptValue = this.value;
    var iptName = this.id;
  
    //pour la searchUserS
    if(iptName == "searchUsers") {
        //console.log(iptValue);
        var data = {searchUsers : ""};
        eval("data." + iptName + " = '" + iptValue + "'");
        rechercherUsers(data);
    }

    //pour la searchPreventions
    if(iptName == "searchPreventions") {
        //console.log(iptValue);
        var data = {searchTemoignages : ""};
        eval("data." + iptName + " = '" + iptValue + "'");
        rechercherPreventions(data);
    }

    //Pour la searchTemoignages
    if(iptName == "searchTemoignages") {
        //  console.log(iptValue);
          var data = {searchTemoignages : ""};
          eval("data." + iptName + " = '" + iptValue + "'");
          rechercherTemoignages(data);
    }

    //pour la searchStats
    if(iptName == "searchStats") {
        var data = {searchStats : ""};
        eval("data." + iptName + " = '" + iptValue + "'");
        rechercherStats(data);
    }

    //pour la searchAnimaux
    if(iptName == "searchAnimaux") {
        var data = {searchAnimaux : ""};
        eval("data. nom_animal = '" + iptValue + "'");
        //rechercherAnimaux(data);
        //console.log(data);
        setForAnimalAdd = false;
        if(iptValue != "") {
            //console.log("Oo");
        displayTableauListeAnimaux(setForAnimalAdd, iptValue);
        } else {
            displayTableauListeAnimaux(setForAnimalAdd);
        }
    }

    //pour la animauxListSearch
    if(iptName == "animauxListSearch") {
        var data = {searchAnimaux : ""};
        eval("data. nom_animal = '" + iptValue + "'");
        //rechercherAnimaux(data);
        //console.log(data);
        setForAnimalAdd = false;
        if(iptValue != "") {
            animauxListSearch(iptValue)   
        } else {
            $("#animauxListResults").attr("hidden", "");
            console.log("Oo");
        }
    }

    if(iptName == "usersListSearch") {
       // var data = {searchUsers : ""};
        //eval("data. nom_animal = '" + iptValue + "'");
        var data = {searchUsers : ""};
        eval("data. searchUsers = '" + iptValue + "'");
        //rechercherAnimaux(data);
        console.log(data);
        if(iptValue != "") {
            userListSearch(data)   
        } else {
            $("#usersListResults").attr("hidden", "");
            console.log("Oo");
        }
    }

    //form contact verification si non = prenom
    $(this).removeClass("is-invalid");
    if(iptName == "prenomContact") {
        var iptValue = $(this).val();
        var nom = $('#nomContact').val();
       // console.log(iptValue + " = " + nom  + " ( " + iptName + " )");
        if(nom == iptValue) {
            $('#prenomContact').addClass("is-invalid");
            $('#prenom-feedback').text("Vous avez les mêmes nom et prenom ?");
        } else {
            $('#prenomContact').removeClass("is-invalid");
        }
    }
    if(iptName == "emailContact") {
        var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
        if(!email_regex.test(iptValue)){ 
            $('#emailContact').addClass("is-invalid");
            $('#email-feedback').text("Votre email est invalide.");
         }
    }

});



//textarea keyup
$("textarea").keyup(function() {
    var txtValue = this.value;
    var txtName = this.id;

    if(txtName == "messageContact") {
        var value = $(this).val();
        if(value.length < 100){ 
            $('#messageContact').addClass("is-invalid");
            $('#message-feedback').text(value.length + " Message trop court");
         } else {
            $('#messageContact').removeClass("is-invalid");
         }
    }


});


//validation du formulaire de contact
$("#contactForm").submit(function(e) {
    e.preventDefault();
    var nom = $('#nomContact').val();
    var prenom = $('#prenomContact').val();
    var email = $('#emailContact').val();
    var sujet = $('#sujetContact').val();
    var message = $('#messageContact').val();
    var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

  //robustesse JS
  if(nom == "") {
    $('#nomContact').addClass("is-invalid");
    $('#nom-feedback').innerHTML += "Champ requis. Merci d'indiquer votre nom. "
    return false; 
  } else if(prenom == "") {
    $('#prenomContact').addClass("is-invalid");
    $('#prenom-feedback').innerHTML += "Champ requis. Merci d'indiquer votre prénom. "
    return false; 
  } else if(email == "" || !email_regex.test(email)) {
    $('#emailContact').addClass("is-invalid");
    $('#email-feedback').innerHTML += "Champ requis. Merci d'indiquer un email valide. "
    return false; 
  } else if(sujet == "" || sujet.length < 10) {
    $('#sujetContact').addClass("is-invalid");
    $('#sujet-feedback').innerHTML += "Champ requis. Merci d'indiquer un sujet valide et de plus de 10 caractéres. "
    return false; 
  } else if(message == "" || message.length < 100) {
    $('#messageContact').addClass("is-invalid");
    $('#message-feedback').innerHTML += "Champ requis. Merci d'envoyer un message valide et de plus de 100 caractéres. "
    return false; 
  } else if(nom == prenom) {
    $('#prenomContact').addClass("is-invalid");
    $('#invalid-feedback').innerHTML += "Vous avez les mêmes nom et prenom ?"
    return false; 
  } else {
      //ici sera donc la validation et l'ajax
      var data = {contactBTN : ""};
      eval("data. prenom = '" + addslashes(prenom) + "'");
      eval("data. nom = '" + addslashes(nom) + "'");
      eval("data. email = '" + addslashes(email) + "'");
      eval("data. sujet = '" + addslashes(sujet) + "'");
      eval("data. message = '" + addslashes(message) + "'");
     // console.log(data);
      $.ajax({
        type: "POST",
        url: "AJAXAnswerContact.php",
        data: data,
        success : function(reponse) {
            $('#contactForm').remove(); // retrai du formulaire apres envois
            // mise en place de l'alerte de confirmation d'envois en palce et lieu du formulaire
            $('#nousEcrire').append('<div id="contactForm" class="alert alert-success">Merci d\'avoir pris le temps de nous contacter '+ reponse +'</div>');  
        },
        error : function(xhr,errorStatus,errorText) {
            console.log('Erreur detectée lors de l\'appel ajax');
        }
      });
  }

})

//fin form contact

//gestion des adoptions

$("button").click(function() {
    var btnValue = this.value;
    var btnId = this.id;

    if(btnId == "resetAdoption") {
        var value = $(this).val();
       // console.log("on reset")
        $("#animauxListSearch").val("");
        $("#animauxListSearch").removeAttr("hidden");
        $("#usersListSearch").val("");
        $("#usersListSearch").removeAttr("hidden");
        $("#validerAdoption").attr("hidden","");
        $("#resetAdoption").attr("hidden","");
        $("#animauxListResults").attr("hidden", "");
        $("#userListSearch").attr("hidden","");
    }
    if(btnId == "validerAdoption") {
        var data = {validAdoption : ""};
        var idA = $("#animauxListSearch").val();
        var idU = $("#usersListSearch").val();
        var date = new Date().toISOString().slice(0,10);;
        eval("data. id_animal = '" + idA + "'");
        eval("data. id_utilisateur = '" + idU + "'");
        eval("data. date_adoption = '" + date + "'");
        //console.log(data);
        if( $("#animauxListSearch").val() !="" &&  $("#usersListSearch").val() !="") {
            var s =  validAdoption(data);  
            s.done(function(datas) {
                //console.log(datas);
                var setForAnimalAdd = false;
                displayTableauListeAnimaux(setForAnimalAdd);
                $('#gestionAdoption').append('<div class="alert alert-success">Adoption bien enregistrée ' + datas +'</div>');  
                $("#animauxListSearch").val("");
                $("#animauxListSearch").removeAttr("hidden");
                $("#usersListSearch").val("");
                $("#usersListSearch").removeAttr("hidden");
                $("#validerAdoption").attr("hidden","");
                $("#resetAdoption").attr("hidden","");
                $("#animauxListResults").attr("hidden", "");
                $("#userListSearch").attr("hidden","");
            }).fail(function(error){
                console.log("erreur d'insert");
            });
        } else {
           
        }
    }


});

function animauxListSearch(data) {    
    $("#animauxListResults").load("AJAXAnswerAdoption.php?searchAnimaux="+data,function( response, status, xhr ) {
        if ( status == "error" ) {
        var msg = "Sorry but there was an error: ";
        $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
        }
        $("#resetAdoption").removeAttr("hidden");
        $("#animauxListResults").removeAttr("hidden");
        $(".resultAdoptionSearch").click(function() {
            var animalValue = this.value;
            var animalId = this.id;
            //$("#animauxListSearch").val(animalId);
            $(".resultAdoptionSearch").removeClass("bg-secondary");
            $(this).addClass("bg-secondary");
           // $("#animauxListSearch").focus();// place le curseur
            $("#animauxListSearch").val(animalId);
            $("#animauxListSearch").attr("hidden","");
           // console.log(animalId);
            //POUR LA SUITE //$("#animauxListResults").attr("hidden", "");
            if( $("#animauxListSearch").val() !="" &&  $("#usersListSearch").val() !="") {
                $("#validerAdoption").removeAttr("hidden");       
            } else {
                $("#validerAdoption").attr("hidden","");
            }
        });
    });    
}

function userListSearch(data) {    
    console.log("recu");
    $("#resetAdoption").removeAttr("hidden");
    $("#userListSearch").removeAttr("hidden");
    $("#userListSearch").load("AJAXAnswerAdoption.php",data,function( response, status, xhr ) {
        if ( status == "error" ) {
        var msg = "Sorry but there was an error: ";
        $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
        }
        console.log(response);
        $("#userListSearch").removeAttr("hidden");
        $(".resultAdoptionSearchUser").click(function() {
            var userValue = this.value;
            var userId = this.id;
            //$("#animauxListSearch").val(animalId);
            $(".resultAdoptionSearchUser").removeClass("bg-secondary");
            $(this).addClass("bg-secondary");
           // $("#animauxListSearch").focus();// place le curseur
            $("#usersListSearch").val(userId);
            $("#usersListSearch").attr("hidden","");
            console.log(userId);
            //POUR LA SUITE //$("#animauxListResults").attr("hidden", "");
            if( $("#animauxListSearch").val() != "" &&  $("#usersListSearch").val() != "") {
                $("#validerAdoption").removeAttr("hidden");       
            } else {
                $("#validerAdoption").attr("hidden","");
            }
        });
    });    
}

function validAdoption(data) { 
    console.log(data);  
     var d = $.Deferred();
     $.ajax({
         type: "POST",
         url: "AJAXAnswerAdoption.php",
         data: data,
         async: true,
         success : function(reponse) {
             d.resolve(reponse);       
         },
         cache: false,
         error : function(xhr,errorStatus,errorText) {
             console.log('Erreur detectée lors de l\'appel ajax');
             d.reject(errorText);
         }
     });
 return d.promise();
 }


//fingestiondeadoptions