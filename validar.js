function guardar(){
prov=document.getElementById("prov").value;
req=document.getElementById("req").value;
desG=document.getElementById("desG").value;
mon=document.getElementById("mon").value;
maq=document.getElementById("maq").value;



if(prov=="" || req=="" || desG=="" || mon=="" || maq==""){
   Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Favor de completar el formulario',
})
   return false;
} else{

	Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'El formulario fue guardado',
  showConfirmButton: true, 
})

}
}



function agregar(){
cuenC=document.getElementById("cuenC").value;
cant=document.getElementById("cant").value;
um=document.getElementById("um").value;
pre=document.getElementById("pre").value;
DetPS=document.getElementById("DetPS").value;



if(cuenC=="" || cant=="" || um=="" || pre=="" || DetPS==""){
   Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Favor de completar el formulario',
})
   return false;
}else{

  Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'El producto o servicio fue guardado',
  showConfirmButton: true, 
})

}
}


function enviar(){
Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'El formulario fue enviado',
  showConfirmButton: true, 
})
   

}

function autorizar(){
  Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'La Requisición fue autorizada',
  showConfirmButton: true, 
})
   
}


function multiplicar(){
 cant = document.getElementById("cant").value;
 pre = document.getElementById("pre").value;
  r = cant*pre;
  document.getElementById("imp").value = r;
}


function compras(){
  Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'La Requisición fue comprada',
  showConfirmButton: true, 
})
   
}



function Funcion_correo(){
correo=document.getElementById("correo").value;

if(correo==""){
   Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Favor de completar el password',
})
   return false;
} else{

  Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'El formulario fue guardado',
  showConfirmButton: true, 
})

}
}


function modificar_R(){
 Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Requisición Modificada',
  showConfirmButton: true, 
})
 
}

function Rechazar(){
 Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'La Requisición Fue Rechazada',
  showConfirmButton: true, 
})
 
}


function Devolver(){
 Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'La Requisición Fue Devuelta',
  showConfirmButton: true, 
})
 
}


function Seguimiento(){
 Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Se aplicó seguimiento',
  showConfirmButton: true, 
})
 
}

function Cancelar(){
 Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'La requisición Fue Cancelada',
  showConfirmButton: true, 
})
 
}






