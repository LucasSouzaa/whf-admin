<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Usuario;
use App\Rules\CpfUnico;
use Carbon\Carbon;

class UsuarioCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuarios.listar', [
          'usuarios' => Usuario::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.createUpdate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = request()->validate([
            'nome' => 'required|string',
            'email' => 'required|email|unique:usuarios',
            'nascimento' => 'required|date_format:d/m/Y',
            'cpf' => ['required', new CpfUnico],
            'senha' => 'required|string|min:6|confirmed',
            'foto' => 'required|url'
        ]);

        $usuario = new Usuario([
            'nome' => $form['nome'],
            'email' => $form['email'],
            'nascimento' => Carbon::createFromFormat('d/m/Y', $form['nascimento'])->format('Y-m-d'),
            'cpf' => cleanCpf($form['cpf']),
            'senha' => bcrypt($form['senha']),
            'foto' => $form['foto']
        ]);
        $usuario->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('usuarios.createUpdate')->with('usuario', Usuario::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = [
            'nome' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('usuarios')->ignore($id)
            ],
            'nascimento' => 'required|date_format:d/m/Y',
            'cpf' => ['required', new CpfUnico(['ignore' => $id])],
            'foto' => 'required|url',
            'status' => 'required'
        ];

        if (request()->post('senha')) {
            $inputs['senha'] = 'required|string|min:6|confirmed';
        }

        $form = request()->validate($inputs);

        $usuario = Usuario::find($id);

        $usuario->nome = $form['nome'];
        $usuario->email = $form['email'];
        $usuario->nascimento = Carbon::createFromFormat('d/m/Y', $form['nascimento'])->format('Y-m-d');
        $usuario->cpf = cleanCpf($form['cpf']);
        $usuario->foto = $form['foto'];
        $usuario->status = $form['status'];

        if (isset($form['senha'])) {
            $usuario->senha = bcrypt($form['senha']);
        }

        $usuario->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Usuario::destroy($id);
    }

    public function updateStatus()
    {
        $id = request()->post('id');
        $status = request()->post('status');

        if ($id && $status) {
            $usuario = Usuario::find($id);
            $usuario->status = $status;
            $usuario->save();
        }
    }
}
