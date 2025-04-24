<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Course Completion Certificate</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            padding: 40px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        .certificate {
            width: 800px;
            margin: 0 auto;
            background: white;
            padding: 50px;
            border: 20px solid #0891b2;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(0,0,0,0.1);
        }
        .logo {
            width: 150px;
            margin-bottom: 20px;
        }
        .title {
            font-size: 48px;
            color: #0891b2;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .subtitle {
            font-size: 24px;
            color: #64748b;
            margin-bottom: 40px;
        }
        .student-name {
            font-size: 36px;
            color: #1e293b;
            margin: 20px 0;
            border-bottom: 2px solid #0891b2;
            display: inline-block;
            padding: 0 20px;
        }
        .course-name {
            font-size: 28px;
            color: #334155;
            margin: 20px 0;
        }
        .details {
            font-size: 18px;
            color: #64748b;
            margin: 30px 0;
            line-height: 1.6;
        }
        .signature-area {
            margin-top: 50px;
            display: flex;
            justify-content: space-around;
        }
        .signature {
            border-top: 2px solid #94a3b8;
            padding-top: 10px;
            width: 200px;
        }
        .certificate-id {
            font-size: 14px;
            color: #94a3b8;
            margin-top: 30px;
        }
        .verify-link {
            font-size: 12px;
            color: #64748b;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="certificate">
        skillMint
        <div class="title">Certificate of Completion</div>
        <div class="subtitle">This is to certify that</div>
        <pre>
    </pre>
        <div class="student-name">{{ $certificate->student->name }}</div>
        
        <div class="details">
            has successfully completed the course<br>
            <div class="course-name">{{ $certificate->course->title }}</div>
            with {{ $certificate->percentage }}% marks<br>
            on {{ \Carbon\Carbon::parse($certificate->issued_date)->format('jS F, Y') }}
        </div>
        
        <div class="signature-area">
            <div class="signature">
                <div>Course Instructor</div>
                <div>{{ $certificate->course->instructor }}</div>
            </div>
            <div class="signature">
                <div>Director</div>
                <div>SkillMint Training Center</div>
            </div>
        </div>
        
        <div class="certificate-id">Certificate ID: {{ $certificate->id }}</div>
        <div class="verify-link">
            Verify this certificate at: 
            {{ url($certificate->certificate_link) }}
        </div>
    </div>
</body>
</html>