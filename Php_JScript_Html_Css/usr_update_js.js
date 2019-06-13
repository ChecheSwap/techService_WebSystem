function cleartxts(txtname)
{
    var current;

    switch (txtname) {

        case ("ALIAS"):

            current = document.getElementById("txtcorreo");
            current.value = "";

            current = document.getElementById("txtcurp");
            current.value = "";

            current = document.getElementById("txtrfc");
            current.value = "";

            break;

        case("RFC"):

            current = document.getElementById("txtcorreo");
            current.value = "";

            current = document.getElementById("txtcurp");
            current.value = "";

            current = document.getElementById("txtalias");
            current.value = "";

            break;

        case("CURP"):

            current = document.getElementById("txtcorreo");
            current.value = "";

            current = document.getElementById("txtalias");
            current.value = "";

            current = document.getElementById("txtrfc");
            current.value = "";
            break;

        case("CORREO"):

            current = document.getElementById("txtalias");
            current.value = "";

            current = document.getElementById("txtcurp");
            current.value = "";

            current = document.getElementById("txtrfc");
            current.value = "";
            break;

        default:
            break;

    }
}