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
            <div class="col-xxl-7 col-md-5">
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
                            <th class="align-middle" scope="col">Progrmada</th>
                            <th class="align-middle" scope="col">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
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
                              <td class="align-middle" x-text="bases.descripcionluz"></td>
                              <td class="align-middle">
                                <template x-if="bases.estadoluz == 1">
                                  <button @click="apagarLuz(bases)" type="button" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Desactivar Base"><i class="bi bi-lightbulb-off"></i></button>
                                </template>
                                <template x-if="bases.estadoluz == 0">
                                  <button @click="encenderLuz(bases)" type="button" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Activar Base"><i class="bi bi-lightbulb-fill"></i></button>
                                </template>
                              </td>
                            </tr>
                          </template>

                          <template x-if="datosConfiguracion == ''">
                            <tr>
                              <td colspan="7" class="text-center">
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

    </section>


              

    <script src="./assets/js/logicLuces.js"></script>