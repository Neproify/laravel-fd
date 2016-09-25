<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
    body { font-family: DejaVu Sans, sans-serif; }

    table, th, td
    {
        border: 1px solid black;
        border-collapse: collapse;
    }

    .page-break
    {
        page-break-after: always;
    }
</style>
<table style="width:100%">
    <tr>
        <th>Data</th>
        <th>Trasa jazdy</th> 
        <th>Nazwisko dowódcy</th>
        <th>Celowość korzystania z pojazdu</th>
        <th>Podpis</th>
    </tr>
    @foreach($departures as $departure)
        <tr>
            <td>{{ $departure->date }}</td>
            <td>{{ $departure->from }} - {{ $departure->to }}</td> 
            <td>{{ $departure->supervisor }}</td>
            <td>{{ $departure->reason }}</td>
            <td></td>
        </tr>
    @endforeach
</table>
<div class="page-break"></div>
<table style="width:100%">
    <tr>
        <th>G. Wyjazdu</th>
        <th>Licznik wyjazd</th>
        <th>G. Powrót</th>
        <th>Licznik powrót</th>
        <th>Przebyto km</th>
        <th>Przepracow. napęd urządz.</th>
        <th>Nazwisko prowadzącego pojazd</th>
    </tr>
    @foreach($departures as $departure)
        <tr>
            <td>{{ $departure->departure }}</td>
            <td>{{ $departure->beforeMilage }} km</td>
            <td>{{ $departure->return }}</td>
            <td>{{ $departure->afterMilage }} km</td>
            <td>{{ $departure->afterMilage - $departure->beforeMilage }} km</td>
            <td>{{ $departure->stopTime }} min.</td>
            <td>{{ $departure->driver }}</td>
        </tr>
    @endforeach
</table>
<div class="page-break"></div>
<table style="width:100%">
    <tr>
        <th>Data</th>
        <th>Przy przebiegu</th>
        <th>Typ paliwa</th>
        <th>Ilość paliwa</th>
        <th>Podpis</th>
    </tr>
    @foreach($refuelings as $refueling)
        <tr>
            <td>{{ $refueling->date }}</td>
            <td>{{ $refueling->milage }}</td>
            <td>{{ $refueling->type }}</td>
            <td>{{ $refueling->count }}</td>
            <td></td>
        </tr>
    @endforeach
</table>