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

    // public function index(Request $request)
    // {
    //     try {

    //         $search = $request->query('search');
    //         $month = $request->query('month');   
    //         $year  = $request->query('year');

    //         // convert Indonesian month names to numbers if necessary
    //         $monthNumber = null;
    //         if ($month) {
    //             $months = [
    //                 'januari'=>1,'februari'=>2,'maret'=>3,'april'=>4,'mei'=>5,'juni'=>6,
    //                 'juli'=>7,'agustus'=>8,'september'=>9,'oktober'=>10,'november'=>11,'desember'=>12
    //             ];
    //             $lower = strtolower($month);
    //             if (isset($months[$lower])) {
    //                 $monthNumber = $months[$lower];
    //             } elseif (is_numeric($month) && (int)$month >= 1 && (int)$month <= 12) {
    //                 $monthNumber = (int)$month;
    //             }
    //         }

    //         $query = Report::with(['classification', 'unit', 'evidence'])
    //                     ->where('user_id', Auth::id())
    //                     ->latest();

    //         if ($monthNumber) {
    //             $query->whereMonth('report_date', $monthNumber);
    //         }
    //         if ($year) {
    //             $query->whereYear('report_date', $year);
    //         }

    //         if ($search) {
    //             $query->where(function ($q) use ($search) {
    //                 $q->where('description', 'like', "%$search%")
    //                 ->orWhere('report_date', 'like', "%$search%")
    //                 ->orWhereHas('classification', function ($q2) use ($search) {
    //                     $q2->where('name', 'like', "%$search%");
    //                 })
    //                 ->orWhereHas('unit', function ($q3) use ($search) {
    //                     $q3->where('name', 'like', "%$search%");
    //                 });
    //             });
    //         }

    //         $data = $query->get();

    //         // jika pemanggil meminta pengelompokan per bulan, tambahkan
    //         if ($request->query('group') === 'month') {
    //             $data = $data->groupBy(function ($item) {
    //                 return \Carbon\Carbon::parse($item->report_date)->isoFormat('MMMM YYYY');
    //             });
    //         }

    //         return response()->json([
    //             "status" => 200,
    //             "data" => $data,
    //             "message" => "Berhasil mengambil data laporan"
    //         ], 200);

    //     } catch (\Exception $e) {
    //         return response()->json([
    //             "status"=> 400,
    //             "message" => $e->getMessage()
    //         ], 400);
    //     }
    // }


    public function index(Request $request)
    {
        try {
            $search    = $request->query('search');
            $month     = $request->query('month');
            $year      = $request->query('year');
            $perPage   = (int) $request->query('per_page', 10); // default 10 per page

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

            $paginated = $query->paginate($perPage);

            return response()->json([
                "status"  => 200,
                "data"    => $paginated->items(),
                "meta"    => [
                    "current_page" => $paginated->currentPage(),
                    "last_page"    => $paginated->lastPage(),
                    "per_page"     => $paginated->perPage(),
                    "total"        => $paginated->total(),
                    "has_more"     => $paginated->hasMorePages(),
                ],
                "message" => "Berhasil mengambil data laporan"
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "status"  => 400,
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
    

    // public function genereateExcel(Request $request)
    // {
    //     $filePath = storage_path('app/public/template/PDAMTemplate.xlsx');
    //     $spreadsheet = IOFactory::load($filePath);

    //     $worksheetIKI           = $spreadsheet->getSheetByName('IKI');
    //     $worksheetLaporanHarian = $spreadsheet->getSheetByName('LAPORAN HARIAN');
    //     $worksheetBulan         = $spreadsheet->getSheetByName('BULAN');
    //     $worksheetEvidence1     = $spreadsheet->getSheetByName('EVIDENCE 1');
    //     $worksheetEvidence2     = $spreadsheet->getSheetByName('EVIDENCE 2');

    //     // Mengatur lebar kolom untuk sheet LAPORAN HARIAN
    //     $worksheetLaporanHarian->getColumnDimension('A')->setWidth(20);
    //     $worksheetLaporanHarian->getColumnDimension('B')->setWidth(30);
    //     $worksheetLaporanHarian->getColumnDimension('C')->setWidth(15);
    //     $worksheetLaporanHarian->getColumnDimension('D')->setWidth(15);
    //     $worksheetLaporanHarian->getColumnDimension('E')->setWidth(20);
    //     $worksheetLaporanHarian->getColumnDimension('F')->setWidth(15);
    //     $worksheetLaporanHarian->getColumnDimension('G')->setWidth(25);
    //     $worksheetLaporanHarian->getColumnDimension('H')->setWidth(20);

    //     // =============================================
    //     // NAMA SHEET BULAN — tetap pakai input 'month'
    //     // =============================================
    //     $worksheetBulan->setTitle(strtoupper($request->month ?? 'BULAN'));

    //     // =============================================
    //     // ISI SHEET: LAPORAN HARIAN
    //     // =============================================
    //     $user = User::findOrFail(Auth::id());

    //     if ($user) {
    //         $worksheetLaporanHarian->setCellValue('C4', $user->name);
    //         $worksheetLaporanHarian->setCellValue('C6', $user->nik);
    //         $worksheetLaporanHarian->setCellValue('C8', $user->jabatan);
    //         $worksheetLaporanHarian->setCellValue('C10', $user->bagian);

    //         $worksheetIKI->setCellValue('E26', $user->name);
    //         $worksheetIKI->setCellValue('E27', "NIK. " . $user->nik);
    //     }

    //     // =============================================
    //     // QUERY FILTER — support date range DAN bulan/tahun
    //     // =============================================
    //     $userId = Auth::id();
    //     $query = Report::with(['user', 'classification', 'unit', 'evidence'])
    //                 ->where('user_id', $userId);

    //     $months = [
    //         'januari'=>1,'februari'=>2,'maret'=>3,'april'=>4,'mei'=>5,'juni'=>6,
    //         'juli'=>7,'agustus'=>8,'september'=>9,'oktober'=>10,'november'=>11,'desember'=>12
    //     ];

    //     if ($request->filled('date_from') && $request->filled('date_to')) {
    //         // Mode: custom date range
    //         $query->whereBetween('report_date', [
    //             $request->get('date_from'),
    //             $request->get('date_to'),
    //         ]);
    //     } else {
    //         // Mode: filter bulan & tahun seperti semula
    //         if ($request->has('month')) {
    //             $monthParam = $request->get('month');
    //             $lower = strtolower($monthParam);
    //             if (isset($months[$lower])) {
    //                 $query->whereMonth('report_date', $months[$lower]);
    //             } elseif (is_numeric($monthParam)) {
    //                 $query->whereMonth('report_date', (int) $monthParam);
    //             }
    //         }

    //         if ($request->has('year')) {
    //             $query->whereYear('report_date', $request->get('year'));
    //         }
    //     }

    //     $laporanHarian = $query->get();

    //     $rowLaporan = 14;

    //     foreach ($laporanHarian as $data) {
    //         // $worksheetLaporanHarian->setCellValue('A' . $rowLaporan, value: $data->report_date);
    //         $worksheetLaporanHarian->setCellValue('A' . $rowLaporan, \Carbon\Carbon::parse($data->report_date)->format('d-m-Y'));
    //         $worksheetLaporanHarian->setCellValue('B' . $rowLaporan, $data->description);
    //         $worksheetLaporanHarian->setCellValue('C' . $rowLaporan, $data->target);
    //         $worksheetLaporanHarian->setCellValue('D' . $rowLaporan, $data->realization);
    //         $worksheetLaporanHarian->setCellValue('E' . $rowLaporan, $data->unit->name ?? 'dokumen');
    //         $worksheetLaporanHarian->setCellValue('F' . $rowLaporan, $data->achievement);
    //         $worksheetLaporanHarian->setCellValue('G' . $rowLaporan, $data->classification->name ?? 'tidak diklasifikasikan');
            
    //         $worksheetLaporanHarian->setCellValue('F' . ($rowLaporan), $data->achievement);
    //         $worksheetLaporanHarian->getStyle('F' . ($rowLaporan))->getNumberFormat()->setFormatCode('0.00%'); // Format sebagai persentase dengan 2 desimal
            
    //         // Membuat link LIHAT EVIDENCE
    //         if ($data->classification_id == 1) {
    //             $worksheetLaporanHarian->setCellValue('H' . $rowLaporan, 'LIHAT');
    //             $worksheetLaporanHarian->getCell('H' . $rowLaporan)
    //                 ->getHyperlink()
    //                 ->setUrl("#'EVIDENCE 2'!A1") // internal sheet link
    //                 ->setTooltip('Lihat Evidence 2');
    //         } elseif ($data->classification_id == 2) {
    //             $worksheetLaporanHarian->setCellValue('H' . $rowLaporan, 'LIHAT');
    //             $worksheetLaporanHarian->getCell('H' . $rowLaporan)
    //                 ->getHyperlink()
    //                 ->setUrl("#'EVIDENCE 1'!A1") // internal sheet link
    //                 ->setTooltip('Lihat Evidence 1');
    //         }


    //         $rowLaporan++;
    //     }


    //     // Isi bottom Value
    //     $worksheetLaporanHarian->setCellValue('B' . ($rowLaporan), "JUMLAH");
    //     $worksheetLaporanHarian->setCellValue('C' . ($rowLaporan), $laporanHarian->sum('target'));
    //     $worksheetLaporanHarian->setCellValue('D' . ($rowLaporan), $laporanHarian->sum('realization'));
    //     $worksheetLaporanHarian->setCellValue('F' . ($rowLaporan), $laporanHarian->average('achievement'));
    
    //     // =============================================
    //     // ISI SHEET: BULAN
    //     // =============================================

    //     // clasifikasi id 1
    //     $dataBulanTarget = $laporanHarian->where("classification_id", 1)->sum('target');
    //     $dataBulanRealisasi = $laporanHarian->where("classification_id", 1)->sum('realization');
    //     $dataBulanAchievement = $laporanHarian->where("classification_id", 1)->sum('achievement');
        
    //     // clasifikasi id 2
    //     $dataBulanTarget2 = $laporanHarian->where("classification_id", 2)->sum('target');
    //     $dataBulanRealisasi2 = $laporanHarian->where("classification_id", 2)->sum('realization');
    //     $dataBulanAchievement2 = $laporanHarian->where("classification_id", 2)->sum('achievement');
        
    //     $worksheetBulan->setCellValue('C17', $dataBulanTarget2);
    //     $worksheetBulan->setCellValue('D17', $dataBulanRealisasi2);
    //     // $worksheetBulan->setCellValue('F17', $dataBulanAchievement2);

    //     $worksheetBulan->setCellValue('C18', $dataBulanTarget);
    //     $worksheetBulan->setCellValue('D18', $dataBulanRealisasi);
    //     // $worksheetBulan->setCellValue('F18', $dataBulanAchievement);

    //     $worksheetBulan->setCellValue('E34', $user->name);
    //     $worksheetBulan->setCellValue('E35', "NIK. " . $user->nik);
    //     // =============================================
    //     // ISI SHEET: EVIDENCE 1 (classification_id = 2)
    //     // =============================================
    //     $evidenceQuery1 = Evidence::with('report')
    //         ->whereHas('report', function ($q) use ($userId, $request, $months) {
    //             $q->where('user_id', $userId)
    //             ->where('classification_id', 2);

    //             // Terapkan filter yang sama seperti report
    //             if ($request->filled('date_from') && $request->filled('date_to')) {
    //                 $q->whereBetween('report_date', [
    //                     $request->get('date_from'),
    //                     $request->get('date_to'),
    //                 ]);
    //             } else {
    //                 if ($request->has('month')) {
    //                     $monthParam = $request->get('month');
    //                     $lower = strtolower($monthParam);
    //                     if (isset($months[$lower])) {
    //                         $q->whereMonth('report_date', $months[$lower]);
    //                     } elseif (is_numeric($monthParam)) {
    //                         $q->whereMonth('report_date', (int) $monthParam);
    //                     }
    //                 }
    //                 if ($request->has('year')) {
    //                     $q->whereYear('report_date', $request->get('year'));
    //                 }
    //             }
    //         });

    //     $evidenceModel = $evidenceQuery1->get();

    //     // Kelompokkan evidence berdasarkan tanggal laporan (report_date)
    //     $evidenceByDate = $evidenceModel->groupBy(function ($item) {
    //         // return $item->report->report_date ?? 'Tidak ada tanggal';
    //         return $item->report->report_date 
    //             ? \Carbon\Carbon::parse($item->report->report_date)->format('d-m-Y') 
    //             : 'Tidak ada tanggal';
    //     });

    //     $rowEvidence1 = 2;

    //     foreach ($evidenceByDate as $reportDate => $evidences) {
    //         $worksheetEvidence1->setCellValue('A' . $rowEvidence1, $reportDate);

    //         $colIndex = 1;
    //         $maxHeight = 120;

    //         foreach ($evidences as $data) {
    //             $imagePath = storage_path('app/public/' . $data->file_path);
    //             $colLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($colIndex + 1);

    //             if (file_exists($imagePath)) {
    //                 $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    //                 $drawing->setName('Evidence ' . $rowEvidence1 . '_' . $colIndex);
    //                 $drawing->setDescription('Evidence');
    //                 $drawing->setPath($imagePath);
    //                 $drawing->setCoordinates($colLetter . $rowEvidence1);
    //                 $drawing->setWidth(150);
    //                 $drawing->setHeight(120);
    //                 $drawing->setWorksheet($worksheetEvidence1);
    //             } else {
    //                 $worksheetEvidence1->setCellValue($colLetter . $rowEvidence1, $data->file_path);
    //             }

    //             $colIndex++;
    //         }

    //         $worksheetEvidence1->getRowDimension($rowEvidence1)->setRowHeight($maxHeight);
    //         $rowEvidence1++;
    //     }

    //     // =============================================
    //     // ISI SHEET: EVIDENCE 2 (classification_id = 1)
    //     // =============================================
    //     $evidenceQuery2 = Evidence::with('report')
    //         ->whereHas('report', function ($q) use ($userId, $request, $months) {
    //             $q->where('user_id', $userId)
    //             ->where('classification_id', 1);

    //             // Terapkan filter yang sama seperti report
    //             if ($request->filled('date_from') && $request->filled('date_to')) {
    //                 $q->whereBetween('report_date', [
    //                     $request->get('date_from'),
    //                     $request->get('date_to'),
    //                 ]);
    //             } else {
    //                 if ($request->has('month')) {
    //                     $monthParam = $request->get('month');
    //                     $lower = strtolower($monthParam);
    //                     if (isset($months[$lower])) {
    //                         $q->whereMonth('report_date', $months[$lower]);
    //                     } elseif (is_numeric($monthParam)) {
    //                         $q->whereMonth('report_date', (int) $monthParam);
    //                     }
    //                 }
    //                 if ($request->has('year')) {
    //                     $q->whereYear('report_date', $request->get('year'));
    //                 }
    //             }
    //         });

    //     $evidenceModel2 = $evidenceQuery2->get();

    //     $evidenceByDate2 = $evidenceModel2->groupBy(function ($item) {
    //         return $item->report->report_date 
    //             ? \Carbon\Carbon::parse($item->report->report_date)->format('d-m-Y') 
    //             : 'Tidak ada tanggal';
    //     });

    //     $rowEvidence2 = 2;

    //     foreach ($evidenceByDate2 as $reportDate => $evidences) {
    //         $worksheetEvidence2->setCellValue('A' . $rowEvidence2, $reportDate);

    //         $colIndex = 1;
    //         $maxHeight = 120;

    //         foreach ($evidences as $data) {
    //             $imagePath = storage_path('app/public/' . $data->file_path);
    //             $colLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($colIndex + 1);

    //             if (file_exists($imagePath)) {
    //                 $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    //                 $drawing->setName('Evidence2 ' . $rowEvidence2 . '_' . $colIndex);
    //                 $drawing->setDescription('Evidence 2');
    //                 $drawing->setPath($imagePath);
    //                 $drawing->setCoordinates($colLetter . $rowEvidence2);
    //                 $drawing->setWidth(150);
    //                 $drawing->setHeight(120);
    //                 $drawing->setWorksheet($worksheetEvidence2);
    //             } else {
    //                 $worksheetEvidence2->setCellValue($colLetter . $rowEvidence2, $data->file_path);
    //             }

    //             $colIndex++;
    //         }

    //         $worksheetEvidence2->getRowDimension($rowEvidence2)->setRowHeight($maxHeight);
    //         $rowEvidence2++;
    //     }

    //     foreach ($spreadsheet->getAllSheets() as $sheet) {
    //         foreach ($sheet->getRowIterator() as $row) {
    //             foreach ($row->getCellIterator() as $cell) {
    //                 $value = $cell->getValue();
    //                 // Deteksi formula external reference (mengandung '[')
    //                 if (is_string($value) && str_starts_with($value, '=') && str_contains($value, '[')) {
    //                     // Ambil calculated value lalu set sebagai value biasa
    //                     try {
    //                         $calculated = $cell->getCalculatedValue();
    //                         $cell->setValue($calculated);
    //                     } catch (\Exception $e) {
    //                         $cell->setValue(null); // fallback jika tidak bisa dihitung
    //                     }
    //                 }
    //             }
    //         }
    //     }
    //     // =============================================
    //     // SIMPAN FILE
    //     // =============================================
    //     $outputDir = storage_path('app/public/exports');
    //     if (!file_exists($outputDir)) {
    //         mkdir($outputDir, 0755, true);
    //     }

    //     $fileName = 'laporan_harian_' . now()->format('Ymd_His') . '.xlsx';
    //     $outputFilePath = $outputDir . '/' . $fileName;

    //     $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    //     $writer->setPreCalculateFormulas(true);
    //     $writer->save($outputFilePath);
    //     $spreadsheet->disconnectWorksheets();
    //     unset($spreadsheet);

    //     if (!file_exists($outputFilePath) || filesize($outputFilePath) === 0) {
    //         return response()->json(['message' => 'File generation failed'], 500);
    //     }

    //     return response()->json([
    //         'message' => 'Excel generated successfully',
    //         'url'     => asset('storage/exports/' . $fileName),
    //         "isiLaporanHarian" => $laporanHarian
    //     ]);
    // }

    private function makeThumbnail(string $sourcePath, int $maxWidth = 300): ?string
    {
        $info = @getimagesize($sourcePath);
        if (!$info) return null;

        [$w, $h] = $info;
        $mime = $info['mime'];

        $src = match ($mime) {
            'image/jpeg' => @imagecreatefromjpeg($sourcePath),
            'image/png'  => @imagecreatefrompng($sourcePath),
            'image/webp' => @imagecreatefromwebp($sourcePath),
            default      => null,
        };
        if (!$src) return null;

        $ratio = min(1, $maxWidth / $w);
        $newW = (int) ($w * $ratio);
        $newH = (int) ($h * $ratio);

        $dst = imagecreatetruecolor($newW, $newH);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newW, $newH, $w, $h);

        $tmpDir = storage_path('app/tmp_thumbs');
        if (!is_dir($tmpDir)) mkdir($tmpDir, 0755, true);

        $tmpPath = $tmpDir . '/' . md5($sourcePath) . '.jpg';
        imagejpeg($dst, $tmpPath, 75);

        imagedestroy($src);
        imagedestroy($dst);

        return $tmpPath;
    }

    //Testinggg
    public function genereateExcel(Request $request)
    {
        $userId = Auth::id();
        $user = User::with('bagianRef')->findOrFail($userId);

        $bagian = $user->bagianRef;

        // dd($bagian);

        if (!$bagian || !$bagian->excel_template || !$bagian->excel_config) {
            return response()->json([
                'message' => 'Konfigurasi template Excel untuk bagian ini belum diatur'
            ], 422);
        }

        $config = $bagian->excel_config; 

        $filePath = storage_path('app/public/' . $bagian->excel_template);
        if (!file_exists($filePath)) {
            return response()->json(['message' => 'Template Excel tidak ditemukan'], 404);
        }

        $spreadsheet = IOFactory::load($filePath);

        $worksheetLaporanHarian = $spreadsheet->getSheetByName($config['sheet_laporan']);
        $worksheetBulan         = $spreadsheet->getSheetByName($config['sheet_bulan']);
        $worksheetIKI           = $spreadsheet->getSheetByName($config['sheet_iki'] ?? null);

        // isi header user sesuai mapping cell per bagian
        foreach ($config['header_cells'] as $field => $cell) {
            $worksheetLaporanHarian->setCellValue($cell, $user->{$field} ?? '');
        }

        $worksheetBulan->setTitle(strtoupper($request->month ?? 'BULAN'));

        // --- Query laporan (logic filter tanggal/bulan tetap sama) ---
        $query = Report::with(['user', 'classification', 'unit', 'evidence'])
                    ->where('user_id', $userId);

        $months = [
            'januari'=>1,'februari'=>2,'maret'=>3,'april'=>4,'mei'=>5,'juni'=>6,
            'juli'=>7,'agustus'=>8,'september'=>9,'oktober'=>10,'november'=>11,'desember'=>12
        ];

        if ($request->filled('date_from') && $request->filled('date_to')) {
            $query->whereBetween('report_date', [$request->date_from, $request->date_to]);
        } else {
            if ($request->has('month')) {
                $lower = strtolower($request->month);
                if (isset($months[$lower])) {
                    $query->whereMonth('report_date', $months[$lower]);
                } elseif (is_numeric($request->month)) {
                    $query->whereMonth('report_date', (int) $request->month);
                }
            }
            if ($request->has('year')) {
                $query->whereYear('report_date', $request->year);
            }
        }

        $laporanHarian = $query->get();

        // --- Isi baris laporan harian ---
        $row = $config['row_start_laporan'] ?? 14;
        foreach ($laporanHarian as $data) {
            // $worksheetLaporanHarian->setCellValue('A' . $row, \Carbon\Carbon::parse($data->report_date)->format('d-m-Y'));
            // $worksheetLaporanHarian->setCellValue('B' . $row, $data->description);
            // $worksheetLaporanHarian->setCellValue('C' . $row, $data->target);
            // $worksheetLaporanHarian->setCellValue('D' . $row, $data->realization);
            // $worksheetLaporanHarian->setCellValue('E' . $row, $data->unit->name ?? 'dokumen');
            // $worksheetLaporanHarian->setCellValue('F' . $row, $data->achievement);
            // $worksheetLaporanHarian->getStyle('F' . $row)->getNumberFormat()->setFormatCode('0.00%');
            // $worksheetLaporanHarian->setCellValue('G' . $row, $data->classification->name ?? 'tidak diklasifikasikan');

            $worksheetLaporanHarian->setCellValue('A' . $row, $data->index ?? $row - ($config['row_start_laporan'] ?? 14) + 1);
            $worksheetLaporanHarian->setCellValue('B' . $row, \Carbon\Carbon::parse($data->report_date)->format('d-m-Y'));
            $worksheetLaporanHarian->setCellValue('C' . $row, $data->description);
            $worksheetLaporanHarian->setCellValue('D' . $row, $data->target);
            $worksheetLaporanHarian->setCellValue('E' . $row, $data->realization);
            $worksheetLaporanHarian->setCellValue('F' . $row, $data->unit->name ?? 'dokumen');
            $worksheetLaporanHarian->setCellValue('G' . $row, $data->achievement);
            $worksheetLaporanHarian->getStyle('G' . $row)->getNumberFormat()->setFormatCode('0.00%');
            $worksheetLaporanHarian->setCellValue('H' . $row, $data->classification->name ?? 'tidak diklasifikasikan');

            // link evidence dinamis, bukan hardcode id 1/2
            $targetSheet = $config['evidence_sheets'][$data->classification_id] ?? null;
            if ($targetSheet) {
                $worksheetLaporanHarian->setCellValue('I' . $row, 'LIHAT');
                $worksheetLaporanHarian->getCell('I' . $row)
                    ->getHyperlink()
                    ->setUrl("#'{$targetSheet}'!A1")
                    ->setTooltip("Lihat {$targetSheet}");
            }
            $row++;
        }

        $worksheetLaporanHarian->setCellValue('C' . $row, "JUMLAH");
        $worksheetLaporanHarian->setCellValue('D' . $row, $laporanHarian->sum('target'));
        $worksheetLaporanHarian->setCellValue('E' . $row, $laporanHarian->sum('realization'));
        $worksheetLaporanHarian->setCellValue('G' . $row, $laporanHarian->average('achievement'));

        // --- Isi sheet BULAN sesuai mapping classification_id per bagian ---
        foreach ($config['bulan_cells'] ?? [] as $classificationId => $cells) {
            $target = $laporanHarian->where('classification_id', $classificationId)->sum('target');
            $realisasi = $laporanHarian->where('classification_id', $classificationId)->sum('realization');

            if (isset($cells['target'])) {
                $worksheetBulan->setCellValue($cells['target'], $target);
            }
            if (isset($cells['realisasi'])) {
                $worksheetBulan->setCellValue($cells['realisasi'], $realisasi);
            }
        }

        // --- Isi sheet evidence dinamis untuk semua classification bagian ini ---
        foreach ($config['evidence_sheets'] as $classificationId => $sheetName) {
            $worksheetEvidence = $spreadsheet->getSheetByName($sheetName);
            if (!$worksheetEvidence) {
                continue;
            }

            $evidences = Evidence::with('report')
                ->whereHas('report', function ($q) use ($userId, $classificationId, $request, $months) {
                    $q->where('user_id', $userId)->where('classification_id', $classificationId);

                    if ($request->filled('date_from') && $request->filled('date_to')) {
                        $q->whereBetween('report_date', [$request->date_from, $request->date_to]);
                    } else {
                        if ($request->has('month')) {
                            $lower = strtolower($request->month);
                            if (isset($months[$lower])) {
                                $q->whereMonth('report_date', $months[$lower]);
                            } elseif (is_numeric($request->month)) {
                                $q->whereMonth('report_date', (int) $request->month);
                            }
                        }
                        if ($request->has('year')) {
                            $q->whereYear('report_date', $request->year);
                        }
                    }
                })->get();

            $evidenceByDate = $evidences->groupBy(fn($item) =>
                $item->report->report_date
                    ? \Carbon\Carbon::parse($item->report->report_date)->format('d-m-Y')
                    : 'Tidak ada tanggal'
            );

            $rowEvidence = 2;
            foreach ($evidenceByDate as $reportDate => $items) {
                $worksheetEvidence->setCellValue('A' . $rowEvidence, $reportDate);

                $colIndex = 1;
                foreach ($items as $data) {
                    $imagePath = storage_path('app/public/' . $data->file_path);
                    $colLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($colIndex + 1);

                    if (file_exists($imagePath)) {
                        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                        $drawing->setName('Evidence_' . $rowEvidence . '_' . $colIndex);
                        $drawing->setDescription('Evidence');
                        $drawing->setPath($imagePath);
                        $drawing->setCoordinates($colLetter . $rowEvidence);
                        $drawing->setWidth(150);
                        $drawing->setHeight(120);
                        $drawing->setWorksheet($worksheetEvidence);
                    } else {
                        $worksheetEvidence->setCellValue($colLetter . $rowEvidence, $data->file_path);
                    }
                    $colIndex++;
                }

                $worksheetEvidence->getRowDimension($rowEvidence)->setRowHeight(120);
                $rowEvidence++;
            }
        }

        // --- Resolve formula eksternal (sama seperti sebelumnya) ---
        foreach ($spreadsheet->getAllSheets() as $sheet) {
            foreach ($sheet->getRowIterator() as $rowIter) {
                foreach ($rowIter->getCellIterator() as $cell) {
                    $value = $cell->getValue();
                    if (is_string($value) && str_starts_with($value, '=') && str_contains($value, '[')) {
                        try {
                            $cell->setValue($cell->getCalculatedValue());
                        } catch (\Exception $e) {
                            $cell->setValue(null);
                        }
                    }
                }
            }
        }

        $outputDir = storage_path('app/public/exports');
        if (!file_exists($outputDir)) {
            mkdir($outputDir, 0755, true);
        }

        $fileName = 'laporan_' . str($bagian->name)->slug() . '_' . now()->format('Ymd_His') . '.xlsx';
        $outputFilePath = $outputDir . '/' . $fileName;

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->setPreCalculateFormulas(true);
        $writer->save($outputFilePath);
        $spreadsheet->disconnectWorksheets();
        unset($spreadsheet);

        return response()->json([
            'message' => 'Excel generated successfully',
            'url'     => asset('storage/exports/' . $fileName),
            'bagian'  => $bagian->name,
            'isiLaporanHarian' => $laporanHarian
        ]);
    }
    
}
