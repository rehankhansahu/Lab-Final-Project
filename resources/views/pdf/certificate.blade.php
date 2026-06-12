<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificate of Participation</title>
    <style>
        /* Symmetrical Page Margins to fix Right Border & Single Page Force */
        @page {
            size: a4 landscape;
            margin: 12mm; 
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'DejaVu Serif', serif;
            background: #ffffff;
            color: #2d3748;
            width: 100%;
        }

        /* Width auto lets DomPDF automatically compute perfect left-right bounds */
        .certificate-container {
            border: 4px double #1a365d;
            padding: 4mm;
            height: 176mm; 
            width: auto; 
        }

        .inner-border {
            border: 1px solid #c5a85c;
            padding: 10mm 15mm 5mm 15mm;
            text-align: center;
            height: 166mm; 
        }

        /* Header Styles */
        .org-name {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 14pt;
            font-weight: bold;
            color: #1a365d;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 4mm;
        }

        .cert-title {
            font-size: 32pt;
            font-weight: bold;
            color: #1a365d;
            font-style: italic;
            margin-bottom: 1mm;
        }

        .cert-sub {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 10pt;
            color: #c5a85c;
            text-transform: uppercase;
            letter-spacing: 4px;
            margin-bottom: 5mm;
        }

        .presented-text {
            font-style: italic;
            font-size: 11pt;
            color: #5a6270;
            margin-bottom: 4mm;
        }

        /* Recipient Info - Secured block layout for DomPDF */
        .recipient-wrap {
            width: 75%;
            margin: 0 auto 5mm;
            border-bottom: 1px solid #c5a85c;
            padding-bottom: 1mm;
        }
        .recipient-name {
            font-size: 26pt;
            font-weight: bold;
            color: #1a365d;
            font-style: italic;
        }

        .body-text {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11pt;
            color: #4a5568;
            line-height: 1.5;
            margin-bottom: 6mm;
        }

        .event-title {
            font-weight: bold;
            color: #1a365d;
        }

        /* Metadata Grid Table */
        .meta-table {
            width: 100%;
            margin-bottom: 8mm;
            border-collapse: collapse;
        }
        .meta-cell {
            width: 25%;
            text-align: center;
            border-right: 1px solid #e5e7eb;
            padding: 0 4px;
        }
        .meta-cell:last-child {
            border-right: none;
        }
        .meta-label {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 8pt;
            text-transform: uppercase;
            color: #9ca3af;
            margin-bottom: 1mm;
        }
        .meta-value {
            font-size: 10pt;
            font-weight: bold;
            color: #2d3748;
        }

        /* Footer Alignment */
        .footer-table {
            width: 100%;
            border-collapse: collapse;
        }
        .footer-cell {
            vertical-align: bottom;
            text-align: center;
        }
        .sig-line {
            width: 48mm;
            border-top: 1px solid #4a5568;
            margin: 0 auto 2mm;
        }
        .sig-text {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 9pt;
            font-weight: bold;
            color: #2d3748;
        }
        .sig-sub {
            font-size: 8pt;
            color: #718096;
        }

        /* Official Seal Component */
        .seal-circle {
            width: 22mm;
            height: 22mm;
            border: 2px dashed #c5a85c;
            border-radius: 50%;
            margin: 0 auto;
            padding: 2px;
        }
        .seal-inner {
            width: 100%;
            height: 100%;
            border: 1px solid #c5a85c;
            border-radius: 50%;
            padding-top: 3mm;
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 6pt;
            font-weight: bold;
            color: #c5a85c;
            line-height: 1.2;
        }

        .cert-id {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 8pt;
            color: #a0aec0;
            text-align: left;
            padding-top: 3mm;
        }
    </style>
</head>
<body>

<div class="certificate-container">
    <div class="inner-border">

        <div class="org-name">Event Volunteer Manager</div>
        <div class="cert-title">Certificate of Participation</div>
        <div class="cert-sub">Volunteer Recognition Award</div>

        <div class="presented-text">This certificate is proudly presented to</div>
        <div class="recipient-wrap">
            <div class="recipient-name">{{ $certificate->volunteer->name }}</div>
        </div>

        <div class="body-text">
            in recognition of dedicated service and outstanding contribution as a volunteer at <br>
            <span class="event-title">"{{ $certificate->event->event_name }}"</span>
        </div>

        <table class="meta-table">
            <tr>
                <td class="meta-cell">
                    <div class="meta-label">Event Date</div>
                    <div class="meta-value">{{ $certificate->event->event_date->format('d F Y') }}</div>
                </td>
                <td class="meta-cell">
                    <div class="meta-label">Venue</div>
                    <div class="meta-value">{{ $certificate->event->venue }}</div>
                </td>
                <td class="meta-cell">
                    <div class="meta-label">Department</div>
                    <div class="meta-value">{{ $certificate->volunteer->department }}</div>
                </td>
                <td class="meta-cell">
                    <div class="meta-label">Issue Date</div>
                    <div class="meta-value">{{ $certificate->issue_date->format('d F Y') }}</div>
                </td>
            </tr>
        </table>

        <table class="footer-table">
            <tr>
                <td class="footer-cell" style="width: 35%;">
                    <div class="sig-line"></div>
                    <div class="sig-text">Super Admin</div>
                    <div class="sig-sub">Event Volunteer Manager</div>
                </td>
                
                <td class="footer-cell" style="width: 30%;">
                    <div class="seal-circle">
                        <div class="seal-inner">
                            OFFICIAL<br>SEAL<br>★<br>EVM
                        </div>
                    </div>
                </td>
                
                <td class="footer-cell" style="width: 35%;">
                    <div class="sig-line"></div>
                    <div class="sig-text">Event Coordinator</div>
                    <div class="sig-sub">{{ $certificate->event->event_name }}</div>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="cert-id">
                    Certificate No: EVM-{{ str_pad($certificate->id, 6, '0', STR_PAD_LEFT) }}
                </td>
            </tr>
        </table>

    </div>
</div>

</body>
</html>