<template>
    <v-container fluid class="grey lighten-5">
        <loading :active.sync="isLoading"
            :is-full-page="fullPage">
        </loading>
        <div class="tabs-container">
            <ul class="nav nav-tabs" role="tablist">
              <li><a class="nav-link active show" data-toggle="tab" href="#tab-1" style="color:gray;border-color:gray;">FORMULARIO REGISTRO DE REFRIGERIO</a></li>
              <li><a class="nav-link" data-toggle="tab" href="#tab-2" style="color:gray;border-color:gray" @click="getData()">LISTADO DE REFRIGERIOS</a></li>
              <li><a class="nav-link" data-toggle="tab" href="#tab-3" style="color:gray;border-color:gray">REPORTE DE DESCARGA</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" id="tab-1" class="tab-pane active show">
                     <v-form ref="form" v-model="valid" :lazy-validation="lazy">
                <div class="row">
                    <div class="col-md-4">
                        <v-container fluid grid-list-md>
                            <v-layout wrap>
                                <div class="col-md-12 mb-12">
                                    <label for="validationServer013">Seleccionar el mes</label>
                                    <select name="" id="input" class="form-control" v-model="fecha_mes" required="required">
                                        <option value="01">ENERO</option>
                                        <option value="02">FEBRERO</option>
                                        <option value="03">MARZO</option>
                                        <option value="04">ABRIL</option>
                                        <option value="05">MAYO</option>
                                        <option value="06">JUNIO</option>
                                        <option value="07">JULIO</option>
                                        <option value="08">AGOSTO</option>
                                        <option value="09">SEPTIEMBRE</option>
                                        <option value="10">OCTUBRE</option>
                                        <option value="11">NOVIEMBRE</option>
                                        <option value="12">DICIEMBRE</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-12">
                                    <label for="validationServer013">Seleccionar la ubicacion</label>
                                    <select name="planta" id="planta" class="form-control" v-model="planta" required="required" @click="fechaEmpleado()">
                                        <option :value="item" v-for="item in location">{{ item.name }}</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-12">
                                    <label for="validationServer013">Departamento</label>
                                    <label for="validationServer013">{{ departamento }}</label>
                                </div>
                                <div class="col-md-12 mb-12">
                                    <div v-if="switch1==true">

                                    </div>
                                    <div v-else><hr>
                                            <label for="validationServer013">Buscar Funcionario</label>
                                            <model-select :options="funcionarios"
                                                v-model="select"
                                                placeholder="seleccionar funcionario">
                                            </model-select>
                                    </div>
                                </div>
                                <v-flex xs12 sm12><hr>
                                    <div class="media-body">
                                        <h6 class="media-heading">Nombre: <small> {{ select.text }}</small></h6>
                                        <h6 class="media-heading">Carnet de Identidad: <small>{{ select.ci }}</small></h6>
                                        <h6 class="media-heading">Cargo: <small> {{ select.cargo }}</small></h6>
                                        <h6 class="media-heading">Gerencia: <small>{{ select.gerencia }}</small></h6>
                                        <h6 class="media-heading">Cuenta Bancaria: <small>{{ select.nro_cuenta }}</small></h6>
                                    </div>
                                    <hr>
                                    <v-switch
                                      v-model="switch1"
                                      :label="'ASIGNAR REFRIGERIOS ' + fecha_nombre"
                                      @change="formMes()"
                                    ></v-switch>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </div>
                    <div class="col-md-8">
                         <v-container fluid grid-list-md>
                            <div class="title">

                            </div>
                            <v-layout wrap>
                                    <v-flex xs4 sm4>
                                        <v-text-field v-model="days_work_month" :rules="days_work_monthRules" label="Dias trabajo mes" @change="handleChange" placeholder="Ingrese Dias de trabajo" required> </v-text-field>
                                    </v-flex>
                                    <v-flex xs4 sm4>
                                        <v-text-field v-model="sunday_holiday" :rules="sunday_holidayRules" label="Feriados-domingos" @change="handleChange" placeholder="Ingrese Feriado o domingo" required></v-text-field>
                                    </v-flex>
                                    <v-flex xs4 sm4>
                                        <v-text-field v-model="low_license" :rules="low_licenseRules" label="Licencias-Bajas medicas" @change="handleChange" placeholder="Ingrese licencia o baja medica" required></v-text-field>
                                    </v-flex>
                                    <v-flex xs4 sm4>
                                        <v-text-field v-model="faults" :rules="faultsRules" label="Faltas" @change="handleChange" placeholder="Ingrese las faltas" required></v-text-field>
                                    </v-flex>
                                    <v-flex xs4 sm4>
                                        <v-text-field v-model="holidays" :rules="holidaysRules" label="Vacaciones" @change="handleChange" placeholder="Ingrese vacaciones" required></v-text-field>
                                    </v-flex>
                                    <v-flex xs4 sm4>
                                        <v-text-field v-model="commissions" :rules="commissionsRules" label="Comisiones" @change="handleChange" placeholder="Ingrese Comisiones" required></v-text-field>
                                    </v-flex>
                                    <v-flex xs4 sm4>
                                        <v-text-field v-model="days_subject_to_payment" :rules="days_subject_to_paymentRules" label="Dias sujetos a pago" placeholder="Ingrese dias sujetos a pago" :readonly="true"></v-text-field>
                                    </v-flex>
                                    <v-flex xs4 sm4>
                                        <v-text-field v-model="ross_amount" :rules="ross_amountRules" label="Monto Bruto dias * 18" placeholder="Ingrese el monto bruto" :readonly="true"></v-text-field>
                                    </v-flex>
                                    <v-flex xs4 sm4>
                                        <v-text-field v-model="invoices_110" :rules="invoices_110Rules" label="Facturas Form 110" @change="handleChange" placeholder="Ingrese total factura 110" required></v-text-field>
                                    </v-flex>
                                    <v-flex xs4 sm4>
                                        <v-text-field v-model="hold_time" :rules="hold_timeRules" label="Retencion Tiempo" placeholder="Ingrese retencion tiempo" :readonly="true"></v-text-field>
                                    </v-flex>
                                    <v-flex xs4 sm4>
                                        <v-text-field v-model="total_net_snack" :rules="total_net_snackRules" label="Total Refrigerio Neto" placeholder="Ingrese total refrigerio" :readonly="true"></v-text-field>
                                    </v-flex>
                                    <v-flex xs4 sm4>
                                        <v-text-field v-model="product_for_consumption" :rules="product_for_consumptionRules" label="Consumo por Producto" @change="handleChange" placeholder="Ingrese consumo por producto" required></v-text-field>
                                    </v-flex>
                                    <v-flex xs4 sm4>
                                        <v-text-field v-model="commission_for_deposit" :rules="commission_for_depositRules" label="Comision por Deposito" placeholder="Ingrese comision por deposito" :readonly="true"></v-text-field>
                                    </v-flex>
                                    <v-flex xs4 sm4>
                                        <v-text-field v-model="total_snack_to_deposit" :rules="total_snack_to_depositRules" label="Total Refrigerio a Depositar" placeholder="Ingrese refrigerio a deopositar" :readonly="true"></v-text-field>
                                    </v-flex>
                                    <v-flex xs8 sm8><hr>
                                        <div v-if="switch1==true">
                                            <div class="text-right">
                                                <v-btn color="success" class="mr-4" @click="lstGenerarMes()">
                                                    ASIGNAR REFRIGERIO {{ fecha_nombre }}
                                                </v-btn>
                                            </div>
                                        </div>
                                        <div v-else>
                                                <div class="text-right">
                                                    <v-btn :disabled="!valid" color="success" class="mr-4" @click="validate">
                                                        Registrar
                                                    </v-btn>
                                                    <v-btn color="error" class="mr-4" @click="reset">
                                                        Limpiar
                                                     </v-btn>
                                                </div>
                                        </div>
                                    </v-flex>
                            </v-layout>
                        </v-container>
                    </div>
                 </div>
            </v-form>
                </div>
                <div role="tabpanel" id="tab-2" class="tab-pane">
                 <v-card>
                    <v-card-title>
                        <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Seleccionar el mes</label>
                                    <select name="" id="input" class="form-control" v-model="fecha_mes" required="required">
                                        <option value="01">ENERO</option>
                                        <option value="02">FEBRERO</option>
                                        <option value="03">MARZO</option>
                                        <option value="04">ABRIL</option>
                                        <option value="05">MAYO</option>
                                        <option value="06">JUNIO</option>
                                        <option value="07">JULIO</option>
                                        <option value="08">AGOSTO</option>
                                        <option value="09">SEPTIEMBRE</option>
                                        <option value="10">OCTUBRE</option>
                                        <option value="11">NOVIEMBRE</option>
                                        <option value="12">DICIEMBRE</option>
                                    </select>
                        </div>
                         <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Seleccionar la ubicacion</label>
                                    <select name="planta" id="planta" class="form-control" v-model="planta" required="required" @change="fechaEnvio()">
                                        <option :value="item" v-for="item in location">{{ item.name }}</option>
                                    </select>
                         </div>
                    <v-spacer></v-spacer>
                        LISTADO DE REFRIGERIOS MES DE {{ fecha_nombre }}
                    </v-card-title>
                    <v-card-text>
                         <vue-bootstrap4-table :rows="employees" :columns="columns" :config="config" :classes="classes" style="font-size: 10px;">
                            <template slot="sort-asc-icon">
                                <i class="fa fa-sort-asc"></i>
                            </template>
                            <template slot="sort-desc-icon">
                                <i class="fa fa-sort-desc"></i>
                            </template>
                            <template slot="no-sort-icon">
                                <i class="fa fa-sort"></i>
                            </template>
                            <template slot="days_work_month" slot-scope="props">
                               <input type="days_work_month" style="font-size:12px;" name="days_work_month" class="form-control" v-model="props.row.days_work_month" @change="handleChangeTable(props,props.row.vbt_id)">

                            </template>
                             <template slot="sunday_holiday" slot-scope="props">
                               <input type="sunday_holiday" style="font-size:12px;" name="sunday_holiday" class="form-control" v-model="props.row.sunday_holiday" @change="handleChangeTable(props,props.row.vbt_id)">
                            </template>
                             <template slot="low_license" slot-scope="props">
                               <input type="low_license" style="font-size:12px;" name="low_license" class="form-control" v-model="props.row.low_license" @change="handleChangeTable(props,props.row.vbt_id)">
                            </template>
                             <template slot="faults" slot-scope="props">
                               <input type="faults" style="font-size:12px;" name="faults" class="form-control" v-model="props.row.faults" @change="handleChangeTable(props,props.row.vbt_id)">
                            </template>
                             <template slot="holidays" slot-scope="props">
                               <input type="holidays" style="font-size:12px;" name="holidays" class="form-control" v-model="props.row.holidays" @change="handleChangeTable(props,props.row.vbt_id)">
                            </template>
                             <template slot="commissions" slot-scope="props">
                               <input type="commissions" style="font-size:12px;" name="commissions" class="form-control" v-model="props.row.commissions" @change="handleChangeTable(props,props.row.vbt_id)">
                            </template>
                             <template slot="days_subject_to_payment" slot-scope="props">
                               <input type="days_subject_to_payment" style="font-size:12px;" name="days_subject_to_payment" class="form-control" v-model="props.row.days_subject_to_payment" :readonly="true">
                            </template>
                             <template slot="ross_amount" slot-scope="props">
                               <input type="ross_amount" style="font-size:12px;" name="ross_amount" class="form-control" v-model="props.row.ross_amount" :readonly="true">
                            </template>
                             <template slot="invoices_110" slot-scope="props">
                               <input type="invoices_110" style="font-size:12px;" name="invoices_110" class="form-control" v-model="props.row.invoices_110" @change="handleChangeTable(props,props.row.vbt_id)">
                            </template>
                             <template slot="hold_time" slot-scope="props">
                               <input type="hold_time" style="font-size:12px;" name="hold_time" class="form-control" v-model="props.row.hold_time" :readonly="true">
                            </template>
                             <template slot="total_net_snack" slot-scope="props">
                               <input type="total_net_snack" style="font-size:12px;" name="total_net_snack" class="form-control" v-model="props.row.total_net_snack" :readonly="true">
                            </template>
                             <template slot="product_for_consumption" slot-scope="props">
                               <input type="product_for_consumption" style="font-size:12px;" name="product_for_consumption" class="form-control" v-model="props.row.product_for_consumption" @change="handleChangeTable(props,props.row.vbt_id)">
                            </template>
                             <template slot="commission_for_deposit" slot-scope="props">
                               <input type="commission_for_deposit" style="font-size:12px;" name="commission_for_deposit" class="form-control" v-model="props.row.commission_for_deposit" :readonly="true">
                            </template>
                            <template slot="total_snack_to_deposit" slot-scope="props">
                               <input type="total_snack_to_deposit" style="font-size:12px;" name="total_snack_to_deposit" class="form-control" v-model="props.row.total_snack_to_deposit" :readonly="true">
                            </template>
                            <template slot="option" slot-scope="props">
                                <v-icon @click="edit(props.row)" style="color: gray">
                                    edit
                                </v-icon>
                                <v-icon @click="destroy(props.row)" style="color: red">
                                    delete
                                </v-icon>
                            </template>
                        </vue-bootstrap4-table>
                    </v-card-text>
                    </v-card>
                </div>
                <div role="tabpanel" id="tab-3" class="tab-pane">
                    <v-card class="mx-auto">
                        <v-card-text>
                          <div style="background:#1D2939;color:#fff">REPORTE DE REFRIGERIOS</div><hr>
                          <form action="" method="POST" class="form-inline" role="form">
                                <div class="form-group">
                                    <label for="validationServer013">Seleccionar el mes:</label>
                                    <select name="fecha_mes_reporte" id="fecha_mes_reporte" class="form-control" v-model="fecha_mes_reporte" required="required" >
                                        <option value="01">ENERO</option>
                                        <option value="02">FEBRERO</option>
                                        <option value="03">MARZO</option>
                                        <option value="04">ABRIL</option>
                                        <option value="05">MAYO</option>
                                        <option value="06">JUNIO</option>
                                        <option value="07">JULIO</option>
                                        <option value="08">AGOSTO</option>
                                        <option value="09">SEPTIEMBRE</option>
                                        <option value="10">OCTUBRE</option>
                                        <option value="11">NOVIEMBRE</option>
                                        <option value="12">DICIEMBRE</option>
                                    </select>
                               </div>

                                <div class="form-group">
                                    <div class="col-md-6 mb-6">
                                        <label for="validationServer013">Ubicacion</label>
                                        <select name="planta" id="planta" class="form-control" v-model="planta" required="required" @change="fechaEnvioReporte()">
                                            <option :value="item" v-for="item in location">{{ item.name }}</option>
                                        </select>
                                    </div>
                                </div>
                               &nbsp;&nbsp;
                                <button type="button" class="btn btn-lg btn-info" @click="fechaEnvioReporte()">
                                <i class="material-icons pull-left">print</i><span>PDF REPORTE MENSUAL<br><small>Impresion de refrigerios</small></span></button> &nbsp;&nbsp;
                                <button type="button" class="btn btn-lg btn-warning" @click="fechaReportYear()">
                                <i class="material-icons pull-left">print</i><span>PDF REPORTE GENERAL<br><small>Reporte general gestion</small></span></button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-lg btn-success" @click="printExcel('excel')">
                                <i class="material-icons pull-left">get_app</i><span>EXCEL<br><small>Descarga excel</small></span></button> &nbsp;&nbsp;
                                <button type="button" class="btn btn-lg btn-dark" @click="printCsv('csv')">
                                <i class="material-icons pull-left">get_app</i><span>CSV<br><small>Descarga csv</small></span></button>  &nbsp;&nbsp;
                                 <button type="button" class="btn btn-lg btn-danger" @click="printTxt('txt')">
                                <i class="material-icons pull-left">get_app</i><span>TXT<br><small>Descarga archivo txt</small></span></button>
                          </form>
                          <hr>
                          <div v-if="caso_report_1==true">
                            <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                                <iframe class="embed-responsive-item" :src="'/api/ReportMonth/' + fecha_reporte+'/'+usuario.usr_id+'/'+planta.id" allowfullscreen></iframe>
                            </div>
                          </div>
                          <div v-if="caso_report_2==true">
                            <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                                <iframe class="embed-responsive-item" :src="'/api/ReportYear/' + fecha+'/'+usuario.usr_id+'/'+planta.id" allowfullscreen></iframe>
                            </div>
                          </div>
                        </v-card-text>
                    </v-card>
                </div>
            </div>
        </div>

    </v-container>

