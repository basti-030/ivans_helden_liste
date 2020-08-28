@switch(session('error'))
    @case(1062)
    <p class="font-weight-bold bg-danger text-white">DOPPELTER EINTRAG - Bitte nur PKürzel verwenden, die in dieser Tabelle noch nicht existieren</p><br>Fehlercode: {{ session('error') }}
    @break
    @case(1048)
    <p class="font-weight-bold">LEERER EINTRAG - Bitte PKürzel eintragen oder "back to origin" klicken</p><br>Fehlercode: {{ session('error') }}
    @break
    @default

    @break
@endswitch


