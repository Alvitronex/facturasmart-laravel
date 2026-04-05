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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::with([  // ← plural aquí
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->limpiarNulos($request->except('_token'));
        Cliente::create($data);
        return redirect()->route('clientes.index')->with('msg', 'creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $data = $this->limpiarNulos($request->except(['_token', '_method']));
        $cliente->update($data);
        return redirect()->route('clientes.index')->with('msg', 'actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('msg', 'eliminado');
    }

    // AJAX: devuelve municipios de un departamento
    public function municipios($id)
    {
        $municipios = Municipio::where('cod_mh_departamento', $id)
            ->orderBy('municipio')
            ->get(['id_municipio', 'municipio']);
        return response()->json($municipios);
    }

    // ── Helpers privados ────────────────────────────────────

    private function catalogos(): array
    {
        return [
            'tipos_documento'     => TipoDocumento::where('estado', '1')->get(),
            'departamentos'       => Departamento::where('estado', '1')->orderBy('departamento')->get(),
            'tipos_contribuyente' => TipoContribuyente::where('estado', '1')->get(),
            'actividades'         => ActividadEconomica::where('estado', '1')->orderBy('actividad_economica')->get(),
            'paises'              => Pais::where('estado', 1)->orderBy('nombre_pais')->get(),
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

    // Convierte strings vacíos en null (igual que el PHP original)
    private function limpiarNulos(array $data): array
    {
        return array_map(fn($v) => $v === '' ? null : $v, $data);
    }
}
