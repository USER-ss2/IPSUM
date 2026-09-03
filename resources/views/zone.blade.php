@extends('adminlte::page')

@section('title', 'IPSUM')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">SAV Fixe</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Rapport d'Activité zone</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@php
    $heads = [

        'ID',
        'WFID',
        'date_ouv',
        'date_resolu',
        'date_clot',
        'etat',
        'phase',
        'groupe-res',
        'groupe_clotu',
        'groupe_affectation',
        'zone',
    ];
@endphp

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Rechercher</h3>
                    </div>

                    @if ($test == 1)
                        <div class="card-body">
                            <form action="/incident_recherche" method="POST">
                                <div class="row">
                                    @csrf


                                    <div class="col-4">
                                        Date de début:
                                        <input type="text" name="debut" value={{ $info->debut }}>
                                    </div>

                                    <div class="col-4">
                                        Date de fin:
                                        <input type="text" name="fin" value={{ $info->fin }}>

                                    </div>

                                    <div class= "col-4">
                                        <div class="form-group row">
                                            <label for="selection" class="col-sm-2 col-form-label">Zone</label>
                                            <div class="col-sm-7">
                                                <select class="form-control" id="selection" name="zone">
                                                    <option value="ZONE HACHED"
                                                        {{ 'ZONE HACHED' == $info->zone ? 'selected' : '' }}>ZONE HACHED
                                                    </option>
                                                    <option value="ZONE MEDENINE"
                                                        {{ 'ZONE MEDENINE' == $info->zone ? 'selected' : '' }}>ZONE
                                                        MEDENINE</option>
                                                    <option value="ZONE KRAM_BERGES DU LAC"
                                                        {{ 'ZONE KRAM_BERGES DU LAC' == $info->zone ? 'selected' : '' }}>
                                                        ZONE KRAM_BERGES DU LAC
                                                    </option>
                                                    <option value="ZONE KASBAH"
                                                        {{ 'ZONE KASBAH' == $info->zone ? 'selected' : '' }}>ZONE KASBAH
                                                    </option>
                                                    <option value="ZONE BORJ_LOZIR"
                                                        {{ 'ZONE BORJ_LOZIR' == $info->zone ? 'selected' : '' }}>ZONE
                                                        BORJ_LOZIR</option>
                                                    <option value="ZONE SFAX NORD"
                                                        {{ 'ZONE SFAX NORD' == $info->zone ? 'selected' : '' }}>ZONE
                                                        SFAX NORD</option>
                                                    <option value="ZONE TATAOUINE"
                                                        {{ 'ZONE TATAOUINE' == $info->zone ? 'selected' : '' }}>ZONE
                                                        TATAOUINE</option>
                                                    <option value="ZONE KSAR HELLAL"
                                                        {{ 'ZONE KSAR HELLAL' == $info->zone ? 'selected' : '' }}>ZONE
                                                        KSAR HELLAL</option>
                                                    <option value="ZONE TOZEUR"
                                                        {{ 'ZONE TOZEUR' == $info->zone ? 'selected' : '' }}>ZONE
                                                        TOZEUR</option>
                                                    <option value="ZONE GROMBALIA"
                                                        {{ 'ZONE GROMBALIA' == $info->zone ? 'selected' : '' }}>ZONE
                                                        GROMBALIA</option>
                                                    <option value="ZONE KAIROUAN"
                                                        {{ 'ZONE KAIROUAN' == $info->zone ? 'selected' : '' }}>ZONE
                                                        KAIROUAN</option>
                                                    <option value="ZONE EZZAHRA"
                                                        {{ 'ZONE EZZAHRA' == $info->zone ? 'selected' : '' }}>ZONE
                                                        EZZAHRA</option>
                                                    <option value="ZONE SAHLOUL"
                                                        {{ 'ZONE SAHLOUL' == $info->zone ? 'selected' : '' }}>ZONE
                                                        SAHLOUL</option>

                                                    <option value="ZONE SFAX SUD"
                                                        {{ 'ZONE SFAX SUD' == $info->zone ? 'selected' : '' }}>ZONE
                                                        SFAX SUD</option>
                                                    <option value="ZONE AVICENNE_OUARDIA"
                                                        {{ 'ZONE AVICENNE_OUARDIA' == $info->zone ? 'selected' : '' }}>
                                                        ZONE AVICENNE_OUARDIA</option>
                                                    <option value="ZONE RAS JBEL_JARZOUNA"
                                                        {{ 'ZONE RAS JBEL_JARZOUNA' == $info->zone ? 'selected' : '' }}>
                                                        ZONE RAS JBEL_JARZOUNA
                                                    </option>
                                                    <option value="ZONE NABEUL"
                                                        {{ 'ZONE NABEUL' == $info->zone ? 'selected' : '' }}>ZONE
                                                        NABEUL</option>
                                                    <option value="ZONE HOUMET SOUK-MIDOUN"
                                                        {{ 'ZONE HOUMET SOUK-MIDOUN' == $info->zone ? 'selected' : '' }}>
                                                        ZONE HOUMET SOUK-MIDOUN
                                                    </option>
                                                    <option value="ZONE KASSERINE"
                                                        {{ 'ZONE KASSERINE' == $info->zone ? 'selected' : '' }}>ZONE
                                                        KASSERINE</option>
                                                    <option value="ZONE SOUKRA"
                                                        {{ 'ZONE SOUKRA' == $info->zone ? 'selected' : '' }}>ZONE
                                                        SOUKRA</option>
                                                    <option value="ZONE CHARGUIA METEO"
                                                        {{ 'ZONE CHARGUIA METEO' == $info->zone ? 'selected' : '' }}>
                                                        ZONE CHARGUIA METEO</option>
                                                    <option value="ZONE BIZERTE"
                                                        {{ 'ZONE BIZERTE' == $info->zone ? 'selected' : '' }}>ZONE
                                                        BIZERTE</option>
                                                    <option value="ZONE GAFSA"
                                                        {{ 'ZONE GAFSA' == $info->zone ? 'selected' : '' }}>ZONE GAFSA
                                                    </option>
                                                    <option value="ZONE BENAROUS"
                                                        {{ 'ZONE BENAROUS' == $info->zone ? 'selected' : '' }}>ZONE
                                                        BENAROUS</option>

                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-default " href="{{ URL::to('/zone') }}">

                                        annuler
                                    </a>
                                </div>


                            </form>

                        </div>
                    @else
                        <div class="card-body">
                            <form action="/incident_recherche" method="POST">
                                <div class="row">
                                    @csrf
                                    <div class="col-4">
                                        Date de début:
                                        <input type="text" id="my_date_picker1" name="debut">
                                    </div>

                                    <div class="col-4">
                                        Date de fin:
                                        <input type="text" id="my_date_picker2" name="fin">

                                    </div>

                                    <div class= "col-4">
                                        <div class="form-group row">
                                            <label for="selection" class="col-sm-2 col-form-label">Zone</label>
                                            <div class="col-sm-7">
                                                <select class="form-control" id="selection" name="zone">
                                                    <option value="ZONE HACHED">ZONE HACHED</option>
                                                    <option value="ZONE MEDENINE">ZONE MEDENINE</option>
                                                    <option value="ZONE KRAM_BERGES DU LAC">ZONE KRAM_BERGES DU LAC
                                                    </option>
                                                    <option value="ZONE KASBAH">ZONE KASBAH</option>
                                                    <option value="ZONE BORJ_LOZIR">ZONE BORJ_LOZIR</option>
                                                    <option value="ZONE SFAX NORD">ZONE SFAX NORD</option>
                                                    <option value="ZONE TATAOUINE">ZONE TATAOUINE</option>
                                                    <option value="ZONE KSAR HELLAL">ZONE KSAR HELLAL</option>
                                                    <option value="ZONE TOZEUR">ZONE TOZEUR</option>
                                                    <option value="ZONE GROMBALIA">ZONE GROMBALIA</option>
                                                    <option value="ZONE KAIROUAN">ZONE KAIROUAN</option>
                                                    <option value="ZONE EZZAHRA">ZONE EZZAHRA</option>
                                                    <option value="ZONE SAHLOUL">ZONE SAHLOUL</option>

                                                    <option value="ZONE SFAX SUD">ZONE SFAX SUD</option>
                                                    <option value="ZONE AVICENNE_OUARDIA">ZONE AVICENNE_OUARDIA
                                                    </option>
                                                    <option value="ZONE RAS JBEL_JARZOUNA">ZONE RAS JBEL_JARZOUNA
                                                    </option>
                                                    <option value="ZONE NABEUL">ZONE NABEUL</option>
                                                    <option value="ZONE HOUMET SOUK-MIDOUN">ZONE HOUMET SOUK-MIDOUN
                                                    </option>
                                                    <option value="ZONE KASSERINE">ZONE KASSERINE</option>
                                                    <option value="ZONE SOUKRA">ZONE SOUKRA</option>
                                                    <option value="ZONE CHARGUIA METEO">ZONE CHARGUIA METEO
                                                    </option>
                                                    <option value="ZONE BIZERTE">ZONE BIZERTE</option>
                                                    <option value="ZONE GAFSA">ZONE GAFSA</option>
                                                    <option value="ZONE BENAROUS">ZONE BENAROUS</option>

                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>


                            </form>





                        </div>
                    @endif


                </div>
                <!-- /.card-body -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Statistiques sur les Incidents</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered ">

                            <tr>
                                <th colspan ="8" style=" text-align: center;"> Statistiques</th>
                            </tr>

                            <tr>
                                <th rowspan="2" style=" text-align: center;">Zone</th>
                                <th colspan="3" style=" text-align: center;">Reliquats</th>
                                <th rowspan="2" style=" text-align: center;">Reçu</th>
                                <th colspan="3" style=" text-align: center;">Relevés</th>

                            </tr>
                            <tr>


                                <th style=" text-align: center;">Inf à 24h</th>
                                <th style=" text-align: center;">Entre 24h et 48h</th>
                                <th style=" text-align: center;">Sup à 48h</th>







                                <th style=" text-align: center;">Inf à 24h</th>
                                <th style=" text-align: center;">Entre 24h et 48h</th>
                                <th style=" text-align: center;">Sup à 48h</th>

                            </tr>
                            @if ($test == 1)
                                <tr>

                                    <td style=" text-align: center;">{{ $info->zone }}</td>
                                    <td style=" text-align: center;"><a href="" data-toggle="modal"  data-target="#modalinfr">{{ $infreliq }}</a></td>
                                    <td style=" text-align: center;"><a href="" data-toggle="modal"  data-target="#modalentrer">{{ $entrereliq }}</a></td>
                                    <td style=" text-align: center;"><a href="" data-toggle="modal"  data-target="#modalsupr">{{ $supreliq }}</a></td>
                                    <td style=" text-align: center;">{{ $total }}</td>
                                    <td style=" text-align: center;"><a href="" data-toggle="modal"  data-target="#modalinf">{{ $inf }}</td>
                                    <td style=" text-align: center;"><a href="" data-toggle="modal"  data-target="#modalentre">{{ $entre }}</td>
                                    <td style=" text-align: center;"><a href="" data-toggle="modal"  data-target="#modalsup">{{ $sup }}</td>

                                </tr>

                            @endif


                        </table>
                    </div>
                </div>


               {{-- Custom --}}









            <!-- /.card-body -->



        </div>






        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
