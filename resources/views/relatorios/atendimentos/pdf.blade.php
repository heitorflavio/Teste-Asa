<!DOCTYPE html>
<html>

<head>
    <title>Relatório de Atendimentos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Relatório de Atendimentos</h1>
    <h1>{{ $medico->nome }}</h1>
    <h2>{{ count($atendimentos) }} Atendimentos</h2>
    <p>Período: {{ \Carbon\Carbon::parse($inicio)->format('d/m/Y') }} até
        {{ \Carbon\Carbon::parse($fim)->format('d/m/Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Médico</th>
                <th>CRM do Médico</th>
                <th>Especialidade</th>
                <th>Data do Atendimento</th>
                <th>Criado em</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($atendimentos as $atendimento)
                <tr>
                    <td>{{ $atendimento->paciente->nome }}</td>
                    <td>{{ $atendimento->medico->nome }}</td>
                    <td>{{ $atendimento->medico->crm }}</td>
                    <td>{{ $atendimento->medico->especialidade }}</td>
                    <td>{{ $atendimento->data_atendimento->format('d/m/Y H:i:s') }}</td>
                    <td>{{ $atendimento->created_at->format('d/m/Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
