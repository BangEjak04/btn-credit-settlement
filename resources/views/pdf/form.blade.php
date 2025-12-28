<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @font-face {
            font-family: "ArialNarrow";
            font-weight: normal;
            font-style: normal;
            src: url("{{ storage_path('fonts/arialnarrow.ttf') }}") format("truetype");
        }

        @font-face {
            font-family: "ArialNarrow";
            font-weight: normal;
            font-style: italic;
            src: url("{{ storage_path('fonts/arialnarrow_italic.ttf') }}") format("truetype");
        }

        @font-face {
            font-family: "ArialNarrow";
            font-weight: bold;
            font-style: normal;
            src: url("{{ storage_path('fonts/arialnarrow_bold.ttf') }}") format("truetype");
        }

        @font-face {
            font-family: "ArialNarrow";
            font-weight: bold;
            font-style: italic;
            src: url("{{ storage_path('fonts/arialnarrow_bolditalic.ttf') }}") format("truetype");
        }

        * {
            font-family: "ArialNarrow", sans-serif;
            font-weight: normal;
            margin: 0;
            padding: 0;
            text-align: justify;
        }

        .page {
            margin: 2cm 2.5cm 0cm 2cm;
        }

        .text-base {
            font-size: 12pt;
        }

        .text-lg {
            font-size: 14pt;
        }

        .text-center {
            text-align: center !important;
        }

        .font-bold {
            font-weight: bold;
        }

        .underline {
            text-decoration: underline;
        }

        table,
        th,
        td {
            vertical-align: top;
        }
    </style>
</head>

