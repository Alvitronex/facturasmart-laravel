<?php

namespace App\Http\Controllers;

use App\Models\ActividadEconomica;
use App\Models\Cliente;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Pais;
use App\Models\TipoContribuyente;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::with([
            'tipoDocumento',
            'actividadEconomica',
            'departamento',
            'municipio',
            'tipoContribuyente',
            'pais',
        ])->orderByDesc('id_catalogo_cliente')->get();

        $catalogos        = $this->catalogos();
        $municipiosPorDep = $this->municipiosPorDep();

        return view('clientes.index', compact('clientes', 'catalogos', 'municipiosPorDep'));
    }

    public function create()
    {
        $catalogos        = $this->catalogos();
        $municipiosPorDep = $this->municipiosPorDep();

        return view('clientes.create', compact('catalogos', 'municipiosPorDep'));
    }

    public function store(Request $request)
    {
        Cliente::create($request->except(['_token', '_method']));
        return redirect()->route('clientes.index')->with('msg', 'creado');
    }

    public function edit(Cliente $cliente)
    {
        $catalogos        = $this->catalogos();
        $municipiosPorDep = $this->municipiosPorDep();

        return view('clientes.edit', compact('cliente', 'catalogos', 'municipiosPorDep'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->except(['_token', '_method']));
        return redirect()->route('clientes.index')->with('msg', 'actualizado');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('msg', 'eliminado');
    }

    public function municipios($cod)
    {
        $municipios = Municipio::where('cod_mh_departamento', $cod)
            ->orderBy('municipio')
            ->get(['id_municipio', 'municipio']);

        return response()->json($municipios);
    }


    private function catalogos(): array
    {
        return [
            'tipos_documento'     => TipoDocumento::where('estado', '1')->get(),
            'departamentos'       => Departamento::where('estado', '1')
                ->orderBy('departamento')
                ->get(),
            'tipos_contribuyente' => TipoContribuyente::where('estado', '1')->get(),
            'actividades'         => ActividadEconomica::where('estado', '1')
                ->orderBy('actividad_economica')
                ->get(),
            'paises'              => Pais::where('estado', 1)
                ->orderBy('nombre_pais')
                ->get(),
        ];
    }

    private function municipiosPorDep(): array
    {
        $agrupados = [];

        foreach (Municipio::orderBy('municipio')->get() as $m) {
            $agrupados[$m->cod_mh_departamento][] = [
                'id_municipio' => $m->id_municipio,
                'municipio'    => $m->municipio,
            ];
        }

        return $agrupados;
    }

}