@if($test==1    )





<x-adminlte-modal id="modalinf" title="Liste des Incidents" size="xl" theme="secondary" v-centered static-backdrop scrollable>
<div style="height:800px;">

    <div class="card-body">
        <x-adminlte-datatable id="table4" :heads="$heads" striped hoverable>
            @foreach ($infcs as $infc)
                <tr>
                    <td>{{ $infc->num}}</td>
                    <td>{{ $infc->WFID }}</td>
                    <td>{{ $infc->date_ouverture }}</td>
                    <td>{{ $infc->date_resolution }}</td>
                    <td>{{ $infc->date_cloture }}</td>
                    <td>{{ $infc->etat }}</td>
                    <td>{{ $infc->phase }}</td>
                    <td>{{ $infc->groupe_resolu }}</td>
                    <td>{{ $infc->groupe_cloture }}</td>
                    <td>{{ $infc->groupe_affectation }}</td>
                    <td>{{ $infc->zone }}</td>

                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>
</div>
<x-slot name="footerSlot">

    <x-adminlte-button theme="default" label="Fermer" data-dismiss="modal"/>
</x-slot>
</x-adminlte-modal>


<x-adminlte-modal id="modalentre" title="Liste des Incidents" size="xl" theme="secondary" v-centered static-backdrop scrollable>
<div style="height:800px;">

    <div class="card-body">
        <x-adminlte-datatable id="table5" :heads="$heads" striped hoverable>
            @foreach ($entrecs as $entrec)
                <tr>
                    <td>{{ $entrec->num}}</td>
                    <td>{{ $entrec->WFID }}</td>
                    <td>{{ $entrec->date_ouverture }}</td>
                    <td>{{ $entrec->date_resolution }}</td>
                    <td>{{ $entrec->date_cloture }}</td>
                    <td>{{ $entrec->etat }}</td>
                    <td>{{ $entrec->phase }}</td>
                    <td>{{ $entrec->groupe_resolu }}</td>
                    <td>{{ $entrec->groupe_cloture }}</td>
                    <td>{{ $entrec->groupe_affectation }}</td>
                    <td>{{ $entrec->zone }}</td>

                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>
