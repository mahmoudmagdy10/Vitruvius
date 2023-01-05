<?php
namespace Vitruvius\Project\Services;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use Vitruvius\Project\Models\Project;
use Vitruvius\Project\Models\Prop;

class PropsService
{
    public function __construct()
    {
    }

    public function upload(Request $request) {

        // Open CSV && Save in DB
        try{
            $project = Project::where('user_id', '=', Auth::user()->id)->latest()->first();

            $csv_props = [];
            if (($open = fopen($request->csv, "r")) !== FALSE) {
                while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                    $csv_props[] = $data;
                }

                fclose($open);
            }

            Prop::create([
                "PREDICTION"=>$csv_props[1][0],
                "OverallQual"=>$csv_props[1][1],
                "Neighborhood"=>$csv_props[1][2],
                "GrLivArea"=>$csv_props[1][3],
                "GarageCars"=>$csv_props[1][4],
                "BsmtQual"=>$csv_props[1][5],
                "ExterQual"=>$csv_props[1][6],
                "GarageArea"=>$csv_props[1][7],
                "KitchenQual"=>$csv_props[1][8],
                "YearBuilt"=>$csv_props[1][9],
                "TotalBsmtSF"=>$csv_props[1][10],
                "FirstFlrSF"=>$csv_props[1][11],
                "GarageFinish"=>$csv_props[1][12],
                "FullBath"=>$csv_props[1][13],
                "YearRemodAdd"=>$csv_props[1][14],
                "GarageType"=>$csv_props[1][15],
                "FireplaceQu"=>$csv_props[1][16],
                "Foundation"=>$csv_props[1][17],
                "MSSubClass"=>$csv_props[1][18],
                "TotRmsAbvGrd"=>$csv_props[1][19],
                "Fireplaces"=>$csv_props[1][20],
                "user_id" => Auth::user()->id,
                "project_id" => $project->id,
            ]);
            // return redirect()->route('customer.payment',$request->project_id);
            return redirect()->route('upload')->with('success', "Saved Successfully :)");
            // return "Saved";

        } catch (\Exception $e) {

            return redirect()->route('upload')->with('error', "Not Saved !!");
            // return "nooo";

        }


    }



}