</template>
<script>
import VueBootstrap4Table from 'vue-bootstrap4-table';
import { ModelSelect } from 'vue-search-select';
// Import component
import Loading from 'vue-loading-overlay';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';
import 'vue-search-select/dist/VueSearchSelect.css';

export default {
    data:()=>({
        funcionarios:[],
        fecha_actual:'',
        overlay: false,
        switch1: false,
        valid: true,
        isLoading: false,
        fullPage: true,
        days_work_month: '',
        fecha_mes:'',
        fecha_mes_reporte:'',
        fecha_nombre_reporte:'',
        fecha_nombre:'',
        fecha:'',
        fecha_reporte:'',
        caso_report_1:false,
        caso_report_2:false,
        usuario:{},
        planta:{id:1,name:"EBA CENTRAL"},
        location:[],
        departamento:'',
        days_work_monthRules: [
            v => !!v || 'Dias trabajo mes es requerido',
        ],
        sunday_holiday: 0,
        sunday_holidayRules: [
            v => !!v || 'Feriado o domingo es requerido',
        ],
        low_license: 0,
        low_licenseRules: [
            v => !!v || 'Licencias bajas medicas es requerido',
        ],
        faults: 0,
        faultsRules: [
            v => !!v || 'Faltas es requerido',
        ],
        holidays: 0,
        holidaysRules: [
            v => !!v || 'Vacaciones es requerido',
        ],
        commissions: 0,
        commissionsRules: [
            v => !!v || 'Comisión es requerido',
        ],
        days_subject_to_payment: 0,
        days_subject_to_paymentRules: [
            v => !!v || 'Dias sujetos a pago es requerido',
        ],
        ross_amount: '',
        ross_amountRules: [
            v => !!v || 'Monto bruto es requerido',
        ],
        invoices_110: '',
        invoices_110Rules: [
            v => !!v || 'total formulario 110 es requerido',
        ],
        hold_time: '',
        hold_timeRules: [
            v => !!v || 'Retensión tiempo es requerido',
        ],
        total_net_snack: '',
        total_net_snackRules: [
            v => !!v || 'Total refrigerio neto requerido',
        ],
        product_for_consumption: 0,
        product_for_consumptionRules: [
            v => !!v || 'Ingrese el consumo por producto',
        ],
        commission_for_deposit: 0.10,
        commission_for_depositRules: [
            v => !!v || 'Comisión por deposito requerido',
        ],
        total_snack_to_deposit: '',
        total_snack_to_depositRules: [
            v => !!v || 'Total refrigerio a depositar requerido',
        ],
        select: {},
        items: [
            'Item 1',
            'Item 2',
            'Item 3',
            'Item 4',
        ],
        checkbox: false,
        lazy: false,
        columns: [
             {
                label: "Fecha mes",
                name: "date",
                sort: false,
            },
            {
                label: "C.I.",
                name: "identity_card",
                sort: false,
            },
            {
                label: "Nombre Completo",
                name: "full_name",
                sort: false,
            },
              {
                label: "Cuenta Banco",
                name: "account_number",
                sort: false,
            },
            {
                label: "Dias trabajo mes",
                name: "days_work_month",
                sort: false,
            },
             {
                label: "Feriado domingo ",
                name: "sunday_holiday",
                sort: false,
            },
             {
                label: "Licencias bajas medicas",
                name: "low_license",
                sort: false,
            },
             {
                label: "Faltas",
                name: "faults",
                sort: false,
            },
             {
                label: "Vacaciones",
                name: "holidays",
                sort: false,
            },
             {
                label: "Comisiones",
                name: "commissions",
                sort: false,
            },
             {
                label: "Dias sujetos  apago",
                name: "days_subject_to_payment",
                sort: false,
            },
             {
                label: "Monto bruto",
                name: "ross_amount",
                sort: false,
            },
             {
                label: "Formulario 110",
                name: "invoices_110",

                sort: false,
            },
             {
                label: "Retensión",
                name: "hold_time",
                sort: false,
            },
             {
                label: "Total refrigerio neto",
                name: "total_net_snack",
                sort: false,
            },
             {
                label: "Consumo por producto",
                name: "product_for_consumption",
                sort: false,
            },
             {
                label: "Comision por deposito",
                name: "commission_for_deposit",
                sort: false,
            },
             {
                label: "Total refrigerio a depositar",
                name: "total_snack_to_deposit",
                sort: false,
            },
            {
                label: "Opciones",
                name: "option",
                sort: false,
            }],
        config: {
            checkbox_rows: false,
            rows_selectable: false,
            pagination: true,
            card_mode: false,
            show_refresh_button:  false,
            show_reset_button:  false,
            global_search:  {
                placeholder:  "Buscar datos en la tabla",
                visibility:  true,
                case_sensitive:  true
            },
            per_page_options:  [5,  10,  20,  30],
            server_mode:  false,
        },
        classes: {
            tableWrapper: "outer-table-div-class wrapper-class-two ",
        },
        employees: [],
        employee: {},
        dialog: false,

    }),
    computed: {
        formTitle () {
                return this.editedIndex === -1 ? 'Nuevo' : 'Editar'
            }
    },
    mounted()
    {
        this.getLocations();
        this.getFecha();
        this.listEmploye();
        this.fechaEnvioReporte();
        this.usuario=JSON.parse(localStorage.getItem('user'));
    },
    methods:{
      handleChange(value) {
        //this.model.item_peso_vol=(Math.floor(this.model.item_alto)*Math.floor(this.model.item_largo)*Math.floor(this.model.item_ancho))/5000;
        //this.model.item_peso_vol = Number(this.model.item_peso_vol.toFixed(2));
        this.days_subject_to_payment=parseInt(this.days_work_month)-(parseInt(this.sunday_holiday)+parseInt(this.low_license)+parseInt(this.faults)+parseInt(this.holidays)+parseInt(this.commissions));
        this.ross_amount=Number(this.days_subject_to_payment*18).toFixed(2);
        var totalReten=parseFloat(this.invoices_110-this.ross_amount);
        if (totalReten>0) {
            this.hold_time=0;
        }else{
            this.hold_time=(parseFloat(this.ross_amount-parseFloat(this.invoices_110)))*0.13;
        }
        this.total_net_snack=this.ross_amount-this.hold_time;
        this.total_snack_to_deposit=(this.total_net_snack-this.product_for_consumption)-this.commission_for_deposit;
       },
       handleChangeTable(params,position){
            this.employees[position-1].days_work_month=params.row.days_work_month;
            this.employees[position-1].sunday_holiday=params.row.sunday_holiday;
            this.employees[position-1].low_license=params.row.low_license;
            this.employees[position-1].faults=params.row.faults;
            this.employees[position-1].holidays=params.row.holidays;
            this.employees[position-1].commissions=params.row.commissions;
            this.employees[position-1].invoices_110=params.row.invoices_110;
            this.employees[position-1].product_for_consumption=params.row.product_for_consumption;
            this.employees[position-1].days_subject_to_payment=parseInt(params.row.days_work_month)-((parseInt(params.row.sunday_holiday)+parseInt(params.row.low_license)+parseInt(params.row.faults)+parseInt(params.row.holidays)+parseInt(params.row.commissions)));
            this.employees[position-1].ross_amount=Number(this.employees[position-1].days_subject_to_payment*18).toFixed(2);
            var totalReten=parseFloat(this.employees[position-1].invoices_110-this.employees[position-1].ross_amount);            console.log("calculo primario",totalReten);
            if (totalReten>0) {
                this.employees[position-1].hold_time=0;
            }else{
                this.employees[position-1].hold_time=(parseFloat(this.employees[position-1].ross_amount-parseFloat(this.employees[position-1].invoices_110)))*0.13;
            }
            this.employees[position-1].total_net_snack=this.employees[position-1].ross_amount-this.employees[position-1].hold_time;
            this.employees[position-1].total_snack_to_deposit=(this.employees[position-1].total_net_snack-this.employees[position-1].product_for_consumption)-this.employees[position-1].commission_for_deposit;
        },
        getLocations(){
            axios.get(`/api/auth/lstLocations`,{})
            .then(response => {
                this.location = response.data.data;
            })
            .catch(error => {
                console.log(error);
            });
        },
        getFecha(){
            var hoy = new Date();
            var dd = hoy.getDate();
            var mm = hoy.getMonth()+1;
            var yyyy = hoy.getFullYear();
            this.fecha=yyyy+"-"+mm+"-"+dd;
            switch(mm){
                case 1:
                    this.fecha_nombre="ENERO";
                break;
                case 2:
                    this.fecha_nombre="FEBRERO";
                break;
                case 3:
                    this.fecha_nombre="MARZO";
                break;
                case 4:
                    this.fecha_nombre="ABRIL";
                break;
                case 5:
                    this.fecha_nombre="MAYO";
                break;
                case 6:
                    this.fecha_nombre="JUNIO";
                break;
                case 7:
                    this.fecha_nombre="JULIO";
                break;
                case 8:
                    this.fecha_nombre="AGOSTO";
                break;
                case 9:
                    this.fecha_nombre="SEPTIEMBRE";
                break;
                case 10:
                    this.fecha_nombre="OCTUBRE";
                break;
                case 11:
                    this.fecha_nombre="NOVIEMBRE";
                break;
                case 12:
                    this.fecha_nombre="DICIEMBRE";
                break;
            }
            this.fecha_mes=mm;
            this.fecha_mes_reporte=mm;
        },
        fechaEmpleado(){
             var hoy = new Date();
            var yyyy = hoy.getFullYear();
            this.fecha=yyyy+"-"+this.fecha_mes+"-"+"01";
            switch(this.fecha_mes){
                case "01":
                    this.fecha_nombre="ENERO";
                break;
                case "02":
                    this.fecha_nombre="FEBRERO";
                break;
                case "03":
                    this.fecha_nombre="MARZO";
                break;
                case "04":
                    this.fecha_nombre="ABRIL";
                break;
                case "05":
                    this.fecha_nombre="MAYO";
                break;
                case "06":
                    this.fecha_nombre="JUNIO";
                break;
                case "07":
                    this.fecha_nombre="JULIO";
                break;
                case "08":
                    this.fecha_nombre="AGOSTO";
                break;
                case "09":
                    this.fecha_nombre="SEPTIEMBRE";
                break;
                case "10":
                    this.fecha_nombre="OCTUBRE";
                break;
                case "11":
                    this.fecha_nombre="NOVIEMBRE";
                break;
                case "12":
                    this.fecha_nombre="DICIEMBRE";
                break;
            }
            this.departamento=this.planta.citys.name;
            this.listEmploye();
        },
        fechaEnvio(){
            var hoy = new Date();
            var yyyy = hoy.getFullYear();
            this.fecha=yyyy+"-"+this.fecha_mes+"-"+"01";
            switch(this.fecha_mes){
                case "01":
                    this.fecha_nombre="ENERO";
                break;
                case "02":
                    this.fecha_nombre="FEBRERO";
                break;
                case "03":
                    this.fecha_nombre="MARZO";
                break;
                case "04":
                    this.fecha_nombre="ABRIL";
                break;
                case "05":
                    this.fecha_nombre="MAYO";
                break;
                case "06":
                    this.fecha_nombre="JUNIO";
                break;
                case "07":
                    this.fecha_nombre="JULIO";
                break;
                case "08":
                    this.fecha_nombre="AGOSTO";
                break;
                case "09":
                    this.fecha_nombre="SEPTIEMBRE";
                break;
                case "10":
                    this.fecha_nombre="OCTUBRE";
                break;
                case "11":
                    this.fecha_nombre="NOVIEMBRE";
                break;
                case "12":
                    this.fecha_nombre="DICIEMBRE";
                break;
            }
            this.getData();
            this.listEmploye();
        },
         fechaEnvioReporte(){
            var hoy = new Date();
            var yyyy = hoy.getFullYear();
            this.fecha_reporte=yyyy+"-"+this.fecha_mes_reporte+"-"+"01";
            this.caso_report_1=true;
            this.caso_report_2=false;
            switch(this.fecha_mes_reporte){
                case "01":
                    this.fecha_nombre_reporte="ENERO";
                break;
                case "02":
                    this.fecha_nombre_reporte="FEBRERO";
                break;
                case "03":
                    this.fecha_nombre_reporte="MARZO";
                break;
                case "04":
                    this.fecha_nombre_reporte="ABRIL";
                break;
                case "05":
                    this.fecha_nombre_reporte="MAYO";
                break;
                case "06":
                    this.fecha_nombre_reporte="JUNIO";
                break;
                case "07":
                    this.fecha_nombre_reporte="JULIO";
                break;
                case "08":
                    this.fecha_nombre_reporte="AGOSTO";
                break;
                case "09":
                    this.fecha_nombre_reporte="SEPTIEMBRE";
                break;
                case "10":
                    this.fecha_nombre_reporte="OCTUBRE";
                break;
                case "11":
                    this.fecha_nombre_reporte="NOVIEMBRE";
                break;
                case "12":
                    this.fecha_nombre_reporte="DICIEMBRE";
                break;
            }
        },
        fechaReportYear(){
            this.caso_report_1=false;
            this.caso_report_2=true;
        },
        getData(){
            this.isLoading = true;
            axios.get(`/api/auth/lstRefresment/`+this.fecha+'/'+this.planta.id,{})
            .then(response => {
                this.isLoading = false
                this.employees = response.data.data;
            })
            .catch(error => {
                this.isLoading = false
                console.log(error);
            });
        },
        create() {
            this.employee ={};
            this.dialog = true;
        },

        edit (item) {
            console.log("probando demoo",item);
            axios.put(`/api/auth/refreshment/${item.id}`,item)
            .then(response => {
                if (response.data.success=="true") {
                        iziToast.success({
                            position: 'topRight',
                            title: response.data.mensaje,
                            message: 'Actualizado',
                            theme: 'question', // dark
                            color: 'green', // blue, red, green, yellow
                        });
                }else{
                   iziToast.success({
                        position: 'topRight',
                        title: 'Error de consulta',
                        message: 'Error de consulta intente nuevamente',
                        theme: 'light', // dark
                        color: 'red', // blue, red, green, yellow
                    });
                }
            })
            .catch(error => {
                console.log(error);
                iziToast.success({
                        position: 'topRight',
                        title: 'Error de consulta',
                        message: 'Error de consulta intente nuevamente',
                        theme: 'light', // dark
                        color: 'red', // blue, red, green, yellow
                });
            });
        },
        update (item) {
        },
        destroy (item) {
            let success_delete = false;
            axios.delete(`/api/auth/employee/${item.id}`)
            .then(function (response) {
                success_delete = true;
            })
            .catch(function (error) {
                console.log(error);
            });
        },

        close() {
            this.dialog = false;
        },
        validate () {
            var data={
                'employee_id':this.select.value,
                'days_work_month':this.days_work_month,
                'sunday_holiday':this.sunday_holiday,
                'low_license':this.low_license,
                'faults':this.faults,
                'holidays':this.holidays,
                'commissions':this.commissions,
                'ross_amount':this.ross_amount,
                'invoices_110':this.invoices_110,
                'hold_time':this.hold_time,
                'total_net_snack':this.total_net_snack,
                'days_subject_to_payment':this.days_subject_to_payment,
                'product_for_consumption':this.product_for_consumption,
                'commission_for_deposit':this.commission_for_deposit,
                'total_snack_to_deposit':this.total_snack_to_deposit,
                'date':this.fecha,
            };
            if (this.$refs.form.validate()) {
                this.isLoading = true;
                 axios.post('/api/auth/refreshment',data)
                .then((response)=>{
                    this.isLoading = false;
                    this.listEmploye();
                    this.getData();
                    iziToast.success({
                        position: 'topRight',
                        title: 'Asignacion del refrigerio se realizo correctamente',
                        message: 'Ya se asigno el refrigerio correctamente',
                        theme: 'light', // dark
                        color: 'green', // blue, red, green, yellow
                    });
                }).catch((error)=> {
                    this.isLoading = false;
                    iziToast.danger({
                        position: 'topRight',
                        title: 'Debe elegir un usuario',
                        message: 'error debe elegir un funcionario',
                        theme: 'light', // dark
                        color: 'red', // blue, red, green, yellow
                    });
                });
            }
        },
        reset () {
            this.$refs.form.reset()
        },
        resetValidation () {
            this.$refs.form.resetValidation()
        },
        listEmploye(){
            axios.get('/api/auth/listEmploye/'+this.fecha+'/'+this.planta.id,{})
            .then((response)=>{
                this.fecha_actual=response.data.fecha;
                var obj=[];
               for (var i = 0; i < response.data.empleados.length; i++) {
                    obj.push({value:response.data.empleados[i].id,
                    text:response.data.empleados[i].full_name,
                    cargo:response.data.empleados[i].cargo,
                    ci:response.data.empleados[i].identity_card,
                    gerencia:response.data.empleados[i].gerencia,
                    nro_cuenta:response.data.empleados[i].account_number});
                }
                this.funcionarios=obj;
                this.days_work_month=response.data.dias_mes;
            }).catch((error)=> {
            });
        },
        lstGenerarMes(){
            this.isLoading = true;
           var data={
                'location_id':this.planta.id,
                'employee_id':this.select.value,
                'days_work_month':this.days_work_month,
                'sunday_holiday':this.sunday_holiday,
                'low_license':this.low_license,
                'faults':this.faults,
                'holidays':this.holidays,
                'commissions':this.commissions,
                'ross_amount':this.ross_amount,
                'invoices_110':this.invoices_110,
                'hold_time':this.hold_time,
                'total_net_snack':this.total_net_snack,
                'days_subject_to_payment':this.days_subject_to_payment,
                'commission_for_deposit':this.commission_for_deposit,
                'product_for_consumption':this.product_for_consumption,
                'total_snack_to_deposit':this.total_snack_to_deposit,
                'date':this.fecha,
            };
            axios.post('/api/auth/generarPlanillaMensual/'+this.fecha,data)
            .then((response)=>{
                this.isLoading = false;
                if (response.data.success=="true") {
                    if (response.data.data=="sin_data") {
                        iziToast.success({
                            position: 'topRight',
                            title: 'Asignacion para el '+this.fecha+" ya generada",
                            message: 'Ya se asigno los refrigerios para el mes de '+ this.fecha_nombre,
                            theme: 'light', // dark
                            color: 'blue', // blue, red, green, yellow
                        });
                    }else{
                         iziToast.success({
                            position: 'topRight',
                            title: 'Asignacion de refrigerio correctamente',
                            message: 'Se realizo la asiognación del refrigerio correctamente',
                            theme: 'light', // dark
                            color: 'green', // blue, red, green, yellow
                        });
                        $('.nav-tabs a[href="#tab-2"]').tab('show');
                    }
                }else{
                   iziToast.success({
                        position: 'topRight',
                        title: 'Error de consulta',
                        message: 'Error de consulta intente nuevamente',
                        theme: 'light', // dark
                        color: 'red', // blue, red, green, yellow
                    });
                }

                this.getData();
            }).catch((error)=> {
                this.isLoading = false;
            });
        },
        formMes(){
            if (this.switch1==true) {
                this.days_work_month=30;
                this.sunday_holiday=0;
                this.low_license=0;
                this.faults=0;
                this.holidays=0;
                this.commissions=0;
                this.ross_amount=0;
                this.invoices_110=0.00;
                this.hold_time=0.00;
                this.total_net_snack=0.00
                this.days_subject_to_payment=0.00;
                this.product_for_consumption=0.00;
                this.commission_for_deposit=0.10;
                this.total_snack_to_deposit=0.00;
            }else{
                this.days_work_month=0;
                this.sunday_holiday=0;
                this.low_license=0;
                this.faults=0;
                this.holidays=0;
                this.commissions=0;
                this.ross_amount=0;
                this.invoices_110=0.00;
                this.hold_time=0.00;
                this.total_net_snack=0.00
                this.days_subject_to_payment=0.00;
                this.product_for_consumption=0.00;
                this.commission_for_deposit=0.10;
                this.total_snack_to_deposit=0.00;
            }

        },
        imprimirMes(){
            this.fecha_mes_reporte;
        },
        printExcel(tipo_doc){
            this.isLoading = true;
              axios({
                url: '/api/reportMonthExcel/' + this.fecha_reporte + '/'+this.usuario.usr_id+'/'+tipo_doc+'/'+this.planta.id,
                method: 'GET',
                responseType: 'blob',
                }).then((response) => {
                this.isLoading = false;
                var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                var fileLink = document.createElement('a');
                fileLink.href = fileURL;
                fileLink.setAttribute('download', 'Planilla_pago_refrigerio.xls');
                document.body.appendChild(fileLink);
                fileLink.click();
            });
        },
         printCsv(tipo_doc){
            this.isLoading = true;
              axios({
                url: '/api/reportMonthExcel/' + this.fecha_reporte + '/'+this.usuario.usr_id+'/'+tipo_doc+'/'+this.planta.id,
                method: 'GET',
                responseType: 'blob',
                }).then((response) => {
                this.isLoading = false;
                var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                var fileLink = document.createElement('a');
                fileLink.href = fileURL;
                fileLink.setAttribute('download', 'Planilla_pago_refrigerio.csv');
                document.body.appendChild(fileLink);
                fileLink.click();
            });
        },
        printTxt(tipo_doc){
          this.isLoading = true;
              axios({
                url: '/api/reportMonthExcel/' + this.fecha_reporte + '/'+this.usuario.usr_id+'/'+tipo_doc+'/'+this.planta.id,
                method: 'GET',
                responseType: 'blob',
                }).then((response) => {
                this.isLoading = false;
                var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                var fileLink = document.createElement('a');
                fileLink.href = fileURL;
                fileLink.setAttribute('download', 'Planilla_pago_refrigerio.txt');
                document.body.appendChild(fileLink);
                fileLink.click();
            });
        }
    },
    components: {
        VueBootstrap4Table,
        ModelSelect,
        Loading
    }
}
</script>