</div>
<x-slot name="footerSlot">

    <x-adminlte-button theme="default" label="Fermer" data-dismiss="modal"/>
</x-slot>
</x-adminlte-modal>



<x-adminlte-modal id="modalsup" title="Liste des Incidents" size="xl" theme="secondary" v-centered static-backdrop scrollable xl>
<div style="height:800px; ">

    <div class="card-body">
        <x-adminlte-datatable id="table6" :heads="$heads" striped hoverable>
            @foreach ($supcs as $supc)
                <tr>
                    <td>{{ $supc->num }}</td>
                    <td>{{ $supc->WFID }}</td>
                    <td>{{ $supc->date_ouverture }}</td>
                    <td>{{ $supc->date_resolution }}</td>
                    <td>{{ $supc->date_cloture }}</td>
                    <td>{{ $supc->etat }}</td>
                    <td>{{ $supc->phase }}</td>
                    <td>{{ $supc->groupe_resolu }}</td>
                    <td>{{ $supc->groupe_cloture }}</td>
                    <td>{{ $supc->groupe_affectation }}</td>
                    <td>{{ $supc->zone }}</td>

                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>
</div>
<x-slot name="footerSlot">

    <x-adminlte-button theme="default" label="Fermer" data-dismiss="modal"/>
</x-slot>
</x-adminlte-modal>

