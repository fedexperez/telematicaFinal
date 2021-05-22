<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\HtmlString;
use Mail; //Importante incluir la clase Mail, que será la encargada del envío

class EmailController extends Controller
{
    
    public function stats(){
        
        $data = [];
        $data['total'] = School::all()->count();
        $data['comuna1'] = School::where('comuna', 1)->count();
        $data['comuna2'] = School::where('comuna', 2)->count();
        $data['comuna3'] = School::where('comuna', 3)->count();
        $data['comuna4'] = School::where('comuna', 4)->count();
        $data['comuna5'] = School::where('comuna', 5)->count();
        $data['comuna6'] = School::where('comuna', 6)->count();
        $data['comuna7'] = School::where('comuna', 7)->count();
        $data['comuna8'] = School::where('comuna', 8)->count();
        $data['comuna9'] = School::where('comuna', 9)->count();
        $data['comuna10'] = School::where('comuna', 10)->count();

        $data['total_medicina'] = School::where('carrera', 'Medicina')->count();
        $data['total_ingenieria'] = School::where('carrera', 'Ingenieria')->count();
        $data['total_abogacia'] = School::where('carrera', 'Abogacia')->count();
        $data['total_licenciatura'] = School::where('carrera', 'Licenciatura')->count();
        
        $data['comuna1_medicina'] = School::where('comuna', 1)->where('carrera', 'Medicina')->count();
        $data['comuna1_ingenieria'] = School::where('comuna', 1)->where('carrera', 'Ingenieria')->count();
        $data['comuna1_abogacia'] = School::where('comuna', 1)->where('carrera', 'Abogacia')->count();
        $data['comuna1_licenciatura'] = School::where('comuna', 1)->where('carrera', 'Licenciatura')->count();

        $data['comuna2_medicina'] = School::where('comuna', 2)->where('carrera', 'Medicina')->count();
        $data['comuna2_ingenieria'] = School::where('comuna', 2)->where('carrera', 'Ingenieria')->count();
        $data['comuna2_abogacia'] = School::where('comuna', 2)->where('carrera', 'Abogacia')->count();
        $data['comuna2_licenciatura'] = School::where('comuna', 2)->where('carrera', 'Licenciatura')->count();
        
        $data['comuna3_medicina'] = School::where('comuna', 3)->where('carrera', 'Medicina')->count();
        $data['comuna3_ingenieria'] = School::where('comuna', 3)->where('carrera', 'Ingenieria')->count();
        $data['comuna3_abogacia'] = School::where('comuna', 3)->where('carrera', 'Abogacia')->count();
        $data['comuna3_licenciatura'] = School::where('comuna', 3)->where('carrera', 'Licenciatura')->count();
        
        $data['comuna4_medicina'] = School::where('comuna', 4)->where('carrera', 'Medicina')->count();
        $data['comuna4_ingenieria'] = School::where('comuna', 4)->where('carrera', 'Ingenieria')->count();
        $data['comuna4_abogacia'] = School::where('comuna', 4)->where('carrera', 'Abogacia')->count();
        $data['comuna4_licenciatura'] = School::where('comuna', 4)->where('carrera', 'Licenciatura')->count();
        
        $data['comuna5_medicina'] = School::where('comuna', 5)->where('carrera', 'Medicina')->count();
        $data['comuna5_ingenieria'] = School::where('comuna', 5)->where('carrera', 'Ingenieria')->count();
        $data['comuna5_abogacia'] = School::where('comuna', 5)->where('carrera', 'Abogacia')->count();
        $data['comuna5_licenciatura'] = School::where('comuna', 5)->where('carrera', 'Licenciatura')->count();
        
        $data['comuna6_medicina'] = School::where('comuna', 6)->where('carrera', 'Medicina')->count();
        $data['comuna6_ingenieria'] = School::where('comuna', 6)->where('carrera', 'Ingenieria')->count();
        $data['comuna6_abogacia'] = School::where('comuna', 6)->where('carrera', 'Abogacia')->count();
        $data['comuna6_licenciatura'] = School::where('comuna', 6)->where('carrera', 'Licenciatura')->count();
        
        $data['comuna7_medicina'] = School::where('comuna', 7)->where('carrera', 'Medicina')->count();
        $data['comuna7_ingenieria'] = School::where('comuna', 7)->where('carrera', 'Ingenieria')->count();
        $data['comuna7_abogacia'] = School::where('comuna', 7)->where('carrera', 'Abogacia')->count();
        $data['comuna7_licenciatura'] = School::where('comuna', 7)->where('carrera', 'Licenciatura')->count();
        
        $data['comuna8_medicina'] = School::where('comuna', 8)->where('carrera', 'Medicina')->count();
        $data['comuna8_ingenieria'] = School::where('comuna', 8)->where('carrera', 'Ingenieria')->count();
        $data['comuna8_abogacia'] = School::where('comuna', 8)->where('carrera', 'Abogacia')->count();
        $data['comuna8_licenciatura'] = School::where('comuna', 8)->where('carrera', 'Licenciatura')->count();
        
        $data['comuna9_medicina'] = School::where('comuna', 9)->where('carrera', 'Medicina')->count();
        $data['comuna9_ingenieria'] = School::where('comuna', 9)->where('carrera', 'Ingenieria')->count();
        $data['comuna9_abogacia'] = School::where('comuna', 9)->where('carrera', 'Abogacia')->count();
        $data['comuna9_licenciatura'] = School::where('comuna', 9)->where('carrera', 'Licenciatura')->count();

        $data['comuna10_medicina'] = School::where('comuna', 10)->where('carrera', 'Medicina')->count();
        $data['comuna10_ingenieria'] = School::where('comuna', 10)->where('carrera', 'Ingenieria')->count();
        $data['comuna10_abogacia'] = School::where('comuna', 10)->where('carrera', 'Abogacia')->count();
        $data['comuna10_licenciatura'] = School::where('comuna', 10)->where('carrera', 'Licenciatura')->count();


        

        Mail::send([], [], function ($message) use ($data) {
            $message->from("plus.live153@gmail.com","ProyectoTelematica")
              ->to("ialondonoo@eafit.edu.co")
              ->subject("Estadisticas solicitadas por Ignacio")
              ->setBody(new HtmlString(
                  "\n Usuarios en total: {$data['total']} \n
                   Medicina: {$data['total_medicina']} - Ingeniería: {$data['total_ingenieria']} - Abogacía: {$data['total_abogacia']} - Licenciatura: {$data['total_licenciatura']} \n\n

                   Usuarios en la comuna 1: {$data['comuna1']} \n
                   Medicina: {$data['comuna1_medicina']} - Ingeniería: {$data['comuna1_ingenieria']} - Abogacía: {$data['comuna1_abogacia']} - Licenciatura: {$data['comuna1_licenciatura']} \n\n

                   Usuarios en la comuna 2: {$data['comuna2']} \n
                   Medicina: {$data['comuna2_medicina']} - Ingeniería: {$data['comuna2_ingenieria']} - Abogacía: {$data['comuna2_abogacia']} - Licenciatura: {$data['comuna2_licenciatura']} \n\n

                   Usuarios en la comuna 3: {$data['comuna3']} \n
                   Medicina: {$data['comuna3_medicina']} - Ingeniería: {$data['comuna3_ingenieria']} - Abogacía: {$data['comuna3_abogacia']} - Licenciatura: {$data['comuna3_licenciatura']} \n\n

                   Usuarios en la comuna 4: {$data['comuna4']} \n
                   Medicina: {$data['comuna4_medicina']} - Ingeniería: {$data['comuna4_ingenieria']} - Abogacía: {$data['comuna4_abogacia']} - Licenciatura: {$data['comuna4_licenciatura']} \n\n

                   Usuarios en la comuna 5: {$data['comuna5']} \n
                   Medicina: {$data['comuna5_medicina']} - Ingeniería: {$data['comuna5_ingenieria']} - Abogacía: {$data['comuna5_abogacia']} - Licenciatura: {$data['comuna5_licenciatura']} \n\n

                   Usuarios en la comuna 6: {$data['comuna6']} \n
                   Medicina: {$data['comuna6_medicina']} - Ingeniería: {$data['comuna6_ingenieria']} - Abogacía: {$data['comuna6_abogacia']} - Licenciatura: {$data['comuna6_licenciatura']} \n\n

                   Usuarios en la comuna 7: {$data['comuna7']} \n
                   Medicina: {$data['comuna7_medicina']} - Ingeniería: {$data['comuna7_ingenieria']} - Abogacía: {$data['comuna7_abogacia']} - Licenciatura: {$data['comuna7_licenciatura']} \n\n

                   Usuarios en la comuna 8: {$data['comuna8']} \n
                   Medicina: {$data['comuna8_medicina']} - Ingeniería: {$data['comuna8_ingenieria']} - Abogacía: {$data['comuna8_abogacia']} - Licenciatura: {$data['comuna8_licenciatura']} \n\n

                   Usuarios en la comuna 9: {$data['comuna9']} \n
                   Medicina: {$data['comuna9_medicina']} - Ingeniería: {$data['comuna9_ingenieria']} - Abogacía: {$data['comuna9_abogacia']} - Licenciatura: {$data['comuna9_licenciatura']} \n\n

                   Usuarios en la comuna 10: {$data['comuna10']} \n
                   Medicina: {$data['comuna10_medicina']} - Ingeniería: {$data['comuna10_ingenieria']} - Abogacía: {$data['comuna10_abogacia']} - Licenciatura: {$data['comuna10_licenciatura']} \n\n

                   "
                  ));
        }); 
        
        $message = Lang::get('messages.succesfull_mail');
        return redirect()->back()->with('successmail', $message);
    }

      
}
