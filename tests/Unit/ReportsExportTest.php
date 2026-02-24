<?php

namespace Tests\Unit;

use App\Exports\ReportsExport;
use App\Exports\Sheets\ReportSheet;
use App\Exports\Sheets\EvidenceSheet;
use App\Exports\Sheets\IkiSheet;
use App\Exports\Sheets\MrSheet;
use Tests\TestCase;

class ReportsExportTest extends TestCase
{
    public function test_sheets_include_all_templates()
    {
        $export = new ReportsExport('2024-01-01', '2024-01-31');
        $sheets = $export->sheets();

        $this->assertCount(4, $sheets);
        $this->assertInstanceOf(ReportSheet::class, $sheets[0]);
        $this->assertInstanceOf(EvidenceSheet::class, $sheets[1]);
        $this->assertInstanceOf(IkiSheet::class, $sheets[2]);
        $this->assertInstanceOf(MrSheet::class, $sheets[3]);
    }
}
