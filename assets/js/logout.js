function salir() {
    Swal.fire({
		title: 'Advertencia',
		text: "Desea salir del sistema?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#4e73df',
		cancelButtonColor: '#e74a3b',
		confirmButtonText: 'Si, salir',
		cancelButtonText: 'Cancelar'
	  }).then((result) => {
		
		if (result.isConfirmed) {
			console.log("llego a salir");
			window.location = "../../logout.php";
		}
		
	  })
	  
	
}
