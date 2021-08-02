
function showModal(id) {
    $.ajax({                        
        type: "GET",                 
        url: 'index.php?r=doctor%2Fdoctor&id='+id,                     
        success: function(data){
            var datos = JSON.parse(data);
            document.getElementById("nombre-doctor").innerHTML = datos['NAME_DOCTOR'] + ' ' + datos['LAST_DOCTOR'];  
            document.getElementById("consulta").innerHTML = datos['PLACE_DOCTOR'];      
            document.getElementById("rut").innerHTML = datos['RUT_DOCTOR'];   
            document.getElementById("telefono").innerHTML = datos['PHONE_DOCTOR'];   

            if(datos['SEX_DOCTOR'] == 0){
                document.getElementById("sexo").innerHTML = 'Masculino';   
            }
            else{
                document.getElementById("sexo").innerHTML = 'Femenino';   
            }
            
            $("#modal").modal();
        }
    });
}

let graf_actividad = document.getElementById('actividad');

if(graf_actividad){
    let activos = document.getElementsByClassName('activo')[0].value;
    let inactivos = document.getElementsByClassName('inactivo')[0].value;

    let actividad = new Chart(graf_actividad, {
        type: 'bar',
        data: {
            labels: ['Activos', 'Inactivos'],
            datasets: [{
                label: 'Activos vs Inactivos',
                data: [activos, inactivos],
                backgroundColor: [
                    '#0073e5',
                    '#D91E35'
                ],
                borderColor: [
                    '#0073e5',
                    '#D91E35'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

let graf_genero = document.getElementById('genero');

if(graf_genero){
    let masculino = document.getElementsByClassName('masculino')[0].value;
    let femenino = document.getElementsByClassName('femenino')[0].value;

    let genero = new Chart(graf_genero, {
        type: 'doughnut',
        data: {
            labels: ['Masculino', 'Femenino'],
            datasets: [{
                label: 'Masculino vs Femenino',
                data: [masculino, femenino],
                backgroundColor: [
                    '#6ab581',
                    '#7235AE'
                ],
                hoverOffset: 4
            }]
        }
    });
}


let graf_valores = document.getElementById('valores');

if(graf_valores){
    let key = document.getElementsByClassName('key');
    let valores = document.getElementsByClassName('valores');
    let key_graf = [];
    let valores_graf = [];

    for (i = 0; i < key.length; i++) {
        key_graf[i] = parseInt(key[i].value);
    }

    for (i = 0; i < valores.length; i++) {
        valores_graf[i] = parseInt(valores[i].value);
    }

    let valor = new Chart(graf_valores, {
        type: 'bar',
        data: {
            labels: key_graf,
            datasets: [{
                label: 'Valores Consulta',
                data: valores_graf,
                backgroundColor: [
                    '#6ab5a6',
                    '#cba9e5',
                    '#d7837f',
                    '#3c6498',
                    '#73ae6c',
                    '#f9ca9b',
                    '#1c968d',
                    '#459af9',
                    '#cb2b46'
                ],
                borderColor: [
                    '#6ab5a6',
                    '#cba9e5',
                    '#d7837f',
                    '#3c6498',
                    '#73ae6c',
                    '#f9ca9b',
                    '#1c968d',
                    '#459af9',
                    '#cb2b46'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}
