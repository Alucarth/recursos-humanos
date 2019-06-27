<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use App\City;
class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $employees = [

            ["last_name"=>"HERRERA","mother_last_name"=>"JUSTINIANO","first_name"=>"VIVIAN","second_name"=>"TERESA","ci"=>"3352050","ext"=>"LP","cargo","Responsable de Normas y Calidad"],
            ["last_name"=>"LAZARTE","mother_last_name"=>"RAMIREZ","first_name"=>"EMILIO","second_name"=>"RENE","ci"=>"4305675","ext"=>"LP","cargo","Responsable de Calidad y Normas"],
            ["last_name"=>"COSSIO","mother_last_name"=>"QUEVEDO","first_name"=>"ALEJANDRO","second_name"=>"JHONNY","ci"=>"3598861","ext"=>"CB","cargo","Responsable de Planificacion"],
            ["last_name"=>"FLORES","mother_last_name"=>"MOLLO","first_name"=>"CLAUDIA","second_name"=>"ADELINA","ci"=>"6845082","ext"=>"LP","cargo","Profesional en Planificacion"],
            ["last_name"=>"QUELALI","mother_last_name"=>"LOPEZ","first_name"=>"DAVID","second_name"=>"IVAN","ci"=>"6097885","ext"=>"LP","cargo","Responsable de Sistemas"],
            ["last_name"=>"VILLEGAS","mother_last_name"=>"MENDEZ","first_name"=>"JUAN","second_name"=>"FELIX","ci"=>"7261194","ext"=>"LP","cargo","Encargado de seguridad Informatica"],
            ["last_name"=>"GARCIA","mother_last_name"=>"DUCHEN","first_name"=>"JORGE","second_name"=>"","ci"=>"4772446","ext"=>"LP","cargo","Encargado de Soporte Tecnico"],
            ["last_name"=>"RODRIGUEZ","mother_last_name"=>"FLORES","first_name"=>"JOSE","second_name"=>"LUIS","ci"=>"6835167","ext"=>"LP","cargo","Tecnico - Soporte"],
            ["last_name"=>"MACUCHAPI","mother_last_name"=>"HUANCA","first_name"=>"SANDRA","second_name"=>"AILEN","ci"=>"6965731","ext"=>"LP","cargo","Encargada de Desarrollo"],
            ["last_name"=>"MAMANI","mother_last_name"=>"GUTIERREZ","first_name"=>"PRIMO","second_name"=>"WENCESLAO","ci"=>"6982562","ext"=>"LP","cargo","Profesional Desarrollador"],
            ["last_name"=>"LIMACHI","mother_last_name"=>"POMA","first_name"=>"GLENEY","second_name"=>"RODDWY","ci"=>"6120541","ext"=>"LP","cargo","Tecnico Desarrollador I"],
            ["last_name"=>"TORREZ","mother_last_name"=>"SALINAS","first_name"=>"LEANDRO","second_name"=>"DAVID","ci"=>"6047054","ext"=>"LP","cargo","Tecnico Desarrollador "],
            ["last_name"=>"ORTIZ","mother_last_name"=>"CALANI","first_name"=>"ROXANA","second_name"=>"VIVIAN","ci"=>"8300144","ext"=>"LP","cargo","Tecnico Desarrollador II"],
            ["last_name"=>"TOLEDO","mother_last_name"=>"ARCE","first_name"=>"POLICARPIO","second_name"=>"","ci"=>"3925893","ext"=>"SC","cargo","Asesor de Comunicación"],
            ["last_name"=>"FLORES","mother_last_name"=>"CALLE","first_name"=>"MAX","second_name"=>"","ci"=>"6112668","ext"=>"LP","cargo","Profesional V Responsable  de Logistica e Insumos"],
            ["last_name"=>"IRUSTA","mother_last_name"=>"VASQUEZ","first_name"=>"ELIANA","second_name"=>"MARCELA","ci"=>"4809081","ext"=>"LP","cargo","Diseñador Grafico"],
            ["last_name"=>"QUISPE","mother_last_name"=>"MACIAS","first_name"=>"AGUSTINA","second_name"=>"","ci"=>"3416571","ext"=>"LP","cargo","Profesional en Comunicación"],
            ["last_name"=>"SALVATIERRA","mother_last_name"=>"TORRES","first_name"=>"ADRIANA","second_name"=>"JIMENA","ci"=>"3652157","ext"=>"CH","cargo","Monitoreo y Redaccion"],
            ["last_name"=>"LOPEZ","mother_last_name"=>"MIRANDA","first_name"=>"ROSE","second_name"=>"MARY","ci"=>"2607892","ext"=>"LP","cargo","Profesional Responsable Social Empresarial"],
            ["last_name"=>"TAPIA","mother_last_name"=>"ARGANDOÑA","first_name"=>"EVELYN","second_name"=>"XIMENA","ci"=>"3391276","ext"=>"LP","cargo","Responsable de Recursos Humanos"],
            ["last_name"=>"ZEBALLOS","mother_last_name"=>"VEGA","first_name"=>"RICHARD","second_name"=>"IVAN","ci"=>"2556695","ext"=>"LP","cargo","Tecnico en recursos Humanos"],
            ["last_name"=>"VILLARROEL","mother_last_name"=>"CUSICANQUI","first_name"=>"ALVARO","second_name"=>"IVAN","ci"=>"6950825","ext"=>"LP","cargo","Tecnico en Recursos Humanos"],
            ["last_name"=>"PEÑA","mother_last_name"=>"CABAS","first_name"=>"DENIS","second_name"=>"FABIAN","ci"=>"8377758","ext"=>"LP","cargo","Aux. Administrativo Recursos Humanos"],
            ["last_name"=>"ISNADO","mother_last_name"=>"CHAVEZ","first_name"=>"DILMA","second_name"=>"","ci"=>"4806440","ext"=>"LP","cargo","Tecnico en Recursos Humanos"],
            ["last_name"=>"CRUZ","mother_last_name"=>"OROSCO","first_name"=>"GERANIA","second_name"=>"ROSSI","ci"=>"6996778","ext"=>"LP","cargo","Tecnico en Recursos Humanos"],
            ["last_name"=>"ACERO","mother_last_name"=>"FLORES","first_name"=>"ELIZABETH","second_name"=>"DEYSI","ci"=>"6869194","ext"=>"LP","cargo","Tecnico en Recursos Humanos"],
            ["last_name"=>"HERRERA","mother_last_name"=>"JUSTINIANO","first_name"=>"VIVIAN","second_name"=>"TERESA","ci"=>"3352050","ext"=>"LP","cargo","Responsable de Normas y Calidad"],
            ["last_name"=>"LAZARTE","mother_last_name"=>"RAMIREZ","first_name"=>"EMILIO","second_name"=>"RENE","ci"=>"4305675","ext"=>"LP","cargo","Responsable de Calidad y Normas"],
            ["last_name"=>"COSSIO","mother_last_name"=>"QUEVEDO","first_name"=>"ALEJANDRO","second_name"=>"JHONNY","ci"=>"3598861","ext"=>"CBBA","cargo","Responsable de Planificacion"],
            ["last_name"=>"FLORES","mother_last_name"=>"MOLLO","first_name"=>"CLAUDIA","second_name"=>"ADELINA","ci"=>"6845082","ext"=>"LP","cargo","Profesional en Planificacion"],
            ["last_name"=>"QUELALI","mother_last_name"=>"LOPEZ","first_name"=>"DAVID","second_name"=>"IVAN","ci"=>"6097885","ext"=>"LP","cargo","Responsable de Sistemas"],
            ["last_name"=>"VILLEGAS","mother_last_name"=>"MENDEZ","first_name"=>"JUAN","second_name"=>"FELIX","ci"=>"7261194","ext"=>"LP","cargo","Encargado de seguridad Informatica"],
            ["last_name"=>"GARCIA","mother_last_name"=>"DUCHEN","first_name"=>"JORGE","second_name"=>"","ci"=>"4772446","ext"=>"LP","cargo","Encargado de Soporte Tecnico"],
            ["last_name"=>"RODRIGUEZ","mother_last_name"=>"FLORES","first_name"=>"JOSE","second_name"=>"LUIS","ci"=>"6835167","ext"=>"LP","cargo","Tecnico - Soporte"],
            ["last_name"=>"MACUCHAPI","mother_last_name"=>"HUANCA","first_name"=>"SANDRA","second_name"=>"AILEN","ci"=>"6965731","ext"=>"LP","cargo","Encargada de Desarrollo"],
            ["last_name"=>"MAMANI","mother_last_name"=>"GUTIERREZ","first_name"=>"PRIMO","second_name"=>"WENCESLAO","ci"=>"6982562","ext"=>"LP","cargo","Profesional Desarrollador"],
            ["last_name"=>"LIMACHI","mother_last_name"=>"POMA","first_name"=>"GLENEY","second_name"=>"RODDWY","ci"=>"6120541","ext"=>"LP","cargo","Tecnico Desarrollador I"],
            ["last_name"=>"TORREZ","mother_last_name"=>"SALINAS","first_name"=>"LEANDRO","second_name"=>"DAVID","ci"=>"6047054","ext"=>"LP","cargo","Tecnico Desarrollador "],
            ["last_name"=>"ORTIZ","mother_last_name"=>"CALANI","first_name"=>"ROXANA","second_name"=>"VIVIAN","ci"=>"8300144","ext"=>"LP","cargo","Tecnico Desarrollador II"],
            ["last_name"=>"TOLEDO","mother_last_name"=>"ARCE","first_name"=>"POLICARPIO","second_name"=>"","ci"=>"3925893","ext"=>"SC","cargo","Asesor de Comunicación"],
            ["last_name"=>"FLORES","mother_last_name"=>"CALLE","first_name"=>"MAX","second_name"=>"","ci"=>"6112668","ext"=>"LP","cargo","Profesional V Responsable  de Logistica e Insumos"],
            ["last_name"=>"IRUSTA","mother_last_name"=>"VASQUEZ","first_name"=>"ELIANA","second_name"=>"MARCELA","ci"=>"4809081","ext"=>"LP","cargo","Diseñador Grafico"],
            ["last_name"=>"QUISPE","mother_last_name"=>"MACIAS","first_name"=>"AGUSTINA","second_name"=>"","ci"=>"3416571","ext"=>"LP","cargo","Profesional en Comunicación"],
            ["last_name"=>"SALVATIERRA","mother_last_name"=>"TORRES","first_name"=>"ADRIANA","second_name"=>"JIMENA","ci"=>"3652157","ext"=>"CH","cargo","Monitoreo y Redaccion"],
            ["last_name"=>"LOPEZ","mother_last_name"=>"MIRANDA","first_name"=>"ROSE","second_name"=>"MARY","ci"=>"2607892","ext"=>"LP","cargo","Profesional Responsable Social Empresarial"],
            ["last_name"=>"TAPIA","mother_last_name"=>"ARGANDOÑA","first_name"=>"EVELYN","second_name"=>"XIMENA","ci"=>"3391276","ext"=>"LP","cargo","Responsable de Recursos Humanos"],
            ["last_name"=>"ZEBALLOS","mother_last_name"=>"VEGA","first_name"=>"RICHARD","second_name"=>"IVAN","ci"=>"2556695","ext"=>"LP","cargo","Tecnico en recursos Humanos"],
            ["last_name"=>"VILLARROEL","mother_last_name"=>"CUSICANQUI","first_name"=>"ALVARO","second_name"=>"IVAN","ci"=>"6950825","ext"=>"LP","cargo","Tecnico en Recursos Humanos"],
            ["last_name"=>"PEÑA","mother_last_name"=>"CABAS","first_name"=>"DENIS","second_name"=>"FABIAN","ci"=>"8377758","ext"=>"LP","cargo","Aux. Administrativo Recursos Humanos"],
            ["last_name"=>"ISNADO","mother_last_name"=>"CHAVEZ","first_name"=>"DILMA","second_name"=>"","ci"=>"4806440","ext"=>"LP","cargo","Tecnico en Recursos Humanos"],
            ["last_name"=>"CRUZ","mother_last_name"=>"OROSCO","first_name"=>"GERANIA","second_name"=>"ROSSI","ci"=>"6996778","ext"=>"LP","cargo","Tecnico en Recursos Humanos"],
            ["last_name"=>"ACERO","mother_last_name"=>"FLORES","first_name"=>"ELIZABETH","second_name"=>"DEYSI","ci"=>"6869194","ext"=>"LP","cargo","Tecnico en Recursos Humanos"],
            ["last_name"=>"PAUCARA","mother_last_name"=>"MAMANI","first_name"=>"ROSEMARY","second_name"=>"","ci"=>"6148219","ext"=>"LP","cargo","Jefa de Contrataciones"],
            ["last_name"=>"VILLEGAS","mother_last_name"=>"CALLE","first_name"=>"ARIEL","second_name"=>"RODRIGO","ci"=>"9225672","ext"=>"LP","cargo","Tecnico en Contrataciones"],
            ["last_name"=>"ROMERO","mother_last_name"=>"FUERTES","first_name"=>"ALDRIN","second_name"=>"MARCEL","ci"=>"4754707","ext"=>"LP","cargo","Tecnico en Contrataciones IV"],
            ["last_name"=>"QUIÑONES","mother_last_name"=>"ROMAN","first_name"=>"WEIMAR","second_name"=>"MAGDIEL","ci"=>"3358764","ext"=>"LP","cargo","Tecnico en Contrataciones II"],
            ["last_name"=>"OCHOA","mother_last_name"=>"PILOY","first_name"=>"JOSE","second_name"=>"ELIAS","ci"=>"4928728","ext"=>"LP","cargo","Auxiliar Administrativo"],
            ["last_name"=>"FLORES","mother_last_name"=>"ICHUTA","first_name"=>"ELIDA","second_name"=>"BEATRIZ","ci"=>"5993912","ext"=>"LP","cargo","Tecnico en Contrataciones III"],
            ["last_name"=>"MAMANI","mother_last_name"=>"FERNANDEZ","first_name"=>"SILVIA","second_name"=>"","ci"=>"4838175","ext"=>"LP","cargo","Auxiliar de Contrataciones"],
            ["last_name"=>"MAMANI","mother_last_name"=>"MARIACA","first_name"=>"ANA","second_name"=>"FABIANA","ci"=>"4838175","ext"=>"LP","cargo","Auxiliar de Contrataciones"],
            ["last_name"=>"GONZALES","mother_last_name"=>"RAMIREZ","first_name"=>"GRICELDA","second_name"=>"FELICIA","ci"=>"6762536","ext"=>"LP","cargo","Responsable de Contrataciones"],
            ["last_name"=>"PACHECO","mother_last_name"=>"CALLISAYA","first_name"=>"VANESA","second_name"=>"ROXANA","ci"=>"6993410","ext"=>"LP","cargo","Tecnico en Cobranzas"],
            ["last_name"=>"FLORES","mother_last_name"=>"SILVA","first_name"=>"EFRAIN","second_name"=>"","ci"=>"3376486","ext"=>"LP","cargo","Responsable de Importaciones"],
            ["last_name"=>"TARQUI","mother_last_name"=>"CUSI","first_name"=>"MARIA","second_name"=>"NIEVES","ci"=>"8340264","ext"=>"LP","cargo","Auxiliar Archivo Central La Paz"],
            ["last_name"=>"TINTA","mother_last_name"=>"TORREZ","first_name"=>"LUCY","second_name"=>"","ci"=>"6888223","ext"=>"LP","cargo","Auxiliar Ventanilla Unica"],
            ["last_name"=>"GUTIERREZ","mother_last_name"=>"SANGA","first_name"=>"CARLOS","second_name"=>"","ci"=>"4892335","ext"=>"LP","cargo","Mensajeria"],
            ["last_name"=>"FARFAN","mother_last_name"=>"BORDA","first_name"=>"SILVIA","second_name"=>"ASUNCION","ci"=>"1386882","ext"=>"PT","cargo","Profesional Analista Financiera"],
            ["last_name"=>"FERNANDEZ","mother_last_name"=>"GANTIER","first_name"=>"JAIME","second_name"=>"ALEJANDRO","ci"=>"2477575","ext"=>"LP","cargo","Analisis de Costo Operativo"],
            ["last_name"=>"FERNANDEZ","mother_last_name"=>"MENESES","first_name"=>"OSCAR","second_name"=>"HUGO","ci"=>"3441600","ext"=>"LP","cargo"," Gerente de Produccion Lacteos"],
            ["last_name"=>"TRONCOSO","mother_last_name"=>"ACEVEDO","first_name"=>"TIMNA","second_name"=>"ASBEL","ci"=>"5945187","ext"=>"LP","cargo","Asistente Administrativo"],
            ["last_name"=>"MARTINIC","mother_last_name"=>"VASQUEZ","first_name"=>"GUSTAVO","second_name"=>"EDUARDO","ci"=>"3416692","ext"=>"LP","cargo","Jefe de Gestion de Produccion Lacteos "],
            ["last_name"=>"PAREDES","mother_last_name"=>"MANCILLA","first_name"=>"ERNESTO","second_name"=>"FELIPE","ci"=>"3365274","ext"=>"LP","cargo","Jefe de Produccion Lacteos"],
            ["last_name"=>"MAMANI","mother_last_name"=>"MAMANI","first_name"=>"EMILIO","second_name"=>"","ci"=>"4281822","ext"=>"LP","cargo","Tecnico Produccion Lacteos "],
            ["last_name"=>"CABRERA","mother_last_name"=>"LIPA","first_name"=>"HUGO","second_name"=>"DAVID","ci"=>"8402742","ext"=>"LP","cargo","Tecnico en Aprovsionamiento"],
            ["last_name"=>"CAYOJA","mother_last_name"=>"CALDERON","first_name"=>"PAOLA","second_name"=>"","ci"=>"8321268","ext"=>"LP","cargo","Auxiliar I en  Aprovisionamiento"],
            ["last_name"=>"BORDA","mother_last_name"=>"AGUILERA","first_name"=>"JOSE","second_name"=>"ANTONIO","ci"=>"4877384","ext"=>"LP","cargo","Jefe de Mantenimiento "],
            ["last_name"=>"JIMENEZ","mother_last_name"=>"SANABRIA","first_name"=>"RODRIGO","second_name"=>"","ci"=>"7676818","ext"=>"SC","cargo","Auxiliar de Mantenimiento II"],
            ["last_name"=>"JAUREGUI","mother_last_name"=>"SEVILLA","first_name"=>"CARLA","second_name"=>"","ci"=>"3432501","ext"=>"LP","cargo","Profesional en gestion de calidad"],
            ["last_name"=>"SILLERICO","mother_last_name"=>"MAYTA","first_name"=>"WENDY","second_name"=>"BARBARA","ci"=>"5992699","ext"=>"LP","cargo","Tecnico en Calidad"],
            ["last_name"=>"LLANQUE","mother_last_name"=>"PAUCARA","first_name"=>"ESTHER","second_name"=>"FANNY","ci"=>"6725625","ext"=>"LP","cargo","Tecnico en Calidad I"],
            ["last_name"=>"QUISPE","mother_last_name"=>"SILVESTRE","first_name"=>"VERONICA","second_name"=>"LIZETH","ci"=>"6757463","ext"=>"LP","cargo","Tecnico SYSO y Medio Ambiente"],
            ["last_name"=>"VILLCA","mother_last_name"=>"MAMANI","first_name"=>"CRISTHIAM","second_name"=>"","ci"=>"7037170","ext"=>"LP","cargo","Tecnico en Control de Almacenes Producto Terminado"],
            ["last_name"=>"GUTIERREZ","mother_last_name"=>"CHOQUE","first_name"=>"RONALD","second_name"=>"ANDRES","ci"=>"6720574","ext"=>"LP","cargo","Tecnico en Microbiologia"],
            ["last_name"=>"ROBLES","mother_last_name"=>"BERNAL","first_name"=>"WALTER","second_name"=>"IVAN","ci"=>"2220790","ext"=>"LP","cargo","Coordinador General"],
            ["last_name"=>"BLONDEL","mother_last_name"=>"ROSSETTI","first_name"=>"JORGE","second_name"=>"HUMBERTO","ci"=>"2373772","ext"=>"LP","cargo","Jefe de Servisios Alimenticios"],
            ["last_name"=>"CANAVIRI","mother_last_name"=>"QUISPE","first_name"=>"CARLOS","second_name"=>"DANIEL","ci"=>"9958766","ext"=>"LP","cargo","Auxiliar Administrativo"],
            ["last_name"=>"ALI","mother_last_name"=>"CLAUDIA","first_name"=>"ELENA","second_name"=>"","ci"=>"5506999","ext"=>"PT","cargo","Abogada Coordinación General"],
            ["last_name"=>"CHURA","mother_last_name"=>"HUAYGUA","first_name"=>"EDDY","second_name"=>"","ci"=>"5967773","ext"=>"LP","cargo","Responsable ACE Nacional"],
            ["last_name"=>"IRUSTA","mother_last_name"=>"PINTO","first_name"=>"JEANNETTE","second_name"=>"","ci"=>"4806328","ext"=>"LP","cargo","Analista Financiera"],
            ["last_name"=>"MENDEZ","mother_last_name"=>"QUINTANILLA","first_name"=>"GUILLERMO","second_name"=>"HELMUTT","ci"=>"4841122","ext"=>"LP","cargo","Encargado legal de ACE La Paz"],
            ["last_name"=>"NARVAEZ","mother_last_name"=>"FERNANDEZ","first_name"=>"WALTER","second_name"=>"RODRIGO","ci"=>"3432151","ext"=>"LP","cargo","Soporte Administrativo y Logistica"],
            ["last_name"=>"RIVADENEYRA","mother_last_name"=>"ESPINAR","first_name"=>"FABIANA","second_name"=>"HAYDEE","ci"=>"6157386","ext"=>"LP","cargo","Encargada de Logistica"],
            ["last_name"=>"ZAMORA","mother_last_name"=>"LIEBERS","first_name"=>"MARIA","second_name"=>"RENE","ci"=>"1855466","ext"=>"TJ","cargo","Responsable de Procesos de Gestion"],
            ["last_name"=>"CANELAS","mother_last_name"=>"FIGUEROA","first_name"=>"MARIA","second_name"=>"RENEE","ci"=>"3397540","ext"=>"LP","cargo","Asesora Legal"],
            ["last_name"=>"CHOQUE","mother_last_name"=>"VILLEGAS","first_name"=>"ELAINE","second_name"=>"","ci"=>"4928187","ext"=>"LP","cargo","Asistente "],
            ["last_name"=>"AYAVIRI","mother_last_name"=>"SALAS","first_name"=>"MARIA","second_name"=>"EUGENIA","ci"=>"6752444","ext"=>"LP","cargo","Responsable de Contratos"],
            ["last_name"=>"CONCHA","mother_last_name"=>"FLORES","first_name"=>"WARNER","second_name"=>"WILLY","ci"=>"6154812","ext"=>"LP","cargo","Abogado"],
            ["last_name"=>"GALLEGOS","mother_last_name"=>"ZURITA","first_name"=>"RODRIGO","second_name"=>"ERNESTO","ci"=>"4890863","ext"=>"LP","cargo","Abogado"],
            ["last_name"=>"GONZALES","mother_last_name"=>"AQUINO","first_name"=>"ROSSE","second_name"=>"MARY AYDEE","ci"=>"3719460-1B","ext"=>"PT","cargo","Abogada "],
            ["last_name"=>"MARQUEZ","mother_last_name"=>"PEREZ","first_name"=>"GASTON","second_name"=>"GUALBERTO","ci"=>"6097915","ext"=>"LP","cargo","Procurador "],
            ["last_name"=>"QUINTANA","mother_last_name"=>"VEGA","first_name"=>"JHONNY","second_name"=>"ROBERTO","ci"=>"4263140","ext"=>"LP","cargo","Abogado "],
            ["last_name"=>"SEGALES","mother_last_name"=>"CASTILLO","first_name"=>"JHEYSON","second_name"=>"RAMIRO","ci"=>"6093322","ext"=>"LP","cargo","Abogado"],
            ["last_name"=>"CARDENAS","mother_last_name"=>"ARIAS","first_name"=>"DANIELA","second_name"=>"","ci"=>"4377050","ext"=>"LP","cargo","Abogado"],
            ["last_name"=>"LINARES","mother_last_name"=>"NOGALES","first_name"=>"FERNANDO","second_name"=>"GERMAN","ci"=>"2448387","ext"=>"LP","cargo","Jefe de Auditoria Interna"],
            ["last_name"=>"CORTEZ","mother_last_name"=>"PORTALES","first_name"=>"FAVIOLA","second_name"=>"CLAUDIA","ci"=>"6801925","ext"=>"LP","cargo","Auditora Interno"],
            ["last_name"=>"ESTRADA","mother_last_name"=>"IBARRA","first_name"=>"VIRGINIA","second_name"=>"","ci"=>"3687488","ext"=>"PT","cargo","Supervisora de Auditoria Interna"],
            ["last_name"=>"MENGOA","mother_last_name"=>"ALCOBA","first_name"=>"MIGUEL","second_name"=>"ANGEL","ci"=>"4269058","ext"=>"LP","cargo","Auditor Interno"],
            ["last_name"=>"TARQUI","mother_last_name"=>"QUISPE","first_name"=>"MARIA","second_name"=>"ELENA","ci"=>"4871414","ext"=>"LP","cargo","Auditora Interno"],
            ["last_name"=>"SALAZAR","mother_last_name"=>"RODRIGUEZ","first_name"=>"LIZETH","second_name"=>"CLAUDIA","ci"=>"9069584","ext"=>"LP","cargo","Auxiliar VII "],
            ["last_name"=>"RIVERO","mother_last_name"=>"CALDERON","first_name"=>"CRISTIAN","second_name"=>"ERNESTO","ci"=>"3098651","ext"=>"OR","cargo","Gerente de Produccion de Endulzantes y Frutas"],
            ["last_name"=>"CARVAJAL","mother_last_name"=>"MENDOZA","first_name"=>"SONIA","second_name"=>"","ci"=>"6061441","ext"=>"LP","cargo","Auxiliar III - Administrativo"],
            ["last_name"=>"COCA","mother_last_name"=>"UZUNA","first_name"=>"SILVIA","second_name"=>"","ci"=>"3368789","ext"=>"LP","cargo","Encargada Comercial Endulzantes"],
            ["last_name"=>"CRUZ","mother_last_name"=>"MAMANI","first_name"=>"MARIA","second_name"=>"ANGELICA","ci"=>"6075124","ext"=>"LP","cargo","Apoyo Administrativo"],
            ["last_name"=>"GOMEZ","mother_last_name"=>"CALCINA","first_name"=>"CLAUDIA","second_name"=>"JAQUELINE","ci"=>"6999201","ext"=>"LP","cargo","Encargada de Seguimiento al Procesamiento de Frutas"],
            ["last_name"=>"GUZMAN","mother_last_name"=>"MEDINA","first_name"=>"JUAN","second_name"=>"CARLOS","ci"=>"2752070","ext"=>"OR","cargo","Seguimiento y Control de Produccion Primaria"],
            ["last_name"=>"HUALLPA","mother_last_name"=>"CHURA","first_name"=>"BERNARDINO","second_name"=>"","ci"=>"6138649","ext"=>"LP","cargo","Responsable de Escuela Apicola y desarrollo de Productos"],
            ["last_name"=>"MACHACA","mother_last_name"=>"LEAÑO","first_name"=>"DAMARIS","second_name"=>"JEMIMA","ci"=>"6096965","ext"=>"LP","cargo","Responsable de Sistema de Gestion"],
            ["last_name"=>"QUISBERT","mother_last_name"=>"COPA","first_name"=>"BERNARDINO","second_name"=>"REYNALDO","ci"=>"4792116","ext"=>"LP","cargo","Tecnico en Apoyo Apicola en Acopio y Produccion"],
            ["last_name"=>"QUISPE","mother_last_name"=>"LIMA","first_name"=>"JUSTINIANO","second_name"=>"","ci"=>"2580914-1U","ext"=>"LP","cargo","Responsable de Seguimiento y Control de Produccion Primaria"],
            ["last_name"=>"QUISPE","mother_last_name"=>"QUISPE","first_name"=>"SAMUEL","second_name"=>"CRISTOBAL","ci"=>"3391019","ext"=>"LP","cargo","Responsable de Sistema de Informacion y Control de Cartera"],
            ["last_name"=>"RODRIGUEZ","mother_last_name"=>"BAUTISTA","first_name"=>"DE","second_name"=>"LOMA PAOLA VIVIANE","ci"=>"4905162","ext"=>"LP","cargo","Responsable de Seguimiento y Monitoreo"],
            ["last_name"=>"ROJAS","mother_last_name"=>"BORDA","first_name"=>"GABRIEL","second_name"=>"RICARDO","ci"=>"3148201","ext"=>"CB","cargo","Responsable de Procesamiento y Produccion"],
            ["last_name"=>"RUEDA","mother_last_name"=>"CHOQUE","first_name"=>"LUIS","second_name"=>"AUGUSTO","ci"=>"4310134","ext"=>"LP","cargo","Encargado de Seguimiento al Procesamiento de Endulzantes"],
            ["last_name"=>"VALDES","mother_last_name"=>"DURAN","first_name"=>"MARCOS","second_name"=>"RENE","ci"=>"4914410","ext"=>"LP","cargo","Auxiliar Administrativo I"],
            ["last_name"=>"FREIRE","mother_last_name"=>"BUSTOS","first_name"=>"JAVIER","second_name"=>"DANTE","ci"=>"2714446","ext"=>"LP","cargo","Gerente Ejecutivo"],
            ["last_name"=>"TROCHE","mother_last_name"=>"MARQUEZ","first_name"=>"JACQUELINE","second_name"=>"DEL CARMEN","ci"=>"4275974","ext"=>"LP","cargo","Secretaria de Gerencia"],
            ["last_name"=>"CUSICANQUI","mother_last_name"=>"MARCA","first_name"=>"MARCOS","second_name"=>"","ci"=>"8413349","ext"=>"LP","cargo","Auxiliar de Mensajeria"],
            ["last_name"=>"CANDIA","mother_last_name"=>"ROJAS","first_name"=>"VICENTE","second_name"=>"MARCELO","ci"=>"4774522","ext"=>"LP","cargo","Jefe de Seguridad"],
            ["last_name"=>"CHINO","mother_last_name"=>"QUISPE","first_name"=>"SAUL","second_name"=>"","ci"=>"4933310","ext"=>"LP","cargo","Chofer"],
        ];

        foreach($employees as $employee)
        {
            $item = (object) $employee;
            $city = City::where("shortened",'like',$item->ext)->first();
            if($city)
            {
                Log::info($city->shortened);
            }else
            {
                Log::error("no se encontro la rep...".$item->ext );
            }
            Log::info(json_encode($item->ci));
        }

    }
}
