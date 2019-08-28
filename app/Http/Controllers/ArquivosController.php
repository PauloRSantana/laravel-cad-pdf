<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arquivo;
use Illuminate\Support\Facades\Input;
use Storage;

class ArquivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //LIST
        // return \App\Arquivos::all();
        $arquivos = Arquivo::all();
      
        return view('arquivo.index')->with(['arquivos' => $arquivos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('arquivo.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;
        
        // upload arquivo ------[INÍCIO]---------------------------------------------------->
            // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $nameOriginal = $request->imagem->getClientOriginalName();
            $nameOriginalSemExtensao = substr($nameOriginal, 0, -4);

            // Define um aleatório para o arquivo baseado no timestamps atual
            // $name = uniqid(date('HisYmd'));  ATIGO, USANDO O UNIQID FICA MUITO GRANDE O NOME DO ARQUIVO
            $name = date('HisYmd');
           
            // Recupera a extensão do arquivo
            $extension = $request->imagem->extension();

            // Define finalmente o nome
            $nameFile = "{$nameOriginalSemExtensao}_{$name}.{$extension}";
            
            // Faz o upload:
            $upload = $request->imagem->storeAs('categories', $nameFile);
            // OBS: Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload ){
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();
            }
        }
        // upload arquivo ------[FIM]---------------------------------------------------->
        
        //INSERT DO FORM, CAMPOS INPUTs--------INICIO--------
        $dados = $request->all();
        $dados["imagem"] = $nameFile;
        
        Arquivo::create($dados);
        //INSERT DO FORM, CAMPOS INPUTs--------FIM------------

        return back()->with(['success' => 'Arquivo inserido com sucesso!']);
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
        $arquivos = Arquivo::findOrFail($id);
        return view('arquivo.edit', compact('arquivos'));
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
        // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;
        
        // upload arquivo ------[INÍCIO]---------------------------------------------------->
            // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $nameOriginal = $request->imagem->getClientOriginalName();
            $nameOriginalSemExtensao = substr($nameOriginal, 0, -4);
            // Define um aleatório para o arquivo baseado no timestamps atual
            // $name = uniqid(date('HisYmd'));  ATIGO, USANDO O UNIQID FICA MUITO GRANDE O NOME DO ARQUIVO
            $name = date('HisYmd');
            
            // Recupera a extensão do arquivo
            $extension = $request->imagem->extension();
            
            // Define finalmente o nome
            $nameFile = "{$nameOriginalSemExtensao}_{$name}.{$extension}";
            
            // Faz o upload:
            $upload = $request->imagem->storeAs('categories', $nameFile);
            // OBS: Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload ){
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();
            }
        }
        // upload arquivo ------[FIM]---------------------------------------------------->

        $arquivo = $request->all(); 
        $arquivo["imagem"]= $nameFile;      

        $id = Arquivo::findOrFail($id);
        $id->update($arquivo);
        
        return back()->with(['success' => 'Arquivo editado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $id = Arquivo::findOrFail($id);
        $id->delete($id);

        return back()->with(['success' => 'Arquivo excluido com sucesso!']);

    }

    public function getFile($id){
        //
        //$arquivo = Arquivo::findOrFail($id);

        //echo file_get_contents(public_path('storage/categories/'.$arquivo->imagem));
    //die;
    }

    public function download()
    {
        return view ('arquivo.download');
    }

    


    /**
     * @param $file
     * @return \Illuminate\Http\UploadedFile
     */
    public function move()
    {
        $file = Request::file('photo'); //note que 'photo' remete ao nome do campo no formulário
        var_dump($file);   
    }
}
