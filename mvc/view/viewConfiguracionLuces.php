<div class="pagetitle">
      <h1>Configuracion luces</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Consultas</a></li>
          <li class="breadcrumb-item active">Configuracion luces</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard" x-data="luces()" x-init="inits">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-10 col-md-5">
              <div class="card info-card sales-card">

              <center>
                <div class="card-body">
                  <h5 class="card-title">Listado luces</h5>

                  <div class="d-flex align-items-center">
                    
                    <div class="table-responsive">
                      <table class="table table-bordered ">
                        <thead>
                          <tr style="text-align: center;">
                            <th class="align-middle" scope="col">#</th>
                            <th class="align-middle" scope="col">Nombre</th>
                            <th class="align-middle" scope="col">Descripcion</th>
                            <th class="align-middle" scope="col">Estado</th>
                            <th class="align-middle" scope="col">Fecha Modificacion</th>
                            <th class="align-middle" scope="col">Hora Modificacion</th>
                            <th class="align-middle" scope="col">Acciones</th>
                            <th class="align-middle" scope="col">Programar</th>
                            <th class="align-middle" scope="col">Hora Programada</th>
                            <th class="align-middle" scope="col">Programar Hora</th>
                          </tr>
                        </thead>
                        <tbody>
                          <template x-if="datosConfiguracion != ''">
                            <template x-for="bases in datosConfiguracion" :key="bases.codluz">
                              <tr style="text-align: center;">
                                <th class="align-middle" scope="row" x-text="bases.codluz"></th>
                                <td class="align-middle" x-text="bases.nombreluz"></td>
                                <td class="align-middle" x-text="bases.descripcionluz"></td>

                                <td class="align-middle">
                                  <span class="badge bg-success" :class="{ 'd-none' : bases.estadoluz == 0 }" x-text="bases.descestado"></span>
                                  <span class="badge bg-danger" :class="{ 'd-none' : bases.estadoluz == 1 }" x-text="bases.descestado"></span>
                                </td>

                                <td class="align-middle" x-text="bases.fechaestadoluz"></td>
                                <td class="align-middle" x-text="bases.horaestadoluz"></td>
                                
                                <td class="align-middle">
                                  <template x-if="bases.estadoluz == 1">
                                    <button @click="apagarLuz(bases)" type="button" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Desactivar Base" :disabled="(bases.progrmarLuz === 'false') ? false : true"><i class="bi bi-lightbulb-off"></i></button>
                                  </template>
                                  <template x-if="bases.estadoluz == 0">
                                    <button @click="encenderLuz(bases)" type="button" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Activar Base" :disabled="(bases.progrmarLuz === 'false') ? false : true"><i class="bi bi-lightbulb-fill"></i></button>
                                  </template>
                                </td>

                                <td class="align-middle">
                                  <div class="form-switch">
                                    <input class="form-check-input" type="checkbox" @click="cambiarEstadoProgrma(bases)" :checked="(bases.progrmarLuz === 'true') ? true : false" >
                                  </div>
                                </td>

                                <td class="align-middle" x-text="bases.horainicio+' - '+bases.horafin"></td>
                                <td class="align-middle">
                                  <button type="button" @click="datosHorasProgramadas(bases)" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalContrato" :disabled="(bases.progrmarLuz === 'true') ? false : true"><i class="bi bi-folder"></i></button>
                                </td>
                              </tr>
                            </template>
                          </template>

                          <template x-if="datosConfiguracion == ''">
                            <tr>
                              <td colspan="10" class="text-center">
                                <div class="spinner-border text-info" role="status">
                                  <span class="visually-hidden">Loading...</span>
                                </div>
                              </td>
                            </tr>
                          </template>

                        </tbody>
                      </table>
                    </div>
                    
                  </div>
                </div>
                </center>

              </div>
            </div><!-- End Sales Card -->

            

            
            
           

          </div>
        </div><!-- End Left side columns -->
      </div>

      <div class="modal fade" id="modalContrato" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Hora Programada<strong x-text="codigoCon"></strong></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" id="updateHoraProgramada" @submit.prevent="modHoraProgramada()">
                      <div class="modal-body">
                        <!-- Floating Labels Form -->
                        <div class="row g-3">
                          <input type="hidden" x-model="idLuz" x-ref="idLuz" name="idLuz"> 
                          <div class="col-md-6">
                            <div class="form-floating">
                              <input type="time" class="form-control" id="floatingEmail" placeholder="Valor Mensual" x-model="horaInicio" x-ref="horaInicio" name="horaInicio" required> 
                              <label for="floatingEmail">Hora Inicio</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-floating">
                              <input type="time" class="form-control" id="floatingPassword" placeholder="Valor Total" x-model="horaFin" x-ref="horaFin" name="horaFin" required>
                              <label for="floatingPassword">Hora Fin</label>
                            </div>
                          </div>



                        </div><!-- End floating Labels Form -->
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Programar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      </div>
                    </form>

                  </div>
                </div>
              </div><!-- End Basic Modal-->

    </section>


              

    <script src="./assets/js/logicLuces.js"></script>