<x-adminlte-modal id="modalinfr" title="Liste des Incidents" size="xl" theme="secondary" v-centered static-backdrop scrollable xl>
    <div style="height:800px; ">

        <div class="card-body">
            <x-adminlte-datatable id="table7" :heads="$heads" striped hoverable>
                @foreach ($infreliqcs as $infreliqc)
                    <tr>
                        <td>{{ $infreliqc->num }}</td>
                        <td>{{ $infreliqc->WFID }}</td>
                        <td>{{ $infreliqc->date_ouverture }}</td>
                        <td>{{ $infreliqc->date_resolution }}</td>
                        <td>{{ $infreliqc->date_cloture }}</td>
                        <td>{{ $infreliqc->etat }}</td>
                        <td>{{ $infreliqc->phase }}</td>
                        <td>{{ $infreliqc->groupe_resolu }}</td>
                        <td>{{ $infreliqc->groupe_cloture }}</td>
                        <td>{{ $infreliqc->groupe_affectation }}</td>
                        <td>{{ $infreliqc->zone }}</td>

                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
    <x-slot name="footerSlot">

        <x-adminlte-button theme="default" label="Fermer" data-dismiss="modal"/>
    </x-slot>
    </x-adminlte-modal>



    <x-adminlte-modal id="modalentrer" title="Liste des Incidents" size="xl" theme="secondary" v-centered static-backdrop scrollable xl>
        <div style="height:800px; ">

            <div class="card-body">
                <x-adminlte-datatable id="table8" :heads="$heads" striped hoverable>
                    @foreach ($entrereliqcs as $entrereliqc)
                        <tr>
                            <td>{{ $entrereliqc->num }}</td>
                            <td>{{ $entrereliqc->WFID }}</td>
                            <td>{{ $entrereliqc->date_ouverture }}</td>
                            <td>{{ $entrereliqc->date_resolution }}</td>
                            <td>{{ $entrereliqc->date_cloture }}</td>
                            <td>{{ $entrereliqc->etat }}</td>
                            <td>{{ $entrereliqc->phase }}</td>
                            <td>{{ $entrereliqc->groupe_resolu }}</td>
                            <td>{{ $entrereliqc->groupe_cloture }}</td>
                            <td>{{ $entrereliqc->groupe_affectation }}</td>
                            <td>{{ $entrereliqc->zone }}</td>

                        </tr>
                    @endforeach
                </x-adminlte-datatable>
            </div>
        </div>
        <x-slot name="footerSlot">

            <x-adminlte-button theme="default" label="Fermer" data-dismiss="modal"/>
        </x-slot>
        </x-adminlte-modal>


