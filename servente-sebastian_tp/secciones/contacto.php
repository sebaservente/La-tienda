<section class="container-fluid h100" id="cuatro">	
		<h2 class="font-weight-bold ">Formulario de Contacto</h2>
		<article class="p-2">
			<h3>Registrate y Recibiras importantes Descuentos</h3>
			<form 	action="enviar_formulario.php" 
					method="post" 
					enctype="multipart/form-data"
					class="">							   
				<div class="form-group row">
					<div class="col-md-6  ">
						<label for="nombre" class="col-md-lg-2 col-form-label ">Nombre</label>
						<input 	type="text" 
								class="form-control shadow" 
								id="nombre"  
								name="nombre" 
								placeholder="nombre...">
					</div>
				
					<div class="col-md-6">
						<label for="apellido" class="col-md-lg-2 col-form-label ">Apellido</label>
						<input 	type="text" 
								class="form-control shadow" 
								id="apellido"  
								name="apellido" 
								autocomplete="off" 
								placeholder="apellido...">
					</div>
				</div>
				<div class="form-group row">		
					<div class="col-md-6">
						<label for="direccion" class="col-md-lg-2 col-form-label ">Direccion</label>
						<input 	type="text" 
								class="form-control shadow" 
								id="direccion"  
								name="direccion" 
								autocomplete="off" 
								placeholder="direccion...">
					</div>
					<div class="col-md-6">
						<label for="email" class="col-md-lg-2 col-form-label ">Email</label>
						<input 	type="email" 
								class="form-control shadow" 
								id="email"  
								name="email"  
								placeholder="Email@" 
								required 
								autocomplete="off">
					</div>
				</div>
			
				<div class="form-group col-md-12  pt-3">
					<label for="comentarios" class="text-light m-auto">Comentarios</label>
					<textarea class="form-control shadow" id="comentarios" rows="4"></textarea>
				</div>
				<div class="col-12 h23">
					<input type="reset" value="limpiar" class="btn btn-warning col-4 shadow">
					<input type="submit" value="enviar" class="btn btn-success col-4 shadow">
				</div>
			</form>
			<p class="text-center">Si estas registrado ingresa a tu cuenta con nombre de Email y Contraseña</p>			
			<aside>		
				<div class="row">
					<form class="m-auto col-12 col-md-10">
						<h3 class="col-12 p-2 m-auto">Usuarios Registrados</h3>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 col-form-label ">Email</label>
							<div class="col-sm-12">
								<input type="email" class="form-control shadow" id="inputEmail3" name="inputEmail3">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 col-form-label">Contraseña</label>
							<div class="col-sm-12">
								<input type="password" class="form-control shadow" autocomplete="off" id="inputPassword3" name="inputPassword3">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-10">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="gridCheck1" name="gridCheck1">
									<label class="form-check-label" for="gridCheck1">
									Recordarme
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12 text-center p-2 ">
								<button type="submit" class="btn btn-secondary col-10 shadow">Ingresar</button>
							</div>
						</div>
					</form>

				</div>
			</aside>

	</article>
</section>				
	
		
