function ajax_request() {

    var curp = document.getElementById("txtcurp").value;

    if(curp.trim().length < 18){
        alert("-Formato de CURP Invalido.");
        return;
    }

    var collected = collect_table();

    switch (collected) {
        case 1: {
            alert("Orden sin productos!");
            return;
        }
        case 2: {
            alert("Datos Incorrectos: llene todos los datos de producto.");
            return;
        }
        case 3: {
            alert("Confirme Edicion de Producto.");
            return;
        }
    }


    try {
        var xdata = {'array_prods': collected, 'curp' : curp};

        var myregs = JSON.stringify(xdata);

        $.ajax({
            url: 'registro_orden_ajax.php',
            type: 'POST',
            data: {xdata: myregs},

            success: function (response) {

                console.log(response);

                if (!(response === "")) {

                    if(response.includes("FINALIZADO")){
                        alert("Se ha creado la orden de Servicio!");
                    }
                    else{
                        alert("*No se ha podido crear la Orden de servicio: \n "+response);
                    }
                }
            }
        });
    } catch (error) {
        alert(error)
    }
}


function collect_table() {

    var array_data = [];

    try {


        var rows = document.getElementById("makeEditable").rows;
        var filas = document.getElementById("makeEditable").rows.length;
        var cc = document.getElementById("makeEditable").rows[0].cells.length - 1;

        if (filas > 1) {

            array_data = new Array(filas);


            for (var x = 1; x < filas; ++x) {

                array_data[x] = new Array(cc);

                for (var y = 0; y < cc; ++y) {

                    array_data[x][y] = rows[x].cells[y].innerHTML;

                    if (array_data[x][y].trim() === "") {
                        return 2;
                    }

                    if (array_data[x][y].includes("value=")) {
                        return 3;
                    }
                }
            }
        } else {
            return 1;
        }
    } catch (error) {
        console.error(error);
    }

    return array_data;

}


$(function () {

    $('#makeEditable').SetEditable({$addButton: $('#but_add')});

    $('#submit_data').on('click', function () {
        var td = TableToCSV('makeEditable', ',');
        console.log(td);
        var ar_lines = td.split("\n");
        var each_data_value = [];
        for (i = 0; i < ar_lines.length; i++) {
            each_data_value[i] = ar_lines[i].split(",");
        }

        for (i = 0; i < each_data_value.length; i++) {
            if (each_data_value[i] > 1) {
                console.log(each_data_value[i][2]);
                console.log(each_data_value[i].length);
            }

        }

    });
});

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-36251023-1']);
_gaq.push(['_setDomainName', 'jqueryscript.net']);
_gaq.push(['_trackPageview']);

(function () {
    var ga = document.createElement('script');
    ga.type = 'text/javascript';
    ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ga, s);
})();