<x-adminlte-modal id="modalsupr" title="Liste des Incidents" size="xl" theme="secondary" v-centered static-backdrop scrollable xl>
    <div style="height:800px; ">

        <div class="card-body">
            <x-adminlte-datatable id="table9" :heads="$heads" striped hoverable>
                @foreach ($supreliqcs as $supreliqc)
                    <tr>
                        <td>{{ $supreliqc->num }}</td>
                        <td>{{ $supreliqc->WFID }}</td>
                        <td>{{ $supreliqc->date_ouverture }}</td>
                        <td>{{ $supreliqc->date_resolution }}</td>
                        <td>{{ $supreliqc->date_cloture }}</td>
                        <td>{{ $supreliqc->etat }}</td>
                        <td>{{ $supreliqc->phase }}</td>
                        <td>{{ $supreliqc->groupe_resolu }}</td>
                        <td>{{ $supreliqc->groupe_cloture }}</td>
                        <td>{{ $supreliqc->groupe_affectation }}</td>
                        <td>{{ $supreliqc->zone }}</td>

                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
    <x-slot name="footerSlot">

        <x-adminlte-button theme="default" label="Fermer" data-dismiss="modal"/>
    </x-slot>
    </x-adminlte-modal>

@endif
{{-- Example button to open modal --}}



    <!-- /.container-fluid -->
</section>







@stop

@section('css')


<link href=
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
    rel='stylesheet'>

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
<link rel=" icon" type="icon" href="vendor/adminlte/dist/img/logo_p.png" />



{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!--datatable!-->


<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>







<script>
    /*$(function() {
        $('#table3').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

    });*/

    $(document).ready(function() {

        $(function() {
            $("#my_date_picker1").
            datepicker({
                dateFormat: 'dd/mm/yy'
            });
        });

        $(function() {
            $("#my_date_picker2").
            datepicker({
                dateFormat: 'dd/mm/yy'
            });
        });

        $('#my_date_picker1').change(function() {
            startDate = $(this).
            datepicker('getDate');
            $("#my_date_picker2").
            datepicker("option", "minDate", startDate);
        })

        $('#my_date_picker2').change(function() {
            endDate = $(this).
            datepicker('getDate');
            $("#my_date_picker1").
            datepicker("option", "maxDate", endDate);
        })


    })
</script>














@stop
