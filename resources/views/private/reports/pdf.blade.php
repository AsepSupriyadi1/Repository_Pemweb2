<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Report</title>
    <style>
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            margin: 0;
            padding: 20px;
        }
        
        .header {
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        
        .header h1 {
            color: #333;
            margin: 0;
            font-size: 24px;
        }
        
        .header h2 {
            color: #666;
            margin: 5px 0 0 0;
            font-size: 16px;
            font-weight: normal;
        }
        
        .info-section {
            margin: 20px 0;
            background-color: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #007bff;
        }
        
        .info-row {
            margin: 5px 0;
        }
        
        .info-label {
            font-weight: bold;
            display: inline-block;
            width: 120px;
        }
        
        .statistics {
            display: table;
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        
        .stat-row {
            display: table-row;
        }
        
        .stat-cell {
            display: table-cell;
            width: 25%;
            text-align: center;
            padding: 15px;
            border: 1px solid #ddd;
            background-color: #f8f9fa;
        }
        
        .stat-number {
            font-size: 20px;
            font-weight: bold;
            color: #007bff;
            display: block;
        }
        
        .stat-label {
            font-size: 11px;
            color: #666;
            margin-top: 5px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 10px;
        }
        
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        
        th {
            background-color: #343a40;
            color: white;
            font-weight: bold;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        .page-break {
            page-break-before: always;
        }
        
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        
        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin: 25px 0 15px 0;
            padding-bottom: 5px;
            border-bottom: 1px solid #ddd;
        }
        
        .detail-stats {
            display: table;
            width: 100%;
            margin: 15px 0;
        }
        
        .detail-stats-row {
            display: table-row;
        }
        
        .detail-stats-cell {
            display: table-cell;
            width: 50%;
            padding: 0 10px;
            vertical-align: top;
        }
        
        .stats-box {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 5px 0;
            background-color: #f8f9fa;
        }
        
        .stats-box h4 {
            margin: 0 0 10px 0;
            color: #333;
            font-size: 12px;
        }
        
        .stats-item {
            display: flex;
            justify-content: space-between;
            padding: 3px 0;
            border-bottom: 1px dotted #ccc;
        }
        
        .stats-item:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>STUDENT REPORT</h1>
        <h2>
            @if($kampus)
                {{ $kampus->nama_kampus }}
            @else
                All Campuses
            @endif
            @if($angkatan)
                - Class of {{ $angkatan }}
            @endif
        </h2>
    </div>

    <div class="info-section">
        <div class="info-row">
            <span class="info-label">Report Type:</span>
            Student Data Report
        </div>
        <div class="info-row">
            <span class="info-label">Campus:</span>
            @if($kampus)
                {{ $kampus->nama_kampus }} ({{ $kampus->kota }})
            @else
                All Campuses
            @endif
        </div>
        <div class="info-row">
            <span class="info-label">Year Filter:</span>
            @if($angkatan)
                {{ $angkatan }}
            @else
                All Years
            @endif
        </div>
        <div class="info-row">
            <span class="info-label">Generated:</span>
            {{ $generated_at }}
        </div>
    </div>

    <div class="section-title">SUMMARY STATISTICS</div>
    
    <div class="statistics">
        <div class="stat-row">
            <div class="stat-cell">
                <span class="stat-number">{{ $statistics['total_mahasiswa'] }}</span>
                <div class="stat-label">Total Students</div>
            </div>
            <div class="stat-cell">
                <span class="stat-number">{{ $statistics['jenis_kelamin']['laki_laki'] }}</span>
                <div class="stat-label">Male Students</div>
            </div>
            <div class="stat-cell">
                <span class="stat-number">{{ $statistics['jenis_kelamin']['perempuan'] }}</span>
                <div class="stat-label">Female Students</div>
            </div>
            <div class="stat-cell">
                <span class="stat-number">{{ $statistics['program_studi']->count() }}</span>
                <div class="stat-label">Study Programs</div>
            </div>
        </div>
    </div>

    <div class="section-title">DETAILED STATISTICS</div>
    
    <div class="detail-stats">
        <div class="detail-stats-row">
            <div class="detail-stats-cell">
                <div class="stats-box">
                    <h4>Students by Status</h4>
                    @if($statistics['status_mahasiswa']->count() > 0)
                        @foreach($statistics['status_mahasiswa'] as $status => $count)
                            <div class="stats-item">
                                <span>{{ $status ?: 'Not Specified' }}</span>
                                <span><strong>{{ $count }}</strong></span>
                            </div>
                        @endforeach
                    @else
                        <div style="text-align: center; color: #999;">No data available</div>
                    @endif
                </div>
            </div>
            <div class="detail-stats-cell">
                <div class="stats-box">
                    <h4>Students by Faculty</h4>
                    @if($statistics['fakultas']->count() > 0)
                        @foreach($statistics['fakultas'] as $fakultas => $count)
                            <div class="stats-item">
                                <span>{{ $fakultas ?: 'Not Specified' }}</span>
                                <span><strong>{{ $count }}</strong></span>
                            </div>
                        @endforeach
                    @else
                        <div style="text-align: center; color: #999;">No data available</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if($mahasiswas->count() > 0)
        <div class="page-break"></div>
        <div class="section-title">STUDENT DETAILS</div>
        
        <table>
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 12%;">NIM</th>
                    <th style="width: 20%;">Name</th>
                    <th style="width: 8%;">Gender</th>
                    <th style="width: 15%;">Campus</th>
                    <th style="width: 15%;">Faculty</th>
                    <th style="width: 15%;">Study Program</th>
                    <th style="width: 5%;">Year</th>
                    <th style="width: 5%;">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswas as $index => $mahasiswa)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><strong>{{ $mahasiswa->nim }}</strong></td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->jenis_kelamin }}</td>
                        <td>{{ $mahasiswa->kampus->nama_kampus ?? 'N/A' }}</td>
                        <td>{{ $mahasiswa->fakultas }}</td>
                        <td>{{ $mahasiswa->program_studi }}</td>
                        <td>{{ $mahasiswa->angkatan }}</td>
                        <td>{{ $mahasiswa->status_mahasiswa }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="text-align: center; padding: 40px; color: #999;">
            <h3>No students found matching the criteria</h3>
            <p>Please adjust your filter settings and try again.</p>
        </div>
    @endif

    <div class="footer">
        <p>This report was automatically generated on {{ $generated_at }}</p>
        <p>Total records: {{ $statistics['total_mahasiswa'] }} students</p>
    </div>
</body>
</html>
