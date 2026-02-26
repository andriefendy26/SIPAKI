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
            $month = $request->query('month');   // e.g. "januari" or "1"
            $year  = $request->query('year');

            // convert Indonesian month names to numbers if necessary
            $monthNumber = null;
            if ($month) {
                $months = [
                    'januari'=>1,'februari'=>2,'maret'=>3,'april'=>4,'mei'=>5,'juni'=>6,
                    'juli'=>7,'agustus'=>8,'september'=>9,'oktober'=>10,'november'=>11,'desember'=>12
                ];
                $lower = strtolower($month);
                if (isset($months[$lower])) {
                    $monthNumber = $months[$lower];
                } elseif (is_numeric($month) && (int)$month >= 1 && (int)$month <= 12) {
                    $monthNumber = (int)$month;
                }
            }

            $query = Report::with(['classification', 'unit', 'evidence'])
                        ->where('user_id', Auth::id())
                        ->latest();

            if ($monthNumber) {
                $query->whereMonth('report_date', $monthNumber);
            }
            if ($year) {
                $query->whereYear('report_date', $year);
            }

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

            // jika pemanggil meminta pengelompokan per bulan, tambahkan
            if ($request->query('group') === 'month') {
                $data = $data->groupBy(function ($item) {
                    return \Carbon\Carbon::parse($item->report_date)->isoFormat('MMMM YYYY');
                });
            }

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
                // 'achievement'       => 'required|numeric'
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
                'achievement'       => ($request->realization != 0) ? $request->realization / $request->target : 0,
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

            $updateData = [
                // 'user_id'           => $user_id_auth,
                'classification_id' => $request->classification_id,
                'unit_id'           => $request->unit_id,
                'report_date'       => $request->report_date,
                'description'       => $request->description,
                'target'            => $request->target,
                'realization'       => $request->realization,
                'achievement'       => ($request->realization != 0) ? $request->realization / $request->target : 0,
            ];

            // $updateData = $request->all();
            
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
    // public function exportByDate(Request $request)
    // {
    //     $start = $request->start_date;
    //     $end = $request->end_date;

    //     // optionally allow caller to supply additional sheet data
    //     $ikiData = $request->input('iki_data', []);
    //     $mrData = $request->input('mr_data', []);

    //     $fileName = "laporan_{$start}_{$end}.xlsx";

    //     Excel::store(
    //         new ReportsExport($start, $end, $ikiData, $mrData),
    //         "exports/$fileName",
    //         'public'
    //     );

    //     return response()->json([
    //         'message' => 'Export berhasil',
    //         'id' => Auth::id(),
    //         'url' => asset("storage/exports/$fileName")
            
    //     ]);
    // }

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


    public function genereateExcel(Request $request)
    {
        $filePath = storage_path('app/public/template/PDAMTemplate.xlsx');
        $spreadsheet = IOFactory::load($filePath);

        $worksheetIKI           = $spreadsheet->getSheetByName('IKI');
        $worksheetLaporanHarian = $spreadsheet->getSheetByName('LAPORAN HARIAN');
        $worksheetBulan         = $spreadsheet->getSheetByName('BULAN');
        $worksheetEvidence1     = $spreadsheet->getSheetByName('EVIDENCE 1');
        $worksheetEvidence2     = $spreadsheet->getSheetByName('EVIDENCE 2');

        // Mengatur lebar kolom untuk sheet LAPORAN HARIAN
        $worksheetLaporanHarian->getColumnDimension('A')->setWidth(20); // Kolom A dengan lebar 20
        $worksheetLaporanHarian->getColumnDimension('B')->setWidth(30); // Kolom B dengan lebar 30
        $worksheetLaporanHarian->getColumnDimension('C')->setWidth(15); // Kolom C dengan lebar 15
        $worksheetLaporanHarian->getColumnDimension('D')->setWidth(15); // Kolom D dengan lebar 15
        $worksheetLaporanHarian->getColumnDimension('E')->setWidth(20); // Kolom E dengan lebar 20
        $worksheetLaporanHarian->getColumnDimension('F')->setWidth(15); // Kolom F dengan lebar 15
        $worksheetLaporanHarian->getColumnDimension('G')->setWidth(25); // Kolom G dengan lebar 25
        $worksheetLaporanHarian->getColumnDimension('H')->setWidth(20); // Kolom H dengan lebar 20

        // mengubah nama sheet bulan sesuai dengan input bulan dari request
        $worksheetBulan->setTitle(strtoupper($request->month ?? 'BULAN'));

        // =============================================
        // ISI SHEET: LAPORAN HARIAN
        // =============================================
        $user = User::FindOrFail(Auth::id()); 

        if ($user) {
            $worksheetLaporanHarian->setCellValue('C4', $user->name);         // NAMA
            $worksheetLaporanHarian->setCellValue('C6', $user->nik);          // NIK
            $worksheetLaporanHarian->setCellValue('C8', $user->jabatan);      // JABATAN
            $worksheetLaporanHarian->setCellValue('C10', $user->bagian);       // BAGIAN

            $worksheetIKI->setCellValue('E26', $user->name);
            $worksheetIKI->setCellValue('E27', "NIK. " . $user->nik);
        }
        // Ambil data laporan harian dengan opsi filter bulan/tahun
        $userId = Auth::id();
        $query = Report::with(["user",'classification', 'unit', 'evidence'])
                    ->where('user_id', $userId);

        if ($request->has('month')) {
            $monthParam = $request->get('month');
            $months = [
                'januari'=>1,'februari'=>2,'maret'=>3,'april'=>4,'mei'=>5,'juni'=>6,
                'juli'=>7,'agustus'=>8,'september'=>9,'oktober'=>10,'november'=>11,'desember'=>12
            ];
            $lower = strtolower($monthParam);
            if (isset($months[$lower])) {
                $query->whereMonth('report_date', $months[$lower]);
            } elseif (is_numeric($monthParam)) {
                $query->whereMonth('report_date', (int) $monthParam);
            }
        }

        if ($request->has('year')) {
            $query->whereYear('report_date', $request->get('year'));
        }

        $laporanHarian = $query
                    // ->whereBetween('report_date', ["2024-01-01", "2026-12-31"])
                    ->get();

        $rowLaporan = 14;

        foreach ($laporanHarian as $data) {
            $worksheetLaporanHarian->setCellValue('A' . $rowLaporan, value: $data->report_date);
            $worksheetLaporanHarian->setCellValue('B' . $rowLaporan, $data->description);
            $worksheetLaporanHarian->setCellValue('C' . $rowLaporan, $data->target);
            $worksheetLaporanHarian->setCellValue('D' . $rowLaporan, $data->realization);
            $worksheetLaporanHarian->setCellValue('E' . $rowLaporan, $data->unit->name ?? 'dokumen');
            $worksheetLaporanHarian->setCellValue('F' . $rowLaporan, $data->achievement);
            $worksheetLaporanHarian->setCellValue('G' . $rowLaporan, $data->classification->name ?? 'tidak diklasifikasikan');
            
            $worksheetLaporanHarian->setCellValue('F' . ($rowLaporan), $data->achievement);
            $worksheetLaporanHarian->getStyle('F' . ($rowLaporan))->getNumberFormat()->setFormatCode('0.00%'); // Format sebagai persentase dengan 2 desimal
            
            // Membuat link LIHAT EVIDENCE
            if ($data->classification_id == 1) {
                // Jika classification_id = 2, arahkan ke sheet EVIDENCE 1
                $worksheetLaporanHarian->setCellValue('H' . $rowLaporan, '=HYPERLINK("#\'EVIDENCE 1\'!A1", "LIHAT EVIDENCE")');
            } else if ($data->classification_id == 2) {
                // Jika classification_id = 1, arahkan ke sheet EVIDENCE 2
                $worksheetLaporanHarian->setCellValue('H' . $rowLaporan, '=HYPERLINK("#\'EVIDENCE 2\'!A1", "LIHAT EVIDENCE")');
            }

            $rowLaporan++;
        }


        // Isi bottom Value
        $worksheetLaporanHarian->setCellValue('B' . ($rowLaporan), "JUMLAH");
        $worksheetLaporanHarian->setCellValue('C' . ($rowLaporan), $laporanHarian->sum('target'));
        $worksheetLaporanHarian->setCellValue('D' . ($rowLaporan), $laporanHarian->sum('realization'));
        $worksheetLaporanHarian->setCellValue('F' . ($rowLaporan), $laporanHarian->average('achievement'));
    
        // =============================================
        // ISI SHEET: BULAN
        // =============================================

        // clasifikasi id 1
        $dataBulanTarget = $laporanHarian->where("classification_id", 1)->sum('target');
        $dataBulanRealisasi = $laporanHarian->where("classification_id", 1)->sum('realization');
        $dataBulanAchievement = $laporanHarian->where("classification_id", 1)->sum('achievement');
        

        // clasifikasi id 2
        $dataBulanTarget2 = $laporanHarian->where("classification_id", 2)->sum('target');
        $dataBulanRealisasi2 = $laporanHarian->where("classification_id", 2)->sum('realization');
        $dataBulanAchievement2 = $laporanHarian->where("classification_id", 2)->sum('achievement');
        
        $worksheetBulan->setCellValue('C17', $dataBulanTarget2);
        $worksheetBulan->setCellValue('D17', $dataBulanRealisasi2);
        // $worksheetBulan->setCellValue('F17', $dataBulanAchievement2);

        $worksheetBulan->setCellValue('C18', $dataBulanTarget);
        $worksheetBulan->setCellValue('D18', $dataBulanRealisasi);
        // $worksheetBulan->setCellValue('F18', $dataBulanAchievement);

        $worksheetBulan->setCellValue('E34', $user->name);
        $worksheetBulan->setCellValue('E35', "NIK. " . $user->nik);

        // =============================================
        // ISI SHEET: EVIDENCE 1 (classification_id = 2)
        // =============================================
        // Ambil evidence dengan relasi report agar bisa filter berdasarkan classification_id = 2
        $evidenceModel = Evidence::with('report')
                            ->whereHas('report', function ($query) use ($userId) {
                                $query->where('user_id', $userId)
                                      ->where('classification_id', 2);
                            })
                            ->get();
        
        // Kelompokkan evidence berdasarkan tanggal laporan (report_date)
        $evidenceByDate = $evidenceModel->groupBy(function ($item) {
            return $item->report->report_date ?? 'Tidak ada tanggal';
        });

        $rowEvidence1 = 2;

        foreach ($evidenceByDate as $reportDate => $evidences) {
            // Set tanggal laporan di kolom A
            $worksheetEvidence1->setCellValue('A' . $rowEvidence1, $reportDate);

            // Kolom untuk gambar mulai dari B
            $colIndex = 1; // B = kolom 2, jadi mulai dari index 1
            $maxHeight = 120;

            foreach ($evidences as $data) {
                $imagePath = storage_path('app/public/' . $data->file_path);
                $colLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($colIndex + 1);

                if (file_exists($imagePath)) {
                    $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                    $drawing->setName('Evidence ' . $rowEvidence1 . '_' . $colIndex);
                    $drawing->setDescription('Evidence');
                    $drawing->setPath($imagePath);
                    $drawing->setCoordinates($colLetter . $rowEvidence1);
                    $drawing->setWidth(150);   // lebar gambar dalam pixel
                    $drawing->setHeight(120);  // tinggi gambar dalam pixel
                    $drawing->setWorksheet($worksheetEvidence1);
                } else {
                    // Jika file tidak ditemukan, isi dengan path saja
                    $worksheetEvidence1->setCellValue($colLetter . $rowEvidence1, $data->file_path);
                }

                $colIndex++;
            }

            // Sesuaikan tinggi baris agar gambar dan tanggal muat
            $worksheetEvidence1->getRowDimension($rowEvidence1)->setRowHeight($maxHeight);
            $rowEvidence1++;
        }

        // =============================================
        // ISI SHEET: EVIDENCE 2 (classification_id = 1)
        // =============================================
        // Ambil evidence dengan relasi report agar bisa filter berdasarkan classification_id = 1
        
        $evidenceModel2 = Evidence::with('report')
                            ->whereHas('report', function ($query) use ($userId) {
                                $query->where('user_id', $userId)
                                      ->where('classification_id', 1);
                            })
                            ->get();
        
        // Kelompokkan evidence berdasarkan tanggal laporan (report_date)
        $evidenceByDate2 = $evidenceModel2->groupBy(function ($item) {
            return $item->report->report_date ?? 'Tidak ada tanggal';
        });

        $rowEvidence2 = 2;

        foreach ($evidenceByDate2 as $reportDate => $evidences) {
            // Set tanggal laporan di kolom A
            $worksheetEvidence2->setCellValue('A' . $rowEvidence2, $reportDate);

            // Kolom untuk gambar mulai dari B
            $colIndex = 1; // B = kolom 2, jadi mulai dari index 1
            $maxHeight = 120;

            foreach ($evidences as $data) {
                $imagePath = storage_path('app/public/' . $data->file_path);
                $colLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($colIndex + 1);

                if (file_exists($imagePath)) {
                    $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                    $drawing->setName('Evidence2 ' . $rowEvidence2 . '_' . $colIndex);
                    $drawing->setDescription('Evidence 2');
                    $drawing->setPath($imagePath);
                    $drawing->setCoordinates($colLetter . $rowEvidence2);
                    $drawing->setWidth(150);
                    $drawing->setHeight(120);
                    $drawing->setWorksheet($worksheetEvidence2);
                } else {
                    // Jika file tidak ditemukan, isi dengan path saja
                    $worksheetEvidence2->setCellValue($colLetter . $rowEvidence2, $data->file_path);
                }

                $colIndex++;
            }

            // Sesuaikan tinggi baris agar gambar dan tanggal muat
            $worksheetEvidence2->getRowDimension($rowEvidence2)->setRowHeight($maxHeight);
            $rowEvidence2++;
        }

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
        $writer->setPreCalculateFormulas(true);
        // $writer->setPreCalculateFormulas(false);


        $writer->save($outputFilePath);

        return response()->json([
            'message' => 'Excel generated successfully',
            'url'     => asset('storage/exports/' . $fileName),
            "isiLaporanHarian" => $laporanHarian
        ]);
    }
}
