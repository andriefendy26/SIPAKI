<?php

namespace App\Http\Controllers;

use App\Exports\ReportsExport;
use App\Http\Controllers\Controller;
use App\Models\Evidence;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

use function Livewire\str;

class ReportsController extends Controller
{

    public function index(Request $request)
    {
        try {

            $search = $request->query('search');

            $query = Report::with(['classification', 'unit', 'evidence'])
                        ->where('user_id', Auth::id())
                        ->latest();

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('description', 'like', "%$search%")
                    ->orWhere('report_date', 'like', "%$search%")
                    ->orWhereHas('classification', function ($q2) use ($search) {
                        $q2->where('name', 'like', "%$search%");
                    })
                    ->orWhereHas('unit', function ($q3) use ($search) {
                        $q3->where('name', 'like', "%$search%");
                    });
                });
            }

            $data = $query->get();

            return response()->json([
                "status" => 200,
                "data" => $data,
                "message" => "Berhasil mengambil data laporan"
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "status"=> 400,
                "message" => $e->getMessage()
            ], 400);
        }
    }


    public function store(Request $request)
    {
        DB::beginTransaction();

        // $request->merge(['user_id' => $user_id_auth]);
        // $request->user_id = $user_id_auth;
        
        try {
            $user_id_auth = Auth::id();
            
            $validator = Validator::make($request->all(), [
                // "user_id"           => 'required|exists:table,column',
                'classification_id' => 'required|exists:classifications,id',
                'unit_id'           => 'required|exists:units,id',
                'report_date'       => 'required|date',
                'description'       => 'required|string',
                'target'            => 'required|numeric',
                'realization'       => 'required|numeric',
                'achievement'       => 'required|numeric'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => 422,
                    "message" => $validator->errors()
                ], 422);
            }

            $req = [
                'user_id'           => $user_id_auth,
                'classification_id' => $request->classification_id,
                'unit_id'           => $request->unit_id,
                'report_date'       => $request->report_date,
                'description'       => $request->description,
                'target'            => $request->target,
                'realization'       => $request->realization,
                'achievement'       => $request->achievement,
            ];

            // $data = Report::create($request->all());

            $data = Report::create($req);

            DB::commit();

            return response()->json([
                "status" => 200,
                "data" => $data,
                "message"=> "Berhasil menambahkan data laporan"
            ], 200);

        } catch (\Exception $e) {
            // DB::rollBack();

            return response()->json([
                "status"=> 400,
                "message" => $e->getMessage()
            ], 400);
        }
    }

    // public function store(Request $request)
    // {
    //     // Pastikan user login
    //     if (!auth()->check()) {
    //         return response()->json([
    //             "status" => 401,
    //             "message" => "Unauthorized"
    //         ], 401);
    //     }

    //     try {
    //         $user_id_auth = auth()->user()->id;

    //         // Validasi request
    //         $validated = $request->validate([
    //             'classification_id' => 'required|exists:classifications,id',
    //             'unit_id'           => 'required|exists:units,id',
    //             'report_date'       => 'required|date',
    //             'description'       => 'required|string',
    //             'target'            => 'required|numeric|min:0',
    //             'realization'       => 'required|numeric|min:0',
    //             'achievement'       => 'required|numeric|min:0'
    //         ]);

    //         // Simpan dalam transaction
    //         $data = DB::transaction(function () use ($validated, $user_id_auth) {
    //             return Report::create([
    //                 'user_id'           => $user_id_auth,
    //                 'classification_id' => $validated['classification_id'],
    //                 'unit_id'           => $validated['unit_id'],
    //                 'report_date'       => $validated['report_date'],
    //                 'description'       => $validated['description'],
    //                 'target'            => $validated['target'],
    //                 'realization'       => $validated['realization'],
    //                 'achievement'       => $validated['achievement'],
    //             ]);
    //         });

    //         return response()->json([
    //             "status" => 200,
    //             "data" => $data,
    //             "message" => "Berhasil menambahkan data laporan"
    //         ], 200);

    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         return response()->json([
    //             "status" => 422,
    //             "message" => $e->errors()
    //         ], 422);

    //     } catch (\Exception $e) {
    //         return response()->json([
    //             "status" => 500,
    //             "message" => $e->getMessage()
    //         ], 500);
    //     }
    // }
    public function show($id)
    {
        try {
            $data = Report::with(['classification', 'unit', 'evidence'])
                        ->findOrFail($id);

            return response()->json([
                "status" => 200,
                "data" => $data,
                "message" => "Berhasil mengambil detail laporan"
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "status"=> 400,
                "message" => "Data tidak ditemukan"
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $data = Report::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'classification_id' => 'required|exists:classifications,id',
                'unit_id'           => 'required|exists:units,id',
                'report_date'       => 'required|date',
                'description'       => 'required|string',
                'target'            => 'required|numeric',
                'realization'       => 'required|numeric',
                'achievement'       => 'required|numeric'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => 422,
                    "message" => $validator->errors()
                ], 422);
            }

            $data->update($request->all());

            DB::commit();

            return response()->json([
                "status" => 200,
                "data" => $data,
                "message"=> "Berhasil mengupdate data"
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                "status"=> 400,
                "message" => $e->getMessage()
            ], 400);
        }
    }

    public function updatePartial(Request $request, $id){
        DB::beginTransaction();

        try {
            $data = Report::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'classification_id' => 'sometimes|exists:classifications,id',
                'unit_id'           => 'sometimes|exists:units,id',
                'report_date'       => 'sometimes|date',
                'description'       => 'sometimes|string',
                'target'            => 'sometimes|numeric',
                'realization'       => 'sometimes|numeric',
                'achievement'       => 'sometimes|numeric',
                // 'evidence'          => 'sometimes|image|mimes:jpg,jpeg,png,webp|max:2048'
            ]);

            if($validator->fails()){
                return response()->json([
                    'status'=> 422,
                    'message'=> $validator->errors()
                ], 422);
            }

            $updateData = $request->all();
            
            if(!empty($updateData)){
                $data->update($updateData);
            }
            
            DB::commit();

            return response()->json([
                "status" => 200,
                "data" => $data->load(['classification','unit','evidence']),
                "message" => "Berhasil update sebagian data laporan"
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                "status"=> 400,
                "message" => $e->getMessage()
            ], 400);
        }
      
        
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $data = Report::findOrFail($id);

            // hapus evidence terkait jika perlu
            $data->evidence()->delete();

            $data->delete();

            DB::commit();

            return response()->json([
                "status" => 200,
                "message" => "Berhasil menghapus data laporan"
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                "st+atus"=> 400,
                "message" => $e->getMessage()
            ], 400);
        }
    }

    // public function export() 
    // {
    //     $user = User::findOrFail(Auth::id());
    //     $fileName = 'laporan-' . $user->name . '-' . time() . '.xlsx';

    //     Excel::store(new ReportsExport(), $fileName, 'public');

    //     $url = asset('storage/' . $fileName);

    //     return response()->json([
    //         'message' => 'Export berhasil',
    //         'url' => $url
    //     ]);
    //     // Excel::store(new ReportsExport, 'laporan/laporan-harian.xlsx', 'public');
    //     return Excel::download(new ReportsExport, $fileName);
    // }
    public function exportByDate(Request $request)
    {
        $start = $request->start_date;
        $end = $request->end_date;

        // optionally allow caller to supply additional sheet data
        $ikiData = $request->input('iki_data', []);
        $mrData = $request->input('mr_data', []);

        $fileName = "laporan_{$start}_{$end}.xlsx";

        Excel::store(
            new ReportsExport($start, $end, $ikiData, $mrData),
            "exports/$fileName",
            'public'
        );

        return response()->json([
            'message' => 'Export berhasil',
            'id' => Auth::id(),
            'url' => asset("storage/exports/$fileName")
            
        ]);
    }

    public function exportView()
    {
        $userId = Auth::id();

        $user = User::findOrFail($userId);

        return view('exports.reports', [
            'user'=> $user,
            'reports' => Report::with(["user",'classification', 'unit', 'evidence'])
                        ->where('user_id', $userId)
                        ->whereBetween('report_date', ['2024-01-01', '2024-12-31'])
                        ->get() 
        ]);
    }
    


    // TESTINGGGGGGGGGGGGGG
    public function uploadTemplate(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls'
        ]);

        $file = $request->file('file');
        $filePath = $file->store('uploads', 'public');

        return response()->json([
            'message' => 'File uploaded successfully',
            'url' => asset('storage/' . $filePath)
        ]);
    }

    // public function genereateExcel()
    // {
    //     $filePath = storage_path('app/public/template/PDAMTemplate.xlsx');

    //     $spreadsheets = IOFactory::load($filePath);
    //     // $worksheets = $spreadsheets->getActiveSheet();

    //     // berdasarkan sheet
    //     $worksheetsLaporanHarian = $spreadsheets->getSheetByName('LAPORAN HARIAN');
    //     $worksheetsEvidence1 = $spreadsheets->getSheetByName('EVIDENCE 1');
    //     $worksheetsEvidence2 = $spreadsheets->getSheetByName('EVIDENCE 2');

    //     $user = User::all();
    //     $evidenceModel = Evidence::all();

    //     $row = 3;

    //     // if($worksheetsEvidence1->getTable('EVIDENCE 1') === null){
    //     //     $worksheetsEvidence1->fromArray($evidenceModel->toArray(), null, 'A1');
    //     // }
    //     // mengisi sheets laporan evidence 1
    //     foreach ($evidenceModel as $data) {
    //         $worksheetsEvidence1->setCellValue('A' . $row, $data->file_path);
    //         $row++;
    //     }

    //     $writer = IOFactory::createWriter($spreadsheets, 'Xlsx');

    //     $outputFilePath = storage_path('app/public/exports/generated_laporan.xlsx');

    //     $writer->save($outputFilePath);

    //     return response()->json(([
    //         'message' => 'Excel generated successfully',
    //         'url' => asset($outputFilePath)
    //     ]));
    // }


    public function genereateExcel()
    {
        $filePath = storage_path('app/public/template/PDAMTemplate.xlsx');
        $spreadsheet = IOFactory::load($filePath);

        $worksheetLaporanHarian = $spreadsheet->getSheetByName('LAPORAN HARIAN');
        $worksheetEvidence1     = $spreadsheet->getSheetByName('EVIDENCE 1');
        $worksheetEvidence2     = $spreadsheet->getSheetByName('EVIDENCE 2');

        // =============================================
        // ISI SHEET: LAPORAN HARIAN
        // =============================================
        $user = User::FindOrFail(Auth::id()); 

        if ($user) {
            $worksheetLaporanHarian->setCellValue('C4', $user->name);         // NAMA
            $worksheetLaporanHarian->setCellValue('C6', $user->nik);          // NIK
            $worksheetLaporanHarian->setCellValue('C8', $user->jabatan);      // JABATAN
            $worksheetLaporanHarian->setCellValue('C10', $user->bagian);       // BAGIAN
        }

        // Ambil data laporan harian 
        $laporanHarian = Report::with(["user",'classification', 'unit', 'evidence'])
                    ->where('user_id', 1)
                    ->whereBetween('report_date', ["2024-01-01", "2026-12-31"])
                    ->get();

        $rowLaporan = 14; // mulai dari baris ke-10 

        foreach ($laporanHarian as $data) {
            $worksheetLaporanHarian->setCellValue('A' . $rowLaporan,  $data->report_date);
            $worksheetLaporanHarian->setCellValue('B' . $rowLaporan, $data->description);
            $worksheetLaporanHarian->setCellValue('C' . $rowLaporan, $data->target);
            $worksheetLaporanHarian->setCellValue('D' . $rowLaporan, $data->realization);
            $worksheetLaporanHarian->setCellValue('E' . $rowLaporan, $data->unit->name ?? 'dokumen');
            $worksheetLaporanHarian->setCellValue('F' . $rowLaporan, $data->achievement);
            $worksheetLaporanHarian->setCellValue('G' . $rowLaporan, $data->classification->name ?? 'tidak diklasifikasikan');
            $worksheetLaporanHarian->setCellValue('H' . $rowLaporan, "LIHAT EVIDENCE"); // Placeholder untuk link atau keterangan evidence
            $rowLaporan++;
        }

        // =============================================
        // ISI SHEET: EVIDENCE 1
        // =============================================
        $evidenceModel = Evidence::all();
        $rowEvidence1 = 2;

        foreach ($evidenceModel as $data) {
            // Kolom A: Tanggal/Waktu
            $worksheetEvidence1->setCellValue('A' . $rowEvidence1, $data->tanggal ?? '');

            // Kolom B: Tampilkan gambar dari file_path
            $imagePath = storage_path('app/public/' . $data->file_path);

            if (file_exists($imagePath)) {
                $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                $drawing->setName('Evidence ' . $rowEvidence1);
                $drawing->setDescription('Evidence');
                $drawing->setPath($imagePath);
                $drawing->setCoordinates('B' . $rowEvidence1);
                $drawing->setWidth(200);   // lebar gambar dalam pixel
                $drawing->setHeight(150);  // tinggi gambar dalam pixel
                $drawing->setWorksheet($worksheetEvidence1);

                // Sesuaikan tinggi baris agar gambar muat
                $worksheetEvidence1->getRowDimension($rowEvidence1)->setRowHeight(120);
            } else {
                // Jika file tidak ditemukan, isi dengan path saja
                $worksheetEvidence1->setCellValue('B' . $rowEvidence1, $data->file_path);
            }

            $rowEvidence1++;
        }

        // =============================================
        // ISI SHEET: EVIDENCE 2 
        // =============================================
        // $evidence2 = Evidence::where('sheet', 2)->get(); // sesuaikan kondisi filter
        // $rowEvidence2 = 2;

        // foreach ($evidence2 as $data) {
        //     $worksheetEvidence2->setCellValue('A' . $rowEvidence2, $data->tanggal ?? '');

        //     $imagePath = storage_path('app/public/' . $data->file_path);
        //     if (file_exists($imagePath)) {
        //         $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        //         $drawing->setName('Evidence2 ' . $rowEvidence2);
        //         $drawing->setDescription('Evidence 2');
        //         $drawing->setPath($imagePath);
        //         $drawing->setCoordinates('B' . $rowEvidence2);
        //         $drawing->setWidth(200);
        //         $drawing->setHeight(150);
        //         $drawing->setWorksheet($worksheetEvidence2);

        //         $worksheetEvidence2->getRowDimension($rowEvidence2)->setRowHeight(120);
        //     } else {
        //         $worksheetEvidence2->setCellValue('B' . $rowEvidence2, $data->file_path);
        //     }

        //     $rowEvidence2++;
        // }

        // =============================================
        // SIMPAN FILE
        // =============================================
        $outputDir = storage_path('app/public/exports');
        if (!file_exists($outputDir)) {
            mkdir($outputDir, 0755, true);
        }

        $fileName = 'laporan_harian_' . now()->format('Ymd_His') . '.xlsx';
        $outputFilePath = $outputDir . '/' . $fileName;

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->setPreCalculateFormulas(false);


        $writer->save($outputFilePath);

        return response()->json([
            'message' => 'Excel generated successfully',
            'url'     => asset('storage/exports/' . $fileName),
        ]);
    }
    }
