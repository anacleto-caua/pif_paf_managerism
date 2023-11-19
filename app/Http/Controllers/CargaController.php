<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carga;
use App\Models\User;

class CargaController extends Controller
{
    /**
     * Open the carga adding page
     */
    public function add(Request $request){

        $cargas = Carga::with('user')->get()->sortBy('preferencia'); // Ou alguma outra forma de obter seus dados

        $produtores = User::all()->where('role', '=', 'produtor');

        return view('carga.add', [
            'user' => $request->user(),
            'produtores' => $produtores,
            'cargas' => $cargas,
        ]);
    }

    /**
     * Save the carga record and returnt to carga add route
     */
    public function save(Request $request){

        $request->validate([
            'qtde_aves' => ['required'],
            'produtor' => ['required'],
            'sexo' => ['required'],
            'peso_medio_ave' => ['required'],
            'aves_por_caixa' => ['required'],
            'data' => ['required'],
            'inicio_jejum' => ['required'],
            'horario' => ['required'],
            'turma_apanhado' => ['required'],
            'dias_vida' => ['required'],
            'horario_previsto_entrega' => ['required'],
            'horario_previsto_inicio_abate' => ['required'],
            'preferencia' => [],
        ]);

        // Initialize a new instance of Carga model
        $carga = new Carga;

        // Assign values to the attributes
        $carga->qtde_aves = $request->qtde_aves;
        $carga->produtor = $request->produtor;
        $carga->sexo = $request->sexo;
        $carga->peso_medio_ave = $request->peso_medio_ave;
        $carga->aves_por_caixa = $request->aves_por_caixa;
        $carga->data = $request->data;
        $carga->inicio_jejum = $request->inicio_jejum;
        $carga->horario = $request->horario;
        $carga->turma_apanhado = $request->turma_apanhado;
        $carga->dias_vida = $request->dias_vida;
        $carga->horario_previsto_entrega = $request->horario_previsto_entrega;
        $carga->horario_previsto_inicio_abate = $request->horario_previsto_inicio_abate;
        $carga->preferencia = 0;

        // Save the new instance to the database
        $carga->save();

        return redirect()->route('carga.add', ['last_carga' => $carga]);
    }
}
