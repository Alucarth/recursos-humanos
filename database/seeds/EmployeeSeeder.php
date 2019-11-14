<?php

use App\City;
use App\Employee;
use App\Position;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class EmployeeSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//
		$employees = [
			["last_name" => "TOLEDO", "mother_last_name" => "ARCE", "first_name" => "POLICARPIO", "second_name" => "", "ci" => "3925893", "ext" => "SC", "cargo" => "ASESOR DE COMUNICACIÓN", "management_id" => 1, "location_id" => 1],
			["last_name" => "FLORES", "mother_last_name" => "CALLE", "first_name" => "MAX", "second_name" => "", "ci" => "6112668", "ext" => "LP", "cargo" => "PROFESIONAL V RESPONSABLE DE LOGÍSTICA E INSUMOS", "management_id" => 1, "location_id" => 1],
			["last_name" => "IRUSTA", "mother_last_name" => "VÁSQUEZ", "first_name" => "ELIANA", "second_name" => "MARCELA", "ci" => "4809081", "ext" => "LP", "cargo" => "DISEÑADOR GRAFICO", "management_id" => 1, "location_id" => 1],
			["last_name" => "QUISPE", "mother_last_name" => "MACIAS", "first_name" => "AGUSTINA", "second_name" => "", "ci" => "3416571", "ext" => "LP", "cargo" => "PROFESIONAL EN COMUNICACIÓN", "management_id" => 1, "location_id" => 1],
			["last_name" => "SALVATIERRA", "mother_last_name" => "TORRES", "first_name" => "ADRIANA", "second_name" => "JIMENA", "ci" => "3652157", "ext" => "CH", "cargo" => "ASESOR DE COMUNICACIÓN", "management_id" => 1, "location_id" => 1],
			["last_name" => "LÓPEZ", "mother_last_name" => "MIRANDA", "first_name" => "ROSE", "second_name" => "MARY", "ci" => "2607892", "ext" => "LP", "cargo" => "PROFESIONAL RESPONSABLE SOCIAL EMPRESARIAL", "management_id" => 1, "location_id" => 1],

			["last_name" => "CÓRDOVA", "mother_last_name" => "PINO", "first_name" => "MÓNICA", "second_name" => "PATRICIA", "ci" => "4260307", "ext" => "LP", "cargo" => "GERENTE DE PLANIFICACIÓN Y DESARROLLO", "management_id" => 2, "location_id" => 1],
			["last_name" => "AYALA", "mother_last_name" => "CATALÁN", "first_name" => "ÁLVARO", "second_name" => "", "ci" => "4746292", "ext" => "LP", "cargo" => "ASISTENTE ADMINISTRATIVO", "management_id" => 2, "location_id" => 1],

			["last_name" => "BEJARANO", "mother_last_name" => "SORIANO", "first_name" => "ALBERTO", "second_name" => "SAMUEL", "ci" => "4327849", "ext" => "LP", "cargo" => "RESPONSABLE DE PROYECTOS", "management_id" => 2, "unit_id" => 1, "location_id" => 1],
			["last_name" => "ZURITA", "mother_last_name" => "ZELADA", "first_name" => "MILTON", "second_name" => "JHONNY", "ci" => "3621248", "ext" => "CB", "cargo" => "PROFESIONAL EN PROYECTOS", "management_id" => 2, "unit_id" => 1, "location_id" => 1],
			["last_name" => "MÁLAGA", "mother_last_name" => "ARTEAGA", "first_name" => "SAMUEL", "second_name" => "WILLAMS", "ci" => "6856705", "ext" => "LP", "cargo" => "TÉCNICO EN PROYECTOS II", "management_id" => 2, "unit_id" => 1, "location_id" => 1],
			["last_name" => "TEJERINA", "mother_last_name" => "NAKAZONE", "first_name" => "RENE", "second_name" => "TOSHIRO", "ci" => "3346267", "ext" => "LP", "cargo" => "PROFESIONAL EN CALCULO Y DISEÑO DE OBRAS CIVILES", "management_id" => 2, "unit_id" => 1, "location_id" => 1],
			["last_name" => "VARGAS", "mother_last_name" => "MÉNDEZ", "first_name" => "JONATHAN", "second_name" => "HUGO", "ci" => "4306002", "ext" => "LP", "cargo" => "TÉCNICO EN PROYECTOS I", "management_id" => 2, "unit_id" => 1, "location_id" => 1],
			["last_name" => "BERDEJA", "mother_last_name" => "MENDIZÁBAL", "first_name" => "DELFIN", "second_name" => "", "ci" => "4760713", "ext" => "LP", "cargo" => "PROFESIONAL EN INFRAESTRUCTURA", "management_id" => 2, "unit_id" => 1, "location_id" => 1],
			["last_name" => "ANTEZANA", "mother_last_name" => "SOLIZ", "first_name" => "ROCIÓ", "second_name" => "LISCEL", "ci" => "4330024", "ext" => "LP", "cargo" => "TÉCNICO EN PROYECTOS I", "management_id" => 2, "unit_id" => 1, "location_id" => 1],
			["last_name" => "TEZANOS", "mother_last_name" => "PINTO", "first_name" => "VARGAS", "second_name" => "GRETA ALEJANDRA", "ci" => "6723354", "ext" => "LP", "cargo" => "PROFESIONAL EN INSPECCIÓN DE OBRAS CIVILES", "management_id" => 2, "unit_id" => 1, "location_id" => 1],
			["last_name" => "SILVANA", "mother_last_name" => "INÉS", "first_name" => "QUITÓN", "second_name" => "TAPIA", "ci" => "6400508", "ext" => "CB", "cargo" => "TÉCNICO EN GESTIÓN AMBIENTAL", "management_id" => 2, "unit_id" => 1, "location_id" => 1],

			["last_name" => "HERRERA", "mother_last_name" => "JUSTINIANO", "first_name" => "VIVIAN", "second_name" => "TERESA", "ci" => "3352050", "ext" => "LP", "cargo" => "RESPONSABLE DE NORMAS Y CALIDAD", "management_id" => 2, "unit_id" => 2, "location_id" => 1],
			["last_name" => "LAZARTE", "mother_last_name" => "RAMIREZ", "first_name" => "EMILIO", "second_name" => "RENE", "ci" => "4305675", "ext" => "LP", "cargo" => "RESPONSABLE DE CALIDAD Y NORMAS", "management_id" => 2, "unit_id" => 2, "location_id" => 1],

			["last_name" => "COSSIO", "mother_last_name" => "QUEVEDO", "first_name" => "ALEJANDRO", "second_name" => "JHONNY", "ci" => "3598861", "ext" => "CB", "cargo" => "RESPONSABLE DE PLANIFICACIÓN", "management_id" => 2, "unit_id" => 3, "location_id" => 1],
			["last_name" => "FLORES", "mother_last_name" => "MOLLO", "first_name" => "CLAUDIA", "second_name" => "ADELINA", "ci" => "6845082", "ext" => "LP", "cargo" => "PROFESIONAL EN PLANIFICACIÓN", "management_id" => 2, "unit_id" => 3, "location_id" => 2],

			["last_name" => "QUELALI", "mother_last_name" => "LÓPEZ", "first_name" => "DAVID", "second_name" => "IVÁN", "ci" => "6097885", "ext" => "LP", "cargo" => "RESPONSABLE DE SISTEMAS", "management_id" => 2, "unit_id" => 4, "location_id" => 2],
			["last_name" => "VILLEGAS", "mother_last_name" => "MÉNDEZ", "first_name" => "JUAN", "second_name" => "FÉLIX", "ci" => "7261194", "ext" => "LP", "cargo" => "ENCARGADO DE SEGURIDAD INFORMÁTICA", "management_id" => 2, "unit_id" => 4, "location_id" => 1],
			["last_name" => "GARCÍA", "mother_last_name" => "DUCHEN", "first_name" => "JORGE", "second_name" => "", "ci" => "4772446", "ext" => "LP", "cargo" => "ENCARGADO DE SOPORTE TÉCNICO", "management_id" => 2, "unit_id" => 4, "location_id" => 2],
			["last_name" => "RODRÍGUEZ", "mother_last_name" => "FLORES", "first_name" => "JOSE", "second_name" => "LUIS", "ci" => "6835167", "ext" => "LP", "cargo" => "TÉCNICO SOPORTE", "management_id" => 2, "unit_id" => 4, "location_id" => 1],
			["last_name" => "MACUCHAPI", "mother_last_name" => "HUANCA", "first_name" => "SANDRA", "second_name" => "AILEN", "ci" => "6965731", "ext" => "LP", "cargo" => "ENCARGADA DE DESARROLLO", "management_id" => 2, "unit_id" => 4, "location_id" => 2],
			["last_name" => "MAMANI", "mother_last_name" => "GUTIÉRREZ", "first_name" => "PRIMO", "second_name" => "WENCESLAO", "ci" => "6982562", "ext" => "LP", "cargo" => "PROFESIONAL DESARROLLADOR", "management_id" => 2, "unit_id" => 4, "location_id" => 2],
			["last_name" => "LIMACHI", "mother_last_name" => "POMA", "first_name" => "GLENEY", "second_name" => "RODDWY", "ci" => "6120541", "ext" => "LP", "cargo" => "TÉCNICO DESARROLLADOR I", "management_id" => 2, "unit_id" => 4, "location_id" => 2],
			["last_name" => "TORREZ", "mother_last_name" => "SALINAS", "first_name" => "LEANDRO", "second_name" => "DAVID", "ci" => "6047054", "ext" => "LP", "cargo" => "TÉCNICO DESARROLLADOR I", "management_id" => 2, "unit_id" => 4, "location_id" => 2],
			["last_name" => "ORTIZ", "mother_last_name" => "CALANI", "first_name" => "ROXANA", "second_name" => "VIVIAN", "ci" => "8300144", "ext" => "LP", "cargo" => "TÉCNICO DESARROLLADOR II", "management_id" => 2, "unit_id" => 4, "location_id" => 2],

			["last_name" => "ACHU", "mother_last_name" => "QUISPE", "first_name" => "EDUARDO", "second_name" => "", "ci" => "4265848", "ext" => "LP", "cargo" => "GERENTE ADMINISTRATIVO FINANCIERO", "management_id" => 3, "location_id" => 1],
			["last_name" => "BUSTILLOS", "mother_last_name" => "MENDÍVIL", "first_name" => "ILONKA", "second_name" => "SADITH", "ci" => "4771543", "ext" => "LP", "cargo" => "ASISTENTE ADMINISTRATIVO", "management_id" => 3, "location_id" => 2],

			["last_name" => "GONZALES", "mother_last_name" => "MARIACA", "first_name" => "ROGER", "second_name" => "ADÁN", "ci" => "3499691", "ext" => "LP", "cargo" => "JEFE ADMINISTRATIVO", "management_id" => 3, "unit_id" => 5, "location_id" => 1],
			["last_name" => "ATEA", "mother_last_name" => "ROMERO", "first_name" => "CESAR", "second_name" => "GUIDO", "ci" => "3459275", "ext" => "LP", "cargo" => "ENCARGADO DE SERVICIOS GENERALES", "management_id" => 3, "unit_id" => 5, "location_id" => 2],
			["last_name" => "BACARREZA", "mother_last_name" => "ARCE", "first_name" => "FRANZ", "second_name" => "EDWIN", "ci" => "2710804", "ext" => "LP", "cargo" => "AUXILIAR SERVICIOS GENERALES", "management_id" => 3, "unit_id" => 5, "location_id" => 2],
			["last_name" => "CACHI", "mother_last_name" => "FLORES", "first_name" => "ELIZABETH", "second_name" => "", "ci" => "3486999", "ext" => "LP", "cargo" => "TÉCNICO FINANCIERO SERVICIOS GENERALES", "management_id" => 3, "unit_id" => 5, "location_id" => 2],

			["last_name" => "LÓPEZ", "mother_last_name" => "FERNÁNDEZ", "first_name" => "EMILIO", "second_name" => "GUILLERMO", "ci" => "2390989", "ext" => "LP", "cargo" => "ENCARGADO DE ACTIVOS FIJOS", "management_id" => 3, "unit_id" => 6, "location_id" => 1],
			["last_name" => "GUTIÉRREZ", "mother_last_name" => "ALEJO", "first_name" => "ALBA", "second_name" => "ROSA", "ci" => "6907794", "ext" => "LP", "cargo" => "TÉCNICO EN ALMACENES", "management_id" => 3, "unit_id" => 6, "location_id" => 1],
			["last_name" => "CERRÓN", "mother_last_name" => "FLORES", "first_name" => "ARMANDO", "second_name" => "", "ci" => "3329631", "ext" => "LP", "cargo" => "TÉCNICO EN ACTIVO FIJOS", "management_id" => 3, "unit_id" => 6, "location_id" => 1],
			["last_name" => "SILVESTRE", "mother_last_name" => "VILLAFUERTE", "first_name" => "JENRY", "second_name" => "MAX", "ci" => "2365033", "ext" => "LP", "cargo" => "TÉCNICO ACTIVOS FIJOS LA PAZ", "management_id" => 3, "unit_id" => 6, "location_id" => 1],
			["last_name" => "VERDUGUEZ", "mother_last_name" => "FERNÁNDEZ", "first_name" => "ROSARIO", "second_name" => "NATALY", "ci" => "3794531", "ext" => "CB", "cargo" => "TÉCNICO EN ALMACENES I", "management_id" => 3, "unit_id" => 6, "location_id" => 1],

			["last_name" => "MENDIETA", "mother_last_name" => "AGUILERA", "first_name" => "FRANKLIN", "second_name" => "", "ci" => "4916531 ", "ext" => "LP", "cargo" => "RESPONSABLE TRIBUTARIO", "management_id" => 3, "unit_id" => 7, "location_id" => 2],
			["last_name" => "TINTAYA", "mother_last_name" => "GONZALES", "first_name" => "MERLIZ", "second_name" => "PAOLA", "ci" => "8435952", "ext" => "LP", "cargo" => "AUXILIAR TRIBUTARIO I", "management_id" => 3, "unit_id" => 7, "location_id" => 2],
			["last_name" => "VALDIVIA", "mother_last_name" => "LAIME", "first_name" => "JESUS", "second_name" => "EUSEBIO", "ci" => "4283743", "ext" => "LP", "cargo" => "ENCARGADO DE TRIBUTOS", "management_id" => 3, "unit_id" => 7, "location_id" => 2],
			["last_name" => "CANTUTA", "mother_last_name" => "VERY", "first_name" => "SANDRA", "second_name" => "SOLEDAD", "ci" => "6954832", "ext" => "LP", "cargo" => "TECNICO TRIBUTARIO", "management_id" => 3, "unit_id" => 7, "location_id" => 2],
			["last_name" => "OVIEDO", "mother_last_name" => "MARÍN", "first_name" => "STEPHANIE", "second_name" => "CONSTANSTINOVA", "ci" => "6897146", "ext" => "LP", "cargo" => "TECNICO EN ADUANAS", "management_id" => 3, "unit_id" => 7, "location_id" => 3],

			["last_name" => "OLMOS", "mother_last_name" => "ZORRILLA", "first_name" => "JOSE", "second_name" => "LUIS", "ci" => "6763385", "ext" => "LP", "cargo" => "RESPONSABLE DE PRESUPUESTOS", "management_id" => 3, "unit_id" => 8, "location_id" => 2],
			["last_name" => "RIVERA", "mother_last_name" => "PECA", "first_name" => "MARIO", "second_name" => "LUIS", "ci" => "3088852", "ext" => "OR", "cargo" => "ENCARGADO DE PRESUPUESTOS", "management_id" => 3, "unit_id" => 8, "location_id" => 2],

			["last_name" => "MALDONADO", "mother_last_name" => "MAMANI", "first_name" => "WILMA", "second_name" => "", "ci" => "4274610", "ext" => "LP", "cargo" => "RESPONSABLE DE TESORERÍA", "management_id" => 3, "unit_id" => 9, "location_id" => 2],
			["last_name" => "PINO", "mother_last_name" => "ÁLVAREZ", "first_name" => "MIGUEL", "second_name" => "ANGEL", "ci" => "6101352", "ext" => "LP", "cargo" => "ENCARGADO DE TESORERÍA", "management_id" => 3, "unit_id" => 9, "location_id" => 2],
			["last_name" => "BALDERRAMA", "mother_last_name" => "BENAVIDES", "first_name" => "SANDRA", "second_name" => "KAREN", "ci" => "3440896-1D", "ext" => "LP", "cargo" => "AUXILIAR FINANCIERA DISTRIBUCIÓN", "management_id" => 3, "unit_id" => 9, "location_id" => 1],
			["last_name" => "GORDILLO", "mother_last_name" => "MEDRANO", "first_name" => "SERGIO", "second_name" => "", "ci" => "9874361", "ext" => "LP", "cargo" => "AUXILIAR ADMINISTRATIVO", "management_id" => 3, "unit_id" => 9, "location_id" => 2],
			["last_name" => "BUEZO", "mother_last_name" => "OROZCO", "first_name" => "JUAN", "second_name" => "CARLOS", "ci" => "4370246", "ext" => "LP", "cargo" => "TÉCNICO ADMINISTRATIVO FINANCIERO", "management_id" => 3, "unit_id" => 9, "location_id" => 1],

			["last_name" => "RIVEROS", "mother_last_name" => "VERA", "first_name" => "CLAUDIA", "second_name" => "PATRICIA", "ci" => "3441601", "ext" => "LP", "cargo" => "JEFA FINANCIERA", "management_id" => 3, "unit_id" => 10, "location_id" => 3],
			["last_name" => "RODRÍGUEZ", "mother_last_name" => "SAIRE", "first_name" => "JORGE", "second_name" => "LUIS", "ci" => "6962083", "ext" => "LP", "cargo" => "APOYO RESPONSABLE DE CONTABILIDAD", "management_id" => 3, "unit_id" => 10, "location_id" => 3],
			["last_name" => "MIRANDA", "mother_last_name" => "MONTES", "first_name" => "DIEGO", "second_name" => "ELVIN", "ci" => "6839315", "ext" => "LP", "cargo" => "AUXILIAR ADMINISTRATIVO", "management_id" => 3, "unit_id" => 10, "location_id" => 3],
			["last_name" => "MONTAÑO", "mother_last_name" => "LEDEZMA", "first_name" => "SHIRLEY", "second_name" => "YASCARA", "ci" => "2396676", "ext" => "LP", "cargo" => "AUXILIAR APOYO CONTABLE", "management_id" => 3, "unit_id" => 10, "location_id" => 3],
			["last_name" => "BAZÁN", "mother_last_name" => "CÁRDENAS", "first_name" => "ANALY", "second_name" => "DANIELA", "ci" => "8345010", "ext" => "LP", "cargo" => "AUXILIAR FINANCIERA GAF", "management_id" => 3, "unit_id" => 10, "location_id" => 3],
			["last_name" => "AGUILAR", "mother_last_name" => "CRUZ", "first_name" => "JORGE", "second_name" => "EDUARDO", "ci" => "6950349", "ext" => "LP", "cargo" => "RESPONSABLE DE CONTABILIDAD", "management_id" => 3, "unit_id" => 10, "location_id" => 3],
			["last_name" => "CAYO", "mother_last_name" => "RENGEL", "first_name" => "SERGIO", "second_name" => "MAURICIO", "ci" => "9865522", "ext" => "LP", "cargo" => "AUXILIAR CONTABLE", "management_id" => 3, "unit_id" => 10, "location_id" => 3],

			["last_name" => "TAPIA", "mother_last_name" => "ARGANDOÑA", "first_name" => "EVELYN", "second_name" => "XIMENA", "ci" => "3391276", "ext" => "LP", "cargo" => "RESPONSABLE DE RECURSOS HUMANOS", "management_id" => 3, "unit_id" => 11, "location_id" => 4],
			["last_name" => "ZEBALLOS", "mother_last_name" => "VEGA", "first_name" => "RICHARD", "second_name" => "IVÁN", "ci" => "2556695", "ext" => "LP", "cargo" => "TÉCNICO EN RECURSOS HUMANOS I", "management_id" => 3, "unit_id" => 11, "location_id" => 4],
			["last_name" => "VILLARROEL", "mother_last_name" => "CUSICANQUI", "first_name" => "ÁLVARO", "second_name" => "IVÁN", "ci" => "6950825", "ext" => "LP", "cargo" => "TÉCNICO EN RECURSOS HUMANOS IV", "management_id" => 3, "unit_id" => 11, "location_id" => 4],
			["last_name" => "PEÑA", "mother_last_name" => "CABAS", "first_name" => "DENIS", "second_name" => "FABIAN", "ci" => "8377758", "ext" => "LP", "cargo" => "AUX. ADMINISTRATIVO RECURSOS HUMANOS", "management_id" => 3, "unit_id" => 11, "location_id" => 4],
			["last_name" => "ISNADO", "mother_last_name" => "CHAVEZ", "first_name" => "DILMA", "second_name" => "", "ci" => "4806440", "ext" => "LP", "cargo" => "TÉCNICO EN RECURSOS HUMANOS II", "management_id" => 3, "unit_id" => 11, "location_id" => 4],
			["last_name" => "CRUZ", "mother_last_name" => "OROSCO", "first_name" => "GERANIA", "second_name" => "ROSSI", "ci" => "6996778", "ext" => "LP", "cargo" => "TÉCNICO EN RECURSOS HUMANOS III", "management_id" => 3, "unit_id" => 11, "location_id" => 4],
			["last_name" => "ACERO", "mother_last_name" => "FLORES", "first_name" => "ELIZABETH", "second_name" => "DEYSI", "ci" => "6869194", "ext" => "LP", "cargo" => "TÉCNICO EN RECURSOS HUMANOS", "management_id" => 3, "unit_id" => 11, "location_id" => 4],

			["last_name" => "PAUCARA", "mother_last_name" => "MAMANI", "first_name" => "ROSEMARY", "second_name" => "", "ci" => "6148219 ", "ext" => "LP", "cargo" => "JEFA DE CONTRATACIONES", "management_id" => 3, "unit_id" => 12, "location_id" => 5],
			["last_name" => "VILLEGAS", "mother_last_name" => "CALLE", "first_name" => "ARIEL", "second_name" => "RODRIGO", "ci" => "9225672", "ext" => "LP", "cargo" => "TÉCNICO EN CONTRATACIONES VII", "management_id" => 3, "unit_id" => 12, "location_id" => 5],
			["last_name" => "ROMERO", "mother_last_name" => "FUERTES", "first_name" => "ALDRIN", "second_name" => "MARCEL", "ci" => "4754707", "ext" => "LP", "cargo" => "TÉCNICO EN CONTRATACIONES IV", "management_id" => 3, "unit_id" => 12, "location_id" => 5],
			["last_name" => "QUIÑONES", "mother_last_name" => "ROMÁN", "first_name" => "WEIMAR", "second_name" => "MAGDIEL", "ci" => "3358764", "ext" => "LP", "cargo" => "TÉCNICO EN CONTRATACIONES II", "management_id" => 3, "unit_id" => 12, "location_id" => 5],
			["last_name" => "OCHOA", "mother_last_name" => "PILOY", "first_name" => "JOSE", "second_name" => "ELÍAS", "ci" => "4928728", "ext" => "LP", "cargo" => "AUXILIAR ADMINISTRATIVO", "management_id" => 3, "unit_id" => 12, "location_id" => 5],
			["last_name" => "FLORES", "mother_last_name" => "ICHUTA", "first_name" => "ELIDA", "second_name" => "BEATRIZ", "ci" => "5993912", "ext" => "LP", "cargo" => "TÉCNICO EN CONTRATACIONES III", "management_id" => 3, "unit_id" => 12, "location_id" => 5],
			["last_name" => "MAMANI", "mother_last_name" => "FERNÁNDEZ", "first_name" => "SILVIA", "second_name" => "", "ci" => "4838175", "ext" => "LP", "cargo" => "AUXILIAR DE CONTRATACIONES", "management_id" => 3, "unit_id" => 12, "location_id" => 5],
			["last_name" => "MAMANI", "mother_last_name" => "MARIACA", "first_name" => "ANA", "second_name" => "FABIANA", "ci" => "4838175", "ext" => "LP", "cargo" => "TECNICO DE CONTRATACIONES I", "management_id" => 3, "unit_id" => 12, "location_id" => 5],
			["last_name" => "GONZALES", "mother_last_name" => "RAMÍREZ", "first_name" => "GRICELDA", "second_name" => "FELICIA", "ci" => "6762536", "ext" => "LP", "cargo" => "RESPONSABLE DE CONTRATACIONES", "management_id" => 3, "unit_id" => 12, "location_id" => 5],
			["last_name" => "PACHECO", "mother_last_name" => "CALLISAYA", "first_name" => "VANESA", "second_name" => "ROXANA", "ci" => "6993410", "ext" => "LP", "cargo" => "TECNICO EN COBRANZAS", "management_id" => 3, "unit_id" => 12, "location_id" => 5],
			["last_name" => "FLORES", "mother_last_name" => "SILVA", "first_name" => "EFRAIN", "second_name" => "", "ci" => "3376486", "ext" => "LP", "cargo" => "RESPONSABLE DE IMPORTACIONES", "management_id" => 3, "unit_id" => 12, "location_id" => 5],
			["last_name" => "TARQUI", "mother_last_name" => "CUSI", "first_name" => "MARIA", "second_name" => "NIEVES", "ci" => "8340264", "ext" => "LP", "cargo" => "AUXILIAR ARCHIVO CENTRAL LA PAZ", "management_id" => 3, "unit_id" => 12, "location_id" => 5],
			["last_name" => "TINTA", "mother_last_name" => "TORREZ", "first_name" => "LUCY", "second_name" => "", "ci" => "6888223", "ext" => "LP", "cargo" => "AUXILIAR VENTANILLA UNICA", "management_id" => 3, "unit_id" => 12, "location_id" => 5],
			["last_name" => "GUTIERREZ", "mother_last_name" => "SANGA", "first_name" => "CARLOS", "second_name" => "", "ci" => "4892335", "ext" => "LP", "cargo" => "MENSAJERIA", "management_id" => 3, "unit_id" => 12, "location_id" => 5],

			["last_name" => "FARFAN", "mother_last_name" => "BORDA", "first_name" => "SILVIA", "second_name" => "ASUNCION", "ci" => "1386882", "ext" => "PT", "cargo" => "PROFESIONAL ANALISTA FINANCIERA", "management_id" => 3, "unit_id" => 13, "location_id" => 1],
			["last_name" => "FERNANDEZ", "mother_last_name" => "GANTIER", "first_name" => "JAIME", "second_name" => "ALEJANDRO", "ci" => "2477575", "ext" => "LP", "cargo" => "ANALISIS DE COSTO OPERATIVO", "management_id" => 3, "unit_id" => 13, "location_id" => 1],

			["last_name" => "BACARREZA", "mother_last_name" => "GUZMAN", "first_name" => "PATRICIA", "second_name" => "JACKELINE", "ci" => "2684896", "ext" => "LP", "cargo" => "AUXILIAR ASISTENTE DE BIBLIOTECOLOGÍA", "management_id" => 3, "unit_id" => 14, "location_id" => 1],
			["last_name" => "ZEBALLOS", "mother_last_name" => "AVENDAÑO", "first_name" => "LUDMILA", "second_name" => "", "ci" => "3481658 ", "ext" => "LP", "cargo" => "RESPONSABLE DE ARCHIVO", "management_id" => 3, "unit_id" => 14, "location_id" => 1],
			["last_name" => "PECA", "mother_last_name" => "VARGAS", "first_name" => "AZUCENA", "second_name" => "XIMENA", "ci" => "4944857", "ext" => "LP", "cargo" => "AUXILIAR DE ARCHIVO", "management_id" => 3, "unit_id" => 14, "location_id" => 1],

			["last_name" => "FERNÁNDEZ", "mother_last_name" => "MENESES", "first_name" => "OSCAR", "second_name" => "HUGO", "ci" => "3441600", "ext" => "LP", "cargo" => "GERENTE DE PRODUCCIÓN LÁCTEOS", "management_id" => 4, "location_id" => 1],
			["last_name" => "TRONCOSO", "mother_last_name" => "ACEVEDO", "first_name" => "TIMNA", "second_name" => "ASBEL", "ci" => "5945187", "ext" => "LP", "cargo" => "ASISTENTE ADMINISTRATIVO", "management_id" => 4, "location_id" => 1],

			["last_name" => "MARTINIC", "mother_last_name" => "VÁSQUEZ", "first_name" => "GUSTAVO", "second_name" => "EDUARDO", "ci" => "3416692", "ext" => "LP", "cargo" => "JEFE DE GESTIÓN DE PRODUCCIÓN LÁCTEOS", "management_id" => 4, "unit_id" => 15, "location_id" => 1],
			["last_name" => "PAREDES", "mother_last_name" => "MANCILLA", "first_name" => "ERNESTO", "second_name" => "FELIPE", "ci" => "3365274", "ext" => "LP", "cargo" => "JEFE DE PRODUCCIÓN LÁCTEOS", "management_id" => 4, "unit_id" => 15, "location_id" => 1],
			["last_name" => "MAMANI", "mother_last_name" => "MAMANI", "first_name" => "EMILIO", "second_name" => "", "ci" => "4281822", "ext" => "LP", "cargo" => "TÉCNICO PRODUCCIÓN LÁCTEOS", "management_id" => 4, "unit_id" => 15, "location_id" => 1],

			["last_name" => "CABRERA", "mother_last_name" => "LIPA", "first_name" => "HUGO", "second_name" => "DAVID", "ci" => "8402742", "ext" => "LP", "cargo" => "TÉCNICO EN APROVISIONAMIENTO", "management_id" => 4, "unit_id" => 16, "location_id" => 1],
			["last_name" => "CAYOJA", "mother_last_name" => "CALDERÓN", "first_name" => "PAOLA", "second_name" => "", "ci" => "8321268", "ext" => "LP", "cargo" => "AUXILIAR I EN APROVISIONAMIENTO", "management_id" => 4, "unit_id" => 16, "location_id" => 1],

			["last_name" => "BORDA", "mother_last_name" => "AGUILERA", "first_name" => "JOSE", "second_name" => "ANTONIO", "ci" => "4877384", "ext" => "LP", "cargo" => "JEFE DE MANTENIMIENTO", "management_id" => 4, "unit_id" => 17, "location_id" => 1],
			["last_name" => "JIMÉNEZ", "mother_last_name" => "SANABRIA", "first_name" => "RODRIGO", "second_name" => "", "ci" => "7676818", "ext" => "SC", "cargo" => "AUXILIAR DE MANTENIMIENTO II", "management_id" => 4, "unit_id" => 17, "location_id" => 1],

			["last_name" => "JAUREGUI", "mother_last_name" => "SEVILLA", "first_name" => "CARLA", "second_name" => "", "ci" => "3432501", "ext" => "LP", "cargo" => "PROFESIONAL EN GESTIÓN DE CALIDAD", "management_id" => 4, "unit_id" => 18, "location_id" => 1],
			["last_name" => "SILLERICO", "mother_last_name" => "MAYTA", "first_name" => "WENDY", "second_name" => "BARBARA", "ci" => "5992699", "ext" => "LP", "cargo" => "TÉCNICO EN CALIDAD", "management_id" => 4, "unit_id" => 18, "location_id" => 1],
			["last_name" => "LLANQUE", "mother_last_name" => "PAUCARA", "first_name" => "ESTHER", "second_name" => "FANNY", "ci" => "6725625", "ext" => "LP", "cargo" => "TÉCNICO EN CALIDAD I", "management_id" => 4, "unit_id" => 18, "location_id" => 1],
			["last_name" => "QUISPE", "mother_last_name" => "SILVESTRE", "first_name" => "VERÓNICA", "second_name" => "LIZETH", "ci" => "6757463", "ext" => "LP", "cargo" => "TÉCNICO SYSO Y MEDIO AMBIENTE", "management_id" => 4, "unit_id" => 18, "location_id" => 1],
			["last_name" => "VILLCA", "mother_last_name" => "MAMANI", "first_name" => "CRISTHIAN", "second_name" => "", "ci" => "7037170", "ext" => "LP", "cargo" => "TÉCNICO EN CONTROL DE ALMACENES PRODUCTO TERMINADO", "management_id" => 4, "unit_id" => 18, "location_id" => 1],
			["last_name" => "GUTIÉRREZ", "mother_last_name" => "CHOQUE", "first_name" => "RONALD", "second_name" => "ANDRÉS", "ci" => "6720574", "ext" => "LP", "cargo" => "TÉCNICO EN MICROBIOLOGÍA", "management_id" => 4, "unit_id" => 18, "location_id" => 1],

			["last_name" => "ROBLES", "mother_last_name" => "BERNAL", "first_name" => "WALTER", "second_name" => "IVÁN", "ci" => "2220790", "ext" => "LP", "cargo" => "COORDINADOR GENERAL", "management_id" => 5, "location_id" => 1],
			["last_name" => "BLONDEL", "mother_last_name" => "ROSSETTI", "first_name" => "JORGE", "second_name" => "HUMBERTO", "ci" => "2373772", "ext" => "LP", "cargo" => "JEFE DE SERVICIOS ALIMENTICIOS", "management_id" => 5, "location_id" => 1],
			["last_name" => "CANAVIRI", "mother_last_name" => "QUISPE", "first_name" => "CARLOS", "second_name" => "DANIEL", "ci" => "9958766", "ext" => "LP", "cargo" => "AUXILIAR ADMINISTRATIVO", "management_id" => 5, "location_id" => 1],
			["last_name" => "ALI", "mother_last_name" => "CLAUDIA", "first_name" => "ELENA", "second_name" => "", "ci" => "5506999", "ext" => "PT", "cargo" => "ABOGADA COORDINACIÓN GENERAL", "management_id" => 5, "location_id" => 1],
			["last_name" => "CHURA", "mother_last_name" => "HUAYGUA", "first_name" => "EDDY", "second_name" => "", "ci" => "5967773", "ext" => "LP", "cargo" => "RESPONSABLE ACE NACIONAL", "management_id" => 5, "location_id" => 1],
			["last_name" => "IRUSTA", "mother_last_name" => "PINTO", "first_name" => "JEANNETTE", "second_name" => "", "ci" => "4806328", "ext" => "LP", "cargo" => "ANALISTA FINANCIERA", "management_id" => 5, "location_id" => 1],
			["last_name" => "MÉNDEZ", "mother_last_name" => "QUINTANILLA", "first_name" => "GUILLERMO", "second_name" => "HELMUTT", "ci" => "4841122", "ext" => "LP", "cargo" => "ENCARGADO LEGAL DE ACE LA PAZ", "management_id" => 5, "location_id" => 1],
			["last_name" => "NARVAEZ", "mother_last_name" => "FERNÁNDEZ", "first_name" => "WALTER", "second_name" => "RODRIGO", "ci" => "3432151", "ext" => "LP", "cargo" => "SOPORTE ADMINISTRATIVO Y LOGÍSTICA", "management_id" => 5, "location_id" => 1],
			["last_name" => "RIVADENEYRA", "mother_last_name" => "ESPINAR", "first_name" => "FABIANA", "second_name" => "HAYDEE", "ci" => "6157386", "ext" => "LP", "cargo" => "ENCARGADA DE LOGÍSTICA", "management_id" => 5, "location_id" => 1],
			["last_name" => "ZAMORA", "mother_last_name" => "LIEBERS", "first_name" => "MARIA", "second_name" => "RENE", "ci" => "1855466", "ext" => "TJ", "cargo" => "RESPONSABLE DE PROCESOS DE GESTIÓN", "management_id" => 5, "location_id" => 1],

			["last_name" => "CARVAJAL", "mother_last_name" => "RODRÍGUEZ", "first_name" => "FRECIA", "second_name" => "", "ci" => "4793325", "ext" => "LP", "cargo" => "TÉCNICO DEL ALIMENTO ESCOLAR LA PAZ - RACIÓN SÓLIDA", "management_id" => 5, "unit_id" => 19, "location_id" => 1],
			["last_name" => "DURÁN", "mother_last_name" => "ARROYO", "first_name" => "MARY", "second_name" => "ALEJANDRA", "ci" => "4763778", "ext" => "LP", "cargo" => "RESPONSABLE DEL ALIMENTO ESCOLAR LA PAZ", "management_id" => 5, "unit_id" => 19, "location_id" => 1],
			["last_name" => "GUTIÉRREZ", "mother_last_name" => "MIRANDA", "first_name" => "JOSE", "second_name" => "CRISTHIAN", "ci" => "6129138", "ext" => "LP", "cargo" => "TÉCNICO NUTRICIONISTA DEL ALIMENTO ESCOLAR LA PAZ", "management_id" => 5, "unit_id" => 19, "location_id" => 1],
			["last_name" => "MARTÍNEZ", "mother_last_name" => "BALBOA", "first_name" => "PABLO", "second_name" => "", "ci" => "4784914", "ext" => "LP", "cargo" => "TÉCNICO ADMINISTRATIVO FINANCIERO DEL ALIMENTO ESCOLAR LA PAZ", "management_id" => 5, "unit_id" => 19, "location_id" => 1],
			["last_name" => "PACASI", "mother_last_name" => "AGUIRRE", "first_name" => "JOSÉ", "second_name" => "LUIS", "ci" => "4870847", "ext" => "LP", "cargo" => "CHÓFER DEL ALIMENTO ESCOLAR LA PAZ", "management_id" => 5, "unit_id" => 19, "location_id" => 1],
			["last_name" => "RAMOS", "mother_last_name" => "ARUQUIPA", "first_name" => "BEATRIZ", "second_name" => "ROSARIO", "ci" => "6139271", "ext" => "LP", "cargo" => "TÉCNICO DEL ALIMENTO ESCOLAR LA PAZ - RACIÓN LÍQUIDA", "management_id" => 5, "unit_id" => 19, "location_id" => 1],
			["last_name" => "SILVA", "mother_last_name" => "TERRAZAS", "first_name" => "MARIO", "second_name" => "WILFREDO", "ci" => "2285895", "ext" => "LP", "cargo" => "CHOFER DESAYUNO ESCOLAR EL ALTO", "management_id" => 5, "unit_id" => 19, "location_id" => 1],
			["last_name" => "TROCHE", "mother_last_name" => "QUINTEROS", "first_name" => "MARITZA", "second_name" => "OLIVIA", "ci" => "4813876", "ext" => "LP", "cargo" => "AUXILIAR DE ALMACÉN DEL ALIMENTO ESCOLAR LA PAZ", "management_id" => 5, "unit_id" => 19, "location_id" => 1],

			["last_name" => "CANELAS", "mother_last_name" => "FIGUEROA", "first_name" => "MARÍA", "second_name" => "RENEE", "ci" => "3397540", "ext" => "LP", "cargo" => "ASESORA LEGAL", "management_id" => 6, "location_id" => 1],
			["last_name" => "CHOQUE", "mother_last_name" => "VILLEGAS", "first_name" => "ELAINE", "second_name" => "", "ci" => "4928187", "ext" => "LP", "cargo" => "ASISTENTE", "management_id" => 6, "location_id" => 1],
			["last_name" => "AYAVIRI", "mother_last_name" => "SALAS", "first_name" => "MARÍA", "second_name" => "EUGENIA", "ci" => "6752444", "ext" => "LP", "cargo" => "RESPONSABLE DE CONTRATOS", "management_id" => 6, "location_id" => 1],
			["last_name" => "CONCHA", "mother_last_name" => "FLORES", "first_name" => "WARNER", "second_name" => "WILLY", "ci" => "6154812", "ext" => "LP", "cargo" => "ABOGADO", "management_id" => 6, "location_id" => 1],
			["last_name" => "GALLEGOS", "mother_last_name" => "ZURITA", "first_name" => "RODRIGO", "second_name" => "ERNESTO", "ci" => "4890863", "ext" => "LP", "cargo" => "ABOGADO", "management_id" => 6, "location_id" => 1],
			["last_name" => "GONZALES", "mother_last_name" => "AQUINO", "first_name" => "ROSSE", "second_name" => "MARY AYDEE", "ci" => "3719460-1B", "ext" => "PT", "cargo" => "ABOGADA", "management_id" => 6, "location_id" => 1],
			["last_name" => "MÁRQUEZ", "mother_last_name" => "PÉREZ", "first_name" => "GASTÓN", "second_name" => "GUALBERTO", "ci" => "6097915", "ext" => "LP", "cargo" => "PROCURADOR", "management_id" => 6, "location_id" => 1],
			["last_name" => "QUINTANA", "mother_last_name" => "VEGA", "first_name" => "JHONNY", "second_name" => "ROBERTO", "ci" => "4263140", "ext" => "LP", "cargo" => "ABOGADO", "management_id" => 6, "location_id" => 1],
			["last_name" => "SEGALES", "mother_last_name" => "CASTILLO", "first_name" => "JHEYSON", "second_name" => "RAMIRO", "ci" => "6093322", "ext" => "LP", "cargo" => "ABOGADO", "management_id" => 6, "location_id" => 1],
			["last_name" => "CÁRDENAS", "mother_last_name" => "ARIAS", "first_name" => "DANIELA", "second_name" => "", "ci" => "4377050", "ext" => "LP", "cargo" => "ABOGADO", "management_id" => 6, "location_id" => 1],

			["last_name" => "LINARES", "mother_last_name" => "NOGALES", "first_name" => "FERNANDO", "second_name" => "GERMAN", "ci" => "2448387", "ext" => "LP", "cargo" => "JEFE DE AUDITORIA INTERNA", "management_id" => 7, "location_id" => 1],
			["last_name" => "CORTEZ", "mother_last_name" => "PORTALES", "first_name" => "FAVIOLA", "second_name" => "CLAUDIA", "ci" => "6801925", "ext" => "LP", "cargo" => "AUDITORA INTERNO", "management_id" => 7, "location_id" => 1],
			["last_name" => "ESTRADA", "mother_last_name" => "IBARRA", "first_name" => "VIRGINIA", "second_name" => "", "ci" => "3687488", "ext" => "PT", "cargo" => "SUPERVISORA DE AUDITORIA INTERNA", "management_id" => 7, "location_id" => 1],
			["last_name" => "MENGOA", "mother_last_name" => "ALCOBA", "first_name" => "MIGUEL", "second_name" => "ÁNGEL", "ci" => "4269058", "ext" => "LP", "cargo" => "AUDITOR INTERNO", "management_id" => 7, "location_id" => 1],
			["last_name" => "TARQUI", "mother_last_name" => "QUISPE", "first_name" => "MARIA", "second_name" => "ELENA", "ci" => "4871414", "ext" => "LP", "cargo" => "AUDITORA INTERNO", "management_id" => 7, "location_id" => 2],
			["last_name" => "SALAZAR", "mother_last_name" => "RODRÍGUEZ", "first_name" => "LIZETH", "second_name" => "CLAUDIA", "ci" => "9069584", "ext" => "LP", "cargo" => "AUXILIAR VII", "management_id" => 7, "location_id" => 3],

			["last_name" => "RIVERO", "mother_last_name" => "CALDERÓN", "first_name" => "CRISTIAN", "second_name" => "ERNESTO", "ci" => "3098651", "ext" => "OR", "cargo" => "GERENTE DE PRODUCCIÓN DE ENDULZANTES Y FRUTAS", "management_id" => 8, "location_id" => 4],
			["last_name" => "CARVAJAL", "mother_last_name" => "MENDOZA", "first_name" => "SONIA", "second_name" => "", "ci" => "6061441", "ext" => "LP", "cargo" => "AUXILIAR III - ADMINISTRATIVO", "management_id" => 8, "location_id" => 5],
			["last_name" => "COCA", "mother_last_name" => "UZUNA", "first_name" => "SILVIA", "second_name" => "", "ci" => "3368789", "ext" => "LP", "cargo" => "ENCARGADA COMERCIAL ENDULZANTES", "management_id" => 8, "location_id" => 6],
			["last_name" => "CRUZ", "mother_last_name" => "MAMANI", "first_name" => "MARÍA", "second_name" => "ANGELICA", "ci" => "6075124", "ext" => "LP", "cargo" => "APOYO ADMINISTRATIVO", "management_id" => 8, "location_id" => 7],
			["last_name" => "GÓMEZ", "mother_last_name" => "CALCINA", "first_name" => "CLAUDIA", "second_name" => "JAQUELINE", "ci" => "6999201", "ext" => "LP", "cargo" => "ENCARGADA DE SEGUIMIENTO AL PROCESAMIENTO DE FRUTAS", "management_id" => 8, "location_id" => 8],
			["last_name" => "GUZMÁN", "mother_last_name" => "MEDINA", "first_name" => "JUAN", "second_name" => "CARLOS", "ci" => "2752070", "ext" => "OR", "cargo" => "SEGUIMIENTO Y CONTROL DE PRODUCCIÓN PRIMARIA", "management_id" => 8, "location_id" => 9],
			["last_name" => "HUALLPA", "mother_last_name" => "CHURA", "first_name" => "BERNARDINO", "second_name" => "", "ci" => "6138649", "ext" => "LP", "cargo" => "RESPONSABLE DE ESCUELA APÍCOLA Y DESARROLLO DE PRODUCTOS", "management_id" => 8, "location_id" => 10],
			["last_name" => "MACHACA", "mother_last_name" => "LEAÑO", "first_name" => "DAMARIS", "second_name" => "JEMIMA", "ci" => "6096965", "ext" => "LP", "cargo" => "RESPONSABLE DE SISTEMA DE GESTIÓN", "management_id" => 8, "location_id" => 11],
			["last_name" => "QUISBERT", "mother_last_name" => "COPA", "first_name" => "BERNARDINO", "second_name" => "REYNALDO", "ci" => "4792116", "ext" => "LP", "cargo" => "TÉCNICO EN APOYO APÍCOLA EN ACOPIO Y PRODUCCIÓN", "management_id" => 8, "location_id" => 12],
			["last_name" => "QUISPE", "mother_last_name" => "LIMA", "first_name" => "JUSTINIANO", "second_name" => "", "ci" => "2580914-1U", "ext" => "LP", "cargo" => "RESPONSABLE DE SEGUIMIENTO Y CONTROL DE PRODUCCIÓN PRIMARIA", "management_id" => 8, "location_id" => 13],
			["last_name" => "QUISPE", "mother_last_name" => "QUISPE", "first_name" => "SAMUEL", "second_name" => "CRISTOBAL", "ci" => "3391019", "ext" => "LP", "cargo" => "RESPONSABLE DE SISTEMA DE INFORMACIÓN Y CONTROL DE ARTERA", "management_id" => 8, "location_id" => 14],
			["last_name" => "RODRÍGUEZ", "mother_last_name" => "BAUTISTA", "first_name" => "PAOLA", "second_name" => "VIVIANE", "ci" => "4905162", "ext" => "LP", "cargo" => "RESPONSABLE DE SEGUIMIENTO Y MONITOREO", "management_id" => 8, "location_id" => 15],
			["last_name" => "ROJAS", "mother_last_name" => "BORDA", "first_name" => "GABRIEL", "second_name" => "RICARDO", "ci" => "3148201", "ext" => "CB", "cargo" => "RESPONSABLE DE PROCESAMIENTO Y PRODUCCIÓN", "management_id" => 8, "location_id" => 16],
			["last_name" => "RUEDA", "mother_last_name" => "CHOQUE", "first_name" => "LUIS", "second_name" => "AUGUSTO", "ci" => "4310134", "ext" => "LP", "cargo" => "ENCARGADO DE SEGUIMIENTO AL PROCESAMIENTO DE ENDULZANTES", "management_id" => 8, "location_id" => 17],
			["last_name" => "VALDES", "mother_last_name" => "DURAN", "first_name" => "MARCOS", "second_name" => "RENE", "ci" => "4914410", "ext" => "LP", "cargo" => "AUXILIAR ADMINISTRATIVO I", "management_id" => 8, "location_id" => 18],

			["last_name" => "FREIRE", "mother_last_name" => "BUSTOS", "first_name" => "JAVIER", "second_name" => "DANTE", "ci" => "2714446", "ext" => "LP", "cargo" => "GERENTE EJECUTIVO", "management_id" => 9, "location_id" => 19],
			["last_name" => "TROCHE", "mother_last_name" => "MÁRQUEZ", "first_name" => "JACQUELINE", "second_name" => "DEL CARMEN", "ci" => "4275974", "ext" => "LP", "cargo" => "SECRETARIA DE GERENCIA", "management_id" => 9, "location_id" => 20],
			["last_name" => "CUSICANQUI", "mother_last_name" => "MARCA", "first_name" => "MARCOS", "second_name" => "", "ci" => "8413349", "ext" => "LP", "cargo" => "AUXILIAR DE MENSAJERÍA", "management_id" => 9, "location_id" => 21],
			["last_name" => "CANDIA", "mother_last_name" => "ROJAS", "first_name" => "VICENTE", "second_name" => "MARCELO", "ci" => "4774522", "ext" => "LP", "cargo" => "JEFE DE SEGURIDAD", "management_id" => 9, "location_id" => 22],
			["last_name" => "CHINO", "mother_last_name" => "QUISPE", "first_name" => "SAUL", "second_name" => "", "ci" => "4933310", "ext" => "LP", "cargo" => "CHOFER", "management_id" => 9, "location_id" => 23],

			["last_name" => "MARIA", "mother_last_name" => "ESTHER", "first_name" => "RIVAS", "second_name" => "DAVALOS", "ci" => "2048306 ", "ext" => "LP", "cargo" => "GERENTE COMERCIAL", "management_id" => 10, "location_id" => 24],
			["last_name" => "BRIGITTE", "mother_last_name" => "ANAHI", "first_name" => "JAUREGUI", "second_name" => "RAMÍREZ", "ci" => "8419362 ", "ext" => "LP", "cargo" => "ASISTENTE GERENCIA COMERCIAL", "management_id" => 10, "location_id" => 25],
			["last_name" => "ROSALIA", "mother_last_name" => "MALDONADO", "first_name" => "CHACÓN", "second_name" => "", "ci" => "4935318 ", "ext" => "LP", "cargo" => "RESPONSABLE DE COBRANZAS", "management_id" => 10, "location_id" => 1],
			["last_name" => "CHRISTIAN", "mother_last_name" => "BEIMAR", "first_name" => "SÁNCHEZ", "second_name" => "TROCHE", "ci" => "6750843 ", "ext" => "LP", "cargo" => "ENCARGADO DE COBRANZAS", "management_id" => 10, "location_id" => 4],
			["last_name" => "ADA", "mother_last_name" => "MILENKA", "first_name" => "CUETO", "second_name" => "CALLISAYA", "ci" => "6781928 ", "ext" => "LP", "cargo" => "TÉCNICO ENCARGADO COBRANZAS", "management_id" => 10, "location_id" => 5],
			["last_name" => "LIZETH", "mother_last_name" => "CONDE", "first_name" => "MENDOZA", "second_name" => "", "ci" => "8442643 ", "ext" => "LP", "cargo" => "AUXILIAR IV DE COBRANZAS", "management_id" => 10, "location_id" => 6],
			["last_name" => "CARLOS", "mother_last_name" => "ANDRES", "first_name" => "BOHRT", "second_name" => "EXENI", "ci" => "4822012 ", "ext" => "LP", "cargo" => "TÉCNICO EN MARKETING Y DISEÑO", "management_id" => 10, "location_id" => 7],
			["last_name" => "MIGUEL", "mother_last_name" => "LENIER", "first_name" => "IBAÑEZ", "second_name" => "VALDERRAMA", "ci" => "3467545 ", "ext" => "LP", "cargo" => "PROFESIONAL EN MARKETING", "management_id" => 10, "location_id" => 8],
			["last_name" => "SANDRA", "mother_last_name" => "FERNÁNDEZ", "first_name" => "ALANES", "second_name" => "", "ci" => "3396256 ", "ext" => "LP", "cargo" => "TÉCNICO V EN MARKETING Y DISEÑO", "management_id" => 10, "location_id" => 9],
			["last_name" => "MARVIN", "mother_last_name" => "LLANQUE", "first_name" => "CHÁVEZ", "second_name" => "", "ci" => "5960669 ", "ext" => "LP", "cargo" => "RESPONSABLE DE MERCADO EXTERNO", "management_id" => 10, "location_id" => 1],
			["last_name" => "DAVID", "mother_last_name" => "COARITE", "first_name" => "CUTILI", "second_name" => "", "ci" => "8419362 ", "ext" => "LP", "cargo" => "TÉCNICO V ALMACÉN DE EXPORTACIÓN", "management_id" => 10, "location_id" => 2],
			["last_name" => "JOSE", "mother_last_name" => "LUIS", "first_name" => "SANTOS", "second_name" => "CASTILLO", "ci" => "6754047 ", "ext" => "LP", "cargo" => "AUXILIAR V RUTEO MERCADO INTERNO", "management_id" => 10, "location_id" => 3],
			["last_name" => "CLAUDIA", "mother_last_name" => "ESTRELLA", "first_name" => "GARNICA", "second_name" => "MARAÑÓN", "ci" => "5732086 ", "ext" => "OR", "cargo" => "RESPONSABLE DE MERCADO INTERNO ABIERTO", "management_id" => 10, "location_id" => 4],
			["last_name" => "SAUL", "mother_last_name" => "ARUQUIPA", "first_name" => "PALACIOS", "second_name" => "", "ci" => "6096505 ", "ext" => "LP", "cargo" => "ENCARGADO MERCADO INTERNO ABIERTO", "management_id" => 10, "location_id" => 5],
			["last_name" => "RONALD", "mother_last_name" => "HÉCTOR", "first_name" => "VÁSQUEZ", "second_name" => "TERRAZAS", "ci" => "4283861 ", "ext" => "LP", "cargo" => "ENCARGADO DE VENTAS SUBSIDIOS LÁCTEOS", "management_id" => 10, "location_id" => 6],
			["last_name" => "MAYORI", "mother_last_name" => "VERA", "first_name" => "GARCÍA", "second_name" => "", "ci" => "6992894 ", "ext" => "LP", "cargo" => "ENCARGADA SUBSIDIO AMAZÓNICO FRUTÍCOLAS Y ENDULZANTES", "management_id" => 10, "location_id" => 7],

			["last_name" => "VLADIMIR", "mother_last_name" => "ELIDORO", "first_name" => "CÓRDOVA", "second_name" => "DURAN", "ci" => "3423881", "ext" => "LP", "cargo" => "ENCARGADO DE DISTRIBUCIÓN MERCADO INTERNO", "management_id" => 10, "location_id" => 8],
			["last_name" => "ALBERTO", "mother_last_name" => "CLAROS", "first_name" => "HENRY", "second_name" => "", "ci" => "6954646", "ext" => "LP", "cargo" => "OPERADOR DE ALMACÉN LACTEOS Y FRUTÍCOLAS", "management_id" => 10, "location_id" => 9],
			["last_name" => "HUGO", "mother_last_name" => "OLDRICH", "first_name" => "GEIER", "second_name" => "SARDON", "ci" => "2386408", "ext" => "LP", "cargo" => "TÉCNICO EN DISTRIBUCIÓN", "management_id" => 10, "location_id" => 1],
			["last_name" => "CARLOS", "mother_last_name" => "FERNANDO", "first_name" => "APAZA", "second_name" => "MAMANI", "ci" => "7018567", "ext" => "LP", "cargo" => "TÉCNICO EN REPOSICIÓN PUNTOS DE VENTA EXTERNOS", "management_id" => 10, "location_id" => 2],
			["last_name" => "DAVID", "mother_last_name" => "LÓPEZ", "first_name" => "", "second_name" => "", "ci" => "9171514", "ext" => "LP", "cargo" => "OPERADOR DE ALMACÉN AMAZÓNICOS Y ENDULZANTES", "management_id" => 10, "location_id" => 3],
			["last_name" => "FAUSTO", "mother_last_name" => "RENE", "first_name" => "COVARRUBIAS", "second_name" => "FERNÁNDEZ", "ci" => "6973441", "ext" => "LP", "cargo" => "TÉCNICO EN MERCADO INTERNO", "management_id" => 10, "location_id" => 4],
			["last_name" => "GABRIELA", "mother_last_name" => "COPA", "first_name" => "MAMANI", "second_name" => "", "ci" => "5942844", "ext" => "LP", "cargo" => "ASISTENTE SUPERVISORA RUTEO -1 DISTRIBUIDORA VILLA FÁTIMA", "management_id" => 10, "location_id" => 5],
			["last_name" => "ARIEL", "mother_last_name" => "MAMANI", "first_name" => "ROYER", "second_name" => "", "ci" => "9955610", "ext" => "LP", "cargo" => "REPONEDOR SUPERMERCADO", "management_id" => 10, "location_id" => 6],
			["last_name" => "MARCO", "mother_last_name" => "ANTONIO", "first_name" => "NIZTAZA", "second_name" => "ALEGRIA", "ci" => "9289224", "ext" => "LP", "cargo" => "REPONEDOR SUPERMERCADO", "management_id" => 10, "location_id" => 7],
			["last_name" => "ALINE", "mother_last_name" => "CLAUDIA", "first_name" => "ALCOBA", "second_name" => "CLEMENTE", "ci" => "6972796", "ext" => "LP", "cargo" => "VENDEDOR TELEFÉRICO LÍNEA ROJA", "management_id" => 10, "location_id" => 8],
			["last_name" => "EVELIN", "mother_last_name" => "LUNA", "first_name" => "SALAZAR", "second_name" => "", "ci" => "10921666", "ext" => "LP", "cargo" => "AUXILIAR VENDEDORA", "management_id" => 10, "location_id" => 9],
			["last_name" => "REYNA", "mother_last_name" => "LUCIA", "first_name" => "SONCO", "second_name" => "ALIANA", "ci" => "6864819", "ext" => "LP", "cargo" => "AUXILIAR VENDEDORA", "management_id" => 10, "location_id" => 1],
			["last_name" => "WILSON", "mother_last_name" => "HUANCA", "first_name" => "", "second_name" => "", "ci" => "8284899", "ext" => "LP", "cargo" => "CHOFER", "management_id" => 10, "location_id" => 1],
			["last_name" => "SALAZAR", "mother_last_name" => "BOTELLO", "first_name" => "MILTON", "second_name" => "", "ci" => "5979018", "ext" => "LP", "cargo" => "CHOFER MERCADO INTERNO II", "management_id" => 10, "location_id" => 2],
		];

		foreach ($employees as $employee) {
			$item = (object) $employee;
			$city = City::where("shortened", 'like', $item->ext)->first();
			$position = Position::where('name', 'like', $item->cargo)->first();

			if ($city) {
				// Log::info($city->shortened);
			} else {
				Log::error("no se encontro la ext..." . $item->ext);
			}
			if ($position) {

			} else {
				Log::error("no se encontro el cargo.." . $item->cargo . "_");
			}
			if (isset($item->unit_id)) {
				$empleado = [
					"last_name" => $item->last_name,
					"mother_last_name" => $item->mother_last_name,
					"first_name" => $item->first_name,
					"second_name" => $item->second_name,
					"identity_card" => $item->ci,
					"city_identity_card_id" => $city->id,
					"position_id" => $position->id,
					"management_id" => $item->management_id,
					"unit_id" => $item->unit_id,
					"location_id" => $item->location_id,
					"date_reception" => '2019-10-11',
				];
			} else {
				$empleado = [
					"last_name" => $item->last_name,
					"mother_last_name" => $item->mother_last_name,
					"first_name" => $item->first_name,
					"second_name" => $item->second_name,
					"identity_card" => $item->ci,
					"city_identity_card_id" => $city->id,
					"position_id" => $position->id,
					"management_id" => $item->management_id,
					"location_id" => $item->location_id,
					"date_reception" => '2019-10-11',

				];
			}
			Employee::create($empleado);
			// Log::info(json_encode($item->ci));
		}

	}
}