<body>
    <div class="page">
        <h1 class="text-lg text-center font-bold underline">PERSETUJUAN PELUNASAN DEBITUR</h1>
        <br>
        <br>
        <p class="text-base">Saya yang bertandatangan di bawah ini :</p>
        <br>
        <table>
            <tr>
                <td>Nama</td>
                <td style="padding: 0 2pt 0 8pt">:</td>
                <td>{{ $record->user->name }}</td>
            </tr>
            <tr>
                <td>No. KTP</td>
                <td style="padding: 0 2pt 0 8pt">:</td>
                <td>{{ $record->user->national_id }}</td>
            </tr>
            <tr>
                <td>No. KPR/Tabungan</td>
                <td style="padding: 0 2pt 0 8pt">:</td>
                <td>{{ $record->debtor_number }}</td>
            </tr>
            <tr>
                <td style="width: 96pt">Alamat Agunan</td>
                <td style="padding: 0 2pt 0 8pt">:</td>
                <td>{{ $record->property_address }}</td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td style="padding: 0 2pt 0 8pt">:</td>
                <td>
                    {{ $record->user->mobile_phone_1 }}
                    @if ($record->user->mobile_phone_2)
                        / {{ $record->user->mobile_phone_2 }}
                    @endif
                    @if ($record->user->phone)
                        / {{ $record->user->phone }}
                    @endif
                </td>
            </tr>
            <br>
            <tr>
                <td>Menyatakan bahwa</td>
                <td style="padding: 0 8pt">:</td>
                <td></td>
            </tr>
        </table>
        <table style="padding-bottom: 8pt">
            <tr>
                <td style="padding-left: 20pt; padding-right: 8pt; vertical-align: top">1.</td>
                <td>@php
                    $accepted = $record->have_accepted_over;
                @endphp
                    <span style="text-decoration: {{ $accepted ? 'line-through' : 'none' }}">Sudah</span> /
                    <span style="text-decoration: {{ $accepted ? 'none' : 'line-through' }}">Belum</span>
                    menerima penawaran KPR/KAR isi ulang dari Petugas Bank BTN. (Coret salah satu)
                </td>
            </tr>
            <tr>
                <td style="padding-left: 20pt; padding-right: 8pt; vertical-align: top">2.</td>
                <td>
                    @php
                        $reasons = [
                            'take_over_bank' => 'Take Over ke Bank Lain',
                            'non_take_over' => 'Non Take Over',
                            'transfer_debtor' => 'Alih Debitur',
                        ];
                    @endphp
                    <p>Alasan Pelunasan :
                    @foreach ($reasons as $key => $label)
                        <span
                            style="text-decoration: {{ $record->settlement_reason === $key ? 'none' : 'line-through' }}">
                            {{ $label }}
                        </span>
                        @if (!$loop->last)
                            /
                        @endif
                    @endforeach
                    (Pilih Salah Satu)</p>
                    <p>(Jika Alasan Pelunasan yaitu Take Over Bank Lain, Point dibawah ini Wajib Diisi :</p>
                    <table>
                        <tr>
                            <td>Bank Tujuan</td>
                            <td style="padding: 0 8pt">:</td>
                            <td>{{ $record->destination_bank }}</td>
                        </tr>
                        <tr>
                            <td>Alasan Take Over</td>
                            <td style="padding: 0 8pt">:</td>
                            <td>{{ $record->take_over_reason }}</td>
                        </tr>
                        <tr>
                            <td>Suku Bunga Take Over</td>
                            <td style="padding: 0 8pt">:</td>
                            <td>{{ $record->take_over_interest_rate }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding-left: 20pt; padding-right: 8pt">3.</td>
                <td>
                    <p>Menyatakan setuju untuk melakukan pelunasan dipercepat dengan kriteria sebagai berikut :</p>
                    <table>
                        <tr>
                            <td style="padding-right: 8pt">a.</td>
                            <td>Sisa Outstanding</td>
                            <td style="padding: 0 2pt 0 8pt">:</td>
                            <td>Rp. {{ number_format($record->remaining_outstanding, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td style="padding-right: 8pt">b.</td>
                            <td>Rate Pinalti Pelunasan Dipercepat</td>
                            <td style="padding: 0 2pt 0 8pt">:</td>
                            <td>{{ $record->penalty_rate }}%</td>
                        </tr>
                        <tr>
                            <td style="padding-right: 8pt"></td>
                            <td></td>
                            <td style="padding: 0 2pt 0 8pt">:</td>
                            <td>Rp.</td>
                        </tr>
                        <tr>
                            <td style="padding-right: 8pt">c.</td>
                            <td>Bunga Berjalan</td>
                            <td style="padding: 0 2pt 0 8pt">:</td>
                            <td>Rp. {{ number_format($record->accrued_interest, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td style="padding-right: 8pt">d.</td>
                            <td>Denda Berjalan</td>
                            <td style="padding: 0 2pt 0 8pt">:</td>
                            <td>Rp. {{ number_format($record->current_fines, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td style="padding-right: 8pt">e.</td>
                            <td>Kewajiban Denda</td>
                            <td style="padding: 0 2pt 0 8pt">:</td>
                            <td>Rp. {{ number_format($record->fine_obligation, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td style="padding-right: 8pt">f.</td>
                            <td>Total Pelunasan</td>
                            <td style="padding: 0 2pt 0 8pt">:</td>
                            <td>Rp. {{ number_format($record->total_settlement, 0, ',', '.') }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <p>Dengan ini menyatakan telah menerima penjelasan terkait dengan besaran pelunasan dipercepat Petugas Bank dan
            membebaskan Bank BTN dari dampak yang muncul dari pelunasan dipercepat tersebut</p>
        <br>
        <p>Demikian surat penyataan ini saya tandatangani dengan sebenar-benarnya dan tanpa ada unsur paksaan</p>
        <br>
        <table style="width: 100%">
            <tr>
                <td style="width: 60%"></td>
                <td style="width: 40%;">
                    <p class="text-center">Surabaya, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                    <br>
                    <p style="padding: 16pt 0" class="text-center">Materai</p>
                    <br>
                    <p class="underline text-center">{{ $record->user->name }}</p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
