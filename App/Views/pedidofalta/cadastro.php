<!-- Advanced Select2 -->
<div class="body">
    <p>Modal para cadastro de Produtos, por cliente.</p>
    <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#largeModal">CADASTRA FALTA</button>

</div>

<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
         <div class="modal-header">
           <h4 class="title" id="largeModalLabel">Produto em Falta</h4>
        </div>
        <div class="modal-body">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Avançado</strong></h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6">
                                <p> <b>Cliente</b> </p>
                                <select class="form-control show-tick ms select2" data-placeholder="Select">
                                    <option></option>
                                    <option>Fundo de Feira</option>
                                    <option>Alagoas</option>
                                    <option>Salvador</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <p> <b>Marca</b> </p>
                                <select class="form-control show-tick ms select2" data-placeholder="Select">
                                    <option></option>
                                    <optgroup label="Picnic">
                                        <option>Teuto</option>
                                        <option>Farmace</option>
                                        <option>Blau</option>
                                    </optgroup>
                                    <optgroup label="Camping">
                                        <option>Tent</option>
                                        <option>Flashlight</option>
                                        <option>Toilet Paper</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <p> <b>Produto (s)</b> </p>
                                <select class="form-control show-tick ms select2" multiple data-placeholder="Select">
                                    <option>Dipirona</option>
                                    <option>Soro</option>
                                    <option>Soro Glicosado</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <p> <b>Proposta</b> </p>
                                <select class="form-control show-tick ms search-select" data-placeholder="Select">
                                    <option></option>
                                    <option>Hot Dog, Fries and a Soda</option>
                                    <option>Burger, Shake and a Smile</option>
                                    <option>Sugar, Spice and all things nice</option>
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix m-t-30">
                            <div class="col-lg-3 col-md-6">
                                <p> <b>AFM</b> </p>
                                <select id="max-select" class="form-control show-tick ms" multiple>
                                    <option></option>
                                    <optgroup label="Condiments" data-max-options="2">
                                        <option>Mustard</option>
                                        <option>Ketchup</option>
                                        <option>Relish</option>
                                    </optgroup>
                                    <optgroup label="Breads" data-max-options="2">
                                        <option>Plain</option>
                                        <option>Steamed</option>
                                        <option>Toasted</option>
                                    </optgroup>
                                </select>
                            </div>
                            <!--div class="col-lg-3 col-md-6">
                                <p> <b>Loading Data</b> </p>
                                <input type="hidden" id="loading-select" class="form-control"/>
        
                            </div-->
                            <div class="col-lg-3 col-md-6">
                                <p> <b>Status</b> </p>
                                <input type="hidden" id="array-select" class="form-control">
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <p>Opção desativada</p>
                                <select class="form-control show-tick ms select2" data-placeholder="Select">
                                    <option></option>
                                    <option>Mustard</option>
                                    <option disabled>Ketchup</option>
                                    <option>Relish</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>

             <div class="col-lg-12">
                 <div class="card">
                     <div class="header">
                         <h2><strong>Observação</strong></h2>
                         <ul class="header-dropdown">
                             <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                 <ul class="dropdown-menu dropdown-menu-right slideUp">
                                     <li><a href="javascript:void(0);">Edit</a></li>
                                     <li><a href="javascript:void(0);">Delete</a></li>
                                     <li><a href="javascript:void(0);">Report</a></li>
                                 </ul>
                             </li>
                             <li class="remove">
                                 <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                             </li>
                         </ul>
                     </div>
                     <div class="body">
                         <div class="summernote" aria-placeholder="Dige sua observação">
                             Hello there,
                             <br/>
                             <p></p>
                             <p></p>
                         </div>
                     </div>
                 </div>
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-round waves-effect">SALVAR</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">FECHAR</button>
            </div>
        </div>
    </div>
</div>

