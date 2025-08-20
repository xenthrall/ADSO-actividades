<!-- Modal -->
<div class="modal fade" id="modal{{$cliente -> id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ url('clientes/'.$cliente->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <!-- Nombre -->
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre *</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="$cliente -> nombre" required>
                        </div>

                        <!-- Apellido -->
                        <div class="col-md-6">
                            <label for="apellido" class="form-label">Apellido *</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" required value="$cliente -> apellido">
                        </div>

                        <!-- Dirección -->
                        <div class="col-md-12">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" value="$cliente -> direccion">
                        </div>

                        <!-- Fecha de nacimiento -->
                        <div class="col-md-6">
                            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento *</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required value="$cliente -> fecha_nacimiento">
                        </div>

                        <!-- Teléfono -->
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" value="$cliente -> telefono">
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <label for="email" class="form-label">Correo Electrónico *</label>
                            <input type="email" class="form-control" id="email" name="email" required value="$cliente -> email">
                        </div>

                        <!-- Fecha de registro -->
                        <div class="col-md-6">
                            <label for="fecha_registro" class="form-label">Fecha de Registro</label>
                            <input type="date" class="form-control" id="fecha_registro" name="fecha_registro" value="$cliente -> fecha_registro">
                        </div>

                        <!-- Género -->
                        <div class="col-md-6">
                            <label for="genero" class="form-label">Género *</label>
                            <select class="form-control" id="genero" name="genero" required value="$cliente -> genero">
                                <option value="">Seleccione...</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Otros">Otros</option>
                            </select>
                        </div>
                    </div>

                    <!-- Botón -->
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>