<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{
    public function import_csv(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);
        $file = $request->file('file');
        $handle = fopen($file->path(), 'r');

        $contents = file_get_contents($file->path());

        $rows = explode(PHP_EOL, $contents);
        $data = [];
        foreach ($rows as $row) {
            //$data[] = str_getcsv($row,',');
        }
        while (($row = fgetcsv($handle, 0, ';')) !== false) {
            # code...
            $data[] = $row;
        }
        fclose($handle);
        for ($i = 0; $i < count($data); $i++) {
            // $typeCat = $data[$i][1];
            $codeCat = $data[$i][2];
            $codeDis = $data[$i][4];
            $categorieDetailid = [];
            $disciplineid = [];
            // $categorieid = [];
            $categorieDetailid = DB::select('select cd.id from categorie_details cd where cd.code=\'' . $codeCat . '\'');
            $disciplineid = DB::select('select d.id from disciplines d where d.code=\'' . $codeDis . '\'');
            // $categorieid = DB::select('select c.id from categories c where cd.code=\'' . $typeCat . '\'');
            DB::table('mouvements')->insert([
                'date' =>  $data[$i][0],
                'categoriedetailid' => $categorieDetailid[0]->id,
                'disciplineid' => $disciplineid[0]->id,
                'montant' => $data[$i][3]
            ]);
        }
        return back()->with('success', 'Fichier csv importer avec succès');
    }
}
